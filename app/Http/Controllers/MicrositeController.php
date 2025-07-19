<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Microsite;

class MicrositeController extends Controller
{
    public function index()
    {
        $microsites = Microsite::all();
        return view('microsites.index', compact('microsites'));
    }

    public function create()
    {
        return view('microsites.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'domain_name' => 'required|string|unique:microsites,domain_name',
        ]);

        $microsite = new Microsite();
        $microsite->domain_name = $request->input('domain_name');
        $microsite->status = 'pending';
        $microsite->launched_at = null;
        $microsite->save();

        return redirect()->route('microsites.index')->with('success', 'Microsite created successfully!');
    }

    public function launch($id)
    {
        $microsite = Microsite::findOrFail($id);

        // Prepare API parameters
        $token = config('services.dollie.token');
        $baseUrl = rtrim(config('services.dollie.base_url'), '/');
        $blueprintId = config('services.dollie.blueprint_id');

        // Make request to Dollie API
        $response = Http::withToken($token)->post("{$baseUrl}/api/v1/sites", [
            'blueprint_id'  => $blueprintId,
            'site_name'     => $microsite->domain_name,
            'custom_domain' => $microsite->domain_name,
        ]);

        if ($response->successful()) {
            $data = $response->json();

            $microsite->status = 'active';
            $microsite->launched_at = now();
            $microsite->admin_url = $data['login_url'] ?? $data['url'] . '/wp-admin';
            $microsite->editor_url = $data['url'] . '/editor';
            $microsite->public_url = $data['url'];
            $microsite->save();

            return redirect()->route('microsites.index')->with('success', 'Microsite launched successfully!');
        } else {
            // Log error with context
            Log::error('Dollie site provisioning failed', [
                'microsite_id' => $microsite->id,
                'domain'       => $microsite->domain_name,
                'response'     => $response->body(),
            ]);

            return redirect()->route('microsites.index')->with('error', 'Site provisioning failed. Please check logs.');
        }
    }

    public function show($id)
    {
        $microsite = Microsite::findOrFail($id);
        return view('microsites.show', compact('microsite'));
    }
}
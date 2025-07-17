<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        // Simulate WPCS API call response
        $microsite->status = 'active';
        $microsite->launched_at = now();

        $domain = $microsite->domain_name;
        $microsite->admin_url = "https://{$domain}/wp-admin";
        $microsite->editor_url = "https://{$domain}/editor";
        $microsite->public_url = "https://{$domain}";

        $microsite->save();

        return redirect()->route('microsites.index')->with('success', 'Microsite launched!');
    }

    public function show($id)
    {
        $microsite = Microsite::findOrFail($id);
        return view('microsites.show', compact('microsite'));
    }
}
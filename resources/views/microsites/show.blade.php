<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            Microsite Details
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded-lg space-y-4">

                <div>
                    <strong>Domain Name:</strong> {{ $microsite->domain_name }}
                </div>

                <div>
                    <strong>Status:</strong> {{ ucfirst($microsite->status) }}
                </div>

                <div>
                    <strong>Launched At:</strong> 
                    {{ $microsite->launched_at ? $microsite->launched_at->format('Y-m-d H:i') : 'Not launched' }}
                </div>

                @if ($microsite->status === 'active')
                    <div class="pt-4">
                        <a href="{{ $microsite->admin_url }}" class="text-blue-600 underline mr-4" target="_blank">Admin Dashboard</a>
                        <a href="{{ $microsite->editor_url }}" class="text-blue-600 underline mr-4" target="_blank">Editor</a>
                        <a href="{{ $microsite->public_url }}" class="text-blue-600 underline" target="_blank">Public Site</a>
                    </div>
                @endif

                <div class="pt-6">
                    <a href="{{ route('microsites.index') }}" class="text-gray-700 underline">← Back to Microsites</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
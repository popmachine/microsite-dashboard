<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            Microsites
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <a href="{{ route('microsites.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Launch New Microsite
                </a>
            </div>

            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="px-4 py-2">Domain</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Launched At</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($microsites as $site)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $site->domain_name }}</td>
                                <td class="px-4 py-2 capitalize">{{ $site->status }}</td>
                                <td class="px-4 py-2">{{ $site->launched_at ?? '—' }}</td>
                                <td class="px-4 py-2 space-x-2">
                                    @if ($site->status !== 'launched')
                                        <form method="POST" action="{{ route('microsites.launch', $site->id) }}" class="inline">
                                            @csrf
                                            <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">
                                                Launch
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{ $site->public_url }}" target="_blank" class="bg-gray-800 text-white px-3 py-1 rounded hover:bg-gray-900">
                                            View Site
                                        </a>
                                        <a href="{{ $site->editor_url }}" target="_blank" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                            Edit Site
                                        </a>
                                    @endif

                                    {{-- View Details button --}}
                                    <a href="{{ route('microsites.show', $site->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                        View Details
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-500">No microsites yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
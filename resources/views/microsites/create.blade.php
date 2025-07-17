<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            Launch New Microsite
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded-lg">

                @if (session('success'))
                    <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('microsites.store') }}" onsubmit="disableButton(this)">
                    @csrf

                    <div class="mb-4">
                        <label for="domain_name" class="block text-sm font-medium text-gray-700">
                            Domain Name
                        </label>
                        <input
                            type="text"
                            name="domain_name"
                            id="domain_name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2"
                            placeholder="example.com"
                            required
                        >

                        @error('domain_name')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <button
                            type="submit"
                            id="submit-button"
                            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700"
                        >
                            Launch Site
                        </button>
                    </div>
                </form>

                <script>
                    function disableButton(form) {
                        const btn = form.querySelector('#submit-button');
                        btn.disabled = true;
                        btn.innerText = 'Launching...';

                        // Optional: add a spinner
                        // btn.innerHTML = `<svg class="animate-spin h-4 w-4 inline mr-2" viewBox="0 0 24 24">...</svg>Launching...`;
                    }
                </script>

            </div>
        </div>
    </div>
</x-app-layout>
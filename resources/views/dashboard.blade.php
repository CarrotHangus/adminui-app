<title>
    Hazard/News app for Mobile
</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hazard Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}
                <form method="post" action="{{ route('submit') }}">
                    @csrf
                
                    <div class="md:w-1/3 p-8">
                        <x-jet-label for="location" value="{{ __('Hazard Location Name:') }}" />
                        <x-jet-input class="block mt-1 w-full" type="text" name="location" id="location" required/>
                    </div>
                
                    <div class="md:w-3/3 p-8">
                        <x-jet-label for="description" value="{{ __('Hazard Description:') }}"/>
                        <x-jet-input class="block mt-1 w-full" type="text" name="description" id="description" required />
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6 p-8">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <x-jet-label for="latitude" value="{{ __('Latitude:') }}"/>
                            <x-jet-input class="block mt-1 w-full {{ $errors->has('latitude') ? 'border-red-500' : '' }}" type="number" step="any" name="latitude" id="latitude" required />
                            @error('latitude')
                                <p class="text-red-500">Enter valid value</p>
                            @enderror
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <x-jet-label for="longitude" value="{{ __('Longitude:') }}"/>
                            <x-jet-input class="block mt-1 w-full {{ $errors->has('longitude') ? 'border-red-500' : '' }}" type="number" step="any" name="longitude" id="longitude" required />
                            @error('longitude')
                                <p class="text-red-500">Enter valid value</p>
                            @enderror
                        </div>
                    </div>                    
                
                    <div class="md:w-3/3 p-8">
                        <x-jet-label for="reporter" value="{{ __('Name of reporter:') }}"/>
                        <x-jet-input class="block mt-1 w-full" type="text" name="reporter" id="reporter" required/>
                    </div>
                
                    <div class="p-8 items-center">
                        <x-jet-button class="ml-4">
                            {{ __('Submit') }}
                        </x-jet-button>
                    </div>
                    @if (session('success'))
                        <div class="md:w-3/3 p-8 alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </form>                
            </div>
        </div>
    </div>
</x-app-layout>

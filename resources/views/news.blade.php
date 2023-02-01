<title>
    Hazard/News app for Mobile
</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/datepicker.min.js"></script>
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}
                <form method="post" action="{{ route('submit2') }}">
                    @csrf
                
                    <div class="md:w-3/3 p-8">
                        <x-jet-label for="title" value="{{ __('News title:') }}" />
                        <x-jet-input class="block mt-1 w-full" type="text" name="title" id="title" required/>
                    </div>
                
                    <div class="md:w-3/3 p-8">
                        <x-jet-label for="content" value="{{ __('News content:') }}"/>
                        <textarea id="content" name="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write the content here" required></textarea>
                        {{-- <x-jet-input style="height: 200px" class="block mt-1 w-full" type="text" name="content" id="content" required /> --}}
                    </div>

                    <div class="relative max-w-sm p-8">
                        <input datepicker id="date" name="date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date" required>
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

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Backups') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($backups as $backup)
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between">
                            <div>
                                <h3 class="font-semibold text-lg">{{ $backup->name }}</h3>
                                <p class="text-sm">{{ $backup->created_at->diffForHumans() }}</p>
                            </div>
                            <div>
                                <a href="{{ route('backups.download', $backup) }}" class="text-blue-500 dark:text-blue-400">Download</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

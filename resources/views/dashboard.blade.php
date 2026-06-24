<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Task Management Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-2">Welcome back, {{ Auth::user()->name }}!</h3>
                    <p class="text-gray-600 dark:text-gray-400">Manage your tasks and categories efficiently.</p>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Total Tasks</p>
                                <p class="text-4xl font-bold text-gray-900 dark:text-gray-100 mt-2">{{ Auth::user()->tasks()->count() ?? 0 }}</p>
                            </div>
                            <div class="p-3 bg-blue-100 dark:bg-blue-900 rounded-lg">
                                <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Total Categories</p>
                                <p class="text-4xl font-bold text-gray-900 dark:text-gray-100 mt-2">{{ Auth::user()->categories()->count() ?? 0 }}</p>
                            </div>
                            <div class="p-3 bg-green-100 dark:bg-green-900 rounded-lg">
                                <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Navigation -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Quick Navigation</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="{{ route('tasks.index') }}" class="flex items-center p-4 border-2 border-blue-200 dark:border-blue-700 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900 transition">
                            <div class="p-2 bg-blue-100 dark:bg-blue-900 rounded-lg mr-4">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-gray-100">My Tasks</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">View and manage all your tasks</p>
                            </div>
                        </a>

                        <a href="{{ route('categories.index') }}" class="flex items-center p-4 border-2 border-green-200 dark:border-green-700 rounded-lg hover:bg-green-50 dark:hover:bg-green-900 transition">
                            <div class="p-2 bg-green-100 dark:bg-green-900 rounded-lg mr-4">
                                <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-gray-100">Categories</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Organize your tasks with categories</p>
                            </div>
                        </a>

                        <a href="{{ route('tasks.create') }}" class="flex items-center p-4 border-2 border-purple-200 dark:border-purple-700 rounded-lg hover:bg-purple-50 dark:hover:bg-purple-900 transition">
                            <div class="p-2 bg-purple-100 dark:bg-purple-900 rounded-lg mr-4">
                                <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-gray-100">New Task</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Create a new task</p>
                            </div>
                        </a>

                        <a href="{{ route('categories.create') }}" class="flex items-center p-4 border-2 border-orange-200 dark:border-orange-700 rounded-lg hover:bg-orange-50 dark:hover:bg-orange-900 transition">
                            <div class="p-2 bg-orange-100 dark:bg-orange-900 rounded-lg mr-4">
                                <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-gray-100">New Category</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Create a new category</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Tasks Preview -->
            @if (Auth::user()->tasks()->count() > 0)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Recent Tasks</h3>
                        <div class="space-y-2">
                            @foreach (Auth::user()->tasks()->latest()->take(5)->get() as $task)
                                <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded">
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-gray-100">{{ $task->title }}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $task->categories?->name ?? 'No category' }}</p>
                                    </div>
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                        @switch($task->status->color())
                                            @case('green') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 @break
                                            @case('amber') bg-amber-100 text-amber-800 dark:bg-amber-900 dark:text-amber-200 @break
                                            @default bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                                        @endswitch
                                    ">
                                        {{ $task->status->label() }}
                                    </span>
                                </div>
                            @endforeach
                            @if (Auth::user()->tasks()->count() > 5)
                                <div class="mt-4">
                                    <a href="{{ route('tasks.index') }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 text-sm font-medium">
                                        View all tasks →
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-gray-200 overflow-hidden shadow-xl sm:rounded-lg pl-4">
                {{-- TODO 修正版型 --}}
                {{ $users->links() }}
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg mt-4">
                <table class='w-full'>
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-gray-800 dark:text-gray-200 text-left">{{ __('Name') }}</th>
                            <th class="px-4 py-2 text-gray-800 dark:text-gray-200 text-left">{{ __('Username') }}</th>
                            <th class="px-4 py-2 text-gray-800 dark:text-gray-200 text-left">{{ __('Email') }}</th>
                            <th class="px-4 py-2 text-gray-800 dark:text-gray-200 text-left">{{ __('2FA') }}</th>
                            <th class="px-4 py-2 text-gray-800 dark:text-gray-200 text-center">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-4 py-2 text-gray-800 dark:text-gray-200">{{ $user->name }}</td>
                                <td class="px-4 py-2 text-gray-800 dark:text-gray-200">{{ $user->username }}</td>
                                <td class="px-4 py-2 text-gray-800 dark:text-gray-200">{{ $user->email }}</td>
                                <td class="px-4 py-2 text-gray-800 dark:text-gray-200">
                                    {{ $user->two_factor_confirmed_at ? __('Enabled') : __('Disabled') }}</td>
                                <td class="px-4 py-2 text-gray-800 dark:text-gray-200 text-center">
                                    <div class="isolate inline-flex rounded-md shadow-sm">
                                        <a href="{{ route('users.edit', $user) }}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1.5 px-2 rounded-l">{{ __('Edit') }}</a>
                                        <button form="delete_{{ $user->id }}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1.5 px-2 rounded-r">{{ __('Delete') }}</button>
                                    </div>
                                    <form id="delete_{{ $user->id }}" action="{{ route('users.destroy', $user) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

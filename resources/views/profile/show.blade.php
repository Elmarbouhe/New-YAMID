<?php use Illuminate\Support\Str;
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>

        <div class="container mx-auto px-4 sm:px-8">
           <h2 class="text-2xl font- text-black-700 dark:text-black-200">
                Mes Produits
            </h2>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-4">
                           titer
                        </th>
                        <th scope="col" class="px-6 py-4">
                           Description
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Modifier
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Supprimer
                        </th>
                    </tr>
                </thead>

                @foreach (auth()->user()->posts as $post)
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $post->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ str::limit($post->body, 20) }}
                        </td>
                            <td>
                                <a href="{{route('posts.edit',$post->slug) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                            Modifier
                                </a>
                                <form id="{{ $post->id }}" action="{{route('posts.destroy',$post->slug)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                            <td>
                                <button
                                    onclick="event.preventDefault();
                                    if(confirm('Voulez vous vraiment supprimer ce post?'))
                                    document.getElementById({{ $post->id}}).submit();"

                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" type="submit">
                                    Supprimer
                                </button>
                            </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>


        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

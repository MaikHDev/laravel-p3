<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
@if(auth()->check())
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Contact') }}
            </h2>
        </x-slot>
        <div>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created at</th>
                </tr>
                @foreach($forms as $form)
                    <tr>
                        <td>{{$form->title}}</td>
                        <td>{{$form->description}}</td>
                        <td>{{$form->created_at}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </x-app-layout>
@else
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                    >
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>
    <br>
    <a href="{{route('product.index')}}">See products</a>
    <br>
    <p class="text-2xl">Contact</p>
    <form method="post" action="{{route('contact.store')}}">
        @csrf
        @method('post')
        <input type="text" name="title" placeholder="Title" maxlength="30" minlength="5" required/>
        <input type="text" name="description" placeholder="Description" maxlength="255" minlength="10" required/>
        <button class="text-white bg-red-600 dark:active:text-gray-300 p-2 rounded"
                type="submit">
            Submit form
        </button>
    </form>
@endif
</body>
</html>

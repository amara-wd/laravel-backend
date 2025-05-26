<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @class(['dark' => ($appearance ?? 'system') == 'dark'])>
<head>
    <meta charset="utf-8">
    @vite('resources/css/app.css')
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script>
        (function() {
            const appearance = '{{ $appearance ?? "system" }}';
            if (appearance === 'system') {
                if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.classList.add('dark');
                }
            }
        })();
    </script>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<style type="text/tailwindcss">
      @theme {
        --color-clifford: #da373d;
      }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen flex items-center justify-center">
        <div class="text-center space-y-4">
            {{-- <h1 class="text-4xl font-bold text-blue-600 dark:text-blue-400">
                Welcome to Laravel + Tailwind
            </h1>
            <p class="text-lg">
                You're now using a Blade view styled with Tailwind CSS and system-aware dark mode.
            </p>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Happy coding!
            </p>

            <h1 class="text-xl text-gray-700">
                My message is: {{ $message }}
            </h1>

            <h1 class="text-3xl font-bold underline text-blue-600">
                Hello world!
            </h1> --}}
<div> Form goes here </div>
<form action="/tweets" method="POST" class="mb-20">
    @csrf
    <input type="text" name="body" class="mb-4 w-full p-2 border-2 border-blue-500" placeholder="what's happening?">
    <button type="submit" class="bg-yellow-300 text-gray-800 py-3 px-6 rounded-full">Tweet
    </button>
     </form>
            {{-- Tweets Section --}}
            @foreach ($tweets as $tweet)
                <div class="border-b-2 border-blue-500 p-2">
                    <form>
                     <input type="text"   value=" {{ $tweet->body }}">
                     <button type="submit"> Edit</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>

      
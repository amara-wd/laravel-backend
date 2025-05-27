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

<body class="font-sans antialiased bg-gray-500">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-xl text-center space-y-6">
            
            <!-- Form Header -->
            <div class="border-b-2 border-blue-500 p-2 text-lg font-semibold">
                Post a Tweet
            </div>

            <!-- Tweet Form -->
            <form action="/tweets" method="POST" class="space-y-4">
                @csrf
                <input 
                    type="text" 
                    name="body" 
                    placeholder="What's happening?" 
                    class="w-full p-3 border-2 border-blue-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                >
                <button 
                    type="submit" 
                    class="bg-yellow-300 text-gray-800 font-semibold py-2 px-6 rounded-full hover:bg-yellow-400 transition"
                >
                    Tweet
                </button>
            </form>

            <!-- Tweets Section -->
            <div class="space-y-4">
                @foreach ($tweets as $tweet)
                    <div class="border-b-2 border-blue-500 p-2">
                        <form action="/tweets/{{ $tweet->id }}" method="POST" class="flex items-center space-x-2">
                            @csrf
                            @method('PUT')
                            <input 
                                type="text" 
                                name="body" 
                                value="{{ $tweet->body }}" 
                                class="bg-white border border-gray-300 py-2 px-4 rounded-full text-black w-full focus:outline-none focus:ring-2 focus:ring-blue-300"
                            >
                            <button 
                                type="submit" 
                                class="bg-blue-300 text-blue-900 py-2 px-4 rounded-full hover:bg-blue-400 transition"
                            >
                                Edit
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</body>


</html>

      
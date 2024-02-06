<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @vite(['resources/sass/home.scss'])
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body class="page">
        <div class="header-container">
            <a href="/" class="app-title">
                レシぽん！
            </a>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit">ログアウト</button>
            </form>
        </div>
        @if(Session::has('login_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('login_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="container mx-auto px-4 py-6 flex flex-col items-center">
            <div class="flex flex-col items-center justify-center">
                <h1 class="text-3xl font-bold mb-4">今日のおすすめ料理</h1>
                <p class="text-gray-600 mb-6 text-center">好きな料理を選んでレシピを見てみよう！</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
                <div class="border rounded-lg overflow-hidden">
                    <img src="{{ $recipeList['result'][0]['foodImageUrl'] }}" alt="Recipe 1" class="w-full h-54 object-cover" width="200" height="200" style="aspect-ratio: 200 / 200; object-fit: cover;">
                    <div class="p-4">
                        <h2 class="font-bold text-lg mb-2">{{ $recipeList['result'][0]['recipeTitle'] }}</h2>
                        <p class="text-gray-600">{{ $recipeList['result'][0]['recipeDescription'] }}</p>
                        <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input custom-brown-bg hover:bg-accent text-white h-10 px-4 py-2 mt-4">
                            レシピをみる
                        </button>
                    </div>
                </div>
                <div class="border rounded-lg overflow-hidden">
                    <img src="{{ $recipeList['result'][1]['foodImageUrl'] }}" alt="Recipe 2" class="w-full h-54 object-cover" width="200" height="200" style="aspect-ratio: 200 / 200; object-fit: cover;">
                    <div class="p-4">
                        <h2 class="font-bold text-lg mb-2">{{ $recipeList['result'][1]['recipeTitle'] }}</h2>
                        <p class="text-gray-600">{{ $recipeList['result'][1]['recipeDescription'] }}</p>
                        <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input custom-brown-bg hover:bg-brown-700 text-white h-10 px-4 py-2 mt-4">レシピをみる</button>
                    </div>
                </div>
                <div class="border rounded-lg overflow-hidden">
                    <img src="{{ $recipeList['result'][2]['foodImageUrl'] }}" alt="Recipe 3" class="w-full h-54 object-cover" width="200" height="200" style="aspect-ratio: 200 / 200; object-fit: cover;">
                    <div class="p-4">
                        <h2 class="font-bold text-lg mb-2">{{ $recipeList['result'][2]['recipeTitle'] }}</h2>
                        <p class="text-gray-600">{{ $recipeList['result'][2]['recipeDescription'] }}</p>
                        <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input custom-brown-bg hover:bg-accent text-white h-10 px-4 py-2 mt-4">レシピをみる</button>
                    </div>
                </div>
            </div>
            <button onclick="reloadPage()" class="inline-flex items-center justify-center mt-4 rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2">
                ほかの料理をみる
            </button>
            {{-- <script>
                function reloadPage() {
                    location.reload(true);
                }
            </script> --}}
        </div>
    </body>
</html>

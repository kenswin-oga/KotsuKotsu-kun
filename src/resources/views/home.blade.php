<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @vite(['resources/sass/home.scss'])
        {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body class="page">
        <div class="navbar">
            <div class="navbar-start">
                <div class="dropdown mr-5">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
                    </div>
                    <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow rounded-box w-32">
                      <li><a href="/login">mypage</a></li>
                      <li><a href="/register">register</a></li>
                    </ul>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chef-hat" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c1.918 0 3.52 1.35 3.91 3.151a4 4 0 0 1 2.09 7.723l0 7.126h-12v-7.126a4 4 0 1 1 2.092 -7.723a4 4 0 0 1 3.908 -3.151z" /><path d="M6.161 17.009l11.839 -.009" /></svg>
                <a href="/" class="btn btn-ghost text-xl">レシぽん！</a>
            </div>
            <div class="navbar-center">
            </div>
            <div class="navbar-end">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit">ログアウト</button>
                </form>
            </div>
        </div>
        @if(Session::has('login_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('login_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        {{-- <div class="hero min-h-screen" style="background-image: url('{{ asset("images/hero_2.png") }}');">
        </div> --}}
        
        <div class="flex m-20">
            <div class="container mx-auto px-10 w-2/3">
                <div class="divider" style="border-color: red;"></div> 
                <div class="flex flex-col items-center justify-center">
                    <h1 class="text-3xl font-bold mb-4">本日のおすすめ料理</h1>
                    <p class="text-gray-600 text-center">好きな料理を選んでレシピを見てみよう！</p>
                </div>
                <div class="divider"></div> 
                <div class="bg-base-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
                        <div class="card card-compact bg-base-100 shadow-xl">
                            <figure><img src="{{ $recipeDataArray[0]['result'][0]['foodImageUrl'] }}" alt="Recipe 1" class="w-full h-54 object-cover" width="200" height="200" style="aspect-ratio: 200 / 200; object-fit: cover;" /></figure>
                            <div class="card-body">
                            <h2 class="card-title">{{ $categoryNames[0] }}</h2>
                            <div class="card-actions justify-end">
                                <button class="btn btn-primary">
                                    <a href="{{ route('recipe-list', ['id' => 0]) }}">レシピ一覧</a>
                                </button>
                            </div>
                            </div>
                        </div>
                        <div class="card card-compact bg-base-100 shadow-xl">
                            <figure><img src="{{ $recipeDataArray[1]['result'][0]['foodImageUrl'] }}" alt="Recipe 1" class="w-full h-54 object-cover" width="200" height="200" style="aspect-ratio: 200 / 200; object-fit: cover;" /></figure>
                            <div class="card-body">
                            <h2 class="card-title">{{ $categoryNames[1] }}</h2>
                            <div class="card-actions justify-end">
                                <button class="btn btn-primary">
                                    <a href="{{ route('recipe-list', ['id' => 1]) }}">レシピ一覧</a>
                                </button>
                            </div>
                            </div>
                        </div>
                        <div class="card card-compact bg-base-100 shadow-xl">
                            <figure><img src="{{ $recipeDataArray[2]['result'][0]['foodImageUrl'] }}" alt="Recipe 1" class="w-full h-54 object-cover" width="200" height="200" style="aspect-ratio: 200 / 200; object-fit: cover;" /></figure>
                            <div class="card-body">
                            <h2 class="card-title">{{ $categoryNames[2] }}</h2>
                            <div class="card-actions justify-end">
                                <button class="btn btn-primary">
                                    <a href="{{ route('recipe-list', ['id' => 2]) }}">レシピ一覧</a>
                                </button>
                            </div>
                            </div>
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
            <!-- 右側のブロック -->
            <div class="bg-gray-200 p-6 w-1/3">
                <h2 class="text-xl font-bold mb-4">新しいコンテンツ</h2>
                <p>ここに適当なコンテンツを追加します。</p>
            </div>
        </div>
    </body>
</html>

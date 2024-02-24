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
                      <li><a href="/login">マイページ</a></li>
                      <li><a href="/register">登録</a></li>
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
        
        <div class="">
            <div class="flex mx-20 my-10">
                <div class="mx-auto px-10 w-2/3">
                    <div class="">
                        <div class="divider" style="border-color: red;"></div> 
                        <div class="flex flex-col items-center justify-center">
                            <h1 class="text-3xl font-bold mb-4">本日のおすすめ料理</h1>
                            <p class="text-gray-600 text-center">好きな料理を選んでレシピを見てみよう！</p>
                        </div>
                        <div class="divider"></div> 
                        <div class="bg-base-100">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
                                <div class="card card-compact bg-base-100 shadow-xl">
                                    <figure><img src="{{ $recipeList['result'][0]['foodImageUrl'] }}" alt="Recipe 1" class="w-full h-54 object-cover" width="200" height="200" style="aspect-ratio: 200 / 200; object-fit: cover;" /></figure>
                                    <div class="card-body">
                                    <h2 class="card-title">{{ $recipeList['result'][0]['recipeTitle'] }}</h2>
                                    <p class="text-gray-600">{{ $recipeList['result'][0]['recipeDescription'] }}</p>
                                    <div class="card-actions justify-end">
                                        {{-- <a class="text-neutral font-bold" href="{{ route('recipe-list', ['id' => 0]) }}">レシピをみる</a> --}}
                                        <button class="btn btn-primary min-h-0 h-8">
                                            <a href="{{ route('recipe-list', ['id' => 0]) }}">レシピ</a>
                                        </button>
                                    </div>
                                    </div>
                                </div>
                                {{--<div class="card card-compact bg-base-100 shadow-xl">
                                    <figure><img src="{{ $recipeDataArray[1]['result'][0]['foodImageUrl'] }}" alt="Recipe 1" class="w-full h-54 object-cover" width="200" height="200" style="aspect-ratio: 200 / 200; object-fit: cover;" /></figure>
                                    <div class="card-body">
                                        <h2 class="card-title">{{ $recipeDataArray[1]['result'][0]['recipeTitle'] }}</h2>
                                        <p class="text-gray-600">{{ $recipeDataArray[1]['result'][0]['recipeDescription'] }}</p>
                                        <div class="card-actions justify-end">
                                            {{-- <a class="text-neutral font-bold" href="{{ route('recipe-list', ['id' => 1]) }}">レシピをみる</a>
                                            <button class="btn btn-primary min-h-0 h-8">
                                                <a href="{{ route('recipe-list', ['id' => 1]) }}">レシピ</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-compact bg-base-100 shadow-xl">
                                    <figure><img src="{{ $recipeDataArray[2]['result'][0]['foodImageUrl'] }}" alt="Recipe 1" class="w-full h-54 object-cover" width="200" height="200" style="aspect-ratio: 200 / 200; object-fit: cover;" /></figure>
                                    <div class="card-body">
                                        <h2 class="card-title">{{ $recipeDataArray[2]['result'][0]['recipeTitle'] }}</h2>
                                    <p class="text-gray-600">{{ $recipeDataArray[2]['result'][0]['recipeDescription'] }}</p>
                                    <div class="card-actions justify-end">
                                        {{-- <a class="text-neutral font-bold" href="{{ route('recipe-list', ['id' => 1]) }}">レシピをみる</a>
                                        <button class="btn btn-primary min-h-0 h-8">
                                            <a href="{{ route('recipe-list', ['id' => 2]) }}">レシピ</a>
                                        </button>
                                    </div>
                                    </div>
                                </div>--}}
                            </div>
                        </div>
                        <button class="btn btn-primary min-h-0 h-8 mt-5 font-normal">
                            <a href="{{ route('recipe-list', ['id' => 0]) }}">ほかの料理をみる</a>
                        </button>
                        {{-- <script>
                            function reloadPage() {
                                location.reload(true);
                            }
                        </script> --}}
                    </div>
                </div>
                <!-- 右側のブロック -->
                
                {{--<div class="p-6 w-1/3">
                    <div class="mb-6">
                        <h2 class="text-xl font-bold mb-4">「人気メニュー」のおすすめ</h2>
                        <div class="card card-side bg-base-100 shadow-xl">
                            <figure style="max-width: 180px;"><img src="{{ $recipeDataArray[5]['result'][0]['foodImageUrl'] }}" alt="Recipe 1" class="w-full h-54 object-cover" width="200" height="200" style="aspect-ratio: 200 / 200; object-fit: cover;" /></figure>
                            <div class="card-body">
                                <h2 class="card-title">{{ $recipeDataArray[5]['result'][0]['recipeTitle'] }}</h2>
                                {{-- <p class="text-gray-600">{{ $recipeDataArray[3]['result'][0]['recipeDescription'] }}</p> 
                              <div class="card-actions justify-center">
                                <button class="btn btn-primary min-h-0 h-8 mt-5 font-normal">
                                    <a href="{{ route('recipe-list', ['id' => 5]) }}">レシピ</a>
                                </button>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-xl font-bold mb-4">「簡単料理・時短」のおすすめ</h2>
                        <div class="card card-side bg-base-100 shadow-xl">
                            <figure style="max-width: 180px;"><img src="{{ $recipeDataArray[3]['result'][0]['foodImageUrl'] }}" alt="Recipe 1" class="w-full h-54 object-cover" width="200" height="200" style="aspect-ratio: 200 / 200; object-fit: cover;" /></figure>
                            <div class="card-body">
                                <h2 class="card-title">{{ $recipeDataArray[3]['result'][0]['recipeTitle'] }}</h2>
                                {{-- <p class="text-gray-600">{{ $recipeDataArray[3]['result'][0]['recipeDescription'] }}</p> 
                              <div class="card-actions justify-center">
                                <button class="btn btn-primary min-h-0 h-8 mt-5 font-normal">
                                    <a href="{{ route('recipe-list', ['id' => 3]) }}">レシピ</a>
                                </button>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-xl font-bold mb-4">「節約料理」のおすすめ</h2>
                        <div class="card card-side bg-base-100 shadow-xl">
                            <figure style="max-width: 180px;"><img src="{{ $recipeDataArray[4]['result'][0]['foodImageUrl'] }}" alt="Recipe 1" class="w-full h-54 object-cover" width="200" height="200" style="aspect-ratio: 200 / 200; object-fit: cover;" /></figure>
                            <div class="card-body">
                                <h2 class="card-title">{{ $recipeDataArray[4]['result'][0]['recipeTitle'] }}</h2>
                                {{-- <p class="text-gray-600">{{ $recipeDataArray[3]['result'][0]['recipeDescription'] }}</p> 
                                <div class="card-actions justify-center">
                                <button class="btn btn-primary min-h-0 h-8 mt-5 font-normal">
                                    <a href="{{ route('recipe-list', ['id' => 4]) }}">レシピ</a>
                                </button>
                              </div>
                            </div>
                          </div>
                    </div>--}}
                </div>
            </div>
        </div>
    </body>
</html>

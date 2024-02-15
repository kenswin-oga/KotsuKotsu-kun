<!DOCTYPE html>
<html data-theme="autmn" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @vite(['resources/sass/top.scss'])
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
                      <li><a>mypage</a></li>
                      <li><a>register</a></li>
                    </ul>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chef-hat" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c1.918 0 3.52 1.35 3.91 3.151a4 4 0 0 1 2.09 7.723l0 7.126h-12v-7.126a4 4 0 1 1 2.092 -7.723a4 4 0 0 1 3.908 -3.151z" /><path d="M6.161 17.009l11.839 -.009" /></svg>
                <a class="btn btn-ghost text-xl">レシぽん！</a>
            </div>
            <div class="navbar-center">
            </div>
            <div class="navbar-end">
            </div>
        </div>

        <div class="top-content">
            <div class="sub-title">
                日々の自炊のお供
            </div>
            <div class="title">
                レシぽん！
            </div>
            <div class="app-icon">
                <img src="{{ asset("images/recipon.png") }}" class="app-icon-img1">
            </div>
            <a href="login" class="button">
                <button class="btn btn-wide btn-neutral text-lg">使ってみる</button>
            </a>
        </div>
    </body>
</html>

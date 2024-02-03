<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @vite(['resources/sass/top.scss'])
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body class="page">
        <div class="header-container">
            <a href="/" class="app-title">
                レシぽん！
            </a>
            <ul class="menu-group">
                <li class="menu-item">
                    <a href="/login">
                        ログイン
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/register" class="button">
                        登録
                    </a>
                </li>
            </ul>
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
                使ってみる
            </a>
        </div>
    </body>
</html>

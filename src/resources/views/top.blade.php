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
            <div class="app-title">コツコツくん</div>
            <ul class="menu-group">
                <li class="menu-item">
                    <a href="#">
                        ログイン
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="button">
                        登録
                    </a>
                </li>
            </ul>
        </div>
        <div class="top-content">
            <div class="sub-title">
                日々の継続のお供
            </div>
            <div class="title">
                コツコツくん
            </div>
            <div class="app-icon">
                <img src="{{ asset("images/study_human.png") }}" class="app-icon-img1">
                <img src="{{ asset("images/flag_human.png") }}" class="app-icon-img2">
            </div>
            <a href="#" class="button">
                使ってみる
            </a>
        </div>
    </body>
</html>

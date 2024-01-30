<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @vite(['resources/sass/signin.scss'])
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body class="page">
        <div class="header-container">
            <a href="/" class="app-title">
                レシぽん！
            </a>
        </div>
        <div class="top-content">
            <div class="sub-title">
                登録
            </div>
            <form class="login-form">
                <div class="form-group">
                    <label for="username">ユーザー名</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" id="password" name="password" required>
                </div>
            </form>
            <button type="submit" class="button">
                はじめる
            </button>
        </div>
    </body>
</html>

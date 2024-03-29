<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('home/home-file/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('home/home-file/css/font/font.css')}}">
    <title>صفحه ورود</title>
</head>
<body>
<main>
    <div class="account">
        <form action="{{route('login')}}" class="form" method="post">
            @csrf
            <a class="account-logo" href="index.html">
                <img src="img/weblogo.png" alt="">
            </a>
            <div class="form-content form-account">
                <input name="email" type="text" class=" txt" placeholder="ایمیل یا شماره موبایل">
                <input name="password" type="password"class=" txt" placeholder="رمز عبور">
                <br>
                <button class="btn btn--login">ورود</button>
                <label class="ui-checkbox">
                    مرا بخاطر داشته باش
                    <input type="checkbox" checked="checked">
                    <span class="checkmark"></span>
                </label>
                <div class="recover-password">
                    <a href="recoverpassword.html">بازیابی رمز عبور</a>
                </div>
            </div>
            <div class="form-footer">
                <a href="{{route('register')}}">صفحه ثبت نام</a>
            </div>
        </form>
    </div>
</main>
</body>
</html>

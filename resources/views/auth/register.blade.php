<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('home/home-file/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('home/home-file/css/font/font.css')}}">
    <title>صفحه ثبت نام</title>
</head>
<body>
<main>

    <div class="account">
        <form action="{{route('register')}}" class="form" method="post">
            @csrf
            <a class="account-logo" href="index.html">
                <img src="img/weblogo.png" alt="">
            </a>
            <div class="form-content form-account">
                <input name="name" type="text" class="txt" placeholder="نام و نام خانوادگی">
                <input name="email" type="email" class="txt" placeholder="ایمیل">
                <input name="password" type="password" class="txt" placeholder="رمز عبور">
                <br>
                <button class="btn continue-btn">ثبت نام و ادامه</button>

            </div>
            <div class="form-footer">
                <a href="{{route('login')}}">صفحه ورود</a>
            </div>
        </form>
    </div>
</main>
</body>
</html>

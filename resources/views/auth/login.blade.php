@extends("auth-layout")
@section("content")

<body class="class-body">
<!--======= log_in_page =======-->

<div id="log-in" class="site-form log-in-form">

    <div id="log-in-head">
        <h1>ورود</h1>
        <div id="logo"><a href="{{route("index")}}"><img src="img/logo.png" alt=""></a></div>
    </div>


    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="form-output">
        <form action="{{route("login.store")}}" method="post">
            @csrf

            <div class="form-group label-floating">
                <label class="control-label">ایمیل</label>
                <input class="form-control" placeholder="ایمیل" type="email" value="{{old("name")}}" name="email">
            </div>
            <div class="form-group label-floating">
                <label class="control-label">رمز عبور</label>
                <input class="form-control" placeholder="رمز عبور" type="password" value="{{old("name")}}" name="password">
            </div>

            <div class="remember">
                <div class="checkbox">
                    <label>
                        <input name="remember" type="checkbox">
                        مرا به خاطر بسپار
                    </label>
                </div>
                <a href="{{route("password.request")}}" class="forgot">رمز عبور من را فراموش کرده ام</a>
            </div>

            <button type="submit" class="btn btn-lg btn-primary full-width"> ورود   </button>

{{--            <div class="or"></div>--}}

{{--            <a href="#" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fa fa-facebook" aria-hidden="true"></i>ورود با فیس بوک</a>--}}

{{--            <a href="#" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fa fa-twitter" aria-hidden="true"></i>ورود با توییتر</a>--}}


            <p>آیا شما یک حساب کاربری ندارید؟ <a href="{{route("register.create")}}">ثبت نام کنید!</a> </p>
        </form>
    </div>
</div>
<!--======= // log_in_page =======-->
@endsection

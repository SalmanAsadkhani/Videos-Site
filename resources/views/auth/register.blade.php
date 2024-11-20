
    @extends("auth-layout");
    @section('content');
    <body class="@section("class-body")">

    <div id="log-in" class="site-form log-in-form">

    <div id="log-in-head">
        <h1>ثبت نام</h1>
        <div id="logo"><a href="{{route('index')}}"><img src="img/logo.png" alt=""></a></div>
    </div>

    <div class="form-output">

        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{route("register.store")}}" method="post">
            @csrf
            <div class="form-group label-floating">
                <label class="control-label">نام </label>
                <input class="form-control"  value="{{old("name")}}" placeholder="نام" type="text" name="name">
            </div>

             <div class="form-group label-floating">
                <label class="control-label">ایمیل</label>
                <input class="form-control" value="{{old("email")}}" placeholder="ایمیل" type="email" name="email">
            </div>

            <div class="form-group label-floating">
                <label class="control-label">رمز عبور</label>
                <input class="form-control" placeholder="رمز عبور"
                       type="password"
                       name="password_confirmation"
                >
            </div>

            <div class="form-group label-floating">
                <label class="control-label">تأیید رمز عبور</label>
                <input class="form-control" placeholder="تکرار رمز عبور" type="password" name="password">
            </div>

            <div class="form-group label-floating is-select">
                <label class="control-label">جنسیت</label>
                <select class="selectpicker form-control" name="sex">
                    <option value="MAN">مرد</option>
                    <option value="FEMALE">زن</option>
                </select>
            </div>


            <div class="remember">
                <div class="checkbox">
                    <label>
                        <input name="optionsCheckboxes" type="checkbox">
                        <a href="#">شرایط و ضوابط</a> سایت را قبول میکنم
                    </label>
                </div>
            </div>


            <button type="submit" class="btn btn-lg btn-primary full-width">ثبت نام   </button>


{{--            <div class="or"></div>--}}
{{--            <a href="#" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fa fa-facebook" aria-hidden="true"></i>ورود با فیس بوک</a>--}}

{{--            <a href="#" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fa fa-twitter" aria-hidden="true"></i>ورود با توییتر</a>--}}


            <p>شما یک حساب کاربری دارید؟ <a href="{{route("login.store")}}"> ورود!</a> </p>
        </form>
    </div>
</div>

    @endsection
    </body>

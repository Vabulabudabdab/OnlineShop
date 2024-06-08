@extends('layouts.main')

@section('content')
    <main class="overflow-hidden ">
        <!--Start Breadcrumb Style2-->
        <section class="breadcrumb-area" style="background-image: url({{asset('assets/images/inner-pages/breadcum-bg.png')}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content text-center wow fadeInUp animated">
                            <h2>Login</h2>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li><a href="index.html"><i class="flaticon-home pe-2"></i>Home</a></li>
                                    <li> <i class="flaticon-next"></i> </li>
                                    <li class="active">Login</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Breadcrumb Style2-->
        <!--Start Login Page-->
        <section class="login-page pt-120 pb-120 wow fadeInUp animated">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-9">
                        <div class="login-register-form"
                             style="background-image: url({{asset('assets/images/inner-pages/login-bg.png')}});">
                            <div class="top-title text-center ">
                                <h2>Забыли пароль?</h2>
                            </div>
                            <form action="{{route('password.restore')}}" method="POST" class="common-form">

                                {{csrf_field()}}

                                <div class="form-group"> <input type="email" class="form-control"
                                                                placeholder="Your email address" name="email"> </div>
                                <div class="form-group font-16">Введите свою почту!</div>
                                <button type="submit" class="btn--primary style2 mt-3">Восстановить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Login Page-->
    </main>
@endsection

@extends('layouts.main')

@section('content')
    <main class="overflow-hidden ">
        <!--Start Breadcrumb Style2-->
        <section class="breadcrumb-area" style="background-image: url({{asset('assets/images/inner-pages/breadcum-bg.png')}});">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content text-center wow fadeInUp animated">
                            <h2>Register</h2>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li><a href="index.html"><i class="flaticon-home pe-2"></i>Home</a></li>
                                    <li> <i class="flaticon-next"></i> </li>
                                    <li class="active">Register</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="login-page pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-9 wow fadeInUp animated">
                        <div class="login-register-form"
                             style="background-image: url('{{asset('assets/images/inner-pages/login-bg.png')}}');">
                            <div class="top-title text-center ">
                                <h2>Register</h2>
                                <p>Already have an account? <a href="{{route('login.get')}}">Log in</a></p>
                            </div>
                            <form action="{{route('register.post')}}" method="POST" class="common-form">

                                {{csrf_field()}}

                                <div class="form-group"> <input type="text" class="form-control" placeholder="Name" value="{{old('name')}}" name="name">
                                </div>
                                <div class="form-group"> <input type="email" class="form-control"
                                                                placeholder="Your Email" value="{{old('email')}}" name="email"> </div>
                                <div class="form-group eye">
                                    <div class="icon icon-1"> <i class="flaticon-hidden"></i></div> <input
                                        type="password" id="password-field" class="form-control" placeholder="Password" value="{{old('password')}}" name="password">
                                    <div class="icon icon-2 "><i class="flaticon-visibility"></i> </div>
                                </div>
                                <div class="checkk ">
                                    <div class="form-check p-0 m-0"> <input type="checkbox" id="remember"> <label
                                            class="p-0" for="remember"> Accept the Terms and Privacy Policy </label>
                                    </div>
                                </div> <button type="submit" class="btn--primary style2">Register </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

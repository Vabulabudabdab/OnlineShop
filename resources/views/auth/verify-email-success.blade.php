@extends('layouts.main')

@section('content')
    <section class="login-page pt-120 pb-120 wow fadeInUp animated">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-9">
                    <div class="login-register-form"
                         style="background-image: url({{asset('assets/images/inner-pages/login-bg.png')}});">
                        <div class="top-title text-center ">
                            @if(auth()->user()->email_verified_at !== null)
                                <h4>Вы уже подтвердили свою почту!</h4>
                            @else
                            <h4>Вы успешно подтвердили свою почту!</h4>
                            @endif
                            <p><a href="{{route('home')}}">На главную</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

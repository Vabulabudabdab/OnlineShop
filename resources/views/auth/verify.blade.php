@extends('layouts.main')

@section('content')
    <section class="login-page pt-120 pb-120 wow fadeInUp animated">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-9">
                    <div class="login-register-form"
                         style="background-image: url({{asset('assets/images/inner-pages/login-bg.png')}});">
                        <div class="top-title text-center ">
                            <h2>Не пришла ссылка?</h2>
                        </div>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn p-0 m-0 align-baseline text-success fs-3">{{ __('Click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

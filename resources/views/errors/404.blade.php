@extends('layouts.main')

@section('content')
    <div class="loader"><span>Karte...</span></div> <!-- ==========Preloader========== -->
    <!--===scroll bottom to top===--> <a href="#0" class="scrollToTop"><i class="flaticon-up-arrow"></i></a>
    <!--===scroll bottom to top===-->
    <!--Start Error Page-->
    <section class="error-page">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-12">
                    <div class="error-page__inner text-center pt-120 pb-120">
                        <div class="thumb wow fadeInUp animated"> <img src="assets/images/inner-pages/error.png" alt="">
                        </div>
                        <div class="error-page__content wow fadeInUp animated">
                            <h3>Oops! That page can’t be found.</h3>
                            <p>It looks like nothing was found at this location. Maybe try one of the links below or a
                                search?</p>
                            <div class="btn-box"> <a href="{{route('home')}}" class="btn--primary style2">Go Back</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

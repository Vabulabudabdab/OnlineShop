@extends('layouts.main')

@section('content')
    <main class="overflow-hidden ">
        <!--Start Breadcrumb Style2-->
        <section class="breadcrumb-area" style="background-image: url({{asset('assets/images/inner-pages/breadcum-bg.png')}});">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content text-center wow fadeInUp animated">
                            <h2>My Account </h2>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li><a href="{{route('home')}}"><i class="flaticon-home pe-2"></i>Home</a></li>
                                    <li> <i class="flaticon-next"></i> </li>
                                    <li class="active">My Account</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Breadcrumb Style2-->
        <!--Start My Account Page-->
        <section class="my-account-page pt-120 pb-120">
            <div class="container">
                <div class="row wow fadeInUp animated">
                    <!--Start My Account Page Menu-->
                    <div class="col-xl-3 col-lg-4">
                        <div class="d-flex align-items-start">
                            @if($user == null || $user->id !== auth()->user()->id)
                            @else
                            <div class="nav my-account-page__menu flex-column nav-pills me-3" id="v-pills-tab"
                                 role="tablist" aria-orientation="vertical">


                                <button class="nav-link active"
                                        id="v-pills-dashboard-tab" data-bs-toggle="pill" data-bs-target="#v-pills-dashboard"
                                        type="button" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">
                                    <span>About User</span>
                                </button>

                                <button class="nav-link" id="v-pills-orders-tab"
                                        data-bs-toggle="pill" data-bs-target="#v-pills-orders" type="button" role="tab"
                                        aria-controls="v-pills-orders" aria-selected="false">
                                    <span>Set Image</span>
                                </button>

                                <button class="nav-link" id="v-pills-downloads-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-downloads" type="button" role="tab"
                                        aria-controls="v-pills-downloads" aria-selected="false">
                                    <span> Downloads</span>
                                </button>

                                <button class="nav-link" id="v-pills-address-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-address" type="button" role="tab"
                                        aria-controls="v-pills-address" aria-selected="false"> <span> Address</span>
                                </button>

                                <button class="nav-link" id="v-pills-account-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-account" type="button" role="tab"
                                        aria-controls="v-pills-account" aria-selected="false"> <span> Account Details</span>
                                </button>

                                <br>
                                <a href="{{route('logout')}}"> <span> Logout </span></a>@endif </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="tab-content " id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel"
                                 aria-labelledby="v-pills-dashboard-tab">
                                <div class="tabs-content__single"><!--  About User -->
                                    @if($user == null)
                                        Данного пользователя не существует
                                    @else
                                        @if(auth()->user()->role_id == 1 && $user->name == auth()->user()->name)
                                            <a href="{{route('admin.index.page')}}">Admin Panel</a>
                                        @endif
                                        <h4><span>Привет, {{$user->name}} {{$user->id}}</span></h4>
                                        <img src="{{asset('storage/' . $user->image)}}" alt="" style="border-radius: 50%; width: 200px; height: 180px"/>
                                    <h5>From your account dashboard you can view your <span>Recent Orders, manage your
                                            shipping</span> and <span>billing addresses,</span> and edit your
                                        <span>Password and account details</span></h5>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-orders" role="tabpanel"
                                 aria-labelledby="v-pills-orders-tab"> <!--  Set Image -->

                                current image:

                                <img src="{{asset('storage/' . $user->image)}}" alt="" style="border-radius: 50%; width: 200px; height: 180px"/>

                                <form action="{{route('profile.set-image', $user->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="image">
                                    <button type="submit" class="btn-primary">Загрузить</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="v-pills-downloads" role="tabpanel"
                                 aria-labelledby="v-pills-downloads-tab">

                            </div>
                            <div class="tab-pane fade" id="v-pills-address" role="tabpanel"
                                 aria-labelledby="v-pills-address-tab">

                            </div>
                            <div class="tab-pane fade" id="v-pills-account" role="tabpanel"
                                 aria-labelledby="v-pills-account-tab">

                            </div>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End My Account Page-->
    </main>
@endsection

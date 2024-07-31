@extends('layouts.admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">Заказ</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index.page')}}">Главная</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        @if(!empty(Session::get('not_enough_money')))
            {{session('not_enough_money')}}
        @endif
        @if(!empty(Session::get('success_payment')))
            {{session('success_payment')}}
        @endif
        <!-- Register content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Текущий заказ</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{$order->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Название продукта</td>
                                        <td>{{$order->products->title}}</td>
                                    </tr>
                                    <tr>
                                        <td>Категория</td>
                                        <td>{{$order->products->categories->title}}</td>
                                    </tr>
                                    <tr>

                                    <tr>
                                        <td>Картинка товара</td>
                                        <td><img src="{{asset('storage/'. $order->products->image)}}" style="width: 175px; height: 215px;"/> </td>
                                    </tr>

                                    <tr>
                                        <td>Когда оформлен</td>
                                        <td>{{$order->created_at}}</td>
                                    </tr>

                                    <tr>
                                        <td>Состояние</td>
                                        <td style="color:{{'#' . $order->current_status->color}}">{{$order->current_status->title}}</td>
                                    </tr>
                                    @if($order->status == 2)

                                    <tr>
                                        <td>
                                            <form action="{{route('admin.orders.payment', $order->id)}}" method="post">
                                                {{csrf_field()}}
                                                <button class="btn-primary" type="submit">{{$order->products->price}}</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            {!! QrCode::generate(URL::current()); !!}
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection()

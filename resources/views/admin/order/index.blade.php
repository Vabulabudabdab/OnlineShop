@extends('layouts.admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Заказы</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Заказы</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Register content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <div class="col-md-1 mb-3">
                        @if(Route::has('admin.orders.create'))
                        <a href="{{route('admin.orders.create')}}" class="btn btn-block btn-primary">Добавить</a>
                        @else
                            <a href="" class="btn btn-block btn-primary" style="opacity: 0.5; cursor: default;">Добавить</a>
                        @endif
                    </div>
                    <div class="col-md-1 mb-3">
                        <a href="#" class="btn btn-block btn-primary w-100" style="opacity: 0.5; cursor: default;">Восстановить</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Текущие Заказы</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Кто заказал</th>
                                        <th>Название продукта</th>
                                        <th>Категория</th>
                                        <th>Цена</th>
                                        <th>Статус заказа</th>
                                        <th>Картинка</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->users->email}}</td>
                                            <td>{{$order->products->title}}</td>
                                            <td>{{$order->products->categories->title}}</td>
                                            <td>{{$order->products->price}}</td>

                                            <td style="color:{{'#'.$order->payments->color}};">{{$order->payments->title}}</td>

                                            <td><img src="{{asset('storage/' . $order->products->image)}}" style="max-width: 100px; max-height: 50px;"/></td>


{{--                                            <td class="text-center"><a--}}
{{--                                                    href="{{route('admin.products.show', $order->id)}}"><i--}}
{{--                                                        class="far fa-eye"></i></a></td>--}}
{{--                                            <td class="text-center"><a href="{{route('admin.products.edit', $order->id)}}"--}}
{{--                                                                       class="text-success"><i--}}
{{--                                                        class="fas fa-pencil-alt"></i></a></td>--}}
{{--                                            <td class="text-center">--}}
{{--                                                <form action="{{route('admin.products.delete', $order->id)}}" method="POST">--}}
{{--                                                    {{csrf_field()}}--}}
{{--                                                    @method('DELETE')--}}
{{--                                                    <button type="submit" class="border-0 bg-transparent">--}}
{{--                                                        <i class="fas fa-trash text-danger" role="button"></i>--}}
{{--                                                    </button>--}}
{{--                                                </form>--}}
{{--                                            </td>--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                {{ $orders->links()}}

                            </div>
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
@endsection

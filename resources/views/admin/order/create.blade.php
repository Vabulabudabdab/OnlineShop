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
                    <div class="col-10">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Заказать продукт</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Название продукта</th>
                                        <th>Категория</th>
                                        <th>Цена</th>
                                        <th>Картинка</th>
                                        <th>Заказать</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        @if($product->price < Auth::user()->balance) @endif
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->title}}</td>
                                            <td>{{$product->categories->title}}</td>
                                            <td>{{$product->price}}</td>
                                            <td><img src="{{asset('storage/' . $product->image)}}" style="max-width: 100px; max-height: 50px;"/></td>
                                            <td>
                                                <form action="{{route('admin.orders.store', $product->id)}}" method="POST">
                                                  {{csrf_field()}}
                                                  <button type="submit" class="border-0 bg-transparent">
                                                 <i class="fas fa-check text-danger" role="button"></i>
                                                </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                {{ $products->links()}}

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

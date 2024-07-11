@extends('layouts.admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Пополнение баланса</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index.page')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Пополнение баланса</li>
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
                    <div class="col-md-12">
                        <h5>Пополнение баланса</h5>
                        Ваш баланс: {{auth()->user()->balance}}
                        @if(Route::has('admin.payment.store'))
                        <form action="{{route('admin.payment.store')}}" method="post" class="w-25" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Выберите сумму</label>
                                <input type="number" min="1" class="form-control" placeholder="Сумма" name="replenishment">
                            </div>

                            <div class="form-group">
                                <label>Выберите пользователя</label>
                                <select class="select2" name="user_id"  data-placeholder="Выберите роли" style="width: 100%;">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Пополнить</button>
                        </form>
                        @else
                        <br>
                        Данная функция ещё не реализована
                        @endif
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection()

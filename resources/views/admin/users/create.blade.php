@extends('layouts.admin.layout')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Пользователи</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index.page')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Пользователи</li>
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
                        <h5>Добавление пользователя</h5>
                        @if(!empty(Session::get('error_create_user')))
                            {{Session::get('error_create_user')}}
                            {{Session::forget('error_create_user')}}
                        @endif

                        <form action="{{route('admin.users.create.store')}}" method="post" class="w-25" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Имя пользователя</label>
                                <input type="text" class="form-control" placeholder="Имя пользователя" name="name" value="{{old('name')}}">
                                @error('title')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Эл.Почта</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Добавить картинку</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image">
                                        <label class="custom-file-label">Выберите изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Права пользователя</label>
                                <select class="select2" name="role_id"  data-placeholder="Выберите роли" style="width: 100%;">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                                @error('roles')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Добавить пользователя</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection

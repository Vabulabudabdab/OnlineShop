@extends('admin.layouts.head')

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
                        <h5>Редактирование пользователя</h5>
                        <form action="{{route('admin.user.update', $user->id)}}" method="post" class="w-25">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Имя пользователя</label>
                                <input type="text" class="form-control" placeholder="Имя пользователя" name="name" value="{{$user->name}}">
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Эл.Почта</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{$user->email}}">
                                @error('email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Права пользователя</label>
                                <select class="select2" name="roles"  data-placeholder="Выберите роли" style="width: 100%;">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->role_name}}</option>
                                    @endforeach
                                </select>
                                @error('roles')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Редактировать</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection()

@extends('layouts.admin.layout')

@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">{{$user->name}}</h1>
                        <a href="{{route('admin.users.edit', $user->id)}}" class="text-success"><i class="fas fa-pencil-alt"></i></a>
                        <form action="{{route('admin.users.delete', $user->id)}}" method="post">
                            {{csrf_field()}}
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent" onclick="alert('Are you shore?')">
                                <i class="fas fa-trash text-danger" role="button"></i>
                            </button>
                        </form>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index.page')}}">Главная</a></li>
                            <li class="breadcrumb-item active">{{$user->name}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Register content -->
        @if(!empty(Session::get('success_create_user')))
            {{Session::get('success_create_user')}}
            {{Session::forget('success_create_user')}}
        @endif
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Текущий пользователь</h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{$user->id}}</td>
                                    </tr>

                                    <tr>
                                        <td>Image</td>
                                        <td><img src="{{asset('storage/' . $user->image)}}" alt="image" style="width: 200px; height: 100px"/></td>
                                    </tr>

                                    <tr>
                                        <td>Имя пользователя</td>
                                        <td>{{$user->name}}</td>
                                    </tr>

                                    <tr>
                                        <td>Email</td>
                                        <td>{{$user->email}}</td>
                                    </tr>

                                    <tr>
                                        <td>Права доступа</td>
                                        <td>{{$user->RoleTitle}}</td>
                                    </tr>

                                    <tr>
                                        <td>Статус блокировки</td>
                                        @if($user->banned_at != null && $user->banned_at >\Carbon\Carbon::now())
                                        <td class="text-danger">Заблокирован</td>
                                        @else
                                        <td class="text-success">Блокировка отсутствует</td>
                                        @endif
                                    </tr>

                                    </tbody>
                                </table>
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

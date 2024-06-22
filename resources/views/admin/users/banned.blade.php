@extends('layouts.admin.layout')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Заблокированные пользователи</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Заблокированные Пользователи</li>
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
                @if($users->count() > 0)
                <div class="form-group">
                <h4>Найти пользователя: </h4>
                    <form action="{{route('admin.users.search')}}" method="post">
                        @csrf
                        <input type="search" name="user_name" value="{{old('user_name')}}">
                        <button type="submit" class="btn-primary">Найти</button>
                    </form>
                </div>


                <h3 class="card-title">
                    @if(!empty(session('success_unban')))
                        {{session('success_unban')}}
                    @endif
                </h3>

                <br>

                <div class="row">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Текущие пользователи</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Имя пользователя</th>
                                        <th>Права доступа</th>
                                        <th>Заблокирован до</th>
                                        <th>Просмотр</th>
                                        <th>Изменить</th>
                                        <th>Удалить</th>
                                        <th>Разблокировать</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->RoleTitle}}</td>
                                            <td>{{$user->banned_at}}</td>

                                            <td class="text-center"><a href="{{route('admin.users.show', $user->id)}}"><i class="far fa-eye"></i></a></td>
                                            <td class="text-center"><a href="{{route('admin.users.edit', $user->id)}}" class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                            <td class="text-center">
                                                <form action="{{route('admin.users.delete', $user->id)}}" method="POST">
                                                    {{csrf_field()}}
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="fas fa-trash text-danger" role="button"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{route('admin.users.unban', $user->id)}}" method="POST">
                                                    {{csrf_field()}}
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="fas text-blue" role="button">Разблокировать</i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$users->links()}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                @else
                    <div class="form-group">
                        Заблокированные пользователи отсутствуют
                    </div>
                @endif
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection

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
                            <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Главная</a></li>
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

                    <div class="col-md-1 mb-3">
                        <a href="{{route('admin.users.create')}}" class="btn btn-block btn-primary">Добавить</a>
                    </div>
                    <div class="col-md-1 mb-3">
                        <a href="#" class="btn btn-block btn-primary w-100" style="opacity: 0.5; cursor: default;">Восстановить</a>
                    </div>
                </div>

                <form action="{{route('admin.users.search')}}" method="post">
                    @csrf
                    <input type="search" name="user_name" value="{{old('user_name')}}">
                    <button type="submit" class="btn-primary">Найти</button>
                </form>

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
                                        <th>Просмотр</th>
                                        <th>Изменить</th>
                                        <th>Удалить</th>
                                        <th>Заблокировать</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            @if(auth()->user()->id == $user->id)
                                                <td class="text-primary">Вы: {{$user->name}}</td>
                                            @else
                                                <td>{{$user->name}}</td>
                                            @endif
                                            <td>{{$user->RoleTitle}}</td>

                                            <td class="text-center"><a
                                                    href="{{route('admin.users.show', $user->id)}}"><i
                                                        class="far fa-eye"></i></a></td>
                                            <td class="text-center"><a href="{{route('admin.users.edit', $user->id)}}"
                                                                       class="text-success"><i
                                                        class="fas fa-pencil-alt"></i></a></td>
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
                                                @if($user->banned_at == null || $user->banned_at < \Carbon\Carbon::now())
                                                    <form action="{{route('admin.users.banned.post', $user->id)}}"
                                                          method="post">
                                                        {{csrf_field()}}
                                                        <input type="date" width="312" name="ban_date"/>

                                                        <button type="submit" class="btn-primary">Заблокировать</button>

                                                    </form>
                                                @elseif($user->banned_at > \Carbon\Carbon::now())
                                                    <div class="text-danger">Пользователь заблокирован</div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                {{ $users->links()}}

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

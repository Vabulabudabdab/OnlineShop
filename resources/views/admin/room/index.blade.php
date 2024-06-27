@extends('layouts.admin.layout')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Комнаты</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.rooms.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Комнаты</li>
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
                        <a href="{{route('admin.rooms.create')}}" class="btn btn-block btn-primary">Добавить</a>
                    </div>
                </div>

                @if(!empty(session('success_create_room')))
                    <div class="text-success">{{session('success_create_room')}}</div>
                @endif
                @if(!empty(session('success_delete_room')))
                    <div class="text-success">{{session('success_delete_room')}}</div>
                @endif

                <div class="row">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Текущие комнаты</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Название</th>
                                        <th>Создатель</th>
                                        <th>Статус</th>
                                        <th>Ссылка</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rooms as $room)
                                        <tr>
                                            <td>{{$room->id}}</td>
                                            <td>{{$room->name}}</td>
                                            <td>{{$room->ownerName->name}}</td>

                                            @if($room->status == 0)
                                                <td class="text-danger">{{$room->RoomStatus}}</td>
                                            @elseif($room->status == 1)
                                                <td class="text-success">{{$room->RoomStatus}}</td>
                                            @else
                                                <td>Room status can't be checked</td>
                                            @endif
                                            <td><a href="{{route('admin.rooms.show', $room->url)}}">Посетить</a></td>
                                            <td class="text-center">
                                                <form action="{{route('admin.rooms.delete', $room->id)}}" method="POST">
                                                    {{csrf_field()}}
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="fas fa-trash text-danger" role="button"></i>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                {{ $rooms->links()}}

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

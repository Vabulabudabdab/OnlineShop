@extends('layouts.admin.layout')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{$room->name}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.rooms.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">{{$room->name}}</li>
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
                                <h3 class="card-title">{{$room->name}}</h3>
                            </div>
                            <!-- /.card-header -->
                            @if(!empty(\Illuminate\Support\Facades\Session::get('success_create_room')))
                                {{session('success_create_room')}}
                            @endif

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

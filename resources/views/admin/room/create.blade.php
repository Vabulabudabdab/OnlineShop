@extends('layouts.admin.layout')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Комната</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index.page')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Комната</li>
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
                        <h5>Создание комнаты</h5>

                        <form action="{{route('admin.rooms.store')}}" method="post" class="w-25">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Название комнаты</label>
                                <input type="text" class="form-control" placeholder="Название комнаты" name="name" value="{{old('name')}}">
                            </div>

                            <div class="form-group">
                                <label>Описание</label>
                                <textarea id="summernote" name="description" >{{old('description')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Выберите статус группы</label>
                                <select class="select2" name="status" style="width: 100%;">
                                        <option value="0">Закрытая</option>
                                        <option value="1">Открытая</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Создать комнату</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection

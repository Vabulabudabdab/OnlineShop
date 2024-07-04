@extends('layouts.admin.layout')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Продукты</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index.page')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Продукты</li>
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
                        <h5>Добавление продукта</h5>

                        <form action="{{route('admin.products.store')}}" method="post" class="w-25" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Название продукта</label>
                                <input type="text" class="form-control" placeholder="Продукт" name="title" value="{{old('title')}}">
                            </div>

                            <div class="form-group">
                                <label>Цена продукта</label>
                                <input type="number" min="1" step="any" class="form-control" placeholder="Цена" name="price" value="{{old('price   ')}}">
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
                                <label>Категории</label>
                                <select class="select2" name="category_id" data-placeholder="Выберите категорию" style="width: 100%;">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Тэги</label>
                                <select class="select2" name="tag_ids[]"  multiple="multiple"  data-placeholder="Выберите тэги" style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Добавить продукт</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection

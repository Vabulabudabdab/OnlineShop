@extends('layouts.admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Посты</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index.page')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Посты</li>
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
                        <h5>Добавление категории</h5>
                        <div class="form-group">
                            <form action="{{route('admin.posts.store')}}" method="post" class="w-25" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <label>Название</label>
                                <input type="text" class="form-control" placeholder="Название поста" name="title"
                                       value="{{old('title')}}">
                                @error('title')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <!-- select -->
                        <div class="form-group w-25">
                            <label>Выберите категорию</label>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                        {{$category->id == old('category_id') ? ' selected' : ''}}>{{$category->title}}</option>
                                @endforeach

                            </select>
                            @error('category_id')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Тэги</label>
                            <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите тэги" style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option {{is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group w-25">
                            <label for="exampleInputFile">Добавить главную картинку</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="main_image">
                                    <label class="custom-file-label">Выберите изображение</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                            @error('main_image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-25">
                            <label for="exampleInputFile">Добавить превью</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_image">
                                    <label class="custom-file-label">Выберите изображение</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                            @error('preview_image')
                            <div class="text-danger">Это поле не может быть пустым</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Добавить описание</label>
                            <textarea id="summernote2" name="description">{{old('description')}}</textarea>

                            <label for="exampleInputFile">Добавить контент</label>
                            <textarea id="summernote" name="content">{{old('content')}}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Добавить пост</button>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection()

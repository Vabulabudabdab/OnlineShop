@extends('layouts.admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">{{$post->title}}</h1>
                        <a href="{{route('admin.posts.edit', $post->id)}}" class="text-success"><i class="fas fa-pencil-alt"></i></a>
                        <form action="{{route('admin.posts.delete', $post->id)}}" method="post">
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
                            <li class="breadcrumb-item active">{{$post->title}}</li>
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
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Текущий пост</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{$post->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Название</td>
                                        <td>{{$post->title}}</td>
                                    </tr>
                                    <tr>
                                        <td>Категория</td>
                                        <td>{{$post->categories->title}}</td>
                                    </tr>
                                    <tr>
                                        <td>Тэги</td>
                                        @foreach($post->tags as $tag)
                                            <td>{{$tag->title}}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>Описание</td>
                                        <td>{!! $post->description !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Контент</td>
                                        <td>{!! $post->content !!}</td>
                                    </tr>

                                    <tr>
                                        <td>Когда создан</td>
                                        <td>{{$post->created_at}}</td>

                                        <td>{{$post->created_at->diffForHumans()}}</td>
                                    </tr>

                                    <tr>
                                        <td>Превью - картинка</td>
                                        <td><img src="{{asset('storage/'. $post->preview_image)}}" style="width: 175px; height: 215px;"/> </td>
                                    </tr>

                                    <tr>
                                        <td>Основная - картинка</td>
                                        <td><img src="{{asset('storage/'. $post->main_image)}}" style="width: 175px; height: 215px;"/> </td>
                                    </tr>

                                    </tbody>
                                </table>
                                Комментарии к посту
                                @foreach($post->comments as $comment)
                                    <div class="form-group">
                                        <div class="comment">
                                            {{$comment->id}}
                                            <br>
                                            {{$comment->users->name}}
                                            <br>
                                            {{$comment->message}}
                                            <span class="right" style="float:right;">{{$comment->created_at->diffForHumans()}}</span>
                                            @foreach($comment->subComments as $subComment)
                                                <div class="comment">
                                                    Кому:{{$subComment->comment_id}}
                                                    <br>
                                                    От кого:{{$subComment->users->name}}
                                                    <br>
                                                    {{$subComment->message}}
                                                    <span class="right" style="float:right;">{{$subComment->created_at->diffForHumans()}}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
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
@endsection()

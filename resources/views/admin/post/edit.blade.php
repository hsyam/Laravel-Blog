@extends('admin.layouts.app')

@section('main-content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                New Post
                <small>Add new post in blog</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">Editors</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Post Info</h3>

                            @include('admin.layouts.msg')


                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{route('post.update' , $post->id )}}">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="box-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{old('title' , $post->title)}}" placeholder="Title">
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitle">Sub Title</label>
                                        <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{old('subtitle' , $post->subtitle)}}" placeholder="Sub Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug' , $post->slug)}}" placeholder="Post Slug">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <input type="file" id="image" name="image" value="{{old('image')}}">

                                    <p class="help-block">Post image.</p>
                                </div>

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="status" @if($post->status == 1) checked @endif> Publish
                                    </label>
                                </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Write Post Here

                                    </h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                                title="Collapse">
                                            <i class="fa fa-minus"></i></button>

                                    </div>
                                    <!-- /. tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body pad">

                <textarea class="textarea" name="body" placeholder="Place some text here"
                          style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('body' , $post->body)}}</textarea>

                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary" value="Submit">
                                <a href="{{route('post.index')}}" class="pull-right btn btn-warning">Back</a>

                            </div>
                        </form>
                    </div>


                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
@extends('admin.layouts.app')
@section('head-addons')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <small>Posts</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li><a href="#">Posts</a></li>
            </ol>
        </section>

    <!-- Main content -->
        <section class="content">
        @include('admin.layouts.msg')
        <!-- /.box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Posts</h3>
                    <a href="{{route('post.create')}}" class="pull-right btn btn-success">Add New</a>

                </div>
                <!-- /.box-header -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Posts</a></li>
                        <li><a href="#tab_2" data-toggle="tab" class="text-red">Trash</a></li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="box-body">
                                <table class="admintable table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>title</th>
                                        <th>SubTitle</th>
                                        <th>Slug</th>
                                        <th>Created at</th>
                                        <th>Edit</th>
                                        <th>Move to Trash</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->subtitle }}</td>
                                            <td>{{$post->slug }}</td>
                                            <td>{{$post->created_at }}</td>
                                            <td><a href="{{route('post.edit' , $post->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>
                                            <td><a href="{{route('post.softdelete', $post->id)}}">Move to Trash</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>S.No</th>
                                        <th>title</th>
                                        <th>SubTitle</th>
                                        <th>Slug</th>
                                        <th>Created at</th>
                                        <th>Edit</th>
                                        <th>Move to Trash</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane " id="tab_2">
                            <div class="box-body ">
                                <table  class="admintable table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>title</th>
                                        <th>SubTitle</th>
                                        <th>Slug</th>
                                        <th>Created at</th>
                                        <th>Restore</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($trash as $post)
                                        <tr>
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->subtitle }}</td>
                                            <td>{{$post->slug }}</td>
                                            <td>{{$post->created_at }}</td>
                                            <td><a href="{{route('post.restore', $post->id)}}">Restore</a></td>
                                            <td><a href="{{route('post.edit' , $post->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#delete-{{$post->id}}">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                                <div class="modal modal-danger fade" id="delete-{{$post->id}}" style="display: none;">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span></button>
                                                                <h4 class="modal-title">Danger Modal</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are You sure to Delete <strong>{{$post->title}}</strong></p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                                <form action="{{route('post.destroy' , $post->id)}}" method="post">
                                                                    {{csrf_field()}}
                                                                    {{method_field('DELETE')}}
                                                                    <input type="submit" class="btn btn-outline" name="submit" value="Delete">
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </td>
                                        </tr>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>S.No</th>
                                        <th>title</th>
                                        <th>SubTitle</th>
                                        <th>Slug</th>
                                        <th>Created at</th>
                                        <th>Restore</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.tab-pane -->

                    </div>
                    <!-- /.tab-content -->
                </div>

                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection

@section('footer-addons')
    <!-- DataTables -->
    <script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <script>
        $(function () {
            $('.admintable').DataTable()

        })
    </script>

@endsection
@extends('admin.layouts.app')
@section('head-addons')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <small>Tags</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li><a href="#">Tags</a></li>
            </ol>
        </section>

    <!-- Main content -->
        <section class="content">
        @include('admin.layouts.msg')
        <!-- /.box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Tags</h3>
                    <a href="{{route('tag.create')}}" class="pull-right btn btn-success">Add New</a>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="admintable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Tag Name</th>
                            <th>Slug</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($tags as $tag)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$tag->name}}</td>
                                <td>{{$tag->slug }}</td>

                                <td><a href="{{route('tag.edit' , $tag->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>

                                <td>
                                    <form method="post" id="delete-form-{{$tag->id}}" action="{{route('tag.destroy' , $tag->id)}}" style="display: none">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                    </form>
                                    <a href="{{route('tag.index')}}" onclick="

                                    if (confirm('Are you want to delete This')){
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{$tag->id}}').submit();
                                    }else {event.preventDefault();}
                                    "><span class="glyphicon glyphicon-trash"></span></a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>S.No</th>
                            <th>Tag Name</th>
                            <th>Slug</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                    </table>
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
            $('#admintable').DataTable()

        })
    </script>

@endsection
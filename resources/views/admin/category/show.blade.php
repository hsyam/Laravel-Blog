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
                <small>Categories</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li><a href="#">Categories</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        @include('admin.layouts.msg')
            <!-- /.box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Categories</h3>
                    <a href="{{route('category.create')}}" class="pull-right btn btn-success">Add New</a>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="admintable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Category Name</th>
                            <th>Slug</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($cats as $cat)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$cat->name}}</td>
                                <td>{{$cat->slug }}</td>
                                <td><a href="{{route('category.edit' , $cat->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>

                                <td>
                                    <a href="#" data-toggle="modal" data-target="#delete-{{$cat->id}}">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                    <div class="modal modal-danger fade" id="delete-{{$cat->id}}" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">Danger Modal</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are You sure to Delete <strong>{{$cat->name}}</strong></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                    <form action="{{route('category.destroy' , $cat->id)}}" method="post">
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
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>S.No</th>
                            <th>Category Name</th>
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
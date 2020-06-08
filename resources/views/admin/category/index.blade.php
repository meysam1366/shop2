@extends('admin.layouts.master')

@section('header')
    <!-- Plugins css -->
    <link href="/admin/plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/plugins/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/plugins/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/plugins/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css"/>
@stop

@section('content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Categories</h4>

                                <table id="basic-datatable" class="table dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Parent</th>
                                        <th>Title</th>
                                        <th>Logo</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $key => $category)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $category->parent == null ? 'ندارد' : $category->parent['title'] }}</td>
                                            <td>{{ $category->title }}</td>
                                            <td>
                                                <a href="{{ $category->logoLink() }}" target="_blank">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                            </td>
                                            <td>{{ $category->statusText() }}</td>
                                            <td>{{ $category->created_at }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('category.edit',['category' => $category->id]) }}"
                                                       class="btn btn-warning btn-sm mr-1">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('category.show',['category' => $category->id]) }}"
                                                       class="btn btn-success btn-sm mr-1">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <form
                                                        action="{{ route('category.destroy',['category' => $category->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            type="submit"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('are you sure?')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
            </div>
        </div>

    @stop

@section('footer')
    <!-- third party js -->
    <script src="/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin/plugins/datatables/dataTables.bootstrap4.js"></script>
    <script src="/admin/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="/admin/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="/admin/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="/admin/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="/admin/plugins/datatables/buttons.html5.min.js"></script>
    <script src="/admin/plugins/datatables/buttons.flash.min.js"></script>
    <script src="/admin/plugins/datatables/buttons.print.min.js"></script>
    <script src="/admin/plugins/datatables/dataTables.keyTable.min.js"></script>
    <script src="/admin/plugins/datatables/dataTables.select.min.js"></script>
    <script src="/admin/plugins/datatables/pdfmake.min.js"></script>
    <script src="/admin/plugins/datatables/vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="/admin/assets/pages/datatables-demo.js"></script>
@stop

@extends('admin.layouts.master')

@section('header')
    <!-- Plugins css -->
    <link href="/admin/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/plugins/select2/select2.min.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css"/>
    <!-- Dropify css -->
    <link href="/admin/plugins/dropify/dropify.min.css" rel="stylesheet" type="text/css"/>
    <!-- Plugins css -->
    <link href="/admin/plugins/quill/quill.core.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/plugins/quill/quill.bubble.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/plugins/quill/quill.snow.css" rel="stylesheet" type="text/css"/>
@stop

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Category Create</h4>
                                <p class="card-subtitle mb-4">Uses the HTML5 attribute "maxlength" to work.</p>

                                @include('admin.errors.error')

                                <form action="{{ route('category.store') }}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="parent_id">Parent</label>
                                        <select name="parent_id" id="parent_id" class="form-control">
                                            <option value="">یک گزینه را انتخاب کنید</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="logo">Logo</label>
                                        <input type="file" name="logo" id="logo" class="dropify">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                               value="{{ old('title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" cols="100" rows="20">
                                            {{ old('description') }}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <input type="checkbox" checked data-toggle="switchery" id="status" name="status"
                                               value="1" data-color="#df3554" data-size="small"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="menu_show">Menu Show</label>
                                        <input type="checkbox" checked data-toggle="switchery" id="menu_show" name="menu_show"
                                               value="1" data-color="#df3554" data-size="small"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Create Category">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <!-- Plugins js -->
    <script src="/admin/plugins/autonumeric/autoNumeric-min.js"></script>
    <script src="/admin/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="/admin/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="/admin/plugins/moment/moment.js"></script>
    <script src="/admin/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="/admin/plugins/select2/select2.min.js"></script>
    <script src="/admin/plugins/switchery/switchery.min.js"></script>
    <script src="/admin/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="/admin/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="/admin/plugins/ckeditor5/ckeditor.js"></script>

    <!--dropify-->
    <script src="/admin/plugins/dropify/dropify.min.js"></script>

    <!-- Init js-->
    <script src="/admin/assets/pages/fileuploads-demo.js"></script>

    <!-- Custom Js -->
    <script src="/admin/assets/pages/advanced-plugins-demo.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#description'), {
                // So is the rest of the default configuration.
                toolbar: [
                    'heading',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    'imageUpload',
                    'blockQuote',
                    'undo',
                    'redo'
                ],
                image: {
                    toolbar: [
                        'imageStyle:full',
                        'imageStyle:side',
                        '|',
                        'imageTextAlternative'
                    ]
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@stop

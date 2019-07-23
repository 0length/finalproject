@extends('layouts.admin.master')
@section('title')
- Admin Dashboard - Writte a Post
@endsection

@section('headerlib')
<link href="{{ asset('/assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/assets/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{ asset('/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{ asset('/assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{ asset('/assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/assets/plugins/bootstrap-tag/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/assets/plugins/dropzone/css/dropzone.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
<link href="{{ asset('/assets/plugins/summernote/css/summernote.css') }}" rel="stylesheet" type="text/css" media="screen">
<link href="{{ asset('/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" media="screen">
<link href="{{ asset('/assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" media="screen">
<link href="{{ asset('/pages/css/pages-icons.css') }}" rel="stylesheet" type="text/css">
<link class="main-stylesheet" href="{{ asset('/pages/css/pages.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')

<div class="page-content-wrapper ">
    <div class="content ">
            <div class="jumbotron" data-pages="parallax">
                    <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
                    <div class="inner">

                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/article">Article</a></li>
                    <li class="breadcrumb-item active"><a href="/article/create">Writte Article</a></li>
                    </ol>

                    <div class="row">
                    <div class="col-xl-7 col-lg-6 ">
                    </div>
                    <div class="col-xl-5 col-lg-6 ">
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    {{-- @foreach ($article as $item_article) --}}
<form role="form" action="/article/{{ $article->id }}" method="POST"  enctype="multipart/form-data">
    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}
    <div>
            <div class="col-md-12">

                    <div class="pull-right">
                            <div class="col-xs-12">

                            <button type="submit" "show-modal" class="btn btn-primary btn-cons"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Publish
                            </button>
                            </div>
                            </div>
                    <h5>Writte a New Post</h5>


                    <div class="form-group m-b-10">
                    <input name="title" value="{{ $article->title }}" type="text" placeholder="Title" class="form-control input-lg">
                    </div>
                    </div>

                    <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-select2 required">
                            <label class="">Subject</label>
                            <select name="subject" class="full-width select2-hidden-accessible" data-placeholder="Select Country" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                                @foreach ($subjects as $item_subject)
                            <option value="{{ $item_subject->id }}">{{ $item_subject->name }}</option>
                                @endforeach
                            </select>
                            </div>
                            </div>
                            <div class="form-group">
                                    <b>File Gambar</b><br/>
                                    <input type="file" name="image">
                                </div>
                            </div>


                                <div class="col-md-12">
                                    <textarea id="textbox" value="" name="content" class="form-control" rows="15" role="form" maxlength="5000">
                                            {{ $article->text_content }}
                                    </textarea>
                                </div>

                        </form>
                {{-- @endforeach --}}
    </div>



    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('/assets/plugins/jquery/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/plugins/modernizr.custom.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/plugins/popper/umd/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/plugins/jquery/jquery-easy.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/plugins/jquery-ios-list/jquery.ioslist.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/plugins/jquery-actual/jquery.actual.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/plugins/classie/classie.js') }}"></script>
<script src="{{ asset('/assets/plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/plugins/jquery-autonumeric/autoNumeric.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/plugins/dropzone/dropzone.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/plugins/jquery-inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/bootstrap-form-wizard/js/jquery.bootstrap.wizard.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/plugins/summernote/js/summernote.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('/assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/bootstrap-typehead/typeahead.bundle.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/bootstrap-typehead/typeahead.jquery.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/handlebars/handlebars-v4.0.5.js') }}"></script>



<script src="{{ asset('/pages/js/pages.js') }}"></script>


<script src="{{ asset('/assets/js/scripts.js') }}" type="text/javascript"></script>



<script src="{{ asset('/assets/js/form_elements.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/js/scripts.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/js/summerenable.js') }}" type="text/javascript"></script>
@endsection


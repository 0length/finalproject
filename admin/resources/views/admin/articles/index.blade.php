@extends('layouts.admin.master')
@section('title')
- Admin Dashboard - Index Page
@endsection
@section('headerlib')

<link href="{{ asset('/assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/assets/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css"
    media="screen" />
<link href="{{ asset('/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"
    media="screen" />
<link href="{{ asset('/assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css"
    media="screen" />
<link href="{{ asset('/assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('/assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}"
    rel="stylesheet" type="text/css" />
<link href="{{ asset('/assets/plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet"
    type="text/css" media="screen" />
<link href="{{ asset('/pages/css/pages-icons.css') }}" rel="stylesheet" type="text/css">


<link class="main-stylesheet" href="{{ asset('/pages/css/pages.css') }}" rel="stylesheet" type="text/css" />
<style>
    .data_table {
        table-layout: fixed;
    }
</style>
@endsection
@section('content')
<div class="page-content-wrapper ">

    <div class="content ">

        <div class="modal fade stick-up" id="addNewAppModal" tabindex="-1" role="dialog"
            aria-labelledby="addNewAppModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header clearfix ">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                class="pg-close fs-14"></i>
                        </button>
                        <h4 class="p-b-5"><span class="semi-bold">New</span> App</h4>
                    </div>
                    <div class="modal-body">
                        <p class="small-text">Create a new app using this form, make sure you fill them all</p>
                        <form role="form">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>name</label>
                                        <input id="appName" type="text" class="form-control"
                                            placeholder="Name of your app">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Description</label>
                                        <input id="appDescription" type="text" class="form-control"
                                            placeholder="Tell us more about it">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group form-group-default">
                                        <label>Price</label>
                                        <input id="appPrice" type="text" class="form-control" placeholder="your price">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-group-default">
                                        <label>Notes</label>
                                        <input id="appNotes" type="text" class="form-control" placeholder="a note">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button id="add-app" type="button" class="btn btn-primary  btn-cons">Add</button>
                        <button type="button" class="btn btn-cons" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>

        </div>

        <div class="jumbotron" data-pages="parallax">
            <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
                <div class="inner">

                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"><a href="/article">Article List</a></li>
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


        <div class=" container-fluid   container-fixed-lg bg-white">

            <div class="card card-transparent">
                <div class="card-header ">
                    <div class="card-title">Article
                    </div>
                    <div class="pull-right">
                        <div class="col-xs-12">
                            <a href="/article/create" <button id="show-modal" class="btn btn-primary btn-cons"><i
                                    class="fa fa-plus"></i> Add Article
                                </button></a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body">
                    <table class="table table-hover demo-table-search table-responsive-block data_table"
                        id="tableWithSearch">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Subject</th>
                                <th>Artilcle</th>
                                <th>Images</th>
                                {{-- <th>Published</th> --}}
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $item_article)

                            <tr>
                                <td class="v-align-middle semi-bold">
                                    <p>{{ $item_article->title }}</p>
                                </td>
                                <td class="v-align-middle"><a href="#"
                                        class="btn btn-tag">{{ $item_article->subject->name }}</a>
                                </td>
                                <td class="v-align-middle">
                                    {!! substr( $item_article->text_content ,0,100)."..." !!}
                                </td>
                                <td class="v-align-middle">
                                    <img src="{{ $item_article->img_url }}" alt="{{  $item_article->img_url }}"
                                        style="width : 100%; height: auto;">
                                </td>
                                {{-- <td class="v-align-middle">
                                    <p> {{ $item_article->published_at }}</p>
                                </td> --}}
                                <td class="v-align-middle">

                                    <div class="btn-group">
                                        <a class="btn btn-info text-white btn-sm"
                                            href="{{route('article.edit', ['id'=>$item_article->id])}}">Edit</a>
                                        <form onsubmit="return confirm('Delete this user student permanently?')"
                                            class="d-inline"
                                            action="{{route('article.destroy', ['id' => $item_article->id ])}}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                        </form>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


        <div class=" container-fluid   container-fixed-lg">

            <div class="card card-transparent">
                <div class="card-header ">
                    <div class="card-title">Subject
                    </div>
                    <div class="pull-right">
                        <div class="col-xs-12">
                            <a href="/subject/create" <button id="show-modal" class="btn btn-primary btn-cons"><i
                                    class="fa fa-plus"></i> Add Subject
                                </button></a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body">
                    <table class="table table-hover demo-table-dynamic table-responsive-block"
                        id="tableWithDynamicRows">
                        <thead>
                            <tr>
                                <th>Subject Name</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subjects as $item_subject)

                            <tr>
                                <td class="v-align-middle">
                                    <p>{{ $item_subject->name }}</p>
                                </td>
                                <td class="v-align-middle">
                                    <p>{{ $item_subject->description }}</p>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-info text-white btn-sm"
                                            href="{{route('article.edit', ['id'=>$item_article->id])}}">Edit</a>
                                        <form onsubmit="return confirm('Delete this user student permanently?')"
                                            class="d-inline"
                                            action="{{route('article.destroy', ['id' => $item_article->id ])}}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>




    <div class=" container-fluid  container-fixed-lg footer">
        <div class="copyright sm-text-center">
            <p class="small no-margin pull-left sm-pull-reset">
                <span class="hint-text">Copyright &copy; {{ date('Y') }} </span>
                <span class="font-montserrat">README</span>.
                <span class="hint-text">All rights reserved. </span>
                <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> <span class="muted">|</span>
                    <a href="#" class="m-l-10">Privacy Policy</a></span>
            </p>
            <p class="small no-margin pull-right sm-pull-reset">
                Hand-crafted <span class="hint-text">&amp; made with Love</span>
            </p>
            <div class="clearfix"></div>
        </div>
    </div>

</div>

@endsection


@section('script')
<script src="{{ asset('/assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
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
<script src="{{ asset('/assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('/assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js') }}"
    type="text/javascript"></script>
<script src="{{ asset('/assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js') }}" type="text/javascript">
</script>
<script src="{{ asset('/assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js') }}"
    type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('/assets/plugins/datatables-responsive/js/datatables.responsive.js') }}">
</script>
<script type="text/javascript" src="{{ asset('/assets/plugins/datatables-responsive/js/lodash.min.js') }}"></script>



<script src="{{ asset('/pages/js/pages.js') }}"></script>


<script src="{{ asset('/assets/js/scripts.js') }}" type="text/javascript"></script>



<script src="{{ asset('/assets/js/tables.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/js/scripts.js') }}" type="text/javascript"></script>

@endsection

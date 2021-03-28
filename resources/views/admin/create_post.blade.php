@extends('layouts.adminpanel')
@section('childpagecss')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/styles/default.min.css">
@endsection
@section('title','Create Post')
@section('container')
<!--begin::Row-->
<div class="row">
    <div class="col-lg-12">
        <form id="blogpost" method="POST" action="{{ route('blog.store') }}">
            @csrf
            <!--begin::Card-->
            <div></div>
            <div class="card card-custom example example-compact">

                <div class="card-header">
                    <h3 class="card-title">POST YOUR BLOG</h3>
                    <div class="card-toolbar">
                        <div class="example-tools justify-content-center">
                            <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Blog Post Title</label>
                        <input type="text" id="title" name="title" class="form-control form-control-lg" placeholder="Title" />
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-left col-lg-3 col-sm-12">{{route('blog.post')}}/</label>
                        <div class="col-lg-8 col-md-9 col-sm-12">
                            <input type="text" class="form-control money" id="slug" name="slug">
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- <div id="kt-ckeditor-3-toolbar"></div>

                        <div id="ktckeditor" name="body">

                        </div> -->

                        <textarea name="editor1" id="editor1">
                    This is my textarea to be replaced with CKEditor 4.
                    </textarea>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row">
                        <label class="col-form-label text-left col-lg-2 col-sm-12">Description</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <textarea name="description" id="description" class="form-control" id="kt_autosize_1" rows="3"></textarea>
                        </div>
                        <label class="col-form-label text-left col-lg-1 col-sm-12">Keywords</label>
                        <div class="col-lg-5 col-md-9 col-sm-12">
                            <input id="kt_tagify_4" class="form-control" name='keywords' placeholder='Type Keywords' value='' />
                        </div>
                    </div>

                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row">
                        <label class="col-form-label text-left col-lg-1 col-sm-12">Tags</label>
                        <div class="col-lg-6 col-md-9 col-sm-8">
                            <input id="kt_tagify_6" class="form-control" name='tags' placeholder='Type Keywords' value='' />
                        </div>
                        <label class="col-form-label text-left col-lg-1 col-sm-12">Category</label>
                        <div class=" col-lg-4 col-md-9 col-sm-8">
                            <select class="form-control select2" id="kt_select2_1" name="category">
                            <option value=""></option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Card-->
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-12 text-lg-right" id="kt_blockui_page_custom_text_1">
                        <button type="submit" class="btn btn-success">POST</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>

<!--end::Row-->
@endsection
@section('childpagejs')
<script src="{{asset('plugins/custom/ckeditor/ckeditor-document.bundle.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/highlight.min.js"></script>
<script src="{{asset('js/pages/crud/forms/widgets/create_blog.js')}}"></script>
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
@endsection
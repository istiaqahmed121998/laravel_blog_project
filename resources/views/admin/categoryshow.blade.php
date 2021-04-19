@extends('layouts.adminpanel')
@section('childpagecss')
@endsection
@section('title','Create Post')
@section('container')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Catagory Table</h5>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Category Table
                            <span class="d-block text-muted pt-2 font-size-sm">Datatable initialized from HTML table</span>
                        </h3>
                    </div>
                    
                </div>
                <div class="card-body">
                    <!--begin: Search Form-->
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="row align-items-center">
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                                <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                            </div>
                        </div>
                    </div>
                    <!--end::Search Form-->
                    <!--end: Search Form-->
                    <!--begin: Datatable-->
                    <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
                        <thead>
                            <tr>
                                <th title="Field #4">Category ID</th>
                                <th title="Field #2">Category Name</th>
                                <th title="Field #3">Category Slug</th>
                                <th title="Field #1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>
                                    <button type="button" data-id="{{$category->id}}" class="btn btn-primary edit" data-toggle="modal" data-target="#example">
                                        Edit
                                    </button>
                                </td>

                            </tr>@endforeach

                        </tbody>
                        <div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label>Category</label>
                                                <input id="editcategoryname" type="text" class="form-control" placeholder="Category Name">
                                                <span class="form-text text-muted">Please enter your Category name</span>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label>Category Slug</label>
                                                <input id="editcategoryslug" type="text" class="form-control" readonly>
                                                <span class="form-text text-muted">You don't need to write anything</span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                        <button id="update" type="button" class="btn btn-primary font-weight-bold" data-dismiss="modal">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

@endsection
@section('childpagejs')
<script src="{{asset('js/custom/category.js')}}"></script>
@endsection
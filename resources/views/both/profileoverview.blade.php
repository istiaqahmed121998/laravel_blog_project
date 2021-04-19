@extends('layouts.profile')
@section('content')
<div class="flex-row-fluid ml-lg-8">
        <!--begin::Row-->
        <div class="row">
            <div class="col-lg-12">
                <!--begin::List Widget 14-->
                <div class="card card-custom card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0">
                        <h3 class="card-title font-weight-bolder text-dark">Top five Posts</h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-2">
                        <!--begin::Item-->
                        @foreach($profile->posts->take('5')->sortByDesc('views') as $post)
                        <div class="d-flex flex-wrap align-items-center mb-10">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                <div class="symbol-label" style="background-image: url('assets/media/stock-600x400/img-17.jpg')"></div>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Title-->
                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$post->title}}</a>
                                <span class="text-muted font-weight-bold font-size-sm my-1">{{substr($post->metadescription,70)}}</span>
                                <span class="text-muted font-weight-bold font-size-sm">Category:
                                    <span class="text-primary font-weight-bold">{{$post->category->name}}</span></span>
                            </div>
                            <!--end::Title-->
                            <!--begin::Info-->
                            <div class="d-flex align-items-center py-lg-0 py-2">
                                <div class="d-flex flex-column text-right">
                                    <span class="text-dark-75 font-weight-bolder font-size-h4">{{$post->views}}</span>
                                    <span class="text-muted font-size-sm font-weight-bolder">Views</span>
                                </div>
                            </div>
                            <!--end::Info-->
                        </div>
                        @endforeach
                        <!--end::Item-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::List Widget 14-->
            </div>
            
        </div>
        <!--end::Row-->
    </div>
@endsection

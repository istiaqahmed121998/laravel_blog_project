@extends('layouts.profile')
@section('content')
<div class="flex-row-fluid ml-lg-8">
    <!--begin::Card-->
    <div class="card card-custom card-stretch">
        <!--begin::Header-->
        <div class="card-header py-3">
            <div class="card-title align-items-start flex-column">
                <h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
                <span class="text-muted font-weight-bold font-size-sm mt-1">Update your personal informaiton</span>
            </div>
            <div class="card-toolbar">
                <button type="submit" id="submitButton" class="btn btn-success mr-2">Save Changes</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->

        <!--begin::Body-->
        <form enctype=multipart/form-data id="infoup">
            <div class="card-body">
                <div class="row">
                    <label class="col-xl-3"></label>
                    <div class="col-lg-9 col-xl-6">
                        <h5 class="font-weight-bold mb-6">Customer Info</h5>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url(/media/users/blank.png)">
                            <div class="image-input-wrapper" style="background-image: url(../media/users/300_21.jpg)"></div>
                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen icon-sm text-muted"></i>
                                <input type="file" id="profile_avatar" name="profile_avatar" accept=".png, .jpg, .jpeg">
                                <input type="hidden" id="profile_avatar_remove" name="profile_avatar_remove">
                            </label>
                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>
                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove avatar">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>
                        </div>
                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control form-control-lg form-control-solid" type="text" id="firstname" name="firstname" value="{{explode(' ', $profile->user->name, 2)[0]}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                    <div class="col-lg-9 col-xl-6">
                        <input class="form-control form-control-lg form-control-solid" type="text" id="lastname" name="lastname" value="{{!empty(explode(' ', $profile->user->name, 2)[1]) ? explode(' ', $profile->user->name, 2)[1] : ''}}">
                    </div>
                </div>
                <div class="form-group row">

                    <label class="col-xl-3 col-lg-3 col-form-label">About Me</label>
                    <div class="col-lg-9 col-xl-6">
                        <textarea class="form-control form-control-solid" id="aboutme" name="aboutme" rows="3">{{$profile->about_me}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <label class="col-xl-3"></label>
                    <div class="col-lg-9 col-xl-6">
                        <h5 class="font-weight-bold mt-10 mb-6">Social Info</h5>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Facebook</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group input-group-lg input-group-solid">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="socicon-facebook text-primary mr-5"></i>www.facebook.com/</span>
                            </div>
                            <input type="text" class="form-control form-control-lg form-control-solid" name="facebook" value="{{$profile->facebook}}" placeholder="Facebook Link">
                        </div>
                        <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Instagram</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group input-group-lg input-group-solid">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="socicon-instagram text-danger mr-5"></i>www.instagram.com/</span>
                            </div>
                            <input type="text" class="form-control form-control-lg form-control-solid" name="instagram" value="{{$profile->instagram}}" placeholder="Instagram Link">
                        </div>
                        <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Twitter</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group input-group-lg input-group-solid">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="socicon-twitter text-primary mr-5"></i>www.twitter.com/</span>
                            </div>
                            <input type="text" class="form-control form-control-lg form-control-solid" name="twitter" value="{{$profile->twitter}}" placeholder="Twitter Link">
                        </div>
                        <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Website</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group input-group-lg input-group-solid">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="socicon-chrome text-danger mr-5"></i>
                                </span>

                            </div>
                            <input type="text" name="website" class="form-control form-control-lg form-control-solid" name="website" value="{{$profile->website}}" placeholder="Instagram Link">
                        </div>
                        <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Body-->

        <!--end::Form-->

    </div>
</div>
@endsection
@section('childpagejs')
@parent
<script src="{{asset('js/custom/profile.js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@stop
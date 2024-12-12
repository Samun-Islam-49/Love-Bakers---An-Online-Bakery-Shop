@extends('layouts.admin')

@section('admin_content')
<main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Website Setting</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Setting</li>
                    </ol>
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div>

    <div class="app-content">

        <!--begin::Container-->
        <div class="mt-3 container-fluid">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="card card-primary">
                        <!-- card-header -->
                        <div class="card-header">
                            <h3 class="card-title" style="font-weight: bold">Configuire Settings</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form action="{{ route('settings.update', $data ? $data->id : 0) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body" style="padding: 10px">

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="phone_one" style="font-weight: bold">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone_one" name="phone_one" placeholder="phone number ..." value="{{ optional($data)->phone_one }}" required>
                                </div>

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="phone_two" style="font-weight: bold">Aditional Phone Number (Optional)</label>
                                    <input type="tel" class="form-control" id="phone_two" name="phone_two" placeholder="phone number ..." value="{{ optional($data)->phone_two }}">
                                </div>



                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="main_mail" style="font-weight: bold">Main Email</label>
                                    <input type="email" class="form-control" id="main_mail" name="main_mail" placeholder="email address ..." value="{{ optional($data)->main_mail }}" required>
                                </div>

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="support_mail" style="font-weight: bold">Support Email</label>
                                    <input type="email" class="form-control" id="support_mail" name="support_mail" placeholder="email address ..." value="{{ optional($data)->support_mail }}" required>
                                </div>



                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="address" style="font-weight: bold">Shop Address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="address ..." value="{{ optional($data)->address }}" required>
                                </div>


                                <strong class="text-info">Social Link</strong>

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="facebook" style="font-weight: bold">Facebook</label>
                                    <input type="text" class="form-control" id="facebook" name="facebook" placeholder="profile link ..." value="{{ optional($data)->facebook }}">
                                </div>

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="instagram" style="font-weight: bold">Instagram</label>
                                    <input type="text" class="form-control" id="instagram" name="instagram" placeholder="profile link ..." value="{{ optional($data)->instagram }}">
                                </div>

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="twitter" style="font-weight: bold">TwitterX</label>
                                    <input type="text" class="form-control" id="twitter" name="twitter" placeholder="profile link ..." value="{{ optional($data)->twitter }}">
                                </div>

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="linkedin" style="font-weight: bold">Linkedin</label>
                                    <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="profile link ..." value="{{ optional($data)->linkedin }}">
                                </div>

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="youtube" style="font-weight: bold">YouTube</label>
                                    <input type="text" class="form-control" id="youtube" name="youtube" placeholder="channel link ..." value="{{ optional($data)->youtube }}">
                                </div>

                                <strong class="text-info">Logo and Favicon</strong>

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="logo" style="font-weight: bold">Main Logo</label>
                                    <input type="file" class="form-control" id="logo" name="logo"">
                                    <input type="hidden" class="form-control" id="old_logo" name="old_logo" value="{{ optional($data)->logo }}">
                                </div>

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="favicon" style="font-weight: bold">Favicon</label>
                                    <input type="file" class="form-control" id="favicon" name="favicon">
                                    <input type="hidden" class="form-control" id="old_favicon" name="old_favicon" value="{{ optional($data)->favicon }}">
                                </div>

                                <!-- Submit Button -->
                                <div class="card-footer text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->

    </div>
    <!--end::App Content-->

</main>
<!--end::App Main-->
@endsection

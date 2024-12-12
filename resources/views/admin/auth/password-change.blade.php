@extends('layouts.admin')

@section('admin_content')
<main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Password Change</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Password Change
                        </li>
                    </ol>
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div>

    <div class="app-content">

        <!--begin::Container-->
        <div class="mt-5 container-fluid" style="max-width: 850px;">
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="card card-primary">
                        <!-- card-header -->
                        <div class="card-header">
                            <h3 class="card-title" style="font-weight: bold">Change Password</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form action="{{ route('admin.update_password') }}" method="POST">
                            @csrf
                            <div class="card-body" style="padding: 10px">
                                <!-- Old Password Field -->
                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="old_password" style="font-weight: bold">Old Password</label>
                                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" name="old_password" placeholder="Enter your old password ...">
                                    @error('old_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- New Password Field -->
                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="new_password" style="font-weight: bold">New Password</label>
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" placeholder="Enter your new password ...">
                                    @error('new_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Confirm Password Field -->
                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="confirm_password" style="font-weight: bold">Confirm Password</label>
                                    <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" name="confirm_password" placeholder="Confirm your password ...">
                                    @error('confirm_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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

@extends('layouts.admin')

@section('admin_content')
<main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">SMTP Setting</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            SMTP Setting
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
                            <h3 class="card-title" style="font-weight: bold">Update SMTP</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form action="{{ route('smtp.update', $data ? $data->id : 0) }}" method="POST">
                            @csrf
                            <div class="card-body" style="padding: 10px">

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="mailer" style="font-weight: bold">Mail Mailer</label>
                                    <input type="text" class="form-control" id="mailer" name="mailer" placeholder="mailer ..." value="{{ optional($data)->mailer }}">
                                </div>

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="host" style="font-weight: bold">Mail Host</label>
                                    <input type="text" class="form-control" id="host" name="host" placeholder="host ..." value="{{ optional($data)->host }}">
                                </div>

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="port" style="font-weight: bold">Mail Port</label>
                                    <input type="text" class="form-control" id="port" name="port" placeholder="port ..." value="{{ optional($data)->port }}">
                                </div>

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="username" style="font-weight: bold">Mail Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="username ..." value="{{ optional($data)->username }}">
                                </div>

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="password" style="font-weight: bold">Meta Password</label>
                                    <textarea type="text" class="form-control" id="password" name="password" placeholder="password ...">{{ optional($data)->password }}</textarea>
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

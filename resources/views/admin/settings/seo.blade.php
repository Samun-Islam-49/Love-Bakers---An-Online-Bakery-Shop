@extends('layouts.admin')

@section('admin_content')
<main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">SEO Setting</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            SEO Setting
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
                            <h3 class="card-title" style="font-weight: bold">Update SEO</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form action="{{ route('seo.update', $data ? $data->id : 0) }}" method="POST">
                            @csrf
                            <div class="card-body" style="padding: 10px">

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="meta_title" style="font-weight: bold">Meta Title</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="meta title ..." value="{{ optional($data)->meta_title }}">
                                </div>

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="meta_tag" style="font-weight: bold">Meta Tag</label>
                                    <input type="text" class="form-control" id="meta_tag" name="meta_tag" placeholder="meta tag ..." value="{{ optional($data)->meta_tag }}">
                                </div>

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="meta_keyword" style="font-weight: bold">Meta Keyword</label>
                                    <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" placeholder="meta keyword ..." value="{{ optional($data)->meta_keyword }}">
                                </div>

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label for="meta_discription" style="font-weight: bold">Meta Discription</label>
                                    <textarea type="text" class="form-control" id="meta_discription" name="meta_discription" placeholder="meta discription ...">{{ optional($data)->meta_discription }}</textarea>
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

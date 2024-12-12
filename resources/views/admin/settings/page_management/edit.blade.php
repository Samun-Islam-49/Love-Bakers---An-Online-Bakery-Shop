@extends('layouts.admin')

@section('admin_content')
<main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Page Editor</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Page Editor
                        </li>
                    </ol>
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div>

    <div class="app-content">

        <!--begin::Container-->
        <div class="mt-3 container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <!-- card-header -->
                        <div class="card-header">
                            <h3 class="card-title" style="font-weight: bold">Edit Page</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form action="{{ route("page.update") }}" method="POST">
                            @csrf
                            <div class="card-body" style="padding: 10px">

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label class="mt-1 md-2" for="page_position" style="font-weight: bold">Page Position</label>
                                    <select class="form-control" id="page_position" name="page_position">
                                        <option value="1" {{ $data->page_position == 1 ? 'selected' : '' }}>Line One</option>
                                        <option value="2" {{ $data->page_position == 2 ? 'selected' : '' }}>Line Two</option>
                                    </select>
                                </div>

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <input type="hidden" class="form-control" id="page_id" name="page_id" value="{{ $data->id }}">
                                </div>

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label class="mt-1 md-2"  for="page_name" style="font-weight: bold">Page Name</label>
                                    <input type="text" class="form-control" id="page_name" name="page_name" value="{{ $data->page_name }}">
                                </div>

                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label class="mt-1 md-2"  for="page_title" style="font-weight: bold">Page Title</label>
                                    <input type="text" class="form-control" id="page_title" name="page_title" value="{{ $data->page_title }}">
                                </div>


                                <div class="form-group" style="margin: 5px 5px 10px 5px">
                                    <label class="mt-1 md-2"  for="page_description" style="font-weight: bold">Page Discription</label>
                                    <textarea id="page_description" name="page_description" style="display: none">
                                        {{ $data->page_description }}
                                    </textarea>
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


<!--begin::Custom Scripts for Create Page-->

<!--begin::Summernote Configure-->
<script>
    $(document).ready(function() {
        $('#page_description').summernote({
            minHeight: 200
        });
    });
</script>
<!--end::Summernote Configure-->

<!--end::Custom Scripts for Create Page-->
@endsection

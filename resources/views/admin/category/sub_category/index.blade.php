@extends('layouts.admin')

@section('admin_content')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">

        <!--begin::Container-->
        <div class="container-fluid">

            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Sub Category</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#subcat_modal">
                            + Add New
                        </button>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>

    <!--begin::App Content-->
    <div class="app-content">

        <!--begin::Container-->
        <div class="container-fluid">
                <div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">List of all sub-categories</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="subcat_table" class="mdl-data-table">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Sub-Category Name</th>
                                        <th>Sub-Category Slug</th>
                                        <th>Main Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data as $key=>$row)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->subcat_name }}</td>
                                        <td>{{ $row->subcat_slug }}</td>
                                        <td>{{ $row->category_name }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit_subcat_modal" onclick="fetchSubCatData('{{ $row->id }}')"><i class="fa-solid fa-pen-to-square"></i></button>
                                            <button class="btn btn-danger btn-sm" onclick="delete_subcat('{{ route('subcategory.delete', $row->id) }}')"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>

<!-- Vertically centered modal (Add New) -->
<div class="modal fade" id="subcat_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add New Subcategory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('subcategory.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="subcat_name" name="subcat_name" required>
                        <div class="form-text">Enter the name of subcategory.</div>
                    </div>
                    <div class="mb-3">
                        <select class="form-control" name="cat_id" required>
                            @foreach ($cat_data as $key => $row)
                                <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                            @endforeach
                        </select>
                        <div class="form-text">Please select parent category.</div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="Submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Vertically centered modal (Update) -->
<div class="modal fade" id="edit_subcat_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit SubCategory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('subcategory.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="edit_subcat_name" name="subcat_name" required>
                        <input type="hidden" class="form-control" id="edit_subcat_id" name="id">
                        <div class="form-text">Update your subcategory.</div>
                    </div>
                    <div class="mb-3">
                        <select id="edit_cat_id" class="form-control" name="cat_id" required>
                            @foreach ($cat_data as $key => $row)
                                <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                            @endforeach
                        </select>
                        <div class="form-text">Update parent category.</div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="Submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!--begin::Custom Scripts for index-->

<!-- Fetch data based on id -->
<script>
    function fetchSubCatData(id) {
        $.get("subcategory/fetch/" + id, function(data) {
            $("#edit_subcat_name").val(data.subcat_name);
            $("#edit_subcat_id").val(data.id);
            $("#edit_cat_id").val(data.cat_id);
        });
    }
</script>


<!--begin::DataTable Configure-->
<script>
    $(document).ready(function() {
        $('#subcat_table').DataTable({
            columnDefs: [
                { width: "50px", className: "text-center", targets: 0 },
                { width: "100px", className: "text-center", targets: 4 }
            ],
            fixedColumns: true
        });
    });
</script>
<!--end::DataTable Configure-->


<!-- Category Deletion Controller -->
<script>
    function delete_subcat(url) {
        Swal.fire({
            title: "Are you sure to delete the subcategory ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Delete",
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6"
        })
        .then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>


<!--end::Custom Scripts for index-->
@endsection

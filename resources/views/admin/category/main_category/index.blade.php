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
                    <h3 class="mb-0">Main Category</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#category_modal">
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
                            <h3 class="card-title">List of all categories</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="category_table" class="mdl-data-table">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Category Name</th>
                                        <th>Category Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data as $key=>$row)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->category_name }}</td>
                                        <td>{{ $row->category_slug }}</td>
                                        <td>
                                            <button id="edit_cat_btn" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit_category_modal" onclick="fetchData('{{ $row->id }}')"><i class="fa-solid fa-pen-to-square"></i></button>
                                            <button class="btn btn-danger btn-sm" onclick="delete_cat('{{ route('category.delete', $row->id) }}')"><i class="fa-solid fa-trash"></i></button>
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
<div class="modal fade" id="category_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="category_name" name="category_name" required>
                        <div class="form-text">This will be your new category.</div>
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
<div class="modal fade" id="edit_category_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('category.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="edit_category_name" name="category_name" required>
                        <input type="hidden" class="form-control" id="edit_category_id" name="id">
                        <div class="form-text">Update your category.</div>
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
    function fetchData(id) {
        $.get("category/fetch/" + id, function(data) {
            $("#edit_category_name").val(data.category_name);
            $("#edit_category_id").val(data.id);
        });
    }
</script>


<!--begin::DataTable Configure-->
<script>
    $(document).ready(function() {
        $('#category_table').DataTable({
            columnDefs: [
                { width: "50px", className: "text-center", targets: 0 },
                { width: "100px", className: "text-center", targets: 3 }
            ],
            fixedColumns: true
        });
    });
</script>
<!--end::DataTable Configure-->


<!-- Category Deletion Controller -->
<script>
    function delete_cat(url) {
        Swal.fire({
            title: "Are you sure to delete the category ?",
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

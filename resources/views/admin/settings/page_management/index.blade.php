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
                    <h3 class="mb-0">All Pages</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <a href="{{ route('page.create') }}" class="btn btn-primary">+ Add New</a>
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
                    <div class="mb-4 card">
                        <div class="card-header">
                            <h3 class="card-title">List of all pages</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="category_table" class="mdl-data-table">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Page Name</th>
                                        <th>Page Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data as $key=>$row)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $row->page_name }}</td>
                                        <td>{{ $row->page_title }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" onclick="window.location.href = '{{ route('page.edit', $row->id) }}';">
                                                <i class="fa-solid fa-pen-to-square"></i></button>
                                            <button class="btn btn-danger btn-sm" onclick="delete_page('{{ route('page.delete', $row->id) }}')"><i class="fa-solid fa-trash"></i></button>
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
    function delete_page(url) {
        Swal.fire({
            title: "Are you sure to delete the page ?",
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

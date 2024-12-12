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
                    <h3 class="mb-0">All Product List</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <button type="button" class="btn btn-primary">
                            <a href="{{ route('product.create') }}" style="text-decoration: none; color: white">
                                + Add New
                            </a>
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
                    <div class="mb-4 card">
                        <div class="card-header">
                            <h3 class="card-title">List of all products</h3>
                        </div>



                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Filters -->
                            <div class="p-2 row">
                                <!-- Category Filter -->
                                <div class="mb-2 form-group col-3">
                                    <label style="margin-bottom: 5px"><b>Category</b></label>
                                    <select class="form-control submitable" name="cat_id" id="cat_id">
                                        <option value="-1">All</option>
                                        @foreach($category as $row)
                                            <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Status filter -->
                                <div class="mb-2 form-group col-3">
                                    <label style="margin-bottom: 5px"><b>Status</b></label>
                                    <select class="form-control submitable" name="status" id="status">
                                        <option value="-1">All</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>

                                <!-- Daily Needs filter -->
                                <div class="mb-2 form-group col-3">
                                    <label style="margin-bottom: 5px"><b>Daily Needs</b></label>
                                    <select class="form-control submitable" name="daily_needs" id="daily_needs">
                                        <option value="-1">All</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <!-- Delivary Type filter -->
                                <div class="mb-2 form-group col-3">
                                    <label style="margin-bottom: 5px"><b>Delivery Type</b></label>
                                    <select class="form-control submitable" name="delivery_type" id="delivery_type">
                                        <option value="-1">All</option>
                                        <option value="1">Same Day</option>
                                        <option value="0">Next Day</option>
                                    </select>
                                </div>
                            </div>

                            <table id="product_table" class="mdl-data-table">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Thumbnail</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Status</th>
                                        <th>Daily Needs</th>
                                        <th>Delivery Type</th>
                                        <th>Sell Weight</th>
                                        <th>Sell Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

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


<!--begin::DataTable Configure-->
<script type="text/javascript">
    $(document).ready(function() {
        // Initialize DataTable
        var table = $('#product_table').DataTable({
            processing: true,
            serverSide: true,
            searchable: true,
            pageLength: 100,
            ajax: {
                url: "{{ route('product.index') }}",
                data: function(e) {
                    e.cat_id = $("#cat_id").val();
                    e.status = $("#status").val();
                    e.delivery_type = $("#delivery_type").val();
                    e.daily_needs = $("#daily_needs").val();
                }
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'thumbnail', name: 'thumbnail', className: 'text-center'},
                {data: 'name', name: 'name'},
                {data: 'code', name: 'code'},
                {data: 'category_name', name: 'category_name'},
                {data: 'subcat_name', name: 'subcat_name'},
                {data: 'status', name: 'status', className: 'text-center'},
                {data: 'daily_needs', name: 'daily_needs', className: 'text-center'},
                {data: 'delivery_type', name: 'delivery_type', className: 'text-center'},
                {data: 'sell_weight', name: 'sell_weight', className: 'text-center'},
                {data: 'sell_price', name: 'sell_price', className: 'text-center'},
                {data: 'action', name: 'action', orderable: true, searchable: true},
            ]
        });

        // Handle click event on the status icon and toggle the status
        $('#product_table').on('click', '.status-toggle', function() {
            var productId = $(this).data('id');
            var currentStatus = $(this).data('status');
            var newStatus = currentStatus == 1 ? 0 : 1;
            var type = $(this).data('type');

            $.ajax({
                url: "{{ route('product.toggleStatus') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: productId,
                    status: newStatus,
                    type: type
                },
                success: function(response) {
                    if (response.success) {
                        table.ajax.reload();
                    } else {
                        alert('Failed to update ' + type);
                    }

                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: response.alert_type,
                        title: response.message,
                        showConfirmButton: false,
                        timer: 3000
                    });
                },
                error: function() {
                    alert('Error in request');
                }
            });
        });


        //Handle product delete event
        $('#product_table').on('click', '.delete', function() {
            var productId = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: 'This action will delete the product permanently.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('product.delete', '') }}/" + productId,
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.success) {
                                table.ajax.reload();
                            }

                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: response.alert_type,
                                title: response.message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        },
                        error: function() {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Failed to delete product. Please try again.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });
        });
    });

    // submitable class call for every change
    $(document).on('change', '.submitable', function(){
        $('#product_table').DataTable().ajax.reload();
    });
</script>
<!--end::DataTable Configure-->

<!--end::Custom Scripts for index-->
@endsection

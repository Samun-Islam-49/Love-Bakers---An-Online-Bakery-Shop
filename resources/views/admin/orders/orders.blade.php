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
                    <h3 class="mb-0">Order List</h3>
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
                            <h3 class="card-title">List of all orders</h3>
                        </div>



                        <!-- /.card-header -->
                        <div class="card-body">

                            <!-- Filters -->
                            <div class="p-2 row">
                                <!-- Status filter -->
                                <div class="mb-2 form-group col-3">
                                    <label style="margin-bottom: 5px"><b>Status</b></label>
                                    <select class="form-control submitable" name="status" id="status">
                                        <option value="-1">All</option>
                                        <option value="0">Pending</option>
                                        <option value="2">Accepted</option>
                                        <option value="1">Completed</option>
                                    </select>
                                </div>
                            </div>

                            <table id="product_table" class="mdl-data-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">User Name</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Delivery Type</th>
                                        <th class="text-center">Address</th>
                                        <th class="text-center">Delivery Date-Time</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Action</th>
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
                url: "{{ route('order.index') }}",
                data: function(e) {
                    e.status = $("#status").val();
                }
            },
            columns: [
                {data: 'id', name: 'id', className: 'text-center'},
                {data: 'status', name: 'status', className: 'text-center'},
                {data: 'name', name: 'name', className: 'text-center'},
                {data: 'phone', name: 'phone', className: 'text-center'},
                {data: 'delivery_type', name: 'delivery_type', className: 'text-center'},
                {data: 'delivery_address', name: 'delivery_address'},
                {data: 'delivery_date', name: 'delivery_date'},
                {data: 'total', name: 'total', className: 'text-center'},
                {data: 'action', name: 'action', orderable: true, searchable: true},
            ]
        });

        // Handle click event on the status icon and toggle the status
        $('#product_table').on('click', '.status-toggle', function() {
            var id = $(this).data('id');
            var currentStatus = $(this).data('status');
            var newStatus = (currentStatus == 0 ? 2 : (currentStatus == 2 ? 1 : 0));

            $.ajax({
                url: "{{ route('order.toggleStatus') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    status: newStatus
                },
                success: function(response) {
                    if (response.success) {
                        table.ajax.reload();
                    } else {
                        alert('Failed to update');
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
            var id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: 'This action will delete the order permanently.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('order.delete', '') }}/" + id,
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
                                text: 'Failed to delete order. Please try again.',
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

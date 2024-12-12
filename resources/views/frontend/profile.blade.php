@extends('layouts.app')
@section('main_content')

<main class="main account display-search-result">
    <!-- Navigation -->
	<nav class="breadcrumb-nav">
		<div class="container">
			<ul class="breadcrumb">
				<li>
					<a href="{{ route('front.index') }}">
						<i class="fa-solid fa-house"></i>
					</a>
				</li>
				<li class="cst">Account</li>
			</ul>
		</div>
	</nav>

	<div class="pb-6 mt-4 mb-10 page-content">
		<div class="container">
			<h2 class="mb-3 title title-center mb-md-10 cstb">{{ $user->name }}</h2>
			<div class="mt-1 tab tab-vertical gutter-lg">

                <!-- Tablist -->
				<ul class="mb-4 nav nav-tabs col-lg-3 col-md-4" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" href="#dashboard"><span class="cstb">Dashboard</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#address"><span class="cstb">Account Details</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#addressBook"><span class="cstb">Address Book</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#orders"><span class="cstb">Orders</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="cstb">Logout</span></a>
					</li>
				</ul>

				<div class="tab-content col-lg-9 col-md-8">

                    <!-- Dashboard -->
					<div class="tab-pane active" id="dashboard">
						<p class="mb-0"> Hello <span class="cstb">{{ $user->name }}</span>,</p>
						<p class="mb-8"> From your account dashboard you can view your <a href="#orders" class="link-to-tab text-primary">recent orders</a>, manage your <a href="#addressBook" class="link-to-tab text-primary">address book</a>
							<br>and <a href="#address" class="link-to-tab text-primary">account details</a>.
						</p>
						<a href="{{ route('front.index') }}" class="btn btn-md btn-primary btn-rounded"><span class="cstb">Order Now</span></a>
					</div>

                    <!-- Orders -->
					<div class="tab-pane" id="orders">

                        @if($orders->count() == 0)
                            <div class="pt-5">
                                <center>
                                    <span class="cst" style="color:#e5494a">You don't have Any Orders !</span>
                                    <br>
                                    <br>
                                    <a class="btn btn-primary btn-md" href="{{ route('front.index') }}"><span class="cstb">Order Now</span></a>
                                </center>
                            </div>
                        @else
                            <div class="mt-3 row">
                                <center class="col-md-12">
                                    <h5 class="card-title text-uppercase cstb">Order List</h5>
                                </center>

                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="text-center order-table" id="orderTable">
                                            <thead>
                                                <tr>
                                                    <th class="pl-2 bg-primary" width="5%">ID</th>
                                                    <th class="pl-2 bg-primary" width="10%">Status</th>
                                                    <th class="pl-2 bg-primary" width="20%">Delivery Type</th>
                                                    <th class="pl-2 bg-primary" width="25%">Address</th>
                                                    <th class="pl-2 bg-primary" width="10%">Total</th>
                                                    <th class="pr-2 bg-primary" width="30%">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $data)
                                                    <tr id="tr-{{ $data->id }}">
                                                        <td class="order-number" width="5%">
                                                            <span class="cst">{{ $data->id }}</span>
                                                        </td>
                                                        <td class="order-number" width="10%">
                                                            <span class="cst">
                                                                {{ $data->status == 1 ? 'completed' : ($data->status == 2 ? 'accepted' : 'pending') }}
                                                            </span>
                                                        </td>
                                                        <td class="order-number" width="20%">
                                                            <span class="cst">
                                                                @if ($data->delivery_type)
                                                                    {{ 'Home Delivery' }}
                                                                @else
                                                                    {{ 'Store Pick-up' }}
                                                                @endif
                                                            </span>
                                                        </td>
                                                        <td class="order-number" width="25%">
                                                            <span class="cst">
                                                                @if ($data->delivery_type)
                                                                    {{ $data->delivery_address }}
                                                                @else
                                                                    {{ 'Rajshahi' }}
                                                                @endif
                                                            </span>
                                                        </td>
                                                        <td class="order-number" width="10%">
                                                            <span class="cstb">Tk. {{ $data->total }}</span>
                                                        </td>
                                                        <td class="order-action" width="30%" style="font-size: 1.20rem">
                                                            <a href="{{ route('customer.view-order', ['id' => $data->id]) }}" style="cursor:pointer;" class="btn btn-primary btn-link btn-underline">
                                                                <span class="cstb" style="font-size: 1.20rem">View</span>
                                                            </a>
                                                            @if ($data->status == 0)
                                                                &nbsp; <span class="cstb">|</span> &nbsp;
                                                                <a href="{{ route('customer.edit-order', ['id' => $data->id]) }}" style="cursor:pointer;" class="btn btn-secondary btn-link btn-underline">
                                                                    <span class="cstb" style="font-size: 1.20rem">Edit</span>
                                                                </a>

                                                                &nbsp; <span class="cstb">|</span> &nbsp;
                                                                <a href="/" class="btn btn-primary btn-link btn-underline" style="color:#b11a1a;" onclick="cancel_order(event, '{{ $data->id }}')">
                                                                    <span class="cstb" style="font-size: 1.20rem">Cancel</span>
                                                                </a>
                                                            @endif

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif

					</div>

                    <!-- Account Details -->
					<div class="tab-pane" id="address">
						<p class="mb-2 cst">The following information will be used on the checkout page by default. </p>
						<div class="row">
							<div class="mb-4 col-sm-6">
								<div class="card card-address">
									<div class="card-body">
										<h5 class="card-title text-uppercase cstb">Account Details</h5>
										<span class="cstb">Name : </span>
										<span class="bill-name cst">{{ $user->name }}</span>
										<br>
										<span class="cstb">Phone Number : </span>
										<span class="bill-phone cst">{{ $user->phone }}</span>
										<br>
										<span class="cstb">Email Address : </span>
										<span class="bill-email cst">{{ $user->email }}</span>
										<br>
									</div>
								</div>
							</div>
						</div>
					</div>

                    <!-- Address Book -->
					<div class="tab-pane" id="addressBook">
						<p class="mb-2 cst">The following information will be used on the checkout page by default. </p>
						<div class="row">
							<div class="col-sm-6">
								<div class="card card-address">
									<div class="pl-0 card-body">
										<h5 class="card-title text-uppercase cstb">Address List</h5>

                                        <!-- Deafult address -->
                                        @if (count($default_address) != 0)
                                            <fieldset class="mb-3">
                                                <legend class="text-primary cstb">Default Address</legend>
                                                <label class="cstb">Name: <span class="cst">{{ $default_address['name'] }}</span></label>
                                                <br />
                                                <label class="cstb">Phone: <span class="cst">{{ $default_address['phone'] }}</span></label>
                                                <br />
                                                <label class="cstb">Address: <span class="cst">{{ $default_address['address'] }}</span></label>
                                            </fieldset>
                                        @endif

									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="mb-4 col-sm-6">
								<a style="cursor:pointer" class="btn btn-md btn-primary btn-rounded customer-info-add">
                                    <span class="cstb">Add New Address</span> <i class="fa-solid fa-plus"></i>
								</a>

								<form action="{{ route('customer.add-address') }}" method="POST" class="mt-3 form customer-address-form" style="display:none">
                                    @csrf
									<div class="row">
										<div class="col-sm-12 cstb">
											<label>Name</label>
											<input type="text" name="name" id="name" class="mb-2 form-control" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" required>
										</div>
										<div class="col-sm-12 cstb">
											<label>Phone Number</label>
											<input type="tel" name="phone" id="phone" class="mb-2 form-control" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" required>
										</div>
										<div class="col-sm-12 cstb">
											<label>Address</label>
											<textarea name="address" id="address" cols="30" rows="3" class="mb-2 form-control" required></textarea>
										</div>
										<div class="mb-3 col-sm-12 cstb">
											<input type="checkbox" name="default" class="mb-2 custom-checkbox" id="default">
											<label for="default">Make It Default</label>
										</div>
									</div>
									<button type="submit" class="btn btn-primary btn-sm"><span class="cstb">SAVE ADDRESS</span></button>
								</form>
							</div>
						</div>
						<div class="mt-3 row">
							<div class="col-12">
								<div class="table-responsive">
									<table class="text-center order-table" id="addressTable">
										<thead>
											<tr>
												<th class="pl-2 bg-primary" width="15%">Name</th>
												<th class="pl-2 bg-primary" width="15%">Phone</th>
												<th class="pl-2 bg-primary" width="25%">Address</th>
												<th class="pr-2 bg-primary" width="45%">Actions</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($address_list as $data)
                                                <tr id="tr-{{ $data['id'] }}">
                                                    <td class="order-number" width="15%">
                                                        <span class="cst">{{ $data['name'] }}</span>
                                                    </td>
                                                    <td class="order-number" width="15%">
                                                        <span class="cst">{{ $data['phone'] }}</span>
                                                    </td>
                                                    <td class="order-number" width="25%">
                                                        <span class="cst">{{ $data['address'] }}</span>
                                                    </td>
                                                    <td class="order-action" width="45%">
                                                        <a style="cursor:pointer;" class="btn btn-primary btn-link btn-underline customer-info-update-{{ $data['id'] }}')" onclick="editAddress('{{ $data['id'] }}')">
                                                            <span class="cstb">Edit</span>
                                                        </a>
                                                        &nbsp;&nbsp; <span class="cstb">|</span> &nbsp;&nbsp;
                                                        <a href="/" class="btn btn-primary btn-link btn-underline" style="color:#b11a1a;" onclick="remove_address(event, '{{ $data['id'] }}')">
                                                            <span class="cstb">Delete</span>
                                                        </a>

                                                        <form action="{{ route('customer.update-address') }}" method="POST" class="mt-5 form customer-address-form-update-{{ $data['id'] }} bg-color" style="display:none">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $data['id'] }}">
                                                            <table class="special-table" style="background-color: transparent;">
                                                                <tr>
                                                                    <td style="padding:0 12px;">
                                                                        <label class="cstb" style="display:block;text-align:left;">Name</label>
                                                                        <input type="text" name="name" id="name" class="form-control" value="{{ $data['name'] }}" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" required>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="padding:0 12px;">
                                                                        <label class="cstb" style="display:block;text-align:left;">Phone</label>
                                                                        <input type="number" name="phone" id="phone" class="form-control" value="{{ $data['phone'] }}" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" required>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="padding:0 12px;">
                                                                        <label class="cstb" style="display:block;text-align:left;">Address</label>
                                                                        <textarea name="address" id="address" cols="30" rows="3" class="form-control" style="font-family: 'Coustard', serif;font-weight: 400;font-style: normal;" required>{{ $data['address'] }}</textarea>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="padding:0 12px; text-align: left;">
                                                                        <input type="checkbox" name="default" class="custom-checkbox" {{ ($data['default'] == 1) ? 'checked' : '' }} id="default-{{ $data['id'] }}">
                                                                        <label class="cstb" class="text-left" for="default-{{ $data['id'] }}" >Make It Default</label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: center;">
                                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                                            <span class="cstb">UPDATE ADDRESS</span>
                                                                        </button>
                                                                    </td>
                                                                </tr>

                                                            </table>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</main>

<style>
    #addressTable {
      border-collapse: collapse;
      width: 100%;
    }

    #addressTable th, td {
      padding: 8px;
    }

    #addressTable tr {
      height: 50px;
      max-height: 50px;
    }

    #addressTable > tbody > tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .special-table tr {
        background-color: transparent !important;
    }

    #addressTable th {
      color: white;
    }
</style>

<style>
    #orderTable {
      border-collapse: collapse;
      width: 100%;
    }

    #orderTable th, td {
      padding: 8px;
    }

    #orderTable tr {
      height: 50px;
      max-height: 50px;
    }

    #orderTable > tbody > tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #orderTable th {
      color: white;
    }
</style>

<script>
    setTimeout(() => {
        $(".msg_show").slideUp('');
    }, 5000);
    //customer details info edit
    $(document).on('click', '.customer-info-edit', function() {
        $(".customer-info-form").slideToggle();
    });
    //customer address info edit
    $(document).on('click', '.customer-info-add', function() {
        $(".customer-address-form").slideToggle();
    });
    //customer address info update
    $(document).on('click', '.customer-info-update', function() {
        $(".customer-address-form-update").slideToggle();
    });
    //customer address info edit
    function editAddress(id){
        $(".customer-address-form-update-"+id+"").slideToggle();
    }
    //url redirect
    var url = window.location.hash;
    if(url != ''){
        $('#dashboard').removeClass('active');
        $(''+url+'').addClass('active');
        $(''+url+'').addClass('in');
        $('a[href="#dashboard"]').removeClass('active');
        $('a[href="'+url+'"]').addClass('active');
        $(".customer-address-form").slideToggle();
        //url.substring(url.lastIndexOf('#')+1)
        //alert(url.substring(url.lastIndexOf('#')+1))
    }
</script>

<script>
    function remove_address(event, id) {
        // Prevent the default behavior (like form submission or anchor navigation)
        event.preventDefault();

        var address = document.getElementById('tr-' + id);

        Swal.fire({
            title: "Are you sure to delete the address ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Delete",
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6"
        })
        .then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('customer.remove-address') }}",
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: id
                    },
                    success: function(response) {
                        console.log('Address removed');
                        if (address) {
                            address.remove(); // Remove the address row from the table
                        }

                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: "success",
                            title: "Address deleted!",
                            showConfirmButton: false,
                            timer: 3000
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log('Error removing address:', error);
                    }
                });
            }
        });
    }

    function cancel_order(event, id) {
        // Prevent the default behavior (like form submission or anchor navigation)
        event.preventDefault();
        var order = document.getElementById('tr-' + id);

        Swal.fire({
            title: "Are you sure to cancel the order ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Cancel Order",
            confirmButtonColor: "#d33",
            cancelButtonText: "Back",
            cancelButtonColor: "#3085d6"
        })
        .then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('customer.cancel-order') }}",
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: id
                    },
                    success: function(response) {
                        console.log('Order canceled');
                        if (order) {
                            order.remove(); // Remove the address row from the table
                        }

                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: "success",
                            title: "Order canceled!",
                            showConfirmButton: false,
                            timer: 3000
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log('Error cancelling order:', error);
                    }
                });
            }
        });
    }
</script>

<script>
    $(document).ready(function () {
        $(".customer-address-form").slideUp();
    });
</script>

@endsection

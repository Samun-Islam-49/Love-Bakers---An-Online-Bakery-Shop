@extends('layouts.admin')

@section('admin_content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="mb-2 row">
          <div class="col-sm-6">
            <h1>Add New Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <!-- left column -->
                <div class="col-md-8">
                    <!-- General Form Elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Product Details</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <!-- Product Name -->
                                <div class="col-md-6">
                                    <div class="form-group" style="margin: 10px 0;">
                                        <label for="product_name" style="font-weight: bold;">
                                            Product Name <span style="color: red;">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="product_name" name="product_name" value="{{ old('product_name') }}" required>
                                        @error('product_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Product Code -->
                                <div class="col-md-6">
                                    <div class="form-group" style="margin: 10px 0;">
                                        <label for="product_code" style="font-weight: bold;">
                                            Product Code
                                        </label>
                                        <input type="text" class="form-control" id="product_code" name="product_code" value="{{ old('product_code') }}"  readonly>
                                        @error('product_code')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Category Dropdown -->
                                <div class="col-md-6">
                                    <div class="form-group" style="margin: 10px 0;">
                                        <label for="category" style="font-weight: bold;">
                                            Category <span style="color: red;">*</span>
                                        </label>
                                        <select class="form-control" id="category" name="category" required>
                                            <option selected disabled>Select category</option>
                                            @foreach ($cat as $key=>$row)
                                            <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Subcategory Dropdown -->
                                <div class="col-md-6">
                                    <div class="form-group" style="margin: 10px 0;">
                                        <label for="subcategory" style="font-weight: bold;">
                                            Subcategory <span style="color: red;">*</span>
                                        </label>
                                        <select class="form-control" id="subcategory" name="subcategory">
                                            <option selected disabled>Select subcategory</option>
                                        </select>
                                        @error('subcategory')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Tags Field -->
                                <div class="form-group" style="margin: 10px 0;">
                                    <label for="tags" style="font-weight: bold;">
                                        Tags
                                    </label>
                                    <input type="text" class="form-control tagsinput" id="tags" name="tags" data-role="tagsinput" value="{{ old('tags') }}" >
                                </div>

                                <!-- Sale Section -->
                                <div class="col-md-12">
                                    <div class="row">
                                        <!-- Sale type dropdown -->
                                        <div class="col-md-6">
                                            <div class="form-group" style="margin: 10px 0;">
                                                <label for="sale_type" style="font-weight: bold;">
                                                    Sale Type <span style="color: red;">*</span>
                                                </label>
                                                <select class="form-control" id="sale_type" name="sale_type">
                                                    <option value="0" selected>None</option>
                                                    <option value="1">Flash Sale</option>
                                                    <option value="2">Featured</option>
                                                    <option value="3">Flat Discount</option>
                                                    <option value="4">Special Discount</option>
                                                </select>
                                                @error('sale_type')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Sale discount Field -->
                                        <div class="col-md-6">
                                            <div class="form-group" style="margin: 10px 0;">
                                                <label for="sale_discount" style="font-weight: bold;">
                                                    Sale Discount (%)
                                                </label>
                                                <input type="number" class="form-control" id="sale_discount" name="sale_discount" value="{{ old('sale_discount') }}" >
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Short Description Field -->
                                <div class="form-group" style="margin: 10px 0;">
                                    <label for="short_description" style="font-weight: bold;">
                                        Short Description
                                    </label>
                                    <input type="text" class="form-control" id="short_description" name="short_description" value="{{ old('short_description') }}">
                                </div>

                                <!-- Ingredients Field -->
                                <div class="form-group" style="margin: 10px 0;">
                                    <label for="ingredients" style="font-weight: bold;">
                                        Ingredients
                                    </label>
                                    <input type="text" class="form-control tagsinput" id="ingredients" name="ingredients" data-role="tagsinput" value="{{ old('ingredients') }}" >
                                </div>

                                <!-- Description Field with Summernote -->
                                <div class="form-group" style="margin: 10px 0;">
                                    <label for="description" style="font-weight: bold;">
                                        Description
                                    </label>
                                    <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                                </div>

                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>


                <!-- right column -->
                <div class="col-md-4">
                    <div class="card card-success">

                        <div class="card-header">
                            <h3 class="card-title">Additional Details</h3>
                        </div>
                        <div class="card-body">

                            <!-- File Input for Image Upload -->
                            <div class="form-group" style="margin: 10px 0;">
                                <label for="product_image" style="font-weight: bold;">
                                    Main Thumbnail <span style="color: red;">*</span>
                                </label>
                                <input type="file" id="product_image" name="product_image" class="form-control dropify">
                                @error('product_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Container for file inputs -->
                            <div class="form-group" id="file-input-container">
                                <label style="font-weight: bold;">Add More Images</label>
                                <div class="mb-2 input-group">
                                    <input type="file" class="form-control" name="additional_images[]">
                                    <button type="button" class="btn btn-success" id="add-file-button" style="margin-left: 5px;">Add</button>
                                </div>
                            </div>

                            <!-- status and daily needs -->
                            <div class="col-md-12">
                                <div class="row">

                                    <!-- Product status -->
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin: 10px 0;">
                                            <label for="status" style="font-weight: bold;">
                                                Product Status
                                            </label>
                                            <br>
                                            <div style="display: block; margin-top: 5px;">
                                                <input type="checkbox" id="status" name="status" data-toggle="toggle" data-on="Active" data-off="Disable" data-onstyle="outline-success" data-offstyle="outline-secondary" data-width="120" checked>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Daily Needs -->
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin: 10px 0;">
                                            <label for="daily_needs" style="font-weight: bold;">
                                                Daily Needs
                                            </label>
                                            <br>
                                            <div style="display: block; margin-top: 5px;">
                                                <input type="checkbox" id="daily_needs" name="daily_needs" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="outline-success" data-offstyle="outline-danger" data-width="120">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- delivery and unit type -->
                            <div class="col-md-12">
                                <div class="row">

                                    <!-- Delivery Type -->
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin: 10px 0;">
                                            <label for="delivery_type" style="font-weight: bold;">
                                                Delivery Type
                                            </label>
                                            <br>
                                            <div style="display: block; margin-top: 5px;">
                                                <input type="checkbox" id="delivery_type" name="delivery_type" data-toggle="toggle" data-on="Same Day" data-off="Next Day" data-onstyle="outline-success" data-offstyle="outline-primary" data-width="120" checked>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Unit Type -->
                                    <div class="col-md-4">
                                        <div class="form-group" style="margin: 10px 0;">
                                            <label for="unit_type" style="font-weight: bold;">
                                                Unit Type
                                            </label>
                                            <br>
                                            <div style="display: block; margin-top: 5px;">
                                                <input type="checkbox" id="unit_type" name="unit_type" data-toggle="toggle" data-on="Weight" data-off="Unit" data-onstyle="outline-primary" data-offstyle="outline-info" data-width="120" checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- weight-price section -->
                            <div class="mt-2 form-group" id="weight-price-container">
                                <label style="font-weight: bold;">Sell Weight and Price <span style="color: red;">*</span></label>
                                <div class="mb-2 input-group">
                                    <input type="number" class="form-control" name="sell_weight[]" placeholder="Weight" required>
                                    <input type="number" class="form-control" name="sell_price[]" placeholder="Price" required>
                                    <button type="button" class="btn btn-success add-row" style="margin-left: 5px;">Add</button>
                                </div>
                                @error('price_weight')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        <!-- /.row -->
        <form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



    <!-- Bootstrap 5 Toggle configuiration -->
    <style>
        .form-group input[data-toggle="toggle"] {
            width: 100px;
        }
    </style>


    <!-- Initializing Bootstrap Tagsinput -->
    <script>
        $('.tagsinput').tagsinput();
    </script>


    <!-- Overriding Bootstrap Tagsinput Style -->
    <style>
        .bootstrap-tagsinput .tag {
            background-color: #007bff !important; /* Blue background */
            color: white !important; /* White text */
            font-size: 14px; /* Adjust font size as needed */
            padding: 3px 8px !important; /* Adjust padding for appropriate height */
            border-radius: 4px !important;
            margin-right: 4px !important;
            display: inline-block;
        }

        .bootstrap-tagsinput {
            width: 100% !important; /* Makes sure input field occupies full width */
            padding: 6px 8px; /* Adds padding around the tags */
            min-height: 38px; /* Ensure minimum height consistent with form fields */
            border: 1px solid #ced4da; /* Match Bootstrap's default input border */
            border-radius: 4px; /* Match Bootstrap's default input radius */
        }
    </style>


    <!-- Initializing summernote -->
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                height: 150, // Set editor height
                placeholder: 'Enter detailed product description here...'
            });
        });
    </script>


    <!-- Initializing Dropify -->
    <script>
        $(document).ready(function() {
            // Initialize Dropify on the file input
            $('#product_image').dropify({
                messages: {
                    default: 'Drag and drop a file here or click',
                    replace: 'Drag and drop or click to replace',
                    remove: 'Remove',
                    error: 'Ooops, something wrong happened.'
                }
            });
        });
    </script>


    <!-- Overriding Dropify Style -->
    <style>
        /* Customize Dropify text size and style */
        .dropify-wrapper .dropify-message p {
            font-size: 14px !important; /* Adjust font size */
            color: #555; /* Adjust text color if needed */
        }

        /* Optional: Change icons or layout */
        .dropify-wrapper .dropify-message .dropify-icon {
            font-size: 18px !important; /* Adjust icon size */
        }
    </style>


    <!-- Image Child Controller -->
    <script>
        // Add a new file input field with remove button
        document.getElementById('add-file-button').addEventListener('click', function () {
            const container = document.getElementById('file-input-container');

            // Create a new input group
            const inputGroup = document.createElement('div');
            inputGroup.classList.add('input-group', 'mb-2');

            // Create a new file input
            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.name = 'additional_images[]';
            fileInput.classList.add('form-control');

            // Create a remove button
            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.classList.add('btn', 'btn-danger');
            removeButton.innerHTML = '×';
            removeButton.style.marginLeft = '5px';

            // Append file input and remove button to the input group
            inputGroup.appendChild(fileInput);
            inputGroup.appendChild(removeButton);

            // Append the input group to the container
            container.appendChild(inputGroup);

            // Add event listener to remove button
            removeButton.addEventListener('click', function () {
                container.removeChild(inputGroup);
            });
        });
    </script>


    <!-- Sell weight price field controller -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('weight-price-container');

            container.addEventListener('click', (e) => {
                if (e.target.classList.contains('add-row')) {
                    const newRow = document.createElement('div');
                    newRow.classList.add('input-group', 'mb-2');
                    newRow.innerHTML = `
                        <input type="number" class="form-control" name="sell_weight[]" placeholder="Weight">
                        <input type="number" class="form-control" name="sell_price[]" placeholder="Price">
                        <button type="button" class="btn btn-danger remove-row" style="margin-left: 5px;">x</button>
                    `;
                    container.appendChild(newRow);
                } else if (e.target.classList.contains('remove-row')) {
                    e.target.parentElement.remove();
                }
            });
        });
    </script>


    <!-- Fetch Subcategory using ajax request -->
    <script>
        $(document).ready(function () {
            $('#category').change(function () {
                var categoryId = $(this).val();

                if (categoryId) {
                    $.ajax({
                        url: "fetch-subcat/" + categoryId,
                        type: 'GET',
                        success: function (data) {
                            $('#subcategory').empty().append('<option selected disabled>Select subcategory</option>')
                            .append('<option value="0">None</option>');
                            $.each(data, function (key, subcategory) {
                                $('#subcategory').append('<option value="' + subcategory.id + '">' + subcategory.subcat_name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#subcategory').empty().append('<option selected disabled>Select subcategory</option>');
                }
            });
        });
    </script>


    <!-- Dynamicly Generate Product Code -->
    <script>
        $(document).ready(function() {
            $('#subcategory').on('change', function() {
                var subcategoryId = $(this).val();
                var categoryId = $('#category').val();

                // Send AJAX request to fetch the product code based on selected category and subcategory
                $.ajax({
                    url: "{{ route('product.getProductCode') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        category_id: categoryId,
                        subcategory_id: subcategoryId
                    },
                    success: function(response) {
                        // Set the returned product code to the product_code input field
                        $('#product_code').val(response.product_code);
                    },
                    error: function() {
                        alert('Unable to fetch product code. Please try again.');
                    }
                });
            });
        });
    </script>



@endsection

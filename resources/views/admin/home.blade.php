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
                    <h3 class="mb-0">Admin Control Pannel</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Dashboard
                        </li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->

        </div>
        <!--end::Container-->
    </div>

    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">

            <!-- Info boxes -->
            <div class="row">



            </div> <!-- /.row -->


            <div class="row"> <!-- Start col -->

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6"> <!--begin::Row-->
                            <div class="col-12 col-sm-6 col-md-12">
                                <div class="info-box"> <span class="shadow-sm info-box-icon text-bg-primary"> <i class="fa-solid fa-users"></i> </span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Users</span>
                                        <span class="info-box-number">{{ $users->count() }}</span>
                                    </div> <!-- /.info-box-content -->
                                </div> <!-- /.info-box -->
                            </div>
                            <!-- /.col -->

                            <div class="col-12 col-sm-6 col-md-12">
                                <div class="info-box"> <span class="shadow-sm info-box-icon text-bg-danger"> <i class="fa-solid fa-clipboard-list"></i> </span>
                                    <div class="info-box-content"> <span class="info-box-text">Orders</span> <span class="info-box-number">{{ $orders->count() }}</span> </div> <!-- /.info-box-content -->
                                </div> <!-- /.info-box -->
                            </div> <!-- /.col -->

                            <!-- fix for small devices only --> <!-- <div class="clearfix hidden-md-up"></div> -->

                            <div class="col-12 col-sm-6 col-md-12">
                                <div class="info-box"> <span class="shadow-sm info-box-icon text-bg-success"> <i class="fa-solid fa-clipboard-check"></i> </span>
                                    <div class="info-box-content"> <span class="info-box-text">Completions</span> <span class="info-box-number">{{ $comp->count() }}</span> </div> <!-- /.info-box-content -->
                                </div> <!-- /.info-box -->
                            </div> <!-- /.col -->
                        </div> <!-- /.col -->

                        <div class="col-md-6"> <!--begin::Row-->
                            <div class="mb-3 info-box text-bg-success"> <span class="info-box-icon"> <i class="fa-solid fa-burger"></i> </span>
                                <div class="info-box-content"> <span class="info-box-text">Categories</span> <span class="info-box-number">{{ $cat->count() }}</span> </div> <!-- /.info-box-content -->
                            </div> <!-- /.info-box -->

                            <div class="mb-3 info-box text-bg-warning"> <span class="info-box-icon"> <i class="fa-solid fa-carrot"></i> </span>
                                <div class="info-box-content"> <span class="info-box-text">Subcategories</span> <span class="info-box-number">{{ $subcat->count() }}</span> </div> <!-- /.info-box-content -->
                            </div> <!-- /.info-box -->

                            <div class="mb-3 info-box text-bg-danger"> <span class="info-box-icon"> <i class="fa-solid fa-utensils"></i> </span>
                                <div class="info-box-content"> <span class="info-box-text">Products</span> <span class="info-box-number">{{ $products->count() }}</span> </div> <!-- /.info-box-content -->
                            </div> <!-- /.info-box -->
                        </div> <!-- /.col -->
                    </div>

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="info-box"> <span class="shadow-sm info-box-icon text-bg-info"> <i class="fa-solid fa-eye"></i> </span>
                                <div class="info-box-content"> <span class="info-box-text">Views</span> <span class="info-box-number">{{ $seo->views }}</span> </div> <!-- /.info-box-content -->
                            </div> <!-- /.info-box -->
                        </div>
                        <div class="col-md-3"></div>
                    </div>




                </div>

                <div class="col-md-4"> <!-- Info Boxes Style 2 -->
                    <div class="mb-4 card">
                        <div class="card-header">
                            <h3 class="card-title">Categories</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button>
                                <button type="button" class="btn btn-tool" data-lte-toggle="card-remove"> <i class="bi bi-x-lg"></i> </button>
                            </div>
                        </div> <!-- /.card-header -->
                        <div class="card-body"> <!--begin::Row-->
                            <div class="row">
                                <div class="col-12">
                                    <div id="pie-chart"></div>
                                </div> <!-- /.col -->
                            </div> <!--end::Row-->
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->

                    <!-- PRODUCT LIST -->
                </div> <!-- /.col -->

            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content-->
</main> <!--end::App Main--> <!--begin::Footer-->
<footer class="app-footer"> <!--begin::To the end-->
    <div class="float-end d-none d-sm-inline">Made with love by Samun Islam <i>&#x2764;&#xFE0F;</i>
    </div> <!--end::To the end--> <!--begin::Copyright--> <strong>
        Copyright &copy;2024&nbsp;
    </strong>
    <!--end::Copyright-->
</footer> <!--end::Footer-->




<script>
    // Get the chart data from PHP
    const chartData = @json($chart);

    // Extract series (counts) and labels dynamically
    const pieSeries = chartData.map(item => item.count); // Series values
    const pieLabels = chartData.map(item => item.label); // Labels

    // Function to generate random colors
    function generateRandomColor() {
        return `#${Math.floor(Math.random() * 16777215).toString(16).padStart(6, '0')}`;
    }

    // Generate a dynamic color array based on the number of labels
    const dynamicColors = pieLabels.map(() => generateRandomColor());

    const pie_chart_options = {
        series: pieSeries, // Dynamic series
        chart: {
            type: "donut",
        },
        labels: pieLabels, // Dynamic labels
        dataLabels: {
            enabled: false,
        },
        colors: dynamicColors, // Dynamic colors
    };

    const pie_chart = new ApexCharts(
        document.querySelector("#pie-chart"),
        pie_chart_options,
    );
    pie_chart.render();
</script>

@endsection

@extends('admin.includes.master-admin')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h3>Admin Dashboard! </h3>

        <div class="row" id="main" >
            <div class="col-sm-6 col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-television fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="text-total">{{ \App\TvDetail::count() }}</div>
                                <p class="titles">Total Channels!</p>
                            </div>
                        </div>
                    </div>
                    <a class="panel-footer detail-link clearfix btn-block" href="{{url('admin/tv')}}"><span class="pull-left">View All</span><span class="pull-right"><i class="fa fa-chevron-circle-right"></i>
                    </span>
                    </a><!-- END panel-->
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-sitemap fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="text-total">{{ \App\Category::count() }}</div>
                                <p class="titles">Total Category!</p>
                            </div>
                        </div>
                    </div>
                    <a class="panel-footer detail-link clearfix btn-block" href="{{url('admin/category')}}"><span class="pull-left">View All</span><span class="pull-right"><i class="fa fa-chevron-circle-right"></i>
                    </span>
                    </a><!-- END panel-->
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-link fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="text-total">{{ \App\Advertisement::count() }}</div>
                                <p class="titles">Total Ads!</p>
                            </div>
                        </div>
                    </div>
                    <a class="panel-footer detail-link clearfix btn-block" href="{{url('admin/ads')}}"><span class="pull-left">View All</span><span class="pull-right"><i class="fa fa-chevron-circle-right"></i>
                    </span>
                    </a><!-- END panel-->
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-group fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="text-total">{{ \App\Subscribers::count() }}</div>
                                <p class="titles">Total Subscribers!</p>
                            </div>
                        </div>
                    </div>
                    <a class="panel-footer detail-link clearfix btn-block" href="{{url('admin/subscribers')}}"><span class="pull-left">View All</span><span class="pull-right"><i class="fa fa-chevron-circle-right"></i>
                    </span>
                    </a><!-- END panel-->
                </div>
            </div>
            <div class="col-md-12">
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@stop

@section('footer')

@stop
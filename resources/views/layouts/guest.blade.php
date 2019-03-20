<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #3 for managed datatable samples" name="description" />
    <meta content="" name="author" />
    <style>
        table, th, td {
            font-family: Arial;font-family: Arial
            font-size: 15px;
            border: 1px solid black;
            border-collapse: collapse;
        }

        th {
            padding: 5px;
            text-align: left;
        }

        td {
            padding: 0.5px;
            text-align: left;
        }
    </style>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    @include('partials.head_home')
</head>
<!-- END HEAD -->

<body class="page-container-bg-solid">
<div class="page-wrapper">
    <div class="page-wrapper-row">
        <div class="page-wrapper-top">
            <!-- BEGIN HEADER -->
            <div class="page-header">
                <!-- BEGIN HEADER TOP -->
            @include('partials.header_guest')
            <!-- END HEADER TOP -->
                <!-- BEGIN HEADER MENU -->
            @include('partials.mainmenu_guest')
            <!-- END HEADER MENU -->
            </div>
            <!-- END HEADER -->
        </div>
    </div>
    <div >
        <div>
            <!-- BEGIN CONTAINER -->
            <div >
                <!-- BEGIN CONTENT -->
                <div >
                    <!-- BEGIN CONTENT BODY -->
                    <!-- BEGIN PAGE HEAD-->

                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->

                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->

                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->

                @yield('content')

            </div>
            <!-- END CONTENT -->


            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
    </div>
</div>
@include('partials.footer_guest')
@yield('script')
</body>

</html>
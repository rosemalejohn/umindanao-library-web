<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>{{ config('app.site_title') }} | @yield('page_title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="University of Mindanao Online Library Admin Web Application" name="description" />
    <meta content="Rosemale-John II C. Villacorta <rosemalejohn@gmail.com>" name="author" />

    <meta content="{{ csrf_token() }}" name="csrf-token" />

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Theme files -->

    <link href="/assets/global/components-md.css" id="style_components" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins-md.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/css/layout.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/css/custom.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    <link rel="shortcut icon" href="/img/logo.png" />
</head>

<body class="page-md page-header-fixed page-quick-sidebar-over-content">

    <div class="wrapper">

        @include('_partials.header')

        <div class="container-fluid">
            <div class="page-content">
                @if (session()->has('flash_notification.message'))
                    <div class="alert alert-{{ session('flash_notification.level') }}">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                        {!! session('flash_notification.message') !!}
                    </div>
                @endif
                @yield('content')
            </div>
            @include('_partials.footer')
        </div>
    </div>
    <a href="#index" class="go2top"><i class="icon-arrow-up"></i></a>

    <college-form-modal title="Add new college" target="newCollegeModal">
        <college-form slot="content"></college-form>
        <div slot="modal-footer" class="modal-footer">
            <button @click="submitForm('college')" class="btn btn-default">Save</button>
        </div>
    </college-form-modal>

    <course-form-modal title="Add new course" target="newCourseModal">
        <course-form slot="content"></course-form>
        <div slot="modal-footer" class="modal-footer">
            <button @click="submitForm('course')" class="btn btn-default">Save</button>
        </div>
    </course-form-modal>

    <resource-form-modal title="Add new resources" target="newResourceModal">
        <resource-form slot="content"></resource-form>
        <div slot="modal-footer" class="modal-footer">
            <button @click="submitForm('resources')" class="btn btn-default">Save</button>
        </div>
    </resource-form-modal>

    <!-- jQuery -->
    <script
        src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.js"></script>

    <!-- Theme scripts -->
    <script src="/assets/global/metronic.js" type="text/javascript"></script>
    <script src="/assets/admin/scripts/layout.js" type="text/javascript"></script>
    <script src="/assets/admin/scripts/index.js" type="text/javascript"></script>

    <!-- Pusher API -->
    <script src="https://js.pusher.com/3.2/pusher.min.js"></script>

    <script type="text/javascript" src="/js/app.js"></script>

    <!-- Initialize scripts -->
    <script>
    jQuery(document).ready(function() {
        Metronic.init();
        Layout.init();

        var currentPath = window.location.pathname;

        $('#dash-nav li').each(function(index, elem) {
            var link = $(this).children('a').attr('href');
            if (link == currentPath) {
                $(this).addClass('active');
            }
        })
    });
    </script>
</body>

</html>

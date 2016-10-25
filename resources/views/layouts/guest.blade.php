<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.site_title') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/Uniform.js/3.0.0/css/default.css" rel="stylesheet" type="text/css" />

    <link href="/assets/admin/css/login.css" rel="stylesheet" type="text/css" />

    <link href="/assets/global/components-md.css" id="style_components" rel="stylesheet" type="text/css" />

    <link href="/assets/global/plugins-md.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/css/layout.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/css/custom.css" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="/img/logo.png" />
</head>

<body class="page-md login">

    <div class="menu-toggler sidebar-toggler">
    </div>

    <div class="logo">
        <a href="/">
            <img width="100px;" src="/img/logo.png" alt="University of Mindanao logo" />
        </a>
    </div>
    <div class="content" style="margin-top: 10px;">

        @include('_partials.auth.login')

        @include('_partials.auth.passwords.email')

        @include('_partials.auth.register')

    </div>

    <div class="copyright">
        {{ date('Y') }} © {{ config('app.site_title') }}
    </div>

    <!-- jQuery -->
    <script
        src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>

    <!-- Theme scripts -->
    <script src="/assets/global/metronic.js" type="text/javascript"></script>
    <script src="/assets/admin/scripts/layout.js" type="text/javascript"></script>
    <script src="/assets/admin/scripts/index.js" type="text/javascript"></script>

    <script src="/assets/admin/scripts/login.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
    jQuery(document).ready(function() {
        Metronic.init();
        Layout.init();
        Login.init();
    });
    </script>
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>

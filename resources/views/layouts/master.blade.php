<!DOCTYPE html>
<html>
    <head>
        <meta name="format-detection" content="telephone=no">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
        <link rel="stylesheet" type="text/css" href='https://fonts.googleapis.com/css?family=Open+Sans'>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo asset('css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo asset('css/index.css'); ?>">
        <link rel="stylesheet" type="text/css" href="/js/vendor/jquery/plugins/select2/css/select2.min.css">
        <title>Madera</title>
    </head>
    <body>
        <div class="app">
            @yield('content')
        </div>

        <script type="text/javascript" src="<?php echo asset('js/vendor/jquery/jquery-2.1.4.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset('js/vendor/bootstrap/bootstrap.min.js'); ?>"></script>
        <script type="text/javascript"
                charset="utf-8"
                data-main="<?php echo asset('js/app/main'); ?>"
                src="<?php echo asset('js/vendor/require/require.js'); ?>"></script>
    </body>
</html>
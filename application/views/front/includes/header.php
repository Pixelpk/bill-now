<!DOCTYPE html>
<html lang="en">
<head>
    <?php $settings = get_settings(); ?>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/css/main.css" id="main_style">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/css/billnow.css" id="main_style">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2" rel="stylesheet">
    <link href="https://cdn.materialdesignicons.com/2.0.46/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/css/jquery-ui.min.css">
    <title><?php echo html_escape($settings->site_name) ?> - <?php echo html_escape($settings->site_title) ?></title>

    <meta name="author" content="<?php echo html_escape($settings->site_name) ?>">
    <meta name="description" content="<?php echo html_escape($settings->description) ?>">
    <meta name="keywords" content="<?php echo html_escape($settings->keywords) ?>">

    <link rel="icon" href="<?php echo base_url($settings->favicon) ?>">
    <script type="text/javascript">
        var csrf_token = '<?php echo $this->security->get_csrf_hash(); ?>';
        var token_name = '<?php echo $this->security->get_csrf_token_name();?>'
    </script>

    <script type="text/javascript">
        var _html = document.documentElement,
            isTouch = (('ontouchstart' in _html) || (navigator.msMaxTouchPoints > 0) || (navigator.maxTouchPoints));
        _html.className = _html.className.replace("no-js","js");
        _html.classList.add( isTouch ? "touch" : "no-touch");
    </script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/front/js/device.min.js"></script>

    <!-- google analytics -->
    <?php if (!empty($settings->google_analytics)): ?>
        <?php echo base64_decode($settings->google_analytics); ?>
    <?php endif ?>

    <?php if ($settings->enable_captcha == 1 && $settings->captcha_site_key != ''): ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    <?php endif; ?>
    <link href="<?php echo base_url() ?>assets/front/css/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/font-awesome.min.css">
    <style>
        *{
            font-family: "Poppins", Sans-serif;
        }
    </style>

</head>
<body>
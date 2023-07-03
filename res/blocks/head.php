<?php
$domain = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/';
?>


<?php
    $siteName = "Opulente'";
    $siteUrl = 'https://opulente.com/';
?>
<head>
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?=$siteName?>">
    <meta property="og:title" content="<?=$title?>">
    <meta property="og:description" content="<?=$describtion?>">
    <meta property="og:url" content="<?=$siteUrl?>">
    <meta property="og:locale" content="">
    <meta property="og:image" content="">

    <link rel="apple-touch-icon" sizes="180x180" href="<?=$domain?>/res/img/Favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=$domain?>/res/img/Favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=$domain?>/res/img/Favicons/favicon-16x16.png">

    <meta charset="UTF-8">
    <meta name="description" content="<?=$describtion?>">
    <meta name="keywords" content="<?=$keywords?>">
    <title><?=$title?></title>

    <link href="../res/css/style.css" rel="stylesheet" />

    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="google" content="notranslate" />
</head>
<body>
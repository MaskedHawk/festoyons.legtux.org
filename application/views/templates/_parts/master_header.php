<?php
/**
 * Created by PhpStorm.
 * User: maskedhawk
 * Date: 19/11/16
 * Time: 11:30
 */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $page_title;?></title>

    <link href="<?php echo site_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link rel="icon" href="<?php echo site_url('assets/img/fv.png');?>" />

    <link href="<?php echo site_url('assets/css/style.css');?>" rel="stylesheet">
    <?php echo $before_head;?>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">

    <script>
        $( function() {
            $( '#birth' ).datepicker({
                maxDate: '0',
                dateFormat: 'dd/mm/yy',
                yearRange: "1950:2017",
                changeYear: true,
                defaultDate: 0
            });
        } );

    </script>

    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular&subset=Latin,Cyrillic">
    <link href="https://fonts.googleapis.com/css?family=MedievalSharp" rel="stylesheet">

</head>
<body>
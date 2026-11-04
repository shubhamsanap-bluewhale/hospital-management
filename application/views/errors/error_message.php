<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>Page not found · BlueWhale HMS</title>
        <!--favican-->
        <link rel="icon" type="image/svg+xml" href="<?php echo base_url(); ?>backend/bluewhale/img/favicon.svg">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>backend/bluewhale/img/favicon-32.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/bootstrap/css/bootstrap.min.css">
        <style type="text/css">

            ::selection { background-color: #E13300; color: white; }
            ::-moz-selection { background-color: #E13300; color: white; }

            body {
                background-color: #fff;
                margin:0px; padding:0;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #333;
            }
            a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
            }
            h1 {
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 19px;
                font-weight: normal;
                margin: 0 0 14px 0;
                padding: 14px 15px 10px 15px;
            }
            code {
                font-family: Consolas, Monaco, Courier New, Courier, monospace;
                font-size: 12px;
                background-color: #f9f9f9;
                border: 1px solid #D0D0D0;
                color: #002166;
                display: block;
                margin: 14px 0 14px 0;
                padding: 12px 10px 12px 10px;
            }
            #body {
                margin: 0 15px 0 15px;
            }
            p.footer {
                text-align: right;
                font-size: 11px;
                border-top: 1px solid #D0D0D0;
                line-height: 32px;
                padding: 0 10px 0 10px;
                margin: 20px 0 0 0;
            }
            /*#container {
                    margin: 10px;
                    border: 1px solid #D0D0D0;
                    box-shadow: 0 0 8px #D0D0D0;
            }*/
            .margin-auto{margin:0 auto; display:block; text-align:center}
            .main-header { padding: 13px 0; min-height:50px; background: linear-gradient(90deg, #002FA7 0%, #1D4ED8 58%, #4F46E5 100%); }
            .bw-err-lockup { display:flex; align-items:center; justify-content:center; gap:10px; color:#fff; font-family:"Russo One", Arial, sans-serif; font-size:15px; letter-spacing:.08em; text-transform:uppercase; }
            .bw-err-lockup img { width:24px; height:24px; }
            .logo-lg img {width: 85%;}
            .imgresponsive{ width:100%; display:block; height:auto;}
            .space30{ padding:40px 0}
            .font-size2{font-size:20px;}
            .btn2{margin-top:20px; background:#1D4ED8; border:1px solid #1D4ED8; border-radius:8px; transition: all 0.2s ease;}
            .btn2:hover{background:#002FA7; border-color:#002FA7;}
        </style>
    </head>
    <body>
        <header class="main-header">
            <div class="container">
                <div class="row">
                    <div class="bw-err-lockup"><img src="<?php echo base_url(); ?>backend/bluewhale/img/logomark-white.svg" alt="" />BlueWhale HMS</div>
                </div>
            </div>
        </header>
        <div class="container text-center">
            <div class="row">
                <div class="space30">
                    <img src="<?php echo base_url(); ?>/backend/images/errorimg.png" class="img-responsive margin-auto" /></div>
                <h2 style="color:#002FA7">The page you were looking for doesn't exist.</h2>
                <p class="font-size2">You may have mistyped the address or the page may have moved.</p>
                <button onclick="history.go(-1);"  name="search"  class="btn btn2 btn-primary btn-sm checkbox-toggle">Back to Previous Page</button>
            </div>
        </div>
        <div id="container">
        </div>
    </body>
</html>



<!doctype html>
<html>
<head>
    <title>cInfomed</title>
    
    <!-- jQuery -->
    <link rel="stylesheet" href="https://bootswatch.com/5/cerulean/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Ajax  -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <!-- jQuery Máscara de input -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- jQuery mascara de select -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/estilo.css'); ?>">

    <style>
            ul.pagination li {
        display: inline;
    }

        ul.pagination li a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }

        .active {
            background-color: #4CAF50;
            color: white;
        }

        ul.pagination li a:hover:not(.active) {
            background-color: #ddd;
        }

        .centralize-results{
            text-align: center;
            line-height: 30px;
            height: 30px;
            
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/"></h1>cInfomed</a>                    
                </div>
        </nav>
    
    <div class="container">  
    <h1><?= esc($title) ?></h1>
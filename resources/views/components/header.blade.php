<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ url('favicon.ico') }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <title> Online Examination System </title>

    <style>

        .action-col{
            text-align: center;
        }
        body {
            font-family: 'Nunito', sans-serif;
        }
        th{
            padding-left: 100px;
        }

        .form-errors, .mandantory{
            color:red;
        }

        .form-container{
            border:2px solid green;
            margin-top: 100px;
            padding:40px 20%;
            border-radius: 1%;
            line-height: 2.0;
            box-shadow: 10px 10px 5px #aaaaaa;
        }

        .rows{
            padding-top:40px;
        }
        .btn-submit{
            padding-right: 30px;
            color:red;
        }
        .holder{
            border:2px solid green;
            margin-top: 50px;
            margin-bottom: 50px;
            border-radius: 1%;
            line-height: 2.0;
            padding: 50px;
            box-shadow: 10px 10px 5px #aaaaaa;
        }

        .switch-bar{
            text-align: center;
            font-size:1.5em;
            font-family: "Times New Roman", 'monospace',sans-serif;
            border:1px solid black;
            border-radius: 20px;
            margin-bottom:40px;
            color:Black;
        }
        .switch-bar:hover{
             background:white;
             font-family: "Times New Roman", 'monospace',sans-serif;
         }
        a:hover{
            text-decoration:none;
        }
        .question-holder{
            border:2px solid green;
            margin-top: 50px;
            margin-bottom: 50px;
            border-radius: 1%;
            line-height: 2.0;
            padding: 50px;
            padding-top: 10px;
            box-shadow: 10px 10px 5px #aaaaaa;
        }

    </style>
</head>
<body>

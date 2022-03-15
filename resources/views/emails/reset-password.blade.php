<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ url('favicon.ico') }}">
    <title> Online Examination System </title>
    <style>
        .btn-primary{color:#fff;background-color:#337ab7;border-color:#2e6da4}
        .btn-primary.focus,.btn-primary:focus{color:#fff;background-color:#286090;border-color:#122b40}
        .btn-primary:hover{color:#fff;background-color:#286090;border-color:#204d74}
        .holder{
            border:2px solid green;
            margin-top: 50px;
            margin-bottom: 50px;
            border-radius: 1%;
            line-height: 2.0;
            padding: 50px;
            box-shadow: 10px 10px 5px #aaaaaa;
        }
    </style>
</head>
<body>
<div class="container holder">
    <h2>Hello, {{$details['email']}}</h2>
    <h2><span style="color:red;"><em>Password Reset Request!!</em></span></h2>
    <h4>Please... Click on the below button to reset your password</h4>
    <a href="{{$details['link']}}"><button class="btn btn-primary">Reset Password</button></a>
</div>

</body>

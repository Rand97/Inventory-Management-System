


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-signin-client_id" content="1042287853967-l8jjmdj61t6jomsi2do4e5vaj0pml4a9.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://apis.google.com/api.js/">
    </script>
    <script src="https://kit.fontawesome.com/8b7a6f25ba.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
   <title>Sign In</title>
    <style>
        .btn{
            margin-left: 600px;
            margin-top: 300px;
        }
    </style>

    <script>
        function dframe(){
            $("#conash3D0").remove();
        }
    </script>

</head>
<body>
    


    <iframe src="https://www.google.com/accounts/Logout" name="myiframe" style="display:none" width="100px" height="100px"></iframe>
    
    
<a class="btn btn-primary" href="{{$lu}}" onclick="dframe()">Sign In</a>
    
</body>
</html>
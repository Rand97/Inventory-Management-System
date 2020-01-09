<?php 
    session_start();
    session_unset();
    session_destroy();
?>

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

    <title>Home</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            background-color: rgb(229, 235, 238);
            z-index: 1;
            }

        #pic{
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 30px;
            margin-top: 7px;
            
        }

        .br,.fa-bars,.myn,#pic,.bg{
            background-color: white;
        }

        .mynav{
            background-color: white !important;
            border-bottom: solid rgb(216, 208, 208) 1px;
            display: grid;
            grid-template-columns: 10fr 2fr 1fr ;
            
            
        }
        .b1{
            margin-left: 30px;
            margin-top: 7px;
            padding-left: 10px;
            padding-right: 25px;
            
        }
        .myn{
            margin-top: 8px;
            color: dodgerblue;
            font-family: Arial, Helvetica, sans-serif;
        }

        .menu{
            position: relative;
            width: 250px;
            border-radius: 0;
            display: inline-block;
            
            
        }
        .menu li:hover{
            cursor: pointer;
            background-color: dodgerblue;
        }
        
    </style>

    
    <script>
        function redirect() {
        window.location = 'http://localhost/inventry_system/public/';
        };

  </script>
   
</head>
<body>
            <nav class="mynav">
                <div class="bg b1">
                    <a href="http://localhost/inventry_system/public/logout/{{$user->id}}" class="btn btn-primary">Log out</a>
                </div>
                <div class="bg">
                    <p class="myn">{{$user->name}}</p>
                </div>
                <div class="bg">
                    <img src="{{$user->p_p}}" alt="profile_pic" id="pic">
                </div>
        
            </nav>

   
    
</body>
</html>


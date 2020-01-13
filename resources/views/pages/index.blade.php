<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<style>
    *{
        padding: 0;
        margin: 0;
    }
    .main{
        width: 100%;
        height: 100vh;
        background-image: url("/storage/cover_images/bg-2.jpg");
        background-repeat: no-repeat;
        background-size: 100% 100%;
        border-bottom: solid lightblue 7px;
           
    }
    .main::after{
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        z-index: 1;
        background-color: rgba(0, 0, 0, 0.6);
        box-shadow: inset 90px 100px 250px black;
    }
    
    
    
    .bt{
        position: relative;
        float: right;
        top: 20px;
        right: 20px;
        z-index: 3;
        
       padding: 8px;
       color: white;
       background-color: #FF0033;
       border: none;
       border-radius: 4px;
      

    }
    .bt:hover{
        opacity: 0.8;
    }
    .logo{
        border-radius: 50%;
        width: 90px;
        height: 90px;
        position: relative;
        top: 20px;
        left: 20px;
        z-index: 2;
      
    }
    .text{
        margin: auto;
        z-index: 2;
        position: relative;
        justify-content: center;
        top: 200px;
        text-align: center;
        width: 600px;
        
    }
    footer{
        width: 100%;
        height: 10vh;
        background-color: rgba(0, 0, 0, 0.8);
    }
    h1{
        color: white;
        font-family: Arial, Helvetica, sans-serif;
        line-height: 40px;
        
        opacity: 0.6;
    }
    @media (min-width: 576px) { ... }
    @media (min-width: 768px) { ... }
    @media (min-width: 992px) { ... }
    @media (min-width: 1200px) { ... }
    @media screen and  (max-width:959px){
        .main ,.text{
            width:100%;
        }
    }
    @media screen and (max-width: 750px) {
        h1{
            font-size:24px;
        }
    }
    @media screen and (max-width: 650px) {
        .main , .text{
            width:100%;
        }
        h1{
            font-size: 18px;
        }
        .bt{
            30%;
        }
        .logo{
            width: 80px;
            height: 80px;
        }
    }
   
</style>
<body>
    <div class="main">
        
        /* logo */
        <a href="{{route('login')}}" class="bt btn btn-primary">Sign In</a>
        <div class="text">
            <h1>Inventory Management System</h1>

        </div>

    </div>

   
    
</body>
</html>
{{-- @extends('layouts.app')

@section('content')
<a href="{{route('login')}}" class="btn btn-primary">Primary</button>
@endsection --}}

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
        background-image: url("bg-5.jpg");
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
        width: 60px;
        height: 60px;
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
        width: 500px;
        
    }
    footer{
        width: 100%;
        height: 10vh;
        background-color: rgba(0, 0, 0, 0.8);
    }
    h2{
        color: white;
        font-family: Arial, Helvetica, sans-serif;
        line-height: 40px;
        
        opacity: 0.6;
    }
   
</style>
<body>
    <div class="main">
        
        <img src="logo.png" class="logo" alt="">
        {{-- <a href="{{route('login')}}" class="bt btn btn-primary">Primary</button> --}}
        <button type="button" class="bt"   href="{{route('login')}}">Sign In</button>
        <div class="text">
            <h2>Department of Computer Engineering <br>Faculty of Engineering</h2>
        </div>
    </div>
</body>
</html>
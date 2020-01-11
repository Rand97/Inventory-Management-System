<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    
    <title>Document</title>

    <style>
        

        
        .card{
           
            background-repeat: no-repeat;
            background-size: 100% 100%;
            height: 280px;
            width: 280px;
            overflow-y:hidden;
            overflow-x: visible;
            border-radius: 10px;
            transition: 0.5s;
            position: relative;
            top: 20px;
            left: 20px;
            box-shadow: 0 3px 5px 1px rgba(0,0,0,0.2);
            transition: box-shadow 0.3s ease-in-out;
            
            
            
            
        }
        .card:hover{
            box-shadow: 0 5px 15px 2px rgba(0, 0, 0, 0.3);

        }
        
        .para{
            height: auto;
            background-color:white;
            position: relative;
            top:150px;
            text-align: center;
            padding: 5px;

            transition: box-shadow 0.3s ease-in-out;
        }
        
        
        p{
            color: black;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 25px;
        }

        .button-card{
           
            border-radius: 50%;
            background-color:#1561ad;
            width: 50px;
            height: 50px;
            overflow: hidden;
            border: none;
            position: relative;
            top: -27px;
            left: 65px;
        }
        h3{
            color: white;
            position: relative;
        }
        

        .add{
            width: 100%;
            height: 100%;
            top:2px;
            transition: top 0.5s;
            position: relative;
        }

        .add:hover{
            top:-90px;
        }
       h2{
           font-family: Arial, Helvetica, sans-serif;
           padding-bottom: 12px;
       }
    </style>
    
</head>
<body>
    @include('inc.navbar')
    <br><br>
    @if(isset($message))
    <div class="alert alert-warning  text-center">
        {{ $message }}
    </div>
    @endif

    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
    <div class="container">
        <div class="well">
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-4 col-sm-4">
                    <div class="card" style=" background-image: url('/storage/cover_images/robin-glauser-zP7X_B86xOg-unsplash.jpg');">
                        <div class="add">
                            <div class="para " >
                                <button class="btn button-card"  onclick="window.location.href = '/modules';"  style="text-align: center;"><div style="display: inline-block;"><h3>+</h3></div></button>
                                <h2>Modules & Sensors</h2>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla harum nostrum quas mollitia voluptas libero voluptates</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="card" style=" background-image: url('/storage/cover_images/robin-glauser-zP7X_B86xOg-unsplash.jpg');">
                        <div class="add">
                            <div class="para " >
                                <button class="btn button-card"  onclick="window.location.href = '/power';" style="text-align: center;"><div style="display: inline-block;"><h3>+</h3></div></button>
                                <h2>Passive Components</h2>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla harum nostrum quas mollitia voluptas libero voluptates</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="card" style=" background-image: url('/storage/cover_images/robin-glauser-zP7X_B86xOg-unsplash.jpg');">
                        <div class="add">
                            <div class="para " >
                                <button class="btn button-card"  onclick="window.location.href = '/accessories';" style="text-align: center;"><div style="display: inline-block;"><h3>+</h3></div></button>
                                <h2>Accessories</h2><br>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla harum nostrum quas mollitia voluptas libero voluptates</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="card" style=" background-image: url('/storage/cover_images/robin-glauser-zP7X_B86xOg-unsplash.jpg');">
                        <div class="add">
                            <div class="para " >
                                <button class="btn button-card"  onclick="window.location.href = '/passive';" style="text-align: center;"><div style="display: inline-block;"><h3>+</h3></div></button>
                                <h2>Passive Components</h2>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla harum nostrum quas mollitia voluptas libero voluptates</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="card" style=" background-image: url('/storage/cover_images/robin-glauser-zP7X_B86xOg-unsplash.jpg');">
                        <div class="add">
                            <div class="para " >
                                <button class="btn button-card" onclick="window.location.href = '/electro';" style="text-align: center;"><div style="display: inline-block;"><h3>+</h3></div></button>
                                <h2>Electromechanical</h2><br>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla harum nostrum quas mollitia voluptas libero voluptates</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="card" style=" background-image: url('/storage/cover_images/robin-glauser-zP7X_B86xOg-unsplash.jpg');">
                        <div class="add">
                            <div class="para " >
                                <button class="btn button-card"  onclick="window.location.href = '/other';" style="text-align: center;"><div style="display: inline-block;"><h3>+</h3></div></button>
                                <h2>Other</h2><br>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla harum nostrum quas mollitia voluptas libero voluptates</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
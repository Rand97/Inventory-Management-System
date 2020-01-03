<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Items</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <!-- title -->
        <h1>Add a new Item</h1><br>

        <!-- validation check -->
        @foreach($errors->all() as $myerror)
            <div class="alert alert-danger" role="alert">
                {{$myerror}}
            </div>
        @endforeach
        
        <!-- items form -->
        <form method="post" action="/saveItem">
            {{csrf_field()}}
            <div class="form-group">
                <label>Item</label>
                <input type="text" class="form-control" name="item"  placeholder="Add item">
            </div>
        
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Add item name">
            </div>

            <div class="form-group">
                <label>Quality</label>
                <input type="number" class="form-control" name="quality" placeholder="Add quality">
            </div>
        
            <div class="form-group">
                <label>Availability</label>
                <input type="text" class="form-control" name="availability" placeholder="Add availability">
            </div>
        
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" placeholder="Add description"></textarea>
            </div>
            <br>
            <br>
            <input type="submit" class="btn btn-primary" value="Enter" />
        </form>
    </div>
</body>
</html>
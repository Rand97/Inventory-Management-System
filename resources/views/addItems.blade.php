@extends('layouts.app')

@section('content')

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
        
            {{-- <div class="form-group">
                <label>Catagory</label>
                <input type="text" class="form-control" name="catagory" placeholder="Add item catagory">
            </div> --}}
            <div class="form-group">
                <label>Catagory</label>
                <select class="form-control" name='catagory'>
                  <option value="Modules & Sensors">Modules & Sensors</option>
                  <option value="Power Supplies">Power Supplies</option>
                  <option value="Accessories">Accessories</option>
                  <option value="Passive Components">Passive Components</option>
                  <option value="Electromechanical">Electromechanical</option>
                </select>
            </div>

            <div class="form-group">
                <label>Quality</label>
                <input type="number" class="form-control" name="quality" placeholder="Add quality">
            </div>
        
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" placeholder="Add description"></textarea>
            </div>
            <br>
            <br>

            <input type="submit" class="btn btn-primary" value="Save" />
        </form>
 @endsection
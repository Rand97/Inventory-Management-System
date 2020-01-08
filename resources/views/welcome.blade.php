@extends('layouts.app')

@section('content')
@if(isset($message))
    <div class="alert alert-warning  text-center">
        {{ $message }}
    </div>
    @endif
    
    <div class="products-section container">
        <div class="sidebar text-center">
            <h1>Catagories</h1>  
            <ul class="list-group">
                <li class="list-group-item list-group-item-success list-group-item-action"><a href="/modules"><h3>Modules & Sensors</h3></a></li>
                <li class="list-group-item list-group-item-success list-group-item-action"><a href="/power"><h3>Power Supplies</h3></a></li>
                <li class="list-group-item list-group-item-success list-group-item-action"><a href="/accessories"><h3>Accessories</h3></a></li>
                <li class="list-group-item list-group-item-success list-group-item-action"><a href="/passive"><h3>Passive Components</h3></a></li>
                <li class="list-group-item list-group-item-success list-group-item-action"><a href="/electro"><h3>Electromechanical</h3></a></li>
                <li class="list-group-item list-group-item-success list-group-item-action"><a href="/items" ><h3 style="color:black">All</h3></a></li>
            </ul>
        </div>
    </div>
    
@endsection
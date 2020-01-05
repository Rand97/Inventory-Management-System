@extends('layouts.app')

@section('content')

       
    <div class="products-section container">
        <div class="sidebar text-center">
            <h1>Catagories</h1>  
            <ul class="list-group">
                <li class="list-group-item list-group-item-success"><a href="/modules"><h3>Modules & Sensors</h3></a></li>
                <li class="list-group-item list-group-item-success"><a href="/power"><h3>Power Supplies</h3></a></li>
                <li class="list-group-item list-group-item-success"><a href="/accessories"><h3>Accessories</h3></a></li>
                <li class="list-group-item list-group-item-success"><a href="/passive"><h3>Passive Components</h3></a></li>
                <li class="list-group-item list-group-item-success"><a href="/electro"><h3>Electromechanical</h3></a></li>
                <li class="list-group-item list-group-item-success"><a href="/items" ><h3 style="color:black">All</h3></a></li>
            </ul>
        </div>
    </div>
    
@endsection
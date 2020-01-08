@extends('layouts.app')

@section('content')
    <br><br>
    <div class="well">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <img style="width: 100%" src="/storage/cover_images/{{$randomData->cover_image}}" />
            </div>
            <div class="col-md-8 col-sm-8">
                <h1>{{$randomData->item}}<br><small>({{$randomData->catagory}})</small></h1>
                <p>{{$randomData->description}}</p>
                @if($randomData->quality==0)
                    <a href="#" class="btn btn-danger btn-lg" role="button">Not Available</a>
                @else
                    <a href="#" class="btn btn-primary btn-lg" role="button">Available</a>
                @endif
            </div>
        </div>
    </div>     
@endsection
@extends('layouts.appnav')

@section('content')
    <!-- search bar null error -->
    @if(isset($success))
        <div class="alert alert-warning  text-center">
            {{ $success }}
        </div>
    @endif

    <br><br><br>
    <div class="well">
        <div class="row">
            <div class="col-md-4 col-sm-4" style="border: 1px solid black;">
                <img style="width: 100%;" src="/storage/cover_images/{{$randomData->cover_image}}" />
            </div>
            <div class="col-md-8 col-sm-8">
                <h1>{{$randomData->item}}<br><small>({{$randomData->catagory}})</small></h1>
                <p>{{$randomData->description}}</p>
                @if($randomData->quality==0)
                    <a href="#" class="btn btn-danger btn-lg" role="button">Not Available</a>
                @else
                    <a href="#" class="btn btn-primary btn-lg" role="button" style="display: inline-block">Available</a>
                    {{-- <h3>Quality = {{$randomData->quality}}</h3> --}}
                @endif
            </div>
        </div>
    </div>     
@endsection
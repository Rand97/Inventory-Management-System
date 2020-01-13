@extends('layouts.appnav')

@section('content')

        <!-- successfuly added message -->
        @if(isset($message))
            <div class="alert alert-success  text-center">
                {{ $message }}
            </div>
        @endif

        <!-- validation check -->
        @foreach($errors->all() as $myerror)
            <div class="alert alert-danger" role="alert">
                {{$myerror}}
            </div>
        @endforeach
        <br>
        
        <!-- add item details -->
        {!! Form::open(['action' => 'ItemController@store' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('item','Item')}}
                {{Form::text('item', '' , ['class' => 'form-control','placeholder' => 'Add item'])}}
            </div>
            <div class="form-group">
                {{Form::label('catagory','Catagory')}}
                {{Form::select('catagory', [
                            'Modules & Sensors' => 'Modules & Sensors',
                            'Power Supplies' => 'Power Supplies',
                            'Accessories' => 'Accessories',
                            'Passive Components' => 'Passive Components',
                            'Electromechanical' => 'Electromechanical',
                            'Other' => 'Other'],
                             null,
                            ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('quality','Quality')}}
                {{Form::number('quality', '' , ['class' => 'form-control','placeholder' => 'Add quality'])}}
            </div>
            <div class="form-group">
                {{Form::label('description','Description')}}
                {{Form::textarea('description', '' , ['class' => 'form-control','placeholder' => 'Add description'])}}
            </div>
            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>
            {{Form::submit('Save', ['class'=> 'btn btn-primary'])}}
        {!! Form::close() !!}
 @endsection
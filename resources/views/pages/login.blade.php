@extends('layouts.app')

@section('content')
<div class="alert alert-danger" role="alert">{{$msg}}</div>
<a href="{{route('login')}}" class="btn btn-primary">Primary</button>
@endsection
@extends('layouts.app')

@section('content')
        <div class="text-center">
        <h1 class="text-danger">{{$topic}}</h1><br>
            <a href="/add" class="btn btn-primary">Add</a><br><br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-dark">
                        <th>Catagory</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Availability</th>
                        <th>description</th>
                        @foreach($tableData as $data)
                        <tr>
                            <td>{{$data->catagory}}</td>
                            <td>{{$data->item}}</td>
                            <td>{{$data->quality}}</td>
                            <td>
                                @if($data->quality==0)
                                    Not Available
                                @else
                                    Available
                                @endif
                            </td>
                            <td>{{$data->description}}</td>
                        </tr>
                        @endforeach
                        {{ $tableData->links() }}
                        
                    </table>
                </div>
            </div>
        </div>
@endsection
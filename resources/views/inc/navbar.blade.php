@php
  $id = Session::get('id');
  $requiredRow = \App\User::find($id);
@endphp
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    
    <a class="navbar-brand" href="#">{{$requiredRow->role}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
        <a class="nav-link" href="/home/{{$id}}">Home <span class="sr-only">(current)</span></a>
        </li>
        @if($requiredRow->role == 'admin')
        <li class="nav-item active">
          <a class="nav-link" href="/add">Add items</a>
        </li>
       @endif
      </ul>
      <form class="form-inline my-2 my-lg-0" action="/search" method="post">
        {{csrf_field() }}
        <input class="form-control mr-sm-2" type="text" placeholder="Search items" name = "searchitem" aria-label="Search" required>
        <button class="btn btn-secondary my-2 my-sm-0" type="submit" style="margin-right: 20px">Search</button>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link btn btn-primary" href="{{route('logout')}}">Logout</a>
          </li>
        </ul>
      </form>
      
    </div>
  </nav>
  <br><br>
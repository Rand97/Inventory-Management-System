<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    @include('inc.navbar')
    <div class="container">
        <div class="text-center">
        <h1 class="text-danger">{{$topic}}</h1><br>
            @if(count($tableData) == 0)
                <h3>No items found</h3>
            @else
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-dark">
                            <th>Catagory</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Availability</th>
                            @foreach($tableData as $data)
                            <tr data-href="/random/{{$data->id}}">
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
                            </tr>
                            @endforeach
                            {{ $tableData->links() }}
                                
                        </table>
                        <script>
                            document.addEventListener("DOMContentLoaded" , () => {
                                const rows = document.querySelectorAll("tr[data-href]");
                                
                                rows.forEach(row => {
                                    row.addEventListener("click", () => {
                                        window.location.href = row.dataset.href;
                                    });
                                });
                            });
                        </script>
                    </div>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
        

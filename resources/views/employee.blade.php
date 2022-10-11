<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <table class="table">
                    <caption>List of users</caption>
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Manager</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = "";
                        @endphp
                        @foreach ($data as $key=>$item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->manager }}</td>
                          </tr>
                        @endforeach
                     
                     
                    </tbody>
                  </table>
            </div>
        </div>
    </div>


    
</body>
</html>
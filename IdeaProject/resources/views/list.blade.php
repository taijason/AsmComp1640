<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Idea List</title>
  </head>
  <body>
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <h2>Idea list</h2>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <div style="margin-right: 10%; float: right;">
                    <a href="{{url('add')}}" class="btn btn-outline-success">Add an idea</a>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Idea Name</th>
                            <th>Idea Type</th>
                            <th>Content</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                            <tr>
                                <td>{{$row->ideaID}}</td>
                                <td>{{$row->ideaName}}</td>
                                <td>{{$row->ideaType}}</td>
                                <td>{{$row->ideaContent}}</td>
                                <td><img src="images/ideas/{{$row->ideaFile}}"
                                         alt="" srcset="" height="90px" width="90px"></td>
                                <td>
                                    <a href="{{url('edit/'. $row->ideaID)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{url('delete/'. $row->ideaID)}}" class="btn btn-danger"
                                        onclick="return confirm('Is it okay to delete this idea?');">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </body>
</html>

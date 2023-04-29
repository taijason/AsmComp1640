<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit idea</title>
  </head>
  <body>
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Idea</h2>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form action="{{url('update')}}" method="POST">
                    @csrf
                    <div class="md-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" name="id" class="form-control"
                                value="{{$data->ideaID}}" readonly>
                    </div>
                    <div class="md-3">
                        <label for="ideaType" class="form-label">Idea Type</label>
                        <select name="ideaType" class="form-control">
                            @foreach ($ideaTypes as $row)
                                <option value="{{$row->ideaTypeID}}" {{$row->ideaTypeID == $data->ideaTypeID ? 'selected' : ''}}>
                                    {{$row->ideaTypeName}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md-3">
                        <label for="name" class="form-label">Contents</label>
                        <input type="text" name="content" class="form-control"
                               value="{{$data->ideaContent}}">
                    </div>
                    <div class="md-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control"
                               value="{{$data->ideaName}}">
                    </div>
                    <div class="md-3">
                        <label for="image1" class="form-label">File</label>
                        <input type="file" name="file" class="form-control">
                    </div> <br>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                    <a href="{{url('list')}}" class="btn btn-success">Back</a>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>

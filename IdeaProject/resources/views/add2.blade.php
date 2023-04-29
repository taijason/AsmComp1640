<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Add Comment</title>
  </head>
  <body>
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <h2>Add new comment</h2>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form action="{{url('save')}}" method="POST">
                    @csrf
                    <div class="md-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" name="id" class="form-control"
                                placeholder="Enter comment id">
                    </div>
                    <div class="md-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control"
                                placeholder="Enter comment name">
                    </div>
                    <div class="md-3">
                        <label for="details" class="form-label">Details</label>
                        <input type="text" name="details" class="form-control"
                                placeholder="Enter comment details">
                    </div>
                    <div class="md-3">
                        <label for="user" class="form-label">User</label>
                        <select name="user" class="form-control">
                        @foreach ($data as $row)
                        <option value="{{$row->userID}}">{{$row->userName}}</option>
                        @endforeach
                        </select>
                    </div> <br>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                    <a href="{{url('list2')}}" class="btn btn-success">Back</a>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>

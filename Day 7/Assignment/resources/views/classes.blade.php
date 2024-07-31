<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>All Classes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">
  <style>
    * {
      font-family: "Lato", sans-serif;
    }
  </style>
</head>
<body>
  <main>
    <div class="container my-5">
      <div class="bg-light p-5 rounded">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2 class="fw-bold fs-2">All Classes</h2>
          <a href="{{ route('classes.trashed') }}" class="btn btn-info">View Trashed Classes</a>
        </div>
        @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif
        <table class="table table-hover">
          <thead>
            <tr class="table-dark">
              <th scope="col">Car Title</th>
              <th scope="col">Price</th>
              <th scope="col">Description</th>
              <th scope="col">Date From</th>
              <th scope="col">Date To</th>
              <th scope="col">Capacity</th>
              <th scope="col">Is Published</th>
              <th scope="col">Is Filled</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($classes as $class) 
            <tr>
              <td scope="row">{{$class['carTitle']}}</td>
              <td>{{$class['price']}}</td>
              <td>{{ Str::limit($class['description'], 20) }}</td>
              <td>{{$class['date_from']}}</td>
              <td>{{$class['date_to']}}</td>
              <td>{{$class['capacity']}}</td>
              <td>{{$class['published'] ? 'Yes' : 'No'}}</td>
              <td>{{$class['is_filled'] ? 'Yes' : 'No'}}</td>
              <td><a href="{{route('classes.edit', $class['id'])}}">Edit</a></td>
              <td>
                <form action="{{route('classes.destroy', $class->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-link m-0 p-0" onclick="return confirm('Are you sure you want to delete this class?')">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
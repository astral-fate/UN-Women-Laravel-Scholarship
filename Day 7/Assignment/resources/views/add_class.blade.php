<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Class</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <style>
    * { font-family: "Lato", sans-serif; }
  </style>
</head>
<body>
  <main>
    <div class="container my-5">
      <div class="bg-light p-5 rounded">
        <h2 class="fw-bold fs-2 mb-5 pb-2">Add Class</h2>
        <form action="{{ route('classes.store') }}" method="POST" class="px-md-5">
          @csrf
          <div class="form-group mb-3 row">
            <label class="form-label col-md-2 fw-bold text-md-end">Class Title:</label>
            <div class="col-md-10">
              <input type="text" placeholder="Enter class title" class="form-control py-2" name="carTitle" />
            </div>
          </div>
          <div class="form-group mb-3 row">
            <label class="form-label col-md-2 fw-bold text-md-end">Price:</label>
            <div class="col-md-10">
              <input type="number" step="0.1" placeholder="Enter price" class="form-control py-2" name="price" />
            </div>
          </div>
          <div class="form-group mb-3 row">
            <label class="form-label col-md-2 fw-bold text-md-end">Description:</label>
            <div class="col-md-10">
              <textarea cols="30" rows="5" class="form-control py-2" name="description"></textarea>
            </div>
          </div>
          <div class="form-group mb-3 row">
            <label class="form-label col-md-2 fw-bold text-md-end">Capacity:</label>
            <div class="col-md-10">
              <input type="number" placeholder="Enter capacity" class="form-control py-2" name="capacity" />
            </div>
          </div>
          <div class="form-group mb-3 row">
            <label class="form-label col-md-2 fw-bold text-md-end">Date From:</label>
            <div class="col-md-10">
              <input type="date" class="form-control py-2" name="date_from" />
            </div>
          </div>
          <div class="form-group mb-3 row">
            <label class="form-label col-md-2 fw-bold text-md-end">Date To:</label>
            <div class="col-md-10">
              <input type="date" class="form-control py-2" name="date_to" />
            </div>
          </div>
          <div class="form-group mb-3 row">
            <label class="form-label col-md-2 fw-bold text-md-end">Is Filled:</label>
            <div class="col-md-10">
              <input type="checkbox" class="form-check-input" name="is_filled" />
            </div>
          </div>
          <div class="form-group mb-3 row">
            <label class="form-label col-md-2 fw-bold text-md-end">Published:</label>
            <div class="col-md-10">
              <input type="checkbox" class="form-check-input" style="padding: 0.7rem;" name="published" />
            </div>
          </div>
          <div class="text-md-end">
            <button type="submit" class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
              Add Class
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
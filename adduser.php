<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <h1>Add Data</h1>
    <div id="alert-message"></div>

    <form id="add-form" method="post" enctype="multipart/form-data">
      <!-- Name -->
      <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" id="name" value="" name="name" class="form-control" maxlength="50" required>
        </div>
      </div>

      <!-- Email -->
      <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" id="email" name="email" value="" class="form-control" required>
        </div>
      </div>

      <!-- Gender -->
      <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Gender</label>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="Male" value="Male" required>
            <label class="form-check-label" for="Male">Male</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="Female" value="Female" required>
            <label class="form-check-label" for="Female">Female</label>
          </div>
        </div>
      </div>

      <!-- Location -->
      <div class="mb-3 row">
        <label for="location" class="col-sm-2 col-form-label">Location</label>
        <div class="col-sm-10">
          <select class="form-select" id="location" name="location" required>
            <option value="">Select Location</option>
            <option value="Ahmedabad">Ahmedabad</option>
            <option value="Vadodara">Vadodara</option>
            <option value="Surat">Surat</option>
          </select>
        </div>
      </div>

      <!-- Checkbox -->
      <div class="mb-3 row checkbox-group">
        <label class="col-sm-2 col-form-label">Language</label>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="checkbox[]" value="Hindi" id="Hindi">
            <label class="form-check-label" for="Hindi">Hindi</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="checkbox[]" value="English" id="English">
            <label class="form-check-label" for="English">English</label>
          </div>
        </div>
      </div>

      <div class="mb-3">
        <a href="index.php" class="btn btn-primary">View</a>
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="custom.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>
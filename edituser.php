<!-- Fetch DATA -->
<?php
      require 'config.php';
      $id = $_GET["id"];
      $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
      $rows = mysqli_fetch_array($result);
      $checkbox = explode('|', $rows['checkbox']);
      // print_r($rows['checkbox']);
      
      ?>
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
    <h1>Uodate Data</h1>

    <form id="update-form" method="post" enctype="multipart/form-data">
  
      <input type="hidden" id="id" name="id" value="<?php echo $rows['id']; ?>">
      <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" id="name" value="<?php echo $rows["name"]; ?>" name="name" class="form-control"
            maxlength="50" required>
        </div>
      </div>
      <!-- Email -->
      <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" id="email" name="email" value="<?php echo $rows["email"]; ?>" class="form-control"
            required>
        </div>
      </div>

      <!-- Gender -->
      <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Gender</label>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="Male" value="Male" <?php if ($rows['gender'] === "Male")
              echo "checked"; ?> required>
            <label class="form-check-label" for="Male">Male</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="Female" value="Female" <?php if ($rows['gender'] === "Female")
              echo "checked"; ?> required>
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
            <option value="Ahmedabad" <?php if ($rows['location'] === "Ahmedabad")
              echo "selected"; ?>>Ahmedabad</option>
            <option value="Vadodara" <?php if ($rows['location'] === "Vadodara")
              echo "selected"; ?>>Vadodara</option>
            <option value="Surat" <?php if ($rows['location'] === "Surat")
              echo "selected"; ?>>Surat</option>
          </select>
        </div>
      </div>

      <!-- Checkbox -->
      <div class="mb-3">
        <label class="form-label">Languages:</label>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="checkbox[]" value="Hindi" id="Hindi" <?php if (in_array("Hindi", $checkbox))
            echo "checked"; ?> required>
          <label class="form-check-label" for="Hindi">Hindi</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="checkbox[]" value="English" id="English" <?php if (in_array("English", $checkbox))
            echo "checked"; ?>>
          <label class="form-check-label" for="English">English</label>
        </div>
        
      </div>
      <br>
      <br>
      <br>
      <a href="index.php"><button type="button" class="btn btn-primary">View</button></a>

      <button type="submit" name="submit" id="form-update" class="btn btn-success">Update</button>
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>PHP Ajax CRUD</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <!-- Add Button -->
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6 mt-3 mb-3">
                    <a href="#addModal" class="btn btn-primary" data-toggle="modal">Add New User</a>
                </div>
            </div>
        </div>
        <div id="alert-message-dlt"></div>



        <!-- //------------------------Insert-----------------------------------------// -->
        <div id="addModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form action="" id="add-form" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Add User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div id="alert-message" class="mt-1"></div>
                        <div class="modal-body">
                            <!-- Name -->
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" id="name" value="" name="name" class="form-control"
                                        maxlength="50">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" id="email" name="email" value="" class="form-control">
                                </div>
                            </div>

                            <!-- Gender -->
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="Male"
                                            value="Male">
                                        <label class="form-check-label" for="Male">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="Female"
                                            value="Female">
                                        <label class="form-check-label" for="Female">Female</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Checkbox -->
                            <div class="checkbox-group ">
                                <label class="form-label">Languages:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="checkbox[]" value="Hindi"
                                        id="Hindi">
                                    <label class="form-check-label" for="Hindi">Hindi</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="checkbox[]" value="English"
                                        id="English">
                                    <label class="form-check-label" for="English">English</label>
                                </div>
                            </div>

                            <!-- Image -->
                            <!-- <div class="mb-3">
                                <label for="file" class="form-label mt-3">Image:</label>
                                <input type="file" name="file" id="file" />
                            </div> -->

                            <!-- Location -->
                            <div class="mb-3 mt-3">
                                <label class="form-label">Location:</label>
                                <select class="form-select" id="location" name="location">
                                    <option value="">Select Location</option>
                                    <option value="Ahmedabad">Ahmedabad</option>
                                    <option value="Vadodara">Vadodara</option>
                                    <option value="Surat">Surat</option>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- //------------------------View-----------------------------------------// -->
        <table class="table" id="tbl" style="text-align: center;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Location</th>
                    <th>Language</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="yourTableBody">
                <?php
                require 'config.php';
                $read = mysqli_query($conn, "SELECT * FROM users") or die(mysqli_error($conn));
                $i = 1;
                if (mysqli_num_rows($read) > 0) {
                    while ($row = mysqli_fetch_array($read)) {
                        
                        $id = $row['id'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $gender = $row['gender'];
                        $location = $row['location'];
                        $checkbox = $row['checkbox']; 
                        // print_r($row); 
                        ?>

                        <tr id="<?php echo $id; ?>">
                            <td>
                                <?php echo $i++;?>
                            </td>
                            <td>
                                <?php echo $name; ?>
                            </td>
                            <td>
                                <?php echo $email; ?>
                            </td>
                            <td>
                                <?php echo $gender; ?>
                            </td>
                            <td>
                                <?php echo $location; ?>
                            </td>
                            <td>
                                <?php echo $checkbox; ?>
                            </td>
                            <td>
                                <a href="#editEmployeeModal" class="btn btn-outline-primary" data-toggle="modal"><img
                                        src="img/editicon.png" style="width: 18px;"></a> |

                                <button type="button" data-id="<?php echo $id; ?>" class="btn btn-outline-danger delete-button">
                                    <img src="img/dlticon.png" style="width: 18px;">
                                </button>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>


        <!-- //------------------------Edit-----------------------------------------// -->
        <?php
        $checkbox = explode('|', $checkbox);

        ?>
        <div id="editEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div id="alert-messageupdate" class="mt-1"></div>

                    <div class="modal-body ">
                        <form id="update-form" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">

                            <!-- Name -->
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" id="name" value="<?php echo $name; ?>" name="name"
                                        class="form-control" maxlength="50">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" id="email" name="email" value="<?php echo $email; ?>"
                                        class="form-control">
                                </div>
                            </div>

                            <!-- Gender -->
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="Male"
                                            value="Male" <?php if ($gender === "Male")
                                                echo "checked"; ?>>
                                        <label class="form-check-label" for="Male">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="Female"
                                            value="Female" <?php if ($gender === "Female")
                                                echo "checked"; ?>>
                                        <label class="form-check-label" for="Female">Female</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Checkbox -->
                            <div class="mb-3">
                                <label class="form-label">Languages:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="checkbox[]" value="Hindi"
                                        id="Hindi" <?php if (in_array("Hindi", $checkbox))
                                            echo "checked"; ?>>
                                    <label class="form-check-label" for="Hindi">Hindi</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="checkbox[]" value="English"
                                        id="English" <?php if (in_array("English", $checkbox))
                                            echo "checked"; ?>>
                                    <label class="form-check-label" for="English">English</label>
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="mb-3 mt-3">
                                <label class="form-label">Location:</label>
                                <select class="form-select" id="location" name="location">
                                    <option value="">Select Location</option>
                                    <option value="Ahmedabad" <?php if ($location === "Ahmedabad")
                                        echo "selected"; ?>>Ahmedabad</option>
                                    <option value="Vadodara" <?php if ($location === "Vadodara")
                                        echo "selected"; ?>>Vadodara</option>
                                    <option value="Surat" <?php if ($location === "Surat")
                                        echo "selected"; ?>>Surat</option>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="submit" name="submit" id="form-update" class="btn btn-success">Update</button>
                        <!-- <button type="submit" name="submit" id="form-update" value="Cancel" class="btn btn-success">Update</button> -->

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="custom.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>

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
    <tbody>
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
                $checkbox = $row['checkbox']; print_r($row); 
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
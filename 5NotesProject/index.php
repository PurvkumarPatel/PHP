<?php
    $insert = false;
    $update = false;
    $delete = false;
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "notes";
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_GET['delete'])){
        $Sr = $_GET['delete'];
        $delete = true;
        $sql = "DELETE FROM `notes` WHERE `Sr` = $Sr";
        $result = mysqli_query($conn, $sql);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['SrEdit'])) {
            // Update the record
            $Sr = $_POST["SrEdit"];
            $name = $_POST["nameEdit"];
            $message = $_POST["messageEdit"];
        
            // Sql query to be executed
            $sql = "UPDATE `notes` SET `name` = '$name', `message` = '$message' WHERE `Sr` = $Sr";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $update = true;
            } else {
                echo "We could not update the record successfully";
            }
        } else {
            if (isset($_POST['name'], $_POST['message'])) {
                $name = $_POST['name'];
                $message = $_POST['message'];
                $sql = "INSERT INTO notes (name, message) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $name, $message);
        
                if ($stmt->execute()) {
                    $insert = true;
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> We are facing some technical issue and your entry was not submitted successfully! We regret the inconvenience caused!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        </div>';
                    echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Insert Alert -->
    <?php if($insert): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your note has been inserted successfully
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Delete Alert -->
    <?php if($delete): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your note has been deleted successfully
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Update Alert -->
    <?php if($update): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your note has been updated successfully
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <h2>Update or Delete Entry</h2>
                        <form action="index.php" method="post">
                            <label for="entry_id">Select the entry:</label>
                            <select name="entry_id" id="entry_id">
                                <?php
                                // Fetch all entries from the database
                                $sql = "SELECT * FROM `notes`";
                                $result = mysqli_query($conn, $sql);
                                
                                // Display each entry as an option in the dropdown
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['Sr'] . "'>" . $row['name'] . " - " . $row['message'] . "</option>";
                                }
                                ?>
                            </select>
                            <label for="field">Select field to update/delete:</label>
                            <select name="field" id="field">
                                <option value="name">Name</option>
                                <option value="message">Message</option>
                            </select>
                            <div id="inputContainer">
                                <label for="new_value">New Value:</label>
                                <input type="text" name="new_value" id="new_value" class="form-control">
                            </div>
                            <button type="submit" name="update_entry" class="btn btn-primary">Update</button>
                            <button type="submit" name="delete_entry" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Notes Add Entry Form -->
    <h1>Notes Made Easy</h1>
    <div class="container">
        <form action="index.php" method="post">
            <h3>Tell us something you're going to work on today</h3>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" rows="3" placeholder="Enter your experience here"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Print Table PHP -->
    <?php 
    $sql = "SELECT * FROM `notes`";
    $result = mysqli_query($conn, $sql);
    
    echo "<div class='container'>";
    echo "<h2 class='text-center'>All Data Entries</h2>";
    echo "<div class='table-responsive'>";
    echo "<table id='myTable' class='table table-striped mx-auto'>";
    echo "<thead class='thead-dark'><tr><th>No</th><th>Name</th><th>Message</th><th>Action</th></tr></thead><tbody>";
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['message'] . "</td>";
        echo "<td> <button class='edit btn btn-sm btn-primary' id=".$row['Sr'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['Sr'].">Delete</button>  </td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
    echo "</div>";
    echo "</div>";
    ?>
            
    <!-- Script Files -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBud7l5eOAowJfajhczvt/8VEvNsS4Uog+gNQxa5VXLE4Dg/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    <!-- Script Files -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBud7l5eOAowJfajhczvt/8VEvNsS4Uog+gNQxa5VXLE4Dg/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });

    // Edit and Delete functionality
    $(document).on('click', '.edit', function () {
        var tr = $(this).closest('tr');
        var name = tr.find('td:eq(1)').text();
        var message = tr.find('td:eq(2)').text();
        var Sr = $(this).attr('id');
        $('#nameEdit').val(name);
        $('#messageEdit').val(message);
        $('#SrEdit').val(Sr);
        $('#editModal').modal('toggle');
    });

    $(document).on('click', '.delete', function () {
        var Sr = $(this).attr('id').substr(1,);
        if (confirm("Are you sure you want to delete this note!")) {
            window.location = `WE_Purv/index.php?delete=${Sr}`;
        } else {
            console.log("no");
        }
    });
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Operations</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Database Operations</h1>

        <!-- Insert Person Form -->
        <div class="mt-5">
            <h2>Insert Person</h2>
            <form action="insert_person.php" method="post">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" required>
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" class="form-control" name="dob" id="dob" required>
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <textarea class="form-control" name="location" id="location" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <!-- Search Form -->
        <div class="mt-5">
            <h2>Search</h2>
            <form action="search.php" method="post">
                <div class="form-group">
                    <label for="search_param">Search Parameter:</label>
                    <select class="form-control" name="search_param" id="search_param">
                        <option value="first_name">First Name</option>
                        <option value="last_name">Last Name</option>
                        <option value="dob">Date of Birth</option>
                        <option value="location">Location</option>
                        <option value="id">ID</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="search_query">Search Query:</label>
                    <input type="text" class="form-control" name="search_query" id="search_query" required>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>


        <!-- Update Form -->
        <div class="mt-5">
            <h2>Update Data</h2>
            <form action="update.php" method="post">
                <div class="form-group">
                    <label for="id">ID:</label>
                    <input type="text" class="form-control" name="id" id="id" required>
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" class="form-control" name="dob" id="dob" required>
                </div>
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" required>
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <textarea class="form-control" name="location" id="location" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>


        <!-- Show Tables and Databases -->
        <div class="mt-5">
            <form action="show_tables.php" method="post">
                <button type="submit" class="btn btn-info">Show Tables</button>
            </form>
            <form action="show_databases.php" method="post">
                <button type="submit" class="btn btn-info">Show Databases</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

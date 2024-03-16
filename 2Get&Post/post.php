    <?php
        if (isset($_POST['name']) && isset($_POST['email'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        echo "Name: " . $name . "<br>";
        echo "Email: " . $email;
        }
    ?>
<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // SQL query to fetch user with matching email and password
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($con, $sql);

        if ($result === false) {
            die('Query failed: ' . mysqli_error($con)); 
        }

        if (mysqli_num_rows($result) == 1) {
            echo "Login Successfully";
            // Redirect to dashboard
            // header("Location: studentdashh.php");
            exit();
        } else {
            echo "Wrong Email or Password";
        }
    }
}
?>
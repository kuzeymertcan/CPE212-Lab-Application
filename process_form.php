<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'student_registration_form_database';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO students (full_name, email, gender) VALUES ('$full_name', '$email', '$gender')";

    if (mysqli_query($conn, $sql)) {
        $message = "Data inserted successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Form</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="message"><?php echo $message; ?></div>
</body>
</html>

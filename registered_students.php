<!DOCTYPE html>
<html>
<head>
    <title>Registered Students</title>
</head>
<body>
    <h1>Registered Students</h1>
    <?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'student_registration_form_database';

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Full Name</th><th>Email</th><th>Gender</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['full_name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No students found.";
    }

    mysqli_close($conn);
    ?>
</body>
</html>

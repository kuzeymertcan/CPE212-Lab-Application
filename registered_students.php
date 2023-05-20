<!DOCTYPE html>
<html>
<head>
    <title>Registered Students</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #dddddd;
        }

        th {
            background-color: #f1f1f1;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e9e9e9;
        }

        .no-data {
            text-align: center;
            font-weight: bold;
            color: #ff0000;
        }
    </style>
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
        echo "<p class='no-data'>No students found.</p>";
    }
    
    mysqli_close($conn);
    ?>
</body>
</html>

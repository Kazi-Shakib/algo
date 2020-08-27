<head>
  <title>Result Processing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css1.css">
  <script src="jq.js"></script>
  <script src="bt.js"></script>
</head>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admres";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/*if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}*/
?>

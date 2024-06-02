<html>
<head>
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Online Shopping</title>
</head>
<body>
    <h1>Online Shopping</h1>
</body>
</html>
    <?php
/*$servername = "sql200.epizy.com";
    $username = "epiz_22079747";
    $password = "Newspaper3554";
    $dbname = "epiz_22079747_feedback";*/
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_signup";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT name, email, mob, password FROM signup";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    
    // output data of each row
    echo "<table class=table>";
    echo "<th> name </th>";
    echo "<th> email</th>";
    echo "<th> mob </th>";
    echo "<th> password </th>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td> $row[name] </td>";
        echo "<td> $row[email] </td>";
        echo "<td> $row[mob] </td>";
        echo "<td> $row[password] </td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}
echo "</table>";
$conn->close();
?>

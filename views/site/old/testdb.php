<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-140460922-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-140460922-1');
</script>
<h1>Test DB</h1>
<h4>Query get id</h4>
<p>
<ul>
<?php
$servername = "localhost";
$username = "root";
$password = "!mZoQnXi";
$dbname = "basket";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM Squadre";
$conn->query("SELECT * FROM `Squadre` ORDER BY `Squadre`.`Nome` ASC");
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<li> Nome Squadra: " . $row["Nome"]."</li><br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</ul>
</p>

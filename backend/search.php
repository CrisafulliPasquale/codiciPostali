<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "codiciPostali";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if(isset($_GET['cercaPerCap'])) {
    $cap = mysqli_real_escape_string($conn, $_GET['cercaPerCap']);
    
    $sql = "SELECT * FROM codiciPostali WHERE cap = '$cap'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Provincia: " . $row["provincia"]. " - CAP: " . $row["cap"]. "<br>";
        }
    } else {
        echo "Nessun risultato trovato.";
    }
} else {
    echo "Parametri mancanti.";
}

$conn->close();
?>

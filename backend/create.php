<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "codiciPostali";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if(isset($_GET['provincia']) && isset($_GET['cap'])) {
    
    $provincia = mysqli_real_escape_string($conn, $_GET['provincia']);
    $cap = mysqli_real_escape_string($conn, $_GET['cap']);

    $sql = "INSERT INTO codiciPostali (provincia, cap) VALUES ('$provincia', '$cap')";
    
    if ($conn->query($sql) === TRUE) {
        echo "provincia agiunta con successo";
    } else {
        echo "Errore durante l'aggiunta della provincia: " . $conn->error;
    }
} else {
    echo "Parametri mancanti.";
}

$conn->close();
?>
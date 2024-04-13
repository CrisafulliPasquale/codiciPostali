<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "codiciPostali";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if(isset($_GET['eliminaCap'])) {
    $cap = mysqli_real_escape_string($conn, $_GET['eliminaCap']);
    
    $sql = "DELETE FROM codiciPostali WHERE cap = '$cap'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Provincia eliminata con successo.";
    } else {
        echo "Errore durante l'eliminazione della provincia: " . $conn->error;
    }
} else {
    echo "Parametri mancanti.";
}

$conn->close();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "codiciPostali";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if(isset($_GET['id']) && isset($_GET['cap']) && isset($_GET['nuova_provincia'])) {
    $id = $_GET['id'];
    $cap = $_GET['cap'];
    $nuova_provincia = $_GET['nuova_provincia'];

    $sql = "UPDATE codiciPostali SET provincia='$nuova_provincia' WHERE cap='$cap'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record aggiornato con successo.";
    } else {
        echo "Errore nell'aggiornamento del record: " . $conn->error;
    }
}

$conn->close();
?>

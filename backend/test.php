<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comandi CAP e Provincia</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .commands {
            margin-bottom: 40px;
        }

        .commands h2 {
            color: #555;
            border-bottom: 2px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .commands ul {
            list-style: none;
            padding: 0;
        }

        .commands li {
            margin-bottom: 20px;
        }

        .commands code {
            background-color: #f2f2f2;
            padding: 4px 8px;
            border-radius: 6px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Comandi CAP e Provincia</h1>
        <div class="commands">
            <h2>Comandi disponibili:</h2>
            <ul>
                <li>Ricerca per CAP: <code>search.php?cercaPerCap=cap</code></li> <!--OK-->
                <li>Modifica provincia: <code>update.php?cap=CAP&amp;nuova_provincia=nomeNuovaProvincia</code></li>
                <li>Elimina provincia: <code>delete.php?eliminaCap=CAP_da_eliminare</code></li> <!--OK-->
                <li>Aggiungi provincia: <code>test.php?cap=Nuovo_CAP&amp;provincia=Nuova_Provincia</code></li>
            </ul>
        </div>
        
        <h2>Tabella Province</h2>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "codiciPostali";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM codiciPostali";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Provincia</th><th>CAP</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['provincia']."</td>";
                echo "<td>".$row['cap']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nessun risultato trovato.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>

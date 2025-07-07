<!DOCTYPE html>
<html lang="it">
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }
        .title {
            margin: 0 auto;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: white;
        }
        .label {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: white;
            font-size: large;
        }
    </style>
</head>
<body style="background-color: #001f3f;">
    <div class="header">
        <h1 class="title">Agenzia Assicurazioni</h1>
        <a href="index.html">
            <img src="logo2.png" alt="Logo" width="90">
        </a>
    </div>
    <hr>
    <div class="container">
        <form method="POST">
            <b><p class="text-white" style="font-family: Verdana, Geneva, Tahoma, sans-serif;font-size: x-large;">Inserisci i dati della tua auto:</p></b>
            <br><br>
            <div class="form-group">
                <b><label class="label">Targa</label></b>
                <input type="text" name="targa" class="form-control" disabled>
            </div>
            <br><br><br>
            <div class="form-group">
                <b><label class="label">Cilindrata</label></b>
                <input type="number" name="cilindrata" class="form-control">
            </div>
            <br><br><br>
            <?php
            $mysqli = mysqli_connect('127.0.0.1', 'root', '', 'a_assicurazione_utente01');
            $query="SELECT * FROM marca";
            $result = mysqli_query($mysqli,$query);
            echo "<div class='form-group'>";
            echo "<b><label class='label'>Marca</label></b>";
            echo "<select name='marca' class='form-control'>";
            echo "<option>Seleziona la marca</option>";
            while($row = mysqli_fetch_array($result)) { 
                echo "<option>".$row['marca']."</option>";
            }
            echo "</select>";
            echo "</div>";
            ?>
            <br><br><br>
            <div class="form-group">
                <b><label class="label">Potenza</label></b>
                <input type="number" name="potenza" class="form-control">
            </div>
            <br><br><br>
            <button type="submit" class="btn btn-primary">Inserisci la tua auto</button>
            <button type="button" class="btn btn-danger" onclick="Svuota()">Annulla</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php 
$cilindrata = isset($_POST['cilindrata']) ? $_POST['cilindrata'] : '';
$marca = isset($_POST['marca']) ? $_POST['marca'] : '';
$potenza = isset($_POST['potenza']) ? $_POST['potenza'] : '';
$targa=$_GET['Targa'];

$mysqli = mysqli_connect('127.0.0.1', 'root', '', 'a_assicurazione_utente01');
if (!$mysqli) {
    die("Connessione fallita: " . mysqli_connect_error());
}
$query = "UPDATE auto SET ";
$updateParts = [];
if (!empty($cilindrata)) {
    $updateParts[] = "Cilindrata='$cilindrata'";
}
if (!empty($marca)) {
    $updateParts[] = "Marca='$marca'";
}
if (!empty($potenza)) {
    $updateParts[] = "Potenza='$potenza'";
}

if (count($updateParts) > 0) {
    $query .= implode(", ", $updateParts) . " WHERE Targa='$targa'";
} else {
    echo "Nessuna modifica effettuata.";
    exit();
}

if (mysqli_query($mysqli, $query)) {
    echo "Auto modificata con successo.";
} else {
    echo "Errore durante l'aggiornamento: " . mysqli_error($mysqli);
}
mysqli_close($mysqli);
?>

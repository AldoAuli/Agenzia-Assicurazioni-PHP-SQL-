<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Tabella Auto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <?php
    $cf = $_POST['cf'];
    $mysqli = mysqli_connect('127.0.0.1', 'root', '', 'a_assicurazione_utente01');

    if (!$mysqli) {
        echo '<div class="alert alert-danger" role="alert">Errore di connessione al database.</div>';
        exit();
    }

    $cf = mysqli_real_escape_string($mysqli, $cf);  // Sicurezza base contro SQL injection
    $query = "SELECT * FROM auto WHERE CodF='$cf'";
    $result = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($result) == 0) {
        echo '<div class="alert alert-warning" role="alert">Errore: il Codice Fiscale selezionato non esiste.</div>';
    } else {
        echo '<div class="card shadow">';
        echo '<div class="card-header bg-primary text-white">';
        echo '<h5 class="mb-0">Auto registrate per Codice Fiscale: <strong>' . htmlspecialchars($cf) . '</strong></h5>';
        echo '</div>';
        echo '<div class="card-body p-0">';
        echo '<table class="table table-striped mb-0">';
        echo '<thead class="table-dark">';
        echo '<tr><th>Targa</th><th>Marca</th><th>Potenza</th></tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['Targa']) . '</td>';
            echo '<td>' . htmlspecialchars($row['Marca']) . '</td>';
            echo '<td>' . htmlspecialchars($row['Potenza']) . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '</div>';
    }

    mysqli_close($mysqli);
    ?>
</div>

</body>
</html>

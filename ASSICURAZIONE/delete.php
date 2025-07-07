<?php
$mysqli = mysqli_connect('127.0.0.1', 'root', '', 'a_assicurazione_utente01');

if (!$mysqli) {
    die("Connessione fallita: " . mysqli_connect_error());
}

$targa = mysqli_real_escape_string($mysqli, $_GET['Targa']);

$message = '';
$message_type = '';

$query = "DELETE FROM autocoinvolte WHERE Targa = '$targa'";
$query2 = "DELETE FROM auto WHERE Targa='$targa'";

if (mysqli_query($mysqli, $query)) {
    if (mysqli_query($mysqli, $query2)) {
        $message = "Auto eliminata con successo.";
        $message_type = 'success'; 
    } else {
        $message = "Errore durante l'eliminazione dell'auto: " . mysqli_error($mysqli);
        $message_type = 'danger';
    }
} else {
    $message = "Errore durante l'eliminazione da autocoinvolte: " . mysqli_error($mysqli);
    $message_type = 'danger';
}

mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminazione Auto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f4f9;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
    </style>
</head>

<body>

    <div class="container">
        <?php if ($message): ?>
            <div class="alert alert-<?php echo $message_type; ?> alert-dismissible fade show" role="alert">
                <?php echo $message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="d-flex justify-content-center">
            <a href="index.html" class="btn btn-primary">Torna alla pagina principale</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>

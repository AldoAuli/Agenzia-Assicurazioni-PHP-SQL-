<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabella Auto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <h1 class="text-center mb-4">Elenco delle Auto</h1>
    
    <?php
    $mysqli = mysqli_connect('127.0.0.1', 'root', '', 'a_assicurazione_utente01');
    $query = "SELECT * FROM auto";
    $result = mysqli_query($mysqli, $query);

    echo "<table class='table table-bordered table-striped table-hover'>";
    echo "<thead class='table-dark'><tr><th>Targa</th><th>Marca</th><th>Cilindrata</th><th>Potenza</th><th>CodF</th><th>CodAss</th><th>Azioni</th></tr></thead>";
    echo "<tbody>";
    
    while($row = mysqli_fetch_array($result)) { 
        echo "<tr><td>".$row['Targa']."</td><td>".$row['Marca']."</td><td>".$row['Cilindrata']."</td><td>".$row['Potenza']."</td><td>".$row['CodF']."</td><td>".$row['CodAss']."</td>";
        echo "<td>
                <a href='update.php?Targa=".$row['Targa']."' class='btn btn-warning btn-sm' title='Modifica'>
                    <i class='bi bi-pencil'></i> Modifica
                </a>
                <a href='delete.php?Targa=".$row['Targa']."' class='btn btn-danger btn-sm' title='Elimina'>
                    <i class='bi bi-trash-fill'></i> Elimina
                </a>
              </td>";
        echo "</tr>";
    }
    
    echo "</tbody></table>";
    ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>

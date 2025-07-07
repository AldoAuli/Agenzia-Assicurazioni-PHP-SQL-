<?php
    $targa = $_POST['targa'];
    $cilindrata = $_POST['cilindrata'];
    $marca = $_POST['marca'];
    $potenza = $_POST['potenza'];
    $cf = $_POST['CodF'];
    $codass = $_POST['CodAss'];
    $mysqli = mysqli_connect('127.0.0.1', 'root', '', 'a_assicurazione_utente01');
    $checkCodF = "SELECT * FROM proprietari WHERE CodF = '$cf'";
    $checkResult = mysqli_query($mysqli, $checkCodF);
    
    if (mysqli_num_rows($checkResult) == 0) {
        echo "Errore: il Codice Fiscale selezionato non esiste nella tabella proprietari.";
    } else {
        $query = "INSERT INTO auto (Targa, Marca, Cilindrata, Potenza, CodF, CodAss) 
                  VALUES ('$targa', '$marca', $cilindrata, $potenza, '$cf', '$codass')";

if (mysqli_query($mysqli, $query)) {
    echo "Nuova macchina aggiunta al Database";
  } else {
    echo "Errore: " . $mysql . "<br>" . mysqli_error($mysqli);
  }
    }
?>
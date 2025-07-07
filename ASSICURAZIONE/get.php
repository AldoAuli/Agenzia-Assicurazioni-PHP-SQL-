<?php
$cf=$_POST['cf'];
$mysqli = mysqli_connect('127.0.0.1', 'root', '', 'a_assicurazione_utente01');
$query="SELECT * FROM auto WHERE CodF='$cf'";
$result=mysqli_query($mysqli,$query);
if (mysqli_num_rows($result) == 0) {
    echo "Errore: il Codice Fiscale selezionato non esiste";
}else{
echo "<table border=1 width=50%>";
echo "<tr><th>Targa</th><th>Marca</th><th>Potenza</th></tr>";
while($row = mysqli_fetch_array($result)) { 
    echo "<tr><td>".$row['Targa']."</td><td>".$row['Marca']."</td><td>".$row['Potenza']."</tr>";
}
}
echo "</table>";
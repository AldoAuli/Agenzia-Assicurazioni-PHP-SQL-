<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenzia Assicurazioni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }
        .title {
            margin: 0 auto; /* Centra il testo rispetto al contenitore */
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: white;
        }
        body {
            background-color: #001f3f;
        }
        .form-container {
            background-color: #002e5f;
            padding: 30px;
            border-radius: 8px;
        }
        .label {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: white;
            font-size: large;
        }
        .btn-custom {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="header">
        <h1 class="title">Agenzia Assicurazioni</h1>
        <a href="index.html">
            <img src="logo2.png" alt="Logo" width="90">
        </a>
    </div>
    <hr>

    <div class="form-container">
        <form action="insert.php" method="POST">
            <h2 class="text-center text-white">Inserisci i dati della tua auto:</h2>
            <div class="mb-3">
                <label for="targa" class="label">Targa</label>
                <input type="text" name="targa" id="targa" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cilindrata" class="label">Cilindrata</label>
                <input type="number" name="cilindrata" id="cilindrata" class="form-control" required>
            </div>

            <?php
            $mysqli = mysqli_connect('127.0.0.1', 'root', '', 'a_assicurazione_utente01');
            $query = "SELECT * FROM marca";
            $result = mysqli_query($mysqli, $query);
            ?>
            <div class="mb-3">
                <label for="marca" class="label">Marca</label>
                <select name="marca" id="marca" class="form-select" required>
                    <option>Seleziona la marca</option>
                    <?php while ($row = mysqli_fetch_array($result)) { 
                        echo "<option>".$row['marca']."</option>";
                    } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="potenza" class="label">Potenza</label>
                <input type="number" name="potenza" id="potenza" class="form-control" required>
            </div>

            <?php
            $query = "SELECT * FROM proprietari";
            $result = mysqli_query($mysqli, $query);
            ?>
            <div class="mb-3">
                <label for="CodF" class="label">Codice Fiscale</label>
                <select name="CodF" id="CodF" class="form-select" required>
                    <option>Seleziona il tuo CF</option>
                    <?php while ($row = mysqli_fetch_array($result)) { 
                        echo "<option>".$row['CodF']."</option>";
                    } ?>
                </select>
            </div>

            <?php
            $query2 = "SELECT * FROM assicurazioni";
            $result2 = mysqli_query($mysqli, $query2);
            ?>
            <div class="mb-3">
                <label for="CodAss" class="label">Codice Assicurazione</label>
                <select name="CodAss" id="CodAss" class="form-select" required>
                    <option>Seleziona Codice Ass.</option>
                    <?php while ($row = mysqli_fetch_array($result2)) { 
                        echo "<option>".$row['CodAss']."</option>";
                    } ?>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-secondary">Inserisci la tua auto</button>
                <button type="reset" class="btn btn-secondary btn-custom">Annulla</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>

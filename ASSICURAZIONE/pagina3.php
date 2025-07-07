<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenzia Assicurazioni</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
        .label {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: white;
            font-size: large;
        }
        body {
            background-color: #001f3f;
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
    
    <form action="get.php" method="POST">
        <p class="text-white" style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: x-large;">Inserisci il codice fiscale per vedere le tue auto</p>
        
        <div class="mb-3">
            <label class="label" for="cf" class="form-label">Codice Fiscale</label>
            <input type="text" class="form-control" id="cf" name="cf" required>
        </div>
        
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-secondary">Cerca</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>

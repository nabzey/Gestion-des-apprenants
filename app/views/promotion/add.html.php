<!-- filepath: /var/www/ges-apprenant1/app/views/promotion/add.html.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une nouvelle promotion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
        }

        .header p {
            color: #666;
            font-size: 12px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-cancel {
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            color: #333;
        }

        .btn-primary {
            background-color: #ff9800;
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background-color: #ff9800;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Créer une nouvelle promotion</h1>
            <p>Remplissez les informations ci-dessous pour créer une nouvelle promotion.</p>
        </div>

        <form action="?page=add_promotion_process" method="POST" enctype="multipart/form-data">
            <!-- Nom de la promotion -->
            <div class="form-group">
                <label for="promotion-name">Nom de la promotion</label>
                <input type="text" id="promotion-name" name="name" placeholder="Ex: Promotion 2025" required>
            </div>

            <!-- Date de début -->
            <div class="form-group">
                <label for="start-date">Date de début</label>
                <input type="text" id="start-date" name="date_debut" placeholder="Ex: 01/01/2025" required>
            </div>

            <!-- Date de fin -->
            <div class="form-group">
                <label for="end-date">Date de fin</label>
                <input type="text" id="end-date" name="date_fin" placeholder="Ex: 31/12/2025" required>
            </div>

            <!-- Photo de la promotion -->
            <div class="form-group">
                <label for="promotion-image">Photo de la promotion</label>
                <input type="file" id="promotion-image" name="image" accept="image/png,image/jpeg">
                <p class="file-restrictions">Format JPG, PNG. Taille max 2MB</p>
            </div>

            <!-- Boutons d'action -->
            <div class="form-footer">
                <button type="button" class="btn btn-cancel" onclick="window.location.href='?page=promotions'">Annuler</button>
                <button type="submit" class="btn btn-primary">Créer la promotion</button>
            </div>
        </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un référentiel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-title">
                <h1>Créer un nouveau référentiel</h1>

            </div>
            <div class="entete">
            <a href="?page=all-referentiels" class="btn btn-back">Retour aux référentiels</a>
            </div>
        </div>

        <form class="referentiel-form" action="?page=add-referentiel-process" method="POST" enctype="multipart/form-data">
            <div class="form-section">
                <div class="image-upload">
                    <div class="upload-preview">
                        <img src="assets/images/placeholder.png" alt="Preview" id="imagePreview">
                    </div>
                    <label for="image">
                        <i class="fas fa-camera"></i>
                        Cliquer pour ajouter une photo
                    </label>
                    <input type="file" 
                           id="image" 
                           name="image" 
                           accept=".jpg,.jpeg,.png">
                    <small class="file-info">Format JPG, PNG - Max 2MB</small>
                    <?php if (isset($errors['image'])): ?>
                        <span class="error-message"><?= $errors['image'] ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="name">Nom du référentiel*</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="<?= htmlspecialchars($name ?? '') ?>" 
                           required>
                    <?php if (isset($errors['name'])): ?>
                        <span class="error-message"><?= $errors['name'] ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="description">Description*</label>
                    <textarea id="description" 
                              name="description" 
                              required 
                              rows="4"><?= htmlspecialchars($description ?? '') ?></textarea>
                    <?php if (isset($errors['description'])): ?>
                        <span class="error-message"><?= $errors['description'] ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="capacity">Capacité*</label>
                        <input type="number" 
                               id="capacity" 
                               name="capacity" 
                               min="1" 
                               value="<?= htmlspecialchars($capacity ?? '') ?>" 
                               required>
                        <?php if (isset($errors['capacity'])): ?>
                            <span class="error-message"><?= $errors['capacity'] ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="sessions">Nombre de sessions*</label>
                        <select id="sessions" name="sessions" required>
                            <option value="">Sélectionnez</option>
                            <?php for($i = 1; $i <= 4; $i++): ?>
                                <option value="<?= $i ?>" <?= (isset($sessions) && $sessions == $i) ? 'selected' : '' ?>>
                                    <?= $i ?> session<?= $i > 1 ? 's' : '' ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                        <?php if (isset($errors['sessions'])): ?>
                            <span class="error-message"><?= $errors['sessions'] ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="reset" class="btn btn-secondary">Annuler</button>
                    <button type="submit" class="btn btn-primary">Créer le référentiel</button>
                </div>
            </div>
        </form>
    </div>

    <script src="/assets/js/referentiel.js"></script>
</body>
</html>
<style>
        :root {
            --primary-color: #00ab98;
            --secondary-color: #f8f9fa;
            --text-color: #333;
            --border-color: #dee2e6;
            --hover-color: #019485;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f7f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            padding: 20px;
        }

        .header-title h1 {
            font-size: 15px;
          
            margin-bottom: 20px;
            text-align: center;
        }
      .entete{
        position: absolute;
        right:10px;
        margin-bottom: 20px;
        text-align: center;
        font-size: 15px;
      }
        .referentiel-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .image-upload {
            text-align: center;
            border: 2px dashed var(--border-color);
            border-radius: 8px;
            padding: 20px;
            cursor: pointer;
        }

        .image-upload img {
            max-width: 100px;
            margin-bottom: 10px;
        }

        .image-upload label {
            font-size: 14px;
            color: var(--text-color);
            cursor: pointer;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-size: 14px;
            color: var(--text-color);
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            padding: 10px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-size: 14px;
        }

        .form-row {
            display: flex;
            gap: 10px;
        }

        .form-row .form-group {
            flex: 1;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-secondary {
            background-color: var(--secondary-color);
            color: var(--text-color);
        }

        .btn-secondary:hover {
            background-color: #e2e6ea;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--hover-color);
        }
    </style>
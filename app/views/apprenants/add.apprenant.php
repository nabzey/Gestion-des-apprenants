<div class="form-container">
    <h1 class="form-title">Ajout apprenant</h1>
    <?php if (isset($_GET['error']) && $_GET['error'] === 'missing_field'): ?>
        <div class="error-message">
            <p>Veuillez remplir tous les champs obligatoires avant de soumettre le formulaire.</p>
        </div>
    <?php endif; ?>
    <form action="?page=add-apprenant-process" method="POST" enctype="multipart/form-data">
        <div class="section">
            <div class="section-header">
                <h2 class="section-title">Informations de l'apprenant</h2>
                <span class="edit-icon">✎</span>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Prénom(s)</label>
                    <input type="text" class="form-control" name="prenom" placeholder="">
                </div>
                <div class="form-group">
                    <label class="form-label">Nom</label>
                    <input type="text" class="form-control" name="nom" placeholder="">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Date de naissance</label>
                    <div class="date-input-container">
                        <input type="date" class="form-control" name="date_naissance">
                        <span class="calendar-icon">📅</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Lieu de naissance</label>
                    <input type="text" class="form-control" name="lieu_naissance" placeholder="">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Adresse</label>
                    <input type="text" class="form-control" name="adresse" placeholder="">
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Téléphone</label>
                    <input type="text" class="form-control" name="telephone" placeholder="">
                </div>
                <div class="form-group">
                    <label class="form-label">Ajouter un document</label>
                    <input type="file" class="form-control" name="photo" accept="image/*">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Référentiel</label>
                    <select class="form-control" name="referentiel">
                        <option value="DEV WEB/MOBILE">DEV WEB/MOBILE</option>
                        <option value="REF DIG">REF DIG</option>
                        <option value="AWS">AWS</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Section pour les informations du tuteur -->
        <div class="section">
            <div class="section-header">
                <h2 class="section-title">Informations du tuteur</h2>
                <span class="edit-icon">✎</span>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Nom du tuteur</label>
                    <input type="text" class="form-control" name="tuteur_nom" placeholder="">
                </div>
                <div class="form-group">
                    <label class="form-label">Prénom du tuteur</label>
                    <input type="text" class="form-control" name="tuteur_prenom" placeholder="">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Téléphone du tuteur</label>
                    <input type="text" class="form-control" name="tuteur_telephone" placeholder="">
                </div>
                <div class="form-group">
                    <label class="form-label">Adresse du tuteur</label>
                    <input type="text" class="form-control" name="tuteur_adresse" placeholder="">
                </div>
            </div>
        </div>
        
        <div class="buttons">
            <button type="button" class="btn btn-cancel" onclick="window.location.href='?page=apprenants'">Annuler</button>
            <button type="submit" class="save-btn">Enregistrer</button>
        </div>
    </form>
</div>
<style>
    .form-container {
        position: relative;
        width: 100%;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }
    
    .form-title {
        color: #2a9d8f;
        text-align: center;
        margin-bottom: 30px;
        font-size: 24px;
        font-weight: bold;
    }
    
    .section {
        margin-bottom: 30px;
    }
    
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eaeaea;
    }
    
    .section-title {
        font-size: 18px;
        color: #333;
        font-weight: bold;
    }
    
    .edit-icon {
        color: #aaa;
        cursor: pointer;
        font-size: 16px;
    }
    
    .form-row {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -10px;
        margin-bottom: 10px;
    }
    
    .form-group {
        flex: 1;
        min-width: 300px;
        padding: 0 10px;
        margin-bottom: 15px;
    }
    
    .form-label {
        display: block;
        margin-bottom: 5px;
        color: #666;
        font-size: 14px;
    }
    
    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
        font-size: 14px;
    }
    
    .date-input-container {
        position: relative;
        display: flex;
        align-items: center;
    }
    
    .calendar-icon {
        position: absolute;
        right: 10px;
        color: #ff9800;
        font-size: 18px;
    }
    
    .buttons {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        margin-top: 20px;
    }
    
    .cancel-btn {
        background-color: #fff;
        color: #333;
        border: none;
        padding: 12px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }
    
    .save-btn {
        background-color: #2a9d8f;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }
    
    .error-message {
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
        margin-bottom: 20px;
        text-align: center;
    }
</style>
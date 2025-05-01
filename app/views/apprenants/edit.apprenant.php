<div class="form-container">
    <h1>Modifier les informations de l'apprenant</h1>
    <form action="?page=edit_apprenant_process" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $apprenant['id']; ?>">
        
        <div class="form-group">
            <label>Prénom(s)</label>
            <input type="text" name="prenom" value="<?php echo htmlspecialchars($apprenant['prenom'] ?? ''); ?>" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nom" value="<?php echo htmlspecialchars($apprenant['nom'] ?? ''); ?>" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Date de naissance</label>
            <input type="date" name="date_naissance" value="<?php echo htmlspecialchars($apprenant['date_naissance'] ?? ''); ?>" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Lieu de naissance</label>
            <input type="text" name="lieu_naissance" value="<?php echo htmlspecialchars($apprenant['lieu_naissance'] ?? ''); ?>" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Adresse</label>
            <input type="text" name="adresse" value="<?php echo htmlspecialchars($apprenant['adresse'] ?? ''); ?>" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Téléphone</label>
            <input type="text" name="telephone" value="<?php echo htmlspecialchars($apprenant['telephone'] ?? ''); ?>" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Référentiel</label>
            <select name="referentiel" class="form-control">
                <option value="DEV WEB/MOBILE" <?php echo ($apprenant['referentiel'] === 'DEV WEB/MOBILE') ? 'selected' : ''; ?>>DEV WEB/MOBILE</option>
                <option value="REF DIG" <?php echo ($apprenant['referentiel'] === 'REF DIG') ? 'selected' : ''; ?>>REF DIG</option>
                <option value="AWS" <?php echo ($apprenant['referentiel'] === 'AWS') ? 'selected' : ''; ?>>AWS</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-save">Enregistrer</button>
        <button type="button" class="btn btn-cancel" onclick="window.location.href='?page=apprenants'">Annuler</button>
    </form>
</div>
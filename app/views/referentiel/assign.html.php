<div class="modal-container">
   
        <div class="modal-header">
            <h2>Ajouter une référentiel</h2>
            <a href="?page=referentiels" class="close-button">×</a>
        </div>
        
        <div class="form-group">
            <label for="referentiel">Libelé référentiel</label>
            <form action="?page=assign-referentiels-process" method="POST">
                <select name="referentiels[]" id="referentiel" class="form-control">
                    <option value="">Choisir un référentiel</option>
                    <?php foreach ($unassigned_referentiels as $ref): ?>
                        <option value="<?= $ref['id'] ?>"><?= htmlspecialchars($ref['name']) ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="add-btn">Ajouter</button>
            </form>
        </div>
        
        <div class="form-group">
            <label>Promotion active</label>
            <div class="tags-container">
                <?php if (!empty($assigned_referentiels)): ?>
                    <?php $tags_colors = ['green', 'blue', 'purple', 'orange', 'pink']; ?>
                    <?php $i = 0; ?>
                    <?php foreach ($assigned_referentiels as $ref): ?>
                        <div class="tag-item tag-<?= $tags_colors[$i % count($tags_colors)] ?>">
                            <?= htmlspecialchars($ref['name']) ?>
                            <form action="?page=unassign-referentiel" method="POST" class="inline-form">
                                <input type="hidden" name="referentiel_id" value="<?= $ref['id'] ?>">
                                <button type="submit" class="tag-remove">×</button>
                            </form>
                        </div>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="empty-tags">Aucun référentiel assigné</div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="form-actions">
            <a href="?page=referentiels" class="btn-terminer">Terminer</a>
        </div>
    </div>


<link rel="stylesheet" href="assets/css/referentiel-assign.css">

<style>
.modal-container {
    width: 100%;
    max-width: 800px;
    padding: 20px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    gap: 20px;
}



.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #dee2e6;
    padding-bottom: 10px;
}

.modal-header h2 {
    font-size: 24px;
    font-weight: 600;
    color: #333;
    margin: 0;
}

.close-button {
    font-size: 16px;
    color: #00ab98;
    text-decoration: none;
    font-weight: 500;
    cursor: pointer;
}

.close-button:hover {
    text-decoration: underline;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-size: 14px;
    font-weight: 500;
    color: #555;
    margin-bottom: 8px;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #dee2e6;
    border-radius: 4px;
    font-size: 14px;
    color: #333;
}

.form-control:focus {
    outline: none;
    border-color: #00ab98;
    box-shadow: 0 0 5px rgba(0, 171, 152, 0.5);
}

.add-btn {
    display: inline-block;
    background-color: #00ab98;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    margin-top: 10px;
}

.add-btn:hover {
    background-color: #019485;
}

.tags-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    padding: 10px;
    border: 1px dashed #dee2e6;
    border-radius: 4px;
    background-color: #f8f9fa;
}

.tag-item {
    display: flex;
    align-items: center;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 500;
    color: white;
}

.tag-green {
    background-color: #28a745;
}

.tag-blue {
    background-color: #007bff;
}

.tag-purple {
    background-color: #6f42c1;
}

.tag-orange {
    background-color: #fd7e14;
}

.tag-pink {
    background-color: #e83e8c;
}

.tag-remove {
    background: none;
    border: none;
    color: white;
    font-size: 16px;
    margin-left: 8px;
    cursor: pointer;
}

.empty-tags {
    font-size: 14px;
    color: #999;
}

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}

.btn-terminer {
    display: inline-block;
    background-color: #00ab98;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    text-align: center;
    cursor: pointer;
}

.btn-terminer:hover {
    background-color: #019485;
}
</style>
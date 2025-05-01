<div class="promotions-grid">
    <?php if (empty($promotions)): ?>
        <div class="no-results">Aucune promotion trouvée</div>
    <?php else: ?>
        <?php foreach ($promotions as $promotion): ?>
            <div class="promotion-card">
                <div class="status-container">
                    <div class="status-badge <?= $promotion['status'] === 'active' ? 'active' : 'inactive' ?>">
                        <?= ucfirst($promotion['status']) ?>
                    </div>
                    <form action="?page=toggle_promotion" method="POST" class="toggle-form">
                        <input type="hidden" name="promotion_id" value="<?= $promotion['id'] ?>">
                        <button type="submit" class="toggle-button <?= $promotion['status'] === 'active' ? 'active' : '' ?>">
                            Activer/Désactiver
                        </button>
                    </form>
                </div>
                <img src="assets/images/uploads/promotions/<?= htmlspecialchars($promotion['image']) ?>" 
                     alt="<?= htmlspecialchars($promotion['name']) ?>" 
                     class="promotion-avatar">
                <div class="promotion-title"><?= htmlspecialchars($promotion['name']) ?></div>
                <div class="promotion-date">
                    <?= date('d/m/Y', strtotime($promotion['date_debut'])) ?> - 
                    <?= date('d/m/Y', strtotime($promotion['date_fin'])) ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
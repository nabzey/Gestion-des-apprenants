<div class="promotions-list">
    <?php if (empty($promotions)): ?>
        <div class="no-results">Aucune promotion trouvée</div>
    <?php else: ?>
        <?php foreach ($promotions as $promotion): ?>
            <div class="promotion-card-list">
                <div class="promotion-list-left">
                    <img src="assets/images/uploads/promotions/<?= htmlspecialchars($promotion['image']) ?>" 
                         alt="<?= htmlspecialchars($promotion['name']) ?>" 
                         class="promotion-avatar">
                    <div class="promotion-list-middle">
                        <div class="promotion-title"><?= htmlspecialchars($promotion['name']) ?></div>
                        <div class="promotion-date">
                            <?= date('d/m/Y', strtotime($promotion['date_debut'])) ?> - 
                            <?= date('d/m/Y', strtotime($promotion['date_fin'])) ?>
                        </div>
                        <div class="promotion-students">
                            <?= count($promotion['apprenants'] ?? []) ?> apprenants
                        </div>
                    </div>
                </div>
                <div class="promotion-list-right">
                    <form action="?page=toggle_promotion" method="POST" class="toggle-form">
                        <input type="hidden" name="promotion_id" value="<?= $promotion['id'] ?>">
                        <button type="submit" class="toggle-button <?= $promotion['status'] === 'active' ? 'active' : '' ?>">
                            <?= $promotion['status'] === 'active' ? 'Désactiver' : 'Activer' ?>
                        </button>
                    </form>
                    <a href="?page=promotion&id=<?= $promotion['id'] ?>" class="view-details">Voir détails</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
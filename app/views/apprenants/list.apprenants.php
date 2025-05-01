<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Apprenants</title>
    <link rel="stylesheet" href="/assets/css/apprenants.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="header-title">
                <h1>Apprenants</h1>
                <span class="count"><?php echo isset($totalApprenants) ? $totalApprenants : 0; ?> apprenants</span>
            </div>
            <div class="actions-container">
                <form method="get" class="search-form">
                    <input type="text" name="recherche" placeholder="Rechercher..." value="<?php echo htmlspecialchars($recherche); ?>">
                    <select name="classe">
                        <option value="">Filtre par classe</option>
                        <?php foreach ($referentiels as $ref): ?>
                            <option value="<?php echo htmlspecialchars($ref); ?>" <?php echo ($filtreClasse == $ref) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($ref); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <select name="status">
                        <option value="">Filtre par statut</option>
                        <?php foreach ($statuts as $statut): ?>
                            <option value="<?php echo htmlspecialchars($statut); ?>" <?php echo ($filtreStatus == $statut) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($statut); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-filter"></i>Rechercher</button>
                </form>
                <div class="right-actions">
                    <a href="download.php" class="btn btn-download"><i class="fas fa-download"></i> Télécharger la liste</a>
                    <button class="btn btn-add" onclick="window.location.href='?page=add-apprenant'"><i class="fas fa-plus"></i> Ajouter apprenant</button>
                </div>
            </div>
        </header>

        <div class="tabs-container">
            <div class="tab active">Liste des retenues</div>
            <div class="tab">Liste d'attente</div>
        </div>
        
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Matricule</th>
                        <th>Nom Complet</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Référentiel</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($apprenants)): ?>
                        <?php foreach ($apprenants as $apprenant): ?>
                            <tr>
                                <td class="photo-cell">
                                    <img src="<?php echo $apprenant['photo']; ?>" alt="Photo">
                                </td>
                                <td><?php echo htmlspecialchars($apprenant['matricule']); ?></td>
                                <td><?php echo htmlspecialchars($apprenant['nom_complet']); ?></td>
                                <td><?php echo htmlspecialchars($apprenant['adresse']); ?></td>
                                <td><?php echo htmlspecialchars($apprenant['telephone']); ?></td>
                                <td><?php echo htmlspecialchars($apprenant['referentiel']); ?></td>
                                <td>
                                    <span class="status <?php echo strtolower($apprenant['statut']); ?>">
                                        <?php echo htmlspecialchars($apprenant['statut']); ?>
                                    </span>
                                </td>
                                <td class="actions">
                                    <div class="dropdown">
                                        <button class="dropdown-toggle"><i class="fas fa-ellipsis-v"></i></button>
                                        <div class="dropdown-menu">
                                            <a href="?page=details-apprenant&id=<?php echo $apprenant['id']; ?>" class="dropdown-item">Détails</a>
                                            <a href="?page=edit_apprenant&id=<?php echo $apprenant['id']; ?>" class="dropdown-item">Modifier</a>
                                            <a href="?page=delete-apprenant&id=<?php echo $apprenant['id']; ?>" class="dropdown-item" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet apprenant ?')">Supprimer</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="no-data">Aucun apprenant trouvé</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="pagination">
            <div class="pagination-info">
                <span>Apprenants/page</span>
                <select name="per_page" onchange="window.location.href=this.value">
                    <option value="?per_page=10" <?php echo $apprenantsParPage == 10 ? 'selected' : ''; ?>>10</option>
                    <option value="?per_page=20" <?php echo $apprenantsParPage == 20 ? 'selected' : ''; ?>>20</option>
                    <option value="?per_page=50" <?php echo $apprenantsParPage == 50 ? 'selected' : ''; ?>>50</option>
                </select>
            </div>
            <div class="pagination-count">
                <?php echo $debutIndex + 1; ?> à <?php echo min($debutIndex + $apprenantsParPage, $totalApprenants); ?> apprenants pour <?php echo $totalApprenants; ?>
            </div>
            <div class="pagination-links">
                <?php if ($currentPage > 1): ?>
                    <a href="?page=<?php echo $currentPage - 1; ?>&recherche=<?php echo urlencode($recherche); ?>&classe=<?php echo urlencode($filtreClasse); ?>&status=<?php echo urlencode($filtreStatus); ?>" class="prev">&lt;</a>
                <?php endif; ?>
                
                <?php
                $startPage = max(1, $currentPage - 2);
                $endPage = min($totalPages, $startPage + 4);
                
                for ($i = $startPage; $i <= $endPage; $i++):
                ?>
                    <a href="?page=<?php echo $i; ?>&recherche=<?php echo urlencode($recherche); ?>&classe=<?php echo urlencode($filtreClasse); ?>&status=<?php echo urlencode($filtreStatus); ?>" 
                       class="<?php echo $i == $currentPage ? 'active' : ''; ?>"><?php echo $i; ?></a>
                <?php endfor; ?>
                
                <?php if ($currentPage < $totalPages): ?>
                    <a href="?page=<?php echo $currentPage + 1; ?>&recherche=<?php echo urlencode($recherche); ?>&classe=<?php echo urlencode($filtreClasse); ?>&status=<?php echo urlencode($filtreStatus); ?>" class="next">&gt;</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
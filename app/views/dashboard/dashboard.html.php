<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard - Promotions</title>
  <link rel="stylesheet" href="<?= $url."/assets/css/layout.css" ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<div class="dashboard">
    <!-- Carte des apprenants -->
    <div class="stat-card">
        <div class="card-icon">
            <span>👥</span>
        </div>
        <div class="card-content">
            <div class="card-value">180</div>
            <div class="card-label">Apprenants</div>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="card-icon">
            <span>📚</span>
        </div>
        <div class="card-content">
            <div class="card-value">5</div>
            <div class="card-label">Référentiels</div>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="card-icon">
            <span>👨</span>
        </div>
        <div class="card-content">
            <div class="card-value">5</div>
            <div class="card-label">Stagiaires</div>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="card-icon">
            <span>🧑‍💻</span>
        </div>
        <div class="card-content">
            <div class="card-value">13</div>
            <div class="card-label">Permanent</div>
        </div>
    </div>
</div>
<div class="content">
 
            <section class="carre">
                <div class="carre1">
                    <h3>Présences statistiques</h3>
                    <img src="/public/assets/images/sonatel.logo.png" alt="Statistiques">
                </div>
                <div class="rectangle">
                    <h3>Répartition des apprenants</h3>
                    <img src="/public/assets/images/sonatel.png" alt="Camembert">
                </div>
            </section>

            <section class="stats-section">
    <div class="card donut-card">
        <div class="card-header">
            <img src="/public/assets/icons/users.svg" alt="Icone Apprenants">
            <div>
                <h3>180</h3>
                <p>Apprenants</p>
            </div>
        </div>
        <div class="donut">
            <div class="donut-legend">
                <span class="orange">♀35%</span>
                <span class="blue">♂65%</span>
            </div>
            <img src="/public/assets/images/donut.png" alt="Graph camembert">
        </div>
    </div>

    <div class="card stats-box">
        <img src="/public/assets/images/logo-sonatel.png" class="logo" alt="Sonatel logo">
        <div class="stats">
            <div class="stat">
                <div class="circle blue">100%</div>
                <p><span class="orange">Taux d'insertion</span><br>Professionnelle</p>
            </div>
            <div class="stat">
                <div class="circle blue">56%</div>
                <p><span class="orange">Taux de</span><br>Féminisation</p>
            </div>
            <div class="stat">
                <img src="/public/assets/icons/users-group.svg" alt="Développeurs">
                <p>Communauté de plus de<br><strong>1000 Développeurs</strong></p>
            </div>
            <div class="stat">
                <img src="/public/assets/icons/map.svg" alt="Centres">
                <p><span class="orange">4 Centres</span><br>Dakar, Diamniadio, Ziguinchor, St Louis</p>
            </div>
        </div>
    </div>
</section>

    </div>
</body>
</html>
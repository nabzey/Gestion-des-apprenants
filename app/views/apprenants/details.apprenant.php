<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apprenants | Détails</title>
    <link rel="stylesheet" href="/assets/css/detail.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="title">
                <h1>Apprenants</h1>
                <span>/ Détails</span>
            </div>
        </div>
        
        <a href="#" class="back-button">
            ← Retour sur la liste
        </a>
        
        <div class="profile-section">
            <div class="profile-left">
                <div class="profile-image">
                    <img src="/api/placeholder/120/120" alt="Profile">
                </div>
                <div class="student-name">Seydina Mouhammad Diop</div>
                <div class="dev-badge">DEV WEB/MOBILE</div>
                <div class="status-badge">Actif</div>
                
                <div class="contact-info">
                    <div class="contact-item">
                        <span>📱</span>
                        <span>+221 78 599 35 46</span>
                    </div>
                    <div class="contact-item">
                        <span>✉️</span>
                        <span>mouhaleeq7@gmail.com</span>
                    </div>
                    <div class="contact-item">
                        <span>🏠</span>
                        <span>Sicap Liberté 6 Villa 6059 Dakar</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="details-container">
            <h1>Détails de l'apprenant</h1>
            <div class="details">
                <p><strong>Nom Complet :</strong> <?php echo htmlspecialchars($apprenant['nom_complet']); ?></p>
                <p><strong>Matricule :</strong> <?php echo htmlspecialchars($apprenant['matricule']); ?></p>
                <p><strong>Date de Naissance :</strong> 
                    <?php echo isset($apprenant['date_naissance']) ? htmlspecialchars($apprenant['date_naissance']) : 'Non spécifié'; ?>
                </p>
                <p><strong>Lieu de Naissance :</strong> 
                    <?php echo isset($apprenant['lieu_naissance']) ? htmlspecialchars($apprenant['lieu_naissance']) : 'Non spécifié'; ?>
                </p>
                <p><strong>Adresse :</strong> <?php echo htmlspecialchars($apprenant['adresse']); ?></p>
                <p><strong>Téléphone :</strong> <?php echo htmlspecialchars($apprenant['telephone']); ?></p>
                <p><strong>Référentiel :</strong> <?php echo htmlspecialchars($apprenant['referentiel']); ?></p>
                <p><strong>Statut :</strong> <?php echo htmlspecialchars($apprenant['statut']); ?></p>
            </div>
            <button onclick="window.location.href='?page=apprenants'" class="btn btn-back">Retour à la liste</button>
        </div>
        
        <div class="stats-cards">
            <div class="stat-card">
                <div class="stat-icon presence-icon">✓</div>
                <div class="stat-info">
                    <div class="stat-number">20</div>
                    <div class="stat-label">Présence(s)</div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon retard-icon">⏰</div>
                <div class="stat-info">
                    <div class="stat-number">5</div>
                    <div class="stat-label">Retard(s)</div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon absence-icon">⚠️</div>
                <div class="stat-info">
                    <div class="stat-number">1</div>
                    <div class="stat-label">Absence(s)</div>
                </div>
            </div>
        </div>
        
        <div class="dashboard-content">
            <div class="main-content">
                <div class="tabs">
                    <div class="tab active">Programme & Modules</div>
                    <div class="tab">Total absences par étudiant</div>
                </div>
                
                <div class="modules-grid">
                    <div class="module-card accent-border border-blue">
                        <div class="module-header">
                            <div class="duration">
                                <span>⏱️</span>
                                <span>30 jours</span>
                            </div>
                            <div class="more-options">⋯</div>
                        </div>
                        <div class="module-content">
                            <h3 class="module-title">Algorithme & Langage C</h3>
                            <p class="module-description">Complexité algorithmique & pratique codage en langage C</p>
                            <div class="module-details">
                                <div class="date-time">
                                    <div class="date">
                                        <span>📅</span>
                                        <span>15 Février 2025</span>
                                    </div>
                                    <div class="time">
                                        <span>🕒</span>
                                        <span>12:45 pm</span>
                                    </div>
                                </div>
                                <button class="detail-btn">Détails</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="module-card accent-border border-orange">
                        <div class="module-header">
                            <div class="duration">
                                <span>⏱️</span>
                                <span>15 jours</span>
                            </div>
                            <div class="more-options">⋯</div>
                        </div>
                        <div class="module-content">
                            <h3 class="module-title">Frontend 1: Html, Css & JS</h3>
                            <p class="module-description">Création d'interfaces de design avec animations avancées !</p>
                            <div class="module-details">
                                <div class="date-time">
                                    <div class="date">
                                        <span>📅</span>
                                        <span>24 Mars 2025</span>
                                    </div>
                                    <div class="time">
                                        <span>🕒</span>
                                        <span>12:45 pm</span>
                                    </div>
                                </div>
                                <button class="detail-btn">Détails</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="module-card accent-border border-blue">
                        <div class="module-header">
                            <div class="duration">
                                <span>⏱️</span>
                                <span>20 jours</span>
                            </div>
                            <div class="more-options">⋯</div>
                        </div>
                        <div class="module-content">
                            <h3 class="module-title">Backend 1: PhpPhp avancées & POO</h3>
                            <p class="module-description">Complexité algorithmique & pratique codage en langage C</p>
                            <div class="module-details">
                                <div class="date-time">
                                    <div class="date">
                                        <span>📅</span>
                                        <span>23 Mar 2024</span>
                                    </div>
                                    <div class="time">
                                        <span>🕒</span>
                                        <span>12:45 pm</span>
                                    </div>
                                </div>
                                <button class="detail-btn">Détails</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="module-card accent-border border-orange">
                        <div class="module-header">
                            <div class="duration">
                                <span>⏱️</span>
                                <span>15 jours</span>
                            </div>
                            <div class="more-options">⋯</div>
                        </div>
                        <div class="module-content">
                            <h3 class="module-title">Frontend 2: JS & TS + Tailwind</h3>
                            <p class="module-description">Complexité algorithmique & pratique codage en langage C</p>
                            <div class="module-details">
                                <div class="date-time">
                                    <div class="date">
                                        <span>📅</span>
                                        <span>23 Mar 2024</span>
                                    </div>
                                    <div class="time">
                                        <span>🕒</span>
                                        <span>12:45 pm</span>
                                    </div>
                                </div>
                                <button class="detail-btn">Détails</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="module-card accent-border border-blue">
                        <div class="module-header">
                            <div class="duration">
                                <span>⏱️</span>
                                <span>30 jours</span>
                            </div>
                            <div class="more-options">⋯</div>
                        </div>
                        <div class="module-content">
                            <h3 class="module-title">Backend 2: Laravel & SOLID</h3>
                            <p class="module-description">Complexité algorithmique & pratique codage en langage C</p>
                            <div class="module-details">
                                <div class="date-time">
                                    <div class="date">
                                        <span>📅</span>
                                        <span>23 Mar 2024</span>
                                    </div>
                                    <div class="time">
                                        <span>🕒</span>
                                        <span>12:45 pm</span>
                                    </div>
                                </div>
                                <button class="detail-btn">Détails</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="module-card accent-border border-orange">
                        <div class="module-header">
                            <div class="duration">
                                <span>⏱️</span>
                                <span>15 jours</span>
                            </div>
                            <div class="more-options">⋯</div>
                        </div>
                        <div class="module-content">
                            <h3 class="module-title">Frontend 3: ReactJs</h3>
                            <p class="module-description">Complexité algorithmique & pratique codage en langage C</p>
                            <div class="module-details">
                                <div class="date-time">
                                    <div class="date">
                                        <span>📅</span>
                                        <span>23 Mar 2024</span>
                                    </div>
                                    <div class="time">
                                        <span>🕒</span>
                                        <span>12:45 pm</span>
                                    </div>
                                </div>
                                <button class="detail-btn">Détails</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="side-content">
                <div style="width: 20px; background: linear-gradient(to bottom, #2a9d8f, #f39c12); height: 100%;"></div>
            </div>
        </div>
    </div>
</body>
</html>
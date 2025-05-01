<?php

namespace App\Controllers;

function list_apprenants() {
    $data_path = __DIR__ . '/../data/data.json';

    // Vérifiez si le fichier JSON existe
    if (!file_exists($data_path)) {
    }

    $json_data = file_get_contents($data_path);
    $apprenants = json_decode($json_data, true);

    if (!isset($apprenants['apprenants'])) {
        throw new \Exception("Le fichier JSON est mal formaté ou vide.");
    }

    // Pagination
    $apprenantsParPage = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 10;
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $totalApprenants = count($apprenants['apprenants']);
    $debutIndex = ($currentPage - 1) * $apprenantsParPage;

    // Recherche
    $recherche = isset($_GET['recherche']) ? trim($_GET['recherche']) : '';

    // Calcul du nombre total de pages
    $totalPages = (int) ceil($totalApprenants / $apprenantsParPage);

    // Découper les apprenants pour la page actuelle
    $apprenantsPagines = array_slice($apprenants['apprenants'], $debutIndex, $apprenantsParPage);

    render('admin.layout.php', 'apprenants/list.apprenants.php', [
        'apprenants' => $apprenantsPagines,
        'totalApprenants' => $totalApprenants,
        'apprenantsParPage' => $apprenantsParPage,
        'currentPage' => $currentPage,
        'debutIndex' => $debutIndex,
        'totalPages' => $totalPages,
        'recherche' => $recherche, // Transmettre $recherche à la vue
        'active_menu' => 'apprenants'
    ]);
}

function add_apprenant() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data_path = __DIR__ . '/../data/data.json';
    }
}

function add_apprenant_form() {
    // Logique pour afficher le formulaire
    //  d'ajout d'un apprenant
    $data_path = __DIR__ . '/../data/data.json';
    if (!file_exists($data_path)) {
        throw new \Exception("Le fichier JSON des apprenants est introuvable : $data_path");
    }
    $json_data = file_get_contents($data_path);
    $apprenants = json_decode($json_data, true);
    if (!isset($apprenants['apprenants'])) {
        throw new \Exception("Le fichier JSON est mal formaté ou vide.");
    }
    $apprenants = $apprenants['apprenants'];
    $referentiels = array_unique(array_column($apprenants, 'referentiel'));
    $statuts = array_unique(array_column($apprenants, 'statut'));
    $filtreClasse = isset($_GET['classe']) ? $_GET['classe'] : '';
    $filtreStatus = isset($_GET['status']) ? $_GET['status'] : '';
    $recherche = isset($_GET['recherche']) ? $_GET['recherche'] : '';
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $totalApprenants = count($apprenants);
    $debutIndex = ($currentPage - 1) * 10;
    $totalPages = (int) ceil($totalApprenants / 10);
    $apprenantsPagines = array_slice($apprenants, $debutIndex, 10);
    $apprenantsParPage = 10;
    render('admin.layout.php', 'apprenants/add.apprenant.php', [
        'active_menu' => 'apprenants'
        
    ]);
}

function add_apprenant_process() {
    $data_path = __DIR__ . '/../data/data.json';

    // Charger les données existantes
    if (!file_exists($data_path)) {
        throw new \Exception("Le fichier JSON des apprenants est introuvable : $data_path");
    }

    $json_data = file_get_contents($data_path);
    $data = json_decode($json_data, true);

   

    // Validation des champs obligatoires
    $required_fields = ['prenom', 'nom', 'date_naissance', 'lieu_naissance', 'adresse', 'email', 'telephone', 'referentiel'];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            // Rediriger avec un message d'erreur si un champ est manquant
            header('Location: ?page=add-apprenant&error=missing_field');
            exit();
        }
    }

    // Récupérer les données du formulaire
    $nouvel_apprenant = [
        'id' => count($data['apprenants']) + 1,
        'photo' => !empty($_FILES['photo']['name']) ? 'assets/images/uploads/apprenant/' . $_FILES['photo']['name'] : null,
        'matricule' => uniqid(),
        'nom_complet' => $_POST['prenom'] . ' ' . $_POST['nom'],
        'adresse' => $_POST['adresse'],
        'telephone' => $_POST['telephone'],
        'date_naissance' => $_POST['date_naissance'],
        'lieu_naissance' => $_POST['lieu_naissance'],
        'email' => $_POST['email'],
        'referentiel' => $_POST['referentiel'],
        'tuteur' => [
            'nom' => $_POST['tuteur_nom'] ?? '',
            'prenom' => $_POST['tuteur_prenom'] ?? '',
            'telephone' => $_POST['tuteur_telephone'] ?? '',
            'adresse' => $_POST['tuteur_adresse'] ?? ''
        ],
        'statut' => 'Actif'
    ];

    // Déplacer la photo téléchargée si elle existe
    if (!empty($_FILES['photo']['name'])) {
        $upload_dir = __DIR__ . '/../../public/assets/images/uploads/apprenant/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . $_FILES['photo']['name']);
    }

    // Ajouter le nouvel apprenant
    $data['apprenants'][] = $nouvel_apprenant;

    // Sauvegarder les données mises à jour
    file_put_contents($data_path, json_encode($data, JSON_PRETTY_PRINT));

    // Rediriger vers la liste des apprenants
    header('Location: ?page=apprenants');
    exit();
}

function edit_apprenant() {    
    global $model, $session_services, $validator_services, $file_services;

    // Vérification de l'authentification
    $user = check_auth();

    // Vérification de la méthode POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        $session_services['set_flash_message']('error', Messages::INVALID_REQUEST->value);
        redirect('?page=aprenants');
        return;
    }

    // Validation des données
    $validation = $validator_services['validate_promotion']($_POST, $_FILES);

    if (!$validation['valid']) {
        $session_services['set_flash_message']('error', $validation['errors'][0]);
        redirect('?page=apprenants');
        return;
    };

    header('Location: ?page=apprenants');
    exit();
}

function edit_apprenant_form() {
    $data_path = __DIR__ . '/../data/data.json';

    // Charger les données existantes
    if (!file_exists($data_path)) {
        throw new \Exception("Le fichier JSON des apprenants est introuvable : $data_path");
    }

    $json_data = file_get_contents($data_path);
    $data = json_decode($json_data, true);

    // Récupérer l'ID de l'apprenant à modifier
    $id = isset($_GET['id']) ? (int)$_GET['id'] : null;

    if ($id === null) {
        throw new \Exception("ID de l'apprenant non spécifié.");
    }

    // Trouver l'apprenant correspondant
    $apprenant = array_filter($data['apprenants'], function ($apprenant) use ($id) {
        return $apprenant['id'] === $id;
    });

    if (empty($apprenant)) {
        throw new \Exception("Apprenant introuvable.");
    }

    // Passer les données à la vue
    render('admin.layout.php', 'apprenants/edit.apprenant.php', [
        'apprenant' => array_values($apprenant)[0]
    ]);
}

function edit_apprenant_process() {
    $data_path = __DIR__ . '/../data/data.json';

    // Vérifiez si le fichier JSON existe
    if (!file_exists($data_path)) {
        throw new \Exception("Le fichier JSON des apprenants est introuvable : $data_path");
    }

    // Charger les données existantes
    $json_data = file_get_contents($data_path);
    $data = json_decode($json_data, true);

    // Récupérer l'ID de l'apprenant à modifier
    $id = isset($_POST['id']) ? (int)$_POST['id'] : null;

    if ($id === null) {
        throw new \Exception("ID de l'apprenant non spécifié.");
    }

    // Mettre à jour les informations de l'apprenant
    foreach ($data['apprenants'] as &$apprenant) {
        if ($apprenant['id'] === $id) {
            $apprenant['prenom'] = $_POST['prenom'];
            $apprenant['nom'] = $_POST['nom'];
            $apprenant['date_naissance'] = $_POST['date_naissance'];
            $apprenant['lieu_naissance'] = $_POST['lieu_naissance'];
            $apprenant['adresse'] = $_POST['adresse'];
            $apprenant['telephone'] = $_POST['telephone'];
            $apprenant['referentiel'] = $_POST['referentiel'];
            break;
        }
    }

    // Sauvegarder les données mises à jour
    file_put_contents($data_path, json_encode($data, JSON_PRETTY_PRINT));

    // Rediriger vers la liste des apprenants
    header('Location: ?page=apprenants');
    exit();
}

function delete_apprenant() {
    $data_path = __DIR__ . '/../data/data.json';

    // Charger les données existantes
    if (!file_exists($data_path)) {
        throw new \Exception("Le fichier JSON des apprenants est introuvable : $data_path");
    }

    $json_data = file_get_contents($data_path);
    $data = json_decode($json_data, true);

    // Récupérer l'ID de l'apprenant à supprimer
    $id = isset($_GET['id']) ? (int)$_GET['id'] : null;

    if ($id === null) {
        throw new \Exception("ID de l'apprenant non spécifié.");
    }

    // Filtrer les apprenants pour supprimer celui avec l'ID correspondant
    $data['apprenants'] = array_filter($data['apprenants'], function ($apprenant) use ($id) {
        return $apprenant['id'] !== $id;
    });

    // Sauvegarder les données mises à jour
    file_put_contents($data_path, json_encode($data, JSON_PRETTY_PRINT));

    // Rediriger vers la liste des apprenants
    header('Location: ?page=apprenants');
    exit();
}

function edit_source_form() {
    $data_path = __DIR__ . '/../data/data.json';

    // Charger les données existantes
    if (!file_exists($data_path)) {
        throw new \Exception("Le fichier JSON des sources est introuvable : $data_path");
    }

    $json_data = file_get_contents($data_path);
    $data = json_decode($json_data, true);

    // Récupérer l'ID de la source à modifier
    $id = isset($_GET['id']) ? (int)$_GET['id'] : null;

    if ($id === null) {
        throw new \Exception("ID de la source non spécifié.");
    }

    // Trouver la source correspondante
    $source = array_filter($data['sources'], function ($source) use ($id) {
        return $source['id'] === $id;
    });

    if (empty($source)) {
        throw new \Exception("Source introuvable.");
    }

    // Passer les données à la vue
    render('admin.layout.php', 'sources/edit.apprenant.php', [
        'source' => array_values($source)[0]
    ]);
}

function details_apprenant() {
    $data_path = __DIR__ . '/../data/data.json';

    // Vérifiez si le fichier JSON existe
    if (!file_exists($data_path)) {
        throw new \Exception("Le fichier JSON des apprenants est introuvable : $data_path");
    }

    // Charger les données existantes
    $json_data = file_get_contents($data_path);
    $data = json_decode($json_data, true);

    // Récupérer l'ID de l'apprenant
    $id = isset($_GET['id']) ? (int)$_GET['id'] : null;

    if ($id === null) {
        throw new \Exception("ID de l'apprenant non spécifié.");
    }

    // Trouver l'apprenant correspondant
    $apprenant = array_filter($data['apprenants'], function ($apprenant) use ($id) {
        return $apprenant['id'] === $id;
    });

    if (empty($apprenant)) {
        throw new \Exception("Apprenant introuvable.");
    }

    // Passer les données à la vue
    render('admin.layout.php', 'apprenants/details.apprenant.php', [
        'apprenant' => array_values($apprenant)[0]
    ]);
}
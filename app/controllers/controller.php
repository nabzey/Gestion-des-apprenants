<?php

namespace App\Controllers;

require_once __DIR__ . '/../enums/path.enum.php';
require_once __DIR__ . '/../services/session.service.php';

use App\Enums;
use App\Services;

// Fonctions communes à tous les contrôleurs
function render($layout, $view, $data = []) {
    extract($data); // Extraire les variables pour les rendre disponibles dans la vue

    // Ajouter la promotion active à toutes les pages
    $active_promotion = get_active_promotion();

    $view_path = __DIR__ . '/../views/' . $view; // Construire le chemin vers la vue
    $layout_path = __DIR__ . '/../views/layout/' . $layout; // Construire le chemin vers le layout

    if (!file_exists($view_path)) {
        throw new \Exception("La vue spécifiée n'existe pas : " . $view_path);
    }

    if (!file_exists($layout_path)) {
        throw new \Exception("Le layout spécifié n'existe pas : " . $layout_path);
    }

    ob_start();
    include $view_path; // Inclure la vue
    $content = ob_get_clean();

    include $layout_path; // Inclure le layout
} 

// Redirection vers une autre page
function redirect($url) {
    header("Location: $url");
    exit();
}

// Vérification si l'utilisateur est connecté
function check_auth() {
    global $session_services;
    
    $session_services['start_session']();
    
    if (!$session_services['is_logged_in']()) {
        redirect('?page=login');
    }
    
    return $session_services['get_current_user']();
}

// Vérification si l'utilisateur a le profil requis
function check_profile($required_profiles) {
    $user = check_auth();
    
    // Si un seul profil est passé (string), le convertir en tableau
    if (!is_array($required_profiles)) {
        $required_profiles = [$required_profiles];
    }
    
    // Vérifier si le profil de l'utilisateur est dans la liste des profils autorisés
    if (!in_array($user['profile'], $required_profiles)) {
        redirect('?page=forbidden');
    }
    
    return $user;
}


// Téléchargement d'un fichier image
function upload_image($file, $directory = 'uploads') {
    // Vérifier si le répertoire existe, sinon le créer
    $upload_dir = Enums\UPLOAD_PATH . $directory . '/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }
    
    // Générer un nom de fichier unique
    $filename = uniqid() . '_' . basename($file['name']);
    $target_path = $upload_dir . $filename;
    
    // Déplacer le fichier téléchargé vers le répertoire cible
    if (move_uploaded_file($file['tmp_name'], $target_path)) {
        return $directory . '/' . $filename;
    }
    
    return false;
}

function get_active_promotion() {
    global $model;

    // Récupérer la promotion active
    $active_promotion = $model['get_current_promotion']();
    return $active_promotion ?? ['name' => 'Aucune promotion active'];
}

/*function list_referentiels() {
    global $db;

    $stmt = $db->query("SELECT * FROM referentiels");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
*/
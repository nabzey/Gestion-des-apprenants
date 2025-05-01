<?php


function get_promotions_by_referentiel($referentiel_id) {
    global $db;

    $query = "SELECT p.id, p.name 
              FROM promotions p
              INNER JOIN promotion_referentiel pr ON p.id = pr.promotion_id
              WHERE pr.referentiel_id = :referentiel_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':referentiel_id', $referentiel_id);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function assign_referentiels_to_promotion($promotion_id, $referentiel_ids) {
    global $db;

    // Supprimer les référentiels existants pour cette promotion
    $delete_query = "DELETE FROM promotion_referentiel WHERE promotion_id = :promotion_id";
    $delete_stmt = $db->prepare($delete_query);
    $delete_stmt->bindParam(':promotion_id', $promotion_id);
    $delete_stmt->execute();

    // Ajouter les nouveaux référentiels
    $insert_query = "INSERT INTO promotion_referentiel (promotion_id, referentiel_id) VALUES (:promotion_id, :referentiel_id)";
    $insert_stmt = $db->prepare($insert_query);

    foreach ($referentiel_ids as $referentiel_id) {
        $insert_stmt->bindParam(':promotion_id', $promotion_id);
        $insert_stmt->bindParam(':referentiel_id', $referentiel_id);
        $insert_stmt->execute();
    }
}
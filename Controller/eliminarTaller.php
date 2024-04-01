<?php

require_once './connexio.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['id'])) {
    $tallerId = $_POST['id'];
    $db = connexio();

    try {
        $query = $db->prepare("DELETE FROM tallers WHERE id = ?");
        $result = $query->execute([$tallerId]);
        
        if($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'No se pudo eliminar el taller.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'ID del taller no proporcionado.']);
}
?>

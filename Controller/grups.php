<?php
require '../model/model.php';

if (isset($_POST['data'])) {

    $data = $_POST['data'];
    $data = json_decode($data);

    switch ($_POST['accio']) {
        case 'getUsuaris':
            
            echo json_encode(mostrarNom());
            
            exit();
            break;
        case 'eliminar':
            eliminarUsuari();
            break;
        case 'crearGrup':
            insertGrup($data);
            echo $data;
            break;
        case 'afegirUsuari':
            // echo json_encode($data);
            insertUsuariGrup($data);
            break;

        case 'eliminarGrups':
            eliminarGrup($data);
            break;
      
       case 'getNumGrups':
            echo json_encode(getNumGrups());

            exit();
            break;
        case 'canviarGrup':
          
            canviarGrup($data);
            break;


        
    }
}

require '../View/grups.vista.html';
?>
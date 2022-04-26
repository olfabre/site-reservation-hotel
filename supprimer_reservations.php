<?php
// Récupération des champs
$reference_chambre = trim($_GET['reference']);
$type =  $_GET['type'];
$idclient = $_GET['idclient'];

// Nous allons effacer le fichier de réservation

// etape1: placement du fichier dans le bon répertoire

if (isset($_GET["type"])){
    if ($_GET["type"]==1){$pathTypeChambreReservationType = "./datas/reservations/1/";}
    if ($_GET["type"]==2){$pathTypeChambreReservationType = "./datas/reservations/2/";}
    if ($_GET["type"]==3){$pathTypeChambreReservationType = "./datas/reservations/3/";}
    if ($_GET["type"]==4){$pathTypeChambreReservationType = "./datas/reservations/4/";}
    if ($_GET["type"]==5){$pathTypeChambreReservationType = "./datas/reservations/5/";}
    if ($_GET["type"]==6){$pathTypeChambreReservationType = "./datas/reservations/6/";}
} else {

    echo "Attention: il y a un souci. La réservation s'arrête. Veuillez revenir en arrière";
}

// etape 2: suppression du fichier de réservation
$path = $pathTypeChambreReservationType.$reference_chambre.".txt";
unlink($path);

echo "<script>alert('La réservation " .$idclient. "a bien été supprimée avec succès, Merci!')</script>";
echo "<script>document.location.href = 'index.php?page=affiche_reservations&action=11&type=$type'</script>";

?>
<?php
// Récupération des champs
$idclient = trim($_GET['idclient']);
$reference_chambre = trim($_GET['refchambre']);
$type =  $_GET['type'];
$lastname = $_GET['lastname'];
$email = trim($_GET['email']);
$duree = $_GET['duree'];
$paiement = $_GET['paiement'];
// On supprime les balises html
$data = strip_tags($_GET['data']);
//echo $idclient;
//echo $reference_chambre;
//echo "<br>";
//echo $paiement;

// Nous allons créer le fichier de réservation

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
//echo "<br>";
//echo $pathTypeChambreReservationType;

// etape2: nom donné au fichier
$fichierTxt = $reference_chambre . ".txt";


// etape3: création de la phrase à ajouter dans le fichier sur une ligne.
$contenuLigne = $reference_chambre . "|" . $idclient . "|" . $lastname . "|" . $email . "|" . $duree . "|" . $paiement . "|" . $data; 

// etape 2: suppression du fichier de réservation
$path = $pathTypeChambreReservationType.$reference_chambre.".txt";
unlink($path);

// ouverture du fichier pour écriture (création si celui-ci n'existe pas)z
$fp = fopen($pathTypeChambreReservationType.$fichierTxt, "a");
// ecriture
fwrite($fp, $contenuLigne);
// fermeture
fclose($fp);


echo "<script>alert('La réservation " .$idclient. "a bien été modifiée avec succès, Merci!')</script>";
echo "<script>document.location.href = 'index.php?page=affiche_reservations&action=11&type=$type'</script>";



?>
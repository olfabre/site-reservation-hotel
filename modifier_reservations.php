<?php
$reservation=true;
if (isset($_GET["action"]) && $_GET["action"] == 13){
if ($_GET["type"]==1){$titre = "Chambre Simple";$capacite = 1;$tarif=106;}
if ($_GET["type"]==2){$titre = "Chambre Double";$capacite = 2;$tarif=117;}
if ($_GET["type"]==3){$titre = "Chambre Double Sup.";$capacite = 2;$tarif=135;}
if ($_GET["type"]==4){$titre = "Chambre Twins";$capacite = 2;$tarif=117;}
if ($_GET["type"]==5){$titre = "Chambre Triple";$capacite = 3;$tarif=134;}
if ($_GET["type"]==6){$titre = "Chambre Familiale";$capacite = 4;$tarif=172;}
}
// récupération des paramètres
$reference_chambre = trim($_GET["reference"]);
$idclient = trim($_GET["idclient"]);
$type = $_GET["type"];
list($type_chambre, $etage, $numeroPorte) = explode ("-",$reference_chambre);
//echo $_GET["action"];
//echo $_GET["ref"];

// Affichage dynamique de la chambre réservée à modifier

 
$pathTypeChambreReservation = "./datas/reservations/".$type."/".$reference_chambre.".txt";
//echo $pathTypeChambreReservation;
//exit;
/* Ouverture en lecture seule le fichier de la liste de cette chambre */
$fichierChambreTypeSelection = fopen($pathTypeChambreReservation, "r");
    // On va lire ligne par ligne
    while(!feof($fichierChambreTypeSelection)){
      $lecture_ligne_reservation = fgets($fichierChambreTypeSelection);
        list($reference_chambre, $idclient, $lastname, $email, $duree, $paiement, $data ) = explode ("|",$lecture_ligne_reservation);

}
fclose($fichierChambreTypeSelection);



?>


<!-- Titre -->
<div class="w3-main" >
<div class="w3-container"  id="ajout_reservation">
<h1 class="w3-jumbo"><b><?php echo $titre ?></b></h1>
    

 
    <h1 class="w3-xxxlarge w3-text-red"><b>Modifier Réservation.</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
  
  </div>

<div class="w3-container" id="resa1">
    
    <p>Je vous invite à modifier les informations avant de valider la modification de cette réservation.</p>
    <form action="verif_modification.php" method="get" target="_self" class="w3-container w3-card-4 w3-light-grey" id="resa" name="resa">

    <div class="w3-section"><i class="w3-xxlarge fa fa-user"></i>
        <label>Identifiant Client</label>
        <input class="w3-input w3-border" type="text" name="idclient" value="<?php echo trim($idclient) ?>" disabled>
       <input type="hidden" name="idclient" value="<?php echo trim($idclient) ?>">
      </div>
      
    <div class="w3-section">
        <label>Référence de la Chambre</label>
        <input class="w3-input w3-border" type="text" name="refchambre" value="<?php echo $reference_chambre ?>" disabled>
        <input type="hidden" name="refchambre" value="<?php echo $reference_chambre ?>">
        <input type="hidden" name="type" value="<?php echo $_GET["type"] ?>">
      </div>

      <div class="w3-section">
        <label>Etage de la chambre</label>s
        <input class="w3-input w3-border" type="number" name="etage" value="<?php echo $etage ?>" disabled>
      </div>

      <div class="w3-section">
        <label>Numero de la porte</label>
        <input class="w3-input w3-border" type="number" name="porte" value="<?php echo $numeroPorte ?>" disabled>
      </div>

      <div class="w3-section">
        <label>Taille de la chambre</label>
        <input class="w3-input w3-border" type="text" name="porte" value="<?php echo $capacite . " personne(s) max." ?>" disabled>
      </div>
     
      <div class="w3-section">
        <label>Nom</label>
        <input class="w3-input w3-border" type="text" name="lastname" value="<?php echo $lastname ?>" required>
      </div>

      <div class="w3-section">
        <label>E-mail</label>
        <input class="w3-input w3-border" type="text" id="email" name="email" value="<?php echo $email ?>"  required>
        <p id="result"></p>
      </div>

      <div class="w3-section">
      <label>Durée du séjour</label>    
   <SELECT id="activite" name="duree" size="1" class="w3-select w3-border">
       <OPTION value="1" <?php if ($duree==1){ echo "selected";}?> >1 nuit</OPTION>option>
       <OPTION value="2" <?php if ($duree==2){ echo "selected";}?> >2 nuits</OPTION>
       <OPTION value="3" <?php if ($duree==3){ echo "selected";}?> >3 nuits</OPTION>
       <OPTION value="4" <?php if ($duree==4){ echo "selected";}?> >4 nuits</OPTION>
       <OPTION value="5" <?php if ($duree==5){ echo "selected";}?> >5 nuits</OPTION>
       <OPTION value="6" <?php if ($duree==6){ echo "selected";}?> >6 nuits</OPTION>
       <OPTION value="7" <?php if ($duree==7){ echo "selected";}?> >7 nuits</OPTION>
       <OPTION value="8" <?php if ($duree==8){ echo "selected";}?> >8 nuits</OPTION>
       <OPTION value="9" <?php if ($duree==9){ echo "selected";}?> >9 nuits</OPTION>
       <OPTION value="10" <?php if ($duree==10){ echo "selected";}?> >10 nuits</OPTION>
   </SELECT>
    </div>
    <div class="w3-section">
    <label for="paiement">Paiement effectué de <?php echo $tarif." € ? " ?></label>
   
       <input type="radio" id="paiement" name="paiement" value="0" class="w3-radio"  <?php if ($paiement==0){ echo "checked";}?> >
       <label for="paiement">Non</label> 
       
       <input type="radio" id="paiement" name="paiement" value="1" class="w3-radio" <?php if ($paiement==1){ echo "checked";}?>>
       <label for="paiement">Oui</label> 
</div>
<div class="w3-section">
        <label>NOTE PERSONNELLE (<b>119 caractères max.</b>) Nbr de caractères saisi:<span id="nbrcara" class="w3-text-red">0</span></label>
        <textarea maxlength="119" id="data" name="data" rows="4" cols="50" class="w3-input w3-border" onkeyup="nbrCara('data','nbrcara');if((document.getElementById('data').value.length)>119) {alert('Votre texte ne doit pas dépasser 119 caractères!');};" onkeydown="nbrCara('data','nbrcara');" onmouseout="nbrCara('data','nbrcara');" ><?php echo $data ?></textarea>
</div>


<br>
    <!--  <button type="submit" onClick="VerifMail(document.getElementById('email').value)"  class="w3-button w3-block w3-padding-large w3-green w3-margin-bottom">
      Valider la réservation</button> -->
      <button type="submit"   class="w3-button w3-block w3-padding-large w3-green w3-margin-bottom">
      Modifier la réservation</button>
    
    </form>  
</div>
<?php
$reservation=true;
if (isset($_GET["action"]) && $_GET["action"] == 10){
if ($_GET["type"]==1){$titre = "Chambre Simple";$capacite = 1;$tarif=106;}
if ($_GET["type"]==2){$titre = "Chambre Double";$capacite = 2;$tarif=117;}
if ($_GET["type"]==3){$titre = "Chambre Double Sup.";$capacite = 2;$tarif=135;}
if ($_GET["type"]==4){$titre = "Chambre Twins";$capacite = 2;$tarif=117;}
if ($_GET["type"]==5){$titre = "Chambre Triple";$capacite = 3;$tarif=134;}
if ($_GET["type"]==6){$titre = "Chambre Familiale";$capacite = 4;$tarif=172;}

// génération d'un idnetifiant unique
$identifiant_unique = uniqid('client');
$reference_chambre = trim($_GET["ref"]);
list($type_chambre, $etage, $numeroPorte) = explode ("-",$reference_chambre);
//echo $_GET["action"];
//echo $_GET["ref"];

}
?>


<!-- Titre -->
<div class="w3-main" >
<div class="w3-container"  id="ajout_reservation">
<h1 class="w3-jumbo"><b><?php echo $titre ?></b></h1>
    

 
    <h1 class="w3-xxxlarge w3-text-red"><b>Ajout réservation.</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
  
  </div>

<div class="w3-container" id="resa1">
    
    <p>Je vous invite à saisir les informations manquantes avant de valider la réservation.</p>
    <form action="verif_ajout.php" method="get" target="_self" class="w3-container w3-card-4 w3-light-grey" id="resa" name="resa">

    <div class="w3-section"><i class="w3-xxlarge fa fa-user"></i>
        <label>Identifiant Client</label>
        <input class="w3-input w3-border" type="text" name="idclient" value="<?php echo trim($identifiant_unique) ?>" disabled>
       <input type="hidden" name="idclient" value="<?php echo trim($identifiant_unique) ?>">
      </div>
      
    <div class="w3-section">
        <label>Référence de la Chambre</label>
        <input class="w3-input w3-border" type="text" name="refchambre" value="<?php echo $reference_chambre ?>" disabled>
        <input type="hidden" name="refchambre" value="<?php echo $reference_chambre ?>">
        <input type="hidden" name="type" value="<?php echo $_GET["type"] ?>">
      </div>

      <div class="w3-section">
        <label>Etage de la chambre</label>
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
        <input class="w3-input w3-border" type="text" name="lastname" required>
      </div>

      <div class="w3-section">
        <label>E-mail</label>
        <input class="w3-input w3-border" type="text" id="email" name="email"   required>
        <p id="result"></p>
      </div>

      <div class="w3-section">
      <label>Durée du séjour</label>    
   <SELECT id="activite" name="duree" size="1" class="w3-select w3-border">
       <OPTION value="1" selected>1 nuit</OPTION>option>
       <OPTION value="2">2 nuits</OPTION>
       <OPTION value="3">3 nuits</OPTION>
       <OPTION value="4">4 nuits</OPTION>
       <OPTION value="5">5 nuits</OPTION>
       <OPTION value="6">6 nuits</OPTION>
       <OPTION value="7">7 nuits</OPTION>
       <OPTION value="8">8 nuits</OPTION>
       <OPTION value="9">9 nuits</OPTION>
       <OPTION value="10">10 nuits</OPTION>
   </SELECT>
    </div>
    <div class="w3-section">
    <label for="paiement">Paiement effectué de <?php echo $tarif." € ? " ?></label>
   
       <input type="radio" id="paiement" name="paiement" value="0" class="w3-radio"  checked>
       <label for="paiement">Non</label> 
       
       <input type="radio" id="paiement" name="paiement" value="1" class="w3-radio">
       <label for="paiement">Oui</label> 
</div>

<div class="w3-section">
        <label>NOTE PERSONNELLE (<b>119 caractères max.</b>) Nbr de caractères saisi:<span id="nbrcara" class="w3-text-red">0</span></label>
        <textarea maxlength="119" id="data" name="data" rows="4" cols="50" class="w3-input w3-border" onkeyup="nbrCara('data','nbrcara');if((document.getElementById('data').value.length)>119) {alert('Votre texte ne doit pas dépasser 119 caractères!');};" onkeydown="nbrCara('data','nbrcara');" onmouseout="nbrCara('data','nbrcara');"></textarea>
</div>

<br>
    <!--  <button type="submit" onClick="VerifMail(document.getElementById('email').value)"  class="w3-button w3-block w3-padding-large w3-green w3-margin-bottom">
      Valider la réservation</button> -->
      <button type="submit"   class="w3-button w3-block w3-padding-large w3-green w3-margin-bottom">
      Valider la réservation</button>
    
    </form>  
</div>





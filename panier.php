<?php 
session_start();
//------ajout du produit dans le panier------
if (isset($_POST["ajouter"])) {
    echo $_POST["id"];
    $position_produit = array_search($_POST['id'],  $_SESSION['panier']['refproduit']); 
if ($position_produit !== false)
{
     $_SESSION['panier']['quantite'][$position_produit] += $_SESSION['panier']['quantite'][$position_produit] ;
}
else 
{
    $_SESSION['panier']['refproduit'][] = $_POST['id'];
    $_SESSION['panier']['nom'][] = $_POST['nom'];
    $_SESSION['panier']['quantite'][] = 1;
    $_SESSION['panier']['prix'][] = $_POST['prix'];
}

}


?>
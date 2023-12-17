<?php 
session_start();
echo "<table border='1' style='border-collapse: collapse' cellpadding='7'>";
echo "<tr><td colspan='4'>Panier</td></tr>";
echo "<tr><th>refproduit</th><th>nom</th><th>Quantité</th><th>Prix Unitaire</th></tr>";
if(empty($_SESSION['panier']['refproduit'])) // panier vide
{
	echo "<tr><td colspan='5'>Votre panier est vide</td></tr>";
}
else
{
	for($i = 0; $i < count($_SESSION['panier']['refproduit']); $i++) 
	
	{
		echo "<tr>";
		echo "<td>" . $_SESSION['panier']['refproduit'][$i] . "</td>";
		echo "<td>" . $_SESSION['panier']['nom'][$i] . "</td>";
		echo "<td>" . $_SESSION['panier']['quantite'][$i] . "</td>";
		echo "<td>" . $_SESSION['panier']['prix'][$i] . "</td>";
		echo "</tr>";
	}
    echo "<form method='post'>";
    echo "<input type = 'submit' name = 'vider' value = 'vider le panier'/>";
    echo "</form>";

    if (isset($_POST['vider'])) {
        echo "good";    
    }
}
?>
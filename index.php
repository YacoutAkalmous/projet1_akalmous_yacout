<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./css/style.css" rel="stylesheet">
</head>

<body>

    <?php
    require_once("./header.php");
    $page = 'nothing';
    $refCat = 'nothing';
    $sous_page = 'Rien'; 
	//------création du panier------

	if (!isset($_SESSION['panier']))
	{
	   $_SESSION['panier']=array();
	   $_SESSION['panier']['refproduit'] = array();
	   $_SESSION['panier']['nom'] = array();
	   $_SESSION['panier']['quantite'] = array();
	   $_SESSION['panier']['prix'] = array();
	}
        require_once("./accueil.php");

        ?>
    <!-- <a href="admin.php">GotoAdmin</a> -->




    <?php 
    require_once("./footer.php");
?>





</body>

</html>
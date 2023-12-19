<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {
        margin: 0px;

    }

    .containerDisplayAdmin {
        width: 100%;
        height: 100%;
    }

    .box {
        width: 200px;
        display: inline;
        margin-left: 50px;

    }

    .box button {
        width: 30%;
        height: 30px;
        margin-top: 10px;
    }

    .add {
        background-color: green;
        border: 0px;
        height: 30px;
        margin-left: 5px;
        margin-top: 5px;
    }

    .remove {
        background-color: red;
        border: 0px;
        height: 30px;
        margin-left: 5px;
        margin-top: 10px;
    }
    </style>
</head>

<body>

    <!-- <button>Azara bazara</button><input type="submit" value="Ajouter" class="add" name="btnAd"><input
                type="submit" value="Retirer" class="remove" name="btnAd">
            <button>Azara bazara</button><input type="submit" value="Ajouter" class="add"><input type="submit"
                value="Retirer" class="Remove"> -->


    <div class="containerDisplayAdmin">
        <div class="box">
            <?php
        
                  require_once("./model/connexion.php");
                  $req = "SELECT * From produits ";
                  $res = $conn->query($req);
                  while($v = $res->fetch_assoc()){
                    echo "<form METHOD='get' action='gestionProduitItem.php'>";
                    echo "<input type= 'hidden' value='".$v["refproduit"]."' name='hidden'/>";
                    echo "<button>".$v["nom"]."</button><button>".$v["marque"]."</button><input type='submit' value='Modifier' class='add' name='btnAd'><input
                    type='submit' value='supprimer' class='remove' name='remove'>";
                    echo "</form> <br>";
                  }

    
    ?>
        </div>


        <?php 

        ?>
    </div>
</body>

</html>
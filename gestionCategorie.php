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
        width: 70%;
        height: 30px;
        margin-top: 10px;
    }

    .box input[type=text] {
        width: 70%;
        height: 30px;
        margin-top: 10px;
    }

    .ajouter {
        background-color: blue;
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
        margin-top: 5px;
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
                  $req = "SELECT * From categories ";
                  $res = $conn->query($req);
                  while($v = $res->fetch_assoc()){
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='id' value = ".$v["refcategorie"].">";
                    echo "<button>".$v["typecat"]."</button><input
                    type='submit' value='Retirer' class='remove' name='remove'>";
                    echo "</form>";
                  }
                  echo "<form method='post'>";
                  echo "<input type='text' name='categorie' placeholder = 'ajouter une nouvelle categorie'> <input type='submit' name='ajouter' class='ajouter'>";
                  echo "</form>";    
                  if (isset($_POST["ajouter"])) {
                    $refCat = "CAT";
                    $categorie = $_POST["categorie"];
                    $req = "INSERT INTO categories VALUES('$refCat','$categorie','Homme')";
                    $res = $conn->query($req);
                    echo "nouvel ajout !";
            
                }else if (isset($_POST["remove"])){
                    $req = "DELETE FROM categorie
                    WHERE refcategorie = '".$_POST['id']."'";
                    $res = $conn->query($req);
                    echo "categorie supprimee!";
                }
    ?>
        </div>


    </div>
</body>

</html>
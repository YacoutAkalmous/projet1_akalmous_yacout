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
                value="Retirer" class="remove"> -->


    <div class="containerDisplayAdmin">
        <div class="box">

            <?php
                  require_once("./model/connexion.php");
                  $req = "SELECT * From user Where statut = 'defaultAdmin'";
                  $res = $conn->query($req);
                  while($v = $res->fetch_assoc()){
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='id' value = ".$v["refUser"].">";
                    echo "<button>".$v["userName"]."</button><input type='submit' value='Ajouter' class='add' name='btnAd'><input
                    type='submit' value='Retirer' class='remove' name='remove'>";
                    echo "</form>";
                  }
                  if (isset($_POST["btnAd"])) {
                    $req = "UPDATE user
                    SET statut = 'Admin'
                    WHERE refUser = '".$_POST["id"]."'";
                    $res = $conn->query($req);
                    echo "nouvel admin !";
            
                }else if (isset($_POST["remove"])){
                    $req = "DELETE FROM user
                    WHERE refUSer = '".$_POST['id']."'";
                    $res = $conn->query($req);
                    echo "user supprime!";
                }
    ?>
        </div>


    </div>
</body>

</html>
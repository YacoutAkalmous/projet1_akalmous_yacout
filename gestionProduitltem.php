<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
* {
    box-sizing: border-box
}

html,
body {
    font-family: "Lato", sans-serif;
    height: 100%;
    margin: 0;
}

/* Style the tab */
.tab {
    float: left;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    width: 30%;
    height: 100%;
}

/* Style the buttons inside the tab */
.tablinks {
    display: block;
    background-color: inherit;
    color: black;
    padding: 22px 16px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of button on hover */
.tab .tablinks:hover {
    background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab .tablinks.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    float: left;
    border: 1px solid #ccc;
    width: 70%;
    height: 100%;
    border-left: none;
    text-align: center;
}

.footer {
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: rgb(0, 0, 0);
    color: white;
    text-align: center;
    height: 70px;

}

.topnav {
    width: 100%;
    height: 50px;
    margin-bottom: 20px;
    background-color: black;
    text-align: center;
    color: white;
    font-family: adelia;
    padding-top: 10px;
    font-size: 17px;
}

input[type=text],
[type=password],
[type=email] [type=hidden] {
    width: 100%;
    padding: 12px 0px;
    margin: 8px 0;
    border: none;
    border-bottom: 2px solid gray;
}

select {
    width: 100%;
    padding: 12px 0px;
    border: none;
    border-radius: 4px;
    background-color: #f1f1f1;
}

textarea {
    width: 100%;
    padding: 12px 0px;
}

input[type=submit] {
    width: 100%;
    text-align: center;
    height: 50px;
    background-color: #f4511e;
    padding: 12px 0px;
    margin: 8px 0;
    border: none;
    border-bottom: 2px solid gray;
}

img {
    margin: auto;
}
</style>

<body>
    <?php 
       require_once("./header.php");
       session_start();
    ?>
    <?php 
                require_once("./model/connexion.php");
        if (isset($_GET["btnAd"])) {


            $id = $_GET["hidden"];
            $req = "SELECT * From produits Where refproduit = '".$id."'";
            $res = $conn->query($req);
            while($v = $res->fetch_assoc()){
            echo '<img src="' .$v["photo"]. '" width="200px" height="200px"/>';
              echo "<form method='post' enctype='multipart/form-data'>";
              echo "<table border='0' width='400px' align='center' cellpadding='10px'>
              <tr>
                  <td align='left'>
                      <b><label>refProduit</label></b>
                  </td>
                  <td>
                      <input type='text' name='id' value = ".$_GET["hidden"]." disabled>
                  </td>
              </tr>
              <tr>
                  <td align='left'>
                      <b><label>Type produit</label></b>
                  </td>
                  <td>
                      <input type='text' name='typeprod'  value = '".$v['typeprod']."' required>
                  </td>
              </tr>
              <tr>
                  <td align='left'>
                      <b><label>Marque</label></b>
                  </td>
                  <td>
                      <input type='text' name='marque'  value = '".$v['marque']."' required>
                  </td>
              </tr>
              <tr>
                  <td align='left'>
                      <b><label>nom</label></b>
                  </td>
                  <td>
                      <input type='text' name='nom'  value = '".$v['nom']."' required>
                  </td>
              </tr>
              <tr>
              <td align='left'>
                  <label>Description</label>
              </td>
              <td>
                  <textarea name='Description'>".$v['Description']."</textarea>
              </td>
          </tr>
          <tr>
          <td align='left'>
              <label>Photo</label>
          </td>
          <td>
              <input type='file' name='photo'>
          </td>
      </tr>
              <tr>
                  <td align='left'>
                      <b><label>Taille</label></b>
                  </td>
                  <td>
                      <input type='text' name='taille'  value = '".$v['taille']."' required>
                  </td>
              </tr>
              <tr>
                  <td align='left'>
                      <b><label>Taille</label></b>
                  </td>
                  <td>
                      <input type='text' name='quantite'  value = '".$v['quantite']."' required>
                  </td>
              </tr>
              <tr>
                  <td align='left'>
                      <b><label>Prix</label></b>
                  </td>
                  <td>
                      <input type='number' name='prix'  value = '".$v['prix']."' required>
                  </td>
              </tr>
              <tr>
                  <td align='left'>
                      <b><label>Couleur</label></b>
                  </td>
                  <td>
                      <input type='text' name='couleur'  value = '".$v['couleur']."' required>
                  </td>
              </tr>
              <tr>
              <td colspan=2 align='center'>
                  <input type='submit' name='Envoyer'>
              </td>
          </tr>
          </table>
      </form>";
              echo "</form>";
            }

            if (isset($_POST["Envoyer"])) {
	$typeprod = $_POST['typeprod'];
	$marque = $_POST['marque'];
	$nom = $_POST['nom'];
	$Description = $_POST['Description'];
	$quantite = $_POST['quantite'];
	$prix = $_POST['prix'];
	$taille = $_POST['taille'];
	$couleur = $_POST['couleur'];
    if (isset($_FILES['photo']['name'])) {
        $cheminAbsolue = $_SERVER['DOCUMENT_ROOT']."/test/"."assets/items/".$_FILES['photo']['name']; // me permet juste de faire une copie 
        $cheminRelatif = "./assets/items/".$_FILES['photo']['name']; // le lien qui aura dans la base
        copy($_FILES['photo']['tmp_name'],$cheminAbsolue);
        $req = "UPDATE produits
        SET typeprod = '".$typeprod."' , marque = '".$marque."'
        , nom = '".$nom."' , Description = '".$Description."'
        , photo = '".$cheminRelatif."' , taille = '".$taille."'
        , quantite = '".$quantite."'
        , prix = '".$prix."' , couleur = '".$couleur."'
        WHERE refproduit = '".$id."'";
        $res = $conn->query($req);
        echo "<h1>information modifiee</h1>";
    }      
          }

        }else if($_GET["remove"]){
            $req = "DELETE FROM produits
            WHERE refproduit = '".$_GET["hidden"]."'";
            $res = $conn->query($req);
            echo "produits supprime!";
        }



?>










    </div>
    <?php
       require_once("./footer.php");   
    ?>
</body>

</html>
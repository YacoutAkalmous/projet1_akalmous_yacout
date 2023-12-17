<!-- <input type="submit" name="displayItems" value="t-shirt">
          <input type="submit" name="displayItems" value="sous page 2 de 1"> -->
          <?php 
if ($page != 'nothing') {
        echo "<form METHOD='post'>";
            $req = "SELECT * FROM rubriques WHERE refRubrique = '$page'";
            $res = $conn->query($req);
            //echo "Good";
            // echo "<tr>";
            while ($t = $res->fetch_assoc()) {
               $array = explode("/",$t["rubrique"]);
            }
            foreach ($array as $i => $value) {
                if ($page == 'Homme') {
                    $class= $array[$i].'_homme';
                    echo "<input type='submit' name='displayItems' class='hover' value='".$array[$i]."' id = '".$class."'>";                  
                }else if ($page == 'Femme') {
                    $class= $array[$i].'_femme';
                    echo "<input type='submit' name='displayItems' class='hover' value='".$array[$i]."' id = '".$class."'>";                 
                }else{
                    $class= $array[$i].'_others';
                    echo "<input type='submit' name='displayItems' class='hover' value='".$array[$i]."' id = '".$class."'>";  
                }

            }
        }else{
            $sous_page = 'Rien';
        }

echo "</form>";
    if (isset($_POST['displayItems'])) {
        $sous_page=$_POST['displayItems'];
        //include_once("./execution.php");
     //  echo "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    ?>
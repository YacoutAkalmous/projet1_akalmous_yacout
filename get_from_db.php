<?php 
        require_once("./model/connexion.php");
        // if ($good==true) {
            $req = "SELECT * FROM categories";
            $res = $conn->query($req);
            //echo "good";
            // echo "<tr>";
            while ($t = $res->fetch_assoc()) {
                echo "<a href='index.php?lien=".$t["typecat"]."'>".$t["typecat"]."</a>";
            }
            // echo "</tr>";
        // }

?>
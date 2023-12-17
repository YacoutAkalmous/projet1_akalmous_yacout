<?php 
session_start();
if (isset($_POST['Envoyer'])) {
        require_once("./connexion.php");
		$userMail = $_POST['userMail'];
        $userName = $_POST['userName'];
        $statut = $_POST['statut'];
        if ($statut == "Admin") {
            $statut = "defaultAdmin";
        }
        $pwd = $_POST['pwd'];
        $req = "SELECT * From user Where userMail = '$userMail' or userName = '$userName'";
        $res = $conn->query($req);
        $v = $res->fetch_assoc();
        if ($v) {
            if ($v["userMail"] == $userMail) {
                $_SESSION["error"] = "usermail deja utilise ";
            }
            if ($v["userName"] == $userName){
                $_SESSION["error"] = "username deja utilise ";
            }        
            header("Location: http://localhost/test/signUp.php") ;          
        }else{
            $req = "INSERT INTO user(userName,userMail,passwordU,statut) VALUES ('$userName','$userMail','$pwd','$statut')";
            $res = $conn->query($req);
            if ($res) {
                header("Location: http://localhost/test/login.php");
            }
        }

  
}


?>
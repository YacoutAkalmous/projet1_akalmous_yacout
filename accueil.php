<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/style.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="ntopnav">
        <div class="menu">
            <a href="index.php">Accueil</a>
            <?php 
            require("./get_from_db.php");
            if (isset($_GET['lien'])) {
                switch ($_GET['lien']) {
                    case 'Homme':
                        $refCat = 'CATH';
                        $page = 'Homme';
                        break;
                    case 'Femme':
                        $refCat = 'CATF';
                        $page = 'Femme';
                        break;
                    case 'Enfant':
                        $refCat = 'CATE';
                        $page = 'Enfant';
                            break;
                    case 'Bebe':
                        $refCat = 'CATB';
                        $page = 'Bebe';
                            break;
                    default:
                        $page = 'nothing';
                        break;
                }
            } 
            ?>
        </div>
        <div class="search-container">
            <form method="post">
                <input type="text" placeholder="Search.." name="search" class="searchBar">
                <button type="submit" class="buttonSearch"></button>
            </form>
            <div class="menuGestion">
                <form method="POST">
                    <?php 
                session_start();
                if (isset($_SESSION["userName"])) {
                    echo "
                    <button class='btnMenu' id='basket' name='basket'></button>
                    <button class='btnMenu' id='sortir' name='sortir'>Sortir</button>
                    <button class='btnMenu' id='nameU'>".$_SESSION["userName"]."</button>";
                }else{
                    echo "<button class='btnMenu' id='basket' name='basket'></button>
                    <button class='btnMenu' id='login' name='login'>Login</button>
                    <button class='btnMenu' id='login' name='signUp'>Sign up</button>";
                }
                
                ?>
                </form>
            </div>
            <?php 

if (isset($_POST['login'])) {
    header("Location: http://localhost/test/login.php") ;
    
}else if (isset($_POST['signUp'])){
    header("Location: http://localhost/test/signUP.php") ;
}else if (isset($_POST['sortir'])){
    unset($_SESSION["userName"]);
    header("Location: http://localhost/test/index.php") ;
}else if(isset($_POST["basket"])){
    header("Location: http://localhost/test/affichPanier.php") ;
}
                ?>

        </div>

        <!-- <p class="menuGestion">FER</p> -->

    </div>
    <div class="ftopnav">
        <?php 
                require_once("./exec.php");
            ?>
    </div>
    <div class="handleePage">
        <?php          
            require_once("./execution.php");
            ?>
    </div>
</body>

</html>
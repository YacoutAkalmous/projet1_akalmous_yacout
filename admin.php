<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    /* Change background color of buttons on hover */
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
        position: fixed;
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
    </style>
</head>

<body>

    <?php 
       require_once("./header.php");
       session_start();
    ?>

    <div class="tab">
        <form method="get">
            <input type="submit" value="Ajouter un admin" class="tablinks" name="admin">
            <input type="submit" value="Ajouter une categorie" class="tablinks" name="categorie">
            <input type="submit" value="Gerer des produits" class="tablinks" name="produits">
        </form>
    </div>

    <div id="London" class="tabcontent">
        <?php 
        
        if (isset($_GET["admin"])) {
            include_once("./gestionAdmin.php");
        }else if(isset($_GET["categorie"])){
            include_once("./gestionCategorie.php");
        }else if(isset($_GET["produits"])){
            include_once("./gestionProduit.php");
        }else{

        }
        
        ?>
    </div>
    <?php
       require_once("./footer.php");   
    ?>

</body>

</html>
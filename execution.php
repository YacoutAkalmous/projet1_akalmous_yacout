<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    .global_Container {
        background-color: rgb(255, 255, 255);
        top: 100px;
        /* width: 1450px; */
        width: 100%;
        height: 100%;
        bottom: 0px;
        margin-top: 150px;
        margin-left: auto;
        margin-right: auto;
    }

    .trending_container {
        display: inline;
        width: 100%;
    }

    .containerB {
        margin-top: 20px;
        float: left;
        width: 210px;
        height: 260px;
        border: 0px solid gray;
        border-radius: 5px;
        display: block;
        margin-right: 20px;
        background-color: white;
        box-shadow: 12px 8px 21px 0px rgba(0, 0, 0, 0.50);
        text-align: center;
    }

    .header_container {
        height: 50%;
        width: 100%;
        border: 0px solid gray;
        text-align: center;
        font-family: 'Corinthia', arial;
        font-size: 28px;
        text-shadow: 4px 4px 4px #aaa;
    }

    .main_container {
        width: 100%;
        border: 0px solid gray;
    }

    .footer_container {
        height: 6%;
        width: 100%;
        border: 0px solid gray;
    }

    .color {
        width: 20px;
        height: 20px;
        border-radius: 50px;
    }

    .color:hover {
        width: 22px;
        height: 22px;
    }



    img:hover {
        width: 100%;
        height: 100%;
        animation-name: rota;
        animation-duration: 2s;
        animation-iteration-count: infinite;
    }

    /* @keyframes rota {
	0% {
		transform: rotate(-10deg);
	}

	25% {
		transform: rotate(10deg);
	}

	50% {
		transform: rotate(0deg);
	}

	105% {
		transform: rotate(10deg);
	}
} */
    @keyframes rota {
        0% {
            transform: scale(1, 1);
        }

        50% {
            transform: scale(1.05, 1.05);
        }

        100% {
            transform: scale(1, 1);
        }
    }


    .header_container:hover {
        animation-name: bck;
        animation-duration: 4s;
        animation-iteration-count: infinite;
    }

    .btn {
        background-color: #f4511e;
        border: none;
        color: white;
        padding: 8px 22px;
        text-align: center;
        font-size: 16px;
        opacity: 0.6;
        transition: 0.3s;
        width: 100%;
        height: 100%;
    }

    @keyframes bck {
        from {
            background-color: white;
        }

        to {
            background-color: gray;
        }
    }

    @keyframes tx_slide {
        from {
            top: 85px;
            left: 87px;
        }

        to {
            top: 85px;
            left: 90px;
        }
    }

    #b {
        background-color: blue;
    }

    #gr {
        background-color: green;
    }

    #g {
        background-color: gold;
    }

    #pi {
        background-color: pink;
    }

    #r {
        background-color: red;
    }

    #p {
        background-color: purple;
    }

    table {
        text-align: left;

    }
    </style>
</head>

<body>
    <div class="global_Container">
        <?php 
        if ($sous_page == "Rien" && $refCat =='nothing') {
            $req = "SELECT * FROM produits";
            $res = $conn->query($req);
            echo "<div class='trending_container'>";
            while ($t = $res->fetch_assoc()) {
                echo "
                <form method='post' action = 'panier.php'>
                <div class='containerB'>
                
                <div class='header_container'>
                <img src='".$t["photo"]."' width='99%' height='99%'>
            </div>
            <div class='main_container'>
                <table width='100%' height='100%'>
                    <tr>
                        <td valign='top'>
                            <b>
                                <font size='4.5px'>".$t["nom"]."</font> <br />
                                <input type ='hidden' name = 'nom' value = '".$t["nom"]."'/>
                            </b>
                            <font size='2px' color='gray'>".$t["Description"]."</font>
                        </td>
                         <td valign='top'>
                         <font size='3px' color='gray'>".$t["prix"]."</font>
                         <input type ='hidden' name = 'prix' value = '".$t["prix"]."'/>
                        </td> 
                    </tr>
                    <tr>
                        <td>
                            <b>
                                <font size='4'>Sizes</font><br />
                            </b>
                            <font size='2' color='gray'>".$t["taille"]."</font>
                        </td>
                    </tr>
                    <tr colspan='2'>
                        <td>
                        <input type = 'hidden' name = 'id' value = '".$t["refproduit"]."'/>
                            <button class='btn' type='submit' name = 'ajouter'>Ajouter</button>
                        </td>
                    </tr>
                </table>
                
            </div>
            
            </div>
            </form>";
            }
            echo "    </div>";       
        }else if ($sous_page == "Rien" && $refCat !='nothing'){
            $req = "SELECT * FROM produits WHERE refcategorie = '$refCat'";
            $res = $conn->query($req);
            echo "<div class='trending_container'>";
            while ($t = $res->fetch_assoc()) {
                echo "
                <form method='post' action = 'panier.php'>
                <div class='containerB'>
                <div class='header_container'>
                <img src='".$t["photo"]."' width='99%' height='99%'>
            </div>
            <div class='main_container'>
                <table width='100%' height='100%'>
                    <tr>
                        <td valign='top'>
                            <b>
                                <font size='4.5px'>".$t["nom"]."</font> <br />
                                <input type ='hidden' name = 'nom' value = '".$t["nom"]."'/>
                            </b>
                            <font size='2px' color='gray'>".$t["Description"]."</font>
                        </td>
                         <td valign='top'>
                         <font size='3px' color='gray'>".$t["prix"]."</font>
                         <input type ='hidden' name = 'prix' value = '".$t["prix"]."'/>
                        </td> 
                    </tr>
                    <tr>
                        <td>
                            <b>
                                <font size='4'>Sizes</font><br />
                            </b>
                            <font size='2' color='gray'>".$t["taille"]."</font>
                        </td>
                    </tr>
                    <tr colspan='2'>
                        <td>
                        <input type = 'hidden' name = 'id' value = '".$t["refproduit"]."'/>
                        <button class='btn' type='submit' name = 'ajouter'>Ajouter</button>
                        </td>
                    </tr>
                </table>
                
            </div>
            </div>
            </form>";
            }
            echo "    </div>";
        }
        else{
            $req = "SELECT * FROM produits WHERE typeprod = '$sous_page' AND refcategorie = '$refCat'";
            $res = $conn->query($req);
            echo "<div class='trending_container'>";
            while ($t = $res->fetch_assoc()) {
                echo "
                <form method='post' action = 'panier.php'>
                <div class='containerB'>
                <div class='header_container'>
                <img src='".$t["photo"]."' width='99%' height='99%'>
            </div>
            <div class='main_container'>
                <table width='100%' height='100%'>
                    <tr>
                        <td valign='top'>
                            <b>
                                <font size='4.5px'>".$t["nom"]."</font> <br />
                                <input type ='hidden' name = 'nom' value = '".$t["nom"]."'/>
                            </b>
                            <font size='2px' color='gray'>".$t["Description"]."</font>
                        </td>
                         <td valign='top'>
                         <font size='3px' color='gray'>".$t["prix"]."</font>
                         <input type ='hidden' name = 'prix' value = '".$t["prix"]."'/>
                        </td> 
                    </tr>
                    <tr>
                        <td>
                            <b>
                                <font size='4'>Sizes</font><br />
                            </b>
                            <font size='2' color='gray'>".$t["taille"]."</font>
                        </td>
                    </tr>
                    <tr colspan='2'>
                        <td>
                        <input type = 'hidden' name = 'id' value = '".$t["refproduit"]."'/>
                        <button class='btn' type='submit' name = 'ajouter'>Ajouter</button>
                        </td>
                    </tr>
                </table>
                
            </div>
            </div>
            </form>";
            }
            echo "     </div>";
        }
       
        ?>
    </div>
    <?php 



?>
</body>

</html>
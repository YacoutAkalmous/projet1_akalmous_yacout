<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="./css/styles.css" rel="stylesheet"> -->
    <title>Document</title>
    <style>
    .box {
        margin: auto;
        width: 500px;
    }

    body {
        text-align: center;
        margin: 0px;
        font-family: Arial, Helvetica, sans-serif;
        background-color: rgb(241, 241, 241);
    }

    input[type=text],
    [type=password],
    [type=email] {
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
        height: 30px;
        background-color: black;
        text-align: center;
        color: white;
        font-family: adelia;
        padding-top: 10px;
        font-size: 17px;
    }

    .error {
        color: red;
    }
    </style>
</head>

<body>
    <?php 
       require_once("./header.php");
       session_start();
    ?>
    <form action="./model/insertion.php" method="post">
        <h2>Formulaire de creation de compte</h2>
        <table border="0" width="400px" align="center" cellpadding="10px">
            <tr>
                <td align="left">
                    <b><label>Mail address</label></b>
                </td>
                <td>
                    <input type="email" name="userMail" placeholder="votre adresse mail" required>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <b><label>Username</label></b>
                </td>
                <td>
                    <input type="text" name="userName" placeholder="votre user name" required>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <b><label>Statut</label></b>
                </td>
                <td>
                    <select name="statut" required>
                        <option value="Admin">Admin</option>
                        <option value="Client">
                            Client</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <b><label>Password</label></b>
                </td>
                <td>
                    <input type="password" name="pwd" placeholder="votre mot de passe" required>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <a href="login.php">
                        <P>deja client ? Connectez vous ici</P>
                    </a>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="Envoyer">
                </td>
            </tr>
        </table>
    </form>
    <?php 
            if (isset($_SESSION["error"])) {
                echo "<h5 class='error'>".$_SESSION["error"]."</H5>";
                unset($_SESSION["error"]);
            }
        ?>
    <?php
       require_once("./footer.php");   
    ?>
</body>

</html>
<?php
include_once 'includes/session.php';
?>


<!DOCTYPE html>
<html>
<title>VVA - <?php echo $title ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php //call css file php
require_once('includes/css.php');

?>

<body class="w3-light-grey">



    <!-- Navigation Bar -->
    <div class="w3-bar w3-white w3-large w3-top w3-light-grey">
        <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-red w3-theme-d4 w3-hover-white w3-large w3-theme-d2"><i class="fa fa-home w3-margin-right"></i>VVA</a>
        <?php
        if ($title == "Home") {
            echo "<a href='#rooms' class='w3-bar-item w3-button w3-padding-large w3-theme-d4'>Rooms</a>";
        }

        if (isset($_SESSION['login'])) {
        ?>

            <?php if ($_SESSION['typecompte'] == "adm") { ?>
                <a href='manage_rental.php' class='w3-bar-item w3-button w3-padding-large w3-theme-d4'>Gerer Hebergement </a>
                <a href='add_rental.php' class='w3-bar-item w3-button w3-padding-large w3-theme-d4'>Ajouter </a>
            <?php } elseif ($_SESSION['typecompte'] == "usr") {
                echo "<a href=mes_reservations' class='w3-bar-item w3-button w3-padding-large w3-theme-d4'>Mes Reservations</a>";
            }
            ?>
            <a class="w3-bar-item w3-button  w3-hide-small w3-right w3-padding-large w3-hover-white" href="logout.php">Logout </a>
            <a class="w3-bar-item w3-button  w3-hide-small w3-right w3-padding-large w3-hover-white" href=""><span>Hello !<?php echo $_SESSION['login'] ?></span> </a>
            <a class="w3-bar-item w3-button  w3-hide-small w3-right w3-padding-large w3-hover-white" href=""><span>mesRes

                </span> </a>

        <?php }
        if (empty($_SESSION['login'])) { ?>
            <a href="#" onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="w3-bar-item w3-button  w3-hide-small w3-right w3-padding-large w3-hover-white" title="Login">
                <img src="uploads/blank.png" class="w3-circle" style="height:23px;width:23px" alt="Avatar">
            </a>
        <?php
        }
        ?>


    </div>

    <?php //apple du fichier d'authentification 
    include('login.php');
    ?>
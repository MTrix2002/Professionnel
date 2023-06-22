<?php
include_once 'includes/session.php';
$title  = "rental";
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
<?php
require_once('includes/css.php');
require_once 'db/conn.php';

$hebergement = $crud->getHebergementById($_GET['id']);
?>

<body class="w3-content w3-border-left w3-border-right">


    <nav class="w3-sidebar w3-light-grey w3-collapse w3-top" style="z-index:3;width:260px" id="mySidebar">
        <div class="w3-container w3-display-container w3-padding-16">
            <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-transparent w3-display-topright"></i>
            <h3><?php echo $hebergement["NOMHEB"]; ?></h3>
            <h3>from $<?php echo $hebergement['TARIFSEMHEB'] ?></h3>
            <h6>per week</h6>
            <hr>
            <form action=" " target="_blank">
                <p><label><i class="fa fa-calendar-check-o"></i> Check In</label></p>
                <select class="w3-input w3-border" name="DateIn" id="type">
                    <?php
                    $semaine = $crud->GetSemaine();
                    if (!$semaine) {
                        echo '<option value="null"> Nodata</option>';
                    } else {
                        var_dump($semaine);
                        $i = 1;
                        foreach ($semaine as $key => $value) {
                            $datefinsem = $value['DATEFINSEM'];
                            $datedebutsem = $value['DATEDEBSEM'];
                            echo "<option value='$datefinsem'> S$i: $datedebutsem /  $datefinsem </option>";
                            //echo "<option value=''>" . $value['DATEFINSEM'] . "</option>";
                            $i++;
                        }
                    }

                    ?>
                </select>
                <p><button class="w3-button w3-block w3-red w3-left-align" type="submit"><i class="fa fa-search w3-margin-right"></i> Validé </button></p>
            </form>
        </div>
        <div class="w3-bar-block">
            <a href="#apartment" class="w3-bar-item w3-button w3-padding-16"> <i class="fa fa-home"></i><?php $type = $crud->getTypeHebById($hebergement['CODETYPEHEB']);

                                                                                                        echo $type['NOMTYPEHEB'];  ?></a>
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-16" onclick="document.getElementById('subscribe').style.display='block'"><i class="fa fa-rss"></i> Subscribe</a>
            <a href="#contact" class="w3-bar-item w3-button w3-padding-16"><i class="fa fa-envelope"></i> Contact</a>
        </div>
    </nav>

    <!-- Top menu on small screens -->
    <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
        <span class="w3-bar-item">Hebergement</span>
        <a href="javascript:void(0)" class="w3-right w3-bar-item w3-button" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    </header>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main w3-white" style="margin-left:260px">

        <!-- Navbar/menu -->


        <div class="w3-bar w3-white w3-large">
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

            <?php }
            if (empty($_SESSION['login'])) { ?>
                <a href="#" onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="w3-bar-item w3-button  w3-hide-small w3-right w3-padding-large w3-hover-white" title="Login">
                    <img src="uploads/blank.png" class="w3-circle" style="height:23px;width:23px" alt="Avatar">
                </a>
            <?php
            }
            ?>
        </div>

        <!-- Push down content on small screens -->
        <div class="w3-hide-large" style="margin-top:80px"></div>

        <div class="w3-container" id="apartment">
            <h2 class="w3-text-red"></h2>
            <div class="w3-display-container mySlides">
                <img src="<?php echo $hebergement['PHOTOHEB'] ?>" style="width:100%;margin-bottom:-6px">
                <div class="w3-display-bottomleft w3-container w3-black">
                    <p>Living Room</p>
                </div>
            </div>
        </div>
        <div class="w3-row-padding w3-section">
            <div class="w3-col s3">
                <img class="demo w3-opacity w3-hover-opacity-off" src="<?php echo $hebergement['PHOTOHEB'] ?>" style="width:100%;cursor:pointer" onclick="currentDiv(1)" title="Living room">
            </div>
        </div>

        <div class="w3-container">
            <h4><strong>The space</strong></h4>
            <div class="w3-row w3-large">
                <div class="w3-col s6">
                    <p><i class="fa fa-fw fa-male"></i> Max people: <?php echo $hebergement['NBPLACEHEB'] ?></p>
                    <p><i class="fa fa-fw fa-bath"></i> Bathrooms: 2</p>
                    <p><i class="fa fa-fw fa-bed"></i> Bedrooms: 1</p>
                </div>
                <div class="w3-col s6">
                    <p><i class="fa fa-fw fa-clock-o"></i> Check In: After 3PM</p>
                    <p><i class="fa fa-fw fa-clock-o"></i> Check Out: 12PM</p>
                </div>
            </div>
            <hr>

            <h4><strong>Amenities</strong></h4>
            <div class="w3-row w3-large">
                <div class="w3-col s6">
                    <p><i class="fa fa-fw fa-shower"></i> Shower</p>
                    <p><?php if ($hebergement['INTERNET']) echo '<i class="fa fa-fw fa-wifi"></i>'; ?>
                        <?php if (!$hebergement['INTERNET']) echo '<i class="fa fa-close"></i>'; ?>
                        WiFi
                    </p>
                    <p><i class="fa fa-fw fa-tv"></i> TV</p>
                </div>
                <div class="w3-col s6">
                    <p><i class="fa fa-fw fa-cutlery"></i> Kitchen</p>
                    <p><i class="fa fa-fw fa-thermometer"></i> Heating</p>
                    <p><i class="fa fa-fw fa-wheelchair"></i> Accessible</p>
                </div>
            </div>
            <hr>
            <h4><strong>Extra Info</strong></h4>
            <p>Our apartment is really clean and we like to keep it that way. Enjoy the lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p>We accept: <i class="fa fa-credit-card w3-large"></i> <i class="fa fa-cc-mastercard w3-large"></i> <i class="fa fa-cc-amex w3-large"></i> <i class="fa fa-cc-cc-visa w3-large"></i><i class="fa fa-cc-paypal w3-large"></i></p>
            <hr>

            <h4><strong>Rules</strong></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p>Subscribe to receive updates on available dates and special offers.</p>
            <p><button class="w3-button w3-red w3-third" onclick="document.getElementById('subscribe').style.display='block'">Subscribe</button></p>
        </div>
        <hr>

        <div class="w3-container" id="contact">
            <h2>Contact</h2>
            <i class="fa fa-map-marker" style="width:30px"></i> Chicago, US<br>
            <i class="fa fa-phone" style="width:30px"></i> Phone: +00 151515<br>
            <i class="fa fa-envelope" style="width:30px"> </i> Email: mail@mail.com<br>
            <p>Questions? Go ahead, ask them:</p>
            <form action="/action_page.php" target="_blank">
                <p><input class="w3-input w3-border" type="text" placeholder="Name" required name="Name"></p>
                <p><input class="w3-input w3-border" type="text" placeholder="Email" required name="Email"></p>
                <p><input class="w3-input w3-border" type="text" placeholder="Message" required name="Message"></p>
                <button type="submit" class="w3-button w3-red w3-third">Send a Message</button>
            </form>
        </div>

        <footer class="w3-container w3-padding-16" style="margin-top:32px">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-red">w3.css</a></footer>

        <!-- End page content -->
    </div>

    <!-- Subscribe Modal -->
    <div id="subscribe" class="w3-modal">
        <div class="w3-modal-content w3-animate-zoom w3-padding-large">
            <div class="w3-container w3-white w3-center">
                <i onclick="document.getElementById('subscribe').style.display='none'" class="fa fa-remove w3-button w3-xlarge w3-right w3-transparent"></i>
                <h2 class="w3-wide">SUBSCRIBE</h2>
                <p>Join our mailing list to receive updates on available dates and special offers.</p>
                <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
                <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('subscribe').style.display='none'">Subscribe</button>
            </div>
        </div>
    </div>

    <script>
        // Script to open and close sidebar when on tablets and phones
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }

        // Slideshow Apartment Images
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
            showDivs(slideIndex += n);
        }

        function currentDiv(n) {
            showDivs(slideIndex = n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            if (n > x.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = x.length
            }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
            }
            x[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " w3-opacity-off";
        }
    </script>

</body>

</html>
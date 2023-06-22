<?php
$title = "Home";
require_once('includes/header.php');

?>

<!-- Header -->
<header class="w3-display-container w3-content" style="max-width:1500px;">
    <img class="w3-image" src="uploads/1789654123.jpg" alt="The Hotel" style="min-width:1000px" width="1500" height="800">
    <div class="w3-display-left w3-padding w3-col l6 m8">
        <div class="w3-container w3-red">
            <h2><i class="fa fa-bed w3-margin-right"></i>VVA</h2>
        </div>
        <?php
        // recuperationdes donnée de la base de donnée et affiché dans les champs que va remplire l'utilisateur
        $results = $crud->gethebergements();

        ?>

        <div class="w3-container w3-white w3-padding-16">
            <form action="/action_page.php" target="_blank">
                <div class="w3-row-padding" style="margin:0 -16px;">
                    <div class="w3-half w3-margin-bottom">
                        <label><i class="fa fa-calendar-o"></i> Check In</label>
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

                    </div>
                    <div class="w3-half">
                        <label><i class="fa fa-calendar-o"></i> Type</label>
                        <select class="w3-input w3-border" name="type" id="type">
                            <?php
                            $type = $crud->getAllTypeHebergement();
                            if (!$type) {
                                echo '<option value="null"> Nodata</option>';
                            } else {
                                $i = 1;
                                foreach ($type as $key => $value) {
                                    $nomtype = $value['NOMTYPEHEB'];
                                    $codetype = $value['CODETYPEHEB'];

                                    echo "<option value='$codetype'> $nomtype </option>";
                                    $i++;
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="w3-row-padding" style="margin:8px -16px;">
                    <div class="w3-half w3-margin-bottom">
                        <label><i class="fa fa-male"></i> Adults</label>
                        <select class="w3-input w3-border" name="nbplace" id="nbplace">
                            <?php
                            $nb = $crud->GetNbPlace();
                            if (!$nb) {
                                echo '<option value="null"> Nodata</option>';
                            } else {
                                var_dump($nb);

                                foreach ($nb as $key => $value) {
                                    $nbplace = $value['NBPLACEHEB'];
                                    echo "<option value='$nbplace'> $nbplace </option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="w3-half">
                        <label><i class="fa fa-child"></i> Where</label>
                        <select class="w3-input w3-border" name="where" id="where">

                            <?php
                            $secteur = $crud->GetSecteur();
                            if (!$secteur) {
                                echo '<option value="null"> Nodata</option>';
                            } else {
                                foreach ($secteur as $key => $value) {
                                    $sec = $value['SECTEURHEB'];
                                    echo "<option value='$sec'> $sec </option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <button class="w3-button w3-dark-grey" type="submit"><i class="fa fa-search w3-margin-right"></i> Search availability</button>
            </form>
        </div>
    </div>
</header>

<!-- Page content -->
<div class="w3-content" style="max-width:1532px;">

    <div class="w3-container w3-margin-top" id="rooms">
        <h3>Rooms</h3>
        <p>Make yourself at home is our slogan. We offer the best beds in the industry. Sleep well and rest well.</p>
    </div>
</div>

<?php

$meshebergement = $crud->gethebergements();
foreach ($meshebergement as $nbligne => $hebergement) {

    if ($nbligne % 3 == 0) {
        echo '<div class="w3-row-padding w3-padding-16">';
    }


?>
    <div class="w3-third w3-margin-bottom">
        <img src="<?php echo  $hebergement['PHOTOHEB']; ?>" alt="Photo" style="width:100%">
        <div class="w3-container w3-white">
            <h3><?php echo  $hebergement['NOMHEB']; ?></h3>
            <h6 class="w3-opacity">From € <?php echo  $hebergement['TARIFSEMHEB']; ?></h6>
            <p>Place:<?php echo  $hebergement['NBPLACEHEB']; ?></p>
            <p>surface:<?php echo  $hebergement['SURFACEHEB']; ?>m<sup>2</sup></p>
            <p class="w3-large"><i class="fa fa-bath"></i> <i class="fa fa-phone"> </i> <?php if ($hebergement['INTERNET'] == true) {; ?> <i class="fa fa-wifi"></i> <?php } ?> </p>
            <a href="rental.php?id=<?php echo $hebergement['NOHEB']; ?>"> <button class="w3-button w3-block w3-black w3-margin-bottom">Choose Room</button></a>
        </div>
    </div>


<?php
    if ($nbligne % 3) {
    }
    echo "</ div>";
}
?>
</div>







<div class="w3-row-padding" id="about">
    <div class="w3-col l4 12">
        <h3>About</h3>
        <h6>Our hotel is one of a kind. It is truely amazing. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</h6>
        <p>We accept: <i class="fa fa-credit-card w3-large"></i> <i class="fa fa-cc-mastercard w3-large"></i> <i class="fa fa-cc-amex w3-large"></i> <i class="fa fa-cc-cc-visa w3-large"></i><i class="fa fa-cc-paypal w3-large"></i></p>
    </div>
    <div class="w3-col l8 12">
        <!-- Image of location/map -->
        <img src="uploads/1789654123.jpg" class="w3-image w3-greyscale" style="width:100%;">
    </div>
</div>

<div class="w3-row-padding w3-large w3-center" style="margin:32px 0">
    <div class="w3-third"><i class="fa fa-map-marker w3-text-red"></i> 423 alle des vigne, massy Fr</div>
    <div class="w3-third"><i class="fa fa-phone w3-text-red"></i> Phone: +00 151515</div>
    <div class="w3-third"><i class="fa fa-envelope w3-text-red"></i> Email: lesvacances@vva.com</div>
</div>

<div class="w3-panel w3-red w3-leftbar w3-padding-32">
    <h6><i class="fa fa-info w3-deep-orange w3-padding w3-margin-right"></i> On demand, we can offer playstation, babycall, children care, dog equipment, etc.</h6>
</div>

<div class="w3-container">
    <h3>Our Hotels</h3>
    <h6>You can find our hotels anywhere in the world:</h6>
</div>

<div class="w3-row-padding w3-padding-16 w3-text-white w3-large">
    <div class="w3-half w3-margin-bottom">
        <div class="w3-display-container">
            <img src="uploads/1789654123.jpg" alt="Cinque Terre" style="width:100%">
            <span class="w3-display-bottomleft w3-padding">Cinque Terre</span>
        </div>
    </div>
    <div class="w3-half">
        <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half w3-margin-bottom">
                <div class="w3-display-container">
                    <img src="uploads/1789654123.jpg" alt="les montagne" style="width:100%">
                    <span class="w3-display-bottomleft w3-padding">Les Alples</span>
                </div>
            </div>
            <div class="w3-half w3-margin-bottom">
                <div class="w3-display-container">
                    <img src="uploads/1789654123.jpg" alt="San Francisco" style="width:100%">
                    <span class="w3-display-bottomleft w3-padding">the holidays</span>
                </div>
            </div>
        </div>
        <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half w3-margin-bottom">
                <div class="w3-display-container">
                    <img src="uploads/1789654123.jpg" alt="Pisa" style="width:100%">
                    <span class="w3-display-bottomleft w3-padding">beach</span>
                </div>
            </div>
            <div class="w3-half w3-margin-bottom">
                <div class="w3-display-container">
                    <img src="uploads/1789654123.jpg" alt="Paris" style="width:100%">
                    <span class="w3-display-bottomleft w3-padding">Fox</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="w3-container w3-padding-32 w3-black w3-opacity w3-card w3-hover-opacity-off" style="margin:32px 0;">
    <h2>Get the best offers first!</h2>
    <p>Join our newsletter.</p>
    <label>E-mail</label>
    <input class="w3-input w3-border" type="text" placeholder="Your Email address">
    <button type="button" class="w3-button w3-red w3-margin-top">Subscribe</button>
</div>

<div class="w3-container" id="contact">
    <h2>Contact</h2>
    <p>If you have any questions, do not hesitate to ask them.</p>
    <i class="fa fa-map-marker w3-text-red" style="width:30px"></i> Parid, FR<br>
    <i class="fa fa-phone w3-text-red" style="width:30px"></i> Phone: +00 0123456789<br>
    <i class="fa fa-envelope w3-text-red" style="width:30px"> </i> Email: lesvacances@vva.com<br>
    <form action="/action_page.php" target="_blank">
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name"></p>
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Email" required name="Email"></p>
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message" required name="Message"></p>
        <p><button class="w3-button w3-black w3-padding-large" type="submit">SEND MESSAGE</button></p>
    </form>
</div>

<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-padding-32 w3-black w3-center w3-margin-top">
    <h5>Find Us On</h5>
    <div class="w3-xlarge w3-padding-16">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
    </div>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

<!-- Add Google Maps -->
<script>
    function myMap() {
        myCenter = new google.maps.LatLng(41.878114, -87.629798);
        var mapOptions = {
            center: myCenter,
            zoom: 12,
            scrollwheel: false,
            draggable: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

        var marker = new google.maps.Marker({
            position: myCenter,
        });
        marker.setMap(map);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>

</html>
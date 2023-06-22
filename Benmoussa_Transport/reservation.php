<html>
    <head>
        <meta charset="utf-8">
        <title>Benmoussa Transport</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>

        <link rel = "icon" href = "images/logo.png" type = "image/png">
    <script async src='/cdn-cgi/bm/cv/669835187/api.js'></script></head>
    <body>

     <!-- header -->
     <header class = "header" id = "header" style="margin:0;
     padding:0; background-position:15% 5%;">
     <link rel = "icon" href = "images/logo.png" type = "image/png">
     
        
        <div class = "head-top" >
         
            <div class = "site-name" style="margin:0;
            padding:0;">
                 <span style="margin:0;
                 padding:0;">Benmoussa Transport</span>
             </div>
             <div class = "navbar" style="margin:0;padding:0;  height: 70px; line-height: 70px;float: right;">
                <li><a href="reservation.html" style="font-size: 95%;">Réserver<div>(Devis)</div></a></li>
                <li><a href="index.html">Accueil</a></li>
                 <li><a href= "services.html">Services</a></li>              
                 <li><a href="contact.html">Contact</a></li>
                    
             </div>
         </div>
            <div class = "head-bottom flex">
            <h1>Réservation (Devis)</h1>
            <img src = "r.jpg" alt = "reservation image" style="width: 300px; height:90%;">

            <h3> Si vous souhaitez faire une réservation vous pouvez trouver mes coordonnées sur la page <a href ="contact.html" style="color:#FAFAD2;text-decoration: none;">Contact</a> ou remplir le formulaire ci-dessous
                <br/> <br/>
          
            <div>
                <form action="" method="post">
                    <label for="reservation">Demande de Réservation:</label>
                    <input type="text" name="reservation"><br><br>
                    <label for="Devis">Demande de Devis:</label>
                    <input type="Devis"  name="devis"><br><br>
                    <label for="Renseignement">Demande de Renseignement:</label>
                    <input type="Renseignement"  name="renseignement"><br><br>
                    <input type="submit" name="submit" style="background-color:wheat;" class="btn btn-primary" value="Envoyer">
                   
                  </form>
            </div>
            </div>
            <?php
            $servername = "localhost";
            $username = "Os";
            $password = "";
            
            try {
              $bdd = new PDO("mysql:host=$servername;dbname=benmoussa_tr", $username, $password);
              // set the PDO error mode to exception
              $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              
            } catch(PDOException $e) {
              echo "Connexion échoué: " . $e->getMessage();
            }
            if (isset($_POST['submit'])) {
                $reservation=$_POST['reservation'];
                $devis=$_POST['devis'];
                $rens=$_POST['renseignement'];
                
              
                $reqAdd="INSERT INTO `reservation`(`reservation`, `devis`, `renseignement`) VALUES (?,?,?)";
              
                $resultat=$bdd->prepare($reqAdd);
                $resultat->execute([$reservation,$devis,$rens]);
                if($resultat){
                    $nbligne =$resultat->rowCount();
                    if($nbligne>0){
                        echo "insertion des donées validés";
                    }
                    else{
                        var_dump($resultat->errorInfo());
                    }
                }
                else{
                    echo "echec d insertion des données ";
                }
              
              } 
                
            ?>


        <footer class = "footer">
            <div class = "footer-container">
                <div>
                    <h2>A propos de moi</h2>
                    <a href = "carriere.html">Carrière</a>
                    <a href = "avis.html">Avis</a>
                </div>

                <div>
                    <h2>Prestations</h2>
                    <a href = "services.html">Services</a>
                    <a href = "contact.html">Contactez-moi</a>
                </div>

                <div>
                    <h2>Avez vous des questions ?</h2>
                    <div class = "contact-item">
                        <span>
                            <i class = "fas fa-map-marker-alt"></i>
                        </span>
                        <span>
                            Palaiseau, 7 rue d'Auvergne, 91120
                        </span>
                    </div>
                    <div class = "contact-item">
                        <span>
                            <i class = "fas fa-phone-alt"></i>
                        </span>
                        <span>
                            0609722541
                        </span>
                    </div>
                    <div class = "contact-item">
                        <span>
                            <i class = "fas fa-envelope"></i>
                        </span>
                        <span>
                            benmoussa.i@icloud.com
                        </span>
                    </div>
                </div>
            </div>
        <p class="text-center">Copyright &copy; BenmoussaTransport.com</p>
</footer>
   
        <script src="script.js"></script>
    <script type="text/javascript">(function(){window['__CF$cv$params']={r:'6d6bd797982ecd93',m:'zjS0qQl763ykZqneJH18jgI9CLyVob3GljTvg1TFLxI-1643725454-0-AfbiUPMS4O8g9UwP2TqGq3oAFgyVnon7J5EUsWF28PgyfrhJQl8DI9yzgWAp8cIjZK4MnUNZch9Xdw1HvjoHHpofQEBPss7c6uQ5oKx3XQkkF+dtzvkuSYPFFwQu4+uvQTP9CXEWbTUU4VOopdDk2JFjwU2p5Tm8Y5V//ReVX5eIWd54Gch46VP9tuyCaa3H3NN+hCymlo/0xkqU0sptcnA=',s:[0xe2c2301f29,0x698cda9edf],}})();</script></body>
</html>
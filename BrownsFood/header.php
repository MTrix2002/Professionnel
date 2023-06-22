<!DOCTYPE html>
<html>
<title> Brown Burger</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="Style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-amber w3-padding w3-card" style="letter-spacing:4px;"> 
    <a href="#home" class="w3-bar-item w3-button">Brown Food</a>
    <link rel="icon" type="image/logo" href="/images/logo.png">
    <!-- Right-sided navbar links. Hide them on small screens -->
     <div class="w3-right w3-hide-small">
      <a href="#about" class="w3-bar-item w3-button">A propos</a>
      <a href="#Article" class="w3-bar-item w3-button">Articles</a>
      
      <?php  if (isset($_SESSION['USER'])){ 
              
          ?>
                <a href="#blog" class="w3-bar-item w3-button">Blog</a>
                <a href="Traitement\logout.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-red">
                
                <i class="fa fa-times" style="red;" aria-hidden="true">&nbsp;Déconnexion </i></a>
        <?php } ?>
        
              
            
   
        <?php  if (empty($_SESSION['USER'])){   ?>        
    <button class="w3-bar-item w3-button w3-hide-small" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-user"></i>&nbsp;&nbsp;Se Connecter</button>
    <?php } ?>
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px" id="home">
  <img class="w3-image" src="/w3images/hamburger.jpg" alt="Hamburger Catering" width="1600" height="800">
  <div class="w3-display-bottomleft w3-padding-large w3-opacity">
    <h1 class="w3-xxlarge">Le Catering</h1>
  </div>
</header>
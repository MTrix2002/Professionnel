<?php 
session_start();


?>

<?php include("header.php") ?>

<!-- Page content -->
<div class="w3-content" style="max-width:1100px;">

  <!-- About Section -->
  <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
    <video controls width="500" height="350">

    <source src="/media/cc0-videos/flower.webm"
        type="video/webm">

    <source src="/media/cc0-videos/flower.mp4"
        type="video/mp4">

        Désolé, votre navigateur ne prend pas en charge les vidéos intégrées.
    </video> 
    </div>

    <div class="w3-col m6 w3-padding-large" style="">
      <h1 class="w3-center">A propos de Brown's Food</h1><br>
      <h5 class="w3-center">Ouverte depuis 2017</h5>
      <p class="w3-large">Brown's Food est une entreprise qui propose des plats américains et sénegalais, elle a été créée en 2017 dans une ancienne grange à fourrage pour les chevaux. Le restaurant porte le nom de famille du fondateur de l’établissement, Monsieur Armandie.

 

A

  <span class="w3-tag w3-light-grey">Brown's Food</span></p>
      <p class="w3-large w3-text-grey w3-hide-medium">Aujourd’hui, notre chef vous propose une cuisine traditionnelle raffinée, élaborée avec des produits frais, de saison dans un décor feutré, en plein cœur de Chilly-Mazarin. Une grande terrasse vous accueille en été et en hiver tout au long de la journée. Un must : NOS BURGERS ! Brown's Food a le plaisir de vous proposer une large sélection de notre menu, servis sur place ou à emporter.

Dégustez-les chez nous avec un verre de vin ou une coupe de Champagne dans une ambiance décontractée et chic. Choisissez une de nos compositions ou créez votre propre plateau, notre écailler sera ravi de vous conseiller.</p>
    </div>
  </div>
  
  <hr>

  <?php  if (isset($_SESSION['USER'])){
    echo '<div class="w3-container w3-padding-64" id="Article">';
    echo '<form method="post" class="form-horizontal" enctype="multipart/form-data">';
  echo ' <div class="form-group">';
   echo '<label class="col-sm-3 control-label">Name</label> ';
   echo '<div class="col-sm-6">';
    
    echo '<input type="text" name="txt_name" class="form-control" placeholder="Entrez le nom de la photo" />';
    
    echo '</div>';
    
    echo ' </div>';
   
    echo '<div class="form-group">';
    
    echo ' <label class="col-sm-3 control-label">File</label>';
   
    echo '<div class="col-sm-6">';
    echo'<div class="col-sm-6">';
    
   
    echo'<input type="file" name="txt_file" class="form-control" />';
    
    echo '</div>';
    
    echo '</div>';
    
    echo '<div class="form-group">';
    
    echo '<div class="col-sm-offset-3 col-sm-9 m-t-15"> <br/>';
    
    echo '<input type="submit"  name="btn_Envoyer" class="btn btn-success " value="Envoyer"> '; 
    str_repeat('&nbsp;', 9);
    
    echo '<a href="index.php" class="btn btn-danger">Annuler</a>';
    
    echo ' </div>';
   
    echo ' </div>';
   
    echo '</form>';
   
     ?>        
    
    <?php } ?>
  
  <!-- Art Section -->
  <div class="w3-container w3-padding-64" id="Article">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
      <img src="images\drawing1.jpg" class="d-block w-100" alt="..." width="600" height="550">
    </div>
        <div class="carousel-item">
            <img src="images\drawing2.jpg" class="d-block w-100" alt="..." width="600" height="550">
        </div>
    <div class="carousel-item">
      <img src="images\drawing3.jpg" class="d-block w-100" alt="..." width="600" height="550">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">AVANT</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">SUIVANT</span>
  </button>
</div>


  <hr>
  <!-- Footer -->
<footer class="w3-center w3-light-white w3-padding-32">
    
    <div class="w3-bar w3-white w3-padding w3-card" style="">
      <p>En relation avec <br/><a href="https://www.kallenconcept.store" title="W3.CSS" target="_blank" class="w3-hover-text-green"><img src="images\kallen.png" alt="kallen"/></a></p>
    </div>
    </footer>

  
  
<!-- End page content -->
</div>
<?php include_once('Traitement\upload.php')?>
<?php include_once('login.html')?>



</body>
</html>

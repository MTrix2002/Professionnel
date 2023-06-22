<?php
$title = "Modifier Hebergement";
require_once 'includes/header.php';
require_once 'db/conn.php';




if (!isset($_GET['id']) || $_SESSION['typecompte'] != "adm") {

    include 'includes/errormessage.php';
    header("Location: index.php");
} else {
    $id = $_GET['id'];
    $hebergement = $crud->getHebergementById($id);
    if (isset($_POST['submit'])) {



        $type           =   $_POST['type'];
        $nom            =   $_POST['nom'];
        $nbplace        =   $_POST['nbplace'];
        $surface        =   $_POST['surface'];
        $internet       =   $_POST['internet'];
        $annee          =   $_POST['annee'];
        $secteur        =   $_POST['secteur'];
        $oriention      =   $_POST['oriention'];
        $etat           =   $_POST['etat'];
        $description    =   $_POST['description'];
        $photo          =   $_POST['photo'];
        $tarif          =   $_POST['tarif'];
        $param = [
            $type,
            $nom,
            $nbplace,
            $surface,
            $internet,
            $annee,
            $secteur,
            $oriention,
            $etat,
            $description,
            $photo,
            $tarif,
            $id
        ];
        $res = $crud->edithebergement($param);

        if (!$res) {
            include('includes/errormessage.php');
        } else {
            echo "<script> window.location='manage_rental.php'  </script>";
        }
    }


?>

    <div class="w3-container  w3-padding-100">
        <br>
        <br>
        <h1 class="text-center">Modifier Hebergement</h1>


        <form class=" w3-container" method="post" action="">
            <div class="form-group">
                <label for="lastname">Numero Hebergement </label>
                <input type="text" class="w3-input w3-border" id="id" name="id" value="<?php echo $hebergement['NOHEB'] ?> ">
            </div>

            <input type="hidden" name="id" />
            <div class="form-group">
                <label for="firstname">Type hebergement </label>
                <?php $results = $crud->getAllTypeHebergement(); ?>
                <select class="w3-input w3-border" name="type" id="type">
                    <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $r['CODETYPEHEB']; ?>" <?php if ($r['CODETYPEHEB'] == $hebergement['CODETYPEHEB']) echo 'selected' ?>>
                            <?php echo $r['NOMTYPEHEB']; ?>
                        </option>

                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="lastname">Nom hebergement </label>
                <input type="text" class="w3-input w3-border" id="nom" name="nom" value="<?php echo $hebergement['NOMHEB'] ?>" required>
            </div>
            <div class="form-group">
                <label for="dob">Nombre de place</label>
                <input type="number" class="w3-input w3-border" id="nbplace" name="nbplace" value="<?php echo $hebergement['NBPLACEHEB'] ?>" name="Adults" min="1" max="6" required>
            </div>
            <div class="form-group">
                <label for="specialty">Surface </label>
                <input type="number" class="w3-input w3-border" id="surface" name="surface" value="<?php echo $hebergement['SURFACEHEB'] ?>">

            </div>
            <div class="form-group">
                <label for="email">Internet</label><br>
                <input type="radio" id="internet" value="1" name="internet" <?php if ($hebergement['INTERNET'] == 1) echo 'checked ' ?>> Oui
                <input type="radio" id="internet" value="0" name="internet" <?php if ($hebergement['INTERNET'] == 0) echo 'checked ' ?>> Non
            </div>
            <div class="form-group">
                <label for="phone">Année </label>
                <input type="number" class="form-control" id="annee" name="annee" value="<?php echo $hebergement['ANNEEHEB'] ?>" required>
            </div>

            <div class="form-group">
                <label for="secteur">Secteur</label>
                <input type="text" class="w3-input w3-border" id="secteur" name="secteur" value="<?php echo $hebergement['SECTEURHEB'] ?>" required>
            </div>
            <div class="form-group">
                <label for="orientation">Orientation</label>
                <input type="text" class="w3-input w3-border" id="orientation" name="oriention" value="<?php echo $hebergement['ORIENTATIONHEB'] ?>" required>
            </div>
            <div class="form-group">
                <label for="etat">Etat hebergement</label>
                <input type="text" class="w3-input w3-border" id="etat" name="etat" value="<?php echo $hebergement['ETATHEB'] ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="w3-input w3-border" id="description" name="description" value="<?php echo $hebergement['DESCRIHEB'] ?>">
            </div>
            <div class="form-group">
                <label for="dob">Photo</label>
                <input type="text" class="w3-input w3-border" id="photo" name="photo" value="<?php echo $hebergement['PHOTOHEB'] ?>">
            </div>
            <div class="form-group">
                <label for="tarif">Tarif par semaine </label>
                <input type="number" class="w3-input w3-border" id="tarif" name="tarif" value="<?php echo $hebergement['TARIFSEMHEB'] ?>" required>
            </div>

            <a href="manage_rental.php" class="btn btn-default">Back To List</a>
            <button type="submit" name="submit" class="btn btn-success">Enregistrer les modifications</button>
        </form>
    </div>
<?php } ?>
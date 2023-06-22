<?php
$title = "Manage_rental";
require_once 'includes/header.php';
if ($_SESSION['typecompte'] == "adm") {
    require_once 'db/conn.php';

    $results = $crud->gethebergements();
?>

    <table class="table">
        <br>
        <br>
        <tr>
            <th>#</th>
            <th>Photo</th>

            <th>Type</th>
            <th>Nb place</th>
            <th>Surface</th>
            <th>Internet</th>
            <th>Secteur </th>
            <th>Oriention</th>
            <th>Etat </th>
            <th>Prix /Semaine</th>
            <th>Actions</th>
        </tr>
        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) {

        ?>
            <tr>
                <td><?php echo $r['NOHEB'] ?></td>
                <td><?php echo "<img  src='" . $r['PHOTOHEB'] . "' alt='The picture' with=''121' height='100'/>"; ?></td>
                <td><?php echo $r['NOMTYPEHEB'] ?></td>
                <td><?php echo $r['NBPLACEHEB'] ?></td>
                <td><?php echo $r['SURFACEHEB'] ?></td>
                <td><?php if ($r['INTERNET'] == true) {
                        echo "OUI";
                    } else {
                        echo "NON";
                    } ?></td>
                <td><?php echo $r['SECTEURHEB'] ?></td>
                <td><?php echo $r['ORIENTATIONHEB'] ?></td>
                <td><?php echo $r['ETATHEB'] ?></td>
                <td><?php echo $r['TARIFSEMHEB'] ?></td>
                <td>
                    <a href="rental.php?id=<?php echo $r['NOHEB'] ?>" class="btn btn-primary">View</a>
                    <a href="edit.php?id=<?php echo $r['NOHEB'] ?>" class="btn btn-warning">Edit</a>

                    <a onclick="return confirm('Are you sure you want to delete this rental?');" href="delete.php?id=<?php echo $r['NOHEB'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>

    <?php }
        echo "</table>";
    } else {
        echo "degage tu n'as pas le droit";
    }
    ?>
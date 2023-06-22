<?php
$title = 'User Login';
include('includes/session.php');
require_once 'db/conn.php';

//If data was submitted via a form POST request, then...
if (isset($_POST['submit_connexion'])) {

    $login = strtolower(trim($_POST['login']));
    $password = $_POST['psw'];
    $new_password = md5($password . '' . $login);
    $user = new user($pdo);
    $result = $user->getUser($login, $new_password);

    if (!$result) {
        echo '<div class="alert alert-danger">Username or Password is incorrect! Please try again. </div>';
    } else {

        $_SESSION['login'] = $login;
        $_SESSION['typecompte'] = $result['TYPECOMPTE'];
        //$_SESSION['alluserdata'] = $result; faire que su besoin 


        echo '<div class="alert alert-success">Congrats! You can now log in using your username and password</div>';
        header('index.php');
    }
}
?>

<div id="id01" class="modal">
    <form class="modal-content animate" action="" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="uploads/1789654123.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="login" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit" name="submit_connexion">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
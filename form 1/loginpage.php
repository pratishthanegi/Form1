<?php 
session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Login Page</title>
    </head>

<body>
    <h2>LOGIN DETAILS</h2>
    <form method="POST">
        <label for="email">EMAIL:</label><br>
        <input type="text" id="email" name="email"><br>
        <label for="pswd">PASSWORD:</label><br>
        <input type="password" id="pswd" name="pswd"><br>
        <button type="submit" name="submit">LOG IN</button><br>
    </form>
</body>    
</html>

<?php

include 'config.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];

    $sql = "select * from users where email='$email';";
    $query = mysqli_query($con,$sql);
    
    if(mysqli_num_rows($query)>0){
        $epass = mysqli_fetch_assoc($query);
        $db_pass = $epass['pswd'];
        $_SESSION['logged_in']='1';
        //$_SESSION['name'] = $epass['name'];
        $passcode = password_verify($pswd,$db_pass);
        
        if($passcode){
        ?>
            <script>
            location.replace("welcome.php");
            alert("WELCOME");
            </script>
        <?php    
        }
        else{
        echo "incorrect password"; 
        }
    }
    else{
    ?>
        <script>
        location.replace("new-user.php");
        alert("Email Doesn't Exist");
        </script>
    <?php    
    }    
}
?>
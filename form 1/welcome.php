<?php
session_start();
if($_SESSION['logged_in']){
$_SESSION['logged_in']='0';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Welcome Page</title>
    </head>

<body align="center">
    <H1>WELCOME TO THIS PAGE</H1>
    <form method="POST"><button type="submit" name="submit">LOG OUT</button></form>
</body>    
</html>

<?php

if(isset($_POST['submit']))
{
?>
    <script>location.replace("new-user.php");</script>
<?php 
}
}
else{
    ?>
    <script>location.replace("loginpage.php");</script>
    <?php 
}
?>

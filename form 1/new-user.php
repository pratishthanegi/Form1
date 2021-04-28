<!DOCTYPE html>
<html>
    <head>
        <title>New User</title>
    </head>

    <body>
        <h2>REGISTER NEW USER</h2>
        <form method="POST">
            <label for="name">NAME:</label><br>
            <input type="text" id="name" name="name" required><br>
            <label for="dob">DATE OF BIRTH:</label><br>
            <input type="date" id="dob" name="dob" required><br>
            <label for="course">COURSE:</label><br>
            <input type="text" id="course" name="course" required><br>
            <label for="email">EMAIL:</label><br>
            <input type="text" id="email" name="email" required><br>
            <label for="pswd">PASSWORD:</label><br>
            <input type="password" id="pswd" name="pswd" required><br>
            <button type="submit" name="submit">REGISTER</button><br>
            Already Registered?<a href="loginpage.php">CLICK HERE</a>
        </form>
    </body>
</html>
  

<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $dob=$_POST['dob'];
    $course=$_POST['course'];
    $email=$_POST['email'];
    $pass=$_POST['pswd'];

      
    $sql="select * from users where email='$email';";

    $res=mysqli_query($con,$sql);

    if (mysqli_num_rows($res) > 0) {
      
      $row = mysqli_fetch_assoc($res);
      if($email==isset($row['email']))
      {
    ?>
        <script>alert("Email ID Already Exists!!")</script>
    <?php
      }
    }
    
    else{
        $pswd = password_hash($pass,PASSWORD_BCRYPT); 

        $query ="INSERT INTO `users`(`name`, `dob`, `course`, `email`, `pswd`) VALUES ('$name','$dob','$course','$email','$pswd')";

        $res = mysqli_query($con,$query);

        if($res){
        ?>
            <script>alert("User Registered Successfully!!")</script>
        <?php
        }
        else{
        ?>
            <script>alert("User Registration Unsuccessful!!")</script>
        <?php
        }
    }
}
?>
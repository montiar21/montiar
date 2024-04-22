<?php   
    include "conn.php";
    session_start();

    //Registration
    if(isset($_POST['register'])){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $year = $_POST['year'];
        $course = $_POST['course'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $validate = mysqli_query($conn, "INSERT INTO register VALUES('0','$fname','$lname','$year','$course','$email','$pass')");

        if($validate == TRUE){
            ?>
            <script>
                alert ("Registered");
                location.href = "index.html";
            </script>
            <?php
        }else{
            ?>
            <script>
                alert ("Not Registered");
                location.href = "index.html";
            </script>
            <?php
        }

    }

    //End

    //Login Admin

  if(isset($_POST['admin'])){

    $admin_email = $_POST['admin_email'];
    $admin_pass = $_POST['admin_pass'];

    $check = mysqli_query($conn, "SELECT * FROM admin_info WHERE admin_email = '$admin_email' AND admin_pass ='$admin_pass'");
    $row = mysqli_num_rows($check);

    $_SESSION ['admin_email'] = "$admin_email";
    $_SESSION ['admin_pass'] = "$admin_pass";
    if($row >= 0){
        ?>
        <script>
            alert ("Login Successfully!");
            location.href = "./Admin_sse/index.html";
        </script>
        <?php
    }else{
        ?>
        <script>
            alert ("Error Login!");
            location.href = "index.html";
        </script>
        <?php

  }

  }
  
  //Login as user

  if(isset($_POST['user'])){

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $check = mysqli_query($conn, "SELECT * FROM register WHERE email = '$email' AND pass ='$pass'");
    $row = mysqli_num_rows($check);

    $_SESSION ['email'] = "$email";
    $_SESSION ['pass'] = "$pass";
    if($row >= 0){
        ?>
        <script>
            alert ("Login Successfully!");
            location.href = "./iPortfolio/index.html";
        </script>
        <?php
    }else{
        ?>
        <script>
            alert ("Error Login!");
            location.href = "index.html";
        </script>
        <?php

  }
  }
  
?>


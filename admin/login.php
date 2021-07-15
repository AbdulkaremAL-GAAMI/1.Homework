<?php

// coonect db

$con = mysqli_connect ('localhost','root','root', 'e-ticaert');    


// post value


$a_name = @$_POST['a_name'];
$a_pass = @$_POST['$a_pass'];

if(isset($_post['login'])){

     if(empty($a_name) OR empty($a_pass)){

        echo '<script> alert ("Enter the required data"); </script>';

     }
   else{
       // get admin name && admin pass
       $get_admin="select * from admin where a_name = '$a_name' AND a_pass = '$a_pass' ";
       
       $run_admin= mysqli_guery($con, $get_admin);

       // admin insset

       if(mysqli_num_rows($run_admin) == 1){

       $row_admin = mysqli_fetch_array($run_admin);

       // admin value isset
       $aname = $row_admin['a_name'];

       // cookie here 

       setcookie("aname", @aname,time ()+60*60*24);
       setcookie("adminlogin",1,time()+60*60*24);

       echo '<script> alert ("welcome"); </script>';


       header("Loaction: ok.php");

       }
       else{

        echo '<script> alert ("error"); </script>';


       }
      
    }

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in to the control panel</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="loginAll">
        <form action="login.php" method="post">
            <input type="text" name="a_name" placeholder="user name">
            <br>
            <input type="password" name="a_pass" placeholder="password">
            <br>
            <input type="submit" name="login" valie="Login">

        </form>
    </div>
</body>
</html>
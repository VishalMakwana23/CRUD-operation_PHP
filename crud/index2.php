<?php

session_start();

if(isset($_SESSION['email'])){
    header('location:home.php');
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>

   
</head>

<script type="text/javascript">
    function btnClick(){

        var email = document.getElementById("email");
        var password = document.getElementById("password");

        if(email.value.trim() == "")
        {
            email.style.border = "solid 2px red";
            var emailEmptyLbl = document.getElementById("emailEmptyLbl").style.visibility = "visible"
            return false;
        }
        else if(password.value.trim() == "")
        {
            password.style.border = "solid 2px red";
            PasswordEmptyLbl = document.getElementById("PasswordEmptyLbl").style.visibility = "visible";
            return false;
        }
        else{
            alert("Login Successfull");
            return true;
        }
       

       

    }
</script>
<body>
    <div class="sign-up-form">
        <img src="assets/person-circle.svg" alt="">
        <h1>Sign up Now</h1>
        <form action="" onsubmit="return btnClick()">
            <input type="text" id="email" placeholder="Enter Email" class="input-box" name="txtemail">
            <label for="email" id="emailEmptyLbl" style="color: red; visibility: hidden;">Please Enter Email</label>
            <input type="text" id="password" placeholder="Enter Password" class="input-box" name="txtpassword">
            <label for="password" id="PasswordEmptyLbl" style="color: red; visibility: hidden;">Please Enter Password</label>
            <p><span><input type="checkbox" name="" id=""></span> agree to the tearms of services</p>
            <button class="btn btn-outline-primary" name="login">Sign Up</button>
            <hr>
            <p class="or">OR</p>
            <button class="btn btn-primary">Login with Google</button>
            <p class="register-link">Do you have an account? <a href="#" onclick="window.open('register.php')">Register</a></p>
        </form>
    </div>
</body>
</html>


<?php
    include('dbcon.php');

  
    if (isset($_POST['login'])){
        // $email = $_POST['email'];
        // $password = $_POST['password'];
        $qry = "SELECT * FROM `login`";
        $run = mysqli_query($con,$qry);
        $data = mysqli_fetch_assoc($run);
       if($row = mysqli_num_rows($run) == 1)
        {
            if($_POST['txtemail'] == $data['email'] && $_POST['txtpassword'] == $data['password']){

                $_SESSION['email']=$data['id'];
                header('location:home.php');

            } else {

                echo "Please enter correct data";
            }
        }

       // header('location:home.php');
    }

?>
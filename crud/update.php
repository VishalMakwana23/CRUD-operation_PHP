
<?php
    include('dbcon.php');

    if (isset($_POST['register'])){   
        $id = $_GET['id'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $qry = "UPDATE `login` SET `email` = '$email', `password` = '$password' WHERE `login`.`id` = $id";
        $query = mysqli_query($con,$qry);
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
    <title>Update </title> 
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
            alert("Updated Successfull");
            return true;
        }
    }
</script>
<body style="background-image: url(home.jpg);">
    <div class="sign-up-form">
        <img src="assets/person-circle.svg" alt="">
        <h1>Update Register </h1>
        <form action="" onsubmit="return btnClick()" method="POST">

                     <?php
                        include('dbcon.php');
                
                        $qry = "SELECT * FROM `login`";
                        $query = mysqli_query($con, $qry);

                        $data = mysqli_fetch_array($query);

                    ?>


            <input type="text" id="email" placeholder="Enter Email" class="input-box" name="email" value="<?php echo $data['email']?>">
            <label for="email" id="emailEmptyLbl" style="color: red; visibility: hidden;">Please Enter Email</label>
            <input type="text" id="password" placeholder="Enter Password" class="input-box" name="password" value="<?php echo $data['password']?>" >
            <label for="password" id="PasswordEmptyLbl" style="color: red; visibility: hidden;">Please Enter Password</label>
            <a href="index.php"><button class="btn btn-outline-primary" name="register">Update</button></a>
        </form>
    </div>
</body>
</html>
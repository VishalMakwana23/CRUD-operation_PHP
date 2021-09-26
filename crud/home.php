
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body style="background-image: url(home.jpg);">


    <div class="container">
        <h1 class="text-center">Registerd Data</h1>
    </div>
    <div class="container" class="table table-striped">
        <div class="col-lg-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include('dbcon.php');
                
                        $qry = "SELECT * FROM `login`";
                        $query = mysqli_query($con, $qry);

                        while ($row = mysqli_fetch_array($query)) {

                    ?>

                            <tr>
                                <th scope="row"><?php echo $row['id']?></th>
                                <th><?php echo $row['email']?></th>
                                <th><?php echo $row['password']?></th>
                                <th><a href="delete.php?id=<?php echo $row['id']?>"><button class="btn btn-danger">Delete</button></a></th>
                                <th><a href="update.php?id=<?php echo $row['id']?>"><button class="btn btn-primary">Update</button></a></th>
                            </tr>


                    <?php
                        }
                    
                    ?>
                             <tr>
                                <td colspan="9" align="center" ><a href="index.php"><button class="btn btn-success" style="width: 906px;">Register</button></a></td>
                            </tr>




                </tbody>
            </table>


        </div>
    </div>

</body>

</html>
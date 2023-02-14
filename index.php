<?php
include_once 'includes/dbh.inc.php';
  // DELETE
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = mysqli_query($connect, "DELETE FROM `estate_agency` WHERE `id`='$id'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>My house</title>
</head>

<body class="bg-dark">
    <nav class="navbar bg-light navbar-expand-lg   ">
        <div class="container-fluid ">
            <a class="navbar-brand" href="#"><img src="./logo.png" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="btn btn-lg btn-danger mx-2 " aria-current="page" href="formAdd.php">Add announcements</a>
                </div>
            </div>
            <form action="" method="POST" class="d-flex justify-content-center mb-3 mx-5">
                <div class="input-group rounded mx-5 w-25 mt-3">
                    <span class="input-group-text bg-danger text-light">Min</span>
                    <input type="number" name="min" placeholder="Min Price" class="form-control" min="0" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-text bg-success text-light">DH</span>
                </div>
                <div class="input-group rounded mx-5 w-25 mt-3">
                    <span class="input-group-text bg-danger text-light ">Max</span>
                    <input type="number" name="max" placeholder="Max Price" class="form-control" min="0" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-text bg-success text-light">DH</span>
                </div>
                <div class="nav-item dropdown">
                    <a type="button" class="btn btn-lg mx-2 py-3 btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> Sale or Rental </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item " href="index.php">All</a></li>
                        <li><a class="dropdown-item " href="index.php?advertisting=sale">Sale</a></li>
                        <li><a class="dropdown-item " href="index.php?advertisting=rental">Rental </a></li>
                    </ul>
                </div>
                <button type="submit" class="btn btn-lg btn-danger mx-2 ">Search</button>
            </form>
        </div>
    </nav>
    <div class="container-fluid  mt-2">

        <div class='cards d-flex  align-items-center justify-content-around flex-wrap'>
            <?php
          
            // SELECT
            if (isset($_GET["advertisting"])&& !(isset($_POST["min"]) && isset($_POST["max"]))) {
                $selected = $_GET["advertisting"];
                $select = mysqli_query($connect, "SELECT * FROM `estate_agency` WHERE `advertisting`='$selected'");
                include('./display.php');
            } //  SEARCH
            else if ((isset($_POST["min"]) && isset($_POST["max"])) && !(isset($_GET["advertisting"]))) {
                $select =  mysqli_query($connect, "SELECT * FROM estate_agency WHERE amount BETWEEN  '$_POST[min]' AND  '$_POST[max]'");
                include('./display.php');
            } 
            else if(isset($_GET["advertisting"]) && (isset($_POST["min"]) && isset($_POST["max"])) ){
                $selected = $_GET["advertisting"];
                $select = mysqli_query($connect, "SELECT * FROM `estate_agency` WHERE `advertisting`='$selected' AND amount BETWEEN  '$_POST[min]' AND  '$_POST[max]' ");
                include('./display.php');
            }
            // SHOW ALL
            else {
                $sql = "SELECT * FROM estate_agency;";
                $select = mysqli_query($connect, $sql);
                include('./display.php');
            }

            

            
           
        
            ?>
        </div>
    </div>
</body>

</html>
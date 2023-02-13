<?php
include_once 'includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>My house</title>
</head>

<body class="bg-dark">
    <nav class="navbar navbar-expand-lg  bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="./logo.png" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNavAltMarkup">
                <div class="navbar-nav ">
                    <h1 class="text-center bg-danger rounded py-1 px-5 text-light my-5" style="text-shadow:  2px 2px 5px #000;">Edit Announcement</h1>
                </div>
            </div>
        </div>
    </nav>
    <?php
    $id = $_GET['id'];
    echo $id;
    $select = mysqli_query($connect, "SELECT * FROM estate_agency ");
    while ($row = mysqli_fetch_assoc($select)) {
        if ($row['id'] == $id) {
            echo "
            <div class='container rounded  bg-light my-5' style='width: 50%; border: 2px solid #dc3545; box-shadow: 2px 2px 5px #dc3545;'>
       
            <form  action='' method='POST' enctype='multipart/form-data'>
                <div class='form-group'>
                    <label for='titre'>Title</label>
                    <input type='text' class='form-control' id='titre' name='title' required value='$row[title]'>
                </div>
                <div class='form-group'>
                    <label for='image'>Picture</label>
                    <input type='file' class='form-control' id='image' required name='image'>
                </div>
                <div class='form-group'>
                    <label for='description'>Description</label>
                    <textarea class='form-control' id='description' name='description' rows='3'> $row[description] </textarea>
                </div>
                <div class='form-group'>
                    <label for='superficie'>Surface</label>
                    <input type='number' min='0'  class='form-control' required id='superficie' name='area' value='$row[area]'>
                    <div class='form-group'>
                        <label for='adresse'>Address</label>
                        <input type='text' class='form-control' id='adresse' name='address' value='$row[address]'>
                    </div>
                    <div class='form-group'>
                        <label for='montant'>Price</label>
                        <input type='number' min='0' class='form-control' required id='montant' name='amount' value='$row[amount]'>
                    </div>
                    <div class='form-group'>
                        <label for='dateAnnonce'>offer Date</label>
                        <input type='date' class='form-control' required id='dateAnnonce' name='announcement_date' value='$row[announcement_date]'>
                    </div>
                    <div class='form-group'>
                        <label for='type'>Offer Type</label>
                        <select class='form-control' id='type' name='advertisting'>
                            <option value=' $row[advertisting] '> Current Offer : $row[advertisting]  </option>
                            <option value='sale'>Sale</option>
                            <option value='rental'>Rental</option>
                        </select>
                        <div class='d-flex justify-content-between mx-2 my-4'>
                        <input type='submit' name='submit' value='Edit'  class='btn btn-lg btn-danger mx-2 '>
                        <a href='./index.php' class='btn btn-lg btn-danger mx-2 ' aria-current='page'>Home</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>";
        }
    }
    $id = $_GET['id'];
    // image saving in database 
    $image = $_FILES['image']['name'];
    $imageEmp = $_FILES['image']['tmp_name'];
    $folder = 'img/' . $image;
    move_uploaded_file($imageEmp, $folder);
    // variables 
    $title = $_POST['title'];
    $description = $_POST['description'];
    $area = $_POST['area'];
    $address = $_POST['address'];
    $amount = $_POST['amount'];
    $announcement_date = $_POST['announcement_date'];
    $advertisting = $_POST['advertisting'];
    $insert = mysqli_query($connect, "UPDATE `estate_agency` SET `title`='$title',`image`='$folder',`description`='$description',`area`='$area',`address`='$address',`amount`='$amount',`announcement_date`='$announcement_date',`advertisting`='$advertisting' WHERE `id`='$id' ");
    ?>


</body>

</html>
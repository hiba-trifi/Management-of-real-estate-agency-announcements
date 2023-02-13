<?php
include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <h1 class="text-center bg-danger rounded py-1 px-5 text-light my-5" style="text-shadow:  2px 2px 5px #000;">Add New Announcement</h1>
                </div>
            </div>
        </div>
    </nav>
    <div class="container rounded  bg-light my-5" style="width: 50%; border: 2px solid #dc3545;  box-shadow: 2px 2px 5px #dc3545;">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class=""  for="titre">Title</label>
                <input type="text" class="form-control" id="titre" required name="title">
            </div>
            <div class="form-group">
                <label class="" for="image">Picture</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <div class="form-group">
                <label class="" for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" ></textarea>
            </div>
            <div class="form-group">
                <label class=""  for="superficie">Surface</label>
                <input type="number" min="0" class="form-control" id="superficie" name="area" required>
                <div class="form-group">
                    <label class="" for="adresse">Address</label>
                    <input type="text" class="form-control" id="adresse" name="address" required>
                </div>
                <div class="form-group">
                    <label class="" for="montant">Price</label>
                    <input type="number" min="0" class="form-control" id="montant" name="amount" required>
                </div>
                <div class="form-group">
                    <label class="" for="dateAnnonce">Offer Date</label>
                    <input type="date" class="form-control" id="dateAnnonce" name="announcement_date" required>
                </div>
                <div class="form-group">
                    <label class="" for="type">Offer Type</label>
                    <select class="form-control" id="type" name="advertisting">
                        <option value="">Choose Offer</option>
                        <option value="Sale">Sale</option>
                        <option value="Rental">Rental</option>
                    </select>
                    <div class="d-flex justify-content-between mx-2 my-4">
                        <input type="submit" name="submit" value="upload" class="btn btn-lg btn-danger mx-2 ">
                        <a href='./index.php' class="btn btn-lg btn-danger mx-2 " aria-current="page">Home</a>
                    </div>
                </div>
            </div>
        </form>
        <?php
        if (isset($_POST['submit']) && isset($_FILES['image'])) {
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
            $insert = mysqli_query($connect, "INSERT INTO `estate_agency` (title, image, description, area, address, amount, announcement_date, advertisting) VALUES ('$title','$folder','$description','$area','$address','$amount','$announcement_date','$advertisting')");
        }
        ?>
    </div>

</body>

</html>
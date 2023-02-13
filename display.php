<?php 
 while ($row = mysqli_fetch_assoc($select)) {
    echo "
    <div class='card bg-light   col-xs-12  col-md-5  col-xl-3  my-4 ' style='width:400px;'>
    <img src='$row[image]' class='card-img-top '>
    <div class='card-body '>
    <h1 class='card-title mt-3 text-danger'> $row[title]  $row[area]m² </h1>
    <h3 class='mt-2 ' >$row[advertisting]</h3>
    <h5>$row[address]  </h5>
    <p class='card-text '>$row[description]</p>
    <h3 class='text-success'>Price : $row[amount] DH </h3>  
    <div class='d-flex justify-content-around'>
    <a href='formEdit.php?id=".$row ['id']."' class='btn btn-lg btn-danger px-4'>Edit</a>
    <a href='index.php?id=".$row['id']."' data-bs-toggle='modal' data-bs-target='#exampleModal' class='btn btn-lg btn-danger px-4'>Delete</a>
    </div> 
    <h6 class='text-secondary d-flex justify-content-end mt-3'>$row[announcement_date]</h6>
    </div>
    </div>
    <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
<div class='modal-dialog'>
 <div class='modal-content'>
<div class='modal-header'>
<h1 class='modal-title fs-5' id='exampleModalLabel'>Modal title</h1>
<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
</div>
<div class='modal-body'> Are you sure you want to delet this announcement ?!</div>
<div class='modal-footer'>
<button type='button' class='btn  btn-secondary' data-bs-dismiss='modal'>Cancel</button>
<a href='index.php?id=".$row['id']."' class='btn  btn-danger px-4'>Delete</a>
          </div>
        </div>
      </div>
    </div>";
}

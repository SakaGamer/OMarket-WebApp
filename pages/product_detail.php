<?php

   require_once 'header.php';
   require_once '../db/model/product.class.php';

   // product id
   if (isset($_GET['pid'])){
        $pid = $_GET['pid'];
   }
   $conn = new mysqli("localhost", "root", "", "online_market");

   $p = Product::getProduct($pid);
   $pimage = $p->image_id;
   $pname= $p->pname;
   $pcat_id = $p->cat_id;
   $ploc_id = $p->loc_id;
   $pdescr = $p->description;
   $pphone = $p->phone;
   $pprice = $p->price;
   $pdur_id = $p->dur_id;
    $phit = $p->hit;

    // add 1 hit to this product
    $hit = Product::addHit($pid);

 ?>

   <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
   <link rel="stylesheet" href="edit.css" type="text/css">
   
   <style>
#imgp {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#imgp:hover {opacity: 0.8;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption { 
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
    </style>
    
    <!-- js-->
    <script>
        // Get the modal
var modal = document.getElementById('imgModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('imgp');
var modalImg = document.getElementById("imgBig");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
    </script>

   <!-- body -->
   <div class="body">

            <!-- left side -->
            <span class="left">
               <!-- image -->
                  <img id="imgp" src='<?php echo "$pimage";  ?>' alt='<?php echo "$pname"; ?>' width="200" height="220" class="img-thumbnail" style="float: right;"> 
                  <div class="text">
                      <?php echo "$pname"; ?>
                  </div>
                  
              <!-- The Modal -->
                <div id="imgModal" class="modal">
              <!-- The Close Button -->
                  <span class="close" onclick="document.getElementById('imgModal').style.display='none'">&times;</span>
              <!-- Modal Content (The Image) -->
                  <img class="modal-content" id="imgBig">
              <!-- Modal Caption (Image Text) -->
                  <div id="caption"></div>
                </div>
            </span>

            <!-- right side -->
            <span class="right">
               <center>

            <!-- category -->
            <div class="text_left">Category:</div>
            <div class="border">
               <?php
               $query = "select * from category";
               $result = $conn->query($query) or die(mysql_error()."[".$query."]");
               while ($row = mysqli_fetch_assoc($result))
               {
                  if ($row['id'] == $pcat_id)
                  {
                     echo $row['name'];
                  }
                 } ?>
                 </div>

            <!-- location -->
            <div class="text_left">Location:</div>
            <div class="border">
               <?php
               $query = "select * from location";
               $result = $conn->query($query) or die(mysql_error()."[".$query."]");
               while ($row = mysqli_fetch_assoc($result))
               {
                  if ($row['name'] == $ploc_id)
                  {
                     echo $row['name'];
                  }
                } ?>
            </div>

               <!-- name -->
               <div class="text_left">Product name:</div>
               <div class="border">
                  <?php echo "$pname"; ?>
               </div>

               <!-- product description -->
               <div class="text_left">Description:</div>
               <div class="border">
                  <?php echo "$pdescr"; ?>
               </div>


            <!-- phone number -->
            <div class="text_left">Contact number:</div>
            <div class="form-row">
            <div class="col">
                <div class="border">
                      <?php $contact = explode("/", $p->phone); echo "$contact[0]"; ?>
                </div>
            </div>
            <div class="col">
                 <div class="border">
                     <?php $contact = explode("/", $p->phone); echo "$contact[1]"; ?>
                 </div>
            </div>
          </div>
           

         <!-- product price -->
         <div class="text_left">Price:</div>
         <div class="border">
            <?php echo "$pprice"; ?>
         </div>

            </center>
         </span>

         </div>

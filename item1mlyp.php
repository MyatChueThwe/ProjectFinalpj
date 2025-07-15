<?php

include "./db.php";
include "./Nav.php";

if(isset($_GET['id'])){
  $id = $_GET['id'];
}

$sql = "  SELECT  ID.Ing_ID,G.Ing_Name, ID.Ing_values,U.UNI_NAME,ID.ITM_ID,I.ITM_NAME FROM itemdetail AS ID, INGREDIENT AS G, UNIT AS U,  ITEM AS I
    WHERE G.Ing_ID = ID.Ing_ID AND G.Uni_ID = U.Uni_ID AND ID.ITM_ID=I.ITM_ID AND ID.ITM_ID= $id;";
 $res = mysqli_query($conn,$sql);
 $i = 1;
 while($data = mysqli_fetch_assoc($res)):

?>
    <!-- Ingredients sectuion -->
 
    <h2 class="text-center m-4 course-p"><?php echo $data['Itm_Name']; ?></h2>
    
  <div class="info">
    <h3 class="text-success course-p">Ingredients</h3>
    <p class="text-success fs-5 fw-bold course-p"><i class="bi bi-check2-circle text-success"></i><?php echo $data['Ing_values'];?><?php echo $data['Uni_Name'];?><?php echo $data['Ing_Name'];?></p>
    
  </div>



    <!-- instruction section -->
      <div class="background-image-container">
             <div class="container d-flex justify-content-center align-items-center vh-100">
               <div class="card recipe-card p-4">
                 <div class="card-body text-center">
                    <h2 class="card-title mb-3"><?php echo ['Itm_Name']?></h2>
                    <hr class="my-4">
                    <h3 class="card-subtitle mb-4 ">Instructions</h3>
                    <ol class="list-unstyled text-start">
                        <li><?php echo ['Ins_Des']?></li>
                        
                        
                    </ol>
                </div>
            </div>
        </div>
     </div>

     <?php endwhile;?>

    <div class="see-more">
        <button class="see-more-btn"><a href="./userlogin.php" class="see-more-text text-decoration-none">More Details</a></button>
       </div>

   <?php
   
   include "./footer.php"
   
   ?>

<?php
    $clinics = mysqli_query($conn, "SELECT * from clinics ORDER by clinic_name ASC");
    $clinics = mysqli_fetch_all($clinics, MYSQLI_ASSOC);

?>
      

            <ul class="nav navbar-nav">
             
            <!-- <li>  <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="SEARCH CLINIC" aria-label="Search" style="margin-top: 8px;" list="cloud_search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="margin-top: 8px;">Search</button>
                 <datalist id="cloud_search">

                    <?php  foreach($clinics as $clinic) :  ?>	
			            <option value="<?php echo $clinic['clinic_name'] ?>"></option>
			        <?php endforeach; ?>

                </datalist> 
                </form>
            </li>           
             
          </ul>       

              <div class="clear"></div> -->
   
        
       
        
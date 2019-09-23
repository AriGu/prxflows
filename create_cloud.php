<?php
    require_once 'includes/header.php';
    require_once 'includes/form_logic/create_cloud_logic3.php';

?>



<div class="container" style="width: 800px; padding: 0px 50px 0px">
    <form action="create_cloud.php" method="POST" class="create-cloud-form">
        <div class="jumbotron" style="margin-top: 100px;">




                <label for="clinic" style="text-align:left;">Clinic: </label>
                <input type="search" class="form-control" name="clinic" id="search-clinic" placeholder="SEARCH"
                list="datalist1"
                style="height: 45px; margin-bottom: 10px; border: 1px solid #dee2e6;">
                <br>

               <datalist id="datalist1">

                    <?php  foreach($clinics as $clinic) :  ?>
			                   <option value="<?php echo $clinic['clinic_name'] ?>"></option>
			             <?php endforeach; ?>

                </datalist>




    <label for="user_count">User-count: </label>
    <select id="user_count" class="form-control-lg" style="height: 40px; width: 80px; display: inline; margin-right: 25px; border: 1px solid #dee2e6;" name="user_count">
			            <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>25</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>30</option>
    </select>

    <label for="user_cost">User-cost: </label>
    <select id="user_cost" class="form-control-lg" style="height: 40px; width: 100px; display: inline; margin-right: 25px; border: 1px solid #dee2e6;"  name="user_cost">
			       <option>$30</option>
                   <option>$35</option>
                   <option>$40</option>
                   <option>$45</option>
                   <option>$50</option>
    </select>


    <label for="vendor">Vendor: </label>
               <select id="select_vendor" class="form-control-lg" style="height: 40px; width: 100px; display: inline; border: 1px solid #dee2e6;" name="vendor">

                    <?php  foreach($vendors as $vendor) :  ?>
			            <option name="vendor"><?php echo $vendor['last_name'] ?></option>
			        <?php endforeach; ?>

                </select>


            <br>
            <div style="text-align: center;">
                    <input type="submit" class=" btn btn-lg btn-primary" style="background: #ff3d00; margin-top: 30px; border: none;" name="create-cloud" value="CREATE">


      </div>


    </form>
</div>

</div>

<?php
  include 'includes/footer.php';
?>

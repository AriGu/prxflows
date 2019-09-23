<?php
?>

<script src="assets/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="assets/jquery/table-fixed-header.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script>
     var paymentStatus = document.getElementById('payment-status');

               
               paymentStatus.style.backgroundColor = 'red';

     function setOverdueToRed(class, text){
          var tableCells = document.getElementsByClassName(class);
          for(i=0; i<= tableCells.length; i++){
               if(tableCells[i].innerHTML('text')){
                    tableCells[i].style.backgroundColor = 'red';
               }
          }          
     }
               
           
</script>


     </body>
</html>

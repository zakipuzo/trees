<?php
include("config.php");

include("TreeDAO.php");

$dao = new TreeDAO(Connection::getConnection());


include("header.php");
?>



<div class="row">
<div class="col-md-4">
<div id="nodelist">

   </div>
</div>
<div class="col-md-8">
dsds
<div id="nodesetting">

   </div>
</div>
</div>

</div>


   
  
   <?php
      
   foreach ($arbres as $key => $value) {
      //echo  $value->node;
      //echo  char_count($arbres[$key]->node, ".")  ;
   }
   ?>
  
<?php

include("footer.php");


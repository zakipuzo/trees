<?php
include("config.php");

include("TreeDAO.php");

$dao = new TreeDAO(Connection::getConnection());


include("header.php");
?>





   <div id="Preview">
   </div>
  
   <?php
      
   foreach ($arbres as $key => $value) {
      //echo  $value->node;
      //echo  char_count($arbres[$key]->node, ".")  ;
   }
   ?>
  
<?php

include("footer.php");


<?php
include("config.php");

include("TreeDAO.php");

$dao = new TreeDAO(Connection::getConnection());

$arbres=$dao->getSubNodes(NULL);
 
if(isset($_GET["id"])){
    $id= $_GET["id"];
 
    $arbres = $dao->getSubNodes($id);
      
    }else{
        $arbres = $dao->getSubNodes(null);
        
    }
 

include("header.php");
?>


 
   <hr>

   <div id="Result" >
   <table id="example2"  class="display table" style="width:100%">
      <thead> 
    
      <th>Nom</th>
      <th>Parent</th>
      <th>Question?</th>

      </thead>
      <tbody>
      <?php
      
      foreach ($arbres as $key => $value) {
         echo "<tr id='".$value->id."'><td>" . $value->name. "</td><td>" . ($value->parent->name==null ? "Null" : $value->parent->name) . "</td><td>" . ($value->isquestion==0 ? "non" : "oui"). "</td></tr>";
      }
      ?>
         </tbody>
   
      </table>
   
       
     
   </div>
  


   <hr>

  
   <?php
      
   foreach ($arbres as $key => $value) {
      //echo  $value->node;
      //echo  char_count($arbres[$key]->node, ".")  ;
   }
   ?>

  
<?php

include("footer.php");


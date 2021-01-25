<?php
include("config.php");

include("TreeDAO.php");

$dao = new TreeDAO(Connection::getConnection());




$arbres = $dao->all();


include("header.php");
?>

<?php 

if(isset($_GET["added"])){
   if($_GET["added"]==1){?>
      <div class="text-success">Element ajouté avec succès</div>
      <?php }else if($_GET["added"]==0){ ?>
      <div class="text-danger">Erreur</div>
      <?php 
      }
   }

   
      ?>


   <table id="example" class="display table" style="width:100%">
      <thead> 
      <th>node</th>
      <th>Nom</th>
      <th>Parent</th>
      <th></th>
      </thead>
      <tbody>
      <?php
      
   foreach ($arbres as $key => $value) {
      echo "<tr><td>" . $value->node. "</td><td>" . $value->name. "</td><td>" . $value->parent->name. "</td><td><a href='app.php?deleteid=" . $value->id. "'>Supprimer</a></td></tr>";
   }
   ?>
      </tbody>

   </table>


   <hr>

   <div id="Preview">
   </div>
   <ul id="Menu"></ul>
  
<?php

include("footer.php");

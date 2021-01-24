<?php
include("config.php");
include("Tree.php");
include("TreeDAO.php");

$dao=new TreeDAO(Connection::getConnection());



if(isset($_POST["name"],$_POST["parent"])){
    $name=$_POST["name"];
    $parent=$_POST["parent"];
    //VALIDATION todo

    $tree=new Tree(0,$name,$parent);

    $dao->add($tree);
   

    $arbres=$dao->all();

}
else{

    $arbres=$dao->all();


}



?>

<!DOCTYPE html>
<html lang="en">

<head>
   <title>Bootstrap Example</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>


   <form method="POST" name="addsheep">

      <input type="text" name="name" required />


      <select name="parent">

         <?php
         foreach ($arbres as $key => $value) {
            echo "<option value=" . htmlentities($value["id"]) . ">" . $value["name"] . "</option>";
         }
         ?>
      </select>

      <input type="submit" value="Ajouter">

   </form>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
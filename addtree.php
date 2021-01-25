<?php
include("config.php");
include("TreeDAO.php");

$dao = new TreeDAO(Connection::getConnection());



if (isset($_POST["name"], $_POST["parent"])) {
    $name = $_POST["name"];
    $parent = $_POST["parent"];
    //VALIDATION todo
    
    $tree = new Tree(0, $name);

    $tree->setParent($parent);

    $res=$dao->add($tree);


    $arbres = $dao->all();
} else {

    $arbres = $dao->all();
}


include("header.php");
?>
 

<form id="addnode" method="POST" name="addsheep">
    <div class="form-group">
        <label for="name">Nom:</label>
        <input id="name" type="text" name="name" class="form-control" required />
    </div>
    

    <div class="form-group">
    <label for="parent">Parent:</label>
    <select id="parent" name="parent" class="form-control">
    <?php
        
            echo "<option value='0'>Aucun arbre parent</option>";
        
        
        foreach ($arbres as $key => $value) {
            echo "<option value=" . $value->id . ">" . $value->name . "</option>";
        }
        ?>
    </select>
    </div>
    <input   type="submit" value="Ajouter" class="btn btn-primary btnsubmit">

</form> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
include("footer.php");
?>
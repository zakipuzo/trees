
<?php

include("Tree.php");

class TreeDAO
{
    public $con;

    function __construct($con)
    {
        $this->con = $con;
    }

    //SELECT ALL

    public  function all()
    {
        //$sql = "SELECT t1.name pname, t2.name cname FROM Tree t1 inner join Tree t2 on t1.id=t2.tree_parent";
        $sql = "SELECT t1.id id, t1.name name, t2.id cid, t2.name cname FROM Tree t1 inner join Tree t2 on t1.id=t2.parent";

        $stm = $this->con->prepare($sql);

        try {
            $stm->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        //return true or false
        $result = $stm->setFetchMode(PDO::FETCH_ASSOC);
        $arbres = [];
        if ($result) {
            $data = $stm->fetchAll();

            $arbres=[];
            foreach($data as $value){
                $tree=new Tree($value['id'],$value['name']);
                $parent=new Tree($value['cid'],$value['cname']);

                $tree->setParent($parent);
                array_push($arbres,$tree);
            }

            return $arbres;
        }

        return $arbres;
    }

    //CREATE
    public  function add($tree)
    {
        try {

            $sql = "SELECT id, name FROM Tree";

            $stm = $this->con->prepare($tree->parent);


            $sql = "INSERT INTO Tree (name, tree_parent) VALUES ('" . $tree->name . "', " . $tree->parent . ")";
            // use exec() because no results are returned
            $this->con->exec($sql);
            echo "New record created successfully";

            $sql="INSERT INTO Tree (name, tree_parent) VALUES ('" . $tree->name . "', " . $tree->parent . ")";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}

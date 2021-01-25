
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
        $sql = "SELECT t1.node node, t1.id cid, t1.name cname, t2.id pid, t2.name pname FROM trees t1 left join trees t2 on t1.treeId=t2.id order by t1.node asc";

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
            $output = array();
        
            $arbres=array();
            foreach($data as $value){
                $tree=new Tree($value['cid'],$value['cname']);
                $tree->setnode($value['node']);
                $parent=new Tree($value['pid'],$value['pname']);
                $tree->setParent($parent);
                 
                    array_push($output ,$tree);
                 
            }

            return $output;
        }

        return $arbres;
    }

    //CREATE
    public  function add($tree)
    {
        try {
           if($tree->parent==0)
           $sql = "INSERT INTO trees (name, treeId) VALUES ('" . $tree->name . "', NULL)";
           else
           $sql = "INSERT INTO trees (name, treeId) VALUES ('" . $tree->name . "', " . $tree->parent . ")";

            
            // use exec() because no results are returned
            $this->con->exec($sql);
            
            header('location:index.php?added=1');
             

            $sql="INSERT INTO trees (name, treeId) VALUES ('" . $tree->name . "', " . $tree->parent . ")";
        } catch (PDOException $e) {

            //header('location:index.php?added=0');
           echo $sql . "<br>" . $e->getMessage();
        }
    }


    public function findById($id){
        $sql = "SELECT t1.id id, t1.name, t2.id cid, t2.name cname  from trees where id=".$id;

        $stm = $this->con->prepare($sql);

        try {
            $stm->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function update(){

    }

    public function deleteByID($id){
        $sql = "Delete  FROM trees where id=".$id;

        $this->con->exec($sql);
    }

    public function deleteAll(){

        $sql = "Delete  FROM trees";

        $this->con->exec($sql);

    }
}

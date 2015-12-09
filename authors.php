<?php

include_once "a_model.php";

class Authors_model extends Model{

    function __construct(){
        $this->_table = "author";
        parent::__construct();

    }

    function add_one($data_add) {

    	$query = "INSERT INTO `$this->_table` SET `$this->_fields_aut` = ?";
    	$stmt = mysqli_prepare($this->_c, $query);
    	if ($stmt) {
            $count = count($data_add);
            for ($i=0; $i < $count; $i++) {
                mysqli_stmt_bind_param($stmt, 's', $data_add[$i]);
                mysqli_stmt_execute($stmt);
            }
        }
        return printf("Rows inserted: %d\n", $count);  //mysqli_stmt_affected_rows($stmt));
	    mysqli_stmt_close($stmt);
    }

    function del_one($data_del) {

    	$query = "DELETE FROM `$this->_table` WHERE $this->_fields_aut = $data_del";

        if (mysqli_query($this->_c, $query) === TRUE) {
            return printf("%d - string removed. \n", mysqli_affected_rows($this->_c));   
        }
        else return printf("Position is not removed from the table $table :( %s\n", mysql_error());
    }
}



// echo "<br/> <pre>";
// $ob_author = new Authors_model();
// print_r($ob_author->get_all());
// echo "</pre>";

// $author_name = array('Korney Chukovsky', 'William Shakespeare');
// $obj_author = new Authors_model();
// $obj_author->add_one($author_name);

// $obj_author = new Authors_model();
// $where = "'William Shakespeare'";
// $obj_author->del_one($where);


/// the end
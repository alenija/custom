<?php

include_once "a_model.php";

class Authors_model extends Model{

    function __construct(){
        $this->_table = "author";
        parent::__construct();

    }

    function add_one($data_add) {

    	$query = "INSERT INTO `$this->_table` SET `author` = ?";
    	$stmt = mysqli_prepare($this->_c, $query);
    	if ($stmt) {
                mysqli_stmt_bind_param($stmt, 's', $data_add);
                mysqli_stmt_execute($stmt);
            }
        return printf("Rows inserted: %d\n", mysqli_stmt_affected_rows($stmt));
    }

    function del_author_name($data_del) {

    	$query = "DELETE FROM `$this->_table` WHERE author = $data_del";
        if (mysqli_query($this->_c, $query) === TRUE) {
            return printf("%d - string removed. \n", mysqli_affected_rows($this->_c));   
        }
        else return printf("Position is not removed from the table $table :( %s\n", mysql_error());
    }
}

/// the end

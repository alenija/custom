<?php

include_once "a_model.php";

class Genres_model extends Model{

	function __construct(){
		$this->_table = "genre";
		parent::__construct();
	}

    function add_one($data_add) {

    	$query = "INSERT INTO `$this->_table` SET `genre` = ?";
    	$stmt = mysqli_prepare($this->_c, $query);
    	if ($stmt) {
            $count = count($data_add);
            for ($i=0; $i < $count; $i++) {
                mysqli_stmt_bind_param($stmt, 's', $data_add[$i]);
                mysqli_stmt_execute($stmt);
            }
        }
        return printf("Rows inserted to table \"$this->_table\": %d\n", mysqli_stmt_affected_rows($stmt));
	    mysqli_stmt_close($stmt);
    }

    function del_one($data_del) {}
}


/// the end

<?php

include_once "a_model.php";

class Books_model extends Model{

	function __construct(){
		$this->_table = "book"; //name data bases table
		parent::__construct();
	}

	function add_one($array){
		$query = "INSERT INTO `$this->_table` SET `$this->_fields_aut` = ?";
    	$stmt = mysqli_prepare($this->_c, $query);
    	if ($stmt) {
    		$count = count($data_add);
            for ($i=0; $i < $count; $i++) {
                mysqli_stmt_bind_param($stmt, 's', $data_add[$i]);
                mysqli_stmt_execute($stmt);
            }
        }
        return printf("Rows inserted: %d\n", mysqli_stmt_affected_rows($stmt));
	    mysqli_stmt_close($stmt);

	}
}


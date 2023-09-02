<?php
require_once(LIB_PATH.DS."config.php");
class Database {
	var $sql_string = '';
	var $error_no = 0;
	var $error_msg = '';
	private $conn;
	public $last_query;
	private $magic_quotes_active;
	private $real_escape_string_exists;
	
	function __construct() {
		$this->open_connection();
		$this->magic_quotes_active = get_magic_quotes_gpc();
		$this->real_escape_string_exists = function_exists("mysqli_real_escape_string");
	}
	
	public function open_connection() {
		$this->conn = mysqli_connect(server,user,pass);
		if(!$this->conn){
			echo "Problem in database connection! Contact administrator!";
			exit();
		 
		}else{

			$db_select = mysqli_select_db($this->conn,database_name);
			if (!$db_select) {
				echo "Problem in selecting database! Contact administrator!";
				exit();
			}
		}

	}
	
	function setQuery($sql='') {
		$this->sql_string=$sql;
	}
	
	function executeQuery() {
		$result = mysqli_query($this->conn,$this->sql_string);
		$this->confirm_query($result);
		return $result;
	}	
	
	private function confirm_query($result) {
		if(!$result){
			$this->error_no = mysqli_errno($this->conn);
			$this->error_msg = mysqli_error($this->conn);
			return false;				
		}
		return $result;
	} 
	
	function loadResultList( $key='' ) {
		$cur = $this->executeQuery();
		
		$array = array();
		while ($row = mysqli_fetch_object($cur)) {
			if ($key) {
				$array[$row->$key] = $row;
			} else {
				$array[] = $row;
			}
		}
		mysqli_free_result( $cur );
		return $array;
	}
	
	function loadSingleResult() {
		$cur = $this->executeQuery();
			
		while ($row = mysqli_fetch_object($cur)) {
		return $data = $row;
		}
		mysqli_free_result($cur);
		//return $data;
	}
	
	function getFieldsOnOneTable($tbl_name) {
	
		$this->setQuery("DESC ".$tbl_name);
		$rows = $this->loadResultList();
		
		$f = array();
		for ( $x=0; $x<count($rows); $x++ ) {
			$f[] = $rows[$x]->Field;
		}
		
		return $f;
	}	

	public function fetch_array($result) {
		return mysqli_fetch_array($result);
	}
	//gets the number or rows	
	public function num_rows($result_set) {
		return mysqli_num_rows($result_set);
	}
  
	public function insert_id() {
    // get the last id inserted over the current db connection
		return mysqli_insert_id($this->conn);
	}
  
	public function affected_rows() {
		return mysqli_affected_rows($this->conn);
	}
	
	 public function escape_value( $value ) {
		if( $this->real_escape_string_exists ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if($this->magic_quotes_active) { $value = stripslashes($value); }
			$value = mysqli_real_escape_string($this->conn,$value);
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$this->magic_quotes_active ) { $value = addslashes($value); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
   	}
	
	public function close_connection() {
		if(isset($this->conn)) {
			mysqli_close($this->conn);
			unset($this->conn);
		}
	}
	
} 
$mydb = new Database();


?>

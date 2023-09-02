<?php
	function strip_zeros_from_date($marked_string="") {
		//first remove the marked zeros
		$no_zeros = str_replace('*0','',$marked_string);
		$cleaned_string = str_replace('*0','',$no_zeros);
		return $cleaned_string;
	}
	function redirect_to($location = NULL) {
		if($location != NULL){
			header("Location: {$location}");
			exit;
		}
	}
	function redirect($location=Null){
		if($location!=Null){
			echo "<script>
					window.location='{$location}'
				</script>";	
		}else{
			echo 'error location';
		}
		 
	}
	function output_message($message="") {
	
		if(!empty($message)){
		return "<p class=\"message\">{$message}</p>";
		}else{
			return "";
		}
	}
	function date_toText($datetime=""){
		$nicetime = strtotime($datetime);
		return strftime("%B %d, %Y at %I:%M %p", $nicetime);	
					
	}
	function __autoload($class_name) {
		$class_name = strtolower($class_name);
		$path = LIB_PATH.DS."{$class_name}.php";
		if(file_exists($path)){
			require_once($path);
		}else{
			die("The file {$class_name}.php could not be found.");
		}
					
	}

	function currentpage_public(){
		$this_page = $_SERVER['SCRIPT_NAME']; // will return /path/to/file.php
	    $bits = explode('/',$this_page);
	    $this_page = $bits[count($bits)-1]; // will return file.php, with parameters if case, like file.php?id=2
	    $this_script = $bits[0]; // will return file.php, no parameters*/
		 return $bits[2];
	  
	}

	function currentpage_admin(){
		$this_page = $_SERVER['SCRIPT_NAME']; // will return /path/to/file.php
	    $bits = explode('/',$this_page);
	    $this_page = $bits[count($bits)-1]; // will return file.php, with parameters if case, like file.php?id=2
	    $this_script = $bits[0]; // will return file.php, no parameters*/
		 return $bits[4];
	  
	}
  // echo "string " .currentpage_admin()."<br/>";

	function curPageName() {
 return substr($_SERVER['REQUEST_URI'], 21, strrpos($_SERVER['REQUEST_URI'], '/')-24);
}

  // echo "The current page name is ".curPageName();
	 
	function msgBox($msg=""){
		?>
		<script type="text/javascript">
			 alert(<?php echo $msg; ?>)
		</script>
		<?php
	}
		
?>
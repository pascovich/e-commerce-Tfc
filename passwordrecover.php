<?php require_once ("include/initialize.php"); ?>

<link href="<?php echo web_root ?>css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="<?php echo web_root ?>/js/bootstrap.min.js"></script>
<script src="<?php echo web_root ?>jquery/jquery.min.js"></script> 

 <link rel="stylesheet" href="<?php echo web_root ?>/font/css/font-awesome.min.css">
 <style type="text/css">
 	.form-gap {
    padding-top: 70px;
}
 </style>
 <?php 
	if (isset($_POST['recover-submit'])) {
		# code...
		$_SESSION['phonenumber'] = $_POST['phonenumber'];
		$customer = New Customer();
      	@$res = $customer->find_phone($_SESSION['phonenumber']);

      	if ($res) {
      		# code...
      		$code = mt_rand(1000,10000);

          $_SESSION['recovery_code'] = $code;


	        $sql = "INSERT INTO `messageout` (`Id`, `MessageTo`, `MessageFrom`, `MessageText`) VALUES (Null, '".$_SESSION['phonenumber']."','Janno','".'Your code is ' .$_SESSION['recovery_code']."')";
	        $mydb->setQuery($sql);
	        $mydb->executeQuery();

			redirect('passwordrecover.php?code');
      	}else{
      		//redirect('passwordrecover.php?code='.$code);
      		$phonemessage = '<p>Your phone number is incorrect.</p>';
      	}
 
	}
	if (isset($_POST['validatecode-submit'])) {
		# code... 
		if ($_SESSION['recovery_code']==$_POST['resetcode']) {
			# code...
	   		redirect('passwordrecover.php?resetpassword');
		}else{
			$codemessage = '<p>Your code is incorrect.</p>';
		}
	}
	if (isset($_POST['savepass-submit'])) {
		# code...
  
		$customer = New Customer();
      	$res = $customer->find_phone($_SESSION['phonenumber']);
      	if ($res) {
      		# code...

			$customer = New Customer();   
			$customer->CUSPASS			= sha1($_POST['newpassword']);	
			$customer->update($res->CUSTOMERID);

      	}

		unset($_SESSION['phonenumber']);
    unset($_SESSION['recovery_code']);

	 redirect('passwordrecover.php?success');
	}

?>
 <div class="form-gap"></div>
 <?php if (isset($_GET['code'])) { ?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>Put your code here.</p>
                  <?php echo isset($codemessage) ? $codemessage : "";?>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-code color-blue"></i></span>
                          <input id="resetcode" name="resetcode" placeholder="Input your Code Number here" class="form-control"  type="number" required="true">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="validatecode-submit" class="btn btn-lg btn-primary btn-block" value="Submit" type="submit">
                        <a href="index.php">Back to site</a>
                      </div> 
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
<?php  }elseif(isset($_GET['resetpassword'])){ ?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>Change your password.</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user color-blue"></i></span>
                          <input id="newpassword" name="newpassword" placeholder="New Password" class="form-control"  type="password" required="true">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="savepass-submit" class="btn btn-lg btn-primary btn-block" value="Save" type="submit">
                        <a href="index.php">Back to site</a>
                      </div> 
                      <input type="hidden" class="hide" name="token" id="token" value="<?php echo $_SESSION['phonenumber']; ?>"> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
<?php  }elseif(isset($_GET['success'])){ ?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-4">
          	<h2 style="color: blue">Password has been change</h2>
          	 <a href="index.php">Back to login</a>
          </div>
	</div>
<?php  }else{ ?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                   <?php echo isset($phonemessage) ? $phonemessage : "";?>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-phone color-blue"></i> +63</span>
                          <input id="phonenumber" name="phonenumber" placeholder="Enter your Phone Number" class="form-control"  type="number" required="true">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Send" type="submit">
                        <a href="index.php">Back to site</a>
                      </div> 
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
<?php } ?>



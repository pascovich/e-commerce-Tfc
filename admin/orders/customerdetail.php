<?php  
 
     if (!isset($_SESSION['USERID'])){
      redirect("index.php");
     }
 
  ?>
    

 <?php
  $customer = New customer;
  $res = $customer->single_customer($_GET['customerid']); 
  ?>  


<style type="text/css"> 
.Cus-info {
  max-width: 100%;
  /*float: left;*/
  margin-bottom: 20px;
  background-color: #f5f5f5;
  border: 1px solid transparent;
  border-radius: 4px;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
          box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
 }
.Cus-info .header {
  padding-bottom: 9px;
  margin: 20px 6px 20px;
  border-bottom: 1px solid #eeeeee;
  font-size: 30px; 
  font-weight: bold; 
  font-variant: small-caps;
  font-family: arial black;
 
  /*background-color: lightblue;*/
  }
 
.Cus-info p {
    border-bottom: solid 1px gray;
    width:100%;
    font-style: bold 1px;
    color: lightgray ;
    background-color: gray;
    /*line-height: 10px;*/

}

.Cus-info label {
 /* background-color: gray;
  width: 100%;*/
  font-size: 17px;
  font-weight: bold;  

} 
.Cus-info label:hover {
  text-transform: uppercase;
  outline-color: blue;

  /*color:white;*/
  }

  .Cus-info .pic > img {
    height: 100px;
  }

  .Cus-info .Stretch > img {
    width: 100px;
    height: 100px; 

  }

@media (min-width: 768px) {
  .Cus-info {
    position: inherit;
    padding: 0;
    margin: 0;
    vertical-align: center;
  }
}
</style>

<!-- <div class="col-md-4  Cus-info" style="margin-left:0; float:right">
      <div class="row">
            <div class="col-md-12">
              <div class=" pic">
                 <div class="stretch">
               <img src="<?php echo web_root. 'customer/'. $res->CUSPHOTO; ?>"/> 
            </div>
              </div>
             
         </div>
     </div>
</div> -->

 
<div class="col-md-12 Cus-info">
<div class="header">Information du client</div> 
  <div class="row">

    <div class="col-md-12">
        <div class="col-md-6">
            <label><?php echo $res->FNAME; ?></label>
              <!--  <p>::</p> -->
             <p>Nom::</p>
             <!-- <p>::</p> -->
        </div>
        <div class="col-md-6">
               <label><?php echo $res->LNAME; ?> </label>
                <!--  <p>::</p> -->
              <p>Postnom ::</p> 
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6">
          <label><?php echo $res->GENDER; ?></label>
            <!-- <p >::</p> -->
            <p>Sexe::</p>    
        </div>
        <div class="col-md-6">
          <label><?php echo $res->PHONE; ?></label>
           <!--  <p>::</p> -->
           <p>N° Telephone::</p>
        </div>
    </div>

<!--      <div class="col-md-12">
        <div class="col-md-6">
              <label><?php echo $res->CUSHOMENUM; ?></label> 
               <p>Home#::</p> 
        </div>
        <div class="col-md-6">
          <label><?php echo $res->STREETADD; ?></label> 
               <p>STREET/Village::</p> 
        </div>
    </div>
-->
     <div class="col-md-12"> 
        <div class="col-md-6">
           <label><?php echo $res->CITYADD; ?></label> 
               <p>Ville/Quartier::</p>  
        </div>
    </div>

<!--      <div class="col-md-12">
        <div class="col-md-6">
           <label><?php echo $res->PROVINCE; ?></label> 
               <p>Province::</p> 
        </div>
        <div class="col-md-6">
           <label><?php echo $res->COUNTRY; ?></label> 
               <p>Country::</p>  
        </div>
    </div>
 -->
    <!--  <div class="col-md-12">
        <div class="col-md-6">
          <label><?php echo $res->ZIPCODE; ?></label> 
               <p>Zip Code::</p>
        </div>
        <div class="col-md-6">
          
        </div>
    </div> -->

  


  </div>
</div>
  

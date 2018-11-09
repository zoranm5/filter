  <?php require_once 'database.php';  ?>
 
			
  
  <?php
  

	

	 
		 if(isset($_POST['submit'])){
			 
        $ime      = $_POST['ime'];
        $prezime  = $_POST['prezime'];
        $grad_stanovanja      = $_POST['grad_stanovanja'];
        $grad_rodjenja   = $_POST['grad_rodjenja'];
        $datum_rodjenja  = $_POST['datum_rodjenja'];
        $spol   = $_POST['spol'];
        $naziv_zavoda = $_POST['naziv_zavoda'];
        $oib  = $_POST['oib'];
		
   
  
    
  $sql =<<<EOF
  INSERT INTO djelatnici ( ime, prezime, grad_stanovanja, grad_rodjenja, datum_rodjenja,  spol, naziv_zavoda, oib)  VALUES ( '$ime', '$prezime', '$grad_stanovanja','$datum_rodjenja','$grad_rodjenja','$spol','$naziv_zavoda' , '$oib'); 
  

EOF;


 $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Records created successfully\n";
   }
   $db->close();
		 }
		 

	// echo '<pre>';
	// print_r($_POST);
	// echo '</pre>';
	
?>



<form  style ='display:inline;' action="" method="post" enctype="multipart/form-data" >
<fieldset> 
 <br>
 
     <div class="form-group">
         <label for="post_tags">Ime</label>
         <input type="text" class="form-control" name="ime" ;>
     </div>
      <br>
      <div class="form-group">
         <label for="post_content">Prezime</label>
         <input type="text" class="form-control" name="prezime">
     </div>
	 <br>
	 <div class="form-group">
         <label for="post_content">Grad stanovanja</label>
         <input type="text" class="form-control" name="grad_stanovanja">
     </div>
	 <br>
	
	 <div class="form-group">
         <label for="post_content">Grad rodjenja</label>
         <input type="text" class="form-control" name="grad_rodjenja">
     </div>
	 <br>
	  <div class="form-group">
         <label for="datum_rodjenja">Datum rodjenja</label>
         <input type="date" class="form-control" name="datum_rođjenja">
     </div>
	 <br>
	 
	 <div class="form-group">
         <label for="post_content">Spol</label>
         <input type="text" class="form-control" name="spol">
     </div>
	 <br>
	 <div class="form-group">
         <label for="post_content">Naziv zavoda</label>
         <input type="text" class="form-control" name="naziv_zavoda">
     </div>
	 <br>
	 <div class="form-group">
         <label for="post_content">Oib</label>
         <input type="number" class="form-control"  name="oib" >
     </div>
     <br>
     <div class="form-group">
     <br>
     <input type="submit" class="btn btn-primary" name="submit" value="Dodaj">
     
     </div>
     
     
   </fieldset>  
</form>
	
</html>
		
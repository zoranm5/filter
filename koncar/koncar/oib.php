  <?php require_once 'database.php';  ?>
  
  <!DOCTYPE html>

<html>

			<html lang="en">
			
			<head>
			
			
			</head>
<div class="container">
<body>
<style>
table, th, td {
   border: 1px solid black;
    border-collapse: collapse;
	padding: 10px;
	text-align: center;
    
}
</style>
<table style="width:80%" class="table table-bordered table-hover">
 <div id="bulkOptionContainer" class="col-xs-6 col-xs-offset-3">
              <thead>
                    <tr>
                       
                        
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Grad stanovanja</th>
						<th>Grad rođenja</th>
                        <th>Datum rođenja</th>
                        <th>Spol</th>
                        <th>Naziv zavoda</th>
                        <th>Oib</th>
						<th>Natrag</th>
						
						
                        
                    </tr>
                </thead>
				<tbody>
				
  <?php
  
      if(isset($_GET['oib'])){
		  
		  $the_oib =$_GET['oib'];
		  
	  }
  
  
   $sql =<<<EOF
      SELECT * from djelatnici  WHERE oib =$the_oib;
EOF;
  
   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
        // $id         = $row['id'];
        $ime   = $row['ime'];
        $prezime      = $row['prezime'];
        $grad_stanovanja      = $row['grad_stanovanja'];
        $grad_rodjenja   = $row['grad_rodjenja'];
        $datum_rodjenja  = $row['datum_rodjenja'];
        $spol   = $row['spol'];
        $naziv_zavoda = $row['naziv_zavoda'];
        $oib  = $row['oib'];
        
			
	
    echo "<tr>";			

             // echo "<td><a href=ime.php?id=$id>$id</a></td>";
			 
	
			 echo "<td>$ime </td>";
			 echo "<td>$prezime</td>";
			 echo "<td>$grad_stanovanja </td>";
			 echo "<td>$grad_rodjenja</td>";
			 echo "<td>$datum_rodjenja</td>";
			 echo "<td>$spol</td>";
			 echo "<td>$naziv_zavoda</td>";
			 echo "<td>$oib</td>";
			 echo "<td><a href='index.php'>Natrag</a></td>" ;

			 
	 echo "</tr>";
   }
   
   $db->close();
?>
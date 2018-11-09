<?php require_once 'database.php';  ?>

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
<table style="width:10%" class="table table-bordered table-hover">
 <div id="bulkOptionContainer" class="col-xs-6 col-xs-offset-3">
              <thead>
                    <tr>
                       
                        
                        <th>Imena</th>
                     
						
                        
                    </tr>
                </thead>
				<tbody>
				
  <?php
  
      
  
  
   $sql =<<<EOF
      SELECT  ime FROM djelatnici ;
	  
	  
	  
EOF;
  
   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
        
        $ime   = $row['ime'];
     
			
	
   

    echo "<tr>";			

       
			 
	
			 echo "<td>$ime </td>";
			 
			 
			 
	 echo "</tr>";
   }	
   	
?>
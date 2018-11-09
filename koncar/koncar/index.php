<?php require_once 'database.php';  ?>
 
 <!DOCTYPE html>

<html>

			<html lang="en">
			
			<head>
			
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
<body>


<table style="width:80%" class="table table-bordered table-hover">
		<form  name="search_form" method="POST" action="sqlite.php">
 Pretraži bazu: <input type='text' name="search_box" value="" />
 <input type="submit" name="search" value="Traži">
 </form>

  <a class="btn btn" href="djelatnik.php">Dodaj djelatnika<a/>
<br>

 <div id="bulkOptionContainer" class="col-xs-6 col-xs-offset-3">

              <thead>
                    <tr>
                       
                      
                        <th><a href="imena.php">Ime</a></th>
                        <th><a href="prezimena.php">Prezime</a></th>
                        <th><a href="stanovanja.php">Grad stanovanja</a></th>
						<th>Grad rođenja</th>
                        <th>Datum rođenja</th>
                        <th>Spol</th>
                        <th>Naziv zavoda</th>
                        <th>Oib</th>
						<th>Profil</th>
						
						
                        
                    </tr>
                </thead>
				<tbody>
				
				
				
				</body>
	

<b
 
							
   <?php
   $sql =<<<EOF
      SELECT * from djelatnici ORDER BY ime;
EOF;

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
 
        $ime   = $row['ime'];
        $prezime      = $row['prezime'];
        $grad_stanovanja      = $row['grad_stanovanja'];
        $grad_rodjenja   = $row['grad_rodjenja'];
        $datum_rodjenja  = $row['datum_rodjenja'];
        $spol   = $row['spol'];
        $naziv_zavoda = $row['naziv_zavoda'];
        $oib  = $row['oib'];
        
			
	
    echo "<tr>";			

            
			 
	
			 echo "<td><a href=ime.php?ime=$ime>$ime </td>";
			 echo "<td><a href=prezime.php?prezime=$prezime>$prezime</td>";
			 echo "<td><a href=grad.php?grad_stanovanja=$grad_stanovanja>$grad_stanovanja</a></td>";
			          
			 echo "<td><a href=grad_rodjenja.php?grad_rodjenja=$grad_rodjenja>$grad_rodjenja</td>";
			 echo "<td>$datum_rodjenja</td>";
			 echo "<td>$spol</td>";
			 echo "<td><a href=naziv_zavoda.php?naziv_zavoda=$naziv_zavoda>$naziv_zavoda</a></td>";
			 echo "<td>$oib</td>";
			 echo "<td><a href=oib.php?oib=$oib>Profil</a></td>";
			           
			           

			 
	 echo "</tr>";
   } 
   
   $db->close();
?>
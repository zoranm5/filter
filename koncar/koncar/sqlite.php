
<?php require_once 'database.php';  ?>
 
<?php


 
if(isset($_POST['search'])) {
	
	$search_term = $_POST['search_box'];
 $sql =<<<EOF
      SELECT * from djelatnici WHERE ime LIKE '$search_term' OR prezime LIKE  '$search_term' OR grad_rodjenja LIKE '$search_term' or grad_stanovanja LIKE '$search_term' ;
EOF;

	
}

$ret = $db->query($sql);

?>
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
<form name="search_form" method="POST" action="sqlite.php">
 Search : <input type='text' name="search_box" value="" />
 <input type="submit" name="search" value="Search the table...">
 </form>
 


<table style="width:80%" class="table table-bordered table-hover">
     <div id="bulkOptionContainer" class="col-xs-6 col-xs-offset-3">               
                       <thead>
                      <tr>
                        <td><strong>Ime</strong></td>
                        <td><strong>Prezime</strong></td>
                        <td><strong>Grad stanovanja</strong></td>
						<td><strong>Grad rođenja</strong></td>
                        <td><strong>Datum rođenja</strong></td>
                        <td><strong>Spol</strong></td>
                        <td><strong>Naziv zavoda</strong></td>
                        <td><strong>Oib</strong></td>
						
					
                    </tr>
				</thead>
				<tbody>
					 <?php while($row = $ret->fetchArray(SQLITE3_ASSOC) ){ ?>
					 <tr>
					 
						<td><?php echo $row['ime']; ?></td>
						<td><?php echo $row['prezime']; ?></td>
						<td><?php echo $row['grad_stanovanja']; ?></td>
						<td><?php echo $row['grad_rodjenja']; ?></td>
						<td><?php echo $row['datum_rodjenja']; ?></td>
						<td><?php echo $row['spol']; ?></td>
						<td><?php echo $row['naziv_zavoda']; ?></td>
						<td><?php echo $row['oib']; ?></td>
						
					 
					 
					 </tr>
					 <?php }  ?>
				</table>
				
				</div>
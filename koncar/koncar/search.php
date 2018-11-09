<?php require_once 'database.php';  ?>
<?php
		
	$ime = ""; //with_any_one_of
	$ime = ""; //with_the_exact_of 
	$prezime = "";        //without
	$starts_with = "";
	$search_in = "";      //search_in
	$advance_search_submit = "";  //advance_search_submit
	
	$queryCondition = "";
	if(!empty($_POST["search"])) {
		$advance_search_submit = $_POST["advance_search_submit"];
		foreach($_POST["search"] as $k=>$v){
			if(!empty($v)) {

				$queryCases = array("with_any_one_of","ime","prezime","starts_with");
				if(in_array($k,$queryCases)) {
					if(!empty($queryCondition)) {
						$queryCondition .= " AND ";
					} else {
						$queryCondition .= " WHERE ";
					}
				}
				switch($k) {
					case "ime":
						$ime = $v;
						$wordsAry = explode(" ", $v);
						$wordsCount = count($wordsAry);
						for($i=0;$i<$wordsCount;$i++) {
							if(!empty($_POST["search"]["search_in"])) {
								$queryCondition .= $_POST["search"]["search_in"] . " LIKE '%" . $wordsAry[$i] . "%'";
							} else {
								$queryCondition .= "ime LIKE '" . $wordsAry[$i] . "%' OR prezime LIKE '" . $wordsAry[$i] . "%'";
							}
							if($i!=$wordsCount-1) {
								$queryCondition .= " OR ";
							}
						}
						break;
					case "ime":
						$ime = $v;
						if(!empty($_POST["search"]["search_in"])) {
							$queryCondition .= $_POST["search"]["search_in"] . " LIKE '%" . $v . "%'";
						} else {
							$queryCondition .= "ime LIKE '%" . $v . "%' OR prezime LIKE '%" . $v . "%'";
						}
						break;
					case "prezime":
						$prezime = $v;
						if(!empty($_POST["search"]["search_in"])) {
							$queryCondition .= $_POST["search"]["search_in"] . " NOT LIKE '%" . $v . "%'";
						} else {
							$queryCondition .= "ime NOT LIKE '%" . $v . "%' AND prezime NOT LIKE '%" . $v . "%'";
						}
						break;
					case "starts_with":
						$starts_with = $v;
						if(!empty($_POST["search"]["search_in"])) {
							$queryCondition .= $_POST["search"]["search_in"] . " LIKE '" . $v . "%'";
						} else {
							$queryCondition .= "ime LIKE '" . $v . "%' OR description LIKE '" . $v . "%'";
						}
						break;
					case "search_in":
						$search_in = $_POST["search"]["search_in"];
						break;
				}
			}
		}
	}
	
	  $sql =<<<EOF
      SELECT * from djelatnici;
EOF;
	
?>
<html>
	<head>
	<title>Advanced Search using PHP</title>
	<style>
		body{
			width: 600px;
			font-family: "Segoe UI",Optima,Helvetica,Arial,sans-serif;
			line-height: 25px;
		}
		.search-box {
			padding: 30px;
			background-color:#C8EEFD;
		}
		.search-label{
			margin:2px;
		}
		.demoInputBox {    
			padding: 10px;
			border: 0;
			border-radius: 4px;
			margin: 0px 5px 15px;
			width: 250px;
		}
		.btnSearch{    
			padding: 10px;
			background: #84D2A7;
			border: 0;
			border-radius: 4px;
			margin: 0px 5px;
			color: #FFF;
			width: 150px;
		}
		#advance_search_link {
			color: #001FFF;
			cursor: pointer;
		}
		.result-description{
			margin: 5px 0px 15px;
		}
	</style>
	<script>
		function showHideAdvanceSearch() {
			if(document.getElementById("advanced-search-box").style.display=="none") {
				document.getElementById("advanced-search-box").style.display = "block";
				document.getElementById("advance_search_submit").value= "1";
			} else {
				document.getElementById("advanced-search-box").style.display = "none";
				document.getElementById("ime").value= "";
				document.getElementById("prezime").value= "";
				document.getElementById("starts_with").value= "";
				document.getElementById("search_in").value= "";
				document.getElementById("advance_search_submit").value= "";
			}
		}
	</script>
	</head>
	<body>
		<h2>Advanced Search using PHP</h2>
    <div>      
			<form name="frmSearch" method="post" action="search.php">
			<input type="hidden" id="advance_search_submit" name="advance_search_submit" value="<?php echo $advance_search_submit; ?>">
			<div class="search-box">
				<label class="search-label">With Any One of the Words:</label>
				<div>
					<input type="text" name="search[with_any_one_of]" class="demoInputBox" value="<?php echo $ime; ?>"	/>
					<span id="advance_search_link" onClick="showHideAdvanceSearch()">Advance Search</span>
				</div>				
				<div id="advanced-search-box" <?php if(empty($advance_search_submit)) { ?>style="display:none;"<?php } ?>>
					<label class="search-label">Ime:</label>
					<div>
						<input type="text" name="search[ime]" id="ime" class="demoInputBox" value="<?php echo $ime ?>"	/>
					</div>
					<label class="search-label">Prezime:</label>
					<div>
						<input type="text" name="search[prezime]" id="prezime" class="demoInputBox" value="<?php echo $prezime; ?>"	/>
					</div>
					<label class="search-label">Grad rodjenja:</label>
					<div>
						<input type="text" name="search[starts_with]" id="starts_with" class="demoInputBox" value="<?php echo $starts_with; ?>"	/>
					</div>
					
					
				</div>
				
				<div>
					<input type="submit" name="go" class="btnSearch" value="Search">
				</div>
			</div>
			</form>	
			<?php $ret = $db->query($sql);
			while($row = $ret->fetchArray(SQLITE3_ASSOC) ) { ?>
			<div>
				<div><strong><?php echo $row["ime"]; ?></strong></div>
				<div class="result-description"><strong><?php echo $row["prezime"]; ?></strong></div>
			</div>
			<?php } ?>
		</div>
	</body>
</html>
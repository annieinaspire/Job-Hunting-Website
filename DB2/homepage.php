<?php
	session_start();
	if(isset($_SESSION['employee_exist'])){
		header("location: employee_login.php");
	}
	if(isset($_SESSION['employer_exist'])){
		header("location: employer_login.php");
	}
?>
<html>
<center>
	<font size='30'>
		Job Vacancy
	</font>
</center>
<style type="text/css">
.CSSTableGenerator {
	margin:0px;padding:0px;
	width:100%;
	box-shadow: 10px 10px 5px #888888;
	border:1px solid #7f0000;
	
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
	
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
	
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
	
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}.CSSTableGenerator table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	height:100%;
	margin:0px;padding:0px;
}.CSSTableGenerator tr:last-child td:last-child {
	-moz-border-radius-bottomright:25px;
	-webkit-border-bottom-right-radius:25px;
	border-bottom-right-radius:25px;
}
.CSSTableGenerator table tr:first-child td:first-child {
	-moz-border-radius-topleft:25px;
	-webkit-border-top-left-radius:25px;
	border-top-left-radius:25px;
}
.CSSTableGenerator table tr:first-child td:last-child {
	-moz-border-radius-topright:25px;
	-webkit-border-top-right-radius:25px;
	border-top-right-radius:25px;
}.CSSTableGenerator tr:last-child td:first-child{
	-moz-border-radius-bottomleft:25px;
	-webkit-border-bottom-left-radius:25px;
	border-bottom-left-radius:25px;
}.CSSTableGenerator tr:hover td{
	background-color:#ffffff;
		

}
.CSSTableGenerator td{
	vertical-align:middle;
		background:-o-linear-gradient(bottom, #f2b174 5%, #ffffff 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #f2b174), color-stop(1, #ffffff) ); 
	background:-moz-linear-gradient( center top, #f2b174 5%, #ffffff 100% );
	filter:progid:DXImaPOSTransform.Microsoft.gradient(startColorstr="#f2b174", endColorstr="#ffffff");	background: -o-linear-gradient(top,#f2b174,ffffff);

	background-color:#f2b174;

	border:1px solid #7f0000;
	border-width:0px 1px 1px 0px;
	text-align:left;
	padding:10px;
	font-size:14px;
	font-family:Arial;
	font-weight:normal;
	color:#000000;
}.CSSTableGenerator tr:last-child td{
	border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
	border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.CSSTableGenerator tr:first-child td{
		background:-o-linear-gradient(bottom, #ff5656 5%, #7f0000 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ff5656), color-stop(1, #7f0000) );
	background:-moz-linear-gradient( center top, #ff5656 5%, #7f0000 100% );
	filter:progid:DXImaPOSTransform.Microsoft.gradient(startColorstr="#ff5656", endColorstr="#7f0000");	background: -o-linear-gradient(top,#ff5656,7f0000);

	background-color:#ff5656;
	border:0px solid #7f0000;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:14px;
	font-family:Arial;
	font-weight:bold;
	color:#ffffff;
}
.CSSTableGenerator tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #ff5656 5%, #7f0000 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ff5656), color-stop(1, #7f0000) );
	background:-moz-linear-gradient( center top, #ff5656 5%, #7f0000 100% );
	filter:progid:DXImaPOSTransform.Microsoft.gradient(startColorstr="#ff5656", endColorstr="#7f0000");	background: -o-linear-gradient(top,#ff5656,7f0000);

	background-color:#ff5656;
}
.CSSTableGenerator tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
</style>

<?
	class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }
	
    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

	$db_host="dbhome.cs.nctu.edu.tw";
	$db_name="annie0111279_cs";
	$db_user="annie0111279_cs";
	$db_password="annieking";
	$dsn="mysql:host=$db_host;dbname=$db_name";
	
	try {
		$db=new PDO($dsn,$db_user,$db_password);
		// set the PDO error mode to exception
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$occ=$_POST['occupation'];
		$loc=$_POST['location'];
		$work=$_POST['working_time'];
		$edu=$_POST['education'];
		$ex=$_POST['experience'];
		$salary=$_POST['salary'];
		
		echo '<form method="POST">';
		if($_POST['search']==1){
			echo "<input type=\"hidden\" name=\"search\" value=\"1\">";
			echo "<input type=\"hidden\" name=\"occupation\" value=\"$occ\">";
			echo "<input type=\"hidden\" name=\"location\" value=\"$loc\">";
			echo "<input type=\"hidden\" name=\"working_time\" value=\"$work\">";
			echo "<input type=\"hidden\" name=\"education\" value=\"$edu\">";
			echo "<input type=\"hidden\" name=\"experience\" value=\"$ex\">";
			echo "<input type=\"hidden\" name=\"salary\" value=\"$salary\">";
		}
		echo '<button type="submit" value=1 name=desc >sort salary by descending</button>';
		echo '</form>';
		
		echo '<form method="POST">';
		if($_POST['search']==1){
			echo "<input type=\"hidden\" name=\"search\" value=\"1\">";
			echo "<input type=\"hidden\" name=\"occupation\" value=\"$occ\">";
			echo "<input type=\"hidden\" name=\"location\" value=\"$loc\">";
			echo "<input type=\"hidden\" name=\"working_time\" value=\"$work\">";
			echo "<input type=\"hidden\" name=\"education\" value=\"$edu\">";
			echo "<input type=\"hidden\" name=\"experience\" value=\"$ex\">";
			echo "<input type=\"hidden\" name=\"salary\" value=\"$salary\">";
		}
		echo '<button type="submit" value=1 name=inc>sort salary by increasing</button>';
		echo '</form>';
		
		if($_POST['search']==1){
			echo '<form method="POST">';
			echo '<button type="submit" value=0 name=search>Remove Search</button>';
			if($_POST['desc']==1)echo "<input type=\"hidden\" name=\"desc\" value=\"1\">";
			else if($_POST['inc']==1)echo "<input type=\"hidden\" name=\"inc\" value=\"1\">";
			echo '</form><br>';
		}
		?>
		
		
		
		<table style="width:100%">
		<tr>
			<td>Occupation<td>
			<td>Location<td>
			<td>Work Time<td>
			<td>Education Required<td>
			<td>Working Experience<td>
			<td>Salary per month<td>
		<tr>
		<form method="POST">
			<td>
				<select name="occupation">
				<?php
					$sql="SELECT * FROM occupation";
					$sth = $db->prepare($sql); 
					$sth->execute();
					echo "<option>"; 
					echo "</option>"; 
					while($result = $sth->fetchObject()){
						echo "<option value=$result->id>"; 
						echo $result->occupation; 
						echo "</option>"; 
					}
				?> 
				</select>
			<td>
			<td>
			<select name="location">
				<?php
					$sql="SELECT * FROM location";
					$sth = $db->prepare($sql); 
					$sth->execute();
					echo "<option>"; 
					echo "</option>"; 
					while($result = $sth->fetchObject()){
						echo "<option value=$result->id>";
						echo $result->location; 
						echo "</option>"; 
					}	
				?> 
				</select>
			<td>
			<td>
				<select name="working_time">
					<option></option>
					<option value="8hrs per day">8hrs per day</option>
					<option value="9hrs per day">9hrs per day</option>
					<option value="10hrs per day">10hrs per day</option>
					<option value="11hrs per day">11hrs per day</option>
					<option value="12hrs per day">12hrs per day</option>
				</select>
			<td>
			<td>
				<select name="education">
					<option></option>
					<option value="Elementary School">Elementary School</option>
					<option value="Junior High School">Junior High School</option>
					<option value="Senior High School">Senior High School</option>
					<option value="Undergraduate School">Undergraduate School</option>
					<option value="Graduate School">Graduate School</option>
				</select>
			<td>
			<td>
				<select name="experience">
					<option></option>
					<option value="0">0 year</option>
					<option value="1">1~3 year(s)</option>
					<option value="2">4~6 years</option>
					<option value="3">7~8 years</option>
					<option value="4">9~10 years</option>
				</select>
			<td>
			<td>
				<select name="salary">
					<option></option>
					<option value="0">$NT 20000~30000</option>
					<option value="1">$NT 30000~40000</option>
					<option value="2">$NT 40000~50000</option>
					<option value="3">$NT 50000~60000</option>
					<option value="4">$NT 60000~80000</option>
					<option value="5">$NT 80000~100000</option>
				</select>
			<td>
			<?
			    if($_POST['desc']==1)echo "<input type=\"hidden\" name=\"desc\" value=\"1\">";
			    else if($_POST['inc']==1)echo "<input type=\"hidden\" name=\"inc\" value=\"1\">";
			?>
			<button type="submit" value=1 name=search> search </button>
		</tr>
	</table>
</form>
<?
		if($_POST['search']==1){
			if($_POST['occupation']==null && $_POST['location']==null && $_POST['working_time']==null && $_POST['education']==null && $_POST['experience']==null && $_POST['salary']==null){
				$w= "SELECT o.occupation, l.location, r.working_time, r.education, r.experience, r.salary, r.id ".
				"FROM recruit r ". 
				"LEFT JOIN occupation o ON r.occupation_id = o.id ".
				"LEFT JOIN location l ON r.location_id = l.id ";
			}
			else{
				$w= "SELECT o.occupation, l.location, r.working_time, r.education, r.experience, r.salary, r.id ".
				"FROM recruit r ". 
				"LEFT JOIN occupation o ON r.occupation_id = o.id ".
				"LEFT JOIN location l ON r.location_id = l.id ".
				"WHERE ";
			}
			
			if($_POST['occupation']!=null){
				if($_POST['location']==null && $_POST['working_time']==null && $_POST['education']==null && $_POST['experience']==null && $_POST['salary']==null)
					$w=$w . "o.id = $occ ";
				else 
					$w=$w . "o.id = $occ AND ";
			}
			if($_POST['location']!=null){
				if($_POST['working_time']==null && $_POST['education']==null && $_POST['experience']==null && $_POST['salary']==null)
					$w=$w . "l.id = $loc ";
				else 
					$w=$w . "l.id = $loc AND ";
			}
			if($_POST['working_time']!=null){
				if($_POST['education']==null && $_POST['experience']==null && $_POST['salary']==null)
					$w=$w . "r.working_time = '$work' ";
				else 
					$w=$w . "r.working_time = '$work' AND ";
			}
			if($_POST['education']!=null){
				if($_POST['experience']==null && $_POST['salary']==null)
					$w=$w . "r.education = '$edu' ";
				else 
					$w=$w . "r.education = '$edu' AND ";
			}
			if($_POST['experience']!=null){
				if($ex==0)
					$w=$w . "r.experience = $ex ";
				else if($ex==1)
					$w=$w . "r.experience >= 1 AND r.experience <=3 ";
				else if($ex==2)
					$w=$w . "r.experience >= 4 AND r.experience <=6 ";
				else if($ex==3)
					$w=$w . "r.experience >= 7 AND r.experience <= 8 ";
				else if($ex==4)
					$w=$w . "r.experience >= 9 AND r.experience <= 10 ";
				if($_POST['salary']==null)
					$w=$w . "";
				else 
					$w=$w . "AND ";
			}
			if($_POST['salary']!=null){
				if($salary==0)
					$w=$w . "r.salary >= 20000 AND r.salary < 30000 ";
				else if($salary==1)
					$w=$w . "r.salary >= 30000 AND r.salary < 40000 ";
				else if($salary==2)
					$w=$w . "r.salary >= 40000 AND r.salary < 50000 ";
				else if($salary==3)
					$w=$w . "r.salary >= 50000 AND r.salary < 60000 ";
				else if($salary==4)
					$w=$w . "r.salary >= 60000 AND r.salary < 80000 ";
				else if($salary==5)
					$w=$w . "r.salary >= 80000 AND r.salary <= 100000 ";
			}
			$sql=$w;
		}
		else{
			$sql= "SELECT o.occupation, l.location, r.working_time, r.education, r.experience, r.salary, r.id ".
				  "FROM recruit r ". 
			      "LEFT JOIN occupation o ON r.occupation_id = o.id ".
			      "LEFT JOIN location l ON r.location_id = l.id ";
		}
		
		if($_POST['desc']==1){
			$sql=$sql."order by salary desc, id";
		}
		else if($_POST['inc']==1){
			$sql=$sql."order by salary, id";
		}
		else{
			   $sql=$sql."order by id";
		}
		$sth = $db->prepare($sql);
		$sth->execute();
	
		$result = $sth->setFetchMode(PDO::FETCH_ASSOC);
		echo "<p class=\"CSSTableGenerator\">";
		echo "<table border=\"1\">";
			echo"<tr>";
			echo"<td>ID</td>";
			echo"<td>Occupation</td>";
			echo"<td>Location</td>";
			echo"<td>Work Time</td>";
			echo"<td>Education Required</td>";						
			echo"<td>Experience</td>";
			echo"<td>Salary</td>";
			echo"</tr>";
		while($result = $sth -> fetchObject()){
			echo"<tr>";
				$id2=$result->id;//recruit id
				echo "<td>";echo $result->id;echo "</td>";
				echo "<td>";echo $result->occupation;echo "</td>";
				echo "<td>";echo $result->location;echo "</td>";
				echo "<td>";echo $result->working_time;echo "</td>";
				echo "<td>";echo $result->education;echo "</td>";
				echo "<td>";echo $result->experience;echo "</td>";
				echo "<td>";echo $result->salary;echo "</td>";
			echo"</tr>";
		}
		echo "</table>";
		echo "</p>";
	}
	catch(PDOException $e){
		echo "Connection failed: " . $e->POSTMessage();
	}
?>


	<head>
		<title>Job Seeking System</title>
	</head>
<body>
<h2>Jobs seeker's Login</h2>
<form action="employee_login.php" method="POST">
	<label>Username:</label><br>
	<input type="text" name="username"><br>
	<label>Password:</label><br>
	<input type="password" name="password">
	<button type="submit">Login</button>
</form>
<form action="employee_regist.php" method="POST">
	<button type="submit">Regist</button>
</form>

<h2>Employer's Login</h2>
<form action="employer_login.php" method="POST">
	<label>Username:</label><br>
	<input type="text" name="account">
	<br><label>Password:</label><br>
	<input type="password" name="password">
	<button type="submit">Login</button>
</form>
<form action="employer_regist.php" method="POST">
	<button type="submit">Regist</button>
</form>
</div>
</div>
</body>
</html>


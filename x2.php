<?php
$dbhost="localhost";
$dbuser="root";
$dbpassed="";
$dbname="zailet";

$link=mysqli_connect($dbhost,$dbuser,$dbpassed,$dbname);
if($link===false){
	echo "not working";
	die("ERROR:Could not connect".mysqli_connect_error());

}
//echo "string";
$term=mysqli_real_escape_string($link,$_REQUEST['term']);

if(isset($term)){
	$sql="select title from posts natural join topics_map natural join topics_english where intrest like '". $term ."%'";
	if($result=mysqli_query($link,$sql)){
		if(mysqli_num_rows($result)>0){
			while ($row=mysqli_fetch_array($result)) {
				echo "<p>" .$row['title'] ."</p>";
			}
			mysqli_free_result($result);
		}else{
			echo "<p>No matches found</p>";
		}	
	}else{
		echo"error:could not able to execute sql .".mysqli_error($link);
		echo "Problem with mysql";
	}

}
mysqli_close($link);

?>
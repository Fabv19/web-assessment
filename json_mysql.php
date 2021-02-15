 <?php
$servername = "localhost";
$username = "admin";
$password = "Monday15";
$dbname = "web_assessment";
 

/*$connect=new mysqli_connect("localhost","admin","Monday15","web_assessment");*/
$connect=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);

// set the PDO error mode to exception
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {

$filename= "posts.json";
$data=file_get_contents($filename);
$array=json_decode($data,true);

   $sql1 = "DELETE FROM posts";
   $connect ->exec($sql1);

foreach($array as $row){
	

 $sql2 = "INSERT INTO posts (userId, id, title, body) VALUES ('". $row["userId"]. "', '". $row["id"]. "', '". $row["title"]. "',
 '". $row["body"]. "')";
 $connect->exec($sql2);

 
echo "Posts Data Inserted";
}//Close foreach

}//Close try

catch(PDOException $e){

    echo "Error: " . $e->getMessage();
    }

try {

$filename= "posts1.json";
$data=file_get_contents($filename);
$array=json_decode($data,true);

   $sql1 = "DELETE FROM posts1";
   $connect ->exec($sql1);

foreach($array as $row){
	

 $sql2 = "INSERT INTO posts1 (userId, id, title, body) VALUES ('". $row["userId"]. "', '". $row["id"]. "', '". $row["title"]. "',
 '". $row["body"]. "')";
 $connect->exec($sql2);

 
echo "Posts1 Data Inserted";
}//Close foreach

}//Close try

catch(PDOException $e){

    echo "Error: " . $e->getMessage();
    }

try {

$filename= "posts1_comments.json";
$data=file_get_contents($filename);
$array=json_decode($data,true);

   $sql1 = "DELETE FROM posts/1/comments";
   $connect ->exec($sql1);

foreach($array as $row){
	

 $sql2 = "INSERT INTO posts/1/comments (postId, id, name, email, body) VALUES ('". $row["postId"]. "', '". $row["id"]. "', '". $row["name"]. "',
 '". $row["email"]. "', '". $row["body"]. "')";
 $connect->exec($sql2);

 
echo "Posts/1/comments Data Inserted";
}//Close foreach

}//Close try

catch(PDOException $e){

    echo "Error: " . $e->getMessage();
    }

$conn = null;
?>



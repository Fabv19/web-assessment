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

}//Close foreach

     echo "Posts Data Inserted Successfully";
}//Close try

catch(PDOException $e){

    echo "Error: Title is required or Body exceeding 400 characters" . $e->getMessage();
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

 

}//Close foreach
echo "Posts1 Data Inserted";
}//Close try

catch(PDOException $e){

    echo "Error: Title is required or Body exceeding 400 characters " . $e->getMessage();
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

 

}//Close foreach
echo "Posts/1/comments Data Inserted";
}//Close try

catch(PDOException $e){

    echo "Error: Title is required or Body exceeding 400 characters" . $e->getMessage();
    }

$conn = null;
?>



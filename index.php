<!DOCTYPE html>
<html>
<body>

<?php

echo "<table style='border: solid 1px #ddd;'>";
 echo "<tr><th>UserId</th><th>ID</th><th>Title</th><th>Body</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}
  
$servername = "localhost";
$username = "admin";
$password = "Monday15";
$dbname = "web_assessment";

?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  UserID: <input type="int" name="userId" value="<?php echo $userId;?>">
  <span class="error">* <?php echo $userIdErr;?></span>
  <br><br>
  ID: <input type="int" name="id" value="<?php echo $id;?>">
  <span class="error">* <?php echo $idErr;?></span>
  <br><br>
  Title: <input type="varchar" name="title" value="<?php echo $title;?>">
  <span class="error"><?php echo $titleErr;?></span>
  <br><br>
  Body: <i0nputtype="varchar" name="body" value="<?php echo $body;?>">
  <span class="error"><?php echo $titleErr;?></span>
  <br><br>
<?php
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT userId, id, title, body FROM posts");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>

</body>
</html>

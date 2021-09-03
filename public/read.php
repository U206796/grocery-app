<?php

if (isset($_POST['submit'])) {

require "../confign.php";

try {

$connection = new PDO($dsn, $username, $password, $options);

$sql = "SELECT * FROM lists";

$statement = $connection->prepare($sql);
$statement->execute();

$result = $statement->fetchAll();
} catch(PDOException $error) {

echo $sql . "<br>" . $error->getMessage();
}
    }
?>
<?php include "templates/header.php"; ?>

<?php
if (isset($_POST['submit'])) {

if ($result && $statement->rowCount() > 0) { ?>
<h2>Results</h2>

<?php
foreach($result as $row) {
?>

<p>
ID:
<?php echo $row["id"]; ?><br> catergory:
<?php echo $row['catergory']; ?><br> items:
<?php echo $row['items']; ?><br> deadline:
<?php echo $row['deadline']; ?><br> shop:
<?php echo $row['shop']; ?><br>
</p>
<?php
// this willoutput all the data from the array
//echo '<pre>'; var_dump($row);
?>
<hr>
<?php }; //close the foreach
};
};
?>
<form method="post">
<input type="submit" name="submit" value="View all">
</form> 
<?php

// include the config file 
require "../confign.php";
require "common.php";

if (isset($_GET["id"])) {
    // this is called a try/catch statement 
    try {
        // define database connection
        $connection = new PDO($dsn, $username, $password, $options);
        
        // set id variable
        $id = $_GET["id"];
        
        // Create the SQL 
        $sql = "DELETE FROM lists WHERE id = :id";

        // Prepare the SQL
        $statement = $connection->prepare($sql);
        
        // bind the id to the PDO
        $statement->bindValue(':id', $id);
        
        // execute the statement
        $statement->execute();

        // Success message
        $success = "entry successfuly deleted";

    } catch(PDOException $error) {
        // if there is an error, tell us what it is
        echo $sql . "<br>" . $error->getMessage();
    }
};

try {
    $connection = new PDO($dsn, $username, $password, $options);
    
    $sql = "SELECT * FROM lists";
    
    $statement = $connection->prepare($sql);
    $statement->execute();
    
    $result = $statement->fetchAll();

} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
    ?>

<?php include "templates/header.php"; ?>

<h2>Update</h2>

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
<a href='delete.php?id=<?php echo $row['id']; ?>'>delete</a>
</p>

<?php
// this willoutput all the data from the array
//echo '<pre>'; var_dump($row);
?>
<hr>
<?php 

};
?>
<form method="post" onsubmit="return confirm( 'are you sure?');">
<input type="submit" name="submit" value="View all">
</form>
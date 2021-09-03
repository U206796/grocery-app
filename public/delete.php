<?php

session_start();

require "../confign.php";
require "common.php";

if (isset($_GET["id"])) {
    
    try {
       
        $connection = new PDO($dsn, $username, $password, $options);
        
       
        $id = $_GET["id"];
        
      
        $sql = "DELETE FROM lists WHERE id = :id";

       
        $statement = $connection->prepare($sql);
        
        $statement->bindValue(':id', $id);
        
       
        $statement->execute();

        
        $success = "entry successfuly deleted";

    } catch(PDOException $error) {
       
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

<?php foreach($result as $row) {?>
    <p> catergory: <?php echo $row['catergory']; ?><br> 
        items: <?php echo $row['items']; ?><br> 
        deadline: <?php echo $row['deadline']; ?><br> 
        shop: <?php echo $row['shop']; ?><br>
        <a onClick ="return confirm('Do you really want to delete?');" href='delete.php?id=<?php echo $row['id']; ?>'>delete</a>
    </p>
<?php };?>
    
<form method="post">
<input type="submit" name="submit" value="View all">
</form>

<?php include "templates/footer.php"; ?>
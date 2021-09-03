<?php

session_start();

if (isset($_POST['submit'])) {

require "../confign.php";

try {

        $connection = new PDO($dsn, $username, $password, $options);

        $new_work = array(
        "catergory" => $_POST['catergory'],
        "items" => $_POST['items'],
        "deadline" => $_POST['deadline'],
        "shop" => $_POST['shop'],
        );

        $sql = "INSERT INTO lists (catergory, items, deadline, shop) VALUES (:catergory, :items, :deadline, :shop)";

        $statement = $connection->prepare($sql);
        $statement->execute($new_work);
        } 
    
    catch(PDOException $error) {

    echo $sql . "<br>" . $error->getMessage();
        } 
    }


?>
<?php include "templates/header.php"; ?>
    <h2>add items</h2>
    <?php if (isset($_POST['submit']) && $statement) { ?>
    <p>items successfully added</p>
<?php } ?>

            <form method="post">
            <label for="catergory">catergory</label> 
            <input type="text" name="catergory" id="catergory"> 
            <label for="items">items</label> 
            <input type="text" name="items" id="items"> 
            <label for="deadline">deadline</label> 
            <input type="text" name="deadline" id="deadline"> 
            <label for="shop">shop</label> 
            <input type="text" name="shop" id="shop"> 
            <input type="submit" name="submit" value="Submit">
            </form>
            
<?php include "templates/footer.php"; ?>
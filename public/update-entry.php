<?php 

session_start();

    if (isset($_GET['id'])) {

        require "../config.php";
        require "common.php";

            if (isset($_POST['submit'])) {
                try {
                    $connection = new PDO($dsn, $username, $password, $options);  
                
                $entry =[
                    "id"         => $_POST['id'],
                    "catergory" => $_POST['catergory'],
                    "items" => $_POST['items'],
                    "deadline" => $_POST['deadline'],
                    "shop" => $_POST['shop']
                ];
            
                $sql = "UPDATE `lists` 
                        SET id = :id,
                            catergory = :catergory, 
                            items = :items, 
                            deadline = :deadline, 
                            shop = :shop
                        WHERE id = :id";
            

                $statement = $connection->prepare($sql);
            
                $statement->execute($entry);
                    
                    } catch(PDOException $error) {
                    echo $sql . "<br>" . $error->getMessage();
                }
            }

        try {
            $connection = new PDO($dsn, $username, $password, $options);
            
            $id = $_GET['id'];
            
            $sql = "SELECT * FROM lists WHERE id = :id";
            
            $statement = $connection->prepare($sql);
            
            $statement->bindValue(':id', $id);
            
            $statement->execute();
            
            $entry = $statement->fetch(PDO::FETCH_ASSOC);
            
        } catch(PDOExcpetion $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
        
        // quickly show the id on the page
        //echo $_GET['id'];
        
        include "templates/header.php";
?>
<form method="post">

    <label for="catergory">catergory</label> 
    <input type="text" name="catergory" id="catergory" value="<?php echo escape($entry['catergory']); ?>">

    <label for="items">items</label> 
    <input type="text" name="items" id="items" value="<?php echo escape($entry['items']); ?>">

    <label for="deadline">deadline</label> 
    <input type="text" name="deadline" id="deadline" value="<?php echo escape($entry['deadline']); ?>">

     <label for="shop">shop</label> 
    <input type="text" name="shop" id="shop" value="<?php echo escape($entry['shop']); ?>"> 

    <input type="submit" name="submit" value="Save">

    </form>

    <?php   

    } else {
        // no id, show error
        echo "No id - something went wrong";
        //exit;
    }
    include "templates/footer.php";
?>

<?php

if(isset($_POST))
{
include 'classes/Database.php';
$database = new Database;
//$id = $_GET["i"];
//$database->query("select * from posts where id=:id");
//$database->bind(':id', 2);
//$rows = $database->resultSet();

//Delete a querry
if(isset($_POST["delete"]))
{
    $delete_id = $_POST["delete_id"];
    $database->query("DELETE FROM posts where id=:id");
    $database->bind(":id", $delete_id);
    $database->execute();
}


//inserting/updating values from form
if(isset($_POST["submit"]))
{
    $id = $_POST["id"];
    $title = $_POST["title"];
    $body = $_POST["body"];
    
   // $database->query("INSERT INTO posts(title, body) VALUES(:title,:body)");
    $database->query("UPDATE posts set title=:title , body=:body WHERE id=:id");
    $database->bind(":title", $title);
    $database->bind(":body", $body);
    $database->bind(":id", $id);
    $database->execute();
}

//querry to get all results
$database->query("select * from posts");
$rows = $database->resultSet();

foreach ($rows as $row)
{
    $r = json_encode($row["title"]) . "<br/>";
echo $r;
?>
<form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>" >

    <input type="hidden" name="delete_id" value="<?php echo $row["id"] ?>"/>
    <input type="submit" name="delete"  value="delete" />
</form>

<?php
}

}
?>

<form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>" >
id <input type="text" name="id" /><br/>

    title <input type="text" name="title" /><br/>
    body  <input type="text" name="body" />
    <input type="submit" name="submit" />
</form>
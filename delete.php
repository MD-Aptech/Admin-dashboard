<?php
    include "connection.php";
    $deleteCategory_id= $_GET['deleteCategory'];
    //echo $deleteCategory_id;
    $Q="DELETE FROM category where id = '".$deleteCategory_id."' ";
    $result=mysqli_query($conn,$Q);
    if(isset($result))
    {
        header("location:showcategory.php");
    }   
?>
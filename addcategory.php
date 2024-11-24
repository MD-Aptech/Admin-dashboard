
<?php
    include "starter.php";

    include "aside.php";
    
    include "navbar.php";

    include "connection.php";


?>
<div class="container my-6 me-5">
<form class="form-control" enctype="multipart/form-data" action="" method="post">
    <div class="inputproduct">
        <label for="">Name</label>
        <label style="color:red;" for="">*</label>
    <input class="form-control me-5" type="text" name="category_name" id=""placeholder="Category Name">
    </div>
    <div class="inputproduct">
        <label for="">Category Image</label>
    <input class="form-control me-5" type="file" name="category_img" id=""placeholder="Category Name">
    </div>
    <div class="button mt-3">
        <button name="insert" class=" btn btn-success">Insert</button>
        <br>
        <button  class=" btn btn-success"><a href="showcategory.php">Show Category</a></button>
    </div>
</form>
<?php
    if(isset($_POST['insert']))
    {
        $categoryName=$_POST['category_name'];
        $categoryImg=$_FILES['category_img']['name'];
        $category_tmp_name=$_FILES['category_img']['tmp_name'];
        $location  ="images/category_img/";
        $SaveImg  =$location.$categoryImg;
        move_uploaded_file($category_tmp_name,$SaveImg);
        //echo $categoryName;
        //echo $categoryImg;

        $q="INSERT INTO category(category_name,category_img)values('".$categoryName."','".$SaveImg."')";
        $result = mysqli_query($conn,$q);


    }

?>
</div>
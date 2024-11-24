<?php
    include "connection.php";
    $editCategory_id=$_GET['editCategory'];
    //echo "$editCategory_id";
    
    $Q="SELECT * FROM category where id='".$editCategory_id."' ";
    $result=mysqli_query($conn,$Q);

    ($data=mysqli_fetch_array($result))

?>
<?php
    include "connection.php";
    include "aside.php";
    include "navbar.php";
?>
<form action="" enctype="multipart/form-data" method="post">
    <div class="inputcategory mt-3">
        <label for="">Category Name</label>
        <input class="form-control" value="<?php echo $data['id'] ?>" type="text" name="updateCategoryName" id="" placeholder="<?php echo $editCategory_id ?>">
    </div>
    <div class="inputcategory-img mt-3">
        <label for="">Category Image</label>
        <img src="<?php print_r($data['category_img'])?> " heigth="50px"  width="50px"  alt="">
        <input class="form-control mt-2" type="file" name="updateCategoryImg" id="">
    </div>
    <button  name="update"class="mt-3 btn btn-success">Update</button>
</form>
<?php
    if(isset($_post['update']))
    {
        $updateCategoryName=$_POST['updateCategoryName'];
        $updateCategoryImg=$_FILES['updateCategoryImg']['name'];
        $updateCategory_tmp_name=$_FILES['updateCategoryImg']['tmp_name'];
        $location="images/category_img/";
        $save_img=$location.$updateCategoryImg;
        move_uploaded_file($updateCategory_tmp_name,$save_img);

        $Q="UPDATE category set category_name='".$updateCategoryName."' category_img ='".$save_img."' ";

        $result=mysqli_query($conn,$Q);
        if(isset($result))
        {
            header("location:showcategoryphp");
        }        

    }
?>
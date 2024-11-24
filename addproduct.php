
<?php
    include "starter.php";
    include "connection.php";
    include "aside.php";
    include "navbar.php";

    $Q="SELECT * FROM `category`";
    $result=mysqli_query($conn,$Q);
?>

<div class="container my-6 me-5">
<form class="form-control" enctype="multipart/form-data" action="" method="post">
    <div class="inputproduct">
        <label for="">Product Name</label>
        <label style="color:red;" for="">*</label>
    <input class="form-control me-5" type="text" name="product_name" id=""placeholder="Product Name">
    </div>
    <div class="inputproduct">
        <label for="">Price</label>
        <label style="color:red;" for="">*</label>
    <input class="form-control me-5" type="number" name="product_price" id=""placeholder="Price">
    </div>
    <div class="inputproduct">
        <label for="">Select Category</label>
        <select name="product_category" id="" class="form-control">
            <option value="">Select Category</option>
        <?php
            while($selectOption=mysqli_fetch_array($result))
            {
                ?>
                <option value="<?php echo $selectOption['id'] ?>"><?php echo $selectOption['category_name'] ?></option>
            <?php
        }
        ?>
        </select>
    </div>
    <div class="inputproduct">
        <label for="">Prodct Image</label>
    <input class="form-control me-5" type="file" name="product_img" id=""placeholder="">
    </div>
    <div class="button mt-3">
        <button name="insert" class=" btn btn-success">Insert</button>
        <br>
        <button  class=" btn btn-success"><a href="showproduct.php">Show Product</a></button>
    </div>
</form>
<?php
    if(isset($_POST['insert']))
    {
        $product_Name=$_POST['product_name'];
        $product_Price=$_POST['product_price'];
        $product_category=$_POST['product_category'];
        $product_Img=$_FILES['product_img']['name'];
        $product_tmp_name=$_FILES['product_img']['tmp_name'];
        $location  ="images/product_img/";
        $SaveImg  =$location.$product_Img;
        move_uploaded_file($product_tmp_name,$SaveImg);
        //echo $categoryName;
        //echo $categoryImg;
        

        // $Q="INSERT INTO  `product`(ProductName,Price,`img`)Values('".$product_Name."','".$product_Price."','".$SaveImg."')";
        $Q="INSERT INTO  `product`(ProductName,Price,Category_id,`img`)Values('".$product_Name."','".$product_Price."','".$product_category."','".$SaveImg."')";
        
        $result=mysqli_query($conn,$Q);

        
    };

?>
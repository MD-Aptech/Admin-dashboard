<?php
    include "aside.php";
    include "navbar.php";
    include "starter.php";
    include "connection.php";

    $sql = "SELECT * FROM product JOIN category ON product.category_id = category.id";
    $result = mysqli_query($conn,$sql);

    ?>
<table class="table mx-5">
    <tr>
        <th>Id</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Category Name</th>
        <th>Product Img</th>
        <th></th>
        <th></th>
    </tr>
    <?php
        while($showdata=mysqli_fetch_array($result))
    {
?>
    
    <tr>
        <td><?php echo $showdata['id'] ?></td>
        <td><?php echo $showdata['ProductName'] ?></td>
        <td><?php echo $showdata['Price'] ?></td>
        <td><?php echo $showdata['category_name']?></td>
        <td><img src="<?php echo $showdata['img'] ?>" heigth="50px" width="50px" alt=""></td>
        <td><a href="editcategory.php?editCategory=<?php echo $showdata['id']?>"><button class="btn btn-success">Edit</button></a></td>
        <td><a href="delete.php?deleteCategory=<?php  echo  $showdata['id']?>"><button class="btn btn-danger">Delete</button></a></td>
    </tr>
    <?php
}    
    ?>
<button class="btn btn-success"><a href="addproduct.php">Add Product</a></button>
</table>
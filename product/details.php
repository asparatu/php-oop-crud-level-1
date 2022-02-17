<?php
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

// includes database and object files
include_once '../config/database.php';
include_once '../objects/product.php';
include_once '../objects/category.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// pass connection to objects
$product = new Product($db);
$category = new Category($db);

//set ID property of product to be edited
$product->id = $id;

//read the details of product to be edited
$product->getDetails();
?>

<?php
// set page headers
$page_title = "Product Details";
include_once "../view/shared/layout_header.php";

echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default pull-right'>";
        echo "<span class='glyphicon glyphicon-list'></span> Product List";
    echo "</a>";
echo "</div>";
?>


<!-- HTML table for displaying a product details -->
<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>Name</td>
        <td><?php echo $product->name; ?></td>
    </tr>
    <tr>
        <td>Price</td>
        <td>&#36;<?php echo $product->price; ?></td>
    </tr>
    <tr>
        <td>Description</td>
        <td><?php echo $product->description; ?></td>
    </tr>
    <tr>
        <td>Category</td>
        <td>
            <?php
                //display category name
                $category->id = $product->category_id;
                $category->readName();
                echo $category->name;
            ?>
        </td>
    </tr>
    <tr>
        <td>Image</td>
        <td><?php echo $product->image ? "<img src='uploads/{$product->image}' />" : "No image found."; ?></td>
    </tr>
</table>

<?php
// footer
include_once "../view/shared/layout_footer.php";
?>

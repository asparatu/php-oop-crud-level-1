<?php
// holds pagination variables
include_once '../config/core.php';

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

// set page headers
$page_title = "Product List";
include_once "../view/shared/layout_header.php";

//query products
$stmt = $product->readAll($from_record_num, $records_per_page);

// the page where this paging is used
$page_url = "?";

// count all products in the database to calculate total pages
$total_rows = $product->countAll();

// list template controls how the product list will be rendered
include_once "tpl/list.php";

// set page footer
include_once "../view/shared/layout_footer.php";
?>
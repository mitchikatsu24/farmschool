<?php 
$column = db_select('tbl_category')['single'];
$cat_id = $column['category_id']; 
$cat_name = $column['category_name'];
$description = $column['category_description'];



?>
<?php
set_session_data("pagename", "addcategory");
$data = db_select('tbl_products')['data'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Dreams Pos admin template</title>

<link rel="shortcut icon" type="image/x-icon" href="<?=assets?>/img/favicon.jpg">

<link rel="stylesheet" href="<?=assets?>/css/bootstrap.min.css">

<link rel="stylesheet" href="<?=assets?>/css/animate.css">

<link rel="stylesheet" href="<?=assets?>/plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="<?=assets?>/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="<?=assets?>/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="<?=assets?>/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="<?=assets?>/css/style.css">
</head>
<body>
<div id="global-loader">
<div class="whirly-loader"> </div>
</div>

<div class="main-wrapper">
<?php include_page('topbar.php')?>
<?php include_page('sidebar.php')?>

</div>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Product edit Category</h4>
<h6>edit new Category</h6>
</div>
</div>

<form action="/products/updatecategory?id=<?=$cat_id?>" method = "post">
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Category Id</label>
<input name ="" type="text" value = "<?=$cat_id?>">
</div>
</div>
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Category name</label>
<input name="category_name" type="text" value = "<?=$cat_name?>">
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<label>Description</label>
<textarea name ="category_description" class="form-control" ><?=$description?></textarea>
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
</form>


</div>
<div class="col-lg-12">
<button type="submit" class="btn btn-submit me-2">Submit</button>
<a href="categorylist.html" class="btn btn-cancel">Cancel</a>
</div>
</div>
</div>
</div>

</div>
</div>
</div>


<script src="<?=assets?>/js/jquery-3.6.0.min.js"></script>

<script src="<?=assets?>/js/feather.min.js"></script>

<script src="<?=assets?>/js/jquery.slimscroll.min.js"></script>

<script src="<?=assets?>/js/jquery.dataTables.min.js"></script>
<script src="<?=assets?>/js/dataTables.bootstrap4.min.js"></script>

<script src="<?=assets?>/js/bootstrap.bundle.min.js"></script>

<script src="<?=assets?>/plugins/select2/js/select2.min.js"></script>

<script src="<?=assets?>/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="<?=assets?>/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="<?=assets?>/js/script.js"></script>
</body>
</html>
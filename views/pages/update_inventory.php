<?php set_session_data("pagename", "inventorylist"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Add product</title>

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


<?php include_page('sidebar.php') ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Add Inventory</h4>
<h6>Create new Inventory</h6>
</div>
</div>
<?php $id = get("id"); ?>
<?php $column =  db_set_query("select * from tbl_inventory where inventory_id = $id")['first_row'] ?>

    <?php
      $inventory_name = $column['inventory_name'];
      $qty = $column['quantity'];
      $description = $column['description'];
      $pict = $column["image"];
      
        ?>
<form action="/Inventory/update?id=<?=$id?>" method="post" enctype="multipart/form-data">
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>inventory Name</label>
<input name ="inventory_name" type="text" value = "<?=$inventory_name?>">
</div>
</div>

<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Quantity</label>
<input name ="quantity"  type="text" value = "<?=$qty?>">
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<label>Description</label>
<textarea name ="description"  class="form-control"><?=$description?></textarea>
</div>
</div>




<div class="col-lg-12">
<div class="form-group">
<label> Product Image</label>
<div class="image-upload">
<input name ="image"  type="file"  title="<?=$pict?>">
<div class="image-uploads">
<img src="<?=assets?>/img/icons/upload.svg" alt="img">
<h4>Drag and drop a file to upload</h4>
</div>
</div>
</div>
</div>
<div class="col-lg-12">
<button type ="submit" class="btn btn-submit me-2">Submit</button>
<a href="productlist.html" class="btn btn-cancel">Cancel</a>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</form>


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
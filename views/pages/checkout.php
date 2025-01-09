
<?php
$data = db_select('tbl_products')['data']
?>
<?php
$pos_data = db_set_query("select p.pos_id,p.product_id,p.datetime,p.qty,p.status,t.product_name ,t.price,t.pricing,t.Image FROM tbl_pos p,tbl_products t WHERE p.product_id = t.id AND p.status = 0;")["data"];
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
<link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"
/>

<link rel="shortcut icon" type="image/x-icon" href="<?=assets?>/img/favicon.jpg">

<link rel="stylesheet" href="<?=assets?>/css/bootstrap.min.css">

<link rel="stylesheet" href="<?=assets?>/css/animate.css">

<link rel="stylesheet" href="<?=assets?>/plugins/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="<?=assets?>/plugins/owlcarousel/owl.theme.default.min.css">

<link rel="stylesheet" href="<?=assets?>/plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="<?=assets?>/css/bootstrap-datetimepicker.min.css">

<link rel="stylesheet" href="<?=assets?>/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="<?=assets?>/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="<?=assets?>/css/style.css">
</head>
<body>
<div id="global-loader">
<div class="whirly-loader"> </div>
</div>
<div class="main-wrappers">
<?php include_page('topbar.php') ?>

</div>
<div class="page-wrapper ms-0">
<div class="content">
<div class="row">
<div class="col-lg-8 col-sm-12 tabs_wrapper">
<div class="page-header ">
<div class="page-title">
<a href="/products/prodlist" class="btn btn-adds" style="display:flex;align-items:center;justify-content:center;padding:4px 2px;"><i class="ri-arrow-left-s-line" style="font-size:25px;"></i>back to page</a>

<h6>Manage your purchases</h6>
</div>
</div>
<ul class=" tabs owl-carousel owl-theme owl-product  border-0 ">
<li id="headphone">
<div class="product-details ">
<img src="<?=assets?>/img/product/product63.png" alt="img">
<h6>Headphones</h6>
</div>
</li>
<li class="active" id="fruits">
<div class="product-details ">
<img src="<?=assets?>/img/product/product62.png" alt="img">
<h6>Fruits</h6>
</div>
</li>
<li id="Accessories">
<div class="product-details">
<img src="<?=assets?>/img/product/product64.png" alt="img">
<h6>Animal</h6>
</div>
</li>
<li id="fruits1">
<div class="product-details ">
<img src="<?=assets?>/img/product/vegetable.png" alt="img">
<h6>vegetables</h6>
</div>
</li>
</ul>
<div class="tabs_container">
<div class="tab_content active" data-tab="fruits">
<div class="row ">

<?php while($column=fetch_array($data)):  ?>
    <?php
      $id = $column['id']; 
      $prod_name = $column['Product_name'];
      $category = $column['Category'];
      $price = $column['Price'];
      $pricing = $column['pricing'];
      $qty = $column['Quantity'];
      $description = $column['Description'];
      $pict = $column["Image"];

      $prod = db_set_query("select sum(qty) as 'pqty' from tbl_pos where product_id = $id")['single'];
      $pqty = $prod['pqty'];
      $qty_left = $qty - $pqty;

      
        ?>

<div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill active">
<div class="productsetimg">
<?php if($pict==null): ?>
<img src="<?=assets?>/img/product/picture.png" alt="img">
<?php else: ?>
    <img src="<?=uploads($pict)?>" alt="img">
<?php endif; ?>
<h6>Qty:<?=$qty_left?></h6>
<div class="check-product">
<i class="fa fa-check"></i>
</div>
</div>
<div class="productsetcontent">
<h5><?=$category?></h5>
<h4><?=$prod_name?></h4>
<h6><?=$price." ".$pricing?></h6>
<a href="/products/addtocart?pos_id=<?=$id?>"><button style ="width:130px;font-size:13px;font-weight:800;padding:5px 2px;display:flex;align-items:center;margin:auto;justify-content:center; " class ="btn btn-adds"><i class="ri-add-box-fill" style ="font-size:23px;"></i>Add to cart</button></a>
</div>
</div>
</div>

<?php endwhile; ?>




</div>
</div>
<div class="tab_content" data-tab="headphone">
<div class="row ">
<div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill">
<div class="productsetimg">
<img src="<?=assets?>/img/product/product44.jpg" alt="img">
<h6>Qty: 5.00</h6>
<div class="check-product">
<i class="fa fa-check"></i>
</div>
</div>
<div class="productsetcontent">
<h5>Headphones</h5>
<h4>Earphones</h4>
<h6>150.00</h6>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill">
<div class="productsetimg">
<img src="<?=assets?>/img/product/product45.jpg" alt="img">
<h6>Qty: 5.00</h6>
<div class="check-product">
<i class="fa fa-check"></i>
</div>
</div>
<div class="productsetcontent">
<h5>Headphones</h5>
<h4>Earphones</h4>
<h6>150.00</h6>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill">
<div class="productsetimg">
<img src="<?=assets?>/img/product/product36.jpg" alt="img">
<h6>Qty: 5.00</h6>
<div class="check-product">
<i class="fa fa-check"></i>
</div>
</div>
<div class="productsetcontent">
<h5>Headphones</h5>
<h4>Earphones</h4>
<h6>150.00</h6>
</div>
</div>
</div>
</div>
</div>
<div class="tab_content" data-tab="Accessories">
<div class="row">
<div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill">
<div class="productsetimg">
<img src="<?=assets?>/img/product/product55.jpg" alt="img">
<h6>Qty: 1.00</h6>
<div class="check-product">
<i class="fa fa-check"></i>
</div>
</div>
<div class="productsetcontent">
<h5>Accessories</h5>
<h4>Mouse</h4>
<h6>150.00</h6>
</div>
</div>
</div>
</div>
</div>
<div class="tab_content" data-tab="Shoes">
<div class="row">
<div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill">
<div class="productsetimg">
<img src="<?=assets?>/img/product/product60.jpg" alt="img">
<h6>Qty: 1.00</h6>
<div class="check-product">
<i class="fa fa-check"></i>
</div>
</div>
<div class="productsetcontent">
<h5>Shoes</h5>
<h4>Red nike</h4>
<h6>1500.00</h6>
</div>
</div>
</div>
</div>
</div>
<div class="tab_content" data-tab="computer">
 <div class="row">
<div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill">
<div class="productsetimg">
<img src="<?=assets?>/img/product/product56.jpg" alt="img">
<h6>Qty: 1.00</h6>
<div class="check-product">
<i class="fa fa-check"></i>
</div>
</div>
<div class="productsetcontent">
<h5>Computers</h5>
<h4>Desktop</h4>
<h6>1500.00</h6>
</div>
</div>
</div>
</div>
</div>
<div class="tab_content" data-tab="Snacks">
<div class="row">
<div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill">
<div class="productsetimg">
<img src="<?=assets?>/img/product/product47.jpg" alt="img">
<h6>Qty: 1.00</h6>
<div class="check-product">
<i class="fa fa-check"></i>
</div>
</div>
<div class="productsetcontent">
<h5>Snacks</h5>
<h4>Duck Salad</h4>
<h6>1500.00</h6>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill">
<div class="productsetimg">
<img src="<?=assets?>/img/product/product48.png" alt="img">
<h6>Qty: 1.00</h6>
<div class="check-product">
<i class="fa fa-check"></i>
</div>
</div>
<div class="productsetcontent">
<h5>Snacks</h5>
<h4>Breakfast board</h4>
<h6>1500.00</h6>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill">
<div class="productsetimg">
<img src="<?=assets?>/img/product/product57.jpg" alt="img">
<h6>Qty: 1.00</h6>
<div class="check-product">
<i class="fa fa-check"></i>
</div>
</div>
<div class="productsetcontent">
<h5>Snacks</h5>
<h4>California roll</h4>
<h6>1500.00</h6>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill">
<div class="productsetimg">
<img src="<?=assets?>/img/product/product58.jpg" alt="img">
<h6>Qty: 1.00</h6>
<div class="check-product">
<i class="fa fa-check"></i>
</div>
</div>
<div class="productsetcontent">
<h5>Snacks</h5>
<h4>Sashimi</h4>
<h6>1500.00</h6>
</div>
</div>
</div>
</div>
</div>
<div class="tab_content" data-tab="watch">
<div class="row">
<div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill">
<div class="productsetimg">
<img src="<?=assets?>/img/product/product49.jpg" alt="img">
<h6>Qty: 1.00</h6>
<div class="check-product">
<i class="fa fa-check"></i>
</div>
</div>
<div class="productsetcontent">
<h4>Watch</h4>
<h5>Watch</h5>
<h6>1500.00</h6>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill">
<div class="productsetimg">
<img src="<?=assets?>/img/product/product51.jpg" alt="img">
<h6>Qty: 1.00</h6>
</div>
<div class="productsetcontent">
<h4>Watch</h4>
<h5>Watch</h5>
<h6>1500.00</h6>
</div>
</div>
</div>
 </div>
</div>
<div class="tab_content" data-tab="cycle">
<div class="row">
<div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill">
<div class="productsetimg">
<img src="<?=assets?>/img/product/product52.jpg" alt="img">
<h6>Qty: 1.00</h6>
<div class="check-product">
<i class="fa fa-check"></i>
</div>
</div>
<div class="productsetcontent">
<h4>Cycle</h4>
<h5>Cycle</h5>
<h6>1500.00</h6>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill">
<div class="productsetimg">
<img src="<?=assets?>/img/product/product53.jpg" alt="img">
<h6>Qty: 1.00</h6>
<div class="check-product">
<i class="fa fa-check"></i>
</div>
</div>
<div class="productsetcontent">
<h4>Cycle</h4>
<h5>Cycle</h5>
<h6>1500.00</h6>
</div>
</div>
</div>
</div>
</div>
<div class="tab_content" data-tab="fruits1">
<div class="row ">
<div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill">
<div class="productsetimg">
<img src="<?=assets?>/img/product/product37.jpg" alt="img">
<h6>Qty: 5.00</h6>
<div class="check-product">
<i class="fa fa-check"></i>
</div>
</div>
<div class="productsetcontent">
<h5>Fruits</h5>
<h4>Limon</h4>
<h6>1500.00</h6>
</div>
</div>
</div>
</div>
</div>
<div class="tab_content" data-tab="headphone1">
<div class="row ">
<div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill">
<div class="productsetimg">
<img src="<?=assets?>/img/product/product44.jpg" alt="img">
<h6>Qty: 5.00</h6>
<div class="check-product">
<i class="fa fa-check"></i>
</div>
 </div>
<div class="productsetcontent">
<h5>Headphones</h5>
<h4>Earphones</h4>
<h6>150.00</h6>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill">
<div class="productsetimg">
<img src="<?=assets?>/img/product/product45.jpg" alt="img">
<h6>Qty: 5.00</h6>
<div class="check-product">
<i class="fa fa-check"></i>
</div>
</div>
<div class="productsetcontent">
<h5>Headphones</h5>
<h4>Earphones</h4>
<h6>150.00</h6>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill">
<div class="productsetimg">
<img src="<?=assets?>/img/product/product36.jpg" alt="img">
<h6>Qty: 5.00</h6>
<div class="check-product">
<i class="fa fa-check"></i>
</div>
</div>
<div class="productsetcontent">
<h5>Headphones</h5>
<h4>Earphones</h4>
<h6>150.00</h6>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-12 ">
<div class="order-list">
<div class="orderid">
<h4>Order List</h4>
<h5>Transaction id : #65565</h5>
</div>
<div class="actionproducts">
<ul>
<li>
<a href="javascript:void(0);" class="deletebg confirm-text"><img src="<?=assets?>/img/icons/delete-2.svg" alt="img"></a>
</li>
<li>
<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" class="dropset">
<img src="<?=assets?>/img/icons/ellipise1.svg" alt="img">
</a>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="bottom-end">
<li>
<a href="#" class="dropdown-item">Action</a>
</li>
<li>
<a href="#" class="dropdown-item">Another Action</a>
</li>
<li>
<a href="#" class="dropdown-item">Something Elses</a>
</li>
</ul>
</li>
</ul>
</div>
</div>
<div class="card card-order">
<div class="card-body">
<div class="row">
<div class="col-12">
<a href="javascript:void(0);" class="btn btn-adds" data-bs-toggle="modal" data-bs-target="#create"><i class="fa fa-plus me-2"></i>Add Customer</a>
</div>
<div class="col-lg-12">
<div class="select-split ">
<div class="select-group w-100">
<select class="select">
<option>Walk-in Customer</option>
<option>Chris Moris</option>
</select>
</div>
</div>
</div>
<div class="col-lg-12">
<div class="select-split">
<div class="select-group w-100">
<select class="select">
<option>Product </option>
<option>Barcode</option>
</select>
</div>
</div>
</div>
<div class="col-12">
<div class="text-end">
<a class="btn btn-scanner-set"><img src="<?=assets?>/img/icons/scanner1.svg" alt="img" class="me-2">Scan bardcode</a>
</div>
</div>
</div>
</div>
<div class="split-card">
</div>
<div class="card-body pt-0">
<div class="totalitem">
<h4>Total items : 4</h4>
<a href="javascript:void(0);">Clear all</a>
</div>
<div class="product-table">
<ul class="product-lists">
<li>
<?php $grand_total = 0; ?>
<?php while($column=fetch_array($pos_data)):  ?>
    <?php
      $id = $column['pos_id']; 
      $prod_id = $column['Product_id'];
      $date = $column['datetime'];
      $stat = $column['satatus'];
      $product =$column['product_name'];
      $price =$column['price'];
      $img =$column['Image'];
      $qty =$column['qty'];
      $grand_total += $price*$qty;

    
      
        ?>
        <div class="productimg">
<div class="productimgs">
  <?php if($img==null): ?>
<img src="<?=assets?>/img/product/picture.png" alt="img">
<?php else: ?>
    <img src="<?=uploads($img)?>" alt="img">
<?php endif; ?>

</div>


<div class="productcontet">
<h4><?=$product?>
<a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal" data-bs-target="#edit"><img src="<?=assets?>/img/icons/edit-5.svg" alt="img"></a>
</h4>
<div class="productlinkset">
<h5><?=$prod_id?></h5>
</div>
<div class="increment-decrement">
<div class="input-groups">
<a href="/sales/updateQty?type=1&qty=<?=$qty?>&id=<?=$id?>"><input type="button" value="-" class="button-minus dec button"></a>
<input type="text" name="child" class="quantity-field" value="<?=$qty?>">
<a href="/sales/updateQty?type=2&qty=<?=$qty?>&id=<?=$id?>"><input type="button" value="+" class="button-plus inc button "></a>
</div>
</div>
</div>
</div>
</li>
<li><?=$price." ".$pricing?>	</li>
<li><a onclick ="return confirm('are you sure you want to delete')" href="/products/delete_pos?pos_id=<?=$id?>"><img src="<?=assets?>/img/icons/delete-2.svg" alt="img"></a></li>
</ul>
<ul class="product-lists">
<li>
<div class="productimg">
<?php endwhile; ?>

<?php




?>

</div>
</div>
<div class="split-card">
</div>
<div class="card-body pt-0 pb-2">
<div class="setvalue">
<ul>
<li>
<h5>Subtotal </h5>
<h6><?=$grand_total ?></h6>
</li>
<li>
<h5>Tax </h5>
<h6><?=$tax?></h6>
</li>
<li class="total-value">
<h5>Total </h5>
<h6><?=$grand_total?></h6>
</li>
</ul>
</div>
<div class="setvaluecash">
<ul>
<li>
<a href="javascript:void(0);" class="paymentmethod">
<img src="<?=assets?>/img/icons/cash.svg" alt="img" class="me-2">
Cash
</a>
</li>
<li>
<a href="javascript:void(0);" class="paymentmethod">
<img src="<?=assets?>/img/icons/debitcard.svg" alt="img" class="me-2">
Debit
</a>
</li>
<li>
<a href="javascript:void(0);" class="paymentmethod">
<img src="<?=assets?>/img/icons/scan.svg" alt="img" class="me-2">
Scan
</a>
</li>
</ul>
</div>
<a href="#" data-bs-toggle="modal" data-bs-target="#create">
<div class="btn-totallabel">
<h5 style="display:flex;align-items:center;justify-content:left;"><i class="ri-bill-line" style="font-size:30px;"></i>payment</h5>
<h6><?=$grand_total?></h6>
</div>
</a>
<div class="btn-pos">
<ul>
<li>
<a class="btn"><img src="<?=assets?>/img/icons/pause1.svg" alt="img" class="me-1">Hold</a>
</li>
<li>
<a class="btn"><img src="<?=assets?>/img/icons/edit-6.svg" alt="img" class="me-1">Quotation</a>
</li>
<li>
<a class="btn"><img src="<?=assets?>/img/icons/trash12.svg" alt="img" class="me-1">Void</a>
</li>
<li>
<a class="btn"><img src="<?=assets?>/img/icons/wallet1.svg" alt="img" class="me-1">Payment</a>
</li>
<li>
<a class="btn" data-bs-toggle="modal" data-bs-target="#recents"><img src="<?=assets?>/img/icons/transcation.svg" alt="img" class="me-1"> Transaction</a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="calculator" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Define Quantity</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="calculator-set">
<div class="calculatortotal">
<h4>0</h4>
</div>
<ul>
<li>
<a href="javascript:void(0);">1</a>
</li>
<li>
<a href="javascript:void(0);">2</a>
</li>
<li>
<a href="javascript:void(0);">3</a>
</li>
<li>
<a href="javascript:void(0);">4</a>
</li>
<li>
<a href="javascript:void(0);">5</a>
</li>
<li>
<a href="javascript:void(0);">6</a>
</li>
<li>
<a href="javascript:void(0);">7</a>
</li>
<li>
<a href="javascript:void(0);">8</a>
</li>
<li>
<a href="javascript:void(0);">9</a> 
</li>
<li>
<a href="javascript:void(0);" class="btn btn-closes"><img src="<?=assets?>/img/icons/close-circle.svg" alt="img"></a>
</li>
<li>
<a href="javascript:void(0);">0</a>
</li>
<li>
<a href="javascript:void(0);" class="btn btn-reverse"><img src="<?=assets?>/img/icons/reverse.svg" alt="img"></a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="holdsales" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Hold order</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="hold-order">
<h2>4500.00</h2>
</div>
<div class="form-group">
<label>Order Reference</label>
<input type="text">
</div>
<div class="para-set">
<p>The current order will be set on hold. You can retreive this order from the pending order button. Providing a reference to it might help you to identify the order more quickly.</p>
</div>
<div class="col-lg-12">
<a class="btn btn-submit me-2">Submit</a>
<a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
</div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Edit Order</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Product Price</label>
<input type="text" value="20">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Product Price</label>
<select class="select">
<option>Exclusive</option>
<option>Inclusive</option>
</select>
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label> Tax</label>
<div class="input-group">
<input type="text">
<a class="scanner-set input-group-text">
%
</a>
</div>
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Discount Type</label>
<select class="select">
<option>Fixed</option>
<option>Percentage</option>
</select>
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Discount</label>
<input type="text" value="20">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Sales Unit</label>
<select class="select">
<option>Kilogram</option>
<option>Grams</option>
</select>
</div>
</div>
</div>
<div class="col-lg-12">
<a class="btn btn-submit me-2">Submit</a>
<a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
</div>
</div>
</div>
</div>
</div>

<!-- payment modal -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
<div class="modal-content">
<form action="/sales/addTransaction" method="post" id="addTrans">
<div class="modal-header">
<h5 class="modal-title">Create</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>grand total</label>
<label for="" class="form-control" id="grand_total"><?=$grand_total?></label>
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>amount tendered <a href="#" style="text-decoration:underline;" onclick="getChange()">calculate</a></label>
<input id="tendered" name="amount_tendered" type="text">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>change</label>
<label for="" class="form-control" id="change">0</label>
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Phone</label>
<input name="contact" type="text">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Contact number</label>
<input type="text">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Customer name</label>
<input name="customer_name" type="text">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Address</label>
<input name="address" type="text">
</div>
</div>
</div>
<div class="col-lg-12">
<button class="btn btn-submit me-2">Submit</button>
<a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
</div>
</div>
</form>
</div>
</div>
</div>
<!-- -->

<div class="modal fade" id="delete" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Order Deletion</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="delete-order">
<img src="<?=assets?>/img/icons/close-circle1.svg" alt="img">
</div>
<div class="para-set text-center">
<p>The current order will be deleted as no payment has been <br> made so far.</p>
</div>
<div class="col-lg-12 text-center">
<a class="btn btn-danger me-2">Yes</a>
<a class="btn btn-cancel" data-bs-dismiss="modal">No</a>
</div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="recents" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Recent Transactions</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="tabs-sets">
<ul class="nav nav-tabs" id="myTabs" role="tablist">
<li class="nav-item" role="presentation">
<button class="nav-link active" id="purchase-tab" data-bs-toggle="tab" data-bs-target="#purchase" type="button" aria-controls="purchase" aria-selected="true" role="tab">Purchase</button>
</li>
<li class="nav-item" role="presentation">
<button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button" aria-controls="payment" aria-selected="false" role="tab">Payment</button>
</li>
<li class="nav-item" role="presentation">
<button class="nav-link" id="return-tab" data-bs-toggle="tab" data-bs-target="#return" type="button" aria-controls="return" aria-selected="false" role="tab">Return</button>
</li>
</ul>
<div class="tab-content">
<div class="tab-pane fade show active" id="purchase" role="tabpanel" aria-labelledby="purchase-tab">
<div class="table-top">
<div class="search-set">
<div class="search-input">
<a class="btn btn-searchset"><img src="<?=assets?>/img/icons/search-white.svg" alt="img"></a>
</div>
</div>
<div class="wordset">
<ul>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="<?=assets?>/img/icons/pdf.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="<?=assets?>/img/icons/excel.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="<?=assets?>/img/icons/printer.svg" alt="img"></a>
</li>
</ul>
</div>
</div>
<div class="table-responsive">
<table class="table datanew">
<thead>
<tr>
<th>Date</th>
<th>Reference</th>
<th>Customer</th>
<th>Amount	</th>
<th class="text-end">Action</th>
</tr>
</thead>
<tbody>
<tr>
<td>2022-03-07	</td>
<td>INV/SL0101</td>
<td>Walk-in Customer</td>
<td>$ 1500.00</td>
<td>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>2022-03-07	</td>
<td>INV/SL0101</td>
<td>Walk-in Customer</td>
<td>$ 1500.00</td>
<td>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>2022-03-07	</td>
<td>INV/SL0101</td>
<td>Walk-in Customer</td>
<td>$ 1500.00</td>
<td>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>2022-03-07	</td>
<td>INV/SL0101</td>
<td>Walk-in Customer</td>
<td>$ 1500.00</td>
<td>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>2022-03-07	</td>
<td>INV/SL0101</td>
<td>Walk-in Customer</td>
<td>$ 1500.00</td>
<td>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>2022-03-07	</td>
<td>INV/SL0101</td>
<td>Walk-in Customer</td>
<td>$ 1500.00</td>
<td>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>2022-03-07	</td>
<td>INV/SL0101</td>
<td>Walk-in Customer</td>
<td>$ 1500.00</td>
<td>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="tab-pane fade" id="payment" role="tabpanel">
<div class="table-top">
<div class="search-set">
<div class="search-input">
<a class="btn btn-searchset"><img src="<?=assets?>/img/icons/search-white.svg" alt="img"></a>
</div>
</div>
<div class="wordset">
<ul>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="<?=assets?>/img/icons/pdf.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="<?=assets?>/img/icons/excel.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="<?=assets?>/img/icons/printer.svg" alt="img"></a>
</li>
</ul>
</div>
</div>
<div class="table-responsive">
<table class="table datanew">
<thead>
<tr>
<th>Date</th>
<th>Reference</th>
<th>Customer</th>
<th>Amount	</th>
<th class="text-end">Action</th>
</tr>
</thead>
<tbody>
<tr>
<td>2022-03-07	</td>
<td>0101</td>
<td>Walk-in Customer</td>
<td>$ 1500.00</td>
<td>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>2022-03-07	</td>
<td>0102</td>
<td>Walk-in Customer</td>
<td>$ 1500.00</td>
<td>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>2022-03-07	</td>
<td>0103</td>
<td>Walk-in Customer</td>
<td>$ 1500.00</td>
<td>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>2022-03-07	</td>
<td>0104</td>
<td>Walk-in Customer</td>
<td>$ 1500.00</td>
<td>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>2022-03-07	</td>
<td>0105</td>
<td>Walk-in Customer</td>
<td>$ 1500.00</td>
<td>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>2022-03-07	</td>
<td>0106</td>
<td>Walk-in Customer</td>
<td>$ 1500.00</td>
<td>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>2022-03-07	</td>
<td>0107</td>
<td>Walk-in Customer</td>
<td>$ 1500.00</td>
<td>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="tab-pane fade" id="return" role="tabpanel">
<div class="table-top">
<div class="search-set">
<div class="search-input">
<a class="btn btn-searchset"><img src="<?=assets?>/img/icons/search-white.svg" alt="img"></a>
</div>
</div>
<div class="wordset">
<ul>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="<?=assets?>/img/icons/pdf.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="<?=assets?>/img/icons/excel.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="<?=assets?>/img/icons/printer.svg" alt="img"></a>
</li>
</ul>
</div>
</div>
<div class="table-responsive">
<table class="table datanew">
<thead>
<tr>
<th>Date</th>
<th>Reference</th>
<th>Customer</th>
<th>Amount	</th>
<th class="text-end">Action</th>
</tr>
</thead>
<tbody>
<tr>
<td>2022-03-07	</td>
<td>0101</td>
<td>Walk-in Customer</td>
<td>$ 1500.00</td>
<td>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>2022-03-07	</td>
<td>0102</td>
<td>Walk-in Customer</td>
<td>$ 1500.00</td>
<td>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>2022-03-07	</td>
<td>0103</td>
<td>Walk-in Customer</td>
<td>$ 1500.00</td>
<td>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>2022-03-07	</td>
<td>0104</td>
<td>Walk-in Customer</td>
<td>$ 1500.00</td>
<td>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>2022-03-07	</td>
<td>0105</td>
<td>Walk-in Customer</td>
<td>$ 1500.00</td>
<td>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>2022-03-07	</td>
<td>0106</td>
<td>Walk-in Customer</td>
<td>$ 1500.00</td>
<td>
 <a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>2022-03-07	</td>
<td>0107</td>
<td>Walk-in Customer</td>
<td>$ 1500.00</td>
<td>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="<?=assets?>/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
</tbody>
</table>
</div>
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

<script src="<?=assets?>/js/bootstrap.bundle.min.js"></script>

<script src="<?=assets?>/js/jquery.dataTables.min.js"></script>
<script src="<?=assets?>/js/dataTables.bootstrap4.min.js"></script>

<script src="<?=assets?>/plugins/select2/js/select2.min.js"></script>

<script src="<?=assets?>/plugins/owlcarousel/owl.carousel.min.js"></script>

<script src="<?=assets?>/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="<?=assets?>/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="<?=assets?>/js/script.js"></script>
<script src="<?=src?>/checkout.js"></script>
</body>
</html>

<?php if(flash_data("delete_success")): ?>
  <script>
    alert("Product on cart has been deleted");
  </script>
<?php endif; ?>
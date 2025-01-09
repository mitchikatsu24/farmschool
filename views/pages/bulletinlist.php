<?php set_session_data("pagename", "bulletinlist"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="Content Management - Admin Template">
<meta name="keywords" content="admin, content, html5, responsive, blog, article, bootstrap">
<meta name="author" content="Dreamguys - Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Add Content</title>

<link rel="shortcut icon" type="image/x-icon" href="<?=assets?>/img/favicon.jpg">

<link rel="stylesheet" href="<?=assets?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=assets?>/css/animate.css">
<link rel="stylesheet" href="<?=assets?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?=assets?>/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=assets?>/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="<?=assets?>/plugins/fontawesome/css/all.min.css">
<link rel="stylesheet" href="<?=assets?>/css/style.css">
<style>
  body {
    background-color: #f5f5f5;
  }

  .card {
    border: none;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
  }

  .card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 20px rgba(0, 128, 0, 0.2);
  }

  .card-img-top {
    border-radius: 8px;
    object-fit: cover;
    height: 250px;
  }

  .card-body {
    padding: 2rem;
    background-color: #e8f5e9;
  }

  .card-title {
    font-size: 1.75rem;
    font-weight: bold;
    color: #2e7d32;
  }

  .card-text {
    color: #2b2b2b;
    font-size: 1.125rem;
  }

  .btn {
    background-color: #388e3c;
    color: white;
    font-weight: bold;
    font-size: 1rem;
    transition: background-color 0.3s ease;
  }

  .btn:hover {
    background-color: #1b5e20;
  }

  @media (max-width: 768px) {
    .card-img-top {
      height: 200px;
    }
  }

  @media (max-width: 576px) {
    .card-body {
      padding: 1.5rem;
    }

    .card-title {
      font-size: 1.5rem;
    }

    .card-text {
      font-size: 1rem;
    }
  }
</style>
</head>
<body>
<div id="global-loader">
    <div class="whirly-loader"></div>
</div>

<div class="main-wrapper">
<?php include_page('topbar.php')?> 
<?php include_page('sidebar.php') ?>

<div class="page-wrapper">
  <div class="container my-5">
    <h1 class="text-center text-success mb-4"></h1>
    <div class="row g-4">
      <?php $data = db_select("tbl_bulletin")['data'] ?>
      <?php while($colunm = fetch_array($data)): ?> 
      <?php
        $title = $colunm["title"];
        $image = $colunm["images"];
        $content = $colunm["content"];
        $datetime = $colunm["post_date_time"];
      ?>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 shadow-lg">
          <img src="<?=uploads($image)?>" class="card-img-top" alt="Farming Image">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?=$title?></h5>
            <p class="card-text mb-4"><?=$content?></p>
            <a href="#" class="btn mt-auto">Posted: <?=$datetime?></a>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
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

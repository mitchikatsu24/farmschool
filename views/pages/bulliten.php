<?php set_session_data("pagename", "bulletin"); ?>
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
</head>
<body>
<div id="global-loader">
    <div class="whirly-loader"></div>
</div>

<div class="main-wrapper">

<?php include_page('topbar.php')?> 
<?php include_page('sidebar.php') ?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Add Content</h4>
                <h6>Create new content</h6>
            </div>
        </div>
        <form action="/bulletin/postbulletin" method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input id="bulletin-title" name="title" type="text" class="form-control" required placeholder ="enter title">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="bulletin-description" name="content" class="form-control" rows="6" required placeholder ="enter content"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Content Image</label>
                                <div class="image-upload">
                                    <input name="image" type="file" class="form-control" required accept="image/*">
                                    <div class="image-uploads mt-2">
                                        <img src="<?=assets?>/img/icons/upload.svg" alt="img">
                                        <h4>Drag and drop a file to upload</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="contentlist.html" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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

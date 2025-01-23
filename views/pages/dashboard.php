<?php
set_session_data("pagename", "dashboard");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Dreams Pos admin template</title>

<link rel="shortcut icon" type="image/x-icon" href="<?=assets?>/img/favicon.jpg">

<link rel="stylesheet" href="<?=assets?>/css/bootstrap.min.css">

<link rel="stylesheet" href="<?=assets?>/css/animate.css">

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

</div>
<?php $allsales = db_set_query("select sum(p.qty) 'sold' ,sum(d.Price) 'income',sum(d.Price) * p.qty 'sales', p.datetime from tbl_transaction t, tbl_pos p, tbl_products d where t.id = p.status and p.product_id = d.id")['first_row']; ?>
<?php $allCustomer = db_set_query("select count(*) from tbl_transaction GROUP by customer_name")['data']?>
<?=$allproducts = db_set_query("select sum(Quantity) as 'Quantity' from tbl_products ")['single']['Quantity']?>
<?=$allsold = db_set_query("select sum(qty) as 'qty' from tbl_pos ")['single']['qty']?>
<div class="page-wrapper">
<div class="content">
<div class="row">

<div class="col-lg-3 col-sm-6 col-12 d-flex">
<div class="dash-count">
<div class="dash-counts">
<h4><?=sizeof($allCustomer)?></h4>
<h5>Customers</h5>
</div>
<div class="dash-imgs">
<i data-feather="user"></i>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12 d-flex">
<div class="dash-count das1">
<div class="dash-counts">
<h4><?=$allsales['sold']?></h4>
<h5>Total Purchase</h5>
</div>
<div class="dash-imgs">
<i data-feather="user-check"></i>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12 d-flex">
<div class="dash-count das2">
<div class="dash-counts">
<h4><?=$allsales['sales']?></h4>
<h5>Total Sales</h5>
</div>
<div class="dash-imgs">
<i data-feather="file-text"></i>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12 d-flex">
<div class="dash-count das3">
<div class="dash-counts">
<h4><?=$allproducts-$allsold?></h4>
<h5>Total Products</h5>
</div>
<div class="dash-imgs">
<i data-feather="file"></i>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-7 col-sm-12 col-12 d-flex">
<div class="card flex-fill">
<div class="card-header pb-0 d-flex justify-content-between align-items-center">
<h5 class="card-title mb-0">Purchase & Sales</h5>
<div class="graph-sets">
<ul>
<li>
<span>Sales</span>
</li>
<li>
<span>Purchase</span>
</li>
</ul>
<div class="dropdown">
<button class="btn btn-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
 2024 <img src="<?=assets?>/img/icons/dropdown.svg" alt="img" class="ms-2">
</button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<li>
<a href="javascript:void(0);" class="dropdown-item">2025</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item">2026</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item">2027</a>
</li>
</ul>
</div>
</div>
</div>
<div class="card-body">
<div id="sales_charts"></div>
</div>
</div>
</div>
<div class="col-lg-5 col-sm-12 col-12 d-flex">
<div class="card flex-fill">
<div class="card-header pb-0 d-flex justify-content-between align-items-center">
<h4 class="card-title mb-0">Recently sold Products</h4>
<div class="dropdown">
<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" class="dropset">
<i class="fa fa-ellipsis-v"></i>
</a>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<li>
<a href="productlist.html" class="dropdown-item">Product List</a>
</li>
<li>
<a href="addproduct.html" class="dropdown-item">Product Add</a>
</li>
</ul>
</div>
</div>
<div class="card-body">
<div class="table-responsive dataview">
<table class="table datatable ">
<thead>
<tr>
<th>Product id</th>
<th>Products</th>
<th>Price</th>
</tr>
</thead>
<tbody>
<?php $soldprod = db_set_query("select t.id as 'transid',t.customer_name, d.Product_name, d.Image, d.Price, d.pricing,t.amount_tendered, t.date, d.id ,p.qty from tbl_transaction t, tbl_pos p, tbl_products d where t.id = p.status and p.product_id = d.id order by t.id desc limit 5")['data'] ?>
<?php while($column = fetch_array($soldprod)): ?>
    <tr>
    <td><?=$column['transid']?></td>
    <td class="productimgname">
    <a href="productlist.html" class="product-img">
    <img src="<?=uploads($column['Image'])?>" alt="product">
    </a>
    <a href="productlist.html"><?= $column['Product_name'] ?></a>
    </td>
    <td><?=$column['Price']?></td>
    </tr>
<?php endwhile; ?>
</tbody>
</table>
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

<script src="<?=assets?>/plugins/apexchart/apexcharts.min.js"></script>
<script src="<?=assets?>/plugins/apexchart/chart-data.js"></script>

<?php
function monthlySales($date){
    $dt = date("Y")."-".$date;
    $sales = db_set_query("select tr.customer_name,sum(pr.Price) 'pr',count(*) 'cnt', sum(pos.qty)'qty', sum(pr.Price) * sum(pos.qty) 'sales' from tbl_products pr, tbl_pos pos, tbl_transaction tr where pos.status = tr.id and pr.id = pos.product_id and tr.date like '%$dt%'")['first_row'];
    return $sales['qty'] ?? 0;
}

function monthlySold($date){
    $dt = date("Y")."-".$date;
    $sales = db_set_query("select tr.customer_name,sum(pr.Price) 'pr',count(*) 'cnt', sum(pos.qty)'qty', sum(pr.Price) * sum(pos.qty) 'sales' from tbl_products pr, tbl_pos pos, tbl_transaction tr where pos.status = tr.id and pr.id = pos.product_id and tr.date like '%$dt%'")['first_row'];
    return $sales['cnt'] ?? 0;
}
?>


<script>
    var jan = "<?=monthlySales('01')?>";
    var feb = "<?=monthlySales('02')?>";
    var mar = "<?=monthlySales('03')?>";
    var apr = "<?=monthlySales('04')?>";
    var may = "<?=monthlySales('05')?>";
    var jun = "<?=monthlySales('06')?>";
    var jul = "<?=monthlySales('07')?>";
    var aug = "<?=monthlySales('08')?>";
    var sept = "<?=monthlySales('09')?>";
    var oct = "<?=monthlySales('10')?>";
    var nov = "<?=monthlySales('11')?>";
    var dec = "<?=monthlySales('12')?>";

    var janx = "<?=monthlySold('01')?>";
    var febx = "<?=monthlySold('02')?>";
    var marx = "<?=monthlySold('03')?>";
    var aprx = "<?=monthlySold('04')?>";
    var mayx = "<?=monthlySold('05')?>";
    var junx = "<?=monthlySold('06')?>";
    var julx = "<?=monthlySold('07')?>";
    var augx = "<?=monthlySold('08')?>";
    var septx = "<?=monthlySold('09')?>";
    var octx = "<?=monthlySold('10')?>";
    var novx = "<?=monthlySold('11')?>";
    var decx = "<?=monthlySold('12')?>";


    'use strict';$(document).ready(function(){function generateData(baseval,count,yrange){var i=0;var series=[];while(i<count){var x=Math.floor(Math.random()*(750-1+1))+1;;var y=Math.floor(Math.random()*(yrange.max-yrange.min+1))+yrange.min;var z=Math.floor(Math.random()*(75-15+1))+15;series.push([x,y,z]);baseval+=86400000;i++;}
return series;}
if($('#sales_chart').length>0){var columnCtx=document.getElementById("sales_chart"),columnConfig={colors:['#7638ff','#fda600'],series:[{name:"Received",type:"column",data:[70,150,80,180,150,175,201,60,200,120,190,160,50]},{name:"Pending",type:"column",data:[23,42,35,27,43,22,17,31,22,22,12,16,80]}],chart:{type:'bar',fontFamily:'Poppins, sans-serif',height:350,toolbar:{show:false}},plotOptions:{bar:{horizontal:false,columnWidth:'60%',endingShape:'rounded'},},dataLabels:{enabled:false},stroke:{show:true,width:2,colors:['transparent']},xaxis:{categories:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct'],},yaxis:{title:{text:'$ (thousands)'}},fill:{opacity:1},tooltip:{y:{formatter:function(val){return "$ "+val+" thousands"}}}};var columnChart=new ApexCharts(columnCtx,columnConfig);columnChart.render();}
if($('#invoice_chart').length>0){var pieCtx=document.getElementById("invoice_chart"),pieConfig={colors:['#7638ff','#ff737b','#fda600','#1ec1b0'],series:[55,40,20,10],chart:{fontFamily:'Poppins, sans-serif',height:350,type:'donut',},labels:['Paid','Unpaid','Overdue','Draft'],legend:{show:false},responsive:[{breakpoint:480,options:{chart:{width:200},legend:{position:'bottom'}}}]};var pieChart=new ApexCharts(pieCtx,pieConfig);pieChart.render();}
if($('#s-line').length>0){var sline={chart:{height:350,type:'line',zoom:{enabled:false},toolbar:{show:false,}},dataLabels:{enabled:false},stroke:{curve:'straight'},series:[{name:"Desktops",data:[10,41,35,51,49,62,69,91,148]}],title:{text:'Product Trends by Month',align:'left'},grid:{row:{colors:['#f1f2f3','transparent'],opacity:0.5},},xaxis:{categories:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep'],}}
var chart=new ApexCharts(document.querySelector("#s-line"),sline);chart.render();}
if($('#s-line-area').length>0){var sLineArea={chart:{height:350,type:'area',toolbar:{show:false,}},dataLabels:{enabled:false},stroke:{curve:'smooth'},series:[{name:'series1',data:[31,40,28,51,42,109,100]},{name:'series2',data:[11,32,45,32,34,52,41]}],xaxis:{type:'datetime',categories:["2018-09-19T00:00:00","2018-09-19T01:30:00","2018-09-19T02:30:00","2018-09-19T03:30:00","2018-09-19T04:30:00","2018-09-19T05:30:00","2018-09-19T06:30:00"],},tooltip:{x:{format:'dd/MM/yy HH:mm'},}}
var chart=new ApexCharts(document.querySelector("#s-line-area"),sLineArea);chart.render();}
if($('#s-col').length>0){var sCol={chart:{height:350,type:'bar',toolbar:{show:false,}},plotOptions:{bar:{horizontal:false,columnWidth:'55%',endingShape:'rounded'},},dataLabels:{enabled:false},stroke:{show:true,width:2,colors:['transparent']},series:[{name:'Net Profit',data:[44,55,57,56,61,58,63,60,66]},{name:'Revenue',data:[76,85,101,98,87,105,91,114,94]}],xaxis:{categories:['Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct'],},yaxis:{title:{text:'$ (thousands)'}},fill:{opacity:1},tooltip:{y:{formatter:function(val){return "$ "+val+" thousands"}}}}
var chart=new ApexCharts(document.querySelector("#s-col"),sCol);chart.render();}
if($('#s-col-stacked').length>0){var sColStacked={chart:{height:350,type:'bar',stacked:true,toolbar:{show:false,}},responsive:[{breakpoint:480,options:{legend:{position:'bottom',offsetX:-10,offsetY:0}}}],plotOptions:{bar:{horizontal:false,},},series:[{name:'PRODUCT A',data:[44,55,41,67,22,43]},{name:'PRODUCT B',data:[13,23,20,8,13,27]},{name:'PRODUCT C',data:[11,17,15,15,21,14]},{name:'PRODUCT D',data:[21,7,25,13,22,8]}],xaxis:{type:'datetime',categories:['01/01/2011 GMT','01/02/2011 GMT','01/03/2011 GMT','01/04/2011 GMT','01/05/2011 GMT','01/06/2011 GMT'],},legend:{position:'right',offsetY:40},fill:{opacity:1},}
var chart=new ApexCharts(document.querySelector("#s-col-stacked"),sColStacked);chart.render();}
if($('#s-bar').length>0){var sBar={chart:{height:350,type:'bar',toolbar:{show:false,}},plotOptions:{bar:{horizontal:true,}},dataLabels:{enabled:false},series:[{data:[400,430,448,470,540,580,690,1100,1200,1380]}],xaxis:{categories:['South Korea','Canada','United Kingdom','Netherlands','Italy','France','Japan','United States','China','Germany'],}}
var chart=new ApexCharts(document.querySelector("#s-bar"),sBar);chart.render();}
if($('#mixed-chart').length>0){var options={chart:{height:350,type:'line',toolbar:{show:false,}},series:[{name:'Website Blog',type:'column',data:[440,505,414,671,227,413,201,352,752,320,257,160]},{name:'Social Media',type:'line',data:[23,42,35,27,43,22,17,31,22,22,12,16]}],stroke:{width:[0,4]},title:{text:'Traffic Sources'},labels:['01 Jan 2001','02 Jan 2001','03 Jan 2001','04 Jan 2001','05 Jan 2001','06 Jan 2001','07 Jan 2001','08 Jan 2001','09 Jan 2001','10 Jan 2001','11 Jan 2001','12 Jan 2001'],xaxis:{type:'datetime'},yaxis:[{title:{text:'Website Blog',},},{opposite:true,title:{text:'Social Media'}}]}
var chart=new ApexCharts(document.querySelector("#mixed-chart"),options);chart.render();}
if($('#donut-chart').length>0){var donutChart={chart:{height:350,type:'donut',toolbar:{show:false,}},series:[44,55,41,17],responsive:[{breakpoint:480,options:{chart:{width:200},legend:{position:'bottom'}}}]}
var donut=new ApexCharts(document.querySelector("#donut-chart"),donutChart);donut.render();}
if($('#radial-chart').length>0){var radialChart={chart:{height:350,type:'radialBar',toolbar:{show:false,}},plotOptions:{radialBar:{dataLabels:{name:{fontSize:'22px',},value:{fontSize:'16px',},total:{show:true,label:'Total',formatter:function(w){return 249}}}}},series:[44,55,67,83],labels:['Apples','Oranges','Bananas','Berries'],}
var chart=new ApexCharts(document.querySelector("#radial-chart"),radialChart);chart.render();}
if($('#sales_charts').length>0){var options={series:[{name:'Sales',data:[jan,feb,mar,apr,may,jun,jul,aug,sept,oct,nov,dec],},{name:'Purchase',data:[janx,febx,marx,aprx,mayx,junx,julx,augx,septx,octx,novx,decx]}],colors:['#28C76F','#EA5455'],chart:{type:'bar',height:300,stacked:true,zoom:{enabled:true}},responsive:[{breakpoint:280,options:{legend:{position:'bottom',offsetY:0}}}],plotOptions:{bar:{horizontal:false,columnWidth:'20%',endingShape:'rounded'},},xaxis:{categories:[' Jan ','feb','mar','apr','may','jun','jul','aug', 'sept', 'oct', 'nov', 'dec'],},legend:{position:'right',offsetY:40},fill:{opacity:1}};var chart=new ApexCharts(document.querySelector("#sales_charts"),options);chart.render();}});
</script>

<script src="<?=assets?>/js/script.js"></script>
</body>
</html>
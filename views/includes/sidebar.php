<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div id="sidebar-menu" class="sidebar-menu">
<ul>
<li>
<a href="/sales/dashboard" id="dashboard"><img src="<?=assets?>/img/icons/dashboard.svg" alt="img" ><span> Dashboard</span> </a>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="<?=assets?>/img/icons/product.svg" alt="img"><span> Product</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="/products/prodlist" id="prodlist">Product List</a></li>
<li><a href="/products/addproducts" id="addprod">Add Product</a></li>
<li><a href="/products/category" id="categorylist">Category List</a></li>
<li><a href="/products/addcategory" id="addcategory"> Add Category</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="<?=assets?>/img/icons/sales1.svg" alt="img"><span> Sales</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="/sales/saleslist" id="saleslist">Sales List</a></li>
<li><a href="/products/checkout">POS</a></li>
<li><a href="pos.html">New Sales</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="<?=assets?>/img/icons/purchase1.svg" alt="img"><span>Inventory</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="/inventory/inventorylist" id="inventorylist">inventory list</a></li>
<li><a href="/inventory/addinventory" id="addinventory">Add Inventory</a></li>

</ul>
</li>

<li class="submenu">
<a href="javascript:void(0);"><img src="<?=assets?>/img/icons/time.svg" alt="img"><span> Bullitin</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="/bulletin/bulletin" id="bulletin">Upload bulletin</a></li>
<li><a href="/bulletin/bulletindisplay" id="bulletinlist">uploads</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="<?=assets?>/img/icons/users1.svg" alt="img"><span> Admin</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="newuser.html">New User </a></li>
<li><a href="userlists.html">Users List</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="<?=assets?>/img/icons/settings.svg" alt="img"><span> Settings</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="generalsettings.html">General Settings</a></li>
<li><a href="emailsettings.html">Email Settings</a></li>
<li><a href="paymentsettings.html">Payment Settings</a></li>
<li><a href="currencysettings.html">Currency Settings</a></li>
<li><a href="grouppermissions.html">Group Permissions</a></li>
<li><a href="taxrates.html">Tax Rates</a></li>
</ul>
</li>
</ul>
</div>
</div>
</div>

<?php if(get_session_data("pagename")): ?>
    <script>
        document.getElementById('<?= get_session_data("pagename") ?>').className =  "active";   
    </script>
<?php endif; ?>


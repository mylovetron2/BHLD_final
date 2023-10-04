<?php
namespace PHPMaker2020\projectBHLD;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$bhld_nhanvien_view = new bhld_nhanvien_view();

// Run the page
$bhld_nhanvien_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_nhanvien_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$bhld_nhanvien_view->isExport()) { ?>
<script>
var fbhld_nhanvienview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fbhld_nhanvienview = currentForm = new ew.Form("fbhld_nhanvienview", "view");
	loadjs.done("fbhld_nhanvienview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$bhld_nhanvien_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $bhld_nhanvien_view->ExportOptions->render("body") ?>
<?php $bhld_nhanvien_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $bhld_nhanvien_view->showPageHeader(); ?>
<?php
$bhld_nhanvien_view->showMessage();
?>
<form name="fbhld_nhanvienview" id="fbhld_nhanvienview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_nhanvien">
<input type="hidden" name="modal" value="<?php echo (int)$bhld_nhanvien_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($bhld_nhanvien_view->mapb->Visible) { // mapb ?>
	<tr id="r_mapb">
		<td class="<?php echo $bhld_nhanvien_view->TableLeftColumnClass ?>"><span id="elh_bhld_nhanvien_mapb"><?php echo $bhld_nhanvien_view->mapb->caption() ?></span></td>
		<td data-name="mapb" <?php echo $bhld_nhanvien_view->mapb->cellAttributes() ?>>
<span id="el_bhld_nhanvien_mapb">
<span<?php echo $bhld_nhanvien_view->mapb->viewAttributes() ?>><?php echo $bhld_nhanvien_view->mapb->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bhld_nhanvien_view->manv->Visible) { // manv ?>
	<tr id="r_manv">
		<td class="<?php echo $bhld_nhanvien_view->TableLeftColumnClass ?>"><span id="elh_bhld_nhanvien_manv"><?php echo $bhld_nhanvien_view->manv->caption() ?></span></td>
		<td data-name="manv" <?php echo $bhld_nhanvien_view->manv->cellAttributes() ?>>
<span id="el_bhld_nhanvien_manv">
<span<?php echo $bhld_nhanvien_view->manv->viewAttributes() ?>><?php echo $bhld_nhanvien_view->manv->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bhld_nhanvien_view->tennhanvien->Visible) { // tennhanvien ?>
	<tr id="r_tennhanvien">
		<td class="<?php echo $bhld_nhanvien_view->TableLeftColumnClass ?>"><span id="elh_bhld_nhanvien_tennhanvien"><?php echo $bhld_nhanvien_view->tennhanvien->caption() ?></span></td>
		<td data-name="tennhanvien" <?php echo $bhld_nhanvien_view->tennhanvien->cellAttributes() ?>>
<span id="el_bhld_nhanvien_tennhanvien">
<span<?php echo $bhld_nhanvien_view->tennhanvien->viewAttributes() ?>><?php echo $bhld_nhanvien_view->tennhanvien->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$bhld_nhanvien_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$bhld_nhanvien_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$bhld_nhanvien_view->terminate();
?>
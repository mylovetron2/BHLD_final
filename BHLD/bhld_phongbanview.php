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
$bhld_phongban_view = new bhld_phongban_view();

// Run the page
$bhld_phongban_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_phongban_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$bhld_phongban_view->isExport()) { ?>
<script>
var fbhld_phongbanview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fbhld_phongbanview = currentForm = new ew.Form("fbhld_phongbanview", "view");
	loadjs.done("fbhld_phongbanview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$bhld_phongban_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $bhld_phongban_view->ExportOptions->render("body") ?>
<?php $bhld_phongban_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $bhld_phongban_view->showPageHeader(); ?>
<?php
$bhld_phongban_view->showMessage();
?>
<form name="fbhld_phongbanview" id="fbhld_phongbanview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_phongban">
<input type="hidden" name="modal" value="<?php echo (int)$bhld_phongban_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($bhld_phongban_view->mapb->Visible) { // mapb ?>
	<tr id="r_mapb">
		<td class="<?php echo $bhld_phongban_view->TableLeftColumnClass ?>"><span id="elh_bhld_phongban_mapb"><?php echo $bhld_phongban_view->mapb->caption() ?></span></td>
		<td data-name="mapb" <?php echo $bhld_phongban_view->mapb->cellAttributes() ?>>
<span id="el_bhld_phongban_mapb">
<span<?php echo $bhld_phongban_view->mapb->viewAttributes() ?>><?php echo $bhld_phongban_view->mapb->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bhld_phongban_view->tenphong->Visible) { // tenphong ?>
	<tr id="r_tenphong">
		<td class="<?php echo $bhld_phongban_view->TableLeftColumnClass ?>"><span id="elh_bhld_phongban_tenphong"><?php echo $bhld_phongban_view->tenphong->caption() ?></span></td>
		<td data-name="tenphong" <?php echo $bhld_phongban_view->tenphong->cellAttributes() ?>>
<span id="el_bhld_phongban_tenphong">
<span<?php echo $bhld_phongban_view->tenphong->viewAttributes() ?>><?php echo $bhld_phongban_view->tenphong->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$bhld_phongban_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$bhld_phongban_view->isExport()) { ?>
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
$bhld_phongban_view->terminate();
?>
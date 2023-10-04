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
$bhld_ctdmuc_view = new bhld_ctdmuc_view();

// Run the page
$bhld_ctdmuc_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_ctdmuc_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$bhld_ctdmuc_view->isExport()) { ?>
<script>
var fbhld_ctdmucview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fbhld_ctdmucview = currentForm = new ew.Form("fbhld_ctdmucview", "view");
	loadjs.done("fbhld_ctdmucview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$bhld_ctdmuc_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $bhld_ctdmuc_view->ExportOptions->render("body") ?>
<?php $bhld_ctdmuc_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $bhld_ctdmuc_view->showPageHeader(); ?>
<?php
$bhld_ctdmuc_view->showMessage();
?>
<form name="fbhld_ctdmucview" id="fbhld_ctdmucview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_ctdmuc">
<input type="hidden" name="modal" value="<?php echo (int)$bhld_ctdmuc_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($bhld_ctdmuc_view->madm->Visible) { // madm ?>
	<tr id="r_madm">
		<td class="<?php echo $bhld_ctdmuc_view->TableLeftColumnClass ?>"><span id="elh_bhld_ctdmuc_madm"><?php echo $bhld_ctdmuc_view->madm->caption() ?></span></td>
		<td data-name="madm" <?php echo $bhld_ctdmuc_view->madm->cellAttributes() ?>>
<span id="el_bhld_ctdmuc_madm">
<span<?php echo $bhld_ctdmuc_view->madm->viewAttributes() ?>><?php echo $bhld_ctdmuc_view->madm->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bhld_ctdmuc_view->mavt->Visible) { // mavt ?>
	<tr id="r_mavt">
		<td class="<?php echo $bhld_ctdmuc_view->TableLeftColumnClass ?>"><span id="elh_bhld_ctdmuc_mavt"><?php echo $bhld_ctdmuc_view->mavt->caption() ?></span></td>
		<td data-name="mavt" <?php echo $bhld_ctdmuc_view->mavt->cellAttributes() ?>>
<span id="el_bhld_ctdmuc_mavt">
<span<?php echo $bhld_ctdmuc_view->mavt->viewAttributes() ?>><?php echo $bhld_ctdmuc_view->mavt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bhld_ctdmuc_view->dmuc->Visible) { // dmuc ?>
	<tr id="r_dmuc">
		<td class="<?php echo $bhld_ctdmuc_view->TableLeftColumnClass ?>"><span id="elh_bhld_ctdmuc_dmuc"><?php echo $bhld_ctdmuc_view->dmuc->caption() ?></span></td>
		<td data-name="dmuc" <?php echo $bhld_ctdmuc_view->dmuc->cellAttributes() ?>>
<span id="el_bhld_ctdmuc_dmuc">
<span<?php echo $bhld_ctdmuc_view->dmuc->viewAttributes() ?>><?php echo $bhld_ctdmuc_view->dmuc->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$bhld_ctdmuc_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$bhld_ctdmuc_view->isExport()) { ?>
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
$bhld_ctdmuc_view->terminate();
?>
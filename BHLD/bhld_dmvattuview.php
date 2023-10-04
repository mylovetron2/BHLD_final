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
$bhld_dmvattu_view = new bhld_dmvattu_view();

// Run the page
$bhld_dmvattu_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_dmvattu_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$bhld_dmvattu_view->isExport()) { ?>
<script>
var fbhld_dmvattuview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fbhld_dmvattuview = currentForm = new ew.Form("fbhld_dmvattuview", "view");
	loadjs.done("fbhld_dmvattuview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$bhld_dmvattu_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $bhld_dmvattu_view->ExportOptions->render("body") ?>
<?php $bhld_dmvattu_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $bhld_dmvattu_view->showPageHeader(); ?>
<?php
$bhld_dmvattu_view->showMessage();
?>
<form name="fbhld_dmvattuview" id="fbhld_dmvattuview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_dmvattu">
<input type="hidden" name="modal" value="<?php echo (int)$bhld_dmvattu_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($bhld_dmvattu_view->mavt->Visible) { // mavt ?>
	<tr id="r_mavt">
		<td class="<?php echo $bhld_dmvattu_view->TableLeftColumnClass ?>"><span id="elh_bhld_dmvattu_mavt"><?php echo $bhld_dmvattu_view->mavt->caption() ?></span></td>
		<td data-name="mavt" <?php echo $bhld_dmvattu_view->mavt->cellAttributes() ?>>
<span id="el_bhld_dmvattu_mavt">
<span<?php echo $bhld_dmvattu_view->mavt->viewAttributes() ?>><?php echo $bhld_dmvattu_view->mavt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bhld_dmvattu_view->tenvt->Visible) { // tenvt ?>
	<tr id="r_tenvt">
		<td class="<?php echo $bhld_dmvattu_view->TableLeftColumnClass ?>"><span id="elh_bhld_dmvattu_tenvt"><?php echo $bhld_dmvattu_view->tenvt->caption() ?></span></td>
		<td data-name="tenvt" <?php echo $bhld_dmvattu_view->tenvt->cellAttributes() ?>>
<span id="el_bhld_dmvattu_tenvt">
<span<?php echo $bhld_dmvattu_view->tenvt->viewAttributes() ?>><?php echo $bhld_dmvattu_view->tenvt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bhld_dmvattu_view->dvt->Visible) { // dvt ?>
	<tr id="r_dvt">
		<td class="<?php echo $bhld_dmvattu_view->TableLeftColumnClass ?>"><span id="elh_bhld_dmvattu_dvt"><?php echo $bhld_dmvattu_view->dvt->caption() ?></span></td>
		<td data-name="dvt" <?php echo $bhld_dmvattu_view->dvt->cellAttributes() ?>>
<span id="el_bhld_dmvattu_dvt">
<span<?php echo $bhld_dmvattu_view->dvt->viewAttributes() ?>><?php echo $bhld_dmvattu_view->dvt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bhld_dmvattu_view->ghichu->Visible) { // ghichu ?>
	<tr id="r_ghichu">
		<td class="<?php echo $bhld_dmvattu_view->TableLeftColumnClass ?>"><span id="elh_bhld_dmvattu_ghichu"><?php echo $bhld_dmvattu_view->ghichu->caption() ?></span></td>
		<td data-name="ghichu" <?php echo $bhld_dmvattu_view->ghichu->cellAttributes() ?>>
<span id="el_bhld_dmvattu_ghichu">
<span<?php echo $bhld_dmvattu_view->ghichu->viewAttributes() ?>><?php echo $bhld_dmvattu_view->ghichu->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$bhld_dmvattu_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$bhld_dmvattu_view->isExport()) { ?>
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
$bhld_dmvattu_view->terminate();
?>
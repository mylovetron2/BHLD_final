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
$bhld_ctu_view = new bhld_ctu_view();

// Run the page
$bhld_ctu_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_ctu_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$bhld_ctu_view->isExport()) { ?>
<script>
var fbhld_ctuview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fbhld_ctuview = currentForm = new ew.Form("fbhld_ctuview", "view");
	loadjs.done("fbhld_ctuview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$bhld_ctu_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $bhld_ctu_view->ExportOptions->render("body") ?>
<?php $bhld_ctu_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $bhld_ctu_view->showPageHeader(); ?>
<?php
$bhld_ctu_view->showMessage();
?>
<form name="fbhld_ctuview" id="fbhld_ctuview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_ctu">
<input type="hidden" name="modal" value="<?php echo (int)$bhld_ctu_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($bhld_ctu_view->mact->Visible) { // mact ?>
	<tr id="r_mact">
		<td class="<?php echo $bhld_ctu_view->TableLeftColumnClass ?>"><span id="elh_bhld_ctu_mact"><?php echo $bhld_ctu_view->mact->caption() ?></span></td>
		<td data-name="mact" <?php echo $bhld_ctu_view->mact->cellAttributes() ?>>
<span id="el_bhld_ctu_mact">
<span<?php echo $bhld_ctu_view->mact->viewAttributes() ?>><?php echo $bhld_ctu_view->mact->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bhld_ctu_view->manv->Visible) { // manv ?>
	<tr id="r_manv">
		<td class="<?php echo $bhld_ctu_view->TableLeftColumnClass ?>"><span id="elh_bhld_ctu_manv"><?php echo $bhld_ctu_view->manv->caption() ?></span></td>
		<td data-name="manv" <?php echo $bhld_ctu_view->manv->cellAttributes() ?>>
<span id="el_bhld_ctu_manv">
<span<?php echo $bhld_ctu_view->manv->viewAttributes() ?>><?php echo $bhld_ctu_view->manv->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bhld_ctu_view->ngct->Visible) { // ngct ?>
	<tr id="r_ngct">
		<td class="<?php echo $bhld_ctu_view->TableLeftColumnClass ?>"><span id="elh_bhld_ctu_ngct"><?php echo $bhld_ctu_view->ngct->caption() ?></span></td>
		<td data-name="ngct" <?php echo $bhld_ctu_view->ngct->cellAttributes() ?>>
<span id="el_bhld_ctu_ngct">
<span<?php echo $bhld_ctu_view->ngct->viewAttributes() ?>><?php echo $bhld_ctu_view->ngct->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bhld_ctu_view->mapb->Visible) { // mapb ?>
	<tr id="r_mapb">
		<td class="<?php echo $bhld_ctu_view->TableLeftColumnClass ?>"><span id="elh_bhld_ctu_mapb"><?php echo $bhld_ctu_view->mapb->caption() ?></span></td>
		<td data-name="mapb" <?php echo $bhld_ctu_view->mapb->cellAttributes() ?>>
<span id="el_bhld_ctu_mapb">
<span<?php echo $bhld_ctu_view->mapb->viewAttributes() ?>><?php echo $bhld_ctu_view->mapb->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bhld_ctu_view->ghichu->Visible) { // ghichu ?>
	<tr id="r_ghichu">
		<td class="<?php echo $bhld_ctu_view->TableLeftColumnClass ?>"><span id="elh_bhld_ctu_ghichu"><?php echo $bhld_ctu_view->ghichu->caption() ?></span></td>
		<td data-name="ghichu" <?php echo $bhld_ctu_view->ghichu->cellAttributes() ?>>
<span id="el_bhld_ctu_ghichu">
<span<?php echo $bhld_ctu_view->ghichu->viewAttributes() ?>><?php echo $bhld_ctu_view->ghichu->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bhld_ctu_view->madm->Visible) { // madm ?>
	<tr id="r_madm">
		<td class="<?php echo $bhld_ctu_view->TableLeftColumnClass ?>"><span id="elh_bhld_ctu_madm"><?php echo $bhld_ctu_view->madm->caption() ?></span></td>
		<td data-name="madm" <?php echo $bhld_ctu_view->madm->cellAttributes() ?>>
<span id="el_bhld_ctu_madm">
<span<?php echo $bhld_ctu_view->madm->viewAttributes() ?>><?php echo $bhld_ctu_view->madm->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("bhld_ctctu", explode(",", $bhld_ctu->getCurrentDetailTable())) && $bhld_ctctu->DetailView) {
?>
<?php if ($bhld_ctu->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("bhld_ctctu", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "bhld_ctctugrid.php" ?>
<?php } ?>
</form>
<?php
$bhld_ctu_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$bhld_ctu_view->isExport()) { ?>
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
$bhld_ctu_view->terminate();
?>
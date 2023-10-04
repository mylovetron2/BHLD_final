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
$bhld_ctctu_view = new bhld_ctctu_view();

// Run the page
$bhld_ctctu_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_ctctu_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$bhld_ctctu_view->isExport()) { ?>
<script>
var fbhld_ctctuview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fbhld_ctctuview = currentForm = new ew.Form("fbhld_ctctuview", "view");
	loadjs.done("fbhld_ctctuview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$bhld_ctctu_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $bhld_ctctu_view->ExportOptions->render("body") ?>
<?php $bhld_ctctu_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $bhld_ctctu_view->showPageHeader(); ?>
<?php
$bhld_ctctu_view->showMessage();
?>
<form name="fbhld_ctctuview" id="fbhld_ctctuview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_ctctu">
<input type="hidden" name="modal" value="<?php echo (int)$bhld_ctctu_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($bhld_ctctu_view->mact->Visible) { // mact ?>
	<tr id="r_mact">
		<td class="<?php echo $bhld_ctctu_view->TableLeftColumnClass ?>"><span id="elh_bhld_ctctu_mact"><?php echo $bhld_ctctu_view->mact->caption() ?></span></td>
		<td data-name="mact" <?php echo $bhld_ctctu_view->mact->cellAttributes() ?>>
<span id="el_bhld_ctctu_mact">
<span<?php echo $bhld_ctctu_view->mact->viewAttributes() ?>><?php echo $bhld_ctctu_view->mact->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bhld_ctctu_view->mavt->Visible) { // mavt ?>
	<tr id="r_mavt">
		<td class="<?php echo $bhld_ctctu_view->TableLeftColumnClass ?>"><span id="elh_bhld_ctctu_mavt"><?php echo $bhld_ctctu_view->mavt->caption() ?></span></td>
		<td data-name="mavt" <?php echo $bhld_ctctu_view->mavt->cellAttributes() ?>>
<span id="el_bhld_ctctu_mavt">
<span<?php echo $bhld_ctctu_view->mavt->viewAttributes() ?>><?php echo $bhld_ctctu_view->mavt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bhld_ctctu_view->ngnhan->Visible) { // ngnhan ?>
	<tr id="r_ngnhan">
		<td class="<?php echo $bhld_ctctu_view->TableLeftColumnClass ?>"><span id="elh_bhld_ctctu_ngnhan"><?php echo $bhld_ctctu_view->ngnhan->caption() ?></span></td>
		<td data-name="ngnhan" <?php echo $bhld_ctctu_view->ngnhan->cellAttributes() ?>>
<span id="el_bhld_ctctu_ngnhan">
<span<?php echo $bhld_ctctu_view->ngnhan->viewAttributes() ?>><?php echo $bhld_ctctu_view->ngnhan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bhld_ctctu_view->sl->Visible) { // sl ?>
	<tr id="r_sl">
		<td class="<?php echo $bhld_ctctu_view->TableLeftColumnClass ?>"><span id="elh_bhld_ctctu_sl"><?php echo $bhld_ctctu_view->sl->caption() ?></span></td>
		<td data-name="sl" <?php echo $bhld_ctctu_view->sl->cellAttributes() ?>>
<span id="el_bhld_ctctu_sl">
<span<?php echo $bhld_ctctu_view->sl->viewAttributes() ?>><?php echo $bhld_ctctu_view->sl->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bhld_ctctu_view->ngnhantt->Visible) { // ngnhantt ?>
	<tr id="r_ngnhantt">
		<td class="<?php echo $bhld_ctctu_view->TableLeftColumnClass ?>"><span id="elh_bhld_ctctu_ngnhantt"><?php echo $bhld_ctctu_view->ngnhantt->caption() ?></span></td>
		<td data-name="ngnhantt" <?php echo $bhld_ctctu_view->ngnhantt->cellAttributes() ?>>
<span id="el_bhld_ctctu_ngnhantt">
<span<?php echo $bhld_ctctu_view->ngnhantt->viewAttributes() ?>><?php echo $bhld_ctctu_view->ngnhantt->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($bhld_ctctu_view->dmtg->Visible) { // dmtg ?>
	<tr id="r_dmtg">
		<td class="<?php echo $bhld_ctctu_view->TableLeftColumnClass ?>"><span id="elh_bhld_ctctu_dmtg"><?php echo $bhld_ctctu_view->dmtg->caption() ?></span></td>
		<td data-name="dmtg" <?php echo $bhld_ctctu_view->dmtg->cellAttributes() ?>>
<span id="el_bhld_ctctu_dmtg">
<span<?php echo $bhld_ctctu_view->dmtg->viewAttributes() ?>><?php echo $bhld_ctctu_view->dmtg->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$bhld_ctctu_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$bhld_ctctu_view->isExport()) { ?>
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
$bhld_ctctu_view->terminate();
?>
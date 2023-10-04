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
$bhld_ctctu_delete = new bhld_ctctu_delete();

// Run the page
$bhld_ctctu_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_ctctu_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbhld_ctctudelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fbhld_ctctudelete = currentForm = new ew.Form("fbhld_ctctudelete", "delete");
	loadjs.done("fbhld_ctctudelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bhld_ctctu_delete->showPageHeader(); ?>
<?php
$bhld_ctctu_delete->showMessage();
?>
<form name="fbhld_ctctudelete" id="fbhld_ctctudelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_ctctu">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($bhld_ctctu_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($bhld_ctctu_delete->mact->Visible) { // mact ?>
		<th class="<?php echo $bhld_ctctu_delete->mact->headerCellClass() ?>"><span id="elh_bhld_ctctu_mact" class="bhld_ctctu_mact"><?php echo $bhld_ctctu_delete->mact->caption() ?></span></th>
<?php } ?>
<?php if ($bhld_ctctu_delete->mavt->Visible) { // mavt ?>
		<th class="<?php echo $bhld_ctctu_delete->mavt->headerCellClass() ?>"><span id="elh_bhld_ctctu_mavt" class="bhld_ctctu_mavt"><?php echo $bhld_ctctu_delete->mavt->caption() ?></span></th>
<?php } ?>
<?php if ($bhld_ctctu_delete->dmtg->Visible) { // dmtg ?>
		<th class="<?php echo $bhld_ctctu_delete->dmtg->headerCellClass() ?>"><span id="elh_bhld_ctctu_dmtg" class="bhld_ctctu_dmtg"><?php echo $bhld_ctctu_delete->dmtg->caption() ?></span></th>
<?php } ?>
<?php if ($bhld_ctctu_delete->sl->Visible) { // sl ?>
		<th class="<?php echo $bhld_ctctu_delete->sl->headerCellClass() ?>"><span id="elh_bhld_ctctu_sl" class="bhld_ctctu_sl"><?php echo $bhld_ctctu_delete->sl->caption() ?></span></th>
<?php } ?>
<?php if ($bhld_ctctu_delete->ngnhan->Visible) { // ngnhan ?>
		<th class="<?php echo $bhld_ctctu_delete->ngnhan->headerCellClass() ?>"><span id="elh_bhld_ctctu_ngnhan" class="bhld_ctctu_ngnhan"><?php echo $bhld_ctctu_delete->ngnhan->caption() ?></span></th>
<?php } ?>
<?php if ($bhld_ctctu_delete->ngnhantt->Visible) { // ngnhantt ?>
		<th class="<?php echo $bhld_ctctu_delete->ngnhantt->headerCellClass() ?>"><span id="elh_bhld_ctctu_ngnhantt" class="bhld_ctctu_ngnhantt"><?php echo $bhld_ctctu_delete->ngnhantt->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$bhld_ctctu_delete->RecordCount = 0;
$i = 0;
while (!$bhld_ctctu_delete->Recordset->EOF) {
	$bhld_ctctu_delete->RecordCount++;
	$bhld_ctctu_delete->RowCount++;

	// Set row properties
	$bhld_ctctu->resetAttributes();
	$bhld_ctctu->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$bhld_ctctu_delete->loadRowValues($bhld_ctctu_delete->Recordset);

	// Render row
	$bhld_ctctu_delete->renderRow();
?>
	<tr <?php echo $bhld_ctctu->rowAttributes() ?>>
<?php if ($bhld_ctctu_delete->mact->Visible) { // mact ?>
		<td <?php echo $bhld_ctctu_delete->mact->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctctu_delete->RowCount ?>_bhld_ctctu_mact" class="bhld_ctctu_mact">
<span<?php echo $bhld_ctctu_delete->mact->viewAttributes() ?>><?php echo $bhld_ctctu_delete->mact->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bhld_ctctu_delete->mavt->Visible) { // mavt ?>
		<td <?php echo $bhld_ctctu_delete->mavt->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctctu_delete->RowCount ?>_bhld_ctctu_mavt" class="bhld_ctctu_mavt">
<span<?php echo $bhld_ctctu_delete->mavt->viewAttributes() ?>><?php echo $bhld_ctctu_delete->mavt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bhld_ctctu_delete->dmtg->Visible) { // dmtg ?>
		<td <?php echo $bhld_ctctu_delete->dmtg->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctctu_delete->RowCount ?>_bhld_ctctu_dmtg" class="bhld_ctctu_dmtg">
<span<?php echo $bhld_ctctu_delete->dmtg->viewAttributes() ?>><?php echo $bhld_ctctu_delete->dmtg->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bhld_ctctu_delete->sl->Visible) { // sl ?>
		<td <?php echo $bhld_ctctu_delete->sl->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctctu_delete->RowCount ?>_bhld_ctctu_sl" class="bhld_ctctu_sl">
<span<?php echo $bhld_ctctu_delete->sl->viewAttributes() ?>><?php echo $bhld_ctctu_delete->sl->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bhld_ctctu_delete->ngnhan->Visible) { // ngnhan ?>
		<td <?php echo $bhld_ctctu_delete->ngnhan->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctctu_delete->RowCount ?>_bhld_ctctu_ngnhan" class="bhld_ctctu_ngnhan">
<span<?php echo $bhld_ctctu_delete->ngnhan->viewAttributes() ?>><?php echo $bhld_ctctu_delete->ngnhan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bhld_ctctu_delete->ngnhantt->Visible) { // ngnhantt ?>
		<td <?php echo $bhld_ctctu_delete->ngnhantt->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctctu_delete->RowCount ?>_bhld_ctctu_ngnhantt" class="bhld_ctctu_ngnhantt">
<span<?php echo $bhld_ctctu_delete->ngnhantt->viewAttributes() ?>><?php echo $bhld_ctctu_delete->ngnhantt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$bhld_ctctu_delete->Recordset->moveNext();
}
$bhld_ctctu_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bhld_ctctu_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$bhld_ctctu_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$bhld_ctctu_delete->terminate();
?>
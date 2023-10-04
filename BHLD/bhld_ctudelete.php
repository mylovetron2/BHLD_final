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
$bhld_ctu_delete = new bhld_ctu_delete();

// Run the page
$bhld_ctu_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_ctu_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbhld_ctudelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fbhld_ctudelete = currentForm = new ew.Form("fbhld_ctudelete", "delete");
	loadjs.done("fbhld_ctudelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bhld_ctu_delete->showPageHeader(); ?>
<?php
$bhld_ctu_delete->showMessage();
?>
<form name="fbhld_ctudelete" id="fbhld_ctudelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_ctu">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($bhld_ctu_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($bhld_ctu_delete->mact->Visible) { // mact ?>
		<th class="<?php echo $bhld_ctu_delete->mact->headerCellClass() ?>"><span id="elh_bhld_ctu_mact" class="bhld_ctu_mact"><?php echo $bhld_ctu_delete->mact->caption() ?></span></th>
<?php } ?>
<?php if ($bhld_ctu_delete->manv->Visible) { // manv ?>
		<th class="<?php echo $bhld_ctu_delete->manv->headerCellClass() ?>"><span id="elh_bhld_ctu_manv" class="bhld_ctu_manv"><?php echo $bhld_ctu_delete->manv->caption() ?></span></th>
<?php } ?>
<?php if ($bhld_ctu_delete->ngct->Visible) { // ngct ?>
		<th class="<?php echo $bhld_ctu_delete->ngct->headerCellClass() ?>"><span id="elh_bhld_ctu_ngct" class="bhld_ctu_ngct"><?php echo $bhld_ctu_delete->ngct->caption() ?></span></th>
<?php } ?>
<?php if ($bhld_ctu_delete->mapb->Visible) { // mapb ?>
		<th class="<?php echo $bhld_ctu_delete->mapb->headerCellClass() ?>"><span id="elh_bhld_ctu_mapb" class="bhld_ctu_mapb"><?php echo $bhld_ctu_delete->mapb->caption() ?></span></th>
<?php } ?>
<?php if ($bhld_ctu_delete->ghichu->Visible) { // ghichu ?>
		<th class="<?php echo $bhld_ctu_delete->ghichu->headerCellClass() ?>"><span id="elh_bhld_ctu_ghichu" class="bhld_ctu_ghichu"><?php echo $bhld_ctu_delete->ghichu->caption() ?></span></th>
<?php } ?>
<?php if ($bhld_ctu_delete->madm->Visible) { // madm ?>
		<th class="<?php echo $bhld_ctu_delete->madm->headerCellClass() ?>"><span id="elh_bhld_ctu_madm" class="bhld_ctu_madm"><?php echo $bhld_ctu_delete->madm->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$bhld_ctu_delete->RecordCount = 0;
$i = 0;
while (!$bhld_ctu_delete->Recordset->EOF) {
	$bhld_ctu_delete->RecordCount++;
	$bhld_ctu_delete->RowCount++;

	// Set row properties
	$bhld_ctu->resetAttributes();
	$bhld_ctu->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$bhld_ctu_delete->loadRowValues($bhld_ctu_delete->Recordset);

	// Render row
	$bhld_ctu_delete->renderRow();
?>
	<tr <?php echo $bhld_ctu->rowAttributes() ?>>
<?php if ($bhld_ctu_delete->mact->Visible) { // mact ?>
		<td <?php echo $bhld_ctu_delete->mact->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctu_delete->RowCount ?>_bhld_ctu_mact" class="bhld_ctu_mact">
<span<?php echo $bhld_ctu_delete->mact->viewAttributes() ?>><?php echo $bhld_ctu_delete->mact->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bhld_ctu_delete->manv->Visible) { // manv ?>
		<td <?php echo $bhld_ctu_delete->manv->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctu_delete->RowCount ?>_bhld_ctu_manv" class="bhld_ctu_manv">
<span<?php echo $bhld_ctu_delete->manv->viewAttributes() ?>><?php echo $bhld_ctu_delete->manv->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bhld_ctu_delete->ngct->Visible) { // ngct ?>
		<td <?php echo $bhld_ctu_delete->ngct->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctu_delete->RowCount ?>_bhld_ctu_ngct" class="bhld_ctu_ngct">
<span<?php echo $bhld_ctu_delete->ngct->viewAttributes() ?>><?php echo $bhld_ctu_delete->ngct->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bhld_ctu_delete->mapb->Visible) { // mapb ?>
		<td <?php echo $bhld_ctu_delete->mapb->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctu_delete->RowCount ?>_bhld_ctu_mapb" class="bhld_ctu_mapb">
<span<?php echo $bhld_ctu_delete->mapb->viewAttributes() ?>><?php echo $bhld_ctu_delete->mapb->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bhld_ctu_delete->ghichu->Visible) { // ghichu ?>
		<td <?php echo $bhld_ctu_delete->ghichu->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctu_delete->RowCount ?>_bhld_ctu_ghichu" class="bhld_ctu_ghichu">
<span<?php echo $bhld_ctu_delete->ghichu->viewAttributes() ?>><?php echo $bhld_ctu_delete->ghichu->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bhld_ctu_delete->madm->Visible) { // madm ?>
		<td <?php echo $bhld_ctu_delete->madm->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctu_delete->RowCount ?>_bhld_ctu_madm" class="bhld_ctu_madm">
<span<?php echo $bhld_ctu_delete->madm->viewAttributes() ?>><?php echo $bhld_ctu_delete->madm->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$bhld_ctu_delete->Recordset->moveNext();
}
$bhld_ctu_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bhld_ctu_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$bhld_ctu_delete->showPageFooter();
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
$bhld_ctu_delete->terminate();
?>
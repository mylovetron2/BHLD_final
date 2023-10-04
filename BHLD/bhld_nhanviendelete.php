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
$bhld_nhanvien_delete = new bhld_nhanvien_delete();

// Run the page
$bhld_nhanvien_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_nhanvien_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbhld_nhanviendelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fbhld_nhanviendelete = currentForm = new ew.Form("fbhld_nhanviendelete", "delete");
	loadjs.done("fbhld_nhanviendelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bhld_nhanvien_delete->showPageHeader(); ?>
<?php
$bhld_nhanvien_delete->showMessage();
?>
<form name="fbhld_nhanviendelete" id="fbhld_nhanviendelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_nhanvien">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($bhld_nhanvien_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($bhld_nhanvien_delete->mapb->Visible) { // mapb ?>
		<th class="<?php echo $bhld_nhanvien_delete->mapb->headerCellClass() ?>"><span id="elh_bhld_nhanvien_mapb" class="bhld_nhanvien_mapb"><?php echo $bhld_nhanvien_delete->mapb->caption() ?></span></th>
<?php } ?>
<?php if ($bhld_nhanvien_delete->manv->Visible) { // manv ?>
		<th class="<?php echo $bhld_nhanvien_delete->manv->headerCellClass() ?>"><span id="elh_bhld_nhanvien_manv" class="bhld_nhanvien_manv"><?php echo $bhld_nhanvien_delete->manv->caption() ?></span></th>
<?php } ?>
<?php if ($bhld_nhanvien_delete->tennhanvien->Visible) { // tennhanvien ?>
		<th class="<?php echo $bhld_nhanvien_delete->tennhanvien->headerCellClass() ?>"><span id="elh_bhld_nhanvien_tennhanvien" class="bhld_nhanvien_tennhanvien"><?php echo $bhld_nhanvien_delete->tennhanvien->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$bhld_nhanvien_delete->RecordCount = 0;
$i = 0;
while (!$bhld_nhanvien_delete->Recordset->EOF) {
	$bhld_nhanvien_delete->RecordCount++;
	$bhld_nhanvien_delete->RowCount++;

	// Set row properties
	$bhld_nhanvien->resetAttributes();
	$bhld_nhanvien->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$bhld_nhanvien_delete->loadRowValues($bhld_nhanvien_delete->Recordset);

	// Render row
	$bhld_nhanvien_delete->renderRow();
?>
	<tr <?php echo $bhld_nhanvien->rowAttributes() ?>>
<?php if ($bhld_nhanvien_delete->mapb->Visible) { // mapb ?>
		<td <?php echo $bhld_nhanvien_delete->mapb->cellAttributes() ?>>
<span id="el<?php echo $bhld_nhanvien_delete->RowCount ?>_bhld_nhanvien_mapb" class="bhld_nhanvien_mapb">
<span<?php echo $bhld_nhanvien_delete->mapb->viewAttributes() ?>><?php echo $bhld_nhanvien_delete->mapb->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bhld_nhanvien_delete->manv->Visible) { // manv ?>
		<td <?php echo $bhld_nhanvien_delete->manv->cellAttributes() ?>>
<span id="el<?php echo $bhld_nhanvien_delete->RowCount ?>_bhld_nhanvien_manv" class="bhld_nhanvien_manv">
<span<?php echo $bhld_nhanvien_delete->manv->viewAttributes() ?>><?php echo $bhld_nhanvien_delete->manv->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bhld_nhanvien_delete->tennhanvien->Visible) { // tennhanvien ?>
		<td <?php echo $bhld_nhanvien_delete->tennhanvien->cellAttributes() ?>>
<span id="el<?php echo $bhld_nhanvien_delete->RowCount ?>_bhld_nhanvien_tennhanvien" class="bhld_nhanvien_tennhanvien">
<span<?php echo $bhld_nhanvien_delete->tennhanvien->viewAttributes() ?>><?php echo $bhld_nhanvien_delete->tennhanvien->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$bhld_nhanvien_delete->Recordset->moveNext();
}
$bhld_nhanvien_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bhld_nhanvien_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$bhld_nhanvien_delete->showPageFooter();
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
$bhld_nhanvien_delete->terminate();
?>
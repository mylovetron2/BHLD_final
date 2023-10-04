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
$bhld_phongban_delete = new bhld_phongban_delete();

// Run the page
$bhld_phongban_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_phongban_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbhld_phongbandelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fbhld_phongbandelete = currentForm = new ew.Form("fbhld_phongbandelete", "delete");
	loadjs.done("fbhld_phongbandelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bhld_phongban_delete->showPageHeader(); ?>
<?php
$bhld_phongban_delete->showMessage();
?>
<form name="fbhld_phongbandelete" id="fbhld_phongbandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_phongban">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($bhld_phongban_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($bhld_phongban_delete->mapb->Visible) { // mapb ?>
		<th class="<?php echo $bhld_phongban_delete->mapb->headerCellClass() ?>"><span id="elh_bhld_phongban_mapb" class="bhld_phongban_mapb"><?php echo $bhld_phongban_delete->mapb->caption() ?></span></th>
<?php } ?>
<?php if ($bhld_phongban_delete->tenphong->Visible) { // tenphong ?>
		<th class="<?php echo $bhld_phongban_delete->tenphong->headerCellClass() ?>"><span id="elh_bhld_phongban_tenphong" class="bhld_phongban_tenphong"><?php echo $bhld_phongban_delete->tenphong->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$bhld_phongban_delete->RecordCount = 0;
$i = 0;
while (!$bhld_phongban_delete->Recordset->EOF) {
	$bhld_phongban_delete->RecordCount++;
	$bhld_phongban_delete->RowCount++;

	// Set row properties
	$bhld_phongban->resetAttributes();
	$bhld_phongban->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$bhld_phongban_delete->loadRowValues($bhld_phongban_delete->Recordset);

	// Render row
	$bhld_phongban_delete->renderRow();
?>
	<tr <?php echo $bhld_phongban->rowAttributes() ?>>
<?php if ($bhld_phongban_delete->mapb->Visible) { // mapb ?>
		<td <?php echo $bhld_phongban_delete->mapb->cellAttributes() ?>>
<span id="el<?php echo $bhld_phongban_delete->RowCount ?>_bhld_phongban_mapb" class="bhld_phongban_mapb">
<span<?php echo $bhld_phongban_delete->mapb->viewAttributes() ?>><?php echo $bhld_phongban_delete->mapb->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bhld_phongban_delete->tenphong->Visible) { // tenphong ?>
		<td <?php echo $bhld_phongban_delete->tenphong->cellAttributes() ?>>
<span id="el<?php echo $bhld_phongban_delete->RowCount ?>_bhld_phongban_tenphong" class="bhld_phongban_tenphong">
<span<?php echo $bhld_phongban_delete->tenphong->viewAttributes() ?>><?php echo $bhld_phongban_delete->tenphong->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$bhld_phongban_delete->Recordset->moveNext();
}
$bhld_phongban_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bhld_phongban_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$bhld_phongban_delete->showPageFooter();
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
$bhld_phongban_delete->terminate();
?>
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
$bhld_dmuc_delete = new bhld_dmuc_delete();

// Run the page
$bhld_dmuc_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_dmuc_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbhld_dmucdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fbhld_dmucdelete = currentForm = new ew.Form("fbhld_dmucdelete", "delete");
	loadjs.done("fbhld_dmucdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bhld_dmuc_delete->showPageHeader(); ?>
<?php
$bhld_dmuc_delete->showMessage();
?>
<form name="fbhld_dmucdelete" id="fbhld_dmucdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_dmuc">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($bhld_dmuc_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($bhld_dmuc_delete->madm->Visible) { // madm ?>
		<th class="<?php echo $bhld_dmuc_delete->madm->headerCellClass() ?>"><span id="elh_bhld_dmuc_madm" class="bhld_dmuc_madm"><?php echo $bhld_dmuc_delete->madm->caption() ?></span></th>
<?php } ?>
<?php if ($bhld_dmuc_delete->mota->Visible) { // mota ?>
		<th class="<?php echo $bhld_dmuc_delete->mota->headerCellClass() ?>"><span id="elh_bhld_dmuc_mota" class="bhld_dmuc_mota"><?php echo $bhld_dmuc_delete->mota->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$bhld_dmuc_delete->RecordCount = 0;
$i = 0;
while (!$bhld_dmuc_delete->Recordset->EOF) {
	$bhld_dmuc_delete->RecordCount++;
	$bhld_dmuc_delete->RowCount++;

	// Set row properties
	$bhld_dmuc->resetAttributes();
	$bhld_dmuc->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$bhld_dmuc_delete->loadRowValues($bhld_dmuc_delete->Recordset);

	// Render row
	$bhld_dmuc_delete->renderRow();
?>
	<tr <?php echo $bhld_dmuc->rowAttributes() ?>>
<?php if ($bhld_dmuc_delete->madm->Visible) { // madm ?>
		<td <?php echo $bhld_dmuc_delete->madm->cellAttributes() ?>>
<span id="el<?php echo $bhld_dmuc_delete->RowCount ?>_bhld_dmuc_madm" class="bhld_dmuc_madm">
<span<?php echo $bhld_dmuc_delete->madm->viewAttributes() ?>><?php echo $bhld_dmuc_delete->madm->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bhld_dmuc_delete->mota->Visible) { // mota ?>
		<td <?php echo $bhld_dmuc_delete->mota->cellAttributes() ?>>
<span id="el<?php echo $bhld_dmuc_delete->RowCount ?>_bhld_dmuc_mota" class="bhld_dmuc_mota">
<span<?php echo $bhld_dmuc_delete->mota->viewAttributes() ?>><?php echo $bhld_dmuc_delete->mota->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$bhld_dmuc_delete->Recordset->moveNext();
}
$bhld_dmuc_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bhld_dmuc_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$bhld_dmuc_delete->showPageFooter();
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
$bhld_dmuc_delete->terminate();
?>
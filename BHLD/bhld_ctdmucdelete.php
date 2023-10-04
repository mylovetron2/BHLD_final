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
$bhld_ctdmuc_delete = new bhld_ctdmuc_delete();

// Run the page
$bhld_ctdmuc_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_ctdmuc_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbhld_ctdmucdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fbhld_ctdmucdelete = currentForm = new ew.Form("fbhld_ctdmucdelete", "delete");
	loadjs.done("fbhld_ctdmucdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bhld_ctdmuc_delete->showPageHeader(); ?>
<?php
$bhld_ctdmuc_delete->showMessage();
?>
<form name="fbhld_ctdmucdelete" id="fbhld_ctdmucdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_ctdmuc">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($bhld_ctdmuc_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($bhld_ctdmuc_delete->madm->Visible) { // madm ?>
		<th class="<?php echo $bhld_ctdmuc_delete->madm->headerCellClass() ?>"><span id="elh_bhld_ctdmuc_madm" class="bhld_ctdmuc_madm"><?php echo $bhld_ctdmuc_delete->madm->caption() ?></span></th>
<?php } ?>
<?php if ($bhld_ctdmuc_delete->mavt->Visible) { // mavt ?>
		<th class="<?php echo $bhld_ctdmuc_delete->mavt->headerCellClass() ?>"><span id="elh_bhld_ctdmuc_mavt" class="bhld_ctdmuc_mavt"><?php echo $bhld_ctdmuc_delete->mavt->caption() ?></span></th>
<?php } ?>
<?php if ($bhld_ctdmuc_delete->dmuc->Visible) { // dmuc ?>
		<th class="<?php echo $bhld_ctdmuc_delete->dmuc->headerCellClass() ?>"><span id="elh_bhld_ctdmuc_dmuc" class="bhld_ctdmuc_dmuc"><?php echo $bhld_ctdmuc_delete->dmuc->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$bhld_ctdmuc_delete->RecordCount = 0;
$i = 0;
while (!$bhld_ctdmuc_delete->Recordset->EOF) {
	$bhld_ctdmuc_delete->RecordCount++;
	$bhld_ctdmuc_delete->RowCount++;

	// Set row properties
	$bhld_ctdmuc->resetAttributes();
	$bhld_ctdmuc->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$bhld_ctdmuc_delete->loadRowValues($bhld_ctdmuc_delete->Recordset);

	// Render row
	$bhld_ctdmuc_delete->renderRow();
?>
	<tr <?php echo $bhld_ctdmuc->rowAttributes() ?>>
<?php if ($bhld_ctdmuc_delete->madm->Visible) { // madm ?>
		<td <?php echo $bhld_ctdmuc_delete->madm->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctdmuc_delete->RowCount ?>_bhld_ctdmuc_madm" class="bhld_ctdmuc_madm">
<span<?php echo $bhld_ctdmuc_delete->madm->viewAttributes() ?>><?php echo $bhld_ctdmuc_delete->madm->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bhld_ctdmuc_delete->mavt->Visible) { // mavt ?>
		<td <?php echo $bhld_ctdmuc_delete->mavt->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctdmuc_delete->RowCount ?>_bhld_ctdmuc_mavt" class="bhld_ctdmuc_mavt">
<span<?php echo $bhld_ctdmuc_delete->mavt->viewAttributes() ?>><?php echo $bhld_ctdmuc_delete->mavt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bhld_ctdmuc_delete->dmuc->Visible) { // dmuc ?>
		<td <?php echo $bhld_ctdmuc_delete->dmuc->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctdmuc_delete->RowCount ?>_bhld_ctdmuc_dmuc" class="bhld_ctdmuc_dmuc">
<span<?php echo $bhld_ctdmuc_delete->dmuc->viewAttributes() ?>><?php echo $bhld_ctdmuc_delete->dmuc->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$bhld_ctdmuc_delete->Recordset->moveNext();
}
$bhld_ctdmuc_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bhld_ctdmuc_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$bhld_ctdmuc_delete->showPageFooter();
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
$bhld_ctdmuc_delete->terminate();
?>
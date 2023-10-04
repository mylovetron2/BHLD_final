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
$bhld_dmvattu_delete = new bhld_dmvattu_delete();

// Run the page
$bhld_dmvattu_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_dmvattu_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbhld_dmvattudelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fbhld_dmvattudelete = currentForm = new ew.Form("fbhld_dmvattudelete", "delete");
	loadjs.done("fbhld_dmvattudelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bhld_dmvattu_delete->showPageHeader(); ?>
<?php
$bhld_dmvattu_delete->showMessage();
?>
<form name="fbhld_dmvattudelete" id="fbhld_dmvattudelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_dmvattu">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($bhld_dmvattu_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($bhld_dmvattu_delete->mavt->Visible) { // mavt ?>
		<th class="<?php echo $bhld_dmvattu_delete->mavt->headerCellClass() ?>"><span id="elh_bhld_dmvattu_mavt" class="bhld_dmvattu_mavt"><?php echo $bhld_dmvattu_delete->mavt->caption() ?></span></th>
<?php } ?>
<?php if ($bhld_dmvattu_delete->tenvt->Visible) { // tenvt ?>
		<th class="<?php echo $bhld_dmvattu_delete->tenvt->headerCellClass() ?>"><span id="elh_bhld_dmvattu_tenvt" class="bhld_dmvattu_tenvt"><?php echo $bhld_dmvattu_delete->tenvt->caption() ?></span></th>
<?php } ?>
<?php if ($bhld_dmvattu_delete->dvt->Visible) { // dvt ?>
		<th class="<?php echo $bhld_dmvattu_delete->dvt->headerCellClass() ?>"><span id="elh_bhld_dmvattu_dvt" class="bhld_dmvattu_dvt"><?php echo $bhld_dmvattu_delete->dvt->caption() ?></span></th>
<?php } ?>
<?php if ($bhld_dmvattu_delete->ghichu->Visible) { // ghichu ?>
		<th class="<?php echo $bhld_dmvattu_delete->ghichu->headerCellClass() ?>"><span id="elh_bhld_dmvattu_ghichu" class="bhld_dmvattu_ghichu"><?php echo $bhld_dmvattu_delete->ghichu->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$bhld_dmvattu_delete->RecordCount = 0;
$i = 0;
while (!$bhld_dmvattu_delete->Recordset->EOF) {
	$bhld_dmvattu_delete->RecordCount++;
	$bhld_dmvattu_delete->RowCount++;

	// Set row properties
	$bhld_dmvattu->resetAttributes();
	$bhld_dmvattu->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$bhld_dmvattu_delete->loadRowValues($bhld_dmvattu_delete->Recordset);

	// Render row
	$bhld_dmvattu_delete->renderRow();
?>
	<tr <?php echo $bhld_dmvattu->rowAttributes() ?>>
<?php if ($bhld_dmvattu_delete->mavt->Visible) { // mavt ?>
		<td <?php echo $bhld_dmvattu_delete->mavt->cellAttributes() ?>>
<span id="el<?php echo $bhld_dmvattu_delete->RowCount ?>_bhld_dmvattu_mavt" class="bhld_dmvattu_mavt">
<span<?php echo $bhld_dmvattu_delete->mavt->viewAttributes() ?>><?php echo $bhld_dmvattu_delete->mavt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bhld_dmvattu_delete->tenvt->Visible) { // tenvt ?>
		<td <?php echo $bhld_dmvattu_delete->tenvt->cellAttributes() ?>>
<span id="el<?php echo $bhld_dmvattu_delete->RowCount ?>_bhld_dmvattu_tenvt" class="bhld_dmvattu_tenvt">
<span<?php echo $bhld_dmvattu_delete->tenvt->viewAttributes() ?>><?php echo $bhld_dmvattu_delete->tenvt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bhld_dmvattu_delete->dvt->Visible) { // dvt ?>
		<td <?php echo $bhld_dmvattu_delete->dvt->cellAttributes() ?>>
<span id="el<?php echo $bhld_dmvattu_delete->RowCount ?>_bhld_dmvattu_dvt" class="bhld_dmvattu_dvt">
<span<?php echo $bhld_dmvattu_delete->dvt->viewAttributes() ?>><?php echo $bhld_dmvattu_delete->dvt->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($bhld_dmvattu_delete->ghichu->Visible) { // ghichu ?>
		<td <?php echo $bhld_dmvattu_delete->ghichu->cellAttributes() ?>>
<span id="el<?php echo $bhld_dmvattu_delete->RowCount ?>_bhld_dmvattu_ghichu" class="bhld_dmvattu_ghichu">
<span<?php echo $bhld_dmvattu_delete->ghichu->viewAttributes() ?>><?php echo $bhld_dmvattu_delete->ghichu->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$bhld_dmvattu_delete->Recordset->moveNext();
}
$bhld_dmvattu_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bhld_dmvattu_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$bhld_dmvattu_delete->showPageFooter();
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
$bhld_dmvattu_delete->terminate();
?>
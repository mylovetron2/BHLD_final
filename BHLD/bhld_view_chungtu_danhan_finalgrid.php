<?php
namespace PHPMaker2020\projectBHLD;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($bhld_view_chungtu_danhan_final_grid))
	$bhld_view_chungtu_danhan_final_grid = new bhld_view_chungtu_danhan_final_grid();

// Run the page
$bhld_view_chungtu_danhan_final_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_view_chungtu_danhan_final_grid->Page_Render();
?>
<?php if (!$bhld_view_chungtu_danhan_final_grid->isExport()) { ?>
<script>
var fbhld_view_chungtu_danhan_finalgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fbhld_view_chungtu_danhan_finalgrid = new ew.Form("fbhld_view_chungtu_danhan_finalgrid", "grid");
	fbhld_view_chungtu_danhan_finalgrid.formKeyCountName = '<?php echo $bhld_view_chungtu_danhan_final_grid->FormKeyCountName ?>';

	// Validate form
	fbhld_view_chungtu_danhan_finalgrid.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
			if (checkrow) {
				addcnt++;
			<?php if ($bhld_view_chungtu_danhan_final_grid->mact->Required) { ?>
				elm = this.getElements("x" + infix + "_mact");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_view_chungtu_danhan_final_grid->mact->caption(), $bhld_view_chungtu_danhan_final_grid->mact->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_view_chungtu_danhan_final_grid->mavt->Required) { ?>
				elm = this.getElements("x" + infix + "_mavt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_view_chungtu_danhan_final_grid->mavt->caption(), $bhld_view_chungtu_danhan_final_grid->mavt->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_view_chungtu_danhan_final_grid->ngnhan->Required) { ?>
				elm = this.getElements("x" + infix + "_ngnhan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_view_chungtu_danhan_final_grid->ngnhan->caption(), $bhld_view_chungtu_danhan_final_grid->ngnhan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ngnhan");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_view_chungtu_danhan_final_grid->ngnhan->errorMessage()) ?>");
			<?php if ($bhld_view_chungtu_danhan_final_grid->ngnhantt->Required) { ?>
				elm = this.getElements("x" + infix + "_ngnhantt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_view_chungtu_danhan_final_grid->ngnhantt->caption(), $bhld_view_chungtu_danhan_final_grid->ngnhantt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ngnhantt");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_view_chungtu_danhan_final_grid->ngnhantt->errorMessage()) ?>");
			<?php if ($bhld_view_chungtu_danhan_final_grid->dmtg->Required) { ?>
				elm = this.getElements("x" + infix + "_dmtg");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_view_chungtu_danhan_final_grid->dmtg->caption(), $bhld_view_chungtu_danhan_final_grid->dmtg->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_dmtg");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_view_chungtu_danhan_final_grid->dmtg->errorMessage()) ?>");
			<?php if ($bhld_view_chungtu_danhan_final_grid->sl->Required) { ?>
				elm = this.getElements("x" + infix + "_sl");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_view_chungtu_danhan_final_grid->sl->caption(), $bhld_view_chungtu_danhan_final_grid->sl->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sl");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_view_chungtu_danhan_final_grid->sl->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fbhld_view_chungtu_danhan_finalgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "mact", false)) return false;
		if (ew.valueChanged(fobj, infix, "mavt", false)) return false;
		if (ew.valueChanged(fobj, infix, "ngnhan", false)) return false;
		if (ew.valueChanged(fobj, infix, "ngnhantt", false)) return false;
		if (ew.valueChanged(fobj, infix, "dmtg", false)) return false;
		if (ew.valueChanged(fobj, infix, "sl", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fbhld_view_chungtu_danhan_finalgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbhld_view_chungtu_danhan_finalgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fbhld_view_chungtu_danhan_finalgrid.lists["x_mavt"] = <?php echo $bhld_view_chungtu_danhan_final_grid->mavt->Lookup->toClientList($bhld_view_chungtu_danhan_final_grid) ?>;
	fbhld_view_chungtu_danhan_finalgrid.lists["x_mavt"].options = <?php echo JsonEncode($bhld_view_chungtu_danhan_final_grid->mavt->lookupOptions()) ?>;
	loadjs.done("fbhld_view_chungtu_danhan_finalgrid");
});
</script>
<?php } ?>
<?php
$bhld_view_chungtu_danhan_final_grid->renderOtherOptions();
?>
<?php if ($bhld_view_chungtu_danhan_final_grid->TotalRecords > 0 || $bhld_view_chungtu_danhan_final->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($bhld_view_chungtu_danhan_final_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> bhld_view_chungtu_danhan_final">
<?php if ($bhld_view_chungtu_danhan_final_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $bhld_view_chungtu_danhan_final_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fbhld_view_chungtu_danhan_finalgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_bhld_view_chungtu_danhan_final" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_bhld_view_chungtu_danhan_finalgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$bhld_view_chungtu_danhan_final->RowType = ROWTYPE_HEADER;

// Render list options
$bhld_view_chungtu_danhan_final_grid->renderListOptions();

// Render list options (header, left)
$bhld_view_chungtu_danhan_final_grid->ListOptions->render("header", "left");
?>
<?php if ($bhld_view_chungtu_danhan_final_grid->mact->Visible) { // mact ?>
	<?php if ($bhld_view_chungtu_danhan_final_grid->SortUrl($bhld_view_chungtu_danhan_final_grid->mact) == "") { ?>
		<th data-name="mact" class="<?php echo $bhld_view_chungtu_danhan_final_grid->mact->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_final_mact" class="bhld_view_chungtu_danhan_final_mact"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_grid->mact->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mact" class="<?php echo $bhld_view_chungtu_danhan_final_grid->mact->headerCellClass() ?>"><div><div id="elh_bhld_view_chungtu_danhan_final_mact" class="bhld_view_chungtu_danhan_final_mact">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_grid->mact->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_final_grid->mact->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_final_grid->mact->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final_grid->mavt->Visible) { // mavt ?>
	<?php if ($bhld_view_chungtu_danhan_final_grid->SortUrl($bhld_view_chungtu_danhan_final_grid->mavt) == "") { ?>
		<th data-name="mavt" class="<?php echo $bhld_view_chungtu_danhan_final_grid->mavt->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_final_mavt" class="bhld_view_chungtu_danhan_final_mavt"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_grid->mavt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mavt" class="<?php echo $bhld_view_chungtu_danhan_final_grid->mavt->headerCellClass() ?>"><div><div id="elh_bhld_view_chungtu_danhan_final_mavt" class="bhld_view_chungtu_danhan_final_mavt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_grid->mavt->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_final_grid->mavt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_final_grid->mavt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final_grid->ngnhan->Visible) { // ngnhan ?>
	<?php if ($bhld_view_chungtu_danhan_final_grid->SortUrl($bhld_view_chungtu_danhan_final_grid->ngnhan) == "") { ?>
		<th data-name="ngnhan" class="<?php echo $bhld_view_chungtu_danhan_final_grid->ngnhan->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_final_ngnhan" class="bhld_view_chungtu_danhan_final_ngnhan"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_grid->ngnhan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ngnhan" class="<?php echo $bhld_view_chungtu_danhan_final_grid->ngnhan->headerCellClass() ?>"><div><div id="elh_bhld_view_chungtu_danhan_final_ngnhan" class="bhld_view_chungtu_danhan_final_ngnhan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_grid->ngnhan->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_final_grid->ngnhan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_final_grid->ngnhan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final_grid->ngnhantt->Visible) { // ngnhantt ?>
	<?php if ($bhld_view_chungtu_danhan_final_grid->SortUrl($bhld_view_chungtu_danhan_final_grid->ngnhantt) == "") { ?>
		<th data-name="ngnhantt" class="<?php echo $bhld_view_chungtu_danhan_final_grid->ngnhantt->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_final_ngnhantt" class="bhld_view_chungtu_danhan_final_ngnhantt"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_grid->ngnhantt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ngnhantt" class="<?php echo $bhld_view_chungtu_danhan_final_grid->ngnhantt->headerCellClass() ?>"><div><div id="elh_bhld_view_chungtu_danhan_final_ngnhantt" class="bhld_view_chungtu_danhan_final_ngnhantt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_grid->ngnhantt->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_final_grid->ngnhantt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_final_grid->ngnhantt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final_grid->dmtg->Visible) { // dmtg ?>
	<?php if ($bhld_view_chungtu_danhan_final_grid->SortUrl($bhld_view_chungtu_danhan_final_grid->dmtg) == "") { ?>
		<th data-name="dmtg" class="<?php echo $bhld_view_chungtu_danhan_final_grid->dmtg->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_final_dmtg" class="bhld_view_chungtu_danhan_final_dmtg"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_grid->dmtg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dmtg" class="<?php echo $bhld_view_chungtu_danhan_final_grid->dmtg->headerCellClass() ?>"><div><div id="elh_bhld_view_chungtu_danhan_final_dmtg" class="bhld_view_chungtu_danhan_final_dmtg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_grid->dmtg->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_final_grid->dmtg->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_final_grid->dmtg->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final_grid->sl->Visible) { // sl ?>
	<?php if ($bhld_view_chungtu_danhan_final_grid->SortUrl($bhld_view_chungtu_danhan_final_grid->sl) == "") { ?>
		<th data-name="sl" class="<?php echo $bhld_view_chungtu_danhan_final_grid->sl->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_final_sl" class="bhld_view_chungtu_danhan_final_sl"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_grid->sl->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sl" class="<?php echo $bhld_view_chungtu_danhan_final_grid->sl->headerCellClass() ?>"><div><div id="elh_bhld_view_chungtu_danhan_final_sl" class="bhld_view_chungtu_danhan_final_sl">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_grid->sl->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_final_grid->sl->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_final_grid->sl->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$bhld_view_chungtu_danhan_final_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$bhld_view_chungtu_danhan_final_grid->StartRecord = 1;
$bhld_view_chungtu_danhan_final_grid->StopRecord = $bhld_view_chungtu_danhan_final_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($bhld_view_chungtu_danhan_final->isConfirm() || $bhld_view_chungtu_danhan_final_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($bhld_view_chungtu_danhan_final_grid->FormKeyCountName) && ($bhld_view_chungtu_danhan_final_grid->isGridAdd() || $bhld_view_chungtu_danhan_final_grid->isGridEdit() || $bhld_view_chungtu_danhan_final->isConfirm())) {
		$bhld_view_chungtu_danhan_final_grid->KeyCount = $CurrentForm->getValue($bhld_view_chungtu_danhan_final_grid->FormKeyCountName);
		$bhld_view_chungtu_danhan_final_grid->StopRecord = $bhld_view_chungtu_danhan_final_grid->StartRecord + $bhld_view_chungtu_danhan_final_grid->KeyCount - 1;
	}
}
$bhld_view_chungtu_danhan_final_grid->RecordCount = $bhld_view_chungtu_danhan_final_grid->StartRecord - 1;
if ($bhld_view_chungtu_danhan_final_grid->Recordset && !$bhld_view_chungtu_danhan_final_grid->Recordset->EOF) {
	$bhld_view_chungtu_danhan_final_grid->Recordset->moveFirst();
	$selectLimit = $bhld_view_chungtu_danhan_final_grid->UseSelectLimit;
	if (!$selectLimit && $bhld_view_chungtu_danhan_final_grid->StartRecord > 1)
		$bhld_view_chungtu_danhan_final_grid->Recordset->move($bhld_view_chungtu_danhan_final_grid->StartRecord - 1);
} elseif (!$bhld_view_chungtu_danhan_final->AllowAddDeleteRow && $bhld_view_chungtu_danhan_final_grid->StopRecord == 0) {
	$bhld_view_chungtu_danhan_final_grid->StopRecord = $bhld_view_chungtu_danhan_final->GridAddRowCount;
}

// Initialize aggregate
$bhld_view_chungtu_danhan_final->RowType = ROWTYPE_AGGREGATEINIT;
$bhld_view_chungtu_danhan_final->resetAttributes();
$bhld_view_chungtu_danhan_final_grid->renderRow();
if ($bhld_view_chungtu_danhan_final_grid->isGridAdd())
	$bhld_view_chungtu_danhan_final_grid->RowIndex = 0;
if ($bhld_view_chungtu_danhan_final_grid->isGridEdit())
	$bhld_view_chungtu_danhan_final_grid->RowIndex = 0;
while ($bhld_view_chungtu_danhan_final_grid->RecordCount < $bhld_view_chungtu_danhan_final_grid->StopRecord) {
	$bhld_view_chungtu_danhan_final_grid->RecordCount++;
	if ($bhld_view_chungtu_danhan_final_grid->RecordCount >= $bhld_view_chungtu_danhan_final_grid->StartRecord) {
		$bhld_view_chungtu_danhan_final_grid->RowCount++;
		if ($bhld_view_chungtu_danhan_final_grid->isGridAdd() || $bhld_view_chungtu_danhan_final_grid->isGridEdit() || $bhld_view_chungtu_danhan_final->isConfirm()) {
			$bhld_view_chungtu_danhan_final_grid->RowIndex++;
			$CurrentForm->Index = $bhld_view_chungtu_danhan_final_grid->RowIndex;
			if ($CurrentForm->hasValue($bhld_view_chungtu_danhan_final_grid->FormActionName) && ($bhld_view_chungtu_danhan_final->isConfirm() || $bhld_view_chungtu_danhan_final_grid->EventCancelled))
				$bhld_view_chungtu_danhan_final_grid->RowAction = strval($CurrentForm->getValue($bhld_view_chungtu_danhan_final_grid->FormActionName));
			elseif ($bhld_view_chungtu_danhan_final_grid->isGridAdd())
				$bhld_view_chungtu_danhan_final_grid->RowAction = "insert";
			else
				$bhld_view_chungtu_danhan_final_grid->RowAction = "";
		}

		// Set up key count
		$bhld_view_chungtu_danhan_final_grid->KeyCount = $bhld_view_chungtu_danhan_final_grid->RowIndex;

		// Init row class and style
		$bhld_view_chungtu_danhan_final->resetAttributes();
		$bhld_view_chungtu_danhan_final->CssClass = "";
		if ($bhld_view_chungtu_danhan_final_grid->isGridAdd()) {
			if ($bhld_view_chungtu_danhan_final->CurrentMode == "copy") {
				$bhld_view_chungtu_danhan_final_grid->loadRowValues($bhld_view_chungtu_danhan_final_grid->Recordset); // Load row values
				$bhld_view_chungtu_danhan_final_grid->setRecordKey($bhld_view_chungtu_danhan_final_grid->RowOldKey, $bhld_view_chungtu_danhan_final_grid->Recordset); // Set old record key
			} else {
				$bhld_view_chungtu_danhan_final_grid->loadRowValues(); // Load default values
				$bhld_view_chungtu_danhan_final_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$bhld_view_chungtu_danhan_final_grid->loadRowValues($bhld_view_chungtu_danhan_final_grid->Recordset); // Load row values
		}
		$bhld_view_chungtu_danhan_final->RowType = ROWTYPE_VIEW; // Render view
		if ($bhld_view_chungtu_danhan_final_grid->isGridAdd()) // Grid add
			$bhld_view_chungtu_danhan_final->RowType = ROWTYPE_ADD; // Render add
		if ($bhld_view_chungtu_danhan_final_grid->isGridAdd() && $bhld_view_chungtu_danhan_final->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$bhld_view_chungtu_danhan_final_grid->restoreCurrentRowFormValues($bhld_view_chungtu_danhan_final_grid->RowIndex); // Restore form values
		if ($bhld_view_chungtu_danhan_final_grid->isGridEdit()) { // Grid edit
			if ($bhld_view_chungtu_danhan_final->EventCancelled)
				$bhld_view_chungtu_danhan_final_grid->restoreCurrentRowFormValues($bhld_view_chungtu_danhan_final_grid->RowIndex); // Restore form values
			if ($bhld_view_chungtu_danhan_final_grid->RowAction == "insert")
				$bhld_view_chungtu_danhan_final->RowType = ROWTYPE_ADD; // Render add
			else
				$bhld_view_chungtu_danhan_final->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($bhld_view_chungtu_danhan_final_grid->isGridEdit() && ($bhld_view_chungtu_danhan_final->RowType == ROWTYPE_EDIT || $bhld_view_chungtu_danhan_final->RowType == ROWTYPE_ADD) && $bhld_view_chungtu_danhan_final->EventCancelled) // Update failed
			$bhld_view_chungtu_danhan_final_grid->restoreCurrentRowFormValues($bhld_view_chungtu_danhan_final_grid->RowIndex); // Restore form values
		if ($bhld_view_chungtu_danhan_final->RowType == ROWTYPE_EDIT) // Edit row
			$bhld_view_chungtu_danhan_final_grid->EditRowCount++;
		if ($bhld_view_chungtu_danhan_final->isConfirm()) // Confirm row
			$bhld_view_chungtu_danhan_final_grid->restoreCurrentRowFormValues($bhld_view_chungtu_danhan_final_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$bhld_view_chungtu_danhan_final->RowAttrs->merge(["data-rowindex" => $bhld_view_chungtu_danhan_final_grid->RowCount, "id" => "r" . $bhld_view_chungtu_danhan_final_grid->RowCount . "_bhld_view_chungtu_danhan_final", "data-rowtype" => $bhld_view_chungtu_danhan_final->RowType]);

		// Render row
		$bhld_view_chungtu_danhan_final_grid->renderRow();

		// Render list options
		$bhld_view_chungtu_danhan_final_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($bhld_view_chungtu_danhan_final_grid->RowAction != "delete" && $bhld_view_chungtu_danhan_final_grid->RowAction != "insertdelete" && !($bhld_view_chungtu_danhan_final_grid->RowAction == "insert" && $bhld_view_chungtu_danhan_final->isConfirm() && $bhld_view_chungtu_danhan_final_grid->emptyRow())) {
?>
	<tr <?php echo $bhld_view_chungtu_danhan_final->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bhld_view_chungtu_danhan_final_grid->ListOptions->render("body", "left", $bhld_view_chungtu_danhan_final_grid->RowCount);
?>
	<?php if ($bhld_view_chungtu_danhan_final_grid->mact->Visible) { // mact ?>
		<td data-name="mact" <?php echo $bhld_view_chungtu_danhan_final_grid->mact->cellAttributes() ?>>
<?php if ($bhld_view_chungtu_danhan_final->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_final_grid->RowCount ?>_bhld_view_chungtu_danhan_final_mact" class="form-group">
<input type="text" data-table="bhld_view_chungtu_danhan_final" data-field="x_mact" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mact" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mact" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->mact->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_final_grid->mact->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_final_grid->mact->editAttributes() ?>>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_mact" name="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mact" id="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->mact->OldValue) ?>">
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final->RowType == ROWTYPE_EDIT) { // Edit record ?>
<input type="text" data-table="bhld_view_chungtu_danhan_final" data-field="x_mact" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mact" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mact" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->mact->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_final_grid->mact->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_final_grid->mact->editAttributes() ?>>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_mact" name="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mact" id="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->mact->OldValue != null ? $bhld_view_chungtu_danhan_final_grid->mact->OldValue : $bhld_view_chungtu_danhan_final_grid->mact->CurrentValue) ?>">
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_final_grid->RowCount ?>_bhld_view_chungtu_danhan_final_mact">
<span<?php echo $bhld_view_chungtu_danhan_final_grid->mact->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_final_grid->mact->getViewValue() ?></span>
</span>
<?php if (!$bhld_view_chungtu_danhan_final->isConfirm()) { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_mact" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mact" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->mact->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_mact" name="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mact" id="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->mact->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_mact" name="fbhld_view_chungtu_danhan_finalgrid$x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mact" id="fbhld_view_chungtu_danhan_finalgrid$x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->mact->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_mact" name="fbhld_view_chungtu_danhan_finalgrid$o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mact" id="fbhld_view_chungtu_danhan_finalgrid$o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->mact->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_final_grid->mavt->Visible) { // mavt ?>
		<td data-name="mavt" <?php echo $bhld_view_chungtu_danhan_final_grid->mavt->cellAttributes() ?>>
<?php if ($bhld_view_chungtu_danhan_final->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_final_grid->RowCount ?>_bhld_view_chungtu_danhan_final_mavt" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="bhld_view_chungtu_danhan_final" data-field="x_mavt" data-value-separator="<?php echo $bhld_view_chungtu_danhan_final_grid->mavt->displayValueSeparatorAttribute() ?>" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mavt" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mavt"<?php echo $bhld_view_chungtu_danhan_final_grid->mavt->editAttributes() ?>>
			<?php echo $bhld_view_chungtu_danhan_final_grid->mavt->selectOptionListHtml("x{$bhld_view_chungtu_danhan_final_grid->RowIndex}_mavt") ?>
		</select>
</div>
<?php echo $bhld_view_chungtu_danhan_final_grid->mavt->Lookup->getParamTag($bhld_view_chungtu_danhan_final_grid, "p_x" . $bhld_view_chungtu_danhan_final_grid->RowIndex . "_mavt") ?>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_mavt" name="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mavt" id="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->mavt->OldValue) ?>">
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final->RowType == ROWTYPE_EDIT) { // Edit record ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="bhld_view_chungtu_danhan_final" data-field="x_mavt" data-value-separator="<?php echo $bhld_view_chungtu_danhan_final_grid->mavt->displayValueSeparatorAttribute() ?>" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mavt" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mavt"<?php echo $bhld_view_chungtu_danhan_final_grid->mavt->editAttributes() ?>>
			<?php echo $bhld_view_chungtu_danhan_final_grid->mavt->selectOptionListHtml("x{$bhld_view_chungtu_danhan_final_grid->RowIndex}_mavt") ?>
		</select>
</div>
<?php echo $bhld_view_chungtu_danhan_final_grid->mavt->Lookup->getParamTag($bhld_view_chungtu_danhan_final_grid, "p_x" . $bhld_view_chungtu_danhan_final_grid->RowIndex . "_mavt") ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_mavt" name="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mavt" id="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->mavt->OldValue != null ? $bhld_view_chungtu_danhan_final_grid->mavt->OldValue : $bhld_view_chungtu_danhan_final_grid->mavt->CurrentValue) ?>">
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_final_grid->RowCount ?>_bhld_view_chungtu_danhan_final_mavt">
<span<?php echo $bhld_view_chungtu_danhan_final_grid->mavt->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_final_grid->mavt->getViewValue() ?></span>
</span>
<?php if (!$bhld_view_chungtu_danhan_final->isConfirm()) { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_mavt" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mavt" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->mavt->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_mavt" name="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mavt" id="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->mavt->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_mavt" name="fbhld_view_chungtu_danhan_finalgrid$x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mavt" id="fbhld_view_chungtu_danhan_finalgrid$x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->mavt->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_mavt" name="fbhld_view_chungtu_danhan_finalgrid$o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mavt" id="fbhld_view_chungtu_danhan_finalgrid$o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->mavt->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_final_grid->ngnhan->Visible) { // ngnhan ?>
		<td data-name="ngnhan" <?php echo $bhld_view_chungtu_danhan_final_grid->ngnhan->cellAttributes() ?>>
<?php if ($bhld_view_chungtu_danhan_final->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_final_grid->RowCount ?>_bhld_view_chungtu_danhan_final_ngnhan" class="form-group">
<input type="text" data-table="bhld_view_chungtu_danhan_final" data-field="x_ngnhan" data-format="7" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan" maxlength="10" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->ngnhan->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_final_grid->ngnhan->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_final_grid->ngnhan->editAttributes() ?>>
<?php if (!$bhld_view_chungtu_danhan_final_grid->ngnhan->ReadOnly && !$bhld_view_chungtu_danhan_final_grid->ngnhan->Disabled && !isset($bhld_view_chungtu_danhan_final_grid->ngnhan->EditAttrs["readonly"]) && !isset($bhld_view_chungtu_danhan_final_grid->ngnhan->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbhld_view_chungtu_danhan_finalgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fbhld_view_chungtu_danhan_finalgrid", "x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_ngnhan" name="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan" id="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->ngnhan->OldValue) ?>">
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_final_grid->RowCount ?>_bhld_view_chungtu_danhan_final_ngnhan" class="form-group">
<input type="text" data-table="bhld_view_chungtu_danhan_final" data-field="x_ngnhan" data-format="7" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan" maxlength="10" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->ngnhan->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_final_grid->ngnhan->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_final_grid->ngnhan->editAttributes() ?>>
<?php if (!$bhld_view_chungtu_danhan_final_grid->ngnhan->ReadOnly && !$bhld_view_chungtu_danhan_final_grid->ngnhan->Disabled && !isset($bhld_view_chungtu_danhan_final_grid->ngnhan->EditAttrs["readonly"]) && !isset($bhld_view_chungtu_danhan_final_grid->ngnhan->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbhld_view_chungtu_danhan_finalgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fbhld_view_chungtu_danhan_finalgrid", "x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_final_grid->RowCount ?>_bhld_view_chungtu_danhan_final_ngnhan">
<span<?php echo $bhld_view_chungtu_danhan_final_grid->ngnhan->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_final_grid->ngnhan->getViewValue() ?></span>
</span>
<?php if (!$bhld_view_chungtu_danhan_final->isConfirm()) { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_ngnhan" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->ngnhan->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_ngnhan" name="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan" id="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->ngnhan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_ngnhan" name="fbhld_view_chungtu_danhan_finalgrid$x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan" id="fbhld_view_chungtu_danhan_finalgrid$x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->ngnhan->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_ngnhan" name="fbhld_view_chungtu_danhan_finalgrid$o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan" id="fbhld_view_chungtu_danhan_finalgrid$o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->ngnhan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_final_grid->ngnhantt->Visible) { // ngnhantt ?>
		<td data-name="ngnhantt" <?php echo $bhld_view_chungtu_danhan_final_grid->ngnhantt->cellAttributes() ?>>
<?php if ($bhld_view_chungtu_danhan_final->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_final_grid->RowCount ?>_bhld_view_chungtu_danhan_final_ngnhantt" class="form-group">
<input type="text" data-table="bhld_view_chungtu_danhan_final" data-field="x_ngnhantt" data-format="7" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt" maxlength="10" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->ngnhantt->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_final_grid->ngnhantt->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_final_grid->ngnhantt->editAttributes() ?>>
<?php if (!$bhld_view_chungtu_danhan_final_grid->ngnhantt->ReadOnly && !$bhld_view_chungtu_danhan_final_grid->ngnhantt->Disabled && !isset($bhld_view_chungtu_danhan_final_grid->ngnhantt->EditAttrs["readonly"]) && !isset($bhld_view_chungtu_danhan_final_grid->ngnhantt->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbhld_view_chungtu_danhan_finalgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fbhld_view_chungtu_danhan_finalgrid", "x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_ngnhantt" name="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt" id="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->ngnhantt->OldValue) ?>">
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_final_grid->RowCount ?>_bhld_view_chungtu_danhan_final_ngnhantt" class="form-group">
<input type="text" data-table="bhld_view_chungtu_danhan_final" data-field="x_ngnhantt" data-format="7" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt" maxlength="10" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->ngnhantt->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_final_grid->ngnhantt->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_final_grid->ngnhantt->editAttributes() ?>>
<?php if (!$bhld_view_chungtu_danhan_final_grid->ngnhantt->ReadOnly && !$bhld_view_chungtu_danhan_final_grid->ngnhantt->Disabled && !isset($bhld_view_chungtu_danhan_final_grid->ngnhantt->EditAttrs["readonly"]) && !isset($bhld_view_chungtu_danhan_final_grid->ngnhantt->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbhld_view_chungtu_danhan_finalgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fbhld_view_chungtu_danhan_finalgrid", "x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_final_grid->RowCount ?>_bhld_view_chungtu_danhan_final_ngnhantt">
<span<?php echo $bhld_view_chungtu_danhan_final_grid->ngnhantt->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_final_grid->ngnhantt->getViewValue() ?></span>
</span>
<?php if (!$bhld_view_chungtu_danhan_final->isConfirm()) { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_ngnhantt" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->ngnhantt->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_ngnhantt" name="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt" id="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->ngnhantt->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_ngnhantt" name="fbhld_view_chungtu_danhan_finalgrid$x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt" id="fbhld_view_chungtu_danhan_finalgrid$x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->ngnhantt->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_ngnhantt" name="fbhld_view_chungtu_danhan_finalgrid$o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt" id="fbhld_view_chungtu_danhan_finalgrid$o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->ngnhantt->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_final_grid->dmtg->Visible) { // dmtg ?>
		<td data-name="dmtg" <?php echo $bhld_view_chungtu_danhan_final_grid->dmtg->cellAttributes() ?>>
<?php if ($bhld_view_chungtu_danhan_final->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_final_grid->RowCount ?>_bhld_view_chungtu_danhan_final_dmtg" class="form-group">
<input type="text" data-table="bhld_view_chungtu_danhan_final" data-field="x_dmtg" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_dmtg" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_dmtg" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->dmtg->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_final_grid->dmtg->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_final_grid->dmtg->editAttributes() ?>>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_dmtg" name="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_dmtg" id="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_dmtg" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->dmtg->OldValue) ?>">
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_final_grid->RowCount ?>_bhld_view_chungtu_danhan_final_dmtg" class="form-group">
<input type="text" data-table="bhld_view_chungtu_danhan_final" data-field="x_dmtg" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_dmtg" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_dmtg" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->dmtg->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_final_grid->dmtg->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_final_grid->dmtg->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_final_grid->RowCount ?>_bhld_view_chungtu_danhan_final_dmtg">
<span<?php echo $bhld_view_chungtu_danhan_final_grid->dmtg->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_final_grid->dmtg->getViewValue() ?></span>
</span>
<?php if (!$bhld_view_chungtu_danhan_final->isConfirm()) { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_dmtg" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_dmtg" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_dmtg" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->dmtg->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_dmtg" name="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_dmtg" id="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_dmtg" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->dmtg->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_dmtg" name="fbhld_view_chungtu_danhan_finalgrid$x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_dmtg" id="fbhld_view_chungtu_danhan_finalgrid$x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_dmtg" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->dmtg->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_dmtg" name="fbhld_view_chungtu_danhan_finalgrid$o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_dmtg" id="fbhld_view_chungtu_danhan_finalgrid$o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_dmtg" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->dmtg->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_final_grid->sl->Visible) { // sl ?>
		<td data-name="sl" <?php echo $bhld_view_chungtu_danhan_final_grid->sl->cellAttributes() ?>>
<?php if ($bhld_view_chungtu_danhan_final->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_final_grid->RowCount ?>_bhld_view_chungtu_danhan_final_sl" class="form-group">
<input type="text" data-table="bhld_view_chungtu_danhan_final" data-field="x_sl" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_sl" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_sl" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->sl->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_final_grid->sl->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_final_grid->sl->editAttributes() ?>>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_sl" name="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_sl" id="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_sl" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->sl->OldValue) ?>">
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_final_grid->RowCount ?>_bhld_view_chungtu_danhan_final_sl" class="form-group">
<input type="text" data-table="bhld_view_chungtu_danhan_final" data-field="x_sl" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_sl" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_sl" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->sl->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_final_grid->sl->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_final_grid->sl->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_final_grid->RowCount ?>_bhld_view_chungtu_danhan_final_sl">
<span<?php echo $bhld_view_chungtu_danhan_final_grid->sl->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_final_grid->sl->getViewValue() ?></span>
</span>
<?php if (!$bhld_view_chungtu_danhan_final->isConfirm()) { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_sl" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_sl" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_sl" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->sl->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_sl" name="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_sl" id="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_sl" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->sl->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_sl" name="fbhld_view_chungtu_danhan_finalgrid$x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_sl" id="fbhld_view_chungtu_danhan_finalgrid$x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_sl" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->sl->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_sl" name="fbhld_view_chungtu_danhan_finalgrid$o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_sl" id="fbhld_view_chungtu_danhan_finalgrid$o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_sl" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->sl->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bhld_view_chungtu_danhan_final_grid->ListOptions->render("body", "right", $bhld_view_chungtu_danhan_final_grid->RowCount);
?>
	</tr>
<?php if ($bhld_view_chungtu_danhan_final->RowType == ROWTYPE_ADD || $bhld_view_chungtu_danhan_final->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fbhld_view_chungtu_danhan_finalgrid", "load"], function() {
	fbhld_view_chungtu_danhan_finalgrid.updateLists(<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$bhld_view_chungtu_danhan_final_grid->isGridAdd() || $bhld_view_chungtu_danhan_final->CurrentMode == "copy")
		if (!$bhld_view_chungtu_danhan_final_grid->Recordset->EOF)
			$bhld_view_chungtu_danhan_final_grid->Recordset->moveNext();
}
?>
<?php
	if ($bhld_view_chungtu_danhan_final->CurrentMode == "add" || $bhld_view_chungtu_danhan_final->CurrentMode == "copy" || $bhld_view_chungtu_danhan_final->CurrentMode == "edit") {
		$bhld_view_chungtu_danhan_final_grid->RowIndex = '$rowindex$';
		$bhld_view_chungtu_danhan_final_grid->loadRowValues();

		// Set row properties
		$bhld_view_chungtu_danhan_final->resetAttributes();
		$bhld_view_chungtu_danhan_final->RowAttrs->merge(["data-rowindex" => $bhld_view_chungtu_danhan_final_grid->RowIndex, "id" => "r0_bhld_view_chungtu_danhan_final", "data-rowtype" => ROWTYPE_ADD]);
		$bhld_view_chungtu_danhan_final->RowAttrs->appendClass("ew-template");
		$bhld_view_chungtu_danhan_final->RowType = ROWTYPE_ADD;

		// Render row
		$bhld_view_chungtu_danhan_final_grid->renderRow();

		// Render list options
		$bhld_view_chungtu_danhan_final_grid->renderListOptions();
		$bhld_view_chungtu_danhan_final_grid->StartRowCount = 0;
?>
	<tr <?php echo $bhld_view_chungtu_danhan_final->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bhld_view_chungtu_danhan_final_grid->ListOptions->render("body", "left", $bhld_view_chungtu_danhan_final_grid->RowIndex);
?>
	<?php if ($bhld_view_chungtu_danhan_final_grid->mact->Visible) { // mact ?>
		<td data-name="mact">
<?php if (!$bhld_view_chungtu_danhan_final->isConfirm()) { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_final_mact" class="form-group bhld_view_chungtu_danhan_final_mact">
<input type="text" data-table="bhld_view_chungtu_danhan_final" data-field="x_mact" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mact" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mact" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->mact->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_final_grid->mact->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_final_grid->mact->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_final_mact" class="form-group bhld_view_chungtu_danhan_final_mact">
<span<?php echo $bhld_view_chungtu_danhan_final_grid->mact->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_view_chungtu_danhan_final_grid->mact->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_mact" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mact" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->mact->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_mact" name="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mact" id="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->mact->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_final_grid->mavt->Visible) { // mavt ?>
		<td data-name="mavt">
<?php if (!$bhld_view_chungtu_danhan_final->isConfirm()) { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_final_mavt" class="form-group bhld_view_chungtu_danhan_final_mavt">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="bhld_view_chungtu_danhan_final" data-field="x_mavt" data-value-separator="<?php echo $bhld_view_chungtu_danhan_final_grid->mavt->displayValueSeparatorAttribute() ?>" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mavt" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mavt"<?php echo $bhld_view_chungtu_danhan_final_grid->mavt->editAttributes() ?>>
			<?php echo $bhld_view_chungtu_danhan_final_grid->mavt->selectOptionListHtml("x{$bhld_view_chungtu_danhan_final_grid->RowIndex}_mavt") ?>
		</select>
</div>
<?php echo $bhld_view_chungtu_danhan_final_grid->mavt->Lookup->getParamTag($bhld_view_chungtu_danhan_final_grid, "p_x" . $bhld_view_chungtu_danhan_final_grid->RowIndex . "_mavt") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_final_mavt" class="form-group bhld_view_chungtu_danhan_final_mavt">
<span<?php echo $bhld_view_chungtu_danhan_final_grid->mavt->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_view_chungtu_danhan_final_grid->mavt->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_mavt" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mavt" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->mavt->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_mavt" name="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mavt" id="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->mavt->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_final_grid->ngnhan->Visible) { // ngnhan ?>
		<td data-name="ngnhan">
<?php if (!$bhld_view_chungtu_danhan_final->isConfirm()) { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_final_ngnhan" class="form-group bhld_view_chungtu_danhan_final_ngnhan">
<input type="text" data-table="bhld_view_chungtu_danhan_final" data-field="x_ngnhan" data-format="7" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan" maxlength="10" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->ngnhan->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_final_grid->ngnhan->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_final_grid->ngnhan->editAttributes() ?>>
<?php if (!$bhld_view_chungtu_danhan_final_grid->ngnhan->ReadOnly && !$bhld_view_chungtu_danhan_final_grid->ngnhan->Disabled && !isset($bhld_view_chungtu_danhan_final_grid->ngnhan->EditAttrs["readonly"]) && !isset($bhld_view_chungtu_danhan_final_grid->ngnhan->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbhld_view_chungtu_danhan_finalgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fbhld_view_chungtu_danhan_finalgrid", "x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_final_ngnhan" class="form-group bhld_view_chungtu_danhan_final_ngnhan">
<span<?php echo $bhld_view_chungtu_danhan_final_grid->ngnhan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_view_chungtu_danhan_final_grid->ngnhan->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_ngnhan" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->ngnhan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_ngnhan" name="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan" id="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhan" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->ngnhan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_final_grid->ngnhantt->Visible) { // ngnhantt ?>
		<td data-name="ngnhantt">
<?php if (!$bhld_view_chungtu_danhan_final->isConfirm()) { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_final_ngnhantt" class="form-group bhld_view_chungtu_danhan_final_ngnhantt">
<input type="text" data-table="bhld_view_chungtu_danhan_final" data-field="x_ngnhantt" data-format="7" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt" maxlength="10" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->ngnhantt->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_final_grid->ngnhantt->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_final_grid->ngnhantt->editAttributes() ?>>
<?php if (!$bhld_view_chungtu_danhan_final_grid->ngnhantt->ReadOnly && !$bhld_view_chungtu_danhan_final_grid->ngnhantt->Disabled && !isset($bhld_view_chungtu_danhan_final_grid->ngnhantt->EditAttrs["readonly"]) && !isset($bhld_view_chungtu_danhan_final_grid->ngnhantt->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbhld_view_chungtu_danhan_finalgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fbhld_view_chungtu_danhan_finalgrid", "x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_final_ngnhantt" class="form-group bhld_view_chungtu_danhan_final_ngnhantt">
<span<?php echo $bhld_view_chungtu_danhan_final_grid->ngnhantt->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_view_chungtu_danhan_final_grid->ngnhantt->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_ngnhantt" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->ngnhantt->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_ngnhantt" name="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt" id="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_ngnhantt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->ngnhantt->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_final_grid->dmtg->Visible) { // dmtg ?>
		<td data-name="dmtg">
<?php if (!$bhld_view_chungtu_danhan_final->isConfirm()) { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_final_dmtg" class="form-group bhld_view_chungtu_danhan_final_dmtg">
<input type="text" data-table="bhld_view_chungtu_danhan_final" data-field="x_dmtg" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_dmtg" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_dmtg" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->dmtg->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_final_grid->dmtg->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_final_grid->dmtg->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_final_dmtg" class="form-group bhld_view_chungtu_danhan_final_dmtg">
<span<?php echo $bhld_view_chungtu_danhan_final_grid->dmtg->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_view_chungtu_danhan_final_grid->dmtg->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_dmtg" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_dmtg" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_dmtg" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->dmtg->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_dmtg" name="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_dmtg" id="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_dmtg" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->dmtg->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_final_grid->sl->Visible) { // sl ?>
		<td data-name="sl">
<?php if (!$bhld_view_chungtu_danhan_final->isConfirm()) { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_final_sl" class="form-group bhld_view_chungtu_danhan_final_sl">
<input type="text" data-table="bhld_view_chungtu_danhan_final" data-field="x_sl" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_sl" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_sl" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->sl->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_final_grid->sl->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_final_grid->sl->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_final_sl" class="form-group bhld_view_chungtu_danhan_final_sl">
<span<?php echo $bhld_view_chungtu_danhan_final_grid->sl->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_view_chungtu_danhan_final_grid->sl->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_sl" name="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_sl" id="x<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_sl" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->sl->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_final" data-field="x_sl" name="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_sl" id="o<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>_sl" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_grid->sl->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bhld_view_chungtu_danhan_final_grid->ListOptions->render("body", "right", $bhld_view_chungtu_danhan_final_grid->RowIndex);
?>
<script>
loadjs.ready(["fbhld_view_chungtu_danhan_finalgrid", "load"], function() {
	fbhld_view_chungtu_danhan_finalgrid.updateLists(<?php echo $bhld_view_chungtu_danhan_final_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($bhld_view_chungtu_danhan_final->CurrentMode == "add" || $bhld_view_chungtu_danhan_final->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $bhld_view_chungtu_danhan_final_grid->FormKeyCountName ?>" id="<?php echo $bhld_view_chungtu_danhan_final_grid->FormKeyCountName ?>" value="<?php echo $bhld_view_chungtu_danhan_final_grid->KeyCount ?>">
<?php echo $bhld_view_chungtu_danhan_final_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $bhld_view_chungtu_danhan_final_grid->FormKeyCountName ?>" id="<?php echo $bhld_view_chungtu_danhan_final_grid->FormKeyCountName ?>" value="<?php echo $bhld_view_chungtu_danhan_final_grid->KeyCount ?>">
<?php echo $bhld_view_chungtu_danhan_final_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fbhld_view_chungtu_danhan_finalgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($bhld_view_chungtu_danhan_final_grid->Recordset)
	$bhld_view_chungtu_danhan_final_grid->Recordset->Close();
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final_grid->TotalRecords == 0 && !$bhld_view_chungtu_danhan_final->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $bhld_view_chungtu_danhan_final_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$bhld_view_chungtu_danhan_final_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$bhld_view_chungtu_danhan_final_grid->terminate();
?>
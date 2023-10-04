<?php
namespace PHPMaker2020\projectBHLD;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($bhld_ctu_grid))
	$bhld_ctu_grid = new bhld_ctu_grid();

// Run the page
$bhld_ctu_grid->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_ctu_grid->Page_Render();
?>
<?php if (!$bhld_ctu_grid->isExport()) { ?>
<script>
var fbhld_ctugrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fbhld_ctugrid = new ew.Form("fbhld_ctugrid", "grid");
	fbhld_ctugrid.formKeyCountName = '<?php echo $bhld_ctu_grid->FormKeyCountName ?>';

	// Validate form
	fbhld_ctugrid.validate = function() {
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
			<?php if ($bhld_ctu_grid->mact->Required) { ?>
				elm = this.getElements("x" + infix + "_mact");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctu_grid->mact->caption(), $bhld_ctu_grid->mact->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_ctu_grid->manv->Required) { ?>
				elm = this.getElements("x" + infix + "_manv");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctu_grid->manv->caption(), $bhld_ctu_grid->manv->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_manv");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_ctu_grid->manv->errorMessage()) ?>");
			<?php if ($bhld_ctu_grid->ngct->Required) { ?>
				elm = this.getElements("x" + infix + "_ngct");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctu_grid->ngct->caption(), $bhld_ctu_grid->ngct->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ngct");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_ctu_grid->ngct->errorMessage()) ?>");
			<?php if ($bhld_ctu_grid->mapb->Required) { ?>
				elm = this.getElements("x" + infix + "_mapb");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctu_grid->mapb->caption(), $bhld_ctu_grid->mapb->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_ctu_grid->ghichu->Required) { ?>
				elm = this.getElements("x" + infix + "_ghichu");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctu_grid->ghichu->caption(), $bhld_ctu_grid->ghichu->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_ctu_grid->madm->Required) { ?>
				elm = this.getElements("x" + infix + "_madm");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctu_grid->madm->caption(), $bhld_ctu_grid->madm->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fbhld_ctugrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "mact", false)) return false;
		if (ew.valueChanged(fobj, infix, "manv", false)) return false;
		if (ew.valueChanged(fobj, infix, "ngct", false)) return false;
		if (ew.valueChanged(fobj, infix, "mapb", false)) return false;
		if (ew.valueChanged(fobj, infix, "ghichu", false)) return false;
		if (ew.valueChanged(fobj, infix, "madm", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fbhld_ctugrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbhld_ctugrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fbhld_ctugrid");
});
</script>
<?php } ?>
<?php
$bhld_ctu_grid->renderOtherOptions();
?>
<?php if ($bhld_ctu_grid->TotalRecords > 0 || $bhld_ctu->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($bhld_ctu_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> bhld_ctu">
<div id="fbhld_ctugrid" class="ew-form ew-list-form form-inline">
<div id="gmp_bhld_ctu" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_bhld_ctugrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$bhld_ctu->RowType = ROWTYPE_HEADER;

// Render list options
$bhld_ctu_grid->renderListOptions();

// Render list options (header, left)
$bhld_ctu_grid->ListOptions->render("header", "left");
?>
<?php if ($bhld_ctu_grid->mact->Visible) { // mact ?>
	<?php if ($bhld_ctu_grid->SortUrl($bhld_ctu_grid->mact) == "") { ?>
		<th data-name="mact" class="<?php echo $bhld_ctu_grid->mact->headerCellClass() ?>"><div id="elh_bhld_ctu_mact" class="bhld_ctu_mact"><div class="ew-table-header-caption"><?php echo $bhld_ctu_grid->mact->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mact" class="<?php echo $bhld_ctu_grid->mact->headerCellClass() ?>"><div><div id="elh_bhld_ctu_mact" class="bhld_ctu_mact">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctu_grid->mact->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctu_grid->mact->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctu_grid->mact->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_ctu_grid->manv->Visible) { // manv ?>
	<?php if ($bhld_ctu_grid->SortUrl($bhld_ctu_grid->manv) == "") { ?>
		<th data-name="manv" class="<?php echo $bhld_ctu_grid->manv->headerCellClass() ?>"><div id="elh_bhld_ctu_manv" class="bhld_ctu_manv"><div class="ew-table-header-caption"><?php echo $bhld_ctu_grid->manv->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="manv" class="<?php echo $bhld_ctu_grid->manv->headerCellClass() ?>"><div><div id="elh_bhld_ctu_manv" class="bhld_ctu_manv">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctu_grid->manv->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctu_grid->manv->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctu_grid->manv->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_ctu_grid->ngct->Visible) { // ngct ?>
	<?php if ($bhld_ctu_grid->SortUrl($bhld_ctu_grid->ngct) == "") { ?>
		<th data-name="ngct" class="<?php echo $bhld_ctu_grid->ngct->headerCellClass() ?>"><div id="elh_bhld_ctu_ngct" class="bhld_ctu_ngct"><div class="ew-table-header-caption"><?php echo $bhld_ctu_grid->ngct->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ngct" class="<?php echo $bhld_ctu_grid->ngct->headerCellClass() ?>"><div><div id="elh_bhld_ctu_ngct" class="bhld_ctu_ngct">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctu_grid->ngct->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctu_grid->ngct->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctu_grid->ngct->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_ctu_grid->mapb->Visible) { // mapb ?>
	<?php if ($bhld_ctu_grid->SortUrl($bhld_ctu_grid->mapb) == "") { ?>
		<th data-name="mapb" class="<?php echo $bhld_ctu_grid->mapb->headerCellClass() ?>"><div id="elh_bhld_ctu_mapb" class="bhld_ctu_mapb"><div class="ew-table-header-caption"><?php echo $bhld_ctu_grid->mapb->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mapb" class="<?php echo $bhld_ctu_grid->mapb->headerCellClass() ?>"><div><div id="elh_bhld_ctu_mapb" class="bhld_ctu_mapb">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctu_grid->mapb->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctu_grid->mapb->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctu_grid->mapb->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_ctu_grid->ghichu->Visible) { // ghichu ?>
	<?php if ($bhld_ctu_grid->SortUrl($bhld_ctu_grid->ghichu) == "") { ?>
		<th data-name="ghichu" class="<?php echo $bhld_ctu_grid->ghichu->headerCellClass() ?>"><div id="elh_bhld_ctu_ghichu" class="bhld_ctu_ghichu"><div class="ew-table-header-caption"><?php echo $bhld_ctu_grid->ghichu->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ghichu" class="<?php echo $bhld_ctu_grid->ghichu->headerCellClass() ?>"><div><div id="elh_bhld_ctu_ghichu" class="bhld_ctu_ghichu">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctu_grid->ghichu->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctu_grid->ghichu->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctu_grid->ghichu->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_ctu_grid->madm->Visible) { // madm ?>
	<?php if ($bhld_ctu_grid->SortUrl($bhld_ctu_grid->madm) == "") { ?>
		<th data-name="madm" class="<?php echo $bhld_ctu_grid->madm->headerCellClass() ?>"><div id="elh_bhld_ctu_madm" class="bhld_ctu_madm"><div class="ew-table-header-caption"><?php echo $bhld_ctu_grid->madm->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="madm" class="<?php echo $bhld_ctu_grid->madm->headerCellClass() ?>"><div><div id="elh_bhld_ctu_madm" class="bhld_ctu_madm">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctu_grid->madm->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctu_grid->madm->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctu_grid->madm->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$bhld_ctu_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$bhld_ctu_grid->StartRecord = 1;
$bhld_ctu_grid->StopRecord = $bhld_ctu_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($bhld_ctu->isConfirm() || $bhld_ctu_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($bhld_ctu_grid->FormKeyCountName) && ($bhld_ctu_grid->isGridAdd() || $bhld_ctu_grid->isGridEdit() || $bhld_ctu->isConfirm())) {
		$bhld_ctu_grid->KeyCount = $CurrentForm->getValue($bhld_ctu_grid->FormKeyCountName);
		$bhld_ctu_grid->StopRecord = $bhld_ctu_grid->StartRecord + $bhld_ctu_grid->KeyCount - 1;
	}
}
$bhld_ctu_grid->RecordCount = $bhld_ctu_grid->StartRecord - 1;
if ($bhld_ctu_grid->Recordset && !$bhld_ctu_grid->Recordset->EOF) {
	$bhld_ctu_grid->Recordset->moveFirst();
	$selectLimit = $bhld_ctu_grid->UseSelectLimit;
	if (!$selectLimit && $bhld_ctu_grid->StartRecord > 1)
		$bhld_ctu_grid->Recordset->move($bhld_ctu_grid->StartRecord - 1);
} elseif (!$bhld_ctu->AllowAddDeleteRow && $bhld_ctu_grid->StopRecord == 0) {
	$bhld_ctu_grid->StopRecord = $bhld_ctu->GridAddRowCount;
}

// Initialize aggregate
$bhld_ctu->RowType = ROWTYPE_AGGREGATEINIT;
$bhld_ctu->resetAttributes();
$bhld_ctu_grid->renderRow();
if ($bhld_ctu_grid->isGridAdd())
	$bhld_ctu_grid->RowIndex = 0;
if ($bhld_ctu_grid->isGridEdit())
	$bhld_ctu_grid->RowIndex = 0;
while ($bhld_ctu_grid->RecordCount < $bhld_ctu_grid->StopRecord) {
	$bhld_ctu_grid->RecordCount++;
	if ($bhld_ctu_grid->RecordCount >= $bhld_ctu_grid->StartRecord) {
		$bhld_ctu_grid->RowCount++;
		if ($bhld_ctu_grid->isGridAdd() || $bhld_ctu_grid->isGridEdit() || $bhld_ctu->isConfirm()) {
			$bhld_ctu_grid->RowIndex++;
			$CurrentForm->Index = $bhld_ctu_grid->RowIndex;
			if ($CurrentForm->hasValue($bhld_ctu_grid->FormActionName) && ($bhld_ctu->isConfirm() || $bhld_ctu_grid->EventCancelled))
				$bhld_ctu_grid->RowAction = strval($CurrentForm->getValue($bhld_ctu_grid->FormActionName));
			elseif ($bhld_ctu_grid->isGridAdd())
				$bhld_ctu_grid->RowAction = "insert";
			else
				$bhld_ctu_grid->RowAction = "";
		}

		// Set up key count
		$bhld_ctu_grid->KeyCount = $bhld_ctu_grid->RowIndex;

		// Init row class and style
		$bhld_ctu->resetAttributes();
		$bhld_ctu->CssClass = "";
		if ($bhld_ctu_grid->isGridAdd()) {
			if ($bhld_ctu->CurrentMode == "copy") {
				$bhld_ctu_grid->loadRowValues($bhld_ctu_grid->Recordset); // Load row values
				$bhld_ctu_grid->setRecordKey($bhld_ctu_grid->RowOldKey, $bhld_ctu_grid->Recordset); // Set old record key
			} else {
				$bhld_ctu_grid->loadRowValues(); // Load default values
				$bhld_ctu_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$bhld_ctu_grid->loadRowValues($bhld_ctu_grid->Recordset); // Load row values
		}
		$bhld_ctu->RowType = ROWTYPE_VIEW; // Render view
		if ($bhld_ctu_grid->isGridAdd()) // Grid add
			$bhld_ctu->RowType = ROWTYPE_ADD; // Render add
		if ($bhld_ctu_grid->isGridAdd() && $bhld_ctu->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$bhld_ctu_grid->restoreCurrentRowFormValues($bhld_ctu_grid->RowIndex); // Restore form values
		if ($bhld_ctu_grid->isGridEdit()) { // Grid edit
			if ($bhld_ctu->EventCancelled)
				$bhld_ctu_grid->restoreCurrentRowFormValues($bhld_ctu_grid->RowIndex); // Restore form values
			if ($bhld_ctu_grid->RowAction == "insert")
				$bhld_ctu->RowType = ROWTYPE_ADD; // Render add
			else
				$bhld_ctu->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($bhld_ctu_grid->isGridEdit() && ($bhld_ctu->RowType == ROWTYPE_EDIT || $bhld_ctu->RowType == ROWTYPE_ADD) && $bhld_ctu->EventCancelled) // Update failed
			$bhld_ctu_grid->restoreCurrentRowFormValues($bhld_ctu_grid->RowIndex); // Restore form values
		if ($bhld_ctu->RowType == ROWTYPE_EDIT) // Edit row
			$bhld_ctu_grid->EditRowCount++;
		if ($bhld_ctu->isConfirm()) // Confirm row
			$bhld_ctu_grid->restoreCurrentRowFormValues($bhld_ctu_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$bhld_ctu->RowAttrs->merge(["data-rowindex" => $bhld_ctu_grid->RowCount, "id" => "r" . $bhld_ctu_grid->RowCount . "_bhld_ctu", "data-rowtype" => $bhld_ctu->RowType]);

		// Render row
		$bhld_ctu_grid->renderRow();

		// Render list options
		$bhld_ctu_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($bhld_ctu_grid->RowAction != "delete" && $bhld_ctu_grid->RowAction != "insertdelete" && !($bhld_ctu_grid->RowAction == "insert" && $bhld_ctu->isConfirm() && $bhld_ctu_grid->emptyRow())) {
?>
	<tr <?php echo $bhld_ctu->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bhld_ctu_grid->ListOptions->render("body", "left", $bhld_ctu_grid->RowCount);
?>
	<?php if ($bhld_ctu_grid->mact->Visible) { // mact ?>
		<td data-name="mact" <?php echo $bhld_ctu_grid->mact->cellAttributes() ?>>
<?php if ($bhld_ctu->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_ctu_grid->RowCount ?>_bhld_ctu_mact" class="form-group">
<input type="text" data-table="bhld_ctu" data-field="x_mact" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_mact" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_mact" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctu_grid->mact->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_grid->mact->EditValue ?>"<?php echo $bhld_ctu_grid->mact->editAttributes() ?>>
</span>
<input type="hidden" data-table="bhld_ctu" data-field="x_mact" name="o<?php echo $bhld_ctu_grid->RowIndex ?>_mact" id="o<?php echo $bhld_ctu_grid->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_ctu_grid->mact->OldValue) ?>">
<?php } ?>
<?php if ($bhld_ctu->RowType == ROWTYPE_EDIT) { // Edit record ?>
<input type="text" data-table="bhld_ctu" data-field="x_mact" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_mact" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_mact" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctu_grid->mact->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_grid->mact->EditValue ?>"<?php echo $bhld_ctu_grid->mact->editAttributes() ?>>
<input type="hidden" data-table="bhld_ctu" data-field="x_mact" name="o<?php echo $bhld_ctu_grid->RowIndex ?>_mact" id="o<?php echo $bhld_ctu_grid->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_ctu_grid->mact->OldValue != null ? $bhld_ctu_grid->mact->OldValue : $bhld_ctu_grid->mact->CurrentValue) ?>">
<?php } ?>
<?php if ($bhld_ctu->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_ctu_grid->RowCount ?>_bhld_ctu_mact">
<span<?php echo $bhld_ctu_grid->mact->viewAttributes() ?>><?php echo $bhld_ctu_grid->mact->getViewValue() ?></span>
</span>
<?php if (!$bhld_ctu->isConfirm()) { ?>
<input type="hidden" data-table="bhld_ctu" data-field="x_mact" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_mact" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_ctu_grid->mact->FormValue) ?>">
<input type="hidden" data-table="bhld_ctu" data-field="x_mact" name="o<?php echo $bhld_ctu_grid->RowIndex ?>_mact" id="o<?php echo $bhld_ctu_grid->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_ctu_grid->mact->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="bhld_ctu" data-field="x_mact" name="fbhld_ctugrid$x<?php echo $bhld_ctu_grid->RowIndex ?>_mact" id="fbhld_ctugrid$x<?php echo $bhld_ctu_grid->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_ctu_grid->mact->FormValue) ?>">
<input type="hidden" data-table="bhld_ctu" data-field="x_mact" name="fbhld_ctugrid$o<?php echo $bhld_ctu_grid->RowIndex ?>_mact" id="fbhld_ctugrid$o<?php echo $bhld_ctu_grid->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_ctu_grid->mact->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($bhld_ctu_grid->manv->Visible) { // manv ?>
		<td data-name="manv" <?php echo $bhld_ctu_grid->manv->cellAttributes() ?>>
<?php if ($bhld_ctu->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_ctu_grid->RowCount ?>_bhld_ctu_manv" class="form-group">
<input type="text" data-table="bhld_ctu" data-field="x_manv" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_manv" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_manv" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_ctu_grid->manv->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_grid->manv->EditValue ?>"<?php echo $bhld_ctu_grid->manv->editAttributes() ?>>
</span>
<input type="hidden" data-table="bhld_ctu" data-field="x_manv" name="o<?php echo $bhld_ctu_grid->RowIndex ?>_manv" id="o<?php echo $bhld_ctu_grid->RowIndex ?>_manv" value="<?php echo HtmlEncode($bhld_ctu_grid->manv->OldValue) ?>">
<?php } ?>
<?php if ($bhld_ctu->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $bhld_ctu_grid->RowCount ?>_bhld_ctu_manv" class="form-group">
<input type="text" data-table="bhld_ctu" data-field="x_manv" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_manv" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_manv" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_ctu_grid->manv->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_grid->manv->EditValue ?>"<?php echo $bhld_ctu_grid->manv->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($bhld_ctu->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_ctu_grid->RowCount ?>_bhld_ctu_manv">
<span<?php echo $bhld_ctu_grid->manv->viewAttributes() ?>><?php echo $bhld_ctu_grid->manv->getViewValue() ?></span>
</span>
<?php if (!$bhld_ctu->isConfirm()) { ?>
<input type="hidden" data-table="bhld_ctu" data-field="x_manv" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_manv" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_manv" value="<?php echo HtmlEncode($bhld_ctu_grid->manv->FormValue) ?>">
<input type="hidden" data-table="bhld_ctu" data-field="x_manv" name="o<?php echo $bhld_ctu_grid->RowIndex ?>_manv" id="o<?php echo $bhld_ctu_grid->RowIndex ?>_manv" value="<?php echo HtmlEncode($bhld_ctu_grid->manv->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="bhld_ctu" data-field="x_manv" name="fbhld_ctugrid$x<?php echo $bhld_ctu_grid->RowIndex ?>_manv" id="fbhld_ctugrid$x<?php echo $bhld_ctu_grid->RowIndex ?>_manv" value="<?php echo HtmlEncode($bhld_ctu_grid->manv->FormValue) ?>">
<input type="hidden" data-table="bhld_ctu" data-field="x_manv" name="fbhld_ctugrid$o<?php echo $bhld_ctu_grid->RowIndex ?>_manv" id="fbhld_ctugrid$o<?php echo $bhld_ctu_grid->RowIndex ?>_manv" value="<?php echo HtmlEncode($bhld_ctu_grid->manv->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($bhld_ctu_grid->ngct->Visible) { // ngct ?>
		<td data-name="ngct" <?php echo $bhld_ctu_grid->ngct->cellAttributes() ?>>
<?php if ($bhld_ctu->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_ctu_grid->RowCount ?>_bhld_ctu_ngct" class="form-group">
<input type="text" data-table="bhld_ctu" data-field="x_ngct" data-format="7" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_ngct" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_ngct" maxlength="10" placeholder="<?php echo HtmlEncode($bhld_ctu_grid->ngct->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_grid->ngct->EditValue ?>"<?php echo $bhld_ctu_grid->ngct->editAttributes() ?>>
<?php if (!$bhld_ctu_grid->ngct->ReadOnly && !$bhld_ctu_grid->ngct->Disabled && !isset($bhld_ctu_grid->ngct->EditAttrs["readonly"]) && !isset($bhld_ctu_grid->ngct->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbhld_ctugrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fbhld_ctugrid", "x<?php echo $bhld_ctu_grid->RowIndex ?>_ngct", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="bhld_ctu" data-field="x_ngct" name="o<?php echo $bhld_ctu_grid->RowIndex ?>_ngct" id="o<?php echo $bhld_ctu_grid->RowIndex ?>_ngct" value="<?php echo HtmlEncode($bhld_ctu_grid->ngct->OldValue) ?>">
<?php } ?>
<?php if ($bhld_ctu->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $bhld_ctu_grid->RowCount ?>_bhld_ctu_ngct" class="form-group">
<input type="text" data-table="bhld_ctu" data-field="x_ngct" data-format="7" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_ngct" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_ngct" maxlength="10" placeholder="<?php echo HtmlEncode($bhld_ctu_grid->ngct->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_grid->ngct->EditValue ?>"<?php echo $bhld_ctu_grid->ngct->editAttributes() ?>>
<?php if (!$bhld_ctu_grid->ngct->ReadOnly && !$bhld_ctu_grid->ngct->Disabled && !isset($bhld_ctu_grid->ngct->EditAttrs["readonly"]) && !isset($bhld_ctu_grid->ngct->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbhld_ctugrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fbhld_ctugrid", "x<?php echo $bhld_ctu_grid->RowIndex ?>_ngct", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($bhld_ctu->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_ctu_grid->RowCount ?>_bhld_ctu_ngct">
<span<?php echo $bhld_ctu_grid->ngct->viewAttributes() ?>><?php echo $bhld_ctu_grid->ngct->getViewValue() ?></span>
</span>
<?php if (!$bhld_ctu->isConfirm()) { ?>
<input type="hidden" data-table="bhld_ctu" data-field="x_ngct" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_ngct" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_ngct" value="<?php echo HtmlEncode($bhld_ctu_grid->ngct->FormValue) ?>">
<input type="hidden" data-table="bhld_ctu" data-field="x_ngct" name="o<?php echo $bhld_ctu_grid->RowIndex ?>_ngct" id="o<?php echo $bhld_ctu_grid->RowIndex ?>_ngct" value="<?php echo HtmlEncode($bhld_ctu_grid->ngct->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="bhld_ctu" data-field="x_ngct" name="fbhld_ctugrid$x<?php echo $bhld_ctu_grid->RowIndex ?>_ngct" id="fbhld_ctugrid$x<?php echo $bhld_ctu_grid->RowIndex ?>_ngct" value="<?php echo HtmlEncode($bhld_ctu_grid->ngct->FormValue) ?>">
<input type="hidden" data-table="bhld_ctu" data-field="x_ngct" name="fbhld_ctugrid$o<?php echo $bhld_ctu_grid->RowIndex ?>_ngct" id="fbhld_ctugrid$o<?php echo $bhld_ctu_grid->RowIndex ?>_ngct" value="<?php echo HtmlEncode($bhld_ctu_grid->ngct->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($bhld_ctu_grid->mapb->Visible) { // mapb ?>
		<td data-name="mapb" <?php echo $bhld_ctu_grid->mapb->cellAttributes() ?>>
<?php if ($bhld_ctu->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_ctu_grid->RowCount ?>_bhld_ctu_mapb" class="form-group">
<input type="text" data-table="bhld_ctu" data-field="x_mapb" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_mapb" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_mapb" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctu_grid->mapb->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_grid->mapb->EditValue ?>"<?php echo $bhld_ctu_grid->mapb->editAttributes() ?>>
</span>
<input type="hidden" data-table="bhld_ctu" data-field="x_mapb" name="o<?php echo $bhld_ctu_grid->RowIndex ?>_mapb" id="o<?php echo $bhld_ctu_grid->RowIndex ?>_mapb" value="<?php echo HtmlEncode($bhld_ctu_grid->mapb->OldValue) ?>">
<?php } ?>
<?php if ($bhld_ctu->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $bhld_ctu_grid->RowCount ?>_bhld_ctu_mapb" class="form-group">
<input type="text" data-table="bhld_ctu" data-field="x_mapb" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_mapb" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_mapb" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctu_grid->mapb->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_grid->mapb->EditValue ?>"<?php echo $bhld_ctu_grid->mapb->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($bhld_ctu->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_ctu_grid->RowCount ?>_bhld_ctu_mapb">
<span<?php echo $bhld_ctu_grid->mapb->viewAttributes() ?>><?php echo $bhld_ctu_grid->mapb->getViewValue() ?></span>
</span>
<?php if (!$bhld_ctu->isConfirm()) { ?>
<input type="hidden" data-table="bhld_ctu" data-field="x_mapb" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_mapb" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_mapb" value="<?php echo HtmlEncode($bhld_ctu_grid->mapb->FormValue) ?>">
<input type="hidden" data-table="bhld_ctu" data-field="x_mapb" name="o<?php echo $bhld_ctu_grid->RowIndex ?>_mapb" id="o<?php echo $bhld_ctu_grid->RowIndex ?>_mapb" value="<?php echo HtmlEncode($bhld_ctu_grid->mapb->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="bhld_ctu" data-field="x_mapb" name="fbhld_ctugrid$x<?php echo $bhld_ctu_grid->RowIndex ?>_mapb" id="fbhld_ctugrid$x<?php echo $bhld_ctu_grid->RowIndex ?>_mapb" value="<?php echo HtmlEncode($bhld_ctu_grid->mapb->FormValue) ?>">
<input type="hidden" data-table="bhld_ctu" data-field="x_mapb" name="fbhld_ctugrid$o<?php echo $bhld_ctu_grid->RowIndex ?>_mapb" id="fbhld_ctugrid$o<?php echo $bhld_ctu_grid->RowIndex ?>_mapb" value="<?php echo HtmlEncode($bhld_ctu_grid->mapb->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($bhld_ctu_grid->ghichu->Visible) { // ghichu ?>
		<td data-name="ghichu" <?php echo $bhld_ctu_grid->ghichu->cellAttributes() ?>>
<?php if ($bhld_ctu->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_ctu_grid->RowCount ?>_bhld_ctu_ghichu" class="form-group">
<input type="text" data-table="bhld_ctu" data-field="x_ghichu" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_ghichu" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_ghichu" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctu_grid->ghichu->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_grid->ghichu->EditValue ?>"<?php echo $bhld_ctu_grid->ghichu->editAttributes() ?>>
</span>
<input type="hidden" data-table="bhld_ctu" data-field="x_ghichu" name="o<?php echo $bhld_ctu_grid->RowIndex ?>_ghichu" id="o<?php echo $bhld_ctu_grid->RowIndex ?>_ghichu" value="<?php echo HtmlEncode($bhld_ctu_grid->ghichu->OldValue) ?>">
<?php } ?>
<?php if ($bhld_ctu->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $bhld_ctu_grid->RowCount ?>_bhld_ctu_ghichu" class="form-group">
<input type="text" data-table="bhld_ctu" data-field="x_ghichu" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_ghichu" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_ghichu" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctu_grid->ghichu->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_grid->ghichu->EditValue ?>"<?php echo $bhld_ctu_grid->ghichu->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($bhld_ctu->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_ctu_grid->RowCount ?>_bhld_ctu_ghichu">
<span<?php echo $bhld_ctu_grid->ghichu->viewAttributes() ?>><?php echo $bhld_ctu_grid->ghichu->getViewValue() ?></span>
</span>
<?php if (!$bhld_ctu->isConfirm()) { ?>
<input type="hidden" data-table="bhld_ctu" data-field="x_ghichu" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_ghichu" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_ghichu" value="<?php echo HtmlEncode($bhld_ctu_grid->ghichu->FormValue) ?>">
<input type="hidden" data-table="bhld_ctu" data-field="x_ghichu" name="o<?php echo $bhld_ctu_grid->RowIndex ?>_ghichu" id="o<?php echo $bhld_ctu_grid->RowIndex ?>_ghichu" value="<?php echo HtmlEncode($bhld_ctu_grid->ghichu->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="bhld_ctu" data-field="x_ghichu" name="fbhld_ctugrid$x<?php echo $bhld_ctu_grid->RowIndex ?>_ghichu" id="fbhld_ctugrid$x<?php echo $bhld_ctu_grid->RowIndex ?>_ghichu" value="<?php echo HtmlEncode($bhld_ctu_grid->ghichu->FormValue) ?>">
<input type="hidden" data-table="bhld_ctu" data-field="x_ghichu" name="fbhld_ctugrid$o<?php echo $bhld_ctu_grid->RowIndex ?>_ghichu" id="fbhld_ctugrid$o<?php echo $bhld_ctu_grid->RowIndex ?>_ghichu" value="<?php echo HtmlEncode($bhld_ctu_grid->ghichu->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($bhld_ctu_grid->madm->Visible) { // madm ?>
		<td data-name="madm" <?php echo $bhld_ctu_grid->madm->cellAttributes() ?>>
<?php if ($bhld_ctu->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_ctu_grid->RowCount ?>_bhld_ctu_madm" class="form-group">
<input type="text" data-table="bhld_ctu" data-field="x_madm" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_madm" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_madm" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctu_grid->madm->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_grid->madm->EditValue ?>"<?php echo $bhld_ctu_grid->madm->editAttributes() ?>>
</span>
<input type="hidden" data-table="bhld_ctu" data-field="x_madm" name="o<?php echo $bhld_ctu_grid->RowIndex ?>_madm" id="o<?php echo $bhld_ctu_grid->RowIndex ?>_madm" value="<?php echo HtmlEncode($bhld_ctu_grid->madm->OldValue) ?>">
<?php } ?>
<?php if ($bhld_ctu->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $bhld_ctu_grid->RowCount ?>_bhld_ctu_madm" class="form-group">
<input type="text" data-table="bhld_ctu" data-field="x_madm" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_madm" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_madm" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctu_grid->madm->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_grid->madm->EditValue ?>"<?php echo $bhld_ctu_grid->madm->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($bhld_ctu->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_ctu_grid->RowCount ?>_bhld_ctu_madm">
<span<?php echo $bhld_ctu_grid->madm->viewAttributes() ?>><?php echo $bhld_ctu_grid->madm->getViewValue() ?></span>
</span>
<?php if (!$bhld_ctu->isConfirm()) { ?>
<input type="hidden" data-table="bhld_ctu" data-field="x_madm" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_madm" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_madm" value="<?php echo HtmlEncode($bhld_ctu_grid->madm->FormValue) ?>">
<input type="hidden" data-table="bhld_ctu" data-field="x_madm" name="o<?php echo $bhld_ctu_grid->RowIndex ?>_madm" id="o<?php echo $bhld_ctu_grid->RowIndex ?>_madm" value="<?php echo HtmlEncode($bhld_ctu_grid->madm->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="bhld_ctu" data-field="x_madm" name="fbhld_ctugrid$x<?php echo $bhld_ctu_grid->RowIndex ?>_madm" id="fbhld_ctugrid$x<?php echo $bhld_ctu_grid->RowIndex ?>_madm" value="<?php echo HtmlEncode($bhld_ctu_grid->madm->FormValue) ?>">
<input type="hidden" data-table="bhld_ctu" data-field="x_madm" name="fbhld_ctugrid$o<?php echo $bhld_ctu_grid->RowIndex ?>_madm" id="fbhld_ctugrid$o<?php echo $bhld_ctu_grid->RowIndex ?>_madm" value="<?php echo HtmlEncode($bhld_ctu_grid->madm->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bhld_ctu_grid->ListOptions->render("body", "right", $bhld_ctu_grid->RowCount);
?>
	</tr>
<?php if ($bhld_ctu->RowType == ROWTYPE_ADD || $bhld_ctu->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fbhld_ctugrid", "load"], function() {
	fbhld_ctugrid.updateLists(<?php echo $bhld_ctu_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$bhld_ctu_grid->isGridAdd() || $bhld_ctu->CurrentMode == "copy")
		if (!$bhld_ctu_grid->Recordset->EOF)
			$bhld_ctu_grid->Recordset->moveNext();
}
?>
<?php
	if ($bhld_ctu->CurrentMode == "add" || $bhld_ctu->CurrentMode == "copy" || $bhld_ctu->CurrentMode == "edit") {
		$bhld_ctu_grid->RowIndex = '$rowindex$';
		$bhld_ctu_grid->loadRowValues();

		// Set row properties
		$bhld_ctu->resetAttributes();
		$bhld_ctu->RowAttrs->merge(["data-rowindex" => $bhld_ctu_grid->RowIndex, "id" => "r0_bhld_ctu", "data-rowtype" => ROWTYPE_ADD]);
		$bhld_ctu->RowAttrs->appendClass("ew-template");
		$bhld_ctu->RowType = ROWTYPE_ADD;

		// Render row
		$bhld_ctu_grid->renderRow();

		// Render list options
		$bhld_ctu_grid->renderListOptions();
		$bhld_ctu_grid->StartRowCount = 0;
?>
	<tr <?php echo $bhld_ctu->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bhld_ctu_grid->ListOptions->render("body", "left", $bhld_ctu_grid->RowIndex);
?>
	<?php if ($bhld_ctu_grid->mact->Visible) { // mact ?>
		<td data-name="mact">
<?php if (!$bhld_ctu->isConfirm()) { ?>
<span id="el$rowindex$_bhld_ctu_mact" class="form-group bhld_ctu_mact">
<input type="text" data-table="bhld_ctu" data-field="x_mact" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_mact" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_mact" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctu_grid->mact->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_grid->mact->EditValue ?>"<?php echo $bhld_ctu_grid->mact->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_bhld_ctu_mact" class="form-group bhld_ctu_mact">
<span<?php echo $bhld_ctu_grid->mact->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_ctu_grid->mact->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_ctu" data-field="x_mact" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_mact" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_ctu_grid->mact->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="bhld_ctu" data-field="x_mact" name="o<?php echo $bhld_ctu_grid->RowIndex ?>_mact" id="o<?php echo $bhld_ctu_grid->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_ctu_grid->mact->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($bhld_ctu_grid->manv->Visible) { // manv ?>
		<td data-name="manv">
<?php if (!$bhld_ctu->isConfirm()) { ?>
<span id="el$rowindex$_bhld_ctu_manv" class="form-group bhld_ctu_manv">
<input type="text" data-table="bhld_ctu" data-field="x_manv" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_manv" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_manv" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_ctu_grid->manv->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_grid->manv->EditValue ?>"<?php echo $bhld_ctu_grid->manv->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_bhld_ctu_manv" class="form-group bhld_ctu_manv">
<span<?php echo $bhld_ctu_grid->manv->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_ctu_grid->manv->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_ctu" data-field="x_manv" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_manv" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_manv" value="<?php echo HtmlEncode($bhld_ctu_grid->manv->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="bhld_ctu" data-field="x_manv" name="o<?php echo $bhld_ctu_grid->RowIndex ?>_manv" id="o<?php echo $bhld_ctu_grid->RowIndex ?>_manv" value="<?php echo HtmlEncode($bhld_ctu_grid->manv->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($bhld_ctu_grid->ngct->Visible) { // ngct ?>
		<td data-name="ngct">
<?php if (!$bhld_ctu->isConfirm()) { ?>
<span id="el$rowindex$_bhld_ctu_ngct" class="form-group bhld_ctu_ngct">
<input type="text" data-table="bhld_ctu" data-field="x_ngct" data-format="7" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_ngct" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_ngct" maxlength="10" placeholder="<?php echo HtmlEncode($bhld_ctu_grid->ngct->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_grid->ngct->EditValue ?>"<?php echo $bhld_ctu_grid->ngct->editAttributes() ?>>
<?php if (!$bhld_ctu_grid->ngct->ReadOnly && !$bhld_ctu_grid->ngct->Disabled && !isset($bhld_ctu_grid->ngct->EditAttrs["readonly"]) && !isset($bhld_ctu_grid->ngct->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbhld_ctugrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fbhld_ctugrid", "x<?php echo $bhld_ctu_grid->RowIndex ?>_ngct", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_bhld_ctu_ngct" class="form-group bhld_ctu_ngct">
<span<?php echo $bhld_ctu_grid->ngct->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_ctu_grid->ngct->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_ctu" data-field="x_ngct" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_ngct" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_ngct" value="<?php echo HtmlEncode($bhld_ctu_grid->ngct->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="bhld_ctu" data-field="x_ngct" name="o<?php echo $bhld_ctu_grid->RowIndex ?>_ngct" id="o<?php echo $bhld_ctu_grid->RowIndex ?>_ngct" value="<?php echo HtmlEncode($bhld_ctu_grid->ngct->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($bhld_ctu_grid->mapb->Visible) { // mapb ?>
		<td data-name="mapb">
<?php if (!$bhld_ctu->isConfirm()) { ?>
<span id="el$rowindex$_bhld_ctu_mapb" class="form-group bhld_ctu_mapb">
<input type="text" data-table="bhld_ctu" data-field="x_mapb" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_mapb" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_mapb" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctu_grid->mapb->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_grid->mapb->EditValue ?>"<?php echo $bhld_ctu_grid->mapb->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_bhld_ctu_mapb" class="form-group bhld_ctu_mapb">
<span<?php echo $bhld_ctu_grid->mapb->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_ctu_grid->mapb->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_ctu" data-field="x_mapb" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_mapb" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_mapb" value="<?php echo HtmlEncode($bhld_ctu_grid->mapb->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="bhld_ctu" data-field="x_mapb" name="o<?php echo $bhld_ctu_grid->RowIndex ?>_mapb" id="o<?php echo $bhld_ctu_grid->RowIndex ?>_mapb" value="<?php echo HtmlEncode($bhld_ctu_grid->mapb->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($bhld_ctu_grid->ghichu->Visible) { // ghichu ?>
		<td data-name="ghichu">
<?php if (!$bhld_ctu->isConfirm()) { ?>
<span id="el$rowindex$_bhld_ctu_ghichu" class="form-group bhld_ctu_ghichu">
<input type="text" data-table="bhld_ctu" data-field="x_ghichu" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_ghichu" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_ghichu" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctu_grid->ghichu->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_grid->ghichu->EditValue ?>"<?php echo $bhld_ctu_grid->ghichu->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_bhld_ctu_ghichu" class="form-group bhld_ctu_ghichu">
<span<?php echo $bhld_ctu_grid->ghichu->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_ctu_grid->ghichu->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_ctu" data-field="x_ghichu" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_ghichu" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_ghichu" value="<?php echo HtmlEncode($bhld_ctu_grid->ghichu->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="bhld_ctu" data-field="x_ghichu" name="o<?php echo $bhld_ctu_grid->RowIndex ?>_ghichu" id="o<?php echo $bhld_ctu_grid->RowIndex ?>_ghichu" value="<?php echo HtmlEncode($bhld_ctu_grid->ghichu->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($bhld_ctu_grid->madm->Visible) { // madm ?>
		<td data-name="madm">
<?php if (!$bhld_ctu->isConfirm()) { ?>
<span id="el$rowindex$_bhld_ctu_madm" class="form-group bhld_ctu_madm">
<input type="text" data-table="bhld_ctu" data-field="x_madm" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_madm" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_madm" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctu_grid->madm->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_grid->madm->EditValue ?>"<?php echo $bhld_ctu_grid->madm->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_bhld_ctu_madm" class="form-group bhld_ctu_madm">
<span<?php echo $bhld_ctu_grid->madm->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_ctu_grid->madm->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_ctu" data-field="x_madm" name="x<?php echo $bhld_ctu_grid->RowIndex ?>_madm" id="x<?php echo $bhld_ctu_grid->RowIndex ?>_madm" value="<?php echo HtmlEncode($bhld_ctu_grid->madm->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="bhld_ctu" data-field="x_madm" name="o<?php echo $bhld_ctu_grid->RowIndex ?>_madm" id="o<?php echo $bhld_ctu_grid->RowIndex ?>_madm" value="<?php echo HtmlEncode($bhld_ctu_grid->madm->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bhld_ctu_grid->ListOptions->render("body", "right", $bhld_ctu_grid->RowIndex);
?>
<script>
loadjs.ready(["fbhld_ctugrid", "load"], function() {
	fbhld_ctugrid.updateLists(<?php echo $bhld_ctu_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($bhld_ctu->CurrentMode == "add" || $bhld_ctu->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $bhld_ctu_grid->FormKeyCountName ?>" id="<?php echo $bhld_ctu_grid->FormKeyCountName ?>" value="<?php echo $bhld_ctu_grid->KeyCount ?>">
<?php echo $bhld_ctu_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($bhld_ctu->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $bhld_ctu_grid->FormKeyCountName ?>" id="<?php echo $bhld_ctu_grid->FormKeyCountName ?>" value="<?php echo $bhld_ctu_grid->KeyCount ?>">
<?php echo $bhld_ctu_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($bhld_ctu->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fbhld_ctugrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($bhld_ctu_grid->Recordset)
	$bhld_ctu_grid->Recordset->Close();
?>
<?php if ($bhld_ctu_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $bhld_ctu_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($bhld_ctu_grid->TotalRecords == 0 && !$bhld_ctu->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $bhld_ctu_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$bhld_ctu_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$bhld_ctu_grid->terminate();
?>
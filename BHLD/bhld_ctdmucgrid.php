<?php
namespace PHPMaker2020\projectBHLD;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($bhld_ctdmuc_grid))
	$bhld_ctdmuc_grid = new bhld_ctdmuc_grid();

// Run the page
$bhld_ctdmuc_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_ctdmuc_grid->Page_Render();
?>
<?php if (!$bhld_ctdmuc_grid->isExport()) { ?>
<script>
var fbhld_ctdmucgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fbhld_ctdmucgrid = new ew.Form("fbhld_ctdmucgrid", "grid");
	fbhld_ctdmucgrid.formKeyCountName = '<?php echo $bhld_ctdmuc_grid->FormKeyCountName ?>';

	// Validate form
	fbhld_ctdmucgrid.validate = function() {
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
			<?php if ($bhld_ctdmuc_grid->madm->Required) { ?>
				elm = this.getElements("x" + infix + "_madm");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctdmuc_grid->madm->caption(), $bhld_ctdmuc_grid->madm->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_ctdmuc_grid->mavt->Required) { ?>
				elm = this.getElements("x" + infix + "_mavt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctdmuc_grid->mavt->caption(), $bhld_ctdmuc_grid->mavt->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_ctdmuc_grid->dmuc->Required) { ?>
				elm = this.getElements("x" + infix + "_dmuc");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctdmuc_grid->dmuc->caption(), $bhld_ctdmuc_grid->dmuc->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_dmuc");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_ctdmuc_grid->dmuc->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fbhld_ctdmucgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "madm", false)) return false;
		if (ew.valueChanged(fobj, infix, "mavt", false)) return false;
		if (ew.valueChanged(fobj, infix, "dmuc", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fbhld_ctdmucgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbhld_ctdmucgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fbhld_ctdmucgrid.lists["x_mavt"] = <?php echo $bhld_ctdmuc_grid->mavt->Lookup->toClientList($bhld_ctdmuc_grid) ?>;
	fbhld_ctdmucgrid.lists["x_mavt"].options = <?php echo JsonEncode($bhld_ctdmuc_grid->mavt->lookupOptions()) ?>;
	loadjs.done("fbhld_ctdmucgrid");
});
</script>
<?php } ?>
<?php
$bhld_ctdmuc_grid->renderOtherOptions();
?>
<?php if ($bhld_ctdmuc_grid->TotalRecords > 0 || $bhld_ctdmuc->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($bhld_ctdmuc_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> bhld_ctdmuc">
<?php if ($bhld_ctdmuc_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $bhld_ctdmuc_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fbhld_ctdmucgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_bhld_ctdmuc" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_bhld_ctdmucgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$bhld_ctdmuc->RowType = ROWTYPE_HEADER;

// Render list options
$bhld_ctdmuc_grid->renderListOptions();

// Render list options (header, left)
$bhld_ctdmuc_grid->ListOptions->render("header", "left");
?>
<?php if ($bhld_ctdmuc_grid->madm->Visible) { // madm ?>
	<?php if ($bhld_ctdmuc_grid->SortUrl($bhld_ctdmuc_grid->madm) == "") { ?>
		<th data-name="madm" class="<?php echo $bhld_ctdmuc_grid->madm->headerCellClass() ?>"><div id="elh_bhld_ctdmuc_madm" class="bhld_ctdmuc_madm"><div class="ew-table-header-caption"><?php echo $bhld_ctdmuc_grid->madm->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="madm" class="<?php echo $bhld_ctdmuc_grid->madm->headerCellClass() ?>"><div><div id="elh_bhld_ctdmuc_madm" class="bhld_ctdmuc_madm">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctdmuc_grid->madm->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctdmuc_grid->madm->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctdmuc_grid->madm->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_ctdmuc_grid->mavt->Visible) { // mavt ?>
	<?php if ($bhld_ctdmuc_grid->SortUrl($bhld_ctdmuc_grid->mavt) == "") { ?>
		<th data-name="mavt" class="<?php echo $bhld_ctdmuc_grid->mavt->headerCellClass() ?>"><div id="elh_bhld_ctdmuc_mavt" class="bhld_ctdmuc_mavt"><div class="ew-table-header-caption"><?php echo $bhld_ctdmuc_grid->mavt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mavt" class="<?php echo $bhld_ctdmuc_grid->mavt->headerCellClass() ?>"><div><div id="elh_bhld_ctdmuc_mavt" class="bhld_ctdmuc_mavt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctdmuc_grid->mavt->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctdmuc_grid->mavt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctdmuc_grid->mavt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_ctdmuc_grid->dmuc->Visible) { // dmuc ?>
	<?php if ($bhld_ctdmuc_grid->SortUrl($bhld_ctdmuc_grid->dmuc) == "") { ?>
		<th data-name="dmuc" class="<?php echo $bhld_ctdmuc_grid->dmuc->headerCellClass() ?>"><div id="elh_bhld_ctdmuc_dmuc" class="bhld_ctdmuc_dmuc"><div class="ew-table-header-caption"><?php echo $bhld_ctdmuc_grid->dmuc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dmuc" class="<?php echo $bhld_ctdmuc_grid->dmuc->headerCellClass() ?>"><div><div id="elh_bhld_ctdmuc_dmuc" class="bhld_ctdmuc_dmuc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctdmuc_grid->dmuc->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctdmuc_grid->dmuc->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctdmuc_grid->dmuc->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$bhld_ctdmuc_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$bhld_ctdmuc_grid->StartRecord = 1;
$bhld_ctdmuc_grid->StopRecord = $bhld_ctdmuc_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($bhld_ctdmuc->isConfirm() || $bhld_ctdmuc_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($bhld_ctdmuc_grid->FormKeyCountName) && ($bhld_ctdmuc_grid->isGridAdd() || $bhld_ctdmuc_grid->isGridEdit() || $bhld_ctdmuc->isConfirm())) {
		$bhld_ctdmuc_grid->KeyCount = $CurrentForm->getValue($bhld_ctdmuc_grid->FormKeyCountName);
		$bhld_ctdmuc_grid->StopRecord = $bhld_ctdmuc_grid->StartRecord + $bhld_ctdmuc_grid->KeyCount - 1;
	}
}
$bhld_ctdmuc_grid->RecordCount = $bhld_ctdmuc_grid->StartRecord - 1;
if ($bhld_ctdmuc_grid->Recordset && !$bhld_ctdmuc_grid->Recordset->EOF) {
	$bhld_ctdmuc_grid->Recordset->moveFirst();
	$selectLimit = $bhld_ctdmuc_grid->UseSelectLimit;
	if (!$selectLimit && $bhld_ctdmuc_grid->StartRecord > 1)
		$bhld_ctdmuc_grid->Recordset->move($bhld_ctdmuc_grid->StartRecord - 1);
} elseif (!$bhld_ctdmuc->AllowAddDeleteRow && $bhld_ctdmuc_grid->StopRecord == 0) {
	$bhld_ctdmuc_grid->StopRecord = $bhld_ctdmuc->GridAddRowCount;
}

// Initialize aggregate
$bhld_ctdmuc->RowType = ROWTYPE_AGGREGATEINIT;
$bhld_ctdmuc->resetAttributes();
$bhld_ctdmuc_grid->renderRow();
if ($bhld_ctdmuc_grid->isGridAdd())
	$bhld_ctdmuc_grid->RowIndex = 0;
if ($bhld_ctdmuc_grid->isGridEdit())
	$bhld_ctdmuc_grid->RowIndex = 0;
while ($bhld_ctdmuc_grid->RecordCount < $bhld_ctdmuc_grid->StopRecord) {
	$bhld_ctdmuc_grid->RecordCount++;
	if ($bhld_ctdmuc_grid->RecordCount >= $bhld_ctdmuc_grid->StartRecord) {
		$bhld_ctdmuc_grid->RowCount++;
		if ($bhld_ctdmuc_grid->isGridAdd() || $bhld_ctdmuc_grid->isGridEdit() || $bhld_ctdmuc->isConfirm()) {
			$bhld_ctdmuc_grid->RowIndex++;
			$CurrentForm->Index = $bhld_ctdmuc_grid->RowIndex;
			if ($CurrentForm->hasValue($bhld_ctdmuc_grid->FormActionName) && ($bhld_ctdmuc->isConfirm() || $bhld_ctdmuc_grid->EventCancelled))
				$bhld_ctdmuc_grid->RowAction = strval($CurrentForm->getValue($bhld_ctdmuc_grid->FormActionName));
			elseif ($bhld_ctdmuc_grid->isGridAdd())
				$bhld_ctdmuc_grid->RowAction = "insert";
			else
				$bhld_ctdmuc_grid->RowAction = "";
		}

		// Set up key count
		$bhld_ctdmuc_grid->KeyCount = $bhld_ctdmuc_grid->RowIndex;

		// Init row class and style
		$bhld_ctdmuc->resetAttributes();
		$bhld_ctdmuc->CssClass = "";
		if ($bhld_ctdmuc_grid->isGridAdd()) {
			if ($bhld_ctdmuc->CurrentMode == "copy") {
				$bhld_ctdmuc_grid->loadRowValues($bhld_ctdmuc_grid->Recordset); // Load row values
				$bhld_ctdmuc_grid->setRecordKey($bhld_ctdmuc_grid->RowOldKey, $bhld_ctdmuc_grid->Recordset); // Set old record key
			} else {
				$bhld_ctdmuc_grid->loadRowValues(); // Load default values
				$bhld_ctdmuc_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$bhld_ctdmuc_grid->loadRowValues($bhld_ctdmuc_grid->Recordset); // Load row values
		}
		$bhld_ctdmuc->RowType = ROWTYPE_VIEW; // Render view
		if ($bhld_ctdmuc_grid->isGridAdd()) // Grid add
			$bhld_ctdmuc->RowType = ROWTYPE_ADD; // Render add
		if ($bhld_ctdmuc_grid->isGridAdd() && $bhld_ctdmuc->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$bhld_ctdmuc_grid->restoreCurrentRowFormValues($bhld_ctdmuc_grid->RowIndex); // Restore form values
		if ($bhld_ctdmuc_grid->isGridEdit()) { // Grid edit
			if ($bhld_ctdmuc->EventCancelled)
				$bhld_ctdmuc_grid->restoreCurrentRowFormValues($bhld_ctdmuc_grid->RowIndex); // Restore form values
			if ($bhld_ctdmuc_grid->RowAction == "insert")
				$bhld_ctdmuc->RowType = ROWTYPE_ADD; // Render add
			else
				$bhld_ctdmuc->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($bhld_ctdmuc_grid->isGridEdit() && ($bhld_ctdmuc->RowType == ROWTYPE_EDIT || $bhld_ctdmuc->RowType == ROWTYPE_ADD) && $bhld_ctdmuc->EventCancelled) // Update failed
			$bhld_ctdmuc_grid->restoreCurrentRowFormValues($bhld_ctdmuc_grid->RowIndex); // Restore form values
		if ($bhld_ctdmuc->RowType == ROWTYPE_EDIT) // Edit row
			$bhld_ctdmuc_grid->EditRowCount++;
		if ($bhld_ctdmuc->isConfirm()) // Confirm row
			$bhld_ctdmuc_grid->restoreCurrentRowFormValues($bhld_ctdmuc_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$bhld_ctdmuc->RowAttrs->merge(["data-rowindex" => $bhld_ctdmuc_grid->RowCount, "id" => "r" . $bhld_ctdmuc_grid->RowCount . "_bhld_ctdmuc", "data-rowtype" => $bhld_ctdmuc->RowType]);

		// Render row
		$bhld_ctdmuc_grid->renderRow();

		// Render list options
		$bhld_ctdmuc_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($bhld_ctdmuc_grid->RowAction != "delete" && $bhld_ctdmuc_grid->RowAction != "insertdelete" && !($bhld_ctdmuc_grid->RowAction == "insert" && $bhld_ctdmuc->isConfirm() && $bhld_ctdmuc_grid->emptyRow())) {
?>
	<tr <?php echo $bhld_ctdmuc->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bhld_ctdmuc_grid->ListOptions->render("body", "left", $bhld_ctdmuc_grid->RowCount);
?>
	<?php if ($bhld_ctdmuc_grid->madm->Visible) { // madm ?>
		<td data-name="madm" <?php echo $bhld_ctdmuc_grid->madm->cellAttributes() ?>>
<?php if ($bhld_ctdmuc->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($bhld_ctdmuc_grid->madm->getSessionValue() != "") { ?>
<span id="el<?php echo $bhld_ctdmuc_grid->RowCount ?>_bhld_ctdmuc_madm" class="form-group">
<span<?php echo $bhld_ctdmuc_grid->madm->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_ctdmuc_grid->madm->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" name="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->madm->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $bhld_ctdmuc_grid->RowCount ?>_bhld_ctdmuc_madm" class="form-group">
<input type="text" data-table="bhld_ctdmuc" data-field="x_madm" name="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" id="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctdmuc_grid->madm->getPlaceHolder()) ?>" value="<?php echo $bhld_ctdmuc_grid->madm->EditValue ?>"<?php echo $bhld_ctdmuc_grid->madm->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_madm" name="o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" id="o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->madm->OldValue) ?>">
<?php } ?>
<?php if ($bhld_ctdmuc->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($bhld_ctdmuc_grid->madm->getSessionValue() != "") { ?>

<span id="el<?php echo $bhld_ctdmuc_grid->RowCount ?>_bhld_ctdmuc_madm" class="form-group">
<span<?php echo $bhld_ctdmuc_grid->madm->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_ctdmuc_grid->madm->EditValue)) ?>"></span>
</span>

<input type="hidden" id="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" name="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->madm->CurrentValue) ?>">
<?php } else { ?>

<input type="text" data-table="bhld_ctdmuc" data-field="x_madm" name="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" id="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctdmuc_grid->madm->getPlaceHolder()) ?>" value="<?php echo $bhld_ctdmuc_grid->madm->EditValue ?>"<?php echo $bhld_ctdmuc_grid->madm->editAttributes() ?>>

<?php } ?>

<input type="hidden" data-table="bhld_ctdmuc" data-field="x_madm" name="o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" id="o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->madm->OldValue != null ? $bhld_ctdmuc_grid->madm->OldValue : $bhld_ctdmuc_grid->madm->CurrentValue) ?>">
<?php } ?>
<?php if ($bhld_ctdmuc->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_ctdmuc_grid->RowCount ?>_bhld_ctdmuc_madm">
<span<?php echo $bhld_ctdmuc_grid->madm->viewAttributes() ?>><?php echo $bhld_ctdmuc_grid->madm->getViewValue() ?></span>
</span>
<?php if (!$bhld_ctdmuc->isConfirm()) { ?>
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_madm" name="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" id="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->madm->FormValue) ?>">
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_madm" name="o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" id="o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->madm->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_madm" name="fbhld_ctdmucgrid$x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" id="fbhld_ctdmucgrid$x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->madm->FormValue) ?>">
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_madm" name="fbhld_ctdmucgrid$o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" id="fbhld_ctdmucgrid$o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->madm->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($bhld_ctdmuc_grid->mavt->Visible) { // mavt ?>
		<td data-name="mavt" <?php echo $bhld_ctdmuc_grid->mavt->cellAttributes() ?>>
<?php if ($bhld_ctdmuc->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_ctdmuc_grid->RowCount ?>_bhld_ctdmuc_mavt" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="bhld_ctdmuc" data-field="x_mavt" data-value-separator="<?php echo $bhld_ctdmuc_grid->mavt->displayValueSeparatorAttribute() ?>" id="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_mavt" name="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_mavt"<?php echo $bhld_ctdmuc_grid->mavt->editAttributes() ?>>
			<?php echo $bhld_ctdmuc_grid->mavt->selectOptionListHtml("x{$bhld_ctdmuc_grid->RowIndex}_mavt") ?>
		</select>
</div>
<?php echo $bhld_ctdmuc_grid->mavt->Lookup->getParamTag($bhld_ctdmuc_grid, "p_x" . $bhld_ctdmuc_grid->RowIndex . "_mavt") ?>
</span>
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_mavt" name="o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_mavt" id="o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->mavt->OldValue) ?>">
<?php } ?>
<?php if ($bhld_ctdmuc->RowType == ROWTYPE_EDIT) { // Edit record ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="bhld_ctdmuc" data-field="x_mavt" data-value-separator="<?php echo $bhld_ctdmuc_grid->mavt->displayValueSeparatorAttribute() ?>" id="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_mavt" name="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_mavt"<?php echo $bhld_ctdmuc_grid->mavt->editAttributes() ?>>
			<?php echo $bhld_ctdmuc_grid->mavt->selectOptionListHtml("x{$bhld_ctdmuc_grid->RowIndex}_mavt") ?>
		</select>
</div>
<?php echo $bhld_ctdmuc_grid->mavt->Lookup->getParamTag($bhld_ctdmuc_grid, "p_x" . $bhld_ctdmuc_grid->RowIndex . "_mavt") ?>
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_mavt" name="o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_mavt" id="o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->mavt->OldValue != null ? $bhld_ctdmuc_grid->mavt->OldValue : $bhld_ctdmuc_grid->mavt->CurrentValue) ?>">
<?php } ?>
<?php if ($bhld_ctdmuc->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_ctdmuc_grid->RowCount ?>_bhld_ctdmuc_mavt">
<span<?php echo $bhld_ctdmuc_grid->mavt->viewAttributes() ?>><?php echo $bhld_ctdmuc_grid->mavt->getViewValue() ?></span>
</span>
<?php if (!$bhld_ctdmuc->isConfirm()) { ?>
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_mavt" name="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_mavt" id="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->mavt->FormValue) ?>">
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_mavt" name="o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_mavt" id="o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->mavt->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_mavt" name="fbhld_ctdmucgrid$x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_mavt" id="fbhld_ctdmucgrid$x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->mavt->FormValue) ?>">
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_mavt" name="fbhld_ctdmucgrid$o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_mavt" id="fbhld_ctdmucgrid$o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->mavt->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($bhld_ctdmuc_grid->dmuc->Visible) { // dmuc ?>
		<td data-name="dmuc" <?php echo $bhld_ctdmuc_grid->dmuc->cellAttributes() ?>>
<?php if ($bhld_ctdmuc->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_ctdmuc_grid->RowCount ?>_bhld_ctdmuc_dmuc" class="form-group">
<input type="text" data-table="bhld_ctdmuc" data-field="x_dmuc" name="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_dmuc" id="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_dmuc" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_ctdmuc_grid->dmuc->getPlaceHolder()) ?>" value="<?php echo $bhld_ctdmuc_grid->dmuc->EditValue ?>"<?php echo $bhld_ctdmuc_grid->dmuc->editAttributes() ?>>
</span>
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_dmuc" name="o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_dmuc" id="o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_dmuc" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->dmuc->OldValue) ?>">
<?php } ?>
<?php if ($bhld_ctdmuc->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $bhld_ctdmuc_grid->RowCount ?>_bhld_ctdmuc_dmuc" class="form-group">
<input type="text" data-table="bhld_ctdmuc" data-field="x_dmuc" name="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_dmuc" id="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_dmuc" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_ctdmuc_grid->dmuc->getPlaceHolder()) ?>" value="<?php echo $bhld_ctdmuc_grid->dmuc->EditValue ?>"<?php echo $bhld_ctdmuc_grid->dmuc->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($bhld_ctdmuc->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_ctdmuc_grid->RowCount ?>_bhld_ctdmuc_dmuc">
<span<?php echo $bhld_ctdmuc_grid->dmuc->viewAttributes() ?>><?php echo $bhld_ctdmuc_grid->dmuc->getViewValue() ?></span>
</span>
<?php if (!$bhld_ctdmuc->isConfirm()) { ?>
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_dmuc" name="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_dmuc" id="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_dmuc" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->dmuc->FormValue) ?>">
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_dmuc" name="o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_dmuc" id="o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_dmuc" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->dmuc->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_dmuc" name="fbhld_ctdmucgrid$x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_dmuc" id="fbhld_ctdmucgrid$x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_dmuc" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->dmuc->FormValue) ?>">
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_dmuc" name="fbhld_ctdmucgrid$o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_dmuc" id="fbhld_ctdmucgrid$o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_dmuc" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->dmuc->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bhld_ctdmuc_grid->ListOptions->render("body", "right", $bhld_ctdmuc_grid->RowCount);
?>
	</tr>
<?php if ($bhld_ctdmuc->RowType == ROWTYPE_ADD || $bhld_ctdmuc->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fbhld_ctdmucgrid", "load"], function() {
	fbhld_ctdmucgrid.updateLists(<?php echo $bhld_ctdmuc_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$bhld_ctdmuc_grid->isGridAdd() || $bhld_ctdmuc->CurrentMode == "copy")
		if (!$bhld_ctdmuc_grid->Recordset->EOF)
			$bhld_ctdmuc_grid->Recordset->moveNext();
}
?>
<?php
	if ($bhld_ctdmuc->CurrentMode == "add" || $bhld_ctdmuc->CurrentMode == "copy" || $bhld_ctdmuc->CurrentMode == "edit") {
		$bhld_ctdmuc_grid->RowIndex = '$rowindex$';
		$bhld_ctdmuc_grid->loadRowValues();

		// Set row properties
		$bhld_ctdmuc->resetAttributes();
		$bhld_ctdmuc->RowAttrs->merge(["data-rowindex" => $bhld_ctdmuc_grid->RowIndex, "id" => "r0_bhld_ctdmuc", "data-rowtype" => ROWTYPE_ADD]);
		$bhld_ctdmuc->RowAttrs->appendClass("ew-template");
		$bhld_ctdmuc->RowType = ROWTYPE_ADD;

		// Render row
		$bhld_ctdmuc_grid->renderRow();

		// Render list options
		$bhld_ctdmuc_grid->renderListOptions();
		$bhld_ctdmuc_grid->StartRowCount = 0;
?>
	<tr <?php echo $bhld_ctdmuc->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bhld_ctdmuc_grid->ListOptions->render("body", "left", $bhld_ctdmuc_grid->RowIndex);
?>
	<?php if ($bhld_ctdmuc_grid->madm->Visible) { // madm ?>
		<td data-name="madm">
<?php if (!$bhld_ctdmuc->isConfirm()) { ?>
<?php if ($bhld_ctdmuc_grid->madm->getSessionValue() != "") { ?>
<span id="el$rowindex$_bhld_ctdmuc_madm" class="form-group bhld_ctdmuc_madm">
<span<?php echo $bhld_ctdmuc_grid->madm->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_ctdmuc_grid->madm->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" name="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->madm->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_bhld_ctdmuc_madm" class="form-group bhld_ctdmuc_madm">
<input type="text" data-table="bhld_ctdmuc" data-field="x_madm" name="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" id="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctdmuc_grid->madm->getPlaceHolder()) ?>" value="<?php echo $bhld_ctdmuc_grid->madm->EditValue ?>"<?php echo $bhld_ctdmuc_grid->madm->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_bhld_ctdmuc_madm" class="form-group bhld_ctdmuc_madm">
<span<?php echo $bhld_ctdmuc_grid->madm->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_ctdmuc_grid->madm->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_madm" name="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" id="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->madm->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_madm" name="o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" id="o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_madm" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->madm->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($bhld_ctdmuc_grid->mavt->Visible) { // mavt ?>
		<td data-name="mavt">
<?php if (!$bhld_ctdmuc->isConfirm()) { ?>
<span id="el$rowindex$_bhld_ctdmuc_mavt" class="form-group bhld_ctdmuc_mavt">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="bhld_ctdmuc" data-field="x_mavt" data-value-separator="<?php echo $bhld_ctdmuc_grid->mavt->displayValueSeparatorAttribute() ?>" id="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_mavt" name="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_mavt"<?php echo $bhld_ctdmuc_grid->mavt->editAttributes() ?>>
			<?php echo $bhld_ctdmuc_grid->mavt->selectOptionListHtml("x{$bhld_ctdmuc_grid->RowIndex}_mavt") ?>
		</select>
</div>
<?php echo $bhld_ctdmuc_grid->mavt->Lookup->getParamTag($bhld_ctdmuc_grid, "p_x" . $bhld_ctdmuc_grid->RowIndex . "_mavt") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_bhld_ctdmuc_mavt" class="form-group bhld_ctdmuc_mavt">
<span<?php echo $bhld_ctdmuc_grid->mavt->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_ctdmuc_grid->mavt->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_mavt" name="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_mavt" id="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->mavt->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_mavt" name="o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_mavt" id="o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->mavt->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($bhld_ctdmuc_grid->dmuc->Visible) { // dmuc ?>
		<td data-name="dmuc">
<?php if (!$bhld_ctdmuc->isConfirm()) { ?>
<span id="el$rowindex$_bhld_ctdmuc_dmuc" class="form-group bhld_ctdmuc_dmuc">
<input type="text" data-table="bhld_ctdmuc" data-field="x_dmuc" name="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_dmuc" id="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_dmuc" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_ctdmuc_grid->dmuc->getPlaceHolder()) ?>" value="<?php echo $bhld_ctdmuc_grid->dmuc->EditValue ?>"<?php echo $bhld_ctdmuc_grid->dmuc->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_bhld_ctdmuc_dmuc" class="form-group bhld_ctdmuc_dmuc">
<span<?php echo $bhld_ctdmuc_grid->dmuc->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_ctdmuc_grid->dmuc->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_dmuc" name="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_dmuc" id="x<?php echo $bhld_ctdmuc_grid->RowIndex ?>_dmuc" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->dmuc->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_dmuc" name="o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_dmuc" id="o<?php echo $bhld_ctdmuc_grid->RowIndex ?>_dmuc" value="<?php echo HtmlEncode($bhld_ctdmuc_grid->dmuc->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bhld_ctdmuc_grid->ListOptions->render("body", "right", $bhld_ctdmuc_grid->RowIndex);
?>
<script>
loadjs.ready(["fbhld_ctdmucgrid", "load"], function() {
	fbhld_ctdmucgrid.updateLists(<?php echo $bhld_ctdmuc_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($bhld_ctdmuc->CurrentMode == "add" || $bhld_ctdmuc->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $bhld_ctdmuc_grid->FormKeyCountName ?>" id="<?php echo $bhld_ctdmuc_grid->FormKeyCountName ?>" value="<?php echo $bhld_ctdmuc_grid->KeyCount ?>">
<?php echo $bhld_ctdmuc_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($bhld_ctdmuc->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $bhld_ctdmuc_grid->FormKeyCountName ?>" id="<?php echo $bhld_ctdmuc_grid->FormKeyCountName ?>" value="<?php echo $bhld_ctdmuc_grid->KeyCount ?>">
<?php echo $bhld_ctdmuc_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($bhld_ctdmuc->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fbhld_ctdmucgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($bhld_ctdmuc_grid->Recordset)
	$bhld_ctdmuc_grid->Recordset->Close();
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($bhld_ctdmuc_grid->TotalRecords == 0 && !$bhld_ctdmuc->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $bhld_ctdmuc_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$bhld_ctdmuc_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$bhld_ctdmuc_grid->terminate();
?>
<?php
namespace PHPMaker2020\projectBHLD;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($bhld_view_chungtu_danhan_theothang_grid))
	$bhld_view_chungtu_danhan_theothang_grid = new bhld_view_chungtu_danhan_theothang_grid();

// Run the page
$bhld_view_chungtu_danhan_theothang_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_view_chungtu_danhan_theothang_grid->Page_Render();
?>
<?php if (!$bhld_view_chungtu_danhan_theothang_grid->isExport()) { ?>
<script>
var fbhld_view_chungtu_danhan_theothanggrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fbhld_view_chungtu_danhan_theothanggrid = new ew.Form("fbhld_view_chungtu_danhan_theothanggrid", "grid");
	fbhld_view_chungtu_danhan_theothanggrid.formKeyCountName = '<?php echo $bhld_view_chungtu_danhan_theothang_grid->FormKeyCountName ?>';

	// Validate form
	fbhld_view_chungtu_danhan_theothanggrid.validate = function() {
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
			<?php if ($bhld_view_chungtu_danhan_theothang_grid->ngnhan->Required) { ?>
				elm = this.getElements("x" + infix + "_ngnhan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_view_chungtu_danhan_theothang_grid->ngnhan->caption(), $bhld_view_chungtu_danhan_theothang_grid->ngnhan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ngnhan");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_view_chungtu_danhan_theothang_grid->ngnhan->errorMessage()) ?>");
			<?php if ($bhld_view_chungtu_danhan_theothang_grid->mapb->Required) { ?>
				elm = this.getElements("x" + infix + "_mapb");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_view_chungtu_danhan_theothang_grid->mapb->caption(), $bhld_view_chungtu_danhan_theothang_grid->mapb->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_view_chungtu_danhan_theothang_grid->manv->Required) { ?>
				elm = this.getElements("x" + infix + "_manv");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_view_chungtu_danhan_theothang_grid->manv->caption(), $bhld_view_chungtu_danhan_theothang_grid->manv->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_view_chungtu_danhan_theothang_grid->mavt->Required) { ?>
				elm = this.getElements("x" + infix + "_mavt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_view_chungtu_danhan_theothang_grid->mavt->caption(), $bhld_view_chungtu_danhan_theothang_grid->mavt->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_view_chungtu_danhan_theothang_grid->sl->Required) { ?>
				elm = this.getElements("x" + infix + "_sl");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_view_chungtu_danhan_theothang_grid->sl->caption(), $bhld_view_chungtu_danhan_theothang_grid->sl->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sl");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_view_chungtu_danhan_theothang_grid->sl->errorMessage()) ?>");
			<?php if ($bhld_view_chungtu_danhan_theothang_grid->dmtg->Required) { ?>
				elm = this.getElements("x" + infix + "_dmtg");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_view_chungtu_danhan_theothang_grid->dmtg->caption(), $bhld_view_chungtu_danhan_theothang_grid->dmtg->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_dmtg");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_view_chungtu_danhan_theothang_grid->dmtg->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	fbhld_view_chungtu_danhan_theothanggrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "ngnhan", false)) return false;
		if (ew.valueChanged(fobj, infix, "mapb", false)) return false;
		if (ew.valueChanged(fobj, infix, "manv", false)) return false;
		if (ew.valueChanged(fobj, infix, "mavt", false)) return false;
		if (ew.valueChanged(fobj, infix, "sl", false)) return false;
		if (ew.valueChanged(fobj, infix, "dmtg", false)) return false;
		return true;
	}

	// Form_CustomValidate
	fbhld_view_chungtu_danhan_theothanggrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbhld_view_chungtu_danhan_theothanggrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fbhld_view_chungtu_danhan_theothanggrid.lists["x_mapb"] = <?php echo $bhld_view_chungtu_danhan_theothang_grid->mapb->Lookup->toClientList($bhld_view_chungtu_danhan_theothang_grid) ?>;
	fbhld_view_chungtu_danhan_theothanggrid.lists["x_mapb"].options = <?php echo JsonEncode($bhld_view_chungtu_danhan_theothang_grid->mapb->lookupOptions()) ?>;
	fbhld_view_chungtu_danhan_theothanggrid.lists["x_manv"] = <?php echo $bhld_view_chungtu_danhan_theothang_grid->manv->Lookup->toClientList($bhld_view_chungtu_danhan_theothang_grid) ?>;
	fbhld_view_chungtu_danhan_theothanggrid.lists["x_manv"].options = <?php echo JsonEncode($bhld_view_chungtu_danhan_theothang_grid->manv->lookupOptions()) ?>;
	fbhld_view_chungtu_danhan_theothanggrid.lists["x_mavt"] = <?php echo $bhld_view_chungtu_danhan_theothang_grid->mavt->Lookup->toClientList($bhld_view_chungtu_danhan_theothang_grid) ?>;
	fbhld_view_chungtu_danhan_theothanggrid.lists["x_mavt"].options = <?php echo JsonEncode($bhld_view_chungtu_danhan_theothang_grid->mavt->lookupOptions()) ?>;
	loadjs.done("fbhld_view_chungtu_danhan_theothanggrid");
});
</script>
<?php } ?>
<?php
$bhld_view_chungtu_danhan_theothang_grid->renderOtherOptions();
?>
<?php if ($bhld_view_chungtu_danhan_theothang_grid->TotalRecords > 0 || $bhld_view_chungtu_danhan_theothang->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($bhld_view_chungtu_danhan_theothang_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> bhld_view_chungtu_danhan_theothang">
<?php if ($bhld_view_chungtu_danhan_theothang_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $bhld_view_chungtu_danhan_theothang_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fbhld_view_chungtu_danhan_theothanggrid" class="ew-form ew-list-form form-inline">
<div id="gmp_bhld_view_chungtu_danhan_theothang" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_bhld_view_chungtu_danhan_theothanggrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$bhld_view_chungtu_danhan_theothang->RowType = ROWTYPE_HEADER;

// Render list options
$bhld_view_chungtu_danhan_theothang_grid->renderListOptions();

// Render list options (header, left)
$bhld_view_chungtu_danhan_theothang_grid->ListOptions->render("header", "left");
?>
<?php if ($bhld_view_chungtu_danhan_theothang_grid->ngnhan->Visible) { // ngnhan ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_grid->SortUrl($bhld_view_chungtu_danhan_theothang_grid->ngnhan) == "") { ?>
		<th data-name="ngnhan" class="<?php echo $bhld_view_chungtu_danhan_theothang_grid->ngnhan->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_theothang_ngnhan" class="bhld_view_chungtu_danhan_theothang_ngnhan"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_grid->ngnhan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ngnhan" class="<?php echo $bhld_view_chungtu_danhan_theothang_grid->ngnhan->headerCellClass() ?>"><div><div id="elh_bhld_view_chungtu_danhan_theothang_ngnhan" class="bhld_view_chungtu_danhan_theothang_ngnhan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_grid->ngnhan->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_theothang_grid->ngnhan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_theothang_grid->ngnhan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang_grid->mapb->Visible) { // mapb ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_grid->SortUrl($bhld_view_chungtu_danhan_theothang_grid->mapb) == "") { ?>
		<th data-name="mapb" class="<?php echo $bhld_view_chungtu_danhan_theothang_grid->mapb->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_theothang_mapb" class="bhld_view_chungtu_danhan_theothang_mapb"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_grid->mapb->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mapb" class="<?php echo $bhld_view_chungtu_danhan_theothang_grid->mapb->headerCellClass() ?>"><div><div id="elh_bhld_view_chungtu_danhan_theothang_mapb" class="bhld_view_chungtu_danhan_theothang_mapb">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_grid->mapb->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_theothang_grid->mapb->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_theothang_grid->mapb->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang_grid->manv->Visible) { // manv ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_grid->SortUrl($bhld_view_chungtu_danhan_theothang_grid->manv) == "") { ?>
		<th data-name="manv" class="<?php echo $bhld_view_chungtu_danhan_theothang_grid->manv->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_theothang_manv" class="bhld_view_chungtu_danhan_theothang_manv"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_grid->manv->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="manv" class="<?php echo $bhld_view_chungtu_danhan_theothang_grid->manv->headerCellClass() ?>"><div><div id="elh_bhld_view_chungtu_danhan_theothang_manv" class="bhld_view_chungtu_danhan_theothang_manv">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_grid->manv->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_theothang_grid->manv->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_theothang_grid->manv->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang_grid->mavt->Visible) { // mavt ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_grid->SortUrl($bhld_view_chungtu_danhan_theothang_grid->mavt) == "") { ?>
		<th data-name="mavt" class="<?php echo $bhld_view_chungtu_danhan_theothang_grid->mavt->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_theothang_mavt" class="bhld_view_chungtu_danhan_theothang_mavt"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_grid->mavt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mavt" class="<?php echo $bhld_view_chungtu_danhan_theothang_grid->mavt->headerCellClass() ?>"><div><div id="elh_bhld_view_chungtu_danhan_theothang_mavt" class="bhld_view_chungtu_danhan_theothang_mavt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_grid->mavt->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_theothang_grid->mavt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_theothang_grid->mavt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang_grid->sl->Visible) { // sl ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_grid->SortUrl($bhld_view_chungtu_danhan_theothang_grid->sl) == "") { ?>
		<th data-name="sl" class="<?php echo $bhld_view_chungtu_danhan_theothang_grid->sl->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_theothang_sl" class="bhld_view_chungtu_danhan_theothang_sl"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_grid->sl->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sl" class="<?php echo $bhld_view_chungtu_danhan_theothang_grid->sl->headerCellClass() ?>"><div><div id="elh_bhld_view_chungtu_danhan_theothang_sl" class="bhld_view_chungtu_danhan_theothang_sl">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_grid->sl->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_theothang_grid->sl->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_theothang_grid->sl->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang_grid->dmtg->Visible) { // dmtg ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_grid->SortUrl($bhld_view_chungtu_danhan_theothang_grid->dmtg) == "") { ?>
		<th data-name="dmtg" class="<?php echo $bhld_view_chungtu_danhan_theothang_grid->dmtg->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_theothang_dmtg" class="bhld_view_chungtu_danhan_theothang_dmtg"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_grid->dmtg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dmtg" class="<?php echo $bhld_view_chungtu_danhan_theothang_grid->dmtg->headerCellClass() ?>"><div><div id="elh_bhld_view_chungtu_danhan_theothang_dmtg" class="bhld_view_chungtu_danhan_theothang_dmtg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_grid->dmtg->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_theothang_grid->dmtg->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_theothang_grid->dmtg->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$bhld_view_chungtu_danhan_theothang_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$bhld_view_chungtu_danhan_theothang_grid->StartRecord = 1;
$bhld_view_chungtu_danhan_theothang_grid->StopRecord = $bhld_view_chungtu_danhan_theothang_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($bhld_view_chungtu_danhan_theothang->isConfirm() || $bhld_view_chungtu_danhan_theothang_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($bhld_view_chungtu_danhan_theothang_grid->FormKeyCountName) && ($bhld_view_chungtu_danhan_theothang_grid->isGridAdd() || $bhld_view_chungtu_danhan_theothang_grid->isGridEdit() || $bhld_view_chungtu_danhan_theothang->isConfirm())) {
		$bhld_view_chungtu_danhan_theothang_grid->KeyCount = $CurrentForm->getValue($bhld_view_chungtu_danhan_theothang_grid->FormKeyCountName);
		$bhld_view_chungtu_danhan_theothang_grid->StopRecord = $bhld_view_chungtu_danhan_theothang_grid->StartRecord + $bhld_view_chungtu_danhan_theothang_grid->KeyCount - 1;
	}
}
$bhld_view_chungtu_danhan_theothang_grid->RecordCount = $bhld_view_chungtu_danhan_theothang_grid->StartRecord - 1;
if ($bhld_view_chungtu_danhan_theothang_grid->Recordset && !$bhld_view_chungtu_danhan_theothang_grid->Recordset->EOF) {
	$bhld_view_chungtu_danhan_theothang_grid->Recordset->moveFirst();
	$selectLimit = $bhld_view_chungtu_danhan_theothang_grid->UseSelectLimit;
	if (!$selectLimit && $bhld_view_chungtu_danhan_theothang_grid->StartRecord > 1)
		$bhld_view_chungtu_danhan_theothang_grid->Recordset->move($bhld_view_chungtu_danhan_theothang_grid->StartRecord - 1);
} elseif (!$bhld_view_chungtu_danhan_theothang->AllowAddDeleteRow && $bhld_view_chungtu_danhan_theothang_grid->StopRecord == 0) {
	$bhld_view_chungtu_danhan_theothang_grid->StopRecord = $bhld_view_chungtu_danhan_theothang->GridAddRowCount;
}

// Initialize aggregate
$bhld_view_chungtu_danhan_theothang->RowType = ROWTYPE_AGGREGATEINIT;
$bhld_view_chungtu_danhan_theothang->resetAttributes();
$bhld_view_chungtu_danhan_theothang_grid->renderRow();
if ($bhld_view_chungtu_danhan_theothang_grid->isGridAdd())
	$bhld_view_chungtu_danhan_theothang_grid->RowIndex = 0;
if ($bhld_view_chungtu_danhan_theothang_grid->isGridEdit())
	$bhld_view_chungtu_danhan_theothang_grid->RowIndex = 0;
while ($bhld_view_chungtu_danhan_theothang_grid->RecordCount < $bhld_view_chungtu_danhan_theothang_grid->StopRecord) {
	$bhld_view_chungtu_danhan_theothang_grid->RecordCount++;
	if ($bhld_view_chungtu_danhan_theothang_grid->RecordCount >= $bhld_view_chungtu_danhan_theothang_grid->StartRecord) {
		$bhld_view_chungtu_danhan_theothang_grid->RowCount++;
		if ($bhld_view_chungtu_danhan_theothang_grid->isGridAdd() || $bhld_view_chungtu_danhan_theothang_grid->isGridEdit() || $bhld_view_chungtu_danhan_theothang->isConfirm()) {
			$bhld_view_chungtu_danhan_theothang_grid->RowIndex++;
			$CurrentForm->Index = $bhld_view_chungtu_danhan_theothang_grid->RowIndex;
			if ($CurrentForm->hasValue($bhld_view_chungtu_danhan_theothang_grid->FormActionName) && ($bhld_view_chungtu_danhan_theothang->isConfirm() || $bhld_view_chungtu_danhan_theothang_grid->EventCancelled))
				$bhld_view_chungtu_danhan_theothang_grid->RowAction = strval($CurrentForm->getValue($bhld_view_chungtu_danhan_theothang_grid->FormActionName));
			elseif ($bhld_view_chungtu_danhan_theothang_grid->isGridAdd())
				$bhld_view_chungtu_danhan_theothang_grid->RowAction = "insert";
			else
				$bhld_view_chungtu_danhan_theothang_grid->RowAction = "";
		}

		// Set up key count
		$bhld_view_chungtu_danhan_theothang_grid->KeyCount = $bhld_view_chungtu_danhan_theothang_grid->RowIndex;

		// Init row class and style
		$bhld_view_chungtu_danhan_theothang->resetAttributes();
		$bhld_view_chungtu_danhan_theothang->CssClass = "";
		if ($bhld_view_chungtu_danhan_theothang_grid->isGridAdd()) {
			if ($bhld_view_chungtu_danhan_theothang->CurrentMode == "copy") {
				$bhld_view_chungtu_danhan_theothang_grid->loadRowValues($bhld_view_chungtu_danhan_theothang_grid->Recordset); // Load row values
				$bhld_view_chungtu_danhan_theothang_grid->setRecordKey($bhld_view_chungtu_danhan_theothang_grid->RowOldKey, $bhld_view_chungtu_danhan_theothang_grid->Recordset); // Set old record key
			} else {
				$bhld_view_chungtu_danhan_theothang_grid->loadRowValues(); // Load default values
				$bhld_view_chungtu_danhan_theothang_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$bhld_view_chungtu_danhan_theothang_grid->loadRowValues($bhld_view_chungtu_danhan_theothang_grid->Recordset); // Load row values
		}
		$bhld_view_chungtu_danhan_theothang->RowType = ROWTYPE_VIEW; // Render view
		if ($bhld_view_chungtu_danhan_theothang_grid->isGridAdd()) // Grid add
			$bhld_view_chungtu_danhan_theothang->RowType = ROWTYPE_ADD; // Render add
		if ($bhld_view_chungtu_danhan_theothang_grid->isGridAdd() && $bhld_view_chungtu_danhan_theothang->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$bhld_view_chungtu_danhan_theothang_grid->restoreCurrentRowFormValues($bhld_view_chungtu_danhan_theothang_grid->RowIndex); // Restore form values
		if ($bhld_view_chungtu_danhan_theothang_grid->isGridEdit()) { // Grid edit
			if ($bhld_view_chungtu_danhan_theothang->EventCancelled)
				$bhld_view_chungtu_danhan_theothang_grid->restoreCurrentRowFormValues($bhld_view_chungtu_danhan_theothang_grid->RowIndex); // Restore form values
			if ($bhld_view_chungtu_danhan_theothang_grid->RowAction == "insert")
				$bhld_view_chungtu_danhan_theothang->RowType = ROWTYPE_ADD; // Render add
			else
				$bhld_view_chungtu_danhan_theothang->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($bhld_view_chungtu_danhan_theothang_grid->isGridEdit() && ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_EDIT || $bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_ADD) && $bhld_view_chungtu_danhan_theothang->EventCancelled) // Update failed
			$bhld_view_chungtu_danhan_theothang_grid->restoreCurrentRowFormValues($bhld_view_chungtu_danhan_theothang_grid->RowIndex); // Restore form values
		if ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_EDIT) // Edit row
			$bhld_view_chungtu_danhan_theothang_grid->EditRowCount++;
		if ($bhld_view_chungtu_danhan_theothang->isConfirm()) // Confirm row
			$bhld_view_chungtu_danhan_theothang_grid->restoreCurrentRowFormValues($bhld_view_chungtu_danhan_theothang_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$bhld_view_chungtu_danhan_theothang->RowAttrs->merge(["data-rowindex" => $bhld_view_chungtu_danhan_theothang_grid->RowCount, "id" => "r" . $bhld_view_chungtu_danhan_theothang_grid->RowCount . "_bhld_view_chungtu_danhan_theothang", "data-rowtype" => $bhld_view_chungtu_danhan_theothang->RowType]);

		// Render row
		$bhld_view_chungtu_danhan_theothang_grid->renderRow();

		// Render list options
		$bhld_view_chungtu_danhan_theothang_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($bhld_view_chungtu_danhan_theothang_grid->RowAction != "delete" && $bhld_view_chungtu_danhan_theothang_grid->RowAction != "insertdelete" && !($bhld_view_chungtu_danhan_theothang_grid->RowAction == "insert" && $bhld_view_chungtu_danhan_theothang->isConfirm() && $bhld_view_chungtu_danhan_theothang_grid->emptyRow())) {
?>
	<tr <?php echo $bhld_view_chungtu_danhan_theothang->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bhld_view_chungtu_danhan_theothang_grid->ListOptions->render("body", "left", $bhld_view_chungtu_danhan_theothang_grid->RowCount);
?>
	<?php if ($bhld_view_chungtu_danhan_theothang_grid->ngnhan->Visible) { // ngnhan ?>
		<td data-name="ngnhan" <?php echo $bhld_view_chungtu_danhan_theothang_grid->ngnhan->cellAttributes() ?>>
<?php if ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowCount ?>_bhld_view_chungtu_danhan_theothang_ngnhan" class="form-group">
<input type="text" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_ngnhan" data-format="7" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan" maxlength="10" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->ngnhan->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_theothang_grid->ngnhan->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_theothang_grid->ngnhan->editAttributes() ?>>
<?php if (!$bhld_view_chungtu_danhan_theothang_grid->ngnhan->ReadOnly && !$bhld_view_chungtu_danhan_theothang_grid->ngnhan->Disabled && !isset($bhld_view_chungtu_danhan_theothang_grid->ngnhan->EditAttrs["readonly"]) && !isset($bhld_view_chungtu_danhan_theothang_grid->ngnhan->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbhld_view_chungtu_danhan_theothanggrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fbhld_view_chungtu_danhan_theothanggrid", "x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_ngnhan" name="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan" id="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->ngnhan->OldValue) ?>">
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowCount ?>_bhld_view_chungtu_danhan_theothang_ngnhan" class="form-group">
<input type="text" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_ngnhan" data-format="7" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan" maxlength="10" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->ngnhan->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_theothang_grid->ngnhan->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_theothang_grid->ngnhan->editAttributes() ?>>
<?php if (!$bhld_view_chungtu_danhan_theothang_grid->ngnhan->ReadOnly && !$bhld_view_chungtu_danhan_theothang_grid->ngnhan->Disabled && !isset($bhld_view_chungtu_danhan_theothang_grid->ngnhan->EditAttrs["readonly"]) && !isset($bhld_view_chungtu_danhan_theothang_grid->ngnhan->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbhld_view_chungtu_danhan_theothanggrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fbhld_view_chungtu_danhan_theothanggrid", "x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowCount ?>_bhld_view_chungtu_danhan_theothang_ngnhan">
<span<?php echo $bhld_view_chungtu_danhan_theothang_grid->ngnhan->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_theothang_grid->ngnhan->getViewValue() ?></span>
</span>
<?php if (!$bhld_view_chungtu_danhan_theothang->isConfirm()) { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_ngnhan" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->ngnhan->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_ngnhan" name="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan" id="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->ngnhan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_ngnhan" name="fbhld_view_chungtu_danhan_theothanggrid$x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan" id="fbhld_view_chungtu_danhan_theothanggrid$x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->ngnhan->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_ngnhan" name="fbhld_view_chungtu_danhan_theothanggrid$o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan" id="fbhld_view_chungtu_danhan_theothanggrid$o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->ngnhan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mact" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mact" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->mact->CurrentValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mact" name="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mact" id="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->mact->OldValue) ?>">
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_EDIT || $bhld_view_chungtu_danhan_theothang->CurrentMode == "edit") { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mact" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mact" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->mact->CurrentValue) ?>">
<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_grid->mapb->Visible) { // mapb ?>
		<td data-name="mapb" <?php echo $bhld_view_chungtu_danhan_theothang_grid->mapb->cellAttributes() ?>>
<?php if ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowCount ?>_bhld_view_chungtu_danhan_theothang_mapb" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mapb" data-value-separator="<?php echo $bhld_view_chungtu_danhan_theothang_grid->mapb->displayValueSeparatorAttribute() ?>" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mapb" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mapb"<?php echo $bhld_view_chungtu_danhan_theothang_grid->mapb->editAttributes() ?>>
			<?php echo $bhld_view_chungtu_danhan_theothang_grid->mapb->selectOptionListHtml("x{$bhld_view_chungtu_danhan_theothang_grid->RowIndex}_mapb") ?>
		</select>
</div>
<?php echo $bhld_view_chungtu_danhan_theothang_grid->mapb->Lookup->getParamTag($bhld_view_chungtu_danhan_theothang_grid, "p_x" . $bhld_view_chungtu_danhan_theothang_grid->RowIndex . "_mapb") ?>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mapb" name="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mapb" id="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mapb" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->mapb->OldValue) ?>">
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowCount ?>_bhld_view_chungtu_danhan_theothang_mapb" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mapb" data-value-separator="<?php echo $bhld_view_chungtu_danhan_theothang_grid->mapb->displayValueSeparatorAttribute() ?>" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mapb" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mapb"<?php echo $bhld_view_chungtu_danhan_theothang_grid->mapb->editAttributes() ?>>
			<?php echo $bhld_view_chungtu_danhan_theothang_grid->mapb->selectOptionListHtml("x{$bhld_view_chungtu_danhan_theothang_grid->RowIndex}_mapb") ?>
		</select>
</div>
<?php echo $bhld_view_chungtu_danhan_theothang_grid->mapb->Lookup->getParamTag($bhld_view_chungtu_danhan_theothang_grid, "p_x" . $bhld_view_chungtu_danhan_theothang_grid->RowIndex . "_mapb") ?>
</span>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowCount ?>_bhld_view_chungtu_danhan_theothang_mapb">
<span<?php echo $bhld_view_chungtu_danhan_theothang_grid->mapb->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_theothang_grid->mapb->getViewValue() ?></span>
</span>
<?php if (!$bhld_view_chungtu_danhan_theothang->isConfirm()) { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mapb" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mapb" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mapb" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->mapb->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mapb" name="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mapb" id="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mapb" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->mapb->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mapb" name="fbhld_view_chungtu_danhan_theothanggrid$x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mapb" id="fbhld_view_chungtu_danhan_theothanggrid$x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mapb" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->mapb->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mapb" name="fbhld_view_chungtu_danhan_theothanggrid$o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mapb" id="fbhld_view_chungtu_danhan_theothanggrid$o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mapb" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->mapb->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_grid->manv->Visible) { // manv ?>
		<td data-name="manv" <?php echo $bhld_view_chungtu_danhan_theothang_grid->manv->cellAttributes() ?>>
<?php if ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowCount ?>_bhld_view_chungtu_danhan_theothang_manv" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_manv" data-value-separator="<?php echo $bhld_view_chungtu_danhan_theothang_grid->manv->displayValueSeparatorAttribute() ?>" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_manv" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_manv"<?php echo $bhld_view_chungtu_danhan_theothang_grid->manv->editAttributes() ?>>
			<?php echo $bhld_view_chungtu_danhan_theothang_grid->manv->selectOptionListHtml("x{$bhld_view_chungtu_danhan_theothang_grid->RowIndex}_manv") ?>
		</select>
</div>
<?php echo $bhld_view_chungtu_danhan_theothang_grid->manv->Lookup->getParamTag($bhld_view_chungtu_danhan_theothang_grid, "p_x" . $bhld_view_chungtu_danhan_theothang_grid->RowIndex . "_manv") ?>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_manv" name="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_manv" id="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_manv" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->manv->OldValue) ?>">
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowCount ?>_bhld_view_chungtu_danhan_theothang_manv" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_manv" data-value-separator="<?php echo $bhld_view_chungtu_danhan_theothang_grid->manv->displayValueSeparatorAttribute() ?>" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_manv" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_manv"<?php echo $bhld_view_chungtu_danhan_theothang_grid->manv->editAttributes() ?>>
			<?php echo $bhld_view_chungtu_danhan_theothang_grid->manv->selectOptionListHtml("x{$bhld_view_chungtu_danhan_theothang_grid->RowIndex}_manv") ?>
		</select>
</div>
<?php echo $bhld_view_chungtu_danhan_theothang_grid->manv->Lookup->getParamTag($bhld_view_chungtu_danhan_theothang_grid, "p_x" . $bhld_view_chungtu_danhan_theothang_grid->RowIndex . "_manv") ?>
</span>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowCount ?>_bhld_view_chungtu_danhan_theothang_manv">
<span<?php echo $bhld_view_chungtu_danhan_theothang_grid->manv->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_theothang_grid->manv->getViewValue() ?></span>
</span>
<?php if (!$bhld_view_chungtu_danhan_theothang->isConfirm()) { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_manv" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_manv" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_manv" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->manv->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_manv" name="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_manv" id="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_manv" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->manv->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_manv" name="fbhld_view_chungtu_danhan_theothanggrid$x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_manv" id="fbhld_view_chungtu_danhan_theothanggrid$x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_manv" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->manv->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_manv" name="fbhld_view_chungtu_danhan_theothanggrid$o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_manv" id="fbhld_view_chungtu_danhan_theothanggrid$o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_manv" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->manv->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_grid->mavt->Visible) { // mavt ?>
		<td data-name="mavt" <?php echo $bhld_view_chungtu_danhan_theothang_grid->mavt->cellAttributes() ?>>
<?php if ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowCount ?>_bhld_view_chungtu_danhan_theothang_mavt" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mavt" data-value-separator="<?php echo $bhld_view_chungtu_danhan_theothang_grid->mavt->displayValueSeparatorAttribute() ?>" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mavt" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mavt"<?php echo $bhld_view_chungtu_danhan_theothang_grid->mavt->editAttributes() ?>>
			<?php echo $bhld_view_chungtu_danhan_theothang_grid->mavt->selectOptionListHtml("x{$bhld_view_chungtu_danhan_theothang_grid->RowIndex}_mavt") ?>
		</select>
</div>
<?php echo $bhld_view_chungtu_danhan_theothang_grid->mavt->Lookup->getParamTag($bhld_view_chungtu_danhan_theothang_grid, "p_x" . $bhld_view_chungtu_danhan_theothang_grid->RowIndex . "_mavt") ?>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mavt" name="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mavt" id="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->mavt->OldValue) ?>">
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_EDIT) { // Edit record ?>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mavt" data-value-separator="<?php echo $bhld_view_chungtu_danhan_theothang_grid->mavt->displayValueSeparatorAttribute() ?>" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mavt" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mavt"<?php echo $bhld_view_chungtu_danhan_theothang_grid->mavt->editAttributes() ?>>
			<?php echo $bhld_view_chungtu_danhan_theothang_grid->mavt->selectOptionListHtml("x{$bhld_view_chungtu_danhan_theothang_grid->RowIndex}_mavt") ?>
		</select>
</div>
<?php echo $bhld_view_chungtu_danhan_theothang_grid->mavt->Lookup->getParamTag($bhld_view_chungtu_danhan_theothang_grid, "p_x" . $bhld_view_chungtu_danhan_theothang_grid->RowIndex . "_mavt") ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mavt" name="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mavt" id="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->mavt->OldValue != null ? $bhld_view_chungtu_danhan_theothang_grid->mavt->OldValue : $bhld_view_chungtu_danhan_theothang_grid->mavt->CurrentValue) ?>">
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowCount ?>_bhld_view_chungtu_danhan_theothang_mavt">
<span<?php echo $bhld_view_chungtu_danhan_theothang_grid->mavt->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_theothang_grid->mavt->getViewValue() ?></span>
</span>
<?php if (!$bhld_view_chungtu_danhan_theothang->isConfirm()) { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mavt" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mavt" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->mavt->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mavt" name="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mavt" id="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->mavt->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mavt" name="fbhld_view_chungtu_danhan_theothanggrid$x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mavt" id="fbhld_view_chungtu_danhan_theothanggrid$x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->mavt->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mavt" name="fbhld_view_chungtu_danhan_theothanggrid$o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mavt" id="fbhld_view_chungtu_danhan_theothanggrid$o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->mavt->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_grid->sl->Visible) { // sl ?>
		<td data-name="sl" <?php echo $bhld_view_chungtu_danhan_theothang_grid->sl->cellAttributes() ?>>
<?php if ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowCount ?>_bhld_view_chungtu_danhan_theothang_sl" class="form-group">
<input type="text" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_sl" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_sl" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_sl" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->sl->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_theothang_grid->sl->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_theothang_grid->sl->editAttributes() ?>>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_sl" name="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_sl" id="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_sl" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->sl->OldValue) ?>">
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowCount ?>_bhld_view_chungtu_danhan_theothang_sl" class="form-group">
<input type="text" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_sl" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_sl" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_sl" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->sl->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_theothang_grid->sl->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_theothang_grid->sl->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowCount ?>_bhld_view_chungtu_danhan_theothang_sl">
<span<?php echo $bhld_view_chungtu_danhan_theothang_grid->sl->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_theothang_grid->sl->getViewValue() ?></span>
</span>
<?php if (!$bhld_view_chungtu_danhan_theothang->isConfirm()) { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_sl" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_sl" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_sl" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->sl->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_sl" name="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_sl" id="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_sl" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->sl->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_sl" name="fbhld_view_chungtu_danhan_theothanggrid$x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_sl" id="fbhld_view_chungtu_danhan_theothanggrid$x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_sl" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->sl->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_sl" name="fbhld_view_chungtu_danhan_theothanggrid$o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_sl" id="fbhld_view_chungtu_danhan_theothanggrid$o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_sl" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->sl->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_grid->dmtg->Visible) { // dmtg ?>
		<td data-name="dmtg" <?php echo $bhld_view_chungtu_danhan_theothang_grid->dmtg->cellAttributes() ?>>
<?php if ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowCount ?>_bhld_view_chungtu_danhan_theothang_dmtg" class="form-group">
<input type="text" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_dmtg" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_dmtg" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_dmtg" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->dmtg->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_theothang_grid->dmtg->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_theothang_grid->dmtg->editAttributes() ?>>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_dmtg" name="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_dmtg" id="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_dmtg" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->dmtg->OldValue) ?>">
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowCount ?>_bhld_view_chungtu_danhan_theothang_dmtg" class="form-group">
<input type="text" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_dmtg" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_dmtg" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_dmtg" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->dmtg->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_theothang_grid->dmtg->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_theothang_grid->dmtg->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowCount ?>_bhld_view_chungtu_danhan_theothang_dmtg">
<span<?php echo $bhld_view_chungtu_danhan_theothang_grid->dmtg->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_theothang_grid->dmtg->getViewValue() ?></span>
</span>
<?php if (!$bhld_view_chungtu_danhan_theothang->isConfirm()) { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_dmtg" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_dmtg" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_dmtg" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->dmtg->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_dmtg" name="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_dmtg" id="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_dmtg" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->dmtg->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_dmtg" name="fbhld_view_chungtu_danhan_theothanggrid$x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_dmtg" id="fbhld_view_chungtu_danhan_theothanggrid$x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_dmtg" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->dmtg->FormValue) ?>">
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_dmtg" name="fbhld_view_chungtu_danhan_theothanggrid$o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_dmtg" id="fbhld_view_chungtu_danhan_theothanggrid$o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_dmtg" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->dmtg->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bhld_view_chungtu_danhan_theothang_grid->ListOptions->render("body", "right", $bhld_view_chungtu_danhan_theothang_grid->RowCount);
?>
	</tr>
<?php if ($bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_ADD || $bhld_view_chungtu_danhan_theothang->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fbhld_view_chungtu_danhan_theothanggrid", "load"], function() {
	fbhld_view_chungtu_danhan_theothanggrid.updateLists(<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$bhld_view_chungtu_danhan_theothang_grid->isGridAdd() || $bhld_view_chungtu_danhan_theothang->CurrentMode == "copy")
		if (!$bhld_view_chungtu_danhan_theothang_grid->Recordset->EOF)
			$bhld_view_chungtu_danhan_theothang_grid->Recordset->moveNext();
}
?>
<?php
	if ($bhld_view_chungtu_danhan_theothang->CurrentMode == "add" || $bhld_view_chungtu_danhan_theothang->CurrentMode == "copy" || $bhld_view_chungtu_danhan_theothang->CurrentMode == "edit") {
		$bhld_view_chungtu_danhan_theothang_grid->RowIndex = '$rowindex$';
		$bhld_view_chungtu_danhan_theothang_grid->loadRowValues();

		// Set row properties
		$bhld_view_chungtu_danhan_theothang->resetAttributes();
		$bhld_view_chungtu_danhan_theothang->RowAttrs->merge(["data-rowindex" => $bhld_view_chungtu_danhan_theothang_grid->RowIndex, "id" => "r0_bhld_view_chungtu_danhan_theothang", "data-rowtype" => ROWTYPE_ADD]);
		$bhld_view_chungtu_danhan_theothang->RowAttrs->appendClass("ew-template");
		$bhld_view_chungtu_danhan_theothang->RowType = ROWTYPE_ADD;

		// Render row
		$bhld_view_chungtu_danhan_theothang_grid->renderRow();

		// Render list options
		$bhld_view_chungtu_danhan_theothang_grid->renderListOptions();
		$bhld_view_chungtu_danhan_theothang_grid->StartRowCount = 0;
?>
	<tr <?php echo $bhld_view_chungtu_danhan_theothang->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bhld_view_chungtu_danhan_theothang_grid->ListOptions->render("body", "left", $bhld_view_chungtu_danhan_theothang_grid->RowIndex);
?>
	<?php if ($bhld_view_chungtu_danhan_theothang_grid->ngnhan->Visible) { // ngnhan ?>
		<td data-name="ngnhan">
<?php if (!$bhld_view_chungtu_danhan_theothang->isConfirm()) { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_theothang_ngnhan" class="form-group bhld_view_chungtu_danhan_theothang_ngnhan">
<input type="text" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_ngnhan" data-format="7" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan" maxlength="10" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->ngnhan->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_theothang_grid->ngnhan->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_theothang_grid->ngnhan->editAttributes() ?>>
<?php if (!$bhld_view_chungtu_danhan_theothang_grid->ngnhan->ReadOnly && !$bhld_view_chungtu_danhan_theothang_grid->ngnhan->Disabled && !isset($bhld_view_chungtu_danhan_theothang_grid->ngnhan->EditAttrs["readonly"]) && !isset($bhld_view_chungtu_danhan_theothang_grid->ngnhan->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbhld_view_chungtu_danhan_theothanggrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fbhld_view_chungtu_danhan_theothanggrid", "x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_theothang_ngnhan" class="form-group bhld_view_chungtu_danhan_theothang_ngnhan">
<span<?php echo $bhld_view_chungtu_danhan_theothang_grid->ngnhan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_view_chungtu_danhan_theothang_grid->ngnhan->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_ngnhan" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->ngnhan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_ngnhan" name="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan" id="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_ngnhan" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->ngnhan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_grid->mapb->Visible) { // mapb ?>
		<td data-name="mapb">
<?php if (!$bhld_view_chungtu_danhan_theothang->isConfirm()) { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_theothang_mapb" class="form-group bhld_view_chungtu_danhan_theothang_mapb">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mapb" data-value-separator="<?php echo $bhld_view_chungtu_danhan_theothang_grid->mapb->displayValueSeparatorAttribute() ?>" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mapb" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mapb"<?php echo $bhld_view_chungtu_danhan_theothang_grid->mapb->editAttributes() ?>>
			<?php echo $bhld_view_chungtu_danhan_theothang_grid->mapb->selectOptionListHtml("x{$bhld_view_chungtu_danhan_theothang_grid->RowIndex}_mapb") ?>
		</select>
</div>
<?php echo $bhld_view_chungtu_danhan_theothang_grid->mapb->Lookup->getParamTag($bhld_view_chungtu_danhan_theothang_grid, "p_x" . $bhld_view_chungtu_danhan_theothang_grid->RowIndex . "_mapb") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_theothang_mapb" class="form-group bhld_view_chungtu_danhan_theothang_mapb">
<span<?php echo $bhld_view_chungtu_danhan_theothang_grid->mapb->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_view_chungtu_danhan_theothang_grid->mapb->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mapb" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mapb" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mapb" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->mapb->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mapb" name="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mapb" id="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mapb" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->mapb->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_grid->manv->Visible) { // manv ?>
		<td data-name="manv">
<?php if (!$bhld_view_chungtu_danhan_theothang->isConfirm()) { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_theothang_manv" class="form-group bhld_view_chungtu_danhan_theothang_manv">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_manv" data-value-separator="<?php echo $bhld_view_chungtu_danhan_theothang_grid->manv->displayValueSeparatorAttribute() ?>" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_manv" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_manv"<?php echo $bhld_view_chungtu_danhan_theothang_grid->manv->editAttributes() ?>>
			<?php echo $bhld_view_chungtu_danhan_theothang_grid->manv->selectOptionListHtml("x{$bhld_view_chungtu_danhan_theothang_grid->RowIndex}_manv") ?>
		</select>
</div>
<?php echo $bhld_view_chungtu_danhan_theothang_grid->manv->Lookup->getParamTag($bhld_view_chungtu_danhan_theothang_grid, "p_x" . $bhld_view_chungtu_danhan_theothang_grid->RowIndex . "_manv") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_theothang_manv" class="form-group bhld_view_chungtu_danhan_theothang_manv">
<span<?php echo $bhld_view_chungtu_danhan_theothang_grid->manv->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_view_chungtu_danhan_theothang_grid->manv->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_manv" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_manv" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_manv" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->manv->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_manv" name="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_manv" id="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_manv" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->manv->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_grid->mavt->Visible) { // mavt ?>
		<td data-name="mavt">
<?php if (!$bhld_view_chungtu_danhan_theothang->isConfirm()) { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_theothang_mavt" class="form-group bhld_view_chungtu_danhan_theothang_mavt">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mavt" data-value-separator="<?php echo $bhld_view_chungtu_danhan_theothang_grid->mavt->displayValueSeparatorAttribute() ?>" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mavt" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mavt"<?php echo $bhld_view_chungtu_danhan_theothang_grid->mavt->editAttributes() ?>>
			<?php echo $bhld_view_chungtu_danhan_theothang_grid->mavt->selectOptionListHtml("x{$bhld_view_chungtu_danhan_theothang_grid->RowIndex}_mavt") ?>
		</select>
</div>
<?php echo $bhld_view_chungtu_danhan_theothang_grid->mavt->Lookup->getParamTag($bhld_view_chungtu_danhan_theothang_grid, "p_x" . $bhld_view_chungtu_danhan_theothang_grid->RowIndex . "_mavt") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_theothang_mavt" class="form-group bhld_view_chungtu_danhan_theothang_mavt">
<span<?php echo $bhld_view_chungtu_danhan_theothang_grid->mavt->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_view_chungtu_danhan_theothang_grid->mavt->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mavt" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mavt" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->mavt->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_mavt" name="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mavt" id="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->mavt->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_grid->sl->Visible) { // sl ?>
		<td data-name="sl">
<?php if (!$bhld_view_chungtu_danhan_theothang->isConfirm()) { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_theothang_sl" class="form-group bhld_view_chungtu_danhan_theothang_sl">
<input type="text" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_sl" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_sl" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_sl" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->sl->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_theothang_grid->sl->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_theothang_grid->sl->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_theothang_sl" class="form-group bhld_view_chungtu_danhan_theothang_sl">
<span<?php echo $bhld_view_chungtu_danhan_theothang_grid->sl->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_view_chungtu_danhan_theothang_grid->sl->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_sl" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_sl" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_sl" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->sl->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_sl" name="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_sl" id="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_sl" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->sl->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_grid->dmtg->Visible) { // dmtg ?>
		<td data-name="dmtg">
<?php if (!$bhld_view_chungtu_danhan_theothang->isConfirm()) { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_theothang_dmtg" class="form-group bhld_view_chungtu_danhan_theothang_dmtg">
<input type="text" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_dmtg" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_dmtg" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_dmtg" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->dmtg->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_danhan_theothang_grid->dmtg->EditValue ?>"<?php echo $bhld_view_chungtu_danhan_theothang_grid->dmtg->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_bhld_view_chungtu_danhan_theothang_dmtg" class="form-group bhld_view_chungtu_danhan_theothang_dmtg">
<span<?php echo $bhld_view_chungtu_danhan_theothang_grid->dmtg->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_view_chungtu_danhan_theothang_grid->dmtg->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_dmtg" name="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_dmtg" id="x<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_dmtg" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->dmtg->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="bhld_view_chungtu_danhan_theothang" data-field="x_dmtg" name="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_dmtg" id="o<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>_dmtg" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_grid->dmtg->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bhld_view_chungtu_danhan_theothang_grid->ListOptions->render("body", "right", $bhld_view_chungtu_danhan_theothang_grid->RowIndex);
?>
<script>
loadjs.ready(["fbhld_view_chungtu_danhan_theothanggrid", "load"], function() {
	fbhld_view_chungtu_danhan_theothanggrid.updateLists(<?php echo $bhld_view_chungtu_danhan_theothang_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($bhld_view_chungtu_danhan_theothang->CurrentMode == "add" || $bhld_view_chungtu_danhan_theothang->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $bhld_view_chungtu_danhan_theothang_grid->FormKeyCountName ?>" id="<?php echo $bhld_view_chungtu_danhan_theothang_grid->FormKeyCountName ?>" value="<?php echo $bhld_view_chungtu_danhan_theothang_grid->KeyCount ?>">
<?php echo $bhld_view_chungtu_danhan_theothang_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $bhld_view_chungtu_danhan_theothang_grid->FormKeyCountName ?>" id="<?php echo $bhld_view_chungtu_danhan_theothang_grid->FormKeyCountName ?>" value="<?php echo $bhld_view_chungtu_danhan_theothang_grid->KeyCount ?>">
<?php echo $bhld_view_chungtu_danhan_theothang_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fbhld_view_chungtu_danhan_theothanggrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($bhld_view_chungtu_danhan_theothang_grid->Recordset)
	$bhld_view_chungtu_danhan_theothang_grid->Recordset->Close();
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang_grid->TotalRecords == 0 && !$bhld_view_chungtu_danhan_theothang->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $bhld_view_chungtu_danhan_theothang_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$bhld_view_chungtu_danhan_theothang_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$bhld_view_chungtu_danhan_theothang_grid->terminate();
?>
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
$bhld_ctctu_list = new bhld_ctctu_list();

// Run the page
$bhld_ctctu_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_ctctu_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$bhld_ctctu_list->isExport()) { ?>
<script>
var fbhld_ctctulist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fbhld_ctctulist = currentForm = new ew.Form("fbhld_ctctulist", "list");
	fbhld_ctctulist.formKeyCountName = '<?php echo $bhld_ctctu_list->FormKeyCountName ?>';

	// Validate form
	fbhld_ctctulist.validate = function() {
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
			<?php if ($bhld_ctctu_list->mact->Required) { ?>
				elm = this.getElements("x" + infix + "_mact");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctctu_list->mact->caption(), $bhld_ctctu_list->mact->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_ctctu_list->mavt->Required) { ?>
				elm = this.getElements("x" + infix + "_mavt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctctu_list->mavt->caption(), $bhld_ctctu_list->mavt->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_ctctu_list->dmtg->Required) { ?>
				elm = this.getElements("x" + infix + "_dmtg");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctctu_list->dmtg->caption(), $bhld_ctctu_list->dmtg->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_ctctu_list->sl->Required) { ?>
				elm = this.getElements("x" + infix + "_sl");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctctu_list->sl->caption(), $bhld_ctctu_list->sl->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sl");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_ctctu_list->sl->errorMessage()) ?>");
			<?php if ($bhld_ctctu_list->ngnhan->Required) { ?>
				elm = this.getElements("x" + infix + "_ngnhan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctctu_list->ngnhan->caption(), $bhld_ctctu_list->ngnhan->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_ctctu_list->ngnhantt->Required) { ?>
				elm = this.getElements("x" + infix + "_ngnhantt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctctu_list->ngnhantt->caption(), $bhld_ctctu_list->ngnhantt->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fbhld_ctctulist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbhld_ctctulist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fbhld_ctctulist.lists["x_mavt"] = <?php echo $bhld_ctctu_list->mavt->Lookup->toClientList($bhld_ctctu_list) ?>;
	fbhld_ctctulist.lists["x_mavt"].options = <?php echo JsonEncode($bhld_ctctu_list->mavt->lookupOptions()) ?>;
	fbhld_ctctulist.autoSuggests["x_mavt"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("fbhld_ctctulist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$bhld_ctctu_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($bhld_ctctu_list->TotalRecords > 0 && $bhld_ctctu_list->ExportOptions->visible()) { ?>
<?php $bhld_ctctu_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_ctctu_list->ImportOptions->visible()) { ?>
<?php $bhld_ctctu_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$bhld_ctctu_list->isExport() || Config("EXPORT_MASTER_RECORD") && $bhld_ctctu_list->isExport("print")) { ?>
<?php
if ($bhld_ctctu_list->DbMasterFilter != "" && $bhld_ctctu->getCurrentMasterTable() == "bhld_ctu") {
	if ($bhld_ctctu_list->MasterRecordExists) {
		include_once "bhld_ctumaster.php";
	}
}
?>
<?php } ?>
<?php
$bhld_ctctu_list->renderOtherOptions();
?>
<?php $bhld_ctctu_list->showPageHeader(); ?>
<?php
$bhld_ctctu_list->showMessage();
?>
<?php if ($bhld_ctctu_list->TotalRecords > 0 || $bhld_ctctu->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($bhld_ctctu_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> bhld_ctctu">
<?php if (!$bhld_ctctu_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$bhld_ctctu_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $bhld_ctctu_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $bhld_ctctu_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbhld_ctctulist" id="fbhld_ctctulist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_ctctu">
<?php if ($bhld_ctctu->getCurrentMasterTable() == "bhld_ctu" && $bhld_ctctu->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="bhld_ctu">
<input type="hidden" name="fk_mact" value="<?php echo HtmlEncode($bhld_ctctu_list->mact->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_bhld_ctctu" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($bhld_ctctu_list->TotalRecords > 0 || $bhld_ctctu_list->isGridEdit()) { ?>
<table id="tbl_bhld_ctctulist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$bhld_ctctu->RowType = ROWTYPE_HEADER;

// Render list options
$bhld_ctctu_list->renderListOptions();

// Render list options (header, left)
$bhld_ctctu_list->ListOptions->render("header", "left");
?>
<?php if ($bhld_ctctu_list->mact->Visible) { // mact ?>
	<?php if ($bhld_ctctu_list->SortUrl($bhld_ctctu_list->mact) == "") { ?>
		<th data-name="mact" class="<?php echo $bhld_ctctu_list->mact->headerCellClass() ?>"><div id="elh_bhld_ctctu_mact" class="bhld_ctctu_mact"><div class="ew-table-header-caption"><?php echo $bhld_ctctu_list->mact->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mact" class="<?php echo $bhld_ctctu_list->mact->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_ctctu_list->SortUrl($bhld_ctctu_list->mact) ?>', 1);"><div id="elh_bhld_ctctu_mact" class="bhld_ctctu_mact">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctctu_list->mact->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctctu_list->mact->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctctu_list->mact->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_ctctu_list->mavt->Visible) { // mavt ?>
	<?php if ($bhld_ctctu_list->SortUrl($bhld_ctctu_list->mavt) == "") { ?>
		<th data-name="mavt" class="<?php echo $bhld_ctctu_list->mavt->headerCellClass() ?>"><div id="elh_bhld_ctctu_mavt" class="bhld_ctctu_mavt"><div class="ew-table-header-caption"><?php echo $bhld_ctctu_list->mavt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mavt" class="<?php echo $bhld_ctctu_list->mavt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_ctctu_list->SortUrl($bhld_ctctu_list->mavt) ?>', 1);"><div id="elh_bhld_ctctu_mavt" class="bhld_ctctu_mavt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctctu_list->mavt->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctctu_list->mavt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctctu_list->mavt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_ctctu_list->dmtg->Visible) { // dmtg ?>
	<?php if ($bhld_ctctu_list->SortUrl($bhld_ctctu_list->dmtg) == "") { ?>
		<th data-name="dmtg" class="<?php echo $bhld_ctctu_list->dmtg->headerCellClass() ?>"><div id="elh_bhld_ctctu_dmtg" class="bhld_ctctu_dmtg"><div class="ew-table-header-caption"><?php echo $bhld_ctctu_list->dmtg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dmtg" class="<?php echo $bhld_ctctu_list->dmtg->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_ctctu_list->SortUrl($bhld_ctctu_list->dmtg) ?>', 1);"><div id="elh_bhld_ctctu_dmtg" class="bhld_ctctu_dmtg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctctu_list->dmtg->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctctu_list->dmtg->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctctu_list->dmtg->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_ctctu_list->sl->Visible) { // sl ?>
	<?php if ($bhld_ctctu_list->SortUrl($bhld_ctctu_list->sl) == "") { ?>
		<th data-name="sl" class="<?php echo $bhld_ctctu_list->sl->headerCellClass() ?>"><div id="elh_bhld_ctctu_sl" class="bhld_ctctu_sl"><div class="ew-table-header-caption"><?php echo $bhld_ctctu_list->sl->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sl" class="<?php echo $bhld_ctctu_list->sl->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_ctctu_list->SortUrl($bhld_ctctu_list->sl) ?>', 1);"><div id="elh_bhld_ctctu_sl" class="bhld_ctctu_sl">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctctu_list->sl->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctctu_list->sl->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctctu_list->sl->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_ctctu_list->ngnhan->Visible) { // ngnhan ?>
	<?php if ($bhld_ctctu_list->SortUrl($bhld_ctctu_list->ngnhan) == "") { ?>
		<th data-name="ngnhan" class="<?php echo $bhld_ctctu_list->ngnhan->headerCellClass() ?>"><div id="elh_bhld_ctctu_ngnhan" class="bhld_ctctu_ngnhan"><div class="ew-table-header-caption"><?php echo $bhld_ctctu_list->ngnhan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ngnhan" class="<?php echo $bhld_ctctu_list->ngnhan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_ctctu_list->SortUrl($bhld_ctctu_list->ngnhan) ?>', 1);"><div id="elh_bhld_ctctu_ngnhan" class="bhld_ctctu_ngnhan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctctu_list->ngnhan->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctctu_list->ngnhan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctctu_list->ngnhan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_ctctu_list->ngnhantt->Visible) { // ngnhantt ?>
	<?php if ($bhld_ctctu_list->SortUrl($bhld_ctctu_list->ngnhantt) == "") { ?>
		<th data-name="ngnhantt" class="<?php echo $bhld_ctctu_list->ngnhantt->headerCellClass() ?>"><div id="elh_bhld_ctctu_ngnhantt" class="bhld_ctctu_ngnhantt"><div class="ew-table-header-caption"><?php echo $bhld_ctctu_list->ngnhantt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ngnhantt" class="<?php echo $bhld_ctctu_list->ngnhantt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_ctctu_list->SortUrl($bhld_ctctu_list->ngnhantt) ?>', 1);"><div id="elh_bhld_ctctu_ngnhantt" class="bhld_ctctu_ngnhantt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctctu_list->ngnhantt->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctctu_list->ngnhantt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctctu_list->ngnhantt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$bhld_ctctu_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($bhld_ctctu_list->ExportAll && $bhld_ctctu_list->isExport()) {
	$bhld_ctctu_list->StopRecord = $bhld_ctctu_list->TotalRecords;
} else {

	// Set the last record to display
	if ($bhld_ctctu_list->TotalRecords > $bhld_ctctu_list->StartRecord + $bhld_ctctu_list->DisplayRecords - 1)
		$bhld_ctctu_list->StopRecord = $bhld_ctctu_list->StartRecord + $bhld_ctctu_list->DisplayRecords - 1;
	else
		$bhld_ctctu_list->StopRecord = $bhld_ctctu_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($bhld_ctctu->isConfirm() || $bhld_ctctu_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($bhld_ctctu_list->FormKeyCountName) && ($bhld_ctctu_list->isGridAdd() || $bhld_ctctu_list->isGridEdit() || $bhld_ctctu->isConfirm())) {
		$bhld_ctctu_list->KeyCount = $CurrentForm->getValue($bhld_ctctu_list->FormKeyCountName);
		$bhld_ctctu_list->StopRecord = $bhld_ctctu_list->StartRecord + $bhld_ctctu_list->KeyCount - 1;
	}
}
$bhld_ctctu_list->RecordCount = $bhld_ctctu_list->StartRecord - 1;
if ($bhld_ctctu_list->Recordset && !$bhld_ctctu_list->Recordset->EOF) {
	$bhld_ctctu_list->Recordset->moveFirst();
	$selectLimit = $bhld_ctctu_list->UseSelectLimit;
	if (!$selectLimit && $bhld_ctctu_list->StartRecord > 1)
		$bhld_ctctu_list->Recordset->move($bhld_ctctu_list->StartRecord - 1);
} elseif (!$bhld_ctctu->AllowAddDeleteRow && $bhld_ctctu_list->StopRecord == 0) {
	$bhld_ctctu_list->StopRecord = $bhld_ctctu->GridAddRowCount;
}

// Initialize aggregate
$bhld_ctctu->RowType = ROWTYPE_AGGREGATEINIT;
$bhld_ctctu->resetAttributes();
$bhld_ctctu_list->renderRow();
if ($bhld_ctctu_list->isGridEdit())
	$bhld_ctctu_list->RowIndex = 0;
while ($bhld_ctctu_list->RecordCount < $bhld_ctctu_list->StopRecord) {
	$bhld_ctctu_list->RecordCount++;
	if ($bhld_ctctu_list->RecordCount >= $bhld_ctctu_list->StartRecord) {
		$bhld_ctctu_list->RowCount++;
		if ($bhld_ctctu_list->isGridAdd() || $bhld_ctctu_list->isGridEdit() || $bhld_ctctu->isConfirm()) {
			$bhld_ctctu_list->RowIndex++;
			$CurrentForm->Index = $bhld_ctctu_list->RowIndex;
			if ($CurrentForm->hasValue($bhld_ctctu_list->FormActionName) && ($bhld_ctctu->isConfirm() || $bhld_ctctu_list->EventCancelled))
				$bhld_ctctu_list->RowAction = strval($CurrentForm->getValue($bhld_ctctu_list->FormActionName));
			elseif ($bhld_ctctu_list->isGridAdd())
				$bhld_ctctu_list->RowAction = "insert";
			else
				$bhld_ctctu_list->RowAction = "";
		}

		// Set up key count
		$bhld_ctctu_list->KeyCount = $bhld_ctctu_list->RowIndex;

		// Init row class and style
		$bhld_ctctu->resetAttributes();
		$bhld_ctctu->CssClass = "";
		if ($bhld_ctctu_list->isGridAdd()) {
			$bhld_ctctu_list->loadRowValues(); // Load default values
		} else {
			$bhld_ctctu_list->loadRowValues($bhld_ctctu_list->Recordset); // Load row values
		}
		$bhld_ctctu->RowType = ROWTYPE_VIEW; // Render view
		if ($bhld_ctctu_list->isGridEdit()) { // Grid edit
			if ($bhld_ctctu->EventCancelled)
				$bhld_ctctu_list->restoreCurrentRowFormValues($bhld_ctctu_list->RowIndex); // Restore form values
			if ($bhld_ctctu_list->RowAction == "insert")
				$bhld_ctctu->RowType = ROWTYPE_ADD; // Render add
			else
				$bhld_ctctu->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($bhld_ctctu_list->isGridEdit() && ($bhld_ctctu->RowType == ROWTYPE_EDIT || $bhld_ctctu->RowType == ROWTYPE_ADD) && $bhld_ctctu->EventCancelled) // Update failed
			$bhld_ctctu_list->restoreCurrentRowFormValues($bhld_ctctu_list->RowIndex); // Restore form values
		if ($bhld_ctctu->RowType == ROWTYPE_EDIT) // Edit row
			$bhld_ctctu_list->EditRowCount++;

		// Set up row id / data-rowindex
		$bhld_ctctu->RowAttrs->merge(["data-rowindex" => $bhld_ctctu_list->RowCount, "id" => "r" . $bhld_ctctu_list->RowCount . "_bhld_ctctu", "data-rowtype" => $bhld_ctctu->RowType]);

		// Render row
		$bhld_ctctu_list->renderRow();

		// Render list options
		$bhld_ctctu_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($bhld_ctctu_list->RowAction != "delete" && $bhld_ctctu_list->RowAction != "insertdelete" && !($bhld_ctctu_list->RowAction == "insert" && $bhld_ctctu->isConfirm() && $bhld_ctctu_list->emptyRow())) {
?>
	<tr <?php echo $bhld_ctctu->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bhld_ctctu_list->ListOptions->render("body", "left", $bhld_ctctu_list->RowCount);
?>
	<?php if ($bhld_ctctu_list->mact->Visible) { // mact ?>
		<td data-name="mact" <?php echo $bhld_ctctu_list->mact->cellAttributes() ?>>
<?php if ($bhld_ctctu->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($bhld_ctctu_list->mact->getSessionValue() != "") { ?>
<span id="el<?php echo $bhld_ctctu_list->RowCount ?>_bhld_ctctu_mact" class="form-group">
<span<?php echo $bhld_ctctu_list->mact->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_ctctu_list->mact->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $bhld_ctctu_list->RowIndex ?>_mact" name="x<?php echo $bhld_ctctu_list->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_ctctu_list->mact->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $bhld_ctctu_list->RowCount ?>_bhld_ctctu_mact" class="form-group">
<input type="text" data-table="bhld_ctctu" data-field="x_mact" name="x<?php echo $bhld_ctctu_list->RowIndex ?>_mact" id="x<?php echo $bhld_ctctu_list->RowIndex ?>_mact" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctctu_list->mact->getPlaceHolder()) ?>" value="<?php echo $bhld_ctctu_list->mact->EditValue ?>"<?php echo $bhld_ctctu_list->mact->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="bhld_ctctu" data-field="x_mact" name="o<?php echo $bhld_ctctu_list->RowIndex ?>_mact" id="o<?php echo $bhld_ctctu_list->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_ctctu_list->mact->OldValue) ?>">
<?php } ?>
<?php if ($bhld_ctctu->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $bhld_ctctu_list->RowCount ?>_bhld_ctctu_mact" class="form-group">
<span<?php echo $bhld_ctctu_list->mact->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_ctctu_list->mact->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_ctctu" data-field="x_mact" name="x<?php echo $bhld_ctctu_list->RowIndex ?>_mact" id="x<?php echo $bhld_ctctu_list->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_ctctu_list->mact->CurrentValue) ?>">
<?php } ?>
<?php if ($bhld_ctctu->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_ctctu_list->RowCount ?>_bhld_ctctu_mact">
<span<?php echo $bhld_ctctu_list->mact->viewAttributes() ?>><?php echo $bhld_ctctu_list->mact->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($bhld_ctctu_list->mavt->Visible) { // mavt ?>
		<td data-name="mavt" <?php echo $bhld_ctctu_list->mavt->cellAttributes() ?>>
<?php if ($bhld_ctctu->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_ctctu_list->RowCount ?>_bhld_ctctu_mavt" class="form-group">
<?php
$onchange = $bhld_ctctu_list->mavt->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$bhld_ctctu_list->mavt->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $bhld_ctctu_list->RowIndex ?>_mavt">
	<input type="text" class="form-control" name="sv_x<?php echo $bhld_ctctu_list->RowIndex ?>_mavt" id="sv_x<?php echo $bhld_ctctu_list->RowIndex ?>_mavt" value="<?php echo RemoveHtml($bhld_ctctu_list->mavt->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_ctctu_list->mavt->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($bhld_ctctu_list->mavt->getPlaceHolder()) ?>"<?php echo $bhld_ctctu_list->mavt->editAttributes() ?>>
</span>
<input type="hidden" data-table="bhld_ctctu" data-field="x_mavt" data-value-separator="<?php echo $bhld_ctctu_list->mavt->displayValueSeparatorAttribute() ?>" name="x<?php echo $bhld_ctctu_list->RowIndex ?>_mavt" id="x<?php echo $bhld_ctctu_list->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_ctctu_list->mavt->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fbhld_ctctulist"], function() {
	fbhld_ctctulist.createAutoSuggest({"id":"x<?php echo $bhld_ctctu_list->RowIndex ?>_mavt","forceSelect":false});
});
</script>
<?php echo $bhld_ctctu_list->mavt->Lookup->getParamTag($bhld_ctctu_list, "p_x" . $bhld_ctctu_list->RowIndex . "_mavt") ?>
</span>
<input type="hidden" data-table="bhld_ctctu" data-field="x_mavt" name="o<?php echo $bhld_ctctu_list->RowIndex ?>_mavt" id="o<?php echo $bhld_ctctu_list->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_ctctu_list->mavt->OldValue) ?>">
<?php } ?>
<?php if ($bhld_ctctu->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $bhld_ctctu_list->RowCount ?>_bhld_ctctu_mavt" class="form-group">
<span<?php echo $bhld_ctctu_list->mavt->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_ctctu_list->mavt->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_ctctu" data-field="x_mavt" name="x<?php echo $bhld_ctctu_list->RowIndex ?>_mavt" id="x<?php echo $bhld_ctctu_list->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_ctctu_list->mavt->CurrentValue) ?>">
<?php } ?>
<?php if ($bhld_ctctu->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_ctctu_list->RowCount ?>_bhld_ctctu_mavt">
<span<?php echo $bhld_ctctu_list->mavt->viewAttributes() ?>><?php echo $bhld_ctctu_list->mavt->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($bhld_ctctu_list->dmtg->Visible) { // dmtg ?>
		<td data-name="dmtg" <?php echo $bhld_ctctu_list->dmtg->cellAttributes() ?>>
<?php if ($bhld_ctctu->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_ctctu_list->RowCount ?>_bhld_ctctu_dmtg" class="form-group">
<input type="text" data-table="bhld_ctctu" data-field="x_dmtg" name="x<?php echo $bhld_ctctu_list->RowIndex ?>_dmtg" id="x<?php echo $bhld_ctctu_list->RowIndex ?>_dmtg" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_ctctu_list->dmtg->getPlaceHolder()) ?>" value="<?php echo $bhld_ctctu_list->dmtg->EditValue ?>"<?php echo $bhld_ctctu_list->dmtg->editAttributes() ?>>
</span>
<input type="hidden" data-table="bhld_ctctu" data-field="x_dmtg" name="o<?php echo $bhld_ctctu_list->RowIndex ?>_dmtg" id="o<?php echo $bhld_ctctu_list->RowIndex ?>_dmtg" value="<?php echo HtmlEncode($bhld_ctctu_list->dmtg->OldValue) ?>">
<?php } ?>
<?php if ($bhld_ctctu->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $bhld_ctctu_list->RowCount ?>_bhld_ctctu_dmtg" class="form-group">
<span<?php echo $bhld_ctctu_list->dmtg->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_ctctu_list->dmtg->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_ctctu" data-field="x_dmtg" name="x<?php echo $bhld_ctctu_list->RowIndex ?>_dmtg" id="x<?php echo $bhld_ctctu_list->RowIndex ?>_dmtg" value="<?php echo HtmlEncode($bhld_ctctu_list->dmtg->CurrentValue) ?>">
<?php } ?>
<?php if ($bhld_ctctu->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_ctctu_list->RowCount ?>_bhld_ctctu_dmtg">
<span<?php echo $bhld_ctctu_list->dmtg->viewAttributes() ?>><?php echo $bhld_ctctu_list->dmtg->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($bhld_ctctu_list->sl->Visible) { // sl ?>
		<td data-name="sl" <?php echo $bhld_ctctu_list->sl->cellAttributes() ?>>
<?php if ($bhld_ctctu->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_ctctu_list->RowCount ?>_bhld_ctctu_sl" class="form-group">
<input type="text" data-table="bhld_ctctu" data-field="x_sl" name="x<?php echo $bhld_ctctu_list->RowIndex ?>_sl" id="x<?php echo $bhld_ctctu_list->RowIndex ?>_sl" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_ctctu_list->sl->getPlaceHolder()) ?>" value="<?php echo $bhld_ctctu_list->sl->EditValue ?>"<?php echo $bhld_ctctu_list->sl->editAttributes() ?>>
</span>
<input type="hidden" data-table="bhld_ctctu" data-field="x_sl" name="o<?php echo $bhld_ctctu_list->RowIndex ?>_sl" id="o<?php echo $bhld_ctctu_list->RowIndex ?>_sl" value="<?php echo HtmlEncode($bhld_ctctu_list->sl->OldValue) ?>">
<?php } ?>
<?php if ($bhld_ctctu->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $bhld_ctctu_list->RowCount ?>_bhld_ctctu_sl" class="form-group">
<input type="text" data-table="bhld_ctctu" data-field="x_sl" name="x<?php echo $bhld_ctctu_list->RowIndex ?>_sl" id="x<?php echo $bhld_ctctu_list->RowIndex ?>_sl" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_ctctu_list->sl->getPlaceHolder()) ?>" value="<?php echo $bhld_ctctu_list->sl->EditValue ?>"<?php echo $bhld_ctctu_list->sl->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($bhld_ctctu->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_ctctu_list->RowCount ?>_bhld_ctctu_sl">
<span<?php echo $bhld_ctctu_list->sl->viewAttributes() ?>><?php echo $bhld_ctctu_list->sl->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($bhld_ctctu_list->ngnhan->Visible) { // ngnhan ?>
		<td data-name="ngnhan" <?php echo $bhld_ctctu_list->ngnhan->cellAttributes() ?>>
<?php if ($bhld_ctctu->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_ctctu_list->RowCount ?>_bhld_ctctu_ngnhan" class="form-group">
<input type="text" data-table="bhld_ctctu" data-field="x_ngnhan" data-format="7" name="x<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhan" id="x<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhan" maxlength="10" placeholder="<?php echo HtmlEncode($bhld_ctctu_list->ngnhan->getPlaceHolder()) ?>" value="<?php echo $bhld_ctctu_list->ngnhan->EditValue ?>"<?php echo $bhld_ctctu_list->ngnhan->editAttributes() ?>>
<?php if (!$bhld_ctctu_list->ngnhan->ReadOnly && !$bhld_ctctu_list->ngnhan->Disabled && !isset($bhld_ctctu_list->ngnhan->EditAttrs["readonly"]) && !isset($bhld_ctctu_list->ngnhan->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbhld_ctctulist", "datetimepicker"], function() {
	ew.createDateTimePicker("fbhld_ctctulist", "x<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhan", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="bhld_ctctu" data-field="x_ngnhan" name="o<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhan" id="o<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhan" value="<?php echo HtmlEncode($bhld_ctctu_list->ngnhan->OldValue) ?>">
<?php } ?>
<?php if ($bhld_ctctu->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $bhld_ctctu_list->RowCount ?>_bhld_ctctu_ngnhan" class="form-group">
<span<?php echo $bhld_ctctu_list->ngnhan->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_ctctu_list->ngnhan->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_ctctu" data-field="x_ngnhan" name="x<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhan" id="x<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhan" value="<?php echo HtmlEncode($bhld_ctctu_list->ngnhan->CurrentValue) ?>">
<?php } ?>
<?php if ($bhld_ctctu->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_ctctu_list->RowCount ?>_bhld_ctctu_ngnhan">
<span<?php echo $bhld_ctctu_list->ngnhan->viewAttributes() ?>><?php echo $bhld_ctctu_list->ngnhan->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($bhld_ctctu_list->ngnhantt->Visible) { // ngnhantt ?>
		<td data-name="ngnhantt" <?php echo $bhld_ctctu_list->ngnhantt->cellAttributes() ?>>
<?php if ($bhld_ctctu->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $bhld_ctctu_list->RowCount ?>_bhld_ctctu_ngnhantt" class="form-group">
<input type="text" data-table="bhld_ctctu" data-field="x_ngnhantt" data-format="7" name="x<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhantt" id="x<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhantt" maxlength="10" placeholder="<?php echo HtmlEncode($bhld_ctctu_list->ngnhantt->getPlaceHolder()) ?>" value="<?php echo $bhld_ctctu_list->ngnhantt->EditValue ?>"<?php echo $bhld_ctctu_list->ngnhantt->editAttributes() ?>>
<?php if (!$bhld_ctctu_list->ngnhantt->ReadOnly && !$bhld_ctctu_list->ngnhantt->Disabled && !isset($bhld_ctctu_list->ngnhantt->EditAttrs["readonly"]) && !isset($bhld_ctctu_list->ngnhantt->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbhld_ctctulist", "datetimepicker"], function() {
	ew.createDateTimePicker("fbhld_ctctulist", "x<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhantt", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="bhld_ctctu" data-field="x_ngnhantt" name="o<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhantt" id="o<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhantt" value="<?php echo HtmlEncode($bhld_ctctu_list->ngnhantt->OldValue) ?>">
<?php } ?>
<?php if ($bhld_ctctu->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $bhld_ctctu_list->RowCount ?>_bhld_ctctu_ngnhantt" class="form-group">
<span<?php echo $bhld_ctctu_list->ngnhantt->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_ctctu_list->ngnhantt->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="bhld_ctctu" data-field="x_ngnhantt" name="x<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhantt" id="x<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhantt" value="<?php echo HtmlEncode($bhld_ctctu_list->ngnhantt->CurrentValue) ?>">
<?php } ?>
<?php if ($bhld_ctctu->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $bhld_ctctu_list->RowCount ?>_bhld_ctctu_ngnhantt">
<span<?php echo $bhld_ctctu_list->ngnhantt->viewAttributes() ?>><?php echo $bhld_ctctu_list->ngnhantt->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bhld_ctctu_list->ListOptions->render("body", "right", $bhld_ctctu_list->RowCount);
?>
	</tr>
<?php if ($bhld_ctctu->RowType == ROWTYPE_ADD || $bhld_ctctu->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fbhld_ctctulist", "load"], function() {
	fbhld_ctctulist.updateLists(<?php echo $bhld_ctctu_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$bhld_ctctu_list->isGridAdd())
		if (!$bhld_ctctu_list->Recordset->EOF)
			$bhld_ctctu_list->Recordset->moveNext();
}
?>
<?php
	if ($bhld_ctctu_list->isGridAdd() || $bhld_ctctu_list->isGridEdit()) {
		$bhld_ctctu_list->RowIndex = '$rowindex$';
		$bhld_ctctu_list->loadRowValues();

		// Set row properties
		$bhld_ctctu->resetAttributes();
		$bhld_ctctu->RowAttrs->merge(["data-rowindex" => $bhld_ctctu_list->RowIndex, "id" => "r0_bhld_ctctu", "data-rowtype" => ROWTYPE_ADD]);
		$bhld_ctctu->RowAttrs->appendClass("ew-template");
		$bhld_ctctu->RowType = ROWTYPE_ADD;

		// Render row
		$bhld_ctctu_list->renderRow();

		// Render list options
		$bhld_ctctu_list->renderListOptions();
		$bhld_ctctu_list->StartRowCount = 0;
?>
	<tr <?php echo $bhld_ctctu->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bhld_ctctu_list->ListOptions->render("body", "left", $bhld_ctctu_list->RowIndex);
?>
	<?php if ($bhld_ctctu_list->mact->Visible) { // mact ?>
		<td data-name="mact">
<?php if ($bhld_ctctu_list->mact->getSessionValue() != "") { ?>
<span id="el$rowindex$_bhld_ctctu_mact" class="form-group bhld_ctctu_mact">
<span<?php echo $bhld_ctctu_list->mact->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_ctctu_list->mact->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $bhld_ctctu_list->RowIndex ?>_mact" name="x<?php echo $bhld_ctctu_list->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_ctctu_list->mact->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_bhld_ctctu_mact" class="form-group bhld_ctctu_mact">
<input type="text" data-table="bhld_ctctu" data-field="x_mact" name="x<?php echo $bhld_ctctu_list->RowIndex ?>_mact" id="x<?php echo $bhld_ctctu_list->RowIndex ?>_mact" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctctu_list->mact->getPlaceHolder()) ?>" value="<?php echo $bhld_ctctu_list->mact->EditValue ?>"<?php echo $bhld_ctctu_list->mact->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="bhld_ctctu" data-field="x_mact" name="o<?php echo $bhld_ctctu_list->RowIndex ?>_mact" id="o<?php echo $bhld_ctctu_list->RowIndex ?>_mact" value="<?php echo HtmlEncode($bhld_ctctu_list->mact->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($bhld_ctctu_list->mavt->Visible) { // mavt ?>
		<td data-name="mavt">
<span id="el$rowindex$_bhld_ctctu_mavt" class="form-group bhld_ctctu_mavt">
<?php
$onchange = $bhld_ctctu_list->mavt->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$bhld_ctctu_list->mavt->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $bhld_ctctu_list->RowIndex ?>_mavt">
	<input type="text" class="form-control" name="sv_x<?php echo $bhld_ctctu_list->RowIndex ?>_mavt" id="sv_x<?php echo $bhld_ctctu_list->RowIndex ?>_mavt" value="<?php echo RemoveHtml($bhld_ctctu_list->mavt->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_ctctu_list->mavt->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($bhld_ctctu_list->mavt->getPlaceHolder()) ?>"<?php echo $bhld_ctctu_list->mavt->editAttributes() ?>>
</span>
<input type="hidden" data-table="bhld_ctctu" data-field="x_mavt" data-value-separator="<?php echo $bhld_ctctu_list->mavt->displayValueSeparatorAttribute() ?>" name="x<?php echo $bhld_ctctu_list->RowIndex ?>_mavt" id="x<?php echo $bhld_ctctu_list->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_ctctu_list->mavt->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fbhld_ctctulist"], function() {
	fbhld_ctctulist.createAutoSuggest({"id":"x<?php echo $bhld_ctctu_list->RowIndex ?>_mavt","forceSelect":false});
});
</script>
<?php echo $bhld_ctctu_list->mavt->Lookup->getParamTag($bhld_ctctu_list, "p_x" . $bhld_ctctu_list->RowIndex . "_mavt") ?>
</span>
<input type="hidden" data-table="bhld_ctctu" data-field="x_mavt" name="o<?php echo $bhld_ctctu_list->RowIndex ?>_mavt" id="o<?php echo $bhld_ctctu_list->RowIndex ?>_mavt" value="<?php echo HtmlEncode($bhld_ctctu_list->mavt->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($bhld_ctctu_list->dmtg->Visible) { // dmtg ?>
		<td data-name="dmtg">
<span id="el$rowindex$_bhld_ctctu_dmtg" class="form-group bhld_ctctu_dmtg">
<input type="text" data-table="bhld_ctctu" data-field="x_dmtg" name="x<?php echo $bhld_ctctu_list->RowIndex ?>_dmtg" id="x<?php echo $bhld_ctctu_list->RowIndex ?>_dmtg" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_ctctu_list->dmtg->getPlaceHolder()) ?>" value="<?php echo $bhld_ctctu_list->dmtg->EditValue ?>"<?php echo $bhld_ctctu_list->dmtg->editAttributes() ?>>
</span>
<input type="hidden" data-table="bhld_ctctu" data-field="x_dmtg" name="o<?php echo $bhld_ctctu_list->RowIndex ?>_dmtg" id="o<?php echo $bhld_ctctu_list->RowIndex ?>_dmtg" value="<?php echo HtmlEncode($bhld_ctctu_list->dmtg->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($bhld_ctctu_list->sl->Visible) { // sl ?>
		<td data-name="sl">
<span id="el$rowindex$_bhld_ctctu_sl" class="form-group bhld_ctctu_sl">
<input type="text" data-table="bhld_ctctu" data-field="x_sl" name="x<?php echo $bhld_ctctu_list->RowIndex ?>_sl" id="x<?php echo $bhld_ctctu_list->RowIndex ?>_sl" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_ctctu_list->sl->getPlaceHolder()) ?>" value="<?php echo $bhld_ctctu_list->sl->EditValue ?>"<?php echo $bhld_ctctu_list->sl->editAttributes() ?>>
</span>
<input type="hidden" data-table="bhld_ctctu" data-field="x_sl" name="o<?php echo $bhld_ctctu_list->RowIndex ?>_sl" id="o<?php echo $bhld_ctctu_list->RowIndex ?>_sl" value="<?php echo HtmlEncode($bhld_ctctu_list->sl->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($bhld_ctctu_list->ngnhan->Visible) { // ngnhan ?>
		<td data-name="ngnhan">
<span id="el$rowindex$_bhld_ctctu_ngnhan" class="form-group bhld_ctctu_ngnhan">
<input type="text" data-table="bhld_ctctu" data-field="x_ngnhan" data-format="7" name="x<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhan" id="x<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhan" maxlength="10" placeholder="<?php echo HtmlEncode($bhld_ctctu_list->ngnhan->getPlaceHolder()) ?>" value="<?php echo $bhld_ctctu_list->ngnhan->EditValue ?>"<?php echo $bhld_ctctu_list->ngnhan->editAttributes() ?>>
<?php if (!$bhld_ctctu_list->ngnhan->ReadOnly && !$bhld_ctctu_list->ngnhan->Disabled && !isset($bhld_ctctu_list->ngnhan->EditAttrs["readonly"]) && !isset($bhld_ctctu_list->ngnhan->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbhld_ctctulist", "datetimepicker"], function() {
	ew.createDateTimePicker("fbhld_ctctulist", "x<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhan", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="bhld_ctctu" data-field="x_ngnhan" name="o<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhan" id="o<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhan" value="<?php echo HtmlEncode($bhld_ctctu_list->ngnhan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($bhld_ctctu_list->ngnhantt->Visible) { // ngnhantt ?>
		<td data-name="ngnhantt">
<span id="el$rowindex$_bhld_ctctu_ngnhantt" class="form-group bhld_ctctu_ngnhantt">
<input type="text" data-table="bhld_ctctu" data-field="x_ngnhantt" data-format="7" name="x<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhantt" id="x<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhantt" maxlength="10" placeholder="<?php echo HtmlEncode($bhld_ctctu_list->ngnhantt->getPlaceHolder()) ?>" value="<?php echo $bhld_ctctu_list->ngnhantt->EditValue ?>"<?php echo $bhld_ctctu_list->ngnhantt->editAttributes() ?>>
<?php if (!$bhld_ctctu_list->ngnhantt->ReadOnly && !$bhld_ctctu_list->ngnhantt->Disabled && !isset($bhld_ctctu_list->ngnhantt->EditAttrs["readonly"]) && !isset($bhld_ctctu_list->ngnhantt->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbhld_ctctulist", "datetimepicker"], function() {
	ew.createDateTimePicker("fbhld_ctctulist", "x<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhantt", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="bhld_ctctu" data-field="x_ngnhantt" name="o<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhantt" id="o<?php echo $bhld_ctctu_list->RowIndex ?>_ngnhantt" value="<?php echo HtmlEncode($bhld_ctctu_list->ngnhantt->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bhld_ctctu_list->ListOptions->render("body", "right", $bhld_ctctu_list->RowIndex);
?>
<script>
loadjs.ready(["fbhld_ctctulist", "load"], function() {
	fbhld_ctctulist.updateLists(<?php echo $bhld_ctctu_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($bhld_ctctu_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $bhld_ctctu_list->FormKeyCountName ?>" id="<?php echo $bhld_ctctu_list->FormKeyCountName ?>" value="<?php echo $bhld_ctctu_list->KeyCount ?>">
<?php echo $bhld_ctctu_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$bhld_ctctu->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($bhld_ctctu_list->Recordset)
	$bhld_ctctu_list->Recordset->Close();
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($bhld_ctctu_list->TotalRecords == 0 && !$bhld_ctctu->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $bhld_ctctu_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$bhld_ctctu_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$bhld_ctctu_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$bhld_ctctu_list->terminate();
?>
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
$_bhld_view_chungtu_danhan_theothang_master_list = new _bhld_view_chungtu_danhan_theothang_master_list();

// Run the page
$_bhld_view_chungtu_danhan_theothang_master_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$_bhld_view_chungtu_danhan_theothang_master_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$_bhld_view_chungtu_danhan_theothang_master_list->isExport()) { ?>
<script>
var f_bhld_view_chungtu_danhan_theothang_masterlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	f_bhld_view_chungtu_danhan_theothang_masterlist = currentForm = new ew.Form("f_bhld_view_chungtu_danhan_theothang_masterlist", "list");
	f_bhld_view_chungtu_danhan_theothang_masterlist.formKeyCountName = '<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->FormKeyCountName ?>';
	loadjs.done("f_bhld_view_chungtu_danhan_theothang_masterlist");
});
var f_bhld_view_chungtu_danhan_theothang_masterlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	f_bhld_view_chungtu_danhan_theothang_masterlistsrch = currentSearchForm = new ew.Form("f_bhld_view_chungtu_danhan_theothang_masterlistsrch");

	// Validate function for search
	f_bhld_view_chungtu_danhan_theothang_masterlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_ngnhan");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	f_bhld_view_chungtu_danhan_theothang_masterlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	f_bhld_view_chungtu_danhan_theothang_masterlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	f_bhld_view_chungtu_danhan_theothang_masterlistsrch.lists["x_mapb"] = <?php echo $_bhld_view_chungtu_danhan_theothang_master_list->mapb->Lookup->toClientList($_bhld_view_chungtu_danhan_theothang_master_list) ?>;
	f_bhld_view_chungtu_danhan_theothang_masterlistsrch.lists["x_mapb"].options = <?php echo JsonEncode($_bhld_view_chungtu_danhan_theothang_master_list->mapb->lookupOptions()) ?>;

	// Filters
	f_bhld_view_chungtu_danhan_theothang_masterlistsrch.filterList = <?php echo $_bhld_view_chungtu_danhan_theothang_master_list->getFilterList() ?>;
	loadjs.done("f_bhld_view_chungtu_danhan_theothang_masterlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$_bhld_view_chungtu_danhan_theothang_master_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($_bhld_view_chungtu_danhan_theothang_master_list->TotalRecords > 0 && $_bhld_view_chungtu_danhan_theothang_master_list->ExportOptions->visible()) { ?>
<?php $_bhld_view_chungtu_danhan_theothang_master_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($_bhld_view_chungtu_danhan_theothang_master_list->ImportOptions->visible()) { ?>
<?php $_bhld_view_chungtu_danhan_theothang_master_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($_bhld_view_chungtu_danhan_theothang_master_list->SearchOptions->visible()) { ?>
<?php $_bhld_view_chungtu_danhan_theothang_master_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($_bhld_view_chungtu_danhan_theothang_master_list->FilterOptions->visible()) { ?>
<?php $_bhld_view_chungtu_danhan_theothang_master_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$_bhld_view_chungtu_danhan_theothang_master_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$_bhld_view_chungtu_danhan_theothang_master_list->isExport() && !$_bhld_view_chungtu_danhan_theothang_master->CurrentAction) { ?>
<form name="f_bhld_view_chungtu_danhan_theothang_masterlistsrch" id="f_bhld_view_chungtu_danhan_theothang_masterlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="f_bhld_view_chungtu_danhan_theothang_masterlistsrch-search-panel" class="<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="_bhld_view_chungtu_danhan_theothang_master">
	<div class="ew-extended-search">
<?php

// Render search row
$_bhld_view_chungtu_danhan_theothang_master->RowType = ROWTYPE_SEARCH;
$_bhld_view_chungtu_danhan_theothang_master->resetAttributes();
$_bhld_view_chungtu_danhan_theothang_master_list->renderRow();
?>
<?php if ($_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->Visible) { // ngnhan ?>
	<?php
		$_bhld_view_chungtu_danhan_theothang_master_list->SearchColumnCount++;
		if (($_bhld_view_chungtu_danhan_theothang_master_list->SearchColumnCount - 1) % $_bhld_view_chungtu_danhan_theothang_master_list->SearchFieldsPerRow == 0) {
			$_bhld_view_chungtu_danhan_theothang_master_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_ngnhan" class="ew-cell form-group">
		<label for="x_ngnhan" class="ew-search-caption ew-label"><?php echo $_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_ngnhan" id="z_ngnhan" value="BETWEEN">
</span>
		<span id="el__bhld_view_chungtu_danhan_theothang_master_ngnhan" class="ew-search-field">
<input type="text" data-table="_bhld_view_chungtu_danhan_theothang_master" data-field="x_ngnhan" data-format="7" name="x_ngnhan" id="x_ngnhan" maxlength="10" placeholder="<?php echo HtmlEncode($_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->getPlaceHolder()) ?>" value="<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->EditValue ?>"<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->editAttributes() ?>>
<?php if (!$_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->ReadOnly && !$_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->Disabled && !isset($_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->EditAttrs["readonly"]) && !isset($_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["f_bhld_view_chungtu_danhan_theothang_masterlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("f_bhld_view_chungtu_danhan_theothang_masterlistsrch", "x_ngnhan", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		<span class="ew-search-and"><label><?php echo $Language->phrase("AND") ?></label></span>
		<span id="el2__bhld_view_chungtu_danhan_theothang_master_ngnhan" class="ew-search-field2">
<input type="text" data-table="_bhld_view_chungtu_danhan_theothang_master" data-field="x_ngnhan" data-format="7" name="y_ngnhan" id="y_ngnhan" maxlength="10" placeholder="<?php echo HtmlEncode($_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->getPlaceHolder()) ?>" value="<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->EditValue2 ?>"<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->editAttributes() ?>>
<?php if (!$_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->ReadOnly && !$_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->Disabled && !isset($_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->EditAttrs["readonly"]) && !isset($_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["f_bhld_view_chungtu_danhan_theothang_masterlistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("f_bhld_view_chungtu_danhan_theothang_masterlistsrch", "y_ngnhan", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($_bhld_view_chungtu_danhan_theothang_master_list->SearchColumnCount % $_bhld_view_chungtu_danhan_theothang_master_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($_bhld_view_chungtu_danhan_theothang_master_list->mapb->Visible) { // mapb ?>
	<?php
		$_bhld_view_chungtu_danhan_theothang_master_list->SearchColumnCount++;
		if (($_bhld_view_chungtu_danhan_theothang_master_list->SearchColumnCount - 1) % $_bhld_view_chungtu_danhan_theothang_master_list->SearchFieldsPerRow == 0) {
			$_bhld_view_chungtu_danhan_theothang_master_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_mapb" class="ew-cell form-group">
		<label for="x_mapb" class="ew-search-caption ew-label"><?php echo $_bhld_view_chungtu_danhan_theothang_master_list->mapb->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mapb" id="z_mapb" value="LIKE">
</span>
		<span id="el__bhld_view_chungtu_danhan_theothang_master_mapb" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="_bhld_view_chungtu_danhan_theothang_master" data-field="x_mapb" data-value-separator="<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->mapb->displayValueSeparatorAttribute() ?>" id="x_mapb" name="x_mapb"<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->mapb->editAttributes() ?>>
			<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->mapb->selectOptionListHtml("x_mapb") ?>
		</select>
</div>
<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->mapb->Lookup->getParamTag($_bhld_view_chungtu_danhan_theothang_master_list, "p_x_mapb") ?>
</span>
	</div>
	<?php if ($_bhld_view_chungtu_danhan_theothang_master_list->SearchColumnCount % $_bhld_view_chungtu_danhan_theothang_master_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($_bhld_view_chungtu_danhan_theothang_master_list->SearchColumnCount % $_bhld_view_chungtu_danhan_theothang_master_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $_bhld_view_chungtu_danhan_theothang_master_list->showPageHeader(); ?>
<?php
$_bhld_view_chungtu_danhan_theothang_master_list->showMessage();
?>
<?php if ($_bhld_view_chungtu_danhan_theothang_master_list->TotalRecords > 0 || $_bhld_view_chungtu_danhan_theothang_master->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($_bhld_view_chungtu_danhan_theothang_master_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> _bhld_view_chungtu_danhan_theothang_master">
<?php if (!$_bhld_view_chungtu_danhan_theothang_master_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$_bhld_view_chungtu_danhan_theothang_master_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $_bhld_view_chungtu_danhan_theothang_master_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="f_bhld_view_chungtu_danhan_theothang_masterlist" id="f_bhld_view_chungtu_danhan_theothang_masterlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="_bhld_view_chungtu_danhan_theothang_master">
<div id="gmp__bhld_view_chungtu_danhan_theothang_master" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($_bhld_view_chungtu_danhan_theothang_master_list->TotalRecords > 0 || $_bhld_view_chungtu_danhan_theothang_master_list->isGridEdit()) { ?>
<table id="tbl__bhld_view_chungtu_danhan_theothang_masterlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$_bhld_view_chungtu_danhan_theothang_master->RowType = ROWTYPE_HEADER;

// Render list options
$_bhld_view_chungtu_danhan_theothang_master_list->renderListOptions();

// Render list options (header, left)
$_bhld_view_chungtu_danhan_theothang_master_list->ListOptions->render("header", "left");
?>
<?php if ($_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->Visible) { // ngnhan ?>
	<?php if ($_bhld_view_chungtu_danhan_theothang_master_list->SortUrl($_bhld_view_chungtu_danhan_theothang_master_list->ngnhan) == "") { ?>
		<th data-name="ngnhan" class="<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->headerCellClass() ?>"><div id="elh__bhld_view_chungtu_danhan_theothang_master_ngnhan" class="_bhld_view_chungtu_danhan_theothang_master_ngnhan"><div class="ew-table-header-caption"><?php echo $_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ngnhan" class="<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->SortUrl($_bhld_view_chungtu_danhan_theothang_master_list->ngnhan) ?>', 1);"><div id="elh__bhld_view_chungtu_danhan_theothang_master_ngnhan" class="_bhld_view_chungtu_danhan_theothang_master_ngnhan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->caption() ?></span><span class="ew-table-header-sort"><?php if ($_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_bhld_view_chungtu_danhan_theothang_master_list->manv->Visible) { // manv ?>
	<?php if ($_bhld_view_chungtu_danhan_theothang_master_list->SortUrl($_bhld_view_chungtu_danhan_theothang_master_list->manv) == "") { ?>
		<th data-name="manv" class="<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->manv->headerCellClass() ?>"><div id="elh__bhld_view_chungtu_danhan_theothang_master_manv" class="_bhld_view_chungtu_danhan_theothang_master_manv"><div class="ew-table-header-caption"><?php echo $_bhld_view_chungtu_danhan_theothang_master_list->manv->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="manv" class="<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->manv->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->SortUrl($_bhld_view_chungtu_danhan_theothang_master_list->manv) ?>', 1);"><div id="elh__bhld_view_chungtu_danhan_theothang_master_manv" class="_bhld_view_chungtu_danhan_theothang_master_manv">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_bhld_view_chungtu_danhan_theothang_master_list->manv->caption() ?></span><span class="ew-table-header-sort"><?php if ($_bhld_view_chungtu_danhan_theothang_master_list->manv->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_bhld_view_chungtu_danhan_theothang_master_list->manv->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_bhld_view_chungtu_danhan_theothang_master_list->mapb->Visible) { // mapb ?>
	<?php if ($_bhld_view_chungtu_danhan_theothang_master_list->SortUrl($_bhld_view_chungtu_danhan_theothang_master_list->mapb) == "") { ?>
		<th data-name="mapb" class="<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->mapb->headerCellClass() ?>"><div id="elh__bhld_view_chungtu_danhan_theothang_master_mapb" class="_bhld_view_chungtu_danhan_theothang_master_mapb"><div class="ew-table-header-caption"><?php echo $_bhld_view_chungtu_danhan_theothang_master_list->mapb->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mapb" class="<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->mapb->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->SortUrl($_bhld_view_chungtu_danhan_theothang_master_list->mapb) ?>', 1);"><div id="elh__bhld_view_chungtu_danhan_theothang_master_mapb" class="_bhld_view_chungtu_danhan_theothang_master_mapb">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_bhld_view_chungtu_danhan_theothang_master_list->mapb->caption() ?></span><span class="ew-table-header-sort"><?php if ($_bhld_view_chungtu_danhan_theothang_master_list->mapb->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($_bhld_view_chungtu_danhan_theothang_master_list->mapb->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$_bhld_view_chungtu_danhan_theothang_master_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($_bhld_view_chungtu_danhan_theothang_master_list->ExportAll && $_bhld_view_chungtu_danhan_theothang_master_list->isExport()) {
	$_bhld_view_chungtu_danhan_theothang_master_list->StopRecord = $_bhld_view_chungtu_danhan_theothang_master_list->TotalRecords;
} else {

	// Set the last record to display
	if ($_bhld_view_chungtu_danhan_theothang_master_list->TotalRecords > $_bhld_view_chungtu_danhan_theothang_master_list->StartRecord + $_bhld_view_chungtu_danhan_theothang_master_list->DisplayRecords - 1)
		$_bhld_view_chungtu_danhan_theothang_master_list->StopRecord = $_bhld_view_chungtu_danhan_theothang_master_list->StartRecord + $_bhld_view_chungtu_danhan_theothang_master_list->DisplayRecords - 1;
	else
		$_bhld_view_chungtu_danhan_theothang_master_list->StopRecord = $_bhld_view_chungtu_danhan_theothang_master_list->TotalRecords;
}
$_bhld_view_chungtu_danhan_theothang_master_list->RecordCount = $_bhld_view_chungtu_danhan_theothang_master_list->StartRecord - 1;
if ($_bhld_view_chungtu_danhan_theothang_master_list->Recordset && !$_bhld_view_chungtu_danhan_theothang_master_list->Recordset->EOF) {
	$_bhld_view_chungtu_danhan_theothang_master_list->Recordset->moveFirst();
	$selectLimit = $_bhld_view_chungtu_danhan_theothang_master_list->UseSelectLimit;
	if (!$selectLimit && $_bhld_view_chungtu_danhan_theothang_master_list->StartRecord > 1)
		$_bhld_view_chungtu_danhan_theothang_master_list->Recordset->move($_bhld_view_chungtu_danhan_theothang_master_list->StartRecord - 1);
} elseif (!$_bhld_view_chungtu_danhan_theothang_master->AllowAddDeleteRow && $_bhld_view_chungtu_danhan_theothang_master_list->StopRecord == 0) {
	$_bhld_view_chungtu_danhan_theothang_master_list->StopRecord = $_bhld_view_chungtu_danhan_theothang_master->GridAddRowCount;
}

// Initialize aggregate
$_bhld_view_chungtu_danhan_theothang_master->RowType = ROWTYPE_AGGREGATEINIT;
$_bhld_view_chungtu_danhan_theothang_master->resetAttributes();
$_bhld_view_chungtu_danhan_theothang_master_list->renderRow();
while ($_bhld_view_chungtu_danhan_theothang_master_list->RecordCount < $_bhld_view_chungtu_danhan_theothang_master_list->StopRecord) {
	$_bhld_view_chungtu_danhan_theothang_master_list->RecordCount++;
	if ($_bhld_view_chungtu_danhan_theothang_master_list->RecordCount >= $_bhld_view_chungtu_danhan_theothang_master_list->StartRecord) {
		$_bhld_view_chungtu_danhan_theothang_master_list->RowCount++;

		// Set up key count
		$_bhld_view_chungtu_danhan_theothang_master_list->KeyCount = $_bhld_view_chungtu_danhan_theothang_master_list->RowIndex;

		// Init row class and style
		$_bhld_view_chungtu_danhan_theothang_master->resetAttributes();
		$_bhld_view_chungtu_danhan_theothang_master->CssClass = "";
		if ($_bhld_view_chungtu_danhan_theothang_master_list->isGridAdd()) {
		} else {
			$_bhld_view_chungtu_danhan_theothang_master_list->loadRowValues($_bhld_view_chungtu_danhan_theothang_master_list->Recordset); // Load row values
		}
		$_bhld_view_chungtu_danhan_theothang_master->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$_bhld_view_chungtu_danhan_theothang_master->RowAttrs->merge(["data-rowindex" => $_bhld_view_chungtu_danhan_theothang_master_list->RowCount, "id" => "r" . $_bhld_view_chungtu_danhan_theothang_master_list->RowCount . "__bhld_view_chungtu_danhan_theothang_master", "data-rowtype" => $_bhld_view_chungtu_danhan_theothang_master->RowType]);

		// Render row
		$_bhld_view_chungtu_danhan_theothang_master_list->renderRow();

		// Render list options
		$_bhld_view_chungtu_danhan_theothang_master_list->renderListOptions();
?>
	<tr <?php echo $_bhld_view_chungtu_danhan_theothang_master->rowAttributes() ?>>
<?php

// Render list options (body, left)
$_bhld_view_chungtu_danhan_theothang_master_list->ListOptions->render("body", "left", $_bhld_view_chungtu_danhan_theothang_master_list->RowCount);
?>
	<?php if ($_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->Visible) { // ngnhan ?>
		<td data-name="ngnhan" <?php echo $_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->cellAttributes() ?>>
<span id="el<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->RowCount ?>__bhld_view_chungtu_danhan_theothang_master_ngnhan">
<span<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->viewAttributes() ?>><?php echo $_bhld_view_chungtu_danhan_theothang_master_list->ngnhan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_bhld_view_chungtu_danhan_theothang_master_list->manv->Visible) { // manv ?>
		<td data-name="manv" <?php echo $_bhld_view_chungtu_danhan_theothang_master_list->manv->cellAttributes() ?>>
<span id="el<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->RowCount ?>__bhld_view_chungtu_danhan_theothang_master_manv">
<span<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->manv->viewAttributes() ?>><?php echo $_bhld_view_chungtu_danhan_theothang_master_list->manv->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_bhld_view_chungtu_danhan_theothang_master_list->mapb->Visible) { // mapb ?>
		<td data-name="mapb" <?php echo $_bhld_view_chungtu_danhan_theothang_master_list->mapb->cellAttributes() ?>>
<span id="el<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->RowCount ?>__bhld_view_chungtu_danhan_theothang_master_mapb">
<span<?php echo $_bhld_view_chungtu_danhan_theothang_master_list->mapb->viewAttributes() ?>><?php echo $_bhld_view_chungtu_danhan_theothang_master_list->mapb->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$_bhld_view_chungtu_danhan_theothang_master_list->ListOptions->render("body", "right", $_bhld_view_chungtu_danhan_theothang_master_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$_bhld_view_chungtu_danhan_theothang_master_list->isGridAdd())
		$_bhld_view_chungtu_danhan_theothang_master_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$_bhld_view_chungtu_danhan_theothang_master->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($_bhld_view_chungtu_danhan_theothang_master_list->Recordset)
	$_bhld_view_chungtu_danhan_theothang_master_list->Recordset->Close();
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($_bhld_view_chungtu_danhan_theothang_master_list->TotalRecords == 0 && !$_bhld_view_chungtu_danhan_theothang_master->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $_bhld_view_chungtu_danhan_theothang_master_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$_bhld_view_chungtu_danhan_theothang_master_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$_bhld_view_chungtu_danhan_theothang_master_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	$("#x_ngnhan").on("change, blur",function(){this.form.submit()});
});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$_bhld_view_chungtu_danhan_theothang_master_list->terminate();
?>
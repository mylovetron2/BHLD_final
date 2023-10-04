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
$bhld_ctu_list = new bhld_ctu_list();

// Run the page
$bhld_ctu_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_ctu_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$bhld_ctu_list->isExport()) { ?>
<script>
var fbhld_ctulist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fbhld_ctulist = currentForm = new ew.Form("fbhld_ctulist", "list");
	fbhld_ctulist.formKeyCountName = '<?php echo $bhld_ctu_list->FormKeyCountName ?>';
	loadjs.done("fbhld_ctulist");
});
var fbhld_ctulistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fbhld_ctulistsrch = currentSearchForm = new ew.Form("fbhld_ctulistsrch");

	// Validate function for search
	fbhld_ctulistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_ngct");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($bhld_ctu_list->ngct->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fbhld_ctulistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbhld_ctulistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fbhld_ctulistsrch.lists["x_mapb"] = <?php echo $bhld_ctu_list->mapb->Lookup->toClientList($bhld_ctu_list) ?>;
	fbhld_ctulistsrch.lists["x_mapb"].options = <?php echo JsonEncode($bhld_ctu_list->mapb->lookupOptions()) ?>;

	// Filters
	fbhld_ctulistsrch.filterList = <?php echo $bhld_ctu_list->getFilterList() ?>;
	loadjs.done("fbhld_ctulistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$bhld_ctu_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($bhld_ctu_list->TotalRecords > 0 && $bhld_ctu_list->ExportOptions->visible()) { ?>
<?php $bhld_ctu_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_ctu_list->ImportOptions->visible()) { ?>
<?php $bhld_ctu_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_ctu_list->SearchOptions->visible()) { ?>
<?php $bhld_ctu_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_ctu_list->FilterOptions->visible()) { ?>
<?php $bhld_ctu_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$bhld_ctu_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$bhld_ctu_list->isExport() && !$bhld_ctu->CurrentAction) { ?>
<form name="fbhld_ctulistsrch" id="fbhld_ctulistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fbhld_ctulistsrch-search-panel" class="<?php echo $bhld_ctu_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="bhld_ctu">
	<div class="ew-extended-search">
<?php

// Render search row
$bhld_ctu->RowType = ROWTYPE_SEARCH;
$bhld_ctu->resetAttributes();
$bhld_ctu_list->renderRow();
?>
<?php if ($bhld_ctu_list->ngct->Visible) { // ngct ?>
	<?php
		$bhld_ctu_list->SearchColumnCount++;
		if (($bhld_ctu_list->SearchColumnCount - 1) % $bhld_ctu_list->SearchFieldsPerRow == 0) {
			$bhld_ctu_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $bhld_ctu_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_ngct" class="ew-cell form-group">
		<label for="x_ngct" class="ew-search-caption ew-label"><?php echo $bhld_ctu_list->ngct->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("<=") ?>
<input type="hidden" name="z_ngct" id="z_ngct" value="<=">
</span>
		<span id="el_bhld_ctu_ngct" class="ew-search-field">
<input type="text" data-table="bhld_ctu" data-field="x_ngct" data-format="7" name="x_ngct" id="x_ngct" maxlength="10" placeholder="<?php echo HtmlEncode($bhld_ctu_list->ngct->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_list->ngct->EditValue ?>"<?php echo $bhld_ctu_list->ngct->editAttributes() ?>>
<?php if (!$bhld_ctu_list->ngct->ReadOnly && !$bhld_ctu_list->ngct->Disabled && !isset($bhld_ctu_list->ngct->EditAttrs["readonly"]) && !isset($bhld_ctu_list->ngct->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbhld_ctulistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fbhld_ctulistsrch", "x_ngct", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($bhld_ctu_list->SearchColumnCount % $bhld_ctu_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($bhld_ctu_list->mapb->Visible) { // mapb ?>
	<?php
		$bhld_ctu_list->SearchColumnCount++;
		if (($bhld_ctu_list->SearchColumnCount - 1) % $bhld_ctu_list->SearchFieldsPerRow == 0) {
			$bhld_ctu_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $bhld_ctu_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_mapb" class="ew-cell form-group">
		<label for="x_mapb" class="ew-search-caption ew-label"><?php echo $bhld_ctu_list->mapb->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mapb" id="z_mapb" value="LIKE">
</span>
		<span id="el_bhld_ctu_mapb" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="bhld_ctu" data-field="x_mapb" data-value-separator="<?php echo $bhld_ctu_list->mapb->displayValueSeparatorAttribute() ?>" id="x_mapb" name="x_mapb"<?php echo $bhld_ctu_list->mapb->editAttributes() ?>>
			<?php echo $bhld_ctu_list->mapb->selectOptionListHtml("x_mapb") ?>
		</select>
</div>
<?php echo $bhld_ctu_list->mapb->Lookup->getParamTag($bhld_ctu_list, "p_x_mapb") ?>
</span>
	</div>
	<?php if ($bhld_ctu_list->SearchColumnCount % $bhld_ctu_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($bhld_ctu_list->SearchColumnCount % $bhld_ctu_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $bhld_ctu_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($bhld_ctu_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($bhld_ctu_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $bhld_ctu_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($bhld_ctu_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($bhld_ctu_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($bhld_ctu_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($bhld_ctu_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $bhld_ctu_list->showPageHeader(); ?>
<?php
$bhld_ctu_list->showMessage();
?>
<?php if ($bhld_ctu_list->TotalRecords > 0 || $bhld_ctu->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($bhld_ctu_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> bhld_ctu">
<?php if (!$bhld_ctu_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$bhld_ctu_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $bhld_ctu_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $bhld_ctu_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbhld_ctulist" id="fbhld_ctulist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_ctu">
<div id="gmp_bhld_ctu" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($bhld_ctu_list->TotalRecords > 0 || $bhld_ctu_list->isGridEdit()) { ?>
<table id="tbl_bhld_ctulist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$bhld_ctu->RowType = ROWTYPE_HEADER;

// Render list options
$bhld_ctu_list->renderListOptions();

// Render list options (header, left)
$bhld_ctu_list->ListOptions->render("header", "left");
?>
<?php if ($bhld_ctu_list->mact->Visible) { // mact ?>
	<?php if ($bhld_ctu_list->SortUrl($bhld_ctu_list->mact) == "") { ?>
		<th data-name="mact" class="<?php echo $bhld_ctu_list->mact->headerCellClass() ?>"><div id="elh_bhld_ctu_mact" class="bhld_ctu_mact"><div class="ew-table-header-caption"><?php echo $bhld_ctu_list->mact->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mact" class="<?php echo $bhld_ctu_list->mact->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_ctu_list->SortUrl($bhld_ctu_list->mact) ?>', 1);"><div id="elh_bhld_ctu_mact" class="bhld_ctu_mact">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctu_list->mact->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctu_list->mact->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctu_list->mact->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_ctu_list->ngct->Visible) { // ngct ?>
	<?php if ($bhld_ctu_list->SortUrl($bhld_ctu_list->ngct) == "") { ?>
		<th data-name="ngct" class="<?php echo $bhld_ctu_list->ngct->headerCellClass() ?>"><div id="elh_bhld_ctu_ngct" class="bhld_ctu_ngct"><div class="ew-table-header-caption"><?php echo $bhld_ctu_list->ngct->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ngct" class="<?php echo $bhld_ctu_list->ngct->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_ctu_list->SortUrl($bhld_ctu_list->ngct) ?>', 1);"><div id="elh_bhld_ctu_ngct" class="bhld_ctu_ngct">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctu_list->ngct->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctu_list->ngct->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctu_list->ngct->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_ctu_list->mapb->Visible) { // mapb ?>
	<?php if ($bhld_ctu_list->SortUrl($bhld_ctu_list->mapb) == "") { ?>
		<th data-name="mapb" class="<?php echo $bhld_ctu_list->mapb->headerCellClass() ?>"><div id="elh_bhld_ctu_mapb" class="bhld_ctu_mapb"><div class="ew-table-header-caption"><?php echo $bhld_ctu_list->mapb->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mapb" class="<?php echo $bhld_ctu_list->mapb->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_ctu_list->SortUrl($bhld_ctu_list->mapb) ?>', 1);"><div id="elh_bhld_ctu_mapb" class="bhld_ctu_mapb">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctu_list->mapb->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctu_list->mapb->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctu_list->mapb->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_ctu_list->manv->Visible) { // manv ?>
	<?php if ($bhld_ctu_list->SortUrl($bhld_ctu_list->manv) == "") { ?>
		<th data-name="manv" class="<?php echo $bhld_ctu_list->manv->headerCellClass() ?>"><div id="elh_bhld_ctu_manv" class="bhld_ctu_manv"><div class="ew-table-header-caption"><?php echo $bhld_ctu_list->manv->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="manv" class="<?php echo $bhld_ctu_list->manv->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_ctu_list->SortUrl($bhld_ctu_list->manv) ?>', 1);"><div id="elh_bhld_ctu_manv" class="bhld_ctu_manv">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctu_list->manv->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctu_list->manv->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctu_list->manv->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_ctu_list->ghichu->Visible) { // ghichu ?>
	<?php if ($bhld_ctu_list->SortUrl($bhld_ctu_list->ghichu) == "") { ?>
		<th data-name="ghichu" class="<?php echo $bhld_ctu_list->ghichu->headerCellClass() ?>"><div id="elh_bhld_ctu_ghichu" class="bhld_ctu_ghichu"><div class="ew-table-header-caption"><?php echo $bhld_ctu_list->ghichu->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ghichu" class="<?php echo $bhld_ctu_list->ghichu->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_ctu_list->SortUrl($bhld_ctu_list->ghichu) ?>', 1);"><div id="elh_bhld_ctu_ghichu" class="bhld_ctu_ghichu">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctu_list->ghichu->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctu_list->ghichu->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctu_list->ghichu->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_ctu_list->madm->Visible) { // madm ?>
	<?php if ($bhld_ctu_list->SortUrl($bhld_ctu_list->madm) == "") { ?>
		<th data-name="madm" class="<?php echo $bhld_ctu_list->madm->headerCellClass() ?>"><div id="elh_bhld_ctu_madm" class="bhld_ctu_madm"><div class="ew-table-header-caption"><?php echo $bhld_ctu_list->madm->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="madm" class="<?php echo $bhld_ctu_list->madm->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_ctu_list->SortUrl($bhld_ctu_list->madm) ?>', 1);"><div id="elh_bhld_ctu_madm" class="bhld_ctu_madm">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctu_list->madm->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctu_list->madm->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctu_list->madm->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$bhld_ctu_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($bhld_ctu_list->ExportAll && $bhld_ctu_list->isExport()) {
	$bhld_ctu_list->StopRecord = $bhld_ctu_list->TotalRecords;
} else {

	// Set the last record to display
	if ($bhld_ctu_list->TotalRecords > $bhld_ctu_list->StartRecord + $bhld_ctu_list->DisplayRecords - 1)
		$bhld_ctu_list->StopRecord = $bhld_ctu_list->StartRecord + $bhld_ctu_list->DisplayRecords - 1;
	else
		$bhld_ctu_list->StopRecord = $bhld_ctu_list->TotalRecords;
}
$bhld_ctu_list->RecordCount = $bhld_ctu_list->StartRecord - 1;
if ($bhld_ctu_list->Recordset && !$bhld_ctu_list->Recordset->EOF) {
	$bhld_ctu_list->Recordset->moveFirst();
	$selectLimit = $bhld_ctu_list->UseSelectLimit;
	if (!$selectLimit && $bhld_ctu_list->StartRecord > 1)
		$bhld_ctu_list->Recordset->move($bhld_ctu_list->StartRecord - 1);
} elseif (!$bhld_ctu->AllowAddDeleteRow && $bhld_ctu_list->StopRecord == 0) {
	$bhld_ctu_list->StopRecord = $bhld_ctu->GridAddRowCount;
}

// Initialize aggregate
$bhld_ctu->RowType = ROWTYPE_AGGREGATEINIT;
$bhld_ctu->resetAttributes();
$bhld_ctu_list->renderRow();
while ($bhld_ctu_list->RecordCount < $bhld_ctu_list->StopRecord) {
	$bhld_ctu_list->RecordCount++;
	if ($bhld_ctu_list->RecordCount >= $bhld_ctu_list->StartRecord) {
		$bhld_ctu_list->RowCount++;

		// Set up key count
		$bhld_ctu_list->KeyCount = $bhld_ctu_list->RowIndex;

		// Init row class and style
		$bhld_ctu->resetAttributes();
		$bhld_ctu->CssClass = "";
		if ($bhld_ctu_list->isGridAdd()) {
		} else {
			$bhld_ctu_list->loadRowValues($bhld_ctu_list->Recordset); // Load row values
		}
		$bhld_ctu->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$bhld_ctu->RowAttrs->merge(["data-rowindex" => $bhld_ctu_list->RowCount, "id" => "r" . $bhld_ctu_list->RowCount . "_bhld_ctu", "data-rowtype" => $bhld_ctu->RowType]);

		// Render row
		$bhld_ctu_list->renderRow();

		// Render list options
		$bhld_ctu_list->renderListOptions();
?>
	<tr <?php echo $bhld_ctu->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bhld_ctu_list->ListOptions->render("body", "left", $bhld_ctu_list->RowCount);
?>
	<?php if ($bhld_ctu_list->mact->Visible) { // mact ?>
		<td data-name="mact" <?php echo $bhld_ctu_list->mact->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctu_list->RowCount ?>_bhld_ctu_mact">
<span<?php echo $bhld_ctu_list->mact->viewAttributes() ?>><?php echo $bhld_ctu_list->mact->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_ctu_list->ngct->Visible) { // ngct ?>
		<td data-name="ngct" <?php echo $bhld_ctu_list->ngct->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctu_list->RowCount ?>_bhld_ctu_ngct">
<span<?php echo $bhld_ctu_list->ngct->viewAttributes() ?>><?php echo $bhld_ctu_list->ngct->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_ctu_list->mapb->Visible) { // mapb ?>
		<td data-name="mapb" <?php echo $bhld_ctu_list->mapb->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctu_list->RowCount ?>_bhld_ctu_mapb">
<span<?php echo $bhld_ctu_list->mapb->viewAttributes() ?>><?php echo $bhld_ctu_list->mapb->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_ctu_list->manv->Visible) { // manv ?>
		<td data-name="manv" <?php echo $bhld_ctu_list->manv->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctu_list->RowCount ?>_bhld_ctu_manv">
<span<?php echo $bhld_ctu_list->manv->viewAttributes() ?>><?php echo $bhld_ctu_list->manv->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_ctu_list->ghichu->Visible) { // ghichu ?>
		<td data-name="ghichu" <?php echo $bhld_ctu_list->ghichu->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctu_list->RowCount ?>_bhld_ctu_ghichu">
<span<?php echo $bhld_ctu_list->ghichu->viewAttributes() ?>><?php echo $bhld_ctu_list->ghichu->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_ctu_list->madm->Visible) { // madm ?>
		<td data-name="madm" <?php echo $bhld_ctu_list->madm->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctu_list->RowCount ?>_bhld_ctu_madm">
<span<?php echo $bhld_ctu_list->madm->viewAttributes() ?>><?php echo $bhld_ctu_list->madm->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bhld_ctu_list->ListOptions->render("body", "right", $bhld_ctu_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$bhld_ctu_list->isGridAdd())
		$bhld_ctu_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$bhld_ctu->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($bhld_ctu_list->Recordset)
	$bhld_ctu_list->Recordset->Close();
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($bhld_ctu_list->TotalRecords == 0 && !$bhld_ctu->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $bhld_ctu_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$bhld_ctu_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$bhld_ctu_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	$("#x_ngct").on("change, blur",function(){this.form.submit()});
});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$bhld_ctu_list->terminate();
?>
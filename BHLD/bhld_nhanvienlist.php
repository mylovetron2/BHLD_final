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
$bhld_nhanvien_list = new bhld_nhanvien_list();

// Run the page
$bhld_nhanvien_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_nhanvien_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$bhld_nhanvien_list->isExport()) { ?>
<script>
var fbhld_nhanvienlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fbhld_nhanvienlist = currentForm = new ew.Form("fbhld_nhanvienlist", "list");
	fbhld_nhanvienlist.formKeyCountName = '<?php echo $bhld_nhanvien_list->FormKeyCountName ?>';
	loadjs.done("fbhld_nhanvienlist");
});
var fbhld_nhanvienlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fbhld_nhanvienlistsrch = currentSearchForm = new ew.Form("fbhld_nhanvienlistsrch");

	// Validate function for search
	fbhld_nhanvienlistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fbhld_nhanvienlistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbhld_nhanvienlistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fbhld_nhanvienlistsrch.lists["x_mapb"] = <?php echo $bhld_nhanvien_list->mapb->Lookup->toClientList($bhld_nhanvien_list) ?>;
	fbhld_nhanvienlistsrch.lists["x_mapb"].options = <?php echo JsonEncode($bhld_nhanvien_list->mapb->lookupOptions()) ?>;

	// Filters
	fbhld_nhanvienlistsrch.filterList = <?php echo $bhld_nhanvien_list->getFilterList() ?>;
	loadjs.done("fbhld_nhanvienlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$bhld_nhanvien_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($bhld_nhanvien_list->TotalRecords > 0 && $bhld_nhanvien_list->ExportOptions->visible()) { ?>
<?php $bhld_nhanvien_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_nhanvien_list->ImportOptions->visible()) { ?>
<?php $bhld_nhanvien_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_nhanvien_list->SearchOptions->visible()) { ?>
<?php $bhld_nhanvien_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_nhanvien_list->FilterOptions->visible()) { ?>
<?php $bhld_nhanvien_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$bhld_nhanvien_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$bhld_nhanvien_list->isExport() && !$bhld_nhanvien->CurrentAction) { ?>
<form name="fbhld_nhanvienlistsrch" id="fbhld_nhanvienlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fbhld_nhanvienlistsrch-search-panel" class="<?php echo $bhld_nhanvien_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="bhld_nhanvien">
	<div class="ew-extended-search">
<?php

// Render search row
$bhld_nhanvien->RowType = ROWTYPE_SEARCH;
$bhld_nhanvien->resetAttributes();
$bhld_nhanvien_list->renderRow();
?>
<?php if ($bhld_nhanvien_list->mapb->Visible) { // mapb ?>
	<?php
		$bhld_nhanvien_list->SearchColumnCount++;
		if (($bhld_nhanvien_list->SearchColumnCount - 1) % $bhld_nhanvien_list->SearchFieldsPerRow == 0) {
			$bhld_nhanvien_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $bhld_nhanvien_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_mapb" class="ew-cell form-group">
		<label for="x_mapb" class="ew-search-caption ew-label"><?php echo $bhld_nhanvien_list->mapb->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_mapb" id="z_mapb" value="LIKE">
</span>
		<span id="el_bhld_nhanvien_mapb" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="bhld_nhanvien" data-field="x_mapb" data-value-separator="<?php echo $bhld_nhanvien_list->mapb->displayValueSeparatorAttribute() ?>" id="x_mapb" name="x_mapb"<?php echo $bhld_nhanvien_list->mapb->editAttributes() ?>>
			<?php echo $bhld_nhanvien_list->mapb->selectOptionListHtml("x_mapb") ?>
		</select>
</div>
<?php echo $bhld_nhanvien_list->mapb->Lookup->getParamTag($bhld_nhanvien_list, "p_x_mapb") ?>
</span>
	</div>
	<?php if ($bhld_nhanvien_list->SearchColumnCount % $bhld_nhanvien_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($bhld_nhanvien_list->SearchColumnCount % $bhld_nhanvien_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $bhld_nhanvien_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($bhld_nhanvien_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($bhld_nhanvien_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $bhld_nhanvien_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($bhld_nhanvien_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($bhld_nhanvien_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($bhld_nhanvien_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($bhld_nhanvien_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $bhld_nhanvien_list->showPageHeader(); ?>
<?php
$bhld_nhanvien_list->showMessage();
?>
<?php if ($bhld_nhanvien_list->TotalRecords > 0 || $bhld_nhanvien->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($bhld_nhanvien_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> bhld_nhanvien">
<?php if (!$bhld_nhanvien_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$bhld_nhanvien_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $bhld_nhanvien_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $bhld_nhanvien_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbhld_nhanvienlist" id="fbhld_nhanvienlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_nhanvien">
<div id="gmp_bhld_nhanvien" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($bhld_nhanvien_list->TotalRecords > 0 || $bhld_nhanvien_list->isGridEdit()) { ?>
<table id="tbl_bhld_nhanvienlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$bhld_nhanvien->RowType = ROWTYPE_HEADER;

// Render list options
$bhld_nhanvien_list->renderListOptions();

// Render list options (header, left)
$bhld_nhanvien_list->ListOptions->render("header", "left");
?>
<?php if ($bhld_nhanvien_list->mapb->Visible) { // mapb ?>
	<?php if ($bhld_nhanvien_list->SortUrl($bhld_nhanvien_list->mapb) == "") { ?>
		<th data-name="mapb" class="<?php echo $bhld_nhanvien_list->mapb->headerCellClass() ?>"><div id="elh_bhld_nhanvien_mapb" class="bhld_nhanvien_mapb"><div class="ew-table-header-caption"><?php echo $bhld_nhanvien_list->mapb->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mapb" class="<?php echo $bhld_nhanvien_list->mapb->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_nhanvien_list->SortUrl($bhld_nhanvien_list->mapb) ?>', 1);"><div id="elh_bhld_nhanvien_mapb" class="bhld_nhanvien_mapb">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_nhanvien_list->mapb->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_nhanvien_list->mapb->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_nhanvien_list->mapb->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_nhanvien_list->manv->Visible) { // manv ?>
	<?php if ($bhld_nhanvien_list->SortUrl($bhld_nhanvien_list->manv) == "") { ?>
		<th data-name="manv" class="<?php echo $bhld_nhanvien_list->manv->headerCellClass() ?>"><div id="elh_bhld_nhanvien_manv" class="bhld_nhanvien_manv"><div class="ew-table-header-caption"><?php echo $bhld_nhanvien_list->manv->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="manv" class="<?php echo $bhld_nhanvien_list->manv->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_nhanvien_list->SortUrl($bhld_nhanvien_list->manv) ?>', 1);"><div id="elh_bhld_nhanvien_manv" class="bhld_nhanvien_manv">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_nhanvien_list->manv->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bhld_nhanvien_list->manv->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_nhanvien_list->manv->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_nhanvien_list->tennhanvien->Visible) { // tennhanvien ?>
	<?php if ($bhld_nhanvien_list->SortUrl($bhld_nhanvien_list->tennhanvien) == "") { ?>
		<th data-name="tennhanvien" class="<?php echo $bhld_nhanvien_list->tennhanvien->headerCellClass() ?>"><div id="elh_bhld_nhanvien_tennhanvien" class="bhld_nhanvien_tennhanvien"><div class="ew-table-header-caption"><?php echo $bhld_nhanvien_list->tennhanvien->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tennhanvien" class="<?php echo $bhld_nhanvien_list->tennhanvien->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_nhanvien_list->SortUrl($bhld_nhanvien_list->tennhanvien) ?>', 1);"><div id="elh_bhld_nhanvien_tennhanvien" class="bhld_nhanvien_tennhanvien">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_nhanvien_list->tennhanvien->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bhld_nhanvien_list->tennhanvien->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_nhanvien_list->tennhanvien->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$bhld_nhanvien_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($bhld_nhanvien_list->ExportAll && $bhld_nhanvien_list->isExport()) {
	$bhld_nhanvien_list->StopRecord = $bhld_nhanvien_list->TotalRecords;
} else {

	// Set the last record to display
	if ($bhld_nhanvien_list->TotalRecords > $bhld_nhanvien_list->StartRecord + $bhld_nhanvien_list->DisplayRecords - 1)
		$bhld_nhanvien_list->StopRecord = $bhld_nhanvien_list->StartRecord + $bhld_nhanvien_list->DisplayRecords - 1;
	else
		$bhld_nhanvien_list->StopRecord = $bhld_nhanvien_list->TotalRecords;
}
$bhld_nhanvien_list->RecordCount = $bhld_nhanvien_list->StartRecord - 1;
if ($bhld_nhanvien_list->Recordset && !$bhld_nhanvien_list->Recordset->EOF) {
	$bhld_nhanvien_list->Recordset->moveFirst();
	$selectLimit = $bhld_nhanvien_list->UseSelectLimit;
	if (!$selectLimit && $bhld_nhanvien_list->StartRecord > 1)
		$bhld_nhanvien_list->Recordset->move($bhld_nhanvien_list->StartRecord - 1);
} elseif (!$bhld_nhanvien->AllowAddDeleteRow && $bhld_nhanvien_list->StopRecord == 0) {
	$bhld_nhanvien_list->StopRecord = $bhld_nhanvien->GridAddRowCount;
}

// Initialize aggregate
$bhld_nhanvien->RowType = ROWTYPE_AGGREGATEINIT;
$bhld_nhanvien->resetAttributes();
$bhld_nhanvien_list->renderRow();
while ($bhld_nhanvien_list->RecordCount < $bhld_nhanvien_list->StopRecord) {
	$bhld_nhanvien_list->RecordCount++;
	if ($bhld_nhanvien_list->RecordCount >= $bhld_nhanvien_list->StartRecord) {
		$bhld_nhanvien_list->RowCount++;

		// Set up key count
		$bhld_nhanvien_list->KeyCount = $bhld_nhanvien_list->RowIndex;

		// Init row class and style
		$bhld_nhanvien->resetAttributes();
		$bhld_nhanvien->CssClass = "";
		if ($bhld_nhanvien_list->isGridAdd()) {
		} else {
			$bhld_nhanvien_list->loadRowValues($bhld_nhanvien_list->Recordset); // Load row values
		}
		$bhld_nhanvien->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$bhld_nhanvien->RowAttrs->merge(["data-rowindex" => $bhld_nhanvien_list->RowCount, "id" => "r" . $bhld_nhanvien_list->RowCount . "_bhld_nhanvien", "data-rowtype" => $bhld_nhanvien->RowType]);

		// Render row
		$bhld_nhanvien_list->renderRow();

		// Render list options
		$bhld_nhanvien_list->renderListOptions();
?>
	<tr <?php echo $bhld_nhanvien->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bhld_nhanvien_list->ListOptions->render("body", "left", $bhld_nhanvien_list->RowCount);
?>
	<?php if ($bhld_nhanvien_list->mapb->Visible) { // mapb ?>
		<td data-name="mapb" <?php echo $bhld_nhanvien_list->mapb->cellAttributes() ?>>
<span id="el<?php echo $bhld_nhanvien_list->RowCount ?>_bhld_nhanvien_mapb">
<span<?php echo $bhld_nhanvien_list->mapb->viewAttributes() ?>><?php echo $bhld_nhanvien_list->mapb->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_nhanvien_list->manv->Visible) { // manv ?>
		<td data-name="manv" <?php echo $bhld_nhanvien_list->manv->cellAttributes() ?>>
<span id="el<?php echo $bhld_nhanvien_list->RowCount ?>_bhld_nhanvien_manv">
<span<?php echo $bhld_nhanvien_list->manv->viewAttributes() ?>><?php echo $bhld_nhanvien_list->manv->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_nhanvien_list->tennhanvien->Visible) { // tennhanvien ?>
		<td data-name="tennhanvien" <?php echo $bhld_nhanvien_list->tennhanvien->cellAttributes() ?>>
<span id="el<?php echo $bhld_nhanvien_list->RowCount ?>_bhld_nhanvien_tennhanvien">
<span<?php echo $bhld_nhanvien_list->tennhanvien->viewAttributes() ?>><?php echo $bhld_nhanvien_list->tennhanvien->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bhld_nhanvien_list->ListOptions->render("body", "right", $bhld_nhanvien_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$bhld_nhanvien_list->isGridAdd())
		$bhld_nhanvien_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$bhld_nhanvien->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($bhld_nhanvien_list->Recordset)
	$bhld_nhanvien_list->Recordset->Close();
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($bhld_nhanvien_list->TotalRecords == 0 && !$bhld_nhanvien->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $bhld_nhanvien_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$bhld_nhanvien_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$bhld_nhanvien_list->isExport()) { ?>
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
$bhld_nhanvien_list->terminate();
?>
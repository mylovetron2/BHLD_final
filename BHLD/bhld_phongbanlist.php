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
$bhld_phongban_list = new bhld_phongban_list();

// Run the page
$bhld_phongban_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_phongban_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$bhld_phongban_list->isExport()) { ?>
<script>
var fbhld_phongbanlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fbhld_phongbanlist = currentForm = new ew.Form("fbhld_phongbanlist", "list");
	fbhld_phongbanlist.formKeyCountName = '<?php echo $bhld_phongban_list->FormKeyCountName ?>';
	loadjs.done("fbhld_phongbanlist");
});
var fbhld_phongbanlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fbhld_phongbanlistsrch = currentSearchForm = new ew.Form("fbhld_phongbanlistsrch");

	// Dynamic selection lists
	// Filters

	fbhld_phongbanlistsrch.filterList = <?php echo $bhld_phongban_list->getFilterList() ?>;
	loadjs.done("fbhld_phongbanlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$bhld_phongban_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($bhld_phongban_list->TotalRecords > 0 && $bhld_phongban_list->ExportOptions->visible()) { ?>
<?php $bhld_phongban_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_phongban_list->ImportOptions->visible()) { ?>
<?php $bhld_phongban_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_phongban_list->SearchOptions->visible()) { ?>
<?php $bhld_phongban_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_phongban_list->FilterOptions->visible()) { ?>
<?php $bhld_phongban_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$bhld_phongban_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$bhld_phongban_list->isExport() && !$bhld_phongban->CurrentAction) { ?>
<form name="fbhld_phongbanlistsrch" id="fbhld_phongbanlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fbhld_phongbanlistsrch-search-panel" class="<?php echo $bhld_phongban_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="bhld_phongban">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $bhld_phongban_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($bhld_phongban_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($bhld_phongban_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $bhld_phongban_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($bhld_phongban_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($bhld_phongban_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($bhld_phongban_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($bhld_phongban_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $bhld_phongban_list->showPageHeader(); ?>
<?php
$bhld_phongban_list->showMessage();
?>
<?php if ($bhld_phongban_list->TotalRecords > 0 || $bhld_phongban->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($bhld_phongban_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> bhld_phongban">
<?php if (!$bhld_phongban_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$bhld_phongban_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $bhld_phongban_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $bhld_phongban_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbhld_phongbanlist" id="fbhld_phongbanlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_phongban">
<div id="gmp_bhld_phongban" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($bhld_phongban_list->TotalRecords > 0 || $bhld_phongban_list->isGridEdit()) { ?>
<table id="tbl_bhld_phongbanlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$bhld_phongban->RowType = ROWTYPE_HEADER;

// Render list options
$bhld_phongban_list->renderListOptions();

// Render list options (header, left)
$bhld_phongban_list->ListOptions->render("header", "left");
?>
<?php if ($bhld_phongban_list->mapb->Visible) { // mapb ?>
	<?php if ($bhld_phongban_list->SortUrl($bhld_phongban_list->mapb) == "") { ?>
		<th data-name="mapb" class="<?php echo $bhld_phongban_list->mapb->headerCellClass() ?>"><div id="elh_bhld_phongban_mapb" class="bhld_phongban_mapb"><div class="ew-table-header-caption"><?php echo $bhld_phongban_list->mapb->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mapb" class="<?php echo $bhld_phongban_list->mapb->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_phongban_list->SortUrl($bhld_phongban_list->mapb) ?>', 1);"><div id="elh_bhld_phongban_mapb" class="bhld_phongban_mapb">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_phongban_list->mapb->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bhld_phongban_list->mapb->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_phongban_list->mapb->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_phongban_list->tenphong->Visible) { // tenphong ?>
	<?php if ($bhld_phongban_list->SortUrl($bhld_phongban_list->tenphong) == "") { ?>
		<th data-name="tenphong" class="<?php echo $bhld_phongban_list->tenphong->headerCellClass() ?>"><div id="elh_bhld_phongban_tenphong" class="bhld_phongban_tenphong"><div class="ew-table-header-caption"><?php echo $bhld_phongban_list->tenphong->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tenphong" class="<?php echo $bhld_phongban_list->tenphong->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_phongban_list->SortUrl($bhld_phongban_list->tenphong) ?>', 1);"><div id="elh_bhld_phongban_tenphong" class="bhld_phongban_tenphong">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_phongban_list->tenphong->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bhld_phongban_list->tenphong->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_phongban_list->tenphong->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$bhld_phongban_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($bhld_phongban_list->ExportAll && $bhld_phongban_list->isExport()) {
	$bhld_phongban_list->StopRecord = $bhld_phongban_list->TotalRecords;
} else {

	// Set the last record to display
	if ($bhld_phongban_list->TotalRecords > $bhld_phongban_list->StartRecord + $bhld_phongban_list->DisplayRecords - 1)
		$bhld_phongban_list->StopRecord = $bhld_phongban_list->StartRecord + $bhld_phongban_list->DisplayRecords - 1;
	else
		$bhld_phongban_list->StopRecord = $bhld_phongban_list->TotalRecords;
}
$bhld_phongban_list->RecordCount = $bhld_phongban_list->StartRecord - 1;
if ($bhld_phongban_list->Recordset && !$bhld_phongban_list->Recordset->EOF) {
	$bhld_phongban_list->Recordset->moveFirst();
	$selectLimit = $bhld_phongban_list->UseSelectLimit;
	if (!$selectLimit && $bhld_phongban_list->StartRecord > 1)
		$bhld_phongban_list->Recordset->move($bhld_phongban_list->StartRecord - 1);
} elseif (!$bhld_phongban->AllowAddDeleteRow && $bhld_phongban_list->StopRecord == 0) {
	$bhld_phongban_list->StopRecord = $bhld_phongban->GridAddRowCount;
}

// Initialize aggregate
$bhld_phongban->RowType = ROWTYPE_AGGREGATEINIT;
$bhld_phongban->resetAttributes();
$bhld_phongban_list->renderRow();
while ($bhld_phongban_list->RecordCount < $bhld_phongban_list->StopRecord) {
	$bhld_phongban_list->RecordCount++;
	if ($bhld_phongban_list->RecordCount >= $bhld_phongban_list->StartRecord) {
		$bhld_phongban_list->RowCount++;

		// Set up key count
		$bhld_phongban_list->KeyCount = $bhld_phongban_list->RowIndex;

		// Init row class and style
		$bhld_phongban->resetAttributes();
		$bhld_phongban->CssClass = "";
		if ($bhld_phongban_list->isGridAdd()) {
		} else {
			$bhld_phongban_list->loadRowValues($bhld_phongban_list->Recordset); // Load row values
		}
		$bhld_phongban->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$bhld_phongban->RowAttrs->merge(["data-rowindex" => $bhld_phongban_list->RowCount, "id" => "r" . $bhld_phongban_list->RowCount . "_bhld_phongban", "data-rowtype" => $bhld_phongban->RowType]);

		// Render row
		$bhld_phongban_list->renderRow();

		// Render list options
		$bhld_phongban_list->renderListOptions();
?>
	<tr <?php echo $bhld_phongban->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bhld_phongban_list->ListOptions->render("body", "left", $bhld_phongban_list->RowCount);
?>
	<?php if ($bhld_phongban_list->mapb->Visible) { // mapb ?>
		<td data-name="mapb" <?php echo $bhld_phongban_list->mapb->cellAttributes() ?>>
<span id="el<?php echo $bhld_phongban_list->RowCount ?>_bhld_phongban_mapb">
<span<?php echo $bhld_phongban_list->mapb->viewAttributes() ?>><?php echo $bhld_phongban_list->mapb->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_phongban_list->tenphong->Visible) { // tenphong ?>
		<td data-name="tenphong" <?php echo $bhld_phongban_list->tenphong->cellAttributes() ?>>
<span id="el<?php echo $bhld_phongban_list->RowCount ?>_bhld_phongban_tenphong">
<span<?php echo $bhld_phongban_list->tenphong->viewAttributes() ?>><?php echo $bhld_phongban_list->tenphong->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bhld_phongban_list->ListOptions->render("body", "right", $bhld_phongban_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$bhld_phongban_list->isGridAdd())
		$bhld_phongban_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$bhld_phongban->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($bhld_phongban_list->Recordset)
	$bhld_phongban_list->Recordset->Close();
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($bhld_phongban_list->TotalRecords == 0 && !$bhld_phongban->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $bhld_phongban_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$bhld_phongban_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$bhld_phongban_list->isExport()) { ?>
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
$bhld_phongban_list->terminate();
?>
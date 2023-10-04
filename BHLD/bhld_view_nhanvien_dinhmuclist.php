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
$bhld_view_nhanvien_dinhmuc_list = new bhld_view_nhanvien_dinhmuc_list();

// Run the page
$bhld_view_nhanvien_dinhmuc_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_view_nhanvien_dinhmuc_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$bhld_view_nhanvien_dinhmuc_list->isExport()) { ?>
<script>
var fbhld_view_nhanvien_dinhmuclist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fbhld_view_nhanvien_dinhmuclist = currentForm = new ew.Form("fbhld_view_nhanvien_dinhmuclist", "list");
	fbhld_view_nhanvien_dinhmuclist.formKeyCountName = '<?php echo $bhld_view_nhanvien_dinhmuc_list->FormKeyCountName ?>';
	loadjs.done("fbhld_view_nhanvien_dinhmuclist");
});
var fbhld_view_nhanvien_dinhmuclistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fbhld_view_nhanvien_dinhmuclistsrch = currentSearchForm = new ew.Form("fbhld_view_nhanvien_dinhmuclistsrch");

	// Dynamic selection lists
	// Filters

	fbhld_view_nhanvien_dinhmuclistsrch.filterList = <?php echo $bhld_view_nhanvien_dinhmuc_list->getFilterList() ?>;
	loadjs.done("fbhld_view_nhanvien_dinhmuclistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$bhld_view_nhanvien_dinhmuc_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($bhld_view_nhanvien_dinhmuc_list->TotalRecords > 0 && $bhld_view_nhanvien_dinhmuc_list->ExportOptions->visible()) { ?>
<?php $bhld_view_nhanvien_dinhmuc_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_view_nhanvien_dinhmuc_list->ImportOptions->visible()) { ?>
<?php $bhld_view_nhanvien_dinhmuc_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_view_nhanvien_dinhmuc_list->SearchOptions->visible()) { ?>
<?php $bhld_view_nhanvien_dinhmuc_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_view_nhanvien_dinhmuc_list->FilterOptions->visible()) { ?>
<?php $bhld_view_nhanvien_dinhmuc_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$bhld_view_nhanvien_dinhmuc_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$bhld_view_nhanvien_dinhmuc_list->isExport() && !$bhld_view_nhanvien_dinhmuc->CurrentAction) { ?>
<form name="fbhld_view_nhanvien_dinhmuclistsrch" id="fbhld_view_nhanvien_dinhmuclistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fbhld_view_nhanvien_dinhmuclistsrch-search-panel" class="<?php echo $bhld_view_nhanvien_dinhmuc_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="bhld_view_nhanvien_dinhmuc">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $bhld_view_nhanvien_dinhmuc_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($bhld_view_nhanvien_dinhmuc_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($bhld_view_nhanvien_dinhmuc_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $bhld_view_nhanvien_dinhmuc_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($bhld_view_nhanvien_dinhmuc_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($bhld_view_nhanvien_dinhmuc_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($bhld_view_nhanvien_dinhmuc_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($bhld_view_nhanvien_dinhmuc_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $bhld_view_nhanvien_dinhmuc_list->showPageHeader(); ?>
<?php
$bhld_view_nhanvien_dinhmuc_list->showMessage();
?>
<?php if ($bhld_view_nhanvien_dinhmuc_list->TotalRecords > 0 || $bhld_view_nhanvien_dinhmuc->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($bhld_view_nhanvien_dinhmuc_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> bhld_view_nhanvien_dinhmuc">
<?php if (!$bhld_view_nhanvien_dinhmuc_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$bhld_view_nhanvien_dinhmuc_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $bhld_view_nhanvien_dinhmuc_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $bhld_view_nhanvien_dinhmuc_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbhld_view_nhanvien_dinhmuclist" id="fbhld_view_nhanvien_dinhmuclist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_view_nhanvien_dinhmuc">
<div id="gmp_bhld_view_nhanvien_dinhmuc" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($bhld_view_nhanvien_dinhmuc_list->TotalRecords > 0 || $bhld_view_nhanvien_dinhmuc_list->isGridEdit()) { ?>
<table id="tbl_bhld_view_nhanvien_dinhmuclist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$bhld_view_nhanvien_dinhmuc->RowType = ROWTYPE_HEADER;

// Render list options
$bhld_view_nhanvien_dinhmuc_list->renderListOptions();

// Render list options (header, left)
$bhld_view_nhanvien_dinhmuc_list->ListOptions->render("header", "left");
?>
<?php if ($bhld_view_nhanvien_dinhmuc_list->manv->Visible) { // manv ?>
	<?php if ($bhld_view_nhanvien_dinhmuc_list->SortUrl($bhld_view_nhanvien_dinhmuc_list->manv) == "") { ?>
		<th data-name="manv" class="<?php echo $bhld_view_nhanvien_dinhmuc_list->manv->headerCellClass() ?>"><div id="elh_bhld_view_nhanvien_dinhmuc_manv" class="bhld_view_nhanvien_dinhmuc_manv"><div class="ew-table-header-caption"><?php echo $bhld_view_nhanvien_dinhmuc_list->manv->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="manv" class="<?php echo $bhld_view_nhanvien_dinhmuc_list->manv->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_nhanvien_dinhmuc_list->SortUrl($bhld_view_nhanvien_dinhmuc_list->manv) ?>', 1);"><div id="elh_bhld_view_nhanvien_dinhmuc_manv" class="bhld_view_nhanvien_dinhmuc_manv">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_nhanvien_dinhmuc_list->manv->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_nhanvien_dinhmuc_list->manv->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_nhanvien_dinhmuc_list->manv->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_nhanvien_dinhmuc_list->madm->Visible) { // madm ?>
	<?php if ($bhld_view_nhanvien_dinhmuc_list->SortUrl($bhld_view_nhanvien_dinhmuc_list->madm) == "") { ?>
		<th data-name="madm" class="<?php echo $bhld_view_nhanvien_dinhmuc_list->madm->headerCellClass() ?>"><div id="elh_bhld_view_nhanvien_dinhmuc_madm" class="bhld_view_nhanvien_dinhmuc_madm"><div class="ew-table-header-caption"><?php echo $bhld_view_nhanvien_dinhmuc_list->madm->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="madm" class="<?php echo $bhld_view_nhanvien_dinhmuc_list->madm->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_nhanvien_dinhmuc_list->SortUrl($bhld_view_nhanvien_dinhmuc_list->madm) ?>', 1);"><div id="elh_bhld_view_nhanvien_dinhmuc_madm" class="bhld_view_nhanvien_dinhmuc_madm">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_nhanvien_dinhmuc_list->madm->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_nhanvien_dinhmuc_list->madm->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_nhanvien_dinhmuc_list->madm->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_nhanvien_dinhmuc_list->MAX28ngct29->Visible) { // MAX(ngct) ?>
	<?php if ($bhld_view_nhanvien_dinhmuc_list->SortUrl($bhld_view_nhanvien_dinhmuc_list->MAX28ngct29) == "") { ?>
		<th data-name="MAX28ngct29" class="<?php echo $bhld_view_nhanvien_dinhmuc_list->MAX28ngct29->headerCellClass() ?>"><div id="elh_bhld_view_nhanvien_dinhmuc_MAX28ngct29" class="bhld_view_nhanvien_dinhmuc_MAX28ngct29"><div class="ew-table-header-caption"><?php echo $bhld_view_nhanvien_dinhmuc_list->MAX28ngct29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MAX28ngct29" class="<?php echo $bhld_view_nhanvien_dinhmuc_list->MAX28ngct29->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_nhanvien_dinhmuc_list->SortUrl($bhld_view_nhanvien_dinhmuc_list->MAX28ngct29) ?>', 1);"><div id="elh_bhld_view_nhanvien_dinhmuc_MAX28ngct29" class="bhld_view_nhanvien_dinhmuc_MAX28ngct29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_nhanvien_dinhmuc_list->MAX28ngct29->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_nhanvien_dinhmuc_list->MAX28ngct29->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_nhanvien_dinhmuc_list->MAX28ngct29->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_nhanvien_dinhmuc_list->mapb->Visible) { // mapb ?>
	<?php if ($bhld_view_nhanvien_dinhmuc_list->SortUrl($bhld_view_nhanvien_dinhmuc_list->mapb) == "") { ?>
		<th data-name="mapb" class="<?php echo $bhld_view_nhanvien_dinhmuc_list->mapb->headerCellClass() ?>"><div id="elh_bhld_view_nhanvien_dinhmuc_mapb" class="bhld_view_nhanvien_dinhmuc_mapb"><div class="ew-table-header-caption"><?php echo $bhld_view_nhanvien_dinhmuc_list->mapb->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mapb" class="<?php echo $bhld_view_nhanvien_dinhmuc_list->mapb->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_nhanvien_dinhmuc_list->SortUrl($bhld_view_nhanvien_dinhmuc_list->mapb) ?>', 1);"><div id="elh_bhld_view_nhanvien_dinhmuc_mapb" class="bhld_view_nhanvien_dinhmuc_mapb">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_nhanvien_dinhmuc_list->mapb->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_nhanvien_dinhmuc_list->mapb->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_nhanvien_dinhmuc_list->mapb->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$bhld_view_nhanvien_dinhmuc_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($bhld_view_nhanvien_dinhmuc_list->ExportAll && $bhld_view_nhanvien_dinhmuc_list->isExport()) {
	$bhld_view_nhanvien_dinhmuc_list->StopRecord = $bhld_view_nhanvien_dinhmuc_list->TotalRecords;
} else {

	// Set the last record to display
	if ($bhld_view_nhanvien_dinhmuc_list->TotalRecords > $bhld_view_nhanvien_dinhmuc_list->StartRecord + $bhld_view_nhanvien_dinhmuc_list->DisplayRecords - 1)
		$bhld_view_nhanvien_dinhmuc_list->StopRecord = $bhld_view_nhanvien_dinhmuc_list->StartRecord + $bhld_view_nhanvien_dinhmuc_list->DisplayRecords - 1;
	else
		$bhld_view_nhanvien_dinhmuc_list->StopRecord = $bhld_view_nhanvien_dinhmuc_list->TotalRecords;
}
$bhld_view_nhanvien_dinhmuc_list->RecordCount = $bhld_view_nhanvien_dinhmuc_list->StartRecord - 1;
if ($bhld_view_nhanvien_dinhmuc_list->Recordset && !$bhld_view_nhanvien_dinhmuc_list->Recordset->EOF) {
	$bhld_view_nhanvien_dinhmuc_list->Recordset->moveFirst();
	$selectLimit = $bhld_view_nhanvien_dinhmuc_list->UseSelectLimit;
	if (!$selectLimit && $bhld_view_nhanvien_dinhmuc_list->StartRecord > 1)
		$bhld_view_nhanvien_dinhmuc_list->Recordset->move($bhld_view_nhanvien_dinhmuc_list->StartRecord - 1);
} elseif (!$bhld_view_nhanvien_dinhmuc->AllowAddDeleteRow && $bhld_view_nhanvien_dinhmuc_list->StopRecord == 0) {
	$bhld_view_nhanvien_dinhmuc_list->StopRecord = $bhld_view_nhanvien_dinhmuc->GridAddRowCount;
}

// Initialize aggregate
$bhld_view_nhanvien_dinhmuc->RowType = ROWTYPE_AGGREGATEINIT;
$bhld_view_nhanvien_dinhmuc->resetAttributes();
$bhld_view_nhanvien_dinhmuc_list->renderRow();
while ($bhld_view_nhanvien_dinhmuc_list->RecordCount < $bhld_view_nhanvien_dinhmuc_list->StopRecord) {
	$bhld_view_nhanvien_dinhmuc_list->RecordCount++;
	if ($bhld_view_nhanvien_dinhmuc_list->RecordCount >= $bhld_view_nhanvien_dinhmuc_list->StartRecord) {
		$bhld_view_nhanvien_dinhmuc_list->RowCount++;

		// Set up key count
		$bhld_view_nhanvien_dinhmuc_list->KeyCount = $bhld_view_nhanvien_dinhmuc_list->RowIndex;

		// Init row class and style
		$bhld_view_nhanvien_dinhmuc->resetAttributes();
		$bhld_view_nhanvien_dinhmuc->CssClass = "";
		if ($bhld_view_nhanvien_dinhmuc_list->isGridAdd()) {
		} else {
			$bhld_view_nhanvien_dinhmuc_list->loadRowValues($bhld_view_nhanvien_dinhmuc_list->Recordset); // Load row values
		}
		$bhld_view_nhanvien_dinhmuc->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$bhld_view_nhanvien_dinhmuc->RowAttrs->merge(["data-rowindex" => $bhld_view_nhanvien_dinhmuc_list->RowCount, "id" => "r" . $bhld_view_nhanvien_dinhmuc_list->RowCount . "_bhld_view_nhanvien_dinhmuc", "data-rowtype" => $bhld_view_nhanvien_dinhmuc->RowType]);

		// Render row
		$bhld_view_nhanvien_dinhmuc_list->renderRow();

		// Render list options
		$bhld_view_nhanvien_dinhmuc_list->renderListOptions();
?>
	<tr <?php echo $bhld_view_nhanvien_dinhmuc->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bhld_view_nhanvien_dinhmuc_list->ListOptions->render("body", "left", $bhld_view_nhanvien_dinhmuc_list->RowCount);
?>
	<?php if ($bhld_view_nhanvien_dinhmuc_list->manv->Visible) { // manv ?>
		<td data-name="manv" <?php echo $bhld_view_nhanvien_dinhmuc_list->manv->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_nhanvien_dinhmuc_list->RowCount ?>_bhld_view_nhanvien_dinhmuc_manv">
<span<?php echo $bhld_view_nhanvien_dinhmuc_list->manv->viewAttributes() ?>><?php echo $bhld_view_nhanvien_dinhmuc_list->manv->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_nhanvien_dinhmuc_list->madm->Visible) { // madm ?>
		<td data-name="madm" <?php echo $bhld_view_nhanvien_dinhmuc_list->madm->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_nhanvien_dinhmuc_list->RowCount ?>_bhld_view_nhanvien_dinhmuc_madm">
<span<?php echo $bhld_view_nhanvien_dinhmuc_list->madm->viewAttributes() ?>><?php echo $bhld_view_nhanvien_dinhmuc_list->madm->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_nhanvien_dinhmuc_list->MAX28ngct29->Visible) { // MAX(ngct) ?>
		<td data-name="MAX28ngct29" <?php echo $bhld_view_nhanvien_dinhmuc_list->MAX28ngct29->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_nhanvien_dinhmuc_list->RowCount ?>_bhld_view_nhanvien_dinhmuc_MAX28ngct29">
<span<?php echo $bhld_view_nhanvien_dinhmuc_list->MAX28ngct29->viewAttributes() ?>><?php echo $bhld_view_nhanvien_dinhmuc_list->MAX28ngct29->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_nhanvien_dinhmuc_list->mapb->Visible) { // mapb ?>
		<td data-name="mapb" <?php echo $bhld_view_nhanvien_dinhmuc_list->mapb->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_nhanvien_dinhmuc_list->RowCount ?>_bhld_view_nhanvien_dinhmuc_mapb">
<span<?php echo $bhld_view_nhanvien_dinhmuc_list->mapb->viewAttributes() ?>><?php echo $bhld_view_nhanvien_dinhmuc_list->mapb->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bhld_view_nhanvien_dinhmuc_list->ListOptions->render("body", "right", $bhld_view_nhanvien_dinhmuc_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$bhld_view_nhanvien_dinhmuc_list->isGridAdd())
		$bhld_view_nhanvien_dinhmuc_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$bhld_view_nhanvien_dinhmuc->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($bhld_view_nhanvien_dinhmuc_list->Recordset)
	$bhld_view_nhanvien_dinhmuc_list->Recordset->Close();
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($bhld_view_nhanvien_dinhmuc_list->TotalRecords == 0 && !$bhld_view_nhanvien_dinhmuc->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $bhld_view_nhanvien_dinhmuc_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$bhld_view_nhanvien_dinhmuc_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$bhld_view_nhanvien_dinhmuc_list->isExport()) { ?>
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
$bhld_view_nhanvien_dinhmuc_list->terminate();
?>
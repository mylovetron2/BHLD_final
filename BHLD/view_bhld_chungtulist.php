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
$view_bhld_chungtu_list = new view_bhld_chungtu_list();

// Run the page
$view_bhld_chungtu_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_bhld_chungtu_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_bhld_chungtu_list->isExport()) { ?>
<script>
var fview_bhld_chungtulist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fview_bhld_chungtulist = currentForm = new ew.Form("fview_bhld_chungtulist", "list");
	fview_bhld_chungtulist.formKeyCountName = '<?php echo $view_bhld_chungtu_list->FormKeyCountName ?>';
	loadjs.done("fview_bhld_chungtulist");
});
var fview_bhld_chungtulistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fview_bhld_chungtulistsrch = currentSearchForm = new ew.Form("fview_bhld_chungtulistsrch");

	// Dynamic selection lists
	// Filters

	fview_bhld_chungtulistsrch.filterList = <?php echo $view_bhld_chungtu_list->getFilterList() ?>;
	loadjs.done("fview_bhld_chungtulistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$view_bhld_chungtu_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($view_bhld_chungtu_list->TotalRecords > 0 && $view_bhld_chungtu_list->ExportOptions->visible()) { ?>
<?php $view_bhld_chungtu_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($view_bhld_chungtu_list->ImportOptions->visible()) { ?>
<?php $view_bhld_chungtu_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($view_bhld_chungtu_list->SearchOptions->visible()) { ?>
<?php $view_bhld_chungtu_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($view_bhld_chungtu_list->FilterOptions->visible()) { ?>
<?php $view_bhld_chungtu_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$view_bhld_chungtu_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$view_bhld_chungtu_list->isExport() && !$view_bhld_chungtu->CurrentAction) { ?>
<form name="fview_bhld_chungtulistsrch" id="fview_bhld_chungtulistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fview_bhld_chungtulistsrch-search-panel" class="<?php echo $view_bhld_chungtu_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_bhld_chungtu">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $view_bhld_chungtu_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($view_bhld_chungtu_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($view_bhld_chungtu_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $view_bhld_chungtu_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($view_bhld_chungtu_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($view_bhld_chungtu_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($view_bhld_chungtu_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($view_bhld_chungtu_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $view_bhld_chungtu_list->showPageHeader(); ?>
<?php
$view_bhld_chungtu_list->showMessage();
?>
<?php if ($view_bhld_chungtu_list->TotalRecords > 0 || $view_bhld_chungtu->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($view_bhld_chungtu_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_bhld_chungtu">
<?php if (!$view_bhld_chungtu_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$view_bhld_chungtu_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $view_bhld_chungtu_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $view_bhld_chungtu_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_bhld_chungtulist" id="fview_bhld_chungtulist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_bhld_chungtu">
<div id="gmp_view_bhld_chungtu" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($view_bhld_chungtu_list->TotalRecords > 0 || $view_bhld_chungtu_list->isGridEdit()) { ?>
<table id="tbl_view_bhld_chungtulist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$view_bhld_chungtu->RowType = ROWTYPE_HEADER;

// Render list options
$view_bhld_chungtu_list->renderListOptions();

// Render list options (header, left)
$view_bhld_chungtu_list->ListOptions->render("header", "left");
?>
<?php if ($view_bhld_chungtu_list->mact->Visible) { // mact ?>
	<?php if ($view_bhld_chungtu_list->SortUrl($view_bhld_chungtu_list->mact) == "") { ?>
		<th data-name="mact" class="<?php echo $view_bhld_chungtu_list->mact->headerCellClass() ?>"><div id="elh_view_bhld_chungtu_mact" class="view_bhld_chungtu_mact"><div class="ew-table-header-caption"><?php echo $view_bhld_chungtu_list->mact->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mact" class="<?php echo $view_bhld_chungtu_list->mact->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_bhld_chungtu_list->SortUrl($view_bhld_chungtu_list->mact) ?>', 1);"><div id="elh_view_bhld_chungtu_mact" class="view_bhld_chungtu_mact">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bhld_chungtu_list->mact->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_bhld_chungtu_list->mact->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_bhld_chungtu_list->mact->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bhld_chungtu_list->manv->Visible) { // manv ?>
	<?php if ($view_bhld_chungtu_list->SortUrl($view_bhld_chungtu_list->manv) == "") { ?>
		<th data-name="manv" class="<?php echo $view_bhld_chungtu_list->manv->headerCellClass() ?>"><div id="elh_view_bhld_chungtu_manv" class="view_bhld_chungtu_manv"><div class="ew-table-header-caption"><?php echo $view_bhld_chungtu_list->manv->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="manv" class="<?php echo $view_bhld_chungtu_list->manv->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_bhld_chungtu_list->SortUrl($view_bhld_chungtu_list->manv) ?>', 1);"><div id="elh_view_bhld_chungtu_manv" class="view_bhld_chungtu_manv">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bhld_chungtu_list->manv->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bhld_chungtu_list->manv->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_bhld_chungtu_list->manv->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bhld_chungtu_list->ngct->Visible) { // ngct ?>
	<?php if ($view_bhld_chungtu_list->SortUrl($view_bhld_chungtu_list->ngct) == "") { ?>
		<th data-name="ngct" class="<?php echo $view_bhld_chungtu_list->ngct->headerCellClass() ?>"><div id="elh_view_bhld_chungtu_ngct" class="view_bhld_chungtu_ngct"><div class="ew-table-header-caption"><?php echo $view_bhld_chungtu_list->ngct->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ngct" class="<?php echo $view_bhld_chungtu_list->ngct->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_bhld_chungtu_list->SortUrl($view_bhld_chungtu_list->ngct) ?>', 1);"><div id="elh_view_bhld_chungtu_ngct" class="view_bhld_chungtu_ngct">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bhld_chungtu_list->ngct->caption() ?></span><span class="ew-table-header-sort"><?php if ($view_bhld_chungtu_list->ngct->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_bhld_chungtu_list->ngct->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bhld_chungtu_list->mapb->Visible) { // mapb ?>
	<?php if ($view_bhld_chungtu_list->SortUrl($view_bhld_chungtu_list->mapb) == "") { ?>
		<th data-name="mapb" class="<?php echo $view_bhld_chungtu_list->mapb->headerCellClass() ?>"><div id="elh_view_bhld_chungtu_mapb" class="view_bhld_chungtu_mapb"><div class="ew-table-header-caption"><?php echo $view_bhld_chungtu_list->mapb->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mapb" class="<?php echo $view_bhld_chungtu_list->mapb->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_bhld_chungtu_list->SortUrl($view_bhld_chungtu_list->mapb) ?>', 1);"><div id="elh_view_bhld_chungtu_mapb" class="view_bhld_chungtu_mapb">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bhld_chungtu_list->mapb->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_bhld_chungtu_list->mapb->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_bhld_chungtu_list->mapb->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bhld_chungtu_list->ghichu->Visible) { // ghichu ?>
	<?php if ($view_bhld_chungtu_list->SortUrl($view_bhld_chungtu_list->ghichu) == "") { ?>
		<th data-name="ghichu" class="<?php echo $view_bhld_chungtu_list->ghichu->headerCellClass() ?>"><div id="elh_view_bhld_chungtu_ghichu" class="view_bhld_chungtu_ghichu"><div class="ew-table-header-caption"><?php echo $view_bhld_chungtu_list->ghichu->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ghichu" class="<?php echo $view_bhld_chungtu_list->ghichu->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_bhld_chungtu_list->SortUrl($view_bhld_chungtu_list->ghichu) ?>', 1);"><div id="elh_view_bhld_chungtu_ghichu" class="view_bhld_chungtu_ghichu">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bhld_chungtu_list->ghichu->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_bhld_chungtu_list->ghichu->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_bhld_chungtu_list->ghichu->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($view_bhld_chungtu_list->madm->Visible) { // madm ?>
	<?php if ($view_bhld_chungtu_list->SortUrl($view_bhld_chungtu_list->madm) == "") { ?>
		<th data-name="madm" class="<?php echo $view_bhld_chungtu_list->madm->headerCellClass() ?>"><div id="elh_view_bhld_chungtu_madm" class="view_bhld_chungtu_madm"><div class="ew-table-header-caption"><?php echo $view_bhld_chungtu_list->madm->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="madm" class="<?php echo $view_bhld_chungtu_list->madm->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $view_bhld_chungtu_list->SortUrl($view_bhld_chungtu_list->madm) ?>', 1);"><div id="elh_view_bhld_chungtu_madm" class="view_bhld_chungtu_madm">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $view_bhld_chungtu_list->madm->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($view_bhld_chungtu_list->madm->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($view_bhld_chungtu_list->madm->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$view_bhld_chungtu_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($view_bhld_chungtu_list->ExportAll && $view_bhld_chungtu_list->isExport()) {
	$view_bhld_chungtu_list->StopRecord = $view_bhld_chungtu_list->TotalRecords;
} else {

	// Set the last record to display
	if ($view_bhld_chungtu_list->TotalRecords > $view_bhld_chungtu_list->StartRecord + $view_bhld_chungtu_list->DisplayRecords - 1)
		$view_bhld_chungtu_list->StopRecord = $view_bhld_chungtu_list->StartRecord + $view_bhld_chungtu_list->DisplayRecords - 1;
	else
		$view_bhld_chungtu_list->StopRecord = $view_bhld_chungtu_list->TotalRecords;
}
$view_bhld_chungtu_list->RecordCount = $view_bhld_chungtu_list->StartRecord - 1;
if ($view_bhld_chungtu_list->Recordset && !$view_bhld_chungtu_list->Recordset->EOF) {
	$view_bhld_chungtu_list->Recordset->moveFirst();
	$selectLimit = $view_bhld_chungtu_list->UseSelectLimit;
	if (!$selectLimit && $view_bhld_chungtu_list->StartRecord > 1)
		$view_bhld_chungtu_list->Recordset->move($view_bhld_chungtu_list->StartRecord - 1);
} elseif (!$view_bhld_chungtu->AllowAddDeleteRow && $view_bhld_chungtu_list->StopRecord == 0) {
	$view_bhld_chungtu_list->StopRecord = $view_bhld_chungtu->GridAddRowCount;
}

// Initialize aggregate
$view_bhld_chungtu->RowType = ROWTYPE_AGGREGATEINIT;
$view_bhld_chungtu->resetAttributes();
$view_bhld_chungtu_list->renderRow();
while ($view_bhld_chungtu_list->RecordCount < $view_bhld_chungtu_list->StopRecord) {
	$view_bhld_chungtu_list->RecordCount++;
	if ($view_bhld_chungtu_list->RecordCount >= $view_bhld_chungtu_list->StartRecord) {
		$view_bhld_chungtu_list->RowCount++;

		// Set up key count
		$view_bhld_chungtu_list->KeyCount = $view_bhld_chungtu_list->RowIndex;

		// Init row class and style
		$view_bhld_chungtu->resetAttributes();
		$view_bhld_chungtu->CssClass = "";
		if ($view_bhld_chungtu_list->isGridAdd()) {
		} else {
			$view_bhld_chungtu_list->loadRowValues($view_bhld_chungtu_list->Recordset); // Load row values
		}
		$view_bhld_chungtu->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$view_bhld_chungtu->RowAttrs->merge(["data-rowindex" => $view_bhld_chungtu_list->RowCount, "id" => "r" . $view_bhld_chungtu_list->RowCount . "_view_bhld_chungtu", "data-rowtype" => $view_bhld_chungtu->RowType]);

		// Render row
		$view_bhld_chungtu_list->renderRow();

		// Render list options
		$view_bhld_chungtu_list->renderListOptions();
?>
	<tr <?php echo $view_bhld_chungtu->rowAttributes() ?>>
<?php

// Render list options (body, left)
$view_bhld_chungtu_list->ListOptions->render("body", "left", $view_bhld_chungtu_list->RowCount);
?>
	<?php if ($view_bhld_chungtu_list->mact->Visible) { // mact ?>
		<td data-name="mact" <?php echo $view_bhld_chungtu_list->mact->cellAttributes() ?>>
<span id="el<?php echo $view_bhld_chungtu_list->RowCount ?>_view_bhld_chungtu_mact">
<span<?php echo $view_bhld_chungtu_list->mact->viewAttributes() ?>><?php echo $view_bhld_chungtu_list->mact->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_bhld_chungtu_list->manv->Visible) { // manv ?>
		<td data-name="manv" <?php echo $view_bhld_chungtu_list->manv->cellAttributes() ?>>
<span id="el<?php echo $view_bhld_chungtu_list->RowCount ?>_view_bhld_chungtu_manv">
<span<?php echo $view_bhld_chungtu_list->manv->viewAttributes() ?>><?php echo $view_bhld_chungtu_list->manv->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_bhld_chungtu_list->ngct->Visible) { // ngct ?>
		<td data-name="ngct" <?php echo $view_bhld_chungtu_list->ngct->cellAttributes() ?>>
<span id="el<?php echo $view_bhld_chungtu_list->RowCount ?>_view_bhld_chungtu_ngct">
<span<?php echo $view_bhld_chungtu_list->ngct->viewAttributes() ?>><?php echo $view_bhld_chungtu_list->ngct->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_bhld_chungtu_list->mapb->Visible) { // mapb ?>
		<td data-name="mapb" <?php echo $view_bhld_chungtu_list->mapb->cellAttributes() ?>>
<span id="el<?php echo $view_bhld_chungtu_list->RowCount ?>_view_bhld_chungtu_mapb">
<span<?php echo $view_bhld_chungtu_list->mapb->viewAttributes() ?>><?php echo $view_bhld_chungtu_list->mapb->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_bhld_chungtu_list->ghichu->Visible) { // ghichu ?>
		<td data-name="ghichu" <?php echo $view_bhld_chungtu_list->ghichu->cellAttributes() ?>>
<span id="el<?php echo $view_bhld_chungtu_list->RowCount ?>_view_bhld_chungtu_ghichu">
<span<?php echo $view_bhld_chungtu_list->ghichu->viewAttributes() ?>><?php echo $view_bhld_chungtu_list->ghichu->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($view_bhld_chungtu_list->madm->Visible) { // madm ?>
		<td data-name="madm" <?php echo $view_bhld_chungtu_list->madm->cellAttributes() ?>>
<span id="el<?php echo $view_bhld_chungtu_list->RowCount ?>_view_bhld_chungtu_madm">
<span<?php echo $view_bhld_chungtu_list->madm->viewAttributes() ?>><?php echo $view_bhld_chungtu_list->madm->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$view_bhld_chungtu_list->ListOptions->render("body", "right", $view_bhld_chungtu_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$view_bhld_chungtu_list->isGridAdd())
		$view_bhld_chungtu_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$view_bhld_chungtu->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($view_bhld_chungtu_list->Recordset)
	$view_bhld_chungtu_list->Recordset->Close();
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($view_bhld_chungtu_list->TotalRecords == 0 && !$view_bhld_chungtu->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $view_bhld_chungtu_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$view_bhld_chungtu_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_bhld_chungtu_list->isExport()) { ?>
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
$view_bhld_chungtu_list->terminate();
?>
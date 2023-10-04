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
$bhld_view_chungtu_danhan_final_list = new bhld_view_chungtu_danhan_final_list();

// Run the page
$bhld_view_chungtu_danhan_final_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_view_chungtu_danhan_final_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$bhld_view_chungtu_danhan_final_list->isExport()) { ?>
<script>
var fbhld_view_chungtu_danhan_finallist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fbhld_view_chungtu_danhan_finallist = currentForm = new ew.Form("fbhld_view_chungtu_danhan_finallist", "list");
	fbhld_view_chungtu_danhan_finallist.formKeyCountName = '<?php echo $bhld_view_chungtu_danhan_final_list->FormKeyCountName ?>';
	loadjs.done("fbhld_view_chungtu_danhan_finallist");
});
var fbhld_view_chungtu_danhan_finallistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fbhld_view_chungtu_danhan_finallistsrch = currentSearchForm = new ew.Form("fbhld_view_chungtu_danhan_finallistsrch");

	// Dynamic selection lists
	// Filters

	fbhld_view_chungtu_danhan_finallistsrch.filterList = <?php echo $bhld_view_chungtu_danhan_final_list->getFilterList() ?>;
	loadjs.done("fbhld_view_chungtu_danhan_finallistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$bhld_view_chungtu_danhan_final_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($bhld_view_chungtu_danhan_final_list->TotalRecords > 0 && $bhld_view_chungtu_danhan_final_list->ExportOptions->visible()) { ?>
<?php $bhld_view_chungtu_danhan_final_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final_list->ImportOptions->visible()) { ?>
<?php $bhld_view_chungtu_danhan_final_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final_list->SearchOptions->visible()) { ?>
<?php $bhld_view_chungtu_danhan_final_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final_list->FilterOptions->visible()) { ?>
<?php $bhld_view_chungtu_danhan_final_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$bhld_view_chungtu_danhan_final_list->isExport() || Config("EXPORT_MASTER_RECORD") && $bhld_view_chungtu_danhan_final_list->isExport("print")) { ?>
<?php
if ($bhld_view_chungtu_danhan_final_list->DbMasterFilter != "" && $bhld_view_chungtu_danhan_final->getCurrentMasterTable() == "bhld_view_nhanvien") {
	if ($bhld_view_chungtu_danhan_final_list->MasterRecordExists) {
		include_once "bhld_view_nhanvienmaster.php";
	}
}
?>
<?php } ?>
<?php
$bhld_view_chungtu_danhan_final_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$bhld_view_chungtu_danhan_final_list->isExport() && !$bhld_view_chungtu_danhan_final->CurrentAction) { ?>
<form name="fbhld_view_chungtu_danhan_finallistsrch" id="fbhld_view_chungtu_danhan_finallistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fbhld_view_chungtu_danhan_finallistsrch-search-panel" class="<?php echo $bhld_view_chungtu_danhan_final_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="bhld_view_chungtu_danhan_final">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $bhld_view_chungtu_danhan_final_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $bhld_view_chungtu_danhan_final_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($bhld_view_chungtu_danhan_final_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($bhld_view_chungtu_danhan_final_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($bhld_view_chungtu_danhan_final_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($bhld_view_chungtu_danhan_final_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $bhld_view_chungtu_danhan_final_list->showPageHeader(); ?>
<?php
$bhld_view_chungtu_danhan_final_list->showMessage();
?>
<?php if ($bhld_view_chungtu_danhan_final_list->TotalRecords > 0 || $bhld_view_chungtu_danhan_final->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($bhld_view_chungtu_danhan_final_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> bhld_view_chungtu_danhan_final">
<?php if (!$bhld_view_chungtu_danhan_final_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$bhld_view_chungtu_danhan_final_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $bhld_view_chungtu_danhan_final_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $bhld_view_chungtu_danhan_final_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbhld_view_chungtu_danhan_finallist" id="fbhld_view_chungtu_danhan_finallist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_view_chungtu_danhan_final">
<?php if ($bhld_view_chungtu_danhan_final->getCurrentMasterTable() == "bhld_view_nhanvien" && $bhld_view_chungtu_danhan_final->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="bhld_view_nhanvien">
<input type="hidden" name="fk_manv" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_final_list->manv->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_bhld_view_chungtu_danhan_final" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($bhld_view_chungtu_danhan_final_list->TotalRecords > 0 || $bhld_view_chungtu_danhan_final_list->isGridEdit()) { ?>
<table id="tbl_bhld_view_chungtu_danhan_finallist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$bhld_view_chungtu_danhan_final->RowType = ROWTYPE_HEADER;

// Render list options
$bhld_view_chungtu_danhan_final_list->renderListOptions();

// Render list options (header, left)
$bhld_view_chungtu_danhan_final_list->ListOptions->render("header", "left");
?>
<?php if ($bhld_view_chungtu_danhan_final_list->mact->Visible) { // mact ?>
	<?php if ($bhld_view_chungtu_danhan_final_list->SortUrl($bhld_view_chungtu_danhan_final_list->mact) == "") { ?>
		<th data-name="mact" class="<?php echo $bhld_view_chungtu_danhan_final_list->mact->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_final_mact" class="bhld_view_chungtu_danhan_final_mact"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_list->mact->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mact" class="<?php echo $bhld_view_chungtu_danhan_final_list->mact->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_danhan_final_list->SortUrl($bhld_view_chungtu_danhan_final_list->mact) ?>', 1);"><div id="elh_bhld_view_chungtu_danhan_final_mact" class="bhld_view_chungtu_danhan_final_mact">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_list->mact->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_final_list->mact->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_final_list->mact->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final_list->mavt->Visible) { // mavt ?>
	<?php if ($bhld_view_chungtu_danhan_final_list->SortUrl($bhld_view_chungtu_danhan_final_list->mavt) == "") { ?>
		<th data-name="mavt" class="<?php echo $bhld_view_chungtu_danhan_final_list->mavt->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_final_mavt" class="bhld_view_chungtu_danhan_final_mavt"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_list->mavt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mavt" class="<?php echo $bhld_view_chungtu_danhan_final_list->mavt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_danhan_final_list->SortUrl($bhld_view_chungtu_danhan_final_list->mavt) ?>', 1);"><div id="elh_bhld_view_chungtu_danhan_final_mavt" class="bhld_view_chungtu_danhan_final_mavt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_list->mavt->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_final_list->mavt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_final_list->mavt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final_list->ngnhan->Visible) { // ngnhan ?>
	<?php if ($bhld_view_chungtu_danhan_final_list->SortUrl($bhld_view_chungtu_danhan_final_list->ngnhan) == "") { ?>
		<th data-name="ngnhan" class="<?php echo $bhld_view_chungtu_danhan_final_list->ngnhan->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_final_ngnhan" class="bhld_view_chungtu_danhan_final_ngnhan"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_list->ngnhan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ngnhan" class="<?php echo $bhld_view_chungtu_danhan_final_list->ngnhan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_danhan_final_list->SortUrl($bhld_view_chungtu_danhan_final_list->ngnhan) ?>', 1);"><div id="elh_bhld_view_chungtu_danhan_final_ngnhan" class="bhld_view_chungtu_danhan_final_ngnhan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_list->ngnhan->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_final_list->ngnhan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_final_list->ngnhan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final_list->ngnhantt->Visible) { // ngnhantt ?>
	<?php if ($bhld_view_chungtu_danhan_final_list->SortUrl($bhld_view_chungtu_danhan_final_list->ngnhantt) == "") { ?>
		<th data-name="ngnhantt" class="<?php echo $bhld_view_chungtu_danhan_final_list->ngnhantt->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_final_ngnhantt" class="bhld_view_chungtu_danhan_final_ngnhantt"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_list->ngnhantt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ngnhantt" class="<?php echo $bhld_view_chungtu_danhan_final_list->ngnhantt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_danhan_final_list->SortUrl($bhld_view_chungtu_danhan_final_list->ngnhantt) ?>', 1);"><div id="elh_bhld_view_chungtu_danhan_final_ngnhantt" class="bhld_view_chungtu_danhan_final_ngnhantt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_list->ngnhantt->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_final_list->ngnhantt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_final_list->ngnhantt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final_list->dmtg->Visible) { // dmtg ?>
	<?php if ($bhld_view_chungtu_danhan_final_list->SortUrl($bhld_view_chungtu_danhan_final_list->dmtg) == "") { ?>
		<th data-name="dmtg" class="<?php echo $bhld_view_chungtu_danhan_final_list->dmtg->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_final_dmtg" class="bhld_view_chungtu_danhan_final_dmtg"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_list->dmtg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dmtg" class="<?php echo $bhld_view_chungtu_danhan_final_list->dmtg->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_danhan_final_list->SortUrl($bhld_view_chungtu_danhan_final_list->dmtg) ?>', 1);"><div id="elh_bhld_view_chungtu_danhan_final_dmtg" class="bhld_view_chungtu_danhan_final_dmtg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_list->dmtg->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_final_list->dmtg->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_final_list->dmtg->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final_list->sl->Visible) { // sl ?>
	<?php if ($bhld_view_chungtu_danhan_final_list->SortUrl($bhld_view_chungtu_danhan_final_list->sl) == "") { ?>
		<th data-name="sl" class="<?php echo $bhld_view_chungtu_danhan_final_list->sl->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_final_sl" class="bhld_view_chungtu_danhan_final_sl"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_list->sl->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sl" class="<?php echo $bhld_view_chungtu_danhan_final_list->sl->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_danhan_final_list->SortUrl($bhld_view_chungtu_danhan_final_list->sl) ?>', 1);"><div id="elh_bhld_view_chungtu_danhan_final_sl" class="bhld_view_chungtu_danhan_final_sl">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_final_list->sl->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_final_list->sl->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_final_list->sl->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$bhld_view_chungtu_danhan_final_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($bhld_view_chungtu_danhan_final_list->ExportAll && $bhld_view_chungtu_danhan_final_list->isExport()) {
	$bhld_view_chungtu_danhan_final_list->StopRecord = $bhld_view_chungtu_danhan_final_list->TotalRecords;
} else {

	// Set the last record to display
	if ($bhld_view_chungtu_danhan_final_list->TotalRecords > $bhld_view_chungtu_danhan_final_list->StartRecord + $bhld_view_chungtu_danhan_final_list->DisplayRecords - 1)
		$bhld_view_chungtu_danhan_final_list->StopRecord = $bhld_view_chungtu_danhan_final_list->StartRecord + $bhld_view_chungtu_danhan_final_list->DisplayRecords - 1;
	else
		$bhld_view_chungtu_danhan_final_list->StopRecord = $bhld_view_chungtu_danhan_final_list->TotalRecords;
}
$bhld_view_chungtu_danhan_final_list->RecordCount = $bhld_view_chungtu_danhan_final_list->StartRecord - 1;
if ($bhld_view_chungtu_danhan_final_list->Recordset && !$bhld_view_chungtu_danhan_final_list->Recordset->EOF) {
	$bhld_view_chungtu_danhan_final_list->Recordset->moveFirst();
	$selectLimit = $bhld_view_chungtu_danhan_final_list->UseSelectLimit;
	if (!$selectLimit && $bhld_view_chungtu_danhan_final_list->StartRecord > 1)
		$bhld_view_chungtu_danhan_final_list->Recordset->move($bhld_view_chungtu_danhan_final_list->StartRecord - 1);
} elseif (!$bhld_view_chungtu_danhan_final->AllowAddDeleteRow && $bhld_view_chungtu_danhan_final_list->StopRecord == 0) {
	$bhld_view_chungtu_danhan_final_list->StopRecord = $bhld_view_chungtu_danhan_final->GridAddRowCount;
}

// Initialize aggregate
$bhld_view_chungtu_danhan_final->RowType = ROWTYPE_AGGREGATEINIT;
$bhld_view_chungtu_danhan_final->resetAttributes();
$bhld_view_chungtu_danhan_final_list->renderRow();
while ($bhld_view_chungtu_danhan_final_list->RecordCount < $bhld_view_chungtu_danhan_final_list->StopRecord) {
	$bhld_view_chungtu_danhan_final_list->RecordCount++;
	if ($bhld_view_chungtu_danhan_final_list->RecordCount >= $bhld_view_chungtu_danhan_final_list->StartRecord) {
		$bhld_view_chungtu_danhan_final_list->RowCount++;

		// Set up key count
		$bhld_view_chungtu_danhan_final_list->KeyCount = $bhld_view_chungtu_danhan_final_list->RowIndex;

		// Init row class and style
		$bhld_view_chungtu_danhan_final->resetAttributes();
		$bhld_view_chungtu_danhan_final->CssClass = "";
		if ($bhld_view_chungtu_danhan_final_list->isGridAdd()) {
		} else {
			$bhld_view_chungtu_danhan_final_list->loadRowValues($bhld_view_chungtu_danhan_final_list->Recordset); // Load row values
		}
		$bhld_view_chungtu_danhan_final->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$bhld_view_chungtu_danhan_final->RowAttrs->merge(["data-rowindex" => $bhld_view_chungtu_danhan_final_list->RowCount, "id" => "r" . $bhld_view_chungtu_danhan_final_list->RowCount . "_bhld_view_chungtu_danhan_final", "data-rowtype" => $bhld_view_chungtu_danhan_final->RowType]);

		// Render row
		$bhld_view_chungtu_danhan_final_list->renderRow();

		// Render list options
		$bhld_view_chungtu_danhan_final_list->renderListOptions();
?>
	<tr <?php echo $bhld_view_chungtu_danhan_final->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bhld_view_chungtu_danhan_final_list->ListOptions->render("body", "left", $bhld_view_chungtu_danhan_final_list->RowCount);
?>
	<?php if ($bhld_view_chungtu_danhan_final_list->mact->Visible) { // mact ?>
		<td data-name="mact" <?php echo $bhld_view_chungtu_danhan_final_list->mact->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_danhan_final_list->RowCount ?>_bhld_view_chungtu_danhan_final_mact">
<span<?php echo $bhld_view_chungtu_danhan_final_list->mact->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_final_list->mact->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_final_list->mavt->Visible) { // mavt ?>
		<td data-name="mavt" <?php echo $bhld_view_chungtu_danhan_final_list->mavt->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_danhan_final_list->RowCount ?>_bhld_view_chungtu_danhan_final_mavt">
<span<?php echo $bhld_view_chungtu_danhan_final_list->mavt->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_final_list->mavt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_final_list->ngnhan->Visible) { // ngnhan ?>
		<td data-name="ngnhan" <?php echo $bhld_view_chungtu_danhan_final_list->ngnhan->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_danhan_final_list->RowCount ?>_bhld_view_chungtu_danhan_final_ngnhan">
<span<?php echo $bhld_view_chungtu_danhan_final_list->ngnhan->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_final_list->ngnhan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_final_list->ngnhantt->Visible) { // ngnhantt ?>
		<td data-name="ngnhantt" <?php echo $bhld_view_chungtu_danhan_final_list->ngnhantt->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_danhan_final_list->RowCount ?>_bhld_view_chungtu_danhan_final_ngnhantt">
<span<?php echo $bhld_view_chungtu_danhan_final_list->ngnhantt->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_final_list->ngnhantt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_final_list->dmtg->Visible) { // dmtg ?>
		<td data-name="dmtg" <?php echo $bhld_view_chungtu_danhan_final_list->dmtg->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_danhan_final_list->RowCount ?>_bhld_view_chungtu_danhan_final_dmtg">
<span<?php echo $bhld_view_chungtu_danhan_final_list->dmtg->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_final_list->dmtg->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_final_list->sl->Visible) { // sl ?>
		<td data-name="sl" <?php echo $bhld_view_chungtu_danhan_final_list->sl->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_danhan_final_list->RowCount ?>_bhld_view_chungtu_danhan_final_sl">
<span<?php echo $bhld_view_chungtu_danhan_final_list->sl->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_final_list->sl->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bhld_view_chungtu_danhan_final_list->ListOptions->render("body", "right", $bhld_view_chungtu_danhan_final_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$bhld_view_chungtu_danhan_final_list->isGridAdd())
		$bhld_view_chungtu_danhan_final_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$bhld_view_chungtu_danhan_final->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($bhld_view_chungtu_danhan_final_list->Recordset)
	$bhld_view_chungtu_danhan_final_list->Recordset->Close();
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_final_list->TotalRecords == 0 && !$bhld_view_chungtu_danhan_final->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $bhld_view_chungtu_danhan_final_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$bhld_view_chungtu_danhan_final_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$bhld_view_chungtu_danhan_final_list->isExport()) { ?>
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
$bhld_view_chungtu_danhan_final_list->terminate();
?>
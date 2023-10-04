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
$bhld_dmvattu_list = new bhld_dmvattu_list();

// Run the page
$bhld_dmvattu_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_dmvattu_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$bhld_dmvattu_list->isExport()) { ?>
<script>
var fbhld_dmvattulist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fbhld_dmvattulist = currentForm = new ew.Form("fbhld_dmvattulist", "list");
	fbhld_dmvattulist.formKeyCountName = '<?php echo $bhld_dmvattu_list->FormKeyCountName ?>';
	loadjs.done("fbhld_dmvattulist");
});
var fbhld_dmvattulistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fbhld_dmvattulistsrch = currentSearchForm = new ew.Form("fbhld_dmvattulistsrch");

	// Dynamic selection lists
	// Filters

	fbhld_dmvattulistsrch.filterList = <?php echo $bhld_dmvattu_list->getFilterList() ?>;
	loadjs.done("fbhld_dmvattulistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$bhld_dmvattu_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($bhld_dmvattu_list->TotalRecords > 0 && $bhld_dmvattu_list->ExportOptions->visible()) { ?>
<?php $bhld_dmvattu_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_dmvattu_list->ImportOptions->visible()) { ?>
<?php $bhld_dmvattu_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_dmvattu_list->SearchOptions->visible()) { ?>
<?php $bhld_dmvattu_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_dmvattu_list->FilterOptions->visible()) { ?>
<?php $bhld_dmvattu_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$bhld_dmvattu_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$bhld_dmvattu_list->isExport() && !$bhld_dmvattu->CurrentAction) { ?>
<form name="fbhld_dmvattulistsrch" id="fbhld_dmvattulistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fbhld_dmvattulistsrch-search-panel" class="<?php echo $bhld_dmvattu_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="bhld_dmvattu">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $bhld_dmvattu_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($bhld_dmvattu_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($bhld_dmvattu_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $bhld_dmvattu_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($bhld_dmvattu_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($bhld_dmvattu_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($bhld_dmvattu_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($bhld_dmvattu_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $bhld_dmvattu_list->showPageHeader(); ?>
<?php
$bhld_dmvattu_list->showMessage();
?>
<?php if ($bhld_dmvattu_list->TotalRecords > 0 || $bhld_dmvattu->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($bhld_dmvattu_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> bhld_dmvattu">
<?php if (!$bhld_dmvattu_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$bhld_dmvattu_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $bhld_dmvattu_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $bhld_dmvattu_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbhld_dmvattulist" id="fbhld_dmvattulist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_dmvattu">
<div id="gmp_bhld_dmvattu" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($bhld_dmvattu_list->TotalRecords > 0 || $bhld_dmvattu_list->isGridEdit()) { ?>
<table id="tbl_bhld_dmvattulist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$bhld_dmvattu->RowType = ROWTYPE_HEADER;

// Render list options
$bhld_dmvattu_list->renderListOptions();

// Render list options (header, left)
$bhld_dmvattu_list->ListOptions->render("header", "left");
?>
<?php if ($bhld_dmvattu_list->mavt->Visible) { // mavt ?>
	<?php if ($bhld_dmvattu_list->SortUrl($bhld_dmvattu_list->mavt) == "") { ?>
		<th data-name="mavt" class="<?php echo $bhld_dmvattu_list->mavt->headerCellClass() ?>"><div id="elh_bhld_dmvattu_mavt" class="bhld_dmvattu_mavt"><div class="ew-table-header-caption"><?php echo $bhld_dmvattu_list->mavt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mavt" class="<?php echo $bhld_dmvattu_list->mavt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_dmvattu_list->SortUrl($bhld_dmvattu_list->mavt) ?>', 1);"><div id="elh_bhld_dmvattu_mavt" class="bhld_dmvattu_mavt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_dmvattu_list->mavt->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_dmvattu_list->mavt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_dmvattu_list->mavt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_dmvattu_list->tenvt->Visible) { // tenvt ?>
	<?php if ($bhld_dmvattu_list->SortUrl($bhld_dmvattu_list->tenvt) == "") { ?>
		<th data-name="tenvt" class="<?php echo $bhld_dmvattu_list->tenvt->headerCellClass() ?>"><div id="elh_bhld_dmvattu_tenvt" class="bhld_dmvattu_tenvt"><div class="ew-table-header-caption"><?php echo $bhld_dmvattu_list->tenvt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tenvt" class="<?php echo $bhld_dmvattu_list->tenvt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_dmvattu_list->SortUrl($bhld_dmvattu_list->tenvt) ?>', 1);"><div id="elh_bhld_dmvattu_tenvt" class="bhld_dmvattu_tenvt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_dmvattu_list->tenvt->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bhld_dmvattu_list->tenvt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_dmvattu_list->tenvt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_dmvattu_list->dvt->Visible) { // dvt ?>
	<?php if ($bhld_dmvattu_list->SortUrl($bhld_dmvattu_list->dvt) == "") { ?>
		<th data-name="dvt" class="<?php echo $bhld_dmvattu_list->dvt->headerCellClass() ?>"><div id="elh_bhld_dmvattu_dvt" class="bhld_dmvattu_dvt"><div class="ew-table-header-caption"><?php echo $bhld_dmvattu_list->dvt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dvt" class="<?php echo $bhld_dmvattu_list->dvt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_dmvattu_list->SortUrl($bhld_dmvattu_list->dvt) ?>', 1);"><div id="elh_bhld_dmvattu_dvt" class="bhld_dmvattu_dvt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_dmvattu_list->dvt->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bhld_dmvattu_list->dvt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_dmvattu_list->dvt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_dmvattu_list->ghichu->Visible) { // ghichu ?>
	<?php if ($bhld_dmvattu_list->SortUrl($bhld_dmvattu_list->ghichu) == "") { ?>
		<th data-name="ghichu" class="<?php echo $bhld_dmvattu_list->ghichu->headerCellClass() ?>"><div id="elh_bhld_dmvattu_ghichu" class="bhld_dmvattu_ghichu"><div class="ew-table-header-caption"><?php echo $bhld_dmvattu_list->ghichu->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ghichu" class="<?php echo $bhld_dmvattu_list->ghichu->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_dmvattu_list->SortUrl($bhld_dmvattu_list->ghichu) ?>', 1);"><div id="elh_bhld_dmvattu_ghichu" class="bhld_dmvattu_ghichu">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_dmvattu_list->ghichu->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bhld_dmvattu_list->ghichu->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_dmvattu_list->ghichu->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$bhld_dmvattu_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($bhld_dmvattu_list->ExportAll && $bhld_dmvattu_list->isExport()) {
	$bhld_dmvattu_list->StopRecord = $bhld_dmvattu_list->TotalRecords;
} else {

	// Set the last record to display
	if ($bhld_dmvattu_list->TotalRecords > $bhld_dmvattu_list->StartRecord + $bhld_dmvattu_list->DisplayRecords - 1)
		$bhld_dmvattu_list->StopRecord = $bhld_dmvattu_list->StartRecord + $bhld_dmvattu_list->DisplayRecords - 1;
	else
		$bhld_dmvattu_list->StopRecord = $bhld_dmvattu_list->TotalRecords;
}
$bhld_dmvattu_list->RecordCount = $bhld_dmvattu_list->StartRecord - 1;
if ($bhld_dmvattu_list->Recordset && !$bhld_dmvattu_list->Recordset->EOF) {
	$bhld_dmvattu_list->Recordset->moveFirst();
	$selectLimit = $bhld_dmvattu_list->UseSelectLimit;
	if (!$selectLimit && $bhld_dmvattu_list->StartRecord > 1)
		$bhld_dmvattu_list->Recordset->move($bhld_dmvattu_list->StartRecord - 1);
} elseif (!$bhld_dmvattu->AllowAddDeleteRow && $bhld_dmvattu_list->StopRecord == 0) {
	$bhld_dmvattu_list->StopRecord = $bhld_dmvattu->GridAddRowCount;
}

// Initialize aggregate
$bhld_dmvattu->RowType = ROWTYPE_AGGREGATEINIT;
$bhld_dmvattu->resetAttributes();
$bhld_dmvattu_list->renderRow();
while ($bhld_dmvattu_list->RecordCount < $bhld_dmvattu_list->StopRecord) {
	$bhld_dmvattu_list->RecordCount++;
	if ($bhld_dmvattu_list->RecordCount >= $bhld_dmvattu_list->StartRecord) {
		$bhld_dmvattu_list->RowCount++;

		// Set up key count
		$bhld_dmvattu_list->KeyCount = $bhld_dmvattu_list->RowIndex;

		// Init row class and style
		$bhld_dmvattu->resetAttributes();
		$bhld_dmvattu->CssClass = "";
		if ($bhld_dmvattu_list->isGridAdd()) {
		} else {
			$bhld_dmvattu_list->loadRowValues($bhld_dmvattu_list->Recordset); // Load row values
		}
		$bhld_dmvattu->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$bhld_dmvattu->RowAttrs->merge(["data-rowindex" => $bhld_dmvattu_list->RowCount, "id" => "r" . $bhld_dmvattu_list->RowCount . "_bhld_dmvattu", "data-rowtype" => $bhld_dmvattu->RowType]);

		// Render row
		$bhld_dmvattu_list->renderRow();

		// Render list options
		$bhld_dmvattu_list->renderListOptions();
?>
	<tr <?php echo $bhld_dmvattu->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bhld_dmvattu_list->ListOptions->render("body", "left", $bhld_dmvattu_list->RowCount);
?>
	<?php if ($bhld_dmvattu_list->mavt->Visible) { // mavt ?>
		<td data-name="mavt" <?php echo $bhld_dmvattu_list->mavt->cellAttributes() ?>>
<span id="el<?php echo $bhld_dmvattu_list->RowCount ?>_bhld_dmvattu_mavt">
<span<?php echo $bhld_dmvattu_list->mavt->viewAttributes() ?>><?php echo $bhld_dmvattu_list->mavt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_dmvattu_list->tenvt->Visible) { // tenvt ?>
		<td data-name="tenvt" <?php echo $bhld_dmvattu_list->tenvt->cellAttributes() ?>>
<span id="el<?php echo $bhld_dmvattu_list->RowCount ?>_bhld_dmvattu_tenvt">
<span<?php echo $bhld_dmvattu_list->tenvt->viewAttributes() ?>><?php echo $bhld_dmvattu_list->tenvt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_dmvattu_list->dvt->Visible) { // dvt ?>
		<td data-name="dvt" <?php echo $bhld_dmvattu_list->dvt->cellAttributes() ?>>
<span id="el<?php echo $bhld_dmvattu_list->RowCount ?>_bhld_dmvattu_dvt">
<span<?php echo $bhld_dmvattu_list->dvt->viewAttributes() ?>><?php echo $bhld_dmvattu_list->dvt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_dmvattu_list->ghichu->Visible) { // ghichu ?>
		<td data-name="ghichu" <?php echo $bhld_dmvattu_list->ghichu->cellAttributes() ?>>
<span id="el<?php echo $bhld_dmvattu_list->RowCount ?>_bhld_dmvattu_ghichu">
<span<?php echo $bhld_dmvattu_list->ghichu->viewAttributes() ?>><?php echo $bhld_dmvattu_list->ghichu->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bhld_dmvattu_list->ListOptions->render("body", "right", $bhld_dmvattu_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$bhld_dmvattu_list->isGridAdd())
		$bhld_dmvattu_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$bhld_dmvattu->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($bhld_dmvattu_list->Recordset)
	$bhld_dmvattu_list->Recordset->Close();
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($bhld_dmvattu_list->TotalRecords == 0 && !$bhld_dmvattu->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $bhld_dmvattu_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$bhld_dmvattu_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$bhld_dmvattu_list->isExport()) { ?>
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
$bhld_dmvattu_list->terminate();
?>
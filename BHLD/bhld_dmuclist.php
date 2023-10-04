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
$bhld_dmuc_list = new bhld_dmuc_list();

// Run the page
$bhld_dmuc_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_dmuc_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$bhld_dmuc_list->isExport()) { ?>
<script>
var fbhld_dmuclist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fbhld_dmuclist = currentForm = new ew.Form("fbhld_dmuclist", "list");
	fbhld_dmuclist.formKeyCountName = '<?php echo $bhld_dmuc_list->FormKeyCountName ?>';
	loadjs.done("fbhld_dmuclist");
});
var fbhld_dmuclistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fbhld_dmuclistsrch = currentSearchForm = new ew.Form("fbhld_dmuclistsrch");

	// Dynamic selection lists
	// Filters

	fbhld_dmuclistsrch.filterList = <?php echo $bhld_dmuc_list->getFilterList() ?>;
	loadjs.done("fbhld_dmuclistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$bhld_dmuc_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($bhld_dmuc_list->TotalRecords > 0 && $bhld_dmuc_list->ExportOptions->visible()) { ?>
<?php $bhld_dmuc_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_dmuc_list->ImportOptions->visible()) { ?>
<?php $bhld_dmuc_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_dmuc_list->SearchOptions->visible()) { ?>
<?php $bhld_dmuc_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_dmuc_list->FilterOptions->visible()) { ?>
<?php $bhld_dmuc_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$bhld_dmuc_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$bhld_dmuc_list->isExport() && !$bhld_dmuc->CurrentAction) { ?>
<form name="fbhld_dmuclistsrch" id="fbhld_dmuclistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fbhld_dmuclistsrch-search-panel" class="<?php echo $bhld_dmuc_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="bhld_dmuc">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $bhld_dmuc_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($bhld_dmuc_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($bhld_dmuc_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $bhld_dmuc_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($bhld_dmuc_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($bhld_dmuc_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($bhld_dmuc_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($bhld_dmuc_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $bhld_dmuc_list->showPageHeader(); ?>
<?php
$bhld_dmuc_list->showMessage();
?>
<?php if ($bhld_dmuc_list->TotalRecords > 0 || $bhld_dmuc->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($bhld_dmuc_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> bhld_dmuc">
<?php if (!$bhld_dmuc_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$bhld_dmuc_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $bhld_dmuc_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $bhld_dmuc_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbhld_dmuclist" id="fbhld_dmuclist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_dmuc">
<div id="gmp_bhld_dmuc" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($bhld_dmuc_list->TotalRecords > 0 || $bhld_dmuc_list->isGridEdit()) { ?>
<table id="tbl_bhld_dmuclist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$bhld_dmuc->RowType = ROWTYPE_HEADER;

// Render list options
$bhld_dmuc_list->renderListOptions();

// Render list options (header, left)
$bhld_dmuc_list->ListOptions->render("header", "left");
?>
<?php if ($bhld_dmuc_list->madm->Visible) { // madm ?>
	<?php if ($bhld_dmuc_list->SortUrl($bhld_dmuc_list->madm) == "") { ?>
		<th data-name="madm" class="<?php echo $bhld_dmuc_list->madm->headerCellClass() ?>"><div id="elh_bhld_dmuc_madm" class="bhld_dmuc_madm"><div class="ew-table-header-caption"><?php echo $bhld_dmuc_list->madm->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="madm" class="<?php echo $bhld_dmuc_list->madm->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_dmuc_list->SortUrl($bhld_dmuc_list->madm) ?>', 1);"><div id="elh_bhld_dmuc_madm" class="bhld_dmuc_madm">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_dmuc_list->madm->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_dmuc_list->madm->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_dmuc_list->madm->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_dmuc_list->mota->Visible) { // mota ?>
	<?php if ($bhld_dmuc_list->SortUrl($bhld_dmuc_list->mota) == "") { ?>
		<th data-name="mota" class="<?php echo $bhld_dmuc_list->mota->headerCellClass() ?>"><div id="elh_bhld_dmuc_mota" class="bhld_dmuc_mota"><div class="ew-table-header-caption"><?php echo $bhld_dmuc_list->mota->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mota" class="<?php echo $bhld_dmuc_list->mota->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_dmuc_list->SortUrl($bhld_dmuc_list->mota) ?>', 1);"><div id="elh_bhld_dmuc_mota" class="bhld_dmuc_mota">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_dmuc_list->mota->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bhld_dmuc_list->mota->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_dmuc_list->mota->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$bhld_dmuc_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($bhld_dmuc_list->ExportAll && $bhld_dmuc_list->isExport()) {
	$bhld_dmuc_list->StopRecord = $bhld_dmuc_list->TotalRecords;
} else {

	// Set the last record to display
	if ($bhld_dmuc_list->TotalRecords > $bhld_dmuc_list->StartRecord + $bhld_dmuc_list->DisplayRecords - 1)
		$bhld_dmuc_list->StopRecord = $bhld_dmuc_list->StartRecord + $bhld_dmuc_list->DisplayRecords - 1;
	else
		$bhld_dmuc_list->StopRecord = $bhld_dmuc_list->TotalRecords;
}
$bhld_dmuc_list->RecordCount = $bhld_dmuc_list->StartRecord - 1;
if ($bhld_dmuc_list->Recordset && !$bhld_dmuc_list->Recordset->EOF) {
	$bhld_dmuc_list->Recordset->moveFirst();
	$selectLimit = $bhld_dmuc_list->UseSelectLimit;
	if (!$selectLimit && $bhld_dmuc_list->StartRecord > 1)
		$bhld_dmuc_list->Recordset->move($bhld_dmuc_list->StartRecord - 1);
} elseif (!$bhld_dmuc->AllowAddDeleteRow && $bhld_dmuc_list->StopRecord == 0) {
	$bhld_dmuc_list->StopRecord = $bhld_dmuc->GridAddRowCount;
}

// Initialize aggregate
$bhld_dmuc->RowType = ROWTYPE_AGGREGATEINIT;
$bhld_dmuc->resetAttributes();
$bhld_dmuc_list->renderRow();
while ($bhld_dmuc_list->RecordCount < $bhld_dmuc_list->StopRecord) {
	$bhld_dmuc_list->RecordCount++;
	if ($bhld_dmuc_list->RecordCount >= $bhld_dmuc_list->StartRecord) {
		$bhld_dmuc_list->RowCount++;

		// Set up key count
		$bhld_dmuc_list->KeyCount = $bhld_dmuc_list->RowIndex;

		// Init row class and style
		$bhld_dmuc->resetAttributes();
		$bhld_dmuc->CssClass = "";
		if ($bhld_dmuc_list->isGridAdd()) {
		} else {
			$bhld_dmuc_list->loadRowValues($bhld_dmuc_list->Recordset); // Load row values
		}
		$bhld_dmuc->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$bhld_dmuc->RowAttrs->merge(["data-rowindex" => $bhld_dmuc_list->RowCount, "id" => "r" . $bhld_dmuc_list->RowCount . "_bhld_dmuc", "data-rowtype" => $bhld_dmuc->RowType]);

		// Render row
		$bhld_dmuc_list->renderRow();

		// Render list options
		$bhld_dmuc_list->renderListOptions();
?>
	<tr <?php echo $bhld_dmuc->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bhld_dmuc_list->ListOptions->render("body", "left", $bhld_dmuc_list->RowCount);
?>
	<?php if ($bhld_dmuc_list->madm->Visible) { // madm ?>
		<td data-name="madm" <?php echo $bhld_dmuc_list->madm->cellAttributes() ?>>
<span id="el<?php echo $bhld_dmuc_list->RowCount ?>_bhld_dmuc_madm">
<span<?php echo $bhld_dmuc_list->madm->viewAttributes() ?>><?php echo $bhld_dmuc_list->madm->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_dmuc_list->mota->Visible) { // mota ?>
		<td data-name="mota" <?php echo $bhld_dmuc_list->mota->cellAttributes() ?>>
<span id="el<?php echo $bhld_dmuc_list->RowCount ?>_bhld_dmuc_mota">
<span<?php echo $bhld_dmuc_list->mota->viewAttributes() ?>><?php echo $bhld_dmuc_list->mota->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bhld_dmuc_list->ListOptions->render("body", "right", $bhld_dmuc_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$bhld_dmuc_list->isGridAdd())
		$bhld_dmuc_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$bhld_dmuc->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($bhld_dmuc_list->Recordset)
	$bhld_dmuc_list->Recordset->Close();
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($bhld_dmuc_list->TotalRecords == 0 && !$bhld_dmuc->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $bhld_dmuc_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$bhld_dmuc_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$bhld_dmuc_list->isExport()) { ?>
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
$bhld_dmuc_list->terminate();
?>
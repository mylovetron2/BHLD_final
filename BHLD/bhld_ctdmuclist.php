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
$bhld_ctdmuc_list = new bhld_ctdmuc_list();

// Run the page
$bhld_ctdmuc_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_ctdmuc_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$bhld_ctdmuc_list->isExport()) { ?>
<script>
var fbhld_ctdmuclist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fbhld_ctdmuclist = currentForm = new ew.Form("fbhld_ctdmuclist", "list");
	fbhld_ctdmuclist.formKeyCountName = '<?php echo $bhld_ctdmuc_list->FormKeyCountName ?>';
	loadjs.done("fbhld_ctdmuclist");
});
var fbhld_ctdmuclistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fbhld_ctdmuclistsrch = currentSearchForm = new ew.Form("fbhld_ctdmuclistsrch");

	// Dynamic selection lists
	// Filters

	fbhld_ctdmuclistsrch.filterList = <?php echo $bhld_ctdmuc_list->getFilterList() ?>;
	loadjs.done("fbhld_ctdmuclistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$bhld_ctdmuc_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($bhld_ctdmuc_list->TotalRecords > 0 && $bhld_ctdmuc_list->ExportOptions->visible()) { ?>
<?php $bhld_ctdmuc_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_ctdmuc_list->ImportOptions->visible()) { ?>
<?php $bhld_ctdmuc_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_ctdmuc_list->SearchOptions->visible()) { ?>
<?php $bhld_ctdmuc_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_ctdmuc_list->FilterOptions->visible()) { ?>
<?php $bhld_ctdmuc_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$bhld_ctdmuc_list->isExport() || Config("EXPORT_MASTER_RECORD") && $bhld_ctdmuc_list->isExport("print")) { ?>
<?php
if ($bhld_ctdmuc_list->DbMasterFilter != "" && $bhld_ctdmuc->getCurrentMasterTable() == "bhld_dmuc") {
	if ($bhld_ctdmuc_list->MasterRecordExists) {
		include_once "bhld_dmucmaster.php";
	}
}
?>
<?php } ?>
<?php
$bhld_ctdmuc_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$bhld_ctdmuc_list->isExport() && !$bhld_ctdmuc->CurrentAction) { ?>
<form name="fbhld_ctdmuclistsrch" id="fbhld_ctdmuclistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fbhld_ctdmuclistsrch-search-panel" class="<?php echo $bhld_ctdmuc_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="bhld_ctdmuc">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $bhld_ctdmuc_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($bhld_ctdmuc_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($bhld_ctdmuc_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $bhld_ctdmuc_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($bhld_ctdmuc_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($bhld_ctdmuc_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($bhld_ctdmuc_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($bhld_ctdmuc_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $bhld_ctdmuc_list->showPageHeader(); ?>
<?php
$bhld_ctdmuc_list->showMessage();
?>
<?php if ($bhld_ctdmuc_list->TotalRecords > 0 || $bhld_ctdmuc->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($bhld_ctdmuc_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> bhld_ctdmuc">
<?php if (!$bhld_ctdmuc_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$bhld_ctdmuc_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $bhld_ctdmuc_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $bhld_ctdmuc_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbhld_ctdmuclist" id="fbhld_ctdmuclist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_ctdmuc">
<?php if ($bhld_ctdmuc->getCurrentMasterTable() == "bhld_dmuc" && $bhld_ctdmuc->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="bhld_dmuc">
<input type="hidden" name="fk_madm" value="<?php echo HtmlEncode($bhld_ctdmuc_list->madm->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_bhld_ctdmuc" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($bhld_ctdmuc_list->TotalRecords > 0 || $bhld_ctdmuc_list->isGridEdit()) { ?>
<table id="tbl_bhld_ctdmuclist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$bhld_ctdmuc->RowType = ROWTYPE_HEADER;

// Render list options
$bhld_ctdmuc_list->renderListOptions();

// Render list options (header, left)
$bhld_ctdmuc_list->ListOptions->render("header", "left");
?>
<?php if ($bhld_ctdmuc_list->madm->Visible) { // madm ?>
	<?php if ($bhld_ctdmuc_list->SortUrl($bhld_ctdmuc_list->madm) == "") { ?>
		<th data-name="madm" class="<?php echo $bhld_ctdmuc_list->madm->headerCellClass() ?>"><div id="elh_bhld_ctdmuc_madm" class="bhld_ctdmuc_madm"><div class="ew-table-header-caption"><?php echo $bhld_ctdmuc_list->madm->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="madm" class="<?php echo $bhld_ctdmuc_list->madm->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_ctdmuc_list->SortUrl($bhld_ctdmuc_list->madm) ?>', 1);"><div id="elh_bhld_ctdmuc_madm" class="bhld_ctdmuc_madm">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctdmuc_list->madm->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctdmuc_list->madm->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctdmuc_list->madm->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_ctdmuc_list->mavt->Visible) { // mavt ?>
	<?php if ($bhld_ctdmuc_list->SortUrl($bhld_ctdmuc_list->mavt) == "") { ?>
		<th data-name="mavt" class="<?php echo $bhld_ctdmuc_list->mavt->headerCellClass() ?>"><div id="elh_bhld_ctdmuc_mavt" class="bhld_ctdmuc_mavt"><div class="ew-table-header-caption"><?php echo $bhld_ctdmuc_list->mavt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mavt" class="<?php echo $bhld_ctdmuc_list->mavt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_ctdmuc_list->SortUrl($bhld_ctdmuc_list->mavt) ?>', 1);"><div id="elh_bhld_ctdmuc_mavt" class="bhld_ctdmuc_mavt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctdmuc_list->mavt->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctdmuc_list->mavt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctdmuc_list->mavt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_ctdmuc_list->dmuc->Visible) { // dmuc ?>
	<?php if ($bhld_ctdmuc_list->SortUrl($bhld_ctdmuc_list->dmuc) == "") { ?>
		<th data-name="dmuc" class="<?php echo $bhld_ctdmuc_list->dmuc->headerCellClass() ?>"><div id="elh_bhld_ctdmuc_dmuc" class="bhld_ctdmuc_dmuc"><div class="ew-table-header-caption"><?php echo $bhld_ctdmuc_list->dmuc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dmuc" class="<?php echo $bhld_ctdmuc_list->dmuc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_ctdmuc_list->SortUrl($bhld_ctdmuc_list->dmuc) ?>', 1);"><div id="elh_bhld_ctdmuc_dmuc" class="bhld_ctdmuc_dmuc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_ctdmuc_list->dmuc->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_ctdmuc_list->dmuc->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_ctdmuc_list->dmuc->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$bhld_ctdmuc_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($bhld_ctdmuc_list->ExportAll && $bhld_ctdmuc_list->isExport()) {
	$bhld_ctdmuc_list->StopRecord = $bhld_ctdmuc_list->TotalRecords;
} else {

	// Set the last record to display
	if ($bhld_ctdmuc_list->TotalRecords > $bhld_ctdmuc_list->StartRecord + $bhld_ctdmuc_list->DisplayRecords - 1)
		$bhld_ctdmuc_list->StopRecord = $bhld_ctdmuc_list->StartRecord + $bhld_ctdmuc_list->DisplayRecords - 1;
	else
		$bhld_ctdmuc_list->StopRecord = $bhld_ctdmuc_list->TotalRecords;
}
$bhld_ctdmuc_list->RecordCount = $bhld_ctdmuc_list->StartRecord - 1;
if ($bhld_ctdmuc_list->Recordset && !$bhld_ctdmuc_list->Recordset->EOF) {
	$bhld_ctdmuc_list->Recordset->moveFirst();
	$selectLimit = $bhld_ctdmuc_list->UseSelectLimit;
	if (!$selectLimit && $bhld_ctdmuc_list->StartRecord > 1)
		$bhld_ctdmuc_list->Recordset->move($bhld_ctdmuc_list->StartRecord - 1);
} elseif (!$bhld_ctdmuc->AllowAddDeleteRow && $bhld_ctdmuc_list->StopRecord == 0) {
	$bhld_ctdmuc_list->StopRecord = $bhld_ctdmuc->GridAddRowCount;
}

// Initialize aggregate
$bhld_ctdmuc->RowType = ROWTYPE_AGGREGATEINIT;
$bhld_ctdmuc->resetAttributes();
$bhld_ctdmuc_list->renderRow();
while ($bhld_ctdmuc_list->RecordCount < $bhld_ctdmuc_list->StopRecord) {
	$bhld_ctdmuc_list->RecordCount++;
	if ($bhld_ctdmuc_list->RecordCount >= $bhld_ctdmuc_list->StartRecord) {
		$bhld_ctdmuc_list->RowCount++;

		// Set up key count
		$bhld_ctdmuc_list->KeyCount = $bhld_ctdmuc_list->RowIndex;

		// Init row class and style
		$bhld_ctdmuc->resetAttributes();
		$bhld_ctdmuc->CssClass = "";
		if ($bhld_ctdmuc_list->isGridAdd()) {
		} else {
			$bhld_ctdmuc_list->loadRowValues($bhld_ctdmuc_list->Recordset); // Load row values
		}
		$bhld_ctdmuc->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$bhld_ctdmuc->RowAttrs->merge(["data-rowindex" => $bhld_ctdmuc_list->RowCount, "id" => "r" . $bhld_ctdmuc_list->RowCount . "_bhld_ctdmuc", "data-rowtype" => $bhld_ctdmuc->RowType]);

		// Render row
		$bhld_ctdmuc_list->renderRow();

		// Render list options
		$bhld_ctdmuc_list->renderListOptions();
?>
	<tr <?php echo $bhld_ctdmuc->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bhld_ctdmuc_list->ListOptions->render("body", "left", $bhld_ctdmuc_list->RowCount);
?>
	<?php if ($bhld_ctdmuc_list->madm->Visible) { // madm ?>
		<td data-name="madm" <?php echo $bhld_ctdmuc_list->madm->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctdmuc_list->RowCount ?>_bhld_ctdmuc_madm">
<span<?php echo $bhld_ctdmuc_list->madm->viewAttributes() ?>><?php echo $bhld_ctdmuc_list->madm->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_ctdmuc_list->mavt->Visible) { // mavt ?>
		<td data-name="mavt" <?php echo $bhld_ctdmuc_list->mavt->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctdmuc_list->RowCount ?>_bhld_ctdmuc_mavt">
<span<?php echo $bhld_ctdmuc_list->mavt->viewAttributes() ?>><?php echo $bhld_ctdmuc_list->mavt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_ctdmuc_list->dmuc->Visible) { // dmuc ?>
		<td data-name="dmuc" <?php echo $bhld_ctdmuc_list->dmuc->cellAttributes() ?>>
<span id="el<?php echo $bhld_ctdmuc_list->RowCount ?>_bhld_ctdmuc_dmuc">
<span<?php echo $bhld_ctdmuc_list->dmuc->viewAttributes() ?>><?php echo $bhld_ctdmuc_list->dmuc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bhld_ctdmuc_list->ListOptions->render("body", "right", $bhld_ctdmuc_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$bhld_ctdmuc_list->isGridAdd())
		$bhld_ctdmuc_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$bhld_ctdmuc->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($bhld_ctdmuc_list->Recordset)
	$bhld_ctdmuc_list->Recordset->Close();
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($bhld_ctdmuc_list->TotalRecords == 0 && !$bhld_ctdmuc->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $bhld_ctdmuc_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$bhld_ctdmuc_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$bhld_ctdmuc_list->isExport()) { ?>
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
$bhld_ctdmuc_list->terminate();
?>
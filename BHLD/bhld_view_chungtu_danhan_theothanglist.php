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
$bhld_view_chungtu_danhan_theothang_list = new bhld_view_chungtu_danhan_theothang_list();

// Run the page
$bhld_view_chungtu_danhan_theothang_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_view_chungtu_danhan_theothang_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$bhld_view_chungtu_danhan_theothang_list->isExport()) { ?>
<script>
var fbhld_view_chungtu_danhan_theothanglist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fbhld_view_chungtu_danhan_theothanglist = currentForm = new ew.Form("fbhld_view_chungtu_danhan_theothanglist", "list");
	fbhld_view_chungtu_danhan_theothanglist.formKeyCountName = '<?php echo $bhld_view_chungtu_danhan_theothang_list->FormKeyCountName ?>';
	loadjs.done("fbhld_view_chungtu_danhan_theothanglist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$bhld_view_chungtu_danhan_theothang_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($bhld_view_chungtu_danhan_theothang_list->TotalRecords > 0 && $bhld_view_chungtu_danhan_theothang_list->ExportOptions->visible()) { ?>
<?php $bhld_view_chungtu_danhan_theothang_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang_list->ImportOptions->visible()) { ?>
<?php $bhld_view_chungtu_danhan_theothang_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$bhld_view_chungtu_danhan_theothang_list->isExport() || Config("EXPORT_MASTER_RECORD") && $bhld_view_chungtu_danhan_theothang_list->isExport("print")) { ?>
<?php
if ($bhld_view_chungtu_danhan_theothang_list->DbMasterFilter != "" && $bhld_view_chungtu_danhan_theothang->getCurrentMasterTable() == "_bhld_view_chungtu_danhan_theothang_master") {
	if ($bhld_view_chungtu_danhan_theothang_list->MasterRecordExists) {
		include_once "_bhld_view_chungtu_danhan_theothang_mastermaster.php";
	}
}
?>
<?php } ?>
<?php
$bhld_view_chungtu_danhan_theothang_list->renderOtherOptions();
?>
<?php $bhld_view_chungtu_danhan_theothang_list->showPageHeader(); ?>
<?php
$bhld_view_chungtu_danhan_theothang_list->showMessage();
?>
<?php if ($bhld_view_chungtu_danhan_theothang_list->TotalRecords > 0 || $bhld_view_chungtu_danhan_theothang->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($bhld_view_chungtu_danhan_theothang_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> bhld_view_chungtu_danhan_theothang">
<?php if (!$bhld_view_chungtu_danhan_theothang_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$bhld_view_chungtu_danhan_theothang_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $bhld_view_chungtu_danhan_theothang_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $bhld_view_chungtu_danhan_theothang_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbhld_view_chungtu_danhan_theothanglist" id="fbhld_view_chungtu_danhan_theothanglist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_view_chungtu_danhan_theothang">
<?php if ($bhld_view_chungtu_danhan_theothang->getCurrentMasterTable() == "_bhld_view_chungtu_danhan_theothang_master" && $bhld_view_chungtu_danhan_theothang->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="_bhld_view_chungtu_danhan_theothang_master">
<input type="hidden" name="fk_detail" value="<?php echo HtmlEncode($bhld_view_chungtu_danhan_theothang_list->detail->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_bhld_view_chungtu_danhan_theothang" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($bhld_view_chungtu_danhan_theothang_list->TotalRecords > 0 || $bhld_view_chungtu_danhan_theothang_list->isGridEdit()) { ?>
<table id="tbl_bhld_view_chungtu_danhan_theothanglist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$bhld_view_chungtu_danhan_theothang->RowType = ROWTYPE_HEADER;

// Render list options
$bhld_view_chungtu_danhan_theothang_list->renderListOptions();

// Render list options (header, left)
$bhld_view_chungtu_danhan_theothang_list->ListOptions->render("header", "left");
?>
<?php if ($bhld_view_chungtu_danhan_theothang_list->ngnhan->Visible) { // ngnhan ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_list->SortUrl($bhld_view_chungtu_danhan_theothang_list->ngnhan) == "") { ?>
		<th data-name="ngnhan" class="<?php echo $bhld_view_chungtu_danhan_theothang_list->ngnhan->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_theothang_ngnhan" class="bhld_view_chungtu_danhan_theothang_ngnhan"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_list->ngnhan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ngnhan" class="<?php echo $bhld_view_chungtu_danhan_theothang_list->ngnhan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_danhan_theothang_list->SortUrl($bhld_view_chungtu_danhan_theothang_list->ngnhan) ?>', 1);"><div id="elh_bhld_view_chungtu_danhan_theothang_ngnhan" class="bhld_view_chungtu_danhan_theothang_ngnhan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_list->ngnhan->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_theothang_list->ngnhan->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_theothang_list->ngnhan->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang_list->mapb->Visible) { // mapb ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_list->SortUrl($bhld_view_chungtu_danhan_theothang_list->mapb) == "") { ?>
		<th data-name="mapb" class="<?php echo $bhld_view_chungtu_danhan_theothang_list->mapb->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_theothang_mapb" class="bhld_view_chungtu_danhan_theothang_mapb"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_list->mapb->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mapb" class="<?php echo $bhld_view_chungtu_danhan_theothang_list->mapb->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_danhan_theothang_list->SortUrl($bhld_view_chungtu_danhan_theothang_list->mapb) ?>', 1);"><div id="elh_bhld_view_chungtu_danhan_theothang_mapb" class="bhld_view_chungtu_danhan_theothang_mapb">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_list->mapb->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_theothang_list->mapb->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_theothang_list->mapb->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang_list->manv->Visible) { // manv ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_list->SortUrl($bhld_view_chungtu_danhan_theothang_list->manv) == "") { ?>
		<th data-name="manv" class="<?php echo $bhld_view_chungtu_danhan_theothang_list->manv->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_theothang_manv" class="bhld_view_chungtu_danhan_theothang_manv"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_list->manv->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="manv" class="<?php echo $bhld_view_chungtu_danhan_theothang_list->manv->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_danhan_theothang_list->SortUrl($bhld_view_chungtu_danhan_theothang_list->manv) ?>', 1);"><div id="elh_bhld_view_chungtu_danhan_theothang_manv" class="bhld_view_chungtu_danhan_theothang_manv">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_list->manv->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_theothang_list->manv->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_theothang_list->manv->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang_list->mavt->Visible) { // mavt ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_list->SortUrl($bhld_view_chungtu_danhan_theothang_list->mavt) == "") { ?>
		<th data-name="mavt" class="<?php echo $bhld_view_chungtu_danhan_theothang_list->mavt->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_theothang_mavt" class="bhld_view_chungtu_danhan_theothang_mavt"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_list->mavt->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mavt" class="<?php echo $bhld_view_chungtu_danhan_theothang_list->mavt->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_danhan_theothang_list->SortUrl($bhld_view_chungtu_danhan_theothang_list->mavt) ?>', 1);"><div id="elh_bhld_view_chungtu_danhan_theothang_mavt" class="bhld_view_chungtu_danhan_theothang_mavt">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_list->mavt->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_theothang_list->mavt->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_theothang_list->mavt->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang_list->sl->Visible) { // sl ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_list->SortUrl($bhld_view_chungtu_danhan_theothang_list->sl) == "") { ?>
		<th data-name="sl" class="<?php echo $bhld_view_chungtu_danhan_theothang_list->sl->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_theothang_sl" class="bhld_view_chungtu_danhan_theothang_sl"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_list->sl->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sl" class="<?php echo $bhld_view_chungtu_danhan_theothang_list->sl->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_danhan_theothang_list->SortUrl($bhld_view_chungtu_danhan_theothang_list->sl) ?>', 1);"><div id="elh_bhld_view_chungtu_danhan_theothang_sl" class="bhld_view_chungtu_danhan_theothang_sl">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_list->sl->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_theothang_list->sl->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_theothang_list->sl->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang_list->dmtg->Visible) { // dmtg ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_list->SortUrl($bhld_view_chungtu_danhan_theothang_list->dmtg) == "") { ?>
		<th data-name="dmtg" class="<?php echo $bhld_view_chungtu_danhan_theothang_list->dmtg->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_danhan_theothang_dmtg" class="bhld_view_chungtu_danhan_theothang_dmtg"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_list->dmtg->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="dmtg" class="<?php echo $bhld_view_chungtu_danhan_theothang_list->dmtg->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_danhan_theothang_list->SortUrl($bhld_view_chungtu_danhan_theothang_list->dmtg) ?>', 1);"><div id="elh_bhld_view_chungtu_danhan_theothang_dmtg" class="bhld_view_chungtu_danhan_theothang_dmtg">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_danhan_theothang_list->dmtg->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_danhan_theothang_list->dmtg->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_danhan_theothang_list->dmtg->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$bhld_view_chungtu_danhan_theothang_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($bhld_view_chungtu_danhan_theothang_list->ExportAll && $bhld_view_chungtu_danhan_theothang_list->isExport()) {
	$bhld_view_chungtu_danhan_theothang_list->StopRecord = $bhld_view_chungtu_danhan_theothang_list->TotalRecords;
} else {

	// Set the last record to display
	if ($bhld_view_chungtu_danhan_theothang_list->TotalRecords > $bhld_view_chungtu_danhan_theothang_list->StartRecord + $bhld_view_chungtu_danhan_theothang_list->DisplayRecords - 1)
		$bhld_view_chungtu_danhan_theothang_list->StopRecord = $bhld_view_chungtu_danhan_theothang_list->StartRecord + $bhld_view_chungtu_danhan_theothang_list->DisplayRecords - 1;
	else
		$bhld_view_chungtu_danhan_theothang_list->StopRecord = $bhld_view_chungtu_danhan_theothang_list->TotalRecords;
}
$bhld_view_chungtu_danhan_theothang_list->RecordCount = $bhld_view_chungtu_danhan_theothang_list->StartRecord - 1;
if ($bhld_view_chungtu_danhan_theothang_list->Recordset && !$bhld_view_chungtu_danhan_theothang_list->Recordset->EOF) {
	$bhld_view_chungtu_danhan_theothang_list->Recordset->moveFirst();
	$selectLimit = $bhld_view_chungtu_danhan_theothang_list->UseSelectLimit;
	if (!$selectLimit && $bhld_view_chungtu_danhan_theothang_list->StartRecord > 1)
		$bhld_view_chungtu_danhan_theothang_list->Recordset->move($bhld_view_chungtu_danhan_theothang_list->StartRecord - 1);
} elseif (!$bhld_view_chungtu_danhan_theothang->AllowAddDeleteRow && $bhld_view_chungtu_danhan_theothang_list->StopRecord == 0) {
	$bhld_view_chungtu_danhan_theothang_list->StopRecord = $bhld_view_chungtu_danhan_theothang->GridAddRowCount;
}

// Initialize aggregate
$bhld_view_chungtu_danhan_theothang->RowType = ROWTYPE_AGGREGATEINIT;
$bhld_view_chungtu_danhan_theothang->resetAttributes();
$bhld_view_chungtu_danhan_theothang_list->renderRow();
while ($bhld_view_chungtu_danhan_theothang_list->RecordCount < $bhld_view_chungtu_danhan_theothang_list->StopRecord) {
	$bhld_view_chungtu_danhan_theothang_list->RecordCount++;
	if ($bhld_view_chungtu_danhan_theothang_list->RecordCount >= $bhld_view_chungtu_danhan_theothang_list->StartRecord) {
		$bhld_view_chungtu_danhan_theothang_list->RowCount++;

		// Set up key count
		$bhld_view_chungtu_danhan_theothang_list->KeyCount = $bhld_view_chungtu_danhan_theothang_list->RowIndex;

		// Init row class and style
		$bhld_view_chungtu_danhan_theothang->resetAttributes();
		$bhld_view_chungtu_danhan_theothang->CssClass = "";
		if ($bhld_view_chungtu_danhan_theothang_list->isGridAdd()) {
		} else {
			$bhld_view_chungtu_danhan_theothang_list->loadRowValues($bhld_view_chungtu_danhan_theothang_list->Recordset); // Load row values
		}
		$bhld_view_chungtu_danhan_theothang->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$bhld_view_chungtu_danhan_theothang->RowAttrs->merge(["data-rowindex" => $bhld_view_chungtu_danhan_theothang_list->RowCount, "id" => "r" . $bhld_view_chungtu_danhan_theothang_list->RowCount . "_bhld_view_chungtu_danhan_theothang", "data-rowtype" => $bhld_view_chungtu_danhan_theothang->RowType]);

		// Render row
		$bhld_view_chungtu_danhan_theothang_list->renderRow();

		// Render list options
		$bhld_view_chungtu_danhan_theothang_list->renderListOptions();
?>
	<tr <?php echo $bhld_view_chungtu_danhan_theothang->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bhld_view_chungtu_danhan_theothang_list->ListOptions->render("body", "left", $bhld_view_chungtu_danhan_theothang_list->RowCount);
?>
	<?php if ($bhld_view_chungtu_danhan_theothang_list->ngnhan->Visible) { // ngnhan ?>
		<td data-name="ngnhan" <?php echo $bhld_view_chungtu_danhan_theothang_list->ngnhan->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_list->RowCount ?>_bhld_view_chungtu_danhan_theothang_ngnhan">
<span<?php echo $bhld_view_chungtu_danhan_theothang_list->ngnhan->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_theothang_list->ngnhan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_list->mapb->Visible) { // mapb ?>
		<td data-name="mapb" <?php echo $bhld_view_chungtu_danhan_theothang_list->mapb->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_list->RowCount ?>_bhld_view_chungtu_danhan_theothang_mapb">
<span<?php echo $bhld_view_chungtu_danhan_theothang_list->mapb->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_theothang_list->mapb->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_list->manv->Visible) { // manv ?>
		<td data-name="manv" <?php echo $bhld_view_chungtu_danhan_theothang_list->manv->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_list->RowCount ?>_bhld_view_chungtu_danhan_theothang_manv">
<span<?php echo $bhld_view_chungtu_danhan_theothang_list->manv->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_theothang_list->manv->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_list->mavt->Visible) { // mavt ?>
		<td data-name="mavt" <?php echo $bhld_view_chungtu_danhan_theothang_list->mavt->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_list->RowCount ?>_bhld_view_chungtu_danhan_theothang_mavt">
<span<?php echo $bhld_view_chungtu_danhan_theothang_list->mavt->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_theothang_list->mavt->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_list->sl->Visible) { // sl ?>
		<td data-name="sl" <?php echo $bhld_view_chungtu_danhan_theothang_list->sl->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_list->RowCount ?>_bhld_view_chungtu_danhan_theothang_sl">
<span<?php echo $bhld_view_chungtu_danhan_theothang_list->sl->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_theothang_list->sl->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_danhan_theothang_list->dmtg->Visible) { // dmtg ?>
		<td data-name="dmtg" <?php echo $bhld_view_chungtu_danhan_theothang_list->dmtg->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_danhan_theothang_list->RowCount ?>_bhld_view_chungtu_danhan_theothang_dmtg">
<span<?php echo $bhld_view_chungtu_danhan_theothang_list->dmtg->viewAttributes() ?>><?php echo $bhld_view_chungtu_danhan_theothang_list->dmtg->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bhld_view_chungtu_danhan_theothang_list->ListOptions->render("body", "right", $bhld_view_chungtu_danhan_theothang_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$bhld_view_chungtu_danhan_theothang_list->isGridAdd())
		$bhld_view_chungtu_danhan_theothang_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$bhld_view_chungtu_danhan_theothang->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($bhld_view_chungtu_danhan_theothang_list->Recordset)
	$bhld_view_chungtu_danhan_theothang_list->Recordset->Close();
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($bhld_view_chungtu_danhan_theothang_list->TotalRecords == 0 && !$bhld_view_chungtu_danhan_theothang->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $bhld_view_chungtu_danhan_theothang_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$bhld_view_chungtu_danhan_theothang_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$bhld_view_chungtu_danhan_theothang_list->isExport()) { ?>
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
$bhld_view_chungtu_danhan_theothang_list->terminate();
?>
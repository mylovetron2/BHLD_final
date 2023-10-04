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
$bhld_view_chungtu_chuanhan_final_list = new bhld_view_chungtu_chuanhan_final_list();

// Run the page
$bhld_view_chungtu_chuanhan_final_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_view_chungtu_chuanhan_final_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$bhld_view_chungtu_chuanhan_final_list->isExport()) { ?>
<script>
var fbhld_view_chungtu_chuanhan_finallist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fbhld_view_chungtu_chuanhan_finallist = currentForm = new ew.Form("fbhld_view_chungtu_chuanhan_finallist", "list");
	fbhld_view_chungtu_chuanhan_finallist.formKeyCountName = '<?php echo $bhld_view_chungtu_chuanhan_final_list->FormKeyCountName ?>';
	loadjs.done("fbhld_view_chungtu_chuanhan_finallist");
});
var fbhld_view_chungtu_chuanhan_finallistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fbhld_view_chungtu_chuanhan_finallistsrch = currentSearchForm = new ew.Form("fbhld_view_chungtu_chuanhan_finallistsrch");

	// Validate function for search
	fbhld_view_chungtu_chuanhan_finallistsrch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_ngct");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($bhld_view_chungtu_chuanhan_final_list->ngct->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fbhld_view_chungtu_chuanhan_finallistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbhld_view_chungtu_chuanhan_finallistsrch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	// Filters

	fbhld_view_chungtu_chuanhan_finallistsrch.filterList = <?php echo $bhld_view_chungtu_chuanhan_final_list->getFilterList() ?>;
	loadjs.done("fbhld_view_chungtu_chuanhan_finallistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$bhld_view_chungtu_chuanhan_final_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($bhld_view_chungtu_chuanhan_final_list->TotalRecords > 0 && $bhld_view_chungtu_chuanhan_final_list->ExportOptions->visible()) { ?>
<?php $bhld_view_chungtu_chuanhan_final_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_view_chungtu_chuanhan_final_list->ImportOptions->visible()) { ?>
<?php $bhld_view_chungtu_chuanhan_final_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_view_chungtu_chuanhan_final_list->SearchOptions->visible()) { ?>
<?php $bhld_view_chungtu_chuanhan_final_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($bhld_view_chungtu_chuanhan_final_list->FilterOptions->visible()) { ?>
<?php $bhld_view_chungtu_chuanhan_final_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$bhld_view_chungtu_chuanhan_final_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$bhld_view_chungtu_chuanhan_final_list->isExport() && !$bhld_view_chungtu_chuanhan_final->CurrentAction) { ?>
<form name="fbhld_view_chungtu_chuanhan_finallistsrch" id="fbhld_view_chungtu_chuanhan_finallistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fbhld_view_chungtu_chuanhan_finallistsrch-search-panel" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="bhld_view_chungtu_chuanhan_final">
	<div class="ew-extended-search">
<?php

// Render search row
$bhld_view_chungtu_chuanhan_final->RowType = ROWTYPE_SEARCH;
$bhld_view_chungtu_chuanhan_final->resetAttributes();
$bhld_view_chungtu_chuanhan_final_list->renderRow();
?>
<?php if ($bhld_view_chungtu_chuanhan_final_list->ngct->Visible) { // ngct ?>
	<?php
		$bhld_view_chungtu_chuanhan_final_list->SearchColumnCount++;
		if (($bhld_view_chungtu_chuanhan_final_list->SearchColumnCount - 1) % $bhld_view_chungtu_chuanhan_final_list->SearchFieldsPerRow == 0) {
			$bhld_view_chungtu_chuanhan_final_list->SearchRowCount++;
	?>
<div id="xsr_<?php echo $bhld_view_chungtu_chuanhan_final_list->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_ngct" class="ew-cell form-group">
		<label for="x_ngct" class="ew-search-caption ew-label"><?php echo $bhld_view_chungtu_chuanhan_final_list->ngct->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("<=") ?>
<input type="hidden" name="z_ngct" id="z_ngct" value="<=">
</span>
		<span id="el_bhld_view_chungtu_chuanhan_final_ngct" class="ew-search-field">
<input type="text" data-table="bhld_view_chungtu_chuanhan_final" data-field="x_ngct" data-format="7" name="x_ngct" id="x_ngct" maxlength="10" placeholder="<?php echo HtmlEncode($bhld_view_chungtu_chuanhan_final_list->ngct->getPlaceHolder()) ?>" value="<?php echo $bhld_view_chungtu_chuanhan_final_list->ngct->EditValue ?>"<?php echo $bhld_view_chungtu_chuanhan_final_list->ngct->editAttributes() ?>>
<?php if (!$bhld_view_chungtu_chuanhan_final_list->ngct->ReadOnly && !$bhld_view_chungtu_chuanhan_final_list->ngct->Disabled && !isset($bhld_view_chungtu_chuanhan_final_list->ngct->EditAttrs["readonly"]) && !isset($bhld_view_chungtu_chuanhan_final_list->ngct->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbhld_view_chungtu_chuanhan_finallistsrch", "datetimepicker"], function() {
	ew.createDateTimePicker("fbhld_view_chungtu_chuanhan_finallistsrch", "x_ngct", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->SearchColumnCount % $bhld_view_chungtu_chuanhan_final_list->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->SearchColumnCount % $bhld_view_chungtu_chuanhan_final_list->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $bhld_view_chungtu_chuanhan_final_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($bhld_view_chungtu_chuanhan_final_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($bhld_view_chungtu_chuanhan_final_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $bhld_view_chungtu_chuanhan_final_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($bhld_view_chungtu_chuanhan_final_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($bhld_view_chungtu_chuanhan_final_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($bhld_view_chungtu_chuanhan_final_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($bhld_view_chungtu_chuanhan_final_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $bhld_view_chungtu_chuanhan_final_list->showPageHeader(); ?>
<?php
$bhld_view_chungtu_chuanhan_final_list->showMessage();
?>
<?php if ($bhld_view_chungtu_chuanhan_final_list->TotalRecords > 0 || $bhld_view_chungtu_chuanhan_final->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($bhld_view_chungtu_chuanhan_final_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> bhld_view_chungtu_chuanhan_final">
<?php if (!$bhld_view_chungtu_chuanhan_final_list->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$bhld_view_chungtu_chuanhan_final_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $bhld_view_chungtu_chuanhan_final_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $bhld_view_chungtu_chuanhan_final_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fbhld_view_chungtu_chuanhan_finallist" id="fbhld_view_chungtu_chuanhan_finallist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_view_chungtu_chuanhan_final">
<div id="gmp_bhld_view_chungtu_chuanhan_final" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($bhld_view_chungtu_chuanhan_final_list->TotalRecords > 0 || $bhld_view_chungtu_chuanhan_final_list->isGridEdit()) { ?>
<table id="tbl_bhld_view_chungtu_chuanhan_finallist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$bhld_view_chungtu_chuanhan_final->RowType = ROWTYPE_HEADER;

// Render list options
$bhld_view_chungtu_chuanhan_final_list->renderListOptions();

// Render list options (header, left)
$bhld_view_chungtu_chuanhan_final_list->ListOptions->render("header", "left");
?>
<?php if ($bhld_view_chungtu_chuanhan_final_list->manv->Visible) { // manv ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->manv) == "") { ?>
		<th data-name="manv" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->manv->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_chuanhan_final_manv" class="bhld_view_chungtu_chuanhan_final_manv"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->manv->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="manv" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->manv->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->manv) ?>', 1);"><div id="elh_bhld_view_chungtu_chuanhan_final_manv" class="bhld_view_chungtu_chuanhan_final_manv">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->manv->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_chuanhan_final_list->manv->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_chuanhan_final_list->manv->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_chuanhan_final_list->tennhanvien->Visible) { // tennhanvien ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->tennhanvien) == "") { ?>
		<th data-name="tennhanvien" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->tennhanvien->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_chuanhan_final_tennhanvien" class="bhld_view_chungtu_chuanhan_final_tennhanvien"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->tennhanvien->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tennhanvien" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->tennhanvien->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->tennhanvien) ?>', 1);"><div id="elh_bhld_view_chungtu_chuanhan_final_tennhanvien" class="bhld_view_chungtu_chuanhan_final_tennhanvien">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->tennhanvien->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_chuanhan_final_list->tennhanvien->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_chuanhan_final_list->tennhanvien->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_chuanhan_final_list->mact->Visible) { // mact ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->mact) == "") { ?>
		<th data-name="mact" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->mact->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_chuanhan_final_mact" class="bhld_view_chungtu_chuanhan_final_mact"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->mact->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mact" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->mact->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->mact) ?>', 1);"><div id="elh_bhld_view_chungtu_chuanhan_final_mact" class="bhld_view_chungtu_chuanhan_final_mact">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->mact->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_chuanhan_final_list->mact->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_chuanhan_final_list->mact->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_chuanhan_final_list->ngct->Visible) { // ngct ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->ngct) == "") { ?>
		<th data-name="ngct" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->ngct->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_chuanhan_final_ngct" class="bhld_view_chungtu_chuanhan_final_ngct"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->ngct->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ngct" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->ngct->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->ngct) ?>', 1);"><div id="elh_bhld_view_chungtu_chuanhan_final_ngct" class="bhld_view_chungtu_chuanhan_final_ngct">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->ngct->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_chuanhan_final_list->ngct->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_chuanhan_final_list->ngct->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_chuanhan_final_list->GiayBH->Visible) { // GiayBH ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->GiayBH) == "") { ?>
		<th data-name="GiayBH" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->GiayBH->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_chuanhan_final_GiayBH" class="bhld_view_chungtu_chuanhan_final_GiayBH"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->GiayBH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GiayBH" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->GiayBH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->GiayBH) ?>', 1);"><div id="elh_bhld_view_chungtu_chuanhan_final_GiayBH" class="bhld_view_chungtu_chuanhan_final_GiayBH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->GiayBH->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_chuanhan_final_list->GiayBH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_chuanhan_final_list->GiayBH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_chuanhan_final_list->MuBH->Visible) { // MuBH ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->MuBH) == "") { ?>
		<th data-name="MuBH" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->MuBH->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_chuanhan_final_MuBH" class="bhld_view_chungtu_chuanhan_final_MuBH"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->MuBH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MuBH" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->MuBH->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->MuBH) ?>', 1);"><div id="elh_bhld_view_chungtu_chuanhan_final_MuBH" class="bhld_view_chungtu_chuanhan_final_MuBH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->MuBH->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_chuanhan_final_list->MuBH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_chuanhan_final_list->MuBH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_chuanhan_final_list->AoMua->Visible) { // AoMua ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->AoMua) == "") { ?>
		<th data-name="AoMua" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->AoMua->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_chuanhan_final_AoMua" class="bhld_view_chungtu_chuanhan_final_AoMua"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->AoMua->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AoMua" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->AoMua->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->AoMua) ?>', 1);"><div id="elh_bhld_view_chungtu_chuanhan_final_AoMua" class="bhld_view_chungtu_chuanhan_final_AoMua">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->AoMua->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_chuanhan_final_list->AoMua->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_chuanhan_final_list->AoMua->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_chuanhan_final_list->QuanAo->Visible) { // QuanAo ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->QuanAo) == "") { ?>
		<th data-name="QuanAo" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->QuanAo->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_chuanhan_final_QuanAo" class="bhld_view_chungtu_chuanhan_final_QuanAo"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->QuanAo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="QuanAo" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->QuanAo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->QuanAo) ?>', 1);"><div id="elh_bhld_view_chungtu_chuanhan_final_QuanAo" class="bhld_view_chungtu_chuanhan_final_QuanAo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->QuanAo->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_chuanhan_final_list->QuanAo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_chuanhan_final_list->QuanAo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_chuanhan_final_list->Kinh->Visible) { // Kinh ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->Kinh) == "") { ?>
		<th data-name="Kinh" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->Kinh->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_chuanhan_final_Kinh" class="bhld_view_chungtu_chuanhan_final_Kinh"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->Kinh->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Kinh" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->Kinh->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->Kinh) ?>', 1);"><div id="elh_bhld_view_chungtu_chuanhan_final_Kinh" class="bhld_view_chungtu_chuanhan_final_Kinh">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->Kinh->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_chuanhan_final_list->Kinh->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_chuanhan_final_list->Kinh->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_chuanhan_final_list->mapb->Visible) { // mapb ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->mapb) == "") { ?>
		<th data-name="mapb" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->mapb->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_chuanhan_final_mapb" class="bhld_view_chungtu_chuanhan_final_mapb"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->mapb->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mapb" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->mapb->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->mapb) ?>', 1);"><div id="elh_bhld_view_chungtu_chuanhan_final_mapb" class="bhld_view_chungtu_chuanhan_final_mapb">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->mapb->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_chuanhan_final_list->mapb->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_chuanhan_final_list->mapb->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_chuanhan_final_list->tenphong->Visible) { // tenphong ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->tenphong) == "") { ?>
		<th data-name="tenphong" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->tenphong->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_chuanhan_final_tenphong" class="bhld_view_chungtu_chuanhan_final_tenphong"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->tenphong->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tenphong" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->tenphong->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->tenphong) ?>', 1);"><div id="elh_bhld_view_chungtu_chuanhan_final_tenphong" class="bhld_view_chungtu_chuanhan_final_tenphong">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->tenphong->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_chuanhan_final_list->tenphong->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_chuanhan_final_list->tenphong->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_chuanhan_final_list->NutTai->Visible) { // NutTai ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->NutTai) == "") { ?>
		<th data-name="NutTai" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->NutTai->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_chuanhan_final_NutTai" class="bhld_view_chungtu_chuanhan_final_NutTai"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->NutTai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NutTai" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->NutTai->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->NutTai) ?>', 1);"><div id="elh_bhld_view_chungtu_chuanhan_final_NutTai" class="bhld_view_chungtu_chuanhan_final_NutTai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->NutTai->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_chuanhan_final_list->NutTai->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_chuanhan_final_list->NutTai->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($bhld_view_chungtu_chuanhan_final_list->PhinLoc->Visible) { // PhinLoc ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->PhinLoc) == "") { ?>
		<th data-name="PhinLoc" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->PhinLoc->headerCellClass() ?>"><div id="elh_bhld_view_chungtu_chuanhan_final_PhinLoc" class="bhld_view_chungtu_chuanhan_final_PhinLoc"><div class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->PhinLoc->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PhinLoc" class="<?php echo $bhld_view_chungtu_chuanhan_final_list->PhinLoc->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $bhld_view_chungtu_chuanhan_final_list->SortUrl($bhld_view_chungtu_chuanhan_final_list->PhinLoc) ?>', 1);"><div id="elh_bhld_view_chungtu_chuanhan_final_PhinLoc" class="bhld_view_chungtu_chuanhan_final_PhinLoc">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $bhld_view_chungtu_chuanhan_final_list->PhinLoc->caption() ?></span><span class="ew-table-header-sort"><?php if ($bhld_view_chungtu_chuanhan_final_list->PhinLoc->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($bhld_view_chungtu_chuanhan_final_list->PhinLoc->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$bhld_view_chungtu_chuanhan_final_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($bhld_view_chungtu_chuanhan_final_list->ExportAll && $bhld_view_chungtu_chuanhan_final_list->isExport()) {
	$bhld_view_chungtu_chuanhan_final_list->StopRecord = $bhld_view_chungtu_chuanhan_final_list->TotalRecords;
} else {

	// Set the last record to display
	if ($bhld_view_chungtu_chuanhan_final_list->TotalRecords > $bhld_view_chungtu_chuanhan_final_list->StartRecord + $bhld_view_chungtu_chuanhan_final_list->DisplayRecords - 1)
		$bhld_view_chungtu_chuanhan_final_list->StopRecord = $bhld_view_chungtu_chuanhan_final_list->StartRecord + $bhld_view_chungtu_chuanhan_final_list->DisplayRecords - 1;
	else
		$bhld_view_chungtu_chuanhan_final_list->StopRecord = $bhld_view_chungtu_chuanhan_final_list->TotalRecords;
}
$bhld_view_chungtu_chuanhan_final_list->RecordCount = $bhld_view_chungtu_chuanhan_final_list->StartRecord - 1;
if ($bhld_view_chungtu_chuanhan_final_list->Recordset && !$bhld_view_chungtu_chuanhan_final_list->Recordset->EOF) {
	$bhld_view_chungtu_chuanhan_final_list->Recordset->moveFirst();
	$selectLimit = $bhld_view_chungtu_chuanhan_final_list->UseSelectLimit;
	if (!$selectLimit && $bhld_view_chungtu_chuanhan_final_list->StartRecord > 1)
		$bhld_view_chungtu_chuanhan_final_list->Recordset->move($bhld_view_chungtu_chuanhan_final_list->StartRecord - 1);
} elseif (!$bhld_view_chungtu_chuanhan_final->AllowAddDeleteRow && $bhld_view_chungtu_chuanhan_final_list->StopRecord == 0) {
	$bhld_view_chungtu_chuanhan_final_list->StopRecord = $bhld_view_chungtu_chuanhan_final->GridAddRowCount;
}

// Initialize aggregate
$bhld_view_chungtu_chuanhan_final->RowType = ROWTYPE_AGGREGATEINIT;
$bhld_view_chungtu_chuanhan_final->resetAttributes();
$bhld_view_chungtu_chuanhan_final_list->renderRow();
while ($bhld_view_chungtu_chuanhan_final_list->RecordCount < $bhld_view_chungtu_chuanhan_final_list->StopRecord) {
	$bhld_view_chungtu_chuanhan_final_list->RecordCount++;
	if ($bhld_view_chungtu_chuanhan_final_list->RecordCount >= $bhld_view_chungtu_chuanhan_final_list->StartRecord) {
		$bhld_view_chungtu_chuanhan_final_list->RowCount++;

		// Set up key count
		$bhld_view_chungtu_chuanhan_final_list->KeyCount = $bhld_view_chungtu_chuanhan_final_list->RowIndex;

		// Init row class and style
		$bhld_view_chungtu_chuanhan_final->resetAttributes();
		$bhld_view_chungtu_chuanhan_final->CssClass = "";
		if ($bhld_view_chungtu_chuanhan_final_list->isGridAdd()) {
		} else {
			$bhld_view_chungtu_chuanhan_final_list->loadRowValues($bhld_view_chungtu_chuanhan_final_list->Recordset); // Load row values
		}
		$bhld_view_chungtu_chuanhan_final->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$bhld_view_chungtu_chuanhan_final->RowAttrs->merge(["data-rowindex" => $bhld_view_chungtu_chuanhan_final_list->RowCount, "id" => "r" . $bhld_view_chungtu_chuanhan_final_list->RowCount . "_bhld_view_chungtu_chuanhan_final", "data-rowtype" => $bhld_view_chungtu_chuanhan_final->RowType]);

		// Render row
		$bhld_view_chungtu_chuanhan_final_list->renderRow();

		// Render list options
		$bhld_view_chungtu_chuanhan_final_list->renderListOptions();
?>
	<tr <?php echo $bhld_view_chungtu_chuanhan_final->rowAttributes() ?>>
<?php

// Render list options (body, left)
$bhld_view_chungtu_chuanhan_final_list->ListOptions->render("body", "left", $bhld_view_chungtu_chuanhan_final_list->RowCount);
?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->manv->Visible) { // manv ?>
		<td data-name="manv" <?php echo $bhld_view_chungtu_chuanhan_final_list->manv->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_chuanhan_final_list->RowCount ?>_bhld_view_chungtu_chuanhan_final_manv">
<span<?php echo $bhld_view_chungtu_chuanhan_final_list->manv->viewAttributes() ?>><?php echo $bhld_view_chungtu_chuanhan_final_list->manv->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->tennhanvien->Visible) { // tennhanvien ?>
		<td data-name="tennhanvien" <?php echo $bhld_view_chungtu_chuanhan_final_list->tennhanvien->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_chuanhan_final_list->RowCount ?>_bhld_view_chungtu_chuanhan_final_tennhanvien">
<span<?php echo $bhld_view_chungtu_chuanhan_final_list->tennhanvien->viewAttributes() ?>><?php echo $bhld_view_chungtu_chuanhan_final_list->tennhanvien->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->mact->Visible) { // mact ?>
		<td data-name="mact" <?php echo $bhld_view_chungtu_chuanhan_final_list->mact->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_chuanhan_final_list->RowCount ?>_bhld_view_chungtu_chuanhan_final_mact">
<span<?php echo $bhld_view_chungtu_chuanhan_final_list->mact->viewAttributes() ?>><?php echo $bhld_view_chungtu_chuanhan_final_list->mact->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->ngct->Visible) { // ngct ?>
		<td data-name="ngct" <?php echo $bhld_view_chungtu_chuanhan_final_list->ngct->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_chuanhan_final_list->RowCount ?>_bhld_view_chungtu_chuanhan_final_ngct">
<span<?php echo $bhld_view_chungtu_chuanhan_final_list->ngct->viewAttributes() ?>><?php echo $bhld_view_chungtu_chuanhan_final_list->ngct->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->GiayBH->Visible) { // GiayBH ?>
		<td data-name="GiayBH" <?php echo $bhld_view_chungtu_chuanhan_final_list->GiayBH->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_chuanhan_final_list->RowCount ?>_bhld_view_chungtu_chuanhan_final_GiayBH">
<span<?php echo $bhld_view_chungtu_chuanhan_final_list->GiayBH->viewAttributes() ?>><?php echo $bhld_view_chungtu_chuanhan_final_list->GiayBH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->MuBH->Visible) { // MuBH ?>
		<td data-name="MuBH" <?php echo $bhld_view_chungtu_chuanhan_final_list->MuBH->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_chuanhan_final_list->RowCount ?>_bhld_view_chungtu_chuanhan_final_MuBH">
<span<?php echo $bhld_view_chungtu_chuanhan_final_list->MuBH->viewAttributes() ?>><?php echo $bhld_view_chungtu_chuanhan_final_list->MuBH->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->AoMua->Visible) { // AoMua ?>
		<td data-name="AoMua" <?php echo $bhld_view_chungtu_chuanhan_final_list->AoMua->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_chuanhan_final_list->RowCount ?>_bhld_view_chungtu_chuanhan_final_AoMua">
<span<?php echo $bhld_view_chungtu_chuanhan_final_list->AoMua->viewAttributes() ?>><?php echo $bhld_view_chungtu_chuanhan_final_list->AoMua->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->QuanAo->Visible) { // QuanAo ?>
		<td data-name="QuanAo" <?php echo $bhld_view_chungtu_chuanhan_final_list->QuanAo->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_chuanhan_final_list->RowCount ?>_bhld_view_chungtu_chuanhan_final_QuanAo">
<span<?php echo $bhld_view_chungtu_chuanhan_final_list->QuanAo->viewAttributes() ?>><?php echo $bhld_view_chungtu_chuanhan_final_list->QuanAo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->Kinh->Visible) { // Kinh ?>
		<td data-name="Kinh" <?php echo $bhld_view_chungtu_chuanhan_final_list->Kinh->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_chuanhan_final_list->RowCount ?>_bhld_view_chungtu_chuanhan_final_Kinh">
<span<?php echo $bhld_view_chungtu_chuanhan_final_list->Kinh->viewAttributes() ?>><?php echo $bhld_view_chungtu_chuanhan_final_list->Kinh->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->mapb->Visible) { // mapb ?>
		<td data-name="mapb" <?php echo $bhld_view_chungtu_chuanhan_final_list->mapb->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_chuanhan_final_list->RowCount ?>_bhld_view_chungtu_chuanhan_final_mapb">
<span<?php echo $bhld_view_chungtu_chuanhan_final_list->mapb->viewAttributes() ?>><?php echo $bhld_view_chungtu_chuanhan_final_list->mapb->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->tenphong->Visible) { // tenphong ?>
		<td data-name="tenphong" <?php echo $bhld_view_chungtu_chuanhan_final_list->tenphong->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_chuanhan_final_list->RowCount ?>_bhld_view_chungtu_chuanhan_final_tenphong">
<span<?php echo $bhld_view_chungtu_chuanhan_final_list->tenphong->viewAttributes() ?>><?php echo $bhld_view_chungtu_chuanhan_final_list->tenphong->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->NutTai->Visible) { // NutTai ?>
		<td data-name="NutTai" <?php echo $bhld_view_chungtu_chuanhan_final_list->NutTai->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_chuanhan_final_list->RowCount ?>_bhld_view_chungtu_chuanhan_final_NutTai">
<span<?php echo $bhld_view_chungtu_chuanhan_final_list->NutTai->viewAttributes() ?>><?php echo $bhld_view_chungtu_chuanhan_final_list->NutTai->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($bhld_view_chungtu_chuanhan_final_list->PhinLoc->Visible) { // PhinLoc ?>
		<td data-name="PhinLoc" <?php echo $bhld_view_chungtu_chuanhan_final_list->PhinLoc->cellAttributes() ?>>
<span id="el<?php echo $bhld_view_chungtu_chuanhan_final_list->RowCount ?>_bhld_view_chungtu_chuanhan_final_PhinLoc">
<span<?php echo $bhld_view_chungtu_chuanhan_final_list->PhinLoc->viewAttributes() ?>><?php echo $bhld_view_chungtu_chuanhan_final_list->PhinLoc->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$bhld_view_chungtu_chuanhan_final_list->ListOptions->render("body", "right", $bhld_view_chungtu_chuanhan_final_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$bhld_view_chungtu_chuanhan_final_list->isGridAdd())
		$bhld_view_chungtu_chuanhan_final_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$bhld_view_chungtu_chuanhan_final->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($bhld_view_chungtu_chuanhan_final_list->Recordset)
	$bhld_view_chungtu_chuanhan_final_list->Recordset->Close();
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($bhld_view_chungtu_chuanhan_final_list->TotalRecords == 0 && !$bhld_view_chungtu_chuanhan_final->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $bhld_view_chungtu_chuanhan_final_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$bhld_view_chungtu_chuanhan_final_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$bhld_view_chungtu_chuanhan_final_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	$("#x_ngct").on("change, blur",function(){this.form.submit()});
});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$bhld_view_chungtu_chuanhan_final_list->terminate();
?>
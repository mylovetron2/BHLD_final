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
$bhld_ctu_add = new bhld_ctu_add();

// Run the page
$bhld_ctu_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_ctu_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbhld_ctuadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fbhld_ctuadd = currentForm = new ew.Form("fbhld_ctuadd", "add");

	// Validate form
	fbhld_ctuadd.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($bhld_ctu_add->ngct->Required) { ?>
				elm = this.getElements("x" + infix + "_ngct");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctu_add->ngct->caption(), $bhld_ctu_add->ngct->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ngct");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_ctu_add->ngct->errorMessage()) ?>");
			<?php if ($bhld_ctu_add->manv->Required) { ?>
				elm = this.getElements("x" + infix + "_manv");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctu_add->manv->caption(), $bhld_ctu_add->manv->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_ctu_add->madm->Required) { ?>
				elm = this.getElements("x" + infix + "_madm");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctu_add->madm->caption(), $bhld_ctu_add->madm->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}

		// Process detail forms
		var dfs = $fobj.find("input[name='detailpage']").get();
		for (var i = 0; i < dfs.length; i++) {
			var df = dfs[i], val = df.value;
			if (val && ew.forms[val])
				if (!ew.forms[val].validate())
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	fbhld_ctuadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbhld_ctuadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fbhld_ctuadd.lists["x_manv"] = <?php echo $bhld_ctu_add->manv->Lookup->toClientList($bhld_ctu_add) ?>;
	fbhld_ctuadd.lists["x_manv"].options = <?php echo JsonEncode($bhld_ctu_add->manv->lookupOptions()) ?>;
	fbhld_ctuadd.lists["x_madm"] = <?php echo $bhld_ctu_add->madm->Lookup->toClientList($bhld_ctu_add) ?>;
	fbhld_ctuadd.lists["x_madm"].options = <?php echo JsonEncode($bhld_ctu_add->madm->lookupOptions()) ?>;
	loadjs.done("fbhld_ctuadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bhld_ctu_add->showPageHeader(); ?>
<?php
$bhld_ctu_add->showMessage();
?>
<form name="fbhld_ctuadd" id="fbhld_ctuadd" class="<?php echo $bhld_ctu_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_ctu">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$bhld_ctu_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($bhld_ctu_add->ngct->Visible) { // ngct ?>
	<div id="r_ngct" class="form-group row">
		<label id="elh_bhld_ctu_ngct" for="x_ngct" class="<?php echo $bhld_ctu_add->LeftColumnClass ?>"><?php echo $bhld_ctu_add->ngct->caption() ?><?php echo $bhld_ctu_add->ngct->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_ctu_add->RightColumnClass ?>"><div <?php echo $bhld_ctu_add->ngct->cellAttributes() ?>>
<span id="el_bhld_ctu_ngct">
<input type="text" data-table="bhld_ctu" data-field="x_ngct" data-format="7" name="x_ngct" id="x_ngct" maxlength="10" placeholder="<?php echo HtmlEncode($bhld_ctu_add->ngct->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_add->ngct->EditValue ?>"<?php echo $bhld_ctu_add->ngct->editAttributes() ?>>
<?php if (!$bhld_ctu_add->ngct->ReadOnly && !$bhld_ctu_add->ngct->Disabled && !isset($bhld_ctu_add->ngct->EditAttrs["readonly"]) && !isset($bhld_ctu_add->ngct->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbhld_ctuadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fbhld_ctuadd", "x_ngct", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $bhld_ctu_add->ngct->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_ctu_add->manv->Visible) { // manv ?>
	<div id="r_manv" class="form-group row">
		<label id="elh_bhld_ctu_manv" for="x_manv" class="<?php echo $bhld_ctu_add->LeftColumnClass ?>"><?php echo $bhld_ctu_add->manv->caption() ?><?php echo $bhld_ctu_add->manv->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_ctu_add->RightColumnClass ?>"><div <?php echo $bhld_ctu_add->manv->cellAttributes() ?>>
<span id="el_bhld_ctu_manv">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_manv"><?php echo EmptyValue(strval($bhld_ctu_add->manv->ViewValue)) ? $Language->phrase("PleaseSelect") : $bhld_ctu_add->manv->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($bhld_ctu_add->manv->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($bhld_ctu_add->manv->ReadOnly || $bhld_ctu_add->manv->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_manv',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $bhld_ctu_add->manv->Lookup->getParamTag($bhld_ctu_add, "p_x_manv") ?>
<input type="hidden" data-table="bhld_ctu" data-field="x_manv" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $bhld_ctu_add->manv->displayValueSeparatorAttribute() ?>" name="x_manv" id="x_manv" value="<?php echo $bhld_ctu_add->manv->CurrentValue ?>"<?php echo $bhld_ctu_add->manv->editAttributes() ?>>
</span>
<?php echo $bhld_ctu_add->manv->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_ctu_add->madm->Visible) { // madm ?>
	<div id="r_madm" class="form-group row">
		<label id="elh_bhld_ctu_madm" for="x_madm" class="<?php echo $bhld_ctu_add->LeftColumnClass ?>"><?php echo $bhld_ctu_add->madm->caption() ?><?php echo $bhld_ctu_add->madm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_ctu_add->RightColumnClass ?>"><div <?php echo $bhld_ctu_add->madm->cellAttributes() ?>>
<span id="el_bhld_ctu_madm">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="bhld_ctu" data-field="x_madm" data-value-separator="<?php echo $bhld_ctu_add->madm->displayValueSeparatorAttribute() ?>" id="x_madm" name="x_madm"<?php echo $bhld_ctu_add->madm->editAttributes() ?>>
			<?php echo $bhld_ctu_add->madm->selectOptionListHtml("x_madm") ?>
		</select>
</div>
<?php echo $bhld_ctu_add->madm->Lookup->getParamTag($bhld_ctu_add, "p_x_madm") ?>
</span>
<?php echo $bhld_ctu_add->madm->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("bhld_ctctu", explode(",", $bhld_ctu->getCurrentDetailTable())) && $bhld_ctctu->DetailAdd) {
?>
<?php if ($bhld_ctu->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("bhld_ctctu", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "bhld_ctctugrid.php" ?>
<?php } ?>
<?php if (!$bhld_ctu_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $bhld_ctu_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bhld_ctu_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$bhld_ctu_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$bhld_ctu_add->terminate();
?>
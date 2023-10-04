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
$bhld_ctu_edit = new bhld_ctu_edit();

// Run the page
$bhld_ctu_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_ctu_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbhld_ctuedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fbhld_ctuedit = currentForm = new ew.Form("fbhld_ctuedit", "edit");

	// Validate form
	fbhld_ctuedit.validate = function() {
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
			<?php if ($bhld_ctu_edit->mact->Required) { ?>
				elm = this.getElements("x" + infix + "_mact");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctu_edit->mact->caption(), $bhld_ctu_edit->mact->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_ctu_edit->manv->Required) { ?>
				elm = this.getElements("x" + infix + "_manv");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctu_edit->manv->caption(), $bhld_ctu_edit->manv->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_manv");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_ctu_edit->manv->errorMessage()) ?>");
			<?php if ($bhld_ctu_edit->ngct->Required) { ?>
				elm = this.getElements("x" + infix + "_ngct");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctu_edit->ngct->caption(), $bhld_ctu_edit->ngct->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ngct");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_ctu_edit->ngct->errorMessage()) ?>");
			<?php if ($bhld_ctu_edit->mapb->Required) { ?>
				elm = this.getElements("x" + infix + "_mapb");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctu_edit->mapb->caption(), $bhld_ctu_edit->mapb->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_ctu_edit->ghichu->Required) { ?>
				elm = this.getElements("x" + infix + "_ghichu");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctu_edit->ghichu->caption(), $bhld_ctu_edit->ghichu->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_ctu_edit->madm->Required) { ?>
				elm = this.getElements("x" + infix + "_madm");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctu_edit->madm->caption(), $bhld_ctu_edit->madm->RequiredErrorMessage)) ?>");
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
	fbhld_ctuedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbhld_ctuedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fbhld_ctuedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bhld_ctu_edit->showPageHeader(); ?>
<?php
$bhld_ctu_edit->showMessage();
?>
<form name="fbhld_ctuedit" id="fbhld_ctuedit" class="<?php echo $bhld_ctu_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_ctu">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$bhld_ctu_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($bhld_ctu_edit->mact->Visible) { // mact ?>
	<div id="r_mact" class="form-group row">
		<label id="elh_bhld_ctu_mact" for="x_mact" class="<?php echo $bhld_ctu_edit->LeftColumnClass ?>"><?php echo $bhld_ctu_edit->mact->caption() ?><?php echo $bhld_ctu_edit->mact->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_ctu_edit->RightColumnClass ?>"><div <?php echo $bhld_ctu_edit->mact->cellAttributes() ?>>
<input type="text" data-table="bhld_ctu" data-field="x_mact" name="x_mact" id="x_mact" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctu_edit->mact->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_edit->mact->EditValue ?>"<?php echo $bhld_ctu_edit->mact->editAttributes() ?>>
<input type="hidden" data-table="bhld_ctu" data-field="x_mact" name="o_mact" id="o_mact" value="<?php echo HtmlEncode($bhld_ctu_edit->mact->OldValue != null ? $bhld_ctu_edit->mact->OldValue : $bhld_ctu_edit->mact->CurrentValue) ?>">
<?php echo $bhld_ctu_edit->mact->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_ctu_edit->manv->Visible) { // manv ?>
	<div id="r_manv" class="form-group row">
		<label id="elh_bhld_ctu_manv" for="x_manv" class="<?php echo $bhld_ctu_edit->LeftColumnClass ?>"><?php echo $bhld_ctu_edit->manv->caption() ?><?php echo $bhld_ctu_edit->manv->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_ctu_edit->RightColumnClass ?>"><div <?php echo $bhld_ctu_edit->manv->cellAttributes() ?>>
<span id="el_bhld_ctu_manv">
<input type="text" data-table="bhld_ctu" data-field="x_manv" name="x_manv" id="x_manv" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_ctu_edit->manv->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_edit->manv->EditValue ?>"<?php echo $bhld_ctu_edit->manv->editAttributes() ?>>
</span>
<?php echo $bhld_ctu_edit->manv->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_ctu_edit->ngct->Visible) { // ngct ?>
	<div id="r_ngct" class="form-group row">
		<label id="elh_bhld_ctu_ngct" for="x_ngct" class="<?php echo $bhld_ctu_edit->LeftColumnClass ?>"><?php echo $bhld_ctu_edit->ngct->caption() ?><?php echo $bhld_ctu_edit->ngct->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_ctu_edit->RightColumnClass ?>"><div <?php echo $bhld_ctu_edit->ngct->cellAttributes() ?>>
<span id="el_bhld_ctu_ngct">
<input type="text" data-table="bhld_ctu" data-field="x_ngct" data-format="7" name="x_ngct" id="x_ngct" maxlength="10" placeholder="<?php echo HtmlEncode($bhld_ctu_edit->ngct->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_edit->ngct->EditValue ?>"<?php echo $bhld_ctu_edit->ngct->editAttributes() ?>>
<?php if (!$bhld_ctu_edit->ngct->ReadOnly && !$bhld_ctu_edit->ngct->Disabled && !isset($bhld_ctu_edit->ngct->EditAttrs["readonly"]) && !isset($bhld_ctu_edit->ngct->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbhld_ctuedit", "datetimepicker"], function() {
	ew.createDateTimePicker("fbhld_ctuedit", "x_ngct", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $bhld_ctu_edit->ngct->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_ctu_edit->mapb->Visible) { // mapb ?>
	<div id="r_mapb" class="form-group row">
		<label id="elh_bhld_ctu_mapb" for="x_mapb" class="<?php echo $bhld_ctu_edit->LeftColumnClass ?>"><?php echo $bhld_ctu_edit->mapb->caption() ?><?php echo $bhld_ctu_edit->mapb->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_ctu_edit->RightColumnClass ?>"><div <?php echo $bhld_ctu_edit->mapb->cellAttributes() ?>>
<span id="el_bhld_ctu_mapb">
<input type="text" data-table="bhld_ctu" data-field="x_mapb" name="x_mapb" id="x_mapb" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctu_edit->mapb->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_edit->mapb->EditValue ?>"<?php echo $bhld_ctu_edit->mapb->editAttributes() ?>>
</span>
<?php echo $bhld_ctu_edit->mapb->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_ctu_edit->ghichu->Visible) { // ghichu ?>
	<div id="r_ghichu" class="form-group row">
		<label id="elh_bhld_ctu_ghichu" for="x_ghichu" class="<?php echo $bhld_ctu_edit->LeftColumnClass ?>"><?php echo $bhld_ctu_edit->ghichu->caption() ?><?php echo $bhld_ctu_edit->ghichu->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_ctu_edit->RightColumnClass ?>"><div <?php echo $bhld_ctu_edit->ghichu->cellAttributes() ?>>
<span id="el_bhld_ctu_ghichu">
<input type="text" data-table="bhld_ctu" data-field="x_ghichu" name="x_ghichu" id="x_ghichu" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctu_edit->ghichu->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_edit->ghichu->EditValue ?>"<?php echo $bhld_ctu_edit->ghichu->editAttributes() ?>>
</span>
<?php echo $bhld_ctu_edit->ghichu->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_ctu_edit->madm->Visible) { // madm ?>
	<div id="r_madm" class="form-group row">
		<label id="elh_bhld_ctu_madm" for="x_madm" class="<?php echo $bhld_ctu_edit->LeftColumnClass ?>"><?php echo $bhld_ctu_edit->madm->caption() ?><?php echo $bhld_ctu_edit->madm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_ctu_edit->RightColumnClass ?>"><div <?php echo $bhld_ctu_edit->madm->cellAttributes() ?>>
<span id="el_bhld_ctu_madm">
<input type="text" data-table="bhld_ctu" data-field="x_madm" name="x_madm" id="x_madm" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctu_edit->madm->getPlaceHolder()) ?>" value="<?php echo $bhld_ctu_edit->madm->EditValue ?>"<?php echo $bhld_ctu_edit->madm->editAttributes() ?>>
</span>
<?php echo $bhld_ctu_edit->madm->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("bhld_ctctu", explode(",", $bhld_ctu->getCurrentDetailTable())) && $bhld_ctctu->DetailEdit) {
?>
<?php if ($bhld_ctu->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("bhld_ctctu", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "bhld_ctctugrid.php" ?>
<?php } ?>
<?php if (!$bhld_ctu_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $bhld_ctu_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bhld_ctu_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$bhld_ctu_edit->showPageFooter();
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
$bhld_ctu_edit->terminate();
?>
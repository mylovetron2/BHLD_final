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
$bhld_ctctu_add = new bhld_ctctu_add();

// Run the page
$bhld_ctctu_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_ctctu_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbhld_ctctuadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fbhld_ctctuadd = currentForm = new ew.Form("fbhld_ctctuadd", "add");

	// Validate form
	fbhld_ctctuadd.validate = function() {
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
			<?php if ($bhld_ctctu_add->mact->Required) { ?>
				elm = this.getElements("x" + infix + "_mact");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctctu_add->mact->caption(), $bhld_ctctu_add->mact->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_ctctu_add->mavt->Required) { ?>
				elm = this.getElements("x" + infix + "_mavt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctctu_add->mavt->caption(), $bhld_ctctu_add->mavt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_mavt");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_ctctu_add->mavt->errorMessage()) ?>");
			<?php if ($bhld_ctctu_add->ngnhan->Required) { ?>
				elm = this.getElements("x" + infix + "_ngnhan");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctctu_add->ngnhan->caption(), $bhld_ctctu_add->ngnhan->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ngnhan");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_ctctu_add->ngnhan->errorMessage()) ?>");
			<?php if ($bhld_ctctu_add->sl->Required) { ?>
				elm = this.getElements("x" + infix + "_sl");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctctu_add->sl->caption(), $bhld_ctctu_add->sl->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sl");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_ctctu_add->sl->errorMessage()) ?>");
			<?php if ($bhld_ctctu_add->ngnhantt->Required) { ?>
				elm = this.getElements("x" + infix + "_ngnhantt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctctu_add->ngnhantt->caption(), $bhld_ctctu_add->ngnhantt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ngnhantt");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_ctctu_add->ngnhantt->errorMessage()) ?>");
			<?php if ($bhld_ctctu_add->dmtg->Required) { ?>
				elm = this.getElements("x" + infix + "_dmtg");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctctu_add->dmtg->caption(), $bhld_ctctu_add->dmtg->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_dmtg");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_ctctu_add->dmtg->errorMessage()) ?>");

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
	fbhld_ctctuadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbhld_ctctuadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fbhld_ctctuadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bhld_ctctu_add->showPageHeader(); ?>
<?php
$bhld_ctctu_add->showMessage();
?>
<form name="fbhld_ctctuadd" id="fbhld_ctctuadd" class="<?php echo $bhld_ctctu_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_ctctu">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$bhld_ctctu_add->IsModal ?>">
<?php if ($bhld_ctctu->getCurrentMasterTable() == "bhld_ctu") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="bhld_ctu">
<input type="hidden" name="fk_mact" value="<?php echo HtmlEncode($bhld_ctctu_add->mact->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($bhld_ctctu_add->mact->Visible) { // mact ?>
	<div id="r_mact" class="form-group row">
		<label id="elh_bhld_ctctu_mact" for="x_mact" class="<?php echo $bhld_ctctu_add->LeftColumnClass ?>"><?php echo $bhld_ctctu_add->mact->caption() ?><?php echo $bhld_ctctu_add->mact->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_ctctu_add->RightColumnClass ?>"><div <?php echo $bhld_ctctu_add->mact->cellAttributes() ?>>
<?php if ($bhld_ctctu_add->mact->getSessionValue() != "") { ?>
<span id="el_bhld_ctctu_mact">
<span<?php echo $bhld_ctctu_add->mact->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_ctctu_add->mact->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_mact" name="x_mact" value="<?php echo HtmlEncode($bhld_ctctu_add->mact->CurrentValue) ?>">
<?php } else { ?>
<span id="el_bhld_ctctu_mact">
<input type="text" data-table="bhld_ctctu" data-field="x_mact" name="x_mact" id="x_mact" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctctu_add->mact->getPlaceHolder()) ?>" value="<?php echo $bhld_ctctu_add->mact->EditValue ?>"<?php echo $bhld_ctctu_add->mact->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $bhld_ctctu_add->mact->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_ctctu_add->mavt->Visible) { // mavt ?>
	<div id="r_mavt" class="form-group row">
		<label id="elh_bhld_ctctu_mavt" for="x_mavt" class="<?php echo $bhld_ctctu_add->LeftColumnClass ?>"><?php echo $bhld_ctctu_add->mavt->caption() ?><?php echo $bhld_ctctu_add->mavt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_ctctu_add->RightColumnClass ?>"><div <?php echo $bhld_ctctu_add->mavt->cellAttributes() ?>>
<span id="el_bhld_ctctu_mavt">
<input type="text" data-table="bhld_ctctu" data-field="x_mavt" name="x_mavt" id="x_mavt" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_ctctu_add->mavt->getPlaceHolder()) ?>" value="<?php echo $bhld_ctctu_add->mavt->EditValue ?>"<?php echo $bhld_ctctu_add->mavt->editAttributes() ?>>
</span>
<?php echo $bhld_ctctu_add->mavt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_ctctu_add->ngnhan->Visible) { // ngnhan ?>
	<div id="r_ngnhan" class="form-group row">
		<label id="elh_bhld_ctctu_ngnhan" for="x_ngnhan" class="<?php echo $bhld_ctctu_add->LeftColumnClass ?>"><?php echo $bhld_ctctu_add->ngnhan->caption() ?><?php echo $bhld_ctctu_add->ngnhan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_ctctu_add->RightColumnClass ?>"><div <?php echo $bhld_ctctu_add->ngnhan->cellAttributes() ?>>
<span id="el_bhld_ctctu_ngnhan">
<input type="text" data-table="bhld_ctctu" data-field="x_ngnhan" name="x_ngnhan" id="x_ngnhan" maxlength="10" placeholder="<?php echo HtmlEncode($bhld_ctctu_add->ngnhan->getPlaceHolder()) ?>" value="<?php echo $bhld_ctctu_add->ngnhan->EditValue ?>"<?php echo $bhld_ctctu_add->ngnhan->editAttributes() ?>>
<?php if (!$bhld_ctctu_add->ngnhan->ReadOnly && !$bhld_ctctu_add->ngnhan->Disabled && !isset($bhld_ctctu_add->ngnhan->EditAttrs["readonly"]) && !isset($bhld_ctctu_add->ngnhan->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbhld_ctctuadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fbhld_ctctuadd", "x_ngnhan", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $bhld_ctctu_add->ngnhan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_ctctu_add->sl->Visible) { // sl ?>
	<div id="r_sl" class="form-group row">
		<label id="elh_bhld_ctctu_sl" for="x_sl" class="<?php echo $bhld_ctctu_add->LeftColumnClass ?>"><?php echo $bhld_ctctu_add->sl->caption() ?><?php echo $bhld_ctctu_add->sl->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_ctctu_add->RightColumnClass ?>"><div <?php echo $bhld_ctctu_add->sl->cellAttributes() ?>>
<span id="el_bhld_ctctu_sl">
<input type="text" data-table="bhld_ctctu" data-field="x_sl" name="x_sl" id="x_sl" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_ctctu_add->sl->getPlaceHolder()) ?>" value="<?php echo $bhld_ctctu_add->sl->EditValue ?>"<?php echo $bhld_ctctu_add->sl->editAttributes() ?>>
</span>
<?php echo $bhld_ctctu_add->sl->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_ctctu_add->ngnhantt->Visible) { // ngnhantt ?>
	<div id="r_ngnhantt" class="form-group row">
		<label id="elh_bhld_ctctu_ngnhantt" for="x_ngnhantt" class="<?php echo $bhld_ctctu_add->LeftColumnClass ?>"><?php echo $bhld_ctctu_add->ngnhantt->caption() ?><?php echo $bhld_ctctu_add->ngnhantt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_ctctu_add->RightColumnClass ?>"><div <?php echo $bhld_ctctu_add->ngnhantt->cellAttributes() ?>>
<span id="el_bhld_ctctu_ngnhantt">
<input type="text" data-table="bhld_ctctu" data-field="x_ngnhantt" name="x_ngnhantt" id="x_ngnhantt" maxlength="10" placeholder="<?php echo HtmlEncode($bhld_ctctu_add->ngnhantt->getPlaceHolder()) ?>" value="<?php echo $bhld_ctctu_add->ngnhantt->EditValue ?>"<?php echo $bhld_ctctu_add->ngnhantt->editAttributes() ?>>
<?php if (!$bhld_ctctu_add->ngnhantt->ReadOnly && !$bhld_ctctu_add->ngnhantt->Disabled && !isset($bhld_ctctu_add->ngnhantt->EditAttrs["readonly"]) && !isset($bhld_ctctu_add->ngnhantt->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbhld_ctctuadd", "datetimepicker"], function() {
	ew.createDateTimePicker("fbhld_ctctuadd", "x_ngnhantt", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php echo $bhld_ctctu_add->ngnhantt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_ctctu_add->dmtg->Visible) { // dmtg ?>
	<div id="r_dmtg" class="form-group row">
		<label id="elh_bhld_ctctu_dmtg" for="x_dmtg" class="<?php echo $bhld_ctctu_add->LeftColumnClass ?>"><?php echo $bhld_ctctu_add->dmtg->caption() ?><?php echo $bhld_ctctu_add->dmtg->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_ctctu_add->RightColumnClass ?>"><div <?php echo $bhld_ctctu_add->dmtg->cellAttributes() ?>>
<span id="el_bhld_ctctu_dmtg">
<input type="text" data-table="bhld_ctctu" data-field="x_dmtg" name="x_dmtg" id="x_dmtg" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_ctctu_add->dmtg->getPlaceHolder()) ?>" value="<?php echo $bhld_ctctu_add->dmtg->EditValue ?>"<?php echo $bhld_ctctu_add->dmtg->editAttributes() ?>>
</span>
<?php echo $bhld_ctctu_add->dmtg->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$bhld_ctctu_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $bhld_ctctu_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bhld_ctctu_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$bhld_ctctu_add->showPageFooter();
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
$bhld_ctctu_add->terminate();
?>
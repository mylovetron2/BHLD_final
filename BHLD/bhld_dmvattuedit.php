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
$bhld_dmvattu_edit = new bhld_dmvattu_edit();

// Run the page
$bhld_dmvattu_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_dmvattu_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbhld_dmvattuedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fbhld_dmvattuedit = currentForm = new ew.Form("fbhld_dmvattuedit", "edit");

	// Validate form
	fbhld_dmvattuedit.validate = function() {
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
			<?php if ($bhld_dmvattu_edit->mavt->Required) { ?>
				elm = this.getElements("x" + infix + "_mavt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_dmvattu_edit->mavt->caption(), $bhld_dmvattu_edit->mavt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_mavt");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_dmvattu_edit->mavt->errorMessage()) ?>");
			<?php if ($bhld_dmvattu_edit->tenvt->Required) { ?>
				elm = this.getElements("x" + infix + "_tenvt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_dmvattu_edit->tenvt->caption(), $bhld_dmvattu_edit->tenvt->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_dmvattu_edit->dvt->Required) { ?>
				elm = this.getElements("x" + infix + "_dvt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_dmvattu_edit->dvt->caption(), $bhld_dmvattu_edit->dvt->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_dmvattu_edit->ghichu->Required) { ?>
				elm = this.getElements("x" + infix + "_ghichu");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_dmvattu_edit->ghichu->caption(), $bhld_dmvattu_edit->ghichu->RequiredErrorMessage)) ?>");
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
	fbhld_dmvattuedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbhld_dmvattuedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fbhld_dmvattuedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bhld_dmvattu_edit->showPageHeader(); ?>
<?php
$bhld_dmvattu_edit->showMessage();
?>
<form name="fbhld_dmvattuedit" id="fbhld_dmvattuedit" class="<?php echo $bhld_dmvattu_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_dmvattu">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$bhld_dmvattu_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($bhld_dmvattu_edit->mavt->Visible) { // mavt ?>
	<div id="r_mavt" class="form-group row">
		<label id="elh_bhld_dmvattu_mavt" for="x_mavt" class="<?php echo $bhld_dmvattu_edit->LeftColumnClass ?>"><?php echo $bhld_dmvattu_edit->mavt->caption() ?><?php echo $bhld_dmvattu_edit->mavt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_dmvattu_edit->RightColumnClass ?>"><div <?php echo $bhld_dmvattu_edit->mavt->cellAttributes() ?>>
<input type="text" data-table="bhld_dmvattu" data-field="x_mavt" name="x_mavt" id="x_mavt" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_dmvattu_edit->mavt->getPlaceHolder()) ?>" value="<?php echo $bhld_dmvattu_edit->mavt->EditValue ?>"<?php echo $bhld_dmvattu_edit->mavt->editAttributes() ?>>
<input type="hidden" data-table="bhld_dmvattu" data-field="x_mavt" name="o_mavt" id="o_mavt" value="<?php echo HtmlEncode($bhld_dmvattu_edit->mavt->OldValue != null ? $bhld_dmvattu_edit->mavt->OldValue : $bhld_dmvattu_edit->mavt->CurrentValue) ?>">
<?php echo $bhld_dmvattu_edit->mavt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_dmvattu_edit->tenvt->Visible) { // tenvt ?>
	<div id="r_tenvt" class="form-group row">
		<label id="elh_bhld_dmvattu_tenvt" for="x_tenvt" class="<?php echo $bhld_dmvattu_edit->LeftColumnClass ?>"><?php echo $bhld_dmvattu_edit->tenvt->caption() ?><?php echo $bhld_dmvattu_edit->tenvt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_dmvattu_edit->RightColumnClass ?>"><div <?php echo $bhld_dmvattu_edit->tenvt->cellAttributes() ?>>
<span id="el_bhld_dmvattu_tenvt">
<input type="text" data-table="bhld_dmvattu" data-field="x_tenvt" name="x_tenvt" id="x_tenvt" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_dmvattu_edit->tenvt->getPlaceHolder()) ?>" value="<?php echo $bhld_dmvattu_edit->tenvt->EditValue ?>"<?php echo $bhld_dmvattu_edit->tenvt->editAttributes() ?>>
</span>
<?php echo $bhld_dmvattu_edit->tenvt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_dmvattu_edit->dvt->Visible) { // dvt ?>
	<div id="r_dvt" class="form-group row">
		<label id="elh_bhld_dmvattu_dvt" for="x_dvt" class="<?php echo $bhld_dmvattu_edit->LeftColumnClass ?>"><?php echo $bhld_dmvattu_edit->dvt->caption() ?><?php echo $bhld_dmvattu_edit->dvt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_dmvattu_edit->RightColumnClass ?>"><div <?php echo $bhld_dmvattu_edit->dvt->cellAttributes() ?>>
<span id="el_bhld_dmvattu_dvt">
<input type="text" data-table="bhld_dmvattu" data-field="x_dvt" name="x_dvt" id="x_dvt" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_dmvattu_edit->dvt->getPlaceHolder()) ?>" value="<?php echo $bhld_dmvattu_edit->dvt->EditValue ?>"<?php echo $bhld_dmvattu_edit->dvt->editAttributes() ?>>
</span>
<?php echo $bhld_dmvattu_edit->dvt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_dmvattu_edit->ghichu->Visible) { // ghichu ?>
	<div id="r_ghichu" class="form-group row">
		<label id="elh_bhld_dmvattu_ghichu" for="x_ghichu" class="<?php echo $bhld_dmvattu_edit->LeftColumnClass ?>"><?php echo $bhld_dmvattu_edit->ghichu->caption() ?><?php echo $bhld_dmvattu_edit->ghichu->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_dmvattu_edit->RightColumnClass ?>"><div <?php echo $bhld_dmvattu_edit->ghichu->cellAttributes() ?>>
<span id="el_bhld_dmvattu_ghichu">
<input type="text" data-table="bhld_dmvattu" data-field="x_ghichu" name="x_ghichu" id="x_ghichu" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($bhld_dmvattu_edit->ghichu->getPlaceHolder()) ?>" value="<?php echo $bhld_dmvattu_edit->ghichu->EditValue ?>"<?php echo $bhld_dmvattu_edit->ghichu->editAttributes() ?>>
</span>
<?php echo $bhld_dmvattu_edit->ghichu->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$bhld_dmvattu_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $bhld_dmvattu_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bhld_dmvattu_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$bhld_dmvattu_edit->showPageFooter();
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
$bhld_dmvattu_edit->terminate();
?>
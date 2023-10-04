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
$bhld_dmvattu_add = new bhld_dmvattu_add();

// Run the page
$bhld_dmvattu_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_dmvattu_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbhld_dmvattuadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fbhld_dmvattuadd = currentForm = new ew.Form("fbhld_dmvattuadd", "add");

	// Validate form
	fbhld_dmvattuadd.validate = function() {
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
			<?php if ($bhld_dmvattu_add->mavt->Required) { ?>
				elm = this.getElements("x" + infix + "_mavt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_dmvattu_add->mavt->caption(), $bhld_dmvattu_add->mavt->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_mavt");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_dmvattu_add->mavt->errorMessage()) ?>");
			<?php if ($bhld_dmvattu_add->tenvt->Required) { ?>
				elm = this.getElements("x" + infix + "_tenvt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_dmvattu_add->tenvt->caption(), $bhld_dmvattu_add->tenvt->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_dmvattu_add->dvt->Required) { ?>
				elm = this.getElements("x" + infix + "_dvt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_dmvattu_add->dvt->caption(), $bhld_dmvattu_add->dvt->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_dmvattu_add->ghichu->Required) { ?>
				elm = this.getElements("x" + infix + "_ghichu");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_dmvattu_add->ghichu->caption(), $bhld_dmvattu_add->ghichu->RequiredErrorMessage)) ?>");
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
	fbhld_dmvattuadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbhld_dmvattuadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fbhld_dmvattuadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bhld_dmvattu_add->showPageHeader(); ?>
<?php
$bhld_dmvattu_add->showMessage();
?>
<form name="fbhld_dmvattuadd" id="fbhld_dmvattuadd" class="<?php echo $bhld_dmvattu_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_dmvattu">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$bhld_dmvattu_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($bhld_dmvattu_add->mavt->Visible) { // mavt ?>
	<div id="r_mavt" class="form-group row">
		<label id="elh_bhld_dmvattu_mavt" for="x_mavt" class="<?php echo $bhld_dmvattu_add->LeftColumnClass ?>"><?php echo $bhld_dmvattu_add->mavt->caption() ?><?php echo $bhld_dmvattu_add->mavt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_dmvattu_add->RightColumnClass ?>"><div <?php echo $bhld_dmvattu_add->mavt->cellAttributes() ?>>
<span id="el_bhld_dmvattu_mavt">
<input type="text" data-table="bhld_dmvattu" data-field="x_mavt" name="x_mavt" id="x_mavt" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_dmvattu_add->mavt->getPlaceHolder()) ?>" value="<?php echo $bhld_dmvattu_add->mavt->EditValue ?>"<?php echo $bhld_dmvattu_add->mavt->editAttributes() ?>>
</span>
<?php echo $bhld_dmvattu_add->mavt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_dmvattu_add->tenvt->Visible) { // tenvt ?>
	<div id="r_tenvt" class="form-group row">
		<label id="elh_bhld_dmvattu_tenvt" for="x_tenvt" class="<?php echo $bhld_dmvattu_add->LeftColumnClass ?>"><?php echo $bhld_dmvattu_add->tenvt->caption() ?><?php echo $bhld_dmvattu_add->tenvt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_dmvattu_add->RightColumnClass ?>"><div <?php echo $bhld_dmvattu_add->tenvt->cellAttributes() ?>>
<span id="el_bhld_dmvattu_tenvt">
<input type="text" data-table="bhld_dmvattu" data-field="x_tenvt" name="x_tenvt" id="x_tenvt" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_dmvattu_add->tenvt->getPlaceHolder()) ?>" value="<?php echo $bhld_dmvattu_add->tenvt->EditValue ?>"<?php echo $bhld_dmvattu_add->tenvt->editAttributes() ?>>
</span>
<?php echo $bhld_dmvattu_add->tenvt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_dmvattu_add->dvt->Visible) { // dvt ?>
	<div id="r_dvt" class="form-group row">
		<label id="elh_bhld_dmvattu_dvt" for="x_dvt" class="<?php echo $bhld_dmvattu_add->LeftColumnClass ?>"><?php echo $bhld_dmvattu_add->dvt->caption() ?><?php echo $bhld_dmvattu_add->dvt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_dmvattu_add->RightColumnClass ?>"><div <?php echo $bhld_dmvattu_add->dvt->cellAttributes() ?>>
<span id="el_bhld_dmvattu_dvt">
<input type="text" data-table="bhld_dmvattu" data-field="x_dvt" name="x_dvt" id="x_dvt" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_dmvattu_add->dvt->getPlaceHolder()) ?>" value="<?php echo $bhld_dmvattu_add->dvt->EditValue ?>"<?php echo $bhld_dmvattu_add->dvt->editAttributes() ?>>
</span>
<?php echo $bhld_dmvattu_add->dvt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_dmvattu_add->ghichu->Visible) { // ghichu ?>
	<div id="r_ghichu" class="form-group row">
		<label id="elh_bhld_dmvattu_ghichu" for="x_ghichu" class="<?php echo $bhld_dmvattu_add->LeftColumnClass ?>"><?php echo $bhld_dmvattu_add->ghichu->caption() ?><?php echo $bhld_dmvattu_add->ghichu->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_dmvattu_add->RightColumnClass ?>"><div <?php echo $bhld_dmvattu_add->ghichu->cellAttributes() ?>>
<span id="el_bhld_dmvattu_ghichu">
<input type="text" data-table="bhld_dmvattu" data-field="x_ghichu" name="x_ghichu" id="x_ghichu" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($bhld_dmvattu_add->ghichu->getPlaceHolder()) ?>" value="<?php echo $bhld_dmvattu_add->ghichu->EditValue ?>"<?php echo $bhld_dmvattu_add->ghichu->editAttributes() ?>>
</span>
<?php echo $bhld_dmvattu_add->ghichu->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$bhld_dmvattu_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $bhld_dmvattu_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bhld_dmvattu_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$bhld_dmvattu_add->showPageFooter();
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
$bhld_dmvattu_add->terminate();
?>
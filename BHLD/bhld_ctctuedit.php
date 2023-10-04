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
$bhld_ctctu_edit = new bhld_ctctu_edit();

// Run the page
$bhld_ctctu_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_ctctu_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbhld_ctctuedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fbhld_ctctuedit = currentForm = new ew.Form("fbhld_ctctuedit", "edit");

	// Validate form
	fbhld_ctctuedit.validate = function() {
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
			<?php if ($bhld_ctctu_edit->sl->Required) { ?>
				elm = this.getElements("x" + infix + "_sl");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctctu_edit->sl->caption(), $bhld_ctctu_edit->sl->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_sl");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_ctctu_edit->sl->errorMessage()) ?>");

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
	fbhld_ctctuedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbhld_ctctuedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fbhld_ctctuedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bhld_ctctu_edit->showPageHeader(); ?>
<?php
$bhld_ctctu_edit->showMessage();
?>
<form name="fbhld_ctctuedit" id="fbhld_ctctuedit" class="<?php echo $bhld_ctctu_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_ctctu">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$bhld_ctctu_edit->IsModal ?>">
<?php if ($bhld_ctctu->getCurrentMasterTable() == "bhld_ctu") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="bhld_ctu">
<input type="hidden" name="fk_mact" value="<?php echo HtmlEncode($bhld_ctctu_edit->mact->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($bhld_ctctu_edit->sl->Visible) { // sl ?>
	<div id="r_sl" class="form-group row">
		<label id="elh_bhld_ctctu_sl" for="x_sl" class="<?php echo $bhld_ctctu_edit->LeftColumnClass ?>"><?php echo $bhld_ctctu_edit->sl->caption() ?><?php echo $bhld_ctctu_edit->sl->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_ctctu_edit->RightColumnClass ?>"><div <?php echo $bhld_ctctu_edit->sl->cellAttributes() ?>>
<span id="el_bhld_ctctu_sl">
<input type="text" data-table="bhld_ctctu" data-field="x_sl" name="x_sl" id="x_sl" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_ctctu_edit->sl->getPlaceHolder()) ?>" value="<?php echo $bhld_ctctu_edit->sl->EditValue ?>"<?php echo $bhld_ctctu_edit->sl->editAttributes() ?>>
</span>
<?php echo $bhld_ctctu_edit->sl->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="bhld_ctctu" data-field="x_mact" name="x_mact" id="x_mact" value="<?php echo HtmlEncode($bhld_ctctu_edit->mact->CurrentValue) ?>">
	<input type="hidden" data-table="bhld_ctctu" data-field="x_mavt" name="x_mavt" id="x_mavt" value="<?php echo HtmlEncode($bhld_ctctu_edit->mavt->CurrentValue) ?>">
<?php if (!$bhld_ctctu_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $bhld_ctctu_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bhld_ctctu_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$bhld_ctctu_edit->showPageFooter();
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
$bhld_ctctu_edit->terminate();
?>
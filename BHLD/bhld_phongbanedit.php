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
$bhld_phongban_edit = new bhld_phongban_edit();

// Run the page
$bhld_phongban_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_phongban_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbhld_phongbanedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fbhld_phongbanedit = currentForm = new ew.Form("fbhld_phongbanedit", "edit");

	// Validate form
	fbhld_phongbanedit.validate = function() {
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
			<?php if ($bhld_phongban_edit->mapb->Required) { ?>
				elm = this.getElements("x" + infix + "_mapb");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_phongban_edit->mapb->caption(), $bhld_phongban_edit->mapb->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_phongban_edit->tenphong->Required) { ?>
				elm = this.getElements("x" + infix + "_tenphong");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_phongban_edit->tenphong->caption(), $bhld_phongban_edit->tenphong->RequiredErrorMessage)) ?>");
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
	fbhld_phongbanedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbhld_phongbanedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fbhld_phongbanedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bhld_phongban_edit->showPageHeader(); ?>
<?php
$bhld_phongban_edit->showMessage();
?>
<form name="fbhld_phongbanedit" id="fbhld_phongbanedit" class="<?php echo $bhld_phongban_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_phongban">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$bhld_phongban_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($bhld_phongban_edit->mapb->Visible) { // mapb ?>
	<div id="r_mapb" class="form-group row">
		<label id="elh_bhld_phongban_mapb" for="x_mapb" class="<?php echo $bhld_phongban_edit->LeftColumnClass ?>"><?php echo $bhld_phongban_edit->mapb->caption() ?><?php echo $bhld_phongban_edit->mapb->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_phongban_edit->RightColumnClass ?>"><div <?php echo $bhld_phongban_edit->mapb->cellAttributes() ?>>
<input type="text" data-table="bhld_phongban" data-field="x_mapb" name="x_mapb" id="x_mapb" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_phongban_edit->mapb->getPlaceHolder()) ?>" value="<?php echo $bhld_phongban_edit->mapb->EditValue ?>"<?php echo $bhld_phongban_edit->mapb->editAttributes() ?>>
<input type="hidden" data-table="bhld_phongban" data-field="x_mapb" name="o_mapb" id="o_mapb" value="<?php echo HtmlEncode($bhld_phongban_edit->mapb->OldValue != null ? $bhld_phongban_edit->mapb->OldValue : $bhld_phongban_edit->mapb->CurrentValue) ?>">
<?php echo $bhld_phongban_edit->mapb->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_phongban_edit->tenphong->Visible) { // tenphong ?>
	<div id="r_tenphong" class="form-group row">
		<label id="elh_bhld_phongban_tenphong" for="x_tenphong" class="<?php echo $bhld_phongban_edit->LeftColumnClass ?>"><?php echo $bhld_phongban_edit->tenphong->caption() ?><?php echo $bhld_phongban_edit->tenphong->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_phongban_edit->RightColumnClass ?>"><div <?php echo $bhld_phongban_edit->tenphong->cellAttributes() ?>>
<span id="el_bhld_phongban_tenphong">
<input type="text" data-table="bhld_phongban" data-field="x_tenphong" name="x_tenphong" id="x_tenphong" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_phongban_edit->tenphong->getPlaceHolder()) ?>" value="<?php echo $bhld_phongban_edit->tenphong->EditValue ?>"<?php echo $bhld_phongban_edit->tenphong->editAttributes() ?>>
</span>
<?php echo $bhld_phongban_edit->tenphong->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$bhld_phongban_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $bhld_phongban_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bhld_phongban_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$bhld_phongban_edit->showPageFooter();
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
$bhld_phongban_edit->terminate();
?>
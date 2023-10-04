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
$bhld_nhanvien_edit = new bhld_nhanvien_edit();

// Run the page
$bhld_nhanvien_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_nhanvien_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbhld_nhanvienedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fbhld_nhanvienedit = currentForm = new ew.Form("fbhld_nhanvienedit", "edit");

	// Validate form
	fbhld_nhanvienedit.validate = function() {
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
			<?php if ($bhld_nhanvien_edit->mapb->Required) { ?>
				elm = this.getElements("x" + infix + "_mapb");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_nhanvien_edit->mapb->caption(), $bhld_nhanvien_edit->mapb->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_nhanvien_edit->manv->Required) { ?>
				elm = this.getElements("x" + infix + "_manv");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_nhanvien_edit->manv->caption(), $bhld_nhanvien_edit->manv->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_manv");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_nhanvien_edit->manv->errorMessage()) ?>");
			<?php if ($bhld_nhanvien_edit->tennhanvien->Required) { ?>
				elm = this.getElements("x" + infix + "_tennhanvien");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_nhanvien_edit->tennhanvien->caption(), $bhld_nhanvien_edit->tennhanvien->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_nhanvien_edit->dinhmuc->Required) { ?>
				elm = this.getElements("x" + infix + "_dinhmuc");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_nhanvien_edit->dinhmuc->caption(), $bhld_nhanvien_edit->dinhmuc->RequiredErrorMessage)) ?>");
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
	fbhld_nhanvienedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbhld_nhanvienedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fbhld_nhanvienedit.lists["x_mapb"] = <?php echo $bhld_nhanvien_edit->mapb->Lookup->toClientList($bhld_nhanvien_edit) ?>;
	fbhld_nhanvienedit.lists["x_mapb"].options = <?php echo JsonEncode($bhld_nhanvien_edit->mapb->lookupOptions()) ?>;
	fbhld_nhanvienedit.lists["x_dinhmuc"] = <?php echo $bhld_nhanvien_edit->dinhmuc->Lookup->toClientList($bhld_nhanvien_edit) ?>;
	fbhld_nhanvienedit.lists["x_dinhmuc"].options = <?php echo JsonEncode($bhld_nhanvien_edit->dinhmuc->lookupOptions()) ?>;
	loadjs.done("fbhld_nhanvienedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bhld_nhanvien_edit->showPageHeader(); ?>
<?php
$bhld_nhanvien_edit->showMessage();
?>
<form name="fbhld_nhanvienedit" id="fbhld_nhanvienedit" class="<?php echo $bhld_nhanvien_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_nhanvien">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$bhld_nhanvien_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($bhld_nhanvien_edit->mapb->Visible) { // mapb ?>
	<div id="r_mapb" class="form-group row">
		<label id="elh_bhld_nhanvien_mapb" for="x_mapb" class="<?php echo $bhld_nhanvien_edit->LeftColumnClass ?>"><?php echo $bhld_nhanvien_edit->mapb->caption() ?><?php echo $bhld_nhanvien_edit->mapb->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_nhanvien_edit->RightColumnClass ?>"><div <?php echo $bhld_nhanvien_edit->mapb->cellAttributes() ?>>
<span id="el_bhld_nhanvien_mapb">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="bhld_nhanvien" data-field="x_mapb" data-value-separator="<?php echo $bhld_nhanvien_edit->mapb->displayValueSeparatorAttribute() ?>" id="x_mapb" name="x_mapb"<?php echo $bhld_nhanvien_edit->mapb->editAttributes() ?>>
			<?php echo $bhld_nhanvien_edit->mapb->selectOptionListHtml("x_mapb") ?>
		</select>
</div>
<?php echo $bhld_nhanvien_edit->mapb->Lookup->getParamTag($bhld_nhanvien_edit, "p_x_mapb") ?>
</span>
<?php echo $bhld_nhanvien_edit->mapb->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_nhanvien_edit->manv->Visible) { // manv ?>
	<div id="r_manv" class="form-group row">
		<label id="elh_bhld_nhanvien_manv" for="x_manv" class="<?php echo $bhld_nhanvien_edit->LeftColumnClass ?>"><?php echo $bhld_nhanvien_edit->manv->caption() ?><?php echo $bhld_nhanvien_edit->manv->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_nhanvien_edit->RightColumnClass ?>"><div <?php echo $bhld_nhanvien_edit->manv->cellAttributes() ?>>
<input type="text" data-table="bhld_nhanvien" data-field="x_manv" name="x_manv" id="x_manv" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_nhanvien_edit->manv->getPlaceHolder()) ?>" value="<?php echo $bhld_nhanvien_edit->manv->EditValue ?>"<?php echo $bhld_nhanvien_edit->manv->editAttributes() ?>>
<input type="hidden" data-table="bhld_nhanvien" data-field="x_manv" name="o_manv" id="o_manv" value="<?php echo HtmlEncode($bhld_nhanvien_edit->manv->OldValue != null ? $bhld_nhanvien_edit->manv->OldValue : $bhld_nhanvien_edit->manv->CurrentValue) ?>">
<?php echo $bhld_nhanvien_edit->manv->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_nhanvien_edit->tennhanvien->Visible) { // tennhanvien ?>
	<div id="r_tennhanvien" class="form-group row">
		<label id="elh_bhld_nhanvien_tennhanvien" for="x_tennhanvien" class="<?php echo $bhld_nhanvien_edit->LeftColumnClass ?>"><?php echo $bhld_nhanvien_edit->tennhanvien->caption() ?><?php echo $bhld_nhanvien_edit->tennhanvien->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_nhanvien_edit->RightColumnClass ?>"><div <?php echo $bhld_nhanvien_edit->tennhanvien->cellAttributes() ?>>
<span id="el_bhld_nhanvien_tennhanvien">
<input type="text" data-table="bhld_nhanvien" data-field="x_tennhanvien" name="x_tennhanvien" id="x_tennhanvien" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_nhanvien_edit->tennhanvien->getPlaceHolder()) ?>" value="<?php echo $bhld_nhanvien_edit->tennhanvien->EditValue ?>"<?php echo $bhld_nhanvien_edit->tennhanvien->editAttributes() ?>>
</span>
<?php echo $bhld_nhanvien_edit->tennhanvien->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_nhanvien_edit->dinhmuc->Visible) { // dinhmuc ?>
	<div id="r_dinhmuc" class="form-group row">
		<label id="elh_bhld_nhanvien_dinhmuc" for="x_dinhmuc" class="<?php echo $bhld_nhanvien_edit->LeftColumnClass ?>"><?php echo $bhld_nhanvien_edit->dinhmuc->caption() ?><?php echo $bhld_nhanvien_edit->dinhmuc->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_nhanvien_edit->RightColumnClass ?>"><div <?php echo $bhld_nhanvien_edit->dinhmuc->cellAttributes() ?>>
<span id="el_bhld_nhanvien_dinhmuc">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="bhld_nhanvien" data-field="x_dinhmuc" data-value-separator="<?php echo $bhld_nhanvien_edit->dinhmuc->displayValueSeparatorAttribute() ?>" id="x_dinhmuc" name="x_dinhmuc"<?php echo $bhld_nhanvien_edit->dinhmuc->editAttributes() ?>>
			<?php echo $bhld_nhanvien_edit->dinhmuc->selectOptionListHtml("x_dinhmuc") ?>
		</select>
</div>
<?php echo $bhld_nhanvien_edit->dinhmuc->Lookup->getParamTag($bhld_nhanvien_edit, "p_x_dinhmuc") ?>
</span>
<?php echo $bhld_nhanvien_edit->dinhmuc->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$bhld_nhanvien_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $bhld_nhanvien_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bhld_nhanvien_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$bhld_nhanvien_edit->showPageFooter();
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
$bhld_nhanvien_edit->terminate();
?>
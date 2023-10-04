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
$bhld_ctdmuc_edit = new bhld_ctdmuc_edit();

// Run the page
$bhld_ctdmuc_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_ctdmuc_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbhld_ctdmucedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fbhld_ctdmucedit = currentForm = new ew.Form("fbhld_ctdmucedit", "edit");

	// Validate form
	fbhld_ctdmucedit.validate = function() {
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
			<?php if ($bhld_ctdmuc_edit->madm->Required) { ?>
				elm = this.getElements("x" + infix + "_madm");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctdmuc_edit->madm->caption(), $bhld_ctdmuc_edit->madm->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_ctdmuc_edit->mavt->Required) { ?>
				elm = this.getElements("x" + infix + "_mavt");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctdmuc_edit->mavt->caption(), $bhld_ctdmuc_edit->mavt->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_ctdmuc_edit->dmuc->Required) { ?>
				elm = this.getElements("x" + infix + "_dmuc");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_ctdmuc_edit->dmuc->caption(), $bhld_ctdmuc_edit->dmuc->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_dmuc");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($bhld_ctdmuc_edit->dmuc->errorMessage()) ?>");

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
	fbhld_ctdmucedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbhld_ctdmucedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fbhld_ctdmucedit.lists["x_mavt"] = <?php echo $bhld_ctdmuc_edit->mavt->Lookup->toClientList($bhld_ctdmuc_edit) ?>;
	fbhld_ctdmucedit.lists["x_mavt"].options = <?php echo JsonEncode($bhld_ctdmuc_edit->mavt->lookupOptions()) ?>;
	loadjs.done("fbhld_ctdmucedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bhld_ctdmuc_edit->showPageHeader(); ?>
<?php
$bhld_ctdmuc_edit->showMessage();
?>
<form name="fbhld_ctdmucedit" id="fbhld_ctdmucedit" class="<?php echo $bhld_ctdmuc_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_ctdmuc">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$bhld_ctdmuc_edit->IsModal ?>">
<?php if ($bhld_ctdmuc->getCurrentMasterTable() == "bhld_dmuc") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="bhld_dmuc">
<input type="hidden" name="fk_madm" value="<?php echo HtmlEncode($bhld_ctdmuc_edit->madm->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($bhld_ctdmuc_edit->madm->Visible) { // madm ?>
	<div id="r_madm" class="form-group row">
		<label id="elh_bhld_ctdmuc_madm" for="x_madm" class="<?php echo $bhld_ctdmuc_edit->LeftColumnClass ?>"><?php echo $bhld_ctdmuc_edit->madm->caption() ?><?php echo $bhld_ctdmuc_edit->madm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_ctdmuc_edit->RightColumnClass ?>"><div <?php echo $bhld_ctdmuc_edit->madm->cellAttributes() ?>>
<?php if ($bhld_ctdmuc_edit->madm->getSessionValue() != "") { ?>

<span id="el_bhld_ctdmuc_madm">
<span<?php echo $bhld_ctdmuc_edit->madm->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($bhld_ctdmuc_edit->madm->EditValue)) ?>"></span>
</span>

<input type="hidden" id="x_madm" name="x_madm" value="<?php echo HtmlEncode($bhld_ctdmuc_edit->madm->CurrentValue) ?>">
<?php } else { ?>

<input type="text" data-table="bhld_ctdmuc" data-field="x_madm" name="x_madm" id="x_madm" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_ctdmuc_edit->madm->getPlaceHolder()) ?>" value="<?php echo $bhld_ctdmuc_edit->madm->EditValue ?>"<?php echo $bhld_ctdmuc_edit->madm->editAttributes() ?>>

<?php } ?>

<input type="hidden" data-table="bhld_ctdmuc" data-field="x_madm" name="o_madm" id="o_madm" value="<?php echo HtmlEncode($bhld_ctdmuc_edit->madm->OldValue != null ? $bhld_ctdmuc_edit->madm->OldValue : $bhld_ctdmuc_edit->madm->CurrentValue) ?>">
<?php echo $bhld_ctdmuc_edit->madm->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_ctdmuc_edit->mavt->Visible) { // mavt ?>
	<div id="r_mavt" class="form-group row">
		<label id="elh_bhld_ctdmuc_mavt" for="x_mavt" class="<?php echo $bhld_ctdmuc_edit->LeftColumnClass ?>"><?php echo $bhld_ctdmuc_edit->mavt->caption() ?><?php echo $bhld_ctdmuc_edit->mavt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_ctdmuc_edit->RightColumnClass ?>"><div <?php echo $bhld_ctdmuc_edit->mavt->cellAttributes() ?>>
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="bhld_ctdmuc" data-field="x_mavt" data-value-separator="<?php echo $bhld_ctdmuc_edit->mavt->displayValueSeparatorAttribute() ?>" id="x_mavt" name="x_mavt"<?php echo $bhld_ctdmuc_edit->mavt->editAttributes() ?>>
			<?php echo $bhld_ctdmuc_edit->mavt->selectOptionListHtml("x_mavt") ?>
		</select>
</div>
<?php echo $bhld_ctdmuc_edit->mavt->Lookup->getParamTag($bhld_ctdmuc_edit, "p_x_mavt") ?>
<input type="hidden" data-table="bhld_ctdmuc" data-field="x_mavt" name="o_mavt" id="o_mavt" value="<?php echo HtmlEncode($bhld_ctdmuc_edit->mavt->OldValue != null ? $bhld_ctdmuc_edit->mavt->OldValue : $bhld_ctdmuc_edit->mavt->CurrentValue) ?>">
<?php echo $bhld_ctdmuc_edit->mavt->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_ctdmuc_edit->dmuc->Visible) { // dmuc ?>
	<div id="r_dmuc" class="form-group row">
		<label id="elh_bhld_ctdmuc_dmuc" for="x_dmuc" class="<?php echo $bhld_ctdmuc_edit->LeftColumnClass ?>"><?php echo $bhld_ctdmuc_edit->dmuc->caption() ?><?php echo $bhld_ctdmuc_edit->dmuc->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_ctdmuc_edit->RightColumnClass ?>"><div <?php echo $bhld_ctdmuc_edit->dmuc->cellAttributes() ?>>
<span id="el_bhld_ctdmuc_dmuc">
<input type="text" data-table="bhld_ctdmuc" data-field="x_dmuc" name="x_dmuc" id="x_dmuc" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_ctdmuc_edit->dmuc->getPlaceHolder()) ?>" value="<?php echo $bhld_ctdmuc_edit->dmuc->EditValue ?>"<?php echo $bhld_ctdmuc_edit->dmuc->editAttributes() ?>>
</span>
<?php echo $bhld_ctdmuc_edit->dmuc->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$bhld_ctdmuc_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $bhld_ctdmuc_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bhld_ctdmuc_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$bhld_ctdmuc_edit->showPageFooter();
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
$bhld_ctdmuc_edit->terminate();
?>
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
$bhld_dmuc_edit = new bhld_dmuc_edit();

// Run the page
$bhld_dmuc_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_dmuc_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbhld_dmucedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	fbhld_dmucedit = currentForm = new ew.Form("fbhld_dmucedit", "edit");

	// Validate form
	fbhld_dmucedit.validate = function() {
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
			<?php if ($bhld_dmuc_edit->madm->Required) { ?>
				elm = this.getElements("x" + infix + "_madm");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_dmuc_edit->madm->caption(), $bhld_dmuc_edit->madm->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_dmuc_edit->mota->Required) { ?>
				elm = this.getElements("x" + infix + "_mota");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_dmuc_edit->mota->caption(), $bhld_dmuc_edit->mota->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_dmuc_edit->ghichu->Required) { ?>
				elm = this.getElements("x" + infix + "_ghichu");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_dmuc_edit->ghichu->caption(), $bhld_dmuc_edit->ghichu->RequiredErrorMessage)) ?>");
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
	fbhld_dmucedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbhld_dmucedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fbhld_dmucedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bhld_dmuc_edit->showPageHeader(); ?>
<?php
$bhld_dmuc_edit->showMessage();
?>
<form name="fbhld_dmucedit" id="fbhld_dmucedit" class="<?php echo $bhld_dmuc_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_dmuc">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$bhld_dmuc_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($bhld_dmuc_edit->madm->Visible) { // madm ?>
	<div id="r_madm" class="form-group row">
		<label id="elh_bhld_dmuc_madm" for="x_madm" class="<?php echo $bhld_dmuc_edit->LeftColumnClass ?>"><?php echo $bhld_dmuc_edit->madm->caption() ?><?php echo $bhld_dmuc_edit->madm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_dmuc_edit->RightColumnClass ?>"><div <?php echo $bhld_dmuc_edit->madm->cellAttributes() ?>>
<input type="text" data-table="bhld_dmuc" data-field="x_madm" name="x_madm" id="x_madm" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_dmuc_edit->madm->getPlaceHolder()) ?>" value="<?php echo $bhld_dmuc_edit->madm->EditValue ?>"<?php echo $bhld_dmuc_edit->madm->editAttributes() ?>>
<input type="hidden" data-table="bhld_dmuc" data-field="x_madm" name="o_madm" id="o_madm" value="<?php echo HtmlEncode($bhld_dmuc_edit->madm->OldValue != null ? $bhld_dmuc_edit->madm->OldValue : $bhld_dmuc_edit->madm->CurrentValue) ?>">
<?php echo $bhld_dmuc_edit->madm->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_dmuc_edit->mota->Visible) { // mota ?>
	<div id="r_mota" class="form-group row">
		<label id="elh_bhld_dmuc_mota" for="x_mota" class="<?php echo $bhld_dmuc_edit->LeftColumnClass ?>"><?php echo $bhld_dmuc_edit->mota->caption() ?><?php echo $bhld_dmuc_edit->mota->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_dmuc_edit->RightColumnClass ?>"><div <?php echo $bhld_dmuc_edit->mota->cellAttributes() ?>>
<span id="el_bhld_dmuc_mota">
<input type="text" data-table="bhld_dmuc" data-field="x_mota" name="x_mota" id="x_mota" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_dmuc_edit->mota->getPlaceHolder()) ?>" value="<?php echo $bhld_dmuc_edit->mota->EditValue ?>"<?php echo $bhld_dmuc_edit->mota->editAttributes() ?>>
</span>
<?php echo $bhld_dmuc_edit->mota->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_dmuc_edit->ghichu->Visible) { // ghichu ?>
	<div id="r_ghichu" class="form-group row">
		<label id="elh_bhld_dmuc_ghichu" for="x_ghichu" class="<?php echo $bhld_dmuc_edit->LeftColumnClass ?>"><?php echo $bhld_dmuc_edit->ghichu->caption() ?><?php echo $bhld_dmuc_edit->ghichu->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_dmuc_edit->RightColumnClass ?>"><div <?php echo $bhld_dmuc_edit->ghichu->cellAttributes() ?>>
<span id="el_bhld_dmuc_ghichu">
<input type="text" data-table="bhld_dmuc" data-field="x_ghichu" name="x_ghichu" id="x_ghichu" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_dmuc_edit->ghichu->getPlaceHolder()) ?>" value="<?php echo $bhld_dmuc_edit->ghichu->EditValue ?>"<?php echo $bhld_dmuc_edit->ghichu->editAttributes() ?>>
</span>
<?php echo $bhld_dmuc_edit->ghichu->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("bhld_ctdmuc", explode(",", $bhld_dmuc->getCurrentDetailTable())) && $bhld_ctdmuc->DetailEdit) {
?>
<?php if ($bhld_dmuc->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("bhld_ctdmuc", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "bhld_ctdmucgrid.php" ?>
<?php } ?>
<?php if (!$bhld_dmuc_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $bhld_dmuc_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bhld_dmuc_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$bhld_dmuc_edit->showPageFooter();
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
$bhld_dmuc_edit->terminate();
?>
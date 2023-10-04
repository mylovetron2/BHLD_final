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
$bhld_dmuc_add = new bhld_dmuc_add();

// Run the page
$bhld_dmuc_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_dmuc_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbhld_dmucadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fbhld_dmucadd = currentForm = new ew.Form("fbhld_dmucadd", "add");

	// Validate form
	fbhld_dmucadd.validate = function() {
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
			<?php if ($bhld_dmuc_add->madm->Required) { ?>
				elm = this.getElements("x" + infix + "_madm");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_dmuc_add->madm->caption(), $bhld_dmuc_add->madm->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_dmuc_add->mota->Required) { ?>
				elm = this.getElements("x" + infix + "_mota");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_dmuc_add->mota->caption(), $bhld_dmuc_add->mota->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_dmuc_add->ghichu->Required) { ?>
				elm = this.getElements("x" + infix + "_ghichu");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_dmuc_add->ghichu->caption(), $bhld_dmuc_add->ghichu->RequiredErrorMessage)) ?>");
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
	fbhld_dmucadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbhld_dmucadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fbhld_dmucadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bhld_dmuc_add->showPageHeader(); ?>
<?php
$bhld_dmuc_add->showMessage();
?>
<form name="fbhld_dmucadd" id="fbhld_dmucadd" class="<?php echo $bhld_dmuc_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_dmuc">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$bhld_dmuc_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($bhld_dmuc_add->madm->Visible) { // madm ?>
	<div id="r_madm" class="form-group row">
		<label id="elh_bhld_dmuc_madm" for="x_madm" class="<?php echo $bhld_dmuc_add->LeftColumnClass ?>"><?php echo $bhld_dmuc_add->madm->caption() ?><?php echo $bhld_dmuc_add->madm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_dmuc_add->RightColumnClass ?>"><div <?php echo $bhld_dmuc_add->madm->cellAttributes() ?>>
<span id="el_bhld_dmuc_madm">
<input type="text" data-table="bhld_dmuc" data-field="x_madm" name="x_madm" id="x_madm" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($bhld_dmuc_add->madm->getPlaceHolder()) ?>" value="<?php echo $bhld_dmuc_add->madm->EditValue ?>"<?php echo $bhld_dmuc_add->madm->editAttributes() ?>>
</span>
<?php echo $bhld_dmuc_add->madm->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_dmuc_add->mota->Visible) { // mota ?>
	<div id="r_mota" class="form-group row">
		<label id="elh_bhld_dmuc_mota" for="x_mota" class="<?php echo $bhld_dmuc_add->LeftColumnClass ?>"><?php echo $bhld_dmuc_add->mota->caption() ?><?php echo $bhld_dmuc_add->mota->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_dmuc_add->RightColumnClass ?>"><div <?php echo $bhld_dmuc_add->mota->cellAttributes() ?>>
<span id="el_bhld_dmuc_mota">
<input type="text" data-table="bhld_dmuc" data-field="x_mota" name="x_mota" id="x_mota" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_dmuc_add->mota->getPlaceHolder()) ?>" value="<?php echo $bhld_dmuc_add->mota->EditValue ?>"<?php echo $bhld_dmuc_add->mota->editAttributes() ?>>
</span>
<?php echo $bhld_dmuc_add->mota->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_dmuc_add->ghichu->Visible) { // ghichu ?>
	<div id="r_ghichu" class="form-group row">
		<label id="elh_bhld_dmuc_ghichu" for="x_ghichu" class="<?php echo $bhld_dmuc_add->LeftColumnClass ?>"><?php echo $bhld_dmuc_add->ghichu->caption() ?><?php echo $bhld_dmuc_add->ghichu->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_dmuc_add->RightColumnClass ?>"><div <?php echo $bhld_dmuc_add->ghichu->cellAttributes() ?>>
<span id="el_bhld_dmuc_ghichu">
<input type="text" data-table="bhld_dmuc" data-field="x_ghichu" name="x_ghichu" id="x_ghichu" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_dmuc_add->ghichu->getPlaceHolder()) ?>" value="<?php echo $bhld_dmuc_add->ghichu->EditValue ?>"<?php echo $bhld_dmuc_add->ghichu->editAttributes() ?>>
</span>
<?php echo $bhld_dmuc_add->ghichu->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("bhld_ctdmuc", explode(",", $bhld_dmuc->getCurrentDetailTable())) && $bhld_ctdmuc->DetailAdd) {
?>
<?php if ($bhld_dmuc->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("bhld_ctdmuc", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "bhld_ctdmucgrid.php" ?>
<?php } ?>
<?php if (!$bhld_dmuc_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $bhld_dmuc_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bhld_dmuc_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$bhld_dmuc_add->showPageFooter();
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
$bhld_dmuc_add->terminate();
?>
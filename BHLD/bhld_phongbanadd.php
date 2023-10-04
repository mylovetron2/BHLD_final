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
$bhld_phongban_add = new bhld_phongban_add();

// Run the page
$bhld_phongban_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$bhld_phongban_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbhld_phongbanadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	fbhld_phongbanadd = currentForm = new ew.Form("fbhld_phongbanadd", "add");

	// Validate form
	fbhld_phongbanadd.validate = function() {
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
			<?php if ($bhld_phongban_add->mapb->Required) { ?>
				elm = this.getElements("x" + infix + "_mapb");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_phongban_add->mapb->caption(), $bhld_phongban_add->mapb->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($bhld_phongban_add->tenphong->Required) { ?>
				elm = this.getElements("x" + infix + "_tenphong");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $bhld_phongban_add->tenphong->caption(), $bhld_phongban_add->tenphong->RequiredErrorMessage)) ?>");
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
	fbhld_phongbanadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fbhld_phongbanadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("fbhld_phongbanadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $bhld_phongban_add->showPageHeader(); ?>
<?php
$bhld_phongban_add->showMessage();
?>
<form name="fbhld_phongbanadd" id="fbhld_phongbanadd" class="<?php echo $bhld_phongban_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="bhld_phongban">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$bhld_phongban_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($bhld_phongban_add->mapb->Visible) { // mapb ?>
	<div id="r_mapb" class="form-group row">
		<label id="elh_bhld_phongban_mapb" for="x_mapb" class="<?php echo $bhld_phongban_add->LeftColumnClass ?>"><?php echo $bhld_phongban_add->mapb->caption() ?><?php echo $bhld_phongban_add->mapb->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_phongban_add->RightColumnClass ?>"><div <?php echo $bhld_phongban_add->mapb->cellAttributes() ?>>
<span id="el_bhld_phongban_mapb">
<input type="text" data-table="bhld_phongban" data-field="x_mapb" name="x_mapb" id="x_mapb" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_phongban_add->mapb->getPlaceHolder()) ?>" value="<?php echo $bhld_phongban_add->mapb->EditValue ?>"<?php echo $bhld_phongban_add->mapb->editAttributes() ?>>
</span>
<?php echo $bhld_phongban_add->mapb->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($bhld_phongban_add->tenphong->Visible) { // tenphong ?>
	<div id="r_tenphong" class="form-group row">
		<label id="elh_bhld_phongban_tenphong" for="x_tenphong" class="<?php echo $bhld_phongban_add->LeftColumnClass ?>"><?php echo $bhld_phongban_add->tenphong->caption() ?><?php echo $bhld_phongban_add->tenphong->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $bhld_phongban_add->RightColumnClass ?>"><div <?php echo $bhld_phongban_add->tenphong->cellAttributes() ?>>
<span id="el_bhld_phongban_tenphong">
<input type="text" data-table="bhld_phongban" data-field="x_tenphong" name="x_tenphong" id="x_tenphong" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($bhld_phongban_add->tenphong->getPlaceHolder()) ?>" value="<?php echo $bhld_phongban_add->tenphong->EditValue ?>"<?php echo $bhld_phongban_add->tenphong->editAttributes() ?>>
</span>
<?php echo $bhld_phongban_add->tenphong->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$bhld_phongban_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $bhld_phongban_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $bhld_phongban_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$bhld_phongban_add->showPageFooter();
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
$bhld_phongban_add->terminate();
?>
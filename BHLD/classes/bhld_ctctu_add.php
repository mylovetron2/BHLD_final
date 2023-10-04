<?php
namespace PHPMaker2020\projectBHLD;

/**
 * Page class
 */
class bhld_ctctu_add extends bhld_ctctu
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{1DE41E66-CD1F-4379-A8DD-99D0FBA14385}";

	// Table name
	public $TableName = 'bhld_ctctu';

	// Page object name
	public $PageObjName = "bhld_ctctu_add";

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken;

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading != "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading != "")
			return $this->Subheading;
		if ($this->TableName)
			return $Language->phrase($this->PageID);
		return "";
	}

	// Page name
	public function pageName()
	{
		return CurrentPageName();
	}

	// Page URL
	public function pageUrl()
	{
		$url = CurrentPageName() . "?";
		if ($this->UseTokenInUrl)
			$url .= "t=" . $this->TableVar . "&"; // Add page token
		return $url;
	}

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

	// Get message
	public function getMessage()
	{
		return isset($_SESSION[SESSION_MESSAGE]) ? $_SESSION[SESSION_MESSAGE] : $this->_message;
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($this->_message, $v);
		$_SESSION[SESSION_MESSAGE] = $this->_message;
	}

	// Get failure message
	public function getFailureMessage()
	{
		return isset($_SESSION[SESSION_FAILURE_MESSAGE]) ? $_SESSION[SESSION_FAILURE_MESSAGE] : $this->_failureMessage;
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($this->_failureMessage, $v);
		$_SESSION[SESSION_FAILURE_MESSAGE] = $this->_failureMessage;
	}

	// Get success message
	public function getSuccessMessage()
	{
		return isset($_SESSION[SESSION_SUCCESS_MESSAGE]) ? $_SESSION[SESSION_SUCCESS_MESSAGE] : $this->_successMessage;
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($this->_successMessage, $v);
		$_SESSION[SESSION_SUCCESS_MESSAGE] = $this->_successMessage;
	}

	// Get warning message
	public function getWarningMessage()
	{
		return isset($_SESSION[SESSION_WARNING_MESSAGE]) ? $_SESSION[SESSION_WARNING_MESSAGE] : $this->_warningMessage;
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($this->_warningMessage, $v);
		$_SESSION[SESSION_WARNING_MESSAGE] = $this->_warningMessage;
	}

	// Clear message
	public function clearMessage()
	{
		$this->_message = "";
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$this->_failureMessage = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$this->_successMessage = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$this->_warningMessage = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Clear messages
	public function clearMessages()
	{
		$this->clearMessage();
		$this->clearFailureMessage();
		$this->clearSuccessMessage();
		$this->clearWarningMessage();
	}

	// Show message
	public function showMessage()
	{
		$hidden = TRUE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message != "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fas fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage != "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fas fa-exclamation"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage != "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fas fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage != "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fas fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessages()
	{
		$ar = [];

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message != "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage != "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage != "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage != "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header != "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer != "") { // Footer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
		}
	}

	// Validate page request
	protected function isPageRequest()
	{
		global $CurrentForm;
		if ($this->UseTokenInUrl) {
			if ($CurrentForm)
				return ($this->TableVar == $CurrentForm->getValue("t"));
			if (Get("t") !== NULL)
				return ($this->TableVar == Get("t"));
		}
		return TRUE;
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(Config("TOKEN_NAME")) === NULL)
			return FALSE;
		$fn = Config("CHECK_TOKEN_FUNC");
		if (is_callable($fn))
			return $fn(Post(Config("TOKEN_NAME")), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = Config("CREATE_TOKEN_FUNC"); // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $DashboardReport;

		// Check token
		$this->CheckToken = Config("CHECK_TOKEN");

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (bhld_ctctu)
		if (!isset($GLOBALS["bhld_ctctu"]) || get_class($GLOBALS["bhld_ctctu"]) == PROJECT_NAMESPACE . "bhld_ctctu") {
			$GLOBALS["bhld_ctctu"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["bhld_ctctu"];
		}

		// Table object (bhld_ctu)
		if (!isset($GLOBALS['bhld_ctu']))
			$GLOBALS['bhld_ctu'] = new bhld_ctu();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'bhld_ctctu');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = $this->getConnection();
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages, $DashboardReport;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $bhld_ctctu;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($bhld_ctctu);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessages()));
			return;
		}

		// Go to URL if specified
		if ($url != "") {
			if (!Config("DEBUG") && ob_get_length())
				ob_end_clean();

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = ["url" => $url, "modal" => "1"];
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "bhld_ctctuview.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				WriteJson($row);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = [];
		if (is_object($rs)) { // Recordset
			while ($rs && !$rs->EOF) {
				$this->loadRowValues($rs); // Set up DbValue/CurrentValue
				$row = $this->getRecordFromArray($rs->fields);
				if ($current)
					return $row;
				else
					$rows[] = $row;
				$rs->moveNext();
			}
		} elseif (is_array($rs)) {
			foreach ($rs as $ar) {
				$row = $this->getRecordFromArray($ar);
				if ($current)
					return $row;
				else
					$rows[] = $row;
			}
		}
		return $rows;
	}

	// Get record from array
	protected function getRecordFromArray($ar)
	{
		$row = [];
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {
								$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
									Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
									Config("API_FIELD_NAME") . "=" . $fld->Param . "&" .
									Config("API_KEY_NAME") . "=" . rawurlencode($this->getRecordKeyValue($ar)))); //*** need to add this? API may not be in the same folder
								$row[$fldname] = ["type" => ContentType($val), "url" => $url, "name" => $fld->Param . ContentExtension($val)];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, Config("MULTIPLE_UPLOAD_SEPARATOR"))) { // Single file
								$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
									Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
									"fn=" . Encrypt($fld->physicalUploadPath() . $val)));
								$row[$fldname] = ["type" => MimeContentType($val), "url" => $url, "name" => $val];
							} else { // Multiple files
								$files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
								$ar = [];
								foreach ($files as $file) {
									$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
										Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
										"fn=" . Encrypt($fld->physicalUploadPath() . $file)));
									if (!EmptyValue($file))
										$ar[] = ["type" => MimeContentType($file), "url" => $url, "name" => $file];
								}
								$row[$fldname] = $ar;
							}
						}
					} else {
						$row[$fldname] = $val;
					}
				}
			}
		}
		return $row;
	}

	// Get record key value from array
	protected function getRecordKeyValue($ar)
	{
		$key = "";
		if (is_array($ar)) {
			$key .= @$ar['mact'] . Config("COMPOSITE_KEY_SEPARATOR");
			$key .= @$ar['mavt'];
		}
		return $key;
	}

	/**
	 * Hide fields for add/edit
	 *
	 * @return void
	 */
	protected function hideFieldsForAddEdit()
	{
	}

	// Lookup data
	public function lookup()
	{
		global $Language, $Security;
		if (!isset($Language))
			$Language = new Language(Config("LANGUAGE_FOLDER"), Post("language", ""));

		// Set up API request
		if (!ValidApiRequest())
			return FALSE;
		$this->setupApiSecurity();

		// Get lookup object
		$fieldName = Post("field");
		if (!array_key_exists($fieldName, $this->fields))
			return FALSE;
		$lookupField = $this->fields[$fieldName];
		$lookup = $lookupField->Lookup;
		if ($lookup === NULL)
			return FALSE;

		// Get lookup parameters
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Param("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = Config("AUTO_SUGGEST_MAX_ENTRIES");
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));
		$keys = Post("keys");
		$lookup->LookupType = $lookupType; // Lookup type
		if ($keys !== NULL) { // Selected records from modal
			if (is_array($keys))
				$keys = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $keys);
			$lookup->FilterFields = []; // Skip parent fields if any
			$lookup->FilterValues[] = $keys; // Lookup values
			$pageSize = -1; // Show all records
		} else { // Lookup values
			$lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
		}
		$cnt = is_array($lookup->FilterFields) ? count($lookup->FilterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = Post("v" . $i, "");
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect != "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter != "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy != "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson($this); // Use settings from current page
	}

	// Set up API security
	public function setupApiSecurity()
	{
		global $Security;

		// Setup security for API request
	}
	public $FormClassName = "ew-horizontal ew-form ew-add-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRecord;
	public $Priv = 0;
	public $OldRecordset;
	public $CopyRecord;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
		} else {
			$Security = new AdvancedSecurity();
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->mact->setVisibility();
		$this->mavt->setVisibility();
		$this->ngnhan->setVisibility();
		$this->sl->setVisibility();
		$this->ngnhantt->setVisibility();
		$this->dmtg->setVisibility();
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();

		// Set up lookup cache
		// Check modal

		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-add-form ew-horizontal";
		$postBack = FALSE;

		// Set up current action
		if (IsApi()) {
			$this->CurrentAction = "insert"; // Add record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get form action
			$postBack = TRUE;
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (Get("mact") !== NULL) {
				$this->mact->setQueryStringValue(Get("mact"));
				$this->setKey("mact", $this->mact->CurrentValue); // Set up key
			} else {
				$this->setKey("mact", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if (Get("mavt") !== NULL) {
				$this->mavt->setQueryStringValue(Get("mavt"));
				$this->setKey("mavt", $this->mavt->CurrentValue); // Set up key
			} else {
				$this->setKey("mavt", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$this->CurrentAction = "copy"; // Copy record
			} else {
				$this->CurrentAction = "show"; // Display blank record
			}
		}

		// Load old record / default values
		$loaded = $this->loadOldRecord();

		// Set up master/detail parameters
		// NOTE: must be after loadOldRecord to prevent master key values overwritten

		$this->setupMasterParms();

		// Load form values
		if ($postBack) {
			$this->loadFormValues(); // Load form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues(); // Restore form values
				$this->setFailureMessage($FormError);
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = "show"; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "copy": // Copy an existing record
				if (!$loaded) { // Record not loaded
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("bhld_ctctulist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "bhld_ctctulist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "bhld_ctctuview.php")
						$returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
					if (IsApi()) { // Return to caller
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl);
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Add failed, restore form values
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render row based on row type
		$this->RowType = ROWTYPE_ADD; // Render add type

		// Render row
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->mact->CurrentValue = NULL;
		$this->mact->OldValue = $this->mact->CurrentValue;
		$this->mavt->CurrentValue = NULL;
		$this->mavt->OldValue = $this->mavt->CurrentValue;
		$this->ngnhan->CurrentValue = NULL;
		$this->ngnhan->OldValue = $this->ngnhan->CurrentValue;
		$this->sl->CurrentValue = NULL;
		$this->sl->OldValue = $this->sl->CurrentValue;
		$this->ngnhantt->CurrentValue = NULL;
		$this->ngnhantt->OldValue = $this->ngnhantt->CurrentValue;
		$this->dmtg->CurrentValue = NULL;
		$this->dmtg->OldValue = $this->dmtg->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'mact' first before field var 'x_mact'
		$val = $CurrentForm->hasValue("mact") ? $CurrentForm->getValue("mact") : $CurrentForm->getValue("x_mact");
		if (!$this->mact->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->mact->Visible = FALSE; // Disable update for API request
			else
				$this->mact->setFormValue($val);
		}

		// Check field name 'mavt' first before field var 'x_mavt'
		$val = $CurrentForm->hasValue("mavt") ? $CurrentForm->getValue("mavt") : $CurrentForm->getValue("x_mavt");
		if (!$this->mavt->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->mavt->Visible = FALSE; // Disable update for API request
			else
				$this->mavt->setFormValue($val);
		}

		// Check field name 'ngnhan' first before field var 'x_ngnhan'
		$val = $CurrentForm->hasValue("ngnhan") ? $CurrentForm->getValue("ngnhan") : $CurrentForm->getValue("x_ngnhan");
		if (!$this->ngnhan->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ngnhan->Visible = FALSE; // Disable update for API request
			else
				$this->ngnhan->setFormValue($val);
			$this->ngnhan->CurrentValue = UnFormatDateTime($this->ngnhan->CurrentValue, 0);
		}

		// Check field name 'sl' first before field var 'x_sl'
		$val = $CurrentForm->hasValue("sl") ? $CurrentForm->getValue("sl") : $CurrentForm->getValue("x_sl");
		if (!$this->sl->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->sl->Visible = FALSE; // Disable update for API request
			else
				$this->sl->setFormValue($val);
		}

		// Check field name 'ngnhantt' first before field var 'x_ngnhantt'
		$val = $CurrentForm->hasValue("ngnhantt") ? $CurrentForm->getValue("ngnhantt") : $CurrentForm->getValue("x_ngnhantt");
		if (!$this->ngnhantt->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ngnhantt->Visible = FALSE; // Disable update for API request
			else
				$this->ngnhantt->setFormValue($val);
			$this->ngnhantt->CurrentValue = UnFormatDateTime($this->ngnhantt->CurrentValue, 0);
		}

		// Check field name 'dmtg' first before field var 'x_dmtg'
		$val = $CurrentForm->hasValue("dmtg") ? $CurrentForm->getValue("dmtg") : $CurrentForm->getValue("x_dmtg");
		if (!$this->dmtg->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->dmtg->Visible = FALSE; // Disable update for API request
			else
				$this->dmtg->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->mact->CurrentValue = $this->mact->FormValue;
		$this->mavt->CurrentValue = $this->mavt->FormValue;
		$this->ngnhan->CurrentValue = $this->ngnhan->FormValue;
		$this->ngnhan->CurrentValue = UnFormatDateTime($this->ngnhan->CurrentValue, 0);
		$this->sl->CurrentValue = $this->sl->FormValue;
		$this->ngnhantt->CurrentValue = $this->ngnhantt->FormValue;
		$this->ngnhantt->CurrentValue = UnFormatDateTime($this->ngnhantt->CurrentValue, 0);
		$this->dmtg->CurrentValue = $this->dmtg->FormValue;
	}

	// Load row based on key values
	public function loadRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();

		// Call Row Selecting event
		$this->Row_Selecting($filter);

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$res = FALSE;
		$rs = LoadRecordset($sql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->loadRowValues($rs); // Load row values
			$rs->close();
		}
		return $res;
	}

	// Load row values from recordset
	public function loadRowValues($rs = NULL)
	{
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->newRow();

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
		$this->mact->setDbValue($row['mact']);
		$this->mavt->setDbValue($row['mavt']);
		$this->ngnhan->setDbValue($row['ngnhan']);
		$this->sl->setDbValue($row['sl']);
		$this->ngnhantt->setDbValue($row['ngnhantt']);
		$this->dmtg->setDbValue($row['dmtg']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['mact'] = $this->mact->CurrentValue;
		$row['mavt'] = $this->mavt->CurrentValue;
		$row['ngnhan'] = $this->ngnhan->CurrentValue;
		$row['sl'] = $this->sl->CurrentValue;
		$row['ngnhantt'] = $this->ngnhantt->CurrentValue;
		$row['dmtg'] = $this->dmtg->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("mact")) != "")
			$this->mact->OldValue = $this->getKey("mact"); // mact
		else
			$validKey = FALSE;
		if (strval($this->getKey("mavt")) != "")
			$this->mavt->OldValue = $this->getKey("mavt"); // mavt
		else
			$validKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = $this->getConnection();
			$this->OldRecordset = LoadRecordset($sql, $conn);
		}
		$this->loadRowValues($this->OldRecordset); // Load row values
		return $validKey;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// mact
		// mavt
		// ngnhan
		// sl
		// ngnhantt
		// dmtg

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// mact
			$this->mact->ViewValue = $this->mact->CurrentValue;
			$this->mact->ViewCustomAttributes = "";

			// mavt
			$this->mavt->ViewValue = $this->mavt->CurrentValue;
			$this->mavt->ViewValue = FormatNumber($this->mavt->ViewValue, 0, -2, -2, -2);
			$this->mavt->ViewCustomAttributes = "";

			// ngnhan
			$this->ngnhan->ViewValue = $this->ngnhan->CurrentValue;
			$this->ngnhan->ViewValue = FormatDateTime($this->ngnhan->ViewValue, 0);
			$this->ngnhan->ViewCustomAttributes = "";

			// sl
			$this->sl->ViewValue = $this->sl->CurrentValue;
			$this->sl->ViewValue = FormatNumber($this->sl->ViewValue, 0, -2, -2, -2);
			$this->sl->ViewCustomAttributes = "";

			// ngnhantt
			$this->ngnhantt->ViewValue = $this->ngnhantt->CurrentValue;
			$this->ngnhantt->ViewValue = FormatDateTime($this->ngnhantt->ViewValue, 0);
			$this->ngnhantt->ViewCustomAttributes = "";

			// dmtg
			$this->dmtg->ViewValue = $this->dmtg->CurrentValue;
			$this->dmtg->ViewValue = FormatNumber($this->dmtg->ViewValue, 0, -2, -2, -2);
			$this->dmtg->ViewCustomAttributes = "";

			// mact
			$this->mact->LinkCustomAttributes = "";
			$this->mact->HrefValue = "";
			$this->mact->TooltipValue = "";

			// mavt
			$this->mavt->LinkCustomAttributes = "";
			$this->mavt->HrefValue = "";
			$this->mavt->TooltipValue = "";

			// ngnhan
			$this->ngnhan->LinkCustomAttributes = "";
			$this->ngnhan->HrefValue = "";
			$this->ngnhan->TooltipValue = "";

			// sl
			$this->sl->LinkCustomAttributes = "";
			$this->sl->HrefValue = "";
			$this->sl->TooltipValue = "";

			// ngnhantt
			$this->ngnhantt->LinkCustomAttributes = "";
			$this->ngnhantt->HrefValue = "";
			$this->ngnhantt->TooltipValue = "";

			// dmtg
			$this->dmtg->LinkCustomAttributes = "";
			$this->dmtg->HrefValue = "";
			$this->dmtg->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// mact
			$this->mact->EditAttrs["class"] = "form-control";
			$this->mact->EditCustomAttributes = "";
			if ($this->mact->getSessionValue() != "") {
				$this->mact->CurrentValue = $this->mact->getSessionValue();
				$this->mact->ViewValue = $this->mact->CurrentValue;
				$this->mact->ViewCustomAttributes = "";
			} else {
				if (!$this->mact->Raw)
					$this->mact->CurrentValue = HtmlDecode($this->mact->CurrentValue);
				$this->mact->EditValue = HtmlEncode($this->mact->CurrentValue);
				$this->mact->PlaceHolder = RemoveHtml($this->mact->caption());
			}

			// mavt
			$this->mavt->EditAttrs["class"] = "form-control";
			$this->mavt->EditCustomAttributes = "";
			$this->mavt->EditValue = HtmlEncode($this->mavt->CurrentValue);
			$this->mavt->PlaceHolder = RemoveHtml($this->mavt->caption());

			// ngnhan
			$this->ngnhan->EditAttrs["class"] = "form-control";
			$this->ngnhan->EditCustomAttributes = "";
			$this->ngnhan->EditValue = HtmlEncode(FormatDateTime($this->ngnhan->CurrentValue, 8));
			$this->ngnhan->PlaceHolder = RemoveHtml($this->ngnhan->caption());

			// sl
			$this->sl->EditAttrs["class"] = "form-control";
			$this->sl->EditCustomAttributes = "";
			$this->sl->EditValue = HtmlEncode($this->sl->CurrentValue);
			$this->sl->PlaceHolder = RemoveHtml($this->sl->caption());

			// ngnhantt
			$this->ngnhantt->EditAttrs["class"] = "form-control";
			$this->ngnhantt->EditCustomAttributes = "";
			$this->ngnhantt->EditValue = HtmlEncode(FormatDateTime($this->ngnhantt->CurrentValue, 8));
			$this->ngnhantt->PlaceHolder = RemoveHtml($this->ngnhantt->caption());

			// dmtg
			$this->dmtg->EditAttrs["class"] = "form-control";
			$this->dmtg->EditCustomAttributes = "";
			$this->dmtg->EditValue = HtmlEncode($this->dmtg->CurrentValue);
			$this->dmtg->PlaceHolder = RemoveHtml($this->dmtg->caption());

			// Add refer script
			// mact

			$this->mact->LinkCustomAttributes = "";
			$this->mact->HrefValue = "";

			// mavt
			$this->mavt->LinkCustomAttributes = "";
			$this->mavt->HrefValue = "";

			// ngnhan
			$this->ngnhan->LinkCustomAttributes = "";
			$this->ngnhan->HrefValue = "";

			// sl
			$this->sl->LinkCustomAttributes = "";
			$this->sl->HrefValue = "";

			// ngnhantt
			$this->ngnhantt->LinkCustomAttributes = "";
			$this->ngnhantt->HrefValue = "";

			// dmtg
			$this->dmtg->LinkCustomAttributes = "";
			$this->dmtg->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return ($FormError == "");
		if ($this->mact->Required) {
			if (!$this->mact->IsDetailKey && $this->mact->FormValue != NULL && $this->mact->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mact->caption(), $this->mact->RequiredErrorMessage));
			}
		}
		if ($this->mavt->Required) {
			if (!$this->mavt->IsDetailKey && $this->mavt->FormValue != NULL && $this->mavt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mavt->caption(), $this->mavt->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->mavt->FormValue)) {
			AddMessage($FormError, $this->mavt->errorMessage());
		}
		if ($this->ngnhan->Required) {
			if (!$this->ngnhan->IsDetailKey && $this->ngnhan->FormValue != NULL && $this->ngnhan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ngnhan->caption(), $this->ngnhan->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ngnhan->FormValue)) {
			AddMessage($FormError, $this->ngnhan->errorMessage());
		}
		if ($this->sl->Required) {
			if (!$this->sl->IsDetailKey && $this->sl->FormValue != NULL && $this->sl->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sl->caption(), $this->sl->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->sl->FormValue)) {
			AddMessage($FormError, $this->sl->errorMessage());
		}
		if ($this->ngnhantt->Required) {
			if (!$this->ngnhantt->IsDetailKey && $this->ngnhantt->FormValue != NULL && $this->ngnhantt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ngnhantt->caption(), $this->ngnhantt->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ngnhantt->FormValue)) {
			AddMessage($FormError, $this->ngnhantt->errorMessage());
		}
		if ($this->dmtg->Required) {
			if (!$this->dmtg->IsDetailKey && $this->dmtg->FormValue != NULL && $this->dmtg->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->dmtg->caption(), $this->dmtg->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->dmtg->FormValue)) {
			AddMessage($FormError, $this->dmtg->errorMessage());
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError != "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;

		// Check referential integrity for master table 'bhld_ctctu'
		$validMasterRecord = TRUE;
		$masterFilter = $this->sqlMasterFilter_bhld_ctu();
		if (strval($this->mact->CurrentValue) != "") {
			$masterFilter = str_replace("@mact@", AdjustSql($this->mact->CurrentValue, "DB"), $masterFilter);
		} else {
			$validMasterRecord = FALSE;
		}
		if ($validMasterRecord) {
			if (!isset($GLOBALS["bhld_ctu"]))
				$GLOBALS["bhld_ctu"] = new bhld_ctu();
			$rsmaster = $GLOBALS["bhld_ctu"]->loadRs($masterFilter);
			$validMasterRecord = ($rsmaster && !$rsmaster->EOF);
			$rsmaster->close();
		}
		if (!$validMasterRecord) {
			$relatedRecordMsg = str_replace("%t", "bhld_ctu", $Language->phrase("RelatedRecordRequired"));
			$this->setFailureMessage($relatedRecordMsg);
			return FALSE;
		}
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// mact
		$this->mact->setDbValueDef($rsnew, $this->mact->CurrentValue, "", FALSE);

		// mavt
		$this->mavt->setDbValueDef($rsnew, $this->mavt->CurrentValue, 0, FALSE);

		// ngnhan
		$this->ngnhan->setDbValueDef($rsnew, UnFormatDateTime($this->ngnhan->CurrentValue, 0), CurrentDate(), FALSE);

		// sl
		$this->sl->setDbValueDef($rsnew, $this->sl->CurrentValue, 0, FALSE);

		// ngnhantt
		$this->ngnhantt->setDbValueDef($rsnew, UnFormatDateTime($this->ngnhantt->CurrentValue, 0), CurrentDate(), FALSE);

		// dmtg
		$this->dmtg->setDbValueDef($rsnew, $this->dmtg->CurrentValue, 0, FALSE);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);

		// Check if key value entered
		if ($insertRow && $this->ValidateKey && strval($rsnew['mact']) == "") {
			$this->setFailureMessage($Language->phrase("InvalidKeyValue"));
			$insertRow = FALSE;
		}

		// Check if key value entered
		if ($insertRow && $this->ValidateKey && strval($rsnew['mavt']) == "") {
			$this->setFailureMessage($Language->phrase("InvalidKeyValue"));
			$insertRow = FALSE;
		}

		// Check for duplicate key
		if ($insertRow && $this->ValidateKey) {
			$filter = $this->getRecordFilter($rsnew);
			$rsChk = $this->loadRs($filter);
			if ($rsChk && !$rsChk->EOF) {
				$keyErrMsg = str_replace("%f", $filter, $Language->phrase("DupKey"));
				$this->setFailureMessage($keyErrMsg);
				$rsChk->close();
				$insertRow = FALSE;
			}
		}
		if ($insertRow) {
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = "";
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage != "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("InsertCancelled"));
			}
			$addRow = FALSE;
		}
		if ($addRow) {

			// Call Row Inserted event
			$rs = ($rsold) ? $rsold->fields : NULL;
			$this->Row_Inserted($rs, $rsnew);
		}

		// Clean upload path if any
		if ($addRow) {
		}

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
	}

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{
		$validMaster = FALSE;

		// Get the keys for master table
		if (($master = Get(Config("TABLE_SHOW_MASTER"), Get(Config("TABLE_MASTER")))) !== NULL) {
			$masterTblVar = $master;
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "bhld_ctu") {
				$validMaster = TRUE;
				if (($parm = Get("fk_mact", Get("mact"))) !== NULL) {
					$GLOBALS["bhld_ctu"]->mact->setQueryStringValue($parm);
					$this->mact->setQueryStringValue($GLOBALS["bhld_ctu"]->mact->QueryStringValue);
					$this->mact->setSessionValue($this->mact->QueryStringValue);
				} else {
					$validMaster = FALSE;
				}
			}
		} elseif (($master = Post(Config("TABLE_SHOW_MASTER"), Post(Config("TABLE_MASTER")))) !== NULL) {
			$masterTblVar = $master;
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "bhld_ctu") {
				$validMaster = TRUE;
				if (($parm = Post("fk_mact", Post("mact"))) !== NULL) {
					$GLOBALS["bhld_ctu"]->mact->setFormValue($parm);
					$this->mact->setFormValue($GLOBALS["bhld_ctu"]->mact->FormValue);
					$this->mact->setSessionValue($this->mact->FormValue);
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRecord = 1;
				$this->setStartRecordNumber($this->StartRecord);
			}

			// Clear previous master key from Session
			if ($masterTblVar != "bhld_ctu") {
				if ($this->mact->CurrentValue == "")
					$this->mact->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("bhld_ctctulist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// Get default connection and filter
			$conn = $this->getConnection();
			$lookupFilter = "";

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL and connection
			switch ($fld->FieldVar) {
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql != "" && count($fld->Lookup->Options) == 0) {
				$totalCnt = $this->getRecordCount($sql, $conn);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
} // End class
?>
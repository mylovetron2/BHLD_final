<?php namespace PHPMaker2020\projectBHLD; ?>
<?php

/**
 * Table class for bhld_view_chungtu_danhan_theothang
 */
class bhld_view_chungtu_danhan_theothang extends DbTable
{
	protected $SqlFrom = "";
	protected $SqlSelect = "";
	protected $SqlSelectList = "";
	protected $SqlWhere = "";
	protected $SqlGroupBy = "";
	protected $SqlHaving = "";
	protected $SqlOrderBy = "";
	public $UseSessionForListSql = TRUE;

	// Column CSS classes
	public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
	public $RightColumnClass = "col-sm-10";
	public $OffsetColumnClass = "col-sm-10 offset-sm-2";
	public $TableLeftColumnClass = "w-col-2";

	// Export
	public $ExportDoc;

	// Fields
	public $ngnhan;
	public $mact;
	public $mapb;
	public $manv;
	public $mavt;
	public $sl;
	public $ngnhantt;
	public $dmtg;
	public $detail;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'bhld_view_chungtu_danhan_theothang';
		$this->TableName = 'bhld_view_chungtu_danhan_theothang';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`bhld_view_chungtu_danhan_theothang`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// ngnhan
		$this->ngnhan = new DbField('bhld_view_chungtu_danhan_theothang', 'bhld_view_chungtu_danhan_theothang', 'x_ngnhan', 'ngnhan', '`ngnhan`', CastDateFieldForLike("`ngnhan`", 7, "DB"), 133, 10, 7, FALSE, '`ngnhan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ngnhan->Nullable = FALSE; // NOT NULL field
		$this->ngnhan->Required = TRUE; // Required field
		$this->ngnhan->Sortable = TRUE; // Allow sort
		$this->ngnhan->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['ngnhan'] = &$this->ngnhan;

		// mact
		$this->mact = new DbField('bhld_view_chungtu_danhan_theothang', 'bhld_view_chungtu_danhan_theothang', 'x_mact', 'mact', '`mact`', '`mact`', 200, 50, -1, FALSE, '`mact`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mact->IsPrimaryKey = TRUE; // Primary key field
		$this->mact->Nullable = FALSE; // NOT NULL field
		$this->mact->Required = TRUE; // Required field
		$this->mact->Sortable = TRUE; // Allow sort
		$this->fields['mact'] = &$this->mact;

		// mapb
		$this->mapb = new DbField('bhld_view_chungtu_danhan_theothang', 'bhld_view_chungtu_danhan_theothang', 'x_mapb', 'mapb', '`mapb`', '`mapb`', 200, 50, -1, FALSE, '`mapb`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->mapb->Nullable = FALSE; // NOT NULL field
		$this->mapb->Required = TRUE; // Required field
		$this->mapb->Sortable = TRUE; // Allow sort
		$this->mapb->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->mapb->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->mapb->Lookup = new Lookup('mapb', 'bhld_phongban', FALSE, 'mapb', ["tenphong","","",""], [], [], [], [], [], [], '', '');
		$this->fields['mapb'] = &$this->mapb;

		// manv
		$this->manv = new DbField('bhld_view_chungtu_danhan_theothang', 'bhld_view_chungtu_danhan_theothang', 'x_manv', 'manv', '`manv`', '`manv`', 3, 11, -1, FALSE, '`manv`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->manv->Nullable = FALSE; // NOT NULL field
		$this->manv->Required = TRUE; // Required field
		$this->manv->Sortable = TRUE; // Allow sort
		$this->manv->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->manv->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->manv->Lookup = new Lookup('manv', 'bhld_nhanvien', FALSE, 'manv', ["manv","tennhanvien","",""], [], [], [], [], [], [], '', '');
		$this->manv->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['manv'] = &$this->manv;

		// mavt
		$this->mavt = new DbField('bhld_view_chungtu_danhan_theothang', 'bhld_view_chungtu_danhan_theothang', 'x_mavt', 'mavt', '`mavt`', '`mavt`', 3, 11, -1, FALSE, '`mavt`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->mavt->IsPrimaryKey = TRUE; // Primary key field
		$this->mavt->Nullable = FALSE; // NOT NULL field
		$this->mavt->Required = TRUE; // Required field
		$this->mavt->Sortable = TRUE; // Allow sort
		$this->mavt->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->mavt->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->mavt->Lookup = new Lookup('mavt', 'bhld_dmvattu', FALSE, 'mavt', ["tenvt","","",""], [], [], [], [], [], [], '', '');
		$this->mavt->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['mavt'] = &$this->mavt;

		// sl
		$this->sl = new DbField('bhld_view_chungtu_danhan_theothang', 'bhld_view_chungtu_danhan_theothang', 'x_sl', 'sl', '`sl`', '`sl`', 3, 11, -1, FALSE, '`sl`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sl->Nullable = FALSE; // NOT NULL field
		$this->sl->Required = TRUE; // Required field
		$this->sl->Sortable = TRUE; // Allow sort
		$this->sl->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sl'] = &$this->sl;

		// ngnhantt
		$this->ngnhantt = new DbField('bhld_view_chungtu_danhan_theothang', 'bhld_view_chungtu_danhan_theothang', 'x_ngnhantt', 'ngnhantt', '`ngnhantt`', CastDateFieldForLike("`ngnhantt`", 7, "DB"), 133, 10, 7, FALSE, '`ngnhantt`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ngnhantt->Nullable = FALSE; // NOT NULL field
		$this->ngnhantt->Required = TRUE; // Required field
		$this->ngnhantt->Sortable = TRUE; // Allow sort
		$this->ngnhantt->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['ngnhantt'] = &$this->ngnhantt;

		// dmtg
		$this->dmtg = new DbField('bhld_view_chungtu_danhan_theothang', 'bhld_view_chungtu_danhan_theothang', 'x_dmtg', 'dmtg', '`dmtg`', '`dmtg`', 3, 11, -1, FALSE, '`dmtg`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->dmtg->Nullable = FALSE; // NOT NULL field
		$this->dmtg->Required = TRUE; // Required field
		$this->dmtg->Sortable = TRUE; // Allow sort
		$this->dmtg->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['dmtg'] = &$this->dmtg;

		// detail
		$this->detail = new DbField('bhld_view_chungtu_danhan_theothang', 'bhld_view_chungtu_danhan_theothang', 'x_detail', 'detail', '`detail`', '`detail`', 200, 19, -1, FALSE, '`detail`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->detail->IsForeignKey = TRUE; // Foreign key field
		$this->detail->Sortable = TRUE; // Allow sort
		$this->fields['detail'] = &$this->detail;
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
	function setLeftColumnClass($class)
	{
		if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
			$this->LeftColumnClass = $class . " col-form-label ew-label";
			$this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
			$this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
			$this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
		}
	}

	// Single column sort
	public function updateSort(&$fld)
	{
		if ($this->CurrentOrder == $fld->Name) {
			$sortField = $fld->Expression;
			$lastSort = $fld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$thisSort = $this->CurrentOrderType;
			} else {
				$thisSort = ($lastSort == "ASC") ? "DESC" : "ASC";
			}
			$fld->setSort($thisSort);
			$this->setSessionOrderBy($sortField . " " . $thisSort); // Save to Session
		} else {
			$fld->setSort("");
		}
	}

	// Current master table name
	public function getCurrentMasterTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE")];
	}
	public function setCurrentMasterTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE")] = $v;
	}

	// Session master WHERE clause
	public function getMasterFilter()
	{

		// Master filter
		$masterFilter = "";
		if ($this->getCurrentMasterTable() == "_bhld_view_chungtu_danhan_theothang_master") {
			if ($this->detail->getSessionValue() != "")
				$masterFilter .= "`detail`=" . QuotedValue($this->detail->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
		}
		return $masterFilter;
	}

	// Session detail WHERE clause
	public function getDetailFilter()
	{

		// Detail filter
		$detailFilter = "";
		if ($this->getCurrentMasterTable() == "_bhld_view_chungtu_danhan_theothang_master") {
			if ($this->detail->getSessionValue() != "")
				$detailFilter .= "`detail`=" . QuotedValue($this->detail->getSessionValue(), DATATYPE_STRING, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter__bhld_view_chungtu_danhan_theothang_master()
	{
		return "`detail`='@detail@'";
	}

	// Detail filter
	public function sqlDetailFilter__bhld_view_chungtu_danhan_theothang_master()
	{
		return "`detail`='@detail@'";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`bhld_view_chungtu_danhan_theothang`";
	}
	public function sqlFrom() // For backward compatibility
	{
		return $this->getSqlFrom();
	}
	public function setSqlFrom($v)
	{
		$this->SqlFrom = $v;
	}
	public function getSqlSelect() // Select
	{
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function sqlSelect() // For backward compatibility
	{
		return $this->getSqlSelect();
	}
	public function setSqlSelect($v)
	{
		$this->SqlSelect = $v;
	}
	public function getSqlWhere() // Where
	{
		$where = ($this->SqlWhere != "") ? $this->SqlWhere : "";
		$this->TableFilter = "";
		AddFilter($where, $this->TableFilter);
		return $where;
	}
	public function sqlWhere() // For backward compatibility
	{
		return $this->getSqlWhere();
	}
	public function setSqlWhere($v)
	{
		$this->SqlWhere = $v;
	}
	public function getSqlGroupBy() // Group By
	{
		return ($this->SqlGroupBy != "") ? $this->SqlGroupBy : "";
	}
	public function sqlGroupBy() // For backward compatibility
	{
		return $this->getSqlGroupBy();
	}
	public function setSqlGroupBy($v)
	{
		$this->SqlGroupBy = $v;
	}
	public function getSqlHaving() // Having
	{
		return ($this->SqlHaving != "") ? $this->SqlHaving : "";
	}
	public function sqlHaving() // For backward compatibility
	{
		return $this->getSqlHaving();
	}
	public function setSqlHaving($v)
	{
		$this->SqlHaving = $v;
	}
	public function getSqlOrderBy() // Order By
	{
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "";
	}
	public function sqlOrderBy() // For backward compatibility
	{
		return $this->getSqlOrderBy();
	}
	public function setSqlOrderBy($v)
	{
		$this->SqlOrderBy = $v;
	}

	// Apply User ID filters
	public function applyUserIDFilters($filter, $id = "")
	{
		return $filter;
	}

	// Check if User ID security allows view all
	public function userIDAllow($id = "")
	{
		$allow = $this->UserIDAllowSecurity;
		switch ($id) {
			case "add":
			case "copy":
			case "gridadd":
			case "register":
			case "addopt":
				return (($allow & 1) == 1);
			case "edit":
			case "gridedit":
			case "update":
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			case "lookup":
				return (($allow & 256) == 256);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get recordset
	public function getRecordset($sql, $rowcnt = -1, $offset = -1)
	{
		$conn = $this->getConnection();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->selectLimit($sql, $rowcnt, $offset);
		$conn->raiseErrorFn = "";
		return $rs;
	}

	// Get record count
	public function getRecordCount($sql, $c = NULL)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) &&
			!preg_match('/^\s*select\s+distinct\s+/i', $sql) && !preg_match('/\s+order\s+by\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = $c ?: $this->getConnection();
		if ($rs = $conn->execute($sqlwrk)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->close();
			}
			return (int)$cnt;
		}

		// Unable to get count, get record count directly
		if ($rs = $conn->execute($sql)) {
			$cnt = $rs->RecordCount();
			$rs->close();
			return (int)$cnt;
		}
		return $cnt;
	}

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table SQL
	public function getCurrentSql()
	{
		$filter = $this->CurrentFilter;
		$filter = $this->applyUserIDFilters($filter);
		$sort = $this->getSessionOrderBy();
		return $this->getSql($filter, $sort);
	}

	// Table SQL with List page filter
	public function getListSql()
	{
		$filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->getSqlSelect();
		$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Get record count based on filter (for detail record count in master table pages)
	public function loadRecordCount($filter)
	{
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $filter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
		$cnt = $this->getRecordCount($sql);
		$this->CurrentFilter = $origFilter;
		return $cnt;
	}

	// Get record count (for current List page)
	public function listRecordCount()
	{
		$filter = $this->getSessionWhere();
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		$cnt = $this->getRecordCount($sql);
		return $cnt;
	}

	// INSERT statement
	protected function insertSql(&$rs)
	{
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom)
				continue;
			$names .= $this->fields[$name]->Expression . ",";
			$values .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$names = preg_replace('/,+$/', "", $names);
		$values = preg_replace('/,+$/', "", $values);
		return "INSERT INTO " . $this->UpdateTable . " (" . $names . ") VALUES (" . $values . ")";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = $this->getConnection();
		$success = $conn->execute($this->insertSql($rs));
		if ($success) {
		}
		return $success;
	}

	// UPDATE statement
	protected function updateSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsAutoIncrement)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter != "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = $this->getConnection();
		$success = $conn->execute($this->updateSql($rs, $where, $curfilter));
		return $success;
	}

	// DELETE statement
	protected function deleteSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		if ($rs) {
			if (array_key_exists('mact', $rs))
				AddFilter($where, QuotedName('mact', $this->Dbid) . '=' . QuotedValue($rs['mact'], $this->mact->DataType, $this->Dbid));
			if (array_key_exists('mavt', $rs))
				AddFilter($where, QuotedName('mavt', $this->Dbid) . '=' . QuotedValue($rs['mavt'], $this->mavt->DataType, $this->Dbid));
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		AddFilter($filter, $where);
		if ($filter != "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = $this->getConnection();
		if ($success)
			$success = $conn->execute($this->deleteSql($rs, $where, $curfilter));
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->ngnhan->DbValue = $row['ngnhan'];
		$this->mact->DbValue = $row['mact'];
		$this->mapb->DbValue = $row['mapb'];
		$this->manv->DbValue = $row['manv'];
		$this->mavt->DbValue = $row['mavt'];
		$this->sl->DbValue = $row['sl'];
		$this->ngnhantt->DbValue = $row['ngnhantt'];
		$this->dmtg->DbValue = $row['dmtg'];
		$this->detail->DbValue = $row['detail'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`mact` = '@mact@' AND `mavt` = @mavt@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('mact', $row) ? $row['mact'] : NULL;
		else
			$val = $this->mact->OldValue !== NULL ? $this->mact->OldValue : $this->mact->CurrentValue;
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@mact@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		if (is_array($row))
			$val = array_key_exists('mavt', $row) ? $row['mavt'] : NULL;
		else
			$val = $this->mavt->OldValue !== NULL ? $this->mavt->OldValue : $this->mavt->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@mavt@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		return $keyFilter;
	}

	// Return page URL
	public function getReturnUrl()
	{
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] != "") {
			return $_SESSION[$name];
		} else {
			return "bhld_view_chungtu_danhan_theothanglist.php";
		}
	}
	public function setReturnUrl($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL")] = $v;
	}

	// Get modal caption
	public function getModalCaption($pageName)
	{
		global $Language;
		if ($pageName == "bhld_view_chungtu_danhan_theothangview.php")
			return $Language->phrase("View");
		elseif ($pageName == "bhld_view_chungtu_danhan_theothangedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "bhld_view_chungtu_danhan_theothangadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "bhld_view_chungtu_danhan_theothanglist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("bhld_view_chungtu_danhan_theothangview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("bhld_view_chungtu_danhan_theothangview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "bhld_view_chungtu_danhan_theothangadd.php?" . $this->getUrlParm($parm);
		else
			$url = "bhld_view_chungtu_danhan_theothangadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("bhld_view_chungtu_danhan_theothangedit.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline edit URL
	public function getInlineEditUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
		return $this->addMasterUrl($url);
	}

	// Copy URL
	public function getCopyUrl($parm = "")
	{
		$url = $this->keyUrl("bhld_view_chungtu_danhan_theothangadd.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline copy URL
	public function getInlineCopyUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
		return $this->addMasterUrl($url);
	}

	// Delete URL
	public function getDeleteUrl()
	{
		return $this->keyUrl("bhld_view_chungtu_danhan_theothangdelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "_bhld_view_chungtu_danhan_theothang_master" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_detail=" . urlencode($this->detail->CurrentValue);
		}
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "mact:" . JsonEncode($this->mact->CurrentValue, "string");
		$json .= ",mavt:" . JsonEncode($this->mavt->CurrentValue, "number");
		$json = "{" . $json . "}";
		if ($htmlEncode)
			$json = HtmlEncode($json);
		return $json;
	}

	// Add key value to URL
	public function keyUrl($url, $parm = "")
	{
		$url = $url . "?";
		if ($parm != "")
			$url .= $parm . "&";
		if ($this->mact->CurrentValue != NULL) {
			$url .= "mact=" . urlencode($this->mact->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		if ($this->mavt->CurrentValue != NULL) {
			$url .= "&mavt=" . urlencode($this->mavt->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		return $url;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		if ($this->CurrentAction || $this->isExport() ||
			in_array($fld->Type, [128, 204, 205])) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->reverseSort());
			return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
		} else {
			return "";
		}
	}

	// Get record keys from Post/Get/Session
	public function getRecordKeys()
	{
		$arKeys = [];
		$arKey = [];
		if (Param("key_m") !== NULL) {
			$arKeys = Param("key_m");
			$cnt = count($arKeys);
			for ($i = 0; $i < $cnt; $i++)
				$arKeys[$i] = explode(Config("COMPOSITE_KEY_SEPARATOR"), $arKeys[$i]);
		} else {
			if (Param("mact") !== NULL)
				$arKey[] = Param("mact");
			elseif (IsApi() && Key(0) !== NULL)
				$arKey[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKey[] = Route(2);
			else
				$arKeys = NULL; // Do not setup
			if (Param("mavt") !== NULL)
				$arKey[] = Param("mavt");
			elseif (IsApi() && Key(1) !== NULL)
				$arKey[] = Key(1);
			elseif (IsApi() && Route(3) !== NULL)
				$arKey[] = Route(3);
			else
				$arKeys = NULL; // Do not setup
			if (is_array($arKeys)) $arKeys[] = $arKey;

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = [];
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_array($key) || count($key) != 2)
					continue; // Just skip so other keys will still work
				if (!is_numeric($key[1])) // mavt
					continue;
				$ar[] = $key;
			}
		}
		return $ar;
	}

	// Get filter from record keys
	public function getFilterFromRecordKeys($setCurrent = TRUE)
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter != "") $keyFilter .= " OR ";
			if ($setCurrent)
				$this->mact->CurrentValue = $key[0];
			else
				$this->mact->OldValue = $key[0];
			if ($setCurrent)
				$this->mavt->CurrentValue = $key[1];
			else
				$this->mavt->OldValue = $key[1];
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = $this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->ngnhan->setDbValue($rs->fields('ngnhan'));
		$this->mact->setDbValue($rs->fields('mact'));
		$this->mapb->setDbValue($rs->fields('mapb'));
		$this->manv->setDbValue($rs->fields('manv'));
		$this->mavt->setDbValue($rs->fields('mavt'));
		$this->sl->setDbValue($rs->fields('sl'));
		$this->ngnhantt->setDbValue($rs->fields('ngnhantt'));
		$this->dmtg->setDbValue($rs->fields('dmtg'));
		$this->detail->setDbValue($rs->fields('detail'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// ngnhan
		// mact
		// mapb
		// manv
		// mavt
		// sl
		// ngnhantt
		// dmtg
		// detail
		// ngnhan

		$this->ngnhan->ViewValue = $this->ngnhan->CurrentValue;
		$this->ngnhan->ViewValue = FormatDateTime($this->ngnhan->ViewValue, 7);
		$this->ngnhan->ViewCustomAttributes = "";

		// mact
		$this->mact->ViewValue = $this->mact->CurrentValue;
		$this->mact->ViewCustomAttributes = "";

		// mapb
		$curVal = strval($this->mapb->CurrentValue);
		if ($curVal != "") {
			$this->mapb->ViewValue = $this->mapb->lookupCacheOption($curVal);
			if ($this->mapb->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`mapb`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->mapb->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->mapb->ViewValue = $this->mapb->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->mapb->ViewValue = $this->mapb->CurrentValue;
				}
			}
		} else {
			$this->mapb->ViewValue = NULL;
		}
		$this->mapb->ViewCustomAttributes = "";

		// manv
		$curVal = strval($this->manv->CurrentValue);
		if ($curVal != "") {
			$this->manv->ViewValue = $this->manv->lookupCacheOption($curVal);
			if ($this->manv->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`manv`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->manv->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$this->manv->ViewValue = $this->manv->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->manv->ViewValue = $this->manv->CurrentValue;
				}
			}
		} else {
			$this->manv->ViewValue = NULL;
		}
		$this->manv->ViewCustomAttributes = "";

		// mavt
		$curVal = strval($this->mavt->CurrentValue);
		if ($curVal != "") {
			$this->mavt->ViewValue = $this->mavt->lookupCacheOption($curVal);
			if ($this->mavt->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`mavt`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->mavt->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->mavt->ViewValue = $this->mavt->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->mavt->ViewValue = $this->mavt->CurrentValue;
				}
			}
		} else {
			$this->mavt->ViewValue = NULL;
		}
		$this->mavt->ViewCustomAttributes = "";

		// sl
		$this->sl->ViewValue = $this->sl->CurrentValue;
		$this->sl->ViewValue = FormatNumber($this->sl->ViewValue, 0, -2, -2, -2);
		$this->sl->ViewCustomAttributes = "";

		// ngnhantt
		$this->ngnhantt->ViewValue = $this->ngnhantt->CurrentValue;
		$this->ngnhantt->ViewValue = FormatDateTime($this->ngnhantt->ViewValue, 7);
		$this->ngnhantt->ViewCustomAttributes = "";

		// dmtg
		$this->dmtg->ViewValue = $this->dmtg->CurrentValue;
		$this->dmtg->ViewValue = FormatNumber($this->dmtg->ViewValue, 0, -2, -2, -2);
		$this->dmtg->ViewCustomAttributes = "";

		// detail
		$this->detail->ViewValue = $this->detail->CurrentValue;
		$this->detail->ViewCustomAttributes = "";

		// ngnhan
		$this->ngnhan->LinkCustomAttributes = "";
		$this->ngnhan->HrefValue = "";
		$this->ngnhan->TooltipValue = "";

		// mact
		$this->mact->LinkCustomAttributes = "";
		$this->mact->HrefValue = "";
		$this->mact->TooltipValue = "";

		// mapb
		$this->mapb->LinkCustomAttributes = "";
		$this->mapb->HrefValue = "";
		$this->mapb->TooltipValue = "";

		// manv
		$this->manv->LinkCustomAttributes = "";
		$this->manv->HrefValue = "";
		$this->manv->TooltipValue = "";

		// mavt
		$this->mavt->LinkCustomAttributes = "";
		$this->mavt->HrefValue = "";
		$this->mavt->TooltipValue = "";

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

		// detail
		$this->detail->LinkCustomAttributes = "";
		$this->detail->HrefValue = "";
		$this->detail->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();

		// Save data for Custom Template
		$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Render edit row values
	public function renderEditRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// ngnhan
		$this->ngnhan->EditAttrs["class"] = "form-control";
		$this->ngnhan->EditCustomAttributes = "";
		$this->ngnhan->EditValue = FormatDateTime($this->ngnhan->CurrentValue, 7);
		$this->ngnhan->PlaceHolder = RemoveHtml($this->ngnhan->caption());

		// mact
		$this->mact->EditAttrs["class"] = "form-control";
		$this->mact->EditCustomAttributes = "";
		if (!$this->mact->Raw)
			$this->mact->CurrentValue = HtmlDecode($this->mact->CurrentValue);
		$this->mact->EditValue = $this->mact->CurrentValue;
		$this->mact->PlaceHolder = RemoveHtml($this->mact->caption());

		// mapb
		$this->mapb->EditAttrs["class"] = "form-control";
		$this->mapb->EditCustomAttributes = "";

		// manv
		$this->manv->EditAttrs["class"] = "form-control";
		$this->manv->EditCustomAttributes = "";

		// mavt
		$this->mavt->EditAttrs["class"] = "form-control";
		$this->mavt->EditCustomAttributes = "";

		// sl
		$this->sl->EditAttrs["class"] = "form-control";
		$this->sl->EditCustomAttributes = "";
		$this->sl->EditValue = $this->sl->CurrentValue;
		$this->sl->PlaceHolder = RemoveHtml($this->sl->caption());

		// ngnhantt
		$this->ngnhantt->EditAttrs["class"] = "form-control";
		$this->ngnhantt->EditCustomAttributes = "";
		$this->ngnhantt->EditValue = FormatDateTime($this->ngnhantt->CurrentValue, 7);
		$this->ngnhantt->PlaceHolder = RemoveHtml($this->ngnhantt->caption());

		// dmtg
		$this->dmtg->EditAttrs["class"] = "form-control";
		$this->dmtg->EditCustomAttributes = "";
		$this->dmtg->EditValue = $this->dmtg->CurrentValue;
		$this->dmtg->PlaceHolder = RemoveHtml($this->dmtg->caption());

		// detail
		$this->detail->EditAttrs["class"] = "form-control";
		$this->detail->EditCustomAttributes = "";
		if ($this->detail->getSessionValue() != "") {
			$this->detail->CurrentValue = $this->detail->getSessionValue();
			$this->detail->ViewValue = $this->detail->CurrentValue;
			$this->detail->ViewCustomAttributes = "";
		} else {
			if (!$this->detail->Raw)
				$this->detail->CurrentValue = HtmlDecode($this->detail->CurrentValue);
			$this->detail->EditValue = $this->detail->CurrentValue;
			$this->detail->PlaceHolder = RemoveHtml($this->detail->caption());
		}

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
	{
		if (!$recordset || !$doc)
			return;
		if (!$doc->ExportCustom) {

			// Write header
			$doc->exportTableHeader();
			if ($doc->Horizontal) { // Horizontal format, write header
				$doc->beginExportRow();
				if ($exportPageType == "view") {
					$doc->exportCaption($this->ngnhan);
					$doc->exportCaption($this->mact);
					$doc->exportCaption($this->mapb);
					$doc->exportCaption($this->manv);
					$doc->exportCaption($this->mavt);
					$doc->exportCaption($this->sl);
					$doc->exportCaption($this->dmtg);
					$doc->exportCaption($this->detail);
				} else {
					$doc->exportCaption($this->ngnhan);
					$doc->exportCaption($this->mact);
					$doc->exportCaption($this->mapb);
					$doc->exportCaption($this->manv);
					$doc->exportCaption($this->mavt);
					$doc->exportCaption($this->sl);
					$doc->exportCaption($this->ngnhantt);
					$doc->exportCaption($this->dmtg);
					$doc->exportCaption($this->detail);
				}
				$doc->endExportRow();
			}
		}

		// Move to first record
		$recCnt = $startRec - 1;
		if (!$recordset->EOF) {
			$recordset->moveFirst();
			if ($startRec > 1)
				$recordset->move($startRec - 1);
		}
		while (!$recordset->EOF && $recCnt < $stopRec) {
			$recCnt++;
			if ($recCnt >= $startRec) {
				$rowCnt = $recCnt - $startRec + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0)
						$doc->exportPageBreak();
				}
				$this->loadListRowValues($recordset);

				// Render row
				$this->RowType = ROWTYPE_VIEW; // Render view
				$this->resetAttributes();
				$this->renderListRow();
				if (!$doc->ExportCustom) {
					$doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
					if ($exportPageType == "view") {
						$doc->exportField($this->ngnhan);
						$doc->exportField($this->mact);
						$doc->exportField($this->mapb);
						$doc->exportField($this->manv);
						$doc->exportField($this->mavt);
						$doc->exportField($this->sl);
						$doc->exportField($this->dmtg);
						$doc->exportField($this->detail);
					} else {
						$doc->exportField($this->ngnhan);
						$doc->exportField($this->mact);
						$doc->exportField($this->mapb);
						$doc->exportField($this->manv);
						$doc->exportField($this->mavt);
						$doc->exportField($this->sl);
						$doc->exportField($this->ngnhantt);
						$doc->exportField($this->dmtg);
						$doc->exportField($this->detail);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}
		if (!$doc->ExportCustom) {
			$doc->exportTableFooter();
		}
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0)
	{

		// No binary fields
		return FALSE;
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Grid Inserting event
	function Grid_Inserting() {

		// Enter your code here
		// To reject grid insert, set return value to FALSE

		return TRUE;
	}

	// Grid Inserted event
	function Grid_Inserted($rsnew) {

		//echo "Grid Inserted";
	}

	// Grid Updating event
	function Grid_Updating($rsold) {

		// Enter your code here
		// To reject grid update, set return value to FALSE

		return TRUE;
	}

	// Grid Updated event
	function Grid_Updated($rsold, $rsnew) {

		//echo "Grid Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
		// Enter your code here

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>
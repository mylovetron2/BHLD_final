<?php namespace PHPMaker2020\projectBHLD; ?>
<?php

/**
 * Table class for bhld_view_chungtu_chuanhan_final
 */
class bhld_view_chungtu_chuanhan_final extends DbTable
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
	public $manv;
	public $tennhanvien;
	public $mact;
	public $ngct;
	public $GiayBH;
	public $MuBH;
	public $AoMua;
	public $QuanAo;
	public $Kinh;
	public $mapb;
	public $tenphong;
	public $NutTai;
	public $PhinLoc;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'bhld_view_chungtu_chuanhan_final';
		$this->TableName = 'bhld_view_chungtu_chuanhan_final';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`bhld_view_chungtu_chuanhan_final`";
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

		// manv
		$this->manv = new DbField('bhld_view_chungtu_chuanhan_final', 'bhld_view_chungtu_chuanhan_final', 'x_manv', 'manv', '`manv`', '`manv`', 3, 11, -1, FALSE, '`manv`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->manv->Nullable = FALSE; // NOT NULL field
		$this->manv->Required = TRUE; // Required field
		$this->manv->Sortable = TRUE; // Allow sort
		$this->manv->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['manv'] = &$this->manv;

		// tennhanvien
		$this->tennhanvien = new DbField('bhld_view_chungtu_chuanhan_final', 'bhld_view_chungtu_chuanhan_final', 'x_tennhanvien', 'tennhanvien', '`tennhanvien`', '`tennhanvien`', 200, 50, -1, FALSE, '`tennhanvien`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tennhanvien->Sortable = TRUE; // Allow sort
		$this->fields['tennhanvien'] = &$this->tennhanvien;

		// mact
		$this->mact = new DbField('bhld_view_chungtu_chuanhan_final', 'bhld_view_chungtu_chuanhan_final', 'x_mact', 'mact', '`mact`', '`mact`', 200, 50, -1, FALSE, '`mact`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mact->Nullable = FALSE; // NOT NULL field
		$this->mact->Required = TRUE; // Required field
		$this->mact->Sortable = TRUE; // Allow sort
		$this->fields['mact'] = &$this->mact;

		// ngct
		$this->ngct = new DbField('bhld_view_chungtu_chuanhan_final', 'bhld_view_chungtu_chuanhan_final', 'x_ngct', 'ngct', '`ngct`', CastDateFieldForLike("`ngct`", 7, "DB"), 133, 10, 7, FALSE, '`ngct`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ngct->Nullable = FALSE; // NOT NULL field
		$this->ngct->Required = TRUE; // Required field
		$this->ngct->Sortable = TRUE; // Allow sort
		$this->ngct->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['ngct'] = &$this->ngct;

		// GiayBH
		$this->GiayBH = new DbField('bhld_view_chungtu_chuanhan_final', 'bhld_view_chungtu_chuanhan_final', 'x_GiayBH', 'GiayBH', '`GiayBH`', '`GiayBH`', 5, 23, -1, FALSE, '`GiayBH`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GiayBH->Sortable = TRUE; // Allow sort
		$this->GiayBH->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['GiayBH'] = &$this->GiayBH;

		// MuBH
		$this->MuBH = new DbField('bhld_view_chungtu_chuanhan_final', 'bhld_view_chungtu_chuanhan_final', 'x_MuBH', 'MuBH', '`MuBH`', '`MuBH`', 5, 23, -1, FALSE, '`MuBH`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MuBH->Sortable = TRUE; // Allow sort
		$this->MuBH->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['MuBH'] = &$this->MuBH;

		// AoMua
		$this->AoMua = new DbField('bhld_view_chungtu_chuanhan_final', 'bhld_view_chungtu_chuanhan_final', 'x_AoMua', 'AoMua', '`AoMua`', '`AoMua`', 5, 23, -1, FALSE, '`AoMua`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AoMua->Sortable = TRUE; // Allow sort
		$this->AoMua->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['AoMua'] = &$this->AoMua;

		// QuanAo
		$this->QuanAo = new DbField('bhld_view_chungtu_chuanhan_final', 'bhld_view_chungtu_chuanhan_final', 'x_QuanAo', 'QuanAo', '`QuanAo`', '`QuanAo`', 5, 23, -1, FALSE, '`QuanAo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->QuanAo->Sortable = TRUE; // Allow sort
		$this->QuanAo->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['QuanAo'] = &$this->QuanAo;

		// Kinh
		$this->Kinh = new DbField('bhld_view_chungtu_chuanhan_final', 'bhld_view_chungtu_chuanhan_final', 'x_Kinh', 'Kinh', '`Kinh`', '`Kinh`', 5, 23, -1, FALSE, '`Kinh`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Kinh->Sortable = TRUE; // Allow sort
		$this->Kinh->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Kinh'] = &$this->Kinh;

		// mapb
		$this->mapb = new DbField('bhld_view_chungtu_chuanhan_final', 'bhld_view_chungtu_chuanhan_final', 'x_mapb', 'mapb', '`mapb`', '`mapb`', 200, 50, -1, FALSE, '`mapb`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mapb->Nullable = FALSE; // NOT NULL field
		$this->mapb->Required = TRUE; // Required field
		$this->mapb->Sortable = TRUE; // Allow sort
		$this->fields['mapb'] = &$this->mapb;

		// tenphong
		$this->tenphong = new DbField('bhld_view_chungtu_chuanhan_final', 'bhld_view_chungtu_chuanhan_final', 'x_tenphong', 'tenphong', '`tenphong`', '`tenphong`', 200, 50, -1, FALSE, '`tenphong`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tenphong->Nullable = FALSE; // NOT NULL field
		$this->tenphong->Required = TRUE; // Required field
		$this->tenphong->Sortable = TRUE; // Allow sort
		$this->fields['tenphong'] = &$this->tenphong;

		// NutTai
		$this->NutTai = new DbField('bhld_view_chungtu_chuanhan_final', 'bhld_view_chungtu_chuanhan_final', 'x_NutTai', 'NutTai', '`NutTai`', '`NutTai`', 5, 23, -1, FALSE, '`NutTai`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NutTai->Sortable = TRUE; // Allow sort
		$this->NutTai->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['NutTai'] = &$this->NutTai;

		// PhinLoc
		$this->PhinLoc = new DbField('bhld_view_chungtu_chuanhan_final', 'bhld_view_chungtu_chuanhan_final', 'x_PhinLoc', 'PhinLoc', '`PhinLoc`', '`PhinLoc`', 5, 23, -1, FALSE, '`PhinLoc`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PhinLoc->Sortable = TRUE; // Allow sort
		$this->PhinLoc->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['PhinLoc'] = &$this->PhinLoc;
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

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`bhld_view_chungtu_chuanhan_final`";
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
		$this->manv->DbValue = $row['manv'];
		$this->tennhanvien->DbValue = $row['tennhanvien'];
		$this->mact->DbValue = $row['mact'];
		$this->ngct->DbValue = $row['ngct'];
		$this->GiayBH->DbValue = $row['GiayBH'];
		$this->MuBH->DbValue = $row['MuBH'];
		$this->AoMua->DbValue = $row['AoMua'];
		$this->QuanAo->DbValue = $row['QuanAo'];
		$this->Kinh->DbValue = $row['Kinh'];
		$this->mapb->DbValue = $row['mapb'];
		$this->tenphong->DbValue = $row['tenphong'];
		$this->NutTai->DbValue = $row['NutTai'];
		$this->PhinLoc->DbValue = $row['PhinLoc'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
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
			return "bhld_view_chungtu_chuanhan_finallist.php";
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
		if ($pageName == "bhld_view_chungtu_chuanhan_finalview.php")
			return $Language->phrase("View");
		elseif ($pageName == "bhld_view_chungtu_chuanhan_finaledit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "bhld_view_chungtu_chuanhan_finaladd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "bhld_view_chungtu_chuanhan_finallist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("bhld_view_chungtu_chuanhan_finalview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("bhld_view_chungtu_chuanhan_finalview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "bhld_view_chungtu_chuanhan_finaladd.php?" . $this->getUrlParm($parm);
		else
			$url = "bhld_view_chungtu_chuanhan_finaladd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("bhld_view_chungtu_chuanhan_finaledit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("bhld_view_chungtu_chuanhan_finaladd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("bhld_view_chungtu_chuanhan_finaldelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
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
		} else {

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = [];
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
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
		$this->manv->setDbValue($rs->fields('manv'));
		$this->tennhanvien->setDbValue($rs->fields('tennhanvien'));
		$this->mact->setDbValue($rs->fields('mact'));
		$this->ngct->setDbValue($rs->fields('ngct'));
		$this->GiayBH->setDbValue($rs->fields('GiayBH'));
		$this->MuBH->setDbValue($rs->fields('MuBH'));
		$this->AoMua->setDbValue($rs->fields('AoMua'));
		$this->QuanAo->setDbValue($rs->fields('QuanAo'));
		$this->Kinh->setDbValue($rs->fields('Kinh'));
		$this->mapb->setDbValue($rs->fields('mapb'));
		$this->tenphong->setDbValue($rs->fields('tenphong'));
		$this->NutTai->setDbValue($rs->fields('NutTai'));
		$this->PhinLoc->setDbValue($rs->fields('PhinLoc'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// manv
		// tennhanvien
		// mact
		// ngct
		// GiayBH
		// MuBH
		// AoMua
		// QuanAo
		// Kinh
		// mapb
		// tenphong
		// NutTai
		// PhinLoc
		// manv

		$this->manv->ViewValue = $this->manv->CurrentValue;
		$this->manv->ViewCustomAttributes = "";

		// tennhanvien
		$this->tennhanvien->ViewValue = $this->tennhanvien->CurrentValue;
		$this->tennhanvien->ViewCustomAttributes = "";

		// mact
		$this->mact->ViewValue = $this->mact->CurrentValue;
		$this->mact->ViewCustomAttributes = "";

		// ngct
		$this->ngct->ViewValue = $this->ngct->CurrentValue;
		$this->ngct->ViewValue = FormatDateTime($this->ngct->ViewValue, 7);
		$this->ngct->ViewCustomAttributes = "";

		// GiayBH
		$this->GiayBH->ViewValue = $this->GiayBH->CurrentValue;
		$this->GiayBH->ViewCustomAttributes = "";

		// MuBH
		$this->MuBH->ViewValue = $this->MuBH->CurrentValue;
		$this->MuBH->ViewCustomAttributes = "";

		// AoMua
		$this->AoMua->ViewValue = $this->AoMua->CurrentValue;
		$this->AoMua->ViewCustomAttributes = "";

		// QuanAo
		$this->QuanAo->ViewValue = $this->QuanAo->CurrentValue;
		$this->QuanAo->ViewCustomAttributes = "";

		// Kinh
		$this->Kinh->ViewValue = $this->Kinh->CurrentValue;
		$this->Kinh->ViewCustomAttributes = "";

		// mapb
		$this->mapb->ViewValue = $this->mapb->CurrentValue;
		$this->mapb->ViewCustomAttributes = "";

		// tenphong
		$this->tenphong->ViewValue = $this->tenphong->CurrentValue;
		$this->tenphong->ViewCustomAttributes = "";

		// NutTai
		$this->NutTai->ViewValue = $this->NutTai->CurrentValue;
		$this->NutTai->ViewValue = FormatNumber($this->NutTai->ViewValue, 2, -2, -2, -2);
		$this->NutTai->ViewCustomAttributes = "";

		// PhinLoc
		$this->PhinLoc->ViewValue = $this->PhinLoc->CurrentValue;
		$this->PhinLoc->ViewValue = FormatNumber($this->PhinLoc->ViewValue, 2, -2, -2, -2);
		$this->PhinLoc->ViewCustomAttributes = "";

		// manv
		$this->manv->LinkCustomAttributes = "";
		$this->manv->HrefValue = "";
		$this->manv->TooltipValue = "";

		// tennhanvien
		$this->tennhanvien->LinkCustomAttributes = "";
		$this->tennhanvien->HrefValue = "";
		$this->tennhanvien->TooltipValue = "";

		// mact
		$this->mact->LinkCustomAttributes = "";
		$this->mact->HrefValue = "";
		$this->mact->TooltipValue = "";

		// ngct
		$this->ngct->LinkCustomAttributes = "";
		$this->ngct->HrefValue = "";
		$this->ngct->TooltipValue = "";

		// GiayBH
		$this->GiayBH->LinkCustomAttributes = "";
		$this->GiayBH->HrefValue = "";
		$this->GiayBH->TooltipValue = "";

		// MuBH
		$this->MuBH->LinkCustomAttributes = "";
		$this->MuBH->HrefValue = "";
		$this->MuBH->TooltipValue = "";

		// AoMua
		$this->AoMua->LinkCustomAttributes = "";
		$this->AoMua->HrefValue = "";
		$this->AoMua->TooltipValue = "";

		// QuanAo
		$this->QuanAo->LinkCustomAttributes = "";
		$this->QuanAo->HrefValue = "";
		$this->QuanAo->TooltipValue = "";

		// Kinh
		$this->Kinh->LinkCustomAttributes = "";
		$this->Kinh->HrefValue = "";
		$this->Kinh->TooltipValue = "";

		// mapb
		$this->mapb->LinkCustomAttributes = "";
		$this->mapb->HrefValue = "";
		$this->mapb->TooltipValue = "";

		// tenphong
		$this->tenphong->LinkCustomAttributes = "";
		$this->tenphong->HrefValue = "";
		$this->tenphong->TooltipValue = "";

		// NutTai
		$this->NutTai->LinkCustomAttributes = "";
		$this->NutTai->HrefValue = "";
		$this->NutTai->TooltipValue = "";

		// PhinLoc
		$this->PhinLoc->LinkCustomAttributes = "";
		$this->PhinLoc->HrefValue = "";
		$this->PhinLoc->TooltipValue = "";

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

		// manv
		$this->manv->EditAttrs["class"] = "form-control";
		$this->manv->EditCustomAttributes = "";
		$this->manv->EditValue = $this->manv->CurrentValue;
		$this->manv->PlaceHolder = RemoveHtml($this->manv->caption());

		// tennhanvien
		$this->tennhanvien->EditAttrs["class"] = "form-control";
		$this->tennhanvien->EditCustomAttributes = "";
		if (!$this->tennhanvien->Raw)
			$this->tennhanvien->CurrentValue = HtmlDecode($this->tennhanvien->CurrentValue);
		$this->tennhanvien->EditValue = $this->tennhanvien->CurrentValue;
		$this->tennhanvien->PlaceHolder = RemoveHtml($this->tennhanvien->caption());

		// mact
		$this->mact->EditAttrs["class"] = "form-control";
		$this->mact->EditCustomAttributes = "";
		if (!$this->mact->Raw)
			$this->mact->CurrentValue = HtmlDecode($this->mact->CurrentValue);
		$this->mact->EditValue = $this->mact->CurrentValue;
		$this->mact->PlaceHolder = RemoveHtml($this->mact->caption());

		// ngct
		$this->ngct->EditAttrs["class"] = "form-control";
		$this->ngct->EditCustomAttributes = "";
		$this->ngct->EditValue = FormatDateTime($this->ngct->CurrentValue, 7);
		$this->ngct->PlaceHolder = RemoveHtml($this->ngct->caption());

		// GiayBH
		$this->GiayBH->EditAttrs["class"] = "form-control";
		$this->GiayBH->EditCustomAttributes = "";
		$this->GiayBH->EditValue = $this->GiayBH->CurrentValue;
		$this->GiayBH->PlaceHolder = RemoveHtml($this->GiayBH->caption());
		if (strval($this->GiayBH->EditValue) != "" && is_numeric($this->GiayBH->EditValue))
			$this->GiayBH->EditValue = FormatNumber($this->GiayBH->EditValue, -2, -1, -2, 0);
		

		// MuBH
		$this->MuBH->EditAttrs["class"] = "form-control";
		$this->MuBH->EditCustomAttributes = "";
		$this->MuBH->EditValue = $this->MuBH->CurrentValue;
		$this->MuBH->PlaceHolder = RemoveHtml($this->MuBH->caption());
		if (strval($this->MuBH->EditValue) != "" && is_numeric($this->MuBH->EditValue))
			$this->MuBH->EditValue = FormatNumber($this->MuBH->EditValue, -2, -1, -2, 0);
		

		// AoMua
		$this->AoMua->EditAttrs["class"] = "form-control";
		$this->AoMua->EditCustomAttributes = "";
		$this->AoMua->EditValue = $this->AoMua->CurrentValue;
		$this->AoMua->PlaceHolder = RemoveHtml($this->AoMua->caption());
		if (strval($this->AoMua->EditValue) != "" && is_numeric($this->AoMua->EditValue))
			$this->AoMua->EditValue = FormatNumber($this->AoMua->EditValue, -2, -1, -2, 0);
		

		// QuanAo
		$this->QuanAo->EditAttrs["class"] = "form-control";
		$this->QuanAo->EditCustomAttributes = "";
		$this->QuanAo->EditValue = $this->QuanAo->CurrentValue;
		$this->QuanAo->PlaceHolder = RemoveHtml($this->QuanAo->caption());
		if (strval($this->QuanAo->EditValue) != "" && is_numeric($this->QuanAo->EditValue))
			$this->QuanAo->EditValue = FormatNumber($this->QuanAo->EditValue, -2, -1, -2, 0);
		

		// Kinh
		$this->Kinh->EditAttrs["class"] = "form-control";
		$this->Kinh->EditCustomAttributes = "";
		$this->Kinh->EditValue = $this->Kinh->CurrentValue;
		$this->Kinh->PlaceHolder = RemoveHtml($this->Kinh->caption());
		if (strval($this->Kinh->EditValue) != "" && is_numeric($this->Kinh->EditValue))
			$this->Kinh->EditValue = FormatNumber($this->Kinh->EditValue, -2, -1, -2, 0);
		

		// mapb
		$this->mapb->EditAttrs["class"] = "form-control";
		$this->mapb->EditCustomAttributes = "";
		if (!$this->mapb->Raw)
			$this->mapb->CurrentValue = HtmlDecode($this->mapb->CurrentValue);
		$this->mapb->EditValue = $this->mapb->CurrentValue;
		$this->mapb->PlaceHolder = RemoveHtml($this->mapb->caption());

		// tenphong
		$this->tenphong->EditAttrs["class"] = "form-control";
		$this->tenphong->EditCustomAttributes = "";
		if (!$this->tenphong->Raw)
			$this->tenphong->CurrentValue = HtmlDecode($this->tenphong->CurrentValue);
		$this->tenphong->EditValue = $this->tenphong->CurrentValue;
		$this->tenphong->PlaceHolder = RemoveHtml($this->tenphong->caption());

		// NutTai
		$this->NutTai->EditAttrs["class"] = "form-control";
		$this->NutTai->EditCustomAttributes = "";
		$this->NutTai->EditValue = $this->NutTai->CurrentValue;
		$this->NutTai->PlaceHolder = RemoveHtml($this->NutTai->caption());
		if (strval($this->NutTai->EditValue) != "" && is_numeric($this->NutTai->EditValue))
			$this->NutTai->EditValue = FormatNumber($this->NutTai->EditValue, -2, -2, -2, -2);
		

		// PhinLoc
		$this->PhinLoc->EditAttrs["class"] = "form-control";
		$this->PhinLoc->EditCustomAttributes = "";
		$this->PhinLoc->EditValue = $this->PhinLoc->CurrentValue;
		$this->PhinLoc->PlaceHolder = RemoveHtml($this->PhinLoc->caption());
		if (strval($this->PhinLoc->EditValue) != "" && is_numeric($this->PhinLoc->EditValue))
			$this->PhinLoc->EditValue = FormatNumber($this->PhinLoc->EditValue, -2, -2, -2, -2);
		

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
					$doc->exportCaption($this->manv);
					$doc->exportCaption($this->tennhanvien);
					$doc->exportCaption($this->mact);
					$doc->exportCaption($this->ngct);
					$doc->exportCaption($this->GiayBH);
					$doc->exportCaption($this->MuBH);
					$doc->exportCaption($this->AoMua);
					$doc->exportCaption($this->QuanAo);
					$doc->exportCaption($this->Kinh);
					$doc->exportCaption($this->mapb);
					$doc->exportCaption($this->tenphong);
					$doc->exportCaption($this->NutTai);
					$doc->exportCaption($this->PhinLoc);
				} else {
					$doc->exportCaption($this->manv);
					$doc->exportCaption($this->tennhanvien);
					$doc->exportCaption($this->mact);
					$doc->exportCaption($this->ngct);
					$doc->exportCaption($this->GiayBH);
					$doc->exportCaption($this->MuBH);
					$doc->exportCaption($this->AoMua);
					$doc->exportCaption($this->QuanAo);
					$doc->exportCaption($this->Kinh);
					$doc->exportCaption($this->mapb);
					$doc->exportCaption($this->tenphong);
					$doc->exportCaption($this->NutTai);
					$doc->exportCaption($this->PhinLoc);
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
						$doc->exportField($this->manv);
						$doc->exportField($this->tennhanvien);
						$doc->exportField($this->mact);
						$doc->exportField($this->ngct);
						$doc->exportField($this->GiayBH);
						$doc->exportField($this->MuBH);
						$doc->exportField($this->AoMua);
						$doc->exportField($this->QuanAo);
						$doc->exportField($this->Kinh);
						$doc->exportField($this->mapb);
						$doc->exportField($this->tenphong);
						$doc->exportField($this->NutTai);
						$doc->exportField($this->PhinLoc);
					} else {
						$doc->exportField($this->manv);
						$doc->exportField($this->tennhanvien);
						$doc->exportField($this->mact);
						$doc->exportField($this->ngct);
						$doc->exportField($this->GiayBH);
						$doc->exportField($this->MuBH);
						$doc->exportField($this->AoMua);
						$doc->exportField($this->QuanAo);
						$doc->exportField($this->Kinh);
						$doc->exportField($this->mapb);
						$doc->exportField($this->tenphong);
						$doc->exportField($this->NutTai);
						$doc->exportField($this->PhinLoc);
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
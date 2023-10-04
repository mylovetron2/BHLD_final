<?php namespace PHPMaker2020\projectBHLD; ?>
<?php

/**
 * Table class for bhld_ctu
 */
class bhld_ctu extends DbTable
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
	public $mact;
	public $ngct;
	public $mapb;
	public $ma;
	public $manv;
	public $ghichu;
	public $madm;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'bhld_ctu';
		$this->TableName = 'bhld_ctu';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`bhld_ctu`";
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

		// mact
		$this->mact = new DbField('bhld_ctu', 'bhld_ctu', 'x_mact', 'mact', '`mact`', '`mact`', 200, 50, -1, FALSE, '`mact`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->mact->IsPrimaryKey = TRUE; // Primary key field
		$this->mact->IsForeignKey = TRUE; // Foreign key field
		$this->mact->Nullable = FALSE; // NOT NULL field
		$this->mact->Required = TRUE; // Required field
		$this->mact->Sortable = TRUE; // Allow sort
		$this->fields['mact'] = &$this->mact;

		// ngct
		$this->ngct = new DbField('bhld_ctu', 'bhld_ctu', 'x_ngct', 'ngct', '`ngct`', CastDateFieldForLike("`ngct`", 7, "DB"), 133, 10, 7, FALSE, '`ngct`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ngct->Nullable = FALSE; // NOT NULL field
		$this->ngct->Required = TRUE; // Required field
		$this->ngct->Sortable = TRUE; // Allow sort
		$this->ngct->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['ngct'] = &$this->ngct;

		// mapb
		$this->mapb = new DbField('bhld_ctu', 'bhld_ctu', 'x_mapb', 'mapb', '`mapb`', '`mapb`', 200, 50, -1, FALSE, '`mapb`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->mapb->Nullable = FALSE; // NOT NULL field
		$this->mapb->Required = TRUE; // Required field
		$this->mapb->Sortable = TRUE; // Allow sort
		$this->mapb->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->mapb->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->mapb->Lookup = new Lookup('mapb', 'bhld_phongban', FALSE, 'mapb', ["tenphong","","",""], [], [], [], [], [], [], '', '');
		$this->fields['mapb'] = &$this->mapb;

		// ma
		$this->ma = new DbField('bhld_ctu', 'bhld_ctu', 'x_ma', 'ma', '(SELECT CAST(`manv` AS CHAR CHARACTER SET utf8mb4))', '(SELECT CAST(`manv` AS CHAR CHARACTER SET utf8mb4))', 200, 11, -1, FALSE, '(SELECT CAST(`manv` AS CHAR CHARACTER SET utf8mb4))', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ma->IsCustom = TRUE; // Custom field
		$this->ma->Sortable = TRUE; // Allow sort
		$this->fields['ma'] = &$this->ma;

		// manv
		$this->manv = new DbField('bhld_ctu', 'bhld_ctu', 'x_manv', 'manv', '`manv`', '`manv`', 3, 11, -1, FALSE, '`EV__manv`', TRUE, TRUE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->manv->Nullable = FALSE; // NOT NULL field
		$this->manv->Required = TRUE; // Required field
		$this->manv->Sortable = TRUE; // Allow sort
		$this->manv->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->manv->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->manv->Lookup = new Lookup('manv', 'bhld_nhanvien', FALSE, 'manv', ["manv","tennhanvien","",""], [], [], [], [], [], [], '', '');
		$this->manv->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['manv'] = &$this->manv;

		// ghichu
		$this->ghichu = new DbField('bhld_ctu', 'bhld_ctu', 'x_ghichu', 'ghichu', '`ghichu`', '`ghichu`', 200, 50, -1, FALSE, '`ghichu`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ghichu->Sortable = TRUE; // Allow sort
		$this->fields['ghichu'] = &$this->ghichu;

		// madm
		$this->madm = new DbField('bhld_ctu', 'bhld_ctu', 'x_madm', 'madm', '`madm`', '`madm`', 200, 50, -1, FALSE, '`madm`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->madm->Nullable = FALSE; // NOT NULL field
		$this->madm->Required = TRUE; // Required field
		$this->madm->Sortable = TRUE; // Allow sort
		$this->madm->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->madm->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->madm->Lookup = new Lookup('madm', 'bhld_dmuc', FALSE, 'madm', ["madm","mota","",""], [], [], [], [], [], [], '', '');
		$this->fields['madm'] = &$this->madm;
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
			$sortFieldList = ($fld->VirtualExpression != "") ? $fld->VirtualExpression : $sortField;
			$this->setSessionOrderByList($sortFieldList . " " . $thisSort); // Save to Session
		} else {
			$fld->setSort("");
		}
	}

	// Session ORDER BY for List page
	public function getSessionOrderByList()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST")];
	}
	public function setSessionOrderByList($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST")] = $v;
	}

	// Current detail table name
	public function getCurrentDetailTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE")];
	}
	public function setCurrentDetailTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE")] = $v;
	}

	// Get detail url
	public function getDetailUrl()
	{

		// Detail url
		$detailUrl = "";
		if ($this->getCurrentDetailTable() == "bhld_ctctu") {
			$detailUrl = $GLOBALS["bhld_ctctu"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_mact=" . urlencode($this->mact->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "bhld_ctulist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`bhld_ctu`";
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
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT *, (SELECT CAST(`manv` AS CHAR CHARACTER SET utf8mb4)) AS `ma` FROM " . $this->getSqlFrom();
	}
	public function sqlSelect() // For backward compatibility
	{
		return $this->getSqlSelect();
	}
	public function setSqlSelect($v)
	{
		$this->SqlSelect = $v;
	}
	public function getSqlSelectList() // Select for List page
	{
		$select = "";
		$select = "SELECT * FROM (" .
			"SELECT *, (SELECT CAST(`manv` AS CHAR CHARACTER SET utf8mb4)) AS `ma`, (SELECT CONCAT(COALESCE(`manv`, ''),'" . ValueSeparator(1, $this->manv) . "',COALESCE(`tennhanvien`,'')) FROM `bhld_nhanvien` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`manv` = `bhld_ctu`.`manv` LIMIT 1) AS `EV__manv` FROM `bhld_ctu`" .
			") `TMP_TABLE`";
		return ($this->SqlSelectList != "") ? $this->SqlSelectList : $select;
	}
	public function sqlSelectList() // For backward compatibility
	{
		return $this->getSqlSelectList();
	}
	public function setSqlSelectList($v)
	{
		$this->SqlSelectList = $v;
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
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "`ngct` DESC";
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
		if ($this->useVirtualFields()) {
			$select = $this->getSqlSelectList();
			$sort = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
		} else {
			$select = $this->getSqlSelect();
			$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		}
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = ($this->useVirtualFields()) ? $this->getSessionOrderByList() : $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Check if virtual fields is used in SQL
	protected function useVirtualFields()
	{
		$where = $this->UseSessionForListSql ? $this->getSessionWhere() : $this->CurrentFilter;
		$orderBy = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
		if ($where != "")
			$where = " " . str_replace(["(", ")"], ["", ""], $where) . " ";
		if ($orderBy != "")
			$orderBy = " " . str_replace(["(", ")"], ["", ""], $orderBy) . " ";
		if ($this->BasicSearch->getKeyword() != "")
			return TRUE;
		if (ContainsString($orderBy, " " . $this->manv->VirtualExpression . " "))
			return TRUE;
		return FALSE;
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
		if ($this->useVirtualFields())
			$sql = BuildSelectSql($this->getSqlSelectList(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		else
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

		// Cascade Update detail table 'bhld_ctctu'
		$cascadeUpdate = FALSE;
		$rscascade = [];
		if ($rsold && (isset($rs['mact']) && $rsold['mact'] != $rs['mact'])) { // Update detail field 'mact'
			$cascadeUpdate = TRUE;
			$rscascade['mact'] = $rs['mact'];
		}
		if ($cascadeUpdate) {
			if (!isset($GLOBALS["bhld_ctctu"]))
				$GLOBALS["bhld_ctctu"] = new bhld_ctctu();
			$rswrk = $GLOBALS["bhld_ctctu"]->loadRs("`mact` = " . QuotedValue($rsold['mact'], DATATYPE_STRING, 'DB'));
			while ($rswrk && !$rswrk->EOF) {
				$rskey = [];
				$fldname = 'mact';
				$rskey[$fldname] = $rswrk->fields[$fldname];
				$fldname = 'mavt';
				$rskey[$fldname] = $rswrk->fields[$fldname];
				$rsdtlold = &$rswrk->fields;
				$rsdtlnew = array_merge($rsdtlold, $rscascade);

				// Call Row_Updating event
				$success = $GLOBALS["bhld_ctctu"]->Row_Updating($rsdtlold, $rsdtlnew);
				if ($success)
					$success = $GLOBALS["bhld_ctctu"]->update($rscascade, $rskey, $rswrk->fields);
				if (!$success)
					return FALSE;

				// Call Row_Updated event
				$GLOBALS["bhld_ctctu"]->Row_Updated($rsdtlold, $rsdtlnew);
				$rswrk->moveNext();
			}
		}
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

		// Cascade delete detail table 'bhld_ctctu'
		if (!isset($GLOBALS["bhld_ctctu"]))
			$GLOBALS["bhld_ctctu"] = new bhld_ctctu();
		$rscascade = $GLOBALS["bhld_ctctu"]->loadRs("`mact` = " . QuotedValue($rs['mact'], DATATYPE_STRING, "DB"));
		$dtlrows = ($rscascade) ? $rscascade->getRows() : [];

		// Call Row Deleting event
		foreach ($dtlrows as $dtlrow) {
			$success = $GLOBALS["bhld_ctctu"]->Row_Deleting($dtlrow);
			if (!$success)
				break;
		}
		if ($success) {
			foreach ($dtlrows as $dtlrow) {
				$success = $GLOBALS["bhld_ctctu"]->delete($dtlrow); // Delete
				if (!$success)
					break;
			}
		}

		// Call Row Deleted event
		if ($success) {
			foreach ($dtlrows as $dtlrow)
				$GLOBALS["bhld_ctctu"]->Row_Deleted($dtlrow);
		}
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
		$this->mact->DbValue = $row['mact'];
		$this->ngct->DbValue = $row['ngct'];
		$this->mapb->DbValue = $row['mapb'];
		$this->ma->DbValue = $row['ma'];
		$this->manv->DbValue = $row['manv'];
		$this->ghichu->DbValue = $row['ghichu'];
		$this->madm->DbValue = $row['madm'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`mact` = '@mact@'";
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
			return "bhld_ctulist.php";
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
		if ($pageName == "bhld_ctuview.php")
			return $Language->phrase("View");
		elseif ($pageName == "bhld_ctuedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "bhld_ctuadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "bhld_ctulist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("bhld_ctuview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("bhld_ctuview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "bhld_ctuadd.php?" . $this->getUrlParm($parm);
		else
			$url = "bhld_ctuadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("bhld_ctuedit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("bhld_ctuedit.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
		if ($parm != "")
			$url = $this->keyUrl("bhld_ctuadd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("bhld_ctuadd.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
		return $this->keyUrl("bhld_ctudelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "mact:" . JsonEncode($this->mact->CurrentValue, "string");
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
			if (Param("mact") !== NULL)
				$arKeys[] = Param("mact");
			elseif (IsApi() && Key(0) !== NULL)
				$arKeys[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKeys[] = Route(2);
			else
				$arKeys = NULL; // Do not setup

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
			if ($setCurrent)
				$this->mact->CurrentValue = $key;
			else
				$this->mact->OldValue = $key;
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
		$this->mact->setDbValue($rs->fields('mact'));
		$this->ngct->setDbValue($rs->fields('ngct'));
		$this->mapb->setDbValue($rs->fields('mapb'));
		$this->ma->setDbValue($rs->fields('ma'));
		$this->manv->setDbValue($rs->fields('manv'));
		$this->ghichu->setDbValue($rs->fields('ghichu'));
		$this->madm->setDbValue($rs->fields('madm'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// mact
		// ngct
		// mapb
		// ma
		// manv
		// ghichu
		// madm
		// mact

		$this->mact->ViewValue = $this->mact->CurrentValue;
		$this->mact->ViewCustomAttributes = "";

		// ngct
		$this->ngct->ViewValue = $this->ngct->CurrentValue;
		$this->ngct->ViewValue = FormatDateTime($this->ngct->ViewValue, 7);
		$this->ngct->ViewCustomAttributes = "";

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

		// ma
		$this->ma->ViewValue = $this->ma->CurrentValue;
		$this->ma->ViewCustomAttributes = "";

		// manv
		if ($this->manv->VirtualValue != "") {
			$this->manv->ViewValue = $this->manv->VirtualValue;
		} else {
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
		}
		$this->manv->ViewCustomAttributes = "";

		// ghichu
		$this->ghichu->ViewValue = $this->ghichu->CurrentValue;
		$this->ghichu->ViewCustomAttributes = "";

		// madm
		$curVal = strval($this->madm->CurrentValue);
		if ($curVal != "") {
			$this->madm->ViewValue = $this->madm->lookupCacheOption($curVal);
			if ($this->madm->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`madm`" . SearchString("=", $curVal, DATATYPE_STRING, "");
				$sqlWrk = $this->madm->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$this->madm->ViewValue = $this->madm->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->madm->ViewValue = $this->madm->CurrentValue;
				}
			}
		} else {
			$this->madm->ViewValue = NULL;
		}
		$this->madm->ViewCustomAttributes = "";

		// mact
		$this->mact->LinkCustomAttributes = "";
		$this->mact->HrefValue = "";
		$this->mact->TooltipValue = "";

		// ngct
		$this->ngct->LinkCustomAttributes = "";
		$this->ngct->HrefValue = "";
		$this->ngct->TooltipValue = "";

		// mapb
		$this->mapb->LinkCustomAttributes = "";
		$this->mapb->HrefValue = "";
		$this->mapb->TooltipValue = "";

		// ma
		$this->ma->LinkCustomAttributes = "";
		$this->ma->HrefValue = "";
		$this->ma->TooltipValue = "";

		// manv
		$this->manv->LinkCustomAttributes = "";
		$this->manv->HrefValue = "";
		$this->manv->TooltipValue = "";

		// ghichu
		$this->ghichu->LinkCustomAttributes = "";
		$this->ghichu->HrefValue = "";
		$this->ghichu->TooltipValue = "";

		// madm
		$this->madm->LinkCustomAttributes = "";
		$this->madm->HrefValue = "";
		$this->madm->TooltipValue = "";

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

		// mapb
		$this->mapb->EditAttrs["class"] = "form-control";
		$this->mapb->EditCustomAttributes = "";

		// ma
		$this->ma->EditAttrs["class"] = "form-control";
		$this->ma->EditCustomAttributes = "";
		if (!$this->ma->Raw)
			$this->ma->CurrentValue = HtmlDecode($this->ma->CurrentValue);
		$this->ma->EditValue = $this->ma->CurrentValue;
		$this->ma->PlaceHolder = RemoveHtml($this->ma->caption());

		// manv
		$this->manv->EditAttrs["class"] = "form-control";
		$this->manv->EditCustomAttributes = "";

		// ghichu
		$this->ghichu->EditAttrs["class"] = "form-control";
		$this->ghichu->EditCustomAttributes = "";
		if (!$this->ghichu->Raw)
			$this->ghichu->CurrentValue = HtmlDecode($this->ghichu->CurrentValue);
		$this->ghichu->EditValue = $this->ghichu->CurrentValue;
		$this->ghichu->PlaceHolder = RemoveHtml($this->ghichu->caption());

		// madm
		$this->madm->EditAttrs["class"] = "form-control";
		$this->madm->EditCustomAttributes = "";

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
					$doc->exportCaption($this->mact);
					$doc->exportCaption($this->ngct);
					$doc->exportCaption($this->mapb);
					$doc->exportCaption($this->manv);
					$doc->exportCaption($this->ghichu);
					$doc->exportCaption($this->madm);
				} else {
					$doc->exportCaption($this->mact);
					$doc->exportCaption($this->ngct);
					$doc->exportCaption($this->mapb);
					$doc->exportCaption($this->ma);
					$doc->exportCaption($this->manv);
					$doc->exportCaption($this->ghichu);
					$doc->exportCaption($this->madm);
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
						$doc->exportField($this->mact);
						$doc->exportField($this->ngct);
						$doc->exportField($this->mapb);
						$doc->exportField($this->manv);
						$doc->exportField($this->ghichu);
						$doc->exportField($this->madm);
					} else {
						$doc->exportField($this->mact);
						$doc->exportField($this->ngct);
						$doc->exportField($this->mapb);
						$doc->exportField($this->ma);
						$doc->exportField($this->manv);
						$doc->exportField($this->ghichu);
						$doc->exportField($this->madm);
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
		$rs = Execute("SELECT mact FROM `bhld_ctctu` WHERE sl=0");
		if ($rs && $rs->RecordCount() > 0)
		{
			$sFilter = "";
			while (!$rs->EOF) {
				$sFilter .= " mact = '".$rs->fields("mact")."' OR";
				$rs->MoveNext();
			}
			$sFilter = rtrim($sFilter, "OR");
			AddFilter($filter, $sFilter);
			$rs->Close();
		}
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:

	/*
		if(empty($this->ngct->AdvancedSearch->SearchValue)){
			$ngay=$this->ngct->AdvancedSearch->SearchValue;
			$old_date=explode('/',$ngay);
		    $new_date=$old_date[2].'-'.$old_date[1].'-'.$old_date[0];
			$lastday = date('t',strtotime($new_date));
			$new_date2=$old_date[2].'-'.$old_date[1].'-'.$lastday;
			$this->ngct->AdvancedSearch->SearchValue=$new_date2;
		}*/
	}
	// Recordset Searching event
	function Recordset_Searching(&$filter) {
		//die($filter);
		//AddFilter($filter, " OR ngct <= '2022-05-31'");
		if(!empty($this->ngct->AdvancedSearch->SearchValue))
		{
			$ngay=$this->ngct->AdvancedSearch->SearchValue;
			$old_date=explode('/',$ngay);
		    $new_date=$old_date[2].'-'.$old_date[1].'-'.$old_date[0];
			$lastday = date('t',strtotime($new_date));
			$new_date2=$old_date[2].'-'.$old_date[1].'-'.$lastday;
			$filter = str_replace($new_date,$new_date2,$filter);
		}
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
		$rs = ExecuteRow("SELECT mapb FROM `bhld_nhanvien` WHERE manv=".$rsnew['manv']);
		$old_date=explode('-',$rsnew['ngct']);
		if(strlen($rsnew['manv'])==4)
			$new_mact=$old_date[0].'-'.$old_date[1].'-'.$rs['mapb'].'-0'.$rsnew['manv'];
		else
			$new_mact=$old_date[0].'-'.$old_date[1].'-'.$rs['mapb'].'-'.$rsnew['manv'];
		$rsnew['mact']=$new_mact;
		$rsnew['mapb']=$rs['mapb'];
		$rsnew['ghichu']= $new_mact;
		$sql="INSERT IGNORE INTO `bhld_ctu`(`mact`, `manv`, `ngct`, `mapb`, `ghichu`, `madm`)
				VALUES ('".$rsnew['mact']."',"
						 .$rsnew['manv'].",'"
						 .$rsnew['ngct']."','"
						 .$rsnew['mapb']."','"
						 .$rsnew['ghichu']."','"
						 .$rsnew['madm']
				."')";
		Execute($sql);
		//return TRUE;
		//Insert detail
		$rs = ExecuteRow("SELECT mapb FROM `bhld_nhanvien` WHERE manv=".$rsnew['manv']);
		$old_date=explode('-',$rsnew['ngct']);
		if(strlen($rsnew['manv'])==4)
			$new_mact=$old_date[0].'-'.$old_date[1].'-'.$rs['mapb'].'-0'.$rsnew['manv'];
		else
			$new_mact=$old_date[0].'-'.$old_date[1].'-'.$rs['mapb'].'-'.$rsnew['manv'];
		$sql="INSERT IGNORE INTO `bhld_ctctu`(`mact`, `mavt`, `ngnhan`, `sl`, `ngnhantt`, `dmtg`) 
			SELECT '".$new_mact."' as mact,
			mavt,'1911-11-11' as ngnhan,0 as sl,'1911-11-11' as ngnhantt,dmuc as dmtg
			FROM `bhld_ctdmuc`
			WHERE madm='".$rsnew['madm']."'";
		Execute($sql);
		$this->terminate("bhld_ctctulist.php?showmaster=bhld_ctu&fk_mact=" . $rsnew['mact']);
		return FALSE;
	}
	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {
		//echo "Row Inserted"
		//$rs = ExecuteRow("SELECT * FROM bhld_ctdmuc where madm='". $rsnew['madm']."'");
		// Đã cancel Row_inserting
		//Code ko còn giá trị
		$rs = ExecuteRow("SELECT mapb FROM `bhld_nhanvien` WHERE manv=".$rsnew['manv']);
		$old_date=explode('-',$rsnew['ngct']);
		if(strlen($rsnew['manv'])==4)
			$new_mact=$old_date[0].'-'.$old_date[1].'-'.$rs['mapb'].'-0'.$rsnew['manv'];
		else
			$new_mact=$old_date[0].'-'.$old_date[1].'-'.$rs['mapb'].'-'.$rsnew['manv'];
		$sql="INSERT INTO `bhld_ctctu`(`mact`, `mavt`, `ngnhan`, `sl`, `ngnhantt`, `dmtg`) 
			SELECT '".$new_mact."' as mact,
			mavt,'1911-11-11' as ngnhan,0 as sl,'1911-11-11' as ngnhantt,dmuc as dmtg
			FROM `bhld_ctdmuc`
			WHERE madm='".$rsnew['madm']."'";
		Execute($sql);
		$this->terminate("bhld_ctctulist.php?showmaster=bhld_ctu&fk_mact=" . $rsnew['mact']);
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

		/*
		if ($this->bhld_view_chuanhan_Count == 0) {
			$this->RowAttrs["style"] = "display: none;";
		}*/
		global $THOUSANDS_SEP;
		$this->manv->ViewValue = str_replace($THOUSANDS_SEP, "", $this->manv->ViewValue);
	}
	// User ID Filtering event
	function UserID_Filtering(&$filter) {
		// Enter your code here
	}
}
?>
<?php

// Include classes
require_once "db.php";
include_once('tbs_class.php'); // Load the TinyButStrong template engine
include_once('tbs_plugin_opentbs.php'); // Load the OpenTBS plugin
//require_once "db.php";
// prevent from a PHP configuration problem when using mktime() and date()
if (version_compare(PHP_VERSION,'5.1.0')>=0) {
	if (ini_get('date.timezone')=='') {
		date_default_timezone_set('UTC');
	}
}


$TBS = new \clsTinyButStrong();
$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); 

$giaydibienId = (isset($_GET['giaydibienId'])) ? $_GET['giaydibienId'] : '';
$giaydibienId = trim(''.$giaydibienId);
if ($yourname=='') $yourname = "";


$template = 'giaydibien2.docx';
$TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8); 
global $bophan,$noidung,$duan,$diadiem,$tenduan;
//$TBS->Plugin(OPENTBS_DEBUG_XML_CURRENT, true);

if (isset($_POST['debug']) && ($_POST['debug']=='info'))    $TBS->Plugin(OPENTBS_DEBUG_INFO, true); // 
if (isset($_POST['debug']) && ($_POST['debug']=='show'))    $TBS->Plugin(OPENTBS_DEBUG_XML_SHOW); // Tells 




//global $soyc,$ngaytg;
//$soyc="1";
//$ngaytg='2020-08-08';

///$id=explode(",", $giaydibienId);
$id= implode(',', array_map('intval', explode(',', $giaydibienId)));

$mySql="SELECT nhan_vien.danh_so, nhan_vien.ten_nhan_vien, bo_phan.ten_bo_phan,
  giay_di_bien.ngay_di, giay_di_bien.nhiem_vu, gian_khoan.ten_gian_khoan,
  giay_di_bien.ngay_cap, giay_di_bien.so_cong_lenh
FROM giay_di_bien INNER JOIN
  nhan_vien ON nhan_vien.nhan_vien_id = giay_di_bien.nhan_vien_id INNER JOIN
  bo_phan ON nhan_vien.bo_phan_id = bo_phan.bo_phan_id INNER JOIN
  gian_khoan ON giay_di_bien.gian_id = gian_khoan.gian_khoan_id
		WHERE giay_di_bien_id IN (".$id.")";


$data = array();
$sData = "";
$stt=0;
$pre_danh_so=0;


if ($result = $conn -> query($mySql)) {
  while ($row = mysqli_fetch_array($result)) {
  	$tennhanvien = $row["ten_nhan_vien"]; // get the value of first field
	
	$data[] = array('danh_so'=>$row["danh_so"],'tennhanvien'=>$tennhanvien,
					'ngay_di'=>$row["ngay_di"],
					'ten_bo_phan'=>$row["ten_bo_phan"],
					'nhiem_vu'=>$row["nhiem_vu"],
					'ten_gian_khoan'=>$row["ten_gian_khoan"],
					'soyc'=>$row["so_cong_lenh"],
					'ngay_cap'=>$row["ngay_cap"]

					);
	
  }
  $result -> free_result();
}

$conn -> close();

$TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8); 
$TBS->MergeBlock('c', $data);


// Define the name of the output file
$save_as = (isset($_POST['save_as']) && (trim($_POST['save_as'])!=='') && ($_SERVER['SERVER_NAME']=='localhost')) ? trim($_POST['save_as']) : '';
$output_file_name = str_replace('.', '_'.date('Y-m-d').$save_as.'.', $template);
if ($save_as==='') {
	// Output the result as a downloadable file (only streaming, no data saved in the server)
	$TBS->Show(OPENTBS_DOWNLOAD, $output_file_name); // Also merges all [onshow] automatic fields.
	// Be sure that no more output is done, otherwise the download file is corrupted with extra data.
	exit();
} else {
	// Output the result as a file on the server.
	$TBS->Show(OPENTBS_FILE, $output_file_name); // Also merges all [onshow] automatic fields.
	// The script can continue.
	exit("File [$output_file_name] has been created.");
}
?>
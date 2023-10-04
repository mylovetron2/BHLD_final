<?php

// Include classes
require_once "db.php";
include_once('tbs_class.php'); // Load the TinyButStrong template engine
include_once('tbs_plugin_opentbs.php'); // Load the OpenTBS plugin

if (version_compare(PHP_VERSION,'5.1.0')>=0) {
	if (ini_get('date.timezone')=='') {
		date_default_timezone_set('UTC');
	}
}


$TBS = new \clsTinyButStrong();
$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); 

$ngay = (isset($_GET['ngay'])) ? $_GET['ngay'] : '';
$ngay = trim(''.$ngay);

$template = 'thongke_tong_danhan.docx';
$TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8); 

global $showngay,$showngayin,$total;

$old_date=explode('/',$ngay);
$new_date=$old_date[2].'-'.$old_date[1].'-'.$old_date[0];

$lastday = date('t',strtotime($new_date));
$new_date2=$old_date[2].'-'.$old_date[1].'-'.$lastday;
//$new_date2=$old_date[2].'-'.$old_date[1].'-'.$lastday;

$showngay=$old_date[1]."-".$old_date[2];

$showngayin=$ngay;

if (isset($_POST['debug']) && ($_POST['debug']=='info'))    $TBS->Plugin(OPENTBS_DEBUG_INFO, true); // 
if (isset($_POST['debug']) && ($_POST['debug']=='show'))    $TBS->Plugin(OPENTBS_DEBUG_XML_SHOW); // Tells 


$data_nhanvien = array();

$mySql="SELECT *,SUM(bhld_view_chungtu_danhan_final.sl) as count FROM `bhld_view_chungtu_danhan_final` 
INNER JOIN bhld_dmvattu on bhld_dmvattu.mavt=bhld_view_chungtu_danhan_final.mavt
WHERE month(ngnhan)=month('".$new_date2."') and year(ngnhan)=year('".$new_date2."')
GROUP by bhld_view_chungtu_danhan_final.mavt";
       
if ($result = $conn -> query($mySql)) {
    $data_temp=array();
    while ($row = mysqli_fetch_array($result)) {
            
            $data_temp[]=array('mavt'=>$row["mavt"],
                            'tenvt'=>$row["tenvt"],
                            'dvt'=>$row["dvt"],
                            'count'=>$row["count"],
                            );
    }
}

$mySql="SELECT sum(sl) FROM `bhld_view_chungtu_danhan_final`
       WHERE month(ngnhan)=month('".$new_date2."') and year(ngnhan)=year('".$new_date2."')";
$MyResult = mysqli_query($conn,$mySql);
$row=mysqli_fetch_row($MyResult);
$total=$row[0];


$result -> free_result();
$TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8); 

$TBS->MergeBlock('main',$data_temp);


$conn -> close();






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
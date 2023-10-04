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

//$giaydibienId = (isset($_GET['giaydibienId'])) ? $_GET['giaydibienId'] : '';
//$giaydibienId = trim(''.$giaydibienId);
$ngay = (isset($_GET['ngay'])) ? $_GET['ngay'] : '';
$ngay = trim(''.$ngay);

$template = 'chung_tu_chua_nhan_3.docx';
$TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8); 

global $showngay,$showngayin;

$old_date=explode('/',$ngay);
$new_date=$old_date[2].'-'.$old_date[1].'-'.$old_date[0];

$lastday = date('t',strtotime($new_date));
$new_date2=$old_date[2].'-'.$old_date[1].'-'.$lastday;

$showngay="Tháng ".$old_date[1]."-".$old_date[2];

$showngayin=$ngay;

//$TBS->Plugin(OPENTBS_DEBUG_XML_CURRENT, true);

if (isset($_POST['debug']) && ($_POST['debug']=='info'))    $TBS->Plugin(OPENTBS_DEBUG_INFO, true); // 
if (isset($_POST['debug']) && ($_POST['debug']=='show'))    $TBS->Plugin(OPENTBS_DEBUG_XML_SHOW); // Tells 


///$id=explode(",", $giaydibienId);
//$id= implode(',', array_map('intval', explode(',', $giaydibienId)));

//$data = array();
$data_nhanvien = array();

$mySql1="SELECT * FROM bhld_phongban ORDER BY mapb ASC";
if($result1 = $conn -> query($mySql1)){
    while($row1 = mysqli_fetch_array($result1)){
        $pb=$row1["mapb"];
        $tenpb=$row1["tenphong"];
        
        
        $mySql="SELECT manv,tennhanvien,mact,ngct,SUM(GiayBH) as GiayBH,
                SUM(MuBH) as MuBH,Sum(QuanAo) as QuanAo,
                SUM(Kinh) as Kinh,Sum(AoMua) as AoMua,
                SUM(NutTai) as NutTai,Sum(PhinLoc) as PhinLoc
                FROM bhld_view_chungtu_chuanhan_final WHERE mapb='".$pb."' and ngct<='".$new_date2."'
                GROUP BY manv ";

       
        if ($result = $conn -> query($mySql)) {
            $data_temp=array();
            while ($row = mysqli_fetch_array($result)) {
                    
                    $data_temp[]=array('tennhanvien'=>$row["tennhanvien"],
                                    'manv'=>$row["manv"],
                                    'giaybh'=>$row["GiayBH"],
                                    'mubh'=>$row["MuBH"],
                                    'quanao'=>$row["QuanAo"],
                                    'kinh'=>$row["Kinh"],
                                    'aomua'=>$row["AoMua"],
                                    'nuttai'=>$row["NutTai"],
                                    'phinloc'=>$row["PhinLoc"]
                                        );
            }
        }

        if(count($data_temp)>0)
            $data[]=array('name'=>$tenpb, 'spokenlg'=>$data_temp);
        
    }

}


$result -> free_result();
/*
$data = array(
                //array('name'=>'Peter', 'spokenlg'=>array( 'US', 'FR' ) ),
                array('name'=>'xưởng sửa chữa ', 'spokenlg'=>$data_temp),
                array('name'=>'xưởng sửa chữa 2', 'spokenlg'=>$data_temp),
    );
*/

$TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8); 


//$TBS->MergeBlock('body', $data);

$TBS->MergeBlock('main',$data);

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
<?php
namespace PHPMaker2020\projectBHLD;

// Menu Language
if ($Language && function_exists(PROJECT_NAMESPACE . "Config") && $Language->LanguageFolder == Config("LANGUAGE_FOLDER")) {
	$MenuRelativePath = "";
	$MenuLanguage = &$Language;
} else { // Compat reports
	$LANGUAGE_FOLDER = "../lang/";
	$MenuRelativePath = "../";
	$MenuLanguage = new Language();
}

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(110, "mi_bhld_phongban", $MenuLanguage->MenuPhrase("110", "MenuText"), $MenuRelativePath . "bhld_phongbanlist.php", -1, "", IsLoggedIn() || AllowListMenu('{1DE41E66-CD1F-4379-A8DD-99D0FBA14385}bhld_phongban'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(114, "mi_bhld_nhanvien", $MenuLanguage->MenuPhrase("114", "MenuText"), $MenuRelativePath . "bhld_nhanvienlist.php", -1, "", IsLoggedIn() || AllowListMenu('{1DE41E66-CD1F-4379-A8DD-99D0FBA14385}bhld_nhanvien'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(3, "mi_bhld_dmvattu", $MenuLanguage->MenuPhrase("3", "MenuText"), $MenuRelativePath . "bhld_dmvattulist.php", -1, "", IsLoggedIn() || AllowListMenu('{1DE41E66-CD1F-4379-A8DD-99D0FBA14385}bhld_dmvattu'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(108, "mi_bhld_dmuc", $MenuLanguage->MenuPhrase("108", "MenuText"), $MenuRelativePath . "bhld_dmuclist.php", -1, "", IsLoggedIn() || AllowListMenu('{1DE41E66-CD1F-4379-A8DD-99D0FBA14385}bhld_dmuc'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(111, "mi_bhld_ctu", $MenuLanguage->MenuPhrase("111", "MenuText"), $MenuRelativePath . "bhld_ctulist.php", -1, "", IsLoggedIn() || AllowListMenu('{1DE41E66-CD1F-4379-A8DD-99D0FBA14385}bhld_ctu'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(116, "mi_bhld_view_chungtu_chuanhan_final", $MenuLanguage->MenuPhrase("116", "MenuText"), $MenuRelativePath . "bhld_view_chungtu_chuanhan_finallist.php", -1, "", IsLoggedIn() || AllowListMenu('{1DE41E66-CD1F-4379-A8DD-99D0FBA14385}bhld_view_chungtu_chuanhan_final'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(240, "mci_BHLD_đã_nhận", $MenuLanguage->MenuPhrase("240", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "", "", FALSE);
$sideMenu->addMenuItem(119, "mi_bhld_view_nhanvien", $MenuLanguage->MenuPhrase("119", "MenuText"), $MenuRelativePath . "bhld_view_nhanvienlist.php", 240, "", IsLoggedIn() || AllowListMenu('{1DE41E66-CD1F-4379-A8DD-99D0FBA14385}bhld_view_nhanvien'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(241, "mi__bhld_view_chungtu_danhan_theothang_master", $MenuLanguage->MenuPhrase("241", "MenuText"), $MenuRelativePath . "_bhld_view_chungtu_danhan_theothang_masterlist.php", 240, "", IsLoggedIn() || AllowListMenu('{1DE41E66-CD1F-4379-A8DD-99D0FBA14385}bhld_view_chungtu_danhan_theothang_master'), FALSE, FALSE, "", "", FALSE);
echo $sideMenu->toScript();
?>
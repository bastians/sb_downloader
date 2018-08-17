<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');
include_once(t3lib_extMgm::extPath($_EXTKEY).'pi1/class.tx_sbdownloader_addFieldsToFlexForm.php');

$TCA["tx_sbdownloader_images"] = array (
	"ctrl" => array (
		'title'     => 'LLL:EXT:sb_downloader/locallang_db.xml:tx_sbdownloader_images',
		'label'     => 'name',
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'versioningWS' => TRUE, 
		'origUid' => 't3_origuid',
		'languageField'            => 'sys_language_uid',
		'transOrigPointerField'    => 'l18n_parent',
		'transOrigDiffSourceField' => 'l18n_diffsource',
		// 'default_sortby' => "ORDER BY name",
		'sortby' => 'sorting',
		'delete' => 'deleted',
		'enablecolumns' => array (
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_sbdownloader_images.gif',
	),
	"feInterface" => array (
		"fe_admin_fieldList" => "sys_language_uid, l18n_parent, l18n_diffsource, hidden, cat, name, image, imagepreview, linkdescription, downloaddescription, description, longdescription, metatags, clicks,related",
	)
);

$TCA["tx_sbdownloader_cat"] = array (
	"ctrl" => array (
		'title'     => 'LLL:EXT:sb_downloader/locallang_db.xml:tx_sbdownloader_cat',
		'label'     => 'cat',
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'versioningWS' => TRUE, 
		'origUid' => 't3_origuid',
		'languageField'            => 'sys_language_uid',
		'transOrigPointerField'    => 'l18n_parent',
		'transOrigDiffSourceField' => 'l18n_diffsource',
		'default_sortby' => "ORDER BY crdate",
		'delete' => 'deleted',
		'enablecolumns' => array (
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_sbdownloader_cat.gif',
	),
	"feInterface" => array (
		"fe_admin_fieldList" => "sys_language_uid, l18n_parent, l18n_diffsource, hidden, cat, parent_cat",
	)
);

// insert CSS file
t3lib_extMgm::addStaticFile($_EXTKEY,'static/css/','downloader');

t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='layout,select_key';
t3lib_extMgm::addPiFlexFormValue($_EXTKEY.'_pi1', 'FILE:EXT:'.$_EXTKEY.'/pi1/flexform.xml');
// you add pi_flexform to be renderd when your plugin is shown
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1']='pi_flexform';                   // new!
t3lib_extMgm::addPlugin(array('LLL:EXT:sb_downloader/locallang_db.xml:tt_content.list_type_pi1', $_EXTKEY.'_pi1'),'list_type');

if (TYPO3_MODE=='BE'){
	// class for displaying the unit tree in BE forms.
	include_once(t3lib_extMgm::extPath($_EXTKEY).'class.tx_sbdownloader_treeview.php');
}

// t3lib_div::loadTCA("pages"); 

?>

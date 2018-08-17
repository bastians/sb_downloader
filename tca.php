<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA["tx_sbdownloader_images"] = array (
	"ctrl" => $TCA["tx_sbdownloader_images"]["ctrl"],
	"interface" => array (
		"showRecordFieldList" => "sys_language_uid,l18n_parent,l18n_diffsource,hidden,name,image,externallinks,description,longdescription,clicks,cat,shortlink,related"
	),
	"feInterface" => $TCA["tx_sbdownloader_images"]["feInterface"],
	"columns" => array (
		't3ver_label' => array (
			'label'  => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array (
				'type' => 'input',
				'size' => 30,
				'max'  => 30,
			)
		),
		'sys_language_uid' => array (
			'exclude' => 1,
			'label'  => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array (
				'type'                => 'select',
				'foreign_table'       => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				)
			)
		),
		'l18n_parent' => array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude'     => 1,
			'label'       => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config'      => array (
				'type'  => 'select',
				'items' => array (
					array('', 0),
				),
				'foreign_table'       => 'tx_sbdownloader_images',
				'foreign_table_where' => 'AND tx_sbdownloader_images.pid=###CURRENT_PID### AND tx_sbdownloader_images.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => array (
			'config' => array (
				'type' => 'passthrough'
			)
		),
		'hidden' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		'usercheck' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:sb_downloader/locallang_db.xml:tx_sbdownloader_images.usercheck',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),		
		"name" => Array (
			"exclude" => 1,
			"label" => "LLL:EXT:sb_downloader/locallang_db.xml:tx_sbdownloader_images.name",
			"config" => Array (
				"type" => "input",
				"size" => "30",
			)
		),
		"image" => Array (
			"exclude" => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			"label" => "LLL:EXT:sb_downloader/locallang_db.xml:tx_sbdownloader_images.image",
			"config" => Array (
				"type" => "group",
				"internal_type" => "file",
				"allowed" => "",
				"disallowed" => "php,php3",
				"max_size" => 1000000,
				"uploadfolder" => "uploads/tx_sbdownloader",
				"show_thumbs" => 1,
				"size" => 10,
				"minitems" => 0,
				"maxitems" => 40,
			)
		),
		"externallinks" => Array (
			"exclude" => 1,
			"label" => "LLL:EXT:sb_downloader/locallang_db.xml:tx_sbdownloader_images.externallinks",
			"config" => Array (
				"type" => "text",
				"cols" => 30,
				"rows" => 5,
			)
		),
		"imagepreview" => Array (
			"exclude" => 1,
			"label" => "LLL:EXT:sb_downloader/locallang_db.xml:tx_sbdownloader_images.imagepreview",
			"config" => Array (
				"type" => "group",
				"internal_type" => "file",
				"allowed" => "jpg,gif,png",
				"max_size" => 10000,
				"uploadfolder" => "uploads/tx_sbdownloader",
				"show_thumbs" => 1,
				"size" => 1,
				"minitems" => 0,
				"maxitems" => 1,
			)
		),
		"downloaddescription" => Array (
			"exclude" => 1,
			"label" => "LLL:EXT:sb_downloader/locallang_db.xml:tx_sbdownloader_images.imagedescription",
			"config" => Array (
				"type" => "text",
				"cols" => "30",
				"rows" => "5",
			)
		),
		"metatags" => Array (
			"exclude" => 1,
			"label" => "LLL:EXT:sb_downloader/locallang_db.xml:tx_sbdownloader_images.metatags",
			"config" => Array (
				"type" => "text",
				"cols" => "50",
				"rows" => "5",
			)
		),		
		"linkdescription" => Array (
			"exclude" => 1,
			"label" => "LLL:EXT:sb_downloader/locallang_db.xml:tx_sbdownloader_images.linkdescription",
			"config" => Array (
				"type" => "text",
				"cols" => "30",
				"rows" => "5",
			)
		),
		"description" => Array (
			"exclude" => 1,
			"label" => "LLL:EXT:sb_downloader/locallang_db.xml:tx_sbdownloader_images.description",
			"config" => Array (
				"type" => "text",
				"cols" => "30",
				"rows" => "5",
			)
		),
		"longdescription" => Array (
			"exclude" => 1,
			"label" => "LLL:EXT:sb_downloader/locallang_db.xml:tx_sbdownloader_images.longdescription",
			"config" => Array (
				"type" => "text",
				"cols" => "30",
				"rows" => "5",
				"wizards" => Array(
					"_PADDING" => 2,
					"RTE" => array(
						"notNewRecords" => 1,
						"RTEonly" => 1,
						"type" => "script",
						"title" => "Full screen Rich Text Editing|Formatteret redigering i hele vinduet",
						"icon" => "wizard_rte2.gif",
						"script" => "wizard_rte.php",
					),
				),
			)
		),
		"clicks" => Array (
			"exclude" => 1,
			"label" => "LLL:EXT:sb_downloader/locallang_db.xml:tx_sbdownloader_images.clicks",
			"config" => Array (
				"type" => "none",
			)
		),
		"shortlink" => Array (
			"exclude" => 1,
			"label" => "LLL:EXT:sb_downloader/locallang_db.xml:tx_sbdownloader_images.shortlink",
			"config" => Array (
				"type" => "input",
				"size" => "30",
			)
		),
		
		"related" => Array (
			"exclude" => 1,
			"label" => "LLL:EXT:sb_downloader/locallang_db.xml:tx_sbdownloader_images.related",
			"config" => Array (
				"type" => "group",	
				"internal_type" => "db",	
				"allowed" => "tx_sbdownloader_images",					
				"size" => 5,
				"minitems" => 0,
				"maxitems" => 10,
			)
		),			
        'cat' => Array (
            'exclude' => 1,
			'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:sb_downloader/locallang_db.xml:tx_sbdownloader_images.cat',
			'config' => Array (
				'type' => 'select',
				'form_type' => 'user',
				'userFunc' => 'tx_sbdownloader_treeview->displayHierarchyTree',
				'treeView' => 1,
				'size' => 10,
				'autoSizeMax' => 10,
				'minitems' => 0,
				'maxitems' => 4,
				'disableNoMatchingValueElement' => 0,
				'foreign_table' => 'tx_sbdownloader_cat',
                'foreign_table_where' => "AND tx_sbdownloader_cat.pid=###STORAGE_PID### AND tx_sbdownloader_cat.sys_language_uid IN (-1,0) ORDER BY tx_sbdownloader_cat.cat",
				'MM' => 'tx_sbdownloader_images_cat_mm',
				'table_MM' => 'tx_sbdownloader_images_parent_cat_mm',
			),
        ),		
	),
		
	"types" => array (
		"0" => array("showitem" => "sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource, hidden, usercheck;;1, cat, name, metatags, image, externallinks, imagepreview,linkdescription, downloaddescription, description,longdescription;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts], clicks,shortlink,related")
	),
	"palettes" => array (
		"1" => array("showitem" => "")
	)
);



$TCA["tx_sbdownloader_cat"] = array (
	"ctrl" => $TCA["tx_sbdownloader_cat"]["ctrl"],
	"interface" => array (
		"showRecordFieldList" => "sys_language_uid,l18n_parent,l18n_diffsource,hidden,cat"
	),
	"feInterface" => $TCA["tx_sbdownloader_cat"]["feInterface"],
	"columns" => array (
		't3ver_label' => array (
			'label'  => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array (
				'type' => 'input',
				'size' => 30,
				'max'  => 30,
			)
		),
		'sys_language_uid' => array (
			'exclude' => 1,
			'label'  => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array (
				'type'                => 'select',
				'foreign_table'       => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				)
			)
		),
		'l18n_parent' => array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude'     => 1,
			'label'       => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config'      => array (
				'type'  => 'select',
				'items' => array (
					array('', 0),
				),
				'foreign_table'       => 'tx_sbdownloader_cat',
				'foreign_table_where' => 'AND tx_sbdownloader_cat.pid=###CURRENT_PID### AND tx_sbdownloader_cat.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => array (
			'config' => array (
				'type' => 'passthrough'
			)
		),
		'hidden' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		"cat" => Array (
			"exclude" => 1,
			"label" => "LLL:EXT:sb_downloader/locallang_db.xml:tx_sbdownloader_cat.cat",
			"config" => Array (
				"type" => "input",
				"size" => "30",
			)
		),
        'parent_cat' => Array (
            'exclude' => 1,
			'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:sb_downloader/locallang_db.php:tx_sbdownloader_cat.parent_cat',
			// 'config' => Array (
				// 'type' => 'select',
				// 'form_type' => 'user',
				// 'userFunc' => 'tx_riorganisation_treeview->displayHierarchyTree',
				// 'treeView' => 1,
				// 'size' => 10,
				// 'autoSizeMax' => 10,
				// 'minitems' => 0,
				// 'maxitems' => 10,
				// 'foreign_table' => 'tx_riorganisation_businessunit',
                // 'foreign_table_where' => $fTableWhere,
				// 'MM' => 'tx_riorganisation_businessunit_parent_bu_mm',
				// 'table_MM' => 'tx_riorganisation_businessunit_parent_bu_mm',
			// ),	
			'config' => Array (
				'type' => 'select',
				'form_type' => 'user',
				'userFunc' => 'tx_sbdownloader_treeview->displayHierarchyTree',
				'treeView' => 1,
				'size' => 10,
				'autoSizeMax' => 10,
				'minitems' => 0,
				'maxitems' => 10,
				'foreign_table' => 'tx_sbdownloader_cat',
                'foreign_table_where' => 'AND tx_sbdownloader_cat.pid=###STORAGE_PID###',
				'MM' => 'tx_sbdownloader_images_parent_cat_mm',
				'table_MM' => 'tx_sbdownloader_images_parent_cat_mm',
			),			
        ),		
	),
	"types" => array (
		"0" => array("showitem" => "sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource, hidden;;1, cat, parent_cat")
	),
	"palettes" => array (
		"1" => array("showitem" => "")
	)
);

$TCA["tx_sbdownloader_shortlink"] = array (
	"ctrl" => $TCA["tx_sbdownloader_shortlink"]["ctrl"],
	"interface" => array (
		"showRecordFieldList" => "linkname"
	),	
	"columns" => array (	
		"linkname" => Array (
			"exclude" => 1,
			"label" => "LLL:EXT:sb_downloader/locallang_db.xml:tx_sbdownloader_cat.cat",
			"config" => Array (
				"type" => "input",
				"size" => "30",
			)
		),	
	),	
	"types" => array (
		"0" => array("showitem" => "linkname")
	),
	"palettes" => array (
		"1" => array("showitem" => "")
	)
);
$GLOBALS['TCA']['tx_sbdownloader_images']['ctrl']['searchFields'] = 'name,description,longdescription,linkdescription'; 
$GLOBALS['TCA']['tx_sbdownloader_cat']['ctrl']['searchFields'] = 'cat'; 
$GLOBALS['TCA']['tx_sbdownloader_shortlink']['ctrl']['searchFields'] = 'linkname'; 
?>

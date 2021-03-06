<?php

$GLOBALS['TL_DCA']['bl_book'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag'                    => 1,
			'panelLayout'             => 'search,limit'
		),
		'label' => array
		(
			'fields'                  => array('title', 'author', 'year'),
			'format'                  => '%s [%s; %s] '
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['bl_book']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['bl_book']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['bl_book']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['bl_book']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Select
	'select' => array
	(
		'buttons_callback' => array()
	),

	// Edit
	'edit' => array
	(
		'buttons_callback' => array()
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array(''),
		'default'                     => '{title_legend},title,author,year,category,tag,no,isbn,lent;'
	),

	// Subpalettes
	'subpalettes' => array
	(
		''                            => ''
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['bl_book']['title'],
			'search'                  => true,
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>1024),
			'sql'                     => "varchar(1024) NOT NULL default ''"
		),
		'author' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['bl_book']['author'],
			'search'                  => true,
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>1024),
			'sql'                     => "varchar(1024) NOT NULL default ''"
		),
		'year' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['bl_book']['year'],
			'search'                  => true,
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>64),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'category' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['bl_book']['category'],
			'search'                  => true,
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>64),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'tag' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['bl_book']['tag'],
			'search'                  => true,
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'          	      => $GLOBALS['TL_LANG']['MSC']['tags'],
			'reference'               => &$GLOBALS['TL_LANG']['MSC']['tagLabels'],
			'eval'                    => array('mandatory'=>false, 'maxlength'=>64),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'no' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['bl_book']['no'],
			'search'                  => true,
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>64),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'isbn' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['bl_book']['isbn'],
			'search'                  => true,
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>64),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'lent' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['bl_book']['lent'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('mandatory'=>false),
			'sql'                     => "char(1) NOT NULL default ''"
		)
	)
);

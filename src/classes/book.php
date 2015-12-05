<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package   BookLibrary
 * @author    RHOK
 * @license   Apache2.0
 * @copyright RHOK
 */


/**
 * Namespace
 */
namespace BookLibrary;


/**
 * Class book
 *
 * @copyright  RHOK
 * @author     RHOK
 * @package    Devtools
 */
class book extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'book_library';


	/**
	 * Display a wildcard in the back end
	 *
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['CTE']['book_gallery'][1]) . ' ###';
			
			return $objTemplate->parse();
		}
		
		return parent::generate();
	}

	/**
	 * Generate the module
	 */
	protected function compile()
	{
		$arrBooks = array();

		$objBooks = $this->Database->execute("SELECT * FROM bl_book ORDER BY title");
		  while ($objBooks->next())
		  {
			$arrBooks[] = array
			(
			  'id' => $objBooks->id,
			  'title' => $objBooks->title,
			  'author' => $objBooks->author,
			  'year' => $objBooks->year,
			  'no' => $objBooks->no,
			  'category' => $objBooks->category,
			  'tag' => $objBooks->tag
			);
		  }

		  $this->Template->books = $arrBooks;
	}
}

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
class book extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'book';


	/**
	 * Display a wildcard in the back end
	 *
	 * @return string
	 */
	public function generate()
	{
	
		return parent::generate();
	}

	/**
	 * Generate the module
	 */
	protected function compile()
	{
		$arrBooks = array();

		$objBooks = $this->Database->prepare("SELECT * FROM bl_book ORDER BY title")->execute();

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

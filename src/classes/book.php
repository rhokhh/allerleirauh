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
		
		$selectedTag = $_GET['tag'];
		
		if(empty($selectedTag)) {
			$objBooks = $this->Database->execute("SELECT * FROM bl_book ORDER BY title");
		} else {
			$objBooks = $this->Database->prepare("SELECT * FROM bl_book WHERE tag=? ORDER BY title")->execute($selectedTag);
		}
		while ($objBooks->next()) {
			$arrBooks[] = array(
				'id' => $objBooks->id,
				'title' => $objBooks->title,
				'author' => $objBooks->author,
				'year' => $objBooks->year,
				'no' => $objBooks->no,
				'category' => $objBooks->category,
				'tag' => $objBooks->tag
			);
		}
		
		$tags = array();
		
		$tagTemplates = $GLOBALS['TL_LANG']['MSC']['tags'];
		
		foreach($tagTemplates as $tag) {
			$tagObj = array(
				'label' => $GLOBALS['TL_LANG']['MSC']['tagLabels'][$tag] ?: $tag,
				'tag' => $tag,
				'selected' => ($selectedTag == $tag)
			);
			
			$tags []= $tagObj;
		}
		$this->Template->tags = $tags;
		$this->Template->books = $arrBooks;
		
		$this->Template->resultsLabel = $GLOBALS['TL_LANG']['MSC']['results'];
		$this->Template->titleLabel = $GLOBALS['TL_LANG']['MSC']['title'];
		$this->Template->authorLabel = $GLOBALS['TL_LANG']['MSC']['author'];
		$this->Template->yearLabel = $GLOBALS['TL_LANG']['MSC']['year'];
		$this->Template->categoryLabel = $GLOBALS['TL_LANG']['MSC']['category'];
		$this->Template->tagLabel = $GLOBALS['TL_LANG']['MSC']['tag'];
		$this->Template->noLabel = $GLOBALS['TL_LANG']['MSC']['no'];
		$this->Template->isbnLabel = $GLOBALS['TL_LANG']['MSC']['isbn'];
		$this->Template->lentLabel = $GLOBALS['TL_LANG']['MSC']['lent'];
		
	}
}

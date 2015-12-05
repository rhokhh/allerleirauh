<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'BookLibrary',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'BookLibrary\book' => 'system/modules/book_library/classes/book.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'book' => 'system/modules/book_library/templates/book',
));

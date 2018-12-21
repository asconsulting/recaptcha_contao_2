<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Recaptcha v3 for Contao 2.x
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package    asconsulting/recaptcha_contao_2
 * @link       https://andrewstevens.consulting
 */
 
 
/**
 * Form fields
 */
$GLOBALS['TL_FFL']['recaptcha'] 	= 'FormRecaptcha';

if (TL_MODE == 'FE' && $GLOBALS['TL_CONFIG']['recaptchaSiteKey'] != "" && !in_array("<script src='https://www.google.com/recaptcha/api.js?render=" .$GLOBALS['TL_CONFIG']['recaptchaSiteKey'] ."'></script>", $GLOBALS['TL_HEAD'])) {
	$GLOBALS['TL_HEAD'][] = "<script src='https://www.google.com/recaptcha/api.js?render=" .$GLOBALS['TL_CONFIG']['recaptchaSiteKey'] ."'></script>";
}

?>
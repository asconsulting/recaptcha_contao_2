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
$GLOBALS['TL_LANG']['FFL']['recaptcha'] 					= array('Google Recaptcha v3', 'Implements Google Recaptcha v3.');


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_form_field']['recaptchaAction'] 	= array('Action', 'Recaptcha action.');
$GLOBALS['TL_LANG']['tl_form_field']['recaptchaThreshold'] 	= array('Threshold', 'Enter a trust score minimum (0.0 - 1.0)');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_form_field']['recaptcha_legend'] 	= 'Recaptcha Settings';

?>
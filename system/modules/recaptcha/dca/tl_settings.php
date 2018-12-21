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
 * System configuration
 */

$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] = str_replace(";{files_legend", ",recaptchaSiteKey,recaptchaSecretKey;{files_legend", $GLOBALS['TL_DCA']['tl_settings']['palettes']['default']);

$GLOBALS['TL_DCA']['tl_settings']['fields']['recaptchaSiteKey'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['recaptchaSiteKey'],
	'exclude'                 => true,
	'search'                  => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'rgxp'=>'alnum', 'maxlength'=>64, 'tl_class'=>'clr w50')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['recaptchaSecretKey'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['recaptchaSecretKey'],
	'exclude'                 => true,
	'search'                  => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'rgxp'=>'alnum', 'maxlength'=>64, 'tl_class'=>'w50')
);

?>
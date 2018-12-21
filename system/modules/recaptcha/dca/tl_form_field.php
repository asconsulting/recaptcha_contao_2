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
 * Table tl_form_field
 */

// Palettes
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['recaptcha'] = '{type_legend},type,name;{recaptcha_legend},recaptchaAction,recaptchaThreshold;{expert_legend:hide},class,accesskey,tabindex;{submit_legend},addSubmit';

// Fields
$GLOBALS['TL_DCA']['tl_form_field']['fields']['recaptchaAction'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['recaptchaAction'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'rgxp'=>'alnum', 'maxlength'=>64, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['recaptchaThreshold'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['recaptchaThreshold'],
	'exclude'                 => true,
	'default'                 => '0.5',
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'rgxp'=>'digit', 'maxlength'=>4, 'tl_class'=>'w50')
);

?>
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
 * Class FormRecaptcha
 *
 * Form field "recaptcha".
 */
class FormRecaptcha extends Widget
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'form_hidden';


	/**
	 * Validate input and set value
	 */
	public function validate()
	{
		$strUrl = 'https://www.google.com/recaptcha/api/siteverify';
		$strPost = 'secret=' .$GLOBALS['TL_CONFIG']['recaptchaSecretKey'] .'&response=' .$this->Input->post($this->strName) .'&remoteip='.$_SERVER['REMOTE_ADDR'];

		$curl = curl_init($strUrl);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $strPost);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$strJson = curl_exec($curl);
		
		$arrJson = json_decode($strJson, TRUE);
		
		if (!$arrJson['success'])
		{
			$this->class = 'error';
			$this->addError('Unable to verify request');
			return;
		}
		
		if ($arrJson['action'] != $this->recaptchaAction)
		{
			$this->class = 'error';
			$this->addError('Unable to verify request action');
			return;
		}
		
		if ($arrJson['score'] < $this->recaptchaThreshold)
		{
			$this->class = 'error';
			$this->addError('Not trusted');
			return;
		}
		
	}


	/**
	 * Generate the widget and return it as string
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'FE' && $GLOBALS['TL_CONFIG']['recaptchaSiteKey'] != "" && !in_array("<script src='https://www.google.com/recaptcha/api.js?render=" .$GLOBALS['TL_CONFIG']['recaptchaSiteKey'] ."'></script>", $GLOBALS['TL_HEAD'])) {
			$GLOBALS['TL_HEAD'][] = "<script src='https://www.google.com/recaptcha/api.js?render=" .$GLOBALS['TL_CONFIG']['recaptchaSiteKey'] ."'></script>";
		}
		
		$strWidget = sprintf('<input type="hidden" id="%s" name="%s" value="%s"%s',
						$this->strName,
						$this->strName,
						specialchars($this->varValue),
						$this->strTagEnding);
						
		$strWidget .= "<script>
					  grecaptcha.ready(function() {
						  grecaptcha.execute('" .$GLOBALS['TL_CONFIG']['recaptchaSiteKey'] ."', {action: '" .$this->recaptchaAction ."'}).then(function(token) {
							document.getElementById('" .$this->strName ."').value = token;
						  });
					  });
					  </script>";
					  
		return $strWidget;
	}

}

?>
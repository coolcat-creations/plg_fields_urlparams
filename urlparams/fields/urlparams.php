<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fields.Urlparams
 *
 * @copyright   Copyright (C) 2017 Elisa Foltyn.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\CMS\Form\Field;

defined('_JEXEC') or die();

use Joomla\CMS\Form\FormHelper;
use Joomla\CMS\Factory;
use SimpleXMLElement;

FormHelper::loadFieldClass('text');

/*
jimport('joomla.form.formfield');
JLoader::import('components.com_fields.libraries.fieldsplugin', JPATH_ADMINISTRATOR);
use \Joomla\CMS\Form\FormField;*/

class JFormFieldUrlparams extends \JFormFieldText {

	protected $type = 'Urlparams';

	public function onCustomFieldsPrepareDom($field, DOMElement $parent, JForm $form)
	{
	}
	public function setup (SimpleXMLElement $element, $value, $group = null)
	{
		$urlParam = '';
		$fieldUrlParam = (string) $element['urlparam'];
		$displayfield = (string) $element['displayfield'];
		$readonly = (string) $element['readonly'];

		if ($fieldUrlParam == '' || $displayfield == 'global') {
			$plugin = JPluginHelper::getPlugin('fields', 'urlparams');
			if ($plugin)
			{
				$params = new JRegistry($plugin->params);
				$urlParam = $params->get('urlparam','subject');
				$displayfield = $params->get('displayfield','');
				$readonly = $params->get('readonly','');
			}
		} else {
			$urlParam = $fieldUrlParam;
		}

		$matchFound = (array_key_exists($urlParam, $_GET)) && trim(!empty($_GET[$urlParam]));
		$paramvalueexist = $matchFound ? trim ($_GET[$urlParam]) : '';

		$paramvalue = "";

		if ($paramvalueexist) {
			$paramvalue = $_GET[$urlParam];
		}

		$paramvalue = strip_tags(trim($paramvalue));

		$element['type'] = $displayfield;

		if  ($readonly == 'readonly') {
			$element['attribute'] = 'readonly';
		}

		$return = parent::setup($element, $paramvalue, $group);
		return $return;
	}

}


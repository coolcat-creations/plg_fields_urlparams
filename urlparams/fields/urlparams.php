<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Fields.Urlparams
 *
 * @copyright   Copyright (C) 2017 Elisa Foltyn.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die();

jimport('joomla.form.formfield');
JLoader::import('components.com_fields.libraries.fieldsplugin', JPATH_ADMINISTRATOR);


class JFormFieldUrlparams extends JFormFieldText {

	protected $type = 'Urlparams';

	public function onCustomFieldsPrepareDom($field, DOMElement $parent, JForm $form)
	{
	}
		public function setup (SimpleXMLElement $element, $value, $group = null)
		{
			$urlParam = '';
			$fieldUrlParam = (string) $element['urlparam'];

			if ($fieldUrlParam == '') {
				$plugin = JPluginHelper::getPlugin('fields', 'urlparams');
				if ($plugin)
				{
					$params = new JRegistry($plugin->params);
					$urlParam = $params->get('urlparam','subject');
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

			$element['class'] = 'address-input';
			$return = parent::setup($element, $paramvalue, $group);
			return $return;
		}

}


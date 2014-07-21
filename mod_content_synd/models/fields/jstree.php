<?php


defined('JPATH_BASE') or die();

if (!defined("DS")) {
    define("DS", DIRECTORY_SEPARATOR);
}
require_once(JPATH_SITE . DS . 'modules' . DS . 'mod_content_synd' . DS . 'helper.php');

/**
 * Form field for jstree implementation.  Extends hidden field to save selected values. 
 * 
 * @license        GNU/GPL, see LICENSE.php
 * mod_helloworld is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
class JElementJSTree extends JElementHidden 
{

    var $_name = 'jstree';

    public function fetchElement($name, $value, &$node, $control_name) {
        $needsJQuery = modContentSyndHelper::needsJQuery();
        $doc = JFactory::getDocument();
        $doc->addStyleSheet(JURI::root() . 'modules/mod_content_synd/html/css/treestyle.css');
        $doc->addStyleSheet(JURI::root() . 'modules/mod_content_synd/html/css/mod_content_synd.css');
        if ($needsJQuery) {
            $doc->addScript(JURI::root() . 'modules/mod_content_synd/html/js/jquery-1.9.1.js');
            $doc->addScriptDeclaration('jQuery.noConflict();');
        }
        $doc->addScript(JURI::root() . 'modules/mod_content_synd/html/js/jstree.js');
        $doc->addScript(JURI::root() . 'modules/mod_content_synd/html/js/jquery.maskedinput.js');
        $doc->addScript(JURI::root() . 'modules/mod_content_synd/html/js/mod_content_synd.js');

        $style = 'div.jpane-slider {overflow : visible !important; height : auto !important;}';
        //$doc->addStyleDeclaration($style);

        $input = '<div id="'.$name.'_control"></div>';
        $input = $input . ' ' . parent::fetchElement($name, $value, $node, $control_name);
        return $input;
    }

    function fetchTooltip($label, $description, &$xmlElement, $control_name='', $name='') {
        $output = '<label id="'.$control_name.$name.'-lbl" for="'.$control_name.$name.'"';
        if ($description) {
            $output .= ' class="hasTip" title="'.JText::_($label).'::'.JText::_($description).'">';
        } else {
            $output .= '>';
        }
        $output .= JText::_( $label ).'</label>';

        return $output;
    }

}
?>

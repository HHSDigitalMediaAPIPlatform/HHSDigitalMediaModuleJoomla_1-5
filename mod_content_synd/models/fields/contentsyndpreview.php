<?php
//define('_JEXEC') or die('Restricted access');
//jimport('joomla.form.formfield');
//jimport('joomla.form.helper');
//JFormHelper::loadFieldClass('hidden');
/**
 * Form field for previewing syndicated content.  Extends hidden field to save selected values. 
 * Will save the embed url of the selected content in a hidden field to be used when module
 * is added to the front end.
 * 
 * @license        GNU/GPL, see LICENSE.php
 * mod_helloworld is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
class JElementContentSyndPreview extends JElementHidden 
{

    var $_name = 'contentsyndpreview';

    public function fetchElement($name, $value, &$node, $control_name){
        $input = '<div id="'.$name.'_div"></div>';
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

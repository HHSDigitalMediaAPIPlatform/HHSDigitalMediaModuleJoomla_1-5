<?php
/**
 * @author HHS
 * @copyright (C) 2014 - HHS
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
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

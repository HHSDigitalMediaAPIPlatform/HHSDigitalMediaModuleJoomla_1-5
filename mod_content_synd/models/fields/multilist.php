<?php
/**
 * @author HHS
 * @copyright (C) 2014 - HHS
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die();
 
/**
 * Renders a multiple item select element
 *
 */
 
class JElementMultiList extends JElement
{
        /**
        * Element name
        *
        * @access       protected
        * @var          string
        */
        var     $_name = 'MultiList';
 
        function fetchElement($name, $value, &$node, $control_name)
        {
                // Base name of the HTML control.
                $ctrl   = $control_name .'['. $name .']';
 
                // Construct an array of the HTML OPTION statements.
                $options = array ();
                foreach ($node->children() as $option)
                {
                        $val    = $option->attributes('value');
                        $text   = $option->data();
                        $options[] = JHTML::_('select.option', $val, JText::_($text));
                }
 
                // Construct the various argument calls that are supported.
                $attribs        = ' ';
                if ($v = $node->attributes( 'size' )) {
                        $attribs        .= 'size="'.$v.'"';
                }
                if ($v = $node->attributes( 'class' )) {
                        $attribs        .= 'class="'.$v.'"';
                } else {
                        $attribs        .= 'class="inputbox"';
                }
                if ($m = $node->attributes( 'multiple' ))
                {
                        $attribs        .= ' multiple="multiple"';
                        $ctrl           .= '[]';
                }
 
                // Render the HTML SELECT list.
                return JHTML::_('select.genericlist', $options, $ctrl, $attribs, 'value', 'text', $value, $control_name.$name );
        }
}

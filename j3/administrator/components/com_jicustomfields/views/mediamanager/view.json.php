<?php
/**
 * @version     $Id: view.html.php 010 2014-07-20 11:30:00Z Anton Wintergerst $
 * @package     JiCustomFields 2.1 Framework for Joomla
 * @copyright   Copyright (C) 2014 Jinfinity. All rights reserved.
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @website     www.jinfinity.com
 * @email       support@jinfinity.com
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

if(!class_exists('JViewLegacy')){
    class JViewLegacy extends JView {
    }
}
class JiCustomFieldsViewMediaManager extends JViewLegacy
{
    function display($tpl = null)
    {
        parent::display($tpl);
    }
}
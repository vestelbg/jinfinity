<?php 
/**
 * @version     $Id: view.html.php 071 2014-12-15 10:21:00Z Anton Wintergerst $
 * @package     Jinfinity Migrator for Joomla 1.5+
 * @copyright   Copyright (C) 2014 Jinfinity. All rights reserved.
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @website     www.jinfinity.com
 * @email       support@jinfinity.com
 */
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
jimport( 'joomla.application.component.view');

class JiMigratorViewTools extends JiView
{
    function display($tpl = null)
    {
        $this->addToolbar();
 
        parent::display($tpl);
    }
	protected function addToolbar()
	{
        JToolBarHelper::preferences('com_jimigrator', '350');
		if(version_compare(JVERSION, '3.0.0', 'ge')) {
			$this->sidebar = JHtmlSidebar::render();
		}
		if(version_compare(JVERSION, '1.6.0', 'ge')) {
			JiMigratorHelper::addSubmenu('tools');
		}
		JToolbarHelper::title(JText::_('JIMIGRATOR_TOOLS'), 'jimigrator.png');
	}
}
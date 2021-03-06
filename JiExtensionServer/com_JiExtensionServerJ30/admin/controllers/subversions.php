<?php
/**
 * @version     $Id: subversions.php 015 2013-06-17 22:37:00Z Anton Wintergerst $
 * @package     JiExtensionServer for Joomla 2.5-3.0
 * @copyright   Copyright (C) 2013 Jinfinity. All rights reserved.
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @website     www.jinfinity.com
 * @email       support@jinfinity.com
 */
 
// No direct access 
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controlleradmin');

class JiExtensionServerControllerSubversions extends JControllerAdmin
{
    /**
     * Constructor.
     *
     * @param	array	$config	An optional associative array of configuration settings.

     * @return	JiExtensionServerExtensions
     * @see		JController
     */
    public function __construct($config = array())
    {
        parent::__construct($config);
    }
    /**
     * Proxy for getModel.
     *
     * @param	string	$name	The name of the model.
     * @param	string	$prefix	The prefix for the PHP class name.
     *
     * @return	JModel
     */
    public function getModel($name = 'Subversion', $prefix = 'JiExtensionServerModel', $config = array('ignore_request' => true))
    {
        $model = parent::getModel($name, $prefix, $config);

        return $model;
    }
    /**
     * Method to save the submitted ordering values for records via AJAX.
     *
     * @return	void
     *
     */
    public function saveOrderAjax()
    {
        $pks = $this->input->post->get('cid', array(), 'array');
        $order = $this->input->post->get('order', array(), 'array');

        // Sanitize the input
        JArrayHelper::toInteger($pks);
        JArrayHelper::toInteger($order);

        // Get the model
        $model = $this->getModel();

        // Save the ordering
        $return = $model->saveorder($pks, $order);

        if ($return)
        {
            echo "1";
        }

        // Close the application
        JFactory::getApplication()->close();
    }
    function scan() {
        $model = $this->getModel('Subversions');
        $response = $model->scan();
        if($response->valid) {
            $this->setMessage($response->msg);
        } else {
            $this->setMessage($response->msg, 'error');
        }

        $this->setRedirect(JRoute::_('index.php?option=com_jiextensionserver&view=subversions', false));
    }
}
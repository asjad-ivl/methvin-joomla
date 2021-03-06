<?php

/**
 * @package		SP Transfer
 * @subpackage	Components
 * @copyright	KAINOTOMO PH LTD - All rights reserved.
 * @author		KAINOTOMO PH LTD
 * @link		http://www.kainotomo.com
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

include_once JPATH_ADMINISTRATOR . '/components/com_weblinks/models/weblink.php';

class CYENDModelWeblink extends WeblinksModelWeblink {

    public function __construct($config = array()) {
        parent::__construct($config);
        $this->addTablePath(JPATH_ADMINISTRATOR . '/components/com_weblinks/tables');
    }

    public function getTable($type = 'Weblink', $prefix = 'WeblinksTable', $config = array()) {
        if (empty($config['dbo']))
            $config['dbo'] = $this->_db;

        return JTable::getInstance($type, $prefix, $config);
    }

    protected function canDelete($record) {
        return true;
    }

}

include_once JPATH_COMPONENT . '/models/com.php';

class SPTransferModelCom_Weblinks extends SPTransferModelCom
{

    public function weblinks($ids = null)    {
        $this->destination_model = new CYENDModelWeblink(array('dbo' => $this->destination_db));        
        $this->source_model = new CYENDModelWeblink(array('dbo' => $this->source_db));     
        
        $this->task->query = 'SELECT ' . $this->id . '
            FROM #__' . $this->task->name . '
            WHERE ' . $this->id . ' > 0';
        
        $this->items_new($ids);   
    }    
    public function weblinks_fix($ids = null)    {
        $this->destination_model = new CYENDModelWeblink(array('dbo' => $this->destination_db));        
        $this->source_model = new CYENDModelWeblink(array('dbo' => $this->source_db));     
        
        $this->task->query = 'SELECT ' . $this->id . '
            FROM #__' . $this->task->name . '
            WHERE catid > 0';
        
        $this->items_new_fix($ids);
    }
}

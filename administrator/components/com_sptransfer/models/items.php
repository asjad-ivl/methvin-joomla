<?php

/**
 * @package		SP Transfer
 * @subpackage	Components
 * @copyright	KAINOTOMO PH LTD - All rights reserved.
 * @author		KAINOTOMO PH LTD
 * @link		http://www.kainotomo.com
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Menu Item List Model for Menus.
 *
 * @package		Joomla.Administrator
 * @subpackage	com_menus
 * @since		1.6
 */
class SPTransferModelItems extends JModelList {

    /**
     * Constructor.
     *
     * @param	array	An optional associative array of configuration settings.
     * @see		JController
     * @since	1.6
     */
    public function __construct($config = array()) {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id', 'a.id',
                'menutype', 'a.menutype',
                'title', 'a.title',
                'alias', 'a.alias',
                'published', 'a.published',
                'access', 'a.access', 'access_level',
                'language', 'a.language',
                'checked_out', 'a.checked_out',
                'checked_out_time', 'a.checked_out_time',
                'lft', 'a.lft',
                'rgt', 'a.rgt',
                'level', 'a.level',
                'path', 'a.path',
                'client_id', 'a.client_id',
                'home', 'a.home',
            );
            $app = JFactory::getApplication();
			if (isset($app->menu_associations))
			{
				$assoc = $app->menu_associations;
			}
			else
			{
				$assoc = 0;
			}

			if ($assoc)
			{
				$config['filter_fields'][] = 'association';
			}
        }

        parent::__construct($config);
    }

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @return	void
     * @since	1.6
     */
    protected function populateState($ordering = null, $direction = null) {
        $app = JFactory::getApplication('administrator');

        $search = $this->getUserStateFromRequest($this->context . '.search', 'filter_search');
        $this->setState('filter.search', $search);

        $published = $this->getUserStateFromRequest($this->context . '.published', 'filter_published', '');
        $this->setState('filter.published', $published);

        $access = $this->getUserStateFromRequest($this->context . '.filter.access', 'filter_access', 0, 'int');
        $this->setState('filter.access', $access);

        $parentId = $this->getUserStateFromRequest($this->context . '.filter.parent_id', 'filter_parent_id', 0, 'int');
        $this->setState('filter.parent_id', $parentId);

        $level = $this->getUserStateFromRequest($this->context . '.filter.level', 'filter_level', 0, 'int');
        $this->setState('filter.level', $level);

        $menuType = JRequest::getVar('menutype', null);
        if ($menuType) {
            if ($menuType != $app->getUserState($this->context . '.filter.menutype')) {
                $app->setUserState($this->context . '.filter.menutype', $menuType);
                JRequest::setVar('limitstart', 0);
            }
        } else {
            $menuType = $app->getUserState($this->context . '.filter.menutype');

            if (!$menuType) {
                $menuType = $this->getDefaultMenuType();
            }
        }

        $this->setState('filter.menutype', $menuType);

        $language = $this->getUserStateFromRequest($this->context . '.filter.language', 'filter_language', '');
        $this->setState('filter.language', $language);

        // Component parameters.
        $params = JComponentHelper::getParams('com_menus');
        $this->setState('params', $params);

        // List state information.
        parent::populateState('a.lft', 'asc');
    }

    /**
     * Method to get a store id based on model configuration state.
     *
     * This is necessary because the model is used by the component and
     * different modules that might need different sets of data or different
     * ordering requirements.
     *
     * @param	string		$id	A prefix for the store id.
     *
     * @return	string		A store id.
     * @since	1.6
     */
    protected function getStoreId($id = '') {
        // Compile the store id.
        $id .= ':' . $this->getState('filter.access');
        $id .= ':' . $this->getState('filter.published');
        $id .= ':' . $this->getState('filter.language');
        $id .= ':' . $this->getState('filter.search');
        $id .= ':' . $this->getState('filter.parent_id');
        $id .= ':' . $this->getState('filter.menutype');

        return parent::getStoreId($id);
    }

    /**
     * Finds the default menu type.
     *
     * In the absence of better information, this is the first menu ordered by title.
     *
     * @return	string	The default menu type
     * @since	1.6
     */
    protected function getDefaultMenuType() {
        // Create a new query object.
        $db = $this->getDboSource();
        $query = $db->getQuery(true)
                ->select('menutype')
                ->from('#__menu_types')
                ->order('title');
        $db->setQuery($query, 0, 1);
        $menuType = $db->loadResult();

        return $menuType;
    }

    /**
     * Builds an SQL query to load the list data.
     *
     * @return	JDatabaseDriverQuery	A query object.
     */
    protected function getListQuery()
	{
		// Create a new query object.
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);
		$user	= JFactory::getUser();
		$app	= JFactory::getApplication();

		// Select all fields from the table.                
		$query->select(
			$this->getState('list.select',
				$db->quoteName(
					array('a.id', 'a.menutype', 'a.title', 'a.alias', 'a.note', 'a.path', 'a.link', 'a.type', 'a.parent_id', 'a.level', 'a.published', 'a.component_id', 'a.checked_out', 'a.checked_out_time', 'a.browserNav', 'a.access', 'a.img', 'a.template_style_id', 'a.params', 'a.lft', 'a.rgt', 'a.home', 'a.language', 'a.client_id'),
					array(null, null, null, null, null, null, null, null, null, null, 'apublished', null, null, null, null, null, null, null, null, null, null, null, null, null)
				)
			)
		);
		$query->select('CASE a.type' .
			' WHEN ' . $db->quote('component') . ' THEN a.published+2*(e.enabled-1) ' .
			' WHEN ' . $db->quote('url') . ' THEN a.published+2 ' .
			' WHEN ' . $db->quote('alias') . ' THEN a.published+4 ' .
			' WHEN ' . $db->quote('separator') . ' THEN a.published+6 ' .
			' END AS published');
		$query->from($db->quoteName('#__menu').' AS a');

		// Join over the language
		$query->select('l.title AS language_title, l.image as image');
		$query->join('LEFT', $db->quoteName('#__languages').' AS l ON l.lang_code = a.language');

		// Join over the users.
		$query->select('u.name AS editor');
		$query->join('LEFT', $db->quoteName('#__users').' AS u ON u.id = a.checked_out');

		//Join over components
		$query->select('c.element AS componentname');
		$query->join('LEFT', $db->quoteName('#__extensions').' AS c ON c.extension_id = a.component_id');

		// Join over the asset groups.
		$query->select('ag.title AS access_level');
		$query->join('LEFT', '#__viewlevels AS ag ON ag.id = a.access');

		// Join over the associations.
		$assoc = isset($app->menu_associations) ? $app->menu_associations : 0;
		if ($assoc)
		{
			$query->select('COUNT(asso2.id)>1 as association');
			$query->join('LEFT', '#__associations AS asso ON asso.id = a.id AND asso.context='.$db->quote('com_menus.item'));
			$query->join('LEFT', '#__associations AS asso2 ON asso2.key = asso.key');
			$query->group('a.id');
		}

		// Join over the extensions
		$query->select('e.name AS name');
		$query->join('LEFT', '#__extensions AS e ON e.extension_id = a.component_id');

		// Exclude the root category.
		$query->where('a.id > 1');
		$query->where('a.client_id = 0');

		// Filter on the published state.
		$published = $this->getState('filter.published');
		if (is_numeric($published)) {
			$query->where('a.published = '.(int) $published);
		} elseif ($published === '') {
			$query->where('(a.published IN (0, 1))');
		}

		// Filter by search in title, alias or id
		if ($search = trim($this->getState('filter.search'))) {
			if (stripos($search, 'id:') === 0) {
				$query->where('a.id = '.(int) substr($search, 3));
			} elseif (stripos($search, 'link:') === 0) {
				if ($search = substr($search, 5)) {
					$search = $db->Quote('%'.$db->escape($search, true).'%');
					$query->where('a.link LIKE '.$search);
				}
			} else {
				$search = $db->Quote('%'.$db->escape($search, true).'%');
				$query->where('('.'a.title LIKE '.$search.' OR a.alias LIKE '.$search.' OR a.note LIKE '.$search.')');
			}
		}

		// Filter the items over the parent id if set.
		$parentId = $this->getState('filter.parent_id');
		if (!empty($parentId)) {
			$query->where('p.id = ' . (int) $parentId);
		}

		// Filter the items over the menu id if set.
		$menuType = $this->getState('filter.menutype');
		if (!empty($menuType)) {
			$query->where('a.menutype = '.$db->quote($menuType));
		}

		// Filter on the access level.
		if ($access = $this->getState('filter.access')) {
			$query->where('a.access = '.(int) $access);
		}

		// Implement View Level Access
		if (!$user->authorise('core.admin'))
		{
			$groups	= implode(',', $user->getAuthorisedViewLevels());
			$query->where('a.access IN ('.$groups.')');
		}

		// Filter on the level.
		if ($level = $this->getState('filter.level')) {
			$query->where('a.level <= '.(int) $level);
		}

		// Filter on the language.
		if ($language = $this->getState('filter.language')) {
			$query->where('a.language = '.$db->quote($language));
		}

		// Add the list ordering clause.
		$query->order($db->escape($this->getState('list.ordering', 'a.lft')).' '.$db->escape($this->getState('list.direction', 'ASC')));

		//echo nl2br(str_replace('#__','jos_',(string)$query)).'<hr/>';
		return $query;
	}

    private function getDboSource() {
        $params = JComponentHelper::getParams('com_sptransfer');
        $option = array(); //prevent problems 
        $option['driver'] = $params->get("driver", 'mysqli');            // Database driver name
        $option['host'] = $params->get("host", 'localhost');    // Database host name
        $option['user'] = $params->get("source_user_name", '');       // User for database authentication
        $option['password'] = $params->get("source_password", '');   // Password for database authentication
        $option['database'] = $params->get("source_database_name", '');      // Database name
        $option['prefix'] = $this->modPrefix($params->get("source_db_prefix", ''));             // Database prefix (may be empty)

        $source_db =  JDatabaseDriver::getInstance($option);
        return $source_db;
    }

    private function getItemsSource() {
        // Get a storage key.
        $store = $this->getStoreId();

        // Try to load the data from internal storage.
        if (isset($this->cache[$store])) {
            return $this->cache[$store];
        }

        // Load the list items.
        $query = $this->_getListQuery();
        $db = $this->getDboSource();

        $db->setQuery($query, $this->getStart(), $this->getState('list.limit'));
        $items = $db->loadObjectList();

        // Check for a database error.
        if ($db->getErrorNum()) {
            $this->setError($db->getErrorMsg());
            return false;
        }

        // Add the items to the internal cache.
        $this->cache[$store] = $items;

        return $this->cache[$store];
    }

    private function modPrefix($prefix) { //Add underscore if not their
        if (!strpos($prefix, '_'))
            $prefix = $prefix . '_';
        return $prefix;
    }

    public function getItems() {
        return $this->getItemsSource();
    }

    public function getMenuTypes() {
        $db = $this->getDboSource();
        $query = $db->getQuery(true);

        $query->select('menutype AS value, title AS text');
        $query->from($db->quoteName('#__menu_types'));
        $query->order('title');

        $db->setQuery($query);
        $items = $db->loadObjectList();

        return $items;
    }

    public function getLanguages($all = true, $translate = true) {
        // Get the database object and a new query object.
        $db = $this->getDboSource();
        $query = $db->getQuery(true);

        // Build the query.
        $query->select('a.lang_code AS value, a.title AS text, a.title_native');
        $query->from('#__languages AS a');
        $query->where('a.published >= 0');
        $query->order('a.title');

        // Set the query and load the options.
        $db->setQuery($query);
        $items = $db->loadObjectList();
        if ($all) {
            array_unshift($items, new JObject(array('value' => '*', 'text' => $translate ? JText::alt('JALL', 'language') : 'JALL_LANGUAGE')));
        }

        // Detect errors
        if ($db->getErrorNum()) {
            JError::raiseWarning(500, $db->getErrorMsg());
        }

        return $items;
    }

    public function getAssetGroups() {
        $db = $this->getDboSource();
        $query = $db->getQuery(true);

        $query->select('a.id AS value, a.title AS text');
        $query->from($db->quoteName('#__viewlevels') . ' AS a');
        $query->group('a.id, a.title, a.ordering');
        $query->order('a.ordering ASC');

        $db->setQuery($query);
        $asset_groups = $db->loadObjectList();

        // Check for a database error.
        if ($db->getErrorNum()) {
            JError::raiseNotice(500, $db->getErrorMsg());
            return false;
        }

        return $asset_groups;
    }
    
    /**
     * Returns a record count for the query.
     *
     * @param   JDatabaseQuery|string  $query  The query.
     *
     * @return  integer  Number of rows for query.
     *
     */
    protected function _getListCount($query) {
        $db = $this->getDboSource();

        // Use fast COUNT(*) on JDatabaseQuery objects if there no GROUP BY or HAVING clause:
        if ($query instanceof JDatabaseQuery && $query->type == 'select' && $query->group === null && $query->having === null) {
            $query = clone $query;
            $query->clear('select')->clear('order')->select('COUNT(*)');

            $db->setQuery($query);
            return (int) $db->loadResult();
        }

        // Otherwise fall back to inefficient way of counting all results.
        $db->setQuery($query);
        $db->execute();

        return (int) $db->getNumRows();
    }

}
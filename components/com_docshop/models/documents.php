<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_docshop
 * @copyright   (c) 2026. All rights reserved.
 * @license     GNU General Public License v3.0
 */

defined('_JEXEC') or die;

class DocshopModelDocuments extends JModelList
{
    public function __construct($config = array())
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id',
                'title',
                'category_id',
                'price',
                'published',
                'created'
            );
        }

        parent::__construct($config);
    }

    protected function getListQuery()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        $query->select(array('a.id', 'a.title', 'a.description', 'a.youtube_url', 'a.price', 'a.category_id', 'a.published', 'a.created', 'a.file_size'))
            ->from($db->quoteName('#__docshop_documents', 'a'))
            ->where('a.published = 1');

        // Filter by category
        $categoryId = $this->getState('filter.category_id');
        if (is_numeric($categoryId)) {
            $query->where('a.category_id = ' . (int)$categoryId);
        }

        // Filter by search
        $search = $this->getState('filter.search');
        if (!empty($search)) {
            $search = $db->quote('%' . $db->escape($search, true) . '%');
            $query->where('a.title LIKE ' . $search . ' OR a.description LIKE ' . $search);
        }

        // Add ordering
        $orderCol = $this->state->get('list.ordering', 'a.created');
        $orderDirn = $this->state->get('list.direction', 'DESC');
        $query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirn));

        return $query;
    }

    protected function populateState($ordering = null, $direction = null)
    {
        $app = JFactory::getApplication();

        $this->setState('filter.search', $app->getUserStateFromRequest($this->context . '.filter.search', 'filter_search', '', 'string'));
        $this->setState('filter.category_id', $app->getUserStateFromRequest($this->context . '.filter.category_id', 'filter_category_id', '', 'int'));

        parent::populateState('a.created', 'DESC');
    }

    public function getItem($pk = null)
    {
        $pk = (!empty($pk)) ? $pk : (int) $this->getState($this->getName() . '.id');

        if ($this->_item === null) {
            $this->_item = array();
        }

        if (!isset($this->_item[$pk])) {
            try {
                $db = $this->getDbo();
                $query = $db->getQuery(true)
                    ->select('*')
                    ->from($db->quoteName('#__docshop_documents'))
                    ->where($db->quoteName('id') . ' = ' . (int) $pk)
                    ->where($db->quoteName('published') . ' = 1');

                $db->setQuery($query);
                $data = $db->loadObject();

                if (empty($data)) {
                    return false;
                }

                $this->_item[$pk] = $data;
            } catch (Exception $e) {
                $this->setError($e);
                $this->_item[$pk] = false;
            }
        }

        return $this->_item[$pk];
    }
}
?>

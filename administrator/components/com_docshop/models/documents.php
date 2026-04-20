<?php
/**
 * @package     Joomla.Administrator
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
                'created',
                'created_by'
            );
        }

        parent::__construct($config);
    }

    protected function getListQuery()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        $query->select(array('a.id', 'a.title', 'a.price', 'a.category_id', 'a.published', 'a.created', 'a.created_by', 'a.file_size'))
            ->from($db->quoteName('#__docshop_documents', 'a'));

        // Filter by published
        $published = $this->getState('filter.published');
        if (is_numeric($published)) {
            $query->where('a.published = ' . (int)$published);
        }

        // Filter by category
        $categoryId = $this->getState('filter.category_id');
        if (is_numeric($categoryId)) {
            $query->where('a.category_id = ' . (int)$categoryId);
        }

        // Filter by search
        $search = $this->getState('filter.search');
        if (!empty($search)) {
            $search = $db->quote('%' . $db->escape($search, true) . '%');
            $query->where('a.title LIKE ' . $search);
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
        $this->setState('filter.published', $app->getUserStateFromRequest($this->context . '.filter.published', 'filter_published', '', 'string'));
        $this->setState('filter.category_id', $app->getUserStateFromRequest($this->context . '.filter.category_id', 'filter_category_id', '', 'int'));

        parent::populateState('a.created', 'DESC');
    }
}
?>
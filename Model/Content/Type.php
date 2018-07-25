<?php
namespace FutureActivities\ContentManagerApi\Model\Content;

use FutureActivities\ContentManagerApi\Api\Data\Content\TypeInterface;

class Type implements TypeInterface
{
    protected $title;
    protected $collection = [];
    protected $page = 1;
    protected $size = 0;
    protected $total;
    
    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * {@inheritdoc}
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * {@inheritdoc}
     */
    public function setCollection(array $items)
    {
        $this->collection = $items;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getCurrentPage()
    {
        return $this->page;
    }

    /**
     * {@inheritdoc}
     */
    public function setCurrentPage($page)
    {
        $this->page = $page;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getPageSize()
    {
        return $this->size;
    }

    /**
     * {@inheritdoc}
     */
    public function setPageSize($size)
    {
        $this->size = $size;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * {@inheritdoc}
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }
}

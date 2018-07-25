<?php
namespace FutureActivities\ContentManagerApi\Api\Data\Content;

/**
 * @api
 */
interface TypeInterface
{
    /**
     * Get the content type ttitle
     * 
     * @return string
     */
    public function getTitle();
    
    /**
     * Set the content type title
     * 
     * @param string $title
     * @return $this
     */
    public function setTitle($title);
    
    /**
     * Get the content collection
     *
     * @return \FutureActivities\ContentManagerApi\Api\Data\Content\ItemInterface[]
     */
    public function getCollection();

    /**
     * Set the content collection
     *
     * @param \FutureActivities\ContentManagerApi\Api\Data\Content\ItemInterface[] $items
     * @return $this
     */
    public function setCollection(array $items);
    
    /**
     * Get the current page
     * 
     * @return int
     */
    public function getCurrentPage();
    
    /**
     * Set the current page
     * 
     * @param int $page
     * @return $this
     */
    public function setCurrentPage($page);
    
    /**
     * Get the page size
     * 
     * @return int
     */
    public function getPageSize();
    
    /**
     * Set the page size
     * 
     * @param int $size
     * @return $this
     */
    public function setPageSize($size);
    
    /**
     * Get the collection total
     * 
     * @return int
     */
    public function getTotal();
    
    /**
     * Set the collection total
     * 
     * @param int $total
     * @return $this
     */
    public function setTotal($total);
    
    
}
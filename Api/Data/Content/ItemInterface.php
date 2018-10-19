<?php

namespace FutureActivities\ContentManagerApi\Api\Data\Content;

use Magento\Framework\Api\CustomAttributesDataInterface;

interface ItemInterface extends CustomAttributesDataInterface
{
    /**
     * Get the content type ttitle
     * 
     * @return int
     */
    public function getId();
    
    /**
     * Set the content id
     * 
     * @param int $id
     * @return $this
     */
    public function setId($id);
    
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
     * Get the content type 
     * 
     * @return string
     */
    public function getType();
    
    /**
     * Set the content type
     * 
     * @param string $type
     * @return $this
     */
    public function setType($type);
    
    /**
     * Get the content url 
     * 
     * @return string
     */
    public function getUrl();
    
    /**
     * Set the content url
     * 
     * @param string $url
     * @return $this
     */
    public function setUrl($url);
        
    /**
     * Get the current status
     * 
     * @return string
     */
    public function getStatus();
    
    /**
     * Set the current status
     * 
     * @param string $status 
     */
    public function setStatus($status);
}
<?php
namespace FutureActivities\ContentManagerApi\Api;
 
interface ContentInterface
{
   /**
    * Returns content by the content type
    *
    * @api
    * @param string $identifier
    * @param \Magento\Framework\Api\AttributeValue[] $filters
    * @param int $currentPage
    * @param int $pageSize 0 = disabled
    * @return \FutureActivities\ContentManagerApi\Api\Data\Content\TypeInterface
    */
   public function getContentByType($identifier, $filters = [], $currentPage = 1, $pageSize = 0);
   
   /**
    * Return a specific content item by its ID
    * 
    * @param int $id
    * @return \FutureActivities\ContentManagerApi\Api\Data\Content\ItemInterface
    */
   public function getContentById($id);
}
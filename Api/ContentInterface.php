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
    * @param string $sortBy
    * @param string $sortbyDirection
    * @return \FutureActivities\ContentManagerApi\Api\Data\Content\TypeInterface
    */
   public function getContentByType($identifier, $filters = [], $currentPage = 1, $pageSize = 0, $sortBy = 'entity_id', $sortByDirection = 'ASC');
   
   /**
    * Return a specific content item by its ID
    * 
    * @param int $id
    * @return \FutureActivities\ContentManagerApi\Api\Data\Content\ItemInterface
    */
   public function getContentById($id);
}
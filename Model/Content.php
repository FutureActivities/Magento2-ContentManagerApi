<?php
namespace FutureActivities\ContentManagerApi\Model;

class Content implements \FutureActivities\ContentManagerApi\Api\ContentInterface
{
    protected $contentCollectionFactory;
    protected $contentTypeCollectionFactory;
    protected $attributeValue;
    protected $contentItem;
    protected $contentType;
    protected $templateProcessor;
    
    public function __construct(
        \Blackbird\ContentManager\Model\ResourceModel\Content\CollectionFactory $contentCollectionFactory,
        \Blackbird\ContentManager\Model\ResourceModel\ContentType\CollectionFactory $contentTypeCollectionFactory,
        \Magento\Framework\Api\AttributeValueFactory $attributeValue,
        \FutureActivities\ContentManagerApi\Model\Content\ItemFactory $contentItem,
        \FutureActivities\ContentManagerApi\Model\Content\TypeFactory $contentType,
        \Magento\Cms\Model\Template\FilterProvider $templateProcessor)
    {
        $this->contentCollectionFactory = $contentCollectionFactory;
        $this->contentTypeCollectionFactory = $contentTypeCollectionFactory;
        $this->attributeValue = $attributeValue;
        $this->contentItem = $contentItem;
        $this->contentType = $contentType;
        $this->templateProcessor = $templateProcessor;
    }
       
   /**
    * {@inheritdoc}
    */
    public function getContentByType($identifier, $filters = [], $currentPage = 1, $pageSize = 0, $sortBy = 'entity_id', $sortByDirection = 'ASC')
    {
        $contentType = $this->contentTypeCollectionFactory->create()->addFieldToFilter('identifier', $identifier)->getFirstItem();
        
        $collection = $contentType->getContentCollection()->addAttributeToSelect('*');
        foreach ($filters AS $filter) {
            if ($filter->getAttributeCode() == 'entity_id')
                $collection->addFieldToFilter($filter->getAttributeCode(), array('IN' => explode(',',$filter->getValue())));
            else
                $collection->addFieldToFilter($filter->getAttributeCode(), array('finset' => $filter->getValue()));
        }
        
        $type = $this->contentType->create();
        $type->setTitle($contentType->getTitle());
        $type->setCurrentPage($currentPage);
        $type->setPageSize($pageSize);
        $type->setTotal($collection->getSize());
        
        if ($pageSize > 0)
            $collection->setPageSize($pageSize)->setCurPage($currentPage);
    
        $collection->setOrder($sortBy, $sortByDirection);
        
        $items = [];
        foreach ($collection AS $content)
            $items[] = $this->_generateContentItem($contentType, $content);
        
        $type->setCollection($items);
        
        return $type;
    }
    
    /**
    * {@inheritdoc}
    */
    public function getContentById($id)
    {
        $content = $this->contentCollectionFactory->create()->addAttributeToFilter('entity_id', $id)->addAttributeToSelect('*')->getFirstItem();
        return $this->_generateContentItem($content->getContentType(), $content);
    }
    
    /**
     * Generate a content item
     */
    private function _generateContentItem($contentType, $content)
    {
        $item = $this->contentItem->create();
        $item->setId(intval($content->getId()));
        $item->setType($contentType->getIdentifier());
        $item->setTitle($content->getTitle());
        $item->setUrl($content->getUrl());
        
        $timestamp = $this->attributeValue->create();
        $timestamp->setAttributeCode('created_timestamp');
        $timestamp->setValue($content->getCreatedAtTimestamp());
            
        $itemAttributes = [$timestamp];
        
        // Custom fields
        foreach ($contentType->getCustomFieldCollection() AS $field) {
            
            $handle = $field->getIdentifier();
            
            $value = $content->getData($handle);
            if ($value && $field->getType() == 'image')
                $value = $content->getImage($handle);
            if ($field->getType() == 'area')
                $value = $this->templateProcessor->getPageFilter()->filter($value);
                
            $attribute = $this->attributeValue->create();
            $attribute->setAttributeCode($handle);
            $attribute->setValue($value);
            $itemAttributes[] = $attribute;
        }
        
        // Meta data
        $metaFields = ['meta_title', 'description', 'keywords', 'robots'];
        foreach($metaFields AS $field) {
            if (!$value = $content->getData($field)) continue;
            
            $attribute = $this->attributeValue->create();
            $attribute->setAttributeCode($field);
            $attribute->setValue($value);
            $itemAttributes[] = $attribute;
        }
        
        $item->setCustomAttributes($itemAttributes);
        
        return $item;
    }
}
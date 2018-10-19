<?php
namespace FutureActivities\ContentManagerApi\Model\Content;

class Item extends \Magento\Framework\Api\AbstractSimpleObject implements \FutureActivities\ContentManagerApi\Api\Data\Content\ItemInterface 
{
    protected $id;
    protected $title;
    protected $type;
    protected $url;
    
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function setType($type)
    {
        $this->type = $type;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * {@inheritdoc}
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getCustomAttribute($attributeCode)
    {
        return isset($this->_data[self::CUSTOM_ATTRIBUTES][$attributeCode])
            ? $this->_data[self::CUSTOM_ATTRIBUTES][$attributeCode]
            : null;
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomAttribute($attributeCode, $attributeValue)
    {
        /** @var \Magento\Framework\Api\AttributeInterface[] $attributes */
        $attributes = $this->getCustomAttributes();
        $attributes[$attributeCode] = $attributeValue;
        return $this->setCustomAttributes($attributes);
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomAttributes()
    {
        return $this->_get(self::CUSTOM_ATTRIBUTES);
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomAttributes(array $attributes)
    {
        return $this->setData(self::CUSTOM_ATTRIBUTES, $attributes);
    }
}
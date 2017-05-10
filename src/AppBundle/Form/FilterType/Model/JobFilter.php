<?php

namespace AppBundle\Form\FilterType\Model;

use Symfony\Component\Validator\Constraints as Assert;

class JobFilter
{
    const LIMIT = 30;

    const DEFAULT_PAGE = 1;
    const DEFAULT_ORDER_KEY = 'id';
    const DEFAULT_ORDER_DIRECTION = 'DESC';

    /**
     * @var int
     *
     * @Assert\Type(type="integer")
     */
    protected $page;

    /**
     * @var int
     *
     * @Assert\Type(type="integer")
     * @Assert\Range(min=1, max=30)
     */
    protected $limit;

    /**
     * @var string
     *
     * @Assert\Type(type="string")
     * @Assert\Length(min=1, max=30)
     */
    protected $keyword;

    /**
     * @var string
     *
     * @Assert\Choice(
     *     callback = "getOrderKeys"
     * )
     */
    protected $orderKey;

    /**
     * @var string
     *
     * @Assert\Choice(
     *     callback = "getOrderDirections"
     * )
     */
    protected $orderDirection;

    /**
     * @var array
     *
     * @Assert\Choice(
     *     callback = "getPossibleSerialisationGroups",
     *     multiple = true
     * )
     */
    protected $serialisationGroups;

    /**
     * @var string
     *
     * @Assert\Type(type="string")
     */
    protected $status;

    /**
     * @var string
     *
     * @Assert\Type(type="string")
     */
    protected $type;

    /**
     * @var string
     *
     * @Assert\Type(type="string")
     */
    protected $description;

    /**
    *
    * @var int
    *
    * @Assert\type(type="integer")
    **/
    protected $customer;

    /**
    *
    * @var string
    *
    * @Assert\type(type="string")
    **/
    protected $priority;

    /**
     * @return array
     */
    public static function getOrderKeys()
    {
        return ['id'];
    }

    /**
     * @return array
     */
    public static function getOrderDirections()
    {
        return [-1, 1];
    }

    /**
     * @return array
     */
    public static function getPossibleSerialisationGroups()
    {
        return ['list', 'default', 'customer'];
    }

    /**
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param string $priority
     *
     * @return self
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return int
     */
    public function getCustomer()
    {
      return $this->customer;
    }

    /**
     * @param string $customer
     *
     * @return self
     */
     public function setCustomer($customer)
     {
        $this->customer = $customer;

        return $this;
     }

    /**
     * @return string
     */
    public function getStatus()
    {
      return $this->status;
    }

    /**
     * @param string $status
     *
     * @return self
     */
     public function setStatus($status)
     {
        $this->status = $status;

        return $this;
     }

     /**
      * @return string
      */
     public function getType()
     {
       return $this->type;
     }

     /**
      * @param string $type
      *
      * @return self
      */
      public function setType($type)
      {
         $this->type = $type;

         return $this;
      }

      public function getDescription()
      {
        return $this->description;
      }

      /**
       * @param string $description
       *
       * @return self
       */
       public function setDescription($description)
       {
          $this->description = $description;

          return $this;
       }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page ? $this->page : self::DEFAULT_PAGE;
    }

    /**
     * @param int $page
     *
     * @return self
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderKey()
    {
        return $this->orderKey ? $this->orderKey : self::DEFAULT_ORDER_KEY;
    }

    /**
     * @param string $orderKey
     *
     * @return self
     */
    public function setOrderKey($orderKey)
    {
        $this->orderKey = $orderKey;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderDirection()
    {
        return empty($this->orderDirection) || $this->orderDirection == -1 ? 'DESC' : 'ASC';
    }

    /**
     * @param string $orderDirection
     *
     * @return self
     */
    public function setOrderDirection($orderDirection)
    {
        $this->orderDirection = $orderDirection;

        return $this;
    }

    /**
     * @return string
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * @param string $keyword
     *
     * @return self
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return empty($this->limit) || $this->limit > self::LIMIT ? self::LIMIT : $this->limit;
    }

    /**
     * @param int $limit
     *
     * @return self
     */
    public function setLimit($limit)
    {
        $this->limit = $limit > self::LIMIT ? self::LIMIT : $limit;

        return $this;
    }

    /**
     * @return array
     */
    public function getSerialisationGroups()
    {
        return !empty($this->serialisationGroups) ? $this->serialisationGroups : ['default'];
    }

    /**
     * @param string $serialisationGroups
     *
     * @return array
     */
    public function setSerialisationGroups($serialisationGroups)
    {
        $this->serialisationGroups = $serialisationGroups;

        return $this;
    }
}

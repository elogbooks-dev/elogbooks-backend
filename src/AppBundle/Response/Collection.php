<?php

namespace AppBundle\Response;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Collection
 */
class Collection
{
    /**
     * @var array
     *
     * @JMS\Expose
     * @JMS\Groups({"list", "default"})
     */
    protected $data;

    /**
     * @var integer
     *
     * @JMS\Expose
     * @JMS\Groups({"list", "default"})
     */
    protected $count;

    /**
     * @var integer
     *
     * @JMS\Expose
     * @JMS\Groups({"list", "default"})
     */
    protected $page;

    /**
     * @var integer
     *
     * @JMS\Expose
     * @JMS\Groups({"list", "default"})
     */
    protected $pages;

    /**
     * Collection constructor.
     * @param array $data
     * @param int   $count
     * @param int   $page
     * @param int   $pages
     */
    public function __construct(array $data, $count, $page, $pages)
    {
        $this->data = $data;
        $this->count = $count;
        $this->page = $page;
        $this->pages = $pages;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return int
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * @param int $pages
     */
    public function setPages($pages)
    {
        $this->pages = $pages;
    }
}

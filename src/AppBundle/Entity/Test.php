<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="test")
 */
class Test
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $script_name;

    /**
     * @ORM\Column(type="integer")
     */
    private $start_time;

    /**
     * @ORM\Column(type="integer")
     */
    private $end_time;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $result;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set scriptName
     *
     * @param integer $scriptName
     *
     * @return Test
     */
    public function setScriptName($scriptName)
    {
        $this->script_name = $scriptName;

        return $this;
    }

    /**
     * Get scriptName
     *
     * @return integer
     */
    public function getScriptName()
    {
        return $this->script_name;
    }

    /**
     * Set endTime
     *
     * @param integer $endTime
     *
     * @return Test
     */
    public function setEndTime($endTime)
    {
        $this->end_time = $endTime;

        return $this;
    }

    /**
     * Get endTime
     *
     * @return integer
     */
    public function getEndTime()
    {
        return $this->end_time;
    }

    /**
     * Set result
     *
     * @param string $result
     *
     * @return Test
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get result
     *
     * @return string
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Set startTime
     *
     * @param integer $startTime
     *
     * @return Test
     */
    public function setStartTime($startTime)
    {
        $this->start_time = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return integer
     */
    public function getStartTime()
    {
        return $this->start_time;
    }
}

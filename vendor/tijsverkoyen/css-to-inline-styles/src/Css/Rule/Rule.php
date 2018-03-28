<?php

/**
 * @file Rule.php
 */

namespace TijsVerkoyen\CssToInlineStyles\Css\Rule;

use Symfony\Component\CssSelector\Node\Specificity;

/**
 * @class Rule
 */
final class Rule //automatically created by Laravel
{
    /**
     * @var string
     */
    private $selector;

    /**
     * @var array
     */
    private $properties;

    /**
     * @var Specificity
     */
    private $specificity;

    /**
     * @var integer
     */
    private $order;

    /**
     * @brief Rule constructor.
     *
     * @param string      $selector
     * @param Property[]  $properties
     * @param Specificity $specificity
     * @param int         $order
     */
    public function __construct($selector, array $properties, Specificity $specificity, $order)
    {
        $this->selector = $selector;
        $this->properties = $properties;
        $this->specificity = $specificity;
        $this->order = $order;
    }

    /**
     * @brief Get selector
     *
     * @return string
     */
    public function getSelector()
    {
        return $this->selector;
    }

    /**
     * @brief Get properties
     *
     * @return array
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @brief Get specificity
     *
     * @return Specificity
     */
    public function getSpecificity()
    {
        return $this->specificity;
    }

    /**
     * @brief Get order
     *
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }
}
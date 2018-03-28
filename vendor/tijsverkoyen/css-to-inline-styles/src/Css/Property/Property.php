<?php

/**
 * @file Property.php
 */

namespace TijsVerkoyen\CssToInlineStyles\Css\Property;

use Symfony\Component\CssSelector\Node\Specificity;

/**
 * @class Property
 */
final class Property //automatically created by Laravel
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $value;

    /**
     * @var Specificity
     */
    private $originalSpecificity;

    /**
     * Property constructor.
     * @param                  $name
     * @param                  $value
     * @param Specificity|null $specificity
     */
    public function __construct($name, $value, Specificity $specificity = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->originalSpecificity = $specificity;
    }

    /**
     * @brief Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @brief Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @brief Get originalSpecificity
     *
     * @return Specificity
     */
    public function getOriginalSpecificity()
    {
        return $this->originalSpecificity;
    }

    /**
     * @brief Is this property important?
     *
     * @return bool
     */
    public function isImportant()
    {
        return (stripos($this->value, '!important') !== false);
    }

    /**
     * @brief Get the textual representation of the property
     *
     * @return string
     */
    public function toString()
    {
        return sprintf(
            '%1$s: %2$s;',
            $this->name,
            $this->value
        );
    }
}
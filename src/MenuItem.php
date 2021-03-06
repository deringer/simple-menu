<?php

namespace Iatstuti\SimpleMenu;

use Iatstuti\SimpleMenu\Traits\FetchesWeight;
use Iatstuti\SimpleMenu\Traits\ObjectOptions;
use Iatstuti\Support\Traits\MethodPropertyAccess;

/**
 * POPO object to wrap a menu item.
 *
 * @package    Iatstuti\SimpleMenu
 * @copyright  2016 IATSTUTI
 * @author     Michael Dyrynda <michael@iatstuti.net>
 *
 * @property   string $label The menu label
 * @property   array $options The menu options
 */
class MenuItem
{

    use MethodPropertyAccess, ObjectOptions, FetchesWeight;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $link;

    /**
     * @var array
     */
    private $options;


    /**
     * MenuItem constructor.
     *
     * @param  string $label
     * @param  string $link
     * @param  array $options
     */
    public function __construct($label, $link, array $options = [ ])
    {
        $this->label   = $label;
        $this->link    = $link;
        $this->options = array_merge([
            'active' => false,
            'class'  => null,
            'weight' => 0,
        ], $options);
    }


    /**
     * Return this menu item's label.
     *
     * @return string
     */
    public function label()
    {
        return $this->label;
    }


    /**
     * Return this menu item's link.
     *
     * @return string
     */
    public function link()
    {
        return $this->link;
    }


    /**
     * Mark this menu item as the currently active one.
     *
     * @param  string $class
     *
     * @return \Iatstuti\SimpleMenu\MenuItem
     */
    public function active($class = 'active')
    {
        $this->options = array_merge($this->options, [ 'active' => true, 'class' => $class, ]);

        return $this;
    }
}

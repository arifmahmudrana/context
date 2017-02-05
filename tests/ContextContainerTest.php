<?php
/**
 * Created by PhpStorm.
 * User: rana
 * Date: 2/5/17
 * Time: 3:40 PM
 */

namespace ArifMahmudRana\Context\Test;


use ArifMahmudRana\Context\ContextContainer;

class ContextContainerTest extends \PHPUnit_Framework_TestCase
{
    public function getKey()
    {
        return 'user';
    }

    public function getValue()
    {
        return [
            'id' => 1,
            'name' => 'Arif Mahmud Rana',
        ];
    }

    public function getEmptyValue()
    {
        return [];
    }

    /**
     * @expectedException \ArifMahmudRana\Context\Exceptions\CannotInstantiateClassExceptions
     */
    public function test_context_container_class_throws_exception_on_intantiate()
    {
        new ContextContainer();
    }

    public function test_context_container_has_initially_empty_array()
    {
        $this->assertEquals(ContextContainer::all(), $this->getEmptyValue());
    }

    public function test_context_container_can_set_value()
    {
        $this->assertTrue(ContextContainer::set($this->getKey(), $this->getValue()));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_context_container_class_throws_exception_on_invalid_key()
    {
        ContextContainer::set($this->getValue(), $this->getValue());
        ContextContainer::get($this->getValue());
        ContextContainer::has($this->getValue());
        ContextContainer::remove($this->getValue());
    }

    public function test_context_container_has_key()
    {
        $this->assertTrue(ContextContainer::has($this->getKey()));
    }

    public function test_context_container_can_get_value_by_key()
    {
        $this->assertEquals(ContextContainer::get($this->getKey()), $this->getValue());
    }

    public function test_context_container_can_get_all_value()
    {
        $this->assertEquals(ContextContainer::all(), [$this->getKey() => $this->getValue()]);
    }

    public function test_context_container_can_remove_value()
    {
        $this->assertTrue(ContextContainer::remove($this->getKey()));
        $this->assertFalse(ContextContainer::has($this->getKey()));
        $this->assertNull(ContextContainer::get($this->getKey()));
        $this->assertEquals(ContextContainer::all(), $this->getEmptyValue());
    }
}
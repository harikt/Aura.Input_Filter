<?php
namespace Aura\Input_Filter;

class InputFilterTest extends \PHPUnit_Framework_TestCase
{
    public function testInstanceOf()
    {
        $filter_factory = new FilterFactory();
        $filter = $filter_factory->newSubjectFilter('Aura\Input_Filter\InputFilter');
        $this->assertInstanceOf('Aura\Input_Filter\InputFilter', $filter);
        $this->assertInstanceOf('Aura\Filter_Interface\FilterInterface', $filter);
    }
}

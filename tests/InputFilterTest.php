<?php
namespace Aura\Input_Filter;

class InputFilterTest extends \PHPUnit_Framework_TestCase
{
    public function testInstanceOfInputFilter()
    {
        $filterFactory = new FilterFactory();
        $filter = $filterFactory->newSubjectFilter('Aura\Input_Filter\InputFilter');
        $this->assertInstanceOf('Aura\Input_Filter\InputFilter', $filter);
        $this->assertInstanceOf('Aura\Filter_Interface\FilterInterface', $filter);
    }

    public function testInstanceOfFailureCollection()
    {
        $filterFactory = new FilterFactory();
        $failureCollection = $filterFactory->newFailureCollection();
        $this->assertInstanceOf('Aura\Input_Filter\FailureCollection', $failureCollection);
        $this->assertInstanceOf('Aura\Filter_Interface\FailureCollectionInterface', $failureCollection);
    }
}

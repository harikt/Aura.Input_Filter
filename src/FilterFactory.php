<?php
namespace Aura\Input_Filter;

use Aura\Filter\FilterFactory as BaseFilterFactory;
use Aura\Filter_Interface\FailureCollectionInterface;

class FilterFactory extends BaseFilterFactory
{
    /**
     *
     * Returns a new FailureCollection instance.
     *
     * @return FailureCollection
     *
     */
    public function newFailureCollection()
    {
        return new FailureCollection();
    }
}

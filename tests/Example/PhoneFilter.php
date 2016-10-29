<?php
namespace Aura\Input_Filter\Example;

use Aura\Input_Filter\InputFilter;

class PhoneFilter extends InputFilter
{
    protected function init()
    {
        $phoneTypes = [
            'mobile',
            'home',
            'fax'
        ];

        $this->validate('type')->is('inValues', $phoneTypes)->asSoftRule();
        $this->validate('number')->is('regex', '/^[0-9-]+$/')->asSoftRule();
    }
}

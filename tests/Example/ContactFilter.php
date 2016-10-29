<?php
namespace Aura\Input_Filter\Example;

use Aura\Input_Filter\InputFilter;

class ContactFilter extends InputFilter
{
    protected function init()
    {
        $this->validate('first_name')->isNotBlank()->asSoftRule();
        $this->validate('first_name')->is('alnum')->asSoftRule();
        $this->validate('first_name')->is('strlenMin', 3)->asSoftRule();
        $this->validate('first_name')->is('strlenMax', 12)->asSoftRule();

        $this->validate('first_name')->isBlankOr('alnum')->asSoftRule();
        $this->validate('last_name')->isBlankOr('strlenMin', 3)->asSoftRule();
        $this->validate('last_name')->isBlankOr('strlenMax', 12)->asSoftRule();

        $this->validate('email')->is('email')->asSoftRule();

        $this->validate('website')->is('url')->asSoftRule();
    }
}

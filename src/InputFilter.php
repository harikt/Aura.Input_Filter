<?php
namespace Aura\Input_Filter;

use Aura\Filter\SubjectFilter;
use Aura\Filter_Interface\FilterInterface;
use Aura\Filter_Interface\FailureCollectionInterface;

class InputFilter extends SubjectFilter implements FilterInterface
{
    /**
     *
     * Adds an additional failure message / messages on a field.
     *
     * @param string $field The field that failed.
     *
     * @param string|array $messages The failure messages.
     *
     * @return null
     *
     */
    public function addMessagesForField($field, $messages)
    {
        $messages = (array) $messages;
        foreach ($messages as $message) {
            $this->add($field, $message);
        }
    }
}

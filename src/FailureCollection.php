<?php
namespace Aura\Input_Filter;

use Aura\Filter\Failure\FailureCollection as BaseFailureCollection;
use Aura\Filter_Interface\FailureCollectionInterface;

class FailureCollection extends BaseFailureCollection implements FailureCollectionInterface
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

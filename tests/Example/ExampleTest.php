<?php
namespace Aura\Input_Filter\Example;

use Aura\Input\Builder;
use Aura\Input\Example\AddressFieldset;
use Aura\Input\Example\ContactForm;
use Aura\Input\Example\PhoneFieldset;
use Aura\Input_Filter\FilterFactory;

class ExampleTest extends \PHPUnit_Framework_TestCase
{
    protected $form;

    protected function setUp()
    {
        $filterFactory = new FilterFactory();
        $filter = $filterFactory->newSubjectFilter(ContactFilter::CLASS);
        $builder = new Builder([
            'address' => function () use ($filterFactory) {
                return new AddressFieldset(
                    new Builder,
                    $filterFactory->newSubjectFilter(AddressFilter::CLASS)
                );
            },
            'phone' => function () use ($filterFactory) {
                return new PhoneFieldset(
                    new Builder,
                    $filterFactory->newSubjectFilter(PhoneFilter::CLASS)
                );
            },
        ]);

        $this->form = new ContactForm($builder, $filter);
    }

    public function testAll()
    {
        // fill the form with data
        $this->form->fill([
            'first_name' => 'Bolivar',
            'last_name' => 'Shagnasty',
            'no_such_field' => 'nonesuch',
            'email' => 'boshag@example.com',
            'website' => 'http://boshag.example.com',
            'address' => [
                'street' => '123 Main',
                'city' => 'Beverly Hills',
                'state' => 'CA',
                'zip' => '90210',
            ],
            'phone_numbers' => [
                0 => [
                    'type' => 'mobile',
                    'number' => '123-456-7890',
                ],
                1 => [
                    'type' => 'home',
                    'number' => '234-567-8901',
                ],
                2 => [
                    'type' => 'fax',
                    'number' => '345-678-9012',
                ],
            ],
        ]);

        $this->assertTrue($this->form->filter());        
        $this->assertTrue($this->form->getFailures()->isEmpty());
    }

    public function testFailure()
    {
        // fill the form with data
        $this->form->fill([
            'first_name' => '',
            'last_name' => 'John',
            'no_such_field' => 'nonesuch',
            'email' => '',
            'website' => 'http://boshag.example.com',
            'address' => [
                'street' => '123 Main',
                'city' => 'Beverly Hills',
                'state' => 'CA',
                'zip' => '90210',
            ],
            'phone_numbers' => [
                0 => [
                    'type' => 'mobile',
                    'number' => '123-456-7890',
                ],
                1 => [
                    'type' => 'home',
                    'number' => '234-567-8901',
                ],
                2 => [
                    'type' => 'fax',
                    'number' => 'df-678-9012',
                ],
            ],
        ]);

        $this->assertFalse($this->form->filter());
        $failures = $this->form->getFailures();
        $this->assertSame(4, count($failures->getMessagesForField('first_name')));
    }
}

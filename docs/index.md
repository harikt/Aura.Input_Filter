# Getting Started

[Aura.Input](https://github.com/auraphp/Aura.Input) contains bare minimal filtering system.
Aura.Input_Filter helps you to make use of the powerful [Aura.Filter](https://github.com/auraphp/Aura.Filter) system.

```
use Aura\Input\Builder;
use Aura\Input_Filter\FilterFactory;

$filterFactory = new FilterFactory();
$filter = $filterFactory->newSubjectFilter();

// ContactForm is a custom class which extends Aura\Input\Form
$form = new ContactForm($builder, $filter);
```

Consider looking into [Examples](https://github.com/harikt/Aura.Input_Filter/tree/3.x/tests/Example)
and corresponding libraries for their usages.

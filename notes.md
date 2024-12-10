If using Blade (and you've set flavor to Blade), you'll now do:

blade
Copy code
@include(tr_component('\_collapsibles'))
This will translate to something like @include('views.parts.\_collapsibles'), which Blade can resolve correctly to views/parts/\_collapsibles.blade.php.

If using Latte (and you've set flavor to Latte), you'll do:

latte
Copy code
{include tr_component('\_collapsibles')}
Here tr_component('\_collapsibles') returns the full filesystem path, e.g. /path/to/theme/views/parts/\_collapsibles.latte.

If using PHP templates (flavor Php), you can simply:

php
Copy code
include tr_component('\_collapsibles');

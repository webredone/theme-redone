<?php

use ThemeRedone\Core\BlockTypesRegistrar;

BlockTypesRegistrar::registerCurrentBlock(function ($attrs, $content) {
    $attrs['something'] = 'something more';
    $attrs->something_else = 'something else';

    return $attrs;
});

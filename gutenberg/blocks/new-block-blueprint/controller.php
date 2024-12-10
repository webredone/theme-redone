<?php

use ThemeRedone\Core\BlockTypesRegistrar;

BlockTypesRegistrar::registerBlock(__DIR__);

// Or if you want to modifu $attrs

// BlockTypesRegistrar::registerBlock(__DIR__, function ($attrs) {
//     // Add or modify attributes here
//     // $attrs['example'] = 'value';
//     return $attrs;
// });

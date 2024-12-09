<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__, // or specify exact directories like __DIR__ . '/src', etc.
    ])
    ->exclude('vendor')
    ->exclude('node_modules')
    ->exclude('views/temp')
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

// If you want to exclude specific directories, you can chain ->exclude('some-dir')

$config = new PhpCsFixer\Config();

return $config
    ->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'no_unused_imports' => false,
        'trailing_comma_in_multiline' => true,
        'phpdoc_align' => ['align' => 'left'],
        'phpdoc_separation' => true,
        'phpdoc_single_line_var_spacing' => true,
        'phpdoc_trim' => true,
        'declare_strict_types' => false,
        'binary_operator_spaces' => true,
        'concat_space' => ['spacing' => 'one'],
        'method_argument_space' => [
            'on_multiline' => 'ensure_fully_multiline',
            'keep_multiple_spaces_after_comma' => false,
        ],
        'no_extra_blank_lines' => [
            'tokens' => [
                'extra',
                'throw',
                'use',
                'use_trait',
            ],
        ],
        'blank_line_before_statement' => [
            'statements' => ['return', 'throw', 'try'],
        ],
        'fully_qualified_strict_types' => true,
        'no_leading_import_slash' => true,
        'no_superfluous_phpdoc_tags' => [
            'allow_mixed' => true,
            'remove_inheritdoc' => false,
        ],
        'control_structure_continuation_position' => [
            'position' => 'same_line',
        ],
    ])
    ->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setLineEnding("\n");

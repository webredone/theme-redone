<?php

use Latte\Runtime as LR;

/** source: /Users/nikolaivanov/Local Sites/themeredone/app/public/wp-content/themes/theme-redone/gutenberg/blocks/repeater-fields-grid/view.latte */
final class Template_750036ceec extends LR\Template
{
    public const Source = '/Users/nikolaivanov/Local Sites/themeredone/app/public/wp-content/themes/theme-redone/gutenberg/blocks/repeater-fields-grid/view.latte';

    public function main(array $ʟ_args): void
    {
        extract($ʟ_args);
        unset($ʟ_args);

        echo '  <div><pre>';
        echo LR\Filters::escapeHtmlText(var_dump($test_rep_with_defaults)) /* line 1 */;
        echo '</pre></div>
  
';
        if (!empty($breadcrumbs)) { /* line 4 */
            echo '<div
  class="breadcrumbs"
  itemscope itemtype="https://schema.org/BreadcrumbList"
>

';
            foreach ($breadcrumbs as $breadcrumb) { /* line 9 */
                echo '    <pre>';
                echo LR\Filters::escapeHtmlText(var_dump($breadcrumb)) /* line 10 */;
                echo '</pre>
';

            }

            echo '</div>
';
        }
        echo '

';
    }

    public function prepare(): array
    {
        extract($this->params);

        if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
            foreach (array_intersect_key(['breadcrumb' => '9'], $this->params) as $ʟ_v => $ʟ_l) {
                trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
            }
        }

        return get_defined_vars();
    }
}

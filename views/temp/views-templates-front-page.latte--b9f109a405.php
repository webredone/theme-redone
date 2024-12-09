<?php

use Latte\Runtime as LR;

/** source: /Users/nikolaivanov/Local Sites/themeredone/app/public/wp-content/themes/theme-redone/views/templates/front-page.latte */
final class Template_b9f109a405 extends LR\Template
{
    public const Source = '/Users/nikolaivanov/Local Sites/themeredone/app/public/wp-content/themes/theme-redone/views/templates/front-page.latte';

    public function main(array $ʟ_args): void
    {
        extract($ʟ_args);
        unset($ʟ_args);

        $this->createTemplate(tr_view_path('/layout/header'), $this->params, 'include')->renderToContentType('html') /* line 1 */;
        echo "\n";
        $this->createTemplate(tr_part('todo-remove-examples'), $this->params, 'include')->renderToContentType('html') /* line 3 */;
        echo '

<div class="content">
	';
        echo LR\Filters::escapeHtmlText(the_content()) /* line 7 */;
        echo '
</div>


';
        $this->createTemplate(tr_view_path('/layout/footer'), $this->params, 'include')->renderToContentType('html') /* line 11 */;
    }
}

<?php

use Latte\Runtime as LR;

/** source: /Users/nikolaivanov/Local Sites/themeredone/app/public/wp-content/themes/theme-redone/views//layout/main-menu.latte */
final class Templatef495ca8888 extends Latte\Runtime\Template
{
	public const Source = '/Users/nikolaivanov/Local Sites/themeredone/app/public/wp-content/themes/theme-redone/views//layout/main-menu.latte';


	public function main(array $ʟ_args): void
	{
		echo '<header class="header">
	<div class="container">
    <nav class="navbar">
      <a 
      	class="navbar-brand" 
      	href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(esc_url(home_url('/')))) /* line 6 */;
		echo '"
      	itemprop="url" 
        aria-label="';
		echo LR\Filters::escapeHtmlAttr(get_bloginfo('name')) /* line 8 */;
		echo ' Logo - Go to homepage"
      >
        ';
		echo LR\Filters::escapeHtmlText(tr_get_media('logo.svg')) /* line 10 */;
		echo '
      </a>
      <button 
        class="navbar-toggler collapsed" 
        type="button" 
        data-toggle="collapse" 
        aria-expanded="false" 
        aria-label="Toggle navigation"
      >
        <span class="span-icon"></span>
        <span class="span-icon"></span>
        <span class="span-icon"></span>
      </button>
      ';
		echo LR\Filters::escapeHtmlText(wp_nav_menu(['menu' => 'top', 'theme_location' => 'menu-1', 'container' => 'div', 'container_id' => 'tr-main-menu', 'container_class' => 'navbar-collapse', 'menu_id' => 'primary-menu', 'menu_class' => 'navbar-nav', 'depth' => 2, 'fallback_cb' => 'ThemeRedoneWalker::fallback', 'walker' => new ThemeRedoneWalker])) /* line 23 */;
		echo '
    </nav> 
  </div></header>
';
	}
}

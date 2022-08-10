<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme-redone/views//layout/main-menu.latte */
final class Template1ddea12db7 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<header class="header">
	<div class="container">
    <nav class="navbar">
      <a 
      	class="navbar-brand" 
      	href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(esc_url( home_url( '/' ) ))) /* line 6 */;
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
		echo LR\Filters::escapeHtmlText(wp_nav_menu([
			'menu'            => 'top',
			'theme_location'  => 'menu-1',
			'container'       => 'div',
			'container_id'    => 'tr-main-menu',
			'container_class' => 'navbar-collapse',
			'menu_id'         => 'primary-menu',
			'menu_class'      => 'navbar-nav',
			'depth'           => 2,
			'fallback_cb'     => 'ThemeRedoneWalker::fallback',
			'walker'          => new ThemeRedoneWalker()
		])) /* line 23 */;
		echo '
    </nav> 
  </div>
</header>
';
		return get_defined_vars();
	}

}

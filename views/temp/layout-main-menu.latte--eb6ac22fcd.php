<?php
// source: C:\xampp\htdocs\wrwp-starter/wp-content/themes/wr-wp-starter-theme/views//layout/main-menu.latte

use Latte\Runtime as LR;

final class Templateeb6ac22fcd extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<header class="header">
	<div class="container">
    <nav class="navbar navbar-expand-lg">
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
        <img
          src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(($this->global->fn->tr_latte_get_img_path)('logo.png'))) /* line 11 */;
		echo '" 
          alt="Logo ';
		echo LR\Filters::escapeHtmlAttr(get_bloginfo()) /* line 12 */;
		echo '"
       >
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
			'fallback_cb'     => 'bs4navwalker::fallback',
			'walker'          => new bs4navwalker()
		])) /* line 26 */;
		echo '
    </nav> 
  </div>
</header>';
		return get_defined_vars();
	}

}

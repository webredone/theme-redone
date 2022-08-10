<?php
// source: C:\xampp\htdocs\wrwp-starter/wp-content/themes/wrwps-starter-theme/views//layout/footer.latte

use Latte\Runtime as LR;

final class Template4f7bad665c extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '  </main>
  <div class="backdrop"></div>
  <footer class="footer">
    <div class="container">
      <h2>Footer</h2>
      <h3 class="footer-customizer-title">';
		echo LR\Filters::escapeHtmlText(get_theme_mod( "tr_footer_title" )) /* line 6 */;
		echo '</h3>
      <p class="footer-customizer-text">';
		echo LR\Filters::escapeHtmlText(get_theme_mod( "tr_footer_text" )) /* line 7 */;
		echo '</p>
      

      <a 
        href="#" rel="noopener" 
        target="_blank" 
        aria-label="Social Media Link - Go to ';
		echo LR\Filters::escapeHtmlAttr(get_bloginfo('name')) /* line 13 */;
		echo ' Instagram Profile">SOC with schema ready (example for instagram)</a>

      <hr>

      <h4>Footer Menu 1</h4>
      ';
		echo LR\Filters::escapeHtmlText(wp_nav_menu([
			'theme_location'  => 'menu-footer',
			'depth'           => 1
		])) /* line 18 */;
		echo '

      <p class="copyright">
        <small>Copyright &copy; ';
		echo LR\Filters::escapeHtmlText(date("Y")) /* line 24 */;
		echo '</small>
      </p>
    </div>
  </footer>

	';
		echo LR\Filters::escapeHtmlText(wp_footer()) /* line 29 */;
		echo '
</body>
</html>';
		return get_defined_vars();
	}

}

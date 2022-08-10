<?php
// source: C:\xampp\htdocs\wrwp-starter/wp-content/themes/wr-wp-starter-theme/views//layout/footer.latte

use Latte\Runtime as LR;

final class Templatef76de79a30 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '  </main>
  <div class="backdrop"></div>
  <footer class="footer">
    <div class="container">
      <h2>Footer</h2>

      <h4>Footer Menu 1</h4>
      ';
		echo LR\Filters::escapeHtmlText(wp_nav_menu([
			'theme_location'  => 'menu-footer',
			'depth'           => 1
		])) /* line 8 */;
		echo '

      <p class="copyright">
        <small>Copyright &copy; ';
		echo LR\Filters::escapeHtmlText(date("Y")) /* line 14 */;
		echo '</small>
      </p>
    </div>
  </footer>

	';
		echo LR\Filters::escapeHtmlText(wp_footer()) /* line 19 */;
		echo '
</body>
</html>';
		return get_defined_vars();
	}

}

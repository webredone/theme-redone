<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme_redone/views//layout/footer.latte */
final class Template403ec6e737 extends Latte\Runtime\Template
{

	public function main(array $ʟ_args): void
	{
		echo '  </main>
  <div class="backdrop"></div>
  <footer class="footer">
    <div class="container">
      <h2>Footer</h2>

      <h4>Footer Menu 1</h4>
      ';
		echo LR\Filters::escapeHtmlText(wp_nav_menu(['theme_location' => 'menu-footer', 'depth' => 1])) /* line 8 */;
		echo '

      <p class="copyright">
        <small>Copyright &copy; ';
		echo LR\Filters::escapeHtmlText(date('Y')) /* line 14 */;
		echo '</small>
      </p>
    </div>
  </footer>


  ';
		echo LR\Filters::escapeHtmlText(wp_footer()) /* line 20 */;
		echo '
  </body>

  </html>';
	}
}

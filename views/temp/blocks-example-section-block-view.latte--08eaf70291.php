<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone\wp-content\themes\theme-redone\gutenberg\blocks\example-section-block/view.latte */
final class Template08eaf70291 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<section class="example-section-block">
  <h2>Example section block</h2>
';
		ob_start(function () {});
		try {
			echo '  <h3>';
			ob_start();
			try {
				echo LR\Filters::escapeHtmlText($title['text']) /* line 3 */;
			} finally {
				$ʟ_ifc[1] = rtrim(ob_get_flush()) === '';
			}
			echo '</h3>
';
		} finally {
			if ($ʟ_ifc[1] ?? null) {
				ob_end_clean();
			} else {
				echo ob_get_clean();
			}
		}
		ob_start(function () {});
		try {
			echo '  <p>';
			ob_start();
			try {
				echo $text['text'] /* line 4 */;
			} finally {
				$ʟ_ifc[2] = rtrim(ob_get_flush()) === '';
			}
			echo '</p>
';
		} finally {
			if ($ʟ_ifc[2] ?? null) {
				ob_end_clean();
			} else {
				echo ob_get_clean();
			}
		}
		echo "\n";
		ob_start(function () {});
		try {
			echo '  <div>';
			ob_start();
			try {
				echo LR\Filters::escapeHtmlText(($this->filters->date)($event_date_time['value'], 'j. n. Y')) /* line 6 */;
			} finally {
				$ʟ_ifc[3] = rtrim(ob_get_flush()) === '';
			}
			echo '</div>
';
		} finally {
			if ($ʟ_ifc[3] ?? null) {
				ob_end_clean();
			} else {
				echo ob_get_clean();
			}
		}
		ob_start(function () {});
		try {
			echo '  <div>';
			ob_start();
			try {
				echo LR\Filters::escapeHtmlText(($this->filters->date)($event_date_time['value'], 'j. n. Y - H:i:s')) /* line 7 */;
			} finally {
				$ʟ_ifc[4] = rtrim(ob_get_flush()) === '';
			}
			echo '</div>
';
		} finally {
			if ($ʟ_ifc[4] ?? null) {
				ob_end_clean();
			} else {
				echo ob_get_clean();
			}
		}
		ob_start(function () {});
		try {
			echo '  <div>';
			ob_start();
			try {
				echo LR\Filters::escapeHtmlText(($this->filters->date)($event_date_time['value'], 'j. n. Y - g:i:s A')) /* line 8 */;
			} finally {
				$ʟ_ifc[5] = rtrim(ob_get_flush()) === '';
			}
			echo '</div>
';
		} finally {
			if ($ʟ_ifc[5] ?? null) {
				ob_end_clean();
			} else {
				echo ob_get_clean();
			}
		}
		echo '

  <div class="spas-test">
    <div class="svelte"></div>

  </div>
</section>';
		return get_defined_vars();
	}

}

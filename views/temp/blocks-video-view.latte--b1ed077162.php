<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone\wp-content\themes\theme_redone\gutenberg\blocks\video/view.latte */
final class Templateb1ed077162 extends Latte\Runtime\Template
{

	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '


';
		if ($video_src) /* line 16 */ {
			echo '<figure 
	class="wp-figure tr-video-outer-wrap"
>
';
			$this->createTemplate(tr_part('video'), ['video_src' => $video_src, 'video_type' => tr_get_video_type_and_id($video_src)] + $this->params, 'include')->renderToContentType('html') /* line 19 */;
			echo "\n";
			ob_start(fn() => '');
			try {
				echo '	<figcaption class="wp-figcaption caption">';
				ob_start();
				try {
					echo '
		';
					echo $optional_caption['text'] /* line 25 */;
					echo '
	';

				} finally {
					$ʟ_ifc[0] = rtrim(ob_get_flush()) === '';
				}
				echo '</figcaption>
';

			} finally {
				if ($ʟ_ifc[0] ?? null) {
					ob_end_clean();
				} else {
					echo ob_get_clean();
				}
			}
			echo '</figure>
';
		}
	}


	public function prepare(): array
	{
		extract($this->params);

		$video_src = '' /* line 1 */;
		if ($inspector_is_self_hosted['checked']) /* line 2 */ {
			if ($self_hosted_video['src']) /* line 3 */ {
				$video_src = $self_hosted_video['src'] /* line 4 */;
			}
		} else /* line 7 */ {
			if ($yt_or_vimeo_url['text']) /* line 8 */ {
				$video_src = $yt_or_vimeo_url['text'] /* line 9 */;
			}
		}
		return get_defined_vars();
	}
}

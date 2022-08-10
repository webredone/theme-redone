<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\theme_redone/wp-content/themes/theme-redone/views/parts/video.latte */
final class Template4b5c401424 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		if ($video_type['video_type'] === "youtube") /* line 1 */ {
			echo '  <div class="video-wrapper-width" data-source="self-youtube">
    <div class="video-wrapper">
      <iframe 
        width="560" 
        height="315" 
        src="https://www.youtube.com/embed/';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($video_type['video_id'])) /* line 7 */;
			echo '?autoplay=0" 
        title="YouTube video player" 
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen
      ></iframe>
    </div>
  </div>
';
		}
		echo "\n";
		if ($video_type['video_type'] === "vimeo") /* line 17 */ {
			echo '  <div class="video-wrapper-width" data-source="self-vimeo">
    <div class="video-wrapper">
      <iframe 
        src="https://player.vimeo.com/video/';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($video_type['video_id'])) /* line 21 */;
			echo '" 
        width="640" 
        height="360" 
        style="position:absolute;top:0;left:0;width:100%;height:100%;" 
        frameborder="0" 
        allow="fullscreen; picture-in-picture" 
        allowfullscreen
      ></iframe>
    </div>
  </div>
';
		}
		echo "\n";
		if ($video_type['video_type'] !== "vimeo" && $video_type['video_type'] !== "youtube") /* line 33 */ {
			echo '  <div class="video-wrapper-width" data-source="self-hosted">
    <div class="video-wrapper">
      <video controls="" preload="metadata" src=';
			echo LR\Filters::safeUrl($video_src) /* line 36 */;
			echo '#t=0.001></video>
    </div>
  </div>
';
		}
		echo "\n";
		return get_defined_vars();
	}

}

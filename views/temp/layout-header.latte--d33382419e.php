<?php

use Latte\Runtime as LR;

/** source: /home/nikola/Local Sites/themeredone/app/public/wp-content/themes/themeredone/views//layout/header.latte */
final class Templated33382419e extends Latte\Runtime\Template
{

	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<!doctype html>
<html ';
		echo language_attributes() /* line 2 */;
		echo '>

<head>
	<meta charset="';
		echo LR\Filters::escapeHtmlAttr(bloginfo('charset')) /* line 5 */;
		echo '">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

	';
		echo LR\Filters::escapeHtmlText(wp_head()) /* line 13 */;
		echo '

	<link rel="preload" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(get_template_directory_uri())) /* line 15 */;
		echo '/prod/global/style.css" as="style">
	<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(get_template_directory_uri())) /* line 16 */;
		echo '/prod/global/style.css">

	<script type="text/javascript">
		var tr_theme_url = ';
		echo LR\Filters::escapeJs(get_bloginfo('template_url')) /* line 19 */;
		echo ';
		var tr_site_url = ';
		echo LR\Filters::escapeJs(esc_url(home_url('/'))) /* line 20 */;
		echo ';
	</script>
</head>

<body ';
		echo body_class() /* line 24 */;
		echo '>
';
		$this->createTemplate(tr_view_path('/layout/main-menu'), $this->params, 'include')->renderToContentType('html') /* line 25 */;
		echo '	<main class="main-content ';
		echo LR\Filters::escapeHtmlAttr(tr_is_ie() ? 'main_is_ie' : '') /* line 26 */;
		echo '">';
	}
}

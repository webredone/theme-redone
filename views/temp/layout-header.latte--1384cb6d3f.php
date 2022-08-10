<?php
// source: C:\xampp\htdocs\wrwp-starter/wp-content/themes/wr-wp-starter-theme/views//layout/header.latte

use Latte\Runtime as LR;

final class Template1384cb6d3f extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<!doctype html>
<html ';
		echo LR\Filters::escapeHtmlAttrUnquoted(language_attributes()) /* line 2 */;
		echo '>

<head>
	<meta charset="';
		echo LR\Filters::escapeHtmlAttr(bloginfo('charset')) /* line 5 */;
		echo '">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(tr_get_img_path('meta/favicon.ico'))) /* line 8 */;
		echo '" rel="shortcut icon">
	<link href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(tr_get_img_path('meta/touch.png'))) /* line 9 */;
		echo '" rel="apple-touch-icon-precomposed">

	';
		echo LR\Filters::escapeHtmlText(wp_head()) /* line 11 */;
		echo '

	<style id="critical-css" type="text/css">
		';
		echo file_get_contents(get_template_directory() . '/prod/critical.css') /* line 14 */;
		echo '
	</style>

	<link rel="preload" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(get_template_directory_uri())) /* line 17 */;
		echo '/prod/style.css" as="style">
	<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(get_template_directory_uri())) /* line 18 */;
		echo '/prod/style.css">

	<script type="text/javascript">
		var tr_theme_url = ';
		echo LR\Filters::escapeJs(get_bloginfo("template_url")) /* line 21 */;
		echo ';
		var tr_site_url = ';
		echo LR\Filters::escapeJs(esc_url( home_url( '/' ) )) /* line 22 */;
		echo ';
	</script>
</head>

<body ';
		echo LR\Filters::escapeHtmlAttrUnquoted(body_class()) /* line 26 */;
		echo '>
';
		/* line 27 */
		$this->createTemplate(($this->global->fn->tr_view_path)('/layout/main-menu'), $this->params, 'include')->renderToContentType('html');
		echo '	<main class="main-content ';
		echo LR\Filters::escapeHtmlAttr(tr_is_ie() ? 'main_is_ie' : '') /* line 28 */;
		echo '">';
		return get_defined_vars();
	}

}

<!DOCTYPE HTML>
<html lang="en-US">
<head>

<meta charset="utf-8">
<title><?php wp_title(' | ', true, 'right'); ?></title>
<meta name="description" content="<?php bloginfo( 'description' ) ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<meta property="og:title" content="<?php bloginfo( 'name' ) ?>">
<meta property="og:url" content="<?php bloginfo( 'wpurl' ) ?>">
<meta property="og:image" content="<?php bloginfo('template_directory'); ?>/images/link-facebook.jpg">
<meta property="og:description" content="<?php bloginfo( 'description' ) ?>">
	
<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<script type="text/javascript" src="//use.typekit.net/tej1etf.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<?php wp_head(); ?>
	
	
</head>

<body <?php body_class(); ?>>

<div id="wrapper" class="frame">

<header id="header">
<div class="wrap">

<h1 class="logo">
<a href="/" title="<?php esc_attr_e( get_bloginfo('name'), 'blankslate' ); ?>" rel="home"><?php echo esc_html( get_bloginfo('name') ); ?></a>
<span><?php echo esc_html( get_bloginfo('description') ); ?></span>
</h1>

<ul class="accordion">
<li><a href="/about">About</a></li>
<li><a href="/rates">Rates</a></li>
<li>
<div>Projects</div>
<?php wp_nav_menu( array( 'theme_location' => 'logged-in', 'container' => '', 'items_wrap' => '<ul>%3$s</ul>', ) ); ?>
</li>
</ul>

<div id="footer-menu">
<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'items_wrap' => '%3$s' ) ); ?>
</div><!--Footer Menu-->

</div>
</header><!--Header-->

<div id="content-wrap">
<div id="content" class="hfeed">


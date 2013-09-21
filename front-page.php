<?php ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">

	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<title><?php bloginfo('name'); ?></title>

		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />

		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/front-page.css" type="text/css" />

	</head>

	<body>

		<div id="wrap">

			<div id="front-page-main">
				<?php dynamic_sidebar('front-page-main'); ?>
			</div>

			<div id="front-page-right">
				<?php dynamic_sidebar('front-page-right'); ?>
			</div>
		</div>

	</body>
</html>
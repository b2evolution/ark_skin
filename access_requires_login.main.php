<?php
/**
 * This file is the template that displays "login required" for non logged-in users.
 *
 * For a quick explanation of b2evo 2.0 skins, please start here:
 * {@link http://b2evolution.net/man/skin-development-primer}
 *
 * @package evoskins
 * @subpackage bootstrap_blog
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );


global $app_version, $disp, $Blog;

if( evo_version_compare( $app_version, '6.4' ) < 0 )
{ // Older skins (versions 2.x and above) should work on newer b2evo versions, but newer skins may not work on older b2evo versions.
	die( 'This skin is designed for b2evolution 6.4 and above. Please <a href="http://b2evolution.net/downloads/index.html">upgrade your b2evolution</a>.' );
}

// This is the main template; it may be used to display very different things.
// Do inits depending on current $disp:
skin_init( $disp );


// -------------------------- HTML HEADER INCLUDED HERE --------------------------
skin_include( '_html_header.inc.php', array() );
// -------------------------------- END OF HEADER --------------------------------


// ---------------------------- SITE HEADER INCLUDED HERE ----------------------------
// If site headers are enabled, they will be included here:
siteskin_include( '_site_body_header.inc.php' );
// ------------------------------- END OF SITE HEADER --------------------------------
?>
<!-- Ralaway font include -->
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,800,700' rel='stylesheet' type='text/css'>

<?php
if( $Skin->is_visible_container( 'header' ) )
{ // Display 'Page Top' widget container
?>
<div class="headpicture">
	<div class="headipic_section <?php 
									if($Skin->get_setting('header_content_pos')=='center_pos'){echo 'center';}
									else if($Skin->get_setting('header_content_pos')=='left_pos'){echo 'left';}
									else{echo 'right';}
									?>">
		<div class="container">
		<?php
			skin_container( NT_('Header'), array(
			) );
		?>				
		</div>
	</div>
</div>
<?php } ?>

<?php
if( $Skin->is_visible_container( 'menu' ) )
{ // Display 'Menu' widget container
?>
<nav class="top-menu">
	<div class="row">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle navbar-toggle-hamb collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			
				<?php 
				// ------------------------- "Menu" Collection title --------------------------
					skin_widget( array(
						// CODE for the widget:
						'widget'              => 'coll_title',
						// Optional display params
						'block_start'         => '<div class="navbar-brand">',
						'block_end'           => '</div>',
						'item_class'           => 'navbar-brand',
					) );
				// ------------------------- "Menu" Collection logo --------------------------
				?>
				
		</div><!-- /.navbar-header -->

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="navbar-collapse-1">
			<ul class="navbar-nav evo_container evo_container__menu" id="menu">				
				<?php
					// ------------------------- "Menu" CONTAINER EMBEDDED HERE --------------------------
					// Display container and contents:
					// Note: this container is designed to be a single <ul> list
					skin_container( NT_('Menu'), array(
							// The following params will be used as defaults for widgets included in this container:
							'block_start'         => '',
							'block_end'           => '',
							'block_display_title' => false,
							'list_start'          => '',
							'list_end'            => '',
							'item_start'          => '<li class="evo_widget $wi_class$">',
							'item_end'            => '</li>',
							'item_selected_start' => '<li class="active evo_widget $wi_class$">',
							'item_selected_end'   => '</li>',
							'item_title_before'   => '',
							'item_title_after'    => '',
						) );
					// ----------------------------- END OF "Menu" CONTAINER -----------------------------
				?>
			</ul>
		</div><!-- .collapse -->
	</div><!-- .row -->
</nav><!-- .top-menu -->
<?php } ?>

<div class="container">

<!-- =================================== START OF MAIN AREA =================================== -->
	<div class="row">
		<div class="<?php echo ( $Skin->get_setting( 'layout' ) == 'single_column' ? 'col-md-12' : 'col-md-8' ); ?>"<?php
				echo ( $Skin->get_setting( 'layout' ) == 'left_sidebar' ? ' style="float:right;"' : '' ); ?>>
				
		<main><!-- This is were a link like "Jump to main content" would land -->

		<!-- ================================= START OF MAIN AREA ================================== -->

		<?php
			// -------------- MAIN CONTENT TEMPLATE INCLUDED HERE (Based on $disp) --------------
			skin_include( '$disp$', array(
					// Form params for the forms below: login, register, lostpassword, activateinfo and msgform
					'skin_form_before'      => '<div class="panel panel-default skin-form">'
																				.'<div class="panel-heading">'
																					.'<h3 class="panel-title">$form_title$</h3>'
																				.'</div>'
																				.'<div class="panel-body">',
					'skin_form_after'       => '</div></div>',
					// Login
					'display_form_messages' => true,
					'form_title_login'      => T_('Log in to your account').'$form_links$',
					'form_title_lostpass'   => get_request_title().'$form_links$',
					'lostpass_page_class'   => 'evo_panel__lostpass',
					'login_form_inskin'     => false,
					'login_page_class'      => 'evo_panel__login',
					'login_page_before'     => '<div class="$form_class$">',
					'login_page_after'      => '</div>',
					'display_reg_link'      => true,
					'abort_link_position'   => 'form_title',
					'abort_link_text'       => '<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>',
				) );
			// Note: you can customize any of the sub templates included here by
			// copying the matching php file into your skin directory.
			// ------------------------- END OF MAIN CONTENT TEMPLATE ---------------------------
		?>
		</main>

	</div><!-- .col -->

<!-- =================================== START OF SIDEBAR =================================== -->
	<?php
	if( $Skin->get_setting( 'layout' ) != 'single_column' )
	{
	?>
	<div class="col-md-4 sidebar"<?php echo ( $Skin->get_setting( 'layout' ) == 'left_sidebar' ? ' style="float:left;"' : '' ); ?>>
		<!-- =================================== START OF SIDEBAR =================================== -->
		<?php
		if( $Skin->is_visible_container( 'sidebar' ) )
		{ // Display 'Sidebar' widget container
		?>
		<div class="evo_container evo_container__sidebar">
		<?php
			// ------------------------- "Sidebar" CONTAINER EMBEDDED HERE --------------------------
			// Display container contents:
			skin_container( NT_('Sidebar'), array(
					// The following (optional) params will be used as defaults for widgets included in this container:
					// This will enclose each widget in a block:
					'block_start' => '<div class="panel panel-default widget $wi_class$">',
					'block_end' => '</div>',
					// This will enclose the title of each widget:
					'block_title_start' => '<div class="panel-heading"><h4 class="panel-title">',
					'block_title_end' => '</h4></div>',
					// This will enclose the body of each widget:
					'block_body_start' => '<div class="panel-body">',
					'block_body_end' => '</div>',
					// If a widget displays a list, this will enclose that list:
					'list_start' => '<ul>',
					'list_end' => '</ul>',
					// This will enclose each item in a list:
					'item_start' => '<li>',
					'item_end' => '</li>',
					// This will enclose sub-lists in a list:
					'group_start' => '<ul>',
					'group_end' => '</ul>',
					// This will enclose (foot)notes:
					'notes_start' => '<div class="notes">',
					'notes_end' => '</div>',
					// Widget 'Search form':
					'search_class'         => 'compact_search_form',
					'search_input_before'  => '',
					'search_input_after'   => '',
					'search_submit_before' => '',
					'search_submit_after'  => '',
				) );
			// ----------------------------- END OF "Sidebar" CONTAINER -----------------------------
		?>
		</div>
		<?php }
		
		if( $Skin->is_visible_container( 'sidebar2' ) )
		{ // Display 'Sidebar' widget container
		?>
		<div class="evo_container evo_container__sidebar2">
		<?php
			// ------------------------- "Sidebar" CONTAINER EMBEDDED HERE --------------------------
			// Display container contents:
			skin_container( NT_('Sidebar 2'), array(
					// The following (optional) params will be used as defaults for widgets included in this container:
					// This will enclose each widget in a block:
					'block_start' => '<div class="panel panel-default evo_widget $wi_class$">',
					'block_end' => '</div>',
					// This will enclose the title of each widget:
					'block_title_start' => '<div class="panel-heading"><h4 class="panel-title">',
					'block_title_end' => '</h4></div>',
					// This will enclose the body of each widget:
					'block_body_start' => '<div class="panel-body">',
					'block_body_end' => '</div>',
					// If a widget displays a list, this will enclose that list:
					'list_start' => '<ul>',
					'list_end' => '</ul>',
					// This will enclose each item in a list:
					'item_start' => '<li>',
					'item_end' => '</li>',
					// This will enclose sub-lists in a list:
					'group_start' => '<ul>',
					'group_end' => '</ul>',
					// This will enclose (foot)notes:
					'notes_start' => '<div class="notes">',
					'notes_end' => '</div>',
					// Widget 'Search form':
					'search_class'         => 'compact_search_form',
					'search_input_before'  => '<div class="input-group">',
					'search_input_after'   => '',
					'search_submit_before' => '<span class="input-group-btn">',
					'search_submit_after'  => '</span></div>',
				) );
			// ----------------------------- END OF "Sidebar" CONTAINER -----------------------------
		?>
		</div>
		</div>
	<?php }
	} ?>
	</div>
</div>

<!-- =================================== START OF FOOTER =================================== -->
<footer class="footer">
	<div class='container'>
		<?php
			// Display container and contents:
			skin_container( NT_("Footer"), array(
					// The following params will be used as defaults for widgets included in this container:
					'block_start' => '<div class="widget $wi_class$">',
					'block_end' => '</div>',
					'block_title_start' => '<div class="panel-heading"><h4 class="panel-title">',
					'block_title_end' => '</h4></div>',
					'block_body_start' => '<div class="panel-body">',
					'block_body_end' => '</div>',
				) );
			// Note: Double quotes have been used around "Footer" only for test purposes.
		?>
		<div class="footer_note__wrapper clear">
			<p class="footer_note">
				<?php
					// Display footer text (text can be edited in Blog Settings):
					$Blog->footer_text( array(
							'before'      => '',
							'after'       => ' &bull; ',
						) );
				?>

				<?php
					// Display a link to contact the owner of this blog (if owner accepts messages):
					$Blog->contact_link( array(
							'before'      => '',
							'after'       => ' &bull; ',
							'text'   => T_('Contact'),
							'title'  => T_('Send a message to the owner of this blog...'),
						) );
					// Display a link to help page:
					$Blog->help_link( array(
							'before'      => ' ',
							'after'       => ' ',
							'text'        => T_('Help'),
						) );
				?>

				<?php
					if($Skin->get_setting('b2evo_credits')==true) {
					// Display additional credits:
					// If you can add your own credits without removing the defaults, you'll be very cool :))
					// Please leave this at the bottom of the page to make sure your blog gets listed on b2evolution.net
					credits( array(
							'list_start'  => '&bull;',
							'list_end'    => ' ',
							'separator'   => '&bull;',
							'item_start'  => ' ',
							'item_end'    => ' ',
						) );
					}
				?>
			</p>
			<?php
			if($Skin->get_setting('footer_links')==true) {
				skin_widget( array(
					// CODE for the widget:
					'widget'              => 'user_links',
				) );
			}
			?>
		</div>
	</div>
</footer>

<?php
// ---------------------------- SITE FOOTER INCLUDED HERE ----------------------------
// If site footers are enabled, they will be included here:
siteskin_include( '_site_body_footer.inc.php' );
// ------------------------------- END OF SITE FOOTER --------------------------------


// ------------------------- HTML FOOTER INCLUDED HERE --------------------------
skin_include( '_html_footer.inc.php' );
// Note: You can customize the default HTML footer by copying the
// _html_footer.inc.php file into the current skin folder.
// ------------------------------- END OF FOOTER --------------------------------
?>
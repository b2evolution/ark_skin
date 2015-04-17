<?php
/**
 * This is the main/default page template for the "bootstrap" skin.
 *
 * This skin only uses one single template which includes most of its features.
 * It will also rely on default includes for specific dispays (like the comment form).
 *
 * For a quick explanation of b2evo 2.0 skins, please start here:
 * {@link http://b2evolution.net/man/skin-structure}
 *
 * The main page template is used to display the blog when no specific page template is available
 * to handle the request (based on $disp).
 *
 * @package evoskins
 * @subpackage bootstrap
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

if( version_compare( $app_version, '5.0' ) < 0 )
{ // Older skins (versions 2.x and above) should work on newer b2evo versions, but newer skins may not work on older b2evo versions.
	die( 'This skin is designed for b2evolution 5.0 and above. Please <a href="http://b2evolution.net/downloads/index.html">upgrade your b2evolution</a>.' );
}

// This is the main template; it may be used to display very different things.
// Do inits depending on current $disp:
skin_init( $disp );


// -------------------------- HTML HEADER INCLUDED HERE --------------------------
skin_include( '_html_header.inc.php', array(
	'html_tag' => '<!DOCTYPE html>'."\r\n"
	             .'<html lang="'.locale_lang( false ).'">',
) );
// Note: You can customize the default HTML header by copying the generic
// /skins/_html_header.inc.php file into the current skin folder.
// -------------------------------- END OF HEADER --------------------------------

// ---------------------------- SITE HEADER INCLUDED HERE ----------------------------
// If site headers are enabled, they will be included here:
siteskin_include( '_site_body_header.inc.php' );
// ------------------------------- END OF SITE HEADER --------------------------------

if( $is_pictured_page )
{ // Display a picture from skin setting as background image
	global $media_path, $media_url;
	$bg_image = $Skin->get_setting( 'front_bg_image' );
	echo '<div class="headpicture">';
	if( ! empty( $bg_image ) && file_exists( $media_path.$bg_image ) )
	{ // If it exists in media folder
		echo '<img src="'.$media_url.$bg_image.'" />';
	}
	echo '</div>';
}

?>

<div class='headpicture'>
	<img src='/media/shared/global/sunset/sunset.jpg'>
</div>

<div class="container">

<!-- =================================== START OF MAIN AREA =================================== -->
	<div class="row">
		<div class="<?php echo ( $Skin->get_setting( 'layout' ) == 'single_column' ? 'col-md-12' : 'col-md-8' ); ?>"<?php
				echo ( $Skin->get_setting( 'layout' ) == 'left_sidebar' ? ' style="float:right;"' : '' ); ?>>

	<?php
	if( ! in_array( $disp, array( 'login', 'lostpassword', 'register', 'activateinfo' ) ) )
	{ // Don't display the messages here because they are displayed inside wrapper to have the same width as form
		// ------------------------- MESSAGES GENERATED FROM ACTIONS -------------------------
		messages( array(
				'block_start' => '<div class="action_messages">',
				'block_end'   => '</div>',
			) );
		// --------------------------------- END OF MESSAGES ---------------------------------
	}
	?>

	<?php
		// ------------------------ TITLE FOR THE CURRENT REQUEST ------------------------
		request_title( array(
				'title_before'      => '<h1>',
				'title_after'       => '</h1>',
				'title_none'        => '',
				'glue'              => ' - ',
				'title_single_disp' => true,
				'format'            => 'htmlbody',
				'register_text'     => '',
				'login_text'        => '',
				'lostpassword_text' => '',
				'account_activation' => '',
				'msgform_text'      => '',
			) );
		// ----------------------------- END OF REQUEST TITLE ----------------------------
	?>

	<?php
	// Go Grab the featured post:
	if( $Item = & get_featured_Item() )
	{ // We have a featured/intro post to display:
		// ---------------------- ITEM BLOCK INCLUDED HERE ------------------------
		echo '<div class="panel panel-default"><div class="panel-body">';
		skin_include( '_item_block.inc.php', array(
				'feature_block' => true,
				'content_mode' => 'auto',		// 'auto' will auto select depending on $disp-detail
				'intro_mode'   => 'normal',	// Intro posts will be displayed in normal mode
				'item_class'   => '',
			) );
		echo '</div></div>';
		// ----------------------------END ITEM BLOCK  ----------------------------
	}
	?>


	<?php
	if( $disp != 'front' && $disp != 'download' && $disp != 'search' )
	{
		
		
		
		
		// --------------------------------- START OF POSTS -------------------------------------
		// Display message if no post:
		display_if_empty();

		while( $Item = & mainlist_get_item() )
		{ // For each blog post, do everything below up to the closing curly brace "}"

			// ---------------------- ITEM BLOCK INCLUDED HERE ------------------------
			skin_include( '_item_block.inc.php', array(
					'content_mode' => 'auto',		// 'auto' will auto select depending on $disp-detail
					// Comment template
					'comment_start'         => '<div class="panel panel-default">',
					'comment_end'           => '</div>',
					'comment_title_before'  => '<div class="panel-heading">',
					'comment_title_after'   => '',
					'comment_rating_before' => '<div class="comment_rating floatright">',
					'comment_rating_after'  => '</div>',
					'comment_text_before'   => '</div><div class="panel-body">',
					'comment_text_after'    => '',
					'comment_info_before'   => '<div class="bCommentSmallPrint">',
					'comment_info_after'    => '</div></div>',
					'preview_start'         => '<div class="panel panel-warning" id="comment_preview">',
					'preview_end'           => '</div>',
					'comment_attach_info'   => get_icon( 'help', 'imgtag', array(
							'data-toggle'    => 'tooltip',
							'data-placement' => 'bottom',
							'data-html'      => 'true',
							'title'          => htmlspecialchars( get_upload_restriction( array(
									'block_after'     => '',
									'block_separator' => '<br /><br />' ) ) )
						) ),
					// Comment form
					'form_title_start'      => '<div class="panel '.( $Session->get('core.preview_Comment') ? 'panel-danger' : 'panel-default' )
					                           .' comment_form"><div class="panel-heading"><h3>',
					'form_title_end'        => '</h3></div>',
					'after_comment_form'    => '</div>',
				) );
			// ----------------------------END ITEM BLOCK  ----------------------------

		} // ---------------------------------- END OF POSTS ------------------------------------
		
	}
	?>
	</div>


<!-- =================================== START OF SIDEBAR =================================== -->
	<?php
	if( $Skin->get_setting( 'layout' ) != 'single_column' )
	{
	?>
		<div class="col-md-4"<?php echo ( $Skin->get_setting( 'layout' ) == 'left_sidebar' ? ' style="float:left;"' : '' ); ?>>
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
				'search_input_before'  => '<div class="input-group">',
				'search_input_after'   => '',
				'search_submit_before' => '<span class="input-group-btn">',
				'search_submit_after'  => '</span></div>',
			) );
		// ----------------------------- END OF "Sidebar" CONTAINER -----------------------------
	?>
		</div>
	<?php } ?>
	</div>
</div>

<!-- =================================== START OF FOOTER =================================== -->
<footer class="footer">
	<div class='container'>
		<div class='row'>
		<?php
			// Display container and contents:
			skin_container( NT_("Footer"), array(
					// The following params will be used as defaults for widgets included in this container:
					'block_start' => '<div class="col-md-4 widget $wi_class$">',
					'block_end' => '</div>',
					'block_title_start' => '<div class="panel-heading"><h4 class="panel-title">',
					'block_title_end' => '</h4></div>',
					'block_body_start' => '<div class="panel-body">',
					'block_body_end' => '</div>',
				) );
			// Note: Double quotes have been used around "Footer" only for test purposes.
		?>
		<div class="col-md-12 center">
		<p style='clear:both;'>
			<?php
				// Display footer text (text can be edited in Blog Settings):
				$Blog->footer_text( array(
						'before'      => '',
						'after'       => ' &bull; ',
					) );

			// TODO: dh> provide a default class for pTyp, too. Should be a name and not the ityp_ID though..?!
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
			?>
		</p>

			</div>
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
<?php
/**
 * This file implements a class derived of the generic Skin class in order to provide custom code for
 * the skin in this folder.
 *
 * This file is part of the b2evolution project - {@link http://b2evolution.net/}
 *
 * @package skins
 * @subpackage bootstrap
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

/**
 * Specific code for this skin.
 *
 * ATTENTION: if you make a new skin you have to change the class name below accordingly
 */
class ark_Skin extends Skin
{	
	var $version = '1.0';
	/**
	 * Do we want to use style.min.css instead of style.css ?
	 */
	var $use_min_css = true;  // true|false|'check' Set this to true for better optimization
	// Note: we leave this on "check" in the bootstrap_blog_skin so it's easier for beginners to just delete the .min.css file
	// But for best performance, you should set it to true.
	
	
  /**
	 * Get default name for the skin.
	 * Note: the admin can customize it.
	 */
	function get_default_name()
	{
		return 'Ark Blog';
	}


  /**
	 * Get default type for the skin.
	 */
	function get_default_type()
	{
		return 'normal';
	}

	
	/**
	 * What evoSkins API does has this skin been designed with?
	 *
	 * This determines where we get the fallback templates from (skins_fallback_v*)
	 * (allows to use new markup in new b2evolution versions)
	 */
	function get_api_version()
	{
		return 6;
	}
	

	/**
   * Get definitions for editable params
   *
	 * @see Plugin::GetDefaultSettings()
	 * @param local params like 'for_editing' => true
	 */
	function get_param_definitions( $params )
	{
		$r = array_merge( array(
				'general_settings_start' => array(
					'layout' => 'begin_fieldset',
					'label'  => T_('General settings')
				),
					'layout' => array(
						'label' => T_('Page layout'),
						'note' => '',
						'defaultvalue' => 'right_sidebar',
						'options' => array(
								'single_column' => T_('Single column'),
								'left_sidebar'  => T_('Left Sidebar'),
								'right_sidebar' => T_('Right Sidebar'),
							),
						'type' => 'select',
					),						
					'front_bg_image' => array(
						'label' => T_('Front page background image'),
						'defaultvalue' => 'shared/global/sunset/sunset.jpg',
						'type' => 'text',
						'size' => '50'
					),
					'site_background_color' => array(
						'label' => T_('Site background color'),
						'note' => T_('Default value is #FFFFFF'),
						'defaultvalue' => '#FFFFFF',
						'type' => 'color',
					),
					'site_title_color' => array(
						'label' => T_('Site title color'),
						'note' => T_('Default value is #FFFFFF'),
						'defaultvalue' => '#FFFFFF',
						'type' => 'color',
					),
					'site_tagline_color' => array(
						'label' => T_('Site tagline color'),
						'note' => T_('Default value is #333333'),
						'defaultvalue' => '#333333',
						'type' => 'color',
					),
					'site_text_color' => array(
						'label' => T_('Site text color'),
						'note' => T_('Default value is #333333'),
						'defaultvalue' => '#333333',
						'type' => 'color',
					),
					// General links color
					'site_link_color' => array(
						'label' => T_('Site link color'),
						'note' => T_('Default value is #5CBDE0'),
						'defaultvalue' => '#5CBDE0',
						'type' => 'color',
					),
					'site_link_color_hover' => array(
						'label' => T_('Site link color (hover)'),
						'note' => T_('Default value is #4DB6DC'),
						'defaultvalue' => '#4DB6DC',
						'type' => 'color',
					),
				'general_settings_end' => array(
					'layout' => 'end_fieldset',
				),

					
				'top_menu_settings_start' => array(
					'layout' => 'begin_fieldset',
					'label'  => T_('Top menu settings')
				),
					'top_menu_hamburger' => array(
						'label' => T_('Top menu hamburger layout'),
						'note' => T_('Set the exact screen width in pixels (<b>NUMBERS ONLY</b>) to break menu layout to hamburger menu. For example if you write <b>768</b>, you will get hamburger menu until screen size reaches 768px width.'),
						'defaultvalue' => '768',
						'type' => 'text',
						'size' => '7'
					),
					'top_menu_background_color' => array(
						'label' => T_('Top menu background color'),
						'note' => T_('Default value is #282828'),
						'defaultvalue' => '#282828',
						'type' => 'color',
					),
					'top_menu_links_color' => array(
						'label' => T_('Top menu links color'),
						'note' => T_('Default value is #999999'),
						'defaultvalue' => '#999999',
						'type' => 'color',
					),
					'top_menu_links_hover_color' => array(
						'label' => T_('Top menu links hover color'),
						'note' => T_('Default value is #FFFFFF'),
						'defaultvalue' => '#FFFFFF',
						'type' => 'color',
					),
					'top_menu_active_link_background_color' => array(
						'label' => T_('Top menu active link background color'),
						'note' => T_('Default value is #000'),
						'defaultvalue' => '#000',
						'type' => 'color',
					),
				'top_menu_settings_end' => array(
					'layout' => 'end_fieldset',
				),


				'pagination_settings_start' => array(
					'layout' => 'begin_fieldset',
					'label'  => T_('Site pagination settings')
				),
					'site_pagination_links_color' => array(
						'label' => T_('Site pagination links color'),
						'note' => T_('Default value is #FFFFFF'),
						'defaultvalue' => '#FFFFFF',
						'type' => 'color',
					),
					'site_pagination_links_background_color' => array(
						'label' => T_('Site pagination links background color'),
						'note' => T_('Default value is #DDD'),
						'defaultvalue' => '#DDD',
						'type' => 'color',
					),
					'site_pagination_active_link_background_color' => array(
						'label' => T_('Site pagination active link background color'),
						'note' => T_(' <b>NOTE:</b> Unactive pagination links have this background color on hover!'),
						'defaultvalue' => '#333333',
						'type' => 'color',
					),
				'pagination_settings_end' => array(
					'layout' => 'end_fieldset',
				),
				
				
				'posts_layout_start' => array(
					'layout' => 'begin_fieldset',
					'label'  => T_('Posts layout')
				),
					'post_teaser_image' => array(
						'label' => T_('Posts teaser image layout'),
						'note' => 'Regular is default post teaser layout with one full width teaser image in the center.
								   Thumbnail shows small teaser image in the left side of the post.',
						'defaultvalue' => 'regular',
						'options' => array(
								'regular' => T_('Regular'),
								'thumbnail'  => T_('Thumbnail'),
							),
						'type' => 'select',
					),
					'post_title_link_color' => array(
						'label' => T_('Post title link color'),
						'note' => T_('Default value is #333333'),
						'defaultvalue' => '#333333',
						'type' => 'color',
					),
					'post_title_link_color_hover' => array(
						'label' => T_('Post title link color (hover)'),
						'note' => T_('Default value is #000000'),
						'defaultvalue' => '#000000',
						'type' => 'color',
					),
				'posts_layout_end' => array(
					'layout' => 'end_fieldset',
				),
				
				
				'post_preview_comment_start' => array(
					'layout' => 'begin_fieldset',
					'label'  => T_('Post/Preview comment buttons layout')
				),
					// Post button
					'post_button_border_color' => array(
						'label' => T_('Post button border color'),
						'note' => T_('Default value is #269ABC'),
						'defaultvalue' => '#269ABC',
						'type' => 'color',
					),
					'post_button_background_color' => array(
						'label' => T_('Post button background color'),
						'note' => T_('Default value is #31B0D5'),
						'defaultvalue' => '#31B0D5',
						'type' => 'color',
					),
					'post_button_text_color' => array(
						'label' => T_('Post button text color'),
						'note' => T_('Default value is #FFF'),
						'defaultvalue' => '#FFF',
						'type' => 'color',
					),
					// Preview button
					'preview_button_border_color' => array(
						'label' => T_('Post button border color'),
						'note' => T_('Default value is #204D74'),
						'defaultvalue' => '#204D74',
						'type' => 'color',
					),
					'preview_button_background_color' => array(
						'label' => T_('Post button background color'),
						'note' => T_('Default value is #286090'),
						'defaultvalue' => '#286090',
						'type' => 'color',
					),
					'preview_button_text_color' => array(
						'label' => T_('Post button text color'),
						'note' => T_('Default value is #FFF'),
						'defaultvalue' => '#FFF',
						'type' => 'color',
					),
				'post_preview_comment_end' => array(
					'layout' => 'end_fieldset',
				),				
				
				
				'tags_layout_start' => array(
					'layout' => 'begin_fieldset',
					'label'  => T_('Tags layout')
				),
					'post_tags_color_and_border_color' => array(
						'label' => T_('Post tags color and border color'),
						'note' => T_('Default value is #888888'),
						'defaultvalue' => '#888888',
						'type' => 'color',
					),
					'post_tags_background_color_on_hover' => array(
						'label' => T_('Post tags background color (on hover)'),
						'note' => T_('Default value is #EEF'),
						'defaultvalue' => '#EEF',
						'type' => 'color',
					),
					'post_bottom_border_color' => array(
						'label' => T_('Post border bottom color'),
						'note' => T_('Default value is #EEE'),
						'defaultvalue' => '#EEE',
						'type' => 'color',
					),
				'tags_layout_end' => array(
					'layout' => 'end_fieldset',
				),
				
				
				'comments_layout_start' => array(
					'layout' => 'begin_fieldset',
					'label'  => T_('Comments layout')
				),
					'comments_panel_background_color' => array(
						'label' => T_('Comments panel color'),
						'note' => T_('Default value is #EEE'),
						'defaultvalue' => '#EEE',
						'type' => 'color',
					),
					'comments_border_color' => array(
						'label' => T_('Comments border color'),
						'note' => T_('Default value is #DDD'),
						'defaultvalue' => '#DDD',
						'type' => 'color',
					),
				'comments_layout_end' => array(
					'layout' => 'end_fieldset',
				),
				
				
				'footer_layout_start' => array(
					'layout' => 'begin_fieldset',
					'label'  => T_('Footer layout')
				),
					'footer_text_color' => array(
						'label' => T_('Footer text color'),
						'note' => T_('Default value is #7b7b7b'),
						'defaultvalue' => '#7b7b7b',
						'type' => 'color',
					),
					'footer_background_color' => array(
						'label' => T_('Footer background color'),
						'note' => T_('Default value is #222222'),
						'defaultvalue' => '#222222',
						'type' => 'color',
					),
					'footer_link_color' => array(
						'label' => T_('Footer link color'),
						'note' => T_('Default value is #7b7b7b'),
						'defaultvalue' => '#7b7b7b',
						'type' => 'color',
					),
					'footer_link_color_hover' => array(
						'label' => T_('Footer link color (hover)'),
						'note' => T_('Default value is #7b7b7b'),
						'defaultvalue' => '#7b7b7b',
						'type' => 'color',
					),
				'footer_layout_end' => array(
					'layout' => 'end_fieldset',
				),


				'custom_settings_start' => array(
					'layout' => 'begin_fieldset',
					'label'  => T_('Custom settings')
				),					
					'colorbox' => array(
						'label' => T_('Colorbox Image Zoom'),
						'note' => T_('Check to enable javascript zooming on images (using the colorbox script)'),
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
					'colorbox_vote_post' => array(
						'label' => T_('Voting on Post Images'),
						'note' => T_('Check this to enable AJAX voting buttons in the colorbox zoom view'),
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
					'colorbox_vote_post_numbers' => array(
						'label' => T_('Display Votes'),
						'note' => T_('Check to display number of likes and dislikes'),
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
					'colorbox_vote_comment' => array(
						'label' => T_('Voting on Comment Images'),
						'note' => T_('Check this to enable AJAX voting buttons in the colorbox zoom view'),
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
					'colorbox_vote_comment_numbers' => array(
						'label' => T_('Display Votes'),
						'note' => T_('Check to display number of likes and dislikes'),
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
					'colorbox_vote_user' => array(
						'label' => T_('Voting on User Images'),
						'note' => T_('Check this to enable AJAX voting buttons in the colorbox zoom view'),
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
					'colorbox_vote_user_numbers' => array(
						'label' => T_('Display Votes'),
						'note' => T_('Check to display number of likes and dislikes'),
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
					'gender_colored' => array(
						'label' => T_('Display gender'),
						'note' => T_('Use colored usernames to differentiate men & women.'),
						'defaultvalue' => 0,
						'type' => 'checkbox',
					),
					'bubbletip' => array(
						'label' => T_('Username bubble tips'),
						'note' => T_('Check to enable bubble tips on usernames'),
						'defaultvalue' => 0,
						'type' => 'checkbox',
					),
					'autocomplete_usernames' => array(
						'label' => T_('Autocomplete usernames'),
						'note' => T_('Check to enable auto-completion of usernames entered after a "@" sign in the comment forms'),
						'defaultvalue' => 1,
						'type' => 'checkbox',
					),
				'custom_settings_end' => array(
					'layout' => 'end_fieldset',
				),
			), parent::get_param_definitions( $params ) );

		return $r;
	}


	/**
	 * Get ready for displaying the skin.
	 *
	 * This may register some CSS or JS...
	 */
	function display_init()
	{
		global $Messages, $debug, $disp;

		// Request some common features that the parent function (Skin::display_init()) knows how to provide:
		parent::display_init( array(
				'jquery',                  // Load jQuery
				'font_awesome',            // Load Font Awesome (and use its icons as a priority over the Bootstrap glyphicons)
				'bootstrap',               // Load Bootstrap (without 'bootstrap_theme_css')
				'bootstrap_evo_css',       // Load the b2evo_base styles for Bootstrap (instead of the old b2evo_base styles)
				'bootstrap_messages',      // Initialize $Messages Class to use Bootstrap styles
				'style_css',               // Load the style.css file of the current skin
				'colorbox',                // Load Colorbox (a lightweight Lightbox alternative + customizations for b2evo)
				'bootstrap_init_tooltips', // Inline JS to init Bootstrap tooltips (E.g. on comment form for allowed file extensions)
				'disp_auto',               // Automatically include additional CSS and/or JS required by certain disps (replace with 'disp_off' to disable this)
			) );

			// Skin specific initializations:
			// Add custom CSS:
			$custom_css = '';
				
				
			// Only change post teaser image for "front" and "posts" 
			if( in_array( $disp, array( 'front', 'posts' ) ) ) 
			{
				$post_t_images = $this->get_setting( 'post_teaser_image' );
				switch( $post_t_images )
				{
					case 'regular': // When regular layout is chosen, nothing happens, since regular is default
					$custom_css = '';
					break;
					
					case 'thumbnail':// When thumbnail layout is chosen, apply these styles
					$custom_css = '.evo_post_images{ float: left; width: 200px;'." }\n"; 
					$custom_css .= '.evo_post_images .evo_image_block { margin: 0px 15px 15px 0px;'." }\n";
					break;
				}
		
			};

		
			// Site background color:
			if( $color = $this->get_setting( 'site_background_color' ) )
			{
				$custom_css .= 'body, .evo_container .panel .panel-heading, .evo_container .panel .panel-body, .evo_container .panel, .styled_content_block .panel, #styled_content_block .panel { background-color: '.$color." }\n";
			};
			// Site title color:
			if( $color = $this->get_setting( 'site_title_color' ) )
			{
				$custom_css .= 'body .headpicture .widget_core_coll_title h3 a { color: '.$color." }\n";
			};	
			// Site tagline color:
			if( $color = $this->get_setting( 'site_tagline_color' ) )
			{
				$custom_css .= 'body .headpicture .widget_core_coll_tagline { color: '.$color." }\n";
			};
			// Site text color:
			if( $color = $this->get_setting( 'site_text_color' ) )
			{
				$custom_css .= 'body, .widget .panel-heading h4, .evo_widget .panel-heading h4, .styled_content_block .panel-heading, .bCalendarRow .bCalendarHeaderCell { color: '.$color." }\n";
			};
			// Site link color:
			if( $color = $this->get_setting( 'site_link_color' ) )
			{
				$custom_css .= 'body a, #bCalendarToday { color: '.$color." }\n";
				$custom_css .= '#bCalendarToday { border: 1px solid '.$color." }\n";
			};
			// Site link color hover:
			if( $color = $this->get_setting( 'site_link_color_hover' ) )
			{
				$custom_css .= 'body a:hover { color: '.$color." }\n";
			};
			// Top menu hamburger layout:
			if( $width = $this->get_setting( 'top_menu_hamburger' ) )
			{
				$custom_css .= '@media only screen and (max-width: '.$width."px) {
					
				}\n";	
			};
			// Top menu background color:
			if( $color = $this->get_setting( 'top_menu_background_color' ) )
			{
				$custom_css .= '.top-menu { background-color: '.$color." }\n";
			};
			// Top menu links color:
			if( $color = $this->get_setting( 'top_menu_links_color' ) )
			{
				$custom_css .= '.top-menu ul li a { color: '.$color." }\n";
			};
			// Top menu links hover color:
			if( $color = $this->get_setting( 'top_menu_links_hover_color' ) )
			{
				$custom_css .= '.top-menu ul li a:hover { color: '.$color." }\n";
			};			
			// Top menu active link background color:
			if( $color = $this->get_setting( 'top_menu_active_link_background_color' ) )
			{
				$custom_css .= '.top-menu ul li.active { background-color: '.$color." }\n";
			};
			
			
						// Post title link color:
			if( $color = $this->get_setting( 'post_title_link_color' ) )
			{
				$custom_css .= '.evo_post h2 a { color: '.$color." }\n";
			};	
			// Post title link color (hover):
			if( $color = $this->get_setting( 'post_title_link_color_hover' ) )
			{
				$custom_css .= '.evo_post h2 a:hover { color: '.$color." }\n";
			};
			// Post tags color and border-color:
			if( $color = $this->get_setting( 'post_tags_color_and_border_color' ) )
			{
				$custom_css .= '.evo_post .tags a, .widget_core_coll_tag_cloud .tag_cloud a { color: '.$color.'; border: 1px solid '.$color." }\n";
			};
			// Post tags background color (on hover):
			if( $color = $this->get_setting( 'post_tags_background_color_on_hover' ) )
			{
				$custom_css .= '.evo_post .tags a:hover,  .widget_core_coll_tag_cloud .tag_cloud a:hover { background-color: '.$color." }\n";
			};
			// Post bottom border color:
			if( $color = $this->get_setting( 'post_bottom_border_color' ) )
			{
				$custom_css .= '.evo_post { border-bottom: 5px solid '.$color." }\n";
			};
			
			
			// Comments background color:
			if( $color = $this->get_setting( 'comments_panel_background_color' ) )
			{
				$custom_css .= '.evo_comment { background-color: '.$color." !important }\n";
			};
			// Comments border color:
			if( $color = $this->get_setting( 'comments_border_color' ) )
			{
				$custom_css .= '.evo_comment { border: 10px solid '.$color." }\n";
			};

						
			// Site Pagination links color:
			if( $color = $this->get_setting( 'site_pagination_links_color' ) )
			{
				$custom_css .= '.site_pagination li span, .site_pagination li a { color: '.$color." }\n";
			};
			// Site Pagination links color:
			if( $color = $this->get_setting( 'site_pagination_links_background_color' ) )
			{
				$custom_css .= '.site_pagination li a { background-color: '.$color." }\n";
			};
			// Site Pagination active link color:
			if( $color = $this->get_setting( 'site_pagination_active_link_background_color' ) )
			{
				$custom_css .= '.site_pagination li span, .site_pagination li a:hover { background-color: '.$color." }\n";
			};

			
			// Footer text color:
			if( $color = $this->get_setting( 'footer_text_color' ) )
			{
				$custom_css .= 'footer { color: '.$color." }\n";
			};
			// Footer background color:
			if( $color = $this->get_setting( 'footer_background_color' ) )
			{
				$custom_css .= 'footer { background-color: '.$color." }\n";
			};
			// Footer link color:
			if( $color = $this->get_setting( 'footer_link_color' ) )
			{
				$custom_css .= 'footer a { color: '.$color." }\n";
			};
			// Footer link color (hover):
			if( $color = $this->get_setting( 'footer_link_color_hover' ) )
			{
				$custom_css .= 'footer a:hover { color: '.$color." }\n";
			};


			// Post button border color:
			if( $color = $this->get_setting( 'post_button_border_color' ) )
			{
				$custom_css .= '.styled_content_block.comment_form .control-buttons .submit { border: 1px solid '.$color." }\n";
			};
			// Post button background color:
			if( $color = $this->get_setting( 'post_button_background_color' ) )
			{
				$custom_css .= '.styled_content_block .comment_form .control-buttons .submit { background-color: '.$color." }\n";
			};
			// Post button text color:
			if( $color = $this->get_setting( 'post_button_text_color' ) )
			{
				$custom_css .= '.styled_content_block .comment_form .control-buttons .submit { color: '.$color." }\n";
			};
			// Preview button border color:
			if( $color = $this->get_setting( 'preview_button_border_color' ) )
			{
				$custom_css .= '.styled_content_block .comment_form .control-buttons .preview { border: 1px solid '.$color." }\n";
			};
			// Preview button background color:
			if( $color = $this->get_setting( 'preview_button_background_color' ) )
			{
				$custom_css .= '.styled_content_block .comment_form .control-buttons .preview { background-color: '.$color." }\n";
			};
			// Preview button text color:
			if( $color = $this->get_setting( 'preview_button_text_color' ) )
			{
				$custom_css .= '.styled_content_block .comment_form .control-buttons .submit { color: '.$color." }\n";
			};			
		
		
		if( ! empty( $custom_css ) )
		{ // Function for custom_css:
		$custom_css = '<style type="text/css">
<!--
'.$custom_css.'
-->
		</style>';
		add_headline( $custom_css );
		}			
	}


	/**
	 * Those templates are used for example by the messaging screens.
	 */
	function get_template( $name )
	{
		switch( $name )
		{
			case 'Results':
				// Results list:
				return array(
					'page_url' => '', // All generated links will refer to the current page
					'before' => '<div class="results panel panel-default">',
					'content_start' => '<div id="$prefix$ajax_content">',
					'header_start' => '',
						'header_text' => '<div class="center"><ul class="pagination">'
								.'$prev$$first$$list_prev$$list$$list_next$$last$$next$'
							.'</ul></div>',
						'header_text_single' => '',
					'header_end' => '',
					'head_title' => '<div class="panel-heading">$title$<span class="pull-right">$global_icons$</span></div>'."\n",
					'filters_start' => '<div class="filters panel-body form-inline">',
					'filters_end' => '</div>',
					'messages_start' => '<div class="messages form-inline">',
					'messages_end' => '</div>',
					'messages_separator' => '<br />',
					'list_start' => '<div class="table_scroll">'."\n"
					               .'<table class="table table-striped table-bordered table-hover table-condensed" cellspacing="0">'."\n",
						'head_start' => "<thead>\n",
							'line_start_head' => '<tr>',  // TODO: fusionner avec colhead_start_first; mettre a jour admin_UI_general; utiliser colspan="$headspan$"
							'colhead_start' => '<th $class_attrib$>',
							'colhead_start_first' => '<th class="firstcol $class$">',
							'colhead_start_last' => '<th class="lastcol $class$">',
							'colhead_end' => "</th>\n",
							'sort_asc_off' => get_icon( 'sort_asc_off' ),
							'sort_asc_on' => get_icon( 'sort_asc_on' ),
							'sort_desc_off' => get_icon( 'sort_desc_off' ),
							'sort_desc_on' => get_icon( 'sort_desc_on' ),
							'basic_sort_off' => '',
							'basic_sort_asc' => get_icon( 'ascending' ),
							'basic_sort_desc' => get_icon( 'descending' ),
						'head_end' => "</thead>\n\n",
						'tfoot_start' => "<tfoot>\n",
						'tfoot_end' => "</tfoot>\n\n",
						'body_start' => "<tbody>\n",
							'line_start' => '<tr class="even">'."\n",
							'line_start_odd' => '<tr class="odd">'."\n",
							'line_start_last' => '<tr class="even lastline">'."\n",
							'line_start_odd_last' => '<tr class="odd lastline">'."\n",
								'col_start' => '<td $class_attrib$>',
								'col_start_first' => '<td class="firstcol $class$">',
								'col_start_last' => '<td class="lastcol $class$">',
								'col_end' => "</td>\n",
							'line_end' => "</tr>\n\n",
							'grp_line_start' => '<tr class="group">'."\n",
							'grp_line_start_odd' => '<tr class="odd">'."\n",
							'grp_line_start_last' => '<tr class="lastline">'."\n",
							'grp_line_start_odd_last' => '<tr class="odd lastline">'."\n",
										'grp_col_start' => '<td $class_attrib$ $colspan_attrib$>',
										'grp_col_start_first' => '<td class="firstcol $class$" $colspan_attrib$>',
										'grp_col_start_last' => '<td class="lastcol $class$" $colspan_attrib$>',
								'grp_col_end' => "</td>\n",
							'grp_line_end' => "</tr>\n\n",
						'body_end' => "</tbody>\n\n",
						'total_line_start' => '<tr class="total">'."\n",
							'total_col_start' => '<td $class_attrib$>',
							'total_col_start_first' => '<td class="firstcol $class$">',
							'total_col_start_last' => '<td class="lastcol $class$">',
							'total_col_end' => "</td>\n",
						'total_line_end' => "</tr>\n\n",
					'list_end' => "</table></div>\n\n",
					'footer_start' => '',
					'footer_text' => '<div class="center"><ul class="pagination">'
							.'$prev$$first$$list_prev$$list$$list_next$$last$$next$'
						.'</ul></div><div class="center">$page_size$</div>'
					                  /* T_('Page $scroll_list$ out of $total_pages$   $prev$ | $next$<br />'. */
					                  /* '<strong>$total_pages$ Pages</strong> : $prev$ $list$ $next$' */
					                  /* .' <br />$first$  $list_prev$  $list$  $list_next$  $last$ :: $prev$ | $next$') */,
					'footer_text_single' => '<div class="center">$page_size$</div>',
					'footer_text_no_limit' => '', // Text if theres no LIMIT and therefor only one page anyway
						'page_current_template' => '<span><b>$page_num$</b></span>',
						'page_item_before' => '<li>',
						'page_item_after' => '</li>',
						'prev_text' => T_('Previous'),
						'next_text' => T_('Next'),
						'no_prev_text' => '',
						'no_next_text' => '',
						'list_prev_text' => T_('...'),
						'list_next_text' => T_('...'),
						'list_span' => 11,
						'scroll_list_range' => 5,
					'footer_end' => "\n\n",
					'no_results_start' => '<div class="panel-footer">'."\n",
					'no_results_end'   => '$no_results$</div>'."\n\n",
					'content_end' => '</div>',
					'after' => '</div>',
					'sort_type' => 'basic'
				);
				break;

			case 'blockspan_form':
				// Form settings for filter area:
				return array(
					'layout'         => 'blockspan',
					'formclass'      => 'form-inline',
					'formstart'      => '',
					'formend'        => '',
					'title_fmt'      => '$title$'."\n",
					'no_title_fmt'   => '',
					'fieldset_begin' => '<fieldset $fieldset_attribs$>'."\n"
																.'<legend $title_attribs$>$fieldset_title$</legend>'."\n",
					'fieldset_end'   => '</fieldset>'."\n",
					'fieldstart'     => '<div class="form-group form-group-sm" $ID$>'."\n",
					'fieldend'       => "</div>\n\n",
					'labelclass'     => 'control-label',
					'labelstart'     => '',
					'labelend'       => "\n",
					'labelempty'     => '<label></label>',
					'inputstart'     => '',
					'inputend'       => "\n",
					'infostart'      => '<div class="form-control-static">',
					'infoend'        => "</div>\n",
					'buttonsstart'   => '<div class="form-group form-group-sm">',
					'buttonsend'     => "</div>\n\n",
					'customstart'    => '<div class="custom_content">',
					'customend'      => "</div>\n",
					'note_format'    => ' <span class="help-inline">%s</span>',
					// Additional params depending on field type:
					// - checkbox
					'fieldstart_checkbox'    => '<div class="form-group form-group-sm checkbox" $ID$>'."\n",
					'fieldend_checkbox'      => "</div>\n\n",
					'inputclass_checkbox'    => '',
					'inputstart_checkbox'    => '',
					'inputend_checkbox'      => "\n",
					'checkbox_newline_start' => '',
					'checkbox_newline_end'   => "\n",
					// - radio
					'inputclass_radio'       => '',
					'radio_label_format'     => '$radio_option_label$',
					'radio_newline_start'    => '',
					'radio_newline_end'      => "\n",
					'radio_oneline_start'    => '',
					'radio_oneline_end'      => "\n",
				);

			case 'compact_form':
			case 'Form':
				// Default Form settings:
				return array(
					'layout'         => 'fieldset',
					'formclass'      => 'form-horizontal',
					'formstart'      => '',
					'formend'        => '',
					'title_fmt'      => '<span style="float:right">$global_icons$</span><h2>$title$</h2>'."\n",
					'no_title_fmt'   => '<span style="float:right">$global_icons$</span>'."\n",
					'fieldset_begin' => '<div class="fieldset_wrapper $class$" id="fieldset_wrapper_$id$"><fieldset $fieldset_attribs$><div class="panel panel-default">'."\n"
															.'<legend class="panel-heading" $title_attribs$>$fieldset_title$</legend><div class="panel-body $class$">'."\n",
					'fieldset_end'   => '</div></div></fieldset></div>'."\n",
					'fieldstart'     => '<div class="form-group" $ID$>'."\n",
					'fieldend'       => "</div>\n\n",
					'labelclass'     => '',
					'labelstart'     => '',
					'labelend'       => "\n",
					'labelempty'     => '',
					'inputstart'     => '',
					'inputend'       => "\n",
					'infostart'      => '',
					'infoend'        => "\n",
					'buttonsstart'   => '<div class="form-group"><div class="control-buttons">',
					'buttonsend'     => "</div></div>\n\n",
					'customstart'    => '<div class="custom_content">',
					'customend'      => "</div>\n",
					'note_format'    => ' <span class="help-inline">%s</span>',
					// Additional params depending on field type:
					// - checkbox
					'inputclass_checkbox'    => '',
					'inputstart_checkbox'    => '<div class="controls col-sm-9"><div class="checkbox"><label>',
					'inputend_checkbox'      => "</label></div></div>\n",
					'checkbox_newline_start' => '<div class="checkbox">',
					'checkbox_newline_end'   => "</div>\n",
					// - radio
					'fieldstart_radio'       => '<div class="form-group radio-group" $ID$>'."\n",
					'fieldend_radio'         => "</div>\n\n",
					'inputclass_radio'       => '',
					'radio_label_format'     => '$radio_option_label$',
					'radio_newline_start'    => '<div class="radio"><label>',
					'radio_newline_end'      => "</label></div>\n",
					'radio_oneline_start'    => '<label class="radio-inline">',
					'radio_oneline_end'      => "</label>\n",
				);

			case 'linespan_form':
				// Linespan form:
				return array(
					'layout'         => 'linespan',
					'formclass'      => 'form-horizontal',
					'formstart'      => '',
					'formend'        => '',
					'title_fmt'      => '<span style="float:right">$global_icons$</span><h2>$title$</h2>'."\n",
					'no_title_fmt'   => '<span style="float:right">$global_icons$</span>'."\n",
					'fieldset_begin' => '<div class="fieldset_wrapper $class$" id="fieldset_wrapper_$id$"><fieldset $fieldset_attribs$><div class="panel panel-default">'."\n"
															.'<legend class="panel-heading" $title_attribs$>$fieldset_title$</legend><div class="panel-body $class$">'."\n",
					'fieldset_end'   => '</div></div></fieldset></div>'."\n",
					'fieldstart'     => '<div class="form-group" $ID$>'."\n",
					'fieldend'       => "</div>\n\n",
					'labelclass'     => '',
					'labelstart'     => '',
					'labelend'       => "\n",
					'labelempty'     => '',
					'inputstart'     => '<div class="controls">',
					'inputend'       => "</div>\n",
					'infostart'      => '<div class="controls"><div class="form-control-static">',
					'infoend'        => "</div></div>\n",
					'buttonsstart'   => '<div class="form-group"><div class="control-buttons">',
					'buttonsend'     => "</div></div>\n\n",
					'customstart'    => '<div class="custom_content">',
					'customend'      => "</div>\n",
					'note_format'    => ' <span class="help-inline">%s</span>',
					// Additional params depending on field type:
					// - checkbox
					'inputclass_checkbox'    => '',
					'inputstart_checkbox'    => '<div class="controls"><div class="checkbox"><label>',
					'inputend_checkbox'      => "</label></div></div>\n",
					'checkbox_newline_start' => '<div class="checkbox">',
					'checkbox_newline_end'   => "</div>\n",
					'checkbox_basic_start'   => '<div class="checkbox"><label>',
					'checkbox_basic_end'     => "</label></div>\n",
					// - radio
					'fieldstart_radio'       => '',
					'fieldend_radio'         => '',
					'inputstart_radio'       => '<div class="controls">',
					'inputend_radio'         => "</div>\n",
					'inputclass_radio'       => '',
					'radio_label_format'     => '$radio_option_label$',
					'radio_newline_start'    => '<div class="radio"><label>',
					'radio_newline_end'      => "</label></div>\n",
					'radio_oneline_start'    => '<label class="radio-inline">',
					'radio_oneline_end'      => "</label>\n",
				);

			case 'user_navigation':
				// The Prev/Next links of users
				return array(
					'block_start'  => '<ul class="pager">',
					'prev_start'   => '<li class="previous">',
					'prev_end'     => '</li>',
					'prev_no_user' => '',
					'back_start'   => '<li>',
					'back_end'     => '</li>',
					'next_start'   => '<li class="next">',
					'next_end'     => '</li>',
					'next_no_user' => '',
					'block_end'    => '</ul>',
				);

			case 'button_classes':
				// Button classes
				return array(
					'button'       => 'btn btn-default btn-xs',
					'button_red'   => 'btn-danger',
					'button_green' => 'btn-success',
					'text'         => 'btn btn-default btn-xs',
					'group'        => 'btn-group',
				);

			case 'tooltip_plugin':
				// Plugin name for tooltips: 'bubbletip' or 'popover'
				return 'popover';
				break;

			case 'plugin_template':
				// Template for plugins
				return array(
						'toolbar_before'       => '<div class="btn-toolbar $toolbar_class$" role="toolbar">',
						'toolbar_after'        => '</div>',
						'toolbar_title_before' => '<div class="btn-toolbar-title">',
						'toolbar_title_after'  => '</div>',
						'toolbar_group_before' => '<div class="btn-group btn-group-xs" role="group">',
						'toolbar_group_after'  => '</div>',
						'toolbar_button_class' => 'btn btn-default',
					);

			case 'modal_window_js_func':
				// JavaScript function to initialize Modal windows, @see echo_user_ajaxwindow_js()
				return 'echo_modalwindow_js_bootstrap';
				break;

			default:
				// Delegate to parent class:
				return parent::get_template( $name );
		}
	}
}
?>
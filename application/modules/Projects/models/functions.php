<?php

# SETUP
add_action('init', function(){
    
    global $ajaxobject;
    
    # CONSTANTS
    define('HOME', get_bloginfo('url'));
    define('THEME', get_bloginfo('template_directory'));
    define('NAME', get_bloginfo('name'));
    define('DESCRIPTION', get_bloginfo('description'));
    define('VERSION', wp_get_theme() -> get('Version'));
    
    # AJAX OBJECT
    $ajaxobject = [
        'themeurl' => THEME,
        'ajaxurl' => admin_url('admin-ajax.php'),
        'sitename' => NAME
    ];
    
    # SUPPORTS
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('widgets');
    add_post_type_support('page', 'excerpt');
    add_theme_support('align-wide');
    add_theme_support('title-tag');

    # COLOR PALLETE
    add_theme_support('editor-color-palette',[
	    ['name' => 'White','slug' => 'white','color' => '#fff'],
        ['name' => 'Light','slug' => 'light','color' => 'rgba(255,255,255,.5)'],   
	    ['name' => 'Black','slug' => 'black','color' => '#000'],   
	    ['name' => 'Dark','slug' => 'dark','color' => 'rgba(0,0,0,.5)'],
	    ['name' => 'Cyan','slug' => 'cyan','color' => '#3bb0c9'],
	    ['name' => 'Blue','slug' => 'blue','color' => '#09205c'],
	    ['name' => 'Blue 2','slug' => 'blue-2','color' => '#015ea8']
    ]);
    
    # CUSTOM POSTS TYPES
    register_post_type('service',['label'=>'Services','public'=>true,'supports'=>['revisions','title','editor','excerpt','thumbnail'],'show_in_rest'=>true,'menu_icon'=>'dashicons-hammer','rewrite'=>['slug' => 'what-we-do/services']]);
    register_post_type('industry',['label'=>'Industries','public'=>true,'supports'=>['revisions','title','editor','excerpt','thumbnail'],'show_in_rest'=>true,'menu_icon'=>'dashicons-building','rewrite'=>['slug' => 'what-we-do/industries']]);
    register_post_type('solution',['label'=>'Solutions','public'=>true,'supports'=>['revisions','title','editor','excerpt','thumbnail'],'show_in_rest'=>true,'menu_icon'=>'dashicons-flag','rewrite'=>['slug' => 'what-we-do/solutions']]);
    register_post_type('blog',['label'=>'Blog','public'=>true,'supports'=>['revisions','title','editor','excerpt','thumbnail'],'show_in_rest'=>true,'menu_icon'=>'dashicons-rss','rewrite'=>['slug' => 'insights/blog'],'has_archive'=>true,'taxonomies'=>['post_tag']]);
    register_post_type('whitepaper',['label'=>'Whitepapers','public'=>true,'supports'=>['revisions','title','editor','excerpt','thumbnail'],'show_in_rest'=>true,'menu_icon'=>'dashicons-format-aside','rewrite'=>['slug' => 'insights/whitepapers'],'has_archive'=>true]);
    register_post_type('press-release',['label'=>'Press-Releases','public'=>true,'supports'=>['revisions','title','editor','excerpt','thumbnail'],'show_in_rest'=>true,'menu_icon'=>'dashicons-pressthis','rewrite'=>['slug' => 'insights/press-releases'],'has_archive'=>true]);
    register_post_type('customer-story',['label'=>'Customer Stories','public'=>true,'supports'=>['revisions','title','editor','excerpt','thumbnail'],'show_in_rest'=>true,'menu_icon'=>'dashicons-admin-comments','rewrite'=>['slug' => 'customer-stories'],'has_archive'=>true]);
    register_post_type('employee',['label'=>'Employee Spotlight','public'=>true,'supports'=>['revisions','title','editor','excerpt','thumbnail'],'show_in_rest'=>true,'menu_icon'=>'dashicons-groups','rewrite'=>['slug' => 'about-us/life-at-beyondsoft/employee-spotlight'],'has_archive'=>true]);
    register_post_type('location',['label'=>'Global Locations','public'=>true,'supports'=>['revisions','title','editor','excerpt'],'show_in_rest'=>true,'menu_icon'=>'dashicons-admin-site']);
    register_post_type('quote',['label'=>'Customer Quotes','public'=>true,'supports'=>['revisions','title','editor'],'show_in_rest'=>true,'menu_icon'=>'dashicons-format-quote']);
    
    # CUSTOM TAXONOMIES
    register_taxonomy('service-category',['blog','whitepaper','press-release','customer-story'],['hierarchical'=>true,'label'=>'Services','show_admin_column'=>true,'public'=>true,'query_var'=>true,'show_in_rest'=>true]);
    register_taxonomy('solution-category',['solution'],['hierarchical'=>true,'label'=>'Industries','show_admin_column'=>true,'public'=>true,'query_var'=>true,'show_in_rest'=>true]);
    register_taxonomy('external-author',['blog','whitepaper','press-release','customer-story'],['hierarchical'=>true,'label'=>'External Authors','show_admin_column'=>true,'public'=>true,'query_var'=>true,'show_in_rest'=>true]);
    register_taxonomy('continent','location',['hierarchical'=>true,'label'=>'Continents','show_admin_column'=>true,'public'=>true,'query_var'=>true,'show_in_rest'=>true]);

    # IMAGE SIZES
    add_image_size('blog-featured', 640, 450);
    add_image_size('blog-grid', 278, 200);

    # CUSTOM BLOCKS
    # custom_register_block('blockName', false, false);
    
});

# LOAD STYLES & SCRIPTS
add_action('wp_enqueue_scripts', function(){
    
    global $ajaxobject;
    
    # CSS
    wp_enqueue_style('dashicons');
    wp_enqueue_style('reset', get_template_directory_uri() . '/css/reset.css', [], VERSION);
    wp_enqueue_style('style', get_stylesheet_uri(), ['reset'], VERSION);
    wp_enqueue_style('editor', get_template_directory_uri() . '/css/editor.css', [], VERSION);
    wp_enqueue_style('transitions', get_template_directory_uri() . '/css/transitions.css', ['style'], VERSION);
    wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css', ['style'], VERSION);
    wp_enqueue_style('contrast', get_template_directory_uri() . '/css/contrast.css', [], VERSION);
    wp_enqueue_style('font-large', get_template_directory_uri() . '/css/font-large.css', [], VERSION);
    wp_enqueue_style('fonts', '//fonts.googleapis.com/css?display=swap&family=Roboto:100,300,400,700,900|Lato:400,700,900', [], VERSION);
    wp_enqueue_style('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css', [], VERSION);

    # JS
    wp_enqueue_script('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], VERSION, true);
    wp_enqueue_script('recaptcha', '//google.com/recaptcha/api.js?render=6LcdsR8pAAAAAKGWOMNb7OBSwkVwS-urONcH8DJv', [], VERSION, true);
    wp_enqueue_script('general', get_template_directory_uri() . '/js/general.js', ['jquery','ajaxform'], VERSION, true);
    wp_localize_script('general', 'ajaxobject', $ajaxobject);

    # INSIGHTS
    if ( is_post_type_archive(['blog','whitepaper','press-release','customer-story','employee']) ) {
        wp_enqueue_script('insights', get_template_directory_uri() . '/js/insights.js', [], false, true);
    }
    
});

// SETUP THEME
add_action('after_setup_theme', function(){

	add_theme_support('custom-logo');

    register_nav_menus([
        'header' => __( 'Header', 'beyondsoft' ),
        'footer' => __( 'Footer', 'beyondsoft' ),
        'locations' => __( 'Global Locations', 'beyondsoft' )
    ]);

});

# GUTENBERG SCRIPTS AND STYLES
add_action('enqueue_block_editor_assets', function(){
    wp_enqueue_style('editor-styles', get_stylesheet_directory_uri() . '/css/editor.css');
	wp_enqueue_script('editor-scripts', get_stylesheet_directory_uri() . '/js/editor.js', ['wp-blocks','wp-dom'], false, true);
});

# VIRTUEMASTERS
require 'vendor/virtuemasters/functions/metatags.php';
require 'vendor/virtuemasters/ajaxstatus/init.php';
require 'vendor/virtuemasters/ajaxform/init.php';

# REMOVE BUILT IN POST TYPE AND COMMENTS
add_action('admin_menu', function(){
    remove_menu_page('edit.php');
    remove_menu_page('edit-comments.php');
    add_menu_page('Patterns', 'Patterns', 'edit_posts', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 22);
});

# REMOVE BUILT IN POST AND COMMENTS ON ADMIN BAR
add_action('admin_bar_menu', function($wp_admin_bar ){
    $wp_admin_bar->remove_node('comments');
    $wp_admin_bar->remove_node('new-post');
},999);

# CUSTOM REGISTER BLOCK
function custom_register_block($blockName,$attrs=false,$render=true){
    global $ajaxobject;
    wp_register_script('custom-block-'.$blockName, get_template_directory_uri().'/js/block-'.$blockName.'.js', ['wp-blocks','wp-element','wp-data','wp-editor','wp-i18n','wp-components']);
    wp_localize_script('custom-block-'.$blockName,'ajaxobject',$ajaxobject);
    $blockAttrs = ['editor_script'=>'custom-block-'.$blockName, 'editor_style'=>'custom-blocks'];
    if($attrs) $blockAttrs['attributes'] = $attrs;
    if($render) $blockAttrs['render_callback'] = function($attributes=false, $content) use ($blockName){
        ob_start();
        if($attributes) set_query_var('attributes', $attributes);
        get_template_part('blocks/'.$blockName);
        return ob_get_clean();
    };
    register_block_type('custom/'.$blockName, $blockAttrs);
}

# CUSTOM BLOCK CATEGORIES
add_filter('block_categories',function($categories,$post){
    return array_merge(
		$categories,[[
            'slug' => 'dynamic-blocks',
            'title' => __('Dynamic Blocks','dynamic-blocks')
        ]]
	);
},10,2);

# INSIGHTS
add_shortcode('insights', function ($atts) {
    $wpQuery = new WP_Query([
        'post_type' => 'blog',
        'post__in' => $atts
    ]);

    if ( ! $wpQuery -> have_posts() ) return;

    ob_start();
    
    echo '<div class="insights two">';
    
    while ( $wpQuery -> have_posts() ) : $wpQuery -> the_post();
        get_template_part('templates/item-insights');
    endwhile; wp_reset_postdata();

    echo '</div>';

    return ob_get_clean();
});

# QUOTES
add_shortcode('quotes', function(){
    ob_start();
    get_template_part('templates/quotes');
    return ob_get_clean();
});

# MAP
add_shortcode('map', function(){
    ob_start();
    get_template_part('templates/map');
    return ob_get_clean();
});

# KEYWORD
add_shortcode('keyword', function(){
    return $_GET['key'];
});

# COUNT
add_shortcode('count', function(){
    $wpQuery = new WP_Query([
        's' => $_GET['key']
    ]);
    return $wpQuery -> found_posts;
});

# SOLUTIONS
add_shortcode('solutions', function(){
    ob_start();
    get_template_part('templates/solutions');
    return ob_get_clean();
});

# METABOX - add
add_action('add_meta_boxes', function() {
    global $post;
    $template = get_post_meta($post->ID, '_wp_page_template', true);

    // Map - Pointer
    add_meta_box(
        'map_pointer', // ID
        'Map Pointer', // Label
        'render_map_pointer', // Callback
        'location' // Post Type
    );

    // Map - Flag Position
    add_meta_box('flag-to-left', 'Flag to the left?', function($post){
        $flag = get_post_meta ( $post->ID, 'flag-to-left', true ) === 'on' ? 'checked' : '';
        $html =    '<div class="field">';
        $html .=        '<label>';
        $html .=            '<input type="checkbox" name="flag-to-left" ' . $flag . ' />';
        $html .=            'Check to enable it ';
        $html .=        '</label>';
        $html .=    '</div>';
        echo $html;
    }, 'location', 'side', 'high');

    // Source
    add_meta_box('custom_metabox', 'Additional Information', function( $post ) {

        ob_start();

        get_template_part( 'templates/meta-box', null, [
            'name' => "source",
            'value' => get_post_meta ( $post->ID, "source", true ),
            'label' => 'Source',
            'placeholder' => 'Enter the source'
        ]);

        echo ob_get_clean();
        
    }, 'quote');

    // Contact
    if ($template == 'contact.php') {
        add_meta_box('custom_metabox', 'Form Information', function( $post ) {
            ob_start();
            get_template_part( 'templates/meta-box-contact', null, ['ID' => $post -> ID]);
            echo ob_get_clean();
        }, 'page');
    }

});

# METABOX - save
add_action('save_post', function($post_id){

    // Map - Pointer
    if(array_key_exists('map-pointer',$_POST)) update_post_meta($post_id, 'map-pointer', $_POST['map-pointer']);

     // Map - Flag Position
     if(get_post_type($post_id) === 'location'):
        if(array_key_exists('flag-to-left', $_POST)) update_post_meta($post_id, 'flag-to-left', $_POST['flag-to-left']);
        else update_post_meta($post_id, 'flag-to-left', false);
    endif;

    // Source
    if(array_key_exists('source', $_POST)) update_post_meta($post_id, 'source', $_POST['source']);

    $fields = [
        'first-column-title',
        'secound-column-title',
        'third-column-title',
        'friend-referral',
        'in-person',
        'virtual-event',
        'other',
        'next',
        'name',
        'email',
        'phone',
        'job',
        'company',
        'industry',
        'message',
        'warning',
        'submit',
        'recipient',
        'confirmation'
    ];

    foreach ($fields as $field) {
        if (array_key_exists($field, $_POST)) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }

});

# RENDER MAP POINTER
function render_map_pointer($post){
    $value = get_post_meta($post->ID,'map-pointer',true);
    $html = '<div class="map-pointer">';
    $html .=    '<input type="hidden" name="map-pointer" value="'.$value.'" />';
    $html .=    '<img class="map" src="'.get_bloginfo('template_directory').'/images/map.webp" alt="Map" />';
    $html .=    '<img class="pointer" src="'.get_bloginfo('template_directory').'/images/pointer.webp" alt="Pointer" />';
    $html .= '</div>';
    echo $html;
}

# TAXONOMY IMAGE - create
add_action( 'taxonomy-name_add_form_fields', function ( $taxonomy ) {
    get_template_part( 'templates/taxonomy-image', null, [ 'context' => 'create' ] );
}, 10, 2 );

# TAXONOMY IMAGE - save
add_action( 'created_taxonomy-name', function ( $term_id, $tt_id ) {
    if( isset( $_POST['image_id'] ) && '' !== $_POST['image_id'] ){
     $image = $_POST['image_id'];
     add_term_meta( $term_id, 'image_id', $image, true );
    }
}, 10, 2 );

# TAXONOMY IMAGE - edit
add_action( 'taxonomy-name_edit_form_fields', function ( $term, $taxonomy ) {
    get_template_part( 'templates/taxonomy-image', null, [
        'context' => 'edit',
        'term' => $term,
        'taxonomy' => $taxonomy
    ]);
}, 10, 2 );

# TAXONOMY IMAGE - update
add_action( 'edited_taxonomy-name', function ( $term_id, $tt_id ) {
    if( isset( $_POST['image_id'] ) && '' !== $_POST['image_id'] ){
        $image = $_POST['image_id'];
        update_term_meta ( $term_id, 'image_id', $image );
    } else {
        update_term_meta ( $term_id, 'image_id', '' );
    }
}, 10, 2 );

# TAXONOMY IMAGE - enqueue media
add_action( 'admin_enqueue_scripts', function () {
    if ( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'taxonomy-name' ) return;
    wp_enqueue_media();
});

# TAXONOMY IMAGE - js
add_action( 'admin_footer', function () {
    get_template_part( 'templates/taxonomy-image', null, [ 'context' => 'js' ] );
});

# TAXONOMY IMAGE - column add
add_filter( 'manage_edit-taxonomy-name_columns', function ( $columns ) {
    $columns['category_image'] = __( 'Image', 'taxt-domain' );
    return $columns;
});

# TAXONOMY IMAGE - column display
add_action( 'manage_taxonomy-name_custom_column', function ( $columns, $column, $id ) {
    if ( 'category_image' == $column ) {
        $image_id = esc_html( get_term_meta($id, 'image_id', true) );        
        $columns = wp_get_attachment_image ( $image_id, array('50', '50') );
    }
    return $columns;
}, 10, 3);

# REUSABLE BLOCKS
function wp_block($slug) {
    global $post;
    $post = get_page_by_path($slug, OBJECT, 'wp_block');
    setup_postdata($post);
    the_content();
    wp_reset_postdata();
}

# FILTER ITEMS
function filter_items(){
    $tax_query = $_REQUEST['terms'] ? [[
        'taxonomy' => 'service-category',
        'field' => 'slug',
        'terms' => explode(',', $_REQUEST['terms'])
    ]] : null;

    $wpQuery = new WP_Query([
        'post_type' => $_REQUEST['post_type'],
        'tax_query' => $tax_query
    ]);

    if ( ! $wpQuery -> have_posts() ) echo "<!-- empty -->";

    ob_start();
    
    while ( $wpQuery -> have_posts() ) : $wpQuery -> the_post();
        get_template_part('templates/item-insights');
    endwhile; wp_reset_postdata();

    echo ob_get_clean();

    if ( $wpQuery -> max_num_pages == ( $_REQUEST['paged'] + 1 ) ) echo "<!-- empty -->";

    wp_die();
}add_action('wp_ajax_filter_items', 'filter_items');
add_action('wp_ajax_nopriv_filter_items', 'filter_items');

# LOAD MORE
function load_more(){
    $tax_query = $_REQUEST['terms'] ? [[
        'taxonomy' => 'service-category',
        'field' => 'slug',
        'terms' => explode(',', $_REQUEST['terms'])
    ]] : null;

    $wpQuery = new WP_Query([
        'post_type' => $_REQUEST['post_type'],
        'offset' => $_REQUEST['offset'],
        'tax_query' => $tax_query,
        'paged' => $_REQUEST['paged'] ? $_REQUEST['paged'] : 1
    ]);

    if ( ! $wpQuery -> have_posts() ) echo "<!-- empty -->";

    ob_start();
    
    while ( $wpQuery -> have_posts() ) : $wpQuery -> the_post();
        get_template_part('templates/item-insights');
    endwhile; wp_reset_postdata();

    echo ob_get_clean();

    if ( $wpQuery -> max_num_pages == $_REQUEST['paged'] ) echo "<!-- empty -->";

    wp_die();
}add_action('wp_ajax_load_more', 'load_more');
add_action('wp_ajax_nopriv_load_more', 'load_more');

add_action('customize_register', function($wp_customize){

    // TRANSLATIONS - section
    $wp_customize -> add_section('custom_theme_translations', [
        'title'    => __('Translations', 'beyondsoft'),
        'priority' => 200
    ]);

    // LINKS - section
    $wp_customize -> add_section('custom_theme_links', [
        'title'    => __('Links', 'beyondsoft'),
        'priority' => 200
    ]);

    // Acessibility Options
    $wp_customize -> add_setting('acessibility', [
        'default'           => 'Acessibility Options',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('acessibility', [
        'label'    => __('Acessibility Options', 'beyondsoft'),
        'section'  => 'custom_theme_translations',
        'type'     => 'text',
        'priority' => 10
    ]);

    // High Contrast
    $wp_customize -> add_setting('contrast', [
        'default'           => 'High Contrast',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('contrast', [
        'label'    => __('High Contrast', 'beyondsoft'),
        'section'  => 'custom_theme_translations',
        'type'     => 'text',
        'priority' => 10
    ]);

    // Font Size
    $wp_customize -> add_setting('font-size', [
        'default'           => 'Font Size',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('font-size', [
        'label'    => __('Font Size', 'beyondsoft'),
        'section'  => 'custom_theme_translations',
        'type'     => 'text',
        'priority' => 10
    ]);

    // Search Website
    $wp_customize -> add_setting('search-website', [
        'default'           => 'Search Website',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('search-website', [
        'label'    => __('Search Website', 'beyondsoft'),
        'section'  => 'custom_theme_translations',
        'type'     => 'text',
        'priority' => 10
    ]);

    // Search for ...
    $wp_customize -> add_setting('search-for', [
        'default'           => 'Search for ...',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('search-for', [
        'label'    => __('Search for ...', 'beyondsoft'),
        'section'  => 'custom_theme_translations',
        'type'     => 'text',
        'priority' => 10
    ]);

    // Contact Us
    $wp_customize -> add_setting('contact', [
        'default'           => 'Contact Us',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('contact', [
        'label'    => __('Contact Us', 'beyondsoft'),
        'section'  => 'custom_theme_translations',
        'type'     => 'text',
        'priority' => 10
    ]);

    // Stay Connected
    $wp_customize -> add_setting('stay-connected', [
        'default'           => 'Stay Connected',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('stay-connected', [
        'label'    => __('Stay Connected', 'beyondsoft'),
        'section'  => 'custom_theme_translations',
        'type'     => 'text',
        'priority' => 10
    ]);

    // Load More
    $wp_customize -> add_setting('load-more', [
        'default'           => 'Load More',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('load-more', [
        'label'    => __('Load More', 'beyondsoft'),
        'section'  => 'custom_theme_translations',
        'type'     => 'text',
        'priority' => 10
    ]);

    // Share this
    $wp_customize -> add_setting('share-this', [
        'default'           => 'Share this',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('share-this', [
        'label'    => __('Share this', 'beyondsoft'),
        'section'  => 'custom_theme_translations',
        'type'     => 'text',
        'priority' => 10
    ]);

    // Print
    $wp_customize -> add_setting('print', [
        'default'           => 'Print',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('print', [
        'label'    => __('Print', 'beyondsoft'),
        'section'  => 'custom_theme_translations',
        'type'     => 'text',
        'priority' => 10
    ]);

    // Explore other services
    $wp_customize -> add_setting('explore-other-services', [
        'default'           => 'Explore other services',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('explore-other-services', [
        'label'    => __('Explore other services', 'beyondsoft'),
        'section'  => 'custom_theme_translations',
        'type'     => 'text',
        'priority' => 10
    ]);

    // Author
    $wp_customize -> add_setting('author', [
        'default'           => 'Author',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('author', [
        'label'    => __('Author', 'beyondsoft'),
        'section'  => 'custom_theme_translations',
        'type'     => 'text',
        'priority' => 10
    ]);

    // Back to
    $wp_customize -> add_setting('back-to', [
        'default'           => 'Back to',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('back-to', [
        'label'    => __('Back to', 'beyondsoft'),
        'section'  => 'custom_theme_translations',
        'type'     => 'text',
        'priority' => 10
    ]);

    // Filters Disabled
    $wp_customize -> add_setting('filters-disabled', [
        'default'           => 'Filters Disabled',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('filters-disabled', [
        'label'    => __('Filters Disabled', 'beyondsoft'),
        'section'  => 'custom_theme_translations',
        'type'     => 'text',
        'priority' => 10
    ]);

    // Filters Enabled
    $wp_customize -> add_setting('filters-enabled', [
        'default'           => 'Filters Enabled',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('filters-enabled', [
        'label'    => __('Filters Enabled', 'beyondsoft'),
        'section'  => 'custom_theme_translations',
        'type'     => 'text',
        'priority' => 10
    ]);

    // Services
    $wp_customize -> add_setting('services', [
        'default'           => 'Services',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('services', [
        'label'    => __('Services', 'beyondsoft'),
        'section'  => 'custom_theme_translations',
        'type'     => 'text',
        'priority' => 10
    ]);

    // Related Insights
    $wp_customize -> add_setting('related-insights', [
        'default'           => 'Related Insights',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('related-insights', [
        'label'    => __('Related Insights', 'beyondsoft'),
        'section'  => 'custom_theme_translations',
        'type'     => 'text',
        'priority' => 10
    ]);

    // Customer Stories
    $wp_customize -> add_setting('customer-stories', [
        'default'           => 'Customer Stories',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('customer-stories', [
        'label'    => __('Customer Stories', 'beyondsoft'),
        'section'  => 'custom_theme_translations',
        'type'     => 'text',
        'priority' => 10
    ]);

    // Copy Address
    $wp_customize -> add_setting('copy-address', [
        'default'           => 'Copy Address',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('copy-address', [
        'label'    => __('Copy Address', 'beyondsoft'),
        'section'  => 'custom_theme_translations',
        'type'     => 'text',
        'priority' => 10
    ]);

    // Customer Quotes
    $wp_customize -> add_setting('customer-quotes', [
        'default'           => 'Customer quotes',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('customer-quotes', [
        'label'    => __('Customer quotes', 'beyondsoft'),
        'section'  => 'custom_theme_translations',
        'type'     => 'text',
        'priority' => 10
    ]);

    // Contact URL
    $wp_customize -> add_setting('contact-url', [
        'default'           => HOME . '/contact-us',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('contact-url', [
        'label'    => __('Contact Page URL', 'beyondsoft'),
        'section'  => 'custom_theme_links',
        'type'     => 'text',
        'priority' => 10
    ]);

    // LinkedIn URL
    $wp_customize -> add_setting('linkedin-url', [
        'default'           => 'https://www.linkedin.com/company/beyondsoft/',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('linkedin-url', [
        'label'    => __('LinkedIn URL', 'beyondsoft'),
        'section'  => 'custom_theme_links',
        'type'     => 'text',
        'priority' => 10
    ]);

    // Learn More
    $wp_customize -> add_setting('learn-more', [
        'default'           => 'Learn More',
        'sanitize_callback' => 'sanitize_text_field'
    ]);
    
    $wp_customize -> add_control('learn-more', [
        'label'    => __('Learn More', 'beyondsoft'),
        'section'  => 'custom_theme_translations',
        'type'     => 'text',
        'priority' => 10
    ]);

});
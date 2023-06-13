<?php

/**
 * WPML - Custom language switcher
 */
function ps_language_switcher( $button = false ) {
	if( function_exists('icl_get_languages') && function_exists('tm_icon') ) {
		$current_lang_code = apply_filters( 'wpml_current_language', NULL );
		$languages = icl_get_languages('skip_missing=0&orderby=code');

		$current_lang = current(array_filter($languages,function($v,$k) use ($current_lang_code){
			return $v['code'] == $current_lang_code;
		}, ARRAY_FILTER_USE_BOTH));

		if( !$current_lang ) return;

		$button_css_class = $button ? 'px-6 py-3 rounded-full border-2 border-gray-300' : 'p-2 rounded';

		?>
		<div class="relative hover:bg-gray-100 dark:hover:bg-slate-700 group cursor-pointer <?php echo $button_css_class; ?>">
		<div class="flex items-center text-black dark:text-white font-semibold">
		<?php 
		tm_icon('globe', 24, 'w-6 h-6 mr-2 dark:text-white');
		echo $current_lang['native_name'];
		
		tm_icon('chevron-down', 24, 'w-6 h-6 ml-2 dark:text-white')
		?>
		</div>
		<?php
		if(!empty($languages)){
			?>
			<ul class="hidden group-hover:block absolute bottom-full left-0 bg-white dark:bg-slate-900 shadow rounded p-2">
			<?php foreach($languages as $l){ ?>
				<li>
					<a class="block p-2 hover:bg-gray-100 dark:hover:bg-slate-600 rounded" href="<?php echo $l['url']; ?>">
					<p class="block font-semibold text-black dark:text-white"><?php echo $l['native_name']; ?></p>
					<p class="text-xs"><?php echo $l['translated_name']; ?></p>
					</a>
				</li>
				<?php
			} ?>
			</ul>
			<?php
		} ?>
		</div>
		<?php
	} 
}

/**
 * WPML - Prevent loading useless styles
 */
define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
define('ICL_DONT_LOAD_LANGUAGES_JS', true);

/**
 * WPML Remove meta tag
 */
if ( ! empty ( $GLOBALS['sitepress'] ) ) {
	add_action( 'wp_head', function()
	{
		remove_action(
			current_filter(),
			array ( $GLOBALS['sitepress'], 'meta_generator_tag' )
		);
	},
	0
	);
}

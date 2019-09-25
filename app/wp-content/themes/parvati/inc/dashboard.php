<?php
/**
 * Builds our admin page.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'parvati_create_menu' ) ) {
	add_action( 'admin_menu', 'parvati_create_menu' );
	/**
	 * Adds our "Parvati" dashboard menu item
	 *
	 */
	function parvati_create_menu() {
		$parvati_page = add_theme_page( 'Parvati', 'Parvati', apply_filters( 'parvati_dashboard_page_capability', 'edit_theme_options' ), 'parvati-options', 'parvati_settings_page' );
		add_action( "admin_print_styles-$parvati_page", 'parvati_options_styles' );
	}
}

if ( ! function_exists( 'parvati_options_styles' ) ) {
	/**
	 * Adds any necessary scripts to the Parvati dashboard page
	 *
	 */
	function parvati_options_styles() {
		wp_enqueue_style( 'parvati-options', get_template_directory_uri() . '/css/admin/admin-style.css', array(), PARVATI_VERSION );
	}
}

if ( ! function_exists( 'parvati_settings_page' ) ) {
	/**
	 * Builds the content of our Parvati dashboard page
	 *
	 */
	function parvati_settings_page() {
		?>
		<div class="wrap">
			<div class="metabox-holder">
				<div class="parvati-masthead clearfix">
					<div class="parvati-container">
						<div class="parvati-title">
							<a href="<?php echo esc_url(PARVATI_THEME_URL); ?>" target="_blank"><?php esc_html_e( 'Parvati', 'parvati' ); ?></a> <span class="parvati-version"><?php echo PARVATI_VERSION; ?></span>
						</div>
						<div class="parvati-masthead-links">
							<?php if ( ! defined( 'PARVATI_PREMIUM_VERSION' ) ) : ?>
								<a class="parvati-masthead-links-bold" href="<?php echo esc_url(PARVATI_THEME_URL); ?>" target="_blank"><?php esc_html_e( 'Premium', 'parvati' );?></a>
							<?php endif; ?>
							<a href="<?php echo esc_url(PARVATI_WPKOI_AUTHOR_URL); ?>" target="_blank"><?php esc_html_e( 'WPKoi', 'parvati' ); ?></a>
                            <a href="<?php echo esc_url(PARVATI_DOCUMENTATION); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'parvati' ); ?></a>
						</div>
					</div>
				</div>

				<?php
				/**
				 * parvati_dashboard_after_header hook.
				 *
				 */
				 do_action( 'parvati_dashboard_after_header' );
				 ?>

				<div class="parvati-container">
					<div class="postbox-container clearfix" style="float: none;">
						<div class="grid-container grid-parent">

							<?php
							/**
							 * parvati_dashboard_inside_container hook.
							 *
							 */
							 do_action( 'parvati_dashboard_inside_container' );
							 ?>

							<div class="form-metabox grid-70" style="padding-left: 0;">
								<h2 style="height:0;margin:0;"><!-- admin notices below this element --></h2>
								<form method="post" action="options.php">
									<?php settings_fields( 'parvati-settings-group' ); ?>
									<?php do_settings_sections( 'parvati-settings-group' ); ?>
									<div class="customize-button hide-on-desktop">
										<?php
										printf( '<a id="parvati_customize_button" class="button button-primary" href="%1$s">%2$s</a>',
											esc_url( admin_url( 'customize.php' ) ),
											esc_html__( 'Customize', 'parvati' )
										);
										?>
									</div>

									<?php
									/**
									 * parvati_inside_options_form hook.
									 *
									 */
									 do_action( 'parvati_inside_options_form' );
									 ?>
								</form>

								<?php
								$modules = array(
									'Backgrounds' => array(
											'url' => PARVATI_THEME_URL,
									),
									'Blog' => array(
											'url' => PARVATI_THEME_URL,
									),
									'Colors' => array(
											'url' => PARVATI_THEME_URL,
									),
									'Copyright' => array(
											'url' => PARVATI_THEME_URL,
									),
									'Disable Elements' => array(
											'url' => PARVATI_THEME_URL,
									),
									'Demo Import' => array(
											'url' => PARVATI_THEME_URL,
									),
									'Hooks' => array(
											'url' => PARVATI_THEME_URL,
									),
									'Import / Export' => array(
											'url' => PARVATI_THEME_URL,
									),
									'Menu Plus' => array(
											'url' => PARVATI_THEME_URL,
									),
									'Page Header' => array(
											'url' => PARVATI_THEME_URL,
									),
									'Secondary Nav' => array(
											'url' => PARVATI_THEME_URL,
									),
									'Spacing' => array(
											'url' => PARVATI_THEME_URL,
									),
									'Typography' => array(
											'url' => PARVATI_THEME_URL,
									),
									'Elementor Addon' => array(
											'url' => PARVATI_THEME_URL,
									)
								);

								if ( ! defined( 'PARVATI_PREMIUM_VERSION' ) ) : ?>
									<div class="postbox parvati-metabox">
										<h3 class="hndle"><?php esc_html_e( 'Premium Modules', 'parvati' ); ?></h3>
										<div class="inside" style="margin:0;padding:0;">
											<div class="premium-addons">
												<?php foreach( $modules as $module => $info ) { ?>
												<div class="add-on activated parvati-clear addon-container grid-parent">
													<div class="addon-name column-addon-name" style="">
														<a href="<?php echo esc_url( $info[ 'url' ] ); ?>" target="_blank"><?php echo esc_html( $module ); ?></a>
													</div>
													<div class="addon-action addon-addon-action" style="text-align:right;">
														<a href="<?php echo esc_url( $info[ 'url' ] ); ?>" target="_blank"><?php esc_html_e( 'More info', 'parvati' ); ?></a>
													</div>
												</div>
												<div class="parvati-clear"></div>
												<?php } ?>
											</div>
										</div>
									</div>
								<?php
								endif;

								/**
								 * parvati_options_items hook.
								 *
								 */
								do_action( 'parvati_options_items' );
								?>
							</div>

							<div class="parvati-right-sidebar grid-30" style="padding-right: 0;">
								<div class="customize-button hide-on-mobile">
									<?php
									printf( '<a id="parvati_customize_button" class="button button-primary" href="%1$s">%2$s</a>',
										esc_url( admin_url( 'customize.php' ) ),
										esc_html__( 'Customize', 'parvati' )
									);
									?>
								</div>

								<?php
								/**
								 * parvati_admin_right_panel hook.
								 *
								 */
								 do_action( 'parvati_admin_right_panel' );

								  ?>
                                
                                <div class="wpkoi-doc">
                                	<h3><?php esc_html_e( 'Parvati documentation', 'parvati' ); ?></h3>
                                	<p><?php esc_html_e( 'If You`ve stuck, the documentation may help on WPKoi.com', 'parvati' ); ?></p>
                                    <a href="<?php echo esc_url(PARVATI_DOCUMENTATION); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Parvati documentation', 'parvati' ); ?></a>
                                </div>
                                
                                <div class="wpkoi-social">
                                	<h3><?php esc_html_e( 'WPKoi on Facebook', 'parvati' ); ?></h3>
                                	<p><?php esc_html_e( 'If You want to get useful info about WordPress and the theme, follow WPKoi on Facebook.', 'parvati' ); ?></p>
                                    <a href="<?php echo esc_url(PARVATI_WPKOI_SOCIAL_URL); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Go to Facebook', 'parvati' ); ?></a>
                                </div>
                                
                                <div class="wpkoi-review">
                                	<h3><?php esc_html_e( 'Help with You review', 'parvati' ); ?></h3>
                                	<p><?php esc_html_e( 'If You like Parvati theme, show it to the world with Your review. Your feedback helps a lot.', 'parvati' ); ?></p>
                                    <a href="<?php echo esc_url(PARVATI_WORDPRESS_REVIEW); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Add my review', 'parvati' ); ?></a>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'parvati_admin_errors' ) ) {
	add_action( 'admin_notices', 'parvati_admin_errors' );
	/**
	 * Add our admin notices
	 *
	 */
	function parvati_admin_errors() {
		$screen = get_current_screen();

		if ( 'appearance_page_parvati-options' !== $screen->base ) {
			return;
		}

		if ( isset( $_GET['settings-updated'] ) && 'true' == $_GET['settings-updated'] ) {
			 add_settings_error( 'parvati-notices', 'true', esc_html__( 'Settings saved.', 'parvati' ), 'updated' );
		}

		if ( isset( $_GET['status'] ) && 'imported' == $_GET['status'] ) {
			 add_settings_error( 'parvati-notices', 'imported', esc_html__( 'Import successful.', 'parvati' ), 'updated' );
		}

		if ( isset( $_GET['status'] ) && 'reset' == $_GET['status'] ) {
			 add_settings_error( 'parvati-notices', 'reset', esc_html__( 'Settings removed.', 'parvati' ), 'updated' );
		}

		settings_errors( 'parvati-notices' );
	}
}

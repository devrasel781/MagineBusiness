<?php

/**
 * Statistics Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Get the statistics
$stats = bbp_get_statistics(); ?>

<ul>

	<?php do_action( 'bbp_before_statistics' ); ?>

	<li><?php esc_html_e( 'Registered Users', 'magine' ); ?> <strong><?php echo esc_html( $stats['user_count'] ); ?></strong></li>

	<li><?php esc_html_e( 'Forums', 'magine' ); ?> <strong><?php echo esc_html( $stats['forum_count'] ); ?></strong></li>

	<li><?php esc_html_e( 'Topics', 'magine' ); ?> <strong><?php echo esc_html( $stats['topic_count'] ); ?></strong></li>

	<li><?php esc_html_e( 'Replies', 'magine' ); ?> <strong><?php echo esc_html( $stats['reply_count'] ); ?></strong></li>

	<li><?php esc_html_e( 'Topic Tags', 'magine' ); ?> <strong><?php echo esc_html( $stats['topic_tag_count'] ); ?></strong></li>

	<?php if ( !empty( $stats['empty_topic_tag_count'] ) ) : ?>

		<li><?php esc_html_e( 'Empty Topic Tags', 'magine' ); ?> <strong><?php echo esc_html( $stats['empty_topic_tag_count'] ); ?></strong></li>

	<?php endif; ?>

	<?php if ( !empty( $stats['topic_count_hidden'] ) ) : ?>

		<li><?php esc_html_e( 'Hidden Topics', 'magine' ); ?> <strong><?php echo esc_html( $stats['topic_count_hidden'] ); ?></strong></li>

	<?php endif; ?>

	<?php if ( !empty( $stats['reply_count_hidden'] ) ) : ?>

		<li><?php esc_html_e( 'Hidden Replies', 'magine' ); ?> <strong><?php echo esc_html( $stats['reply_count_hidden'] ); ?></strong></li>

	<?php endif; ?>

	<?php do_action( 'bbp_after_statistics' ); ?>

</ul>

<?php unset( $stats );
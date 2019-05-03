<?php
/*
* 5. Add taxonomy terms meta fields
*/
/*
Plugin Name: GreyBlack Theme - Set taxonomy meta fields
Plugin URI: https://mygreyblack.com/
Description: Set taxonomy meta fields
Author: ..
Version: 1.0
*/

add_action( 'init', '___register_term_meta_text' );
function ___register_term_meta_text() {
    register_meta( 'term', '__term_meta_text', '___sanitize_term_meta_text' );
}
// SANITIZE DATA
function ___sanitize_term_meta_text ( $value ) {
    return sanitize_text_field ($value);
}

$taxonomy_objects = array("collection" , "gender" , "item_type" );

foreach($taxonomy_objects as $tax ){
    add_action( $tax.'_add_form_fields', '___add_form_field_term_meta_text' );
    add_action( $tax.'_edit_form_fields', '___edit_form_field_term_meta_text' );
    add_action( 'edit_'.$tax ,   '___save_term_meta_text' );
    add_action( 'create_'.$tax , '___save_term_meta_text' );
}


// GETTER (will be sanitized)
function ___get_term_meta_text( $term_id ) {
  $value = get_term_meta( $term_id, '__term_meta_text', true );
  $value = ___sanitize_term_meta_text( $value );
  return $value;
}
// ADD FIELD TO CATEGORY TERM PAGE

function ___add_form_field_term_meta_text() { ?>
    <?php wp_nonce_field( basename( __FILE__ ), 'term_meta_text_nonce' ); ?>
    <div class="form-field term-meta-text-wrap">
        <label for="term-meta-text"><?php _e( 'Backgound Image', 'text_domain' ); ?></label>
        <input type="text" name="term_meta_text" id="term-meta-text" value="" class="term-meta-text-field" />
    </div>
<?php }
// ADD FIELD TO CATEGORY EDIT PAGE

function ___edit_form_field_term_meta_text( $term ) {
    $value  = ___get_term_meta_text( $term->term_id );
    if ( ! $value )
        $value = ""; ?>

    <tr class="form-field term-meta-text-wrap">
        <th scope="row"><label for="term-meta-text"><?php _e( 'Backgound Image', 'text_domain' ); ?></label></th>
        <td>
            <?php wp_nonce_field( basename( __FILE__ ), 'term_meta_text_nonce' ); ?>
            <input type="text" name="term_meta_text" id="term-meta-text" value="<?php echo esc_attr( $value ); ?>" class="term-meta-text-field"  />
        </td>
    </tr>
<?php }
// SAVE TERM META (on term edit & create)

function ___save_term_meta_text( $term_id ) {
    // verify the nonce --- remove if you don't care
    if ( ! isset( $_POST['term_meta_text_nonce'] ) || ! wp_verify_nonce( $_POST['term_meta_text_nonce'], basename( __FILE__ ) ) )
        return;
    $old_value  = ___get_term_meta_text( $term_id );
    $new_value = isset( $_POST['term_meta_text'] ) ? ___sanitize_term_meta_text ( $_POST['term_meta_text'] ) : '';
    if ( $old_value && '' === $new_value )
        delete_term_meta( $term_id, '__term_meta_text' );
    else if ( $old_value !== $new_value )
        update_term_meta( $term_id, '__term_meta_text', $new_value );
}
?>
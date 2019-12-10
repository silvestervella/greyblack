<?php
/*
 * Template Name: Contact Page Template
 * Template Post Type: post, page
 */
 
//response generation function
$response = "";

//function to generate response
function mygreyblack_contact_form_generate_response($type, $message){

  global $response;

  if($type == "success") $response = "<div class='success'>{$message}</div>";
  else $response = "<div class='error'>{$message}</div>";

}

//response messages
$not_human       = "Human verification is incorrect.";
$missing_content = "Please supply all required* information.";
$missing_content_not_sent = "Message not sent! Please supply all required* information.";
$email_invalid   = "Email Address Invalid.";
$message_unsent  = "Message was not sent. Try Again.";
$message_sent    = "Thanks! Your message has been sent. We'll get back to you soon.";


$name = $_POST['message_name'];
$email = $_POST['message_email'];
$message = $_POST['message_text'];
$human = $_POST['message_human'];


//php mailer variables
$to = get_option('admin_email');
$subject = "Someone sent a message from ".get_bloginfo('name');
$headers = 'From: '. $email . "\r\n" .
  'Reply-To: ' . $email . "\r\n";

  if(!$human == 0){
    if($human != 2 || !wp_verify_nonce($_POST['submitted'] , 'quote-nonce')) mygreyblack_contact_form_generate_response("error", $not_human); //not human!
    else {
        //validate email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        mygreyblack_contact_form_generate_response("error", $email_invalid);
        else //email is valid
        {
            //validate presence of name and message
            if(empty($name) ) {
                mygreyblack_contact_form_generate_response("error", $missing_content);
            }
            else //ready to go!
            {
                $site_info = $message;

                $sent = wp_mail($to, $subject, strip_tags($site_info), $headers);
                if($sent) {
                    mygreyblack_contact_form_generate_response("success", $message_sent); //message sent!
                    $order_cpt = array(
                        'post_title'    => $name,
                        'post_content'  => $site_info . ' Email - ' .$email ,
                        'post_status'   => 'private',
                        'post_author'   => 1,
                        'post_type'     => 'orders'
                      );
                      wp_insert_post( $order_cpt );
                } else {
                    mygreyblack_contact_form_generate_response("error", $message_unsent); //message wasn't sent
                }
            }
        }
    }
  }
  else mygreyblack_contact_form_generate_response("error", $missing_content);
  
get_header(); ?>

<main role="main">
    <div class="posts-sec-outer">
        <div class="container">
                    <!-- quotation form -->
                    <div id="form-outer">
                        <form id="contact-form" action="<?php the_permalink(); ?>" method="post">
                        <div id="response"><?php echo $response; ?></div>
                            <fieldset>
                                <label for="name"><span>Contact Name: <span class="required">*</span></span> <br><input type="text" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>"></label>
                                <label for="message_email"><span>Email: <span class="required">*</span></span> <br><input type="text" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>"></label>
                                <label for="message_text"><Span>Message: <span class="required">*</span></span> <br><textarea type="text" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea></label>
                                <label for="message_human"><span class="human">Human Verification: <span class="required">*</span> (_ + 3 = 5)</span> <br><input type="text" name="message_human"></label>
                                <input type="hidden" name="submitted" value="<?php echo wp_create_nonce('quote-nonce'); ?>">
                                <input class="submit prev-next" type="submit">
                            </fieldset>
                        </form>
                    </div>
        </div> <!-- /container -->
    </div> <!-- /posts-sec-outer -->
</main>

<?php get_footer(); ?>

<?php
/*
Plugin Name: Publish Confirmation
Plugin URI: http://www.bloggingbookshelf.com/wordpress/publish-confirmation-plugin/
Description: When you hit the "Publish" button, a small dialog box appears asking you if you're sure you want to publish the post.
Version: 1.0
Author: Tristan Higbee
Author URI: http://www.bloggingbookshelf.com
License: GPL2



*/


/*  Copyright 2010 Tristna Higbee from BloggingBookshelf.com (email : tristan@bloggingbookshelf.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
class cf_confirm_publish {

    function __construct() {
        add_action('admin_footer', array( $this, 'confirm' ) );
    }
    function confirm() {
        //get the messages
        $messages = $this->messages();
        echo '

            <script type="text/javascript">
            jQuery(document).ready(function($) {
                var message = "'.$messages[ 'default'] .' ";
                var publish = document.getElementById( "publish" );
                //check for featured image, if none is set add featured image warning
                if ($.find( "#postimagediv" ).length !== 0) {
                    if ($( "#postimagediv" ).find( "img" ).length===0 ) {
                        var message = message + "\n\n'.$messages[ 'featured'].'";
                    }
                }
                //check for excerpt, if not set add excerpt warning
                if ($.find( "#excerpt" ).length !== 0) {
                    if ($( "#excerpt" ).val().length=== 0) {
                        var message = message + "\n\n'.$messages['excerpt'].'";
                    }
                }
                //output the message if post is not published
                if (publish !== null) publish.onclick = function(){
                    return confirm( message );
                };
            });
         </script>';
    }

    function messages() {
        $messages = array(
            'default'   => 'Are you sure you want to publish?',
            'excerpt'   => 'No excerpt is set!',
            'featured'  => 'No featured image is set!'
        );
        return $messages;
    }

    function check_feature_img() {

    }


}

new cf_confirm_publish();

?>
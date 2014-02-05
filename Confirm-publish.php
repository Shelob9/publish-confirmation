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
        echo '
            <script type="text/javascript"><!--
            var publish = document.getElementById("publish");
            if (publish !== null) publish.onclick = function(){
                return confirm("'.$this->message().'");
            };
         // --></script>';
    }

    function message() {
        $message = 'Are you sure you want to publish?';
        return $message;
    }


}

new cf_confirm_publish();

?>
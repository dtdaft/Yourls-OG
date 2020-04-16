<?php
/*
Plugin Name: OpenGraph tags for YOURLS
Plugin URI: https://github.com/dtdaft/Yourls-OG
Description: Add a specific OpenGraph declaration to every redirect
Version: 1
Author: Alexandre Ruiz
Author URI: http://go.alexandreruiz.com
*/

if (!defined('YOURLS_ABSPATH'))
    die();

yourls_add_action('pre_redirect', 'add_open_graph');

function add_open_graph($args)
{
    $url           = $args[0];
    $code          = $args[1];
    $charset       = "UTF-8";
    $oglocal       = "en-EN";
    $ogtitle       = "";
    $ogdescription = "";
    $ogtype        = "website";
    $ogimage       = "";
    $ogsitename    = "";
    
    
    echo "<html lang='$oglocal' prefix='og: http://ogp.me/ns#'>";
    
    echo "<head>";
    echo "<meta charset='$charset'>";
    echo "<meta name='viewport' content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no'>";
    echo "<title>$ogtitle</title>";
    echo "<meta name='description' content='$ogdescription'/>";
    echo "<meta property='og:locale' content='$oglocal' />";
    echo "<meta property='og:type' content='$ogtype' />";
    echo "<meta property='og:title' content='$ogtitle' />";
    echo "<meta property='og:description' content='$ogdescription' />";
    echo "<meta property='og:url' content='$url' />";
    echo "<meta property='og:site_name' content='$ogsitename' />";
    echo "<meta property='og:image' content='$ogimage' />";
    echo "<meta property='twitter:title' content='$ogtitle' />";
    echo "<meta property='twitter:description' content='$ogdescription' />";
    echo "<meta property='twitter:image' content='$ogimage' />";

    
    echo "<script type='text/javascript'>
    $(function(){
        window.setTimeout(function(){
                        window.location.replace('$url');
                    },1000);
    });
    </script>";
    
    echo "</head>";
    
    echo "<body>";
    echo "<p>Please <a href='$url'>click here</a> if you are not automatically redirected.</p>";
    echo "</body>";
    
    echo "</html>";
}

<?php
// Configuration
if (file_exists('../../../index.php')) {
    // Configuration
    if (file_exists('../../../config.php')) {
	require_once('../../../config.php');
    }
    
    if( strstr($_SERVER['REQUEST_URI'], 'success' )) {
            $_GET['route'] = 'payment/dibsfw/success';
    }
    
    if( strstr($_SERVER['REQUEST_URI'], 'cancel' )) {
            $_GET['route'] = 'payment/dibsfw/cancel';
    }
    
    if( strstr($_SERVER['REQUEST_URI'], 'notify' )) {
            $_GET['route'] = 'payment/dibsfw/callback';
    }
    require_once('../../../index.php');
}
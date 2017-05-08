<?php

// Taken from: http://stackoverflow.com/questions/13076480/php-get-actual-maximum-upload-size
function file_upload_max_size() {
  static $max_size = -1;

  if ($max_size < 0) {
    // Start with post_max_size.
    $max_size = parse_size(ini_get('post_max_size'));

    // If upload_max_size is less, then reduce. Except if upload_max_size is
    // zero, which indicates no limit.
    $upload_max = parse_size(ini_get('upload_max_filesize'));
    if ($upload_max > 0 && $upload_max < $max_size) {
      $max_size = $upload_max;
    }
  }
  return $max_size;
}

function parse_size($size) {
  $unit = preg_replace('/[^bkmgtpezy]/i', '', $size); // Remove the non-unit characters from the size.
  $size = preg_replace('/[^0-9\.]/', '', $size); // Remove the non-numeric characters from the size.
  if ($unit) {
    // Find the position of the unit in the ordered string which is the power of magnitude to multiply a kilobyte by.
    return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
  }
  else {
    return round($size);
  }
}

function getMagentoBackendSession() {
    if (!array_key_exists('adminhtml', $_COOKIE)) return false;

    if(!session_id()) session_start();
    $oldSession = $_SESSION;

    Mage::app();

    $sessionFilePath = Mage::getBaseDir('session') . DS . 'sess_' . $_COOKIE['adminhtml'];
    $sessionContent  = file_get_contents($sessionFilePath);

    session_decode($sessionContent);

    /** @var Mage_Admin_Model_Session $session */
    $session  = Mage::getSingleton('admin/session');
    $loggedIn = $session->isLoggedIn();

    //set old session back to current session
    $_SESSION = $oldSession;

    return $session;
}

function initializeMagento() {
    if(strpos(strtoupper(PHP_OS), 'WIN') !== false){
        echo 'Not tested on Windows paths (could result in endless loop).';
        exit;
    }
    // Preeseed some iterations as we can safely start in our plugins root directory.
    $STARTING_PATH = $PATH = realpath(__DIR__.'/../../../../..');
    while ($PATH !== '/') {
        if (file_exists($PATH.'/fontis_config.inc.php')) {
            $CONFIG = require($PATH.'/fontis_config.inc.php');
            // Initialize Magento
            require_once($CONFIG['magento_root'].'/app/bootstrap.php');
            require_once(realpath($CONFIG['magento_root'].'/app/Mage.php'));
            umask(0);
        }
        $PATH = realpath($PATH.'/..');
    }

    echo 'Could not find "fontis_config.inc.php" within the whole tree starting from '.$STARTING_PATH;
    exit;    
}

function adapter_magento(){
    initializeMagento();
    $session = getMagentoBackendSession();
    $docRoot = getenv('DOCUMENT_ROOT');
    $magentoBase = str_replace($docRoot, '', Mage::getBaseDir());
    $uploadPath = Mage::getStoreConfig('fontis_wysiwyg/general/upload_path');

    return array(
        'enabled' => (bool)Mage::getStoreConfig('fontis_wysiwyg/general/enable_uploads'),
        'logged_in' => $session->isLoggedIn(),
        'logged_in_as' => $session->isLoggedIn() ? $session->getUser()->getUsername() : null,
        'upload_dir' => Mage::getBaseDir()."/$uploadPath",
        'upload_dir_public' => Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB).ltrim($uploadPath, '/'),
    );
}

return adapter_magento();

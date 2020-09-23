

<?php
/*  
function MyAutoload($className)
{
  $extension =  spl_autoload_extensions();
  $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
  echo $className;
  $filename = __DIR__ . DIRECTORY_SEPARATOR . $className . $extension;
 // $filename = $_SERVER['HTTP_HOST']. DIRECTORY_SEPARATOR .'bike-rental-system'. DIRECTORY_SEPARATOR . $className . $extension;
  if (is_readable($filename)) {
    require_once($filename);
  } else {
    die("Not Found Class ($filename)");
  }
}

spl_autoload_extensions('.php');
spl_autoload_register('MyAutoload');

*/
  
/* $DOCUMENT_ROOT = 'admin';
function loadDao($class) {
 $path = $GLOBALS['DOCUMENT_ROOT'] . '/dao/';
 $filename =$path . $class .'.php';
 if (is_readable($filename)) {
    require_once($filename);
  } else {
    die("Not Found Class ($filename)");
  }
}

function loadUtil($class) {
 $path = $GLOBALS['DOCUMENT_ROOT'] . '/util/';
 $filename =$path . $class .'.php';
  if (is_readable($filename)) {
    require_once($filename);
  } else {
    die("Not Found Class ($filename)");
  }
}
function loadCoreUtil($class) {
  $path = '../core/util/';
  $filename =$path . $class .'.php';
   if (is_readable($filename)) {
     require_once($filename);
   } else {
     die("Not Found Class ($filename)");
   }
 }
 spl_autoload_register('loadDao');
 spl_autoload_register('loadUtil');
 spl_autoload_register('loadCoreUtil');
 */
?>
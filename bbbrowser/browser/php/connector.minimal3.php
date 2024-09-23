<?php
$cliente=trim($_REQUEST['cliente']);
$id=trim($_REQUEST['id']);
$tipo=trim($_REQUEST['tipo']);
$user=trim($_REQUEST['user']);
$year=trim($_REQUEST['year']);

error_reporting(0); // Set E_ALL for debuging

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderConnector.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinder.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeDriver.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeLocalFileSystem.class.php';
// Required for MySQL storage connector
//include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeMySQL.class.php';
// Required for FTP connector support
// include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeFTP.class.php';

/**
 * # Dropbox volume driver need "dropbox-php's Dropbox" and "PHP OAuth extension" or "PEAR's HTTP_OAUTH package"
 * * dropbox-php: http://www.dropbox-php.com/
 * * PHP OAuth extension: http://pecl.php.net/package/oauth
 * * PEAR's HTTP_OAUTH package: http://pear.php.net/package/http_oauth
 *  * HTTP_OAUTH package require HTTP_Request2 and Net_URL2
 */
// Required for Dropbox.com connector support
// include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeDropbox.class.php';

// Dropbox driver need next two settings. You can get at https://www.dropbox.com/developers
// define('ELFINDER_DROPBOX_CONSUMERKEY',    '');
// define('ELFINDER_DROPBOX_CONSUMERSECRET', '');
// define('ELFINDER_DROPBOX_META_CACHE_PATH',''); // optional for `options['metaCachePath']`

/**
 * Simple function to demonstrate how to control file access using "accessControl" callback.
 * This method will disable accessing files/folders starting from '.' (dot)
 *
 * @param  string  $attr  attribute name (read|write|locked|hidden)
 * @param  string  $path  file path relative to volume root directory started with directory separator
 * @return bool|null
 **/
function access($attr, $path, $data, $volume) {
	return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
		? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
		:  null;                                    // else elFinder decide it itself
}


$f=trim($_GET['id']);

if($tipo=="artes"){

//$pt='../../'.$tipo.'/'.$cliente.'/ORDEN '.$id.'/';

$pt2='../../fotos/'.$year.'/CLIENTES/POP/'.$cliente.'/ORDEN '.$id.'/';

}else{

$pt2='../../fotos/'.$year.'/CLIENTES/POP/'.$cliente.'/ORDEN '.$id.'/';	

$pt='../../artes/'.$year.'/POP/'.$cliente.'/ORDEN '.$id.'/';


}


/**
 * Smart logger function
 * Demonstrate how to work with elFinder event api
 *
 * @param  string   $cmd       command name
 * @param  array    $result    command result
 * @param  array    $args      command arguments from client
 * @param  elFinder $elfinder  elFinder instance
 * @return void|true
 **/

function UpCallback($cmd, $result, $args, $elfinder) {

            include("data.php");
            $id=trim($_REQUEST['id']);
            $sesion=$_COOKIE['session']; 
			$user=trim($_REQUEST['user']); 
			$ip=$_SERVER["REMOTE_ADDR"];
			$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
			$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			$date_log=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ."";
			$detalle='</br><font color="blue">'.$user.'</font><b> ha subido fotos a la  Orden Numero:</b> <font color="red">'.$id.'</font>.</br></br> El dia '.$date_log.' a las '.date('h:i:s a').' desde la IP '.$ip.'.';
			//$sql="INSERT INTO sesion_detalle (id_sesion, detalle, fechahora) VALUES('$sesion', '$detalle', '".date("Y-m-d h:i:s", time())."')";
			//$rs=mysql_query($sql);
			mysql_close();

return true;
  
}


function ReCallback($cmd, $result, $args, $elfinder) {

            include("data.php");
            $id=trim($_REQUEST['id']);
            $sesion=$_COOKIE['session']; 
			$user=trim($_REQUEST['user']); 
			$ip=$_SERVER["REMOTE_ADDR"];
			$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
			$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			$date_log=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ."";
			$detalle='</br><font color="blue">'.$user.'</font><b> ha borrado fotos de la Orden Numero:</b> <font color="red">'.$id.'</font>.</br></br> El dia '.$date_log.' a las '.date('h:i:s a').' desde la IP '.$ip.'.';
			//$sql="INSERT INTO sesion_detalle (id_sesion, detalle, fechahora) VALUES('$sesion', '$detalle', '".date("Y-m-d h:i:s", time())."')";
			//$rs=mysql_query($sql);
			mysql_close();

return true;
  
}

// Documentation for connector options:
// https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options
$opts = array(
     
     'bind' => array(
        'upload' => 'UpCallback',
        'rm' => 'ReCallback'
    ),	

	'roots' => array(
		array(
			'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
			'path'          => $pt,                 // path to files (REQUIRED)
			'URL'           => $pt, // URL to files (REQUIRED)
			'defaults' => array('read' => true, 'write' => true),
			//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
			//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
			//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
			'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
		),

		array(
			'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
			'path'          => $pt2,                 // path to files (REQUIRED)
			'URL'           => $pt2, // URL to files (REQUIRED)
			'alias'         => 'FOTOS',
			'defaults' => array('read' => true, 'write' => true),
			//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
			//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
			//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
			'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
		)
	)
);

// run elFinder
$connector = new elFinderConnector(new elFinder($opts));
$connector->run();


//*********************************************************************************************************************

/*

$opts = array(
	// 'debug' => true,
	'roots' => array(
		array(
			'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
			'path'          => '../files/',                 // path to files (REQUIRED)
			'URL'           => dirname($_SERVER['PHP_SELF']) . '/../files/', // URL to files (REQUIRED)
			'attributes' => array(
							        array(
							            'pattern' => '/^TEST$/', //You can also set permissions for file types by adding, for example, .jpg inside pattern.
							            'read'    => true,
							            'write'   => true,
							            'locked'  => false
							        )
							    ),
			//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
			'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
			'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
			'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
		)
	)

*/
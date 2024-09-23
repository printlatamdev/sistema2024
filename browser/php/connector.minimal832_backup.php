<?php

$orden = trim($_REQUEST['orden']);
$year = trim($_REQUEST['year']);
$empresa1 = trim($_REQUEST['empresa']);
$marca = trim($_REQUEST['marca']);
$proyecto = trim($_REQUEST['proyecto']);
$nivel = trim($_REQUEST['nivel']);
$tipo = trim($_REQUEST['tipo']);
$campo = trim($_REQUEST['campo']);
$base = trim($_REQUEST['base']);

$carpeta_pais = $base == 'esa' ? 'EL_SALVADOR' : 'NICARAGUA';



if ($empresa1 == 'COLGATE PALMOLIVE CA INC') {
	$empresa = 'COLGATE PALMOLIVE CA';
} else {
	if ($empresa1 == 'HH GLOBAL') {
		$empresa = 'HH GLOBAL EL SALVADOR';
	} else {
		$empresa = $empresa1;
	}
}

echo "<script>console.log($nivel);</script>";


error_reporting(0); // Set E_ALL for debuging

include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'elFinderConnector.class.php';
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'elFinder.class.php';
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'elFinderVolumeDriver.class.php';
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'elFinderVolumeLocalFileSystem.class.php';
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
function access($attr, $path, $data, $volume)
{
	echo "<script>console.log('Hello world! retturn');</script>";

	return strpos(basename($path), '.') == 0       // if file/folder begins with '.' (dot)
		? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
		:  null;                                    // else elFinder decide it itself
}





if ($nivel == 1 || $nivel == 2 || $nivel == 3 || $nivel == 17 || $nivel == 50) {
	echo "<script>console.log('Hello world! 1 2 3 17 50');</script>";
	$pt1 = '../../ORDENES_POP/'.$carpeta_pais.'/'.'ID_OP_'.$orden.'/ARTES';
} else if ($nivel == 4) {
	$pt1 = '../../Artes/' . $year . '/DISPLAYS/' . $empresa . '/' . $marca . '/' . $proyecto . '/DISENO';

	$pt2 = '../../Artes/' . $year . '/DISPLAYS/' . $empresa . '/' . $marca . '/' . $proyecto . '/REPORTE/Render_Final';
	echo "<script>console.log('Hello world! 4');</script>";
} else if ($nivel == 5) {

	if ($base == 'nica') {
		$pt1 = '../../Artes/' . $year . '/DISPLAYS/' . $empresa . '/' . $marca . '/' . $proyecto . '/DISENO/IMPRESION/CR';
		$pt2e = '../../Artes/' . $year . '/DISPLAYS/' . $empresa . '/' . $marca . '/' . $proyecto . '/DISENO/CORTE/CR';
		$pt2f = '../../Artes/' . $year . '/DISPLAYS/' . $empresa . '/' . $marca . '/' . $proyecto . '/DISENO/INSTRUCTIVOS';
	echo "<script>console.log('Hello world! 5 nica');</script>";

	} else {
		echo "<script>console.log('Hello world! 5 esa');</script>";

		$pt1 = '../../Artes/' . $year . '/DISPLAYS/' . $empresa . '/' . $marca . '/' . $proyecto . '/DISENO/IMPRESION/';
	}
} else if ($nivel == 15) {
	if ($base == 'nica') {
		echo "<script>console.log('Hello world! nica 15');</script>";

		$pt1 = '../../Artes/' . $year . '/DISPLAYS/' . $empresa . '/' . $marca . '/' . $proyecto . '/DISENO/CORTE/CR/';
	} else {
	echo "<script>console.log('Hello world! esa 15');</script>";

		$pt1 = '../../Artes/' . $year . '/DISPLAYS/' . $empresa . '/' . $marca . '/' . $proyecto . '/DISENO/CORTE';

		$pt2 = '../../Artes/' . $year . '/DISPLAYS/' . $empresa . '/' . $marca . '/' . $proyecto . '/DISENO/INSTRUCTIVOS';
	}
} else if ($nivel == 3 || $nivel == 9) {
	echo "<script>console.log('Hello world! 9 3');</script>";

	$pt1 = '../../Artes/' . $year . '/DISPLAYS/' . $empresa . '/' . $marca . '/' . $proyecto . '/ADMINISTRACION';

	$pt3 = '../../Artes/' . $year . '/DISPLAYS/' . $empresa . '/' . $marca . '/' . $proyecto . '/LOGISTICA';

	$pt4 = '../../Artes/' . $year . '/DISPLAYS/' . $empresa . '/' . $marca . '/' . $proyecto . '/REPORTE';

	$pt5 = '../../Artes/' . $year . '/DISPLAYS/' . $empresa . '/' . $marca . '/' . $proyecto . '/DISENO/Renders_Aprobados';
} else if ($nivel == 8) {
	echo "<script>console.log('Hello world! 8');</script>";

	$pt1 = '../../Artes/' . $year . '/DISPLAYS/' . $empresa . '/' . $marca . '/' . $proyecto . '/DISENO/SCREENSHOT';
} else if ($nivel == 16) {
	echo "<script>console.log('Hello world! 16');</script>";

	$pt1 = '../../Artes/' . $year . '/DISPLAYS/' . $empresa . '/' . $marca . '/' . $proyecto . '/DISENO/INSTRUCTIVOS';
}else{
	echo "<script>console.log('No se creo ningun archivo!');</script>";
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

function UpCallback($cmd, $result, $args, $elfinder)
{

	return true;
}


function ReCallback($cmd, $result, $args, $elfinder)
{



	return true;
}

// Documentation for connector options:
// https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options

if ($nivel == 15 ||$nivel == 1) {


	$opts = array(

		'bind' => array(
			'upload' => 'UpCallback',
			'rm' => 'ReCallback'
		),

		'roots' => array(
			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pt1,                 // path to files (REQUIRED)
				'URL'           => $pt1, // URL to files (REQUIRED)
				'alias'         => 'ARTES',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			),

			/* array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pt2,                 // path to files (REQUIRED)
				'URL'           => $pt2, // URL to files (REQUIRED)
				'alias'         => 'Instructivo',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			),

			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pt3,                 // path to files (REQUIRED)
				'URL'           => $pt3, // URL to files (REQUIRED)
				'alias'         => 'Renders_Aprobados',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			),
			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pti,                 // path to files (REQUIRED)
				'URL'           => $pti, // URL to files (REQUIRED)
				'alias'         => 'IMPRESION',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			), */
			// array(
			// 	'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
			// 	'path'          => $pte,                 // path to files (REQUIRED)
			// 	'URL'           => $pte, // URL to files (REQUIRED)
			// 	'alias'         => 'EDITABLE',
			// 	'defaults' => array('read' => true, 'write' => true),
			// 	//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
			// 	//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
			// 	//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
			// 	'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			// ),




		)
	);
} elseif ($nivel == 5) {


	$opts = array(

		'bind' => array(
			'upload' => 'UpCallback',
			'rm' => 'ReCallback'
		),


		'roots' => array(
			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pt1,                 // path to files (REQUIRED)
				'URL'           => $pt1, // URL to files (REQUIRED)
				'alias'         => 'IMPRESION FINAL',
				'defaults' => array('read' => true, 'write' => false),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)

			),


			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pt2e,                 // path to files (REQUIRED)
				'URL'           => $pt2e, // URL to files (REQUIRED)
				'alias'         => 'CORTE FINAL',
				'defaults' => array('read' => true, 'write' => false),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)

			),

			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pt2f,                 // path to files (REQUIRED)
				'URL'           => $pt2f, // URL to files (REQUIRED)
				'alias'         => 'INSTRUCTIVOS',
				'defaults' => array('read' => true, 'write' => false),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'disable'                     // disable and hide dot starting files (OPTIONAL)

			),


			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pti,                 // path to files (REQUIRED)
				'URL'           => $pti, // URL to files (REQUIRED)
				'alias'         => 'IMPRESION',
				'defaults' => array('read' => true, 'write' => false),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'disable'                     // disable and hide dot starting files (OPTIONAL)
			),
			// array(
			// 	'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
			// 	'path'          => $pte,                 // path to files (REQUIRED)
			// 	'URL'           => $pte, // URL to files (REQUIRED)
			// 	'alias'         => 'EDITABLE',
			// 	'defaults' => array('read' => true, 'write' => false),
			// 	//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
			// 	//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
			// 	//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
			// 	'accessControl' => 'disable'                     // disable and hide dot starting files (OPTIONAL)
			// ),



		)
	);
} elseif ($nivel == 1 || $nivel == 2 || $nivel == 17 || $nivel == 50) {


	$opts = array(

		'bind' => array(
			'upload' => 'UpCallback',
			'rm' => 'ReCallback'
		),

		'roots' => array(
			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pt1,                 // path to files (REQUIRED)
				'URL'           => $pt1, // URL to files (REQUIRED)
				'alias'         => 'ADMINISTRACION',
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
				'alias'         => 'DISENO',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			),

			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pt3,                 // path to files (REQUIRED)
				'URL'           => $pt3, // URL to files (REQUIRED)
				'alias'         => 'LOGISTICA',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			),

			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pt4,                 // path to files (REQUIRED)
				'URL'           => $pt4, // URL to files (REQUIRED)
				'alias'         => 'REPORTE',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			),

			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $ptf,                 // path to files (REQUIRED)
				'URL'           => $ptf, // URL to files (REQUIRED)
				'alias'         => 'FOTOS',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			),
			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pti,                 // path to files (REQUIRED)
				'URL'           => $pti, // URL to files (REQUIRED)
				'alias'         => 'IMPRESION',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			),
			// array(
			// 	'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
			// 	'path'          => $pte,                 // path to files (REQUIRED)
			// 	'URL'           => $pte, // URL to files (REQUIRED)
			// 	'alias'         => 'EDITABLE',
			// 	'defaults' => array('read' => true, 'write' => true),
			// 	//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
			// 	//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
			// 	//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
			// 	'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			// ),

			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pt5,                 // path to files (REQUIRED)
				'URL'           => $pt5, // URL to files (REQUIRED)
				'alias'         => 'DISENO',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			)



		)
	);
} elseif ($nivel == 4) {


	$opts = array(

		'bind' => array(
			'upload' => 'UpCallback',
			'rm' => 'ReCallback'
		),

		'roots' => array(
			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pt1,                 // path to files (REQUIRED)
				'URL'           => $pt1, // URL to files (REQUIRED)
				'alias'         => 'DISEÑO',
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
				'alias'         => 'RENDER FINAL',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			)

		)
	);
} elseif ($nivel == 3 || $nivel == 9) {


	$opts = array(

		'bind' => array(
			'upload' => 'UpCallback',
			'rm' => 'ReCallback'
		),

		'roots' => array(
			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pt1,                 // path to files (REQUIRED)
				'URL'           => $pt1, // URL to files (REQUIRED)
				'alias'         => 'ADMINISTRACION',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			),

			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $ptf,                 // path to files (REQUIRED)
				'URL'           => $ptf, // URL to files (REQUIRED)
				'alias'         => 'FOTOS',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			),

			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pt3,                 // path to files (REQUIRED)
				'URL'           => $pt3, // URL to files (REQUIRED)
				'alias'         => 'LOGISTICA',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			),

			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pt4,                 // path to files (REQUIRED)
				'URL'           => $pt4, // URL to files (REQUIRED)
				'alias'         => 'REPORTE',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			),

			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pt5,                 // path to files (REQUIRED)
				'URL'           => $pt5, // URL to files (REQUIRED)
				'alias'         => 'Renders_Aprobados',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			)





		)
	);
} elseif ($nivel == 8) {


	$opts = array(

		'bind' => array(
			'upload' => 'UpCallback',
			'rm' => 'ReCallback'
		),

		'roots' => array(
			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pt1,                 // path to files (REQUIRED)
				'URL'           => $pt1, // URL to files (REQUIRED)
				'alias'         => 'SCREENSHOT',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			)

		)
	);
} elseif ($nivel == 16) {


	$opts = array(

		'bind' => array(
			'upload' => 'UpCallback',
			'rm' => 'ReCallback'
		),

		'roots' => array(
			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pt1,                 // path to files (REQUIRED)
				'URL'           => $pt1, // URL to files (REQUIRED)
				'alias'         => 'INSTRUCTIVOS',
				'defaults' => array('read' => true, 'write' => false),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			)

		)
	);
}

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

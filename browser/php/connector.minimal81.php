<?php

$orden = trim($_REQUEST['orden']);
$year = trim($_REQUEST['year']);
$empresa = trim($_REQUEST['empresa']);
$marca = trim($_REQUEST['marca']);
$proyecto = trim($_REQUEST['proyecto']);
$nivel = trim($_REQUEST['nivel']);
$tipo = trim($_REQUEST['tipo']);
$campo = trim($_REQUEST['campo']);
$base = trim($_REQUEST['base']);



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
	return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
		? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
		:  null;                                    // else elFinder decide it itself
}



if ($base == 'nica') {
	$pais = 'NICARAGUA';
} else {
	$pais = 'EL_SALVADOR';
}


if ($nivel == 1 || $nivel == 2 || $nivel == 5 || $nivel == 3 || $nivel == 15 || $nivel == 4 || $nivel == 9 || $nivel == 21 || $nivel == 22 || $nivel == 23) {
	if ($tipo == "campos2" && $nivel == 5 || $nivel == 15 || $nivel == 4) {
		$pte = '../../ORDENES_OP/COLOR/' . $pais . '/' . $campo . '/EDITABLE';
		$pti = '../../ORDENES_OP/COLOR/' . $pais . '/' . $campo . '/IMPRESION';
	} elseif ($tipo == "campos2" && $nivel == 3 || $nivel == 9) {
		$ptf = '../../ORDENES_OP/COLOR/' . $pais . '/' . $campo . '/FOTOS';
	} elseif ($tipo == "campos2" && $nivel == 1 || $nivel == 2) {
		$pt1 = '../../ORDENES_OP/COLOR/' . $pais . '/' . $campo;
	}elseif ($nivel == 21){ 
		// CALDERAS RIP
		$urlCalderasRip = '../../ORDENES_OP/COLOR/' . $pais . '/' . $campo . '/IMPRESION';
	}elseif ($nivel == 22){
		$urlDiseno = '../../ORDENES_OP/COLOR/' . $pais . '/' . $campo . '/IMPRESION';
		$urleditDiseno = '../../ORDENES_OP/COLOR/' . $pais . '/' . $campo . '/EDITABLE';
		$urlfotosDiseno = '../../ORDENES_OP/COLOR/' . $pais . '/' . $campo . '/FOTOS';
	}elseif ($nivel == 23){
		$urlProdArtes = '../../ORDENES_OP/COLOR/' . $pais . '/' . $campo . '/ARTES';
		$urlProdDocs = '../../ORDENES_OP/COLOR/' . $pais . '/' . $campo . '/DOC';
		$urlProdFotos = '../../ORDENES_OP/COLOR/' . $pais . '/' . $campo . '/FOTOS';
	}
}


/**
 * Smart logger function
 * Demonstrate how to work with elFinder event api
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

//Documentation for connector options:
//https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options

if ($nivel == 15) {


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
				'alias'         => 'Corte',
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
			),
			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pte,                 // path to files (REQUIRED)
				'URL'           => $pte, // URL to files (REQUIRED)
				'alias'         => 'EDITABLE',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			),




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
			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pte,                 // path to files (REQUIRED)
				'URL'           => $pte, // URL to files (REQUIRED)
				'alias'         => 'EDITABLE',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			),



		)
	);
} elseif ($nivel == 9) {


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
				'alias'         => 'rootISTRACION',
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
} elseif ($nivel == 1 || $nivel == 2) {


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
				'alias'         => 'rootISTRACION',
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
			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pte,                 // path to files (REQUIRED)
				'URL'           => $pte, // URL to files (REQUIRED)
				'alias'         => 'EDITABLE',
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
				'path'          => $pti,                 // path to files (REQUIRED)
				'URL'           => $pti, // URL to files (REQUIRED)
				'alias'         => 'IMPRESION',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			),
			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $pte,                 // path to files (REQUIRED)
				'URL'           => $pte, // URL to files (REQUIRED)
				'alias'         => 'EDITABLE',
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
} elseif ($nivel == 3) {


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
				'alias'         => 'rootISTRACION',
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
} elseif ($nivel == 21){ // CALDERAS RIP

	$opts = array(

		'bind' => array(
			'upload' => 'UpCallback',
			'rm' => 'ReCallback'
		),


		'roots' => array(

			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $urlCalderasRip,                 // path to files (REQUIRED)
				'URL'           => $urlCalderasRip, // URL to files (REQUIRED)
				'alias'         => 'IMPRESION',
				'defaults' => array('read' => true, 'write' => true),			
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			),

		)
	);







} elseif ($nivel == 22){

	$opts = array(

		'bind' => array(
			'upload' => 'UpCallback',
			'rm' => 'ReCallback'
		),
		'roots' => array(

			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $urlDiseno,                 // path to files (REQUIRED)
				'URL'           => $urlDiseno, // URL to files (REQUIRED)
				'alias'         => 'IMPRESION',
				'defaults' => array('read' => true, 'write' => true),			
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			),
			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $urleditDiseno,                 // path to files (REQUIRED)
				'URL'           => $urleditDiseno, // URL to files (REQUIRED)
				'alias'         => 'EDITABLE',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			),
			array(
				'driver'        => 'LocalFileSystem',  // driver for accessing file system (REQUIRED)
				'path'          => $urlfotosDiseno,   // path to files (REQUIRED)
				'URL'           => $urlfotosDiseno, // URL to files (REQUIRED)
				'alias'         => 'FOTOS',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			)

		)
	);







} elseif ($nivel == 23){

	$opts = array(

		'bind' => array(
			'upload' => 'UpCallback',
			'rm' => 'ReCallback'
		),

		'roots' => array(
			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $urlProdArtes,                 // path to files (REQUIRED)
				'URL'           => $urlProdArtes, // URL to files (REQUIRED)
				'alias'         => 'ARTES',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			),

			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $urlProdDocs,                 // path to files (REQUIRED)
				'URL'           => $urlProdDocs, // URL to files (REQUIRED)
				'alias'         => 'DOC',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			),

			array(
				'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
				'path'          => $urlProdFotos,                 // path to files (REQUIRED)
				'URL'           => $urlProdFotos, // URL to files (REQUIRED)
				'alias'         => 'FOTOS',
				'defaults' => array('read' => true, 'write' => true),
				//'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
				//'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
				//'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
				'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
			),
		)
	);
}

// run elFinder
$connector = new elFinderConnector(new elFinder($opts));
$connector->run();

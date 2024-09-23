<?php
/**
 * @package dompdf
 * @link    http://www.dompdf.com/
 * @author  Benj Carson <benjcarson@digitaljunkies.ca>
 * @author  Fabien M�nager <fabien.menager@gmail.com>
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * @version $Id: autoload.inc.php 448 2011-11-13 13:00:03Z fabien.menager $
 */

/**
 * DOMPDF autoload function
 *
 * @param string $class
 */
function DOMPDF_autoload($class) {
    $filename = DOMPDF_INC_DIR . "/" . mb_strtolower($class) . ".cls.php";
  
    if (is_file($filename)) {
        require_once($filename);
    }
}

// Register the autoload function if SPL is available
if (function_exists("spl_autoload_register")) {
    spl_autoload_register('DOMPDF_autoload');
}

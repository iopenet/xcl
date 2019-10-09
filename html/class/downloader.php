<?php
// $Id: downloader.php,v 1.1 2007/05/15 02:34:21 minahito Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <https://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
// Author: Kazumi Ono (AKA onokazu)                                          //
// URL: https://www.myweb.ne.jp/, https://www.xoops.org/, https://jp.xoops.org/ //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //
/**
 * Sends non HTML files through a http socket
 * 
 * @package     kernel
 * @subpackage  core
 * 
 * @author	    Kazumi Ono	<onokazu@xoops.org>
 * @copyright	copyright (c) 2000-2003 XOOPS.org
 */
class XoopsDownloader
{

    /**#@+
     * file information
     */
    public $mimetype;
    public $ext;
    public $archiver;
    /**#@-*/

    /**
     * Constructor
     */
    public function XoopsDownloader()
    {
        //EMPTY
    }

    /**
     * Send the HTTP header
     * 
     * @param	string  $filename
     * 
     * @access	private
     */
    public function _header($filename)
    {
        if (function_exists('mb_http_output')) {
            mb_http_output('pass');
        }
        header('Content-Type: '.$this->mimetype);
        if (preg_match("/MSIE ([0-9]\.[0-9]{1,2})/", $_SERVER['HTTP_USER_AGENT'])) {
            header('Content-Disposition: inline; filename="'.$filename.'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
        } else {
            header('Content-Disposition: attachment; filename="'.$filename.'"');
            header('Expires: 0');
            header('Pragma: no-cache');
        }
    }

    /**
     * XoopsDownloader::addFile()
     * 
     * @param   string  $filepath
     * @param   string   $newfilename
     **/
    public function addFile($filepath, $newfilename=null)
    {
        //EMPTY
    }

    /**
     * XoopsDownloader::addBinaryFile()
     * 
     * @param   string  $filepath
     * @param   string  $newfilename
     **/
    public function addBinaryFile($filepath, $newfilename=null)
    {
        //EMPTY
    }

    /**
     * XoopsDownloader::addFileData()
     * 
     * @param   mixed     $data
     * @param   string    $filename
     * @param   integer   $time
     **/
    public function addFileData(&$data, $filename, $time=0)
    {
        //EMPTY
    }

    /**
     * XoopsDownloader::addBinaryFileData()
     * 
     * @param   mixed   $data
     * @param   string  $filename
     * @param   integer $time
     **/
    public function addBinaryFileData(&$data, $filename, $time=0)
    {
        //EMPTY
    }

    /**
     * XoopsDownloader::download()
     * 
     * @param   string  $name
     * @param   boolean $gzip
     **/
    public function download($name, $gzip = true)
    {
        //EMPTY
    }
}

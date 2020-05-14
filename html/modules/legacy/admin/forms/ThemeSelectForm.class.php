<?php
/**
 *
 * @package Legacy
 * @version $Id: ThemeSelectForm.class.php,v 1.4 2008/09/25 15:11:20 kilica Exp $
 * @copyright Copyright 2005-2007 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 *
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

require_once XOOPS_ROOT_PATH . '/core/XCube_ActionForm.class.php';

/***
 * @internal
 * This class is generated by makeActionForm tool.
 */
class Legacy_ThemeSelectForm extends XCube_ActionForm
{
    public function getTokenName()
    {
        return 'module.legacy.ThemeSelectForm.TOKEN';
    }

    public function prepare()
    {
        //
        // Set form properties
        //
        $this->mFormProperties['select'] =new XCube_BoolArrayProperty('select');
        $this->mFormProperties['choose'] =new XCube_StringArrayProperty('choose');
    }

    /**
     * @access public
     */
    public function getChooseTheme()
    {
        foreach ($this->get('choose') as $dirname => $dmy) {
            return $dirname;
        }
        
        return null;
    }
    
    public function getSelectableTheme()
    {
        $ret = [];
        
        foreach ($this->get('select') as $themeName => $isSelect) {
            if (1 === $isSelect) {
                $ret[] = $themeName;
            }
        }
        
        return $ret;
    }
    
    public function load(&$themeArr)
    {
        foreach ($themeArr as $themeName) {
            $this->set('select', $themeName, 1);
        }
    }
}

<?php
/**
 *
 * @package XCube
 * @version $Id: XCube_Theme.class.php,v 1.4 2008/10/12 04:30:27 minahito Exp $
 * @copyright Copyright 2005-2020 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/bsd_licenses.txt Modified BSD license
 *
 */

/**
 * The theme class.
 */
class XCube_Theme
{
    /**
     * A name of the theme.
     *
     * @var string
     */
    public $mName;

    /**
     * A name of the theme on the file system.
     *
     * @var string
     */
    public $mDirname;

    /**
     * A name of entities system which this theme depends on.
     *
     * @var string
     */
    public $mDepends = [];

    public $mVersion;

    public $mUrl;

    /**
     * A name of the render system which this theme depends on.
     *
     * @var string
     */
    public $mRenderSystemName;

    /**
     * A file name of screen shot.
     *
     * @var string
     */
    public $mScreenShot;

    public $mDescription;

    /**
     * A description of this theme file format. This information isn't used by
     * a program. But, this is an important information for users
     *
     * @var string
     */
    public $mFormat;

    public $mAuthor;

    /**
     * @deprecated mLicense
     */
    public $mLicence;

    public $mLicense;

    public $_mManifesto = [];

    /**
     * Load manifesto file, and set infomations from the file to member
     * property.
     *
     * @param $file
     * @return bool
     */
    public function loadManifesto($file)
    {
        if (file_exists($file)) {
            $iniHandler = new XCube_IniHandler($file, true);
            $this->_mManifesto = $iniHandler->getAllConfig();
            $this->mName = isset($this->_mManifesto['Manifesto']['Name']) ? $this->_mManifesto['Manifesto']['Name'] : '';
            $this->mDepends = isset($this->_mManifesto['Manifesto']['Depends']) ? $this->_mManifesto['Manifesto']['Depends'] : '';
            $this->mVersion = isset($this->_mManifesto['Manifesto']['Version']) ? $this->_mManifesto['Manifesto']['Version'] : '';
            $this->mUrl = isset($this->_mManifesto['Manifesto']['Url']) ? $this->_mManifesto['Manifesto']['Url'] : '';

            $this->mRenderSystemName = isset($this->_mManifesto['Theme']['RenderSystem']) ? $this->_mManifesto['Theme']['RenderSystem'] : '';
            $this->mAuthor = isset($this->_mManifesto['Theme']['Author']) ? $this->_mManifesto['Theme']['Author'] : '';

            if (isset($this->_mManifesto['Theme']['ScreenShot'])) {
                $this->mScreenShot = $this->_mManifesto['Theme']['ScreenShot'];
            }

            if (isset($this->_mManifesto['Theme']['Description'])) {
                $this->mDescription = $this->_mManifesto['Theme']['Description'];
            }

            $this->mFormat = isset($this->_mManifesto['Theme']['Format']) ? $this->_mManifesto['Theme']['Format'] : '';

            if (isset($this->_mManifesto['Theme']['License'])) {
                $this->mLicense = $this->_mManifesto['Theme']['License'];
                $this->mLicence = $this->_mManifesto['Theme']['License'];
            } elseif (isset($this->_mManifesto['Theme']['Licence'])) { // For typo
                $this->mLicense = $this->_mManifesto['Theme']['Licence'];
                $this->mLicence = $this->_mManifesto['Theme']['Licence'];
            }

            return true;
        }

        return false;
    }
}

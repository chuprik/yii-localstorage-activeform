<?php
/**
 * Class LSActiveForm
 *
 * @author Constantin Chuprik <constantinchuprik@gmail.com>
 *
 * @link https://github.com/kotchuprik/yii-localstorage-activeform
 * @link https://github.com/shaneriley/jquery_remember_state
 */
class LSActiveForm extends CActiveForm
{
    const PACKAGE_ID = 'rememberState';

    public $enableSaveToLocalStorage = true;

    /** @var array {@link https://github.com/shaneriley/jquery_remember_state#options} */
    public $options = array();

    private $_package = array();

    public function init()
    {
        parent::init();

        if ($this->enableSaveToLocalStorage) {
            $this->_registerClientScript();
        }
    }

    protected function _registerClientScript()
    {
        $this->_fillPackage();

        Yii::app()->getClientScript()->registerPackage(self::PACKAGE_ID);
        Yii::app()->getClientScript()->registerScript($this->id,
                '$(\'#' . $this->id . '\').rememberState(' . CJSON::encode($this->options) . ');');
    }

    protected function _fillPackage()
    {
        $this->_package = array(
            'baseUrl' => $this->_getAssetsUrl(),
            'js' => array('js/jquery.remember-state.js'),
            'depends' => array('jquery'),
        );

        Yii::app()->getClientScript()->addPackage(self::PACKAGE_ID, $this->_package);
    }

    protected function _getAssetsUrl()
    {
        return Yii::app()->getAssetManager()->publish(dirname(__FILE__) . '/assets');
    }
}

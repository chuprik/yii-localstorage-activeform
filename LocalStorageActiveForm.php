<?php

/**
 * Class LocalStorageActiveForm
 *
 * @author Constantin Chuprik <constantinchuprik@gmail.com>
 *
 * @link https://github.com/kotchuprik/yii-localstorage-activeform
 * @link https://github.com/shaneriley/jquery_remember_state
 */
class LocalStorageActiveForm extends CActiveForm
{
    const PACKAGE_ID = 'rememberState';

    public $enableSaveToLocalStorage = true;

    /** @var array {@link https://github.com/shaneriley/jquery_remember_state#options} */
    public $options = array();

    private $package = array();

    public function init()
    {
        parent::init();

        if ($this->enableSaveToLocalStorage) {
            $this->registerClientScript();
        }
    }

    protected function registerClientScript()
    {
        $this->package = array(
            'baseUrl' => Yii::app()->getAssetManager()->publish(__DIR__ . '/assets'),
            'js' => array('js/jquery.remember-state.pack.js'),
            'depends' => array('jquery'),
        );

        if (!empty($this->options)) {
            $initScript = '$(\'#' . $this->id . '\').rememberState(' . CJSON::encode($this->options) . ');';
        } else {
            $initScript = '$(\'#' . $this->id . '\').rememberState();';
        }

        Yii::app()->getClientScript()->addPackage(self::PACKAGE_ID, $this->package);
        Yii::app()->getClientScript()->registerPackage(self::PACKAGE_ID);
        Yii::app()->getClientScript()->registerScript($this->id, $initScript);
    }
}

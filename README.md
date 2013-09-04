# yii-localstorage-activeform

`LSActiveForm` is a wrapper for [jquery_remember_state](https://github.com/shaneriley/jquery_remember_state).

## Usage

Call the widget:

```php
<?php $form = $this->beginWidget('ext.yii-localstorage-activeform.LSActiveForm') ?>

<div class="row">
    <?= $form->labelEx($model, 'textAttribute') ?>
    <?= $form->textField($model, 'textAttribute') ?>
    <?= $form->error($model, 'textAttribute') ?>
</div>
<div class="row">
    <?= $form->labelEx($model, 'textAreaAttribute') ?>
    <?= $form->textArea($model, 'textAreaAttribute') ?>
    <?= $form->error($model, 'textAreaAttribute') ?>
</div>
<div class="row">
    <?= $form->labelEx($model, 'singleCheckBoxAttribute') ?>
    <?= $form->checkBox($model, 'singleCheckBoxAttribute') ?>
    <?= $form->error($model, 'singleCheckBoxAttribute') ?>
</div>
<div class="row">
    <?= $form->labelEx($model, 'checkBoxListAttribute') ?>
    <?= $form->checkBoxList($model, 'checkBoxListAttribute', array(
        'firstValue' => 'firstTitle',
        'secondValue' => 'secondTitle',
    )) ?>
    <?= $form->error($model, 'checkBoxListAttribute') ?>
</div>
<div class="row">
    <?= $form->labelEx($model, 'radioButtonListAttribute') ?>
    <?= $form->radioButtonList($model, 'radioButtonListAttribute', array(
        'firstValue' => 'firstTitle',
        'secondValue' => 'secondTitle',
    )) ?>
    <?= $form->error($model, 'radioButtonListAttribute') ?>
</div>
<div class="row">
    <?= $form->labelEx($model, 'dropDownListAttribute') ?>
    <?= $form->dropDownList($model, 'dropDownListAttribute', array(
        'firstValue' => 'firstTitle',
        'secondValue' => 'secondTitle',
    )) ?>
    <?= $form->error($model, 'dropDownListAttribute') ?>
</div>

<div class="row"><?= CHtml::submitButton() ?></div>

<?php $this->endWidget() ?>

```

Or call the widget with jquery_remember_state [options](https://github.com/shaneriley/jquery_remember_state#options):

```php

<?php $form = $this->beginWidget('ext.yii-localstorage-activeform.LSActiveForm', array(
    'enableSaveToLocalStorage' => true, // Set false or closure for disable save
    'options' => array(
        'ignore' => array('Model[textAttribute]'),
        'clearOnSubmit' => false,
    ),
)) ?>

<div class="row">
    <?= $form->labelEx($model, 'textAttribute') ?>
    <?= $form->textField($model, 'textAttribute') ?>
    <?= $form->error($model, 'textAttribute') ?>
</div>
<div class="row">
    <?= $form->labelEx($model, 'textAreaAttribute') ?>
    <?= $form->textArea($model, 'textAreaAttribute') ?>
    <?= $form->error($model, 'textAreaAttribute') ?>
</div>
<div class="row">
    <?= $form->labelEx($model, 'singleCheckBoxAttribute') ?>
    <?= $form->checkBox($model, 'singleCheckBoxAttribute') ?>
    <?= $form->error($model, 'singleCheckBoxAttribute') ?>
</div>
<div class="row">
    <?= $form->labelEx($model, 'checkBoxListAttribute') ?>
    <?= $form->checkBoxList($model, 'checkBoxListAttribute', array(
        'firstValue' => 'firstTitle',
        'secondValue' => 'secondTitle',
    )) ?>
    <?= $form->error($model, 'checkBoxListAttribute') ?>
</div>
<div class="row">
    <?= $form->labelEx($model, 'radioButtonListAttribute') ?>
    <?= $form->radioButtonList($model, 'radioButtonListAttribute', array(
        'firstValue' => 'firstTitle',
        'secondValue' => 'secondTitle',
    )) ?>
    <?= $form->error($model, 'radioButtonListAttribute') ?>
</div>
<div class="row">
    <?= $form->labelEx($model, 'dropDownListAttribute') ?>
    <?= $form->dropDownList($model, 'dropDownListAttribute', array(
        'firstValue' => 'firstTitle',
        'secondValue' => 'secondTitle',
    )) ?>
    <?= $form->error($model, 'dropDownListAttribute') ?>
</div>

<div class="row"><?= CHtml::submitButton() ?></div>

<?php $this->endWidget() ?>
```
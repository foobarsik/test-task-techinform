<?php if(Yii::app()->user->hasFlash('registration')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>

<?php else: ?>

<h1>Регистрация нового пользователя </h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'user-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Поля со <span class="required">*</span> обязательны.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'username'); ?>
        <?php echo $form->textField($model,'username'); ?>
        <?php echo $form->error($model,'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'pass'); ?>
        <?php echo $form->passwordField($model,'pass'); ?>
        <?php echo $form->error($model,'pass'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email'); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model,'tel'); ?>
        <?php echo $form->textField($model,'tel'); ?>
        <?php echo $form->error($model,'tel'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model,'address'); ?>
        <?php echo $form->textField($model,'address',array('size'=>50,'maxlength'=>128)); ?>
        <?php echo $form->error($model,'address'); ?>
    </div>

    <?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'Введите код с картинки'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Буквы не чувствительны к регистру.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Регистрация'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php endif; ?>
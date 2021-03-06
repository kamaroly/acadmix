<!--
 * Ajax Crud Administration Form
 * Subjects *
 * InfoWebSphere {@link http://libkal.gr/infowebsphere}
 * @author  Spiros Kabasakalis <kabasakalis@gmail.com>
 * @link http://reverbnation.com/spiroskabasakalis/
 * @copyright Copyright &copy; 2011-2012 Spiros Kabasakalis
 * @since 1.0
 * @ver 1.3
 -->
<?php $data = CHtml::listData(SubjectName::model()->findAll(),'id','name') ?>
<?php $data1 = CHtml::listData(Subjects::model()->findAll(),'name','name') ?>
<div id="subjects_form_con" class="client-val-form" style="width:300px">
    <?php if ($model->isNewRecord) : ?>    <h3 id="create_header">Add New Subject</h3>
    <?php  elseif (!$model->isNewRecord):  ?>    <h3 id="update_header">Update Subject <?php  echo
        $model->id;  ?>  </h3>
    <?php   endif;  ?>
    <?php      $val_error_msg = 'Error.Subjects was not saved.';
    $val_success_message = ($model->isNewRecord) ?
            'Subject was added successfuly.' :
            'Subject  was updated successfuly.';
  ?>

    <div id="success-note" class="notification success png_bg"
         style="display:none;">
        <a href="#" class="close"><img
                src="<?php echo Yii::app()->request->baseUrl.'/js_plugins/ajaxform/images/icons/cross_grey_small.png';  ?>"
                title="Close this notification" alt="close"/></a>
        <div>
            <?php   echo $val_success_message;  ?>        </div>
    </div>

    <div id="error-note" class="notification errorshow png_bg"
         style="display:none;">
        <a href="#" class="close"><img
                src="<?php echo Yii::app()->request->baseUrl.'/js_plugins/ajaxform/images/icons/cross_grey_small.png';  ?>"
                title="Close this notification" alt="close"/></a>
        <div>
            <?php   echo $val_error_msg;  ?>        </div>
    </div>

    <div id="ajax-form"  class='form'>
<?php   $formId='subjects-form';
   $actionUrl =
   ($model->isNewRecord)?CController::createUrl('subject/ajax_create')
                                                                 :CController::createUrl('subject/ajax_update');


    $form=$this->beginWidget('CActiveForm', array(
     'id'=>'subjects-form',
    //  'htmlOptions' => array('enctype' => 'multipart/form-data'),
         'action' => $actionUrl,
    // 'enableAjaxValidation'=>true,
      'enableClientValidation'=>true,
     'focus'=>array($model,'name'),
     'errorMessageCssClass' => 'input-notification-error  error-simple png_bg',
     'clientOptions'=>array('validateOnSubmit'=>true,
                                        'validateOnType'=>false,
                                        'afterValidate'=>'js_afterValidate',
                                        'errorCssClass' => 'err',
                                        'successCssClass' => 'suc',
                                        'afterValidate' => 'js:function(form,data,hasError){ $.js_afterValidate(form,data,hasError);  }',
                                         'errorCssClass' => 'err',
                                        'successCssClass' => 'suc',
                                        'afterValidateAttribute' => 'js:function(form, attribute, data, hasError){
                                                                                                 $.js_afterValidateAttribute(form, attribute, data, hasError);
                                                                                                                            }'
                                                                             ),
));

     ?>
    <?php echo $form->errorSummary($model, '
    <div style="font-weight:bold">Please correct these errors:</div>
    ', NULL, array('class' => 'errorsum notification errorshow png_bg')); ?>    <p class="note">Fields with <span class="required">*</span> are required.</p>


    <div class="row">
            <?php echo $form->labelEx($model,'name'); ?>
            <?php if($model->name==NULL)
			{
				echo $form->dropDownList($model,'name',$data,array('prompt'=>'Select'));
			}
			else
			{   
			    echo $form->dropDownList($model,'name',$data1,array('prompt'=>'Select'));
				echo '<br>New Name';
				echo $form->textField($model,'name');
			} ?>
            <?php //echo $form->textField($model,'name'); ?>
        <span id="success-Subjects_name"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'name'); ?>
    </div>

        

        

        <div class="row">
            <table width="60%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><?php echo $form->checkBox($model,'no_exams');?></td>
                <td><?php echo $form->labelEx($model,'no_exams'); ?></td>
                <td><?php echo $form->error($model,'no_exams'); ?></td>
              </tr>
            </table>
            
    </div>

        <div class="row">
            <?php echo $form->labelEx($model,'max_weekly_classes'); ?>
            <?php echo $form->textField($model,'max_weekly_classes'); ?>
        <span id="success-Subjects_max_weekly_classes"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'max_weekly_classes'); ?>
    </div>

        <div class="row">
            <table width="90%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><?php echo $form->checkBox($model,'elective_group_id'); ?></td>
                <td><?php echo $form->labelEx($model,'Elective Group'); ?></td>
                <td><?php echo $form->error($model,'elective_group_id'); ?></td>
              </tr>
            </table>
 
    </div>

        <div class="row">
            <?php //echo $form->labelEx($model,'is_deleted'); ?>
            <?php echo $form->hiddenField($model,'is_deleted'); ?>
        <span id="success-Subjects_is_deleted"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'is_deleted'); ?>
    </div>

        <div class="row">
            
            <?php  if($model->created_at == NULL)
			  {
				   //echo $form->labelEx($model,'created_at'); 
				   echo $form->hiddenField($model,'created_at',array('value'=>date('d-m-Y')));
				   echo $form->hiddenField($model,'batch_id',array('value'=>$_POST['batch_id']));
			  }
			  else
			  {
				  echo $form->labelEx($model,'updated_at');
				  echo $form->hiddenField($model,'updated_at',array('value'=>date('d-m-Y'))); 
			  }
			  
		  ?>
            
        <span id="success-Subjects_created_at"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
            <?php echo $form->error($model,'created_at'); ?>
    </div>

        
    
    <input type="hidden" name="YII_CSRF_TOKEN"
           value="<?php echo Yii::app()->request->csrfToken; ?>"/>

    <?php  if (!$model->isNewRecord): ?>    <input type="hidden" name="update_id"
           value=" <?php echo $model->id; ?>"/>
    <?php endif; ?>
    <div class="row buttons" style="width:30%">
        <?php   echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save',array('class' =>
        'formbut')); ?>    </div>

  <?php  $this->endWidget(); ?></div>
    <!-- form -->

</div>
<script type="text/javascript">

    //Close button:

    $(".close").click(
            function () {
                $(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
                    $(this).slideUp(600);
                });
                return false;
            }
    );


</script>



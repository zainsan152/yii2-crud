<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Update !</h1>
        
    </div>
   

    <div class="body-content">
    	<?php 
    	$form = ActiveForm::begin(); ?>

        <div class="row">
        	<div class="form-group">
        		<div class="col-lg-6">
        			<?= $form->field($job , 'name');?>
        		</div>
        	</div>
       
           
        </div>
         <div class="row">
        	<div class="form-group">
        		<div class="col-lg-6">
        			<?= $form->field($job , 'role');?>
        		</div>
        	</div>
       
           
        </div>
        <div class="row">
        	<div class="form-group">
        		<div class="col-lg-6">
        			<?= $form->field($job , 'description');?>
        		</div>
        	</div>
       
           
        </div>
        <div class="row">
        	<div class="form-group">
        		<div class="col-lg-6">
        			<div class="col-lg-3">
        				<?= Html::submitButton('Update Data' , ['class'=>'btn btn-primary']);?>
        			</div>
        		</div>
        	</div>
        </div>
        <?php ActiveForm::end() ?>

    </div>
</div>

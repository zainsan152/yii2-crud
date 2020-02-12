<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>View !</h1>
        
    </div>
   

    <div class="body-content">
    	<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
  	<?php echo $job->name; ?>
   
  
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
  <?php echo $job->role; ?>
   
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
  <?php echo $job->description; ?>
  
  </li>
</ul>
    

    </div>
</div>

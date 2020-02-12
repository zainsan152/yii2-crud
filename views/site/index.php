<?php
use yii\helpers\html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <?php if(yii::$app->session->hasFlash('message')): ?>
        <?php echo yii::$app->session->getFlash('message'); ?>
    <?php endif; ?>

    <div class="jumbotron">
        <h1>Congratulations!</h1>
        
    </div>
    <div class="row">
        <span>
            <?= Html::a('Create' , ['/site/create'] , ['class' => 'btn btn-primary'])?>
        </span>
    </div>

    <div class="body-content">

        <div class="row">
            <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Job Role</th>
      <th scope="col">Job Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php if (count($jobs) > 0 ): ?>
        <?php foreach($jobs as $job): ?>
    <tr class="table-active">
      <th scope="row"><?php echo $job->id; ?></th>
      <td><?php echo $job->name; ?></td>
      <td><?php echo $job->role; ?></td>
      <td><?php echo $job->description; ?></td>
      <td>
          <span>
              <?= Html::a('View' , ['view' , 'id'=>$job->id], ['class' => 'label label-primary'])?>
          </span>
          <span>
              <?= Html::a('Update' , ['update' , 'id'=>$job->id], ['class' => 'label label-success'])?>
          </span>
          <span>
              <?= Html::a('Delete' , ['delete' , 'id'=>$job->id], ['class' => 'label label-danger'])?>
          </span>
      </td>
    </tr>
<?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td>No Records found</td>
        </tr>
    <?php endif; ?>
  </tbody>
</table>
           
        </div>

    </div>
</div>

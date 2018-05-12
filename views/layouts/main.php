<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\MainAsset;
use app\widgets\Alert;
use app\widgets\Breadcrumbs;
use app\widgets\Header;
use app\widgets\Sidebar;
use yii\helpers\Html;

MainAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-black-light sidebar-mini layout-boxed"><!-- skin-black-light-->
<?php $this->beginBody() ?>


<div class="wrapper">

    <?= Header::widget() ?>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <?= Sidebar::widget() ?>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 class="text-center">
                <?= $this->title ?>
                <!--                <small>it all starts here</small>-->
            </h1>
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>

        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">


                <?= Alert::widget() ?>


                <div class="box-body" style="padding:20px 20px;">

                    <?= $content ?>

                </div>

            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <?php echo $this->render('control-sidebar') ?>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>


<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>

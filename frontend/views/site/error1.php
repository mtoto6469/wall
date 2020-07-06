<?php
?>
<div>
    <?php if ($category) {?>

        <img class="responsiveImg" src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $category->urlImgOrMovie; ?>"style="width: 100%;height: 300px;">
    <?php
}//end if advertise
else {
    echo 'error';
    exit;
}
            ?>
    </div>

<?php
$session = Yii::$app->session;
if (!$session->isActive) {
    $session->open();
} else {
}
if (isset($_SESSION['error'])) {
    if ($_SESSION['error'] != null) {
        echo '<div class="alert alert-danger  session center-session" id="">' . $_SESSION['error'] . '</div>';
    }
    $_SESSION['error'] = null;
}
?>
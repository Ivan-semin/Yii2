<?php if(!empty($comments)):?>

    <?php foreach($comments as $comment):?>
        <div class="bottom-comment"><!--bottom comment-->
            <div class="comment-text">

                <h5><?= $comment->user->name==''?'Гость':$comment->user->name;?></h5>

                <p class="comment-date">
                    <?= $comment->getDate();?>
                </p>

                <p class="para"><?= $comment->text; ?></p>
            </div>
        </div>
    <?php endforeach;?>

<?php endif;?>
<!-- end bottom comment-->


    <div class="leave-comment"><!--leave comment-->
        <h4>Оставьте свой отзыв</h4>
        <?php if(Yii::$app->session->getFlash('comment')):?>
            <div class="alert alert-success" role="alert">
                <?= Yii::$app->session->getFlash('comment'); ?>
            </div>
        <?php endif;?>
        <?php $form = \yii\widgets\ActiveForm::begin([
            'action'=>['site/comment', 'id'=>$article->id],
            'options'=>['class'=>'form-horizontal contact-form', 'role'=>'form']])?>
        <div class="form-group">
            <div class="col-md-12">
                <?= $form->field($commentForm, 'comment')->textarea(['class'=>'form-control','placeholder'=>'Введите сообщение'])->label(false)?>
            </div>
        </div>
        <button type="submit" class="btn send-btn">Отправить</button>
        <?php \yii\widgets\ActiveForm::end();?>
    </div><!--end leave comment-->

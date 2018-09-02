<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Home';

?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <span>Сортировка по дате: </span>
                <a href="?sort=desc">Новые</a> |
                <a href="?sort=asc">Старые</a>

                <?php foreach ($articles as $article): ?>

                    <article class="post">
                        <div class="post-thumb">
                            <a href="<?php echo Url::toRoute(['site/view', 'id'=>$article->id]); ?>"><img src="<?php echo $article->getImage(); ?>" alt=""></a>
                            <a href="<?php echo Url::toRoute(['site/view', 'id'=>$article->id]); ?>" class="post-thumb-overlay text-center">
                                <div class="text-uppercase text-center">Читать</div>
                            </a>
                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                <h6><a href="<?php echo Url::toRoute(['site/category', 'id'=>$article->category->id]); ?>"><?php echo $article->category->title; ?></a></h6>
                                <h1 class="entry-title"><a href="<?php echo Url::toRoute(['site/view', 'id'=>$article->id]); ?>"><?php echo $article->title; ?></a></h1>
                            </header>
                            <div class="entry-content">
                                <p><?php echo $article->description; ?></p>
                            </div>
                            <div class="social-share">
                                <span class="social-share-title pull-left text-capitalize">
                                    Автор: <b><?php echo $article->author->name; ?></b>
                                    Дата:  <b><?php echo $article->getDate(); ?></b>
                                </span>
                                <ul class="text-center pull-right">
                                    <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a></li><?php echo (int)$article->viewed; ?>
                                </ul>
                            </div>
                        </div>
                    </article>

                <?php endforeach; ?>

                <?php
                    echo LinkPager::widget([
                        'pagination' => $pagination,
                    ]);
                ?>
            </div>

            <?php echo $this->render('/partials/sidebar', [
                'categories' => $categories
            ]); ?>

        </div>
    </div>
</div>
<!-- end main content-->

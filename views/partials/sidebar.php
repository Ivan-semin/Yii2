<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;

?>

<div class="col-md-4" data-sticky_column>
    <div class="primary-sidebar">
        <aside class="widget border pos-padding">
            <h3 class="widget-title text-uppercase text-center">Категории</h3>
            <ul>
                <?php foreach ($categories as $category): ?>
                    <?php if($category->parent == 0) { ?>
                        <li>
                            <a href="<?php echo Url::toRoute(['site/category', 'id'=>$category->id]); ?>"><?php echo $category->title; ?></a>
                            <span class="post-count pull-right"> (<?php echo $category->getArticlesCount(); ?>)</span>
                            <?php foreach ($categories as $categoryChild): ?>
                                <?php if($categoryChild->parent == $category->id) { ?>
                                    <ul>
                                        <li>
                                            <a href="<?php echo Url::toRoute(['site/category', 'id'=>$categoryChild->id]); ?>"><?php echo $categoryChild->title; ?></a>
                                            <span class="post-count pull-right"> (<?php echo $categoryChild->getArticlesCount(); ?>)</span>
                                        </li>
                                    </ul>
                                <?php } ?>
                            <?php endforeach; ?>
                        </li>
                    <?php } ?>

                <?php endforeach; ?>

            </ul>
        </aside>
    </div>
</div>

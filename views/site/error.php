<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="st-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="primary" class="content-area padding-content white-color">
                    <main id="main" class="site-main" role="main">

                        <section class="error-404 not-found text-center">
                            <h1 class="404">404</h1>

                            <p class="lead">Для входа в панель администратора выполните <a href="http://seminimp.beget.tech/auth/login">вход</a></p>

                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-4">
                                    <p class="go-back-home"><a href="/">
                                        Вернуться на главную страницу</a></p>
                                </div>
                            </div>

                        </section><!-- .error-404 -->

                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
        </div>
    </div>
</div>

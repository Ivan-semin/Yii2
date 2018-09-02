<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class PublicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/web/markup/assets/css/bootstrap.min.css',
        '/web/markup/assets/css/font-awesome.min.css',
        '/web/markup/assets/css/animate.min.css',
        '/web/markup/assets/css/owl.carousel.css',
        '/web/markup/assets/css/owl.theme.css',
        '/web/markup/assets/css/owl.transitions.css',
        '/web/markup/assets/css/style.css',
        '/web/markup/assets/css/responsive.css'
    ];
    public $js = [
        '/web/markup/assets/js/jquery-1.11.3.min.js',
        '/web/markup/assets/js/bootstrap.min.js',
        '/web/markup/assets/js/owl.carousel.min.js',
        '/web/markup/assets/js/jquery.stickit.min.js',
        '/web/markup/assets/js/menu.js',
        '/web/markup/assets/js/scripts.js'
    ];
    public $depends = [

    ];
}

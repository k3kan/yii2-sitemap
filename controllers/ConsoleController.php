<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 21.03.2017
 * Time: 10:07
 */

namespace zrk4939\modules\sitemap\controllers;


use domain\modules\content\models\Category;
use domain\modules\content\models\Content;
use domain\modules\content\models\ContentCategory;
use domain\modules\content\models\ContentItem;
use domain\modules\content\models\ContentType;
use zrk4939\modules\sitemap\components\SiteMapComponent;
use zrk4939\modules\sitemap\helpers\SitemapHelper;
use Yii;
use yii\console\Controller;

class ConsoleController extends Controller
{
    public function actionCreate()
    {
        echo "start creating sitemaps...\n";

        /* @var $module \zrk4939\modules\sitemap\Module */
        $module = Yii::$app->getModule('sitemap');
        $savePath = $module->storePath;
        $sitemaps = $module->sitemaps;
        $baseUrl = $module->baseUrl;
        /* @var $component SiteMapComponent */
        $component = Yii::createObject([
            'class' => 'zrk4939\modules\sitemap\components\SiteMapComponent',
            'baseUrl' => $baseUrl,
            'sitemaps' => $sitemaps,

        ]);

        $component->createSiteMap($savePath);

        echo "Done!!\n";
        exit;
    }
}

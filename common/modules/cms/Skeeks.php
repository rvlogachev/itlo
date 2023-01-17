<?php
namespace common\modules\cms;

use common\modules\cms\models\CmsSite;
use common\modules\cms\models\CmsSiteDomain;
use yii\base\Component;
use yii\caching\TagDependency;
use yii\console\Application;
class Skeeks extends Component
{
    /**
     * @var CmsSite
     */
    protected $_site = null;

    /**
     * @var string
     */
    public $siteClass = CmsSite::class;

    /**
     * @var null
     */
    private $_serverName = null;

    /**
     * @return CmsSite
     */
    public function getSite()
    {
        $cmsSiteClass = $this->siteClass;

        if ($this->_site === null) {
            if (\Yii::$app instanceof \yii\console\Application) {

                if ($cms_site_id = getenv("CMS_SITE")) {
                    $this->_site = $cmsSiteClass::find()->active()->andWhere(['id' => $cms_site_id])->one();
                } else {

                    $table = $cmsSiteClass::safeGetTableSchema();
                    if ($table) {
                        if ($table->getColumn('is_default')) {
                            $this->_site = $cmsSiteClass::find()->active()->andWhere(['is_default' => 1])->one();
                        } else {
                            $this->_site = $cmsSiteClass::find()->active()->one();
                        }
                    }
                }


            } else {
                $this->_serverName = \Yii::$app->getRequest()->getServerName();
                $dependencySiteDomain = new TagDependency([
                'tags' => [
                        (new CmsSiteDomain())->getTableCacheTag(),
                    ],
                ]);


                $cmsDomain = CmsSiteDomain::getDb()->cache(function ($db) {
                    return CmsSiteDomain::find()->where(['domain' => $this->_serverName])->one();
                }, null, $dependencySiteDomain);

                /**
                 * @var CmsSiteDomain $cmsDomain
                 */
                if ($cmsDomain) {
                    //$this->_site = $cmsDomain->cmsSite;

                    $this->_site = CmsSiteDomain::getDb()->cache(function ($db) use ($cmsSiteClass, $cmsDomain) {
                        return $cmsSiteClass::find()->andWhere(['id' => $cmsDomain->cms_site_id])->limit(1)->one();
                    },
                        null,
                        new TagDependency([
                            'tags' => [
                                (new $cmsSiteClass())->getTableCacheTag(),
                            ],
                        ])
                    );

                } else {

                    $this->_site = CmsSiteDomain::getDb()->cache(function ($db) use ($cmsSiteClass) {
                        return $cmsSiteClass::find()->active()->andWhere(['is_default' => 1])->one();
                    },
                        null,
                        new TagDependency([
                            'tags' => [
                                (new $cmsSiteClass())->getTableCacheTag(),
                            ],
                        ])
                    );
                }
            }
        }

        if (\Yii::$app instanceof Application) {
            \Yii::$app->urlManager->hostInfo = $this->_site->cmsSiteMainDomain->url;
        }

        return $this->_site;
    }

    /**
     * @param CmsSite $cmsSite
     * @return $this
     */
    public function setSite(CmsSite $cmsSite)
    {
        $this->_site = $cmsSite;
        return $this;
    }
}
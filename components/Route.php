<?php

namespace smart\cms\components;

use yii\base\BootstrapInterface;
use yii\base\Module;
use yii\helpers\ArrayHelper;
use smart\cms\Module as CmsModule;

class Route implements BootstrapInterface
{

    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        $id = $this->getCmsModuleId($app);
        if ($id === null) {
            return;
        }

        $rules = [];
        foreach (require(dirname(__DIR__) . '/config/routes.php') as $key => $rule) {
            $rule['pattern'] = "/$id" . ArrayHelper::getValue($rule, 'pattern', '');
            $rule['route'] = "/$id" . ArrayHelper::getValue($rule, 'route', '');
            // var_dump($rule); die();
            $rules[] = $rule;
        }

        $app->getUrlManager()->addRules($rules);
    }

    /**
     * Get CMS module id
     * @param yii\base\Application $app 
     * @return string|null
     */
    private function getCmsModuleId($app)
    {
        foreach ($app->getModules() as $id => $module) {
            if ($module instanceof Module) {
                $class = $module::className();
            } elseif (is_array($module)) {
                $class = ArrayHelper::getValue($module, 'class');
            } else {
                $class = (string) $module;
            }

            if ($class == CmsModule::className()) {
                return $id;
            }
        }

        return null;
    }

}

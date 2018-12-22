<?php

namespace smart\cms;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\rbac\BaseManager;
use smart\base\BackendModule;
use smart\user\components\User;

class Module extends BackendModule
{

    /**
     * @inheritdoc
     */
    public $layout = 'main';

    /**
     * @var array Config that appling to backend modules
     */
    public $modulesConfig = [];

    /**
     * @var array custom cms (backend) modules config.
     */
    public $customModules = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->checkConfig();
        $this->prepareModules();
        $this->setApplicationSettings();
        $this->checkPasswordChange();

        $this->makeMenu();
    }

    /**
     * @inheritdoc
     */
    public static function moduleName()
    {
        return 'cms';
    }

    /**
     * @inheritdoc
     */
    protected static function getDirname()
    {
        return __DIR__;
    }

    /**
     * Check application configuration
     * @return void
     */
    private function checkConfig()
    {
        //auth manager
        $auth = Yii::$app->getAuthManager();
        if (!($auth instanceof BaseManager)) {
            throw new InvalidConfigException('You should to configure "authManager" application component inherited from ' . BaseManager::className() . ' class.');
        }

        //user application component
        $user = Yii::$app->getUser();
        if (!($user instanceof User)) {
            throw new InvalidConfigException('You should to set "user" application component inherited from ' . User::className() . ' class.');
        }
    }

    /**
     * Change application settings
     * @return void
     */
    private function setApplicationSettings()
    {
        $app = Yii::$app;

        //application home url
        $app->homeUrl = ['/' . $this->id . '/default/index'];

        //original bootstrap theme
        $app->assetManager->bundles['yii\bootstrap\BootstrapAsset']['sourcePath'] = '@bower/bootstrap/dist';

        //error page
        $app->errorHandler->errorAction = '/' . $this->id . '/default/error';

        //login and password change
        $user = Yii::$app->getUser();
        $user->loginUrl = ['/' . $this->id . '/login/index'];
        if ($user->hasProperty('passwordChangeUrl')) {
            $user->passwordChangeUrl = ['' . $this->id . '/user/password/index'];
        }
    }

    /**
     * Check modules, that may be used in CMS
     * @return void
     */
    protected function prepareModules()
    {
        $modules = [];

        //add custom modules
        $modules = array_merge($modules, $this->customModules);

        //add exists modules
        foreach (require(__DIR__ . '/config/modules.php') as $id => $module) {
            if (class_exists($module)) {
                $modules[$id] = array_merge(['class' => $module], ArrayHelper::getValue($this->modulesConfig, $id, []));
            }
        }

        //apply
        $this->modules = $modules;

        //init user module
        if ($this->getModule('user') === null) {
            throw new InvalidConfigException('Module `user` not found.');
        }

        //init other modules to prepare data
        foreach (array_keys($modules) as $name) {
            $this->getModule($name);
        }
    }

    /**
     * Checking if user needs to change password
     * @return void
     */
    private function checkPasswordChange()
    {
        //logout
        $route = '/' . Yii::$app->getRequest()->resolve()[0];
        if ($route == Yii::$app->getUser()->loginUrl[0]) {
            return;
        }

        //guest
        $user = Yii::$app->getUser();
        if ($user->getIsGuest()) {
            return;
        }

        //check
        if ($user->getIdentity()->passwordChange && $user->passwordChangeRequired()) {
            Yii::$app->end();
        }
    }

    /**
     * Building menus
     * @return void
     */
    protected function makeMenu()
    {
        // Base path for routes
        $base = '/' . $this->id;

        // Modules menu
        $modulesMenu = [];
        foreach ($this->modules as $module) {
            if ($module instanceof BackendModule) {
                $module->menu($modulesMenu);
            }
        }

        // Header menu
        $headerMenu = [
            [
                'label' => '<i class="fas fa-globe"></i><span class="d-none d-sm-inline"> ' . Html::encode(Yii::t('cms', 'Site')) . '</span>',
                'encode' => false,
                'url' => '/',
            ],
            $this->getModule('user')->userMenu(),
        ];

        // CMS menus
        Yii::$app->params['menu-modules'] = $this->normalizeItems($modulesMenu);
        Yii::$app->params['menu-header'] = $this->normalizeItems($headerMenu);
    }

    /**
     * Normalize menu items (url route)
     * @param array $items 
     * @return array
     */
    protected function normalizeItems($items)
    {
        //base route
        $base = '/' . $this->id;

        //process items
        foreach ($items as $key => $item) {
            //url
            $route = ArrayHelper::getValue($item, ['url', 0]);
            if ($route !== null) {
                if ($route[0] != '/') {
                    $route = '/' . $route;
                }
                $item['url'][0] = $base . $route;
            }
            //normolize children items
            if (isset($item['items'])) {
                $item['items'] = $this->normalizeItems($item['items']);
            }
            //set normalized item
            $items[$key] = $item;
        }
        return $items;
    }

}

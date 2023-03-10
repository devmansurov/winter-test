<?php
use Pp\Kistochki\Classes\Helper;

$activeItem = BackendMenu::getActiveMainMenuItem();
$mySettings = System\Classes\SettingsManager::instance()->listItems('mysettings');
$navbarMode = Backend\Models\BrandSetting::get('menu_mode', 'inline');
$cities = \Pp\Kistochki\Models\City::all();
$user = BackendAuth::getUser();
$defaultCity = \Pp\Kistochki\Models\Settings::get('defaultCity');
$currentCity = Helper::getUserSettings($user, 'city', $defaultCity);
?>

<nav class="navbar control-toolbar navbar-mode-<?= $navbarMode ?>" id="layout-mainmenu" role="navigation">
    <div class="toolbar-item toolbar-primary">
        <div data-control="toolbar" data-use-native-drag="true">
            <a class="menu-toggle" href="javascript:;">
                <span class="menu-toggle-icon">
                    <i class="icon-bars"></i>
                </span>
                <span class="menu-toggle-title">
                    <?= $activeItem ? e(trans($activeItem->label)) : 'CMS' ?>
                </span>
            </a>

            <ul class="nav mainmenu-nav">
                <?php if(count($cities)): ?>
                <li class="svg-icon-container svg-active-effects" style="padding: 7px 15px;">
                    <select id="currentCity" class="form-control custom-select" onchange="setCurrentCity()">
                        <?php foreach ($cities as $city): ?>
                        <option value="<?=$city->id?>" <?=$city->id == $currentCity ? 'selected' : ''?>><?=$city->title?></option>
                        <?php endforeach; ?>
                    </select>
                </li>
                <?php endif; ?>
                <?php foreach (BackendMenu::listMainMenuItems() as $item): ?>
                    <?php
                        $isActive = BackendMenu::isMainMenuItemActive($item);
                    ?>
                    <li class="<?= $isActive ? 'active' : null ?> svg-icon-container svg-active-effects">
                        <a href="<?= $item->url ?>">
                            <span class="nav-icon">
                                <?php if ($item->iconSvg): ?>
                                    <img
                                        src="<?= Url::asset($item->iconSvg) ?>"
                                        class="svg-icon" loading="lazy" width="30" height="30" />
                                <?php endif ?>

                                <i class="<?= $item->iconSvg ? 'svg-replace' : null ?> <?= $item->icon ?>"></i>
                            </span>
                            <span class="nav-label">
                                <?= e(trans($item->label)) ?>
                            </span>
                        </a>
                        <span
                            class="counter <?= !$item->counter ? 'empty' : null ?>"
                            data-menu-id="<?= e($item->code) ?>"
                            <?php if ($item->counterLabel): ?>
                                title="<?= e(trans($item->counterLabel)) ?>"
                            <?php endif ?>
                        >
                            <?= e($item->counter) ?>
                        </span>
                    </li>
                <?php endforeach ?>

            </ul>
        </div>

    </div>
    <div class="toolbar-item toolbar-item-account">
        <ul class="mainmenu-toolbar">
            <?php foreach (BackendMenu::listQuickActionItems() as $item): ?>
                <li class="mainmenu-quick-action with-tooltip">
                    <a
                        href="<?= $item->url ?>"
                        title="<?= e(trans($item->label)) ?>"
                        <?= Html::attributes($item->attributes) ?>
                    >

                        <?php if ($item->iconSvg): ?>
                            <img
                                src="<?= Url::asset($item->iconSvg) ?>"
                                class="svg-icon" loading="lazy" width="20" height="20" />
                        <?php endif ?>

                        <i class="<?= $item->iconSvg ? 'svg-replace' : null ?> <?= $item->icon ?>"></i>
                    </a>
                </li>
            <?php endforeach ?>

            <li class="mainmenu-account with-tooltip">
                <a
                    href="javascript:;" onclick="$.wn.layout.toggleAccountMenu(this)"
                    title="<?= e(trans('backend::lang.account.signed_in_as', ['full_name' => $this->user->full_name])) ?>">
                    <img
                        src="<?= $this->user->getAvatarThumb(90, ['mode' => 'crop', 'extension' => 'png']) ?>"
                        class="account-avatar" loading="lazy" width="90" height="90" />
                </a>
                <div class="mainmenu-accountmenu">
                    <ul>
                        <?php foreach ($mySettings as $category => $items): ?>
                            <?php foreach ($items as $item): ?>
                                <li>
                                    <a href="<?= $item->url ?>">
                                        <?= e(trans($item->label)) ?>
                                    </a>
                                </li>
                            <?php endforeach ?>
                            <li class="divider"></li>
                        <?php endforeach ?>

                        <li>
                            <a href="<?= Backend::url('backend/auth/signout') ?>">
                                <?php if (\BackendAuth::isImpersonator()): ?>
                                    <?= e(trans('backend::lang.account.stop_impersonating')) ?>
                                <?php else: ?>
                                    <?= e(trans('backend::lang.account.sign_out')) ?>
                                <?php endif; ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
<script>
function setCurrentCity() {
    const currentCity = document.getElementById("currentCity").value || 0
    $(this).request('onChangeCity', {
        url: "/api/settings/set/city",
        data: {
            value: currentCity
        },
        success: function(data) {
            window.location.reload();
        }
    });
}
</script>

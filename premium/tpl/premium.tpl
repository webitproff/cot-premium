<!-- BEGIN: MAIN -->
<header id="header" class="second uk-background-fixed uk-position-relative">
    <div class="overlay dotted uk-position-absolute">
        <div class="uk-height-1-1 uk-flex uk-flex-center uk-flex-middle">
            <div class="uk-padding">
                <h1 class="uk-h1 text-white uk-text-center">Премиум доступ</h1>
            </div>
        </div>
    </div>
</header>
<div class="uk-card uk-card-default uk-background-full-width">
    <div class="uk-card-body uk-padding-small uk-grid uk-flex uk-flex-middle">
        <div class="uk-width-expand">
            <ul class="uk-breadcrumb">
                <li><a href="/"><i class="fa fa-home"></i></a></li>
                <li><a href="{PHP|cot_url("premium")}">Премиум доступ</a></li>
            </ul>
        </div>
        <div class="uk-width-auto uk-margin-right">
            <!-- IF {PHP.usr.premium} -->
            У вас пакет "{PHP.usr.premium.name}" дейстителен до: <b>{PHP.usr.premium.date}</b>
            <!-- ENDIF -->
        </div>
    </div>
</div>
<div class="uk-margin-medium-top ">
    <p>
        Премиум доступ дает вам возможнось скачать некоторые плагины без оплаты.
    </p>
    <!-- IF {PHP.usr.premium} -->
    <p>
        В этом месяце вы уже скачали {PREMIUM_DOWNLOADS} плагин из {PHP.usr.premium.downloads}.
    </p>
    <div class="uk-alert uk-alert-danger">
        При повышение или продление пакета число уже скаченых продуктов не обнуляется, те. лимит скачиваний будет расширен до лимита пакета.
        На пример: у вас было 5/5 а после повышение будет 5/10.
    </div>
    <!-- ENDIF -->
</div>
<div class="uk-grid uk-margin-medium-top uk-child-width-1-3@m">
    <!-- BEGIN: ROW -->
    <div class="uk-margin-bottom">
        <div>
            <div class="uk-card uk-card-default uk-text-center">
                <div class="uk-card-header">
                    <!-- IF {PREMIUM_ROW_ID} == "advanced" -->
                    <div class="uk-card-badge uk-label">ХИТ</div>
                    <!-- ENDIF -->
                    <h3 class="uk-card-title">{PREMIUM_ROW_NAME}</h3>
                </div>
                <div class="uk-card-body">
                    <p>
                        Кол-во скачиваний: {PREMIUM_ROW_DOWNLOADS}
                    </p>
                    <p>
                        Цена в месяц: {PREMIUM_ROW_PRICE} {PHP.cfg.payments.valuta}
                    </p>
                    <div>
                        <!-- IF {PHP.usr.id} != 0 -->
                        <!-- IF {PHP.usr.premium} -->
                            <!-- IF {PHP.usr.premium.id} == {PREMIUM_ROW_ID} -->
                        <a href="{PREMIUM_ROW_ID|cot_url("premium", "a=buy&pack=$this")}" class="uk-button uk-button-default">Продлить на месяц</a>
                        <!-- ELSE -->
                        <!-- IF {PHP.usr.premium.downloads} <= {PREMIUM_ROW_DOWNLOADS} -->
                        <a href="{PREMIUM_ROW_ID|cot_url("premium", "a=buy&pack=$this")}" class="uk-button uk-button-default">Повысить пакет</a>
                        <!-- ELSE -->
                        <div class="uk-alert uk-alert-danger uk-margin-remove">не доступен</div>
                        <!-- ENDIF -->
                        <!-- ENDIF -->
                        <!-- ELSE -->
                        <a href="{PREMIUM_ROW_ID|cot_url("premium", "a=buy&pack=$this")}" class="uk-button uk-button-default">Купить</a>
                        <!-- ENDIF -->
                        <!-- ELSE -->
                        <a href="{PREMIUM_ROW_ID|cot_url("login")}" class="uk-button uk-button-default">Купить</a>
                        <!-- ENDIF -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: ROW -->
</div>
<!-- END: MAIN -->
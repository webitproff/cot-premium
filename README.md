# cot-premium
Плагин "Premium" для сборки "Фриланс-Биржа" на CMF Cotonti Siena позволяет организовать премиум доступ к цифровым товарам, то есть к прикрепленным файлам для скачивания.

Поставляется <span style="color: #ff0000;"><strong>«как есть!» (As is!)</strong></span> — без каких либо гарантий и обязательств, — кому для ознакомления, кому пригодится, но без претензий, на свой страх и риск!

По информации из первоисточника:
<blockquote><strong><span style="color: #ff0000;">Внимание! Трубуется плагин marketorders нашей версии (модификации)</span></strong>
<strong><span style="color: #ff0000;">Плагин не будет работать со стандартным плагином marketorders.</span></strong>
Внимание! Плагин пока работает только с магазином, но в скором будущем будет работать и с проектами и другими плагинами и модулями.
Name=Premium Account
Category=Users
Description=Премиум аккаунты с разными пакетами
Version=1.0.1
Date=24.03.2017
Author=PluginsPro Team
Copyright=Copyright (c) PluginsPro Team 2015 - 2017
Notes=BSD License</blockquote>
===

&nbsp;

<a href="http://freelance-script.abuyfile.com/wp-content/uploads/2021/05/cot-premium.png"><img class="aligncenter size-large wp-image-934" src="http://freelance-script.abuyfile.com/wp-content/uploads/2021/05/cot-premium-1024x482.png" alt="" width="640" height="301" /></a>
Установка:

Залейте файлы в папку с плагина (plugins)
Зайдите в админ-&gt;разширения-&gt;premium и нажмите установить.

Теги:

В market.add.tpl чтоб можно было скачать {PRDADD_FORM_PREMIUM}
market.edit.tpl {PRDEDIT_FORM_PREMIUM}
market.tpl {PRD_PREMIUM} чтоб проверить если товар для премиума
посмотреть сколько скачиваний осталось {PHP|getDownloads()}

Пример:

Вывод сообщения что продукт для премиум доступа и сколько может скачать.
<pre class="EnlighterJSRAW" data-enlighter-language="generic">&lt;!-- IF {PRD_COST} &gt; 0 --&gt;
    &lt;small&gt;Цена: &lt;/small&gt; {PRD_COST} руб.
&lt;!-- ELSE --&gt;
    &lt;!-- IF {PRD_PREMIUM} --&gt;
        &lt;span class="uk-text-warning"&gt;Премиум&lt;/span&gt;
    &lt;!-- ELSE --&gt;
        Бесплатно
    &lt;!-- ENDIF --&gt;
&lt;!-- ENDIF --&gt;</pre>
&nbsp;

Кнопка купить/скачать (если цена выше 0 показываем скачать, если для про и есть скачивания то качаем, если нету скачиваний то предлагаем купить премиум)
<pre class="EnlighterJSRAW" data-enlighter-language="generic">&lt;!-- IF {PRD_COST} &gt; 0 --&gt;
    &lt;form action="{PRD_CART}" class="uk-display-inline-block" data-addtocart="true"&gt;
        &lt;button type="submit" class="uk-button uk-button-transparent" title="Добавить в корзину" data-uk-tooltip&gt;&lt;i class="fa fa-shopping-cart"&gt;&lt;/i&gt; Купить&lt;/button&gt;
    &lt;/form&gt;
&lt;!-- ELSE --&gt;
    &lt;!-- IF  {PRD_PREMIUM} --&gt;
        &lt;!-- IF  {PHP.usr.premium}  AND {PHP.usr.id} --&gt;
            &lt;!-- IF {PHP|getDownloads()} --&gt;
                &lt;a href='{PRD_ID|cot_url('index.php', 'r=marketorders&amp;m=getfile&amp;prd=$this')}' class="uk-button uk-button-transparent" title="Скачать" data-uk-tooltip&gt;
                    &lt;i class="fa fa-download"&gt;&lt;/i&gt; Скачать
                &lt;/a&gt;
            &lt;!-- ELSE --&gt;
                &lt;a href='{PRD_ID|cot_url('premium')}' class="uk-button uk-button-transparent"&gt;
                    &lt;i class="fa fa-refresh"&gt;&lt;/i&gt; Купить
                &lt;/a&gt;
            &lt;!-- ENDIF --&gt;
        &lt;!-- ELSE --&gt;
            &lt;a href='{PRD_ID|cot_url('premium')}' class="uk-button uk-button-transparent" title="Скачать" data-uk-tooltip&gt;
                &lt;i class="fa fa-download"&gt;&lt;/i&gt; Скачать
            &lt;/a&gt;
        &lt;!-- ENDIF --&gt;
    &lt;!-- ELSE --&gt;
        &lt;a href='{PRD_ID|cot_url('index.php', 'r=marketorders&amp;m=getfile&amp;prd=$this')}' class="uk-button uk-button-transparent" title="Скачать" data-uk-tooltip&gt;
            &lt;i class="fa fa-download"&gt;&lt;/i&gt; Скачать
        &lt;/a&gt;
    &lt;!-- ENDIF --&gt;
&lt;!-- ENDIF --&gt;</pre>
&nbsp;

===

<a href="https://github.com/webitproff/cot-premium" target="_blank" rel="noopener">скачать с github</a>

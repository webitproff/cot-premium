<!-- BEGIN: MAIN -->
<div id="Prem" class="uk-margin-bottom">
    <div data-premium="sett" class="uk-grid uk-child-width-1-4@m" uk-sortable>
        <!-- BEGIN: ROW -->
        <div class="uk-margin-bottom" data-col-id="{ROW_IDX}">
            <div class="uk-card uk-card-default">
                <div class="uk-padding-small">
                    <div>
                        <label>
                            <span class="uk-display-block">Назвние пакета</span>
                            <input type="text" value="{ROW_NAME}" name="item[{ROW_IDX}][name]" class="uk-input">
                        </label>
                        <label>
                            <span class="uk-display-block">Уникальный ID</span>
                            <input type="text" value="{ROW_ID}" name="item[{ROW_IDX}][id]" class="uk-input">
                        </label>
                        <label>
                            <span class="uk-display-block">Кол-во скачиваний</span>
                            <input type="number" value="{ROW_DOWNLOADS}" name="item[{ROW_IDX}][downloads]" class="uk-input">
                        </label>
                        <label>
                            <span class="uk-display-block">Цена за 1 месяц</span>
                            <input type="number" value="{ROW_PRICE}" name="item[{ROW_IDX}][price]" class="uk-input">
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: ROW -->
    </div>
    <a href="#" class="addPack uk-button uk-button-small uk-button-default" data-action="add"><i class="uk-text-large uk-text-bold">+</i></a>
</div>
<div class="prototip">
    <div class="uk-margin-bottom" data-col-id="tmp">
        <div class="uk-card uk-card-default">
            <div class="uk-padding-small">
                <div>
                    <label>
                        <span class="uk-display-block">Назвние пакета</span>
                        <input type="text" value="" name="item[tmp][name]" class="uk-input" disabled="">
                    </label>
                    <label>
                        <span class="uk-display-block">Уникальный ID</span>
                        <input type="text" value="" name="item[tmp][id]" class="uk-input" disabled="">
                    </label>
                    <label>
                        <span class="uk-display-block">Кол-во скачиваний</span>
                        <input type="number" value="" name="item[tmp][downloads]" class="uk-input" disabled="">
                    </label>
                    <label>
                        <span class="uk-display-block">Цена за 1 месяц</span>
                        <input type="number" value="" name="item[tmp][price]" class="uk-input" disabled="">
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="/plugins/premium/assets/js/admin.packets.js"></script>
<!-- END: MAIN -->
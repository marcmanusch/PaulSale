{$paulRabattArray|var_dump}


{if $paulRabattArray.validTill > {$smarty.now|date_format:"y/m/d"}}
    <div class="product--detail-upper block-group">
        <div class="panel has--border">
            <h3 class="panel--title is--underline">{s name="paulSaleTitle"}Rabattaktion:{/s} {$paulSaleVon|date:'DATE_MEDIUM'} - {$paulSaleBis|date:'DATE_MEDIUM'}</h3>
            <div class="panel--body is--wide">Sie erhalten auf diesen Artikel {$paulSalePercent}% Rabatt, sobald Sie diesen in den Warenkorb legen.</div>
        </div>
    </div>
{/if}
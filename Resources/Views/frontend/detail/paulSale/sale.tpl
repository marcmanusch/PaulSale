{assign var='paulNow' value="{$smarty.now|date_format:'Y-m-d'} {$smarty.now|date_format:"%H:%M:%S"}"}

{*
{$paulRabattArray|var_dump}
*}


{if $paulRabattArray[0].validTill > $paulNow}
    <div class="product--detail-upper block-group">
        <div class="panel has--border">
            <h3 class="panel--title is--underline">{s name="paulSaleTitle"}Rabattaktion:{/s} {$paulRabattArray[0].validFrom|date:'DATE_MEDIUM'}
                - {$paulRabattArray[0].validTill|date:'DATE_MEDIUM'}</h3>
            <div class="panel--body is--wide">Sie erhalten auf diesen Artikel <b>{$paulRabattArray[0].salePercentage}%
                    Rabatt</b>, sobald Sie diesen in den Warenkorb legen.
            </div>
        </div>
    </div>
{/if}
{extends file="parent:frontend/detail/tabs.tpl"}

{block name="frontend_detail_tabs"}
    {include file="frontend/detail/paulSale/sale.tpl"}
    {$smarty.block.parent}
{/block}
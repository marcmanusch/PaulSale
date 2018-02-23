Ext.define('Shopware.apps.PaulSale.view.list.List', {
    extend: 'Shopware.grid.Panel',
    alias: 'widget.paul-sale-listing-grid',
    region: 'center',
    configure: function () {
        return {
            detailWindow: 'Shopware.apps.PaulSale.view.detail.Window'
        };
    }
});
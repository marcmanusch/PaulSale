Ext.define('Shopware.apps.PaulSale.view.list.Window', {
    extend: 'Shopware.window.Listing',
    alias: 'widget.paul-sale-list-window',
    title: 'FAQ',
    configure: function () {
        return {
            listingGrid: 'Shopware.apps.PaulSale.view.list.List',
            listingStore: 'Shopware.apps.PaulSale.store.Sale'
        };
    }
});
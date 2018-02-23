Ext.define('Shopware.apps.PaulSale.store.Sale', {
    extend: 'Shopware.store.Listing',
    configure: function () {
        return {
            controller: 'PaulSale'
        };
    },
    model: 'Shopware.apps.PaulSale.model.Sale'
});

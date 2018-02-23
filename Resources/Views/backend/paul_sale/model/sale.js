Ext.define('Shopware.apps.PaulSale.model.Answer', {
    extend: 'Shopware.data.Model',
    configure: function () {
        return {
            listing: 'Shopware.apps.PaulSale.view.answer.Listing',
        };
    },
    fields: [
        {name: 'id', type: 'int', useNull: true},
        {name: 'answer', type: 'string', useNull: false},
    ]
});
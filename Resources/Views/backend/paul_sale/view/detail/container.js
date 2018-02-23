Ext.define('Shopware.apps.PaulSale.view.detail.Container', {
    extend: 'Shopware.model.Container',
    padding: 20,
    configure: function () {
        return {
            controller: 'PaulSale',
            associations: ['answers'],
            fieldSets: [
                {
                    fields: {
                        question: undefined,
                        articleId: undefined,
                        customerId: {
                            displayField: 'email'
                        }
                    }
                }
            ]
        };
    }
});
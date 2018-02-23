Ext.define('Shopware.apps.PaulSale', {
    extend: 'Enlight.app.SubApplication',
    name: 'Shopware.apps.PaulSale',
    loadPath: '{url action=load}',
    bulkLoad: true,
    controllers: ['Main'],
    views: [
        'list.Window',
        'list.List',
        'detail.Container',
        'detail.Window',
        'answer.Listing',
    ],
    models: ['Sale'],
    stores: ['Sale'],
    launch: function () {
        return this.getController('Main').mainWindow;
    }
});
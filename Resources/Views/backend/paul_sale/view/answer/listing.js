Ext.define('Shopware.apps.PaulSale.view.answer.Listing', {
    extend: 'Shopware.grid.Panel',
    alias: 'widget.shopware-answer-grid',
    title: 'Answers',
    height: 300,
    configure: function () {
        return {
            actionColumn: false,
            toolbar: false
        }
    }
});
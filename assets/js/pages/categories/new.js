BaseView = require ('../../views/base_view');

module.exports = CategoryNewPage = BaseView.extend({
  initialize: function(options) {
    console.log('Loading the category new page');
    this.constructor.__super__.initialize.apply(this, arguments);
    return this;
  },
});

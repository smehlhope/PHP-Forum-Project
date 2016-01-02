BaseView = require ('../../views/base_view');

module.exports = TopicNewPage = BaseView.extend({
  initialize: function(options) {
    console.log('Loading the Topic new page');
    this.constructor.__super__.initialize.apply(this, arguments);
    return this;
  },
});

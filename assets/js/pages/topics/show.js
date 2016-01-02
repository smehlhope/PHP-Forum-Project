BaseView = require('../../views/base_view');

module.exports = TopicShowPage = BaseView.extend({
  initialize: function(options) {
    console.log('Loading the Topic show page');
    this.constructor.__super__.initialize.apply(this, arguments);
    return this;
  },
});

Backbone = require('backbone');

module.exports = BaseView = Backbone.View.extend({
  initialize: function(options) {
    return this;
  },
  templateAttributes: function() {
    attrs = {
      _model: this.model,
      _view : this,
    }
    return attrs;
  },
  preRender: function() {
    return this.template(this.templateAttributes());
  },
  render: function() {
    this.$el.html(this.preRender());
    this.postRender();
    return this;
  },
  postRender: function() {
    return this;
  }
});

FinishedView = Backbone.View.extend({
    template: $("#finished-template").html(),

    initialize: function(){
        this.model = new Item();
    },

    render: function(){
        var tmpl = _.template(this.template);
        this.$el.html(tmpl());

        return this;
    }
});
CountingView = Backbone.View.extend({
    el : "#learning-static",
    template: $("#static-template").html(),

    initialize: function(){
        this.render();

        this.model.on("change", this.render, this);
    },

    render: function(){
        var tmpl = _.template(this.template);
        this.$el.html(tmpl(this.model.toJSON()));

        return this;
    }
});
ItemView = Backbone.View.extend({
    template      : $("#item-template").html(),
    templateAnswer: $("#item-answer-template").html(),

    render : function(){
        var tmpl = _.template(this.template);
        this.$el.html(tmpl(this.model.toJSON()));

        return this;
    },

    renderAnswer : function(){
        var tmpl = _.template(this.templateAnswer);
        this.$el.html(tmpl(this.model.toJSON()));

        return this;
    }
})
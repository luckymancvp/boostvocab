Item = Backbone.Model.extend({
    defaults: {
        success : 0
    },

    success : function(){
        this.set({ success: 1 });
    },

    reset : function(){
        this.set({ success: 0});
    }
});
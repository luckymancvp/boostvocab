Counting = Backbone.Model.extend({
    defaults: {
        round   : 0,
        remain  : 0,
        success : 0,
        wrong   : 0
    },

    wrong : function(){
        if (this.get("remain") != 0)
            this.set({ wrong : this.get("wrong")  +1 });
    },

    success : function(){
        if (this.get("remain") != 0)
            this.set({ success : this.get("success")  +1 });
    },

    next : function(){
        this.set({ remain  : this.get("remain") -1 });
    }


});
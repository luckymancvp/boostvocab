var UPDATE_STATIC_URL = DATA_URL + "updateStatic";

Items = Backbone.Collection.extend({
    model: Item,

    updateStatic : function(){

        // Send request

        $.ajax({
            url: UPDATE_STATIC_URL,
            data: { data: this.getData() }
        }).done(function() {
        });

        this.resetStatic();
    },

    getData: function(){
        var data = "{";
        this.each(function(item){
            data += item.get("id") + ":" + item.get("success") + ",";
        });

        data += "}";
        return data;
    },

    resetStatic: function(){
        this.each(function(item){
            item.reset();
        });
    }
});
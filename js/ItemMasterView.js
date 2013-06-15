ItemMasterView = Backbone.View.extend({
    el       : "#item-quiz",
    curr     : null,
    learned  : [],
    currSet  : [],
    wrongSet : [],

    counting  : null,
    currRound : 0,

    initialize: function(){
        // Get value
        this.collection = new Items(itemsJSON);
        this.wrongSet    = new Items(this.collection.toJSON());

        this.currRound = 0;

        this.renderNewTurn();
    },

    events: {
        "click .btn-remember"     : "success",
        "click .btn-forgot"       : "wrong",
        "click .btn-answer"       : "answer"
    },

    // get next item
    next : function(){
        // get next index, if it is not finished this turn then render next item
        var nextIndex = this.getNextIndex();
        if (nextIndex != -1)
            this.renderItem(nextIndex);
    },

    // get current model
    curr : function()
    {
        var lastIndex = this.learned[this.learned.length -1 ];
        return this.currSet.at(lastIndex);
    },

    // when success
    success: function() {
        this.counting.success();
        this.curr().success();
        this.next();
    },

    // when wrong
    wrong: function() {
        this.counting.wrong();
        this.wrongSet.add(this.curr());
        this.next();
    },

    // show answer
    answer: function(){
        var lastIndex = this.learned[this.learned.length -1 ];
        this.renderItemAnswer(lastIndex);
    },

    getNextIndex : function(){
        if (this.learned.length == this.currSet.length){
            this.nextTurn();
            return -1;
        }

        do {
            var nextIndex = Math.floor((Math.random()*this.currSet.length));
        }while ($.inArray(nextIndex, this.learned) != -1);

        this.learned.push(nextIndex);
        this.counting.next();
        return nextIndex;
    },

    nextTurn: function(){
        this.currSet.updateStatic();

        if (this.wrongSet.length == 0){
            var finishedView = new FinishedView();
            this.$el.html(finishedView.render().el);

            return;
        }

        this.renderNewTurn();

    },

    renderNewTurn: function(){
        this.currSet  = this.wrongSet;
        this.wrongSet = new Items();
        this.learned  = [];

        // Counting
        this.currRound++;
        this.counting    = new Counting({remain: this.currSet.length, round: this.currRound});
        var countingView = new CountingView({model: this.counting});

        // render first item
        this.next();
    },

    isHaveLearnWord: function(){
        return (this.currSet.length != 0) || (this.wrongSet.length != 0);
    },

    renderItem : function(index){
        var item = this.currSet.at(index);
        var itemView = new ItemView({model: item});
        this.$el.html(itemView.render().el);
    },

    renderItemAnswer : function(index){
        var item = this.currSet.at(index);
        var itemView = new ItemView({model: item});
        this.$el.html(itemView.renderAnswer().el);
    },

    // Control turn
    startOver: function(){
        this.initialize();
    },

    repeat: function(){
        // back to previous turn
        this.currRound--;
        this.wrongSet = this.currSet;
        this.renderNewTurn();
    }
})

masterView = new ItemMasterView();

$(document.documentElement).keydown(function (event) {

    // Enter : 32, Space : 13, w : 87, c: 67

    if (!masterView.isHaveLearnWord()) return true;

    switch (event.keyCode){
        case 39 :
            masterView.success();
            break;
        case 40 :
            masterView.wrong();
            break;
        case 37 :
            masterView.answer();
            break;
        default :
            return true;
    }

    event.preventDefault();
    event.stopPropagation();
    return false;
});

// start over
$(document).ready(function(){
    //start over
    $("#start-over-btn").click(function(){
        masterView.startOver();
    });

    // repeat this turn
    $("#repeat-btn").click(function(){
        masterView.repeat();
    });
});
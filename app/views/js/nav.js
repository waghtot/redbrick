var nav = {
    initiate: function(){

        $('#nav-home').on('click', function(){
            window.location="./";
        });
        
    }

}

var init = function(){
    nav.initiate();
}

init();
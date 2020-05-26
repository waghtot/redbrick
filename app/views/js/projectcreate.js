$( document ).ready(function() {
    $('#step-one').show();
    $('#step-two').hide();
    $('#step-three').hide();
});

var setpro = {
    projectSet:function(){
        $('#btn-step-two').on('click', function(){
            $('#step-one').hide("slide");
            $('#step-two').show("slide");
        });

        $('#btn-step-three').on('click', function(){
            $('#step-two').hide("slide");
            $('#step-three').show("slide");
        });

        $('#btn-back-step-one').on('click', function(){
            $('#step-one').show("slide");
            $('#step-two').hide("slide");
        });

        $('#btn-back-step-two').on('click', function(){
            $('#step-two').show("slide");
            $('#step-three').hide("slide");
        });
    }
}

var init = function(){
    setpro.projectSet();
}

init();

/*
step-one
btn-step-two

step-two
btn-back-step-one
btn-step-two-skip
btn-step-three

step-three
btn-back-step-two
btn-step-three-skip
btn-project-save


*/
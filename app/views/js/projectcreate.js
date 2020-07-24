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

        $('#btn-project-save').on('click', function(){
            setpro.create();
        });

    },

    create:function(){
        var request = {
            projectName: $('#projectName').val(),
            startDate: $('#start-date').val(),
            endDate: $('#end-date').val(),
            clientName: $('#clientName').val(),
            contactPerson: $('#contactPerson').val(),
            email: $('#email').val(),
            phoneHome: $('#phoneHome').val(),
            phoneMobile: $('#phoneMobile').val(),
            Address1: $('#Address1').val(),
            Address2: $('#Address2').val(),
            Address3: $('#Address3').val(),
            Address4: $('#Address4').val(),
            postCode: $('#postCode').val(),
            country: $('#country').val()
        }
        // console.log(request);
        $.ajax({
            type: "POST",
            url: "project/createProject",
            data: JSON.stringify(request),
            dataType: 'json',
        }).done(function(res){
            // console.log($res);
        });
    }
}


var init = function(){
    setpro.projectSet();
}

init();
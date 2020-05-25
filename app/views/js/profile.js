var profile = {
    initiate: function(){
        $('#btn-profile').on('click', function(){
            profile.submitForm();
        });

        $('#btn-profile-update').on('click', function(){
            profile.updateProfile();
        });
    },

    submitForm: function(){

        var cscs = 0; 
        if($("input[type=checkbox][name=cscs]:checked").val()){
            cscs = 1;
        };

        var request = {
            person : {
                titleID:$('#title :selected').val(),
                firstName: $('#firstname').val(),
                lastName: $('#lastname').val(),
                AddressLine3: $('#city').val(),
                postCode: $('#postcode').val(),
                country: $('#country :selected').val(),
                phoneHome: $('#phoneHome').val(),
                phoneMobile: $('#phoneMobile').val(),
                email: $('#email').val()
            },
            profile:{
                about: $('#aboutme').val(),
                skills: { 
                    s1: $('#skills1 :selected').val(),
                    s2: $('#skills2 :selected').val(),
                    s3: $('#skills3 :selected').val(),
                    s4: $('#skills4 :selected').val(),
                },
                document: cscs,
            }
        }

        $.ajax ({
            type: "POST",
            url: "profile/userProfile",
            data: JSON.stringify(request),
            dataType: 'json',
        }).done(function(res){

            switch(res.code)
            {
                case '6000':
                    var iconName = 'success';
                    var titleName = 'Success';
                break;
                default:
                    var iconName = 'error';
                    var titleName = 'Error';
                break;

            }

            Swal.fire({
                icon: iconName,
                title: titleName,
                showCancelButton: false,
                allowOutsideClick: false
            });

        });
    },

    updateProfile: function(){

        var cscs = 0; 
        if($("input[type=checkbox][name=cscs]:checked").val()){
            cscs = 1;
        };

        var request = {
            person : {
                titleID:$('#title :selected').val(),
                firstName: $('#firstname').val(),
                lastName: $('#lastname').val(),
                AddressLine3: $('#city').val(),
                postCode: $('#postcode').val(),
                country: $('#country :selected').val(),
                phoneHome: $('#phoneHome').val(),
                phoneMobile: $('#phoneMobile').val(),
                email: $('#email').val()
            },
            profile:{
                about: $('#aboutme').val(),
                skills: { 
                    s1: $('#skills1 :selected').val(),
                    s2: $('#skills2 :selected').val(),
                    s3: $('#skills3 :selected').val(),
                    s4: $('#skills4 :selected').val(),
                },
                document: cscs,
            }
        }

        $.ajax ({
            type: "POST",
            url: "profile/userProfileUpdate",
            data: JSON.stringify(request),
            dataType: 'json',
        }).done(function(res){

            switch(res.code)
            {
                case '6000':
                    var iconName = 'success';
                    var titleName = 'Success';
                break;
                default:
                    var iconName = 'error';
                    var titleName = 'Error';
                break;

            }
            Swal.fire({
                icon: iconName,
                title: titleName,
                showCancelButton: false,
                allowOutsideClick: false
            });

        });
    }
}

var init = function(){
    profile.initiate();
}

init();
var register = {
    initiate:function(){

        $('#btn-register').on('click', function(e){
            e.preventDefault();
            register.callAction();
        });
    },

    callAction: function (){
        var request = {
            email:$('#email').val(),
            password:$('#password').val()
        }

        if(register.checkEmail()!==true){
            return false;
        }

        if(register.checkPassword()!==true){
            return false;
        }

        $.ajax({
            type: "POST",
            url: "register/registerUser",
            data: JSON.stringify(request),
            dataType: 'json',
        }).done(function(res){
            console.log(res);
            if(res.code !== '6000'){
                switch(res.code){
                    case '6016':
                        register.missconfiguration(res.message);
                    break;                        
                    case '6017':
                        register.userExists(res.message);
                    break;
                }
            }else{
                Swal.fire({
                    icon: 'success',
                    title: 'Your Account has been created',
                    text: 'Please find message from Us in your inbox and confirm your email address.',
                    allowOutsideClick: false
                }).then(function(){
                    window.location="./";
                });
            } 
        });
    },

    checkPassword:function(){
        if($('#password').val() !== $('#rpassword').val()){
            Swal.fire({
                icon: 'warning',
                title: 'Passwords doesn\'t match',
                allowOutsideClick: false
            });
            return false;
        }
        return true;
    },


    checkEmail:function(){
        var a = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if( !a.test( $('#email').val() ) ) {
            Swal.fire({
                icon: 'warning',
                title: 'incorrect Email address',
                allowOutsideClick: false
            });
            return false;
        } else {
            return true;
        }
    },

    userExists:function(e){
        Swal.fire({
            icon: 'warning',
            title: 'User Exists',
            text: e,
            showCancelButton: false,
            allowOutsideClick: false
        });
    },

    missconfiguration:function(){
        Swal.fire({
            icon: 'error',
            title: 'Missing or incorrec data',
            text: 'Please check if all information are correct. It\'s look like something missing.',
            showCancelButton: false,
            allowOutsideClick: false
        });
    }

}

var init = function(){
    register.initiate();
}

init();
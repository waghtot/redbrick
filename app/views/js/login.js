var response = 0;

var loguser ={
    login: function()
    {
        $('#btn-login').on('click', function(){
            loguser.callAction();
        });
        $('#reminder').on('click', function(){
            loguser.sendReminder();
        });

        $('#btn-reset').on('click', function(){
            loguser.setNewPassword();
        });

        $('#npassword').blur(function()
        {
            loguser.checkLength();
        });

        $('#rnpassword').blur(function()
        {
            loguser.passwordMatch();
        });

        $('#register').on('click', function(){
            window.location="/register";
        });

    },

    callAction: function(){

        var request = {
            email:$('#email').val(),
            password:$('#password').val(),
        }

        $.ajax ({
            type: "POST",
            url: "login/loginUser",
            data: JSON.stringify(request),
            dataType: 'json',
        }).done(function(res){

            if(res.code !== '6000'){
                switch(res.code)
                {
                    case '6001':
                        Swal.fire('Info', 'Account doesn\'t exists. If you want join us, go to the registration and applay for your account', 'info');
                    break;

                    case '6002':
                        Swal.fire('warning', 'Incorrect Username or passwrod. Please, verify your email or password and try again.', 'warning');
                    break;
                    default:
                        Swal.fire('info', 'Something went wrong. We are not able to process this operation. Please, try again later.', 'info');
                    break;
                }
            }else{
                if(res.UserStatus){

                    switch(res.UserStatus)
                    {
                        case '1':
                            Swal.fire('info', 'This account is still waiting for verification', 'info').then(function(){
                                window.location="./";
                            });
                        break;
                        case '2':
                            Swal.fire('info', 'Please verify your email address. We sent you email asking for email confirmation. Please check your spam folder.', 'info').then(function(){
                                window.location="./";
                            });
                        break;
                        case '3':
                            window.location="./home";
                        break;
                        case '4':
                            Swal.fire('warning', 'Your account has been suspended. Please contact us for more details.', 'warning').then(function(){
                                window.location="./";
                            });
                        break;
                        case '5':
                            Swal.fire('warning', 'Account has been blocked. Contact customer service for more information.', 'warning').then(function(){
                                window.location="./";
                            });
                        break;
                        case '6':
                            Swal.fire('error', 'This account has been closed.', 'error').then(function(){
                                window.location="./";
                            });
                        break;
                    }
                }
            }
        });
    },

    sendReminder: function(){

        const inputValue = $('#email').val();
        
        Swal.fire({
            icon: 'warning',
            title: 'Reset Password Request',
            html: 'Type your email and we will send you <br/ >information about reset password.',
            input: 'email',
            inputPlaceholder:'Enter your email address',
            inputValue: inputValue,
            showCancelButton: true,
            allowOutsideClick: false,
            inputValidator: (value) => {
                if (!value) {
                    return 'Type in your email address'
                }
                if(loguser.validate(value) == false){
                    return 'invalid email address';
                }
            }
        });
        
        $('.swal2-confirm').on('click', function(){
            loguser.resetPassworRequest($('.swal2-input').val());
        });

    },

    resetPassworRequest: function(e){
        const email = e;
        var request = {
            email:e
        }
        $.ajax({
            type: "POST",
            url: "login/resetPasswordRequest",
            data: JSON.stringify(request),
            dataType: 'json',
        }).done(function(res){

            switch(res.UserStatus)
            {

                case '1':
                    loguser.activateAccount();
                break;

                case '2':
                    loguser.activateAccount();
                break;

                case '3':
                    loguser.resetReady(res.UserId, e);
                break;

                case '4':
                    loguser.inactiveAccount(res.UserStatus);
                break;

                case '5':
                    loguser.inactiveAccount(res.UserStatus);
                break;

                case '6':
                    loguser.inactiveAccount(res.UserStatus);
                break;

            }

        });
    },

    activateAccount: function(){
        Swal.fire({
            icon: 'info',
            title: 'Eamil Verification Needed',
            text: 'Your email adres wasn\'t verified yet. Please find in your inbox message from us with \'email verification\' step.',
            showCancelButton: false,
            allowOutsideClick: false
        });
    },

    resetReady: function(res, e){
        var request ={
            action:'Reset Password',
            userId:res,
            email:e
        }

        $.ajax({
            type: "POST",
            url: "login/resetPassword",
            data: JSON.stringify(request),
            dataType: 'json',
        }).done(function(res){

            if(res.code == '6000'){
                Swal.fire({
                    html: res.html,
                    allowOutsideClick: false,
                    showConfirmButton: false
                }).then(function(){
                    Swal.fire({
                        title: 'Reset Password Request',
                        html: '<p>Check your inbox now.</p><p>'+e+'</p><p>You should received email with instructions</p>',
                        showCancelButton: false,
                    });
                });
            }
        });
    },

    inactiveAccount: function(e){

        switch(e)
        {
            case '4':
                Swal.fire({
                    icon: 'warning',
                    title: 'Account suspended',
                    text: 'Your account has been suspended. Reset password action is available only for active accounts',
                    showCancelButton: false,
                    allowOutsideClick: false
                });
            break;
            case '5':
                Swal.fire({
                    icon: 'warning',
                    title: 'Account Blocked',
                    text: 'Your account has been blocked. Reset password action is available only for active accounts',
                    showCancelButton: false,
                    allowOutsideClick: false
                });
            break;
            case '6':
                Swal.fire({
                    icon: 'error',
                    title: 'Account Deleted',
                    text: 'Your account has been deleted. Reset password action is available only for active accounts',
                    showCancelButton: false,
                    allowOutsideClick: false
                });
            break;
        }
    },

    validate: function(e){

        var a = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if( !a.test( e ) ) {
            return false;
        } else {
            return true;
        }
    },

    setNewPassword: function(){
        
        var request = {
            newpass:$('#npassword').val()
        }

        $.ajax({
            type: "POST",
            url: "Resetpassword/setNewPassword",
            data: JSON.stringify(request),
            dataType: 'json',
        }).done(function(res){
            if(res.code !== '6000'){
                Swal.fire({
                    icon:'error',
                    title:'Error',
                    text:'Your token expired. Refresh your browser and try again'
                }).then(function(){
                   window.location="./";
                });
            }else{
                Swal.fire({
                    icon:'success',
                    title:'Success',
                    text:'Your password has been updated successfully'
                }).then(function(){
                   window.location="./";
                });
            }
        });

    },

    checkLength: function(){
        if($('#npassword').val().length < 8){
            Swal.fire({
                icon:'warning',
                title: 'Warning',
                text:'Password have to be minimum 8 characters long'
            });
        }
    },

    passwordMatch: function(){
        var newpass = $('#npassword').val();
        var renpass = $('#rnpassword').val();
        if(newpass!=renpass){
            Swal.fire({
                icon:'warning',
                title:'Warning',
                text:'Passwords doesn\'t match'
            }).then(function(){
                document.getElementById('rnpassword').value = '';
            });
        }
    }

}

var init = function(){
    loguser.login();
}

init();
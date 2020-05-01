var loguser ={
    login:function()
    {
        $('#btn-login').on('click', function(){
            loguser.callAction();
        });
    },

    callAction:function(){

        var request = {
            email:$('#email').val(),
            password:$('#password').val()
        }
        console.log(JSON.stringify(request));

        $.ajax ({
            type: "POST",
            url: "login/loginUser",
            data: JSON.stringify(request),
            dataType: 'json',
        }).done(function(res){
            console.log(res);
            // var response = JSON.parse(res);
            console.log(res.code);
            if(res.code !== '6000'){
                switch(res.code)
                {
                    case '6001':
                        swal('Info', 'Account doesn\'t exists. If you want join us, go to the registration and applay for your account', 'info');
                    break;

                    case '6002':
                        swal('warning', 'Incorrect Username or passwrod. Please, verify your email or password and try again.', 'warning');
                    break;
                    default:
                        swal('info', 'Something went wrong. We are not able to process this operation. Please, try again later.');
                    break;
                }
            }else{
                switch(res.UserStatus)
                {
                    case '1':
                        swal('info', 'This account is still waiting for verification', 'info').then(function(){
                            window.location="./";
                        });
                    break;
                    case '2':
                        swal('info', 'Please verify your email address. We sent you email asking for email confirmation. Please check your spam folder.', 'info').then(function(){
                            window.location="./";
                        });
                    break;
                    case '3':
                        window.location="./";
                    break;
                    case '4':
                        swal('info', 'Your account has been suspended. Please contact us for more details.', 'info').then(function(){
                            window.location="./";
                        });
                    break;
                    case '5':
                        swal('info', 'Account has been blocked. Contact customer service for more information.', 'info').then(function(){
                            window.location="./";
                        });
                    break;
                    case '6':
                        swal('info', 'This account has been closed.', 'info').then(function(){
                            window.location="./";
                        });
                    break;
                }
            }
        });
    }
}

var init = function(){
    loguser.login();
}

init();
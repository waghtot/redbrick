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
    }

}

var init = function(){
    register.initiate();
}

init();
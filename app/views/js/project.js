var editProject=function(e){
    if(e!=0){
        window.location.href='/project/edit?project='+e;
    }
}

var pro = {
    details:function(){
        $('input[type=button]').on('click', function(){
            var request = {
                type:$(this).attr("data-type"),
                value:$(this).attr("data-value")
            }
            // console.log(request);
            switch(request.type)
            {
                case 'projects':
                case 'status':
                    pro.projects(request);
                break;
                case 'create':
                    pro.create();
                break;
            }
        });
    },

    create:function(){
        window.location.href='../project/create';
    },

    projects:function(request){
        $.ajax({
            type: "POST",
            url: "project/getProjectList",
            data: JSON.stringify(request),
            dataType: 'json',
        }).done(function(res){
            document.getElementById('pl').innerHTML=res;
        });
    }
}

var init = function(){
    pro.details();
}

init();
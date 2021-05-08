var editProject=function(e){
    if(e!=0){
        window.location.href='/project/edit/'+e;
    }
}

var loaded = 0;

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

        $('#addtask').on('click', function(){
            pro.projectAddUpdate();
        });

        $('.task').on('click', function(){
            if(loaded!= $(this).attr("data-task-id")){
                loaded = $(this).attr("data-task-id");
                var strl = loaded.length;
                var loc = (location+'').slice(-strl);
                if(loc == loaded)
                {
                    window.location.reload();
                }else{
                    window.location = location + '/' + loaded;
                }

            }else{
                loaded = $(this).attr("data-task-id");

            }
        });
    },

    projectAddUpdate:async function(){
        var startPoint = document.getElementById('mainStart').textContent.trim();
        var endPoint = document.getElementById('mainEnd').textContent.trim();
        
        const { value: formValues } = await Swal.fire({
            title: 'Create New Task',
            html:   '<div class="row">'+
                    '<div class="col">' +
                    '<input id="swal-input1" type="text" class="swal2-input" name="name" placeholder="Project Name">'+
                    '</div>'+
                    '</div>'+
                    '<div class="row">'+
                    '<div class="col">'+
                    '<label class="text-left">Start Date:'+
                    '<input id="swal-input2" type="text" class="swal2-input date1" name="start" placeholder="Start Date"></label>'+
                    '</div>'+
                    '<div class="col">'+
                    '<label class="text-left">End Date:'+
                    '<input id="swal-input3" type="text" class="swal2-input date2" name="end" placeholder="End Date"></label>'+
                    '</div>'+
                    '</div>',
            input: 'checkbox',
            inputValue: 0,
            inputPlaceholder: 'Publish as a job offer',
            focusConfirm: false,
            showCancelButton: true,
            allowOutsideClick: false,
            onOpen: function() {

                $(".date1").datepicker({
                    dateFormat: 'dd/mm/yy',
                    minDate: new Date(startPoint),
                    maxDate: new Date(endPoint)
                });

                $('#swal-input3').datepicker({
                    dateFormat: 'dd/mm/yy',
                    minDate: new Date(startPoint),
                    maxDate: new Date(endPoint)
                });
            }

        });

        if (formValues) {
            var data ={
                project: $('#addtask').attr("data-task-id"),
                taskName: document.getElementById('swal-input1').value,
                startDate: document.getElementById('swal-input2').value.split('/').reverse().join('-'),
                endDate: document.getElementById('swal-input3').value.split('/').reverse().join('-'),
                jobOffer:document.getElementById('swal2-checkbox').value
            }

            $.ajax({
                type: "POST",
                url: "project/createTask",
                data: JSON.stringify(data),
                dataType: 'json',
            }).done(function(res){
                console.log(res);
                    setTimeout(function(){ location.reload(); }, 5000);
                // Swal.fire({
                    
                // });
            });
        }
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
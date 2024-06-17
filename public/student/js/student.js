$(document).ready(function () {
    console.log("ready")
});

$(document).ready(function () {
    console.log("ready")
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/student/index",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'gender', name: 'gender'},
            {data: 'city', name: 'city'},
            {data: 'hobby', name: 'hobby'},
            {data: 'address', name: 'address'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    
    })

});

$(document).on('click', '#submit', function() {
    var table = $('.data-table').DataTable()
    if(valid_name() & validate_email() & validate_number() & valid_gender() & valid_city()
    &valid_hobby() & valid_addres()){
        var id = $("#id").val()
        if(id == ""){
            var url = "/student/store"
        }else{
            var url = "/student/update/" + id;

        }
        $.ajax({
            type: "POST",
            url: url,
            data: $('#student_form').serialize(),
            success: function (response) {
                $('#student_form')[0].reset();
                $('.alert').show();
                $('#succes-alert').text(response.message);
                setTimeout(function() {
                    $('.alert').fadeOut();
                }, 5000);
                $("#submit").html("Save")
                table.ajax.reload()

            }
        });
    }else{
        return false
    }
});
function valid_name(){
    if($("#name").val() == ''){
        $("#span_name").text("This Filed is required.")
        $("#span_name").addClass("error")
        return false;
    }else{
        $("#span_name").text("")
        $("#span_name").removeClass("error")
        return true; 
    }
}

function validate_email(){
    var email = $("#email").val()
    var regx =  /^[a-zA-Z0-9]+@[^\s@]+\.[^\s@]+$/;
    if($("#email").val()==  ''){
        $("#span_email").text("Enter your  email. ")
        $("#span_email").addClass("error")
        return false
    }else if(regx.test(email)){
        $("#span_email").text("")
        return  true
    }else{
        $("#span_email").text("Enter your valid  email. ")
        $("#span_email").addClass("error")
        return false
    }
}
function validate_number(){
    var mobile = $("#phone").val()
    var regx =  /^[0-9]\d{9}$/ ;
    if($("#phone").val() == ''){
        $("#span_phone").text("Enter your phone.")
        $("#span_phone").addClass("error")
        return false
    }else if(regx.test(mobile)){
        // alert("ddddddddddd")
        $("#span_phone").text("")
        return true
    }else{
        $("#span_phone").text("Enter your valid phone.")
        $("#span_phone").addClass("error")
        return false
    }
}

function valid_gender(){
    if($("input[type=radio]:checked").length == 0){
        $("#span_gender").text("Enter your gender.")
        $("#span_gender").addClass("error")
        return false
    }else{
        $("#span_gender").text("")
        $("#span_gender").removeClass("error")
        return true
    }
}

function valid_city(){
    if($("#city").val() == '0'){
        $("#span_city").text("This Filed is required.")
        $("#span_city").addClass("error")
        return false;
    }else{
        $("#span_city").text("")
        $("#span_city").removeClass("error")
        return true; 
    }
}

function valid_hobby(){
    if($("input[type=checkbox]:checked").length==0){
        $("#span_hobby").text("This Filed is required.")
        $("#span_hobby").addClass("error")
        return false;
    }else{
        $("#span_hobby").text("")
        $("#span_hobby").removeClass("error")
        return true; 
    }
}

function valid_addres(){
    if($("#adresss").val() == ''){
        $("#span_adress").text("This Filed is required.")
        $("#span_adress").addClass("error")
        return false;
    }else{
        $("#span_adress").text("")
        $("#span_adress").removeClass("error")
        return true; 
    }
}




$(document).on('click', '#editbtn', function() {
    var id = $(this).attr('data-id');
    $("#submit").html("Update")
    $.ajax({
        type: "GET",
        url: "/student/edit/" + id,
        success: function (response) {
            $("#id").val(response.id)
            $("#name").val(response.name)
            $("#email").val(response.email)
            $("#phone").val(response.phone)
            $("#city").val(response.city)
            $("#adresss").val(response.address)
            var hobby = response.hobby
            var hobby1 = hobby.split(",")
            $("input[name='hobby']").prop('checked', false);
            $("input[name='gender']").prop('checked', false);
            hobby1.forEach(function(hobbyValue) {
                $("input[name='hobby[]'][value='" + hobbyValue + "']").prop('checked', true);
            });
            $("input[name='gender'][value='" + response.gender + "']").prop('checked', true);
        }
    });

})


$(document).on('click', '#resetbtn', function() {
    $("#submit").html("Save")
})

$(document).on('click', '#deletebtn', function() {
    var table = $('.data-table').DataTable()
   var id = $(this).attr("data-id")
   var confrim = confirm("Are you sure want to delete ?")
   if(confrim){
        $.ajax({
            type: "Delete",
            url: "/student/destroy/" + id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $('.alert').show();
                $('#succes-alert').text(response.message);
                setTimeout(function() {
                    $('.alert').fadeOut();
                }, 5000);
                table.ajax.reload()
            }
        });
   }else{
    console.log('loho')
   }
})
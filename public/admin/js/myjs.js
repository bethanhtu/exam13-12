$(document).on('click', '.edituser', function (){
    var array = $(this).attr('array');
    var obj = JSON.parse(array);
    $('#eid').val(obj['id']);
    $('#ename').val(obj['name']);
    $('#eemail').val(obj['email']);
    $('#ephone').val(obj['phone']);
    $("#modalupdate").modal('show');
});
$(document).on('click', '.editproduct', function (){
    var array = $(this).attr('array');
    var obj = JSON.parse(array);
    $('#eid').val(obj['id']);
    $('#ename').val(obj['name']);
    $('#ecategory_id').val(obj['category_id']);
    $('#equantity').val(obj['quantity']);
    $('#eprice').val(obj['price']);
    $('#edescription').val(obj['description']);


    $("#modalupdate").modal('show');
});

// Sử dụng jQuery để ẩn thông báo sau 1 giây
$(document).ready(function(){
    setTimeout(function(){
        $("#successAlert").fadeOut(1000);
    }, 1000);
});

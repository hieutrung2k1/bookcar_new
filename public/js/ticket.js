function clickBtn(id){
    var sortBtn = document.getElementById(id);
    var sortBtns = document.getElementsByClassName('sort-item');
    for(let i=0; i < sortBtns.length; i++){
        sortBtns[i].classList.remove('show-color-btn');
    }
    sortBtn.classList.toggle("show-color-btn");
}
function clickStars(id){
    var starBtn = document.getElementById(id);
    var starBtns = document.getElementsByClassName('btn-rate-item');
    for(let i=0; i < starBtns.length; i++){
        starBtns[i].classList.remove('show-color-star');
    }
    starBtn.classList.toggle("show-color-star");
}
$(document).ready(function(){
    $("#garaName-input").on("keyup", function(){
        var garaNameInput = $(this).val().toLowerCase();
        $("#garaName-checkbox div").filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(garaNameInput) > -1)
        });
    });
    if($('.detail-info').css('display') == 'none'){
        $('.ticket-item').addClass('border-radius border-top');
    }  
    else{     
        $('.ticket-item').removeClass('border-radius');
    }
});

var detail = function(ticketDetailId, orderDetailId){
    $('.ticket-item').removeClass('border-radius');     
    $(ticketDetailId).slideToggle("slow");   
    $(orderDetailId).slideUp("slow"); 
}
var detailOrder = function(ticketDetailId, orderDetailId){
    $('.ticket-item').removeClass('border-radius');  
    $(orderDetailId).slideToggle("slow");
    $(ticketDetailId).slideUp("slow");  
}
var garaNameCheckbox = function(id){
    var garaName = $(id).html();
    $('#garaName-input').val(garaName);
}
var clickSeat = function(quantity,totalPaymentId,seatId,price){
    let x = quantity*price;
    $(totalPaymentId).text(x);
    $(seatId).text(quantity);
}
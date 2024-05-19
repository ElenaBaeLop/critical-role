$("#deleteBtn").click(function(){
    $("#myModal").show();
});

$(".close, #cancelDeleteBtn").click(function(){
    $("#myModal").hide();
});

$("#confirmDeleteBtn").click(function(){
    $("#deleteForm").submit();
    $("#myModal").hide();
});


$("#deleteBtnCampaign").click(function(){
    $("#myModal").show();
});

$(".close, #cancelDeleteBtn").click(function(){
    $("#myModal").hide();
});

$("#confirmDeleteBtn").click(function(){
    $("#deleteFormCampaign").submit();
    $("#myModal").hide();
});

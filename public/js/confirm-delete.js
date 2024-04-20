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

//Chose image
// $(".image-chose-btn").click(function (){
//     $(this).parent().find('.image-importer').click();
// })

// //Display image
// $(".image-importer").change(function (event){
//     if(event.target.files.length > 0) {
//         $(this).parent().parent().find('.image-display').attr("src",URL.createObjectURL(event.target.files[0]));
//     }
// })
// //Reset image
// $(".image-reset-btn").click(function (){
//     $(this).parent().parent().find('.image-display').attr("src",$(this).val());
//     $(this).parent().find('.image-importer').val('');
// })
// //Chose image

$(".image-chose-btn").click(function (){
    $(this).parentsUntil(".middle-image-helper").find('.image-importer').click();
})

//Display image
$(".image-importer").change(function (event){
    if(event.target.files.length > 0) {
        $(this).parentsUntil(".middle-image-helper").find('.image-display').attr("src",URL.createObjectURL(event.target.files[0]));
    }
})
//Reset image
$(".image-reset-btn").click(function (){
    $(this).parentsUntil(".middle-image-helper").find('.image-display').attr("src",$(this).val());
    $(this).parentsUntil(".middle-image-helper").find('.image-importer').val('');
})


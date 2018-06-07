$(document).ready(function(){
    $("#navigation h3").click(function(){
        $("#navigation ul ul").slideUp();
        if (!$(this).next().is(":visible")){
            $(this).next().slideDown();console.log($(this).next().slideDown())
        }
    })
})

/*$(document).ready(function(){

    var navRank1 = $('#navigation h3');

    var navRank2 = $('#navigation ul ul');

    navRank1.click(function(e){

        if(navRank2.css("display", "block")){

            navRank2.css("display", "none");

        }else{

            navRank2.css("display", "block");

        }

    });
});*/

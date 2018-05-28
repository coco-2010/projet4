var Dashboard = {
    elem: null,

    init: function (){
        this.elem = document.getElementById('#navigation');

        document.getElementById('.nav-rank1').addEventListener('click', Dashboard.addRank2, false);
    },

    addRank2: function (){
       /* if (document.getElementById('.nav-rank2').css('display', 'none')){
            document.getElementById('nav-rank2').css('display', 'block');
        }
        else {*/
            document.getElementById('nav-rank2').css('display', 'block');
      /*  }*/
    }
}



$(function (){
    Dashboard.init();
})
/*function ShowHide(EltId) {
    with(document.getElementById(EltId).style) {
     display=(display=="block" || display=="" ) ? "none" : "block";
    }
}*/
$(function(){
//cercle qui suit la souris (le curseur)
    var cercle = $('.cercle');
    function bougeLeCercle(e){
        TweenMax.to(cercle, 0.25, {
            css : {
                top : e.pageY,
                left : e.pageX
            }
        });
    }
    $(window).on('mousemove', bougeLeCercle);
});
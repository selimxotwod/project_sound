'use strict';

$( window ).resize(function() {
    if ($(window).width() > 1280) {
        $("#vague1").attr('src', './assets/img/vague1-big.png');
        $("#vague2").attr('src', './assets/img/vague2-big.png');
        $("#vague3").attr('src', './assets/img/vague3-big.png');
    }else{
        $("#vague1").attr('src', './assets/img/vague1.png');
        $("#vague2").attr('src', './assets/img/vague2.png');
        $("#vague3").attr('src', './assets/img/vague3.png');
    }
});

/*INCREMENT*/

(function($) {
    $.fn.animateNumbers = function(stop, commas, duration, ease) {
        return this.each(function() {
            var $this = $(this);
            var isInput = $this.is('input');
            var start = parseInt(isInput ? $this.val().replace(/,/g, "") : $this.text().replace(/,/g, ""));
            var regex = /(\d)(?=(\d\d\d)+(?!\d))/g;
            commas = commas === undefined ? true : commas;

            // number inputs can't have commas or it blanks out
            if (isInput && $this[0].type === 'number') {
                commas = false;
            }

            $({value: start}).animate({value: stop}, {
                duration: duration === undefined ? 1000 : duration,
                easing: ease === undefined ? "swing" : ease,
                step: function() {
                    isInput ? $this.val(Math.floor(this.value)) : $this.text(Math.floor(this.value));
                    if (commas) {
                        isInput ? $this.val($this.val().replace(regex, "$1,")) : $this.text($this.text().replace(regex, "$1,"));
                    }
                },
                complete: function() {
                    if (parseInt($this.text()) !== stop || parseInt($this.val()) !== stop) {
                        isInput ? $this.val(stop) : $this.text(stop);
                        if (commas) {
                            isInput ? $this.val($this.val().replace(regex, "$1,")) : $this.text($this.text().replace(regex, "$1,"));
                        }
                    }
                }
            });
        });
    };
})(jQuery);


/*AUDIO*/


var port = new buzz.sound("./assets/mp3/ambiance-port.mp3", {
    preload: false,
    autoplay: false,
    loop: true
});
var musique = new buzz.sound("./assets/mp3/musique.mp3", {
    preload: false,
    autoplay: false,
    loop: false,
    volume: 60
});
var ambiance1 = new buzz.sound("./assets/mp3/ambiance-sous-marine.mp3", {
    preload: true,
    autoplay: false,
    loop: true,
    volume: 100
});
var ambiance2 = new buzz.sound("./assets/mp3/remontee-sous-marine.mp3", {
    preload: true,
    autoplay: false,
    loop: true,
    volume: 100
});
var bulles = new buzz.sound("./assets/mp3/bulles-plongee.mp3", {
    preload: true,
    autoplay: false,
    loop: false,
    volume: 100
});
var dauphin = new buzz.sound("./assets/mp3/dauphin.mp3", {
    preload: true,
    autoplay: false,
    loop: false,
    volume: 0
});
var orque = new buzz.sound("./assets/mp3/orque.mp3", {
    preload: true,
    autoplay: false,
    loop: false,
    volume: 10
});
var baleine = new buzz.sound("./assets/mp3/baleine-a-bosse.mp3", {
    preload: true,
    autoplay: false,
    loop: false,
    volume: 80
});
var ambiance3 = new buzz.sound("./assets/mp3/profondeur6.mp3", {
    preload: true,
    autoplay: false,
    loop: true
});
var gresillement = new buzz.sound("./assets/mp3/gresillement.mp3", {
    preload: true,
    autoplay: false,
    loop: true
});
var vent = new buzz.sound("./assets/mp3/wind.mp3", {
    preload: true,
    autoplay: false,
    loop: true,
    volume: 20
});

$('#volume').click(function() {
    $(this).hide();
    $("#no-volume").show();
    console.log('off');
    port.toggleMute();
    musique.toggleMute();
    baleine.toggleMute();
    dauphin.toggleMute();
    ambiance1.toggleMute();
    ambiance2.toggleMute();
    ambiance3.toggleMute();
    vent.toggleMute();
    gresillement.toggleMute();
    orque.toggleMute();
    bulles.toggleMute();
});

$('#no-volume').click(function() {
    $(this).hide();
    $("#volume").show();
    console.log('on');
    port.toggleMute();
    musique.toggleMute();
    baleine.toggleMute();
    dauphin.toggleMute();
    ambiance1.toggleMute();
    ambiance2.toggleMute();
    ambiance3.toggleMute();
    vent.toggleMute();
    gresillement.toggleMute();
    orque.toggleMute();
    bulles.toggleMute();
});

/*DISABLE / ENABLE SCROLL*/

var keys = {37: 1, 38: 1, 39: 1, 40: 1};

function preventDefault(e) {
    e = e || window.event;
    if (e.preventDefault)
        e.preventDefault();
    e.returnValue = false;
}

function preventDefaultForScrollKeys(e) {
    if (keys[e.keyCode]) {
        preventDefault(e);
        return false;
    }
}

function disableScroll() {
    if (window.addEventListener) // older FF
        window.addEventListener('DOMMouseScroll', preventDefault, false);
    window.onwheel = preventDefault; // modern standard
    window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
    window.ontouchmove  = preventDefault; // mobile
    document.onkeydown  = preventDefaultForScrollKeys;
}

function enableScroll() {
    if (window.removeEventListener)
        window.removeEventListener('DOMMouseScroll', preventDefault, false);
    window.onmousewheel = document.onmousewheel = null;
    window.onwheel = null;
    window.ontouchmove = null;
    document.onkeydown = null;
}

/*VIEWPORT*/

;(function( $, window ){

    var $win = $(window)
        , _css = $.fn.css;

    function viewportToPixel( val ) {
        var percent = val.match(/[\d.]+/)[0] / 100,
            unit = val.match(/[vwh]+/)[0];
        return (unit == 'vh' ? $win.height() : $win.width()) * percent +'px';
    }

    function parseProps( props ) {
        var p, prop;
        for ( p in props ) {
            prop = props[ p ];
            if ( /[vwh]$/.test( prop ) ) {
                props[ p ] = viewportToPixel( prop );
            }
        }
        return props;
    }

    $.fn.css = function( props ) {
        var self = this,
            update = function() {
                return _css.call( self, parseProps( $.extend( {}, props ) ) );
            };
        $win.resize( update ).resize();
        return update();
    };

}( jQuery, window ));

var particlesCount = 20;
var inputParticles = $('#particles-count');
var annee2016 = false;
var annee2020 = false;
var annee2030 = false;
var annee2040 = false;
var annee2048 = false;
particlesCount = 0;

$(function() {

    var windowPosition = $(window).scrollTop();
    var plongee = false;
    var up = $('#up');
    var down = $('#down');
    var barre1 = $('#barre1');
    var barre2 = $('#barre2');
    var cercle = $('#cercle');
    var petitCercle = $('#petit-cercle');
    var nav = $('#content');
    var message = false;
    var propos = false;

    /*ARRETE CLIGNOTTE*/

    var arrete = $('#arrete1');

    function clignotter (){
        arrete.fadeOut(10).delay(50).fadeIn(10);
    }

    setInterval(clignotter,300);



    /*CERCLE NAVIGATION*/
    nav.mouseenter(function(){
        petitCercle.animate({
            opacity: 1,
            height: "10",
            width: "10"
        }, 500);
        barre1.animate({opacity: 1}, 500);
        barre2.animate({opacity: 1}, 500);
    });
    nav.mouseleave(function(){
        petitCercle.animate({
            opacity: 0.5,
            height: "5",
            width: "5"
        }, 500);
        barre1.animate({opacity: 0.5}, 500);
        barre2.animate({opacity: 0.5}, 500);
    });



    up.click(function(){
        console.log(up.text());
        /*accueil*/ if (up.text() == '0'){
            $('#particles-js').fadeTo(200, 0);
            console.log('monte vers accueil');
            annee2016 = false;
            plongee = false;
        } /*2016*/ else if(up.text() == '16'){
            if($(window).width() > 769){remontee2016();}
            up.text('');
            up.attr("href", "");
            down.text('20');
            down.attr("href", "#annee2020");
            annee2020 = false;
            annee2016 = true;
            console.log('monte vers 2016');
            particlesCount = 1;
            up.fadeTo(500, 0);
            barre1.height(0);
            inputParticles.val(particlesCount);
            console.log(particlesCount);
            $('#nb-poissons').animateNumbers(0, ' ', 2000);
        } /*2020 */ else if(up.text() == '20'){
            if($(window).width() > 769){remontee2020();}
            up.text('16');
            up.attr("href", "#annee2016");
            down.text('30');
            down.attr("href", "#annee2030");
            annee2016 = false;
            annee2020 = true;
            console.log('descend vers 2020');
            particlesCount = -1;
            inputParticles.val(particlesCount);
            console.log(particlesCount);
            $('#nb-poissons').animateNumbers(154546000000, ' ', 2000);
        } /*2030 */ else if(up.text() == '30') {
            if($(window).width() > 769){remontee2030();}
            up.text('20');
            up.attr("href", "#annee2020");
            down.text('40');
            down.attr("href", "#annee2040");
            annee2040 = false;
            annee2030 = true;
            console.log('monte vers 2030');
            particlesCount = 1;
            inputParticles.val(particlesCount);
            console.log(particlesCount);
            $('#nb-poissons').animateNumbers(2163644000000, ' ', 2000);
        } /*2040 */ else if(up.text() == '40') {
            if($(window).width() > 769){remontee2040();}
            up.text('30');
            up.attr("href", "#annee2030");
            down.text('48');
            down.attr("href", "#annee2048");
            down.fadeTo(500, 1);
            barre2.height(35);
            $('#particles-js').fadeTo(1000, 1);
            annee2048 = false;
            annee2040 = true;
            console.log('monte vers 2040');
            particlesCount = 1;
            inputParticles.val(particlesCount);
            console.log(particlesCount);
            $('#nb-poissons').animateNumbers(3709104000000, ' ', 2000);
        }
    });
    down.click(function(){
        console.log(down.text());
        /*2020*/ if (down.text() == '20'){
            if($(window).width() > 769){profondeur2020();}
            up.text('16');
            up.attr("href", "#annee2016");
            down.text('30');
            down.attr("href", "#annee2030");
            annee2016 = false;
            annee2020 = true;
            console.log('descend vers 2020');
            particlesCount = -1;
            up.fadeTo(500, 1);
            barre1.height(35);
            inputParticles.val(particlesCount);
            console.log(particlesCount);
            $('#nb-poissons').animateNumbers(154546000000, ' ', 2000);
        } /*2030*/ else if(down.text() == '30'){
            if($(window).width() > 769){profondeur2030();}
            up.text('20');
            up.attr("href", "#annee2020");
            down.text('40');
            down.attr("href", "#annee2040");
            annee2030 = true;
            particlesCount = -2;
            console.log('2030');
            $('#nb-poissons').animateNumbers(2163644000000, ' ', 2000);
        } /*2040 */ else if(down.text() == '40'){
            if($(window).width() > 769){profondeur2040();}
            up.text('30');
            up.attr("href", "#annee2030");
            down.text('48');
            down.attr("href", "#annee2048");
            annee2030 = false;
            annee2040 = true;
            console.log('descend vers 2040');
            particlesCount = -1;
            inputParticles.val(particlesCount);
            console.log(particlesCount);
            $('#nb-poissons').animateNumbers(3709104000000, ' ', 2000);
        } /*2048 */ else if(down.text() == '48') {
            if($(window).width() > 769){profondeur2048();}
            up.text('40');
            up.attr("href", "#annee2040");
            down.fadeTo(500, 0);
            barre2.height(0);
            $('#particles-js').fadeTo(1000, 0);
            annee2040 = false;
            annee2048 = true;
            console.log('descend vers 2048');
            particlesCount = -1;
            inputParticles.val(particlesCount);
            console.log(particlesCount);
            $('#nb-poissons').animateNumbers(4945472000000, ' ', 2000);
        }
    });

    var topo = $('#topo');
    var casque = $('#casque');
    var barreScroll = $('#barre-scroll');
    var clickScroll = $('#click-scroll');
    var bateau = $('#bateau');
    var logo = $('#logo-home');

    $(window).load(function(){
        if(windowPosition <= $('#annee2016').offset().top){
            if($(window).width() > 769){port.load().fadeIn( 11000, function(){});}
            $('#particles-js').hide();
            barre1.height(0);
            casque.delay(1000).fadeTo(1000, 1);
            casque.delay(4000).fadeTo(1000, 0);
            logo.delay(8000).fadeTo(1000, 1);
            topo.delay(8200).fadeTo(1000, 1);
            clickScroll.delay(8500).fadeTo(1000, 1);
            barreScroll.delay(9000).animate({height: "8vh"}, 1000);
        }else{
            plongee = true;
            $('#particles-js').fadeTo(1000, 1);
            topo.fadeTo(1000, 1);
            barreScroll.css({height: '8vh'});
            clickScroll.fadeTo(1, 1);
            logo.fadeTo(1, 1);
            bateau.css({'left':'11%'});
        }
        /*ACCUEIL ET 2016*/
        if(windowPosition <= $('#annee2020').offset().top){
            annee2016 = true;
            particlesCount = 0;
            console.log('2016');
            up.text('');
            up.attr("href", "");
            down.text('20');
            down.attr("href", "#annee2020");
            /*2020 */
        }else if(windowPosition > $('#annee2020').offset().top && windowPosition < $('#annee2030').offset().top){
            annee2020 = true;
            particlesCount = -1;
            console.log('2020');
            up.text('16');
            up.attr("href", "#annee2016");
            down.text('30');
            down.attr("href", "#annee2030");
            $('#nb-poissons').animateNumbers(154546000000, ' ', 2000);
            /*2030 */
        }else if(windowPosition > $('#annee2030').offset().top && windowPosition < $('#annee2040').offset().top){
            annee2030 = true;
            particlesCount = -2;
            console.log('2030');
            up.text('20');
            up.attr("href", "#annee2020");
            down.text('40');
            down.attr("href", "#annee2040");
            $('#nb-poissons').animateNumbers(2163644000000, ' ', 2000);
            /*2040 */
        }else if(windowPosition > $('#annee2040').offset().top && windowPosition < $('#annee2048').offset().top){
            annee2040 = true;
            particlesCount = -3;
            console.log('2040');
            up.text('30');
            up.attr("href", "#annee2030");
            down.text('48');
            down.attr("href", "#annee2048");
            $('#nb-poissons').animateNumbers(3709104000000, ' ', 2000);
            /*2048 */
        }else{
            annee2048 = true;
            particlesCount = -4;
            console.log('2048');
            up.text('40');
            up.attr("href", "#annee2040");
            down.fadeTo(500, 0);
            barre2.height(0);
            $('#nb-poissons').animateNumbers(4945472000000, ' ', 2000);
        }
        /*MESSAGE*/if((scroll > $('#message').offset().top - 200) && (message == false)){
            $('#particles-js').hide();
            message = true;
        }else if ((scroll < $('#message').offset().top - 200) && (message == true)){
            $('#particles-js').show();
            message = false;
        }
        inputParticles.val(particlesCount);
        console.log(particlesCount);
    });

    var repeatDauphin;
    var repeatOrque;

    function musiquePlongee(){
        bulles.fadeTo(100, 500);
        setTimeout(function(){bulles.fadeOut(500)}, 1000);
        port.fadeOut(1000, function(){
            port.stop();
        });
        musique.fadeTo(30, 2000, function(){});
        setTimeout(function(){dauphin.play()}, 5000);
        setTimeout(function(){orque.play()}, 10000);
        repeatDauphin = setInterval(function(){dauphin.play()}, 40000);
        repeatOrque = setInterval(function(){orque.play()}, 30000);
        ambiance2.fadeIn(2000);
        ambiance1.fadeIn(2000);
    }

    function musiqueSurface(){
        clearInterval(repeatDauphin);
        clearInterval(repeatOrque);
        musique.fadeOut(1000, function(){
            musique.stop();
        });
        ambiance2.fadeOut(1000, function(){
            ambiance2.stop();
        });
        ambiance1.fadeOut(1000, function(){
            ambiance1.stop();
        });
        port.play().fadeIn(2000);
    }

    function profondeur2020(){
        musique.fadeTo(10, 1000);
        clearInterval(repeatDauphin);
        clearInterval(repeatOrque);
    }
    function remontee2016(){
        musique.fadeTo(30, 1000);
        setTimeout(function(){dauphin.play()}, 5000);
        setTimeout(function(){orque.play()}, 10000);
        repeatDauphin = setInterval(function(){dauphin.play()}, 40000);
        repeatOrque = setInterval(function(){orque.play()}, 30000);
    }

    function profondeur2030(){
        baleine.play();
        setTimeout(function(){baleine.fadeOut(1000);}, 4000);
        musique.fadeTo(0, 1000);
        ambiance3.play().fadeIn(1000);
        ambiance1.fadeOut(1000, function(){
            ambiance2.stop();
        });
    }

    function remontee2020(){
        musique.fadeTo(10, 1000);
        ambiance2.play().fadeIn(1000);
        ambiance3.fadeOut(1000, function(){
            ambiance2.stop();
        });
    }

    function profondeur2040(){
        vent.setVolume(0);
        vent.fadeTo(20, 1000);
    }

    function remontee2030(){
        vent.fadeOut(1000, function(){
            vent.stop();
        });
    }

    function profondeur2048(){
        vent.fadeTo(30, 1000);
        gresillement.setVolume(0);
        gresillement.fadeTo(15, 1000);
    }

    function remontee2040(){
        gresillement.fadeOut(1000);
        vent.fadeTo(20, 1000);
    }

    function profondeurMessage(){
        gresillement.fadeOut(1000);
    }

    function remontee2048(){
        gresillement.fadeTo(30, 1000);
    }

    function profondeurPropos(){
        vent.fadeTo(5, 1000);
    }

    function remonteeMessage(){
        vent.fadeTo(20, 1000);
    }


    $('#click-scroll').click(function(){
        disableScroll();
        if($(window).width() > 769){musiquePlongee();}
        setTimeout(enableScroll, 3000);
        $('#particles-js').delay(3000).fadeTo(3000, 1);
        console.log('descend vers 2016');
        up.text('');
        up.attr("href", "");
        down.text('20');
        down.attr("href", "#annee2020");
    });

    var compteScroll = false;
    $(window).on('wheel', function(e) {
        var delta = e.originalEvent.deltaY;
        var scroll = $(window).scrollTop();
        /*DOWN 2016*/
        if(plongee == false && scroll < $('#annee2016').offset().top && delta > 0){
            if (($(window).scrollTop() >= $('#message').offset().top) && compteScroll == false) {
                compteScroll = true;
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", "index.php?a=down", true);
                xhttp.send();
                console.log('scroll');
            }
            annee2016 = true;
            plongee = true;
            $('#particles-js').hide();
            $('#click-scroll').click();
        }/*DOWN 2020*/else if(annee2016 == true && scroll > $('#annee2020').offset().top && delta > 0){
            if($(window).width() > 769){profondeur2020();}
            annee2016 = false;
            annee2020 = true;
            console.log('descend vers 2020');
            particlesCount = -1;
            inputParticles.val(particlesCount);
            console.log(particlesCount);
            up.text('16');
            up.attr("href", "#annee2016");
            down.text('30');
            up.fadeTo(500, 1);
            barre1.height(35);
            down.attr("href", "#annee2030");
            $('#nb-poissons').animateNumbers(154546000000, ' ', 2000);
        }/*DOWN 2030*/ else if(annee2020 == true && scroll > $('#annee2030').offset().top && delta > 0){
            if($(window).width() > 769){profondeur2030();}
            annee2020 = false;
            annee2030 = true;
            console.log('descend vers 2030');
            particlesCount = -1;
            inputParticles.val(particlesCount);
            console.log(particlesCount);
            up.text('20');
            up.attr("href", "#annee2020");
            down.text('40');
            down.attr("href", "#annee2040");
            $('#nb-poissons').animateNumbers(2163644000000, ' ', 2000);
        }/*DOWN 2040*/ else if(annee2030 == true && scroll > $('#annee2040').offset().top && delta > 0){
            if($(window).width() > 769){profondeur2040();}
            annee2030 = false;
            annee2040 = true;
            console.log('descend vers 2040');
            particlesCount = -1;
            inputParticles.val(particlesCount);
            console.log(particlesCount);
            up.text('30');
            up.attr("href", "#annee2030");
            down.text('48');
            down.attr("href", "#annee2048");
            $('#nb-poissons').animateNumbers(3709104000000, ' ', 2000);
        }/*DOWN 2048*/ else if(annee2040 == true && scroll > $('#annee2048').offset().top && delta > 0){
            if($(window).width() > 769){profondeur2048();}
            $('#particles-js').fadeTo(1000, 0);
            annee2040 = false;
            annee2048 = true;
            console.log('descend vers 2048');
            particlesCount = -1;
            inputParticles.val(particlesCount);
            console.log(particlesCount);
            up.text('40');
            up.attr("href", "#annee2040");
            down.fadeTo(500, 0);
            barre2.height(0);
            $('#nb-poissons').animateNumbers(4945472000000, ' ', 2000);
        }/*DOWN MESSAGE*/ else if(annee2048 == true && (scroll + 400 > $('#message').offset().top) && delta > 0){
            annee2048 = false;
            message = true;
            if($(window).width() > 769){profondeurMessage();}

        }/*DOWN PROPOS*/ else if(message == true && scroll > $('#propos').offset().top && delta > 0){
            message = false;
            propos = true;
            if($(window).width() > 769){profondeurPropos();}

        }/*UP MESSAGE*/ else if((propos == true) && (scroll + 400 <= ($('#propos').offset().top)) && (delta < 0)){
            propos = false;
            message = true;
            if($(window).width() > 769){remonteeMessage();}

        }/*UP 2048*/ else if((message == true) && (scroll <= $('#message').offset().top) && (delta < 0)){
            message = false;
            annee2048 = true;
            if($(window).width() > 769){remontee2048();}

        }/*UP 2040*/ else if((annee2048 == true) && (scroll <= ($('#annee2048').offset().top)) && (delta < 0)){
            if($(window).width() > 769){remontee2040();}
            $('#particles-js').fadeTo(1000, 1);
            annee2048 = false;
            annee2040 = true;
            console.log('monte vers 2040');
            particlesCount = 1;
            inputParticles.val(particlesCount);
            console.log(particlesCount);
            up.text('30');
            up.attr("href", "#annee2030");
            down.text('48');
            down.attr("href", "#annee2048");
            down.fadeTo(500, 1);
            barre2.height(35);
            $('#nb-poissons').animateNumbers(3709104000000, ' ', 2000);
        }/*UP 2030*/ else if(annee2040 == true && scroll <= $('#annee2040').offset().top && delta < 0){
            if($(window).width() > 769){remontee2030();}
            annee2040 = false;
            annee2030 = true;
            console.log('monte vers 2030');
            particlesCount = 1;
            inputParticles.val(particlesCount);
            console.log(particlesCount);
            up.text('20');
            up.attr("href", "#annee2020");
            down.text('40');
            down.attr("href", "#annee2040");
            $('#nb-poissons').animateNumbers(2163644000000, ' ', 2000);
        }/*UP 2020*/ else if(annee2030 == true && scroll <= $('#annee2030').offset().top && delta < 0){
            if($(window).width() > 769){remontee2020();}
            annee2030 = false;
            annee2020 = true;
            console.log('monte vers 2020');
            particlesCount = 1;
            inputParticles.val(particlesCount);
            console.log(particlesCount);
            up.text('16');
            up.attr("href", "#annee2016");
            down.text('30');
            down.attr("href", "#annee2030");
            $('#nb-poissons').animateNumbers(154546000000, ' ', 2000);
        }/*UP 2016*/ else if(annee2020 == true && scroll <= $('#annee2020').offset().top && delta < 0){
            if($(window).width() > 769){remontee2016();}
            annee2020 = false;
            annee2016 = true;
            console.log('monte vers 2016');
            particlesCount = 1;
            inputParticles.val(particlesCount);
            console.log(particlesCount);
            up.fadeTo(500, 0);
            barre1.height(0);
            down.text('20');
            down.attr("href", "#annee2020");
            $('#nb-poissons').animateNumbers(0, ' ', 2000);
        }/*UP ACCUEIL*/ else if(annee2016 == true && scroll < $('#annee2016').offset().top - 400 && delta < 0){
            console.log('Up accueil');
            if($(window).width() > 769){musiqueSurface();}
            $('#particles-js').fadeTo(200, 0);
            $('#particles-js').hide();
            console.log('monte vers accueil');
            annee2016 = false;
            plongee = false;
        }
        /*MESSAGE*/if((scroll > $('#message').offset().top - 200) && (message == false)){
            $('#particles-js').hide();
            message = true;
        }else if ((scroll < $('#message').offset().top - 200) && (message == true)){
            $('#particles-js').show();
            message = false;
        }
    });

    if ($(window).width() > 1280) {
        $("#vague1").attr('src', './assets/img/vague1-big.png');
        $("#vague2").attr('src', './assets/img/vague2-big.png');
        $("#vague3").attr('src', './assets/img/vague3-big.png');
    }else{
        $("#vague1").attr('src', './assets/img/vague1.png');
        $("#vague2").attr('src', './assets/img/vague2.png');
        $("#vague3").attr('src', './assets/img/vague3.png');
    }
});

/*PARTICLE.JS*/

particlesJS('particles-js',

    {
        "particles": {
            "number": {
                "value": 5,
                "density": {
                    "enable": true,
                    "value_area": 100
                }
            },
            "color": {
                "value": "#ecebeb"
            },
            "shape": {
                "type": "image",
                "stroke": {
                    "width": 0,
                    "color": "#000000"
                },
                "polygon": {
                    "nb_sides": 5
                },
                "image": {
                    "src": "./assets/img/poisson.png",
                    "width": 114,
                    "height": 52
                }
            },
            "opacity": {
                "value": 1,
                "random": false,
                "anim": {
                    "enable": false,
                    "speed": 1,
                    "opacity_min": 0.1,
                    "sync": false
                }
            },
            "size": {
                "value": 40,
                "random": true,
                "anim": {
                    "enable": false,
                    "speed": 100,
                    "size_min": 0.1,
                    "sync": false
                }
            },
            "line_linked": {
                "enable": false,
                "distance": 180,
                "color": "#ffffff",
                "opacity": 0.4,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 7,
                "direction": "top-right",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 1200
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "repulse"
                },
                "onclick": {
                    "enable": true,
                    "mode": "remove"
                },
                "resize": true
            },
            "modes": {
                "grab": {
                    "distance": 400,
                    "line_linked": {
                        "opacity": 1
                    }
                },
                "bubble": {
                    "distance": 400,
                    "size": 40,
                    "duration": 2,
                    "opacity": 8,
                    "speed": 3
                },
                "repulse": {
                    "distance": 100
                },
                "push": {
                    "particles_nb": 4
                },
                "remove": {
                    "particles_nb": 5
                }
            }
        },
        "retina_detect": true,
        "config_demo": {
            "hide_card": false,
            "background_color": "#b61924",
            "background_image": "",
            "background_position": "50% 50%",
            "background_repeat": "no-repeat",
            "background_size": "cover"
        }
    }

);



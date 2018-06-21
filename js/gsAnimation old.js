// init controller
var controller = new ScrollMagic.Controller();

// after load start this
$(function () {
        var screenHeight = window.innerHeight;
        var screenWidth = window.innerWidth;
        var circleExplosionAmount = 50;

        /*
        GSAP JS Demo
        https://www.greensock.com/gsap-js/
        Animation and Bezier motion:
        https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js
        */

        var container = $(".intro-animation-container");
        var arrowText = $("#arrow-text");
        var SaturationItemList = [];

        //======================
        //====================== create cicle expolsion divs and settings for animation
        //======================

        // create array list to make the exposlion ciclres from dark to light
        function makeSaturationItem() {
            var q = 20 / circleExplosionAmount;
            for (c = 0; c < circleExplosionAmount; c++) {
                var temp = (c * q) + (Math.random() * 4) + -10;
                console.log(temp)
                SaturationItemList[c] = "hsl(+=0, -=0%, +=" + temp + "%)";
            }
        };

        function makeExposionCircle() {
            for (i = 0; i < circleExplosionAmount; i++) {
                var _item = document.createElement('div');
                $(_item).addClass('circle-explosion');
                $('.circle-exposion-container').append(_item);
            }
        }

        function makeRandomScale(i) {
            return ((Math.random() * 10) / circleExplosionAmount) * (circleExplosionAmount - i + 20) + 1.5;
        };

        var RandomScaleList = [];
        var XposListSpawn = [];
        var XposList = [];
        var YposList = [];

        function makeRandomScaleList() {
            for (i = 0; i < circleExplosionAmount; i++) {
                RandomScaleList[i] = makeRandomScale(i);
            }
            for (i = 0; i < circleExplosionAmount; i++) {
            }
        };

        function makeXposSpawnlist() {
            for (i = 0; i < circleExplosionAmount; i++) {
                XposListSpawn[i] = (Math.random() * 10) - 5
            }
        };

        function makeXposList() {
            for (i = 0; i < circleExplosionAmount; i++) {
                XposList[i] = Math.round((Math.random() * screenWidth) - (screenWidth / 2));
            }
        };

        function makeYposList() {
            for (i = 0; i < circleExplosionAmount; i++) {
                YposList[i] = Math.round(Math.random() * screenHeight - screenHeight / 2);
            }
        };

        makeRandomScaleList();
        makeYposList();
        makeXposSpawnlist();
        makeXposList();
        makeExposionCircle();
        makeSaturationItem();
        //======================
        //====================== random number for single size explosion
        //======================

        function randomLength() {
            return Math.random() * 2
        }

        //======================
        //====================== animation
        //======================

        // make ref
        var circleLeft = $('.left-side .circle'),
            circleRight = $('.right-side .circle'),
            cExplosion = $('.circle-explosion');

        // build a intro
        var
            intro = new TimelineMax(),
            scroll = new TimelineMax({repeat: -1});

        scroll.to(arrowText, 1.3, {
            y: 10,
            ease: Power3.easeIn
        })
            .to(arrowText, 0.3, {
                y: 0,
                ease: Power1.easeOut
            });

        CSSPlugin.suffixMap.WebkitMaskSize = "%";

        intro
            .add("begin", "0")
            .to(arrowText, 1, {
                autoAlpha: 0
            })
            .staggerFrom(circleLeft, 0.5, {
                autoAlpha: 0,
                scale: 1.4,
                ease: Power3.easeIn,
            }, 0.5, "begin")
            .add("collision", "=-0.2")
            .staggerTo(circleLeft, 0.9, {
                ease: Power2.easeOut
            }, 0.5, "begin+=0.5")
            .staggerTo(circleLeft, 2.5, {
                autoAlpha: 0,
                scale: 0.8,
                ease: Power1.easeOut
            }, 0.5, "begin+=0.5")

            //right circle
            .staggerFrom(circleRight, 0.5, {
                autoAlpha: 0,
                scale: 1.4,
                ease: Power3.easeIn
            }, -0.5, "begin")
            .staggerTo(circleRight, 0.9, {
                ease: Power3.easeOut
            }, -0.5, "begin+=0.5")
            .staggerTo(circleRight, 2.5, {
                autoAlpha: 0,
                scale: 0.8,
                ease: Power1.easeOut,
            }, -0.5, "begin+=0.5")

            .staggerTo(cExplosion, 0.001, {
                cycle: {
                    css: [{className: '+=right-circle'}, {className: '+=left-circle'}]
                }
            }, 0.005, "collision+=0.1")

            .staggerFromTo(cExplosion, 0.1, {
                ease: Power3.easeIn,
                autoAlpha: 0,
                scale: 0,
                x: XposListSpawn
            }, {
                autoAlpha: 1,
                scale: 1,
                cycle: {
                    scale: RandomScaleList
                },

            }, 0.05, "collision+=0.5")
            .staggerTo(cExplosion, 8.0, {
                ease: Power3.easeOut,
                cycle: {
                    x: XposList,
                    y: YposList,
                    backgroundColor: SaturationItemList
                }
            }, 0.05, "collision+=0.5")
            .add("after-explosion", "=-3.0")
            // add small pause after explosion
            .to([circleLeft, circleRight], 0.1, {
                autoAlpha: 0,
            }, 7, "after-explosion")
            .to("#tjing-logo", 1, {
                xPercent: 0,
                yPercent: 0,
                left: "5px",
                top: "5px",
                scale: 1
            }, "-=6")
            .to(container, 5, {
                WebkitMaskSize: "100%"
            }, "after-explosion-=1.5")
            .add("logo-scale")
            .to(container, 3, {
                backgroundColor: "#006e73",
            }, "logo-scale-=1")
            .to(container, 2, {
                scale: 0.4,
            }, "logo-scale");

        // build a scene
        var scene = new ScrollMagic.Scene({
            // triggerElement: this,
            // offset: 50,
            duration: "200%",

        })
            .setTween(intro) // trigger a TweenMax.to intro
            .addTo(controller);
    }
);


// $(function () { // wait for document ready
//     // init
//     var controller2 = new ScrollMagic.Controller({
//         globalSceneOptions: {
//             triggerHook: 'onLeave'
//         }
//     });
//
//     // get all slides
//     var slides = document.querySelector(".panel");
//
//     // create scene for every slide
//     for (var i = 0; i < slides.length; i++) {
//         new ScrollMagic.Scene({
//             triggerElement: slides[i]
//         })
//             .setPin(slides[i])
//             .addIndicators() // add indicators (requires plugin)
//             .addTo(controller2);
//     }
// });
// </script>
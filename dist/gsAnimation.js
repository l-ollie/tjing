$(window).on("load",function(){var e=new ScrollMagic.Controller,o=window.innerHeight,a=window.innerWidth,n=50,r=$(".intro-animation-container"),t=$("#arrow-text"),l=[];var s=[],g=[],d=[],u=[];!function(){for(i=0;i<n;i++)s[i]=(e=i,10*Math.random()/n*(n-e+20)+1.5);var e;for(i=0;i<n;i++);}(),function(){for(i=0;i<n;i++)u[i]=Math.round(Math.random()*o-o/2)}(),function(){for(i=0;i<n;i++)g[i]=10*Math.random()-5}(),function(){for(i=0;i<n;i++)d[i]=Math.round(Math.random()*a-a/2)}(),function(){for(i=0;i<n;i++){var e=document.createElement("div");$(e).addClass("circle-explosion"),$(".circle-exposion-container").append(e)}}(),function(){var e=20/n;for(c=0;c<n;c++){var o=c*e+4*Math.random()-10;console.log(o),l[c]="hsl(+=0, -=0%, +="+o+"%)"}}();var f=$(".left-side .circle"),p=$(".right-side .circle"),w=$(".circle-explosion"),h=new TimelineMax;new TimelineMax({repeat:-1}).to(t,1.3,{y:10,ease:Power3.easeIn}).to(t,.3,{y:0,ease:Power1.easeOut}),CSSPlugin.suffixMap.WebkitMaskSize="px",h.add("begin","0").to(t,1,{autoAlpha:0}).staggerFrom(f,.5,{autoAlpha:0,scale:1.4,ease:Power3.easeIn},.5,"begin").add("collision","=-0.2").staggerTo(f,.9,{ease:Power2.easeOut},.5,"begin+=0.5").staggerTo(f,2.5,{autoAlpha:0,scale:.8,ease:Power1.easeOut},.5,"begin+=0.5").staggerFrom(p,.5,{autoAlpha:0,scale:1.4,ease:Power3.easeIn},-.5,"begin").staggerTo(p,.9,{ease:Power3.easeOut},-.5,"begin+=0.5").staggerTo(p,2.5,{autoAlpha:0,scale:.8,ease:Power1.easeOut},-.5,"begin+=0.5").staggerTo(w,.001,{cycle:{css:[{className:"+=right-circle"},{className:"+=left-circle"}]}},.005,"collision+=0.1").staggerFromTo(w,.1,{ease:Power3.easeIn,autoAlpha:0,scale:0,x:g},{autoAlpha:1,scale:1,cycle:{scale:s}},.05,"collision+=0.5").staggerTo(w,8,{ease:Power3.easeOut,cycle:{x:d,y:u,backgroundColor:l}},.05,"collision+=0.5").add("after-explosion","=-3.0").to([f,p],.1,{autoAlpha:0},7,"after-explosion").to("#tjing-logo",1,{xPercent:0,yPercent:0,left:"5px",top:"5px",scale:1},"-=6").to(r,5,{WebkitMaskSize:"100%"},"after-explosion-=1.5").add("logo-scale").to(r,3,{backgroundColor:"#006e73"},"logo-scale-=1").to(r,2,{scale:.4},"logo-scale");new ScrollMagic.Scene({duration:"200%"}).setTween(h).addTo(e)});
/*anime({
  targets: '.redes li ',
  //delay: moveSlide,
  duration: 1000,
  left: ['-1000%' , 0],
  opacity: '1',
  easing: 'easeOutCirc',
}, '-=' + 100);



let tl_aaa = anime.timeline({
  targets: social_btn.querySelector('a img'),
  easing: 'linear',
  scale: 0.7,
  duration: 350,
})*/
var animation = anime.timeline({
  loop: false,
  autoplay: true
});


animation.add({
  //targets: '.superbanner',
  //delay: moveSlide,
  duration: 2000,
  left: ['-101%' , 0],
  /*scale: {
    value: [10 , 1],
    duration: 3000,
    delay: 0,

},*/
  opacity: '1',
  easing: 'easeOutCirc',
});


animation.add({
 // targets: 'header',
  //delay: moveSlide,
  duration: 2000,
  left: ['105%' , 0],
 /* scale: {
    value: [10 , 1],
    duration: 2000,
    delay: 0,

},*/
  opacity: '1',
  easing: 'easeOutQuart',
}, '-=' + 2000);






let social_btns = document.querySelectorAll('.redes li');

social_btns.forEach((social_btn) => {

        social_btn.addEventListener('mouseenter', (event) => {
            anime({
                targets: social_btn.querySelector('a img'),
                scale: {
                    value: 0.8,
                    duration: 70,
                    delay: 0,
                    easing: 'easeInOutQuart'
                },
                
                rotate: {
                    value: 360,
                    //delay: 0,
                    duration: 100,
                    easing: 'easeInOutSine'
                },
                
                delay: 150 // All properties except 'scale' inherit 250ms delay
            });







        //anime.remove(color_btn.querySelector('.arrow'));
             /*let tl_aaa = anime.timeline({
                targets: social_btn.querySelector('a img'),
                easing: 'linear',
                scale: 0.7,
                duration: 350,
              })
              
              tl_aaa.add(scaleMe.play())
              tl_aaa.add(rotateMe.play())*/
            /*async function scaleDown() {
                const hoverAnimation = anime({
                    targets: social_btn.querySelector('a img'),
                   // scale: 0.8, 
                    //duration: 10,
                   // easing: 'linear',
                    //offset: 0,
                }).finished;
                //await Promise.all([hoverAnimation]);
            }
              
              scaleDown().then(() => {
                                        //console.log('First animation finished.');
                                        anime({
                                            targets: social_btn.querySelector('a img'),
                                            //opacity: 0,
                                            //duration: 500,
                                            //easing: 'linear',
                                       
                                        }).finished.then(() => {
                                            anime({
                                                targets: social_btn.querySelector('a img'),
                                                //opacity: 0,
                                                duration: 50,
                                                easing: 'linear',
                                                rotate: '1turn',
                                                offset: -5000,
                                            })
                                            //console.log('Second animation finished.');
                                        });
                                    });*/


                                    /*anime({
                                        targets: social_btn.querySelector('a img'),
                                        scale: 0.8, 
                                        duration: 10,
                                        easing: 'linear',
                                        complete: (anim) => {
                                            anime({
                                               targets: social_btn.querySelector('a img'),
                                               //opacity: 0,
                                               duration: 50,
                                               easing: 'linear',
                                               rotate: '1turn',
                                               offset: 5000, //how many miliseconds before previous animation
                                           })
                                       }
                                    })*/
                                    /*anime({
                                        targets: social_btn.querySelector('a img'),
                                        //opacity: 0,
                                        duration: 50,
                                        easing: 'linear',
                                        rotate: '1turn',
                                        offset: -1000,
                                    })*/
                                    
                                   
                  
        })


        //================================================




        social_btn.addEventListener('mouseleave', (event) => {
            anime({
                targets: social_btn.querySelector('a img'),
                //targets: this.querySelector(),
                easing: 'linear',
                //scale: -0.1, 
                duration: 150,
                scale: 1,
                rotate: 0,
                //rotateX: ['180deg', '0deg'],
                //opacity: [0,10],
                
                //backgroundColor: '#ccc',
            
         
                })
        })
})



//=============================================================
anime({
  targets: '.superbanner li',
  opacity: [0 , 1],
  duration: 1000,
  easing: 'easeInOutSine'
})
anime({
  targets: '.superbanner .cajon.desk',
  scale: [0, '100%'],
  //opacity: [0 , 1],
  delay: 200,
  duration: 700,
 // delay: function(el, i) { return i * 100; },
  elasticity: 200,
  easing: 'easeInOutSine'
})
anime({
  targets: '.superbanner .cajon.desk',
  //scale: [0, '100%'],
  //opacity: [0 , 1],
  minHeight: ['0px' , '150px'],
  delay: 300,
  duration: 1000,
 // delay: function(el, i) { return i * 100; },
  elasticity: 200,
  easing: 'easeInOutSine'
})
anime({
   targets: '.superbanner .cajon.desk',
   //scale: [0, '100%'],
   //opacity: [0 , 1],
   width: ['0%' , '100%'],
   delay: 1200,
   duration: 2000,
  // delay: function(el, i) { return i * 100; },
   elasticity: 200,
   easing: 'easeInOutSine'
 })
anime({
  // targets: '.superbanner h1',
   scale: [0, '800px'],
   opacity: [0 , 1],
   delay: 700,
   duration: 2000,
  // delay: function(el, i) { return i * 100; },
   elasticity: 200,
   easing: 'easeInOutSine'
 })
//=============================================================
//=============================================================
var animation_left = anime({
 // targets: '.fila .cols .col_2:first-child',
  translateX: ['-105%' , 0],
  opacity: [0 , 1],
  duration: 2000,
  delay: function(el, i) { return i * 100; },
  elasticity: 200,
  easing: 'easeInOutSine',
  autoplay: false
});
var animation_right = anime({
 // targets: '.fila .cols .col_2:last-child',
  translateX: ['105%' , 0],
  opacity: [0 , 1],
  duration: 2000,
  delay: function(el, i) { return i * 100; },
  elasticity: 200,
  easing: 'easeInOutSine',
  autoplay: false
});

/*var seekProgressEl = document.querySelector('.seek-anim-demo .progress');
seekProgressEl.oninput = function() {
  animation.seek(animation.duration * (seekProgressEl.value / 100));
};*/

//window.onscroll = function(e){
  //animation_left.seek(window.pageYOffset * 2.35);
  //animation_right.seek(window.pageYOffset * 2.35);
  //console.log(window.pageYOffset);
//}

























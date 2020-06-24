"use strict";
function navbarDiplay() {
    // Initial state
    var scrollPos = 0;
    // adding scroll event
    window.addEventListener('scroll', function(){
    // detects new state and compares it with the new one
    if ((document.body.getBoundingClientRect()).top > scrollPos || (document.body.getBoundingClientRect()).top > -150){
        
            
            if(document.querySelector('.admin-icon')){
                document.querySelector('.admin-icon').style.bottom = "1.5rem";
                document.getElementById('user-interface').style.top = "0",
                document.querySelector('.mobile-nav__btn').style.top = "1.5rem";
            }
            else{
                document.getElementById('user-interface').style.top = "0",
                document.querySelector('.mobile-nav__btn').style.top = "1.5rem";
            }
    }
    else
            
            if(document.querySelector('.admin-icon')){
                document.getElementById('user-interface').style.top = "-7rem",
                document.querySelector('.mobile-nav__btn').style.top = "-7rem";
                document.querySelector('.admin-icon').style.bottom = "1.5rem";
            }
            else{
                document.getElementById('user-interface').style.top = "-7rem",
                document.querySelector('.mobile-nav__btn').style.top = "-7rem";
            }
            
        // saves the new position for iteration.
        scrollPos = (document.body.getBoundingClientRect()).top;
    });

}
window.onload=navbarDiplay;
  







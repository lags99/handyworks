const feather = require('feather-icons/dist/feather');
const AOS = require('aos');


const month = document.querySelector('.month');
const day = document.querySelector('.day');
const year = document.querySelector('.year');
const birth_date = document.querySelector('#birth_date');
const date = document.querySelector('.date');


if(month|| day|| year|| date|| birth_date){
    month.addEventListener('input', changeDate);
day.addEventListener('input', changeDate);
year.addEventListener('input', changeDate);
}


function changeDate() {
    if(!year.value || !month.value || !day.value){
        birth_date.value = '';
    }else{
        birth_date.value = `${year.value}-${month.value}-${day.value}`;
        let split_date = birth_date.value.split('-');
        
        birth_date.value = split_date.map(dateNum => {
            if(dateNum < 10){
                if(dateNum.startsWith(0)){
                    return dateNum;
                }else{
                    return '0'+dateNum;
                }
            }else{
                return dateNum
            }
        }).join('-');
    }
    
}

feather.replace();
$("#thank_you").modal('show');

const side_nav = document.querySelector('.side-navigation');
const nav_list = document.querySelector('#nav_list');
const open_nav = document.querySelector('#menu-btn');
const close_nav = document.querySelector('#close');
const back_btn = document.querySelector('#back');

open_nav.addEventListener('click', (e) => {
    e.preventDefault();
    side_nav.style.display = 'block';
    setTimeout(() => {
        nav_list.classList.add('showSideNav');
    }, 100);
})
close_nav.addEventListener('click', (e) => {
    e.preventDefault();
    
    nav_list.classList.remove('showSideNav')
    setTimeout(() => {
        side_nav.style.display = 'none';
    }, 300);
})

//Back
back_btn.addEventListener('click', (e) => {
    e.preventDefault();
    window.history.back();
});

// Home Page Slider

const slides = document.querySelectorAll('.start__slide');
const controls = document.querySelectorAll('.start__controls__slide');


controls.forEach((control, index) => {
    control.addEventListener('click', (e) => {
        const active_slide = document.querySelector('.active_slide');
        const active_control = document.querySelector('.active_controls');
        
        active_control.classList.remove('active_controls');
        active_slide.classList.remove('active_slide');

        slides[index].classList.add('active_slide');
        controls[index].classList.add('active_controls');
      
    });
});
AOS.init();
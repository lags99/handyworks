const feather = require('feather-icons/dist/feather');


const month = document.querySelector('.month');
const day = document.querySelector('.day');
const year = document.querySelector('.year');
const birth_date = document.querySelector('#birth_date');
const date = document.querySelector('.date');

const day_from = document.querySelector('.day_from');
const day_to = document.querySelector('.day_to');
const start_time = document.querySelector('.start_time');
const end_time = document.querySelector('.end_time');
const from_ampm = document.querySelector('.from_ampm');
const to_ampm = document.querySelector('.to_ampm');
const schedule = document.querySelector('.schedule');
if(day_from|| day_to || start_time|| end_time|| from_ampm|| to_ampm|| schedule){
    
day_from.addEventListener('change', changeSched);
day_to.addEventListener('change', changeSched);
start_time.addEventListener('input', changeSched);
end_time.addEventListener('input', changeSched);
from_ampm.addEventListener('change', changeSched);
to_ampm.addEventListener('change', changeSched);
}

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
function changeSched(){
    if(!day_from.value || !day_to.value || !start_time.value || !end_time.value){
        schedule.value = '';
    }else{
        schedule.value = `${day_from.value}-${day_to.value} ${start_time.value} ${from_ampm.value}-${end_time.value} ${to_ampm.value}`
    }
}

feather.replace();
$("#thank_you").modal('show');
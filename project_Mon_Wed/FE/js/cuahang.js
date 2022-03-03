/*
window.onload = function(){
    slideOne();
    slideTwo();
}

let sliderOne = document.getElementById("slider-1");
let sliderTwo = document.getElementById("slider-2");
let displayValOne = document.getElementById("range1");
let displayValTwo = document.getElementById("range2");
let minGap = 0;
let sliderTrack = document.querySelector(".slider-track");
let sliderMaxValue = document.getElementById("slider-1").max;

function slideOne(){
    if(parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap){
        sliderOne.value = parseInt(sliderTwo.value) - minGap;
    }
    displayValOne.textContent = sliderOne.value + '.000.000' +'đ';
    fillColor();
}
function slideTwo(){
    if(parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap){
        sliderTwo.value = (parseInt(sliderOne.value) + minGap);
    }
    displayValTwo.textContent = sliderTwo.value + '.000.000' + 'đ';
    fillColor();
}
function fillColor(){
    percent1 = (sliderOne.value / sliderMaxValue) * 100;
    percent2 = (sliderTwo.value / sliderMaxValue) * 100;
    sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #666666 ${percent1}% , #666666 ${percent2}%, #dadae5 ${percent2}%)`;
}
// $('.shop-sanpham-page1').innerHTML = document.querySelectorAll('.shop-cuahang-items').length
// $('.shop-tongsanpham').innerHTML = document.querySelectorAll('.shop-cuahang-items').length

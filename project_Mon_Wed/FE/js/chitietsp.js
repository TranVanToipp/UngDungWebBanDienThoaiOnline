/*
const chitiet_box_img = document.querySelector('.chitiet-small-box-img');
chitiet_box_img.classList.add('chitiet-box-img-active');
const img_small = document.querySelectorAll('.chitiet-small-box-img img')
const big_img = document.querySelector('.chitiet-big-img img')
for(let i=0;i<img_small.length;i++) {
    img_small[i].onclick = function() {
    const img_small_active = document.querySelector('.chitiet-small-box-img.chitiet-box-img-active')
    img_small_active.classList.remove('chitiet-box-img-active')
    const a = img_small[i].getAttribute('src')
    big_img.setAttribute('src',a)
    document.querySelectorAll('.chitiet-small-box-img')[i].classList.add('chitiet-box-img-active')
}
}
// Sản phẩm to
let a1=1
document.querySelector('.cong').onclick = function() {
    a1= a1+1
    document.querySelector('.value-quantity').value = a1
}
document.querySelector('.tru').onclick = function() {
    if(a1<2){
        return 
    }else{
        a1= a1-1
        document.querySelector('.value-quantity').value = a1
    }
}


// Sản phẩm nhỏ ở dưới
document.onscroll = function() {
    if(window.pageYOffset > 500) {
        document.querySelector('.chitiet-sanpham-small').classList.add('chitiet-sp-sp-animation')
    }else {
        document.querySelector('.chitiet-sanpham-small').classList.remove('chitiet-sp-sp-animation')
    }
}
let a2=1
document.querySelector('.chitiet-sp-sm-cong').onclick = function() {
a2= a2+1
document.querySelector('.chitiet-sp-sm-value-quantity').value = a2
}
document.querySelector('.chitiet-sp-sm-tru').onclick = function() {
    if(a2<2){
        return 
    }else{
        a2= a2-1
        document.querySelector('.chitiet-sp-sm-value-quantity').value = a2
    }
}
const chitiet_mota = document.querySelector('.chitiet-title-mota')
const chitiet_rate = document.querySelector('.chitiet-title-rate')
const chitiet_mota_body = document.querySelector('.chitiet-mota')
const chitiet_rate_body = document.querySelector('.chitiet-rate')
chitiet_rate.onclick = function() {
    chitiet_rate.classList.add('chitiet-body-active')
    chitiet_mota.classList.remove('chitiet-body-active')
    chitiet_rate_body.classList.add('chitiet-active')
    chitiet_mota_body.classList.remove('chitiet-active')
}
chitiet_mota.onclick = function() {
    chitiet_rate.classList.remove('chitiet-body-active')
    chitiet_mota.classList.add('chitiet-body-active')
    chitiet_rate_body.classList.remove('chitiet-active')
    chitiet_mota_body.classList.add('chitiet-active')
}
const bo_nho = document.querySelectorAll('.bo-nho-item') 
for(let i=0; i<bo_nho.length;i++) {
    bo_nho[i].onclick = function() {
        const bo_nho_active = document.querySelector('.bo-nho-item.active')
        if(bo_nho_active) {
            bo_nho_active.classList.remove('active')
        }
        bo_nho[i].classList.add('active')
    }
}
const mau_sanpham = document.querySelectorAll('.mau-sanpham-item') 
for(let i=0; i<mau_sanpham.length;i++) {
    mau_sanpham[i].onclick = function() {
        const mau_sanpham_active = document.querySelector('.mau-sanpham-item.active')
        if(mau_sanpham_active) {
            mau_sanpham_active.classList.remove('active')
        }
        mau_sanpham[i].classList.add('active')
    }
    
}
*/
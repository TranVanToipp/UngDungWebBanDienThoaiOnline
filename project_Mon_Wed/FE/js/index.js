const $1 = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)
const cart = $$('.widget_shopping')
const cart_empty = $1('.cart-empty')
const box_cart_items = $1('.nav-drop-box')
if(cart.length>0) {
    cart_empty.classList.remove('block')
    box_cart_items.classList.add('block')
}
$1('.logo-cart').innerHTML = cart.length
window.onscroll = function() {
    if(this.pageYOffset > 190) {
        $1('.header-wrapper').classList.add('sticky')
        $1('.header').classList.add('height')
        $1('.top-bar').classList.add('none')
    }else {
        $1('.header-wrapper').classList.remove('sticky')
        $1('.header').classList.remove('height')
        $1('.top-bar').classList.remove('none')
    }
}
// const modal_quick_view = $1('.modal_quick_view') 
// // console.log(modal_quick_view);

// const quick_view_btn = $$('.btn-product-selling')
// for(let i=0; i<quick_view_btn.length;i++) {
//     quick_view_btn[i].onclick = function() {
//         modal_quick_view.classList.add('flex')
//     }
// }
// modal_quick_view.onclick = function() {
//     modal_quick_view.classList.remove('flex')
// }
// const container_quick_view = $1('.container_quick_view')
// container_quick_view.onclick = function(e) {
//     e.stopPropagation()
// }
// // .................FILTER PRICE........................
// const btn_add_cart_box = document.querySelectorAll('.btn-add-cart-box')
//     for(let i=0;i<btn_add_cart_box.length;i++) {
//         btn_add_cart_box[i].onclick = function() {
//             const link_add_cart = document.querySelectorAll('.link-add-cart')
//             const link_cart = 'cart/cart_home.php'
//             const attr = link_add_cart[i].getAttribute('href')
//             if(attr.indexOf(link_cart) !== -1) {
//                 return;
//             }else {
//                 alert('Bạn hãy đăng nhập để thêm sản phẩm vào giỏ hàng của mình!!!')
//             }
//         }
//     }
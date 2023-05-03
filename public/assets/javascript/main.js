const menuButton = document.querySelector('#btn-menu');
const closeMenuBtn = document.querySelector('#menu-close-btn');
let tl = gsap.timeline({ paused: true });
tl.to('.menu-wrapper', {
    duration: .4,
    top: "0"
});
tl.fromTo('.menu-wrapper__info-item', {
    duration: .5,
    stagger: 0.15,
    x: -30,
    opacity: 0,
}, {
    x: 0,
    opacity: 1,
    stagger: 0.15,
});
tl.fromTo('.menu-wrapper__navbar-item', {
    duration: .5,
    stagger: 0.15,
    y: 30,
    opacity: 0,
}, {
    y: 0,
    opacity: 1,
    stagger: 0.15,
})
menuButton.onclick = function(){
    reverseTl(tl);
}
closeMenuBtn.onclick = function(){
    reverseTl(tl);
}
function reverseTl(animation){
    animation.reversed() ? animation.play() : animation.reverse();
}
const oneSec = gsap.timeline();
oneSec.fromTo('.hero-section__title', 
{
    duration: 1,
    y: 100,
    opacity: 0,
}, {
    y: 0,
    opacity: 1,
    duration: 1,
}, .6).fromTo('.hero-section__description', {
    duration: 1,
    y: 100,
    opacity: 0,
}, {
    y: 0,
    opacity: 1,
    duration: 1,
}, 1).fromTo('.hero-section__phone-link', {
    duration: 1,
    y: 100,
    opacity: 0,
}, {
    y: 0,
    opacity: 1,
    duration: 1,
}, 1.6);
// accordion
const accordionElement = document.querySelectorAll('.accordion__item');
accordionElement.forEach((item, index) => {
    let header = item.querySelector('.accordion__article-icon');
    header.addEventListener('click', () => {
        item.classList.toggle('accordion__item--active');
        let description = item.querySelector('.accordion__article-content');
        if(item.classList.contains('accordion__item--active')){
            description.style.height = `${description.scrollHeight}px`;
            item.querySelector('i').classList.replace('bx-plus', 'bx-minus');
        }else{
            description.style.height = '0px';
            item.querySelector('i').classList.replace('bx-minus', 'bx-plus');
        }
    });
});
// warning
function checkCookies(){
    let cookieDate = localStorage.getItem('cookieDate');
    let cookieNotification = document.getElementById('warning-wrapper');
    let cookieBtn = cookieNotification.querySelector('#warning-success');

    // Если записи про кукисы нет или она просрочена на 1 год, то показываем информацию про кукисы
    if( !cookieDate || (+cookieDate + 43200000.) < Date.now() ){
        cookieNotification.classList.add('show');
    }

    // При клике на кнопку, в локальное хранилище записывается текущая дата в системе UNIX
    cookieBtn.addEventListener('click', function(){
        localStorage.setItem( 'cookieDate', Date.now() );
        cookieNotification.classList.remove('show');
    })
}
checkCookies();
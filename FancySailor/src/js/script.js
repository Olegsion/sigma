const menu = document.querySelector('.menu')
const nav = document.querySelector('.mobile-nav')
const link = document.querySelectorAll('.mobile-nav__link')


menu.addEventListener('click', () => {
    if (nav.style.display == 'none') {
        nav.style.display = 'flex'
    } else {
        nav.style.display = 'none';
    }
})

link.forEach((link) => {
    link.addEventListener('click', () => {
        nav.style.display = 'none'
    })
})

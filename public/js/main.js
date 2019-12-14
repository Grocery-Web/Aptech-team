document.addEventListener('DOMContentLoaded', function () {
    // Navigation Button : Search, Login, Shopcart
    let btn = [];
    icon = document.getElementsByClassName("nav__icon");
    btn = document.getElementsByClassName("form__text");
    let icon_length = icon.length;
    for (let index = 0; index < icon_length; index++) {
        icon[index].addEventListener("mouseover", function () {

            if (btn[index].classList.contains("form__text--appear")) {
                btn[index].classList.remove("form__text--appear");
                for (let i of btn) {
                    i.classList.remove("form__text--appear");
                }
            }
            else {
                for (let i of btn) {
                    i.classList.remove("form__text--appear");
                }
                btn[index].classList.toggle('form__text--appear')
            }
        });
    }
    let home_carousel;
    home_carousel = document.querySelector(".home__carousel");
    home_carousel.addEventListener("mouseover", function () {
        for (let item of btn) {
            item.classList.remove("form__text--appear");
        }
    })

    let navbar;
    navbar = document.querySelector(".navbar-nav");
    navbar.addEventListener("mouseover", function () {
        for (let item of btn) {
            item.classList.remove("form__text--appear");
        }
    })
    // End Navigation Button : Search, Login, Shopcart
    // Show Signup Popup
    // let popup = document.querySelector('.popup');
    // let signupbtn = document.querySelector('.nav__signup--link');
    // let blackscreen = document.querySelector('.blackscreen');
    // signupbtn.addEventListener('click', function(){
    //     console.log('aa')
    //     popup.classList.add('appeared');
    //     btn[1].classList.remove('form__text--appear');
    // })
    // blackscreen.addEventListener('click', function(){
    //     popup.classList.remove('appeared');
    // })
})

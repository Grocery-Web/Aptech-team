document.addEventListener('DOMContentLoaded', function () {
    // Navigation Button : Search, Login, Shopcart
    let btn = [];
    icon = document.getElementsByClassName("nav__icon");
    btn = document.getElementsByClassName("form__text");
    // function nav_login(index) {
    //     console.log(index)
    //     for (let item of btn) {
    //         item.style.display = "none";
    //     }
    //     btn[index].style.display = "block";
    // }
    let count = [];
    let icon_length = icon.length;
    for (let i = 0; i < icon_length; i++) {
        count[i] = 0;
    }
    for (let index = 0; index < icon_length; index++) {
        icon[index].addEventListener("click", function () {

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
    home_carousel.addEventListener("click", function () {
        for (let item of btn) {
            item.classList.remove("form__text--appear");
        }
    })

    let navbar;
    navbar = document.querySelector(".navbar-nav");
    navbar.addEventListener("click", function () {
        for (let item of btn) {
            item.classList.remove("form__text--appear");
        }
    })

})
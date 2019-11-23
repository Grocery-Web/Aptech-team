$(document).ready(function () {
    $('.carousel').slick({
        dots: false,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 1400,
    });
});

function increaseValue() {
    var value = parseInt(document.getElementById('quantity').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('quantity').value = value;
  }
  
  function decreaseValue() {
    var value = parseInt(document.getElementById('quantity').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('quantity').value = value;
}
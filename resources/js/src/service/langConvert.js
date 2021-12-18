$(document).ready(function () {
    var webLang = localStorage.getItem("lang");

    if (webLang == "rtl") {
        webArLang();
        $("head").append(
            "<style>*[style]:not(.product-category-type){text-align:justify}</style>"
        );
    } else {
        webEnLang();
    }
});
// testing
// const test = document.getElementById('testlang');
// test.addEventListener('click', this.webArLang)
// testing
// const test2 = document.getElementById('testlang2');

// products in slider
let product = document.querySelectorAll(".product");

// Product info and add to cart section
let productInfo = document.getElementById("product-container");
// console.log(document.getElementById("productInfo"));

// Header
let header = document.getElementById("header");

// Hero section
let heroSection = document.getElementById("heroSection");

// Footer section
let footer = document.getElementById("footer");

// footer title section
let title = document.querySelectorAll(".title-ltr");

//new
//services
let services = document.getElementById("services");

//products-info-section
let productsInfo = document.getElementById("products-info-section");

//checkout
let checkout = document.getElementById("checkout");

// convert button
const arLang = document.getElementById("ar-lang");
const arLangSmall = document.getElementById("ar-lang-small");
const enLang = document.getElementById("en-lang");
const enLangSmall = document.getElementById("en-lang-small");

arLang.addEventListener("click", webArLang);
arLangSmall.addEventListener("click", webArLang);

enLang.addEventListener("click", webEnLang);
enLangSmall.addEventListener("click", webEnLang);

// test2.addEventListener('click', this.webEnLang)

function webArLang() {
    // Rest localStorage
    localStorage.removeItem("lang");
    // Add new lang to localStorage
    localStorage.setItem("lang", "rtl");

    converter("rtl");

    title.forEach((e) => {
        e.classList.add("title-rtl");
    });
}

function webEnLang() {
    // Rest localStorage
    localStorage.removeItem("lang");
    // Add new lang to localStorage
    localStorage.setItem("lang", "ltr");

    title.forEach((e) => {
        e.classList.remove("title-rtl");
    });

    converter("ltr");
}

/*
 * take all elements and convert direction
 * lang params this is direction you passing in this function
 */
function converter(lang) {
    // RTL convert product info section and add to cart when you are clicking

    // RTL convert all products when you are clicking
    product.forEach((e) => {
        e.dir = lang;
    });

    // RTL convert footer when are clicking
    footer.dir = lang;

    // RTL convert header when you are clicking
    header.dir = lang;

    // RTL convert hero section when you are clicking
    if (heroSection) {
        heroSection.dir = lang;
    }
    if (productInfo) {
        productInfo.dir = lang;
    }
    if (services) {
        services.dir = lang;
    }
    if (productsInfo) {
        productsInfo.dir = lang;
    }
    if(checkout){
        checkout.dir = lang;
    }
}

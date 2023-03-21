jQuery(document).ready(function ($) {
    var inHeight = $("#image").innerHeight();
    console.log(inHeight);
    $("#image .col").each(function () {
        $(this).height(inHeight + "px");
        $(this)
            .find(".scrolling-slider-area")
            .height(inHeight - 60 + "px");
    });
});

const intro = (document.querySelector(".scrolling-slider-area").style.margin =
    "-50px 0px 10px");
//END SECTION

//SCROLLMAGIC
const controller = new ScrollMagic.Controller();

console.log(controller);

function generateAllImage() {
    let introDoc = document.getElementById("intro");
    for (let i = 1; i <= 83; i++) {
        let url = `frontend/sigma/83/${i.toString().padStart(4, "0")}.webp`;
        var img = document.createElement("img");
        img.src = url;
        // img.className = 'no-image';
        img.className = "no-image image-" + i;
        introDoc.appendChild(img);
    }
}
generateAllImage();

//Scenes
let scene = new ScrollMagic.Scene({
    duration: "280",
    triggerElement: intro,
    triggerHook: 0,
})
    .setPin(intro)
    .addTo(controller);

// console.log(scene);

const currentFrame = (index) =>
    `frontend/sigma/83/${index.toString().padStart(4, "0")}.webp`;

const image = document.getElementById("image");

let scene2 = new ScrollMagic.Scene({
    duration: 1500,
    triggerElement: intro,
    triggerHook: 0,
});

var cont = document.getElementById("intro");
var all_img = cont.getElementsByTagName("img");

var myScroll = 0;
scene.on("update", (e) => {
    myScroll = (e.scrollPos / 6.5).toFixed(0);

    console.log(myScroll);

    myScrollResult = 280 - myScroll;
    marginTop = 160 - myScrollResult;
    $(".innovation-area").css("margin-top", marginTop);

    if (myScroll > 0 && myScroll < 84) {
        for (i = 0; i < all_img.length; i++) {
            all_img[i].classList.add("no-image");
        }
        marginTopresult = marginTop + myScrollResult;

        $(".innovation-area").css("margin-top", marginTopresult);

        let imgs = document.querySelector(".image-" + myScroll);
        imgs.classList.remove("no-image");
        console.log("my image", imgs);
    } else if (myScroll > 83) {
        let imgs = document.querySelector(".image-" + 83);
        imgs.classList.remove("no-image");

        marginTopresult = marginTop + myScrollResult;
        $(".innovation-area").css("margin-top", marginTopresult);
    }

    console.log("myscroll", myScroll);
});

(function (window) {
    let defineLibrary = () => ({
        init: function (galleryId) {
            let container = document.querySelector(galleryId);

            if (!container) {
                console.error("please add the correct element");
                return;
            }
            //select class small image and zoom image

            let fristImg = container.querySelector(".small-preview");
            let imgZoom = container.querySelector(".zoom-image");

            //Error message for a programmer who has forgotten the class .zoom-image
            if (!imgZoom) {
                console.error("please add a .zoom-image tag");
                return;
            }

            //Error message for a programmer who has forgotten the class .small-preview

            if (!fristImg) {
                console.error(
                    "please add images with .small-preview class to your gallery"
                );
                return;
            }
            //Give the address of the first thumbnail to display in the .zoom-image class

            imgZoom.style.backgroundImage = `url(${fristImg.src})`;

            //Clicking on any thumbnail will display that image in the .zoom-image class
            container.addEventListener("click", function (e) {
                let ele = e.target;

                if (ele.classList.contains("small-preview")) {
                    imgZoom.style.backgroundImage = `url(${ele.src})`;
                }
            });
            //zoom
            imgZoom.addEventListener("mouseenter", function () {
                this.style.backgroundSize = "250%";
            });
            //Mouse address in zoom class
            imgZoom.addEventListener("mousemove", function (e) {
                let dimentions = this.getBoundingClientRect();

                let x = e.clientX - dimentions.left;
                let y = e.clientY - dimentions.top;

                x = Math.round(100 / (dimentions.width / x));
                y = Math.round(100 / (dimentions.height / y));

                this.style.backgroundPosition = `${x}% ${y}%`;
            });
            //Mouse out of zoom range
            imgZoom.addEventListener("mouseleave", function () {
                this.style.backgroundSize = "cover";
                this.style.backgroundPosition = "center";
            });
        },
    });

    //To avoid interference between library

    if (typeof positiveZoom == "undefined") {
        window.positiveZoom = defineLibrary();
    } else {
        console.log("library already defined.");
    }
})(window);

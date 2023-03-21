var download_button = document.getElementById("dw-btn");

download_button.addEventListener("click", () => {
    console.log(document.getElementById("container-png"));

    // var svgImg = document.getElementsByClassName("container-png")[0];
    // domtoimage.toPng(svgImg).then((data) => {
    //     var link = document.createElement("a");
    //     link.download = "barcode.png";
    //     link.href = data;
    //     link.click();
    // });
});
// download_button.addEventListener("click", function () {
//     console.log("hello");
// });

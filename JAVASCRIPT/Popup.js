function createPopup(id) {
    let popupNode = document.querySelector(id)
    let overlay = popupNode.querySelector(".overlay");
    let closebtn = popupNode.querySelector(".close-btn");
    function openpopup() {
        popupNode.classList.add("active");
    }
    function closepopup() {
        popupNode.classList.remove("active");
    }


    overlay.addEventListener("clicl" ,closepopup);
    closebtn.addEventListener("click" ,closepopup);
    return openpopup;

}

let popup = createPopup("#popup");
document.querySelector("#open-popup").addEventListener("click" ,popup);
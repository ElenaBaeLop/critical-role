let x = document.getElementById("success");
let y = document.getElementById("error");

//Si existe el elemento con id success, se ejecuta el setTimeout
if(x != null){
    setTimeout(() => {
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }, 3000);
}
//Si existe el elemento con id success, se ejecuta el setTimeout
if(y != null){
    setTimeout(() => {
        if (y.style.display === "none") {
            y.style.display = "block";
        } else {
            y.style.display = "none";
        }
    }, 3000);
}

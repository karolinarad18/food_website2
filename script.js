document.addEventListener("DOMContentLoaded", function() {
    const hiddenElements = document.querySelectorAll('.hidden')
    const observer = new IntersectionObserver((entries)=>{
        entries.forEach((entry)=>{
            console.log(entry);
            if(entry.isIntersecting){
                entry.target.classList.add("show");
            }else{
                entry.target.classList.remove("show");
            }
        })
    })
    hiddenElements.forEach((el)=> observer.observe(el))


var modal = document.getElementById('modal')
var btn2 = document.getElementById('btn2');
var user = document.getElementById('user');
var password = document.getElementById('password')




btn2.addEventListener("click", function(){
    if(user.value=="" || password.value==""){
        modal.style.display="block"
        user.style.border="solid 2px red"
        password.style.border="solid 2px red"

    }else{
        modal.style.display="none"
    }
})

var regi = Array.from(document.getElementsByClassName("regi"));
regi.forEach(element => {
    element.addEventListener("input", function() {
        element.style.border = "1px solid gray";
    });
});



    document.getElementById("sup").addEventListener("mousedown", function() {
        document.getElementById("modalRegister").style.display = "block";
        modal.style.display = "none";
        for (var i = 0; i < regi.length; i++) {
            regi[i].style.border = "gray solid 1px";
            regi[i].value = "";
        }
    });

    document.getElementById("btn3").addEventListener("click", function(event) {
        var areAllFilled = true;
        
        for (var i = 0; i < regi.length; i++) {
            if (regi[i].value.length <= 0) {
                areAllFilled = false;
                break;
            }
        }

        if (!areAllFilled) {
            event.preventDefault();
            document.getElementById("modalRegister").style.display = "block";
            for (var i = 0; i < regi.length; i++) {
                if (regi[i].value.length <= 0) {
                    regi[i].style.border = "red solid 1px";
                } else {
                    regi[i].style.border = "solid 1px gray";
                }
            }
        } else {
            document.getElementById("modalRegister").style.display = "none";
        }
    });

    var AlreadyHaveAnAccountLink = document.getElementById("labelka");
    AlreadyHaveAnAccountLink.addEventListener("mousedown", function(){
        modal.style.display="block";
        document.getElementById("modalRegister").style.display="none";
    })
    
    



});
    
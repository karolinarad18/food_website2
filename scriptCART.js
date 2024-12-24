document.addEventListener('DOMContentLoaded', () => {

    buttons.forEach(button => {
        button.addEventListener("click", function(event){
            button.style.display = "none";
            event.preventDefault(); // Prevent the form from being submitted
        });
    });

})
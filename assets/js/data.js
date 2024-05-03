const form = document.querySelector("form"),
      nextBtn = form.querySelector(".nextBtn"),
      backBtn = form.querySelector(".backBtn");

nextBtn.addEventListener("click", (event) => {
    event.preventDefault();
    form.classList.add('secActive');
});

backBtn.addEventListener("click", (event) => {
    event.preventDefault();
    form.classList.remove('secActive');
});

document.addEventListener("DOMContentLoaded", function() {
    var inputs = document.querySelectorAll("input[type='text']");

    inputs.forEach(function(input) {
        input.addEventListener("input", function() {
            this.value = this.value.replace(/[^0-9.]/g, '');

            if (parseFloat(this.value) > 100) {
                this.value = "100";
            }
        });
    });
});


document.getElementById("inputBtn").addEventListener("click", function() {
    document.getElementById("data-form").style.display = "block";
});

function StarMouseHover(id) {
    const stars = document.getElementsByClassName('rating-star');
    for (let i = 0; i < 5; i++) {
        stars[i].classList.add('fa-regular');
        stars[i].classList.remove('fa-solid');
    }
    for (let i = 0; i < id; i++) {
        stars[i].classList.remove('fa-regular');
        stars[i].classList.add('fa-solid');
    }
}

function StarMouseLeave() {
    let rating =  document.getElementById("rating").value;
    const stars = document.getElementsByClassName('rating-star');
    for (let i = 0; i < 5; i++) {
        stars[i].classList.remove('fa-regular');
        stars[i].classList.add('fa-solid');
    }
    for (let i = 4; i > rating-1; i--) {
        if (!stars[i].classList.contains('star-clicked')) {
            stars[i].classList.remove('fa-solid');
            stars[i].classList.add('fa-regular');
        }
    }
}

function StarMouseClick(id) {
    const stars = document.getElementsByClassName('rating-star');
    for (let i = 0; i < stars.length; i++) {
        if (i < id) {
            stars[i].classList.remove('fa-regular');
            stars[i].classList.add('fa-solid');
            stars[i].classList.add('star-clicked');
        } else {
            stars[i].classList.remove('fa-solid');
            stars[i].classList.add('fa-regular');
            stars[i].classList.remove('star-clicked');
        }
    }
    console.log(id);
    document.getElementById("rating").value = id;
}

    /* PREVENT FILE DROP ON TRIX EDITOR */
    document.addEventListener("trix-file-accept", function(event) {
        event.preventDefault();
    });

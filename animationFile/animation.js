//FADE_UP

const observer_up = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        } else {
            entry.target.classList.remove('show');

        }


    });
});





const hiddenElements_up = document.querySelectorAll('.fade-up');
hiddenElements_up.forEach((el) => observer_up.observe(el));



//FADE_UP





//FADE_DOWN

const observer_down = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        } else {
            entry.target.classList.remove('show');

        }


    });
});
const hiddenElements_down = document.querySelectorAll('.fade-down');
hiddenElements_down.forEach((el) => observer_down.observe(el));


//FADE_DOWN


//FADE_LEFT



const observer_left = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        } else {
            entry.target.classList.remove('show');

        }


    });
});
const hiddenElements_left = document.querySelectorAll('.fade-left');
hiddenElements_left.forEach((el) => observer_left.observe(el));



//FADE_LEFT


//FADE_RIGHT



const observer_right = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        } else {
            entry.target.classList.remove('show');

        }


    });
});
const hiddenElements_right = document.querySelectorAll('.fade-right');
hiddenElements_right.forEach((el) => observer_right.observe(el));



//FADE_RIGHT

//FADE_LEFT-MAX



const observer_left_max = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        } else {
            entry.target.classList.remove('show');

        }


    });
});
const hiddenElements_left_max = document.querySelectorAll('.fade-left-max ');
hiddenElements_left_max.forEach((el) => observer_left_max.observe(el));



//FADE_LEFT-MAX



//FADE_RIGHT_MAX



const observer_right_max = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        } else {
            entry.target.classList.remove('show');

        }


    });
});
const hiddenElements_right_max = document.querySelectorAll('.fade-right-max');
hiddenElements_right_max.forEach((el) => observer_right_max.observe(el));



//FADE_RIGHT_MAX


//ZOOM_IN



const observer_zoom_in = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        } else {
            entry.target.classList.remove('show');

        }


    });
});
const hiddenElements_zoom_in = document.querySelectorAll('.z-in');
hiddenElements_zoom_in.forEach((el) => observer_zoom_in.observe(el));



//ZOOM_IN

//ZOOM_OUT



const observer_zoom_out = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        } else {
            entry.target.classList.remove('show');

        }


    });
});
const hiddenElements_zoom_out = document.querySelectorAll('.z-out');
hiddenElements_zoom_out.forEach((el) => observer_zoom_out.observe(el));



//ZOOM_OUT
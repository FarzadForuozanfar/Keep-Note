
function Show_detail() {
    document.getElementById("title-note").placeholder = 'Title';
    document.getElementById("Textarea1").style.display = "block";
    document.getElementById("color").style.display = "block";
    document.getElementById("meeting-time").type = "datetime-local";
    document.getElementById("title-note").style.border = "thin solid #000000";
    document.getElementById("title-note").style.backgroundColor = "white";
    document.getElementById("buttons").classList.remove("d-none");
    document.getElementById("buttons").classList.add("d-flex");
    document.getElementById("label-color").style.display = "block";
    document.getElementById("label-date").style.display = "block";
}
function Delete_border() {
    document.getElementById("title-note").style.border = "none";
}
function DisplayNone() {
    document.getElementById("label-color").style.display = "none";
    document.getElementById("label-date").style.display = "none";
    document.getElementById("color").style.display = "none";
    document.getElementById("title-note").placeholder = 'Take a Note';
    document.getElementById("meeting-time").type = "hidden";
    document.getElementById("Textarea1").style.display = "none";
    document.getElementById("title-note").style.backgroundColor = "whitesmoke";
    document.getElementById("buttons").classList.remove("d-flex");
    document.getElementById("buttons").classList.add("d-none");

}

function dark_light_mode() {
    let element = document.getElementById('dark-light-mode');
    if (element.classList.contains("bi-moon")) {
        element.classList.remove("bi-moon");
        element.classList.add("bi-sun");
        document.getElementById("body").style.backgroundColor = "black";
        document.getElementById("app-name").style.color = "white";
    }
    else if (element.classList.contains("bi-sun")) {
        element.classList.remove("bi-sun");
        element.classList.add("bi-moon");
        document.getElementById("body").style.backgroundColor = "white";
        document.getElementById("app-name").style.color = "black";
    }

}
function grid_notes() {
    let div_element = document.getElementsByClassName("notes");
    let grid_element = document.getElementById('grid-notes');
    if (grid_element.classList.contains("bi-list")) {
        grid_element.classList.remove('bi-list');
        grid_element.classList.add('bi-grid');
        for (let i = 0; i < div_element.length; i++) {
            div_element[i].classList.remove("col-lg-3");
            div_element[i].classList.remove("col-md-6");
            div_element[i].classList.remove("col-sm-12");
            div_element[i].classList.remove("col-xs-12");

        }
        

        
    }
    else if(grid_element.classList.contains("bi-grid")) {
        grid_element.classList.remove('bi-grid');
        grid_element.classList.add('bi-list');
        let div_element = document.getElementsByClassName("notes");
        for (let i = 0; i < div_element.length; i++) {
            div_element[i].classList.add("col-lg-3");
            div_element[i].classList.add("col-md-6");
            div_element[i].classList.add("col-sm-12");
            div_element[i].classList.add("col-xs-12");

        }
        
    }
}
//  |_2-]?58x/Q!e(IR
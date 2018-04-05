
function validateForm() {
   // var title = document.forms["createForm"]["title"].value;
    var title = document.forms["createForm"]["title"].value;
    var year = document.forms["createForm"]["year"].value;
    var genre = document.forms["createForm"]["genre"].value;
    var image = document.forms["createForm"]["image"].value;
    var synopsis = document.forms["createForm"]["synopsis"].value;
    var username = document.forms["loginForm"]["username"].value;
    var password = document.forms["loginForm"]["password"].value;

    if (title == "") {
        alert("Title must be filled out");
        return false;
    }

    if (year == "") {
        alert("Year must be filled out");
        return false;
    }

    if (genre == "") {
        alert("Genre must be filled out");
        return false;
    }

    if (image == "") {
        alert("Image must be filled out");
        return false;
    }

    if (synopsis == "") {
        alert("Synopsis must be filled out");
        return false;
    }

    if (username == "") {
        alert("Username must be filled out");
        return false;
    }

    if (password == "") {
        alert("Password must be filled out");
        return false;
    }

}

function titleValidation(title,ev) {

   // var text = /^[0-9]+$/;
    if(ev.type=="blur" || title.length===0 ) {

        if (title.length ===0)
        {
            alert("EmptyTitle is not proper. Please check");
            return false;
        }
    }
}

function yearValidation(year,ev) {

    // var text = /^[0-9]+$/;
    if(ev.type=="blur" || year.length===0 ) {

        if (year.length ===0)
        {
            alert("EmptyYear  is not proper. Please check");
            return false;
        }
    }
}

function titleValidation1(year,ev) {

    // var text = /^[0-9]+$/;
    if(ev.type=="blur" || title.length===0 ) {

        if (title.length ===0)
        {
            alert("EmptyYear  is not proper. Please check");
            return false;
        }
    }
}

// function yearValidation(year,ev) {
//
//     var text = /^[0-9]+$/;
//     var current_year=new Date().getFullYear();
//     if(ev.type=="blur" || year.length===0 || year.length==4 && ev.keyCode!=8 && ev.keyCode!=46) {
//         if (year.length ===0)
//         {
//             alert("EmptyYear is not proper. Please check");
//             return false;
//         }
//         else
//         if (year != 0) {
//             if ((year != "") && (!text.test(year))) {
//
//                 alert("Please Enter Numeric Values Only");
//                 return false;
//             }
//
//             // if (year.length != 4) {
//             //     alert("Year is not proper. Please check");
//             //     return false;
//             // }
//
//
//             else if((year < 1960) || (year > current_year))
//             {
//                 alert("Year should be in range 1960 to current year");
//                 return false;
//             }
//             return true;
//         }
//
//     }
// }

function genreValidation(genre,ev) {

    // var text = /^[0-9]+$/;
    if(ev.type=="blur" || genre.length===0 ) {

        if (genre.length ===0)
        {
            alert("EmptyGenre is not proper. Please check");
            return false;
        }
    }
}

function imageValidation(image,ev) {

    // var text = /^[0-9]+$/;
    if(ev.type=="blur" || image.length===0 ) {

        if (image.length ===0)
        {
            alert("EmptyImage is not proper. Please check");
            return false;
        }
    }
}

// function yearValidation1(year) {
//
//    // var text = /^[0-9]+$/;
//     if(year.length===null ) {
//
//             if (year.length ===null) {
//                 alert("EmptyYear is not proper. Please check");
//                 return false;
//             }
//           }
// }

function imageValidation() {
    var formData = new FormData();

    var file = document.getElementById("img").files[0];

    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
        alert('Please select a valid image file');
        document.getElementById("img").value = '';
        return false;
    }
    if (file.size > 1024000) {
        alert('Max Upload size is 1MB only');
        document.getElementById("img").value = '';
        return false;
    }
    return true;
}

function synopsisValidation(synopsis,ev) {

    // var text = /^[0-9]+$/;
    if(ev.type=="blur" || synopsis.length===0 ) {

        if (synopsis.length ===0)
        {
            alert("EmptySynopsis is not proper. Please check");
            return false;
        }
    }
}

function usernameValidation(username,ev) {

    // var text = /^[0-9]+$/;
    if(ev.type=="blur" || title.length===0 ) {

        if (username.length ===0)
        {
            alert("EmptyUsername is not proper. Please check");
            return false;
        }
    }
}
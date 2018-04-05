
function validateForm() {

    var title = document.forms["createForm"]["title"].value;
    var year = document.forms["createForm"]["year"].value;
    var genre = document.forms["createForm"]["genre"].value;
    var image = document.forms["createForm"]["image"].value;
    var synopsis = document.forms["createForm"]["synopsis"].value;

    if ($.trim(title).length === 0){
        alert("Title must be filled out!");
        return false;
    }

    if ($.trim(year).length === 0){
        alert("Year must be filled out!");
        return false;
    }

    if ($.trim(genre).length === 0){
        alert("Genre must be filled out!");
        return false;
    }

    if (image == "") {
        alert("Image must be filled out");
        return false;
    }

    if ($.trim(synopsis).length === 0){
        alert("Synopsis must be filled out!");
        return false;
    }

}

function validateLoginForm() {

    var username = document.forms["loginForm"]["username"].value;
    var password = document.forms["loginForm"]["password"].value;

    if ($.trim(username).length === 0){
        alert("Username must be filled out!");
        return false;
    }

    if (password.length === 0)
    {
        alert("Password must be filled out!");
        return false;
    }

}

function validateUpdateForm() {

    var title = document.forms["UpdateForm"]["title"].value;
    var year = document.forms["UpdateForm"]["year"].value;
    var genre = document.forms["UpdateForm"]["genre"].value;
    var image = document.forms["UpdateForm"]["image"].value;
    var synopsis = document.forms["UpdateForm"]["synopsis"].value;

    if ($.trim(title).length === 0){
        alert("Title must be filled out!");
        return false;
    }

    if ($.trim(year).length === 0){
        alert("Year must be filled out!");
        return false;
    }

    if ($.trim(genre).length === 0){
        alert("Genre must be filled out!");
        return false;
    }

    if (image == "") {
        alert("Image must be filled out");
        return false;
    }

    if ($.trim(synopsis).length === 0){
        alert("Synopsis must be filled out!");
        return false;
    }

}

function yearValidation(year,ev) {

    var text = /^[0-9]+$/;
    if(ev.type=="blur" || year.length==4 && ev.keyCode!=8 && ev.keyCode!=46) {
        if (year != 0) {
            if ((year != "") && (!text.test(year))) {

                alert("Please Enter Numeric Values Only");
                return false;
            }

            if (year.length != 4) {
                alert("Year is not proper. Please check");
                return false;
            }
            var current_year=new Date().getFullYear();
            if((year < 1960) || (year > current_year))
            {
                alert("Year should be in range 1960 to current year");
                return false;
            }
            return true;
        } }
}

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
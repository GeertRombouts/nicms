function IsAlphaNumeric(value) {
    if (! /^[a-zA-Z0-9]+$/.test(value)) {
        return false;
    } else {
        return true;
    }
}//Method IsAlpheNummeric.

function StripAlphaNumeric(value) {
    return value.replace(/[\W_]+/g,"");
}//Method StripAlphaNumeric.

function StripSpaces(value) {
    return value.replace(/ /g,"");
}//Method StripSpaces.

function ValidateLength(value,min,max) {
    if (value.length < min || value.length > max) {
        return false;
    } else {
        return true;
    }
}//Method ValidateLength.

function IsInteger(value) {
    return Number.isInteger(value);
}//Method IsInteger.

//Create current path.
function CreatePath() {
    var aPath = new Array();

    //Go through all breadcrumbs data-values and add to array, then afterwards pass to php.
    for (i=0;i<=teller;i++) {
        relativePath = document.getElementById("breadcrumbs-"+i).getAttribute('data-value');
        //Check if first dir == "assets"
        if (i == 0) {
            if (relativePath != "assets") {
                return false;
            }
        }
        aPath.push(relativePath);
    }//For.

    return aPath;
}//Method CreatePath.

//Toggle visibility of the overlay, and the correct content.
function Toggleoverlay(toggle,content) {
    //Check if close or open is clicked.
    if (toggle == "close") {
        //Close overlay.
        $(".overlay-wrapper").fadeOut();
        $(".overlay-box").css({
            'margin-top' : '0px'
        });

    }else if(toggle == "open") { 
        //Open overlay.
        $(".overlay-wrapper").fadeIn();
        $(".overlay-box").css({
            'margin-top' : '100px'
        });

    } else {
        alert("Unknown parameter.");
        return false;
    }//If val==0.

    //Change content of the overlay.
    switch (content) {
        case 1:
            document.getElementById("overlayBody").innerHTML ='\
                <h2 class="overlay-title">Create Directory</h2>\
                <i class="fas fa-times close-overlay" onclick="Toggleoverlay(\'close\',0)"></i>\
                <div class="form-group">\
                    <label for="dirName">Directory Name</label>\
                    <input type="text" class="form-control" id="dirName" placeholder="Enter Name">\
                    <small id="overlaySmall" class="overlay-small">The name must be alphanumeric, spaces will be replaced with underscores. The length must be between 1 and 30</small>\
                </div>\
                <div class="button-container">\
                    <button class="btn btn-secondary" onclick="Toggleoverlay(\'close\',0)">Close</button>\
                    <button class="btn btn-primary" onclick="CreateDir()">Create</button>\
                </div>\
            ';
            break;
        case 2:
            document.getElementById("overlayBody").innerHTML ='\
                <h2 class="overlay-title">Upload File</h2>\
                <i class="fas fa-times close-overlay" onclick="Toggleoverlay(\'close\',0)"></i>\
                <div class="form-group">\
                    <label for="dirName">Select File</label><br>\
                    <input type="file" name="file" id="file" accept="image/jpeg,image/png,application/pdf,image/jpg"><br>\
                    <small id="overlaySmall" class="overlay-small">Only images (jpg,jpeg,png) and pdf files are allowed, The name of the\
                    file has to be alphanumeric. And the length has to be between 1 and 30</small>\
                </div>\
                <div class="button-container">\
                    <button class="btn btn-secondary" onclick="Toggleoverlay(\'close\',0)">Close</button>\
                    <button class="btn btn-primary" onclick="UploadFile()">Upload</button>\
                </div>\
            ';
            break;
        case 3:
            document.getElementById("overlayBody").innerHTML = '\
                <h2 class="overlay-title">Add Category</h2>\
                <i class="fas fa-times close-overlay" onclick="Toggleoverlay(\'close\',0)"></i>\
                <div class="form-group">  \
                    <label for="categoryName">Category name</label>\
                    <input type="text" class="form-control" id="categoryName" placeholder="Enter Category..">\
                    <small>The name must be alphanumeric, spaces are allowed. And the name has to be between 3 and 30 characters</small>\
                </div>\
                <div class="button-container">\
                    <button class="btn btn-secondary" onclick="Toggleoverlay(\'close\',0)">Close</button>\
                    <button class="btn btn-primary" onclick="SaveCategory(0)">Save</button>\
                </div>\
            ';
            break;
        default:
            break;
    }//Switch.
}//Method toggleoverlay.




// onchange event will occur when the user
// release the key and calls the function
// assigned to this event
function GetCredit(str) {
    if (str.length == 0) {
        document.getElementById("course-credit").value = "";

        return;
    } else {

        // Creates a new XMLHttpRequest object
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {

            // Defines a function to be called when
            // the readyState property changes
            if (this.readyState == 4 &&
                this.status == 200) {

                // Typical action to be performed
                // when the document is ready

                var myObj = JSON.parse(this.responseText);
                // Returns the response data as a
                // string and store this array in
                // a variable assign the value
                // received to first name input field
                document.getElementById("credit-taken").value = myObj[0];



            }
        };

        // xhttp.open("GET", "filename", true);
        xmlhttp.open("GET", "credit-load.php?id=" + str, true);

        // Sends the request to the server
        xmlhttp.send();

    }

}

function removeOpt() {
    const select = document.getElementById("lec-name");
    const options = document.querySelectorAll("#lec-man");
    options.forEach(option => {
        select.removeChild(option);
    });
}
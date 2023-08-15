class Required {
    isEmpty() {
        let username = document.getElementById("username").value;
        let password = document.getElementById("password").value;
        if (username == "") {

            let userDIV = document.getElementById("username");
            userDIV.classList.add("validate");
            
            document.getElementById("asterisk-1").innerHTML = "*";
            document.getElementById("asterisk-1").style.color = "red";

        }
        if (password == "") {
            
            let userDIV = document.getElementById("password");
            userDIV.classList.add("validate");
            
            document.getElementById("asterisk-2").innerHTML = "*";
            document.getElementById("asterisk-2").style.color = "red";

        }
    }
}

const reqObj = new Required();

function isFill() {
    reqObj.isEmpty();
}



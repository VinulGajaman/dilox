function changeView() {

    var signInBox = document.getElementById("signInBox");
    var signUpBox = document.getElementById("signUpBox");

    signInBox.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");

}

function signUp() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var f = new FormData();

    f.append("fname", fname.value);
    f.append("lname", lname.value);
    f.append("email", email.value);
    f.append("password", password.value);
    f.append("mobile", mobile.value);
    f.append("gender", gender.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;

            if (text == "success") {

                fname.value = "";
                lname.value = "";
                email.value = "";
                mobile.value = "";
                password.value = "";
                document.getElementById("msg").innerHTML = "";


                changeView();

            } else {
                document.getElementById("msg").innerHTML = text;
            }

        }

    };

    r.open("POST", "signUpProcess.php", true);
    r.send(f);

}

function signIn() {

    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var remember = document.getElementById("remember");

    var formData = new FormData();

    formData.append("email", email.value);
    formData.append("password", password.value);
    formData.append("remember", remember.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;

            if (text == 1) {
                window.location = "home.php";

            } else {
                var msg2 = document.getElementById("msg2");
                msg2.innerHTML = text;

            }

        }

    };

    r.open("POST", "signInProcess.php", true);
    r.send(formData);

}

var bm;

function forgotPassword() {

    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;

            if (text == 1) {

                alert("Verfication email sent.Please check your inbox.");

                var m = document.getElementById("forgetPasswordModel");
                bm = new bootstrap.Modal(m);
                bm.show();


            } else {
                var msg2 = document.getElementById("msg2");
                msg2.innerHTML = text;
            }
        }


    };

    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();

}

function showPassword1() {

    var np = document.getElementById("np")
    var npb = document.getElementById("npb")

    if (npb.innerHTML == "Show") {
        np.type = "text";
        npb.innerHTML = "Hide";
    } else {
        np.type = "password";
        npb.innerHTML = "Show";
    }

}

function showPassword2() {

    var rnp = document.getElementById("rnp")
    var rnpb = document.getElementById("rnpb")

    if (rnpb.innerHTML == "Show") {
        rnp.type = "text";
        rnpb.innerHTML = "Hide";
    } else {
        rnp.type = "password";
        rnpb.innerHTML = "Show";
    }

}



function resetPassword() {

    var e = document.getElementById("email2");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("vc");

    var formData = new FormData();
    formData.append("e", e.value);
    formData.append("np", np.value);
    formData.append("rnp", rnp.value);
    formData.append("vc", vc.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;
            if (text == 1) {
                alert("Password Reset Success");


                bm.hide();

            } else {
                alert("Password Reset Fail");
            }
        }

    };

    r.open("POST", "resetPassword.php", true);
    r.send(formData);
}

function signOut() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {

                window.location = "home.php";
            }
        }
    }

    r.open("GET", "signOut.php", true);
    r.send();

}

////////// profile////////////

function changeProfileImg() {

    var image = document.getElementById("profileimg"); //file chooser
    var view = document.getElementById("proImg"); //image tag

    image.onchange = function() {

        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        view.src = url;

    }

}

var k;

function updateProfile() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var city = document.getElementById("city");
    var district = document.getElementById("district");
    var postalCode = document.getElementById("postalCode");
    var province = document.getElementById("province");
    var img = document.getElementById("profileimg");
    var msg = document.getElementById("msg");

    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("m", mobile.value);
    f.append("a1", line1.value);
    f.append("a2", line2.value);
    f.append("c", city.value);
    f.append("pro", province.value);
    f.append("di", district.value);
    f.append("pc", postalCode.value);
    f.append("i", img.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var text = r.responseText;
            var dm = document.getElementById("alert");
            var k = new bootstrap.Modal(dm);
            k.show();
            msg.innerHTML = text;

        }


    };

    r.open("POST", "updateProfileProcess.php", true);
    r.send(f);


}

function close() {
    window.location = "profile.php";
}

function GotoIndex() {
    var dm = document.getElementById("alert");
    var k = new bootstrap.Modal(dm);
    k.show();
}

function index() {
    window.location = "index.php";
}
///////////// profile//////////

/////////// single Product////////////

function loadMainImg(id) {

    var pid = id;

    var img = document.getElementById("pimg" + pid).src;

    var mainImg = document.getElementById("mainImg");

    mainImg.style.backgroundImage = "url(" + img + ")";
}


/////////// single Product//////


/////////////////admin//////////////////


function adminVerification() {

    var e = document.getElementById("e").value;

    var form = new FormData();
    form.append("e", e);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {

                var verificationModal = document.getElementById("verificationModal");
                k = new bootstrap.Modal(verificationModal);

                k.show();

            } else {
                var msg = document.getElementById("msg2").innerHTML = text;
            }

        }
    }
    r.open("POST", "adminVerificationProcess.php", true);
    r.send(form);

}

function verify() {

    var e = document.getElementById("e").value;
    var v = document.getElementById("vc").value;
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                k.hide();
                window.location = "adminPanel.php";
            } else {
                var msg = document.getElementById("msg").innerHTML = text;
            }

        }
    };
    r.open("GET", "verifyProcess.php?v=" + v + "&e=" + e, true);
    r.send();

}

/* <tr><td><select class="form-select"> <option value ="S"> S < /option> <option value = "M" > M < /option> <option value = "L" > L < /option> </select></td >< td > < input class = "form-control"type = "text" / > < /td> <td > < input class = "form-control"type = "text" / > < /td> <td class = "fs-5" > < button class = "btn btn-outline-dark" > < i class = "bi bi-trash" > < /i></button > < /td> <td class = "fs-5" > < button class = "btn btn-outline-dark"onclick = "addRow();" > < i class = "bi bi-plus-circle" > < /i></button > < /td></tr > */


function addRow() {
    $('#table1 > tbody:last').append('<tr><td><select class="form-select"> <option value ="S"> S </option> <option value = "M" > M </option> <option value = "L" > L </option> </select></td><td><input class = "form-control"type = "text"/></td><td><input class = "form-control"type = "text"/></td><td class = "fs-5"><button id="trash" onclick="trash(this);" class = "btn btn-outline-dark"> <i class = "bi bi-trash"> </i></button></td></tr>')

}

function trash(x) {


    $(x).closest('tr').remove();


}
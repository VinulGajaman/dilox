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
            if (text == "Password Reset Success") {

                bm.hide();

            } else {
                var msg3 = document.getElementById("msg3");
                msg3.innerHTML = text;

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
    $('#table1 > tbody:last').append('<tr><td><select name="size[]" class="form-select"> <option value ="S"> S </option> <option value = "M" > M </option> <option value = "L" > L </option> </select></td><td><input class = "form-control"type = "text" name="color[]" required/></td><td><input  class = "form-control"type = "number" name="qty[]" required/></td><td class = "fs-5"><button onclick="m(this);"  id="trash" type="button" class = "btn btn-outline-dark"> <i class = "bi bi-trash"> </i></button></td></tr>')

}

function m(x) {
    $(x).closest('tr').remove();

}





function changeImg() {

    var image = document.getElementById("imguploader"); //file chooser
    var view1 = document.getElementById("prev0");
    var view2 = document.getElementById("prev1"); //image tag
    var view3 = document.getElementById("prev2");

    image.onchange = function() {

        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        view1.src = url;

        var file = this.files[1];
        var url = window.URL.createObjectURL(file);

        view2.src = url;

        var file = this.files[2];
        var url = window.URL.createObjectURL(file);

        view3.src = url;


    }

}

function blockUser(email) {

    var mail = email;

    var blockbtn = document.getElementById("blockbtn" + mail);

    var f = new FormData();
    f.append("e", mail);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;

            if (text == "unblock") {
                // window.location = "manageUsers.php";
                blockbtn.className = "btn btn-success";
                blockbtn.innerHTML = "Unblock";
            } else if (text == "block") {
                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "Block";
            }
        }

    }

    r.open("POST", "userBlockProcess.php", true);
    r.send(f);

}

function model() {
    var dm = document.getElementById("alert");
    var k = new bootstrap.Modal(dm);
    k.show();
}

function admin() {
    window.location = "adminSignin.php";
}

function selectCategory(x) {

    var cid = x;

    var load = document.getElementById("load");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;

            load.innerHTML = text;
        }

    }

    r.open("GET", "categoryLoad.php?c=" + cid, true);
    r.send();

}

function filter(x, id, page) {

    var f = x;
    var c = id;
    var page = page;

    var load = document.getElementById("loadProduct");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;

            load.innerHTML = text;
        }

    }

    r.open("GET", "filterProcess.php?f=" + f + "&c=" + c + "&p=" + page, true);
    r.send();
}

function collection(page) {

    var page = page;

    var f = document.getElementById("filter1").value;
    var s = document.getElementById("search").value;
    var c = document.getElementById("select").value;

    var form = new FormData();

    form.append("f", f);
    form.append("s", s);
    form.append("c", c);
    form.append("p", page);

    var load = document.getElementById("loadProduct");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;

            load.innerHTML = text;
        }

    }

    r.open("POST", "collectionProcess.php", true);
    r.send(form);
}

// addToWatchlist

function addToWatchlist(id) {

    var pid = id;
    var msg = document.getElementById("alert" + pid);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {


            $('.hart' + pid).toggleClass('bi-heart-fill');
            $('.hart' + pid).toggleClass('bi-heart');

            // document.getElementsByClassName('hart' + pid).classList.toggle('bi-heart-fill');
            // document.getElementsByClassName('hart' + pid).classList.toggle('bi-heart');
            var text = r.responseText;

        }

    };

    r.open("GET", "addToWatchlistProcess.php?id=" + pid, true);
    r.send();
}

function watchlistSearch(x) {
    var page = x;
    var txt = document.getElementById("search").value;

    var f = new FormData();
    f.append("t", txt);
    f.append("p", page);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;

            var load = document.getElementById("load");

            load.innerHTML = text;
        }

    };

    r.open("POST", "watchlistSearch.php", true);
    r.send(f);
}

//block product

function blockProduct(id) {
    var id = id;
    var blockbtn = document.getElementById("blockbtn" + id);

    var f = new FormData();
    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success1") {

                blockbtn.className = "btn btn-success";
                blockbtn.innerHTML = "Unblock"

            } else if (t == "success2") {

                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "Block"

            }
        }
    }

    r.open("POST", "productBlockProcess.php", true);
    r.send(f);
}

function deleteFromWatchlist(id) {
    var wid = id;

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            watchlistSearch(1);
        }
    };

    r.open("GET", "removeWatchlistProcess.php?id=" + wid, true);
    r.send();
}

/////print//////

function printDiv() {
    var restorepage = document.body.innerHTML;
    var page = document.getElementById("GFG").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = restorepage;
}

/////print//////

//////// singleProduct//////////

function loadSize(c, id) {

    var clr = c;
    var id = id;

    var form = new FormData();

    form.append("c", clr);
    form.append("id", id);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            var sizeLoad = document.getElementById("sizeLoad");
            sizeLoad.innerHTML = text;
            changeQty();

        }
    };

    r.open("POST", "SingleProductProcess.php", true);
    r.send(form);

}


function changeQty() {

    var element = $('#sizeSelect').find('option:selected');
    var av = element.attr("qty");
    document.getElementById("pqty").max = av;
    $('#changeStock').text(av);

}

///add to cart

$("#cartForm").submit(function(e) {
    e.preventDefault();
    var color = $('input[name="radioCart"]:checked').val();
    var size = document.getElementById("sizeSelect").value;
    var qty = document.getElementById("pqty").value;
    var pid = document.getElementById("cartProduct").value;

    var form = new FormData();

    form.append("c", color);
    form.append("s", size);
    form.append("q", qty);
    form.append("p", pid);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            var dm = document.getElementById("success");
            var k = new bootstrap.Modal(dm);
            k.show();

        }
    };

    r.open("POST", "addToCartProcess.php", true);
    r.send(form);
});


function deleteModelPop(x) {


    var dm = document.getElementById("deleteCart" + x);
    var k = new bootstrap.Modal(dm);
    k.show();

}

function deleteFromCart(id, x) {

    var cid = id;


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                var dm = document.getElementById("deleteCart" + x);
                var k = new bootstrap.Modal(dm);
                k.hide();
                window.location = "cart.php";


            }

        }
    };

    r.open("GET", "deleteFromCartProcess.php?id=" + cid, true);
    r.send();

}

function payNow() {


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var text = r.responseText;
            var obj = JSON.parse(text);

            var mail = obj["email"];
            var amount = obj["amount"];
            var orderId = obj["id"];
            var delivery = obj["delivery_fee"];

            if (text == 1) {
                alert("Please Sign In First.");
                window.location = "index.php";

            } else if (text == 2) {
                alert("Please Update Your Profile First");
                window.location = "userProfile.php";
            } else {

                // Called when user completed the payment. It can be a successful payment or failure
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);

                    saveInvoice(orderId, amount, delivery);

                    //Note: validate the payment and show success or failure page to the customer
                };

                // Called when user closes the payment without completing
                payhere.onDismissed = function onDismissed() {
                    //Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                };

                // Called when error happens when initializing payment such as invalid parameters
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1217969", // Replace your Merchant ID
                    "return_url": "http://localhost/dilox/home.php", // Important
                    "cancel_url": "http://localhost/dilox/home.php", // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj["id"],
                    "items": obj["item"],
                    "amount": amount + ".00",
                    "currency": "LKR",
                    "first_name": obj["fname"],
                    "last_name": obj["lname"],
                    "email": mail,
                    "phone": obj["mobile"],
                    "address": obj["address"],
                    "city": obj["city"],
                    "country": "Sri Lanka",
                    "delivery_address": "No. 46, Galle road, Kalutara South",
                    "delivery_city": "Kalutara",
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked

                payhere.startPayment(payment);

            }
        }

    };

    r.open("GET", "buyNowProcess.php?id=1", true);
    r.send();
}

function saveInvoice(id, amount, d) {

    var id = id;
    var a = amount;
    var d = d;

    var f = new FormData();

    f.append("id", id);
    f.append("d", d);
    f.append("a", a);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var text = r.responseText;


            if (text == "Payment Success") {

                window.location = "invoice.php?id=" + id;
            }
        }
    };

    r.open("POST", "saveInvoice.php", true);
    r.send(f);
}
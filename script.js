function Rejister() {
    alert("hello");
    var fname = document.getElementById("f");
    var lname = document.getElementById("l");
    var email = document.getElementById("e");
    var password = document.getElementById("p");
    var mobile = document.getElementById("m");
    var gender = document.getElementById("g");



    var f = new FormData;
    // alert(fname.value);
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("m", mobile.value);
    f.append("g", gender.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "*please enter your Frist Name!!!") {


                document.getElementById("r1").innerHTML = t;
            } else
            if (t == "*Frist Name must have less than 50 characters") {
                document.getElementById("r1").innerHTML = t;
            } else
            if (t == "*please enter your Last Name!!!") {
                document.getElementById("r1").innerHTML = t;
            } else
            if (t == "*Last Name must have less than 50 characters") {
                document.getElementById("r1").innerHTML = t;
            } else
            if (t == "*please enter your email!!!") {
                document.getElementById("r1").innerHTML = "";
                document.getElementById("r3").innerHTML = t;
            } else
            if (t == "*Email address must have less than 100 characters") {
                document.getElementById("r3").innerHTML = t;
            } else
            if (t == "*Invalid email") {
                document.getElementById("r3").innerHTML = t;


            } else
            if (t == "*please enter your password!!!") {
                document.getElementById("r3").innerHTML = "";
                document.getElementById("r4").innerHTML = t;
            } else
            if (t == "*Password must be between 5-20 characters") {
                document.getElementById("r4").innerHTML = t;
            } else
            if (t == "*Please enter your mobile number") {
                document.getElementById("r4").innerHTML = "";
                document.getElementById("r5").innerHTML = t;
            } else
            if (t == "*Mobile must have 10 charactors") {
                document.getElementById("r5").innerHTML = t;
            } else
            if (t == "*invalid mobile") {
                document.getElementById("r5").innerHTML = t;
            } else if (t == "User with the same email or mobile already exists.") {
                document.getElementById("r6").innerHTML = t;
            } else if (t == "success") {

                document.getElementById("r7").innerHTML = "Rejistation sucsess";
                document.getElementById("alertdiv").className = "alert alert-success";
                window.location = "shopping.php";


            }
            // alert(t);



        }
    }

    r.open("POST", "rejisterProcess.php", true);
    r.send(f);


}

function signIn() {

    var email = document.getElementById("e");
    var password = document.getElementById("p");
    var rememberMe = document.getElementById("r");

    var f = new FormData;

    f.append("email", email.value);
    f.append("password", password.value);
    f.append("rememberMe", rememberMe.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "*Enter your email address") {
                document.getElementById("s1").innerHTML = t;
            } else if (t == "*Lrist Name must have less than 100 characters") {
                document.getElementById("s1").innerHTML = t;
            } else if (t == "*Invalid your email") {
                document.getElementById("s1").innerHTML = t;
            } else if (t == "*Enter your password") {
                document.getElementById("s1").innerHTML = "";
                document.getElementById("s2").innerHTML = t;
            } else if (t == "*Password must be between 5-20 characters") {
                document.getElementById("s2").innerHTML = t;
            } else if (t == "success") {
                window.history.back();
                // window.location.reload();
                // window.location = "index.php";
                // window.location = "home.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "signInProcess.php", true);
    r.send(f);

}


function Frogetpassword() {

    email = document.getElementById("e");
    // window.location = "frogetPassword.php";
    var f = new FormData;

    f.append("email1", email.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("verification code has sent to your email. please check your inbox");
                window.location = "frogetPassword.php";
            } else {
                alert(t);
            }
        }
    }
    r.open("GET", "frogotPasswordProcess.php?e=" + email.value, true);
    r.send();


}

function submitVerification() {
    var email = document.getElementById("e");
    var vcode = document.getElementById("vcode");
    var np1 = document.getElementById("np2");
    var np2 = document.getElementById("np2");

    var f = new FormData();



    f.append("e", email.value);
    f.append("n", np1.value);
    f.append("r", np2.value);
    f.append("v", vcode.value);

    // document.getElementById("e").innerHTML = email1;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                alert("Password reset success");
                window.location = "index.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "resetPassword.php", true);
    r.send(f);

}

function logOut() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            } else {
                alert(t);
            }


        }
    }
    r.open("GET", "signoutProcess.php", true);
    r.send();
}

var en;

function editName() {
    document.getElementById("name").classList.toggle("d-none");
    document.getElementById("editName").classList.toggle("d-none");
    document.getElementById("editName1").classList.toggle("d-none");
    document.getElementById("updateName").classList = "d-block btn btn btn-success d-grid col-6";
    document.getElementById("cancelName").classList = "d-block btn btn-success d-grid col-6";

}

function editMobile() {
    document.getElementById("mobileNum").classList.toggle("d-none");
    document.getElementById("editMobile").classList.toggle("d-none");
    document.getElementById("updateMobile").classList = "d-block btn btn btn-success d-grid col-6";
    document.getElementById("cancelMobile").classList = "d-block btn btn btn-success d-grid col-6";


}

function cancelBtnMobile() {
    document.getElementById("updateMobile").classList = "d-none btn btn btn-success d-grid col-6";
    document.getElementById("cancelMobile").classList = "d-none btn btn btn-success d-grid col-6";
    document.getElementById("mobileNum").classList.toggle("d-none");
    document.getElementById("editMobile").classList.toggle("d-none");

}

function cancelBtnName() {
    document.getElementById("updateName").classList = "d-none btn btn btn-success d-grid col-6";
    document.getElementById("cancelName").classList = "d-none btn btn btn-success d-grid col-6";
    document.getElementById("name").classList.toggle("d-none");
    document.getElementById("editName").classList.toggle("d-none");
    document.getElementById("editName1").classList.toggle("d-none");


}

function editAdress() {

    document.getElementById("addressline").classList.toggle("d-none");
    var ad1 = document.getElementById("editAddress1");
    var ad2 = document.getElementById("editAddress2");

    ad1.classList.toggle("d-none");
    ad2.classList.toggle("d-none");
    ad1.classList = "col-12 mb-1";
    ad2.classList = "col-12";



    document.getElementById("cancelAddress").classList = "d-block btn btn btn-success d-grid col-6";
    document.getElementById("updateAddress").classList = "d-block btn btn btn-success d-grid col-6";
    document.getElementById("edit").classList = "d-none";
}

function canceladdress() {

    document.getElementById("updateAddress").classList = "d-none btn btn btn-success d-grid col-6";
    document.getElementById("cancelAddress").classList = "d-none btn btn btn-success d-grid col-6";
    document.getElementById("addressline").classList.toggle("d-none");
    document.getElementById("editAddress1").classList.toggle("d-none");
    document.getElementById("editAddress2").classList.toggle("d-none");
    document.getElementById("edit").classList = "d-block col-2 btn";


}

function editdiscription() {
    var ad1 = document.getElementById("disabale");
    var ad2 = document.getElementById("notdisable");

    ad1.classList.toggle("d-none");
    ad2.classList.toggle("d-none");

    document.getElementById("cancelDescription").classList = "d-block btn btn btn-success d-grid col-6";
    document.getElementById("updateDescription").classList = "d-block btn btn btn-success d-grid col-6";
    document.getElementById("edit").classList = "d-none";
}

function canceldescription() {
    document.getElementById("cancelDescription").classList = "d-none btn btn btn-success d-grid col-6";
    document.getElementById("updateDescription").classList = "d-none btn btn btn-success d-grid col-6";

    var ad1 = document.getElementById("disabale");
    var ad2 = document.getElementById("notdisable");

    ad1.classList.toggle("d-none");
    ad2.classList.toggle("d-none");

}

function ab() {
    var a = document.getElementById("all_product_image_div");
    a.style = " background-color: #9999;height: 200px;width: 100%;transition-duration: 1s;cursor: pointer; "

}

function cd() {
    // alert("bs");

    document.getElementById("all_product_image_div").style = " background-color:transparent;height: 200px;width: 100%;transition-duration: 1s;";

}

function adminRejister() {
    var e = document.getElementById("email");
    var i = document.getElementById("Id");
    // alert(e.value);
    // alert(i.value);

    var f = new FormData();

    f.append("e", e.value);
    f.append("i", i.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;


            if (t == "success") {
                var a = document.getElementById("a");
                var b = document.getElementById("b");
                var note = document.getElementById("adminSignInNote");
                note.classList = "d-none";



                a.classList.toggle("d-none");
                b.classList.toggle("d-none");

            } else {
                var note = document.getElementById("adminSignInNote");
                note.innerHTML = t;
                note.classList = "d-block alert alert-danger";
            }

        }
    }

    r.open("POST", "adminSignInProcess.php", true);
    r.send(f);

}

function admimVerification() {
    var v = document.getElementById("verificationCode");
    // alert(v.value);
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "sucsess") {
                window.location = "adminPanel.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "adminVerificationProcess.php?v=" + v.value, true);
    r.send();
}

function signInFrist() {
    alert("Pleace sign in frist");
    window.location = "signIn.php";
}

function signOut() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            } else {
                alert(t);
            }


        }
    }
    r.open("GET", "signoutProcess.php", true);
    r.send();
}

function loadDistric() {
    var city = document.getElementById("city").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("distric").innerHTML = t;
        }
    }

    r.open("GET", "loadDistric.php?c=" + city, true)
    r.send();
}

function loadProvince() {
    var distric = document.getElementById("distric").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("province").innerHTML = t;
        }
    }

    r.open("GET", "loadProvince.php?d=" + distric, true)
    r.send();
}

function changeImage() {
    var view = document.getElementById("viweImage");
    var file = document.getElementById("profileimg");

    file.onchange = function() {
        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        view.src = url;
    }

}

function updateMyProfile() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var province = document.getElementById("province");
    var distric = document.getElementById("distric");
    var city = document.getElementById("city");
    var pcode = document.getElementById("pcode");
    var image = document.getElementById("profileimg");

    var f = new FormData();
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("mb", mobile.value);
    f.append("l1", line1.value);
    f.append("l2", line2.value);
    f.append("p", province.value);
    f.append("d", distric.value);
    f.append("c", city.value);
    f.append("pc", pcode.value);

    if (image.files.length == 0) {
        var confriamation = confirm("Are you sure don't want to update profle image?");

        if (confriamation) {
            alert("you have not select any image");
        }
    } else {
        f.append("image", image.files[0]);
    }


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "sucsess") {
                window.location.reload();
            } else {
                alert(t);
            }


        }
    }

    r.open("POST", "updateProfileProcess.php", true);
    r.send(f);

}

function changePwSendVerification(email) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                var btn = document.getElementById("changePwBtn");
                var veri = document.getElementById("changePwVeri");

                btn.classList = "d-none";
                veri.classList = "d-block";
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "ChangePwSendVerifivationProcess.php?e=" + email, true);
    r.send();
}

function loadbrand() {
    var category = document.getElementById("category").value;
    // alert(category);
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("brand").innerHTML = t;
        }
    }

    r.open("GET", "loadbrand.php?c=" + category, true)
    r.send();
}

function loadmodel() {
    var brand = document.getElementById("brand").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("model").innerHTML = t;
            // alert(t);
        }
    }

    r.open("GET", "loadmodel.php?b=" + brand, true);
    r.send();

}

function changeProductImage() {


    var image = document.getElementById("imageuploder");

    image.onchange = function() {


        var file_count = image.files.length;


        if (file_count <= 3) {
            // alert(file_count);
            for (var x = 0; x < file_count; x++) {
                var file = this.files[x];
                var url = window.URL.createObjectURL(file);
                document.getElementById("i" + x).src = url;
            }
        } else {
            alert("please select 3 or less than 3 image ");
        }
    }
}

function addProduct() {
    var title = document.getElementById("title");
    var category = document.getElementById("category");
    var brand = document.getElementById("brand");
    var model = document.getElementById("model");

    var condition = 0;
    if (document.getElementById("b").checked) {
        condition = 1;
    } else if (document.getElementById("u").checked) {
        condition = 2;
    }




    var clr = document.getElementById("clr");
    var qty = document.getElementById("qty");
    var cost = document.getElementById("cost");
    var dcost = document.getElementById("dcost");
    var desc = document.getElementById("desc");
    var image = document.getElementById("imageuploder");


    var f = new FormData();



    f.append("ca", category.value);
    f.append("br", brand.value);
    f.append("mo", model.value);
    f.append("ti", title.value);
    f.append("co", condition);
    f.append("clr", clr.value);
    f.append("qty", qty.value);
    f.append("cost", cost.value);
    f.append("dcost", dcost.value);
    f.append("desc", desc.value);



    var file_count = image.files.length;
    for (var x = 0; x < file_count; x++) {

        f.append("image" + x, image.files[x]);
    }

    var r = new XMLHttpRequest;

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "111") {
                alert("product registration succsessfully");
                window.location.reload();
            } else if (t == "11") {
                alert("product registration succsessfully");
                window.location.reload();
            } else if (t == "1") {
                alert("product registration succsessfully");
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "addProductProcess.php", true);
    r.send(f);


}

function basicSearch(x) {
    // alert("ok");
    var txt = document.getElementById("keyword");
    var select = document.getElementById("category");

    // alert(txt.value);
    // alert(select.value);

    var f = new FormData;

    f.append("t", txt.value);
    f.append("s", select.value);
    f.append("page", x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("basicSearchResult").innerHTML = t;
        }
    }

    r.open("POST", "basicSearchProcess.php", true);
    r.send(f);



}

function catogorybox(id) {
    // alert(id);
    var txt = document.getElementById("keyword");

    var x = 0;

    var f = new FormData();


    f.append("s", id);
    f.append("t", txt.value);


    f.append("page", x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("basicSearchResult").innerHTML = t;
        }
    }

    r.open("POST", "basicSearchProcess.php", true);
    r.send(f);


}

function singleProduct(id) {
    // alert(id);
    window.location = "singleProduct.php?id=" + id;
    var img = document.getElementById("productImg" + 1).src;

    main.style.backgroundImage = "url(" + img + ")";

}

function updateProduct(id) {
    window.location = "updateProduct.php?id=" + id;
    // alert(id);

}

function loadMainImg(id) {
    var emptyImg = document.getElementById("empty-img");
    emptyImg.classList = "d-none";
    var img = document.getElementById("productImg" + id).src;
    var main = document.getElementById("main_img");
    main.style.backgroundImage = "url(" + img + ")";
}


function payNow(id) {





    if (id == 0) {
        qty = 1;
    } else {
        var qty = document.getElementById("qty_input" + id).value;

    }

    var f = new FormData();

    f.append("id", id);
    f.append("qty", qty);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "log in Frist") {
                window.location = "signIn.php";
            } else {
                window.location = "checkout.php?id=" + id + "&qty=" + qty;
                // alert(t);
            }


        }
    }

    r.open("POST", "checkout.php", true);
    r.send(f);

}

// function payNow(id) {

//     alert(id);


//     var qty = document.getElementById("qty_input").value;
//     alert(qty);

//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var t = r.responseText;
//             alert(t);
//             var obj = JSON.parse(t);
//             var mail = obj["mail"];
//             var amount = obj["amount"];
//             var hash = obj["hash"];
//             alert(mail);
//             alert(hash);

//             if (t == "1") {
//                 alert("Pleace log in or sign up");
//                 window.location = "signIn.php";
//             } else if (t == 2) {
//                 alert("Pleace Update your profile");
//                 window.location = "updateProduct.php";
//             } else {
//                 // Payment completed. It can be a successful failure.
//                 payhere.onCompleted = function onCompleted(orderId) {
//                     window.location = "invoice.php";
//                     console.log("Payment completed. OrderID:" + orderId);
//                     saveInvoice(orderId, id, mail, amount, qty);
//                     // Note: validate the payment and show success or failure page to the customer
//                 };

//                 // Payment window closed
//                 payhere.onDismissed = function onDismissed() {
//                     // Note: Prompt user to pay again or show an error page
//                     console.log("Payment dismissed");
//                 };

//                 // Error occurred
//                 payhere.onError = function onError(error) {
//                     // Note: show an error page
//                     console.log("Error:" + error);
//                 };

//                 // Put the payment variables here
//                 var payment = {
//                     "sandbox": true,
//                     "merchant_id": "1221402", // Replace your Merchant ID
//                     "return_url": "http://localhost/eshopf/singleProduct.php?id" + id, // Important
//                     "cancel_url": "http://localhost/eshopf/singleProduct.php?id" + id, // Important
//                     "notify_url": "http://sample.com/notify",
//                     "order_id": obj["id"],
//                     "items": obj["item"],
//                     "amount": amount,
//                     "currency": "LKR",
//                     "hash": hash,
//                     "first_name": obj["fname"],
//                     "last_name": obj["lname"],
//                     "email": mail,
//                     "phone": obj["mobile"],
//                     "address": obj["address"],
//                     "city": obj["city"],
//                     "country": "Sri Lanka",
//                     "delivery_address": obj["address"],
//                     "delivery_city": obj["city"],
//                     "delivery_country": "Sri Lanka",
//                     "custom_1": "",
//                     "custom_2": ""
//                 };

//                 // Show the payhere.js popup, when "PayHere Pay" is clicked
//                 // document.getElementById('payhere-payment').onclick = function(e) {
//                 payhere.startPayment(payment);
//                 // };
//             }
//         }
//     }

//     r.open("GET", "buyNowPocess.php?id=" + id + "&qty=" + qty, true);
//     r.send();

// }


////////////////   Admin Window Change   /////////////////////////////////

function addproduct() {

    var dashboard = document.getElementById("dashboard");
    var addproduct = document.getElementById("addproduct");

    dashboard.classList = "d-none";
    addproduct.classList = "b-block";
}


////////////////   Admin Window Change   /////////////////////////////////

// function updateProductProcess(id) {
//     var title = document.getElementById("title");
//     var qty = document.getElementById("qty");
//     var cost = document.getElementById("cost");
//     var dcost = document.getElementById("dcost");
//     var image = document.getElementById("imageuploder");
//     var desc = document.getElementById("desc");



//     var f = new FormData();
//     f.append("pid", id);
//     f.append("t", title.value);
//     f.append("cost", cost.value);
//     f.append("dcost", dcost.value);
//     f.append("desc", desc.value);
//     f.append("qty", qty.value);

//     var file_count = image.files.length;
//     for (var x = 0; x < file_count; x++) {

//         f.append("image" + x, image.files[x]);
//     }

//     alert(image);
//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var t = r.responseText;
//             alert(t);
//         }
//     }
//     r.open("POST", "updateProductProcess.php", true);
//     r.send(f);


// }

function updateProductProcess(id) {
    // alert("done");

    var title = document.getElementById("title");
    var qty = document.getElementById("qty");
    var cost = document.getElementById("cost");
    var dcost = document.getElementById("dcost");
    var images = document.getElementById("imageuploder");

    // alert(title.value);
    var f = new FormData;
    f.append("pid", id);

    f.append("t", title.value);
    f.append("q", qty.value);
    f.append("cost", cost.value);
    f.append("dcost", dcost.value);
    f.append("desc", desc.value);

    var img_count = images.files.length;

    for (var x = 0; x < img_count; x++) {
        f.append("i" + x, images.files[x]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var t = this.responseText;

            if (t == "successsuccess") {

                alert("update succes");

                window.location.reload();
            } else {

                alert(t);
            }

        }
    }

    r.open("POST", "updateProductProcess.php", true);
    r.send(f);




}

function addCart(pid) {
    // alert(pid);
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "1") {
                window.location.reload();
                // alert(t);
            } else if (t == "2") {
                // alert(t);
                window.location.reload();
            } else if ("Pleace Log In Frist") {
                alert(t);

                window.location = "signIn.php";
            }
        }
    }
    r.open("GET", "addCartProcess.php?pid=" + pid, true);
    r.send();
}

function addfeedback(pid) {
    var t = document.getElementById("t");

    var f = new FormData();

    f.append("pid", pid);
    f.append("text", t.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Feedback Send Succesfuly") {
                alert(t);
                window.location.reload();

            } else {
                alert(t);
            }
        }
    }
    r.open("POST", "addFeedbackProcess.php", true);
    r.send(f);
}

function addstar(star) {
    var pid = document.getElementById("product_id").value;


    var f = new FormData();
    f.append("star_id", star);
    f.append("pid", pid);
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Pleace Log In Frist") {
                window.location = "signIn.php";
            } else if (t == "done") {
                alert("Star Send Sucsess...!");
                window.location.reload();
            }
        }
    }
    r.open("POST", "addStarProcess.php", true);
    r.send(f);
}

function advansSerch(page) {
    // alert("ok");
    window.location = "advanceSearch.php";
}

function advansSerchBtn(page) {
    var text = document.getElementById("text");
    var category = document.getElementById("category");
    var brand = document.getElementById("brand");
    var model = document.getElementById("model");
    var price_HtoL = document.getElementById("priceHtoL");
    var from = document.getElementById("from");
    var to = document.getElementById("to");
    var con = document.getElementById("con");
    var clr = document.getElementById("clr");

    // alert(text.value);
    // alert(category.value);

    // alert(brand.value);
    // alert(model.value);
    // alert(price_HtoL.value);
    // alert(from.value);
    // alert(to.value);
    // alert(con.value);
    // alert(clr.value);



    var f = new FormData();

    f.append("text", text.value);
    f.append("category", category.value);
    f.append("brand", brand.value);
    f.append("model", model.value);
    f.append("priceH_to_L", price_HtoL.value);
    f.append("from", from.value);
    f.append("to", to.value);
    f.append("con", con.value);
    f.append("clr", clr.value);
    f.append("page", page);
    // alert(page);



    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            // alert(t);
            var result_area = document.getElementById("searchResult");
            result_area.innerHTML = t;
        }
    }

    r.open("POST", "advanceSearchProcess.php", true);
    r.send(f);



}
F

function invoice() {


    var invoice_id = document.getElementById("invoice_id").value;
    // alert(invoice_id);

    window.location = "invoice.php?invoice_id=" + invoice_id;


}

function prinInvoice() {
    var body = document.body.innerHTML;
    var page = document.getElementById("page").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = body;

}

function exportPdf() {
    var body = document.body.innerHTML;
    var page = document.getElementById("page").innerHTML;
    // document.body.innerHTML = page;
    // // window.exportPdf
    // document.body.innerHTML = body;

    html2pdf()
        .from(page)
        .save();
}




function cartSelectAll() {

    var a = document.getElementById("select_all").checked;
    var status;
    if (a == true) {
        status = 1;
    } else {
        status = 2;
    }


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            window.location.reload();






        }
    }

    r.open("GET", "slectAllCartProduct.php?states=" + status, true);
    r.send();

}

function cart() {
    window.location = "cart.php";
}

function cart_qty_update(id) {
    // alert("t");


    var avqty = document.getElementById("availble_qty" + id).value;
    var qty = document.getElementById("qty_input" + id);



    var f = new FormData();

    f.append("id", id);
    f.append("pqty", qty.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            // alert(t);
            if (t == "") {
                document.getElementById("qty_input" + id).value = 1;


            } else if (t == "heigh") {
                document.getElementById("qty_input" + id).value = avqty.toString();
                alert("Maximum quntity has achieved");


            }
            window.location.reload();

        }
    }
    r.open("POST", "updateCartQtyProcess.php", true);
    r.send(f);

}

function changestatesCart() {

    var id = 1;
    var r = new XMLHttpRequest();


    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;


        }
    }

    r.open("GET", "cartUncheckProcess.php?id=" + id, true);
    r.send();
}

function cartingleProduct(id) {

    var a = document.getElementById("select").checked;

    var status;
    if (a == true) {
        status = 1;

    } else {
        status = 2;

    }

    var f = new FormData();

    f.append("pid", id);
    f.append("status", status);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            window.location.reload();

        }
    }

    r.open("POST", "cartsingleProductStatuProcess.php", true);
    r.send(f);
}

function removeCartProduct(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "done") {
                alert(t);
                window.location.reload();
            }
        }
    }
    r.open("GET", "removeCardProductProcess.php?pid=" + id, true);
    r.send();
}

function Dashboard() {
    var Dashboard = document.getElementById("Dashboard");
    var NewOrder = document.getElementById("NewOrder");
    var Packing = document.getElementById("Packing");
    var Shipping = document.getElementById("Shipping");
    var dileverd = document.getElementById("dileverd");

    Dashboard.classList = "d-block";
    NewOrder.classList = "d-none";
    Packing.classList = "d-none";
    Shipping.classList = "d-none";
    dileverd.classList = "d-none";


}

function NewOrder() {
    var Dashboard = document.getElementById("Dashboard");
    var NewOrder = document.getElementById("NewOrder");
    var Packing = document.getElementById("Packing");
    var Shipping = document.getElementById("Shipping");
    var dileverd = document.getElementById("dileverd");

    Dashboard.classList = "d-none";
    NewOrder.classList = "d-block";
    Packing.classList = "d-none";
    Shipping.classList = "d-none";
    dileverd.classList = "d-none";
}

function Packing() {
    var Dashboard = document.getElementById("Dashboard");
    var NewOrder = document.getElementById("NewOrder");
    var Packing = document.getElementById("Packing");
    var Shipping = document.getElementById("Shipping");
    var dileverd = document.getElementById("dileverd");

    Dashboard.classList = "d-none";
    NewOrder.classList = "d-none";
    Packing.classList = "d-block";
    Shipping.classList = "d-none";
    dileverd.classList = "d-none";
}

function Shipping() {
    var Dashboard = document.getElementById("Dashboard");
    var NewOrder = document.getElementById("NewOrder");
    var Packing = document.getElementById("Packing");
    var Shipping = document.getElementById("Shipping");
    var dileverd = document.getElementById("dileverd");

    Dashboard.classList = "d-none";
    NewOrder.classList = "d-none";
    Packing.classList = "d-none";
    Shipping.classList = "d-block";
    dileverd.classList = "d-none";
}

function Dileverd() {
    var Dashboard = document.getElementById("Dashboard");
    var NewOrder = document.getElementById("NewOrder");
    var Packing = document.getElementById("Packing");
    var Shipping = document.getElementById("Shipping");
    var dileverd = document.getElementById("dileverd");

    Dashboard.classList = "d-none";
    NewOrder.classList = "d-none";
    Packing.classList = "d-none";
    Shipping.classList = "d-none";
    dileverd.classList = "d-block";
}

function changeStatustoPaking(id) {

    s = 1;
    var f = new FormData();


    f.append("pid", id);
    f.append("status", s);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "done") {
                window.location.reload();

            }
        }
    }


    r.open("POST", "invoiceStatusChangeProcess.php", true);
    r.send(f);

}

function changeStatustoShipping(id) {
    s = 2;
    var f = new FormData();


    f.append("pid", id);
    f.append("status", s);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "done") {
                window.location.reload();

            }
        }
    }


    r.open("POST", "invoiceStatusChangeProcess.php", true);
    r.send(f);
}

function changeStatustoDeliverd(id) {
    s = 3;
    var f = new FormData();


    f.append("pid", id);
    f.append("status", s);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "done") {
                window.location.reload();

            }
        }
    }


    r.open("POST", "invoiceStatusChangeProcess.php", true);
    r.send(f);
}

function changeStatustoHide(id) {
    s = 4;
    var f = new FormData();


    f.append("pid", id);
    f.append("status", s);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "done") {
                window.location.reload();

            }
        }
    }


    r.open("POST", "invoiceStatusChangeProcess.php", true);
    r.send(f);
}

function activeDeactiveProduct(pid) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "done") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "activeeactiveProductProcess.php?pid=" + pid, true);
    r.send();
}

function manageProductSearch(page) {

    var text = document.getElementById("text");
    var category = document.getElementById("category");
    var brand = document.getElementById("brand");
    var model = document.getElementById("model");

    var status = "0";

    if (document.getElementById("active").checked) {
        status = "1";
    } else if (document.getElementById("deactive").checked) {
        status = "2";
    }

    var qty = "0";

    if (document.getElementById("l_h_qty").checked) {
        qty = "1";
    } else if (document.getElementById("l_h_qty").checked) {
        qty = "2";
    }

    var condition = "0";

    if (document.getElementById("used").checked) {
        condition = "1";
    } else if (document.getElementById("brandnew").checked) {
        condition = "2";
    }

    var f = new FormData();

    f.append("text", text.value);
    f.append("category", category.value);
    f.append("brand", brand.value);
    f.append("model", model.value);
    f.append("status", status);
    f.append("qty", qty);
    f.append("condition", condition);
    f.append("page", page);
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            alert(t);
            document.getElementById("Product").innerHTML = t;
        }
    }

    r.open("POST", "manageProductSearchProcess.php", true);
    r.send(f);




}

function coustomerBlockUnblock(umail) {


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "done") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "coustomerBlockUnblockProcess.php?uid=" + umail, true);
    r.send();

}

function coustomerSearch() {
    var text = document.getElementById("text");
    var page = 1;
    var status = "0";

    if (document.getElementById("block").checked) {
        status = "2";
    } else if (document.getElementById("unblock").checked) {
        status = "1";
    }






    var f = new FormData();
    f.append("text", text.value);
    f.append("status", status);

    f.append("page", page);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            alert(t);
            document.getElementById("result_area").innerHTML = t;
        }
    }

    r.open("POST", "coustomerSearchProcess.php", true);
    r.send(f);

}

function addNewCategory() {

    var categroy = document.getElementById("newcategory");
    var image = document.getElementById("profileimg");

    var f = new FormData();

    f.append("category", categroy.value);

    if (image.files.length == 0) {
        var confriamation = confirm("Are you sure don't want to update profle image?");

        if (confriamation) {
            alert("you have not select any image");
        }
    } else {
        f.append("image", image.files[0]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "done") {
                alert("Upload Sucsess");

                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "updateNewCateoryProcess.php", true);
    r.send(f);



}

function uploadNewBrand() {
    var category_id = document.getElementById("brand_c_id");
    var newBrand = document.getElementById("new_brand");

    var f = new FormData();

    f.append("category_id", category_id.value);
    f.append("newbrand", newBrand.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState = 4 && r.status == 200) {
            var t = r.responseText;

            if (t == "done") {

                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "uploadNewrandProcess.php", true);
    r.send(f);

}

function upload_new_model() {


    var model_brand_id = document.getElementById("model_brand_id");
    var newModel = document.getElementById("new_model");


    var f = new FormData();


    f.append("brand_id", model_brand_id.value);
    f.append("newMoodel", newModel.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "done") {
                alert("Upload Sucsess");

                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "uploadNewModelProsess.php", true);
    r.send(f);
}

function uploadColour() {
    var color = document.getElementById("colour").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "done") {
                alert("Upload Sucsess");

                window.location.reload();
            } else {
                alert(t);
            }
        }
    }


    r.open("GET", "udaloadCoulorProcess.php?c=" + color, true);
    r.send();
}

function adminLog_out() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "adminSignIn.php";
            } else {
                alert(t);
            }


        }
    }
    r.open("GET", "adminSignoutProcess.php", true);
    r.send();
}

function indexMsg(status) {


    var name = document.getElementById("name");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var comment = document.getElementById("comment");


    var f = new FormData();
    f.append("name", name.value);
    f.append("email", email.value);
    f.append("mobile", mobile.value);
    f.append("comment", comment.value);
    f.append("status", status);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;

            if (t == "Sucsess") {
                window.location.reload();
                alert("Massage Send");

            }
        }
    }


    r.open("POST", "indexPageCommentProcess.php", true);
    r.send(f);



}

function deletComment(id) {


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            alert(t);
            if (t = "done") {
                window.location.reload();
            }
        }
    }
    r.open("GET", "deletCommentProcess.php?id=" + id, true);
    r.send();


}

function sendNotification() {
    var head = document.getElementById("head");
    var notification = document.getElementById("notification");

    var f = new FormData();

    f.append("head", head.value);
    f.append("notification", notification.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "done") {
                window.location.reload();

            } else {
                alert(t);
            }
        }
    }
    r.open("POST", "uploadNotificatonProcess.php", true);
    r.send(f);

}

function checkValue(qty) {
    var input = document.getElementById("qty_input");

    if (input.value <= 0) {
        alert("Quantitu must be 1 or more");
        input.value = 1;
    } else if (input.value > qty) {
        alert("Maximum quntity achived");
        input.value = qty;
    }
}

function qty_inc(qty) {
    var input = document.getElementById("qty_input");
    if (input.value < qty) {
        var newValue = parseInt(input.value) + 1;
        input.value = newValue.toString();

    } else {
        alert("Maximum quntity has achieved");
        input.value = qty;
    }
}

function qty_dec(qty) {
    var input = document.getElementById("qty_input");
    if (input.value < qty) {
        var newValue = parseInt(input.value) - 1;
        input.value = newValue.toString();

    } else {
        alert("Minimum quntity has achieved");
        input.value = 1;
    }
}

function addwatchlist(pid) {
    // alert(id);
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "1") {
                window.location.reload();
                // alert(t);
            } else if (t == "2") {
                // alert(t);
                window.location.reload();
            } else if ("Pleace Log In Frist") {
                alert(t);

                window.location = "signIn.php";
            }
        }
    }
    r.open("GET", "addwatchlistProcess.php?pid=" + pid, true);
    r.send();



}

function removeWatchlist(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "done") {
                alert(t);
                window.location.reload();
            }
        }
    }
    r.open("GET", "removewatchlistProductProcess.php?pid=" + id, true);
    r.send();
}
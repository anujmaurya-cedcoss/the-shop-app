$(document).ready(function () {
    // action on sign-in submit
    $(document).on('click', ".register-btn", function () {
        name1 = $(".form-name").val();
        mail = $(".form-email").val();
        pass = $(".form-pass").val();
        repass = $(".form-repass").val();
        address = $(".form-address").val();
        console.log(name1);
        // if (!validateName(name1)) {
        //     // show name error
        //     $(".form-name").css('border-color', 'red');
        //     $(".form-email").css('border-color', 'black');
        //     $(".form-repass").css('border-color', 'black');
        // } else if (!validateEmail(mail)) {
        //     // show e-mail error message
        //     $(".form-email").css('border-color', 'red');
        //     $(".form-name").css('border-color', 'black');
        //     $(".form-repass").css('border-color', 'black');
        // } else if (!pass == repass || (pass.length < 1) || (repass.length < 1)) {
        //     // show password error
        //     $(".form-repass").css('border-color', 'red');
        //     $(".form-email").css('border-color', 'black');
        //     $(".form-name").css('border-color', 'black');
        // } else {

        // make an ajax call
        $.ajax({
            type: "POST",
            url: "./db_conn_signup.php",
            data: { 'name': name1, 'mail': mail, 'pass': pass, 'address': address },
            dataType: 'text',
            success: function (result) {
                window.location.href = "./login.php";
            }
        });
        // }
    });
    // action on log-in button click
    $(document).on('click', '.login-btn', function () {
        mail = $(".login-email").val();
        pass = $(".login-pass").val();

        jQuery.ajax({
            type: "POST",
            url: "./db_conn_login.php",
            data: { 'mail': mail, 'pass': pass },
            dataType: 'text',
            success: function (res) {
                console.log(res);
                if (res == 'success') {
                    window.location.href = "../index.php";
                } else {
                    // show the error message
                    $('.login-error').html("Either you're not yet verified<br>or Invalid Credentials");
                }
            }
        })
    });

    if (typeof $.cookie('user') != 'undefined') {
        $('.log-in-btn').hide();
        $(".sign-in-btn").hide();
        $(".sign-out-btn").show();
        $(".my-orders-btn").show();
    }

    // add to wishlist 
    $(document).on('click', ".add-to-wishlist", function () {
        id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "./add_to_wishlist.php",
            data: { 'id': id },
            dataType: "text",
            success: function (res) {
                console.log(res);
            }
        })
    })
    // delete from wishlist
    $(document).on('click', '.delete-from-cart', function () {
        id = $(this).attr('id');
        $.ajax({
            // add_to_wishlist is able to handle both add, and delete request
            type: "POST",
            url: "./add_to_wishlist.php",
            data: { 'id': id },
            dataType: 'text',
            success: function (res) {
                console.log(res);
            }
        })
    })

    // add to cart 
    $(document).on('click', ".add-to-cart", function () {
        id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "./add_to_cart.php",
            data: { 'id': id },
            dataType: "text",
            success: function (res) {
                console.log(res);
            }
        })
    })


    // show product
    $(document).on('click', '.product', function () {
        console.log('show product');
        id = $(this).attr('id');
        console.log(id);
        $.ajax({
            type: "POST",
            url: "../process_show_product.php",
            data: { 'id': id },
            dataType: "text",
            success: function (res) {
                window.location.href = "./show_product.php";
            }
        })
    })

    // increment quantity
    $(document).on('click', '.increment-quantity', function () {
        console.log('increment clicked!');
        console.log($(this).id);
    })

    // admin login
    $(document).on('click', '.admin-login-btn', function() {
        // console.log('admin login called');
        // uname = $(".admin-login-name").val();
        // pass = $(".admin-login-email").val();

        // $.ajax({
        //     type : 'POST',
        //     url : './admin_login_process.php',
        //     data : {'type' : 'login', 'uname' : uname, 'pass' : pass},
        //     dataType : 'text',
        //     success : function(res) {
        //         if(res == 'success') {
        //             window.location.href = './admin_main.php';
        //         } else {
        //             $('.login-error').html("invalid credentials !");
        //         }
        //     }
        // })
    })
});

function increment(id) {
    $.ajax({
        type: "POST",
        url: "../actions.php",
        data: { 'id': id, 'type': 'increment' },
        dataType: 'text',
        success: function (res) {
            window.location.href = './show_cart.php';
        }

    })
}

function decrement(id) {
    $.ajax({
        type: "POST",
        url: "../actions.php",
        data: { 'id': id, 'type': 'decrement' },
        dataType: 'text',
        success: function (res) {
            window.location.href = "./show_cart.php";
        }
    })
}

// delete from cart
function del(id) {
    $.ajax({
        type: "POST",
        url: "../actions.php",
        data: { 'id': id, 'type': 'delete' },
        dataType: 'text',
        success: function (res) {
            console.log(res);
            // window.location.href = "./show_cart.php";
        }
    })
}

// empty cart
function emptyCart() {
    $.ajax({
        type: "POST",
        url: '../actions.php',
        data: { 'type': 'emptyCart' },
        dataType: 'text',
        success: function () {
            // display cart
        }
    })
}
// checkout cart
function checkoutCart() {
    $.ajax({
        type: "POST",
        url: "../actions.php",
        data: { 'type': 'checkout' },
        dataType: 'text',
        success: function (res) {
            console.log(res);
            if (res == 'false') {
                window.location.href = '../login.php';
            }
            if(res == 'true'){
                window.location.href = '../checkout.php';
            }
        }
    })
}

// action on sign-out button
$(document).on('click', '.sign-out-btn', function () {
    $.ajax({
        type: "POST",
        url: "../signout.php",
        success: function (res) {
            console.log(res);
            window.location.href = '../index.php';
        }
    })
})

// JS for admin
function admin_view(){
    $.ajax({
        type: "POST",
        url: "../admin_actions.php",
        data: {"type":"top_user"},
        dataType: "text",
    }).done(function (result){
        $("#user_table_body").html(result);
    })
    $.ajax({
        type: "POST",
        url: "../admin_actions.php",
        data: {"type":"top_product"},
        dataType: "text",
    }).done(function (result){
        $("#product_table_body").html(result);
    })
    $.ajax({
        type: "POST",
        url: "../admin_actions.php",
        data: {"type":"top_order"},
        dataType: "text",
    }).done(function (result){
        $("#order_table_body").html(result);
    })
}
admin_view();


// everything related to adding, updating, and deleting the product
$("#update_product").hide()
function add_product(){
    let title = $("#product_title").val();
    let price = $("#product_price").val();
    let description = $("#product_description").val();
    let category = $("#product_category").val();
    let image = $("#product_image").val();
    let quantity = $("#product_quantity").val();
    $.ajax({
        type: "POST",
        url: "/products_action_admin.php",
        data: {"type":"add","title":title,"price":price,"description":description, "category": category,"quantity":quantity,"image":image},
        dataType: "text",
    }).done(function (result){
        // console.log(result);
        products();
    })
}
let idx;
function edit_product(val){
    product_var = val;
    $.ajax({
        type: "POST",
        url: "/products_action_admin.php",
        data: {"type":"edit","id":val},
        dataType: "text",
    }).done(function (result){
        result = JSON.parse(result)
        $("#product_title").val(result["title"])
        $("#product_price").val(result["price"])
        $("#product_description").val(result['description'])
        $("#product_category").val(result["category"])
        $("#product_image").val(result["image"])
        $("#product_quantity").val(result["quantity_remaining"])
        idx = result['prod_id'];
        $("#update_product").show()
        $("#add_product").hide();
    })
}
function update_product(){
    let title = $("#product_title").val();
    let price = $("#product_price").val();
    let description = $("#product_description").val();
    let category = $("#product_category").val();
    let image = $("#product_image").val();
    let quantity = $("#product_quantity").val();
    $.ajax({
        type: "POST",
        url: "/products_action_admin.php",
        data: {"type":"update","id":idx,"title":title,"price":price, "description":description,"category":category,"image":image, "quantity" : quantity},
        dataType: "text",
    }).done(function (result){
        $("#update_product").hide()
        products()
    })
}
function delete_product(id){
    $.ajax({
        type: "POST",
        url: "/products_action_admin.php",
        data: {"type":"delete","id":id},
        dataType: "text",
    }).done(function (result){
        console.log(result);
        products()
    })
}
function products(){
    $.ajax({
        type: "POST",
        url: "/products_action_admin.php",
        data: {"type":"display"},
        dataType: "text",
    }).done(function (result){
        // console.log(result);
        $("#alter_product_table_body").html(result);
    })
}
products()

// every action related to users (by admin)
$("#user_update_panel").hide()
let uid = 0
function edit_user(val){
    uid = val
    $.ajax({
        type: "POST",
        url: "/user_details_admin.php",
        data: {"type":"edit","id":val},
        dataType: "text",
    }).done(function (result){
        result = JSON.parse(result)
        $("#user_name").val(result["name"])
        $("#user_email").val(result["email"])
        $("#user_password").val(result["password"])
        $("#user_address").val(result["address"])
        $("#user_status").val(result["status"])
        $("#user_update_panel").show()
    })
}
function update_user(){
    let id = uid
    let status = $("#user_status").val();
    $.ajax({
        type: "POST",
        url: "/user_details_admin.php",
        data: {"type":"update","id":id,"status":status},
        dataType: "text",
    }).done(function (result){
        console.log(result)
        $("#user_update_panel").hide()
        users()
    })
}
function delete_user(id){
    $.ajax({
        type: "POST",
        url: "/user_details_admin.php",
        data: {"type":"delete","id":id},
        dataType: "text",
    }).done(function (result){
        users()
    })
}
function users(){
    $.ajax({
        type: "POST",
        url: "/user_details_admin.php",
        data: {"type":"display"},
        dataType: "text",
    }).done(function (result){
        $("#alter_user_table_body").html(result);
    })
}
users()
$(document).ready(function() {
    $(document).on('click', "all-orders", function() {
        window.location.href = './all_orders.php';
    })
})

function displayAllOrders() {
    console.log('all order called');
    $.ajax({
        type : 'POST',
        url : '/all_orders_details.php',
        data : {'type' : 'display'},
        dataType : 'text',
        success : function(res) {
            $(".all-orders-list").html(res);
        }
    })
}
displayAllOrders();

// admin login
function adminLogin() {
    console.log('admin login called');
    uname = $(".admin-login-name").val();
    pass = $(".admin-login-email").val();

    $.ajax({
        type : 'POST',
        url : './admin_login_process.php',
        data : {'type' : 'login', 'uname' : uname, 'pass' : pass},
        dataType : 'text',
        success : function(res) {
            if(res == 'success') {
                window.location.href = './admin_main.php';
            } else {
                $('.login-error').html("invalid credentials !");
            }
        }
    })
}
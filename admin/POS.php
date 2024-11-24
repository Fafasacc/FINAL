<?php
// Start the session to check login status
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not logged in, redirect to the login page
    header("Location : login.html");
    exit();      
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="icon" href="assets/images/favicon/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="assets/images/favicon/favicon.png" type="image/x-icon">
  <title>Inventory</title>
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
    rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

  

  <!-- ico-font-->
  <link rel="stylesheet" type="text/css" href="assets/css/vendors/icofont.css">
  <!-- Themify icon-->
  <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify.css">
  <!-- Flag icon-->
  <link rel="stylesheet" type="text/css" href="assets/css/vendors/flag-icon.css">
  <!-- Feather icon-->
  <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">
  <link rel="stylesheet" type="text/css" href="assets/css/vendors/scrollbar.css">
  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">
  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="assets/css/notification.css">


  <style>
/* Position the notification badge to the right of the bell */
.notification-box {
    position: relative;
    display: inline-block;
}

.notification-badge {
    position: absolute;
    top: -5px;
    right: -11px;
    background-color: red;  /* Set the background color to red */
    color: white;  /* Set the text color to white */
    font-size: 12px;  /* Adjust font size */
    width: 18px;  /* Set width of the badge */
    height: 18px;  /* Set height of the badge */
    border-radius: 50%;  /* Make the badge circular */
    text-align: center;
    line-height: 18px;  /* Vertically center the number */
    font-weight: bold;  /* Make the number bold */
    display: flex;
    justify-content: center;
    align-items: center;
}
  </style>
</head>

<body>
  <!-- tap on top starts-->
  <div class="tap-top"><i data-feather="chevrons-up"></i></div>
  <!-- tap on tap ends-->

  <!-- page-wrapper Start-->
  <div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->



    <div class="page-header">
      <div class="header-wrapper row m-0">

        <div class="header-logo-wrapper col-auto p-0">
          <div class="toggle-sidebar" checked="checked"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" class="feather feather-grid status_toggle middle sidebar-toggle">
              <rect x="3" y="3" width="7" height="7"></rect>
              <rect x="14" y="3" width="7" height="7"></rect>
              <rect x="14" y="14" width="7" height="7"></rect>
              <rect x="3" y="14" width="7" height="7"></rect>
            </svg></div>
          <div class="logo-header-main"><a href="index.php"><img class="img-fluid for-light img-100"
                src="assets/images/logo/logo.png" alt=""><img class="img-fluid for-dark"
                src="assets/images/logo/logo.png" alt=""></a></div>
        </div>



        <div class="left-header col horizontal-wrapper ps-0">
          <div class="left-menu-header">

            <h3>Inventory > POS/Invoice</h3>
            <ul class="app-list">

              <li class="onhover-dropdown">

              </li>
            </ul>

          </div>
        </div>

        <div class="nav-right col-6 pull-right right-header p-0">

        <ul class="nav-menus">
            <li>

            </li>

            <li>
              
           
 
           <li class="onhover-dropdown">
    <div class="notification-box" onclick="toggleDropdown()">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
            <path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"></path>
        </svg>
        <span id="notification-badge" class="notification-badge">0</span> <!-- Notification badge -->
    </div>
    <ul id="notification-dropdown" class="notification-dropdown custom-notification-dropdown onhover-show-div" style="display: none;">
        <li class="notification-header">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                <path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"></path>
            </svg>
            <h6 class="f-18 mb-0">Notifications</h6>
        </li>
        <!-- Notification items will be inserted here -->
    </ul>
</li>


             
            
            
          

        </div>
        <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">{{name}}</div>
            </div>
            </div>
          </script>
        <script class="empty-template"
          type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
      </div>
    </div>
    <!-- Page Header Ends-->
    <!-- Page Body Start-->
    <div class="page-body-wrapper">
      <!-- Page Sidebar Start-->
      <div class="sidebar-wrapper">
        <div>
          <div class="logo-wrapper"><a href="index.php"><img class="img-fluid for-light"
                src="assets/images/logo/logo.png" style="max-width: 150px; padding-top:15px ; " alt=""></a>
            <div class="back-btn"><i data-feather="grid"></i></div>
            <div class="toggle-sidebar icon-box-sidebar"><i class="status_toggle middle sidebar-toggle"
                data-feather="grid"> </i></div>
          </div>
          <div class="logo-icon-wrapper"><a href="index.php">
              <div class="icon-box-sidebar"><i data-feather="grid"></i></div>
            </a></div>
          <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
              <ul class="sidebar-links" id="simple-bar">
                <li class="back-btn">
                  <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                      aria-hidden="true"></i></div>
                </li>
                <li class="pin-title sidebar-list">
                  <h6>Pinned</h6>
                </li>
                <hr>
                 
                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav"
                    href="index.php"><i data-feather="home"> </i><span>Dashboard</span></a></li>



                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title ink-nav"
                    href="javascript:void(0)"><i data-feather="user"></i><span class="">Administration</span></a>
                  <ul class="sidebar-submenu">
                    <li><a class="" href="administration.php">Administration</a></li>
                    <li><a class="" href="user_management.php">User Management</a></li>
                    
                  </ul>
                </li>

                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title ink-nav"
                    href="javascript:void(0)"><i data-feather="database"></i><span class="">Inventory</span></a>
                  <ul class="sidebar-submenu">
                    <li><a class="" href="inventory.php">inventory</a></li>
                    <li><a class="" href="product.php">Product</a></li>
                    <li><a class="" href="POS.php">POS/Invoice</a></li>
                    <li><a class="" href="Report.php">Report</a></li>
                  </ul>
                </li>

                
                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav"
                href="History.php"><i data-feather="file-text"> </i><span>Transaction History</span></a></li>
                
                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav"
                    href="records.php"><i class="fa-solid fa-box-archive fa-lg" style="color: #ffffff;"></i><span style="padding-left: 15px;">Patient Records</span></a></li>


                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav"
                    href="appointment.php"><i data-feather="calendar"> </i><span>My Appointment</span></a></li>
                    <li class="sidebar-list sidebar-logout">
                      <a class="sidebar-link sidebar-title link-nav" href="#logoutModal" data-bs-toggle="modal">
                          <i data-feather="log-out"></i>
                          <span>Logout</span>
                      </a>
                  </li>
                  



              </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
          </nav>
        </div>
      </div>
      <!-- Page Sidebar Ends-->





    
<!-- CONTENT -->
<div class="page-body">
  <div class="container-fluid">
    <div class="row">
      <!-- Left Card: Products -->
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <h3>Products</h3>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  
                </div>
                <input class="form-control" type="text" id="productSearch" placeholder="Search for products" oninput="fetchProducts()">
              </div>
            </div>

            <!-- Scrollable Table -->
            <div class="scrollable-table">
              <table class="table">
                <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="product-table-body">
                  <tr>
                    <td colspan="4" class="text-center">No products in the cart</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Card: Walk-In Customer -->
      <!-- Right Card: Walk-In Customer -->
<div class="col-md-4">
  <div class="card">
    <div class="card-header pb-0">
      <h3>Cart</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive mb-3 scrollable-cart-table">
        <table class="table">
          <thead>
            <tr>
              <th>Product</th>
              <th>Price</th>
              <th>Qty</th>
              <th>Subtotal</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="cart-table-body">
            <tr>
              <td colspan="4" class="text-center">No products in the cart</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="mb-3">
        <h5>Grand Total: <span id="grand-total">0.00</span> pesos</h5>
      </div>
    </div>
    <div class="card-footer">
      <button class="btn btn-danger me-2" id="resetCart">Reset</button>
      <button class="btn btn-success" type="button" id="payNowButton" data-bs-toggle="modal" data-bs-target="#paymentModal">Pay Now</button>
    </div>
  </div>
</div>

    </div>
  </div>
</div>
<!-- Combined Receipt Modal -->
<div class="modal fade" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="receiptModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="receipt-content" style="font-family: 'Courier New', Courier, monospace; max-height: 700px; overflow-y: auto;">
        
        <!-- Business Header -->
        <div style="text-align: center; border-bottom: 1px dashed #000; padding-bottom: 10px; margin-bottom: 10px;">
          <h4 style="margin: 0;">Kalb Qitta Veterinary Clinic & Pet Salon</h4>
          <p style="margin: 0;">96, Bigfoot Bldg., By Pass Rd.</p>
          <p style="margin: 0;">Sta. Clara, Santa Maria, 3022 Bulacan</p>
          <p style="margin: 0;">Phone: 09226241327</p>
        </div>

        <!-- Receipt Details -->
        <h4 style="text-align: center; margin-top: 10px;">Receipt Details</h4>

        <br>
        <p><strong>Date:</strong> <span id="receipt-date"></span></p>

        <!-- Receipt Items -->
        <div>
          <p style="text-align: center;">-------------------------------------</p>
          <table class="table mt-3" style="width: 100%; font-size: 14px;">
            <thead>
              <tr>
                <th>Service/Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody id="receipt-items">
              <!-- Receipt items will be injected here dynamically -->
            </tbody>
          </table>
          <p style="text-align: center;">-------------------------------------</p>
        </div>

        <!-- Totals Section -->
        <div style="text-align: right; margin-top: 10px;">
          <p style="font-weight: bold; border-top: 1px dashed #000; padding-top: 5px;">TOTAL: <span id="receipt-total">0.00</span> pesos</p>
        </div>

        <!-- Payment Details -->
        <div style="margin-top: 15px;">
          <p>Payment Method: <span id="payment-method">Cash</span></p>
          <p>Received Amount: <span id="receipt-received-amount">0.00</span> pesos</p>
          <p>Change: <span id="receipt-change">0.00</span> pesos</p>
        </div>

        <!-- Footer Note -->
        <div style="text-align: center; border-top: 1px dashed #000; padding-top: 10px; margin-top: 10px;">
          <p>Thank You For Supporting</p>
          <p>Local Business!</p>
        </div>

      </div>
      
      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger me-2" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="print-receipt-button">Print Receipt</button>
      </div>
    </div>
  </div>
</div>


<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="paymentModalLabel">Create Payment</h5>
        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <!-- Left Side: Payment Inputs -->
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" for="receiveAmount">Receive Amount</label>
              <input class="form-control" id="receiveAmount" type="text" placeholder="Enter received amount" oninput="calculateChange()">
            </div>
            <div class="mb-3">
              <label class="form-label" for="payingAmount">Paying Amount</label>
              <input class="form-control" id="payingAmount" type="text" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label" for="change">Change</label>
              <input class="form-control" id="change" type="text" value="0.00" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label" for="paymentChoice">Payment Choice</label>
              <select class="form-control select-arrow" id="paymentChoice">
                <option>Cash</option>
                <!-- Additional payment methods can go here -->
              </select>
            </div>
          </div>

          <!-- Right Side: Order Summary -->
          <div class="col-md-6">
            <ul class="list-group">
              <li class="list-group-item">Total Products: <span id="total-products-count">0</span></li>
              <li class="list-group-item">Grand Total: <span id="modal-grand-total">0.00</span> pesos</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" onclick="payExact()">Pay Exact Amount</button>
        <button type="button" class="btn btn-success" onclick="submitPayment()">Submit</button>
        
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
let cart = [];
let grandTotal = 0;
let productStock = {}; // Track available stock for each product by product ID
 console.log(productStock);

// Fetch products and update stock tracking// Fetch products and update stock tracking
function fetchProducts() {
    const search = $('#productSearch').val();
    $.ajax({
        url: 'fetch_products.php',
        type: 'GET',
        data: { search: search },
        success: function(data) {
            // Update the table body with the data fetched from the server
            $('#product-table-body').html(data);  // Use .html() instead of .php()

            // Update productStock with data fetched from the server
            $('.add-to-cart-btn').each(function () {
                const productId = $(this).data('id');
                const stock = parseInt($(this).data('stock')); // Assuming stock is passed as a data attribute
                
                productStock[productId] = stock;
            });
        },
        error: function() {
            alert('Failed to fetch products');
        }
    });
}

// Add product to cart and highlight the selected product row
function addToCart(button) {
    const row = $(button).closest('tr');
    const productId = $(button).data('id');
    const productName = row.find('td:eq(0)').text();
    const price = parseFloat(row.find('td:eq(1)').text());

    const existingItem = cart.find(item => item.productId === productId);
   
    if (existingItem) {

        if (existingItem.quantity + 1 > productStock[productId]) {
            alert('Not enough stock available.');
            
            return;
        }
        existingItem.quantity += 1;
        existingItem.subtotal = existingItem.price * existingItem.quantity;
    } else {
        if (productStock[productId] <= 0) {
            alert('This product is out of stock.');
            return;
        }
        cart.push({ productId, productName, price, quantity: 1, subtotal: price });
    }

    grandTotal += price;
    updateCartTable();
}


// Update  cart table and allow quantity changes
// Update cart table and bind quantity change events
function updateCartTable() {
    const cartTableBody = $('#cart-table-body');
    cartTableBody.empty();

    if (cart.length === 0) {
        cartTableBody.append('<tr><td colspan="5" class="text-center">No products in the cart</td></tr>');
    } else {
        cart.forEach((item, index) => {
            const row = `
                <tr>
                    <td>${item.productName}</td>
                    <td>${item.price.toFixed(2)}</td>
                    <td>
                        <input type="number" class="form-control cart-quantity" 
                               value="${item.quantity}" data-index="${index}" min="1">
                    </td>
                    <td>${item.subtotal.toFixed(2)}</td>
                    <td>
                        <button class="btn btn-danger btn-sm delete-item-btn" 
                                data-index="${index}">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>`;
            cartTableBody.append(row);
        });
    }
// Delete item from cart
function deleteCartItem(index) {
    const item = cart[index];
    grandTotal -= item.subtotal; // Deduct the subtotal from the grand total
    cart.splice(index, 1); // Remove the item from the cart array
    updateCartTable(); // Update the cart display
}

// Update quantity in the cart
// Update cart quantity with stock validation
function updateQuantity(index, newQuantity) {
    const item = cart[index];

    if (newQuantity > productStock[item.productId]) {
        alert('Not enough stock available.');
        $(this).val(item.quantity); // Reset to previous quantity
        return;
    }

    // Check if the new quantity is 0
    if (newQuantity === 0) {
        deleteCartItem(index); // Call delete function if quantity is set to 0
    } else {
        grandTotal -= item.subtotal; // Update grand total
        item.quantity = newQuantity; // Update quantity
        item.subtotal = item.price * newQuantity; // Update subtotal
        grandTotal += item.subtotal; // Update grand total
        updateCartTable(); // Refresh the cart table
    }
}

// Update grand total
$('#grand-total').text(grandTotal.toFixed(2));
$('#modal-grand-total').text(grandTotal.toFixed(2));
$('#total-products-count').text(cart.length);

// Bind the change event to quantity input with validation
$(document).on('change', '.cart-quantity', function () {
    const index = $(this).data('index');
    const newQuantity = parseInt($(this).val());

    // Ensure the input is valid and not negative
    if (isNaN(newQuantity) || newQuantity < 0) {
        alert('Quantity must be a valid non-negative number.');
        $(this).val(cart[index]?.quantity || 1); // Reset to previous quantity if invalid
    } else {
        updateQuantity(index, newQuantity);
    }
});

    // Update grand total
    $('#grand-total').text(grandTotal.toFixed(2));
    $('#modal-grand-total').text(grandTotal.toFixed(2));
    $('#total-products-count').text(cart.length);

    // Bind delete item event
    $('.delete-item-btn').on('click', function () {
        const index = $(this).data('index');
        deleteCartItem(index);
    });

    // Bind click event to delete buttons
    $('.delete-item-btn').on('click', function() {
        const index = $(this).data('index');
        deleteCartItem(index);
    });
}// Validate stock and process payment
function submitPayment() {
    if (cart.some(item => item.quantity > productStock[item.productId])) {
        alert('Some products exceed available stock.');
        return;
    }

    const receiveAmount = parseFloat($('#receiveAmount').val());
    const paymentChoice = $('#paymentChoice').val();

    if (isNaN(receiveAmount) || receiveAmount < grandTotal) {
        alert('Received amount must be a valid number and not less than the grand total.');
        return;
    }

    const paymentData = {
        cart: cart.map(item => ({
            productId: item.productId,
            productName: item.productName,
            price: item.price,
            quantity: item.quantity,
            subtotal: item.subtotal
        })),
        total: grandTotal,
        paymentType: paymentChoice,
        receivedAmount: receiveAmount
    };

    $.ajax({
        url: 'process_payment.php',
        type: 'POST',
        data: JSON.stringify(paymentData),
        contentType: 'application/json',
        success: function (response) {
            const res = JSON.parse(response);
            if (res.status === 'success') {
                deductStockQuantities(paymentData.cart);
                alert('Payment processed successfully!');
                $('#paymentModal').modal('hide');
                generateReceipt(paymentData);
                $('#receiptModal').modal('show');
                resetCart();
                fetchProducts();
            } else {
                alert('Error: ' + res.message);
            }
        },
        error: function () {
            alert('Payment processing failed. Please try again.');
        }
    });
}



// Function to deduct stock quantities
function deductStockQuantities(cartItems) {
    $.ajax({
        url: 'update_stock.php', // PHP script to handle stock deduction
        type: 'POST',
        data: JSON.stringify(cartItems),
        contentType: 'application/json',
        success: function(response) {
            console.log('Stock quantities deducted successfully.');
        },
        error: function() {
            console.error('Failed to deduct stock quantities.');
        }
    });
}


function calculateChange() {
    const receiveAmount = parseFloat($('#receiveAmount').val()) || 0;
    const payingAmount = grandTotal;
    const change = receiveAmount - payingAmount;

    $('#change').val(change >= 0 ? change.toFixed(2) : '0.00');
}


// Function to generate the receipt and display it in the modal
function generateReceipt(paymentData) {
    const receiptItems = $('#receipt-items');
    receiptItems.empty(); // Clear any previous items
    
    // Populate receipt items from cart data
    paymentData.cart.forEach(item => {
        const row = `
            <tr>
                <td>${item.productName}</td>
                <td>${item.quantity}</td>
                <td>${item.price.toFixed(2)}</td>
                <td>${item.subtotal.toFixed(2)}</td>
            </tr>
        `;
        receiptItems.append(row);
    });

    // Set total, payment type, received amount, and change
    $('#receipt-total').text(paymentData.total.toFixed(2));
    $('#payment-method').text(paymentData.paymentType);
    $('#receipt-received-amount').text(paymentData.receivedAmount.toFixed(2));
    const change = paymentData.receivedAmount - paymentData.total;
    $('#receipt-change').text(change.toFixed(2));

    // Set current date and time on the receipt
const currentDate = new Date().toLocaleString(); // Includes both date and time
$('#receipt-date').text(currentDate);

}

// Trigger print functionality for receipt
$('#print-receipt-button').click(function() {
    const printContent = $('#receipt-content').html(); // Use .html() to get content
    const win = window.open('', '', 'height=700,width=700');
    win.document.write('<html><head><title>Receipt</title>');
    win.document.write('</head><body>');
    win.document.write(printContent);
    win.document.write('</body></html>');
    win.document.close();
    win.print();
});


function payExact() {
    // Set the receiveAmount input to the grand total
    $('#receiveAmount').val(grandTotal.toFixed(2));
    calculateChange(); // Recalculate the change
}


// Reset cart functionality
function resetCart() {
    cart = [];
    grandTotal = 0;
    $('#cart-table-body').empty().append('<tr><td colspan="4" class="text-center">No products in the cart</td></tr>');
    $('#grand-total').text('0.00');
    $('#modal-grand-total').text('0.00');
    $('#total-products-count').text('0');
}

// Bind the add to cart functionality to the buttons in the product table
$(document).on('click', '.add-to-cart-btn', function(event) {
    addToCart(this);
    fetchProducts();
});


// Fill the Paying Amount field with the Grand Total when opening the modal
$('#payNowButton').on('click', function() {
    $('#payingAmount').val(grandTotal.toFixed(2)); // Set the paying amount to the grand total
    $('#receiveAmount').val(''); // Clear the received amount field
    $('#change').val('0.00'); // Reset change

    // Calculate change immediately to reflect the new paying amount
    calculateChange();
});


// Reset button click event
$('#resetCart').on('click', function() {
    resetCart();
});

// Fetch all products initially when the page loads
$(document).ready(function() {
    fetchProducts();

    // Mouseover and mouseout event to highlight the product row
    $(document).on('mouseover', '#product-table-body tr', function() {
        // Add the highlight class when the mouse is over the row
        $(this).addClass('highlight');
    });

    $(document).on('mouseout', '#product-table-body tr', function() {
        // Remove the highlight class when the mouse leaves the row
        $(this).removeClass('highlight');
    });
});





</script>
<!-- CSS for Scrollable Table -->
<style>
.scrollable-table {
    max-height: 550px; /* Set a maximum height for the table */
    overflow-y: auto;  /* Enable vertical scrolling */
    overflow-x: hidden; /* Prevent horizontal scrolling */
}

.table {
    width: 100%; /* Keep the full width for the table */
    border-collapse: collapse; /* Keep this for clean look */
}

.table th, .table td {
    padding: 8px; /* Keep your padding */
    text-align: left; /* Keep the text alignment */
}

/* Sticky header for the table */
.table th {
    position: sticky;
    top: 0;
    background-color: white; /* Default light mode background */
    z-index: 1; /* Ensure header stays on top */
    border-bottom: 2px solid #ddd; /* Optional: add border for a clearer look */
    transition: background-color 0.3s ease; /* Smooth transition */
}

/* Dark mode styles using prefers-color-scheme */
@media (prefers-color-scheme: dark) {
    .table th {
        background-color: #333; /* Dark background for dark mode */
        color: #fff; /* White text for dark mode */
        border-bottom: 2px solid #555; /* Adjust border color for dark mode */
    }
}

/* Scrollable Cart Table */
.scrollable-cart-table {
    max-height: 300px; /* Set a maximum height for the cart table */
    overflow-y: auto;  /* Enable vertical scrolling */
}

.table-responsive {
    overflow-x: hidden; /* Prevent horizontal scrolling */
}

/* Optional: Adjust the height and padding for small devices */
@media (max-width: 768px) {
    .scrollable-cart-table {
        max-height: 200px;
    }
}
/* Input field for cart quantity */
input.cart-quantity {
    width: 60px; /* Adjust width to be short */
    padding: 5px;
    text-align: center;
    border: 1px solid #ccc;
    border-radius: 5px;
}
/* Highlighted product row */
.highlight {
    background-color: #808080; /* Light blue color for highlight */
    transition: background-color 0.3s ease; /* Smooth transition */
}


</style>




<!-- CONTENT END -->



    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <img src="assets/images/logo/logo.png" alt="Logo" class="img-fluid" style="max-width: 100px;">
                </div>
                <div class="modal-body text-center">
                    <h5 class="modal-title" id="logoutModalLabel">Do you want to logout?</h5>
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="/index.php" class="btn btn-danger">Yes</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <img src="assets/images/logo/logo.png" alt="Logo" class="img-fluid" style="max-width: 100px;">
                </div>
                <div class="modal-body text-center">
                    <h5 class="modal-title" id="logoutModalLabel">Do you want to logout?</h5>
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="/index.php" class="btn btn-danger">Yes</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>

      <!-- footer start-->


    </div>

  </div>
  <!-- latest jquery-->
  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap js-->
  <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
  <!-- feather icon js-->
  <script src="assets/js/icons/feather-icon/feather.min.js"></script>
  <script src="assets/js/icons/feather-icon/feather-icon.js"></script>
  <!-- scrollbar js-->
  <script src="assets/js/scrollbar/simplebar.js"></script>
  <script src="assets/js/scrollbar/custom.js"></script>
  <!-- Sidebar jquery-->
  <script src="assets/js/config.js"></script>
  <script src="assets/js/sidebar-menu.js"></script>
  <script src="assets/js/notify/bootstrap-notify.min.js"></script>
  <script src="assets/js/icons/icons-notify.js"></script>
  <script src="assets/js/icons/icon-clipart.js"></script>
  <script src="assets/js/tooltip-init.js"></script>
  <!-- Template js-->
  <script src="assets/js/script.js"></script>

  <!-- login js-->





  
 <!-- Firebase App (core SDK) -->
<script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-app-compat.js"></script>

<!-- Firestore SDK -->
<script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-firestore-compat.js"></script>


<script>
 // Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyCr9Hpr7nYKiUCsmou8_L4moyx8KIJnopM",
    authDomain: "vetease-91e29.firebaseapp.com",
    projectId: "vetease-91e29",
    storageBucket: "vetease-91e29.appspot.com",
    messagingSenderId: "13605053466",
    appId: "1:13605053466:web:e487ab8b3618f9ba7d9da3"
};

// Initialize Firebase
const app = firebase.initializeApp(firebaseConfig);
const db = firebase.firestore(app);

// Select the notification dropdown, box, and badge
const notificationDropdown = document.querySelector('.notification-dropdown');
const notificationBadge = document.getElementById('notification-badge');

// Function to add a new notification for stock alert
function addStockNotification(stockData) {
    const newNotification = document.createElement('li');
    newNotification.innerHTML = `
        <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                    class="feather feather-file-text">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
            </div>
            <div class="flex-grow-1">
                <p><a href="inventory.php">${stockData.name} - ${stockData.status}</a></p>
            </div>
        </div>
    `;
    
    // Add the new notification to the top of the dropdown
    notificationDropdown.insertBefore(newNotification, notificationDropdown.children[1]);
    
    // Increment the notification count
    updateNotificationCount();
}

// Function to fetch stock alerts from the PHP backend
function fetchStockNotifications() {
    fetch('check_stock.php') // Adjust the path as needed
        .then(response => response.json())
        .then(data => {
            data.forEach(stockData => {
                addStockNotification(stockData);
            });
        })
        .catch(error => console.error('Error fetching stock alerts:', error));
}

// Function to update the notification count
// Function to update the notification count
function updateNotificationCount() {
    // Get the actual notifications only, skipping the header or any static items
    const notificationCount = notificationDropdown.querySelectorAll('li').length - 1; // Subtract 1 to exclude the header or unwanted item
    notificationBadge.textContent = notificationCount;
}


// Fetch stock notifications every minute (or adjust as needed)
setInterval(fetchStockNotifications, 3600000);

// Initial fetch on page load
fetchStockNotifications();

// Function to add a new notification to the dropdown (for appointment notifications)
function addNotification(appointmentData) {
    const newNotification = document.createElement('li');
    newNotification.innerHTML = `
        <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                    class="feather feather-file-text">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
            </div>
            <div class="flex-grow-1">
                <p><a href="appointment.php?id=${appointmentData.id}">New Appointment: ${appointmentData.ownerName}</a></p>
            </div>
        </div>
    `;
    
    // Add the new notification to the top of the dropdown
    notificationDropdown.insertBefore(newNotification, notificationDropdown.children[1]);
    
    // Increment the notification count
    updateNotificationCount();
}

// Listen for new "pending" appointments in the Firestore collection
const appointmentsRef = db.collection('appointments').where("status", "==", "pending");
appointmentsRef.onSnapshot((snapshot) => {
    snapshot.docChanges().forEach((change) => {
        if (change.type === 'added') {
            const newAppointment = change.doc.data();
            addNotification({
                id: change.doc.id,
                ownerName: newAppointment.ownerName,  // Replace with the actual field name in your database
            });
        }
    });
});


  
</script>


<script>

function toggleDropdown() {
    const dropdown = document.getElementById('notification-dropdown');
    
    // Check if the dropdown is currently hidden
    if (dropdown.style.display === 'none' || dropdown.style.display === '') {
        dropdown.style.display = 'block';  // Show the dropdown
    } else {
        dropdown.style.display = 'none';  // Hide the dropdown
    }
}



   </script>
</body>


</html>
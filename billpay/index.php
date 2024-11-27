<?php include('../config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Q pay</title>
    <link rel="shortcut icon" href="./assets/qpay-favicon.png" type="image/x-icon" />
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="<?php echo ROOT_URL; ?>js/global.js"></script>
    <style>
        @font-face {
            font-family: 'Gilroy-Bold';
            src: url('<?php echo ROOT_URL; ?>assets/fonts/Gilroy-Bold.ttf') format('truetype');
        }

        @font-face {
            font-family: 'Gilroy-Medium';
            src: url('<?php echo ROOT_URL; ?>assets/fonts/Gilroy-Medium.ttf') format('truetype');
        }

        @font-face {
            font-family: 'Gilroy';
            src: url('<?php echo ROOT_URL; ?>assets/fonts/Gilroy-Regular.ttf') format('truetype');

        }

        @font-face {
            font-family: 'Gilroy-SemiBold';
            src: url('<?php echo ROOT_URL; ?>assets/fonts/Gilroy-SemiBold.ttf') format('truetype');
            font-weight: 600;
            font-style: normal;
        }

        body {
            font-family: "Gilroy-Medium";
            overflow-y: scroll;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .custom-shadow {
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.08);
        }

        .filter-white {
            filter: brightness(0) saturate(100%) invert(97%) sepia(8%) saturate(770%) hue-rotate(225deg) brightness(110%) contrast(100%);
        }

        .tab.active .catitem{
            background-color:#42794A;
        }
        .tab.active .catitem img{
            filter: brightness(0) saturate(100%) invert(97%) sepia(8%) saturate(770%) hue-rotate(225deg) brightness(110%) contrast(100%);
        }
        .tab.inactive .catitem{
           border:1px solid #94CA9C !important;
           border-radius:10px;
            background:none;
        }
        .tab.inactive .catitem img{
            filter: none;
        }
        #errorToast {
    position: fixed;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 60;
    display: none;
    background-color: #f44336; 
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

#errorToast.show-toast {
    display: block; 
    animation: fadeInOut 3s ease-in-out; 
}

.toast {
    position: fixed;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    border-radius: 5px;
    opacity: 0;
    transition: opacity 0.3s ease, visibility 0.3s ease;
}

.show-toast {
    opacity: 1;
}

@keyframes fadeInOut {
    0% { opacity: 0; }
    10% { opacity: 1; }
    90% { opacity: 1; }
    100% { opacity: 0; }
}

        /* media queries */
        @media screen and (max-width: 768px) {
            .icon {
                width: 50px !important;
                height: 50px !important;
            }

            .icon svg {
                width: 24px;
                height: 24px;
            }

            .icon+div,
            .icon+span {
                font-size: 12px;
            }

        }
    </style>
</head>

<body>
    <div class="home">
        <?php include(ROOT_PATH . '/shared/desktop-nav.php') ?>
        <main>
            <div class="main-container container mx-auto px-2 sm:px-4 ">
                <div class="flex">
                    <?php include(ROOT_PATH . '/shared/desktop-sidebar.php') ?>
                    <div class="main-content grow mb-20">
                        <div class="lg:ml-6 xl:ml-8">
                            <div id="category-list" class="h-0 overflow-hidden">
                                <section id="trending" class="trending grid mb-6 bg-[#F6F8F6] lg:rounded-2xl p-4 lg:px-8 lg:py-6">
                                    <h3 class="uppercase mb-4 text-[#999999]">TRENDING PAYMENTS</h3>
                                    <div class="tabs">
                                        <ul id="trending-items" class="grid grid-cols-4 lg:grid-cols-8 gap-y-8 justify-between overflow-hidden text-center">
                                        </ul>
                                    </div>
                                  
                                </section>
                                <div id="tabs-content">
                                    <!-- Dynamic content for each tab will be injected here -->
                                    <div id="tab1-content" class="tab-content hidden">
                                        <section class="Electricity flex flex-col justify-start  lg:grid grid-cols-5 mb-6 px-2 gap-4 h-full">
                                            <div class="col-span-2 left-container">
                                                <div class="form-step block border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                    <h3 class="capitalize mb-4 text-lg font-[Gilroy-Medium] xl:mb-6 2xl:text-xl">Creditcard bill payment</h3>
                                                    <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl mb-4">
                                                        <input class="w-full p-3 2xl:text-xl cursor-pointer outline-none select-board" placeholder="Select Creditcard" type="text" readonly>
                                                        <span class="pr-3"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none">
                                                                <path d="M0.999878 13L6.99988 7L0.999878 1" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg></span>
                                                    </div>
                                                    <div class="number-input-wrapper h-0 overflow-hidden">
                                                        <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl mb-2">
                                                            <input  class="w-full 2xl:text-xl p-3 outline-none consumer-number" placeholder="Consumer number" type="text">
                                                        </div>
                                                        <p class="text-[#999999] text-xs mb-4">
                                                            Please enter your Consumer number starting with regional code followed by section, distribution and service number. Note - Please read disclaimer
                                                        </p>

                                                    </div>

                                                    <button  class="w-full bg-[#42794A] opacity-40 outline-none 2xl:text-xl text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33] proceed-btn" disabled>Proceed</button>
                                                </div>

                                                <div class="form-step border hidden border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                    <h3 class="capitalize mb-3 xl:mb-4 text-lg font-[Gilroy-Medium] 2xl:text-xl">Prepaid recharge</h3>

                                                    <div class="flex items-center justify-between mb-4">
                                                        <div id="opreator-details" class="flex items-center">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/adani.png" alt="Logo" class="w-12 h-12 rounded-full mr-3">
                                                            <div>
                                                                <p class="text-[#999999] font-sm">Adani Electricity Mumbai Limited ...</p>
                                                                <p class="text-xl font-bold text-gray-900">0908765432190</p>
                                                            </div>
                                                        </div>
                                                        <button id="edit-btn" class="text-[#42794A] text-lg font-[Gilroy-Medium]">Edit</button>
                                                    </div>

                                                    <hr class="my-4 border-gray-200">

                                                    <!-- Customer Details Section -->
                                                    <div id="customer-details" class="space-y-2 text-sm">
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999]">Customer name</span>
                                                            <span class=" font-[Gilroy-Medium]">IBRAHIM MOHAMMEDALI</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999]">Bill number</span>
                                                            <span class="font-[Gilroy-Medium]">092141241127</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999] ">Bill date</span>
                                                            <span class="font-[Gilroy-Medium]">07, Aug 2024</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-red-500">Due date</span>
                                                            <span class="text-red-500 font-[Gilroy-Medium]">30, Sep 2024</span>
                                                        </div>
                                                    </div>

                                                    <hr class="my-4 border-gray-200">
                                                    <div class="flex justify-between items-center">
                                                        <span class="text-[#999999]">Total amount</span>
                                                        <span class="bill-amount text-xl font-bold text-gray-900">₹149.0</span>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-span-3 right-container opacity-0">
                                                <div class="form-step block border  border-[#EEEEEE] rounded-xl pb-4  xl:rounded-2xl ">
                                                    <div class="flex items-center justify-between border-b border-[#EEEEEE] p-4 ">
                                                        <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl">Select Creditcard </h3>
                                                        <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl ">
                                                            <input class="w-full p-2 text-sm 2xl:text-base outline-none search-board" placeholder="Search electricity board"  type="text">
                                                        </div>
                                                    </div>
                                                    <ul class="board-list custom-scrollbar px-4 overflow-y-auto lg:h-[calc(100vh-16rem)]">

                                                    </ul>
                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl  xl:rounded-2xl ">
                                                        <div class="p-4 xl:p-6 hidden">
                                                            <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl">Region code for reference</h3>
                                                            <div class="grid grid-cols-4 grid-flow-row gap-2 mt-2 text-sm text-[#999999] mb-4">
                                                                <p><span class="font-bold text-nowrap">01</span> - Chennai North</p>
                                                                <p><span class="font-bold text-nowrap">02</span> - Villupuram</p>
                                                                <p class="col-span-2"><span class="font-bold ">03</span> - Coimbatore</p>
                                                                <p><span class="font-bold text-nowrap">04</span> - Erode</p>
                                                                <p><span class="font-bold">05</span> - Madurai</p>
                                                                <p class="col-span-2"><span class="font-bold">06</span> - Trichy</p>
                                                                <p><span class="font-bold">07</span> - Tirunelveli</p>
                                                                <p><span class="font-bold">08</span> - Vellore</p>
                                                                <p class="col-span-2 text-nowrap"><span class="font-bold">09</span> - Chennai South</p>
                                                            </div>
                                                            <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl mb-3">Sample Bill</h3>
                                                        </div>

                                                        <div class="overflow-y-auto custom-scrollbar p-4 xl:p-6  lg:h-[calc(100vh-18rem)]">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/sample.png" alt="bill">
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 pb-12">
                                                        <h3 class="capitalize text-lg 2xl:text-xl font-[Gilroy-Medium] mb-4">Pay with UPI ID</h3>

                                                        <!-- UPI ID Input Field -->
                                                        <div class="mb-4">
                                                            <label for="upi-id" class="block text-sm font-medium text-[#999999]">Enter UPI ID</label>
                                                            <div class="flex items-center mt-1 relative">
                                                                <input type="text" id="upi-id" value="8778214386@qpay" class="w-full p-2.5 border text-[Gilroy-Medium] border-[#EEEEEE] rounded-md focus:outline-none focus:border-[#61CE70]" readonly>
                                                                <div>
                                                                    <p class="verify-btn text-sm cursor-pointer font-[Gilroy-Medium] text-[#42794A] underline absolute right-3 top-3 ">Verify</p>

                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 hidden h-5 text-green-500 absolute right-3 top-3" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" fill="#61CE70" />
                                                                        <path d="M7.5 12L10.5 15L16.5 9" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Suggested Bank Handles -->
                                                        <div class="flex flex-wrap gap-2 mb-4">
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ybl</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ibl</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@okaxis</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@okicici</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ptaxis</span>
                                                        </div>

                                                        <!-- Verified Details Section -->
                                                        <div class="verified-details mb-4 h-0 overflow-hidden">
                                                            <p class="text-sm text-[#999999]">Verified Details</p>
                                                            <div class="flex items-center mt-2">
                                                                <img src="<?php echo ROOT_URL; ?>/assets/images/profile.png" alt="User Profile" class="w-10 h-10 rounded-full mr-3">
                                                                <div>
                                                                    <p class="text-gray-900 font-semibold flex items-center gap-2">Ibrahim Mohammedali <span class="text-green-500 inline"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <path d="M7.33377 3.8187C8.1376 3.75455 8.90071 3.43846 9.51447 2.91542C10.9467 1.69486 13.0533 1.69486 14.4855 2.91542C15.0993 3.43846 15.8624 3.75455 16.6662 3.8187C18.5421 3.96839 20.0316 5.45794 20.1813 7.33377C20.2455 8.1376 20.5615 8.90071 21.0846 9.51447C22.3051 10.9467 22.3051 13.0533 21.0846 14.4855C20.5615 15.0993 20.2455 15.8624 20.1813 16.6662C20.0316 18.5421 18.5421 20.0316 16.6662 20.1813C15.8624 20.2455 15.0993 20.5615 14.4855 21.0846C13.0533 22.3051 10.9467 22.3051 9.51447 21.0846C8.90071 20.5615 8.1376 20.2455 7.33377 20.1813C5.45794 20.0316 3.96839 18.5421 3.8187 16.6662C3.75455 15.8624 3.43846 15.0993 2.91542 14.4855C1.69486 13.0533 1.69486 10.9467 2.91542 9.51447C3.43846 8.90071 3.75455 8.1376 3.8187 7.33377C3.96839 5.45794 5.45794 3.96839 7.33377 3.8187Z" fill="#61CE70" />
                                                                                <path d="M9 12.0005L11 14.0005L15.5 9.50049" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                                            </svg></span></p>
                                                                    <p class="text-sm text-[#999999]">8778214386@qpay</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Send Payment Button -->
                                                        <button class="w-full bg-[#42794A] opacity-40 text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]" disabled>Send Payment Request</button>

                                                        <!-- Divider with OR text -->
                                                        <div class="relative my-6">
                                                            <span class="absolute inset-x-0 top-1/2 transform -translate-y-1/2 text-sm text-[#999999] border border-[#EEEEEE] rounded-full bg-white px-2 mx-auto w-10 text-center">OR</span>
                                                            <hr class="border-gray-300">
                                                        </div>

                                                        <!-- QR Code Payment Option -->
                                                        <div class="text-center">
                                                            <a href="#" class="text-[#42794A] font-[Gilroy-Medium] text-xl hover:underline">Scan & pay with QR code</a>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 ">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/qrcode.png" class="opacity-10" alt="">
                                                            <button id="generate-qr" class="w-full absolute bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Genereate QR Code & Pay</button>
                                                        </div>

                                                        <div class="relative my-6">
                                                            <span class="absolute inset-x-0 top-1/2 transform -translate-y-1/2 text-sm text-[#999999] border border-[#EEEEEE] rounded-full bg-white px-2 mx-auto w-10 text-center">OR</span>
                                                            <hr class="border-gray-300">
                                                        </div>

                                                        <div class="text-center">
                                                            <a href="#" class="text-[#42794A] font-[Gilroy-Medium] text-xl hover:underline">Pay with UPI ID</a>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                        <div class="flex flex-col gap-4 justify-center items-center p-8 relative">
                                                            <div class="flex justify-between items-center gap-2 font-[Gilroy-Medium]">
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M12 9.5V13.5L14.5 15M12 5C7.30558 5 3.5 8.80558 3.5 13.5C3.5 18.1944 7.30558 22 12 22C16.6944 22 20.5 18.1944 20.5 13.5C20.5 8.80558 16.6944 5 12 5ZM12 5V2M10 2H14M20.329 5.59204L18.829 4.09204L19.579 4.84204M3.67102 5.59204L5.17102 4.09204L4.42102 4.84204" stroke="#61CE70" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </span>
                                                                <span id="timer-container" class="text-base font-[Gilroy-Medium] text-[#252525]"> 03:00</span>

                                                            </div>
                                                            <div class="border border-[#EEEEEE] rounded-xl flex justify-center items-center p-8 relative">
                                                                <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/qrcode.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="text-sm text-center px-8 text-[#999999] mt-4">Please do not press the back button. Going back from this screen will expire the QR code and cancel the payment.</p>
                                                    </div>
                                                </div>

                                                <div class="form-step failed hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 flex flex-col gap-4 justify-center items-center">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/payment-failed.png" class="" alt="">
                                                        </div>
                                                        <div class="text-center w-full sm:px-5 lg:px-10">
                                                            <h3 class="capitalize xl:mb-2 text-xl font-[Gilroy-Medium] xl:text-xl">Payment Interrupted</h3>
                                                            <p class="text-center text-sm text-[#999999] mb-4">Your payment was dropped during the journey and couldn’t be completed.</p>
                                                            <button class="w-full  bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Retry</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-step success hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 flex flex-col gap-4 justify-center items-center">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/payment-success.png" class="" alt="">
                                                        </div>
                                                        <div class="text-center w-full sm:px-5 lg:px-10">
                                                            <h3 class="capitalize xl:mb-2 text-xl font-[Gilroy-Medium] xl:text-xl">Payment Success!</h3>
                                                            <p class="text-center text-sm text-[#999999] mb-4">Your payment was successfully completed.</p>
                                                            <button class="w-full bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Done</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div> 
                                    <div id="tab2-content" class="tab-content hidden">
                                        <section class="Electricity flex flex-col justify-start  lg:grid grid-cols-5 mb-6 px-2 gap-4 h-full">
                                            <div class="col-span-2 left-container">
                                                <div class="form-step block border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                    <h3 class="capitalize mb-4 text-lg font-[Gilroy-Medium] xl:mb-6 2xl:text-xl">Loan bill payment</h3>
                                                    <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl mb-4">
                                                        <input class="w-full p-3 2xl:text-xl cursor-pointer outline-none select-board" placeholder="Select Loan" type="text" readonly>
                                                        <span class="pr-3"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none">
                                                                <path d="M0.999878 13L6.99988 7L0.999878 1" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg></span>
                                                    </div>
                                                    <div class="number-input-wrapper h-0 overflow-hidden">
                                                        <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl mb-2">
                                                            <input  class="w-full 2xl:text-xl p-3 outline-none consumer-number" placeholder="Consumer number" type="text">
                                                        </div>
                                                        <p class="text-[#999999] text-xs mb-4">
                                                            Please enter your Consumer number starting with regional code followed by section, distribution and service number. Note - Please read disclaimer
                                                        </p>

                                                    </div>

                                                    <button  class="w-full bg-[#42794A] opacity-40 outline-none 2xl:text-xl text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33] proceed-btn" disabled>Proceed</button>
                                                </div>

                                                <div class="form-step border hidden border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                    <h3 class="capitalize mb-3 xl:mb-4 text-lg font-[Gilroy-Medium] 2xl:text-xl">Prepaid recharge</h3>

                                                    <div class="flex items-center justify-between mb-4">
                                                        <div id="opreator-details" class="flex items-center">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/adani.png" alt="Logo" class="w-12 h-12 rounded-full mr-3">
                                                            <div>
                                                                <p class="text-[#999999] font-sm">Adani Electricity Mumbai Limited ...</p>
                                                                <p class="text-xl font-bold text-gray-900">0908765432190</p>
                                                            </div>
                                                        </div>
                                                        <button id="edit-btn" class="text-[#42794A] text-lg font-[Gilroy-Medium]">Edit</button>
                                                    </div>

                                                    <hr class="my-4 border-gray-200">

                                                    <!-- Customer Details Section -->
                                                    <div id="customer-details" class="space-y-2 text-sm">
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999]">Customer name</span>
                                                            <span class=" font-[Gilroy-Medium]">IBRAHIM MOHAMMEDALI</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999]">Bill number</span>
                                                            <span class="font-[Gilroy-Medium]">092141241127</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999] ">Bill date</span>
                                                            <span class="font-[Gilroy-Medium]">07, Aug 2024</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-red-500">Due date</span>
                                                            <span class="text-red-500 font-[Gilroy-Medium]">30, Sep 2024</span>
                                                        </div>
                                                    </div>

                                                    <hr class="my-4 border-gray-200">
                                                    <div class="flex justify-between items-center">
                                                        <span class="text-[#999999]">Total amount</span>
                                                        <span class="bill-amount text-xl font-bold text-gray-900">₹149.0</span>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-span-3 right-container opacity-0">
                                                <div class="form-step block border  border-[#EEEEEE] rounded-xl pb-4  xl:rounded-2xl ">
                                                    <div class="flex items-center justify-between border-b border-[#EEEEEE] p-4 ">
                                                        <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl">Select Loan </h3>
                                                        <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl ">
                                                            <input class="w-full p-2 text-sm 2xl:text-base outline-none search-board" placeholder="Search electricity board"  type="text">
                                                        </div>
                                                    </div>
                                                    <ul class="board-list custom-scrollbar px-4 overflow-y-auto lg:h-[calc(100vh-16rem)]">

                                                    </ul>
                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl  xl:rounded-2xl ">
                                                        <div class="p-4 xl:p-6 hidden">
                                                            <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl">Region code for reference</h3>
                                                            <div class="grid grid-cols-4 grid-flow-row gap-2 mt-2 text-sm text-[#999999] mb-4">
                                                                <p><span class="font-bold text-nowrap">01</span> - Chennai North</p>
                                                                <p><span class="font-bold text-nowrap">02</span> - Villupuram</p>
                                                                <p class="col-span-2"><span class="font-bold ">03</span> - Coimbatore</p>
                                                                <p><span class="font-bold text-nowrap">04</span> - Erode</p>
                                                                <p><span class="font-bold">05</span> - Madurai</p>
                                                                <p class="col-span-2"><span class="font-bold">06</span> - Trichy</p>
                                                                <p><span class="font-bold">07</span> - Tirunelveli</p>
                                                                <p><span class="font-bold">08</span> - Vellore</p>
                                                                <p class="col-span-2 text-nowrap"><span class="font-bold">09</span> - Chennai South</p>
                                                            </div>
                                                            <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl mb-3">Sample Bill</h3>
                                                        </div>

                                                        <div class="overflow-y-auto custom-scrollbar p-4 xl:p-6  lg:h-[calc(100vh-18rem)]">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/sample.png" alt="bill">
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 pb-12">
                                                        <h3 class="capitalize text-lg 2xl:text-xl font-[Gilroy-Medium] mb-4">Pay with UPI ID</h3>

                                                        <!-- UPI ID Input Field -->
                                                        <div class="mb-4">
                                                            <label for="upi-id" class="block text-sm font-medium text-[#999999]">Enter UPI ID</label>
                                                            <div class="flex items-center mt-1 relative">
                                                                <input type="text" id="upi-id" value="8778214386@qpay" class="w-full p-2.5 border text-[Gilroy-Medium] border-[#EEEEEE] rounded-md focus:outline-none focus:border-[#61CE70]" readonly>
                                                                <div>
                                                                    <p class="verify-btn text-sm cursor-pointer font-[Gilroy-Medium] text-[#42794A] underline absolute right-3 top-3 ">Verify</p>

                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 hidden h-5 text-green-500 absolute right-3 top-3" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" fill="#61CE70" />
                                                                        <path d="M7.5 12L10.5 15L16.5 9" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Suggested Bank Handles -->
                                                        <div class="flex flex-wrap gap-2 mb-4">
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ybl</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ibl</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@okaxis</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@okicici</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ptaxis</span>
                                                        </div>

                                                        <!-- Verified Details Section -->
                                                        <div class="verified-details mb-4 h-0 overflow-hidden">
                                                            <p class="text-sm text-[#999999]">Verified Details</p>
                                                            <div class="flex items-center mt-2">
                                                                <img src="<?php echo ROOT_URL; ?>/assets/images/profile.png" alt="User Profile" class="w-10 h-10 rounded-full mr-3">
                                                                <div>
                                                                    <p class="text-gray-900 font-semibold flex items-center gap-2">Ibrahim Mohammedali <span class="text-green-500 inline"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <path d="M7.33377 3.8187C8.1376 3.75455 8.90071 3.43846 9.51447 2.91542C10.9467 1.69486 13.0533 1.69486 14.4855 2.91542C15.0993 3.43846 15.8624 3.75455 16.6662 3.8187C18.5421 3.96839 20.0316 5.45794 20.1813 7.33377C20.2455 8.1376 20.5615 8.90071 21.0846 9.51447C22.3051 10.9467 22.3051 13.0533 21.0846 14.4855C20.5615 15.0993 20.2455 15.8624 20.1813 16.6662C20.0316 18.5421 18.5421 20.0316 16.6662 20.1813C15.8624 20.2455 15.0993 20.5615 14.4855 21.0846C13.0533 22.3051 10.9467 22.3051 9.51447 21.0846C8.90071 20.5615 8.1376 20.2455 7.33377 20.1813C5.45794 20.0316 3.96839 18.5421 3.8187 16.6662C3.75455 15.8624 3.43846 15.0993 2.91542 14.4855C1.69486 13.0533 1.69486 10.9467 2.91542 9.51447C3.43846 8.90071 3.75455 8.1376 3.8187 7.33377C3.96839 5.45794 5.45794 3.96839 7.33377 3.8187Z" fill="#61CE70" />
                                                                                <path d="M9 12.0005L11 14.0005L15.5 9.50049" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                                            </svg></span></p>
                                                                    <p class="text-sm text-[#999999]">8778214386@qpay</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Send Payment Button -->
                                                        <button class="w-full bg-[#42794A] opacity-40 text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]" disabled>Send Payment Request</button>

                                                        <!-- Divider with OR text -->
                                                        <div class="relative my-6">
                                                            <span class="absolute inset-x-0 top-1/2 transform -translate-y-1/2 text-sm text-[#999999] border border-[#EEEEEE] rounded-full bg-white px-2 mx-auto w-10 text-center">OR</span>
                                                            <hr class="border-gray-300">
                                                        </div>

                                                        <!-- QR Code Payment Option -->
                                                        <div class="text-center">
                                                            <a href="#" class="text-[#42794A] font-[Gilroy-Medium] text-xl hover:underline">Scan & pay with QR code</a>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 ">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/qrcode.png" class="opacity-10" alt="">
                                                            <button id="generate-qr" class="w-full absolute bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Genereate QR Code & Pay</button>
                                                        </div>

                                                        <div class="relative my-6">
                                                            <span class="absolute inset-x-0 top-1/2 transform -translate-y-1/2 text-sm text-[#999999] border border-[#EEEEEE] rounded-full bg-white px-2 mx-auto w-10 text-center">OR</span>
                                                            <hr class="border-gray-300">
                                                        </div>

                                                        <div class="text-center">
                                                            <a href="#" class="text-[#42794A] font-[Gilroy-Medium] text-xl hover:underline">Pay with UPI ID</a>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                        <div class="flex flex-col gap-4 justify-center items-center p-8 relative">
                                                            <div class="flex justify-between items-center gap-2 font-[Gilroy-Medium]">
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M12 9.5V13.5L14.5 15M12 5C7.30558 5 3.5 8.80558 3.5 13.5C3.5 18.1944 7.30558 22 12 22C16.6944 22 20.5 18.1944 20.5 13.5C20.5 8.80558 16.6944 5 12 5ZM12 5V2M10 2H14M20.329 5.59204L18.829 4.09204L19.579 4.84204M3.67102 5.59204L5.17102 4.09204L4.42102 4.84204" stroke="#61CE70" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </span>
                                                                <span id="timer-container" class="text-base font-[Gilroy-Medium] text-[#252525]"> 03:00</span>

                                                            </div>
                                                            <div class="border border-[#EEEEEE] rounded-xl flex justify-center items-center p-8 relative">
                                                                <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/qrcode.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="text-sm text-center px-8 text-[#999999] mt-4">Please do not press the back button. Going back from this screen will expire the QR code and cancel the payment.</p>
                                                    </div>
                                                </div>

                                                <div class="form-step failed hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 flex flex-col gap-4 justify-center items-center">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/payment-failed.png" class="" alt="">
                                                        </div>
                                                        <div class="text-center w-full sm:px-5 lg:px-10">
                                                            <h3 class="capitalize xl:mb-2 text-xl font-[Gilroy-Medium] xl:text-xl">Payment Interrupted</h3>
                                                            <p class="text-center text-sm text-[#999999] mb-4">Your payment was dropped during the journey and couldn’t be completed.</p>
                                                            <button class="w-full  bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Retry</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-step success hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 flex flex-col gap-4 justify-center items-center">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/payment-success.png" class="" alt="">
                                                        </div>
                                                        <div class="text-center w-full sm:px-5 lg:px-10">
                                                            <h3 class="capitalize xl:mb-2 text-xl font-[Gilroy-Medium] xl:text-xl">Payment Success!</h3>
                                                            <p class="text-center text-sm text-[#999999] mb-4">Your payment was successfully completed.</p>
                                                            <button class="w-full bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Done</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div id="tab3-content" class="tab-content hidden">
                                        <section class="Electricity flex flex-col justify-start  lg:grid grid-cols-5 mb-6 px-2 gap-4 h-full">
                                            <div class="col-span-2 left-container">
                                                <div class="form-step block border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                    <h3 class="capitalize mb-4 text-lg font-[Gilroy-Medium] xl:mb-6 2xl:text-xl">Electricity bill payment</h3>
                                                    <!-- <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl mb-4">
                                                        <input  class="w-full p-3 2xl:text-xl cursor-pointer outline-none select-board" placeholder="Select electricity board" type="text" readonly>
                                                        <span class="pr-3"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none">
                                                                <path d="M0.999878 13L6.99988 7L0.999878 1" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg></span>
                                                    </div>
                                                    <div class="number-input-wrapper h-0 overflow-hidden">
                                                        <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl mb-2">
                                                            <input class="w-full 2xl:text-xl p-3 outline-none consumer-number" placeholder="Consumer number" type="text">
                                                        </div>
                                                        <p class="text-[#999999] text-xs mb-4">
                                                            Please enter your Consumer number starting with regional code followed by section, distribution and service number. Note - Please read disclaimer
                                                        </p>
                                                    </div> -->

                                                    <div class="electricity-wrapper">

                                                    </div>

                                                    <!-- <button  class="w-full bg-[#42794A] opacity-40 outline-none 2xl:text-xl text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33] proceed-btn" disabled>Proceed</button> -->
                                                </div>

                                                <div class="form-step border hidden border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                    <h3 class="capitalize mb-3 xl:mb-4 text-lg font-[Gilroy-Medium] 2xl:text-xl">Prepaid recharge</h3>

                                                    <div class="flex items-center justify-between mb-4">
                                                        <div id="opreator-details" class="flex items-center">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/adani.png" alt="Logo" class="w-12 h-12 rounded-full mr-3">
                                                            <div>
                                                                <p class="text-[#999999] font-sm">Adani Electricity Mumbai Limited ...</p>
                                                                <p class="text-xl font-bold text-gray-900">0908765432190</p>
                                                            </div>
                                                        </div>
                                                        <button id="edit-btn" class="text-[#42794A] text-lg font-[Gilroy-Medium]">Edit</button>
                                                    </div>

                                                    <hr class="my-4 border-gray-200">

                                                    <!-- Customer Details Section -->
                                                    <div id="customer-details" class="space-y-2 text-sm">
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999]">Customer name</span>
                                                            <span class=" font-[Gilroy-Medium]">IBRAHIM MOHAMMEDALI</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999]">Bill number</span>
                                                            <span class="font-[Gilroy-Medium]">092141241127</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999] ">Bill date</span>
                                                            <span class="font-[Gilroy-Medium]">07, Aug 2024</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-red-500">Due date</span>
                                                            <span class="text-red-500 font-[Gilroy-Medium]">30, Sep 2024</span>
                                                        </div>
                                                    </div>

                                                    <hr class="my-4 border-gray-200">
                                                    <div class="flex justify-between items-center">
                                                        <span class="text-[#999999]">Total amount</span>
                                                        <span class="bill-amount text-xl font-bold text-gray-900">₹149.0</span>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-span-3 right-container opacity-0">
                                                <div class="form-step block border  border-[#EEEEEE] rounded-xl pb-4  xl:rounded-2xl ">
                                                    <div class="flex items-center justify-between border-b border-[#EEEEEE] p-4 ">
                                                        <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl">Select electricity board</h3>
                                                        <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl ">
                                                            <input class="w-full p-2 text-sm 2xl:text-base outline-none search-board" placeholder="Search electricity board"  type="text">
                                                        </div>
                                                    </div>
                                                    <ul class="board-list custom-scrollbar px-4 overflow-y-auto lg:h-[calc(100vh-16rem)]">

                                                    </ul>
                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl  xl:rounded-2xl ">
                                                        <div class="p-4 xl:p-6 hidden">
                                                            <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl">Region code for reference</h3>
                                                            <div class="grid grid-cols-4 grid-flow-row gap-2 mt-2 text-sm text-[#999999] mb-4">
                                                                <p><span class="font-bold text-nowrap">01</span> - Chennai North</p>
                                                                <p><span class="font-bold text-nowrap">02</span> - Villupuram</p>
                                                                <p class="col-span-2"><span class="font-bold ">03</span> - Coimbatore</p>
                                                                <p><span class="font-bold text-nowrap">04</span> - Erode</p>
                                                                <p><span class="font-bold">05</span> - Madurai</p>
                                                                <p class="col-span-2"><span class="font-bold">06</span> - Trichy</p>
                                                                <p><span class="font-bold">07</span> - Tirunelveli</p>
                                                                <p><span class="font-bold">08</span> - Vellore</p>
                                                                <p class="col-span-2 text-nowrap"><span class="font-bold">09</span> - Chennai South</p>
                                                            </div>
                                                            <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl mb-3">Sample Bill</h3>
                                                        </div>

                                                        <div class="overflow-y-auto custom-scrollbar p-4 xl:p-6  lg:h-[calc(100vh-18rem)]">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/sample.png" alt="bill">
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 pb-12">
                                                        <h3 class="capitalize text-lg 2xl:text-xl font-[Gilroy-Medium] mb-4">Pay with UPI ID</h3>

                                                        <!-- UPI ID Input Field -->
                                                        <div class="mb-4">
                                                            <label for="upi-id" class="block text-sm font-medium text-[#999999]">Enter UPI ID</label>
                                                            <div class="flex items-center mt-1 relative">
                                                                <input type="text" id="upi-id" value="8778214386@qpay" class="w-full p-2.5 border text-[Gilroy-Medium] border-[#EEEEEE] rounded-md focus:outline-none focus:border-[#61CE70]" readonly>
                                                                <div>
                                                                    <p class="verify-btn text-sm cursor-pointer font-[Gilroy-Medium] text-[#42794A] underline absolute right-3 top-3 ">Verify</p>

                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 hidden h-5 text-green-500 absolute right-3 top-3" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" fill="#61CE70" />
                                                                        <path d="M7.5 12L10.5 15L16.5 9" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Suggested Bank Handles -->
                                                        <div class="flex flex-wrap gap-2 mb-4">
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ybl</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ibl</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@okaxis</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@okicici</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ptaxis</span>
                                                        </div>

                                                        <!-- Verified Details Section -->
                                                        <div class="verified-details mb-4 h-0 overflow-hidden">
                                                            <p class="text-sm text-[#999999]">Verified Details</p>
                                                            <div class="flex items-center mt-2">
                                                                <img src="<?php echo ROOT_URL; ?>/assets/images/profile.png" alt="User Profile" class="w-10 h-10 rounded-full mr-3">
                                                                <div>
                                                                    <p class="text-gray-900 font-semibold flex items-center gap-2">Ibrahim Mohammedali <span class="text-green-500 inline"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <path d="M7.33377 3.8187C8.1376 3.75455 8.90071 3.43846 9.51447 2.91542C10.9467 1.69486 13.0533 1.69486 14.4855 2.91542C15.0993 3.43846 15.8624 3.75455 16.6662 3.8187C18.5421 3.96839 20.0316 5.45794 20.1813 7.33377C20.2455 8.1376 20.5615 8.90071 21.0846 9.51447C22.3051 10.9467 22.3051 13.0533 21.0846 14.4855C20.5615 15.0993 20.2455 15.8624 20.1813 16.6662C20.0316 18.5421 18.5421 20.0316 16.6662 20.1813C15.8624 20.2455 15.0993 20.5615 14.4855 21.0846C13.0533 22.3051 10.9467 22.3051 9.51447 21.0846C8.90071 20.5615 8.1376 20.2455 7.33377 20.1813C5.45794 20.0316 3.96839 18.5421 3.8187 16.6662C3.75455 15.8624 3.43846 15.0993 2.91542 14.4855C1.69486 13.0533 1.69486 10.9467 2.91542 9.51447C3.43846 8.90071 3.75455 8.1376 3.8187 7.33377C3.96839 5.45794 5.45794 3.96839 7.33377 3.8187Z" fill="#61CE70" />
                                                                                <path d="M9 12.0005L11 14.0005L15.5 9.50049" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                                            </svg></span></p>
                                                                    <p class="text-sm text-[#999999]">8778214386@qpay</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Send Payment Button -->
                                                        <button class="w-full bg-[#42794A] opacity-40 text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]" disabled>Send Payment Request</button>

                                                        <!-- Divider with OR text -->
                                                        <div class="relative my-6">
                                                            <span class="absolute inset-x-0 top-1/2 transform -translate-y-1/2 text-sm text-[#999999] border border-[#EEEEEE] rounded-full bg-white px-2 mx-auto w-10 text-center">OR</span>
                                                            <hr class="border-gray-300">
                                                        </div>

                                                        <!-- QR Code Payment Option -->
                                                        <div class="text-center">
                                                            <a href="#" class="text-[#42794A] font-[Gilroy-Medium] text-xl hover:underline">Scan & pay with QR code</a>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 ">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/qrcode.png" class="opacity-10" alt="">
                                                            <button id="generate-qr" class="w-full absolute bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Genereate QR Code & Pay</button>
                                                        </div>

                                                        <div class="relative my-6">
                                                            <span class="absolute inset-x-0 top-1/2 transform -translate-y-1/2 text-sm text-[#999999] border border-[#EEEEEE] rounded-full bg-white px-2 mx-auto w-10 text-center">OR</span>
                                                            <hr class="border-gray-300">
                                                        </div>

                                                        <div class="text-center">
                                                            <a href="#" class="text-[#42794A] font-[Gilroy-Medium] text-xl hover:underline">Pay with UPI ID</a>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                        <div class="flex flex-col gap-4 justify-center items-center p-8 relative">
                                                            <div class="flex justify-between items-center gap-2 font-[Gilroy-Medium]">
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M12 9.5V13.5L14.5 15M12 5C7.30558 5 3.5 8.80558 3.5 13.5C3.5 18.1944 7.30558 22 12 22C16.6944 22 20.5 18.1944 20.5 13.5C20.5 8.80558 16.6944 5 12 5ZM12 5V2M10 2H14M20.329 5.59204L18.829 4.09204L19.579 4.84204M3.67102 5.59204L5.17102 4.09204L4.42102 4.84204" stroke="#61CE70" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </span>
                                                                <span id="timer-container" class="text-base font-[Gilroy-Medium] text-[#252525]"> 03:00</span>

                                                            </div>
                                                            <div class="border border-[#EEEEEE] rounded-xl flex justify-center items-center p-8 relative">
                                                                <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/qrcode.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="text-sm text-center px-8 text-[#999999] mt-4">Please do not press the back button. Going back from this screen will expire the QR code and cancel the payment.</p>
                                                    </div>
                                                </div>

                                                <div class="form-step failed hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 flex flex-col gap-4 justify-center items-center">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/payment-failed.png" class="" alt="">
                                                        </div>
                                                        <div class="text-center w-full sm:px-5 lg:px-10">
                                                            <h3 class="capitalize xl:mb-2 text-xl font-[Gilroy-Medium] xl:text-xl">Payment Interrupted</h3>
                                                            <p class="text-center text-sm text-[#999999] mb-4">Your payment was dropped during the journey and couldn’t be completed.</p>
                                                            <button class="w-full  bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Retry</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-step success hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 flex flex-col gap-4 justify-center items-center">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/payment-success.png" class="" alt="">
                                                        </div>
                                                        <div class="text-center w-full sm:px-5 lg:px-10">
                                                            <h3 class="capitalize xl:mb-2 text-xl font-[Gilroy-Medium] xl:text-xl">Payment Success!</h3>
                                                            <p class="text-center text-sm text-[#999999] mb-4">Your payment was successfully completed.</p>
                                                            <button class="w-full bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Done</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div id="tab4-content" class="tab-content hidden">
                                        <section class="Electricity flex flex-col justify-start  lg:grid grid-cols-5 mb-6 px-2 gap-4 h-full">
                                            <div class="col-span-2 left-container">
                                                <div class="form-step block border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                    <h3 class="capitalize mb-4 text-lg font-[Gilroy-Medium] xl:mb-6 2xl:text-xl">Gas bill payment</h3>
                                                    <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl mb-4">
                                                        <input  class="w-full p-3 2xl:text-xl cursor-pointer outline-none select-board" placeholder="Select Gas" type="text" readonly>
                                                        <span class="pr-3"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none">
                                                                <path d="M0.999878 13L6.99988 7L0.999878 1" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg></span>
                                                    </div>
                                                    <div class="number-input-wrapper h-0 overflow-hidden">
                                                        <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl mb-2">
                                                            <input  class="w-full 2xl:text-xl p-3 outline-none consumer-number" placeholder="Consumer number" type="text">
                                                        </div>
                                                        <p class="text-[#999999] text-xs mb-4">
                                                            Please enter your Consumer number starting with regional code followed by section, distribution and service number. Note - Please read disclaimer
                                                        </p>

                                                    </div>

                                                    <button  class="w-full bg-[#42794A] opacity-40 outline-none 2xl:text-xl text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33] proceed-btn" disabled>Proceed</button>
                                                </div>

                                                <div class="form-step border hidden border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                    <h3 class="capitalize mb-3 xl:mb-4 text-lg font-[Gilroy-Medium] 2xl:text-xl">Prepaid recharge</h3>

                                                    <div class="flex items-center justify-between mb-4">
                                                        <div id="opreator-details" class="flex items-center">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/adani.png" alt="Logo" class="w-12 h-12 rounded-full mr-3">
                                                            <div>
                                                                <p class="text-[#999999] font-sm">Adani Electricity Mumbai Limited ...</p>
                                                                <p class="text-xl font-bold text-gray-900">0908765432190</p>
                                                            </div>
                                                        </div>
                                                        <button id="edit-btn" class="text-[#42794A] text-lg font-[Gilroy-Medium]">Edit</button>
                                                    </div>

                                                    <hr class="my-4 border-gray-200">

                                                    <!-- Customer Details Section -->
                                                    <div id="customer-details" class="space-y-2 text-sm">
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999]">Customer name</span>
                                                            <span class=" font-[Gilroy-Medium]">IBRAHIM MOHAMMEDALI</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999]">Bill number</span>
                                                            <span class="font-[Gilroy-Medium]">092141241127</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999] ">Bill date</span>
                                                            <span class="font-[Gilroy-Medium]">07, Aug 2024</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-red-500">Due date</span>
                                                            <span class="text-red-500 font-[Gilroy-Medium]">30, Sep 2024</span>
                                                        </div>
                                                    </div>

                                                    <hr class="my-4 border-gray-200">
                                                    <div class="flex justify-between items-center">
                                                        <span class="text-[#999999]">Total amount</span>
                                                        <span class="bill-amount text-xl font-bold text-gray-900">₹149.0</span>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-span-3 right-container opacity-0">
                                                <div class="form-step block border  border-[#EEEEEE] rounded-xl pb-4  xl:rounded-2xl ">
                                                    <div class="flex items-center justify-between border-b border-[#EEEEEE] p-4 ">
                                                        <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl">Select Gas </h3>
                                                        <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl ">
                                                            <input class="w-full p-2 text-sm 2xl:text-base outline-none search-board" placeholder="Search electricity board"  type="text">
                                                        </div>
                                                    </div>
                                                    <ul class="board-list custom-scrollbar px-4 overflow-y-auto lg:h-[calc(100vh-16rem)]">

                                                    </ul>
                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl  xl:rounded-2xl ">
                                                        <div class="p-4 xl:p-6 hidden">
                                                            <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl">Region code for reference</h3>
                                                            <div class="grid grid-cols-4 grid-flow-row gap-2 mt-2 text-sm text-[#999999] mb-4">
                                                                <p><span class="font-bold text-nowrap">01</span> - Chennai North</p>
                                                                <p><span class="font-bold text-nowrap">02</span> - Villupuram</p>
                                                                <p class="col-span-2"><span class="font-bold ">03</span> - Coimbatore</p>
                                                                <p><span class="font-bold text-nowrap">04</span> - Erode</p>
                                                                <p><span class="font-bold">05</span> - Madurai</p>
                                                                <p class="col-span-2"><span class="font-bold">06</span> - Trichy</p>
                                                                <p><span class="font-bold">07</span> - Tirunelveli</p>
                                                                <p><span class="font-bold">08</span> - Vellore</p>
                                                                <p class="col-span-2 text-nowrap"><span class="font-bold">09</span> - Chennai South</p>
                                                            </div>
                                                            <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl mb-3">Sample Bill</h3>
                                                        </div>

                                                        <div class="overflow-y-auto custom-scrollbar p-4 xl:p-6  lg:h-[calc(100vh-18rem)]">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/sample.png" alt="bill">
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 pb-12">
                                                        <h3 class="capitalize text-lg 2xl:text-xl font-[Gilroy-Medium] mb-4">Pay with UPI ID</h3>

                                                        <!-- UPI ID Input Field -->
                                                        <div class="mb-4">
                                                            <label for="upi-id" class="block text-sm font-medium text-[#999999]">Enter UPI ID</label>
                                                            <div class="flex items-center mt-1 relative">
                                                                <input type="text" id="upi-id" value="8778214386@qpay" class="w-full p-2.5 border text-[Gilroy-Medium] border-[#EEEEEE] rounded-md focus:outline-none focus:border-[#61CE70]" readonly>
                                                                <div>
                                                                    <p class="verify-btn text-sm cursor-pointer font-[Gilroy-Medium] text-[#42794A] underline absolute right-3 top-3 ">Verify</p>

                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 hidden h-5 text-green-500 absolute right-3 top-3" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" fill="#61CE70" />
                                                                        <path d="M7.5 12L10.5 15L16.5 9" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Suggested Bank Handles -->
                                                        <div class="flex flex-wrap gap-2 mb-4">
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ybl</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ibl</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@okaxis</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@okicici</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ptaxis</span>
                                                        </div>

                                                        <!-- Verified Details Section -->
                                                        <div class="verified-details mb-4 h-0 overflow-hidden">
                                                            <p class="text-sm text-[#999999]">Verified Details</p>
                                                            <div class="flex items-center mt-2">
                                                                <img src="<?php echo ROOT_URL; ?>/assets/images/profile.png" alt="User Profile" class="w-10 h-10 rounded-full mr-3">
                                                                <div>
                                                                    <p class="text-gray-900 font-semibold flex items-center gap-2">Ibrahim Mohammedali <span class="text-green-500 inline"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <path d="M7.33377 3.8187C8.1376 3.75455 8.90071 3.43846 9.51447 2.91542C10.9467 1.69486 13.0533 1.69486 14.4855 2.91542C15.0993 3.43846 15.8624 3.75455 16.6662 3.8187C18.5421 3.96839 20.0316 5.45794 20.1813 7.33377C20.2455 8.1376 20.5615 8.90071 21.0846 9.51447C22.3051 10.9467 22.3051 13.0533 21.0846 14.4855C20.5615 15.0993 20.2455 15.8624 20.1813 16.6662C20.0316 18.5421 18.5421 20.0316 16.6662 20.1813C15.8624 20.2455 15.0993 20.5615 14.4855 21.0846C13.0533 22.3051 10.9467 22.3051 9.51447 21.0846C8.90071 20.5615 8.1376 20.2455 7.33377 20.1813C5.45794 20.0316 3.96839 18.5421 3.8187 16.6662C3.75455 15.8624 3.43846 15.0993 2.91542 14.4855C1.69486 13.0533 1.69486 10.9467 2.91542 9.51447C3.43846 8.90071 3.75455 8.1376 3.8187 7.33377C3.96839 5.45794 5.45794 3.96839 7.33377 3.8187Z" fill="#61CE70" />
                                                                                <path d="M9 12.0005L11 14.0005L15.5 9.50049" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                                            </svg></span></p>
                                                                    <p class="text-sm text-[#999999]">8778214386@qpay</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Send Payment Button -->
                                                        <button class="w-full bg-[#42794A] opacity-40 text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]" disabled>Send Payment Request</button>

                                                        <!-- Divider with OR text -->
                                                        <div class="relative my-6">
                                                            <span class="absolute inset-x-0 top-1/2 transform -translate-y-1/2 text-sm text-[#999999] border border-[#EEEEEE] rounded-full bg-white px-2 mx-auto w-10 text-center">OR</span>
                                                            <hr class="border-gray-300">
                                                        </div>

                                                        <!-- QR Code Payment Option -->
                                                        <div class="text-center">
                                                            <a href="#" class="text-[#42794A] font-[Gilroy-Medium] text-xl hover:underline">Scan & pay with QR code</a>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 ">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/qrcode.png" class="opacity-10" alt="">
                                                            <button id="generate-qr" class="w-full absolute bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Genereate QR Code & Pay</button>
                                                        </div>

                                                        <div class="relative my-6">
                                                            <span class="absolute inset-x-0 top-1/2 transform -translate-y-1/2 text-sm text-[#999999] border border-[#EEEEEE] rounded-full bg-white px-2 mx-auto w-10 text-center">OR</span>
                                                            <hr class="border-gray-300">
                                                        </div>

                                                        <div class="text-center">
                                                            <a href="#" class="text-[#42794A] font-[Gilroy-Medium] text-xl hover:underline">Pay with UPI ID</a>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                        <div class="flex flex-col gap-4 justify-center items-center p-8 relative">
                                                            <div class="flex justify-between items-center gap-2 font-[Gilroy-Medium]">
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M12 9.5V13.5L14.5 15M12 5C7.30558 5 3.5 8.80558 3.5 13.5C3.5 18.1944 7.30558 22 12 22C16.6944 22 20.5 18.1944 20.5 13.5C20.5 8.80558 16.6944 5 12 5ZM12 5V2M10 2H14M20.329 5.59204L18.829 4.09204L19.579 4.84204M3.67102 5.59204L5.17102 4.09204L4.42102 4.84204" stroke="#61CE70" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </span>
                                                                <span id="timer-container" class="text-base font-[Gilroy-Medium] text-[#252525]"> 03:00</span>

                                                            </div>
                                                            <div class="border border-[#EEEEEE] rounded-xl flex justify-center items-center p-8 relative">
                                                                <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/qrcode.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="text-sm text-center px-8 text-[#999999] mt-4">Please do not press the back button. Going back from this screen will expire the QR code and cancel the payment.</p>
                                                    </div>
                                                </div>

                                                <div class="form-step failed hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 flex flex-col gap-4 justify-center items-center">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/payment-failed.png" class="" alt="">
                                                        </div>
                                                        <div class="text-center w-full sm:px-5 lg:px-10">
                                                            <h3 class="capitalize xl:mb-2 text-xl font-[Gilroy-Medium] xl:text-xl">Payment Interrupted</h3>
                                                            <p class="text-center text-sm text-[#999999] mb-4">Your payment was dropped during the journey and couldn’t be completed.</p>
                                                            <button class="w-full  bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Retry</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-step success hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 flex flex-col gap-4 justify-center items-center">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/payment-success.png" class="" alt="">
                                                        </div>
                                                        <div class="text-center w-full sm:px-5 lg:px-10">
                                                            <h3 class="capitalize xl:mb-2 text-xl font-[Gilroy-Medium] xl:text-xl">Payment Success!</h3>
                                                            <p class="text-center text-sm text-[#999999] mb-4">Your payment was successfully completed.</p>
                                                            <button class="w-full bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Done</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div id="tab5-content" class="tab-content hidden">
                                        <section class="Electricity flex flex-col justify-start  lg:grid grid-cols-5 mb-6 px-2 gap-4 h-full">
                                            <div class="col-span-2 left-container">
                                                <div class="form-step block border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                    <h3 class="capitalize mb-4 text-lg font-[Gilroy-Medium] xl:mb-6 2xl:text-xl">DTH bill payment</h3>
                                                    <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl mb-4">
                                                        <input  class="w-full p-3 2xl:text-xl cursor-pointer outline-none select-board" placeholder="Select DTH" type="text" readonly>
                                                        <span class="pr-3"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none">
                                                                <path d="M0.999878 13L6.99988 7L0.999878 1" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg></span>
                                                    </div>
                                                    <div class="number-input-wrapper h-0 overflow-hidden">
                                                        <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl mb-2">
                                                            <input  class="w-full 2xl:text-xl p-3 outline-none consumer-number" placeholder="Consumer number" type="text">
                                                        </div>
                                                        <p class="text-[#999999] text-xs mb-4">
                                                            Please enter your Consumer number starting with regional code followed by section, distribution and service number. Note - Please read disclaimer
                                                        </p>

                                                    </div>

                                                    <button  class="w-full bg-[#42794A] opacity-40 outline-none 2xl:text-xl text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33] proceed-btn" disabled>Proceed</button>
                                                </div>

                                                <div class="form-step border hidden border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                    <h3 class="capitalize mb-3 xl:mb-4 text-lg font-[Gilroy-Medium] 2xl:text-xl">Prepaid recharge</h3>

                                                    <div class="flex items-center justify-between mb-4">
                                                        <div id="opreator-details" class="flex items-center">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/adani.png" alt="Logo" class="w-12 h-12 rounded-full mr-3">
                                                            <div>
                                                                <p class="text-[#999999] font-sm">Adani Electricity Mumbai Limited ...</p>
                                                                <p class="text-xl font-bold text-gray-900">0908765432190</p>
                                                            </div>
                                                        </div>
                                                        <button id="edit-btn" class="text-[#42794A] text-lg font-[Gilroy-Medium]">Edit</button>
                                                    </div>

                                                    <hr class="my-4 border-gray-200">

                                                    <!-- Customer Details Section -->
                                                    <div id="customer-details" class="space-y-2 text-sm">
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999]">Customer name</span>
                                                            <span class=" font-[Gilroy-Medium]">IBRAHIM MOHAMMEDALI</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999]">Bill number</span>
                                                            <span class="font-[Gilroy-Medium]">092141241127</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999] ">Bill date</span>
                                                            <span class="font-[Gilroy-Medium]">07, Aug 2024</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-red-500">Due date</span>
                                                            <span class="text-red-500 font-[Gilroy-Medium]">30, Sep 2024</span>
                                                        </div>
                                                    </div>

                                                    <hr class="my-4 border-gray-200">
                                                    <div class="flex justify-between items-center">
                                                        <span class="text-[#999999]">Total amount</span>
                                                        <span class="bill-amount text-xl font-bold text-gray-900">₹149.0</span>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-span-3 right-container opacity-0">
                                                <div class="form-step block border  border-[#EEEEEE] rounded-xl pb-4  xl:rounded-2xl ">
                                                    <div class="flex items-center justify-between border-b border-[#EEEEEE] p-4 ">
                                                        <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl">Select DTH board</h3>
                                                        <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl ">
                                                            <input class="w-full p-2 text-sm 2xl:text-base outline-none search-board" placeholder="Search electricity board"  type="text">
                                                        </div>
                                                    </div>
                                                    <ul class="board-list custom-scrollbar px-4 overflow-y-auto lg:h-[calc(100vh-16rem)]">

                                                    </ul>
                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl  xl:rounded-2xl ">
                                                        <div class="p-4 xl:p-6 hidden">
                                                            <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl">Region code for reference</h3>
                                                            <div class="grid grid-cols-4 grid-flow-row gap-2 mt-2 text-sm text-[#999999] mb-4">
                                                                <p><span class="font-bold text-nowrap">01</span> - Chennai North</p>
                                                                <p><span class="font-bold text-nowrap">02</span> - Villupuram</p>
                                                                <p class="col-span-2"><span class="font-bold ">03</span> - Coimbatore</p>
                                                                <p><span class="font-bold text-nowrap">04</span> - Erode</p>
                                                                <p><span class="font-bold">05</span> - Madurai</p>
                                                                <p class="col-span-2"><span class="font-bold">06</span> - Trichy</p>
                                                                <p><span class="font-bold">07</span> - Tirunelveli</p>
                                                                <p><span class="font-bold">08</span> - Vellore</p>
                                                                <p class="col-span-2 text-nowrap"><span class="font-bold">09</span> - Chennai South</p>
                                                            </div>
                                                            <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl mb-3">Sample Bill</h3>
                                                        </div>

                                                        <div class="overflow-y-auto custom-scrollbar p-4 xl:p-6  lg:h-[calc(100vh-18rem)]">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/sample.png" alt="bill">
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 pb-12">
                                                        <h3 class="capitalize text-lg 2xl:text-xl font-[Gilroy-Medium] mb-4">Pay with UPI ID</h3>

                                                        <!-- UPI ID Input Field -->
                                                        <div class="mb-4">
                                                            <label for="upi-id" class="block text-sm font-medium text-[#999999]">Enter UPI ID</label>
                                                            <div class="flex items-center mt-1 relative">
                                                                <input type="text" id="upi-id" value="8778214386@qpay" class="w-full p-2.5 border text-[Gilroy-Medium] border-[#EEEEEE] rounded-md focus:outline-none focus:border-[#61CE70]" readonly>
                                                                <div>
                                                                    <p class="verify-btn text-sm cursor-pointer font-[Gilroy-Medium] text-[#42794A] underline absolute right-3 top-3 ">Verify</p>

                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 hidden h-5 text-green-500 absolute right-3 top-3" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" fill="#61CE70" />
                                                                        <path d="M7.5 12L10.5 15L16.5 9" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Suggested Bank Handles -->
                                                        <div class="flex flex-wrap gap-2 mb-4">
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ybl</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ibl</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@okaxis</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@okicici</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ptaxis</span>
                                                        </div>

                                                        <!-- Verified Details Section -->
                                                        <div class="verified-details mb-4 h-0 overflow-hidden">
                                                            <p class="text-sm text-[#999999]">Verified Details</p>
                                                            <div class="flex items-center mt-2">
                                                                <img src="<?php echo ROOT_URL; ?>/assets/images/profile.png" alt="User Profile" class="w-10 h-10 rounded-full mr-3">
                                                                <div>
                                                                    <p class="text-gray-900 font-semibold flex items-center gap-2">Ibrahim Mohammedali <span class="text-green-500 inline"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <path d="M7.33377 3.8187C8.1376 3.75455 8.90071 3.43846 9.51447 2.91542C10.9467 1.69486 13.0533 1.69486 14.4855 2.91542C15.0993 3.43846 15.8624 3.75455 16.6662 3.8187C18.5421 3.96839 20.0316 5.45794 20.1813 7.33377C20.2455 8.1376 20.5615 8.90071 21.0846 9.51447C22.3051 10.9467 22.3051 13.0533 21.0846 14.4855C20.5615 15.0993 20.2455 15.8624 20.1813 16.6662C20.0316 18.5421 18.5421 20.0316 16.6662 20.1813C15.8624 20.2455 15.0993 20.5615 14.4855 21.0846C13.0533 22.3051 10.9467 22.3051 9.51447 21.0846C8.90071 20.5615 8.1376 20.2455 7.33377 20.1813C5.45794 20.0316 3.96839 18.5421 3.8187 16.6662C3.75455 15.8624 3.43846 15.0993 2.91542 14.4855C1.69486 13.0533 1.69486 10.9467 2.91542 9.51447C3.43846 8.90071 3.75455 8.1376 3.8187 7.33377C3.96839 5.45794 5.45794 3.96839 7.33377 3.8187Z" fill="#61CE70" />
                                                                                <path d="M9 12.0005L11 14.0005L15.5 9.50049" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                                            </svg></span></p>
                                                                    <p class="text-sm text-[#999999]">8778214386@qpay</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Send Payment Button -->
                                                        <button class="w-full bg-[#42794A] opacity-40 text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]" disabled>Send Payment Request</button>

                                                        <!-- Divider with OR text -->
                                                        <div class="relative my-6">
                                                            <span class="absolute inset-x-0 top-1/2 transform -translate-y-1/2 text-sm text-[#999999] border border-[#EEEEEE] rounded-full bg-white px-2 mx-auto w-10 text-center">OR</span>
                                                            <hr class="border-gray-300">
                                                        </div>

                                                        <!-- QR Code Payment Option -->
                                                        <div class="text-center">
                                                            <a href="#" class="text-[#42794A] font-[Gilroy-Medium] text-xl hover:underline">Scan & pay with QR code</a>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 ">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/qrcode.png" class="opacity-10" alt="">
                                                            <button id="generate-qr" class="w-full absolute bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Genereate QR Code & Pay</button>
                                                        </div>

                                                        <div class="relative my-6">
                                                            <span class="absolute inset-x-0 top-1/2 transform -translate-y-1/2 text-sm text-[#999999] border border-[#EEEEEE] rounded-full bg-white px-2 mx-auto w-10 text-center">OR</span>
                                                            <hr class="border-gray-300">
                                                        </div>

                                                        <div class="text-center">
                                                            <a href="#" class="text-[#42794A] font-[Gilroy-Medium] text-xl hover:underline">Pay with UPI ID</a>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                        <div class="flex flex-col gap-4 justify-center items-center p-8 relative">
                                                            <div class="flex justify-between items-center gap-2 font-[Gilroy-Medium]">
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M12 9.5V13.5L14.5 15M12 5C7.30558 5 3.5 8.80558 3.5 13.5C3.5 18.1944 7.30558 22 12 22C16.6944 22 20.5 18.1944 20.5 13.5C20.5 8.80558 16.6944 5 12 5ZM12 5V2M10 2H14M20.329 5.59204L18.829 4.09204L19.579 4.84204M3.67102 5.59204L5.17102 4.09204L4.42102 4.84204" stroke="#61CE70" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </span>
                                                                <span id="timer-container" class="text-base font-[Gilroy-Medium] text-[#252525]"> 03:00</span>

                                                            </div>
                                                            <div class="border border-[#EEEEEE] rounded-xl flex justify-center items-center p-8 relative">
                                                                <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/qrcode.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="text-sm text-center px-8 text-[#999999] mt-4">Please do not press the back button. Going back from this screen will expire the QR code and cancel the payment.</p>
                                                    </div>
                                                </div>

                                                <div class="form-step failed hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 flex flex-col gap-4 justify-center items-center">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/payment-failed.png" class="" alt="">
                                                        </div>
                                                        <div class="text-center w-full sm:px-5 lg:px-10">
                                                            <h3 class="capitalize xl:mb-2 text-xl font-[Gilroy-Medium] xl:text-xl">Payment Interrupted</h3>
                                                            <p class="text-center text-sm text-[#999999] mb-4">Your payment was dropped during the journey and couldn’t be completed.</p>
                                                            <button class="w-full  bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Retry</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-step success hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 flex flex-col gap-4 justify-center items-center">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/payment-success.png" class="" alt="">
                                                        </div>
                                                        <div class="text-center w-full sm:px-5 lg:px-10">
                                                            <h3 class="capitalize xl:mb-2 text-xl font-[Gilroy-Medium] xl:text-xl">Payment Success!</h3>
                                                            <p class="text-center text-sm text-[#999999] mb-4">Your payment was successfully completed.</p>
                                                            <button class="w-full bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Done</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div id="tab6-content" class="tab-content hidden">
                                        <section class="Electricity flex flex-col justify-start  lg:grid grid-cols-5 mb-6 px-2 gap-4 h-full">
                                            <div class="col-span-2 left-container">
                                                <div class="form-step block border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                    <h3 class="capitalize mb-4 text-lg font-[Gilroy-Medium] xl:mb-6 2xl:text-xl">Prepaid bill payment</h3>
                                                    <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl mb-4">
                                                        <input  class="w-full p-3 2xl:text-xl cursor-pointer outline-none select-board" placeholder="Select Prepaid " type="text" readonly>
                                                        <span class="pr-3"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none">
                                                                <path d="M0.999878 13L6.99988 7L0.999878 1" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg></span>
                                                    </div>
                                                    <div class="number-input-wrapper h-0 overflow-hidden">
                                                        <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl mb-2">
                                                            <input  class="w-full 2xl:text-xl p-3 outline-none consumer-number" placeholder="Consumer number" type="text">
                                                        </div>
                                                        <p class="text-[#999999] text-xs mb-4">
                                                            Please enter your Consumer number starting with regional code followed by section, distribution and service number. Note - Please read disclaimer
                                                        </p>

                                                    </div>

                                                    <button  class="w-full bg-[#42794A] opacity-40 outline-none 2xl:text-xl text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33] proceed-btn" disabled>Proceed</button>
                                                </div>

                                                <div class="form-step border hidden border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                    <h3 class="capitalize mb-3 xl:mb-4 text-lg font-[Gilroy-Medium] 2xl:text-xl">Prepaid recharge</h3>

                                                    <div class="flex items-center justify-between mb-4">
                                                        <div id="opreator-details" class="flex items-center">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/adani.png" alt="Logo" class="w-12 h-12 rounded-full mr-3">
                                                            <div>
                                                                <p class="text-[#999999] font-sm">Adani Electricity Mumbai Limited ...</p>
                                                                <p class="text-xl font-bold text-gray-900">0908765432190</p>
                                                            </div>
                                                        </div>
                                                        <button id="edit-btn" class="text-[#42794A] text-lg font-[Gilroy-Medium]">Edit</button>
                                                    </div>

                                                    <hr class="my-4 border-gray-200">

                                                    <!-- Customer Details Section -->
                                                    <div id="customer-details" class="space-y-2 text-sm">
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999]">Customer name</span>
                                                            <span class=" font-[Gilroy-Medium]">IBRAHIM MOHAMMEDALI</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999]">Bill number</span>
                                                            <span class="font-[Gilroy-Medium]">092141241127</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999] ">Bill date</span>
                                                            <span class="font-[Gilroy-Medium]">07, Aug 2024</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-red-500">Due date</span>
                                                            <span class="text-red-500 font-[Gilroy-Medium]">30, Sep 2024</span>
                                                        </div>
                                                    </div>

                                                    <hr class="my-4 border-gray-200">
                                                    <div class="flex justify-between items-center">
                                                        <span class="text-[#999999]">Total amount</span>
                                                        <span class="bill-amount text-xl font-bold text-gray-900">₹149.0</span>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-span-3 right-container opacity-0">
                                                <div class="form-step block border  border-[#EEEEEE] rounded-xl pb-4  xl:rounded-2xl ">
                                                    <div class="flex items-center justify-between border-b border-[#EEEEEE] p-4 ">
                                                        <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl">Select Prepaid</h3>
                                                        <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl ">
                                                            <input class="w-full p-2 text-sm 2xl:text-base outline-none search-board" placeholder="Search electricity board"  type="text">
                                                        </div>
                                                    </div>
                                                    <ul class="board-list custom-scrollbar px-4 overflow-y-auto lg:h-[calc(100vh-16rem)]">

                                                    </ul>
                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl  xl:rounded-2xl ">
                                                        <div class="p-4 xl:p-6 hidden">
                                                            <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl">Region code for reference</h3>
                                                            <div class="grid grid-cols-4 grid-flow-row gap-2 mt-2 text-sm text-[#999999] mb-4">
                                                                <p><span class="font-bold text-nowrap">01</span> - Chennai North</p>
                                                                <p><span class="font-bold text-nowrap">02</span> - Villupuram</p>
                                                                <p class="col-span-2"><span class="font-bold ">03</span> - Coimbatore</p>
                                                                <p><span class="font-bold text-nowrap">04</span> - Erode</p>
                                                                <p><span class="font-bold">05</span> - Madurai</p>
                                                                <p class="col-span-2"><span class="font-bold">06</span> - Trichy</p>
                                                                <p><span class="font-bold">07</span> - Tirunelveli</p>
                                                                <p><span class="font-bold">08</span> - Vellore</p>
                                                                <p class="col-span-2 text-nowrap"><span class="font-bold">09</span> - Chennai South</p>
                                                            </div>
                                                            <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl mb-3">Sample Bill</h3>
                                                        </div>

                                                        <div class="overflow-y-auto custom-scrollbar p-4 xl:p-6  lg:h-[calc(100vh-18rem)]">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/sample.png" alt="bill">
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 pb-12">
                                                        <h3 class="capitalize text-lg 2xl:text-xl font-[Gilroy-Medium] mb-4">Pay with UPI ID</h3>

                                                        <!-- UPI ID Input Field -->
                                                        <div class="mb-4">
                                                            <label for="upi-id" class="block text-sm font-medium text-[#999999]">Enter UPI ID</label>
                                                            <div class="flex items-center mt-1 relative">
                                                                <input type="text" id="upi-id" value="8778214386@qpay" class="w-full p-2.5 border text-[Gilroy-Medium] border-[#EEEEEE] rounded-md focus:outline-none focus:border-[#61CE70]" readonly>
                                                                <div>
                                                                    <p class="verify-btn text-sm cursor-pointer font-[Gilroy-Medium] text-[#42794A] underline absolute right-3 top-3 ">Verify</p>

                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 hidden h-5 text-green-500 absolute right-3 top-3" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" fill="#61CE70" />
                                                                        <path d="M7.5 12L10.5 15L16.5 9" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Suggested Bank Handles -->
                                                        <div class="flex flex-wrap gap-2 mb-4">
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ybl</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ibl</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@okaxis</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@okicici</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ptaxis</span>
                                                        </div>

                                                        <!-- Verified Details Section -->
                                                        <div class="verified-details mb-4 h-0 overflow-hidden">
                                                            <p class="text-sm text-[#999999]">Verified Details</p>
                                                            <div class="flex items-center mt-2">
                                                                <img src="<?php echo ROOT_URL; ?>/assets/images/profile.png" alt="User Profile" class="w-10 h-10 rounded-full mr-3">
                                                                <div>
                                                                    <p class="text-gray-900 font-semibold flex items-center gap-2">Ibrahim Mohammedali <span class="text-green-500 inline"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <path d="M7.33377 3.8187C8.1376 3.75455 8.90071 3.43846 9.51447 2.91542C10.9467 1.69486 13.0533 1.69486 14.4855 2.91542C15.0993 3.43846 15.8624 3.75455 16.6662 3.8187C18.5421 3.96839 20.0316 5.45794 20.1813 7.33377C20.2455 8.1376 20.5615 8.90071 21.0846 9.51447C22.3051 10.9467 22.3051 13.0533 21.0846 14.4855C20.5615 15.0993 20.2455 15.8624 20.1813 16.6662C20.0316 18.5421 18.5421 20.0316 16.6662 20.1813C15.8624 20.2455 15.0993 20.5615 14.4855 21.0846C13.0533 22.3051 10.9467 22.3051 9.51447 21.0846C8.90071 20.5615 8.1376 20.2455 7.33377 20.1813C5.45794 20.0316 3.96839 18.5421 3.8187 16.6662C3.75455 15.8624 3.43846 15.0993 2.91542 14.4855C1.69486 13.0533 1.69486 10.9467 2.91542 9.51447C3.43846 8.90071 3.75455 8.1376 3.8187 7.33377C3.96839 5.45794 5.45794 3.96839 7.33377 3.8187Z" fill="#61CE70" />
                                                                                <path d="M9 12.0005L11 14.0005L15.5 9.50049" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                                            </svg></span></p>
                                                                    <p class="text-sm text-[#999999]">8778214386@qpay</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Send Payment Button -->
                                                        <button class="w-full bg-[#42794A] opacity-40 text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]" disabled>Send Payment Request</button>

                                                        <!-- Divider with OR text -->
                                                        <div class="relative my-6">
                                                            <span class="absolute inset-x-0 top-1/2 transform -translate-y-1/2 text-sm text-[#999999] border border-[#EEEEEE] rounded-full bg-white px-2 mx-auto w-10 text-center">OR</span>
                                                            <hr class="border-gray-300">
                                                        </div>

                                                        <!-- QR Code Payment Option -->
                                                        <div class="text-center">
                                                            <a href="#" class="text-[#42794A] font-[Gilroy-Medium] text-xl hover:underline">Scan & pay with QR code</a>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 ">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/qrcode.png" class="opacity-10" alt="">
                                                            <button id="generate-qr" class="w-full absolute bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Genereate QR Code & Pay</button>
                                                        </div>

                                                        <div class="relative my-6">
                                                            <span class="absolute inset-x-0 top-1/2 transform -translate-y-1/2 text-sm text-[#999999] border border-[#EEEEEE] rounded-full bg-white px-2 mx-auto w-10 text-center">OR</span>
                                                            <hr class="border-gray-300">
                                                        </div>

                                                        <div class="text-center">
                                                            <a href="#" class="text-[#42794A] font-[Gilroy-Medium] text-xl hover:underline">Pay with UPI ID</a>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                        <div class="flex flex-col gap-4 justify-center items-center p-8 relative">
                                                            <div class="flex justify-between items-center gap-2 font-[Gilroy-Medium]">
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M12 9.5V13.5L14.5 15M12 5C7.30558 5 3.5 8.80558 3.5 13.5C3.5 18.1944 7.30558 22 12 22C16.6944 22 20.5 18.1944 20.5 13.5C20.5 8.80558 16.6944 5 12 5ZM12 5V2M10 2H14M20.329 5.59204L18.829 4.09204L19.579 4.84204M3.67102 5.59204L5.17102 4.09204L4.42102 4.84204" stroke="#61CE70" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </span>
                                                                <span id="timer-container" class="text-base font-[Gilroy-Medium] text-[#252525]"> 03:00</span>

                                                            </div>
                                                            <div class="border border-[#EEEEEE] rounded-xl flex justify-center items-center p-8 relative">
                                                                <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/qrcode.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="text-sm text-center px-8 text-[#999999] mt-4">Please do not press the back button. Going back from this screen will expire the QR code and cancel the payment.</p>
                                                    </div>
                                                </div>

                                                <div class="form-step failed hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 flex flex-col gap-4 justify-center items-center">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/payment-failed.png" class="" alt="">
                                                        </div>
                                                        <div class="text-center w-full sm:px-5 lg:px-10">
                                                            <h3 class="capitalize xl:mb-2 text-xl font-[Gilroy-Medium] xl:text-xl">Payment Interrupted</h3>
                                                            <p class="text-center text-sm text-[#999999] mb-4">Your payment was dropped during the journey and couldn’t be completed.</p>
                                                            <button class="w-full  bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Retry</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-step success hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 flex flex-col gap-4 justify-center items-center">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/payment-success.png" class="" alt="">
                                                        </div>
                                                        <div class="text-center w-full sm:px-5 lg:px-10">
                                                            <h3 class="capitalize xl:mb-2 text-xl font-[Gilroy-Medium] xl:text-xl">Payment Success!</h3>
                                                            <p class="text-center text-sm text-[#999999] mb-4">Your payment was successfully completed.</p>
                                                            <button class="w-full bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Done</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div id="tab7-content" class="tab-content hidden">
                                        <section class="Electricity flex flex-col justify-start  lg:grid grid-cols-5 mb-6 px-2 gap-4 h-full">
                                            <div class="col-span-2 left-container">
                                                <div class="form-step  block form-step-1 border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                    <h3 class="capitalize mb-4 text-lg font-[Gilroy-Medium] xl:mb-6 2xl:text-xl">Postpaid bill payment</h3>
                                                    <!-- <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl mb-4">
                                                        <input  class="w-full p-3 2xl:text-xl cursor-pointer outline-none select-board" placeholder="Select Postpaid" type="text" readonly>
                                                        <span class="pr-3"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none">
                                                                <path d="M0.999878 13L6.99988 7L0.999878 1" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg></span>
                                                    </div>
                                                    <div class="number-input-wrapper h-0 overflow-hidden">
                                                        <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl mb-2">
                                                            <input class="w-full 2xl:text-xl p-3 outline-none consumer-number" placeholder="Consumer number" type="text">
                                                        </div>
                                                        <p class="text-[#999999] text-xs mb-4">
                                                            Please enter your Consumer number starting with regional code followed by section, distribution and service number. Note - Please read disclaimer
                                                        </p>

                                                    </div> -->
                                                    <div class="postpaid-wrapper" id="postpaid-wrapper">

                                                    </div>

                                                    <!-- <button  class="w-full bg-[#42794A] opacity-40 outline-none 2xl:text-xl text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33] proceed-btn" disabled>Proceed</button> -->
                                                </div>

                                                <div class="form-step border hidden form-step-2 border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                    <h3 class="capitalize mb-3 xl:mb-4 text-lg font-[Gilroy-Medium] 2xl:text-xl">Postpaid recharge</h3>

                                                    <div class="flex items-center justify-between mb-4">
                                                        <div id="post-opreator-details" class="flex items-center">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/adani.png" alt="Logo" class="w-12 h-12 rounded-full mr-3">
                                                            <div>
                                                                <p class="text-[#999999] font-sm">Adani Electricity Mumbai Limited ...</p>
                                                                <p class="text-xl font-bold text-gray-900">0908765432190</p>
                                                            </div>
                                                        </div>
                                                        <button id="edit-btn" class="text-[#42794A] text-lg font-[Gilroy-Medium] edit-btn">Edit</button>
                                                    </div>

                                                    <hr class="my-4 border-gray-200">

                                                    <!-- Customer Details Section -->
                                                    <div id="post-customer-details" class="space-y-2 text-sm">
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999]">Customer name</span>
                                                            <span class=" font-[Gilroy-Medium]">IBRAHIM MOHAMMEDALI</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999]">Bill number</span>
                                                            <span class="font-[Gilroy-Medium]">092141241127</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999] ">Bill date</span>
                                                            <span class="font-[Gilroy-Medium]">07, Aug 2024</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-red-500">Due date</span>
                                                            <span class="text-red-500 font-[Gilroy-Medium]">30, Sep 2024</span>
                                                        </div>
                                                    </div>

                                                    <hr class="my-4 border-gray-200">
                                                    <div class="flex justify-between items-center">
                                                        <span class="text-[#999999]">Total amount</span>
                                                        <span class="bill-amount text-xl font-bold text-gray-900">₹149.0</span>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-span-3 right-container opacity-0">
                                                <div class="form-step block select-list-ui border  border-[#EEEEEE] rounded-xl pb-4  xl:rounded-2xl ">
                                                    <div class="flex items-center justify-between border-b border-[#EEEEEE] p-4 ">
                                                        <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl">Select Postpaid </h3>
                                                        <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl ">
                                                            <input class="w-full p-2 text-sm 2xl:text-base outline-none search-board" placeholder="Search electricity board"  type="text">
                                                        </div>
                                                    </div>
                                                    <ul class="board-list custom-scrollbar px-4 overflow-y-auto lg:h-[calc(100vh-16rem)]">

                                                    </ul>
                                                    
                                                </div>
<!-- 
                                                <div class="form-step image hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl  xl:rounded-2xl ">
                                                        <div class="p-4 xl:p-6 hidden">
                                                            <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl">Region code for reference</h3>
                                                            <div class="grid grid-cols-4 grid-flow-row gap-2 mt-2 text-sm text-[#999999] mb-4">
                                                                <p><span class="font-bold text-nowrap">01</span> - Chennai North</p>
                                                                <p><span class="font-bold text-nowrap">02</span> - Villupuram</p>
                                                                <p class="col-span-2"><span class="font-bold ">03</span> - Coimbatore</p>
                                                                <p><span class="font-bold text-nowrap">04</span> - Erode</p>
                                                                <p><span class="font-bold">05</span> - Madurai</p>
                                                                <p class="col-span-2"><span class="font-bold">06</span> - Trichy</p>
                                                                <p><span class="font-bold">07</span> - Tirunelveli</p>
                                                                <p><span class="font-bold">08</span> - Vellore</p>
                                                                <p class="col-span-2 text-nowrap"><span class="font-bold">09</span> - Chennai South</p>
                                                            </div>
                                                            <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl mb-3">Sample Bill</h3>
                                                        </div>

                                                        <div class="overflow-y-auto custom-scrollbar p-4 xl:p-6  lg:h-[calc(100vh-18rem)]">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/sample.png" alt="bill">
                                                        </div>
                                                    </div>


                                                </div> -->

                                                <div class="form-step pay-upi hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 pb-12">
                                                        <h3 class="capitalize text-lg 2xl:text-xl font-[Gilroy-Medium] mb-4">Pay with UPI ID</h3>

                                                        <!-- UPI ID Input Field -->
                                                        <div class="mb-4">
                                                            <label for="upi-id" class="block text-sm font-medium text-[#999999]">Enter UPI ID</label>
                                                            <div class="flex items-center mt-1 relative">
                                                                <input type="text" id="upi-id" value="8778214386@qpay" class="w-full p-2.5 border text-[Gilroy-Medium] border-[#EEEEEE] rounded-md focus:outline-none focus:border-[#61CE70]" readonly>
                                                                <div>
                                                                    <p class="verify-btn text-sm cursor-pointer font-[Gilroy-Medium] text-[#42794A] underline absolute right-3 top-3 ">Verify</p>

                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 hidden h-5 text-green-500 absolute right-3 top-3" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" fill="#61CE70" />
                                                                        <path d="M7.5 12L10.5 15L16.5 9" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Suggested Bank Handles -->
                                                        <div class="flex flex-wrap gap-2 mb-4">
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ybl</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ibl</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@okaxis</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@okicici</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ptaxis</span>
                                                        </div>

                                                        <!-- Verified Details Section -->
                                                        <div class="verified-details mb-4 h-0 overflow-hidden">
                                                            <p class="text-sm text-[#999999]">Verified Details</p>
                                                            <div class="flex items-center mt-2">
                                                                <img src="<?php echo ROOT_URL; ?>/assets/images/profile.png" alt="User Profile" class="w-10 h-10 rounded-full mr-3">
                                                                <div>
                                                                    <p class="text-gray-900 font-semibold flex items-center gap-2">Ibrahim Mohammedali <span class="text-green-500 inline"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <path d="M7.33377 3.8187C8.1376 3.75455 8.90071 3.43846 9.51447 2.91542C10.9467 1.69486 13.0533 1.69486 14.4855 2.91542C15.0993 3.43846 15.8624 3.75455 16.6662 3.8187C18.5421 3.96839 20.0316 5.45794 20.1813 7.33377C20.2455 8.1376 20.5615 8.90071 21.0846 9.51447C22.3051 10.9467 22.3051 13.0533 21.0846 14.4855C20.5615 15.0993 20.2455 15.8624 20.1813 16.6662C20.0316 18.5421 18.5421 20.0316 16.6662 20.1813C15.8624 20.2455 15.0993 20.5615 14.4855 21.0846C13.0533 22.3051 10.9467 22.3051 9.51447 21.0846C8.90071 20.5615 8.1376 20.2455 7.33377 20.1813C5.45794 20.0316 3.96839 18.5421 3.8187 16.6662C3.75455 15.8624 3.43846 15.0993 2.91542 14.4855C1.69486 13.0533 1.69486 10.9467 2.91542 9.51447C3.43846 8.90071 3.75455 8.1376 3.8187 7.33377C3.96839 5.45794 5.45794 3.96839 7.33377 3.8187Z" fill="#61CE70" />
                                                                                <path d="M9 12.0005L11 14.0005L15.5 9.50049" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                                            </svg></span></p>
                                                                    <p class="text-sm text-[#999999]">8778214386@qpay</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Send Payment Button -->
                                                        <button class="w-full bg-[#42794A] opacity-40 text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]" disabled>Send Payment Request</button>

                                                        <!-- Divider with OR text -->
                                                        <div class="relative my-6">
                                                            <span class="absolute inset-x-0 top-1/2 transform -translate-y-1/2 text-sm text-[#999999] border border-[#EEEEEE] rounded-full bg-white px-2 mx-auto w-10 text-center">OR</span>
                                                            <hr class="border-gray-300">
                                                        </div>

                                                        <!-- QR Code Payment Option -->
                                                        <div class="text-center">
                                                            <a href="#" class="text-[#42794A] font-[Gilroy-Medium] text-xl hover:underline">Scan & pay with QR code</a>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="form-step genrate-qr hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 ">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/qrcode.png" class="opacity-10" alt="">
                                                            <button id="generate-qr" class="w-full absolute bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Genereate QR Code & Pay</button>
                                                        </div>

                                                        <div class="relative my-6">
                                                            <span class="absolute inset-x-0 top-1/2 transform -translate-y-1/2 text-sm text-[#999999] border border-[#EEEEEE] rounded-full bg-white px-2 mx-auto w-10 text-center">OR</span>
                                                            <hr class="border-gray-300">
                                                        </div>

                                                        <div class="text-center">
                                                            <a href="#" class="text-[#42794A] font-[Gilroy-Medium] text-xl hover:underline">Pay with UPI ID</a>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-step timer-qr hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                        <div class="flex flex-col gap-4 justify-center items-center p-8 relative">
                                                            <div class="flex justify-between items-center gap-2 font-[Gilroy-Medium]">
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M12 9.5V13.5L14.5 15M12 5C7.30558 5 3.5 8.80558 3.5 13.5C3.5 18.1944 7.30558 22 12 22C16.6944 22 20.5 18.1944 20.5 13.5C20.5 8.80558 16.6944 5 12 5ZM12 5V2M10 2H14M20.329 5.59204L18.829 4.09204L19.579 4.84204M3.67102 5.59204L5.17102 4.09204L4.42102 4.84204" stroke="#61CE70" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </span>
                                                                <span id="timer-container" class="text-base font-[Gilroy-Medium] text-[#252525]"> 03:00</span>

                                                            </div>
                                                            <div class="border border-[#EEEEEE] rounded-xl flex justify-center items-center p-8 relative">
                                                                <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/qrcode.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="text-sm text-center px-8 text-[#999999] mt-4">Please do not press the back button. Going back from this screen will expire the QR code and cancel the payment.</p>
                                                    </div>
                                                </div>

                                                <div class="form-step failed hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 flex flex-col gap-4 justify-center items-center">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/payment-failed.png" class="" alt="">
                                                        </div>
                                                        <div class="text-center w-full sm:px-5 lg:px-10">
                                                            <h3 class="capitalize xl:mb-2 text-xl font-[Gilroy-Medium] xl:text-xl">Payment Interrupted</h3>
                                                            <p class="text-center text-sm text-[#999999] mb-4">Your payment was dropped during the journey and couldn’t be completed.</p>
                                                            <button class="w-full  bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Retry</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-step success hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 flex flex-col gap-4 justify-center items-center">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/payment-success.png" class="" alt="">
                                                        </div>
                                                        <div class="text-center w-full sm:px-5 lg:px-10">
                                                            <h3 class="capitalize xl:mb-2 text-xl font-[Gilroy-Medium] xl:text-xl">Payment Success!</h3>
                                                            <p class="text-center text-sm text-[#999999] mb-4">Your payment was successfully completed.</p>
                                                            <button class="w-full bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Done</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-span-3 right-container-step1 opacity-0">
                                                <div class="form-step block border  border-[#EEEEEE] rounded-xl pb-4  xl:rounded-2xl ">
                                                    <div class="flex items-center justify-between border-b border-[#EEEEEE] p-4 ">
                                                        <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl">Select Postpaid </h3>
                                                        <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl ">
                                                            <input class="w-full p-2 text-sm 2xl:text-base outline-none state-search" placeholder="Search postapid state"  type="text">
                                                        </div>
                                                    </div>
                                                    <ul class="circle-list custom-scrollbar px-4 overflow-y-auto lg:h-[calc(100vh-16rem)]" id="circleList">

                                                    </ul>
                                                    
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div id="tab8-content" class="tab-content hidden">
                                        <section class="Electricity flex flex-col justify-start  lg:grid grid-cols-5 mb-6 px-2 gap-4 h-full">
                                            <div class="col-span-2 left-container">
                                                <div class="form-step block border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                    <h3 class="capitalize mb-4 text-lg font-[Gilroy-Medium] xl:mb-6 2xl:text-xl">Fastag Bill payment</h3>
                                                    <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl mb-4">
                                                        <input  class="w-full p-3 2xl:text-xl cursor-pointer outline-none select-board" placeholder="Select Fastag" type="text" readonly>
                                                        <span class="pr-3"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none">
                                                                <path d="M0.999878 13L6.99988 7L0.999878 1" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg></span>
                                                    </div>
                                                    <div class="number-input-wrapper h-0 overflow-hidden">
                                                        <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl mb-2">
                                                            <input  class="w-full 2xl:text-xl p-3 outline-none consumer-number" placeholder="Consumer number" type="text">
                                                        </div>
                                                        <p class="text-[#999999] text-xs mb-4">
                                                            Please enter your Consumer number starting with regional code followed by section, distribution and service number. Note - Please read disclaimer
                                                        </p>

                                                    </div>

                                                    <button  class="w-full bg-[#42794A] opacity-40 outline-none 2xl:text-xl text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33] proceed-btn" disabled>Proceed</button>
                                                </div>

                                                <div class="form-step border hidden border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                    <h3 class="capitalize mb-3 xl:mb-4 text-lg font-[Gilroy-Medium] 2xl:text-xl">Prepaid recharge</h3>

                                                    <div class="flex items-center justify-between mb-4">
                                                        <div id="opreator-details" class="flex items-center">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/adani.png" alt="Logo" class="w-12 h-12 rounded-full mr-3">
                                                            <div>
                                                                <p class="text-[#999999] font-sm">Adani Electricity Mumbai Limited ...</p>
                                                                <p class="text-xl font-bold text-gray-900">0908765432190</p>
                                                            </div>
                                                        </div>
                                                        <button id="edit-btn" class="text-[#42794A] text-lg font-[Gilroy-Medium]">Edit</button>
                                                    </div>

                                                    <hr class="my-4 border-gray-200">

                                                    <!-- Customer Details Section -->
                                                    <div id="customer-details" class="space-y-2 text-sm">
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999]">Customer name</span>
                                                            <span class=" font-[Gilroy-Medium]">IBRAHIM MOHAMMEDALI</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999]">Bill number</span>
                                                            <span class="font-[Gilroy-Medium]">092141241127</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-[#999999] ">Bill date</span>
                                                            <span class="font-[Gilroy-Medium]">07, Aug 2024</span>
                                                        </div>
                                                        <div class="flex justify-between">
                                                            <span class="text-red-500">Due date</span>
                                                            <span class="text-red-500 font-[Gilroy-Medium]">30, Sep 2024</span>
                                                        </div>
                                                    </div>

                                                    <hr class="my-4 border-gray-200">
                                                    <div class="flex justify-between items-center">
                                                        <span class="text-[#999999]">Total amount</span>
                                                        <span class="bill-amount text-xl font-bold text-gray-900">₹149.0</span>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-span-3 right-container opacity-0">
                                                <div class="form-step block border  border-[#EEEEEE] rounded-xl pb-4  xl:rounded-2xl ">
                                                    <div class="flex items-center justify-between border-b border-[#EEEEEE] p-4 ">
                                                        <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl">Select Fastag </h3>
                                                        <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl ">
                                                            <input class="w-full p-2 text-sm 2xl:text-base outline-none search-board" placeholder="Search electricity board"  type="text">
                                                        </div>
                                                    </div>
                                                    <ul class="board-list custom-scrollbar px-4 overflow-y-auto lg:h-[calc(100vh-16rem)]">

                                                    </ul>
                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl  xl:rounded-2xl ">
                                                        <div class="p-4 xl:p-6 hidden">
                                                            <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl">Region code for reference</h3>
                                                            <div class="grid grid-cols-4 grid-flow-row gap-2 mt-2 text-sm text-[#999999] mb-4">
                                                                <p><span class="font-bold text-nowrap">01</span> - Chennai North</p>
                                                                <p><span class="font-bold text-nowrap">02</span> - Villupuram</p>
                                                                <p class="col-span-2"><span class="font-bold ">03</span> - Coimbatore</p>
                                                                <p><span class="font-bold text-nowrap">04</span> - Erode</p>
                                                                <p><span class="font-bold">05</span> - Madurai</p>
                                                                <p class="col-span-2"><span class="font-bold">06</span> - Trichy</p>
                                                                <p><span class="font-bold">07</span> - Tirunelveli</p>
                                                                <p><span class="font-bold">08</span> - Vellore</p>
                                                                <p class="col-span-2 text-nowrap"><span class="font-bold">09</span> - Chennai South</p>
                                                            </div>
                                                            <h3 class="capitalize text-lg font-[Gilroy-Medium] 2xl:text-xl mb-3">Sample Bill</h3>
                                                        </div>

                                                        <div class="overflow-y-auto custom-scrollbar p-4 xl:p-6  lg:h-[calc(100vh-18rem)]">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/sample.png" alt="bill">
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 pb-12">
                                                        <h3 class="capitalize text-lg 2xl:text-xl font-[Gilroy-Medium] mb-4">Pay with UPI ID</h3>

                                                        <!-- UPI ID Input Field -->
                                                        <div class="mb-4">
                                                            <label for="upi-id" class="block text-sm font-medium text-[#999999]">Enter UPI ID</label>
                                                            <div class="flex items-center mt-1 relative">
                                                                <input type="text" id="upi-id" value="8778214386@qpay" class="w-full p-2.5 border text-[Gilroy-Medium] border-[#EEEEEE] rounded-md focus:outline-none focus:border-[#61CE70]" readonly>
                                                                <div>
                                                                    <p class="verify-btn text-sm cursor-pointer font-[Gilroy-Medium] text-[#42794A] underline absolute right-3 top-3 ">Verify</p>

                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 hidden h-5 text-green-500 absolute right-3 top-3" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" fill="#61CE70" />
                                                                        <path d="M7.5 12L10.5 15L16.5 9" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Suggested Bank Handles -->
                                                        <div class="flex flex-wrap gap-2 mb-4">
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ybl</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ibl</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@okaxis</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@okicici</span>
                                                            <span class="px-3 py-1 text-sm text-[#999999] border border-[#EEEEEE] rounded-full">@ptaxis</span>
                                                        </div>

                                                        <!-- Verified Details Section -->
                                                        <div class="verified-details mb-4 h-0 overflow-hidden">
                                                            <p class="text-sm text-[#999999]">Verified Details</p>
                                                            <div class="flex items-center mt-2">
                                                                <img src="<?php echo ROOT_URL; ?>/assets/images/profile.png" alt="User Profile" class="w-10 h-10 rounded-full mr-3">
                                                                <div>
                                                                    <p class="text-gray-900 font-semibold flex items-center gap-2">Ibrahim Mohammedali <span class="text-green-500 inline"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <path d="M7.33377 3.8187C8.1376 3.75455 8.90071 3.43846 9.51447 2.91542C10.9467 1.69486 13.0533 1.69486 14.4855 2.91542C15.0993 3.43846 15.8624 3.75455 16.6662 3.8187C18.5421 3.96839 20.0316 5.45794 20.1813 7.33377C20.2455 8.1376 20.5615 8.90071 21.0846 9.51447C22.3051 10.9467 22.3051 13.0533 21.0846 14.4855C20.5615 15.0993 20.2455 15.8624 20.1813 16.6662C20.0316 18.5421 18.5421 20.0316 16.6662 20.1813C15.8624 20.2455 15.0993 20.5615 14.4855 21.0846C13.0533 22.3051 10.9467 22.3051 9.51447 21.0846C8.90071 20.5615 8.1376 20.2455 7.33377 20.1813C5.45794 20.0316 3.96839 18.5421 3.8187 16.6662C3.75455 15.8624 3.43846 15.0993 2.91542 14.4855C1.69486 13.0533 1.69486 10.9467 2.91542 9.51447C3.43846 8.90071 3.75455 8.1376 3.8187 7.33377C3.96839 5.45794 5.45794 3.96839 7.33377 3.8187Z" fill="#61CE70" />
                                                                                <path d="M9 12.0005L11 14.0005L15.5 9.50049" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                                            </svg></span></p>
                                                                    <p class="text-sm text-[#999999]">8778214386@qpay</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Send Payment Button -->
                                                        <button class="w-full bg-[#42794A] opacity-40 text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]" disabled>Send Payment Request</button>

                                                        <!-- Divider with OR text -->
                                                        <div class="relative my-6">
                                                            <span class="absolute inset-x-0 top-1/2 transform -translate-y-1/2 text-sm text-[#999999] border border-[#EEEEEE] rounded-full bg-white px-2 mx-auto w-10 text-center">OR</span>
                                                            <hr class="border-gray-300">
                                                        </div>

                                                        <!-- QR Code Payment Option -->
                                                        <div class="text-center">
                                                            <a href="#" class="text-[#42794A] font-[Gilroy-Medium] text-xl hover:underline">Scan & pay with QR code</a>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 ">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/qrcode.png" class="opacity-10" alt="">
                                                            <button id="generate-qr" class="w-full absolute bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Genereate QR Code & Pay</button>
                                                        </div>

                                                        <div class="relative my-6">
                                                            <span class="absolute inset-x-0 top-1/2 transform -translate-y-1/2 text-sm text-[#999999] border border-[#EEEEEE] rounded-full bg-white px-2 mx-auto w-10 text-center">OR</span>
                                                            <hr class="border-gray-300">
                                                        </div>

                                                        <div class="text-center">
                                                            <a href="#" class="text-[#42794A] font-[Gilroy-Medium] text-xl hover:underline">Pay with UPI ID</a>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-step hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6">
                                                        <div class="flex flex-col gap-4 justify-center items-center p-8 relative">
                                                            <div class="flex justify-between items-center gap-2 font-[Gilroy-Medium]">
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M12 9.5V13.5L14.5 15M12 5C7.30558 5 3.5 8.80558 3.5 13.5C3.5 18.1944 7.30558 22 12 22C16.6944 22 20.5 18.1944 20.5 13.5C20.5 8.80558 16.6944 5 12 5ZM12 5V2M10 2H14M20.329 5.59204L18.829 4.09204L19.579 4.84204M3.67102 5.59204L5.17102 4.09204L4.42102 4.84204" stroke="#61CE70" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </span>
                                                                <span id="timer-container" class="text-base font-[Gilroy-Medium] text-[#252525]"> 03:00</span>

                                                            </div>
                                                            <div class="border border-[#EEEEEE] rounded-xl flex justify-center items-center p-8 relative">
                                                                <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/qrcode.png" alt="">
                                                            </div>
                                                        </div>
                                                        <p class="text-sm text-center px-8 text-[#999999] mt-4">Please do not press the back button. Going back from this screen will expire the QR code and cancel the payment.</p>
                                                    </div>
                                                </div>

                                                <div class="form-step failed hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 flex flex-col gap-4 justify-center items-center">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/payment-failed.png" class="" alt="">
                                                        </div>
                                                        <div class="text-center w-full sm:px-5 lg:px-10">
                                                            <h3 class="capitalize xl:mb-2 text-xl font-[Gilroy-Medium] xl:text-xl">Payment Interrupted</h3>
                                                            <p class="text-center text-sm text-[#999999] mb-4">Your payment was dropped during the journey and couldn’t be completed.</p>
                                                            <button class="w-full  bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Retry</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-step success hidden">
                                                    <div class="border border-[#EEEEEE] rounded-xl p-4 xl:rounded-2xl xl:p-6 flex flex-col gap-4 justify-center items-center">
                                                        <div class="flex justify-center items-center p-8 relative">
                                                            <img src="<?php echo ROOT_URL; ?>/assets/images/electricity/payment-success.png" class="" alt="">
                                                        </div>
                                                        <div class="text-center w-full sm:px-5 lg:px-10">
                                                            <h3 class="capitalize xl:mb-2 text-xl font-[Gilroy-Medium] xl:text-xl">Payment Success!</h3>
                                                            <p class="text-center text-sm text-[#999999] mb-4">Your payment was successfully completed.</p>
                                                            <button class="w-full bg-[#42794A] text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]">Done</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>

                                <section id="payments" class="payments px-2">
                                    <div id="categories" class="flex justify-between flex-wrap items-stretch gap-3 mb-5">
                                        <!-- Dynamic categories content will be injected here -->
                                    </div>
                                </section>

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="fixed bottom-0  lg:hidden left-0 w-full bg-[#42794A] text-white p-4 rounded-t-3xl h-20">
            <div class="flex justify-around items-center">
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="24" viewBox="0 0 23 24" fill="none">
                        <path d="M16.5181 7.21706C16.5181 7.42933 16.5117 7.63733 16.4979 7.83679C16.4851 8.03626 16.4413 8.29866 16.3699 8.62613C16.2973 8.95253 16.2024 9.25226 16.084 9.52533C15.9667 9.79839 15.7928 10.0853 15.5624 10.3851C15.3331 10.6859 15.0611 10.9344 14.7453 11.1349C14.4307 11.3344 14.0307 11.5008 13.5453 11.6341C13.06 11.7675 12.516 11.8347 11.9123 11.8347H7.12507C6.77094 11.8347 6.48401 11.5435 6.48401 11.1829V9.34933H6.48614C7.22641 9.34933 8.15867 9.34933 9.13361 9.34826H12.0435C12.4157 9.34826 12.6973 9.16159 12.8371 8.82346C12.9747 8.49066 12.9096 8.16319 12.6515 7.89972C11.7373 6.96639 10.8136 6.02879 9.95174 5.15626C9.75334 4.95466 9.50587 4.87253 9.23707 4.91733C8.90961 4.97279 8.68027 5.16799 8.57681 5.48053C8.47014 5.80586 8.54054 6.10773 8.78161 6.35519C9.13467 6.71573 9.49094 7.07519 9.86321 7.45066L10.0669 7.65759H6.48294L6.48187 3.07093C6.48294 2.71253 6.76881 2.42133 7.12187 2.42133H11.9123C13.2104 2.42133 14.3027 2.85119 15.188 3.71093C16.0755 4.56853 16.5181 5.73866 16.5181 7.21706Z" fill="white" />
                        <path d="M16.5181 16.9621C16.5181 17.1744 16.5117 17.3824 16.4979 17.5819C16.4851 17.7813 16.4413 18.0437 16.3699 18.3712C16.2973 18.6976 16.2024 18.9973 16.084 19.2704C15.9667 19.5435 15.7928 19.8304 15.5624 20.1301C15.3331 20.4299 15.0611 20.6795 14.7453 20.88C14.4307 21.0795 14.0307 21.2459 13.5453 21.3792C13.06 21.5125 12.516 21.5797 11.9123 21.5797H7.12507C6.77094 21.5797 6.48401 21.2885 6.48401 20.928V19.9979L6.48294 12.8139C6.48401 12.4555 6.76987 12.1643 7.12294 12.1643H11.9133C13.2115 12.1643 14.3037 12.5941 15.1891 13.4539C15.5688 13.824 15.8685 14.2496 16.0861 14.7339C15.412 14.7339 14.5768 14.7339 13.6936 14.7349H10.5075C10.1352 14.7349 9.85361 14.9205 9.71281 15.2597C9.57627 15.5925 9.64134 15.9211 9.89947 16.1835C10.8072 17.1104 11.7341 18.0501 12.5992 18.9269C12.7624 19.0923 12.9576 19.1776 13.172 19.1776C13.2189 19.1776 13.2659 19.1733 13.3149 19.1648C13.6424 19.1093 13.8717 18.9141 13.9752 18.6005C14.0819 18.2763 14.0115 17.9744 13.7693 17.7269C13.4163 17.3653 13.06 17.0059 12.6867 16.6304L12.4851 16.4256H16.4968C16.5107 16.6016 16.5181 16.7797 16.5181 16.9621Z" fill="white" />
                    </svg>
                    <p class="text-xs font-medium mt-1">Bill Pay</p>
                </div>
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_51_2714)">
                            <path d="M21.1497 7.58719C21.1405 7.542 21.1271 7.49757 21.1095 7.45519C21.0919 7.41286 21.07 7.37119 21.0446 7.33308C21.0185 7.29427 20.9888 7.25827 20.9564 7.22579C20.9239 7.1933 20.8879 7.16368 20.8491 7.13827C20.811 7.11286 20.77 7.09097 20.7276 7.07335C20.6846 7.05572 20.6402 7.04227 20.5957 7.03313C20.5039 7.01475 20.4108 7.01475 20.3197 7.03313C20.2743 7.04232 20.23 7.05572 20.1876 7.07335C20.1445 7.09097 20.1036 7.11286 20.0655 7.13827C20.0267 7.16368 19.9907 7.1933 19.9582 7.22579C19.9257 7.25827 19.8961 7.29427 19.8707 7.33308C19.8452 7.37119 19.8234 7.41286 19.8057 7.45519C19.7881 7.49757 19.7747 7.542 19.7655 7.58719C19.7563 7.63308 19.7514 7.67893 19.7514 7.72482C19.7514 7.91115 19.8269 8.09325 19.9583 8.22385C19.9907 8.25633 20.0267 8.28596 20.0656 8.31207C20.1037 8.33747 20.1446 8.35936 20.1877 8.37699C20.23 8.39461 20.2744 8.40807 20.3197 8.41721C20.3649 8.4264 20.4114 8.43061 20.4572 8.43061C20.5031 8.43061 20.5498 8.4264 20.5957 8.41721C20.6402 8.40802 20.6846 8.39461 20.7276 8.37699C20.77 8.35936 20.8109 8.33747 20.849 8.31207C20.8878 8.28596 20.9238 8.25629 20.9563 8.22385C21.0876 8.09255 21.1631 7.91119 21.1631 7.72482C21.1631 7.67893 21.1589 7.63308 21.1497 7.58719Z" fill="#94CA9C" />
                            <path d="M20.3039 5.09789C20.2018 4.89694 20.091 4.69734 19.9748 4.50473C19.1608 3.15623 18.0097 2.02748 16.6458 1.24059C15.2393 0.429 13.6328 0 12 0C6.86724 0 2.69138 4.17586 2.69138 9.30863V10.9211C1.28213 11.5553 0.297943 12.9719 0.297943 14.6149C0.297943 16.8476 2.1144 18.6641 4.34719 18.6641H5.03363C5.36213 19.629 6.27657 20.3254 7.35122 20.3254C8.70113 20.3254 9.79932 19.2272 9.79932 17.8773V11.3524C9.79932 10.0025 8.70113 8.90433 7.35122 8.90433C6.27662 8.90433 5.36213 9.6007 5.03363 10.5656H4.34719C4.26516 10.5656 4.18388 10.5688 4.10307 10.5737V9.30872C4.10307 4.95422 7.64569 1.41169 12.0001 1.41169C14.7922 1.41169 17.3215 2.84072 18.7663 5.2343C18.8648 5.39761 18.9587 5.56683 19.0453 5.73727C19.2219 6.0848 19.6468 6.22331 19.9942 6.04692C20.3418 5.87034 20.4804 5.44542 20.3039 5.09789ZM6.31472 17.8772V11.3525C6.31472 10.781 6.77963 10.316 7.35118 10.316C7.92268 10.316 8.38763 10.7809 8.38763 11.3525V17.8772C8.38763 18.4487 7.92272 18.9137 7.35118 18.9137C6.77972 18.9137 6.31482 18.4488 6.31472 17.8773C6.31472 17.8773 6.31472 17.8773 6.31472 17.8772ZM4.34719 11.9772H4.90308V17.2523H4.34719C2.89285 17.2524 1.70958 16.0692 1.70958 14.6148C1.70958 13.1604 2.8928 11.9772 4.34719 11.9772Z" fill="#94CA9C" />
                            <path d="M21.3086 10.921V10.0144C21.3086 9.62461 20.9925 9.30858 20.6028 9.30858C20.213 9.30858 19.8969 9.62456 19.8969 10.0144V10.5736C19.8161 10.5688 19.7348 10.5655 19.6528 10.5655H18.9664C18.6379 9.60061 17.7235 8.90424 16.6488 8.90424C15.2989 8.90424 14.2007 10.0024 14.2007 11.3523V17.8772C14.2007 19.2271 15.2989 20.3253 16.6488 20.3253C17.7235 20.3253 18.6379 19.6289 18.9664 18.664H19.6528C19.8504 18.664 20.0445 18.6491 20.2346 18.6216V21.214H14.6068C14.3196 20.4023 13.5446 19.819 12.6357 19.819H11.4348C10.2821 19.819 9.3443 20.7568 9.3443 21.9095C9.3443 23.0622 10.2822 24 11.4348 24H12.6357C13.537 24 14.3068 23.4267 14.5998 22.6256H20.9405C21.3302 22.6256 21.6463 22.3096 21.6463 21.9198V18.1371C22.8725 17.4405 23.7021 16.123 23.7021 14.6148C23.7021 12.9718 22.7179 11.5553 21.3086 10.921ZM17.6852 17.8771V17.8772C17.6852 18.4488 17.2203 18.9136 16.6487 18.9136C16.0772 18.9136 15.6123 18.4487 15.6123 17.8772V11.3523C15.6123 10.7808 16.0772 10.3159 16.6487 10.3159C17.2202 10.3159 17.6852 10.7808 17.6852 11.3523V17.8771ZM13.3096 21.9881C13.2704 22.3256 12.9834 22.5884 12.6357 22.5884H11.4348C11.0605 22.5884 10.756 22.2839 10.756 21.9095C10.756 21.5351 11.0605 21.2307 11.4348 21.2307H12.6357C12.9865 21.2307 13.276 21.4981 13.311 21.8398C13.3081 21.8662 13.3062 21.8927 13.3062 21.9198C13.3062 21.9428 13.3075 21.9656 13.3096 21.9881ZM19.6528 17.2524H19.0968V11.9773H19.6528C21.1072 11.9773 22.2904 13.1605 22.2904 14.6149C22.2904 16.0693 21.1072 17.2524 19.6528 17.2524Z" fill="#94CA9C" />
                        </g>
                        <defs>
                            <clipPath id="clip0_51_2714">
                                <rect width="24" height="24" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <p class="text-xs font-medium text-[#94CA9C] mt-1">Dispute</p>
                </div>
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                        <path d="M11 5V11L15 13M21 11C21 16.5228 16.5228 21 11 21C5.47715 21 1 16.5228 1 11C1 5.47715 5.47715 1 11 1C16.5228 1 21 5.47715 21 11Z" stroke="#94CA9C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p class="text-xs font-medium text-[#94CA9C] mt-1">History</p>
                </div>
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M12.1207 12.78C12.0507 12.77 11.9607 12.77 11.8807 12.78C10.1207 12.72 8.7207 11.28 8.7207 9.50998C8.7207 7.69998 10.1807 6.22998 12.0007 6.22998C13.8107 6.22998 15.2807 7.69998 15.2807 9.50998C15.2707 11.28 13.8807 12.72 12.1207 12.78Z" stroke="#94CA9C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M18.7398 19.3801C16.9598 21.0101 14.5998 22.0001 11.9998 22.0001C9.39977 22.0001 7.03977 21.0101 5.25977 19.3801C5.35977 18.4401 5.95977 17.5201 7.02977 16.8001C9.76977 14.9801 14.2498 14.9801 16.9698 16.8001C18.0398 17.5201 18.6398 18.4401 18.7398 19.3801Z" stroke="#94CA9C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#94CA9C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p class="text-xs font-medium text-[#94CA9C] mt-1">Profile</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        const ROOT_URL = '<?php echo ROOT_URL; ?>';

        const dynamicInputs = {
            "postpaid":{
                "smi":{
                    'name': 'Mobile Number',
                    'type':'text',
                    'placeholder':'Enter your mobile number',
                    'required':true,
                    'value':'',
                    'class':'postpaid-mobile',
                    'id':'mobile-number',
                    'disabled':false,
                    'bindElem':'postpaid-wrapper',
                    'is_chev':false,
                    'readonly': false, 
                    'wrapClass':'consumer-number-wrapper',
                    'attr':'mobile-number'
                },
                "operator":{
                    'name':'Operator',
                    'type':'text',
                    'placeholder':'Select Operator',
                    'required':true,
                    'value':'',
                    'class':'select-board',
                    'id':'operator',
                    'disabled':false,
                    'bindElem':'postpaid-wrapper',
                    'is_chev':true,
                    'readonly': true, 
                    'wrapClass':'board-wrapper',
                    'attr':'mobile-operator'
                },
                "circle":{
                    'name':'Circle',
                    'type':'text',
                    'placeholder':'Select Circle',
                    'required':true,
                    'value':'',
                    'class':'circle-item',
                    'id':'circle',
                    'disabled':false,
                    'bindElem':'postpaid-wrapper',
                    'is_chev':true,
                    'readonly': true,
                    'wrapClass':'circle-wrapper',
                    'attr':'circle-location',   
                    'btnClass':"postpaid"
                },
                // "amount":{
                //     'name':'Amount',
                //     'type':'text',
                //     'placeholder':'Enter your amount',
                //     'required':true,
                //     'value':'',
                //     'class':'amount-input',
                //     'id':'circle',
                //     'disabled':false,
                //     'bindElem':'postpaid-wrapper',
                //     'is_chev':false,
                //     'readonly': false,
                //     'wrapClass':'amount-wrapper',
                //     'error_message':'',
                //     
                // }
            },
            "electricity":{
                "elboard":{
                    'name':'Operator',
                    'type':'text',
                    'placeholder':'Select Electricity board',
                    'required':true,
                    'value':'',
                    'class':'select-board',
                    'id':'operator',
                    'disabled':false,
                    'bindElem':'electricity-wrapper',
                    'is_chev':true,
                    'readonly': true, 
                    'wrapClass':'board-wrapper'
                },
                "elnumber":{
                    'name':'el-number',
                    'type':'text',
                    'placeholder':'Enter customer number',
                    'required':true,
                    'value':'',
                    'class':'consumer-number',
                    'id':'elnumber',
                    'disabled':false,
                    'bindElem':'electricity-wrapper',
                    'is_chev':false,
                    'readonly': false, 
                    'wrapClass':'board-wrapper',
                    'btnClass':'electricity'
                }
            }
        }


    function bindInp(bindCategory) {
    let category = bindCategory.toLowerCase();
    let objData = dynamicInputs[category];
    let objCheck = (objData == null || objData == undefined) ? 0 : Object.keys(objData).length;

    if (objCheck >= 1) {
        const chevron = `<span class="pr-3"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none"><path d="M0.999878 13L6.999878 7L0.999878 1" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg></span>`;
        let bindElem = '';
        let inpValue = ``;
        let visibleCount = 2; // Initially show the first two inputs
        let inputElements = [];
        let btnClass = ""; 

        for (let x in objData) {
            let inpData = objData[x];
            bindElem = document.querySelector('.' + inpData['bindElem']);
            let chevBind = inpData.is_chev ? chevron : '';
            let hiddenClass = inputElements.length >= visibleCount ? 'hidden' : '';

            inpValue += `
                <div class="flex items-center border border-[#EEEEEE] p-1 rounded-xl mb-2 ${inpData.wrapClass} ${hiddenClass}" data-input="${x}">
                    <input 
                        class="w-full 2xl:text-xl p-3 outline-none ${inpData['class']}" 
                        placeholder="${inpData['placeholder']}" 
                        type="${inpData['type']}" 
                        required="${inpData['required']}" 
                        data-index="${inputElements.length}"
                        data-err="${inpData.class}-err"
                        ${inpData.readonly ? 'readonly' : ''} >
                    ${chevBind}
                </div>
                <div>
                    <p class="${inpData.class}-err text-[#E87474]"></p>
                </div>`;
            
            inputElements.push(inpData);

            if (inpData.btnClass) {
                btnClass = inpData.btnClass;
            }
        }

        // Add a placeholder for the button (initially hidden)
        inpValue += `
            <div class="button-container">
                <button class="${btnClass}-btn w-full bg-[#42794A] opacity-40 outline-none 2xl:text-xl text-white rounded-xl p-4 cursor-pointer shadow-[0px_5px_20px_0px_#42794A33]" disabled>Proceed</button>
            </div>
        `;

        bindElem.innerHTML = inpValue;

        // Add event listeners to dynamically show inputs
        const inputDivs = bindElem.querySelectorAll('div[data-input]');
        const buttonContainer = bindElem.querySelector('.button-container');

        inputDivs.forEach((div, index) => {
            const inputField = div.querySelector('input');
            inputField.addEventListener('input', function () {
                if (inputField.value.trim() !== '' && index + 1 < inputDivs.length) {
                    const nextDiv = inputDivs[index + 1];
                    if (nextDiv.classList.contains('hidden')) {
                        nextDiv.classList.remove('hidden');
                    }
                }

                // Show the button when the last input is filled
                if (index === inputDivs.length - 1 && inputField.value.trim() !== '') {
                    buttonContainer.classList.remove('hidden');
                }
            });
        });
    } else {
        console.log("No Category value found.");
    }
}




        var trendingList;
        let sectionName = $('');
        //  fetch data catagories
        $.ajax({
            url: '<?php echo ROOT_URL; ?>curl/fetch_Categories.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log(response);
                if (response.status) {
                    // Handle the trending items
                    const categories = response.data;
                    const trendingItems = response.trendingItems;
                    
                    // console.log(trendingList);
                    let trendingHTML = '';

                       // Generate tabs dynamically
                       trendingItems.forEach((item, index) => {
                        trendingList = item.name;
                        // console.log(trendingList);
                        const tabId = `tab${index + 1}`; // Assuming a 1-based index for tabs
                        trendingHTML  += `
                            <li>
                                <button class="tab" data-name="${trendingList}" data-tab="${tabId}">
                                    <div class="bg-[#42794A] icon rounded-2xl shadow-sm mx-auto mb-2 icon w-[70px] h-[70px] xl:w-[80px] xl:h-[80px] cursor-pointer flex justify-center items-center catitem">
                                    <img src="${item.url}" width="30" height="30" alt="" class="filter-white w-8 h-8 xl:w-10 xl:h-10">
                                    </div>
                                    <div class="text-sm break-words text-[#42794A]">${item.name}</div>
                                </button>
                            </li>
                        `;
                    });
                    $('#trending-items').html(trendingHTML); // Inject trending items

                
          
                // Add event listeners to tabs
                $(document).on('click', '.tab', function (event) {
                    event.preventDefault();
                    event.stopPropagation();
                    const tabId = $(this).data('tab');
                    showTabContent(tabId);
                    // console.log(tabId);
                    sectionName = $(this).attr('data-name');
                    
                    ShowOpertorDetails(sectionName);
                    bindInp(sectionName);

                    // console.log($(this).attr('data-name'),sectionName);
                    // const currentElem = event.target;
                    // console.log(currentElem);
                    $('.tab').removeClass('active').addClass('inactive');
                    // Add 'active' class to the clicked tab and remove 'inactive' class
                    $(this).removeClass('inactive').addClass('active');
                    
                    $('.tab-content input, .tab-content textarea').val('');
                    $('.right-container').addClass('hidden');
                    $('.number-input-wrapper').addClass('h-0');
                    $('.right-container-step1').addClass('hidden');
                    $('.form-step-2').addClass('hidden');
                    $('.form-step-1').removeClass('hidden');
                    
                   

                      // Optionally update the URL query parameters
                    const url = new URL(window.location.href);
                    url.searchParams.set('category', sectionName); // Set the query parameter for the tab
                    window.history.pushState({ path: url.href }, '', url.href); // Update the UR
                });


                    // Handle the categories
                    let categoriesHTML = '';
                    categories.forEach(function(category) {
                        const items = category.category_details;
                        const maxItemsToShow = 4;
                        let categoryHTML = `
                        <section class="lg:w-[49%] w-full">
                            <div id="${category.category_name}" class="wrapper p-5 sm:px-8 sm:py-6 border border-[#EEEEEE] rounded-2xl finance">
                                <div class="flex justify-between items-center text-sm">
                                    <p class="text-start uppercase text-[#999999]">${category.category_name}</p>
                                    ${items.length > maxItemsToShow ? `
                                        <p class="toggle-button flex items-center text-[#42794A] cursor-pointer">
                                            <span id="toggle-text">View More</span>
                                            <svg id="toggle-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 14 14" fill="none" class="ml-1">
                                                <path d="M3.5 5.25L7 8.75L10.5 5.25" stroke="#42794A" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </p>
                                    ` : ''}
                                </div>
                                <div class="grid grid-cols-4 gap-4 w-full mt-4">
                    `;
                        items.forEach(function(item, index) {
                            if (index < maxItemsToShow) {
                                categoryHTML += `
                                <button href="${ROOT_URL + item.redirect}" class="flex flex-col items-center catitem cursor-pointer">
                                    <div class="bg-white rounded-2xl custom-shadow icon w-[70px] h-[70px] xl:w-[80px] xl:h-[80px] flex items-center justify-center">
                                        <img src="${item.url}" width="30" height="30" class="w-8 h-8 xl:w-10 xl:h-10" alt="">
                                    </div>
                                    <span class="font-thin text-sm text-center h-10 text-wrap mt-2 text-[#252525]">${item.name}</span>
                                </button>
                            `;
                            }
                        });
                        categoryHTML += `</div>`;

                        // Add additional content
                        if (items.length > maxItemsToShow) {
                            categoryHTML += `
                            <div class="grid grid-cols-4 gap-4 additionalContent h-0 opacity-0 transition- items-start w-full">
                        `;
                            items.forEach(function(item, index) {
                                if (index >= maxItemsToShow) {
                                    categoryHTML += `
                                    <button href="${ROOT_URL + item.redirect}" class="flex flex-col items-center cursor-pointer">
                                        <div class="w-[70px] h-[70px] xl:w-[80px] xl:h-[80px] icon bg-white rounded-2xl custom-shadow flex items-center justify-center">
                                            <img src="${item.url}" width="30" height="30" class="w-8 h-8 xl:w-10 xl:h-10" alt="">
                                        </div>
                                        <span class="text-sm text-center mt-2 text-[#252525]">${item.name}</span>
                                    </button>
                                `;
                                }
                            });
                            categoryHTML += `</div>`;
                        }

                        categoryHTML += `</div></section>`;
                        categoriesHTML += categoryHTML;
                    });
                    $('#categories').html(categoriesHTML);
                    // show the categories
                    $('#category-list').removeClass('h-0');

                    //Add view more functionality
                    $('.toggle-button').on('click', function() {
                        const wrapper = $(this).closest('.wrapper');
                        const content = wrapper.find('.additionalContent');

                        if (content.hasClass('h-0') && content.hasClass('opacity-0')) {
                            content.removeClass('h-0 opacity-0').addClass('h-auto mt-4');
                        } else {
                            content.addClass('h-0 opacity-0').removeClass('h-auto mt-4');
                        }

                        $(this).find('svg').toggleClass('rotate-180');
                    });
                } else {
                    alert('Failed to load data');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });

        $(".catitem").on("click", showModalLogin);



    // Function to show tab content
    function showTabContent(tabId) {
        // Hide all tab content
        $('.tab-content').addClass('hidden');

        // Show the content corresponding to the clicked tab
        $(`#${tabId}-content`).removeClass('hidden');

        $('.finance').addClass('hidden')
    }


        // electricity all the functionality
        $(".tab-list .tab-item").on("click", function() {
            $(".tab-list .tab-item").removeClass(
                "bg-white text-[#42794A] font-medium"
            );
            $(this).addClass("bg-white text-[#42794A] font-medium");
        });

        $('.search-board').on('input', function() {
            const searchText = $(this).val().toLowerCase();
            $('ul.board-list li').each(function() {
                const boardName = $(this).find('p').text().toLowerCase();
                if (boardName.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            })
        });
        $('.state-search').on('input',function(){
            const searchState = $(this).val().toLowerCase();
            $('#circleList div').each(function(){
                const boardName = $(this).find('span').text().toLowerCase();
                if (boardName.includes(searchState)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            })
        })

        let UserData = {
            "adParams": {
                "someKey": "someValue"
            },
            "uid": "admin@nippy.co.in",
            "pswd": "nippy123@N",
            "cn": "",
            "cir": "",
            "op": "",
            "platform_type": "WEB",
        }

        function SetUserData(data) {
            UserData = data;
            console.log(UserData);
        }

        const leftSteps = $('.left-container .form-step');
        const rightSteps = $('.right-container .form-step');
        // console.log(sectionName);


        // api call get operator

      function ShowOpertorDetails(sectionName){

        if (sectionName === 'LPG Booking') {
            sectionName = 'Gas';
        }

        $.ajax({
            url: '<?php echo ROOT_URL; ?>curl/fetch_operator.php?type=' + sectionName,
            type: 'GET',
            dataType: 'json',
            contentType: 'application/json',
            headers: {
                'Authorization': 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJtb2JpbGUiOiI5MDgwMTc3NDU3IiwidXNlcl9pZCI6IjE3MzAxMDI3NzgzODMiLCJpc3MiOiI1MiJ9.SBttAbWqBJQ-4YW9o6Buq2pFrs9BJ6QEU7CgaEnXgnU'
            },
            success: function(response) {
                $('.board-list').empty();
                if (response.data && Array.isArray(response.data)) {
                    $.each(response.data, function(index, operator) {
                        let boardItem = $(`
                            <li class= "board-item cursor-pointer " data-operator-name="${operator.operator_name}">
                                <div class="flex gap-4 py-4 border-b border-[#EEEEEE] items-center">
                                    <span>
                                        <img src="${operator.operator_icon}" alt="" width="30" height="30" class="w-8 h-8 2xl:w-10 2xl:h-10">
                                    </span>
                                        <p class="text-[#999999] font-[Gilroy-Medium] 2xl:text-xl">${operator.operator_name}</p>
                                </div>
                            </li>
                            `);
                        // Event handler for select board
                        boardItem.on('click', function() {
                            $('.select-board').val(operator.operator_name);
                            $('.circle-wrapper').removeClass('hidden');
                            SetUserData({
                                ...UserData,
                                'op': operator.operator_id
                            });
                            $('.number-input-wrapper').removeClass('h-0');
                          

                            $('.consumer-number').on('input', function() {
                            const number = $(this).val();
                            console.log(number);
                            console.log(number.match(operator.regex),'111111')
                            if (number.match(operator.regex)){
                                $('.electricity-btn').removeClass('opacity-40').removeAttr('disabled');
                            } else {
                                $('.electricity-btn').addClass('opacity-40').attr('disabled', true);
                            }   
                        });

                          
                            $('.circle-item').on('click',function(){
                                $('.right-container').addClass('hidden')
                                $('.right-container-step1').removeClass('opacity-0 hidden');
                                fetchCircles();
                            });

                            $('.postpaid-btn').off('click').on('click', function() {
                                    let checkIdentify = valueCheck ();
                                    console.log(checkIdentify)
                                    if(checkIdentify){
                                    Proceed(operator);
                                }
                            });

                        });
                        $('.board-list').append(boardItem);
                        // Enable proceed button based on regex match
                       
                        $('.postpaid-mobile').on('input',function(){
                            const number = $(this).val();
                            if (number.match(operator.regex)) {
                                // $('.proceed-btn').removeClass('opacity-40').removeAttr('disabled');
                                $('.postpaid-mobile-err').html('');
                                SetUserData({
                                    ...UserData,
                                    'cn': number
                                });
                            }else{
                                // $('.proceed-btn').addClass('opacity-40').attr('disabled', true);
                                // $('.circle-wrapper').addClass('hidden');
                                $('.postpaid-mobile-err').html('Invalid number found.');
                            }
                           
                        });
                        
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });

      }  


            function fetchCircles() {
                const token = sessionStorage.getItem('token');
                $.ajax({
                    url: '<?php echo ROOT_URL; ?>curl/fetch_circle.php',
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function(response) {
                        $('#circleList').empty();
                        if (response.status && response.data && Array.isArray(response.data)) {
                            $.each(response.data, function(index, circle) {
                                $('#circleList').append(`
                            <div class="pt-4 px-6 circle-item" data-circle-id="${circle.id}" data-circle-name="${circle.circle_name}">
                                <div class="flex items-center border-b border-[#DDDDDD] pb-4 cursor-pointer">
                                    <span class="ps-4 text-[#999999] font-[Gilroy-SemiBold] text-lg leading-6">${circle.circle_name}</span>
                                </div>
                            </div>
                        `);
                            });

                            $('.circle-item').on('click', function() {
                                const circleId = $(this).data('circle-id');
                                const circleName = $(this).data('circle-name');
                                $('.circle-item').val(circleName);
                                $('.circle-item').attr('circle-id', circleId);
                                console.log({
                                    "cirId": circleId,
                                    "cirName": circleName
                                });
                                if(circleId && circleName){
                                    $('.amount-wrapper').removeClass('hidden');
                                    $('.postpaid-btn').removeClass('opacity-40').removeAttr('disabled');
                                }
                                SetUserData({
                                    ...UserData,
                                    'cir': circleId
                                });
                            });
                        } else {
                            $('#circleList').html('<div class="error">No circles found.</div>');
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#circleList').html('<div class="error">Error fetching circles: ' + error + '</div>');
                    }
                });
            }
       

        function Proceed(oprater) {
            SetUserData({
                ...UserData,
                'cn': $('.postpaid-mobile').val()
            });

            $.ajax({
                url: '<?php echo ROOT_URL; ?>curl/fetch_viewBill_postpaid.php',
                type: 'POST',
                contentType: 'application/json',
                dataType: 'json',
                headers: {
                    'Authorization': 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJtb2JpbGUiOiI5MDgwMTc3NDU3IiwidXNlcl9pZCI6IjE3MzAxMDI3NzgzODMiLCJpc3MiOiI1MiJ9.SBttAbWqBJQ-4YW9o6Buq2pFrs9BJ6QEU7CgaEnXgnU'
                },
                data: JSON.stringify(UserData),
                beforeSend: function(xhr) {
                    $('.postpaid-btn').addClass('opacity-40').attr('disabled', true).html('Proceeding...');
                    xhr.setRequestHeader('Authorization', 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJtb2JpbGUiOiI5MDgwMTc3NDU3IiwidXNlcl9pZCI6IjE3MzAxMDI3NzgzODMiLCJpc3MiOiI1MiJ9.SBttAbWqBJQ-4YW9o6Buq2pFrs9BJ6QEU7CgaEnXgnU');
                },
                success: function(response) {
                    if (!response.status) {
                        showToastmes(response.msg);
                        $('.postpaid-btn').removeClass('opacity-40').removeAttr('disabled').html('Proceed');
                        return;
                    }
                    let customerData = response.data[0];
                    // Set operator details
                    $('#post-opreator-details').html(`
                    <img src="${oprater.operator_icon}" alt="Logo" class="w-12 h-12 rounded-full mr-3">
                                                <div>
                                                    <p class="text-[#999999] font-sm">${oprater.operator_name}</p>
                                                    <p class="text-xl font-bold text-gray-900">${UserData.cn}</p>
                                                </div>
                    `);
                    
                    // Set user data
                    $('#post-customer-details').html(`
                    <div class="flex justify-between">
                                                <span class="text-[#999999]">Customer name</span>
                                                <span class=" font-[Gilroy-Medium]">${customerData.userName}</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-[#999999]">Bill number</span>
                                                <span class="font-[Gilroy-Medium]">${customerData.cellNumber}</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-[#999999] ">Bill date</span>
                                                <span class="font-[Gilroy-Medium]">${customerData.billdate}</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-red-500">Due date</span>
                                                <span class="text-red-500 font-[Gilroy-Medium]">${customerData.dueDate}</span>
                                            </div>
                    `);
                    $('.bill-amount').html(customerData.billAmount);
                    $('.postpaid-btn').removeClass('opacity-40').removeAttr('disabled').html('Proceed');
                    $('.right-container-step1').addClass('hidden');
                    $('.right-container').removeClass('hidden');
                    $('.select-list-ui').addClass('hidden')
                    nextStep(leftSteps);
                    $('.right-container .pay-upi').removeClass('hidden')

                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

        // Event handler for select board input box
        $(document).on('click', '.select-board', function() {
            $('.right-container').removeClass('opacity-0 hidden');
            $('.number-input-wrapper').addClass('h-0').val('');
            $('.right-container-step1').addClass('hidden')
            $('.proceed-btn').addClass('opacity-40').attr('disabled', true);
            prevStep(rightSteps);
        }); 


        $('.edit-btn').on('click', function() {
            prevStep(leftSteps);
            $('.right-container-step1').removeClass('hidden');
            $('.right-container').addClass('hidden')
        });

        // Event handler for verify button
        $('.verify-btn').on('click', function() {
            $('#edit-btn').off('click');
            $(this).addClass('hidden'); // Hide the clicked element
            $(this).next('svg').removeClass('hidden'); // Show the adjacent SVG
            $('.verified-details').removeClass('h-0').next('button').removeClass('opacity-40').removeAttr('disabled').on('click', function() {
                console.log('Verify button clicked');
                nextStep(rightSteps);
            });
        });

        $('#generate-qr').on('click', function() {
            const timer = new CountdownTimer('timer-container', 3 * 60, function() {
                console.log('Time is up!');
                nextStep(rightSteps);
            })
            timer.start();
            nextStep(rightSteps);
        });

        function nextStep(steps) {
            const currentStep = steps.filter('.block');
            const nextStep = currentStep.next('.form-step');

            if (nextStep.length) {
                currentStep.removeClass('block').addClass('hidden');
                nextStep.removeClass('hidden').addClass('block');
            }
        }

        function prevStep(steps) {
            const currentStep = steps.filter('.block');
            const prevStep = currentStep.prev('.form-step');

            if (prevStep.length) {
                currentStep.removeClass('block').addClass('hidden');
                prevStep.removeClass('hidden').addClass('block');
            }
        }

        function firstStep(steps) {
            steps.removeClass('block').addClass('hidden');
            steps.first().removeClass('hidden').addClass('block');
        }

        function lastStep(steps) {
            steps.removeClass('block').addClass('hidden');
            steps.last().removeClass('hidden').addClass('block');
        }

        function showToastmes(message) {
            const toast = $('<div id="errorToast" class="toast">' + message + '</div>)').appendTo('body');
            toast.addClass('show-toast');

            setTimeout(() => {
                toast.remove();
            }, 5000);
        }

    function valueCheck() {
    const parentContainer = $('#postpaid-wrapper');
    const inputs = parentContainer.find('input'); 
    const postpaidBtn = $('.postpaid-btn'); // The button to enable or disable
    let allFilled = true; // Assume all inputs are filled initially

    inputs.each(function () {
        var errAttr = $(this).attr('data-err'); // Retrieve the data-err attribute
        var errElem = $('.' + errAttr); // Find the corresponding error element

        if ($(this).val().trim() === '') { 
            if (errElem.length > 0) {
                errElem.html('Please provide this input.'); // Display the error message
            }
            allFilled = false;
        } else {
            if (errElem.length > 0) {
                errElem.html(''); // Clear the error message
            }
        }
    });

    if (allFilled) {
        return true;
    } else {
        return false;
    }
}
    </script>
</body>

</html>
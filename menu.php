<!DOCTYPE html>
<html lang="en">
    <head>
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Poppins" />
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script
            src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
        <script src="https://kit.fontawesome.com/c85846f6d4.js"
            crossorigin="anonymous"></script>
        <title>Menu</title>
        <style>
      body {
        font-family: "Poppins", sans-serif;
      }
      .centered-div {
            display: grid;
            place-items: center;
        }
    </style>
    <script>
        let id = 0;
        async function fetchProductTypes() {
            if(id == 0){
                try {
                const response = await fetch('../product/getTypeProduct.php');
                const data = await response.json();

                if (data.message) {
                    document.getElementById('product-types').innerHTML = data.message;
                } else {
                    let html = '';
                    data.forEach(productType => {

                            html += `
                        <li id="${productType.id}" class="p-4" onclick="changeId(${productType.id})" style="background-color: #FFFFFF;"><div
                                class="grid grid-flow-row-dense grid-cols-4"><div
                                    class="col-span-3 pt-2 pb-2"><p>${productType.tenloai}</p></div><div
                                    class="bg-white p-2 rounded-lg"><p
                                        class="text-center">1</p></div></div></li>
                        `;
                    });
                    document.getElementById('product-types').innerHTML = html;
                }
            } catch (error) {
                console.error('Error fetching product types:', error);
                document.getElementById('product-types').innerHTML = 'Error loading data.';
            }
            }else{
                try {
                const response = await fetch('../product/getTypeProduct.php');
                const data = await response.json();

                if (data.message) {
                    document.getElementById('product-types').innerHTML = data.message;
                } else {
                    let html = '';
                    data.forEach(productType => {
                        const backgroundColor = productType.id == id ? '#F4B846' : '#ffffff';
                        
                            html += `
                        <li id="${productType.id}" class="p-4" onclick="changeId(${productType.id})" style="background-color: ${backgroundColor};"><div
                                class="grid grid-flow-row-dense grid-cols-4"><div
                                    class="col-span-3 pt-2 pb-2"><p>${productType.tenloai}</p></div><div
                                    class="bg-white p-2 rounded-lg"><p
                                        class="text-center">1</p></div></div></li>
                        `;
                    });
                    document.getElementById('product-types').innerHTML = html;
                }
            } catch (error) {
                console.error('Error fetching product types:', error);
                document.getElementById('product-types').innerHTML = 'Error loading data.';
            }
            }
        }

        document.addEventListener('DOMContentLoaded', fetchProductTypes);
                function changeId(newId) {
            id = newId;
            fetchProductTypes();
            fetchProduct(id);
        }
    </script>
    <script>
        function formatNumberWithCommas(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
        async function fetchProduct(loai) {

            if(loai == 0){
                let count = 0;
                try {
                const response = await fetch('../product/products.php');
                const data = await response.json();

                if (data.message) {
                    document.getElementById('product-types').innerHTML = data.message;
                } else {
                    let html = '';
                    data.forEach(product => {
                            html += `
                            <div class="rounded-lg bg-white shadow-xl mr-10"
                            style="border: 1px solid #F4B846;">
                            <img style="max-width: 100%; width: 250px, max-height:100%; border-radius: 5px 5px 0px 0px;"
                                src="../${product.image}"
                                alt>
                            <div class="pt-2 pl-2 pr-2"><p
                                    style="font-size: 18px;"><b>${product.ten}</b></p><br>
                                <div
                                    class="grid grid-flow-row-dense grid-cols-2"
                                    style="margin-bottom: 20px;">
                                    <div class="centered-div">
                                        <p><b>${formatNumberWithCommas(product.gia)} đ</b></p>
                                    </div>
                                    <div>
                                        <button type="button"
                                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;
                        count++;
                    });
                    document.getElementById('product-fetch').innerHTML = html;
                    document.getElementById('countsp').innerText =count;
                }
            } catch (error) {
                console.error('Error fetching product types:', error);
                document.getElementById('product-types').innerHTML = 'Error loading data.';
            }
            }else{
                let count = 0;
                try {
                const response = await fetch('../product/products.php');
                const data = await response.json();

                if (data.message) {
                    document.getElementById('product-types').innerHTML = data.message;
                } else {
                    let html = '';
                    data.filter(product => product.loai == loai).forEach(product => {

                            html += `
                            <div class="rounded-lg bg-white shadow-xl mr-10"
                            style="border: 1px solid #F4B846;">
                            <img style="max-width: 100%; width: 250px, max-height:100%; border-radius: 5px 5px 0px 0px;"
                                src="../${product.image}"
                                alt>
                            <div class="pt-2 pl-2 pr-2"><p
                                    style="font-size: 18px;"><b>${product.ten}</b></p><br>
                                <div
                                    class="grid grid-flow-row-dense grid-cols-2"
                                    style="margin-bottom: 20px;">
                                    <div class="centered-div">
                                        <p><b>${formatNumberWithCommas(product.gia)} đ</b></p>
                                    </div>
                                    <div>
                                        <button type="button"
                                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;
                        count++;
                    });
                    document.getElementById('product-fetch').innerHTML = html;
                    document.getElementById('countsp').innerText =count;
                }
            } catch (error) {
                console.error('Error fetching product types:', error);
                document.getElementById('product-types').innerHTML = 'Error loading data.';
            }
            }

        }

        document.addEventListener('DOMContentLoaded', fetchProduct(0));

    </script>
    </head>
    <body>
        <nav class="top-0 z-50 sticky" style="background-color: #F6EBDA;">
            <div
                class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="https://flowbite.com/"
                    class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="image/logo.png" class="h-8" alt="Flowbite Logo">
                    <!-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">3TL</span> -->
                </a>
                <button
                    data-collapse-toggle="navbar-default"
                    type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-default"
                    aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg
                        class="w-5 h-5"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 17 14">
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto"
                    id="navbar-default">
                    <ul style="background-color: #F6EBDA;"
                        class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="index.html"
                                class="font-semibold block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
                                aria-current="page">
                                Trang Chủ
                            </a>
                        </li>
                        <li>
                            <a href="menu.html"
                                class="font-semibold block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                Menu
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="font-semibold block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                Services
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="font-semibold block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                Pricing
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="font-semibold block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Body -->
        <div class>
            <div class="grid grid-flow-row-dense grid-cols-6">
                <div class="bg-white">
                    <ul id="product-types">

                    </ul>
                </div>
                <div class="col-span-5 p-10" style="background-color: #F5F5F5;">
                    <p style="font-size: 20px;"><span id="namesp"></span> (<span id="countsp"></span>)</p>
                    <br>
                    <div class="grid grid-flow-row-dense grid-cols-6" id="product-fetch">

                    </div>
                </div>

            </div>
        </div>
    </body>
</html>

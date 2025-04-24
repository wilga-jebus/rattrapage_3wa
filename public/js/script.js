// document.addEventListener('DOMContentLoaded', function() {
//     initializeDarkMode();
//     initializeCurrencyExchange();
// });

// function initializeDarkMode() {
//     const darkModeToggle = document.getElementById('dark-mode-toggle');
//     const body = document.body;

//     // Toggle dark mode
//     darkModeToggle.addEventListener('click', function() {
//         body.classList.toggle('dark-mode');
//         const isDarkMode = body.classList.contains('dark-mode');
//         localStorage.setItem('darkMode', isDarkMode);
//     });

//     // Apply dark mode on page load if previously enabled
//     if (localStorage.getItem('darkMode') === 'true') {
//         body.classList.add('dark-mode');
//     }
// }

// function initializeCurrencyExchange() {
//     const currencySelectors = document.querySelectorAll('.currency-selector');
//     const apiKey = 'f8d074679a19c33d4c33ca11'; // Replace with my actual API key

//     currencySelectors.forEach(selector => {
//         selector.addEventListener('change', function() {
//             const selectedCurrency = this.value;
//             const productContainer = this.closest('.product-card');
//             const priceElement = productContainer.querySelector('.price');
//             const basePrice = priceElement.getAttribute('data-price');

//             fetch(`https://v6.exchangerate-api.com/v6/${apiKey}/latest/USD`)
//                 .then(response => response.json())
//                 .then(data => {
//                     const conversionRate = data.conversion_rates[selectedCurrency];
//                     const convertedPrice = (basePrice * conversionRate).toFixed(2);
//                     priceElement.textContent = `${convertedPrice} ${selectedCurrency}`;
//                 })
//                 .catch(error => console.error('Error:', error));
//         });
//     });
// }

function toggleMenu() {
    document.getElementById("primaryNav").classList.toggle("open");
}
let x = document.getElementById("guitarBtn");
x.onclick = toggleMenu; 

let fullName = "Marie Poirot";
console.log(fullName);
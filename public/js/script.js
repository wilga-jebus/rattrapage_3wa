// document.addEventListener('DOMContentLoaded', function() {
//     initializeDarkMode();
//     initializeCurrencyExchange();
// });

const pictures = [
   "public/images/homePage/carousel1.jpg",
   "public/images/homePage/carousel2.jpg",
   "public/images/homePage/carousel3.jpg",


];

let currentIndex = 0;

function showImage() {
   document.getElementById('carousel').src = pictures[currentIndex];
}

function next() {
   currentIndex = (currentIndex + 1) % pictures.length;
   showImage();
}

function previous() {
   currentIndex = (currentIndex - 1 + pictures.length) % pictures.length;
   showImage();
}

setInterval(next,3000);


function initializeCurrencyExchange() {
    const currencySelectors = document.querySelectorAll('.currency-selector');
    
    const apiKey = 'f8d074679a19c33d4c33ca11'; // Replace with my actual API key

    currencySelectors.forEach(selector => {
        selector.addEventListener('change', function() {
            const selectedCurrency = this.value;
            console.log(selectedCurrency);
            const productContainer = this.closest('.column');
            
            const priceElement = productContainer.querySelector('.price');
            
            const basePrice = priceElement.getAttribute('data-price');
            

            fetch(`https://v6.exchangerate-api.com/v6/${apiKey}/latest/USD`)
                .then(response => response.json())
                .then(data => {
                    const conversionRate = data.conversion_rates[selectedCurrency];
                    const convertedPrice = (basePrice * conversionRate).toFixed(2);
                    priceElement.textContent = `${convertedPrice} ${selectedCurrency}`;
                })
                .catch(error => console.error('Error:', error));
        });
    });
}

initializeCurrencyExchange();

   
   
   










function toggleMenu() {
    document.getElementById("primaryNav").classList.toggle('open');
   
 }


 let x = document.getElementById("guitarBtn");
 x.onclick = toggleMenu; 


document.addEventListener('DOMContentLoaded', () => {
    const shopping = document.getElementById('shopping');
    
    const rzeczy = {
        pizza: {
            nazwa: "Pizza",
            cena: 20.00,
            obraz: "pizza.png"
        },
        cola: {
            nazwa: "Coca Cola",
            cena: 4.00,
            obraz: "cola.webp"
        },
        fries: {
            nazwa: "Fries",
            cena: 5.00,
            obraz: "fries.png"
        },
        bigmac: {
            nazwa: "Big Mac",
            cena: 9.00,
            obraz: "big-mac.png"
        },
        chicken: {
            nazwa: "Chicken nuggets",
            cena: 10.00,
            obraz: "chicken.webp"
        },
        tiramisu: {
            nazwa: "Tiramisu",
            cena: 8.00,
            obraz: "tiramisu.png"
        },
        lavacake: {
            nazwa: "Lava Cake",
            cena: 8.00,
            obraz: "lava.png"
        },
        donut: {
            nazwa: "Donut",
            cena: 5.00,
            obraz: "donut.png"
        },
        oreo: {
            nazwa: "Shake Oreo",
            cena: 7.00,
            obraz: "oreo.webp"
        }
    };
    
    Object.keys(rzeczy).forEach(key => {
        const item = rzeczy[key];
        const div = document.createElement('div');
        div.classList.add('shopping-item');
    
        const img = document.createElement('img');
        img.src = item.obraz;
        img.classList.add('item-image');
    
        const nameParagraf = document.createElement('p');
        nameParagraf.textContent = item.nazwa;
    
        const price = document.createElement('p');
        price.textContent = item.cena.toFixed(2) + '£';
    
        const btnAdd = document.createElement('button');
        btnAdd.classList.add('btn-add');
        btnAdd.name = "btn-add";
        btnAdd.textContent = "Add to cart";
        btnAdd.addEventListener('click', () => {
            fetch("shop.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json; charset=utf-8"
                },
                body: JSON.stringify({ nazwa: item.nazwa, cena: item.cena }) 
            }).then(response => response.text())
              .then(nazwa => {
                  console.log(item.nazwa , item.cena); 
              });
        });
    
        div.appendChild(img);
        div.appendChild(nameParagraf);
        div.appendChild(price);
        div.appendChild(btnAdd);
    
        shopping.appendChild(div);

        
    });
});

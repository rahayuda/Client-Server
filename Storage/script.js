// Data product
const products = [
{ id: 1, name: "Laptop", category: "Electronics", stock: 10, price: 5000000, image: "image/product.png" },
{ id: 2, name: "Pencil", category: "Stationery", stock: 50, price: 5000, image: "image/product.png" },
{ id: 3, name: "Mouse", category: "Electronics", stock: 20, price: 200000, image: "image/product.png" },
{ id: 4, name: "Book", category: "Stationery", stock: 30, price: 25000, image: "image/product.png" },
{ id: 5, name: "Soda Drink", category: "Beverage", stock: 15, price: 15000, image: "image/product.png" },
{ id: 6, name: "Printer", category: "Electronics", stock: 5, price: 1000000, image: "image/product.png" },
{ id: 7, name: "Camera", category: "Electronics", stock: 8, price: 3000000, image: "image/product.png" },
{ id: 8, name: "Pen", category: "Stationery", stock: 40, price: 2000, image: "image/product.png" },
{ id: 9, name: "Speaker", category: "Electronics", stock: 12, price: 150000, image: "image/product.png" },
{ id: 10, name: "Notebook", category: "Stationery", stock: 25, price: 10000, image: "image/product.png" },
{ id: 11, name: "Mineral Water", category: "Beverage", stock: 20, price: 5000, image: "image/product.png" },
{ id: 12, name: "Smartphone", category: "Electronics", stock: 15, price: 2000000, image: "image/product.png" }
];

// Fungsi untuk membuat elemen product
function createProductElement(product) {
  const productDiv = document.createElement("div");
  productDiv.classList.add("product");
  productDiv.innerHTML = `
  <div class="card">
  <i class="fas fa-th-list"></i>&nbsp;${product.name}<hr>
  <img src="${product.image}" class="product-img">
  <p>
  <b>${product.category}</b> | Stock ${product.stock} <br>
  Rp. ${product.price.toLocaleString()} 
  </p>
  <hr>
  <p>
  <form>
  <input type="number">
  <button class="buy">Beli</button>
  </form>
  </p>
  </div>
  `;
  return productDiv;
}

// Menambahkan elemen product ke dalam container
const productContainer = document.getElementById("product-container");
products.forEach(product => {
  const productElement = createProductElement(product);
  productContainer.appendChild(productElement);
});

// Menambahkan event listener untuk tombol "Beli" pada setiap product
document.querySelectorAll('.product .buy').forEach((button, index) => {
  button.addEventListener('click', () => {
    const productId = products[index].id;
    const quantity = parseInt(button.parentNode.querySelector('input').value);
    if (!isNaN(quantity) && quantity > 0 && quantity <= products[index].stock) {
      handlePurchase(productId, quantity);
    } else {
      alert('Invalid quantity or out of stock.');
    }
  });
});


// Fungsi untuk menangani pembelian product
function handlePurchase(productId, quantity) {
  // Mengurangi stok product
  const productIndex = products.findIndex(product => product.id === productId);
  if (productIndex !== -1) {
    const productName = products[productIndex].name;
    products[productIndex].stock -= quantity;

    // Menyimpan pembelian ke dalam localStorage
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const purchase = {
      id: Date.now(), // Menggunakan timestamp sebagai id unik
      productId: productId,
      productName: productName,
      quantity: quantity,
      price: products[productIndex].price * quantity
    };
    cart.push(purchase);
    localStorage.setItem('cart', JSON.stringify(cart));

    // Memperbarui tampilan chart
    updateChart();
  }
}

// Fungsi untuk menghapus product dari keranjang belanja berdasarkan id pembelian
function handleDelete(purchaseId) {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart = cart.filter(item => item.id !== purchaseId);
  localStorage.setItem('cart', JSON.stringify(cart));
  updateChart();
}

// Fungsi untuk memperbarui tampilan chart
function updateChart() {
  const cart = JSON.parse(localStorage.getItem('cart')) || [];

  // Menghitung total harga pembelian
  const totalPrice = cart.reduce((total, item) => total + item.price, 0);

  // Memperbarui tampilan chart
  const chartElement = document.getElementById('chart');
  chartElement.innerHTML = '';
  cart.forEach(item => {
    const itemElement = document.createElement('div');
    itemElement.innerHTML = `<i class="fas fa-list"></i> ${item.productName}, ${item.quantity}, ${item.price.toLocaleString()}, <span class="delete" data-id="${item.id}"><i class="fas fa-times"></i></span>`;
    chartElement.appendChild(itemElement);
  });

  // Menambahkan event listener untuk tombol "Delete" pada setiap item dalam keranjang belanja
  document.querySelectorAll('.delete').forEach(button => {
    button.addEventListener('click', () => {
      const purchaseId = parseInt(button.getAttribute('data-id'));
      handleDelete(purchaseId);
    });
  });

// Menampilkan total harga keseluruhan
const totalElement = document.getElementById('total');
totalElement.innerHTML = `<i class="fas fa-list"></i> Total: Rp. ${totalPrice.toLocaleString()}`;
}

// Memanggil fungsi updateChart saat halaman dimuat
updateChart();

function toggleDropdown1() {
  var dropdown = document.getElementById("myDropdown1");
  if (dropdown.style.display === "none" || dropdown.style.display === "") {
    dropdown.style.display = "block";
  } else {
    dropdown.style.display = "none";
  }
}

function toggleDropdown2() {
  var dropdown = document.getElementById("myDropdown2");
  if (dropdown.style.display === "none" || dropdown.style.display === "") {
    dropdown.style.display = "block";
  } else {
    dropdown.style.display = "none";
  }
}

function toggleDropdown3() {
  var dropdown = document.getElementById("myDropdown3");
  if (dropdown.style.display === "none" || dropdown.style.display === "") {
    dropdown.style.display = "block";
  } else {
    dropdown.style.display = "none";
  }
}

// Menambahkan dan menghapus kelas saat mouse masuk dan keluar dari kartu product
const cards = document.querySelectorAll('.product');

cards.forEach(card => {
  card.addEventListener('mouseenter', function() {
    this.classList.add('hover');
  });

  card.addEventListener('mouseleave', function() {
    this.classList.remove('hover');
  });
});
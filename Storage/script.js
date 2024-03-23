// Data produk
const products = [
  { name: "Laptop", category: "Electronics", stock: 10, price: 5000000, image: "image/product.png" },
  { name: "Pencil", category: "Stationery", stock: 50, price: 5000, image: "image/product.png" },
  { name: "Mouse", category: "Electronics", stock: 20, price: 200000, image: "image/product.png" },
  { name: "Book", category: "Stationery", stock: 30, price: 25000, image: "image/product.png" },
  { name: "Soda Drink", category: "Beverage", stock: 15, price: 15000, image: "image/product.png" },
  { name: "Printer", category: "Electronics", stock: 5, price: 1000000, image: "image/product.png" },
  { name: "Camera", category: "Electronics", stock: 8, price: 3000000, image: "image/product.png" },
  { name: "Pen", category: "Stationery", stock: 40, price: 2000, image: "image/product.png" },
  { name: "Speaker", category: "Electronics", stock: 12, price: 150000, image: "image/product.png" },
  { name: "Notebook", category: "Stationery", stock: 25, price: 10000, image: "image/product.png" },
  { name: "Mineral Water", category: "Beverage", stock: 20, price: 5000, image: "image/product.png" },
  { name: "Smartphone", category: "Electronics", stock: 15, price: 2000000, image: "image/product.png" }
];

// Fungsi untuk membuat elemen produk
function createProductElement(product) {
  const productDiv = document.createElement("div");
  productDiv.classList.add("produk");
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
          <button>Beli</button>
        </form>
      </p>
    </div>
  `;
  return productDiv;
}

// Menambahkan elemen produk ke dalam container
const productContainer = document.getElementById("product-container");
products.forEach(product => {
  const productElement = createProductElement(product);
  productContainer.appendChild(productElement);
});

// Fungsi untuk menangani pembelian produk
function handlePurchase(productName, quantity) {
  // Mengurangi stok produk
  const productIndex = products.findIndex(product => product.name === productName);
  if (productIndex !== -1) {
    products[productIndex].stock -= quantity;

    // Menyimpan pembelian ke dalam localStorage
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const purchase = {
      product: productName,
      quantity: quantity,
      price: products[productIndex].price * quantity
    };
    cart.push(purchase);
    localStorage.setItem('cart', JSON.stringify(cart));

    // Memperbarui tampilan chart
    updateChart();
  }
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
    itemElement.innerHTML = `<i class="fas fa-list"></i> ${item.product}, ${item.quantity} pcs, Rp. ${item.price.toLocaleString()}`;
    chartElement.appendChild(itemElement);
  });

  // Menampilkan total harga keseluruhan
  const totalElement = document.getElementById('total');
  totalElement.innerHTML = `<i class="fas fa-th-list"></i> Total: Rp. ${totalPrice.toLocaleString()}`;
}


// Menambahkan event listener untuk tombol "Beli" pada setiap produk
document.querySelectorAll('.produk button').forEach((button, index) => {
  button.addEventListener('click', () => {
    const productName = products[index].name;
    const quantity = parseInt(button.parentNode.querySelector('input').value);
    if (!isNaN(quantity) && quantity > 0 && quantity <= products[index].stock) {
      handlePurchase(productName, quantity);
    } else {
      alert('Invalid quantity or out of stock.');
    }
  });
});

// Memanggil fungsi updateChart saat halaman dimuat
updateChart();

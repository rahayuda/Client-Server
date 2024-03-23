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
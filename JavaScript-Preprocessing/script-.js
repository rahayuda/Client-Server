// Fungsi ambil data dari Wikipedia
async function fetchWikipediaArticle() {
    try {
        let response = await fetch("https://id.wikipedia.org/api/rest_v1/page/random/summary");
        let data = await response.json();
        return { title: data.title, content: data.extract };
    } catch (error) {
        console.error("Error fetching data:", error);
        return { title: "Error", content: "Gagal mengambil data." };
    }
}

// Fungsi tampilkan hasil ke HTML tanpa preprocessing
async function showArticle() {
    let article = await fetchWikipediaArticle();

    document.getElementById("article-title").textContent = article.title;
    document.getElementById("article-content").textContent = article.content;
}

// Panggil saat halaman dimuat
document.addEventListener("DOMContentLoaded", showArticle);

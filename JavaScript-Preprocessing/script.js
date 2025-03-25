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

function preprocessText(text) {
    // Hilangkan tanda baca
    text = text.replace(/[.,!?()":;\-]/g, "");
    
    // Daftar kata penghubung umum dalam bahasa Indonesia
    const stopWords = ["dan", "atau", "serta", "tetapi", "karena", "jika", "maka", "sehingga", "dengan", "ke", "dari", "di", "yang", "untuk", "dalam", "pada", "sebagai"];
    
    // Pisahkan teks menjadi kata-kata
    let words = text.split(" ");
    
    // Hapus kata penghubung
    words = words.filter(word => !stopWords.includes(word.toLowerCase()));
    
    // Ambil kata benda, nama orang, dan tempat (simulasi sederhana)
    let properNouns = words.filter(word => /^[A-Z][a-z]+$/.test(word));
    
    // Hilangkan kata duplikat
    let uniqueWords = [...new Set(properNouns)];
    
    return uniqueWords;
}

async function showArticle() {
    let article = await fetchWikipediaArticle();
    let processedWords = preprocessText(article.content);
    
    document.getElementById("article-title").textContent = article.title;
    
    let contentElement = document.getElementById("article-content");
    contentElement.innerHTML = `<p>${article.content}</p><h3>Daftar Kata:</h3><ul>${processedWords.map(word => `<li>${word}</li>`).join("")}</ul>`;
}

document.addEventListener("DOMContentLoaded", showArticle);

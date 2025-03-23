const apiKey = "api key"; // Ganti dengan API Key Hugging Face

async function fetchAI(model, inputData) {
    const response = await fetch(`https://api-inference.huggingface.co/models/${model}`, {
        method: "POST",
        headers: { "Authorization": apiKey, "Content-Type": "application/json" },
        body: JSON.stringify({ inputs: inputData })
    });
    return response.json();
}

async function summarizeText() {
    const inputText = document.getElementById("textInput").value;
    document.getElementById("summaryResult").innerText = "AI sedang merangkum...";
    const result = await fetchAI("facebook/bart-large-cnn", inputText);
    document.getElementById("summaryResult").innerText = result[0]?.summary_text || "Gagal merangkum.";
}

async function chatWithAI() {
    const inputText = document.getElementById("chatInput").value;
    document.getElementById("chatResult").innerText = "AI sedang menjawab...";
    const result = await fetchAI("mistralai/Mistral-7B-Instruct", inputText);
    document.getElementById("chatResult").innerText = result.generated_text || "Gagal mendapatkan jawaban.";
}

async function classifyImage() {
    const file = document.getElementById("imageInput").files[0];
    if (!file) return alert("Pilih gambar terlebih dahulu!");
    
    const reader = new FileReader();
    reader.onload = async function() {
        const base64Image = reader.result.split(",")[1];
        document.getElementById("imageResult").innerText = "AI sedang mengenali gambar...";
        document.getElementById("previewImage").src = reader.result;

        const result = await fetchAI("google/vit-base-patch16-224", base64Image);
        document.getElementById("imageResult").innerText = `Deteksi: ${result[0]?.label || "Tidak dikenali."}`;
    };
    reader.readAsDataURL(file);
}

async function convertSpeechToText() {
    const file = document.getElementById("audioInput").files[0];
    if (!file) return alert("Pilih file suara terlebih dahulu!");
    
    const reader = new FileReader();
    reader.onload = async function() {
        const base64Audio = reader.result.split(",")[1];
        document.getElementById("speechResult").innerText = "AI sedang mengubah suara...";
        const result = await fetchAI("facebook/wav2vec2-large-960h", base64Audio);
        document.getElementById("speechResult").innerText = `Teks: ${result.text || "Gagal mengenali suara."}`;
    };
    reader.readAsDataURL(file);
}

async function detectSentiment() {
    const inputText = document.getElementById("sentimentInput").value;
    document.getElementById("sentimentResult").innerText = "AI sedang menganalisis sentimen...";
    const result = await fetchAI("nlptown/bert-base-multilingual-uncased-sentiment", inputText);
    document.getElementById("sentimentResult").innerText = `Sentimen: ${result[0]?.label || "Tidak terdeteksi."}`;
}

async function generateImage() {
    const prompt = document.getElementById("imagePrompt").value;
    document.getElementById("imageGenResult").innerText = "AI sedang membuat gambar...";
    
    const result = await fetchAI("stabilityai/stable-diffusion-2", prompt);
    document.getElementById("generatedImage").src = result.url;
    document.getElementById("imageGenResult").innerText = "✅ Gambar berhasil dibuat!";
}

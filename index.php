<?php
// File PHP này sẽ xuất ra nội dung HTML/CSS/JS đã được cải tiến.
echo '<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chúc Mừng Sinh Nhật Anh Yêu!</title>
    <!-- Tải Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Thiết lập font Inter và màu sắc chủ đạo */
        :root {
            --primary-color: #E91E63; /* Hồng Tình yêu */
            --accent-color: #FFD700; /* Vàng Ánh kim */
            --text-color: #4A4A4A;
        }

        /* Thêm font Inter */
        html { font-family: "Inter", sans-serif; }
        
        /* Hiệu ứng nền Starry Night */
        body {
            background-color: #1a1a2e; /* Màu tím than đậm */
            overflow: hidden; /* Ngăn cuộn khi tạo sao */
        }
        
        /* Container cho các ngôi sao */
        .starry-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none; /* Cho phép tương tác với các phần tử phía trước */
            z-index: 0;
        }

        /* Animation cho các ngôi sao lấp lánh */
        @keyframes twinkle {
            0%, 100% { opacity: 0.8; transform: scale(1); }
            50% { opacity: 0.4; transform: scale(1.2); }
        }

        /* Hiệu ứng Text */
        .animated-text {
            text-shadow: 0 0 10px var(--accent-color), 0 0 20px var(--accent-color);
            animation: textGlow 2s infinite alternate;
        }

        @keyframes textGlow {
            0% { text-shadow: 0 0 5px var(--accent-color), 0 0 10px rgba(255, 215, 0, 0.5); }
            100% { text-shadow: 0 0 15px var(--accent-color), 0 0 30px rgba(255, 215, 0, 0.8); }
        }

        /* Hiệu ứng rung nhẹ cho thẻ chính */
        .heartbeat {
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.02); }
            100% { transform: scale(1); }
        }
    </style>
    <!-- Script tạo các ngôi sao -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const starContainer = document.createElement("div");
            starContainer.classList.add("starry-background");
            document.body.appendChild(starContainer);

            // Tạo 100 ngôi sao lấp lánh ngẫu nhiên
            for (let i = 0; i < 100; i++) {
                const star = document.createElement("div");
                star.style.width = star.style.height = `${Math.random() * 2 + 1}px`;
                star.style.backgroundColor = "white";
                star.style.borderRadius = "50%";
                star.style.position = "absolute";
                star.style.top = `${Math.random() * 100}vh`;
                star.style.left = `${Math.random() * 100}vw`;
                star.style.animation = `twinkle ${Math.random() * 3 + 1}s infinite alternate`;
                starContainer.appendChild(star);
            }
        });
    </script>
</head>
<body class="min-h-screen flex items-center justify-center p-4">

    <div class="starry-background"></div>

    <!-- Khung chính chứa lời chúc -->
    <div class="relative bg-white/10 backdrop-blur-lg p-8 md:p-12 rounded-3xl shadow-2xl max-w-lg w-full text-white z-10 border border-white/30 heartbeat">
        
        <!-- Ảnh lãng mạn/bánh sinh nhật -->
        <div class="mb-6 flex justify-center">
            <!-- Dùng ảnh placeholder tượng trưng cho quà/yêu thương -->
            <img src="https://placehold.co/400x400/9b59b6/ffffff?text=Happy+Birthday+%C2%A4" 
                 alt="Romantic birthday gift" 
                 class="w-48 h-48 md:w-64 md:h-64 object-cover rounded-full border-4 border-amber-400 shadow-xl transition duration-500 hover:scale-105"
                 loading="lazy">
        </div>

        <!-- Lời chúc chính -->
        <h1 class="animated-text text-4xl md:text-5xl font-extrabold mb-4 uppercase text-amber-400">
            Happy Birthday, Anh Yêu!
        </h1>

        <!-- Nội dung lãng mạn -->
        <p class="text-xl md:text-2xl mb-6 font-light italic text-pink-300">
            "Em yêu Anh, Chúc Anh Yêu Sinh Nhật Vui Vẻ 🎉"
        </p>

        <!-- Hiệu ứng trái tim và nến -->
        <div class="flex justify-center space-x-4 text-3xl mb-4">
            <span class="animate-bounce">🎂</span>
            <span class="text-red-500 animate-ping">❤️</span>
            <span class="animate-bounce">🎁</span>
        </div>

        <p class="text-sm opacity-70 mt-6">
            Mãi mãi bên nhau anh nhé!
        </p>
    </div>

</body>
</html>';
?>

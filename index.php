<?php
// File PHP này tạo một hiệu ứng "cú lừa" bất ngờ, sau đó hiển thị thiệp chúc mừng lãng mạn.
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
            pointer-events: none;
            z-index: 0;
        }

        /* Animation cho các ngôi sao lấp lánh */
        @keyframes twinkle {
            0%, 100% { opacity: 0.8; transform: scale(1); }
            50% { opacity: 0.4; transform: scale(1.2); }
        }

        /* Hiệu ứng Text phát sáng */
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
        
        /* Hiệu ứng HÙ (Scare Effect) - Tối và rung lắc mạnh */
        .scare-active {
            animation: shake 0.1s 3; /* Rung lắc 3 lần cực nhanh */
            background-color: black !important;
            transition: background-color 0s;
        }

        @keyframes shake {
            0% { transform: translate(1px, 1px) rotate(0deg); }
            33% { transform: translate(-1px, -2px) rotate(-1deg); }
            66% { transform: translate(-3px, 0px) rotate(1deg); }
            100% { transform: translate(1px, -1px) rotate(0deg); }
        }

        /* Nút ẩn để kích hoạt bất ngờ */
        .gift-button {
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .gift-button:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 15px -3px rgba(255, 215, 0, 0.5), 0 4px 6px -2px rgba(255, 215, 0, 0.5);
        }

    </style>
    <!-- Script tạo các ngôi sao -->
    <script>
        // Tạo các ngôi sao lấp lánh
        const createStars = () => {
            const starContainer = document.createElement("div");
            starContainer.classList.add("starry-background");
            document.body.appendChild(starContainer);

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
        };

        const revealCard = () => {
            const initialScreen = document.getElementById("initial-screen");
            const cardScreen = document.getElementById("card-screen");
            
            // 1. Kích hoạt hiệu ứng HÙ (Scare)
            document.body.classList.add("scare-active");
            initialScreen.style.opacity = 0; // Ẩn nút nhấn

            setTimeout(() => {
                // 2. Chấm dứt hiệu ứng HÙ sau 300ms
                document.body.classList.remove("scare-active");

                // 3. Hiển thị thiệp chúc mừng lãng mạn
                initialScreen.classList.add("hidden");
                cardScreen.classList.remove("hidden");
                cardScreen.style.opacity = 0;
                
                // Hiệu ứng mờ dần để xuất hiện thiệp
                setTimeout(() => {
                    cardScreen.style.transition = "opacity 1s ease-in";
                    cardScreen.style.opacity = 1;
                }, 50);

            }, 300);
        };

        document.addEventListener("DOMContentLoaded", () => {
            createStars();
            document.getElementById("gift-button").addEventListener("click", revealCard);
        });
    </script>
</head>
<body class="min-h-screen flex items-center justify-center p-4">

    <!-- 1. MÀN HÌNH BAN ĐẦU (The Trap) -->
    <div id="initial-screen" class="relative z-10 w-full flex items-center justify-center transition duration-300">
        <button id="gift-button" class="gift-button bg-pink-600 hover:bg-pink-700 text-white font-bold py-6 px-12 rounded-full shadow-lg text-2xl md:text-3xl tracking-wider uppercase flex flex-col items-center">
            <span>🎁</span>
            <span class="mt-2 text-yellow-300">Ấn Vào Để Lấy Phong Thư Bí Mật</span>
            <span class="text-sm mt-1 opacity-80">(Cấm lén xem nha!)</span>
        </button>
    </div>

    <!-- 2. THIỆP CHÚC MỪNG (Ẩn) -->
    <div id="card-screen" class="hidden relative bg-white/10 backdrop-blur-lg p-8 md:p-12 rounded-3xl shadow-2xl max-w-lg w-full text-white z-10 border border-white/30 heartbeat">
        
        <!-- Ảnh lãng mạn/bánh sinh nhật -->
        <div class="mb-6 flex justify-center">
            <!-- Dùng ảnh placeholder tượng trưng cho quà/yêu thương -->
            <img src="https://placehold.co/400x400/9b59b6/ffffff?text=Anh+%E1%BB%9C+Trong+Tim+Em" 
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
            "Từ khi có Anh, mỗi ngày của Em đều là món quà. Chúc Anh yêu sinh nhật ngập tràn niềm vui và hạnh phúc. Anh là tất cả của Em! 🎉"
        </p>

        <!-- Hiệu ứng trái tim và nến -->
        <div class="flex justify-center space-x-4 text-3xl mb-4">
            <span class="animate-bounce">🎂</span>
            <span class="text-red-500 animate-ping">❤️</span>
            <span class="animate-bounce">🎁</span>
        </div>

        <p class="text-sm opacity-70 mt-6">
            Mãi mãi bên nhau, yêu Anh rất nhiều!
        </p>
    </div>

</body>
</html>';
?>

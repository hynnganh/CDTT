<?php
echo '<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Chúc Mừng Sinh Nhật!</title>
<style>
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: #fce4ec;
    font-family: Arial, sans-serif;
    text-align: center;
    flex-direction: column;
  }
  h1 {
    font-size: 3em;
    color: #e91e63;
    animation: colorChange 2s infinite;
  }
  @keyframes colorChange {
    0% {color: #e91e63;}
    25% {color: #ff5722;}
    50% {color: #4caf50;}
    75% {color: #2196f3;}
    100% {color: #e91e63;}
  }
  .sparkle {
    font-size: 2em;
    animation: blink 1s infinite;
  }
  @keyframes blink {
    0%, 50%, 100% {opacity: 1;}
    25%, 75% {opacity: 0;}
  }
</style>
</head>
<body>

<h1>Em yêu Anh, Chúc Anh Sinh Nhật Vui Vẻ 🎉</h1>
<div class="sparkle">✨✨✨✨✨✨</div>

<script>
// Chữ nhảy nhẹ lên xuống
const h1 = document.querySelector("h1");
let pos = 0;
let direction = 1;

setInterval(() => {
  pos += direction;
  if(pos > 10 || pos < 0) direction *= -1;
  h1.style.transform = `translateY(${pos}px)`;
}, 100);
</script>

</body>
</html>';

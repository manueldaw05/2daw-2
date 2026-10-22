const btn = document.querySelector("button");
const link = document.querySelector("a");

const div = document.createElement("div");
div.textContent = "Mueve el ratón aquí";
document.body.appendChild(div);

btn.addEventListener("click", () => {
    console.log("Has hecho clic en el botón");
});

link.addEventListener("mouseenter", () => {
    link.style.backgroundColor = "yellow";
});

link.addEventListener("mouseleave", () => {
    link.style.backgroundColor = "";
});

div.addEventListener("mousemove", ({ offsetX, offsetY }) => {
    div.textContent = `X: ${offsetX} - Y: ${offsetY}`;
});
const home=document.getElementById("naviguate-to-home");
const products=document.getElementById("naviguate-to-products");
const contact=document.getElementById("naviguate-to-contact");

products.addEventListener("click", e=>{
    location.href = "./products.html";
})

home.addEventListener("click", e=>{
    location.href = "./index.html";
})

contact.addEventListener("click", e=>{
    location.href = "./contact.html";
})

let carts=document.querySelectorAll('.btn');
for (let i=0;i<carts.length;i++){
    carts[i].addEventListener('click',()=>{
        console.log("added to cart");
    })
}
function searchItems(){
    let keyword = document.getElementById("searchInput").value;
    fetch("search_items.php?q="+keyword)
    .then(response=>response.text())
    .then(data=>{
    document.getElementById("results").innerHTML=data;
    });
}



  //display wikis in the page
  function displayWikis(wiki) {
    let WikisContainer = document.getElementById("wiki");
    WikisContainer.innerHTML = "";
    wiki.forEach((article) => {
        WikisContainer.innerHTML += `
        <div class=" col-md-6 text-center mb-4">
            <div class="article-title card text-dark card-has-bg click-col" style="background-image:url('public/images/article.jpg');">
                <div class="card-img-overlay d-flex flex-column">
                    <div class="card-body">
                        <h4 class="card-title mt-0 text-center">${article.name}</h4>
                        <p class="card-body mt-0 text-center">${article.categorie_name}</p>
                        <p class="card-body mt-0 text-center">${article.description}</p>
                        <form method="POST" action="Singlepage/index">
                        <input type="hidden" name="id" value="${article.getElementById}">
                        <button type="submit" name="submit">Read more</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        `;
    });
}

$(document).ready(function () {
    $("#searchForm").submit(function (e) {
        e.preventDefault();
        var input = $("#searchInput").val();
        if (input != "") {
            $.ajax({
                url: "http://localhost/nv/index/search", // Ajoutez le protocole complet
                method: "POST",
                data: { search: input },
                success: function (res) {
                    displayWikis(JSON.parse(res));
                    console.log("Response from server:", res);
                },
            });
        }
    });
});

// $(document).ready(function () {
//     $("#searchForm").submit(function (e) {
//         e.preventDefault();
//         var input = $("#searchInput").val();
//         if (input != "") {
//             $.ajax({
//                 url: "localhost/nv/index/search",
//                 method: "post",
//                 data: { search: input },
//                 success: function (res) {
//                     displayWikis(JSON.parse(res));
//                 },
//             });
//         }
//     });
// });
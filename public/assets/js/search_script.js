$(document).ready(function () {
    $("#searchForm").submit(function (e) {
        e.preventDefault();
        var input = $("#searchInput").val();
        if (input != "") {
            $.ajax({
                url: "index/search",
                method: "post",
                data: { search: input },
                success: function (res) {
                    displayWikis(JSON.parse(res));
                },
            });
        }
    });
});

  //display wikis in the page
  function displayWikis(wiki) {
    let WikisContainer = document.getElementById("wikis-container");
    WikisContainer.innerHTML = "";
    wiki.forEach((article) => {
        WikisContainer.innerHTML += `
            <div class="card-img-overlay d-flex flex-column">
                <div class="card-body">
                    <h4 class="card-title mt-0 text-center">${article.title}</h4>
                    <p class="content mt-0 text-center">${article.categorie_name}</p>
                    <p class="content mt-0">${article.description}</p>
                    <form method="POST" action="Singlepage/index">
                        <input type="hidden" name="id" value="${article.id}">
                        <button type="submit" name="submit">Read more</button>
                    </form>
                </div>
            </div>
        `;
    });
}

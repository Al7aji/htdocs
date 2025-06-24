   
        document.getElementById("searchInput").addEventListener("input", function () {
        const query = this.value.trim();
        if (!query) {
            document.getElementById("results").innerHTML = "";
            return;
        }

      
        fetch("actions/search.php?q=" + encodeURIComponent(query))
            .then(res => res.text())
            .then(data => {
            document.getElementById("results").innerHTML = data;
            })
            .catch(err => {
            console.error("", err);
            });
        });
    
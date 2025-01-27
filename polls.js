document.addEventListener("DOMContentLoaded", function () {
    const pollForm = document.getElementById("poll-form");
    const pollResults = document.getElementById("poll-results");
    const resultsList = document.getElementById("results-list");

    pollForm.addEventListener("submit", function (event) {
        event.preventDefault();

        // Get selected option
        const selectedOption = document.querySelector('input[name="poll-option"]:checked');

        if (!selectedOption) {
            alert("Please select an option before submitting!");
            return;
        }

        const vote = selectedOption.value;

        // Send the vote to the server
        fetch("polls.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ vote: vote }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    // Display results
                    pollResults.classList.remove("hidden");
                    resultsList.innerHTML = "";

                    for (const [option, count] of Object.entries(data.results)) {
                        const li = document.createElement("li");
                        li.textContent = `${option}: ${count} votes`;
                        resultsList.appendChild(li);
                    }
                } else {
                    alert("Error submitting vote. Please try again.");
                }
            });
    });
});

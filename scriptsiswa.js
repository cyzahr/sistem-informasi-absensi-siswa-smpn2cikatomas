function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const mainContent = document.getElementById("mainContent");

    sidebar.classList.toggle("active");
    mainContent.classList.toggle("shift");
}

function searchTable() {
    const input = document.getElementById("search");
    const filter = input.value.toLowerCase();
    const table = document.getElementById("siswaTable");
    const rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {
        let rowText = rows[i].textContent.toLowerCase();
        rows[i].style.display = rowText.includes(filter) ? "" : "none";
    }
}

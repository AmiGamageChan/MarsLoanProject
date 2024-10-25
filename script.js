function loadOrderID() {
    var orderID = document.getElementById("orderID");
    var localTime = new Date();
    orderID.value = localTime.getTime();
}

function logOrder() {
    var orderID = document.getElementById("orderID").value;
    var productName = document.getElementById("productName").value;
    var productCost = document.getElementById("productCost").value;
    var loanAmount = document.getElementById("loanAmount").value;

    var f = new FormData();

    f.append("orderID", orderID);
    f.append("productName", productName);
    f.append("productCost", productCost);
    f.append("loanAmount", loanAmount);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            if (this.responseText.trim() == "Success") {
                document.getElementById("orderID").value = ""; 
                document.getElementById("productName").value = ""; 
                document.getElementById("productCost").value = ""; 
                document.getElementById("loanAmount").value = "";
                alert("Loan Order Logged Successfully");
                location.reload();
                loadOrderID();
            } else {
                alert("Error: " + this.responseText);
            }
        }
    }

    request.open("POST", "logOrder.php", true);
    request.send(f);
}


document.addEventListener("DOMContentLoaded", function() {
    var path = window.location.pathname;
    var page = path.split("/").pop();
    var navbarTitle = document.getElementById("navbarTitle");
    switch(page) {
        case "dashboard.php":
            navbarTitle.innerHTML += "Dashboard";
            break;
        case "loanApplication.php":
            navbarTitle.innerHTML += "Loan Application";
            break;

    }
});

function loadOrderID() {
    var orderID = document.getElementById("orderID");
    orderID.value = Date.now();
}

function logOrder() {
    var orderID = document.getElementById("orderID").value;
    var productName = document.getElementById("productName").value;
    var loanAmount = document.getElementById("loanAmount").value;

    var f = new FormData();

    f.append("orderID", orderID);
    f.append("productName", productName);
    f.append("loanAmount", loanAmount);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            if (this.responseText.trim() == "Success") {
                document.getElementById("orderID").value = ""; 
                document.getElementById("productName").value = ""; 
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

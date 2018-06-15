$(document).ready(function(){
    $.ajax({
        url: "http://localhost/iot/data.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var product = [];
            var score = [];

            for(var i in data) {
                product.push("Nr " + data[i].Nr);
                score.push(data[i].Date);
            }

            var chartdata = {
                labels: Orders,
                datasets : [
                    {
                        label: 'Orders',
                        backgroundColor: 'rgba(255, 2255, 255, 0.2)',
                        borderColor: 'rgba(70, 234, 86, 0.75)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: score
                    }
                ]
            };

            var ctx = $("#mycanvas");

            var barGraph = new Chart(ctx, {
                type: 'line',
                data: chartdata
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});

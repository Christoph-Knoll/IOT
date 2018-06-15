$(document).ready(function(){
    $.ajax({
        url: "http://localhost/iot/data.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var player = [];
            var score = [];
            var nr = [0, 0];
            var products = ["Lavazza Caffe Crema", "Corny BIG Schoko"];

            for(var i in data) {
                if(data[i].Nr == 1){ nr[0] = nr[0] +1;}
                if(data[i].Nr == 2){ nr[1] = nr[1] +1;}
            }

            var chartdata = {
                labels: products,
                datasets : [
                    {
                        label: 'Ordered Products (all time)',
                        backgroundColor: 'rgba(0, 255, 16, 0.6)',
                        data: nr
                    }
                ]
            };

            var ctx = $("#mycanvas");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});

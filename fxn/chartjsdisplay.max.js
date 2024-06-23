				chartdata = {
						labels: yds,
						datasets: [{
							label: chartlabel,
							data: xds,
							fill: false,
							backgroundColor: cds,
							borderColor: dds, 
							borderWidth:1
						}]
					}
					
			 chartoptions = {scales: {
							xAxes: [{
								ticks:{
									"beginAtZero":true,
									autoSkip: false,
									maxRotation: 90,
									minRotation: 90
								},
								gridLines: {
									offsetGridLines: true
								},
								display: false
							}],
							yAxes: [{
								ticks:{"beginAtZero":true},
								gridLines: {
									offsetGridLines: true
								}
							}]
						}
					}
			 if(canvasid == ''){ canvasid == 'myChart'; }
			 
			 var ctx = document.getElementById(canvasid).getContext('2d');
				var chart = new Chart(ctx, {
					type: 'bar', //horizontalBar, bar
					data: chartdata,
					options: chartoptions
				});
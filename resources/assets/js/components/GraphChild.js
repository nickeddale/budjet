import Graph from './Graph';


export default Graph.extend({

	ready() {


		this.$http.get(this.url)
			.then(response => {

				this.graphType = response.data.data.optionsData.graphType;

				const graphData = response.data.data.graphData;				

				var dataObject = Object.keys(graphData).map(key => graphData[key]);

				var labels = dataObject[0];

				var datasets = dataObject[1];

				this.render({

					labels: labels,

					datasets: datasets

				}
				);
							
			});

		var data = {

				

		};


	},

	


});


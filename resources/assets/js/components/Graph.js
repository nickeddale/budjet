import Vue from 'vue';
import Chart from 'chart.js';


export default Vue.extend({

	props: ['url', 'graphType'],
	
	template: `
			<div>
				<canvas width="600" height="400" v-el:canvas></canvas>
			</div>
	`,

	data() {
		return {}

	},


	methods: {
			render(data) {

				var context = this.$els.canvas.getContext('2d');

				var chart = new Chart(context , {
				    type: this.graphType,
				    data: data,
				});
			},

	}


});



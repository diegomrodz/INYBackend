<style scoped>
	
	#panel-wrapper {
		width: 100%;
		height: 100vh;		
	}

	#panel-wrapper.danger {
		background-color: red;
		color: white !important;
	}

	#panel-wrapper.positive {
		background-color: green;
		color: white !important;
	}

	#panel-wrapper.warning {
		background-color: yellow;
		color: black !important;
	}	

	#panel-wrapper.calm {
		background-color: blue;
		color: white !important;
	}	

	#panel-table {
		min-width: 100%;
		min-height: 100%;
	}

	#panel-table td {
		text-transform: uppercase;
		font-weight: bold;
	}

	#top-line td {
		text-align: center;
		vertical-align: top;
		font-family: Arial;
		font-size: 60px;
	}

	#bottom-line td {
		text-align: center;
		vertical-align: bottom;
		font-family: Arial;
		font-size: 60px;
	}

	#left-option {
		padding-left: 30px;
		text-align: left;
		font-family: Arial;
		font-size: 60px;
	}

	#right-option {
		padding-right: 30px;
		text-align: right;
		font-family: Arial;
		font-size: 60px;
	}

	#center-text {
		text-align: center;
		font-family: Arial;
		font-size: 170px;
	}
</style>


<template>
	<div id="panel-wrapper" class="{{ bgColor }}">
	    <table id="panel-table">
	    	<tr id="top-line">
				<td colspan="3" v-on:click="moveUp">{{ topText }}</td>
			</tr>
	    	<tr>
				<td width="20" id="left-option" v-on:click="moveLeft">{{ leftText }}</td>
				<td width="60" id="center-text">{{ centerText }}</td>
				<td width="20" id="right-option" v-on:click="moveRight">{{ rightText }}</td>
	    	</tr>
	    	<tr id="bottom-line">
				<td colspan="3" v-on:click="moveDown">{{ bottomText }}</td>
			</tr>
	    </table>
    </div>
</template>

<script>
    export default {

    	props: ['device', 'patient'],

    	data() {
    		return {
    			leftText: "",
	    		rightText: "",
	    		topText: "",
	    		bottomText: "",
	    		centerText: "",

	    		defaultAppName: "INY",
    			
	    		currentLevel: 0,

	    		bgColor: "",

    			currentPanelId: null
    		};
    	},

    	methods: {
	    	moveToStart() {
	    		this.$http.get(this.api('device-panel/move_to_start/' + this.device + '/for/' + this.patient)).then(
	    			(response) => {
	    				console.log("Movimento à direita realizado com sucesso");
	    			},
	    			(error) => {
	    				alert("Houve um erro na comunicação com o servidor");
	    			}
	    		);
	    	},

	    	moveLeft() {
	    		this.$http.get(this.api('device-panel/move_left/' + this.device + '/for/' + this.patient)).then(
	    			(response) => {
	    				console.log("Movimento à esquerda realizado com sucesso");
	    			},
	    			(error) => {
	    				alert("Houve um erro na comunicação com o servidor");
	    			}
	    		);
	    	},

	    	moveRight() {
	    		this.$http.get(this.api('device-panel/move_right/' + this.device + '/for/' + this.patient)).then(
	    			(response) => {
	    				console.log("Movimento à direita realizado com sucesso");
	    			},
	    			(error) => {
	    				alert("Houve um erro na comunicação com o servidor");
	    			}
	    		);
	    	},

	    	moveDown() {
	    		this.$http.get(this.api('device-panel/move_down/' + this.device + '/for/' + this.patient)).then(
	    			(response) => {
	    				console.log("Movimento para baixo realizado com sucesso");
	    			},
	    			(error) => {
	    				alert("Houve um erro na comunicação com o servidor");
	    			}
	    		);
	    	},

	    	moveUp() {
	    		this.$http.get(this.api('device-panel/move_up/' + this.device + '/for/' + this.patient)).then(
	    			(response) => {
	    				console.log("Movimento para cima realizado com sucesso");
	    			},
	    			(error) => {
	    				alert("Houve um erro na comunicação com o servidor");
	    			}
	    		);
	    	},

	    	host(path) {
	    		return "http://localhost:8000/" + path;
	    	},

	    	api(path) {
	    		return this.host('api/') + path; 
	    	},

	    	statusOf() {
	    		return this.$http.get(this.api('device-panel/status_of/' + this.device + '/for/' + this.patient));
	    	},

	    	refreshPanel() {
	    		this.statusOf().then(
	    			(response) => {
	    				console.log(response);
	    				this.setPanel(response.data);
	    			}
	    		);
	    	},

	    	selectOption() {
	    		this.leftText = "";
	    		this.rightText = "";
	    		this.bottomText = "";
	    		this.topText = "";

	    		this.bgColor = this.panel.selectedOption.bgColor;
	    		this.centerText = this.panel.selectedOption.text;

	    		this.panel.selectedOption = "";
	    	},

	    	setPanel(panel) {
	    		this.panel = panel;

	    		this.leftText = this.panel.leftOption.text;
	    		this.rightText = this.panel.rightOption.text;
	    		this.bottomText = this.panel.bottomOption.text;
	    		this.topText = this.panel.topOption;
	    		this.currentLevel = this.panel.level;
	    		this.currentPanel = this.panel.currentPanel;
	    		this.bgColor = "";

	    		if (this.panel.selectedOption == "") {
	    			if (this.currentLevel == 0) {
	    				this.centerText = this.defaultAppName;
	    			} else {
	    				this.centerText = this.currentLevel;
	    			}
	    		} else {
	    			this.selectOption();

	    			setTimeout(() => this.setPanel(this.panel), 1000);
	    		}
	    	},

	    	getDeviceChanges() {
				this.$http.get(this.api('device-panel/status_change/' + this.device + '/for/' + this.patient)).then(
	    			(response) => {
	    				if (_.isObject(response.data) && response.data.status) {
							this.setPanel(JSON.parse(response.data.status));
	    				}
	    			},
	    			(error) => {
	    				alert("Houve um erro na comunicação com o servidor");
	    			}
	    		);
	    	}

    	},

        ready() {
        	this.refreshPanel();

        	setInterval(() => {
        		this.getDeviceChanges();
        	}, 3 * 1000);

    		// Echo.private('device_panel.' + this.device)
    		// 	.listen('.INU.Events.DeviceStatusChanged', (e) => {
    		// 		this.setPanel(e.status);
    		// 		console.log(e);
    		// 	});

    	}
    }
</script>

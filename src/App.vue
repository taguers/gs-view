<template>
  <div id="app">
	<img src="./assets/logo.png">
	<vue-tabs>
		<v-tab title="Relacionamento">
			<!-- <RelacionamentoDT msg="[GOSOFT] - Visualização de pesquisa"/> -->
		</v-tab>

		<v-tab title="Suporte">
			<SuporteDT msg="[GOSOFT] - Visualização de pesquisa"/>
		</v-tab>
	</vue-tabs>
  </div>
</template>

<script>
  import RelacionamentoDT from './components/DataTable.relacionamento.vue'
  import SuporteDT from './components/DataTable.suporte.vue'

export default {
  name: 'app',
  components: {
	SuporteDT,
	RelacionamentoDT
  }
}

</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

img {
  padding-bottom:25px;
}
</style>

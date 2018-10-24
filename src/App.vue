<template>
  <div id="app">
	<img src="./assets/logo.png">
	<vue-tabs>
		<v-tab title="Relacionamento">
			<DataTable msg="[GOSOFT] - Visualização de pesquisa"/>
		</v-tab>

		<v-tab title="Suporte">
			<DataTable msg="[GOSOFT] - Visualização de pesquisa"/>
		</v-tab>
	</vue-tabs>
  </div>
</template>

<script>
  import DataTable from './components/DataTable.vue'

export default {
  name: 'app',
  components: {
    DataTable
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

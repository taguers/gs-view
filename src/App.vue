<template>
	<!-- 	
	<DownloadExcel :data = "RelacionamentoDT">
    		Download Data
    		<img src="download_icon.png">
	</DownloadExcel>
	 -->
		<div class="page-container" id="app">
			<div class="page-content-wrapper">
				<div class="page-head">
					<div class="container">
						<div class="page-title">
							<h1>Pesquisa de satisfação</h1>
							<ul class="page-breadcrumb breadcrumb">
								<li>
									<a href="#">Home</a>
									<i class="fa fa-angle-right "></i>
								</li>
								<li>
									<span>Resultados</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="page-content">
					<div class="container">
						<div class="page-content-inner">
							<div class="row">
								<div class="col-md-12">
									<div class="box">
										<vue-tabs>
											<v-tab title="Relacionamento">
												<br /> 
												<RelacionamentoDT msg="[GOSOFT] - Visualização de pesquisa"/>
											</v-tab>
											<v-tab title="Suporte">
												<br /> 
												<SuporteDT msg="[GOSOFT] - Visualização de pesquisa"/>
											</v-tab>
										</vue-tabs>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			
</template>

<script>
import RelacionamentoDT from './components/DataTable.relacionamento.vue'
import SuporteDT from './components/DataTable.suporte.vue'
import DownloadExcel from 'vue-json-excel'

export default {
name: 'app',
components: 
  {
    SuporteDT,
    RelacionamentoDT,
    DownloadExcel
  }
}
</script>

<style>
/* #app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 25px;
}

img {
  padding-bottom:25px;
} */
</style>

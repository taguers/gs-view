<template>
  <div class="box-body">
    <div class="form-group">
      <input type="text" class="form-control" v-model="search" placeholder="Procurar">
    </div>
    <h1 v-if="!isLoaded">Não há dados para serem exibidos.</h1>
    <div class="table-responsive" v-if="isLoaded">
      <table class="table table-striped table-hover">
          <thead>
              <tr>
                <!-- <th scope="col" @click="sort('id')">Id</th> -->
                <th scope="col" @click="sort('atendente')">Atendente<i class="fas fa-sort-alpha-down float-right"></i></th>
                <th scope="col" @click="sort('cliente')">Cliente<i class="fas fa-sort-alpha-down float-right"></i></th>
                <th scope="col" @click="sort('contato')">Contato<i class="fas fa-sort-alpha-down float-right"></i></th>
			 <th scope="col">Data</th>
			 <th scope="col">Hora</th>
			 <th scope="col">Atendente se identificou</th>
			 <th scope="col">Atendente foi claro</th>
			 <th scope="col">Atendente voz adequada</th>
			 <th scope="col">Nota de atendimento</th>
			 <th scope="col">Observação</th>
			 <th scope="col">Chamado</th>
			 <th scope="col">Data de inclusão</th>
              </tr>
          </thead>
          <tbody>
              <tr v-for="suporte in (listaOrdenada, listaFiltrada)" :key="suporte.id">
                <!-- <td>{{suporte.id}}</td>  -->
                <td v-if="suporte.atendente">{{suporte.atendente}}</td>
			 <td v-else="">-</td>
                <td v-if="suporte.cliente">{{suporte.cliente}}</td>
			 <td v-else="">-</td>
                <td v-if="suporte.contato">{{suporte.contato}}</td>
			 <td v-else="">-</td>
			 <td v-if="suporte.data">{{suporte.data.date | formatDate}}</td>
			 <td v-else="">-</td>
			 <td v-if="suporte.data">{{suporte.data.date | formatHour}}</td>
			 <td v-else="">-</td>
			 <td v-if="suporte.atendenteseidentificou">{{suporte.atendenteseidentificou}}</td>
			 <td v-else="">-</td>
			 <td v-if="suporte.atendentefoiclaro">{{suporte.atendentefoiclaro}}</td>
			 <td v-else="">-</td>
			 <td v-if="suporte.atendentevozadequada">{{suporte.atendentevozadequada}}</td>
			 <td v-else="">-</td>
			 <td v-if="suporte.notaatendimento">{{suporte.notaatendimento}}</td>
			 <td v-else="">-</td>
			 <td v-if="suporte.observacao">{{suporte.observacao}}</td>
			 <td v-else="">-</td>
			 <td v-if="suporte.chamado">{{suporte.chamado}}</td>
			 <td v-else="">-</td>
			 <td v-if="suporte.datainclusao">{{suporte.datainclusao.date | formatDate}}</td>
			 <td v-else="">-</td>
              </tr>
          </tbody>
      </table>
    </div>
    <br />

	<div class="box-pagination">
		<div class="row">
			<div class="col-md-5">
				<label>Mostrando {{ from }} até {{ to }} de {{ totalLength }} Registros.</label>
			</div>
			<div class="col-md-7">
				<ul class="pagination">
					<li>
						<label style="margin:7px 5px;">Página </label>
					</li>

					<li>
						<button @click="prevPage" class="float-left btn btn-outline-info btn-sm"><i class="fas fa-arrow-left"></i></button> 
					</li>
					
					<li class="">
						<input id="pagination-number" class="form-control" maxlength="5" style="text-align:center; width: 55px !important;" type="text" :value="currentPage"  />
					</li>
					
					<li v-if="currentPage>totalPages" class="next disabled">
					<li v-else="" class="next">
						<button @click="nextPage" class="float-right btn btn-outline-info btn-sm"><i class="fas fa-arrow-right"></i></button>
					</li>

					<li>
						<label style="margin:7px 5px;"> de {{ totalPages }}.</label>
					</li>
				</ul>
			</div>
		</div>
  	</div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data: () => ({
    suportes: [],
    currentSort:'id',
    currentSortDir:'asc',
    searchSelection: '',
    pageSize: 5,
    currentPage: 1,
    totalLength: 1,
    totalPages: 1,
    isLoaded: false,
    search: '',
    from: 0,
    to: 0
  }),

  methods: {
    sort: function(s) {
      if (s === this.currentSort) {
        this.currentSortDir = this.currentSortDir === "asc" ? "desc" : "asc";
      }
      this.currentSort = s;
    },
    nextPage: function() {
	 if (this.currentPage * this.pageSize < this.totalLength)
	 {
	   this.from = this.from+this.pageSize;
	   this.to = this.to+this.pageSize;
	   this.currentPage++;
	 }
    },
    prevPage: function() {
	 if (this.currentPage > 1) 
	 {
        this.from = this.from-this.pageSize;
	   this.to = this.to-this.pageSize;
	   this.currentPage--;
	 }
    },
    goToPage: function(pn){
	 if (pn != this.currentPage) 
	 {
	   this.currentPage = pn;
	 }
    }
  },

  computed: {
    listaOrdenada: function() {
      return this.suportes.sort((a, b) => {
          let modifier = 1;
          if (this.currentSortDir === "desc") modifier = -1;
          if (a[this.currentSort] < b[this.currentSort]) return -1 * modifier;
          if (a[this.currentSort] > b[this.currentSort]) return 1 * modifier;
          return 0;
        }).filter((row, index) => {
          let start = (this.currentPage - 1) * this.pageSize;
          let end = this.currentPage * this.pageSize;
          if (index >= start && index < end) return true;
        })
    },
    listaFiltrada () {
	  return this.suportes.filter((data) => {
          let atendente = data.atendente.toLowerCase().match(this.search.toLowerCase());
	 	let cliente = data.cliente.toLowerCase().match(this.search.toLowerCase());  
	     let contato = data.contato.toLowerCase().match(this.search.toLowerCase());
		let datahora = data.data === null ? '' : data.data.date.toLowerCase().match(this.search.toLowerCase());
		let datainclusao = data.datainclusao === null ? '' : data.datainclusao.date.toLowerCase().match(this.search.toLowerCase());
          let atendenteseidentificou = data.atendenteseidentificou.toLowerCase().match(this.search.toLowerCase());
          let atendentefoiclaro = data.atendentefoiclaro.toLowerCase().match(this.search.toLowerCase());
          let atendentevozadequada = data.atendentevozadequada.toLowerCase().match(this.search.toLowerCase());
          let notaatendimento = data.notaatendimento.toLowerCase().match(this.search.toLowerCase());
          let observacoes = data.observacoes.toLowerCase().match(this.search.toLowerCase());
          let chamado = data.chamado.toLowerCase().match(this.search.toLowerCase());
          return (atendente || cliente || contato || datahora || datainclusao
	 	  || atendenteseidentificou || atendentefoiclaro 
	 	  || atendentevozadequada || notaatendimento 
	 	  || observacoes || chamado);
         }).filter((row, index) => {
           let start = (this.currentPage - 1) * this.pageSize;
           let end = this.currentPage * this.pageSize;
           if (index >= start && index < end) return true;
         })
    }
  },

  mounted () {
    axios.get(`${process.env.VUE_APP_API_SUPORTE}`)
      .then(response => {
	   this.suportes = [...response.data]
	   this.totalLength = this.suportes.length
	   this.totalPages = Math.floor(this.totalLength/this.pageSize) === 0 ? 1 : Math.floor(this.totalLength/this.pageSize)
	   this.isLoaded = false
	   this.from = 1
	   this.to = this.pageSize
      })
      .catch(error => {console.log("Error =>", error),this.isLoaded = false})
  }
};
</script>

<style>
th {
  cursor: pointer;
  /* width: 500px !important; */
  white-space: nowrap;
}

tr {
  white-space: nowrap;
}
</style>

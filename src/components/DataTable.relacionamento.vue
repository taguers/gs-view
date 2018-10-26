<template>
  <div class="box-body">
    <div class="form-group">
      <input type="text" class="form-control" v-model="search" placeholder="Procurar">
    </div>
    <h1 v-if="!isLoaded">Não há dados para serem exibidos.</h1>
    <div class="table-responsive" v-if="isLoaded">
      <table class="table table-striped table-bordered">
          <thead>
              <tr>
                  <th scope="col">Consultor</th>
                  <th scope="col" @click="sort('cliente')">Cliente<i class="fas fa-sort-alpha-down float-right"></i></th>
                  <th scope="col">Código</th>
                  <th scope="col">Contato</th>
                  <th scope="col">Data</th>
                  <th scope="col">Hora</th>
                  <th scope="col">Consultor foi pontual</th>
                  <th scope="col">Consultor foi claro</th>
                  <th scope="col">Consultor teve voz adequada</th>
                  <th scope="col">Consultor foi didático</th>
                  <th scope="col">Consultor foi comprometido</th>
                  <th scope="col">Consultor foi objetivo</th>
                  <th scope="col">Nota Impressão</th>
                  <th scope="col">Observações</th>
                  <th scope="col">Inclusão</th>
              </tr>
          </thead>
          <tbody>
              <tr v-for="relacionamento in (listaOrdenada, listaFiltrada)" :key="relacionamento.id"> 
                <!-- <td>{{relacionamento.id}}</td> -->
                <td v-if="relacionamento.consultor">{{relacionamento.consultor}}</td>
			 <td v-else="">-</td>
                <td v-if="relacionamento.cliente">{{relacionamento.cliente}}</td>
			 <td v-else="">-</td>
                <td v-if="relacionamento.codigo">{{relacionamento.codigo}}</td>
			 <td v-else="">-</td>
			 <td v-if="relacionamento.contato">{{relacionamento.contato}}</td>
			 <td v-else="">-</td>
                <td v-if="relacionamento.data">{{relacionamento.data.date | formatDate}}</td>
			 <td v-else="">-</td>
                <td v-if="relacionamento.horario">{{relacionamento.horario}}</td>
			 <td v-else="">-</td>
                <td v-if="relacionamento.consultorfoipontual">{{relacionamento.consultorfoipontual}}</td>
			 <td v-else="">-</td>
			 <td v-if="relacionamento.consultorfoiclaro">{{relacionamento.consultorfoiclaro}}</td>
			 <td v-else="">-</td>
                <td v-if="relacionamento.consultorvozadequada">{{relacionamento.consultorvozadequada}}</td>
			 <td v-else="">-</td>
                <td v-if="relacionamento.consultordidaticaorganizada">{{relacionamento.consultordidaticaorganizada}}</td>
			 <td v-else="">-</td>
			 <td v-if="relacionamento.consultorcomprometimento">{{relacionamento.consultorcomprometimento}}</td>
			 <td v-else="">-</td>
                <td v-if="relacionamento.consultorrespostasobjetivas">{{relacionamento.consultorrespostasobjetivas}}</td>
			 <td v-else="">-</td>
                <td v-if="relacionamento.notaimpressaogosoft">{{relacionamento.notaimpressaogosoft}}</td>
			 <td v-else="">-</td>
			 <td v-if="relacionamento.observacoes">{{relacionamento.observacoes}}</td>
			 <td v-else="">-</td>
                <td v-if="relacionamento.datainclusao">{{relacionamento.datainclusao.date | formatDate}}</td>
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
import axios from 'axios'
import Moment from 'moment'

export default {
  data: () => ({
    relacionamentos: [],
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
    sort:function(s) {
      if(s === this.currentSort) {
        this.currentSortDir = this.currentSortDir==='asc'?'desc':'asc';
      }
      this.currentSort = s;
    },
    nextPage:function() {
      if((this.currentPage*this.pageSize) < this.relacionamentos.length) this.currentPage++;
    },
    prevPage:function() {
      if(this.currentPage > 1) this.currentPage--;
    },
    goToPage: function(pn){
	 if (pn != this.currentPage) 
	 {
	   this.currentPage = pn;
	 }
    } 
  },

  computed: {
    listaOrdenada:function() {
      return this.relacionamentos.sort((a,b) => {
        let modifier = 1;
        if(this.currentSortDir === 'desc') modifier = -1;
        if(a[this.currentSort] < b[this.currentSort]) return -1 * modifier;
        if(a[this.currentSort] > b[this.currentSort]) return 1 * modifier;
        return 0;
      }).filter((row, index) => {
        let start = (this.currentPage-1)*this.pageSize;
        let end = this.currentPage*this.pageSize;
        if(index >= start && index < end) return true;
      });
    },
    listaFiltrada () {
	  return this.relacionamentos.filter((data) => {
		let datah = Moment(String(data.data.date)).locale('pt').format('L').toLowerCase().match(this.search.toLowerCase());
		let consultor = data.consultor.toLowerCase().match(this.search.toLowerCase());	
		let horario = data.horario.toLowerCase().match(this.search.toLowerCase());
		let cliente = data.cliente.toLowerCase().match(this.search.toLowerCase());
		let codigo = data.codigo.toLowerCase().match(this.search.toLowerCase());
		let contato = data.contato.toLowerCase().match(this.search.toLowerCase());
		let conteudo = data.conteudo.toLowerCase().match(this.search.toLowerCase());
		let consultorfoipontual = data.consultorfoipontual.toLowerCase().match(this.search.toLowerCase());
		let consultorfoiclaro = data.consultorfoiclaro.toLowerCase().match(this.search.toLowerCase());
		let consultorvozadequada = data.consultorvozadequada.toLowerCase().match(this.search.toLowerCase());
		let consultordidaticaorganizada = data.consultordidaticaorganizada.toLowerCase().match(this.search.toLowerCase());
		let consultorcomprometimento = data.consultorcomprometimento.toLowerCase().match(this.search.toLowerCase());
		let consultorrespostasobjetivas = data.consultorrespostasobjetivas.toLowerCase().match(this.search.toLowerCase());
		let notaimpressaogosoft = data.notaimpressaogosoft.toLowerCase().match(this.search.toLowerCase());
		let observacoes = data.observacoes.toLowerCase().match(this.search.toLowerCase());
		let datainclusao = Moment(String(data.datainclusao.date)).locale('pt').format('L').toLowerCase().match(this.search.toLowerCase());
		return (datah || consultor || horario || cliente
		|| codigo || contato || conteudo || consultorfoipontual
		|| consultorfoiclaro || consultorvozadequada || consultordidaticaorganizada
		|| consultordidaticaorganizada || consultorcomprometimento || consultorrespostasobjetivas
		|| notaimpressaogosoft || observacoes || datainclusao)
         }).filter((row, index) => {
           let start = (this.currentPage - 1) * this.pageSize;
           let end = this.currentPage * this.pageSize;
           if (index >= start && index < end) return true;
         })
  	}
  },

  mounted () {
    axios.get(`${process.env.VUE_APP_API_RELACIONAMENTO}`)
      .then(response => {
        this.relacionamentos = [...response.data]
	   this.isLoaded = true
	   this.totalLength = this.relacionamentos.length
	   this.totalPages = Math.floor(this.totalLength/this.pageSize) === 0 ? 1 : Math.floor(this.totalLength/this.pageSize)
	   this.isLoaded = true
	   this.from = 1
	   this.to = this.pageSize
      })
      .catch(error => {console.log("Error =>", error),this.isLoaded = false})
  },

}

</script>

<style>
th {
  cursor:pointer;
  /* width: 500px !important; */
  white-space: nowrap;
}

tr {
  white-space: nowrap;
}

</style>
